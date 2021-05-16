<?php namespace App\Database\Migrations;

class CreateUsers extends \CodeIgniter\Database\Migration {
        private $table = 'users';
        public function up()
        {
                $this->forge->addField([
                        'id'          => [
                                'type'           => 'BIGINT',
                                'unsigned'       => TRUE,
                                'auto_increment' => TRUE
                        ],
                        'lastname'       => [
                                'type'           => 'VARCHAR',
                                'constraint'     => '50',
                        ],
                        'middlename' => [
                          'type' => 'VARCHAR',
                          'constraint' => '255'
                        ],
                        'firstname'       => [
                                'type'           => 'VARCHAR',
                                'constraint'     => '50',
                        ],
                        'ext_name_id' => [
                          'type' => 'VARCHAR',
                          'constraint' => '255'
                        ],
                        'username'       => [
                                'type'           => 'VARCHAR',
                                'constraint'     => '50',
                        ],
                        'email'       => [
                                'type'           => 'VARCHAR',
                                'constraint'     => '50',
                        ],
                        'password'       => [
                                'type'           => 'VARCHAR',
                                'constraint'     => '60',
                        ],
                        'birthdate'       => [
                                'type'           => 'DATE'
                        ],
                        'gender_id' => [
                          'type' => 'INT',
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
                        'address' => [
                          'type' => 'VARCHAR',
                          'constraint' => '255'
                        ],
                        'city_id' => [
                          'type' => 'INT',
                          'constraint' => '11'
                        ],
                        'province_id' => [
                          'type' => 'INT',
                          'constraint' => '11'
                        ],
                        'postal' => [
                          'type' => 'VARCHAR',
                          'constraint' => '255'
                        ],
                        'user_type_id' => [
                          'type' => 'INT',
                          'constraint' => '1',
                        ],
                        'role_id'       => [
                                'type'           => 'BIGINT',
                                'default'        => 2
                        ],
                        'token' => [
                          'type' => 'VARCHAR',
                          'constraint' => '32'
                        ],
                        'date DATE NOT NULL DEFAULT CURRENT_TIMESTAMP',
                        'status' => [
                                'type'           => 'CHAR',
                                'constraint'     => '1',
                                'default'        => 'a'
                        ],

                        'created_date' => [
                                'type'           => 'DATETIME',
                                'comment'        => 'Date of creation',
                        ],

                        'updated_date' => [
                                'type'           => 'DATETIME',
                                'null'           => true,
                                'default'        => null,
                                'comment'        => 'Date last updated',
                        ],
                        'deleted_date' => [
                                'type'           => 'DATETIME',
                                'null'           => true,
                                'default'        => null,
                                'comment'        => 'Date of soft deletion',
                        ]
                ]);
                $this->forge->addKey('id', TRUE);
                $this->forge->createTable($this->table);

                $data = [
                    [
                        'lastname' => 'coders',
                        'middlename' => 'coders',
                        'firstname' => 'united',
                        'ext_name_id' => '',
                        'username' => 'unitedcodersdcsnl',
                        'email' => 'unitedcodersdcsnl@gmail.com',
                        'password' => password_hash('unitedcodersdcsnl', PASSWORD_DEFAULT),
                        'birthdate' => date('Y-m-d H:i:s', strtotime('1999-11-22')),
                        'gender_id' => '2',
                        'cellphone_no' => '09673104255',
                        'landline_no' => '673104255',
                        'address' => 'Blk 161 Lot 6 Central Bicutan',
                        'city_id' => '1',
                        'province_id' => '3',
                        'postal' => '1633',
                        'user_type_id' => '3',
                        'role_id' => 1,
                        'token' => md5(str_shuffle('abcdefghijklmnopqrstuvwxyz'.time())),
                        // 'date' => date('y-m-d'),
                        'status' => 'a',
                        'created_date' => date('Y-m-d H:i:s')
                    ],
                    [
                        'lastname' => 'dela cruz',
                        'middlename' => 'madronio',
                        'firstname' => 'edmon',
                        'ext_name_id' => '',
                        'username' => 'eddelacruz12',
                        'email' => 'rhingmakz21@gmail.com',
                        'password' => password_hash('EDDelacruz12', PASSWORD_DEFAULT),
                        'birthdate' => date('Y-m-d H:i:s', strtotime('1999-11-22')),
                        'gender_id' => '1',
                        'cellphone_no' => '09673104253',
                        'landline_no' => '673104255',
                        'address' => 'Blk 161 Lot 6 Central Bicutan',
                        'city_id' => '5',
                        'province_id' => '13',
                        'postal' => '4206',
                        'user_type_id' => '3',
                        'role_id' => 2,
                        'token' => md5(str_shuffle('abcdefghijklmnopqrstuvwxyz'.time())),
                        // 'date' => date('y-m-d'),
                        'status' => 'a',
                        'created_date' => date('Y-m-d H:i:s')
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
