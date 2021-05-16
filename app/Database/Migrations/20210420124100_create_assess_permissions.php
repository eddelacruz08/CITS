<?php namespace App\Database\Migrations;

class CreateAssessPermissions extends \CodeIgniter\Database\Migration {

    private $table = 'permissions';

    public function up()
    {
      $data = [
        [
            'function_name' => 'guest assessment',
            'function_description' => 'guest assessment',
            'slugs' => 'guest-assessment',
            'name_on_class' => 'index',
            'page_title' => 'guest assessment',
            'module_id' => '9',
            'link_icon' => '<i class="fas fa-clipboard"></i>',
            'order' => '1',
            'table_name' => 'assess',
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
