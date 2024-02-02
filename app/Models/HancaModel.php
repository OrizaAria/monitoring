<?php

namespace App\Models;

use CodeIgniter\Model;

class HancaModel extends Model
{
    protected $table            = 'hanca';
    protected $primaryKey       = 'id_hanca';
    protected $useTimestamps    = true;
    protected $returnType       = 'object';
    protected $allowedFields    = ['created_at', 'id_produksi', 'id_barang', 'id_pegawai'];

    function getHanca()
    {
        $builder = $this->db->table('hanca');
        $builder->join('produksi', 'produksi.id_produksi = hanca.id_produksi');
        $builder->join('barang', 'barang.id_barang = hanca.id_barang');
        $builder->join('pegawai', 'pegawai.id_pegawai = hanca.id_pegawai');
        $query = $builder->get();
        return $query->getResult();
    }
}
