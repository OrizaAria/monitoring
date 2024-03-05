<?php

namespace App\Models;

use CodeIgniter\Model;


class ProduksiModel extends Model
{
    protected $table            = 'produksi';
    protected $primaryKey       = 'id';
    protected $useTimestamps    = 'true';
    protected $returnType       = 'object';
    protected $allowedFields    = ['tgl_selesai', 'status_hanca', 'jml_pribadi', 'jml_akhir', 'id_orderan', 'id_user', 'created_at'];

    function getProduksi()
    {
        $builder = $this->db->table('produksi');
        $builder->select('*');
        $builder->select('users.id as id_user, username, email, nama_pegawai, alamat, users.foto as foto_pegawai, bagian, name, telp,produksi.created_at as tanggal_mulai, nama_orderan, jml_orderan, proses, jml_pribadi, status_produksi, produksi.id as id_produksi, status_hanca, progress_hanca');
        $builder->join('orderan', 'orderan.id = produksi.id_orderan');
        $builder->join('users', 'users.id = produksi.id_user');
        $builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $query = $builder->get();
        return $query->getResult();
    }

    function getHanca($id = null)
    {
        $builder = $this->db->table('produksi');
        $builder->select('*');
        $builder->select('users.id as id_user, username, email, nama_pegawai, alamat, users.foto as foto_pegawai, bagian, name, telp,produksi.created_at as tanggal_mulai, nama_orderan, jml_orderan, proses, jml_pribadi, status_produksi, produksi.id as id_produksi, status_hanca, progress_hanca');
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
        $builder->select('users.id as id_user, username, email, nama_pegawai, alamat, users.foto as foto_pegawai, bagian, name, telp,produksi.created_at as tanggal_mulai, nama_orderan, jml_orderan, proses, jml_pribadi, status_produksi, produksi.id as id_produksi, status_hanca, progress_hanca, orderan.id as id_orderan');
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

    function getProgressProduksi()
    {
        $builder = $this->db->table('produksi');
        $builder->select('*');
        $builder->join('orderan', 'orderan.id = produksi.id_orderan');
        $builder->join('users', 'users.id = produksi.id_user');
        $builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        // $builder->where('produksi.status_hanca', 'On Proses');
        $query = $builder->get();
        return $query->getResult();
    }
}
