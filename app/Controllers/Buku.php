<?php

namespace App\Controllers;
use App\Models\BukuModel;


class Buku extends BaseController
{
    protected $bukuModel;

    public function __construct()
    {
        $this->bukuModel = new BukuModel();
    }


    public function index()
    {
        $buku = $this->bukuModel->findAll();
        $data = [
            'title'         => 'Daftar Buku',
            'validation'    => \Config\Services::validation(),
            'buku'          => $buku
        ];
        return view('buku/index', $data);
    }

    public function detail($slug)   
    {
        $data = [
            'title' => 'Detail Buku',
            'buku'  => $this->bukuModel->getBuku($slug)
        ];

        //Jika buku tidak ada
        if(empty($data['buku']))
        {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Judul Buku ' . $slug . ' Tidak ada');
        }

        return view('buku/detail', $data);
    }

    public function save()
    {
        if(!$this->validate([
            'judul'     => [
                'rules'     => 'required|is_unique[buku.judul]',
                'errors' => [
                    'required'  => '{field} buku harus di isi',
                    'is_unique' => '{field} buku sudah terdaftar'
                ]
                ],
                'cover'     => [
                    'rules'     =>'max_size[cover,1024]|is_image[cover]|mime_in[cover,image/jpg,image/jpeg,image/png]',
                    'errors'    =>[
                        'max_size'  => 'Ukuran Cover terlalu besar',
                        'is_image'  => 'Yang anda pilih bukan file gambar',
                        'mime_in'  => 'Yang anda pilih bukan file gambar'
                    ]
                ]
        ])) {
            // $validation = \Config\Services::validation();
            // return redirect()->to('/buku')->withInput()->with('validation', $validation);
            return redirect()->to('/buku')->withInput();
        }

        $filecover = $this->request->getFile('cover');

        //Upload default cover buku
        if($filecover->getError() == 4) {
            $coverName = 'default.jpg';
        } else {
            $coverName = $filecover->getRandomName();
    
            $filecover->move('img', $coverName);
        }

        $slug = url_title($this->request->getVar('judul'), '-' , true);
        $this->bukuModel->save([
            'judul'     => $this->request->getVar('judul'),
            'slug'      => $slug,
            'penulis'   => $this->request->getVar('penulis'),
            'penerbit'  => $this->request->getVar('penerbit'),
            'cover'     => $coverName
        ]);
        
        session()->setFlashdata('notif', 'Data buku berhasil disimpan');

        return redirect()->to('/buku');
    }

    public function delete($id)
    {
        //cari gambar berdasarkan id

        $buku = $this->bukuModel->find($id);

        //cek jika file gambarnya default.jpg

        if($buku['cover'] != 'default.jpg') {
            //hapus gambar cover di folder
            unlink('img/' . $buku['cover']);
            
        }


        $this->bukuModel->delete($id);
        session()->setFlashdata('notif', 'Data buku berhasil dihapus');
        return redirect()->to('/buku');
    }

    public function edit($slug)
    {
        $data = [
            'title'         => 'Form edit data Buku',
            'validation'    => \Config\Services::validation(),
            'buku'          => $this->bukuModel->getBuku($slug)
        ];
        return view('buku/edit', $data);
    }

    public function update($id)
    {

        //cek judul buku
        $judulLama = $this->bukuModel->getBuku($this->request->getVar('slug'));
        if($judulLama['judul'] == $this->request->getVar('judul') ) {
            $rule_judul = 'required';
        } else {
            $rule_judul = 'required|is_unique[buku.judul]';
        }


        if(!$this->validate([
            'judul'     => [
                'rules'     => $rule_judul,
                'errors' => [
                    'required'  => '{field} buku harus di isi',
                    'is_unique' => '{field} buku sudah terdaftar'
                ]
            ],
            'cover'     => [
                'rules'     =>'max_size[cover,1024]|is_image[cover]|mime_in[cover,image/jpg,image/jpeg,image/png]',
                'errors'    =>[
                'max_size'  => 'Ukuran Cover terlalu besar',
                'is_image'  => 'Yang anda pilih bukan file gambar',
                'mime_in'  => 'Yang anda pilih bukan file gambar'
                ]
            ]
        ])) {
            return redirect()->to('/buku/edit/'. $this->request->getVar('slug'))->withInput();
        }

        $coverFile = $this->request->getFile('cover');

        //cek gambar, apakah tetap gambar lama

        if($coverFile->getError() == 4){
            $coverName = $this->request->getVar('coverLama');
        } else {
            // generate nama file random
            $coverName = $coverFile->getRandomName();
            //Upload gambar cover
            $coverFile->move('img', $coverName);
            //hapus gbr cover lama
            unlink('img/' . $this->request->getVar('coverLama'));
        }

        $slug = url_title($this->request->getVar('judul'), '-' , true);
        $this->bukuModel->save([
            'id'        => $id,
            'judul'     => $this->request->getVar('judul'),
            'slug'      => $slug,
            'penulis'   => $this->request->getVar('penulis'),
            'penerbit'  => $this->request->getVar('penerbit'),
            'cover'     => $coverName
        ]);
        
        session()->setFlashdata('notif', 'Data buku berhasil diubah');

        return redirect()->to('/buku');
    }
    
}