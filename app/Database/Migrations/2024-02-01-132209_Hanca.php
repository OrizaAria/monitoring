<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Hanca extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_hanca'   => [
                'type'           => 'BIGINT',
                'constraint'     => 20,
                'unsigned'       => true,
                'auto_increment' => true,
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
            'id_produksi'   => [
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
        $this->forge->addKey('id_hanca', true);
        $this->forge->addForeignKey('id_barang', 'barang', 'id_barang');
        $this->forge->addForeignKey('id_pegawai', 'pegawai', 'id_pegawai');
        $this->forge->addForeignKey('id_produksi', 'produksi', 'id_produksi');
        $this->forge->createTable('hanca');
    }

    public function down()
    {
        $this->forge->dropForeignKey('hanca', 'hanca_id_barang_foreign');
        $this->forge->dropForeignKey('hanca', 'hanca_id_pegawai_foreign');
        $this->forge->dropForeignKey('hanca', 'hanca_id_produksi_foreign');
        $this->forge->dropTable('hanca');
    }
}
