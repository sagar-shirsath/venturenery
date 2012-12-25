<?php
class GeneratingAllTables extends CakeMigration
{

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
            'create_table' => array(
                'companies' => array(
                    'id' => array(
                        'type' => 'string',
                        'null' => false,
                        'default' => NULL,
                        'length' => 36,
                        'key' => 'primary'
                    ),
                    'name' => array(
                        'type' => 'string',
                        'null' => false,
                        'default' => NULL
                    ),
                    'slug' => array(
                        'type' => 'string',
                        'null' => false,
                        'default' => NULL
                    ),
                    'description' => array(
                        'type' => 'string',
                        'null' => false,
                        'default' => NULL
                    ),
                    'industry' => array(
                        'type' => 'string',
                        'null' => false,
                        'default' => NULL
                    ),
                    'url' => array(
                        'type' => 'string',
                        'null' => false,
                        'default' => NULL,

                    ),
                    'logo_url' => array(
                        'type' => 'string',
                        'null' => false,
                        'default' => NULL,

                    ),
                    'slogan' => array(
                        'type' => 'string',
                        'null' => false,
                        'default' => NULL,

                    ),
                    'twitter_url' => array(
                        'type' => 'string',
                        'null' => false,
                        'default' => NULL,

                    ),
                    'fb_url' => array(
                        'type' => 'string',
                        'null' => false,
                        'default' => NULL,

                    ),
                    'linkedin_url' => array(
                        'type' => 'string',
                        'null' => false,
                        'default' => NULL,

                    ),
                    'blog_url' => array(
                        'type' => 'string',
                        'null' => false,
                        'default' => NULL,

                    ),
                    'video_url' => array(
                        'type' => 'string',
                        'null' => false,
                        'default' => NULL,

                    ),
                    'is_active'=>array(
                        'type'=>'boolean',
                        'default'=>true,

                    ),

                    'created' => array(
                        'type' => 'datetime'
                    ),
                    'modified' => array(
                        'type' => 'datetime'
                    ),
                    'indexes' => array(
                        'PRIMARY' => array(
                            'column' => 'id',
                            'unique' => 1)
                    )
                ),
                'users' => array(
                    'id' => array(
                        'type' => 'string',
                        'null' => false,
                        'default' => NULL,
                        'length' => 36,
                        'key' => 'primary'
                    ),
                    'username' => array(
                        'type' => 'string',
                        'null' => false,
                        'default' => NULL
                    ),
                    'first_name' => array(
                        'type' => 'string',
                        'null' => false,
                        'default' => NULL
                    ),
                    'last_name' => array(
                        'type' => 'string',
                        'null' => false,
                        'default' => NULL
                    ),
                    'email' => array(
                        'type' => 'string',
                        'null' => false,
                        'default' => NULL
                    ),
                    'password' => array(
                        'type' => 'string',
                        'null' => false,
                        'default' => NULL
                    ),
                    'is_active'=>array(
                        'type'=>'boolean',
                        'default'=>true,

                    ),
                    'type'=>array(
                        'type'=>'integer',
                        'null'=>false
                    ),
                    'created' => array(
                        'type' => 'datetime'
                    ),

                    'modified' => array(
                        'type' => 'datetime'
                    ),

                ),

        'employees'=>array(
            'id' => array(
                'type' => 'string',
                'null' => false,
                'default' => NULL,
                'length' => 36,
                'key' => 'primary'
            ),
            'name'=>array(
                'type'=>'string',
                'null'=>false,
                'default'=>NULL
            ),
            'company_id'=>array(
                'type'=>'string',
                'null'=>false,
                'default'=>NULL
            ),

            'photo_url'=>array(
                'type'=>'string',
                'null'=>false,
                'default'=>NULL
            ),
            'is_active'=>array(
                'type'=>'boolean',
                'default'=>true,

            ),

            'about'=>array(
                'type'=>'string',
                'null'=>false,
                'default'=>NULL
            ),

            'created' => array(
                'type' => 'datetime'
            ),

            'modified' => array(
                'type' => 'datetime'
            ),

        ),
        'watchlists'=>array(
            'id' => array(
                'type' => 'string',
                'null' => false,
                'default' => NULL,
                'length' => 36,
                'key' => 'primary'
            ),
            'company_id'=>array(
                'type'=>'string',
                'null'=>false,
                'default'=>NULL
            ),
            'user_id'=>array(
                'type'=>'string',
                'null'=>false,
                'default'=>NULL
            ),
            'is_active'=>array(
                'type'=>'boolean',
                'default'=>true,

            ),

            'created' => array(
                'type' => 'datetime'
            ),

            'modified' => array(
                'type' => 'datetime'
            ),

        )
             )
        ),
        'down' => array(
            'drop_table' => array(
                'companies','users','watchlists','employees'

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
    public function before($direction)
    {
        return true;
    }

    /**
     * After migration callback
     *
     * @param string $direction, up or down direction of migration process
     * @return boolean Should process continue
     * @access public
     */
    public function after($direction)
    {
        return true;
    }
}
