<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderanModel extends Model
{
    protected $table            = 'orderan';
    protected $primaryKey       = 'id';
    protected $returnType       = 'object';
    protected $allowedFields    = ['tgl_masuk', 'nama_orderan', 'brand', 'customer', 'jml_orderan', 'harga_orderan', 'proses', 'foto', 'jml_akhir', 'status_produksi'];

    function getOrderan()
    {
        $builder = $this->db->table('orderan');
        $builder->select('*');
        $builder->orderBy('tgl_masuk', 'ASC');
        $builder->where('orderan.proses', user()->bagian);
        $query = $builder->get();
        return $query->getResult();
    }

    function getProsesProduksi()
    {
        $builder = $this->db->table('orderan');
        $builder->select('*');
        $builder->orderBy('tgl_masuk', 'ASC');
        // $builder->where('orderan.status_produksi', 'On Proses');
        $query = $builder->get();
        return $query->getResult();
    }
}
