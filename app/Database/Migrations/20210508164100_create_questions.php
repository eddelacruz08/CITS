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
          
          'q_one' => 'Is your temperature greater than 37.5 degrees for the past 14 days?',
          
          'q_two' => 'Tested positive or presumptively positive with covid-19 (The new Coronavirus or SARS-COV2) or been identified as a potential carrier of the coronavirus for the past 14 days?',
          
          'q_three' => 'Experienced any symptoms commonly associated with covid-19  (Fever, Cough, Fatigue or Muscle Pain, Difficulty Breathing, Sore Throat, Lung Infections, Headache, Loss of Taste, or Diarrhea) for the past 14 days?',
           
          'q_four' => 'Been in any location/site declared as hazardous with and/or potentially infective with the new coronavirus by a recognized health and regulatory authority for the past 14 days?',
          
          'q_five' => 'Been in direct contact with or in the immediate vicinity of any person who tested positive with the new coronavirus or who was diagnosed as possibly being infected by the new coronavirus for the past 14 days?',
         
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
