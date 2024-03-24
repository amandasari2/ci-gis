<?php

namespace App\Controllers;

use App\Models\ModelLokasi;

class Lokasi extends BaseController
{
    public function __construct()
    {
        $this->ModelLokasi = new ModelLokasi();
    }
    public function index(): string
    {
        $data = [
            'judul' => 'Data Lokasi',
            'page' => 'lokasi/v_datalokasi',
            'lokasi' => $this->ModelLokasi->getAllData(),
        ];
        return view('v_template', $data);
    }

    public function inputLokasi(): string
    {
        $data = [
            'judul' => 'Input Lokasi',
            'page' => 'lokasi/v_inputlokasi',
        ];
        return view('v_template', $data);
    }

    public function insertData()
    {
        if ($this->validate([
            'nama_lokasi' => [
                'label' => 'Nama Lokasi',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong!!'
                ]
            ],
            'alamat_lokasi' => [
                'label' => 'Alamat Lokasi',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong!!'
                ]
            ],
            'latitude' => [
                'label' => 'Latitude',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong!!'
                ]
            ],
            'longitude' => [
                'label' => 'Longitude',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong!!'
                ]
            ],
            'foto_lokasi' => [
                'label' => 'Foto Lokasi',
                'rules' => 'uploaded[foto_lokasi]|max_size[foto_lokasi,1024]|mime_in[foto_lokasi,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => '{field} Tidak Boleh Kosong!!',
                    'max_size' => 'Ukuran {field} Maksimal 1024!!',
                    'mime_in' => 'Format {field} Harus JPG, JPEG, dan PNG!!'
                ]
            ],

        ])) {
            $foto_lokasi = $this->request->getFile('foto_lokasi');
            $nama_file_foto = $foto_lokasi->getRandomName();
            //Jika Lolos Validasi
            $data = [
                'nama_lokasi' => $this->request->getPost('nama_lokasi'),
                'alamat_lokasi' => $this->request->getPost('alamat_lokasi'),
                'latitude' => $this->request->getPost('latitude'),
                'longitude' => $this->request->getPost('longitude'),
                'foto_lokasi' => $nama_file_foto,
            ];
            $foto_lokasi->move('foto', $nama_file_foto);
            //Mengirim Data Ke Function Insert Data Di Model Lokasi
            $this->ModelLokasi->insertData($data);
            //Notifikasi Data Berhasil Disimpan
            session()->setFlashdata('pesan', 'Data Lokasi Berhasil Di Tambahkan!!');
            return redirect()->to('Lokasi/inputLokasi');
        } else {
            //Jika Tidak Lolos Validasi
            return redirect()->to('Lokasi/inputLokasi')->withInput();
        }
    }

    public function pemetaanLokasi(){
        $data = [
            'judul' => 'Pemetaan Lokasi',
            'page' => 'lokasi/v_pemetaanlokasi',
            'lokasi' => $this->ModelLokasi->getAllData(),
        ];
        return view('v_template', $data);
    }

    public function editLokasi($id_lokasi){
        $data = [
            'judul' => 'Edit Lokasi',
            'page' => 'lokasi/v_editlokasi',
            'lokasi' => $this->ModelLokasi->getDataById($id_lokasi)
        ];
        return view('v_template', $data);
    }

    public function updateData($id_lokasi)
    {
        if ($this->validate([
            'nama_lokasi' => [
                'label' => 'Nama Lokasi',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong!!'
                ]
            ],
            'alamat_lokasi' => [
                'label' => 'Alamat Lokasi',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong!!'
                ]
            ],
            'latitude' => [
                'label' => 'Latitude',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong!!'
                ]
            ],
            'longitude' => [
                'label' => 'Longitude',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong!!'
                ]
            ],
            'foto_lokasi' => [
                'label' => 'Foto Lokasi',
                'rules' => 'max_size[foto_lokasi,1024]|mime_in[foto_lokasi,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran {field} Maksimal 1024!!',
                    'mime_in' => 'Format {field} Harus JPG, JPEG, dan PNG!!'
                ]
            ],

        ])) {
            $foto_lokasi = $this->request->getFile('foto_lokasi');
            

            $lokasi = $this->ModelLokasi->getDataById($id_lokasi);
            if($foto_lokasi->getError() == 4){
                $nama_file_foto =  $lokasi['foto_lokasi'];
            }
            else{
                $nama_file_foto = $foto_lokasi->getRandomName();
                $foto_lokasi->move('foto', $nama_file_foto);
            }
            //Jika Lolos Validasi
            $data = [
                'id_lokasi' => $id_lokasi,
                'nama_lokasi' => $this->request->getPost('nama_lokasi'),
                'alamat_lokasi' => $this->request->getPost('alamat_lokasi'),
                'latitude' => $this->request->getPost('latitude'),
                'longitude' => $this->request->getPost('longitude'),
                'foto_lokasi' => $nama_file_foto,
            ];
            
            //Mengirim Data Ke Function Insert Data Di Model Lokasi
            $this->ModelLokasi->updateData($data);
            //Notifikasi Data Berhasil Disimpan
            session()->setFlashdata('pesan', 'Data Lokasi Berhasil Di Update!!');
            return redirect()->to('Lokasi/index');
        } else {
            //Jika Tidak Lolos Validasi
            return redirect()->to('Lokasi/editLokasi/'.$id_lokasi)->withInput();
        }
    }

    public function deleteLokasi($id_lokasi){
        $data = [
            'id_lokasi' => $id_lokasi,
        ];
        
        //Mengirim Data Ke Function Insert Data Di Model Lokasi
        $this->ModelLokasi->deleteData($data);
        //Notifikasi Data Berhasil Disimpan
        session()->setFlashdata('pesan', 'Data Lokasi Berhasil Di Delete!!');
        return redirect()->to('Lokasi/index');
    }
}

