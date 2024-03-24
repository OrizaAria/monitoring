<?php

namespace App\Controllers;

use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;
use App\Models\databaseModel;
use App\Models\PegawaiModel;

class Pegawai extends ResourceController
{

    function __construct()
    {
        $this->databs = new databaseModel();
        $this->users = new PegawaiModel();
    }
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return ResponseInterface
     */
    public function index()
    {
        $data['title'] = 'Pegawai';
        $data['pegawai'] = $this->users->getPegawai();
        return view('pegawai/index', $data);
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return ResponseInterface
     */
    public function create()
    {
        // ambil gambar
        $fileFoto = $this->request->getFile('foto');
        // pengkondisian Foto
        if ($fileFoto->getError() == 4) {
            $namaFoto = 'default_user.png';
        } else {
            // generate nama Foto random
            $namaFoto = $fileFoto->getRandomName();
            // pindahkan file
            $fileFoto->move('img', $namaFoto);
        }

        $data = [
            'nama_pegawai' => $this->request->getVar('nama_pegawai'),
            'alamat' => $this->request->getVar('alamat'),
            'bagian' => $this->request->getVar('bagian'),
            'telp' => $this->request->getVar('telp'),
            'email' => $this->request->getVar('email'),
            'username' => $this->request->getVar('username'),
            'password_hash' => $this->request->getVar('password'),
            'foto' => $namaFoto

        ];

        $this->users->insert($data);

        if ($this->users->affectedRows() > 0) {
            return redirect()->to(site_url('pegawai'))->with('success', 'Data Berhasil Disimpan');
        }
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return ResponseInterface
     */
    public function edit($id = null)
    {
        $pegawai = $this->users->where('id', $id)->first();
        if (is_object($pegawai)) {
            $data['pegawai'] = $pegawai;
            return view('pegawai/edit', $data);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return ResponseInterface
     */
    public function update($id = null)
    {
        // ambil gambar
        $fileFoto = $this->request->getFile('foto');
        // pengkondisian Foto
        if ($fileFoto->getError() == 4) {
            $namaFoto = $this->request->getVar('fotoLama');
        } else {
            // generate nama Foto random
            $namaFoto = $fileFoto->getRandomName();
            // pindahkan file
            $fileFoto->move('img', $namaFoto);
            if ($this->request->getVar('fotoLama') != 'default_user.png') {
                # code...
                unlink('img/' . $this->request->getVar('fotoLama'));
            }
        }

        $data = [
            'nama_pegawai' => $this->request->getVar('nama_pegawai'),
            'alamat' => $this->request->getVar('alamat'),
            'bagian' => $this->request->getVar('bagian'),
            'telp' => $this->request->getVar('telp'),
            'email' => $this->request->getVar('email'),
            'password' => $this->request->getVar('password'),
            'foto' => $namaFoto

        ];

        $this->users->update($id, $data);

        return redirect()->to(site_url('pegawai'))->with('success', 'Data Berhasil Disimpan');
    }


    /**
     * Delete the designated resource object from the model
     *
     * @return ResponseInterface
     */
    public function delete($id = null)
    {
        //
        // $this->model->where('id', $id)->delete();
        $this->users->delete($id);

        // if ($this->model->affectedRows() > 0) {
        return redirect()->to(site_url('pegawai'))->with('success', 'Data Berhasil Dihapus');
    }

    public function profile($id = null)
    {
        // ambil gambar
        $fileFoto = $this->request->getFile('foto');
        // pengkondisian Foto
        if ($fileFoto->getError() == 4) {
            $namaFoto = $this->request->getVar('fotoLama');
        } else {
            // generate nama Foto random
            $namaFoto = $fileFoto->getRandomName();
            // pindahkan file
            $fileFoto->move('img', $namaFoto);
            if ($this->request->getVar('fotoLama') != 'default_user.png') {
                # code...
                unlink('img/' . $this->request->getVar('fotoLama'));
            }
        }

        $data = [
            'nama_pegawai' => $this->request->getVar('nama_pegawai'),
            'alamat' => $this->request->getVar('alamat'),
            'bagian' => $this->request->getVar('bagian'),
            'telp' => $this->request->getVar('telp'),
            'email' => $this->request->getVar('email'),
            'password' => $this->request->getVar('password'),
            'foto' => $namaFoto

        ];

        $this->users->update($id, $data);

        return redirect()->to(site_url('dashboard'));
    }
}
