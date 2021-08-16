<?php namespace App\Database\Migrations;

class CreateGuidelines extends \CodeIgniter\Database\Migration {

    private $table = 'guidelines';

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
        'content' => [
          'type' => 'TEXT',
        ],
        'image' => [
          'type' => 'VARCHAR',
          'constraint' => '100',
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
          'user_id' => '1',
          'content' => 'Health Advisory: Tungkol sa Coronavirus',
          'image' => '1629017118_7c945a8be41cbfcbf867.jpg',
          'status' => 'a',
          'created_date' => date('y-m-d H:i:s')
        ],
        [
          'user_id' => '1',
          'content' => 'DOH Advisory: COVID-19',
          'image' => '1629017162_66202c6c80107b9ce954.jpg',
          'status' => 'a',
          'created_date' => date('y-m-d H:i:s')
        ],
        [
          'user_id' => '1',
          'content' => 'What should I do if I have COVID-19 symptoms?',
          'image' => '1629017353_eeaf915b97f691c44b0b.jpg',
          'status' => 'a',
          'created_date' => date('y-m-d H:i:s')
        ],
        [
          'user_id' => '1',
          'content' => 'One Hospital: Command Center (Covid-19 Response)',
          'image' => '1629017411_b157ce5e8260b42dca06.jpg',
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
