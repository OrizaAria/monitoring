<?php

namespace App\Controllers;

use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;
use App\Models\DatabaseModel;
use App\Models\OrderanModel;
use App\Models\PegawaiModel;
use App\Models\ProduksiModel;
use App\Models\UpahModel;

class Upah extends ResourceController
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
        $data['title'] = 'Pengupahan';
        $data['orderan'] = $this->orderan->findAll();
        $data['produksi'] = $this->produksi->findAll();
        $data['upah'] = $this->upah->getJoinUpah();
        return view('upah/kelola', $data);
    }

    /**
     * Return the properties of a resource object
     *
     * @return ResponseInterface
     */
    public function show($id = null)
    {

        $data['title'] = 'Upah';
        $data['upah'] = $this->upah->getUpah(user()->id);
        return view('upah/riwayat', $data);
    }


    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return ResponseInterface
     */
    public function create()
    {
        $total = $this->request->getVar('jml_konfirmasi') * $this->request->getVar('harga_orderan');
        $data = [
            'id_produksi' => $this->request->getVar('id_produksi'),
            'id_orderan' => $this->request->getVar('id_orderan'),
            'id_user' => $this->request->getVar('id_user'),
            'jml_konfirmasi' => $this->request->getVar('jml_konfirmasi'),
            'tgl_upah' => $this->request->getVar('tgl_upah'),
            'total_upah' => $total,
            'status_upah' => 'Checked',
        ];

        $this->upah->insert($data);

        if ($this->upah->affectedRows() > 0) {
            return redirect()->to(site_url('produksi/' . $this->request->getVar('id_orderan') . '/edit'));
        }
    }

    public function info($id = null)
    {

        $orderan = $this->orderan->where('id', $id)->first();
        if (is_object($orderan)) {
            # code...
            $data['orderan'] = $orderan;
            $data['produksi'] = $this->produksi->getInfoProduksi($id);
            $data['upah'] = $this->upah->getUpahProduksi($id);
            return view('upah/info', $data);
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
        $data = [
            'status_upah' => 'Dibayarkan',
            'tgl_upah' => date("d-m-y"),

        ];

        $this->upah->update($id, $data);

        if ($this->upah->affectedRows() > 0) {
            return redirect()->to(site_url('upah/' . $this->request->getVar('id_orderan') . "/info"));
        }
    }

    public function bayar($id = null)
    {
        $data = [
            'status_upah' => 'Dibayarkan',
            'tgl_upah' => date("d-m-y"),

        ];

        $this->upah->update($id, $data);

        if ($this->upah->affectedRows() > 0) {
            return redirect()->to(site_url('dashboard'));
        }
        //
    }
}
