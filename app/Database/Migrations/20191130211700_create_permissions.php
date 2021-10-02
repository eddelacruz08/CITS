<?php namespace App\Database\Migrations;

class CreatePermissions extends \CodeIgniter\Database\Migration {

        private $table = 'permissions';
        public function up()
        {
                $this->forge->addField([
                        'id'          => [
                                  'type'           => 'BIGINT',
                                'unsigned'       => TRUE,
                                'auto_increment' => TRUE
                        ],

                        'name_on_class'       => [
                                'type'           => 'VARCHAR',
                                'constraint'     => '250',
                        ],

                        'function_name'       => [
                                'type'           => 'VARCHAR',
                                'constraint'     => '50',
                        ],

                        'function_description'       => [
                                'type'           => 'TEXT',
                        ],

                        'link_icon'       => [
                                'type'          => 'TEXT',
                                'null'          =>  true
                        ],

                        'slugs'       => [
                                'type'           => 'VARCHAR',
                                'constraint'     => '50',
                        ],

                        'page_title'       => [
                                'type'           => 'VARCHAR',
                                'constraint'     => '50',
                        ],

                        'module_id'       => [
                                'type'           => 'INT',
                        ],

                        'table_name'       => [
                                'type'           => 'varchar',
                                'constraint'     => '100',
                        ],

                        'func_action'       => [
                                'type'           => 'varchar',
                                'null'           => true,
                                'constraint'     => '50',
                        ],

                        'allowed_roles'       => [
                                'type'           => 'JSON',
                                'default'     => "[1]",
                        ],

                        'order'       => [
                                'type'           => 'INT'
                        ],

                        'status' => [
                                'type'           => 'CHAR',
                                'constraint'     => '1',
                                'default'        => 'a'
                        ],

                        'func_type' => [
                                'type'           => 'int',
                                'constraint'     => '1',
                                'default'        => '3'
                        ],

                        'created_date' => [
                                'type'           => 'DATETIME',
                                'comment'        => 'Date of creation',
                        ],

                        'updated_date' => [
                                'type'           => 'DATETIME',
                                'null'           => true,
                                'default'        => null,
                                'comment'        => 'Date last updated',
                        ],
                        'deleted_date' => [
                                'type'           => 'DATETIME',
                                'null'           => true,
                                'default'        => null,
                                'comment'        => 'Date of soft deletion',
                        ]
                ]);
                $this->forge->addKey('id', TRUE);
                $this->forge->createTable($this->table);

                $data = [
                    [
                        'function_name' => 'show user details',
                        'function_description' => 'show user details',
                        'slugs' => 'show-user',
                        'name_on_class' => 'show_user',
                        'page_title' => 'user details',
                        'module_id' => '1',
                         'link_icon' => '',
                        'order' => '2',
                        'table_name' => 'users',
                        'func_action' => 'show',
                        'func_type' => 3,
                        'allowed_roles' => "[1]",
                        'status' => 'a',
                        'created_date' => date('Y-m-d H:i:s')
                    ],
                    [
                        'function_name' => 'create user account',
                        'function_description' => 'create user account',
                        'slugs' => 'add-user',
                        'name_on_class' => 'add_user',
                        'page_title' => 'create a user account',
                        'module_id' => '1',
                        'link_icon' => '',
                        'order' => '3',
                        'table_name' => 'users',
                        'func_action' => 'add',
                        'func_type' => 3,
                        'allowed_roles' => "[1]",
                        'status' => 'a',
                        'created_date' => date('Y-m-d H:i:s')
                    ],
                    [
                        'function_name' => 'list of users',
                        'function_description' => 'users',
                        'slugs' => 'list-user',
                        'name_on_class' => 'index',
                        'page_title' => 'list of users',
                        'module_id' => '1',
                        'link_icon' => '<i class="fas fa-users"></i>',
                        'order' => '4',
                        'table_name' => 'users',
                        'func_action' => 'link',
                        'func_type' => 1,
                        'allowed_roles' => "[1]",
                        'status' => 'a',
                        'created_date' => date('Y-m-d H:i:s')
                    ],
                    [
                        'function_name' => 'edit user account',
                        'function_description' => 'edit user account',
                        'slugs' => 'edit-user',
                        'name_on_class' => 'edit_user',
                        'page_title' => 'edit user account',
                        'module_id' => '1',
                        'link_icon' => '',
                        'order' => '5',
                        'table_name' => 'users',
                        'func_action' => 'edit',
                        'func_type' => 3,
                        'allowed_roles' => "[1]",
                        'status' => 'a',
                        'created_date' => date('Y-m-d H:i:s')
                    ],
                    [
                        'function_name' => 'delete user account',
                        'function_description' => 'delete user account',
                        'slugs' => 'delete-user',
                        'name_on_class' => 'delete_user',
                        'page_title' => 'delete user account',
                        'module_id' => '1',
                        'link_icon' => '',
                        'order' => '6',
                        'table_name' => 'users',
                        'func_action' => 'delete',
                        'func_type' => 3,
                        'allowed_roles' => "[1]",
                        'status' => 'a',
                        'created_date' => date('Y-m-d H:i:s')
                    ],
                    [
                        'function_name' => 'show role details',
                        'function_description' => 'show role detials',
                        'slugs' => 'show-role-details',
                        'name_on_class' => 'show_role_details',
                        'page_title' => 'role details',
                        'module_id' => '1',
                        'link_icon' => '',
                        'order' => '7',
                        'table_name' => 'roles',
                        'func_action' => 'show',
                        'func_type' => 3,
                        'allowed_roles' => "[1]",
                        'status' => 'a',
                        'created_date' => date('Y-m-d H:i:s')
                    ],
                    [
                        'function_name' => 'create role',
                        'function_description' => 'create role',
                        'slugs' => 'add-role',
                        'name_on_class' => 'add_role',
                        'page_title' => 'create role',
                        'module_id' => '1',
                        'link_icon' => '',
                        'order' => '8',
                        'table_name' => 'roles',
                        'func_action' => 'add',
                        'func_type' => 3,
                        'allowed_roles' => "[1]",
                        'status' => 'a',
                        'created_date' => date('Y-m-d H:i:s')
                    ],
                    [
                        'function_name' => 'list of roles',
                        'function_description' => 'roles',
                        'slugs' => 'list-role',
                        'name_on_class' => 'index',
                        'page_title' => 'list of roles',
                        'module_id' => '1',
                        'link_icon' => '<i class="fas fa-user-tag"></i>',
                        'order' => '9',
                        'table_name' => 'roles',
                        'func_action' => 'link',
                        'func_type' => 1,
                        'allowed_roles' => "[1]",
                        'status' => 'a',
                        'created_date' => date('Y-m-d H:i:s')
                    ],
                    [
                        'function_name' => 'edit role',
                        'function_description' => 'edit role',
                        'slugs' => 'edit-role',
                        'name_on_class' => 'edit_role',
                        'page_title' => 'edit role',
                        'module_id' => '1',
                        'link_icon' => '',
                        'order' => '10',
                        'table_name' => 'roles',
                        'func_action' => 'edit',
                        'func_type' => 3,
                        'allowed_roles' => "[1]",
                        'status' => 'a',
                        'created_date' => date('Y-m-d H:i:s')
                    ],
                    [
                        'function_name' => 'delete role',
                        'function_description' => 'delete role',
                        'slugs' => 'delete-role',
                        'name_on_class' => 'delete_role',
                        'page_title' => 'delete role',
                        'module_id' => '1',
                        'link_icon' => '',
                        'order' => '11',
                        'table_name' => 'roles',
                        'func_action' => 'delete',
                        'func_type' => 3,
                        'allowed_roles' => "[1]",
                        'status' => 'a',
                        'created_date' => date('Y-m-d H:i:s')
                    ],
                    [
                        'function_name' => 'roles permissions',
                        'function_description' => 'roles permissions',
                        'slugs' => 'role-permissions',
                        'name_on_class' => 'index',
                        'page_title' => 'roles permissions',
                        'module_id' => '1',
                         'link_icon' => '<i class="fas fa-shield-alt"></i>',
                        'order' => '12',
                        'table_name' => 'permissions',
                        'func_action' => 'link',
                        'func_type' => 1,
                        'allowed_roles' => "[1]",
                        'status' => 'a',
                        'created_date' => date('Y-m-d H:i:s')
                    ],
                    [
                        'function_name' => 'edit roles permissions',
                        'function_description' => 'edit roles permissions',
                        'slugs' => 'edit-role-permissions',
                        'name_on_class' => 'edit_role_permissions',
                        'page_title' => 'edit role perission',
                        'module_id' => '1',
                        'link_icon' => '',
                        'order' => '13',
                        'table_name' => 'permissions',
                        'func_action' => 'edit',
                        'func_type' => 3,
                        'allowed_roles' => "[1]",
                        'status' => 'a',
                        'created_date' => date('Y-m-d H:i:s')
                    ],
                ];
                $db      = \Config\Database::connect();
                $builder = $db->table($this->table);
                $builder->insertBatch($data);
        }

        public function down()
        {
            $db      = \Config\Database::connect();
            $builder = $db->table($this->table);
            $db->simpleQuery('DELETE FROM '.$this->table);
            $this->forge->dropTable($this->table);
        }
}
