<?php namespace App\Database\Migrations;

class CreateGuestsPermissions extends \CodeIgniter\Database\Migration {

        private $table = 'permissions';
        public function up()
        {
                  $data = [
                      [
                          'function_name' => 'show guest details',
                          'function_description' => 'show guest details',
                          'slugs' => 'show-guest',
                          'name_on_class' => 'show_guest',
                          'page_title' => 'guest details',
                          'module_id' => '4',
                          'link_icon' => '',
                          'order' => '1',
                          'table_name' => 'guests',
                          'func_action' => 'show',
                          'func_type' => 3,
                          'allowed_roles' => "[1]",
                          'status' => 'a',
                          'created_date' => date('Y-m-d H:i:s')
                      ],
                      [
                          'function_name' => 'list of guest',
                          'function_description' => 'guest',
                          'slugs' => 'list-guest',
                          'name_on_class' => 'index',
                          'page_title' => 'list of guest',
                          'module_id' => '4',
                          'link_icon' => '<i class="fas fa-users"></i>',
                          'order' => '3',
                          'table_name' => 'users',
                          'func_action' => 'link',
                          'func_type' => 1,
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
                // $this->forge->dropTable($this->table);
        }
}
