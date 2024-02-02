<?php

namespace App\Models;

use CodeIgniter\Model;

class BarangModel extends Model
{
    protected $table            = 'barang';
    protected $primaryKey       = 'id_barang';
    protected $returnType       = 'array';
    protected $useTimestamps    = true;
    protected $allowedFields    = [];


    // // Dates

    function getbarang()
    {
        $builder = $this->db->table('barang');
        $query = $builder->get();
        return $query->getResult();
    }
}
