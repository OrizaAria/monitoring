<?php

namespace App\Database\Seeds;

use CodeIgniter\I18n\Time;
use CodeIgniter\Database\Seeder;

class SeedProduksi extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create('id_ID');
        for ($i = 0; $i < 10; $i++) {
            # code...
            $data = [

                'tgl_kirim'         => Time::createFromTimestamp($faker->unixTime()),
                'status_produksi'   => $faker->randomElement(['Menunggu', 'Produksi', 'selesai']),
                'id_pegawai'        => 3,
                'id_barang'         => 4,
                'created_at'        => Time::createFromTimestamp($faker->unixTime()),
                'updated_at'        => Time::createFromTimestamp($faker->unixTime())

            ];

            // Simple Queries
            // $this->db->query('INSERT INTO orang (nama, alamat,created_at,updated_at) VALUES(:nama:, :alamat:,:created_at:,:updated_at:)', $data);

            // Using Query Builder
            // $this->db->table('orang')->insert($data);
            $this->db->table('produksi')->insert($data);
        }
    }
}
