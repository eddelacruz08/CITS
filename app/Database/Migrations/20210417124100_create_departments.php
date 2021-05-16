<?php namespace App\Database\Migrations;

class CreateDepartments extends \CodeIgniter\Database\Migration {

    private $table = 'departments';

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
        'department' => [
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
          'department' => 'Accounting/Cashier\'s Office',
          'status' => 'a',
          'created_date' => date('y-m-d H:i:s')
        ],
        [
          'user_id' => '0',
          'department' => 'Accounting Laboratory',
          'status' => 'a',
          'created_date' => date('y-m-d H:i:s')
        ],
        [
          'user_id' => '0',
          'department' => 'Allumni Hall',
          'status' => 'a',
          'created_date' => date('y-m-d H:i:s')
        ],
        [
          'user_id' => '0',
          'department' => 'Administrative Office',
          'status' => 'a',
          'created_date' => date('y-m-d H:i:s')
        ],
        [
          'user_id' => '0',
          'department' => 'Audio-Visual Room',
          'status' => 'a',
          'created_date' => date('y-m-d H:i:s')
        ],
        [
          'user_id' => '0',
          'department' => 'Auditorium',
          'status' => 'a',
          'created_date' => date('y-m-d H:i:s')
        ],
        [
          'user_id' => '0',
          'department' => 'Building A',
          'status' => 'a',
          'created_date' => date('y-m-d H:i:s')
        ],
        [
          'user_id' => '0',
          'department' => 'Building B',
          'status' => 'a',
          'created_date' => date('y-m-d H:i:s')
        ],
        [
          'user_id' => '0',
          'department' => 'Canteen',
          'status' => 'a',
          'created_date' => date('y-m-d H:i:s')
        ],
        [
          'user_id' => '0',
          'department' => 'Cayetano Building',
          'status' => 'a',
          'created_date' => date('y-m-d H:i:s')
        ],
        [
          'user_id' => '0',
          'department' => 'Central Student Council Room',
          'status' => 'a',
          'created_date' => date('y-m-d H:i:s')
        ],
        [
          'user_id' => '0',
          'department' => 'CHEMISTRY-PHYSICAL Laboratory',
          'status' => 'a',
          'created_date' => date('y-m-d H:i:s')
        ],
        [
          'user_id' => '0',
          'department' => 'Chronicler\'s Room',
          'status' => 'a',
          'created_date' => date('y-m-d H:i:s')
        ],
        [
          'user_id' => '0',
          'department' => 'Classroom',
          'status' => 'a',
          'created_date' => date('y-m-d H:i:s')
        ],
        [
          'user_id' => '0',
          'department' => 'Comfort Rooms',
          'status' => 'a',
          'created_date' => date('y-m-d H:i:s')
        ],
        [
          'user_id' => '0',
          'department' => 'Computer Laboratory (Aboitiz Lab)',
          'status' => 'a',
          'created_date' => date('y-m-d H:i:s')
        ],
        [
          'user_id' => '0',
          'department' => 'Computer Laboratory (DOST Lab)',
          'status' => 'a',
          'created_date' => date('y-m-d H:i:s')
        ],
        [
          'user_id' => '0',
          'department' => 'Conference Room',
          'status' => 'a',
          'created_date' => date('y-m-d H:i:s')
        ],
        [
          'user_id' => '0',
          'department' => 'Dental Clinic',
          'status' => 'a',
          'created_date' => date('y-m-d H:i:s')
        ],
        [
          'user_id' => '0',
          'department' => 'DMET Laboratory',
          'status' => 'a',
          'created_date' => date('y-m-d H:i:s')
        ],
        [
          'user_id' => '0',
          'department' => 'Director\'s Office',
          'status' => 'a',
          'created_date' => date('y-m-d H:i:s')
        ],
        [
          'user_id' => '0',
          'department' => 'Drafting Room',
          'status' => 'a',
          'created_date' => date('y-m-d H:i:s')
        ],
        [
          'user_id' => '0',
          'department' => 'Engineering Building',
          'status' => 'a',
          'created_date' => date('y-m-d H:i:s')
        ],
        [
          'user_id' => '0',
          'department' => 'FASTECH Laboratory (ECE Laboratory)',
          'status' => 'a',
          'created_date' => date('y-m-d H:i:s')
        ],
        [
          'user_id' => '0',
          'department' => 'Food Stalls',
          'status' => 'a',
          'created_date' => date('y-m-d H:i:s')
        ],
        [
          'user_id' => '0',
          'department' => 'Guidance Office',
          'status' => 'a',
          'created_date' => date('y-m-d H:i:s')
        ],
        [
          'user_id' => '0',
          'department' => 'Gymnasium',
          'status' => 'a',
          'created_date' => date('y-m-d H:i:s')
        ],
        [
          'user_id' => '0',
          'department' => 'Head of Academic Programs\' Office',
          'status' => 'a',
          'created_date' => date('y-m-d H:i:s')
        ],
        [
          'user_id' => '0',
          'department' => 'Interfaith Chapel',
          'status' => 'a',
          'created_date' => date('y-m-d H:i:s')
        ],
        [
          'user_id' => '0',
          'department' => 'Library',
          'status' => 'a',
          'created_date' => date('y-m-d H:i:s')
        ],
        [
          'user_id' => '0',
          'department' => 'Medical Clinic',
          'status' => 'a',
          'created_date' => date('y-m-d H:i:s')
        ],
        [
          'user_id' => '0',
          'department' => 'Multimedia Room',
          'status' => 'a',
          'created_date' => date('y-m-d H:i:s')
        ],
        [
          'user_id' => '0',
          'department' => 'M.E. Laboratory',
          'status' => 'a',
          'created_date' => date('y-m-d H:i:s')
        ],
        [
          'user_id' => '0',
          'department' => 'Organizational Room',
          'status' => 'a',
          'created_date' => date('y-m-d H:i:s')
        ],
        [
          'user_id' => '0',
          'department' => 'Outdoor Basketball Court',
          'status' => 'a',
          'created_date' => date('y-m-d H:i:s')
        ],
        [
          'user_id' => '0',
          'department' => 'Quadrangle',
          'status' => 'a',
          'created_date' => date('y-m-d H:i:s')
        ],
        [
          'user_id' => '0',
          'department' => 'Registrar\'s Office',
          'status' => 'a',
          'created_date' => date('y-m-d H:i:s')
        ],
        [
          'user_id' => '0',
          'department' => 'Security Office',
          'status' => 'a',
          'created_date' => date('y-m-d H:i:s')
        ],
        [
          'user_id' => '0',
          'department' => 'Speech Laboratory',
          'status' => 'a',
          'created_date' => date('y-m-d H:i:s')
        ],
        [
          'user_id' => '0',
          'department' => 'Student Services Office',
          'status' => 'a',
          'created_date' => date('y-m-d H:i:s')
        ],
        [
          'user_id' => '0',
          'department' => 'Typing Room',
          'status' => 'a',
          'created_date' => date('y-m-d H:i:s')
        ],
        [
          'user_id' => '0',
          'department' => 'Waiting Area',
          'status' => 'a',
          'created_date' => date('y-m-d H:i:s')
        ],
        [
          'user_id' => '0',
          'department' => 'Zonta Park',
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
