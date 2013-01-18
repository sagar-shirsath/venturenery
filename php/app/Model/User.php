<?php
App::uses('AppModel', 'Model');

class User extends AppModel {

    public $displayField = 'name';

    public $hasMany = array(
        'Watchlist' => array(
            'className' => 'Watchlist',
            'foreignKey' => 'user_id',
            'dependent' => false,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        )
    );

    public function check_exists($data){
         $user = $this->find('first',array('conditions'=>array('email'=>$data['User']['email'])));
        if(!empty($user)){
            return true;
        }
        return false;
    }

    public function beforeSave($options = array()) {
        if (isset($this->data['User']['password'])) {
            $this->data['User']['password'] = AuthComponent::password($this->data['User']['password']);
        }
        return true;
    }
}
