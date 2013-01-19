<?php
App::uses('AppController', 'Controller');
/**
 * Watchlists Controller
 *
 * @property Watchlist $Watchlist
 */
class WatchlistsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
        $user_id = $this->Auth->user('id');
//        $watchList = $this->Watchlist->find('all',array('conditions'=>array('Watchlist.user_id'=>$user_id)));
        $this->paginate = array(
            'conditions' => array('Watchlist.user_id'=> $user_id),
            'order'=>'Watchlist.created Desc',
            'limit' => 20
        );
        $watchList = $this->paginate('Watchlist');
        $this->set('companies', $watchList);
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Watchlist->id = $id;
		if (!$this->Watchlist->exists()) {
			throw new NotFoundException(__('Invalid watchlist'));
		}
		$this->set('watchlist', $this->Watchlist->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Watchlist->create();
			if ($this->Watchlist->save($this->request->data)) {
				$this->Session->setFlash(__('The watchlist has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The watchlist could not be saved. Please, try again.'));
			}
		}
		$companies = $this->Watchlist->Company->find('list');
		$users = $this->Watchlist->User->find('list');
		$this->set(compact('companies', 'users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Watchlist->id = $id;
		if (!$this->Watchlist->exists()) {
			throw new NotFoundException(__('Invalid watchlist'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Watchlist->save($this->request->data)) {
				$this->Session->setFlash(__('The watchlist has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The watchlist could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Watchlist->read(null, $id);
		}
		$companies = $this->Watchlist->Company->find('list');
		$users = $this->Watchlist->User->find('list');
		$this->set(compact('companies', 'users'));
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
		$this->Watchlist->id = $id;
		if (!$this->Watchlist->exists()) {
			throw new NotFoundException(__('Invalid watchlist'));
		}
		if ($this->Watchlist->delete()) {
			$this->Session->setFlash(__('Watchlist deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Watchlist was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

//    public function check_the_watch_list($coompany_id){
//            $count  = $this->Watchlist->find('count',array('conditons'=>array('company_id'=>$coompany_id,'user_id'=>$this->loggedInUserId())));
//            if($count>0){
//
//            }
//    }
}
