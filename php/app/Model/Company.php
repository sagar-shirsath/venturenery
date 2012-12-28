<?php
App::uses('AppModel', 'Model');
/**
 * Company Model
 *
 */
class Company extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';


    public function get_all_companies(){
        return $this->find('all');
    }
}
