<?php

namespace App\Controllers;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponsableInterface;
use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\Controller;
use App\Models\UserModel;

class Auth extends BaseController
{
    protected $model;

    public function __construct()
    {
        $this->model = new userModel;
    }

    public function index()
    {
        // return redirect()->to(site_url('login'));
        helper(['form']);
        echo view('login');
    }

    public function login(): string
    {
        return view('auth/login');
    }

    public function loginProcess()
    {
        $post = $this->request->getPost();
        $query = $this->db->table('pegawai')->getWhere(['email_pegawai' => $post['email']]);
        $user = $query->getRow();
        // if ($user) {
        //     if (password_verify($post['password'], $user->password_pegawai)) {
        //         $params = ['id_pegawai' => $user->id_pegawai];
        //         session()->set($params);
        //         return redirect()->to(site_url('barang'));
        //         // dd($params);
        //     } else {
        //         // $params = ['id_pegawai' => $user->id_pegawai];
        //         return redirect()->back()->with('error', 'Password Tidak Sesuai');
        //         // dd($params);
        //     }
        //     // return redirect()->to(site_url('barang'));
        // } else {
        //     return redirect()->back()->with('error', 'Email Tidak Ditemukan');
        // }
        // $session = session();
        // $email = $this->request->getPost('email');
        // $password = $this->request->getPost('password');
        // $cek = $model->get_data($email, $password);

        // if (($cek['email_pegawai'] == $email) && ($cek['password_pegawai'] == $password)) {
        //     session()->set('email_pegawai', $cek['email_pegawai']);
        //     session()->set('nama_pegawai', $cek['nama_pegawai']);
        //     session()->set('id_pegawai', $cek['id_pegawai']);
        //     return redirect()->to(base_url('/'));
        // } else {
        //     session()->setFlashdata('error', 'username/password salah');
        //     return redirect()->to(base_url('login'));
        // }

        // $input = $this->request->getVar();
        // $data = $this->model->findUser($input['email']);

        if ($user) {
            if (password_verify($input['password'], $data['password'])) {
                if ($data['is_active'] != 1) {
                    session()->setFlashdata('error', 'akun belum aktif atau dinon-aktifkan!');
                    return redirect()->back()->withInput();
                } else {
                    return redirect()->to('barang');
                }
            } else {
                session()->setFlashdata('error', 'password salah !');
                return redirect()->back()->withInput();
            }
        } else {
            session()->setFlashdata('error', 'username tidak terdaftar');
            return redirect()->back()->withInput();
        }
    }
}
