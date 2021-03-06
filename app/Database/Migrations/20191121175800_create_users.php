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
                        'username' => 'unitedcodersdcsnl',
                        'email' => 'unitedcodersdcsnl@gmail.com',
                        'password' => password_hash('unitedcodersdcsnl', PASSWORD_DEFAULT),
                        'role_id' => 1,
                        'token' => md5(str_shuffle('abcdefghijklmnopqrstuvwxyz'.time())),
                        'status' => 'a',
                        'created_date' => date('Y-m-d H:i:s')
                    ],
                    [
                        'lastname' => 'nurse',
                        'middlename' => 'nurse',
                        'firstname' => 'nurse',
                        'username' => 'nurse',
                        'email' => 'nurse123@gmail.com',
                        'password' => password_hash('nursenurse123', PASSWORD_DEFAULT),
                        'role_id' => 3,
                        'token' => md5(str_shuffle('abcdefghijklmnopqrstuvwxyz'.time())),
                        'status' => 'a',
                        'created_date' => date('Y-m-d H:i:s')
                    ],
                    [
                        'lastname' => 'guard',
                        'middlename' => 'guard',
                        'firstname' => 'guard',
                        'username' => 'guard',
                        'email' => 'guard123@gmail.com',
                        'password' => password_hash('guardguard123', PASSWORD_DEFAULT),
                        'role_id' => 4,
                        'token' => md5(str_shuffle('abcdefghijklmnopqrstuvwxyz'.time())),
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
          $db = \Config\Database::connect();
          $builder = $db->table($this->table);
          $db->simpleQuery('DELETE FROM '.$this->table);
          $this->forge->dropTable($this->table);
        }
}
