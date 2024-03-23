<?php

namespace App\Controllers;

use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;
use App\Models\DatabaseModel;
use App\Models\OrderanModel;
use App\Models\PegawaiModel;
use App\Models\ProduksiModel;

class orderan extends ResourceController
{
    function __construct()
    {
        $this->databs = new DatabaseModel();
        $this->orderan = new OrderanModel();
        $this->pegawai = new PegawaiModel();
        $this->produksi = new ProduksiModel();
    }
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return ResponseInterface
     */
    public function index()
    {
        $data['orderan'] = $this->orderan->findAll();
        return view('orderan/index', $data);
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
            $namaFoto = 'default_shirt.png';
        } else {
            // generate nama Foto random
            $namaFoto = $fileFoto->getRandomName();
            // pindahkan file
            $fileFoto->move('img', $namaFoto);
        }


        // cara 1 : name sama
        // $data = $this->request->getPost();
        // unset($data['_method']);

        // cara 2 : nama beda
        $data = [
            'nama_orderan' => $this->request->getVar('nama_orderan'),
            'deadline' => $this->request->getVar('deadline'),
            'customer' => $this->request->getVar('customer'),
            'brand' => $this->request->getVar('brand'),
            'proses' => $this->request->getVar('proses'),
            'jml_orderan' => $this->request->getVar('jml_orderan'),
            'harga_orderan' => $this->request->getVar('harga_orderan'),
            'aturan' => $this->request->getVar('aturan'),
            'foto' => $namaFoto

        ];

        $this->orderan->insert($data);

        if ($this->orderan->affectedRows() > 0) {
            return redirect()->to(site_url('orderan'))->with('success', 'Data Berhasil Disimpan');
        }
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return ResponseInterface
     */
    public function edit($id = null)
    {

        $orderan = $this->orderan->where('id', $id)->first();
        if (is_object($orderan)) {
            $data['orderan'] = $orderan;
            return view('orderan/edit', $data);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function show($id = null)
    {

        $orderan = $this->orderan->where('id', $id)->first();
        if (is_object($orderan)) {
            $data['orderan'] = $orderan;
            $data['produksi'] = $this->produksi->getInfoProduksi($id);
            return view('orderan/info', $data);
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
            if ($this->request->getVar('fotoLama') != 'default_shirt.png') {
                # code...
                unlink('img/' . $this->request->getVar('fotoLama'));
            }
        }

        $data = [
            'nama_orderan' => $this->request->getVar('nama_orderan'),
            'deadline' => $this->request->getVar('deadline'),
            'customer' => $this->request->getVar('customer'),
            'brand' => $this->request->getVar('brand'),
            'proses' => $this->request->getVar('proses'),
            'jml_orderan' => $this->request->getVar('jml_orderan'),
            'harga_orderan' => $this->request->getVar('harga_orderan'),
            'aturan' => $this->request->getVar('aturan'),
            'foto' => $namaFoto

        ];
        $this->orderan->update($id, $data);
        return redirect()->to(site_url('orderan'))->with('success', 'Data Berhasil Diubah');
    }

    public function selesai($id = null)
    {
        $data = [
            'status_produksi' => 'Selesai',
            'jml_akhir' => $this->request->getVar('jml_akhir'),

        ];
        $this->orderan->update($id, $data);
        return redirect()->to(site_url('produksi'))->with('success', 'Data Berhasil Diubah');
    }

    public function kirim($id = null)
    {
        $data = [
            'status_produksi' => 'Terkirim',
        ];
        $this->orderan->update($id, $data);
        return redirect()->to(site_url('dashboard'));
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return ResponseInterface
     */
    public function delete($id = null)
    {
        $this->orderan->delete($id);
        return redirect()->to(site_url('orderan'))->with('success', 'Data Berhasil Dihapus');
    }
}
