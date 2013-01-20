<?php
App::uses('AppController', 'Controller');
/**
 * Companies Controller
 *
 * @property Company $Company
 */
class CompaniesController extends AppController
{

    public $components = array('Curl');
    public $crunchBaseKey = "tp5vhpdhzv6w48w4q7b7cscr";

    public function beforeFilter()
    {
        parent::beforeFilter();
        $this->Auth->allow('get_companies_from_crunchbase', 'fetch_company_data', 'search', 'get_all_searched_companies',
            'get_all_searched_employees');
        ini_set("memory_limit", "500M");
        ini_set("max_execution_time", "24000");
    }

    /**
     * index method
     *
     * @return void
     */
    public function index()
    {
        //		$this->Company->recursive = 0;
        //        $ComapiesData =  $this->Company->getAllCompanies();
        //        $ComapiesData =   $this->paginate();
        //        pr("Hiii");
        $user = $this->Company->Watchlist->User->find('first', array('conditions' => array('User.id' => $this->Auth->user('id')), 'recursive' => 2));
        $watchLists = $user['Watchlist'];
        $companyIds = $this->getCompanyIds($watchLists);
        $this->paginate = array(
            'conditions' => array('Company.logo_url !=' => ""),
            'fields' => array('Company.id', 'Company.name', 'logo_url', 'created', 'modified'),

            'limit' => 20
        );
        $ComapiesData = $this->paginate('Company');

        $this->set(array('companies' => $ComapiesData, 'companyIds' => $companyIds));
    }


