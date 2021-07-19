<?php namespace App\Database\Migrations;

class CreateLogs extends \CodeIgniter\Database\Migration {

    private $table = 'logs';

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
        'activity' => [
          'type' => 'LONGTEXT',
          'constraint' => ''
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
    }

    public function down()
    {
      $db      = \Config\Database::connect();
      $builder = $db->table($this->table);
      $db->simpleQuery('DELETE FROM '.$this->table);
      $this->forge->dropTable($this->table);
    }
}
