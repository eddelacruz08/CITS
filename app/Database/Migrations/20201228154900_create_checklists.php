<?php namespace App\Database\Migrations;

class CreateChecklists extends \CodeIgniter\Database\Migration {

    private $table = 'checklists';

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
          'comment' => ''
        ],
        'temperature' => [
        'type'           => 'VARCHAR',
        'constraint'        => '25',
        ],
        'question_id' => [
        'type'           => 'VARCHAR',
        'constraint'        => '255',
        ],
        'status_defined' => [
        'type'           => 'VARCHAR',
        'constraint'        => '25',
        ],
        'status' => [
          'type' => 'CHAR',
          'constraint' => '1',
          'default' => 'a'
        ],
        'date DATE NOT NULL DEFAULT CURRENT_TIMESTAMP',
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

    }

    public function down()
    {
      $db      = \Config\Database::connect();
      $builder = $db->table($this->table);
      $db->simpleQuery('DELETE FROM '.$this->table);
      $this->forge->dropTable($this->table);
    }
}
