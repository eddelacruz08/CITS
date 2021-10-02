<?php namespace App\Database\Migrations;

class CreateProvinces extends \CodeIgniter\Database\Migration {

    private $table = 'provinces';

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
        'province' => [
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
          'province' => 'Abra',
          'status' => 'a',
          'created_date' => date('y-m-d H:i:s')
        ],
        [
          'user_id' => '0',
          'province' => 'Agusan Del Norte',
          'status' => 'a',
          'created_date' => date('y-m-d H:i:s')
        ],
        [
          'user_id' => '0',
          'province' => 'Agusan Del Sur',
          'status' => 'a',
          'created_date' => date('y-m-d H:i:s')
        ],
        [
          'user_id' => '0',
          'province' => 'Aklan',
          'status' => 'a',
          'created_date' => date('y-m-d H:i:s')
        ],
        [
          'user_id' => '0',
          'province' => 'Albay',
          'status' => 'a',
          'created_date' => date('y-m-d H:i:s')
        ],
        [
          'user_id' => '0',
          'province' => 'Antique',
          'status' => 'a',
          'created_date' => date('y-m-d H:i:s')
        ],
        [
          'user_id' => '0',
          'province' => 'Apayao',
          'status' => 'a',
          'created_date' => date('y-m-d H:i:s')
        ],
        [
          'user_id' => '0',
          'province' => 'Aurora',
          'status' => 'a',
          'created_date' => date('y-m-d H:i:s')
        ],
        [
          'user_id' => '0',
          'province' => 'Basilan',
          'status' => 'a',
          'created_date' => date('y-m-d H:i:s')
        ],
        [
          'user_id' => '0',
          'province' => 'Bataan',
          'status' => 'a',
          'created_date' => date('y-m-d H:i:s')
        ],
        [
          'user_id' => '0',
          'province' => 'Batanes',
          'status' => 'a',
          'created_date' => date('y-m-d H:i:s')
        ],
        [
          'user_id' => '0',
          'province' => 'Batangas',
          'status' => 'a',
          'created_date' => date('y-m-d H:i:s')
        ],
        [
          'user_id' => '0',
          'province' => 'Benguet',
          'status' => 'a',
          'created_date' => date('y-m-d H:i:s')
        ],
        [
          'user_id' => '0',
          'province' => 'Biliran',
          'status' => 'a',
          'created_date' => date('y-m-d H:i:s')
        ],
        [
          'user_id' => '0',
          'province' => 'Bohol',
          'status' => 'a',
          'created_date' => date('y-m-d H:i:s')
        ],
        [
          'user_id' => '0',
          'province' => 'Bukidnon',
          'status' => 'a',
          'created_date' => date('y-m-d H:i:s')
        ],
        [
          'user_id' => '0',
          'province' => 'Bulacan',
          'status' => 'a',
          'created_date' => date('y-m-d H:i:s')
        ],
        [
          'user_id' => '0',
          'province' => 'Cagayan',
          'status' => 'a',
          'created_date' => date('y-m-d H:i:s')
        ],
        [
          'user_id' => '0',
          'province' => 'Camarines Norte',
          'status' => 'a',
          'created_date' => date('y-m-d H:i:s')
        ],
        [
          'user_id' => '0',
          'province' => 'Camarines Sur',
          'status' => 'a',
          'created_date' => date('y-m-d H:i:s')
        ],
        [
          'user_id' => '0',
          'province' => 'Camiguin',
          'status' => 'a',
          'created_date' => date('y-m-d H:i:s')
        ],
        [
          'user_id' => '0',
          'province' => 'Capiz',
          'status' => 'a',
          'created_date' => date('y-m-d H:i:s')
        ],
        [
          'user_id' => '0',
          'province' => 'Catanduanes',
          'status' => 'a',
          'created_date' => date('y-m-d H:i:s')
        ],
        [
          'user_id' => '0',
          'province' => 'Cavite',
          'status' => 'a',
          'created_date' => date('y-m-d H:i:s')
        ],
        [
          'user_id' => '0',
          'province' => 'Cebu',
          'status' => 'a',
          'created_date' => date('y-m-d H:i:s')
        ],
        [
          'user_id' => '0',
          'province' => 'Compostella Valley',
          'status' => 'a',
          'created_date' => date('y-m-d H:i:s')
        ],
        [
          'user_id' => '0',
          'province' => 'Cotabato',
          'status' => 'a',
          'created_date' => date('y-m-d H:i:s')
        ],
        [
          'user_id' => '0',
          'province' => 'Davao Del Norte',
          'status' => 'a',
          'created_date' => date('y-m-d H:i:s')
        ],
        [
          'user_id' => '0',
          'province' => 'Davao Del Sur',
          'status' => 'a',
          'created_date' => date('y-m-d H:i:s')
        ],
        [
          'user_id' => '0',
          'province' => 'Davao Occidental',
          'status' => 'a',
          'created_date' => date('y-m-d H:i:s')
        ],
        [
          'user_id' => '0',
          'province' => 'Davao Oriental',
          'status' => 'a',
          'created_date' => date('y-m-d H:i:s')
        ],
        [
          'user_id' => '0',
          'province' => 'Dinagat Islands',
          'status' => 'a',
          'created_date' => date('y-m-d H:i:s')
        ],
        [
          'user_id' => '0',
          'province' => 'Eastern Samar',
          'status' => 'a',
          'created_date' => date('y-m-d H:i:s')
        ],
        [
          'user_id' => '0',
          'province' => 'Guimaras',
          'status' => 'a',
          'created_date' => date('y-m-d H:i:s')
        ],
        [
          'user_id' => '0',
          'province' => 'Ifugao',
          'status' => 'a',
          'created_date' => date('y-m-d H:i:s')
        ],
        [
          'user_id' => '0',
          'province' => 'Ilocos Norte',
          'status' => 'a',
          'created_date' => date('y-m-d H:i:s')
        ],
        [
          'user_id' => '0',
          'province' => 'Ilocos Sur',
          'status' => 'a',
          'created_date' => date('y-m-d H:i:s')
        ],
        [
          'user_id' => '0',
          'province' => 'Iloilo',
          'status' => 'a',
          'created_date' => date('y-m-d H:i:s')
        ],
        [
          'user_id' => '0',
          'province' => 'Isabela',
          'status' => 'a',
          'created_date' => date('y-m-d H:i:s')
        ],
        [
          'user_id' => '0',
          'province' => 'Kalinga',
          'status' => 'a',
          'created_date' => date('y-m-d H:i:s')
        ],
        [
          'user_id' => '0',
          'province' => 'La Union',
          'status' => 'a',
          'created_date' => date('y-m-d H:i:s')
        ],
        [
          'user_id' => '0',
          'province' => 'Laguna',
          'status' => 'a',
          'created_date' => date('y-m-d H:i:s')
        ],
        [
          'user_id' => '0',
          'province' => 'Lanao Del Norte',
          'status' => 'a',
          'created_date' => date('y-m-d H:i:s')
        ],
        [
          'user_id' => '0',
          'province' => 'Lanao Del Sur',
          'status' => 'a',
          'created_date' => date('y-m-d H:i:s')
        ],
        [
          'user_id' => '0',
          'province' => 'Leyte',
          'status' => 'a',
          'created_date' => date('y-m-d H:i:s')
        ],
        [
          'user_id' => '0',
          'province' => 'Maguindanao',
          'status' => 'a',
          'created_date' => date('y-m-d H:i:s')
        ],
        [
          'user_id' => '0',
          'province' => 'Marinduque',
          'status' => 'a',
          'created_date' => date('y-m-d H:i:s')
        ],
        [
          'user_id' => '0',
          'province' => 'Masbate',
          'status' => 'a',
          'created_date' => date('y-m-d H:i:s')
        ],
        [
          'user_id' => '0',
          'province' => 'Misamis Occidental',
          'status' => 'a',
          'created_date' => date('y-m-d H:i:s')
        ],
        [
          'user_id' => '0',
          'province' => 'Misamis Oriental',
          'status' => 'a',
          'created_date' => date('y-m-d H:i:s')
        ],
        [
          'user_id' => '0',
          'province' => 'Mountain Province',
          'status' => 'a',
          'created_date' => date('y-m-d H:i:s')
        ],
        [
          'user_id' => '0',
          'province' => 'Negros Occidental',
          'status' => 'a',
          'created_date' => date('y-m-d H:i:s')
        ],
        [
          'user_id' => '0',
          'province' => 'Negros Oriental',
          'status' => 'a',
          'created_date' => date('y-m-d H:i:s')
        ],
        [
          'user_id' => '0',
          'province' => 'Northern Samar',
          'status' => 'a',
          'created_date' => date('y-m-d H:i:s')
        ],
        [
          'user_id' => '0',
          'province' => 'Nueva Ecija',
          'status' => 'a',
          'created_date' => date('y-m-d H:i:s')
        ],
        [
          'user_id' => '0',
          'province' => 'Nueva Vizcaya',
          'status' => 'a',
          'created_date' => date('y-m-d H:i:s')
        ],
        [
          'user_id' => '0',
          'province' => 'Occidental Mindoro',
          'status' => 'a',
          'created_date' => date('y-m-d H:i:s')
        ],
        [
          'user_id' => '0',
          'province' => 'Oriental Mindoro',
          'status' => 'a',
          'created_date' => date('y-m-d H:i:s')
        ],
        [
          'user_id' => '0',
          'province' => 'Palawan',
          'status' => 'a',
          'created_date' => date('y-m-d H:i:s')
        ],
        [
          'user_id' => '0',
          'province' => 'Pampanga',
          'status' => 'a',
          'created_date' => date('y-m-d H:i:s')
        ],
        [
          'user_id' => '0',
          'province' => 'Pangasinan',
          'status' => 'a',
          'created_date' => date('y-m-d H:i:s')
        ],
        [
          'user_id' => '0',
          'province' => 'Quezon',
          'status' => 'a',
          'created_date' => date('y-m-d H:i:s')
        ],
        [
          'user_id' => '0',
          'province' => 'Quirino',
          'status' => 'a',
          'created_date' => date('y-m-d H:i:s')
        ],
        [
          'user_id' => '0',
          'province' => 'Rizal',
          'status' => 'a',
          'created_date' => date('y-m-d H:i:s')
        ],
        [
          'user_id' => '0',
          'province' => 'Romblon',
          'status' => 'a',
          'created_date' => date('y-m-d H:i:s')
        ],
        [
          'user_id' => '0',
          'province' => 'Samar',
          'status' => 'a',
          'created_date' => date('y-m-d H:i:s')
        ],
        [
          'user_id' => '0',
          'province' => 'Sarangani',
          'status' => 'a',
          'created_date' => date('y-m-d H:i:s')
        ],
        [
          'user_id' => '0',
          'province' => 'Siquijor',
          'status' => 'a',
          'created_date' => date('y-m-d H:i:s')
        ],
        [
          'user_id' => '0',
          'province' => 'Sorsogon',
          'status' => 'a',
          'created_date' => date('y-m-d H:i:s')
        ],
        [
          'user_id' => '0',
          'province' => 'South Cotabato',
          'status' => 'a',
          'created_date' => date('y-m-d H:i:s')
        ],
        [
          'user_id' => '0',
          'province' => 'Southern Leyte',
          'status' => 'a',
          'created_date' => date('y-m-d H:i:s')
        ],
        [
          'user_id' => '0',
          'province' => 'Sultan Kudarat',
          'status' => 'a',
          'created_date' => date('y-m-d H:i:s')
        ],
        [
          'user_id' => '0',
          'province' => 'Sulu',
          'status' => 'a',
          'created_date' => date('y-m-d H:i:s')
        ],
        [
          'user_id' => '0',
          'province' => 'Surigao Del Norte',
          'status' => 'a',
          'created_date' => date('y-m-d H:i:s')
        ],
        [
          'user_id' => '0',
          'province' => 'Surigao Del Sur',
          'status' => 'a',
          'created_date' => date('y-m-d H:i:s')
        ],
        [
          'user_id' => '0',
          'province' => 'Tarlac',
          'status' => 'a',
          'created_date' => date('y-m-d H:i:s')
        ],
        [
          'user_id' => '0',
          'province' => 'Tawi-Tawi',
          'status' => 'a',
          'created_date' => date('y-m-d H:i:s')
        ],
        [
          'user_id' => '0',
          'province' => 'Zambales',
          'status' => 'a',
          'created_date' => date('y-m-d H:i:s')
        ],
        [
          'user_id' => '0',
          'province' => 'Zamboanga Del Norte',
          'status' => 'a',
          'created_date' => date('y-m-d H:i:s')
        ],
        [
          'user_id' => '0',
          'province' => 'Zamboanga Del Sur',
          'status' => 'a',
          'created_date' => date('y-m-d H:i:s')
        ],
        [
          'user_id' => '0',
          'province' => 'Zamboanga Sibugay',
          'status' => 'a',
          'created_date' => date('y-m-d H:i:s')
        ],
        [
          'user_id' => '0',
          'province' => 'Metro Manila',
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
