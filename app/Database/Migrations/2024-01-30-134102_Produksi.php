<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Produksi extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_produksi'   => [
                'type'           => 'BIGINT',
                'constraint'     => 20,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'tgl_kirim' => [
                'type'       => 'DATE'
            ],
            'status_produksi' => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
            ],
            'id_pegawai'   => [
                'type'           => 'BIGINT',
                'constraint'     => 20,
                'unsigned'       => true,
            ],
            'id_barang'   => [
                'type'           => 'BIGINT',
                'constraint'     => 20,
                'unsigned'       => true,
            ],
            'created_at'     => [
                'type'      => 'DATETIME'
            ],
            'Updated_at' => [
                'type'       => 'DATETIME'
            ],
        ]);
        $this->forge->addKey('id_produksi', true);
        $this->forge->addForeignKey('id_barang', 'barang', 'id_barang');
        $this->forge->addForeignKey('id_pegawai', 'pegawai', 'id_pegawai');
        $this->forge->createTable('produksi');
    }

    public function down()
    {
        $this->forge->dropForeignKey('produksi', 'produksi_id_barang_foreign');
        $this->forge->dropForeignKey('produksi', 'produksi_id_pegawai_foreign');
        $this->forge->dropTable('produksi');
    }
}
