<?php

namespace App\Database\Seeds;

use CodeIgniter\I18n\Time;
use CodeIgniter\Database\Seeder;

class SeedBarang extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create('id_ID');

        for ($i = 0; $i < 15; $i++) {
            # code...
            $data = [

                'nama_barang' => $faker->word,
                'customer' => $faker->name,
                'brand'    => $faker->streetName,
                'jumlah'    => $faker->randomNumber(3, false),
                'proses'    => $faker->randomElement(['Full Proses', 'Cutting', 'Sewing', 'Finishing']),
                'foto'    => 'default.png',
                'created_at' => $faker->DATE,
                'updated_at' => $faker->DATE,

            ];

            // Simple Queries
            // $this->db->query('INSERT INTO orang (nama, alamat,created_at,updated_at) VALUES(:nama:, :alamat:,:created_at:,:updated_at:)', $data);

            // Using Query Builder
            // $this->db->table('orang')->insert($data);
            $this->db->table('barang')->insert($data);
        }
    }
}