    public function getCompanyIds($watchLists)
    {
        $companyIds = array();
        foreach ($watchLists as $watchList) {
            $companyIds[$watchList['company_id']] = array('watchListId'=>$watchList['id']);
        }
        return $companyIds;
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */

    public function view($id = null)
    {
        $this->Company->id = $id;
        if (!$this->Company->exists()) {
            throw new NotFoundException(__('Invalid company'));
        }
        $this->set('company', $this->Company->read(null, $id));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add()
    {
        if ($this->request->is('post')) {
            $this->Company->create();
            if ($this->Company->save($this->request->data)) {
                $this->Session->setFlash(__('The company has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The company could not be saved. Please, try again.'));
            }
        }
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null)
    {
        $this->Company->id = $id;
        if (!$this->Company->exists()) {
            throw new NotFoundException(__('Invalid company'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Company->save($this->request->data)) {
                $this->Session->setFlash(__('The company has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The company could not be saved. Please, try again.'));
            }
        } else {
            $this->request->data = $this->Company->read(null, $id);
        }
    }

    /**
     * delete method
     *
     * @throws MethodNotAllowedException
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null)
    {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        $this->Company->id = $id;
        if (!$this->Company->exists()) {
            throw new NotFoundException(__('Invalid company'));
        }
        if ($this->Company->delete()) {
            $this->Session->setFlash(__('Company deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Company was not deleted'));
        $this->redirect(array('action' => 'index'));
    }


    //getting all crunchbase companies and saving them into database
    public function get_companies_from_crunchbase()
    {
        $this->layout = false;
        $this->autoRender = false;
        $this->loadCrunchbaseCompanies();
        return true;

    }

    //fetching data for each company

    public function fetch_company_data()
    {
        $this->autoRender = false;
        $this->setLayout = false;

        $allCompanies = $this->Company->get_fetch_url();
        foreach ($allCompanies as $company) { //api_key=tp5vhpdhzv6w48w4q7b7cscr

            $fetched_data = $this->get_one_company_data($company);
            if (!empty($fetched_data->image->available_sizes[0][1]) && $fetched_data->homepage_url != ""  && $fetched_data->image->available_sizes[0][1] ="") {
                $company['Company']['slug'] = $fetched_data->permalink;
                $company['Company']['description'] = $fetched_data->description;
                $company['Company']['description'] = $fetched_data->description;
                $company['Company']['url'] = $fetched_data->homepage_url;

                $company['Company']['logo_url'] = "http://www.crunchbase.com/" . $fetched_data->image->available_sizes[0][1];
                $company['Company']['twitter_url'] = "http://twitter.com/" . $fetched_data->twitter_username;
                $company['Company']['blog_url'] = "http://twitter.com/" . $fetched_data->blog_url;
                $this->Company->create();
                $this->Company->save($company);

                $employeeData = array();
                $company_id = $this->Company->id;
                $count =0 ;
                if (!empty($fetched_data->relationships)) {
                    foreach ($fetched_data->relationships as $employee) {
                        $this->Company->Employee->create();
                        if (!empty($employee->person->image->available_sizes[0][1])){
                            $employeeData[] = array(
                                'type' => $employee->title,
                                'name' => $employee->person->first_name . "  " . $employee->person->last_name,
                                'photo_url' => "http://www.crunchbase.com/" . $employee->person->image->available_sizes[0][1],
                                'data_fetch_url' => "http://api.crunchbase.com/v/1/person/" . $employee->person->permalink . ".js",
                                'company_id' => $company_id,

                            );
                            $count++;
                        }
                        if($count == 5)
                            break;

                    }
                }

                $this->Company->Employee->saveAll($employeeData);
                echo "Data saved";
            }else{
               $this->Company->delete($company['Company']['id']);
            }
            //
            //            $this->Company->Employee->create();
            //            $employee['Employee']['data_fetch_url']="api.crunchbase.com/v/1/person/"


        }


        exit;

    }

    public function get_one_company_data($company = null)
    {
        if (!empty($company['Company']['data_fetch_url'])) {
            return $this->Curl->curl_get($company['Company']['data_fetch_url'] . "?api_key=" . $this->crunchBaseKey);
        } else {
            pr("Noo");
            die;
            return false;
        }
    }

    public function loadCrunchbaseCompanies()
    {
        $jsonResponseInArray = $this->Curl->curl_get('http://api.crunchbase.com/v/1/companies.js?api_key=' . $this->crunchBaseKey);
        $resultToStore = array();
        foreach ($jsonResponseInArray as $key => $companyData) {
            $resultToStore[] = array(
                'name' => $companyData->name,
                'data_fetch_url' => "http://api.crunchbase.com/v/1/company/" . $companyData->permalink . ".js",
                'category_code' => $companyData->category_code
            );
        }
        $this->Company->saveAll($resultToStore);
        pr("data saved");
        return true;
    }

    public function get_form_angelist()
    {
        $this->autoRender = false;
        $esponse_array = $this->Curl->curl_get("https://api.angel.co/1/startups/batch?ids=6702,171");

        pr($esponse_array);
        die;
    }


    public function get_all_searched_companies()
    {
        $query = $this->params->query;
        if (!empty($query['search'])) {
            $query = $query['search'];
            $this->paginate = array(
                'conditions' => array('Company.logo_url !=' => "", 'OR' => array('Company.name LIKE' => '%' . $query . '%')),
                'limit' => 20
            );
            $companies = $this->paginate('Company');
            $this->set(array('companies' => $companies));
            //                $comapnies = $this->Company->getSearchedComapnies($searchKey);

            //                $this->Company->Employee->getSearchedEmployees();
        }

    }

    public function get_all_searched_employees()
    {
        $query = $this->params->query;
        if (!empty($query['search'])) {
            $query = $query['search'];
            $this->paginate = array(
                'conditions' => array('Employee.photo_url !=' => "", 'OR' => array('Employee.name LIKE' => '%' . $query . '%')),
                'limit' => 20
            );
            $employees = $this->paginate('Employee');
            $this->set(array('employees' => $employees));
            //                $comapnies = $this->Company->getSearchedComapnies($searchKey);

            //                $this->Company->Employee->getSearchedEmployees();
        }

    }

    public function search()
    {
        $query = $this->params->query;
        $companies = $employees = array();
        if (!empty($query['search'])) {
            $search_query = $query['search'];
            $companies = $this->Company->getSearchedComapnies($search_query);
            $employees = $this->Company->Employee->getSearchedEmployees($search_query);

        }


        $this->set(array('companies' => $companies, 'employees' => $employees, 'search_query' => $search_query));
    }

    public function add_to_watch_list($company_id)
    {
        $watch_company = array(
            'company_id' => $company_id,
            'user_id' => $this->loggedInUserId()

        );

        if ($this->Company->Watchlist->save($watch_company)) {
            $this->redirect(array('action' => 'index'));
        }
    }

    public function remove_from_watch_list($watchListId){
        $this->Company->Watchlist->delete($watchListId);
        $this->redirect(array('action' => 'index'));
    }
}
