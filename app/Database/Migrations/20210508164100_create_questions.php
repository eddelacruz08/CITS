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
        'q_one' => [
          'type' => 'LONGTEXT',
          'constraint' => ''
        ],
        'q_two' => [
          'type' => 'LONGTEXT',
          'constraint' => ''
        ],
        'q_three' => [
          'type' => 'LONGTEXT',
          'constraint' => ''
        ],
        'q_four' => [
          'type' => 'LONGTEXT',
          'constraint' => ''
        ],
        'q_five' => [
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

      $data = [
        [
          'user_id' => '1',
          
          'q_one' => 'Are you Experiencing (a. Fever Temperature greater than 37.5 degrees Celcius, Flu-like symptoms: cough & colds, sore throat, runny nose, Shortness of breath, loss of smell and taste, Diarrhea, Headache, Joint/Muscle pain)?',
          
          'q_two' => 'Have you been tested for COVID-19 for the last 14 days?',
          
          'q_three' => 'Have you been in close contact or staying in the same environment with COVID positive, first/second generation?',
           
          'q_four' => 'Have you been in close contact or staying in the same environment with a person with flu-like symptoms (fever, cough or cold, sore throat, runny nose) symptoms in the past 14 days?',
          
          'q_five' => 'Do you have any travel history abroad or in places with a high incidence of COVID-19 in the last 14 days?',
         
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
