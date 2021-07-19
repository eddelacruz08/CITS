<?php namespace App\Database\Migrations;

class CreateLogsPermissions extends \CodeIgniter\Database\Migration {

    private $table = 'permissions';

    public function up()
    {
      $data = [
        [
            'function_name' => 'activity logs',
            'function_description' => 'activity logs',
            'slugs' => 'activity-logs',
            'name_on_class' => 'index',
            'page_title' => 'activity logs',
            'module_id' => '10',
            'link_icon' => '<i class="fas fa-tasks"></i>',
            'order' => '1',
            'table_name' => 'logs',
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

    public function down(){

    }
}
