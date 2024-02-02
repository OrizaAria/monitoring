<?php

namespace App\Controllers;

use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;
use App\Models\ProduksiModel;
use App\Models\BarangModel;
use App\Models\HancaModel;

class Hanca extends ResourceController
{
    function __construct()
    {
        $this->barang = new BarangModel();
        $this->produksi = new ProduksiModel();
        $this->hanca = new HancaModel();
    }
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return ResponseInterface
     */
    public function index()
    {
        $data['hanca'] = $this->hanca->getHanca();
        return view('hanca/index', $data);
    }

    /**
     * Return the properties of a resource object
     *
     * @return ResponseInterface
     */
    public function show($id = null)
    {
        printf($id);
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
    public function create($id = null)
    {

        //
        $barang = $this->model->where('id_barang', $id)->first();
        if (is_object($barang)) {
            # code...
            $data['barang'] = $barang;
            return view('hanca/new', $data);
        } else {
            # code...
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        // $this->hanca->insert($data);
        // $data['produksi'] = $this->produksi->getAll();
        // return view('hanca/new', $data);

        // if ($this->model->affectedRows() > 0) {
        // return redirect()->to(site_url('dashboard_pgw'))->with('success', 'Data Berhasil Disimpan');
        // }
        // return view('dashboard_pgw');
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return ResponseInterface
     */
    public function edit($id = null)
    {
        printf($id);
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
