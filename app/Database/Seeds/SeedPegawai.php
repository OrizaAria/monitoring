<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SeedPegawai extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create('id_ID');
        for ($i = 0; $i < 10; $i++) {
            # code...
            $data = [

                'nama_pegawai'      => $faker->name,
                'alamat'            => $faker->address,
                'email_pegawai'     => $faker->email,
                'password_pegawai'  => $faker->password,
                'bagian'            => $faker->randomElement(['Cutting', 'Sewing', 'Finishing']),
                'telp'              => $faker->phoneNumber,
                'foto'              => 'default.png'

            ];

            // Simple Queries
            // $this->db->query('INSERT INTO orang (nama, alamat,created_at,updated_at) VALUES(:nama:, :alamat:,:created_at:,:updated_at:)', $data);

            // Using Query Builder
            // $this->db->table('orang')->insert($data);
            $this->db->table('pegawai')->insert($data);
        }
    }
}
