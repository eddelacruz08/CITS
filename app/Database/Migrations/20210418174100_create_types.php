<?php namespace App\Database\Migrations;

class CreateTypes extends \CodeIgniter\Database\Migration {

    private $table = 'types';

    public function up()
    {
      $this->forge->addField([
        'id' => [
          'type'  => 'BIGINT',
          'constraint'  => 5,
          'unsigned'  => TRUE,
          'auto_increment' => TRUE
        ],
        'user_id' => [
          'type' => 'BIGINT',
          'comment' => 'The user who created the information'
        ],
        'guest_type' => [
          'type' => 'VARCHAR',
          'constraint' => '255'
        ],
        'status' => [
          'type' => 'CHAR',
          'constraint' => '1',
        ],
        'created_date' => [
          'type' => 'DATETIME',
          'comment' => 'Date of creation',
        ],
        'updated_date' => [
          'type' => 'DATETIME',
          'null' => true,
          'default' => null,
          'comment' => 'Date last updated',
        ],
        'deleted_date' => [
          'type' => 'DATETIME',
          'null' => true,
          'default' => null,
          'comment' => 'Date of soft deletion',
        ]
      ]);

      $this->forge->addKey('id', TRUE);
      $this->forge->createTable($this->table);

      $data = [
        [
          'user_id' => '0',
          'guest_type' => 'Employee',
          'status' => 'a',
          'created_date' => date('y-m-d H:i:s')
        ],
        [
          'user_id' => '0',
          'guest_type' => 'Faculty',
          'status' => 'a',
          'created_date' => date('y-m-d H:i:s')
        ],
        [
          'user_id' => '0',
          'guest_type' => 'Student',
          'status' => 'a',
          'created_date' => date('y-m-d H:i:s')
        ],
        [
          'user_id' => '0',
          'guest_type' => 'Visitor',
          'status' => 'a',
          'created_date' => date('y-m-d H:i:s')
        ],
      ];

      $db      = \Config\Database::connect();
      $builder = $db->table($this->table);
      $builder->insertBatch($data);
    }

    public function down()
    {
      $db      = \Config\Database::connect();
      $builder = $db->table($this->table);
      $db->simpleQuery('DELETE FROM '.$this->table);
      $this->forge->dropTable($this->table);
    }
}
