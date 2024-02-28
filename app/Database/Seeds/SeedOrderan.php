<?php

namespace App\Database\Seeds;

use CodeIgniter\I18n\Time;
use CodeIgniter\Database\Seeder;

class SeedOrderan extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create('id_ID');

        for ($i = 0; $i < 15; $i++) {
            # code...
            $data = [

                'nama_orderan'   => $faker->randomElement(['Kaos Oblong', 'Kemeja', 'Sweater', 'Baju Muslim']),
                'customer'      => $faker->name,
                'brand'         => $faker->randomElement(['Osella', 'Cressida', 'Cardinal', 'Emba', 'Twist']),
                'jml_orderan'    => $faker->randomNumber(3, true),
                'harga_orderan'  => $faker->randomNumber(4, true),
                'proses'        => $faker->randomElement(['Full Proses', 'Cutting', 'Sewing', 'Finishing']),
                'foto'          => 'default_shirt.png',
                'progress_produksi'          => $faker->randomNumber(2, true),
                'status_produksi'          => $faker->randomElement(['Menunggu']),
                'tgl_masuk'     => $faker->DATE,
                'tgl_kirim'     => $faker->DATE,

            ];
            $this->db->table('orderan')->insert($data);
        }
    }
}
