<?php

namespace App\Models;

use CodeIgniter\Model;


class ProduksiModel extends Model
{
    protected $table            = 'produksi';
    protected $primaryKey       = 'id_produksi';
    protected $useTimestamps    = 'true';
    protected $returnType       = 'object';
    protected $allowedFields    = ['tgl_kirim', 'status_produksi', 'id_barang', 'id_pegawai'];

    function getProduksi()
    {
        $builder = $this->db->table('produksi');
        $builder->join('barang', 'barang.id_barang = produksi.id_barang');
        $builder->join('pegawai', 'pegawai.id_pegawai = produksi.id_pegawai');
        $query = $builder->get();
        return $query->getResult();
    }
}
