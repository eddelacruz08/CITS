<?php namespace App\Database\Migrations;

class CreateMaintenancesPermissions extends \CodeIgniter\Database\Migration {

        private $table = 'permissions';
        public function up()
        {
                  $data = [
                      [
                          'function_name' => 'create reason',
                          'function_description' => 'create reason',
                          'slugs' => 'add-reason',
                          'name_on_class' => 'add_reason',
                          'page_title' => 'create a reason',
                          'module_id' => '2',
                          'link_icon' => '',
                          'order' => '1',
                          'table_name' => 'reasons',
                          'func_action' => 'add',
                          'func_type' => 3,
                          'allowed_roles' => "[1]",
                          'status' => 'a',
                          'created_date' => date('Y-m-d H:i:s')
                      ],
                      [
                          'function_name' => 'reasons',
                          'function_description' => 'reasons',
                          'slugs' => 'list-reason',
                          'name_on_class' => 'index',
                          'page_title' => 'reasons',
                          'module_id' => '2',
                          'link_icon' => '<i class="fas fa-plus"> </i>',
                          'order' => '2',
                          'table_name' => 'reasons',
                          'func_action' => 'link',
                          'func_type' => 1,
                          'allowed_roles' => "[1]",
                          'status' => 'a',
                          'created_date' => date('Y-m-d H:i:s')
                      ],
                      [
                          'function_name' => 'edit reason',
                          'function_description' => 'edit reason',
                          'slugs' => 'edit-reason',
                          'name_on_class' => 'edit_reason',
                          'page_title' => 'edit reason',
                          'module_id' => '2',
                          'link_icon' => '',
                          'order' => '3',
                          'table_name' => 'reasons',
                          'func_action' => 'edit',
                          'func_type' => 3,
                          'allowed_roles' => "[1]",
                          'status' => 'a',
                          'created_date' => date('Y-m-d H:i:s')
                      ],
                      [
                          'function_name' => 'create gender',
                          'function_description' => 'create gender',
                          'slugs' => 'add-gender',
                          'name_on_class' => 'add_gender',
                          'page_title' => 'create a gender',
                          'module_id' => '2',
                          'link_icon' => '',
                          'order' => '4',
                          'table_name' => 'genders',
                          'func_action' => 'add',
                          'func_type' => 3,
                          'allowed_roles' => "[1]",
                          'status' => 'a',
                          'created_date' => date('Y-m-d H:i:s')
                      ],
                      [
                          'function_name' => 'genders',
                          'function_description' => 'genders',
                          'slugs' => 'list-gender',
                          'name_on_class' => 'index',
                          'page_title' => 'genders',
                          'module_id' => '2',
                          'link_icon' => '<i class="fas fa-plus"> </i>',
                          'order' => '5',
                          'table_name' => 'genders',
                          'func_action' => 'link',
                          'func_type' => 1,
                          'allowed_roles' => "[1]",
                          'status' => 'a',
                          'created_date' => date('Y-m-d H:i:s')
                      ],
                      [
                          'function_name' => 'edit gender',
                          'function_description' => 'edit gender',
                          'slugs' => 'edit-gender',
                          'name_on_class' => 'edit_gender',
                          'page_title' => 'edit gender',
                          'module_id' => '2',
                          'link_icon' => '',
                          'order' => '6',
                          'table_name' => 'genders',
                          'func_action' => 'edit',
                          'func_type' => 3,
                          'allowed_roles' => "[1]",
                          'status' => 'a',
                          'created_date' => date('Y-m-d H:i:s')
                      ],
                      [
                          'function_name' => 'create extension',
                          'function_description' => 'create extension',
                          'slugs' => 'add-extension',
                          'name_on_class' => 'add_extension',
                          'page_title' => 'create a extension',
                          'module_id' => '2',
                          'link_icon' => '',
                          'order' => '7',
                          'table_name' => 'extensions',
                          'func_action' => 'add',
                          'func_type' => 3,
                          'allowed_roles' => "[1]",
                          'status' => 'a',
                          'created_date' => date('Y-m-d H:i:s')
                      ],
                      [
                          'function_name' =>'extensions',
                          'function_description' => 'extensions',
                          'slugs' => 'list-extension',
                          'name_on_class' => 'index',
                          'page_title' => 'extensions',
                          'module_id' => '2',
                          'link_icon' => '<i class="fas fa-plus"> </i>',
                          'order' => '8',
                          'table_name' => 'extensions',
                          'func_action' => 'link',
                          'func_type' => 1,
                          'allowed_roles' => "[1]",
                          'status' => 'a',
                          'created_date' => date('Y-m-d H:i:s')
                      ],
                      [
                          'function_name' => 'edit extension',
                          'function_description' => 'edit extension',
                          'slugs' => 'edit-extension',
                          'name_on_class' => 'edit_extension',
                          'page_title' => 'edit extension',
                          'module_id' => '2',
                          'link_icon' => '',
                          'order' => '9',
                          'table_name' => 'extensions',
                          'func_action' => 'edit',
                          'func_type' => 3,
                          'allowed_roles' => "[1]",
                          'status' => 'a',
                          'created_date' => date('Y-m-d H:i:s')
                      ],
                      [
                          'function_name' => 'create province',
                          'function_description' => 'create province',
                          'slugs' => 'add-province',
                          'name_on_class' => 'add_province',
                          'page_title' => 'create a province',
                          'module_id' => '2',
                          'link_icon' => '',
                          'order' => '10',
                          'table_name' => 'provinces',
                          'func_action' => 'add',
                          'func_type' => 3,
                          'allowed_roles' => "[1]",
                          'status' => 'a',
                          'created_date' => date('Y-m-d H:i:s')
                      ],
                      [
                          'function_name' => 'provinces',
                          'function_description' => 'provinces',
                          'slugs' => 'list-province',
                          'name_on_class' => 'index',
                          'page_title' => 'provinces',
                          'module_id' => '2',
                          'link_icon' => '<i class="fas fa-plus"> </i>',
                          'order' => '11',
                          'table_name' => 'provinces',
                          'func_action' => 'link',
                          'func_type' => 1,
                          'allowed_roles' => "[1]",
                          'status' => 'a',
                          'created_date' => date('Y-m-d H:i:s')
                      ],
                      [
                          'function_name' => 'edit province',
                          'function_description' => 'edit province',
                          'slugs' => 'edit-province',
                          'name_on_class' => 'edit_province',
                          'page_title' => 'edit province',
                          'module_id' => '2',
                          'link_icon' => '',
                          'order' => '12',
                          'table_name' => 'provinces',
                          'func_action' => 'edit',
                          'func_type' => 3,
                          'allowed_roles' => "[1]",
                          'status' => 'a',
                          'created_date' => date('Y-m-d H:i:s')
                      ],
                      [
                          'function_name' => 'create city',
                          'function_description' => 'create city',
                          'slugs' => 'add-city',
                          'name_on_class' => 'add_city',
                          'page_title' => 'create a city',
                          'module_id' => '2',
                          'link_icon' => '',
                          'order' => '13',
                          'table_name' => 'cities',
                          'func_action' => 'add',
                          'func_type' => 3,
                          'allowed_roles' => "[1]",
                          'status' => 'a',
                          'created_date' => date('Y-m-d H:i:s')
                      ],
                      [
                          'function_name' => 'cities',
                          'function_description' => 'cities',
                          'slugs' => 'list-city',
                          'name_on_class' => 'index',
                          'page_title' => 'cities',
                          'module_id' => '2',
                          'link_icon' => '<i class="fas fa-plus"> </i>',
                          'order' => '14',
                          'table_name' => 'cities',
                          'func_action' => 'link',
                          'func_type' => 1,
                          'allowed_roles' => "[1]",
                          'status' => 'a',
                          'created_date' => date('Y-m-d H:i:s')
                      ],
                      [
                          'function_name' => 'edit city',
                          'function_description' => 'edit city',
                          'slugs' => 'edit-city',
                          'name_on_class' => 'edit_city',
                          'page_title' => 'edit city',
                          'module_id' => '2',
                          'link_icon' => '',
                          'order' => '15',
                          'table_name' => 'cities',
                          'func_action' => 'edit',
                          'func_type' => 3,
                          'allowed_roles' => "[1]",
                          'status' => 'a',
                          'created_date' => date('Y-m-d H:i:s')
                      ],
                      [
                          'function_name' => 'create type',
                          'function_description' => 'create type',
                          'slugs' => 'add-type',
                          'name_on_class' => 'add_type',
                          'page_title' => 'create a type',
                          'module_id' => '2',
                          'link_icon' => '',
                          'order' => '16',
                          'table_name' => 'types',
                          'func_action' => 'add',
                          'func_type' => 3,
                          'allowed_roles' => "[1]",
                          'status' => 'a',
                          'created_date' => date('Y-m-d H:i:s')
                      ],
                      [
                          'function_name' => 'guest types',
                          'function_description' => 'guest types',
                          'slugs' => 'list-guest-type',
                          'name_on_class' => 'index',
                          'page_title' => 'guest types',
                          'module_id' => '2',
                          'link_icon' => '<i class="fas fa-plus"> </i>',
                          'order' => '17',
                          'table_name' => 'types',
                          'func_action' => 'link',
                          'func_type' => 1,
                          'allowed_roles' => "[1]",
                          'status' => 'a',
                          'created_date' => date('Y-m-d H:i:s')
                      ],
                      [
                          'function_name' => 'edit type',
                          'function_description' => 'edit type',
                          'slugs' => 'edit-type',
                          'name_on_class' => 'edit_type',
                          'page_title' => 'edit type',
                          'module_id' => '2',
                          'link_icon' => '',
                          'order' => '18',
                          'table_name' => 'types',
                          'func_action' => 'edit',
                          'func_type' => 3,
                          'allowed_roles' => "[1]",
                          'status' => 'a',
                          'created_date' => date('Y-m-d H:i:s')
                      ],
                      [
                          'function_name' => 'add question',
                          'function_description' => 'add question',
                          'slugs' => 'add-question',
                          'name_on_class' => 'add_question',
                          'page_title' => 'create a question',
                          'module_id' => '2',
                          'link_icon' => '',
                          'order' => '19',
                          'table_name' => 'questions',
                          'func_action' => 'add',
                          'func_type' => 3,
                          'allowed_roles' => "[1]",
                          'status' => 'a',
                          'created_date' => date('Y-m-d H:i:s')
                      ],
                      [
                          'function_name' => 'questions',
                          'function_description' => 'questions',
                          'slugs' => 'list-guest-question',
                          'name_on_class' => 'index',
                          'page_title' => 'questions',
                          'module_id' => '2',
                          'link_icon' => '<i class="fas fa-plus"> </i>',
                          'order' => '20',
                          'table_name' => 'questions',
                          'func_action' => 'link',
                          'func_type' => 1,
                          'allowed_roles' => "[1]",
                          'status' => 'a',
                          'created_date' => date('Y-m-d H:i:s')
                      ],
                      [
                          'function_name' => 'edit question',
                          'function_description' => 'edit question',
                          'slugs' => 'edit-question',
                          'name_on_class' => 'edit_question',
                          'page_title' => 'edit question',
                          'module_id' => '2',
                          'link_icon' => '',
                          'order' => '21',
                          'table_name' => 'questions',
                          'func_action' => 'edit',
                          'func_type' => 3,
                          'allowed_roles' => "[1]",
                          'status' => 'a',
                          'created_date' => date('Y-m-d H:i:s')
                      ],
                      [
                          'function_name' => 'guidelines',
                          'function_description' => 'guidelines',
                          'slugs' => 'list-guidelines',
                          'name_on_class' => 'index',
                          'page_title' => 'guidelines',
                          'module_id' => '2',
                          'link_icon' => '<i class="fas fa-plus"> </i>',
                          'order' => '22',
                          'table_name' => 'guidelines',
                          'func_action' => 'link',
                          'func_type' => 1,
                          'allowed_roles' => "[1]",
                          'status' => 'a',
                          'created_date' => date('Y-m-d H:i:s')
                      ],
                      [
                          'function_name' => 'edit guidelines',
                          'function_description' => 'edit guidelines',
                          'slugs' => 'edit-guidelines',
                          'name_on_class' => 'edit_guidelines',
                          'page_title' => 'edit guidelines',
                          'module_id' => '2',
                          'link_icon' => '',
                          'order' => '23',
                          'table_name' => 'guidelines',
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
                // $this->forge->dropTable($this->table);
        }
}
