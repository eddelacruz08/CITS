<?php namespace App\Database\Migrations;

class CreateRole extends \CodeIgniter\Database\Migration {

        private $table = 'roles';
        public function up()
        {
                $this->forge->addField([
                        'id'          => [
                                'type'           => 'BIGINT',
                                'constraint'     => '20',
                                'unsigned'       => TRUE,
                                'auto_increment' => TRUE
                        ],
                        'role_name'       => [
                                'type'           => 'VARCHAR',
                                'constraint'     => '255',
                        ],
                        'function_id'       => [
                                'type'           => 'BIGINT',
                                'constraint'     => '20',
                        ],
                        'description' => [
                                'type'           => 'TEXT',
                                'null'           => TRUE,
                        ],

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
                        'role_name' => 'administrator',
                        'function_id' => 44,
                        'description' => 'System Administrator',
                        'status' => 'a',
                        'created_date' => date('Y-m-d H:i:s')
                    ],
                    [
                        'role_name' => 'user',
                        'function_id' => 45,
                        'description' => 'User Related Role',
                        'status' => 'a',
                        'created_date' => date('Y-m-d H:i:s')
                    ],
                    [
                        'role_name' => 'nurse',
                        'function_id' => 13,
                        'description' => 'Nurse Related Role',
                        'status' => 'a',
                        'created_date' => date('Y-m-d H:i:s')
                    ],
                    [
                        'role_name' => 'guard',
                        'function_id' => 14,
                        'description' => 'Guard Scanning',
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
