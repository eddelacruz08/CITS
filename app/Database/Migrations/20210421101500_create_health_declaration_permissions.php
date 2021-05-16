<?php namespace App\Database\Migrations;

class CreateHealthDeclarationPermissions extends \CodeIgniter\Database\Migration {

    private $table = 'permissions';

    public function up()
    {
      $data = [
        [
            'function_name' => 'health declaration',
            'function_description' => 'health declaration',
            'slugs' => 'health-declaration',
            'name_on_class' => 'index',
            'page_title' => 'health declaration',
            'module_id' => '7',
            'link_icon' => '<i class="fas fa-file"></i>',
            'order' => '1',
            'table_name' => 'healthdeclaration',
            'func_action' => 'link',
            'func_type' => 1,
            'allowed_roles' => "[2]",
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
