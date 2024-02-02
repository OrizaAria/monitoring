<?php

namespace App\Controllers;

// use App\Models\PegawaiModel;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourcePresenter;

class Pegawai extends ResourcePresenter
{
    // function __construct()
    // {
    //     $this->pegawai = new PegawaiModel();
    // }
    protected $modelName = '\App\Models\PegawaiModel';
    /**
     * Present a view of resource objects
     *
     * @return ResponseInterface
     */
    public function index()
    {
        $data['pegawai'] = $this->model->findAll();
        return view('pegawai/index', $data);
    }

    /**
     * Present a view to present a specific resource object
     *
     * @param string $id
     *
     * @return ResponseInterface
     */
    public function show($id = null)
    {
        //
    }

    /**
     * Present a view to present a new single resource object
     *
     * @return mixed
     */
    public function new()
    {
        return view('pegawai/new');
    }

    /**
     * Process the creation/insertion of a new resource object.
     * This should be a POST.
     *
     * @return mixed
     */
    public function create()
    {
        // ambil gambar
        $fileFoto = $this->request->getFile('foto');
        // pengkondisian Foto
        if ($fileFoto->getError() == 4) {
            $namaFoto = 'default.png';
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
            'email_pegawai' => $this->request->getVar('email_pegawai'),
            'password_pegawai' => $this->request->getVar('password_pegawai'),
            'foto' => $namaFoto

        ];

        $this->model->insert($data);

        if ($this->model->affectedRows() > 0) {
            return redirect()->to(site_url('pegawai'))->with('success', 'Data Berhasil Disimpan');
        }
    }

    /**
     * Present a view to edit the properties of a specific resource object
     *
     * @param mixed $id
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        //
        $pegawai = $this->model->where('id_pegawai', $id)->first();
        if (is_object($pegawai)) {
            # code...
            $data['pegawai'] = $pegawai;
            return view('pegawai/edit', $data);
        } else {
            # code...
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    /**
     * Process the updating, full or partial, of a specific resource object.
     * This should be a POST.
     *
     * @param mixed $id
     *
     * @return mixed
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
            if ($this->request->getVar('fotoLama') != 'default.png') {
                # code...
                unlink('img/' . $this->request->getVar('fotoLama'));
            }
        }

        $data = [
            'nama_pegawai' => $this->request->getVar('nama_pegawai'),
            'alamat' => $this->request->getVar('alamat'),
            'bagian' => $this->request->getVar('bagian'),
            'telp' => $this->request->getVar('telp'),
            'email_pegawai' => $this->request->getVar('email_pegawai'),
            'password_pegawai' => $this->request->getVar('password_pegawai'),
            'foto' => $namaFoto

        ];

        $this->model->update($id, $data);

        // if ($this->model->affectedRows() > 0) {
        return redirect()->to(site_url('pegawai'))->with('success', 'Data Berhasil Disimpan');
    }

    /**
     * Present a view to confirm the deletion of a specific resource object
     *
     * @param mixed $id
     *
     * @return mixed
     */
    public function remove($id = null)
    {
        //
    }

    /**
     * Process the deletion of a specific resource object
     *
     * @param mixed $id
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        //
        // $this->model->where('id_pegawai', $id)->delete();
        $this->model->delete($id);

        // if ($this->model->affectedRows() > 0) {
        return redirect()->to(site_url('pegawai'))->with('success', 'Data Berhasil Dihapus');
    }
}
