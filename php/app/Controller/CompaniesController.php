<?php
App::uses('AppController', 'Controller');
/**
 * Companies Controller
 *
 * @property Company $Company
 */
class CompaniesController extends AppController {

    public $components = array('Curl');
    public $crunchBaseKey = "ftxykm4s2w3gym4nm8y2pfyg";

    public function beforeFilter()
    {
        parent::beforeFilter();
        $this->Auth->allow('get_companies_from_crunchbase','fetch_company_data');
        ini_set("memory_limit","500M");
        ini_set("max_execution_time","24000");
    }
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Company->recursive = 0;
        $ComapiesData =  $this->Company->getAllCompanies();
        $ComapiesData =   $this->paginate();

		$this->set('companies', $ComapiesData);
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
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
	public function add() {
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
	public function edit($id = null) {
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
	public function delete($id = null) {
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

    public function get_companies_from_crunchbase(){
        $this->layout = false;
        $this->autoRender = false;
        $this->loadCrunchbaseCompanies();
        return true;

    }


    public function fetch_company_data(){
        $this->autoRender = false;
        $this->setLayout = false;
        $allCompanies = $this->Company->get_all_companies();
        foreach($allCompanies as $company){  //api_key=ftxykm4s2w3gym4nm8y2pfyg
            $fetched_data = $this->get_one_company_data($company);
            $company['Company']['slug'] =  $fetched_data->permalink;
            $company['Company']['description'] =  $fetched_data->description;
            $company['Company']['description'] =  $fetched_data->description;
            $company['Company']['url'] =  $fetched_data->homepage_url;
            if(!empty($fetched_data->image->available_sizes[0][1])){
                $company['Company']['logo_url'] =  "http://www.crunchbase.com/".$fetched_data->image->available_sizes[0][1];
            }
            $company['Company']['twitter_url'] =  "http://twitter.com/".$fetched_data->twitter_username;
            $company['Company']['blog_url'] =  "http://twitter.com/".$fetched_data->blog_url;

            $this->Company->save($company);

            $company_id = $this->Company->id;


            sleep(0.25);
        }



        exit;

    }

    public function get_one_company_data($company=null){
        if(!empty($company['Company']['data_fetch_url'])){
            return $this->Curl->curl_get($company['Company']['data_fetch_url']."?api_key=".$this->crunchBaseKey);
        }else{
            return false;
        }
    }

    public function loadCrunchbaseCompanies(){
        $jsonResponseInArray = $this->Curl->curl_get('http://api.crunchbase.com/v/1/companies.js?api_key='.$this->crunchBaseKey);
        $resultToStore = array();
        foreach($jsonResponseInArray as $key => $companyData){
            $resultToStore[]=array(
            'name'=>$companyData->name,
            'data_fetch_url'=>"http://api.crunchbase.com/v/1/company/".$companyData->permalink.".js",
            'category_code'=>$companyData->category_code
             );
        }
        $this->Company->saveAll($resultToStore);
        pr("data saved");
        return true;
    }

        public function get_form_angelist(){
        $this->autoRender = false;
        $esponse_array = $this->Curl->curl_get("https://api.angel.co/1/startups/batch?ids=6702,171");

        pr($esponse_array);
            die;
    }
}
