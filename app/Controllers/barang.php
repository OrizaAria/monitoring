<?php

namespace App\Controllers;

class Barang extends BaseController
{
    public function index()
    {

        // $builder        = $this->db->table('barang');
        // $query          = $builder->get()->getResult();
        $query = $this->db->query("SELECT * FROM barang");
        $data['barang'] = $query->getResult();
        return view('barang/index', $data);
    }

    public function create()
    {
        return view('barang/add');
    }

    public function store()
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


        // cara 1 : name sama
        // $data = $this->request->getPost();
        // unset($data['_method']);

        // cara 2 : nama beda
        $data = [
            'nama_barang' => $this->request->getVar('nama_barang'),
            'created_at' => $this->request->getVar('created_at'),
            'customer' => $this->request->getVar('customer'),
            'brand' => $this->request->getVar('brand'),
            'proses' => $this->request->getVar('proses'),
            'jumlah' => $this->request->getVar('jumlah'),
            'foto' => $namaFoto

        ];
        $this->db->table('barang')->insert($data);

        if ($this->db->affectedRows() > 0) {
            return redirect()->to(site_url('barang'))->with('success', 'Data Berhasil Disimpan');
        }
    }

    public function edit($id = null)
    {
        if ($id != null) {
            $query = $this->db->table('barang')->getWhere(['id_barang' => $id]);
            if ($query->resultID->num_rows > 0) {
                $data['barang'] = $query->getRow();
                return view('barang/edit', $data);
            } else {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            }
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function update($id)
    {
        // cara 1 : name sama
        // $data = $this->request->getPost();
        // unset($data['_method']);

        // cara 2 : nama beda
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
            'nama_barang' => $this->request->getVar('nama_barang'),
            'created_at' => $this->request->getVar('created_at'),
            'customer' => $this->request->getVar('customer'),
            'brand' => $this->request->getVar('brand'),
            'proses' => $this->request->getVar('proses'),
            'jumlah' => $this->request->getVar('jumlah'),
            'foto' => $namaFoto

        ];

        $this->db->table('barang')->where(['id_barang' => $id])->update($data);
        return redirect()->to(site_url('barang'))->with('success', 'Data Berhasil Diubah');
    }

    public function destroy($id)
    {
        $this->db->table('barang')->where(['id_barang' => $id])->delete();
        return redirect()->to(site_url('barang'))->with('success', 'Data Berhasil Dihapus');
    }
}
