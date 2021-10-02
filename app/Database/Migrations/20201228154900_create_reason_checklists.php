<?php namespace App\Database\Migrations;

class CreateReasonChecklists extends \CodeIgniter\Database\Migration {

    private $table = 'reason_checklists';

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
        'r_q_one' => [
          'type' => 'VARCHAR',
          'constraint' => '255'
        ],
        'r_q_two' => [
          'type' => 'VARCHAR',
          'constraint' => '255'
        ],
        'r_q_three' => [
          'type' => 'VARCHAR',
          'constraint' => '255'
        ],
        'r_q_four' => [
          'type' => 'VARCHAR',
          'constraint' => '255'
        ],
        'r_q_five' => [
          'type' => 'VARCHAR',
          'constraint' => '255'
        ],
        'reason_id' => [
          'type' => 'INT',
          'constraint' => '11'
        ],
        'r_status_defined' => [
        'type'           => 'VARCHAR',
        'constraint'        => '25',
        'null' => true,
        'default' => null,
        ],
        'status' => [
          'type' => 'CHAR',
          'constraint' => '1',
          'default' => 'a'
        ],
        'date DATE NOT NULL DEFAULT CURRENT_TIMESTAMP',
        'r_token' => [
          'type' => 'VARCHAR',
          'constraint' => '32'
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

    }

    public function down()
    {
      $db      = \Config\Database::connect();
      $builder = $db->table($this->table);
      $db->simpleQuery('DELETE FROM '.$this->table);
      $this->forge->dropTable($this->table);
    }
}
