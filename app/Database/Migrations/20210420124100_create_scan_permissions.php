<?php namespace App\Database\Migrations;

class CreateScanPermissions extends \CodeIgniter\Database\Migration {

    private $table = 'permissions';

    public function up()
    {
      $data = [
        [
            'function_name' => 'scan',
            'function_description' => 'scan',
            'slugs' => 'scan',
            'name_on_class' => 'index',
            'page_title' => 'scan qrcode',
            'module_id' => '8',
            'link_icon' => '<i class="fas fa-qrcode"></i>',
            'order' => '1',
            'table_name' => 'scans',
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
