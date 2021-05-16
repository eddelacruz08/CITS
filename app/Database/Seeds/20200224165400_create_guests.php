<?php namespace App\Database\Migrations;

class CreateGuests extends \CodeIgniter\Database\Migration {

    private $table = 'guests';

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
          'comment' => 'The user who created the patient information'
        ],
        'user_type_id' => [
          'type' => 'CHAR',
          'constraint' => '1',
        ],
        'first_name' => [
          'type' => 'VARCHAR',
          'constraint' => '255'
        ],
        'middle_name' => [
          'type' => 'VARCHAR',
          'constraint' => '255'
        ],
        'last_name' => [
          'type' => 'VARCHAR',
          'constraint' => '255'
        ],
        'ext_name_id' => [
          'type' => 'VARCHAR',
          'constraint' => '255'
        ],
        'birthdate' => [
          'type' => 'DATE'
        ],
        'gender_id' => [
          'type' => 'CHAR',
          'constraint' => '1'
        ],
        'cellphone_no' => [
          'type' => 'VARCHAR',
          'constraint' => '255'
        ],
        'landline_no' => [
          'type' => 'VARCHAR',
          'constraint' => '255'
        ],
        'email' => [
          'type' => 'VARCHAR',
          'constraint' => '255'
        ],
        'address' => [
          'type' => 'VARCHAR',
          'constraint' => '255'
        ],
        'city_id' => [
          'type' => 'VARCHAR',
          'constraint' => '255'
        ],
        'province_id' => [
          'type' => 'VARCHAR',
          'constraint' => '255'
        ],
        'postal' => [
          'type' => 'VARCHAR',
          'constraint' => '255'
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

      // $data = [
      //   [
      //     'user_id' => '0',
      //     'user_type' => 's',
      //     'first_name' => 'Willson',
      //     'middle_name' => 'M',
      //     'last_name' => 'Dela Cruz',
      //     'ext_name' => 'Jr',
      //     'birthdate' => date('Y-m-d H:i:s', strtotime('1999-11-22')),
      //     'gender' => 'm',
      //     'cellphone_no' => '09673104255',
      //     'landline_no' => '673104255',
      //     'email' => 'rhingmakz21@gmail.com',
      //     'address' => 'Blk 161 Lot 6 Central Bicutan',
      //     'city' => 'Taguig City',
      //     'province' => 'Metro Manila',
      //     'postal' => '1633',
      //     'status' => 'a',
      //     'date' => date('y-m-d'),
      //     'created_at' => date('y-m-d H:i:s')
      //   ],
      //   [
      //     'user_id' => '0',
      //     'user_type' => 'e',
      //     'first_name' => 'Edmon',
      //     'middle_name' => 'M',
      //     'last_name' => 'Dela Cruz',
      //     'ext_name' => 'Jr',
      //     'birthdate' => date('Y-m-d H:i:s', strtotime('1999-11-22')),
      //     'gender' => 'm',
      //     'cellphone_no' => '09673104255',
      //     'landline_no' => '673104255',
      //     'email' => 'edmondelacruz12@gmail.com',
      //     'address' => 'Blk 161 Lot 6 Central Bicutan',
      //     'city' => 'Taguig City',
      //     'province' => 'Metro Manila',
      //     'postal' => '1633',
      //     'status' => 'a',
      //     'date' => date('y-m-d'),
      //     'created_at' => date('y-m-d H:i:s')
      //   ],
      //   [
      //     'user_id' => '0',
      //     'user_type' => 'f',
      //     'first_name' => 'Edgardo',
      //     'middle_name' => 'M',
      //     'last_name' => 'Dela Cruz',
      //     'ext_name' => 'Jr',
      //     'birthdate' => date('Y-m-d H:i:s', strtotime('1999-11-22')),
      //     'gender' => 'm',
      //     'cellphone_no' => '09673104255',
      //     'landline_no' => '673104255',
      //     'email' => 'edgardo12@gmail.com',
      //     'address' => 'Blk 161 Lot 6 Central Bicutan',
      //     'city' => 'Taguig City',
      //     'province' => 'Metro Manila',
      //     'postal' => '1633',
      //     'status' => 'a',
      //     'date' => date('y-m-d'),
      //     'created_at' => date('y-m-d H:i:s')
      //   ],
      //
      // ];

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
