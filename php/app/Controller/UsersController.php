<?php

App::uses('AppController', 'Controller');

class UsersController extends AppController
{


    public $component = array('Session', 'RequestHandler');

    public function beforeFilter()
    {
        parent::beforeFilter();
        $this->Auth->allow('logout', 'register', 'login');
    }

    public function index()
    {
    }

    public function login()
    {

        if (($this->request->is('post') && !empty($this->request->data))) {

            if ($this->Auth->login()) {
                $user_data = $this->User->find('first', array('conditions' => array('User.email' => $this->request->data['User']['email']), 'recursive' => -1));

                if (!empty($user_data['User']['is_active'])) {
                    $this->redirect(array('controller' => 'companies'));
                }

            }

            $this->Session->setFlash(__('Email and Password don\'t match , please try again'));
            $this->redirect(array('controller'=>'user','action'=>'login'));
        }
    }

    public function logout()
    {
        ;
        $this->redirect($this->Auth->logout());
    }

    public function change_password()
    {

        $loggedInUserId = $this->loggedInUserId();
        if (!in_array($this->loggedInUserType(), array(0, 3))) {

        }
        $sideMenuActive = 'password';
        if (!empty($this->request->data)) {
            if ($this->User->checkUserCurrentPassword($loggedInUserId, $this->request->data['User']['old_password'])) {
                if (AuthComponent::password($this->request->data['User']['new_password']) == AuthComponent::password($this->request->data['User']['confirm_password'])) {

                    $userData = array(
                        'User' => array(
                            'id' => $loggedInUserId,
                            'password' => $this->request->data['User']['new_password'],
                        )
                    );

                    if ($this->User->save($userData)) {
                        $this->Session->setFlash(__('Password has been updated.'), 'set_flash');
                        $this->redirect(array('action' => 'change_password'));
                    } else {
                        $this->Session->setFlash(__('Password can not be updated, please try again'));
                        $this->redirect(array('action' => 'change_password'), 'set_flash');
                    }
                }
            } else {
                $this->Session->setFlash(__('Invalid old password. Please enter valid old password'), 'set_flash');
                $this->redirect($this->referer());
            }
        } else {
            $userData = $this->User->getUserDataById($loggedInUserId);
            if (!empty($userData)) {
                $this->request->data = $userData;
            }
        }
        $this->set('referer', $this->referer());
        $this->set(compact('loggedInUserId', 'sideMenuActive'));
    }

    function register()
    {

        $userId = $this->loggedInUserId();
        if (!$userId) {
            if ($this->request->is('post') && !empty($this->request->data)) {

                $is_exists = $this->User->check_exists($this->request->data);

                if (!$is_exists) {
                    $this->request->data['User']['username'] = $this->request->data['User']['email'];
                    if ($this->User->save($this->request->data)) {
                        $id = $this->User->id;
                        $this->request->data['User'] = array_merge($this->request->data['User'], array('id' => $id));
                        $this->Auth->login($this->request->data['User']);
                        $this->redirect(array('controller' => 'companies'));

                    }
                } else {
                    $this->Session->setFlash(__('User already exists ! , please try with another email id'));
                }

            }
        } else {

            $this->redirect(array('controller' => 'companies'));
        }
    }

//    public function forgot_password()
//    {
//
//        $userId = $this->loggedInUserId();
//        if (!$userId) {
//            if ($this->request->is('post') && !empty($this->request->data)) {
//
//                //check email match
//                $userData = $this->User->checkProprietorRegisteredUserByEmail($this->request->data['User']['email']);
//
//                if ($userData) {
//                    if ($userData['User']['is_verified'] == '0') {
//                        $this->Session->setFlash(__('Your Email address not verified yet'));
//                    } elseif ($userData['User']['is_active'] == '0') {
//                        $this->Session->setFlash(__('Your account is deactivated by administrator, please contact administrator'));
//                    } else {
//
//                        $update['User']['hash'] = $userData['User']['hash'] = time();
//
//                        //send email
//                        $this->AWSSES->to = $this->request->data['User']['email'];
//
//                        if ($this->AWSSES->_aws_ses('reset_password', $userData['User'])) {
//
//                        }
//                        // if ($this->__forgotPasswordEmail($userData)) {
//                        //
//                        // }
//                        //update hash
//                        $this->User->updateUser($userData['User']['id'], $update);
//
//                        // $this->Session->setFlash(__('Email has been sent to your email address, please reset your password'));
//                        $this->redirect(array('controller' => 'users', 'action' => 'password_confirmation'));
//                    }
//                } else {
//                    $this->Session->setFlash(__('This email address is not registered with us. Please enter a valid email address'), 'set_flash');
//                }
//            }
//        } else {
//            $this->redirect(array('controller' => 'albums', 'action' => 'dashboard'));
//        }
//    }
//
//    public function reset_password($hash = null)
//    {
//
//        if (!$hash && $this->request->is('post') && !empty($this->request->data)) {
//            $this->redirect('/');
//        }
//
//        if ($this->request->is('post') && !empty($this->request->data)) {
//            //check hash
//            $userData = $this->User->checkHash($hash);
//
//            if (!empty($userData)) {
//
//                $update['User']['password'] = $this->request->data['User']['password'];
//                $update['User']['hash'] = time();
//
//                //update hash
//                $this->User->updateUser($userData['User']['id'], $update);
//
//                $this->Session->setFlash(__('Your password has been updated. Now you can login to the system'));
//                $this->redirect(array('action' => 'login'));
//            } else {
//                //$this->Session->setFlash(__('incorrect code is incorrect, please try again'));
//                $this->redirect('/');
//            }
//        }
//    }

    public function dashboard()
    {

    }








}