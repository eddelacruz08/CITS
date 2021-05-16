<?php namespace App\Database\Migrations;

class CreateModules extends \CodeIgniter\Database\Migration {

        private $table = 'modules';
        public function up()
        {
                $this->forge->addField([
                        'id'          => [
                                'type'           => 'INT',
                                'unsigned'       => TRUE,
                                'auto_increment' => TRUE
                        ],

                        'module_name'       => [
                                'type'           => 'VARCHAR',
                                'constraint'     => '250',
                        ],
                        'module_type'       => [
                                'type'        => 'INT',
                        ],
                        'module_description'       => [
                                'type'           => 'TEXT',
                        ],

                        'module_icon'       => [
                                'type'           => 'TEXT',
                        ],

                        'order'       => [
                                'type'           => 'INT'
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
                      'module_name' => 'user management',
                      'module_type' => 1,
                      'module_description' => 'user management',
                      'module_icon' => '<i class="fas fa-users-cog"></i>',
                      'order' => 1,
                      'status' => 'a',
                      'created_date' => date('Y-m-d H:i:s')
                  ],
                  [
                    'module_name' => 'maintenances',
                    'module_type' => 1,
                    'module_description' => 'maintenances',
                    'module_icon' => '<i class="fas fa-cogs"></i>',
                    'order' => 2,
                    'status' => 'a',
                    'created_date' => date('Y-m-d H:i:s')
                  ],
                  [
                    'module_name' => 'dashboard',
                    'module_type' => 2,
                    'module_description' => 'dashboard',
                    'module_icon' => '<i class="fas fa-tachometer-alt"></i>',
                    'order' => 3,
                    'status' => 'a',
                    'created_date' => date('Y-m-d H:i:s')
                  ],
                  [
                      'module_name' => 'guests',
                      'module_type' => 2,
                      'module_description' => 'guests',
                      'module_icon' => '<i class="fas fa-id-card"></i>',
                      'order' => 4,
                      'status' => 'a',
                      'created_date' => date('Y-m-d H:i:s')
                  ],
                  [
                      'module_name' => 'visits',
                      'module_type' => 2,
                      'module_description' => 'visits',
                      'module_icon' => '<i class="fas fa-clipboard-check"></i>',
                      'order' => 5,
                      'status' => 'a',
                      'created_date' => date('Y-m-d H:i:s')
                  ],
                  [
                      'module_name' => 'profile',
                      'module_type' => 2,
                      'module_description' => 'profile',
                      'module_icon' => '<i class="fas fa-address-card"></i>',
                      'order' => 6,
                      'status' => 'a',
                      'created_date' => date('Y-m-d H:i:s')
                  ],
                  [
                      'module_name' => 'health declaration',
                      'module_type' => 2,
                      'module_description' => 'health declaration',
                      'module_icon' => '<i class="fas fa-clipboard"></i>',
                      'order' => 7,
                      'status' => 'a',
                      'created_date' => date('Y-m-d H:i:s')
                  ],
                  [
                      'module_name' => 'scan',
                      'module_type' => 2,
                      'module_description' => 'scan',
                      'module_icon' => '<i class="fas fa-qrcode"></i>',
                      'order' => 8,
                      'status' => 'a',
                      'created_date' => date('Y-m-d H:i:s')
                  ],
                  [
                      'module_name' => 'guest assessment',
                      'module_type' => 2,
                      'module_description' => 'guest assessment',
                      'module_icon' => '<i class="fas fa-clipboard"></i>',
                      'order' => 9,
                      'status' => 'a',
                      'created_date' => date('Y-m-d H:i:s')
                  ],
                  // [
                  //     'module_name' => 'departments',
                  //     'module_type' => 2,
                  //     'module_description' => 'departments',
                  //     'module_icon' => '<i class="fas fa-building"></i>',
                  //     'order' => 5,
                  //     'status' => 'a',
                  //     'created_at' => date('Y-m-d H:i:s')
                  // ],

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
