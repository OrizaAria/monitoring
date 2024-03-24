<?php

namespace App\Models;

use CodeIgniter\Model;

class DatabaseModel extends Model
{
    protected $table            = 'databases';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [];

    protected bool $allowEmptyInserts = false;

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
}


class OrderanModel extends Model
{
    protected $table            = 'orderan';
    protected $primaryKey       = 'id';
    protected $returnType       = 'object';
    protected $allowedFields    = ['deadline', 'nama_orderan', 'brand', 'customer', 'jml_orderan', 'harga_orderan', 'proses', 'foto', 'jml_akhir', 'status_produksi', 'aturan'];

    function getOrderan()
    {
        $builder = $this->db->table('orderan');
        $builder->select('*');
        $builder->orderBy('deadline', 'ASC');
        $builder->where('orderan.proses', user()->bagian);
        $builder->where('orderan.status_produksi', 'On Proses');
        $query = $builder->get();
        return $query->getResult();
    }

    function getProgressProduksi()
    {
        $builder = $this->db->table('orderan');
        $builder->select('*');
        $builder->orderBy('deadline', 'ASC');
        $builder->where('orderan.status_produksi', 'On Proses');
        $query = $builder->get();
        return $query->getResult();
    }

    function getProduksiSelesai()
    {
        $builder = $this->db->table('orderan');
        $builder->select('*');
        $builder->orderBy('deadline', 'ASC');
        $builder->where('orderan.status_produksi', 'Selesai');
        $query = $builder->get();
        return $query->getResult();
    }
}

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


class ProduksiModel extends Model
{
    protected $table            = 'produksi';
    protected $primaryKey       = 'id';
    protected $useTimestamps    = 'true';
    protected $returnType       = 'object';
    protected $allowedFields    = ['tgl_selesai', 'status_hanca', 'jml_pribadi', 'jml_akhir', 'id_orderan', 'id_user', 'created_at'];

    // function getProduksi()
    // {
    //     $builder = $this->db->table('produksi');
    //     $builder->select('*');
    //     $builder->select('users.id as id_user, username, email, nama_pegawai, alamat, users.foto as foto_pegawai, bagian, name, telp,produksi.created_at as tanggal_mulai, nama_orderan, jml_orderan, proses, jml_pribadi, status_produksi, produksi.id as id_produksi, status_hanca');
    //     $builder->join('orderan', 'orderan.id = produksi.id_orderan');
    //     $builder->join('users', 'users.id = produksi.id_user');
    //     $builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
    //     $builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
    //     $query = $builder->get();
    //     return $query->getResult();
    // }

    function getProduksi($id = null)
    {
        $builder = $this->db->table('produksi');
        $builder->select('*');
        $builder->select('users.id as id_user, users.foto as foto_pegawai, produksi.created_at as tanggal_mulai, produksi.id as id_produksi');
        $builder->join('orderan', 'orderan.id = produksi.id_orderan');
        $builder->join('users', 'users.id = produksi.id_user');
        $builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $builder->where('produksi.id_user', $id);
        $query = $builder->get();
        return $query->getResult();
    }

    function getInfoProduksi($id = null)
    {
        $builder = $this->db->table('produksi');
        $builder->select('*');
        $builder->select('users.id as id_user, users.foto as foto_pegawai, produksi.created_at as tanggal_mulai,  produksi.id as id_produksi, orderan.id as id_orderan');
        $builder->join('orderan', 'orderan.id = produksi.id_orderan');
        $builder->join('users', 'users.id = produksi.id_user');
        $builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $builder->where('produksi.id_orderan', $id);
        $query = $builder->get();
        return $query->getResult();
    }

    function getProsesProduksi()
    {
        $builder = $this->db->table('produksi');
        $builder->select('*');
        $builder->select('produksi.id as id_produksi, orderan.foto as foto_orderan');
        $builder->join('orderan', 'orderan.id = produksi.id_orderan');
        $builder->join('users', 'users.id = produksi.id_user');
        $builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $builder->where('produksi.id_user', user()->id);
        $builder->where('produksi.status_hanca', 'On Proses');
        $query = $builder->get();
        return $query->getResult();
    }
}

class UpahModel extends Model
{
    protected $table            = 'upah';
    protected $primaryKey       = 'id';
    // protected $useTimestamps    = 'true';
    protected $returnType       = 'object';
    protected $allowedFields    = ['total_upah', 'id_orderan', 'id_produksi', 'id_user', 'jml_konfirmasi', 'status_upah', 'tgl_upah'];

    function getJoinUpah()
    {
        $builder = $this->db->table('upah');
        $builder->select('*');
        $builder->select('users.id as id_user, users.foto as foto_pegawai, produksi.created_at as tanggal_mulai, produksi.id as id_produksi, orderan.id as id_orderan, upah.id as id_upah');
        $builder->join('orderan', 'orderan.id = upah.id_orderan');
        $builder->join('produksi', 'produksi.id = upah.id_produksi');
        $builder->join('users', 'users.id = upah.id_user');
        $builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $query = $builder->get();
        return $query->getResult();
    }

    function getMonitoringUpah()
    {
        $builder = $this->db->table('upah');
        $builder->select('*');
        $builder->select('users.id as id_user, users.foto as foto_pegawai, produksi.created_at as tanggal_mulai, produksi.id as id_produksi, orderan.id as id_orderan, upah.id as id_upah');
        $builder->join('orderan', 'orderan.id = upah.id_orderan');
        $builder->join('produksi', 'produksi.id = upah.id_produksi');
        $builder->join('users', 'users.id = upah.id_user');
        $builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $builder->where('upah.status_upah', 'Checked');
        $query = $builder->get();
        return $query->getResult();
    }


    function getUpahProduksi($id = null)
    {
        $builder = $this->db->table('upah');
        $builder->select('*');
        $builder->select('users.id as id_user, users.foto as foto_pegawai, produksi.created_at as tanggal_mulai, produksi.id as id_produksi, orderan.id as id_orderan, upah.id as id_upah');
        $builder->join('orderan', 'orderan.id = upah.id_orderan');
        $builder->join('produksi', 'produksi.id = upah.id_produksi');
        $builder->join('users', 'users.id = upah.id_user');
        $builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $builder->where('upah.id_orderan', $id);
        $query = $builder->get();
        return $query->getResult();
    }

    function getUpah($id = null)
    {
        $builder = $this->db->table('upah');
        $builder->select('*');
        $builder->select('users.id as id_user, users.foto as foto_pegawai,produksi.created_at as tanggal_mulai, produksi.id as id_produksi');
        $builder->join('orderan', 'orderan.id = upah.id_orderan');
        $builder->join('produksi', 'produksi.id = upah.id_produksi');
        $builder->join('users', 'users.id = upah.id_user');
        $builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $builder->where('upah.id_user', $id);
        $query = $builder->get();
        return $query->getResult();
    }

    function getUpahBerjalan($id = null)
    {
        $builder = $this->db->table('upah');
        $builder->select('*');
        $builder->select('users.id as id_user, users.foto as foto_pegawai, produksi.created_at as tanggal_mulai, produksi.id as id_produksi');
        $builder->join('orderan', 'orderan.id = upah.id_orderan');
        $builder->join('produksi', 'produksi.id = upah.id_produksi');
        $builder->join('users', 'users.id = upah.id_user');
        $builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $builder->where('upah.id_user', $id);
        $builder->where('upah.status_upah', 'Checked');
        $query = $builder->get();
        return $query->getResult();
    }
}
