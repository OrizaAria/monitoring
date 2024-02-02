<?php

namespace App\Models;

use CodeIgniter\Model;

class PegawaiModel extends Model
{
    protected $table            = 'pegawai';
    protected $primaryKey       = 'id_pegawai';
    // protected $useTimestamps    = true;
    protected $returnType       = 'object';
    protected $allowedFields    = ['nama_pegawai', 'email_pegawai', 'password_pegawai', 'alamat', 'bagian', 'telp', 'foto'];
}
