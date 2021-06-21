<?php namespace App\Database\Migrations;

class CreateVisitsPermissions extends \CodeIgniter\Database\Migration {

    private $table = 'permissions';
    public function up()
    {

      $data = [
          [
            'function_name' => 'list of Active Visits',
            'function_description' => 'list of Active visits',
            'slugs' => 'list-of-active-visits',
            'name_on_class' => 'index',
            'page_title' => 'list of active visits',
            'module_id' => '5',
            'link_icon' => '',
            'order' => '1',
            'table_name' => 'visits',
            'func_action' => 'link',
            'func_type' => 1,
            'allowed_roles' => "[1,3]",
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
