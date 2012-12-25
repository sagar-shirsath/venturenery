<?php

App::uses('AppController', 'Controller');

class UsersController extends AppController
{


    public $component = array('Session', 'RequestHandler');

    public function beforeFilter()
    {
        parent::beforeFilter();
        $this->Auth->allow('logout', 'register', 'login', 'register_success', 'register_error', 'verify', 'forgot_password', 'reset_password');
        $this->set('menuactive', 'users');
    }

    public function index()
    {
    }

    public function login()
    {

        if (($this->request->is('post') && !empty($this->request->data))) {

            if ($this->Auth->login()) {
                $user_data = $this->User->find('first', array('conditions' => array('User.username' => $this->request->data['User']['username']), 'recursive' => -1));
                if (!empty($user_data['User']['is_active'])) {
                    $this->redirect(array('controller' => 'companies'));
                }

            }

            $this->Session->setFlash(__('Password can not be updated, please try again'));
            $this->redirect($this->referer());
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

    public function forgot_password()
    {

        $userId = $this->loggedInUserId();
        if (!$userId) {
            if ($this->request->is('post') && !empty($this->request->data)) {

                //check email match
                $userData = $this->User->checkProprietorRegisteredUserByEmail($this->request->data['User']['email']);

                if ($userData) {
                    if ($userData['User']['is_verified'] == '0') {
                        $this->Session->setFlash(__('Your Email address not verified yet'));
                    } elseif ($userData['User']['is_active'] == '0') {
                        $this->Session->setFlash(__('Your account is deactivated by administrator, please contact administrator'));
                    } else {

                        $update['User']['hash'] = $userData['User']['hash'] = time();

                        //send email
                        $this->AWSSES->to = $this->request->data['User']['email'];

                        if ($this->AWSSES->_aws_ses('reset_password', $userData['User'])) {

                        }
                        // if ($this->__forgotPasswordEmail($userData)) {
                        //
                        // }
                        //update hash
                        $this->User->updateUser($userData['User']['id'], $update);

                        // $this->Session->setFlash(__('Email has been sent to your email address, please reset your password'));
                        $this->redirect(array('controller' => 'users', 'action' => 'password_confirmation'));
                    }
                } else {
                    $this->Session->setFlash(__('This email address is not registered with us. Please enter a valid email address'), 'set_flash');
                }
            }
        } else {
            $this->redirect(array('controller' => 'albums', 'action' => 'dashboard'));
        }
    }

    public function reset_password($hash = null)
    {

        if (!$hash && $this->request->is('post') && !empty($this->request->data)) {
            $this->redirect('/');
        }

        if ($this->request->is('post') && !empty($this->request->data)) {
            //check hash
            $userData = $this->User->checkHash($hash);

            if (!empty($userData)) {

                $update['User']['password'] = $this->request->data['User']['password'];
                $update['User']['hash'] = time();

                //update hash
                $this->User->updateUser($userData['User']['id'], $update);

                $this->Session->setFlash(__('Your password has been updated. Now you can login to the system'));
                $this->redirect(array('action' => 'login'));
            } else {
                //$this->Session->setFlash(__('incorrect code is incorrect, please try again'));
                $this->redirect('/');
            }
        }
    }

    public function dashboard()
    {

    }

    public function admin_dashboard()
    {
        if ($this->is_admin()) {

            $this->redirect(array('controller' => 'artists', 'action' => 'artist_payouts'));

        } elseif ($this->loggedInUserType() == '3') {
            $this->redirect(array('controller' => 'artists', 'action' => 'artist_dashboard'));
        } else {
            $this->redirect(array('controller' => 'users', 'action' => 'logout'));
        }
    }

    public function facebook_login()
    {

        $this->autoRender = false;
        $session = $this->facebook->getUser();
        $me = null;

        // Session based API call.
        if (!empty($session)) {

            try {
                $me = $this->facebook->api('/me');

                //if user clicks on cancel then user
                //should be redirected to the home page
                if (empty($me)) {
                    $this->redirect('/');
                } else {
                    if ($this->User->checkFBId($me) == 1) {
                        $username = $this->User->fetchFbUsername($me['id']);
                        $this->__loginUser($username);
                    } else {
                        // $userData = $this->User->registerFBUser($me);
                        $this->Session->write('fb_user', $me);
                        $this->redirect('/users/register/');
                    }
                }
            } catch (FacebookApiException $e) {
                error_log($e);
                $this->redirect('/');
            }
        } else {

            $this->nextUrl = FULL_BASE_URL . '/users/facebook_login';

            $url = $this->facebook->getLoginUrl(array('scope' => 'user_birthday,email,offline_access', //read_stream,publish_stream,
                'next' => $this->nextUrl
            ));

            echo ('<script type="text/javascript">top.location.href=\'' . $url . '\';</script>');
        }
    }

    public function __sendRegistrationEmail()
    {

        if ($this->request->is('post') && !empty($this->request->data)) {

            $data['from'] = 'admin@oklisten.com';
            $data['fromName'] = 'Webmaster OkListen';
            $data['to'] = $this->request->data['User']['username'];
            $data['toName'] = $this->request->data['User']['first_name'] . ' ' . $this->request->data['User']['last_name'];
            $data['template'] = 'verify_email';
            $data['subject'] = 'Please verify your email';
            $data['hash'] = $this->request->data['User']['hash'];

            $this->sendSmtpMail($data);
        }

        return true;
    }

    public function profile()
    {
        $this->set('userData', $this->Auth->user());
    }

    public function edit_profile()
    {

        $sideMenuActive = 'preferences';
        $this->loadModel('Payments.Purchase');
        $profile_id = '';
        $userId = $this->loggedInUserId();
        $billingDetails = $this->Purchase->get_last_purchase($userId);
        $lastPurchaseId = $billingDetails['Purchase']['id'];

        $profileDetails = $this->User->Profile->find('first', array('conditions' => array('Profile.user_id' => $userId)));
        if (!empty($profileDetails)) {
            $profile_id = $profileDetails['Profile']['id'];
        }
        if (!empty($this->request->data)) { //$this->request->is('post') &&

            if ($this->User->saveData($this->request->data)) {
                if (!empty($billingDetails)) {
                    if ($this->Purchase->saveLatestData($this->request->data['Profile'], $lastPurchaseId)) {
                        $this->Session->setFlash(__(':-), Your billing history is updated.'));

                    } else {
                        $this->Session->setFlash(__(':-( Unable to update your billing history data.'));
                    }
                } else {
                    $this->Session->setFlash(__(':-), Your Profile is updated.'));
                }
            } else {
                $this->Session->setFlash(__(':-( Unable to update profile data.'));
            }
            $this->redirect($this->referer());
        }
        if (empty($this->request->data)) {
            $userData = $this->User->getUserDataById($userId);
            if (!empty($userData)) {
                $this->request->data = $userData;
            }
        }
        $this->set(compact('userId', 'sideMenuActive', 'billingDetails', 'profile_id'));
    }

    public function __forgotPasswordEmail($userData)
    {

        $data['from'] = 'admin@oklisten.com';
        $data['fromName'] = 'Webmaster OkListen';
        $data['to'] = $userData['User']['username'];
        $data['toName'] = $userData['User']['first_name'] . ' ' . $userData['User']['last_name'];
        $data['template'] = 'reset_password';
        $data['subject'] = 'Reset password';
        $data['hash'] = $userData['User']['hash'];

        $this->sendSmtpMail($data);

        return true;
    }

    public function __loginUser($email)
    {
        $u = $this->User->find('first', array('conditions' => array('User.username' => $email)));

        $this->Auth->login($u['User']);

        if (!empty($u['User']['is_verified']) && !empty($u['User']['is_active'])) {
            $this->redirect('/users/dashboard');
        } else {
            $this->Auth->logout();
            $this->redirect('/users/login');
        }

        exit();
    }


    public function phpinfo()
    {
        $this->autoRender = false;
        phpinfo();
    }


    public function __login_and_redirect($email)
    {
        $u = $this->User->find('first', array('conditions' => array('User.username' => $email)));

        $this->Auth->login($u['User']);

        if (!empty($u['User']['is_verified']) && !empty($u['User']['is_active'])) {
            $this->redirect(array('plugin' => 'vouchers', 'controller' => 'vouchers', 'action' => 'accept_voucher_code'));
        } else {
            $this->Auth->logout();
            $this->redirect('/users/login');
        }

    }


    public function get_users_data()
    {
        if (!$this->is_admin()) {
            $this->Session->setFlash(__('You are restricted to access the unauthorized link'), 'set_flash');
            $this->redirect(array('controller' => 'users', 'action' => 'index'));
        }


        $this->paginate = array('conditions' => array('User.user_type' => 1));
        $users = $this->paginate('User');
        $this->set(compact('users'));

    }

}