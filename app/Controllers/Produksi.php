<?php

namespace App\Controllers;

use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;
use App\Models\DatabaseModel;
use App\Models\OrderanModel;
use App\Models\PegawaiModel;
use App\Models\ProduksiModel;
use App\Models\UpahModel;

class Produksi extends ResourceController
{
    function __construct()
    {
        $this->databs = new DatabaseModel();
        $this->orderan = new OrderanModel();
        $this->pegawai = new PegawaiModel();
        $this->produksi = new ProduksiModel();
        $this->upah = new UpahModel();
    }

    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return ResponseInterface
     */
    public function index()
    {
        $data['orderan'] = $this->orderan->findAll();
        $data['produksi'] = $this->produksi->findAll();
        return view('produksi/index', $data);
    }


    /**
     * Return the properties of a resource object
     *
     * @return ResponseInterface
     */
    public function show($id = null)
    {
        $data['title'] = 'Kerjaan';
        $data['produksi'] = $this->produksi->getHanca(user()->id);
        $data['upah'] = $this->upah->getJoinUpah();
        return view('produksi/riwayat', $data);
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return ResponseInterface
     */
    public function create()
    {
        $data = [
            'id_orderan' => $this->request->getVar('id_orderan'),
            'id_user' => $this->request->getVar('id_user'),
        ];
        $this->produksi->insert($data);
        return redirect()->to(site_url('dashboard'))->with('success', 'Data Berhasil Disimpan');
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return ResponseInterface
     */
    public function edit($id = null)
    {
        $orderan = $this->orderan->where('id', $id)->first();

        if (is_object($orderan)) {
            # code...
            $data['orderan'] = $orderan;
            $data['produksi'] = $this->produksi->getInfoProduksi($id);
            $data['upah'] = $this->upah->getUpahProduksi($id);
            return view('produksi/info', $data);
        } else {
            # code...
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

        // $progres = round(($this->request->getVar('jml_pribadi') / $this->request->getVar('jml_orderan')) * 100);
        // $data2 = [
        //     'progress_produksi' => $progres,
        // ];
        // $this->orderan->update($this->request->getVar('id_orderan'), $data2);

        $data = [
            'status_hanca' => $this->request->getVar('status_hanca'),
            'jml_pribadi' => $this->request->getVar('jml_pribadi'),

        ];
        $this->produksi->update($id, $data);
        return redirect()->to(site_url('produksi/' . user()->id))->with('success', 'Kerjaan Berhasil Ditambahkan');
    }
}
