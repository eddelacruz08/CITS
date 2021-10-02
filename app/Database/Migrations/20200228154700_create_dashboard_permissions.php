<?php namespace App\Database\Migrations;

class CreateDashboardPermissions extends \CodeIgniter\Database\Migration {

    private $table = 'permissions';

    public function up()
    {
      $data = [
        [
            'function_name' => 'dashboard',
            'function_description' => 'dashboard',
            'slugs' => 'dashboard',
            'name_on_class' => 'index',
            'page_title' => 'dashboard',
            'module_id' => '3',
            'link_icon' => '<i class="fas fa-tachmeter-alt"></i>',
            'order' => '1',
            'table_name' => 'dashboard',
            'func_action' => 'link',
            'func_type' => 1,
            'allowed_roles' => "[3]",
            'status' => 'a',
            'created_date' => date('Y-m-d H:i:s')
        ],
      ];

      $db      = \Config\Database::connect();
      $builder = $db->table($this->table);
      $builder->insertBatch($data);
    }

    public function down(){

    }
}
