<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\OrderanModel;

class Testing extends BaseController
{
    function __construct()
    {
        $this->orderan = new OrderanModel();
    }

    public function index()
    {
        //
    }


    public function selesai($id)
    {
        $data = [
            'status_produksi' => $this->request->getVar('status_produksi'),
            'jml_akhir' => $this->request->getVar('jml_akhir'),

        ];
        $this->orderan->update($id, $data);
        return redirect()->to(site_url('produksi'))->with('success', 'Data Berhasil Diubah');
    }
}
