<?php
class AddTyepInEmployees extends CakeMigration {

/**
 * Migration description
 *
 * @var string
 * @access public
 */
	public $description = '';

/**
 * Actions to be performed
 *
 * @var array $migration
 * @access public
 */
	public $migration = array(
		'up' => array(
            'create_field'=>array(
                'employees'=>array(
                    'type'=>array(
                        'type'=>'string',
                        'null'=>true,

                    ),
                    'data_fetch_url'=>array(
                        'type'=>'string',
                        'null'=>true,

                    ),
                )
            )

		),
		'down' => array(
            'drop_field'=>array(
                'employees'=>array(
                    'type','data_fetch_url'
                )
            )
		),
	);

/**
 * Before migration callback
 *
 * @param string $direction, up or down direction of migration process
 * @return boolean Should process continue
 * @access public
 */
	public function before($direction) {
		return true;
	}

/**
 * After migration callback
 *
 * @param string $direction, up or down direction of migration process
 * @return boolean Should process continue
 * @access public
 */
	public function after($direction) {
		return true;
	}
}
