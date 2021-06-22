<?php namespace App\Database\Migrations;

class CreateProfilePermissions extends \CodeIgniter\Database\Migration {

    private $table = 'permissions';

    public function up()
    {
      $data = [
        [
            'function_name' => 'profile',
            'function_description' => 'profile',
            'slugs' => 'profile',
            'name_on_class' => 'index',
            'page_title' => 'profile',
            'module_id' => '6',
            'link_icon' => '<i class="fas fa-address-card"></i>',
            'order' => '1',
            'table_name' => 'profiles',
            'func_action' => 'link',
            'func_type' => 1,
            'allowed_roles' => "[1,2]",
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
