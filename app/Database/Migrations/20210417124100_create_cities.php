<?php namespace App\Database\Migrations;

class CreateCities extends \CodeIgniter\Database\Migration {

    private $table = 'cities';

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
        'city' => [
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
            'city' => 'Alaminos',
            'status' => 'a',
            'created_date' => date('y-m-d H:i:s')
          ],
          [
            'user_id' => '0',
            'city' => 'Angeles',
            'status' => 'a',
            'created_date' => date('y-m-d H:i:s')
          ],
          [
            'user_id' => '0',
            'city' => 'Antipolo',
            'status' => 'a',
            'created_date' => date('y-m-d H:i:s')
          ],
          [
            'user_id' => '0',
            'city' => 'Bacolod',
            'status' => 'a',
            'created_date' => date('y-m-d H:i:s')
          ],
          [
            'user_id' => '0',
            'city' => 'Bacoor',
            'status' => 'a',
            'created_date' => date('y-m-d H:i:s')
          ],
          [
            'user_id' => '0',
            'city' => 'Bago',
            'status' => 'a',
            'created_date' => date('y-m-d H:i:s')
          ],
          [
            'user_id' => '0',
            'city' => 'Baguio',
            'status' => 'a',
            'created_date' => date('y-m-d H:i:s')
          ],
          [
            'user_id' => '0',
            'city' => 'Bais',
            'status' => 'a',
            'created_date' => date('y-m-d H:i:s')
          ],
          [
            'user_id' => '0',
            'city' => 'Balanga',
            'status' => 'a',
            'created_date' => date('y-m-d H:i:s')
          ],
          [
            'user_id' => '0',
            'city' => 'Batac',
            'status' => 'a',
            'created_date' => date('y-m-d H:i:s')
          ],
          [
            'user_id' => '0',
            'city' => 'Batangas City',
            'status' => 'a',
            'created_date' => date('y-m-d H:i:s')
          ],
          [
            'user_id' => '0',
            'city' => 'Bayawan',
            'status' => 'a',
            'created_date' => date('y-m-d H:i:s')
          ],
          [
            'user_id' => '0',
            'city' => 'Baybay',
            'status' => 'a',
            'created_date' => date('y-m-d H:i:s')
          ],
          [
            'user_id' => '0',
            'city' => 'Bayugan',
            'status' => 'a',
            'created_date' => date('y-m-d H:i:s')
          ],
          [
            'user_id' => '0',
            'city' => 'Bislig',
            'status' => 'a',
            'created_date' => date('y-m-d H:i:s')
          ],
          [
            'user_id' => '0',
            'city' => 'Binan',
            'status' => 'a',
            'created_date' => date('y-m-d H:i:s')
          ],
          [
            'user_id' => '0',
            'city' => 'Bogo',
            'status' => 'a',
            'created_date' => date('y-m-d H:i:s')
          ],
          [
            'user_id' => '0',
            'city' => 'Borongan',
            'status' => 'a',
            'created_date' => date('y-m-d H:i:s')
          ],
          [
            'user_id' => '0',
            'city' => 'Butuan',
            'status' => 'a',
            'created_date' => date('y-m-d H:i:s')
          ],
          [
            'user_id' => '0',
            'city' => 'Cabadbaran',
            'status' => 'a',
            'created_date' => date('y-m-d H:i:s')
          ],
          [
            'user_id' => '0',
            'city' => 'Cabanatuan',
            'status' => 'a',
            'created_date' => date('y-m-d H:i:s')
          ],
          [
            'user_id' => '0',
            'city' => 'Cabuyao',
            'status' => 'a',
            'created_date' => date('y-m-d H:i:s')
          ],
          [
            'user_id' => '0',
            'city' => 'Cadiz',
            'status' => 'a',
            'created_date' => date('y-m-d H:i:s')
          ],
          [
            'user_id' => '0',
            'city' => 'Cagayan de Oro',
            'status' => 'a',
            'created_date' => date('y-m-d H:i:s')
          ],
          [
            'user_id' => '0',
            'city' => 'Calamba',
            'status' => 'a',
            'created_date' => date('y-m-d H:i:s')
          ],
          [
            'user_id' => '0',
            'city' => 'Calapan',
            'status' => 'a',
            'created_date' => date('y-m-d H:i:s')
          ],
          [
            'user_id' => '0',
            'city' => 'Calbayog',
            'status' => 'a',
            'created_date' => date('y-m-d H:i:s')
          ],
          [
            'user_id' => '0',
            'city' => 'Caloocan',
            'status' => 'a',
            'created_date' => date('y-m-d H:i:s')
          ],
          [
            'user_id' => '0',
            'city' => 'Candon',
            'status' => 'a',
            'created_date' => date('y-m-d H:i:s')
          ],
          [
            'user_id' => '0',
            'city' => 'Carcar',
            'status' => 'a',
            'created_date' => date('y-m-d H:i:s')
          ],
          [
            'user_id' => '0',
            'city' => 'Catbalogan',
            'status' => 'a',
            'created_date' => date('y-m-d H:i:s')
          ],
          [
            'user_id' => '0',
            'city' => 'Cauayan',
            'status' => 'a',
            'created_date' => date('y-m-d H:i:s')
          ],
          [
            'user_id' => '0',
            'city' => 'Cavite City',
            'status' => 'a',
            'created_date' => date('y-m-d H:i:s')
          ],
          [
            'user_id' => '0',
            'city' => 'Ceby City',
            'status' => 'a',
            'created_date' => date('y-m-d H:i:s')
          ],
          [
            'user_id' => '0',
            'city' => 'Cotabato City',
            'status' => 'a',
            'created_date' => date('y-m-d H:i:s')
          ],
          [
            'user_id' => '0',
            'city' => 'Dagupan',
            'status' => 'a',
            'created_date' => date('y-m-d H:i:s')
          ],
          [
            'user_id' => '0',
            'city' => 'Danao',
            'status' => 'a',
            'created_date' => date('y-m-d H:i:s')
          ],
          [
            'user_id' => '0',
            'city' => 'Dapitan',
            'status' => 'a',
            'created_date' => date('y-m-d H:i:s')
          ],
          [
            'user_id' => '0',
            'city' => 'Dasmarinas',
            'status' => 'a',
            'created_date' => date('y-m-d H:i:s')
          ],
          [
            'user_id' => '0',
            'city' => 'Davao City',
            'status' => 'a',
            'created_date' => date('y-m-d H:i:s')
          ],
          [
            'user_id' => '0',
            'city' => 'Digos',
            'status' => 'a',
            'created_date' => date('y-m-d H:i:s')
          ],
          [
            'user_id' => '0',
            'city' => 'Dipolog',
            'status' => 'a',
            'created_date' => date('y-m-d H:i:s')
          ],
          [
            'user_id' => '0',
            'city' => 'Dumaguete',
            'status' => 'a',
            'created_date' => date('y-m-d H:i:s')
          ],
          [
            'user_id' => '0',
            'city' => 'El Salvador',
            'status' => 'a',
            'created_date' => date('y-m-d H:i:s')
          ],
          [
            'user_id' => '0',
            'city' => 'Escalante',
            'status' => 'a',
            'created_date' => date('y-m-d H:i:s')
          ],
          [
            'user_id' => '0',
            'city' => 'Gapan',
            'status' => 'a',
            'created_date' => date('y-m-d H:i:s')
          ],
          [
            'user_id' => '0',
            'city' => 'General Santos',
            'status' => 'a',
            'created_date' => date('y-m-d H:i:s')
          ],
          [
            'user_id' => '0',
            'city' => 'General Trias',
            'status' => 'a',
            'created_date' => date('y-m-d H:i:s')
          ],
          [
            'user_id' => '0',
            'city' => 'Gingoog',
            'status' => 'a',
            'created_date' => date('y-m-d H:i:s')
          ],
          [
            'user_id' => '0',
            'city' => 'Guihulungan',
            'status' => 'a',
            'created_date' => date('y-m-d H:i:s')
          ],
          [
            'user_id' => '0',
            'city' => 'Himamaylan',
            'status' => 'a',
            'created_date' => date('y-m-d H:i:s')
          ],
          [
            'user_id' => '0',
            'city' => 'Ilagan',
            'status' => 'a',
            'created_date' => date('y-m-d H:i:s')
          ],
          [
            'user_id' => '0',
            'city' => 'Iligan',
            'status' => 'a',
            'created_date' => date('y-m-d H:i:s')
          ],
          [
            'user_id' => '0',
            'city' => 'Alaminos',
            'status' => 'a',
            'created_date' => date('y-m-d H:i:s')
          ],
          [
            'user_id' => '0',
            'city' => 'Alaminos',
            'status' => 'a',
            'created_date' => date('y-m-d H:i:s')
          ],
          [
            'user_id' => '0',
            'city' => 'Alaminos',
            'status' => 'a',
            'created_date' => date('y-m-d H:i:s')
          ],
          [
            'user_id' => '0',
            'city' => 'Alaminos',
            'status' => 'a',
            'created_date' => date('y-m-d H:i:s')
          ],
          [
            'user_id' => '0',
            'city' => 'Alaminos',
            'status' => 'a',
            'created_date' => date('y-m-d H:i:s')
          ],
          [
            'user_id' => '0',
            'city' => 'Isabela City',
            'status' => 'a',
            'created_date' => date('y-m-d H:i:s')
          ],
          [
            'user_id' => '0',
            'city' => 'Kabankalan',
            'status' => 'a',
            'created_date' => date('y-m-d H:i:s')
          ],
          [
            'user_id' => '0',
            'city' => 'Kidapawan',
            'status' => 'a',
            'created_date' => date('y-m-d H:i:s')
          ],
          [
            'user_id' => '0',
            'city' => 'Koronadal',
            'status' => 'a',
            'created_date' => date('y-m-d H:i:s')
          ],
          [
            'user_id' => '0',
            'city' => 'La Carlota',
            'status' => 'a',
            'created_date' => date('y-m-d H:i:s')
          ],
          [
            'user_id' => '0',
            'city' => 'Lamitan',
            'status' => 'a',
            'created_date' => date('y-m-d H:i:s')
          ],
          [
            'user_id' => '0',
            'city' => 'Laoag',
            'status' => 'a',
            'created_date' => date('y-m-d H:i:s')
          ],
          [
            'user_id' => '0',
            'city' => 'Lapu-Lapu',
            'status' => 'a',
            'created_date' => date('y-m-d H:i:s')
          ],
          [
            'user_id' => '0',
            'city' => 'Las Pinas',
            'status' => 'a',
            'created_date' => date('y-m-d H:i:s')
          ],
          [
            'user_id' => '0',
            'city' => 'Legazpi',
            'status' => 'a',
            'created_date' => date('y-m-d H:i:s')
          ],
          [
            'user_id' => '0',
            'city' => 'Ligao',
            'status' => 'a',
            'created_date' => date('y-m-d H:i:s')
          ],
          [
            'user_id' => '0',
            'city' => 'Lipa',
            'status' => 'a',
            'created_date' => date('y-m-d H:i:s')
          ],
          [
            'user_id' => '0',
            'city' => 'Lucena',
            'status' => 'a',
            'created_date' => date('y-m-d H:i:s')
          ],
          [
            'user_id' => '0',
            'city' => 'Maasin',
            'status' => 'a',
            'created_date' => date('y-m-d H:i:s')
          ],
          [
            'user_id' => '0',
            'city' => 'Mabalacat',
            'status' => 'a',
            'created_date' => date('y-m-d H:i:s')
          ],
          [
            'user_id' => '0',
            'city' => 'Makati',
            'status' => 'a',
            'created_date' => date('y-m-d H:i:s')
          ],
          [
            'user_id' => '0',
            'city' => 'Malabon',
            'status' => 'a',
            'created_date' => date('y-m-d H:i:s')
          ],
          [
            'user_id' => '0',
            'city' => 'Malaybalay',
            'status' => 'a',
            'created_date' => date('y-m-d H:i:s')
          ],
          [
            'user_id' => '0',
            'city' => 'Malolos',
            'status' => 'a',
            'created_date' => date('y-m-d H:i:s')
          ],
          [
            'user_id' => '0',
            'city' => 'Mandaluyong',
            'status' => 'a',
            'created_date' => date('y-m-d H:i:s')
          ],
          [
            'user_id' => '0',
            'city' => 'Mandaue',
            'status' => 'a',
            'created_date' => date('y-m-d H:i:s')
          ],
          [
            'user_id' => '0',
            'city' => 'Manila',
            'status' => 'a',
            'created_date' => date('y-m-d H:i:s')
          ],
          [
            'user_id' => '0',
            'city' => 'Marawi',
            'status' => 'a',
            'created_date' => date('y-m-d H:i:s')
          ],
          [
            'user_id' => '0',
            'city' => 'Marikina',
            'status' => 'a',
            'created_date' => date('y-m-d H:i:s')
          ],
          [
            'user_id' => '0',
            'city' => 'Masbate City',
            'status' => 'a',
            'created_date' => date('y-m-d H:i:s')
          ],
          [
            'user_id' => '0',
            'city' => 'Mati',
            'status' => 'a',
            'created_date' => date('y-m-d H:i:s')
          ],
          [
            'user_id' => '0',
            'city' => 'Meycauayan',
            'status' => 'a',
            'created_date' => date('y-m-d H:i:s')
          ],
          [
            'user_id' => '0',
            'city' => 'Muntinlupa',
            'status' => 'a',
            'created_date' => date('y-m-d H:i:s')
          ],
          [
            'user_id' => '0',
            'city' => 'Muñoz',
            'status' => 'a',
            'created_date' => date('y-m-d H:i:s')
          ],
          [
            'user_id' => '0',
            'city' => 'Naga',
            'status' => 'a',
            'created_date' => date('y-m-d H:i:s')
          ],
          [
            'user_id' => '0',
            'city' => 'Navotas',
            'status' => 'a',
            'created_date' => date('y-m-d H:i:s')
          ],
          [
            'user_id' => '0',
            'city' => 'Olongapo',
            'status' => 'a',
            'created_date' => date('y-m-d H:i:s')
          ],
          [
            'user_id' => '0',
            'city' => 'Ormoc',
            'status' => 'a',
            'created_date' => date('y-m-d H:i:s')
          ],
          [
            'user_id' => '0',
            'city' => 'Oroquieta',
            'status' => 'a',
            'created_date' => date('y-m-d H:i:s')
          ],
          [
            'user_id' => '0',
            'city' => 'Ozamiz',
            'status' => 'a',
            'created_date' => date('y-m-d H:i:s')
          ],
          [
            'user_id' => '0',
            'city' => 'Pagadian',
            'status' => 'a',
            'created_date' => date('y-m-d H:i:s')
          ],
          [
            'user_id' => '0',
            'city' => 'Palayan',
            'status' => 'a',
            'created_date' => date('y-m-d H:i:s')
          ],
          [
            'user_id' => '0',
            'city' => 'Panabo',
            'status' => 'a',
            'created_date' => date('y-m-d H:i:s')
          ],
          [
            'user_id' => '0',
            'city' => 'Parañaque',
            'status' => 'a',
            'created_date' => date('y-m-d H:i:s')
          ],
          [
            'user_id' => '0',
            'city' => 'Pasay',
            'status' => 'a',
            'created_date' => date('y-m-d H:i:s')
          ],
          [
            'user_id' => '0',
            'city' => 'Pasig',
            'status' => 'a',
            'created_date' => date('y-m-d H:i:s')
          ],
          [
            'user_id' => '0',
            'city' => 'Passi',
            'status' => 'a',
            'created_date' => date('y-m-d H:i:s')
          ],
          [
            'user_id' => '0',
            'city' => 'Puerto Princesa',
            'status' => 'a',
            'created_date' => date('y-m-d H:i:s')
          ],
          [
            'user_id' => '0',
            'city' => 'Quezon City',
            'status' => 'a',
            'created_date' => date('y-m-d H:i:s')
          ],
          [
            'user_id' => '0',
            'city' => 'Roxas City',
            'status' => 'a',
            'created_date' => date('y-m-d H:i:s')
          ],
          [
            'user_id' => '0',
            'city' => 'Sagay',
            'status' => 'a',
            'created_date' => date('y-m-d H:i:s')
          ],
          [
            'user_id' => '0',
            'city' => 'Samal',
            'status' => 'a',
            'created_date' => date('y-m-d H:i:s')
          ],
          [
            'user_id' => '0',
            'city' => 'San Carlos',
            'status' => 'a',
            'created_date' => date('y-m-d H:i:s')
          ],
          [
            'user_id' => '0',
            'city' => 'San Fernando',
            'status' => 'a',
            'created_date' => date('y-m-d H:i:s')
          ],
          [
            'user_id' => '0',
            'city' => 'San Jose',
            'status' => 'a',
            'created_date' => date('y-m-d H:i:s')
          ],
          [
            'user_id' => '0',
            'city' => 'San Jose del Monte',
            'status' => 'a',
            'created_date' => date('y-m-d H:i:s')
          ],
          [
            'user_id' => '0',
            'city' => 'San Juan',
            'status' => 'a',
            'created_date' => date('y-m-d H:i:s')
          ],
          [
            'user_id' => '0',
            'city' => 'San Pablo',
            'status' => 'a',
            'created_date' => date('y-m-d H:i:s')
          ],
          [
            'user_id' => '0',
            'city' => 'San Pedro',
            'status' => 'a',
            'created_date' => date('y-m-d H:i:s')
          ],
          [
            'user_id' => '0',
            'city' => 'Santa Rosa',
            'status' => 'a',
            'created_date' => date('y-m-d H:i:s')
          ],
          [
            'user_id' => '0',
            'city' => 'Santiago',
            'status' => 'a',
            'created_date' => date('y-m-d H:i:s')
          ],
          [
            'user_id' => '0',
            'city' => 'Silay',
            'status' => 'a',
            'created_date' => date('y-m-d H:i:s')
          ],
          [
            'user_id' => '0',
            'city' => 'Sipalay',
            'status' => 'a',
            'created_date' => date('y-m-d H:i:s')
          ],
          [
            'user_id' => '0',
            'city' => 'Sorsogon City',
            'status' => 'a',
            'created_date' => date('y-m-d H:i:s')
          ],
          [
            'user_id' => '0',
            'city' => 'Surigao City',
            'status' => 'a',
            'created_date' => date('y-m-d H:i:s')
          ],
          [
            'user_id' => '0',
            'city' => 'Tabaco',
            'status' => 'a',
            'created_date' => date('y-m-d H:i:s')
          ],
          [
            'user_id' => '0',
            'city' => 'Tabuk',
            'status' => 'a',
            'created_date' => date('y-m-d H:i:s')
          ],
          [
            'user_id' => '0',
            'city' => 'Tacloban',
            'status' => 'a',
            'created_date' => date('y-m-d H:i:s')
          ],
          [
            'user_id' => '0',
            'city' => 'Tacurong',
            'status' => 'a',
            'created_date' => date('y-m-d H:i:s')
          ],
          [
            'user_id' => '0',
            'city' => 'Tagaytay',
            'status' => 'a',
            'created_date' => date('y-m-d H:i:s')
          ],
          [
            'user_id' => '0',
            'city' => 'Tagbilaran',
            'status' => 'a',
            'created_date' => date('y-m-d H:i:s')
          ],
          [
            'user_id' => '0',
            'city' => 'Taguig',
            'status' => 'a',
            'created_date' => date('y-m-d H:i:s')
          ],
          [
            'user_id' => '0',
            'city' => 'Tagum',
            'status' => 'a',
            'created_date' => date('y-m-d H:i:s')
          ],
          [
            'user_id' => '0',
            'city' => 'Talisay',
            'status' => 'a',
            'created_date' => date('y-m-d H:i:s')
          ],
          [
            'user_id' => '0',
            'city' => 'Tanauan',
            'status' => 'a',
            'created_date' => date('y-m-d H:i:s')
          ],
          [
            'user_id' => '0',
            'city' => 'Tandag',
            'status' => 'a',
            'created_date' => date('y-m-d H:i:s')
          ],
          [
            'user_id' => '0',
            'city' => 'Tangub',
            'status' => 'a',
            'created_date' => date('y-m-d H:i:s')
          ],
          [
            'user_id' => '0',
            'city' => 'Tanjay',
            'status' => 'a',
            'created_date' => date('y-m-d H:i:s')
          ],
          [
            'user_id' => '0',
            'city' => 'Tarlac City',
            'status' => 'a',
            'created_date' => date('y-m-d H:i:s')
          ],
          [
            'user_id' => '0',
            'city' => 'Tayabas',
            'status' => 'a',
            'created_date' => date('y-m-d H:i:s')
          ],
          [
            'user_id' => '0',
            'city' => 'Toledo',
            'status' => 'a',
            'created_date' => date('y-m-d H:i:s')
          ],
          [
            'user_id' => '0',
            'city' => 'Trece Martires',
            'status' => 'a',
            'created_date' => date('y-m-d H:i:s')
          ],
          [
            'user_id' => '0',
            'city' => 'Tuguegarao',
            'status' => 'a',
            'created_date' => date('y-m-d H:i:s')
          ],
          [
            'user_id' => '0',
            'city' => 'Urdaneta',
            'status' => 'a',
            'created_date' => date('y-m-d H:i:s')
          ],
          [
            'user_id' => '0',
            'city' => 'Valencia',
            'status' => 'a',
            'created_date' => date('y-m-d H:i:s')
          ],
          [
            'user_id' => '0',
            'city' => 'Valenzuela',
            'status' => 'a',
            'created_date' => date('y-m-d H:i:s')
          ],
          [
            'user_id' => '0',
            'city' => 'Victorias',
            'status' => 'a',
            'created_date' => date('y-m-d H:i:s')
          ],
          [
            'user_id' => '0',
            'city' => 'Vigan',
            'status' => 'a',
            'created_date' => date('y-m-d H:i:s')
          ],
          [
            'user_id' => '0',
            'city' => 'Zamboanga City',
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
