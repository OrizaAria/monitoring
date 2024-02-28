<?php

namespace App\Models;

use CodeIgniter\Model;

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
        $builder->select('users.id as id_user, username, email, nama_pegawai, alamat, users.foto as foto_pegawai, bagian, name, telp,produksi.created_at as tanggal_mulai, nama_orderan, jml_orderan, proses, jml_pribadi, status_produksi, produksi.id as id_produksi, status_hanca, progress_hanca,total_upah, status_upah, tgl_upah, orderan.id as id_orderan, upah.id as id_upah');
        $builder->join('orderan', 'orderan.id = upah.id_orderan');
        $builder->join('produksi', 'produksi.id = upah.id_produksi');
        $builder->join('users', 'users.id = upah.id_user');
        $builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $query = $builder->get();
        return $query->getResult();
    }
    function getUpah($id = null)
    {
        $builder = $this->db->table('upah');
        $builder->select('*');
        $builder->select('users.id as id_user, username, email, nama_pegawai, alamat, users.foto as foto_pegawai, bagian, name, telp,produksi.created_at as tanggal_mulai, nama_orderan, jml_orderan, proses, jml_pribadi, status_produksi, produksi.id as id_produksi, status_hanca, progress_hanca,total_upah, status_upah, tgl_upah');
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
