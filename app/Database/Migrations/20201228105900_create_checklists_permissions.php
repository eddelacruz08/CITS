<?php namespace App\Database\Migrations;

class CreateChecklistsPermissions extends \CodeIgniter\Database\Migration {

    private $table = 'permissions';
    public function up()
    {

      $data = [
         [
            'function_name' => 'edit checklists',
            'function_description' => 'edit checklists',
            'slugs' => 'edit-checklists',
            'name_on_class' => 'edit_checklists',
            'page_title' => 'edit a checklists',
            'module_id' => '5',
            'link_icon' => '',
            'order' => '6',
            'table_name' => 'checklists',
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

    }
}
