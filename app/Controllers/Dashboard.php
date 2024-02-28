<?php

namespace App\Controllers;

use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;
use App\Models\OrderanModel;
use App\Models\PegawaiModel;
use App\Models\ProduksiModel;
use App\Models\UpahModel;

class Dashboard extends ResourceController
{
    function __construct()
    {
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
        if (in_groups('operator')) {
            # code...
            $data['title'] = 'Dashboard';
            $data['orderan'] = $this->orderan->getOrderan();
            $data['prosesProduksi'] = $this->produksi->getProsesProduksi();
            $data['getHanca'] = $this->produksi->getHanca(user()->id);
            $data['upahBerjalan'] = $this->upah->getUpahBerjalan(user()->id);
            $data['produksi'] = $this->produksi->findAll();
            return view('layout/dashboard', $data);
        } elseif (in_groups('owner')) {
            # code...
            $data['title'] = 'Dashboard';
            $data['orderan'] = $this->orderan->getProsesProduksi();
            $data['produksi'] = $this->produksi->findAll();
            return view('layout/dashboard', $data);
        }
    }

    /**
     * Return the properties of a resource object
     *
     * @return ResponseInterface
     */
    public function show($id = null)
    {
        //
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return ResponseInterface
     */
    public function new()
    {
        //
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return ResponseInterface
     */
    public function create()
    {
        //
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return ResponseInterface
     */
    public function edit($id = null)
    {
        //
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return ResponseInterface
     */
    public function update($id = null)
    {
        //
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return ResponseInterface
     */
    public function delete($id = null)
    {
        //
    }
}
