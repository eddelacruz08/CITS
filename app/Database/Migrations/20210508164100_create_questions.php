<?php namespace App\Database\Migrations;

class CreateQuestions extends \CodeIgniter\Database\Migration {

    private $table = 'questions';

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
        'question' => [
          'type' => 'VARCHAR',
          'constraint' => '500'
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
        // [
        //   'user_id' => '1',
        //   'question' => 'Is your temperature above or more than 37.5 degrees?(Mas mataas ba ang iyong temperature sa 37.5?)',
        //   'status' => 'a',
        //   'created_date' => date('y-m-d H:i:s')
        // ],
        [
          'user_id' => '1',
          'question' => 'Are you experiencing cough and/or colds?(Ikaw ba ay nakakaranas ng ubo at/o sipon?)',
          'status' => 'a',
          'created_date' => date('y-m-d H:i:s')
        ],
        [
          'user_id' => '1',
          'question' => 'Are you experiencing body pains?(Ikaw ba ay nakakaranas ng pananakit ng katawan?)',
          'status' => 'a',
          'created_date' => date('y-m-d H:i:s')
        ],
        [
          'user_id' => '1',
          'question' => 'Are you experiencing sore throat?(Ikaw ba ay nakakaranas ng pananakit ng lalamunan/hirap lumunok?)',
          'status' => 'a',
          'created_date' => date('y-m-d H:i:s')
        ],
        [
          'user_id' => '1',
          'question' => 'Are you experiencing shortness of breath?(Ikaw ba ay nakakaranas ng hirap sa paghinga?)',
          'status' => 'a',
          'created_date' => date('y-m-d H:i:s')
        ],
        [
          'user_id' => '1',
          'question' => 'Are you experiencing diarrhea?(Ikaw ba ay nakakaranas ng pagtatae?)',
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
