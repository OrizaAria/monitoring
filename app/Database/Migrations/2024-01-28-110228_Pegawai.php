<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pegawai extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_pegawai' => [
                'type'           => 'BIGINT',
                'constraint'     => 20,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama_pegawai' => [
                'type'       => 'VARCHAR',
                'constraint' => '60',
            ],
            'email_pegawai' => [
                'type'       => 'VARCHAR',
                'constraint' => '60',
            ],
            'password_pegawai' => [
                'type'       => 'VARCHAR',
                'constraint' => '60',
            ],
            'alamat' => [
                'type'       => 'TEXT',
            ],
            'bagian' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'telp' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'foto' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ]
        ]);
        $this->forge->addKey('id_pegawai', true);
        $this->forge->createTable('pegawai');
    }

    public function down()
    {
        $this->forge->dropTable('pegawai');
    }
}
