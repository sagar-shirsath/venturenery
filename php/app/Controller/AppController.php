<?php
App::uses('Controller', 'Controller');

class AppController extends Controller {


    public $components = array(
        'Auth' => array(
            'loginAction' => array(
                'controller' => 'users',
                'action' => 'login',
                'plugin' => false
            ),
            'loginRedirect' => array('controller' => 'companies', 'action' => 'index'),
            'logoutRedirect'=> array('controller' => 'users', 'action' => 'login'),
            'authError' => 'Did you really think you are allowed to see that?',
            'authenticate' => array(
                'Form' => array(
                    'fields' => array('username' => 'email','password'=>'password')
                )
            )
        ),
        'Session'
    );

    public function beforeFilter()
    {
        parent::beforeFilter();

        if ( isset($_GET['ref']) &&!isset($_COOKIE['referral']) ) {
            setcookie('referral', $_GET['ref'], 2592000 + time());
        }


        if ($this->Auth->login()) {
            $this->set('email', $this->Auth->user('email'));
            $this->set('username', $this->Auth->user('username'));
            $this->set('user_id', $this->Auth->user('id'));
        }
//        $this->set(compact());
    }

    public function loggedInUserId()
    {
        return $this->Auth->user('id') != '' ? $this->Auth->user('id') : false;
    }


}
