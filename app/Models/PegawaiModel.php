<?php

namespace App\Models;

use CodeIgniter\Model;

class PegawaiModel extends Model
{
    protected $table            = 'users';
    protected $primaryKey       = 'id';
    protected $useTimestamps    = true;
    protected $returnType       = 'object';
    protected $allowedFields    = ['nama_pegawai', 'alamat', 'bagian', 'telp', 'foto', 'email', 'username'];

    function getPegawai()
    {
        $builder = $this->db->table('users');
        $builder->select('*');
        $builder->select('users.id as userId');
        $builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $query = $builder->get();

        return $query->getResult();
    }
}
