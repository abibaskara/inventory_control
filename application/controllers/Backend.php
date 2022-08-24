<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Backend extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        // $this->load->model('AuthModel');
        $this->load->model('AdminModel');
        // $this->AuthModel->cekLoginInventory();
    }


    // ####################################### INVENTORY #######################################//

    // ####################################### DEPARTEMENT ####################################### //
    public function get_departement()
    {
        if (!$this->input->is_ajax_request()) {
            $result['status'] = false;
        } else {
            $result['status'] = true;
            $result['data'] = $this->AdminModel->getData('departement');
        }
        echo json_encode($result);
    }

    public function get_edit_departement()
    {
        $id_departement['id_departement'] = $this->input->get('id_departement');
        if (!$this->input->is_ajax_request()) {
            $result['status'] = false;
        } else {
            $result['status'] = true;
            $result['data'] = $this->AdminModel->cekData('departement', $id_departement);
        }
        echo json_encode($result);
    }

    public function tambahDepartement()
    {
        if (!$this->input->is_ajax_request()) {
            $result['status'] = false;
        } else {
            $data = [
                'nama_departement' => $this->input->get('nama_departement')
            ];
            $this->AdminModel->createData('departement', $data);
            $result['status'] = true;
            echo json_encode($result);
        }
    }

    public function editDepartement()
    {
        $id_departement['id_departement'] = $this->input->get('id');
        $nama_departement = $this->input->get('nama_departement');
        if (!$this->input->is_ajax_request()) {
            $result['status'] = false;
        } else {
            $data = [
                'nama_departement' => $nama_departement
            ];
            $this->AdminModel->updateData('departement', $data, $id_departement);
            $result['status'] = true;
            $result['data'] = $this->AdminModel->cekData('departement', $id_departement);
        }
        echo json_encode($result);
    }

    public function deleteDepartement()
    {
        $id_departement['id_departement'] = $this->input->get('id');
        if (!$this->input->is_ajax_request()) {
            $result['status'] = false;
        } else {
            $this->AdminModel->deleteData('departement', $id_departement);
            $result['status'] = true;
        }
        echo json_encode($result);
    }

    // ####################################### SUPPLIER ####################################### //
    public function get_supplier()
    {
        if (!$this->input->is_ajax_request()) {
            $result['status'] = false;
        } else {
            $result['status'] = true;
            $result['data'] = $this->AdminModel->getData('supplier');
        }
        echo json_encode($result);
    }

    public function tambahSupplier()
    {
        if (!$this->input->is_ajax_request()) {
            $result['status'] = false;
        } else {
            $data = [
                'nama_supplier' => $this->input->get('nama_supplier'),
                'alamat' => $this->input->get('alamat'),
                'no_telp_supplier' => $this->input->get('no_telp'),
                'email_supplier' => $this->input->get('email'),
                'nama_pic_supplier' => $this->input->get('pic'),
                'no_telp_pic_supplier' => $this->input->get('no_telp_pic'),
            ];

            $this->AdminModel->createData('supplier', $data);
            $result['status'] = true;
            echo json_encode($result);
        }
    }

    public function get_edit_supplier()
    {
        $id_supplier['id_supplier'] = $this->input->get('id_supplier');
        if (!$this->input->is_ajax_request()) {
            $result['status'] = false;
        } else {
            $result['status'] = true;
            $result['data'] = $this->AdminModel->cekData('supplier', $id_supplier);
        }
        echo json_encode($result);
    }

    public function editSupplier()
    {
        $id_supplier['id_supplier'] = $this->input->get('id');
        if (!$this->input->is_ajax_request()) {
            $result['status'] = false;
        } else {
            $data = [
                'nama_supplier' => $this->input->get('nama_supplier'),
                'alamat' => $this->input->get('alamat'),
                'no_telp_supplier' => $this->input->get('no_telp'),
                'email_supplier' => $this->input->get('email'),
                'nama_pic_supplier' => $this->input->get('pic'),
                'no_telp_pic_supplier' => $this->input->get('no_telp_pic'),
            ];
            $this->AdminModel->updateData('supplier', $data, $id_supplier);
            $result['status'] = true;
            $result['data'] = $this->AdminModel->cekData('supplier', $id_supplier);
        }
        echo json_encode($result);
    }

    public function deleteSupplier()
    {
        $id_supplier['id_supplier'] = $this->input->get('id');
        if (!$this->input->is_ajax_request()) {
            $result['status'] = false;
        } else {
            $this->AdminModel->deleteData('supplier', $id_supplier);
            $result['status'] = true;
        }
        echo json_encode($result);
    }

    // ####################################### KATEGORI ####################################### //

    public function get_kategori()
    {
        if (!$this->input->is_ajax_request()) {
            $result['status'] = false;
        } else {
            $result['status'] = true;
            $result['data'] = $this->AdminModel->getData('kategori_barang');
        }
        echo json_encode($result);
    }

    public function get_edit_kategori()
    {
        $id_kategori['id_kategori'] = $this->input->get('id_kategori');
        if (!$this->input->is_ajax_request()) {
            $result['status'] = false;
        } else {
            $result['status'] = true;
            $result['data'] = $this->AdminModel->cekData('kategori_barang', $id_kategori);
        }
        echo json_encode($result);
    }

    public function tambahKategori()
    {
        if (!$this->input->is_ajax_request()) {
            $result['status'] = false;
        } else {
            $data = [
                'nama_kategori' => $this->input->get('nama_kategori')
            ];
            $this->AdminModel->createData('kategori_barang', $data);
            $result['status'] = true;
            echo json_encode($result);
        }
    }

    public function editKategori()
    {
        $id_kategori['id_kategori'] = $this->input->get('id');
        $nama_kategori = $this->input->get('nama_kategori');
        if (!$this->input->is_ajax_request()) {
            $result['status'] = false;
        } else {
            $data = [
                'nama_kategori' => $nama_kategori
            ];
            $this->AdminModel->updateData('kategori_barang', $data, $id_kategori);
            $result['status'] = true;
            $result['data'] = $this->AdminModel->cekData('kategori_barang', $id_kategori);
        }
        echo json_encode($result);
    }

    public function deleteKategori()
    {
        $id_kategori['id_kategori'] = $this->input->get('id');
        if (!$this->input->is_ajax_request()) {
            $result['status'] = false;
        } else {
            $this->AdminModel->deleteData('kategori_barang', $id_kategori);
            $result['status'] = true;
        }
        echo json_encode($result);
    }

    // ####################################### BARANG ####################################### //
    public function get_barang()
    {
        if (!$this->input->is_ajax_request()) {
            $result['status'] = false;
        } else {
            $result['status'] = true;
            $result['data'] = $this->AdminModel->getData('barang');
        }
        echo json_encode($result);
    }

    public function tambahBarang()
    {
        $berat_barang = $this->input->get('berat_barang') . ' ' . $this->input->get('satuanberat');
        if (!$this->input->is_ajax_request()) {
            $result['status'] = false;
        } else {
            $data = [
                'id_kategori' => $this->input->get('id_kategori'),
                'id_supplier' => $this->input->get('id_supplier'),
                'nama_barang' => $this->input->get('nama_barang'),
                'satuan' => $this->input->get('satuan'),
                'berat_barang' => $berat_barang,
                'keterangan' => $this->input->get('keterangan')
            ];

            $this->AdminModel->createData('barang', $data);
            $result['status'] = true;
            echo json_encode($result);
        }
    }

    public function get_detail_barang()
    {
        $id['id_barang'] = $this->input->get('id');
        $join = 'kategori_barang.id_kategori=barang.id_kategori';
        $join2 = 'supplier.id_supplier=barang.id_supplier';

        if (!$this->input->is_ajax_request()) {
            $result['status'] = false;
        } else {
            $result['status'] = true;
            $result['data'] = $this->AdminModel->doubleJoin_Where('barang', 'kategori_barang', 'supplier', $join, $join2, $id)->row_array();
        }
        echo json_encode($result);
    }

    public function get_edit_barang()
    {
        $id_barang['id_barang'] = $this->input->get('id_barang');
        if (!$this->input->is_ajax_request()) {
            $result['status'] = false;
        } else {
            $result['status'] = true;
            $result['data'] = $this->AdminModel->cekData('barang', $id_barang);
        }
        echo json_encode($result);
    }

    public function editBarang()
    {
        $id_barang['id_barang'] = $this->input->get('id');
        $berat_barang = $this->input->get('berat_barang') . ' ' . $this->input->get('satuanberat');
        if (!$this->input->is_ajax_request()) {
            $result['status'] = false;
        } else {
            $data = [
                'id_kategori' => $this->input->get('id_kategori'),
                'id_supplier' => $this->input->get('id_supplier'),
                'nama_barang' => $this->input->get('nama_barang'),
                'satuan' => $this->input->get('satuan'),
                'berat_barang' => $berat_barang,
                'keterangan' => $this->input->get('keterangan')
            ];
            $this->AdminModel->updateData('barang', $data, $id_barang);
            $result['status'] = true;
            $result['data'] = $this->AdminModel->cekData('barang', $id_barang);
        }
        echo json_encode($result);
    }

    public function deleteBarang()
    {
        $id_barang['id_barang'] = $this->input->get('id');
        if (!$this->input->is_ajax_request()) {
            $result['status'] = false;
        } else {
            $this->AdminModel->deleteData('barang', $id_barang);
            $result['status'] = true;
        }
        echo json_encode($result);
    }

    // ####################################### USER ####################################### //

    public function get_user()
    {
        if (!$this->input->is_ajax_request()) {
            $result['status'] = false;
        } else {
            $result['status'] = true;
            $result['data'] = $this->AdminModel->getData('user');
        }
        echo json_encode($result);
    }

    public function get_detail_profile()
    {
        $id['id_user'] = $this->input->get('id');
        $join = 'departement.id_departement=user.id_departement';
        if (!$this->input->is_ajax_request()) {
            $result['status'] = false;
        } else {
            $result['status'] = true;
            $result['data'] = $this->AdminModel->join_Where('user', 'departement', $join, $id)->row_array();
        }
        echo json_encode($result);
    }

    public function edit_user()
    {
        $nama = $this->input->post('nama_user');
        $pass = $this->input->post('password');
        $no_telp = $this->input->post('no_telp');
        $role = $this->input->post('role');
        $email = $this->input->post('email');
        $foto = $_FILES['foto']['name'];
        $confirm_pass = $this->input->post('confirm_password');
        $jk = $this->input->post('jk');
        $id_departement = $this->input->post('id_departement');
        $old_foto = $this->input->post('old_foto');
        $id['id_user'] = $this->input->post('id');

        try {
            if (empty($foto)) {
                if (!empty($pass)) {
                    if ($pass == $confirm_pass) {
                        $data = [
                            'nama_user' => $nama,
                            'jk' => $jk,
                            'no_telp' => $no_telp,
                            'role' => $role,
                            'email' => $email,
                            'id_departement' => $id_departement,
                            'password' => password_hash($pass, PASSWORD_DEFAULT),
                        ];
                        $result['status'] = true;
                        $this->AdminModel->updateData('user', $data, $id);
                    } else {
                        $result['status'] = 'Password Tidak Match!';
                    }
                } else {
                    $data = [
                        'nama_user' => $nama,
                        'jk' => $jk,
                        'no_telp' => $no_telp,
                        'role' => $role,
                        'email' => $email,
                        'id_departement' => $id_departement,
                    ];
                    $result['status'] = true;
                    $this->AdminModel->updateData('user', $data, $id);
                }
            } else {
                if ($old_foto == 'default.png') {
                    $config['upload_path'] = './assets/profile/';
                    $config['allowed_types'] = 'jpg|png|jpeg';

                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('foto')) {
                        $result['status'] = 'Gagal Upload Foto';
                    } else {
                        $upload = $this->upload->data('file_name');
                    }
                } else {
                    unlink('./assets/profile/' . $old_foto);
                    $config['upload_path'] = './assets/profile/';
                    $config['allowed_types'] = 'jpg|png|jpeg';

                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload('foto')) {
                        $result['status'] = 'Gagal Upload Foto';
                    } else {
                        $upload = $this->upload->data('file_name');
                    }
                }
                if (!empty($pass)) {
                    if ($pass == $confirm_pass) {
                        $data = [
                            'nama_user' => $nama,
                            'jk' => $jk,
                            'no_telp' => $no_telp,
                            'role' => $role,
                            'email' => $email,
                            'id_departement' => $id_departement,
                            'password' => password_hash($pass, PASSWORD_DEFAULT),
                            'foto' => $upload
                        ];
                        $result['status'] = true;
                        $this->AdminModel->updateData('user', $data, $id);
                    } else {
                        $result['status'] = 'Password Tidak Match!';
                    }
                } else {
                    $data = [
                        'nama_user' => $nama,
                        'jk' => $jk,
                        'no_telp' => $no_telp,
                        'role' => $role,
                        'email' => $email,
                        'id_departement' => $id_departement,
                        'foto' => $upload
                    ];
                    $result['status'] = true;
                    $this->AdminModel->updateData('user', $data, $id);
                }
            }
            echo json_encode($result);
        } catch (\Exception $e) {
            $result['status'] = false;
            echo json_encode($result);
        }
    }

    public function deleteUser()
    {
        $id_user['id_user'] = $this->input->get('id');
        $foto = $this->input->get('foto');
        if (!$this->input->is_ajax_request()) {
            $result['status'] = false;
        } else {
            if ($foto == 'default.png') {
                $this->AdminModel->deleteData('user', $id_user);
                $result['status'] = true;
            } else {
                unlink('./assets/profile/' . $foto);
                $this->AdminModel->deleteData('user', $id_user);
                $result['status'] = true;
            }
        }
        echo json_encode($result);
    }

    public function tambah_user()
    {
        $nama_user = $this->input->post('nama_user');
        $jk = $this->input->post('jk');
        $no_telp = $this->input->post('no_telp');
        $role = $this->input->post('role');
        $email = $this->input->post('email');
        $id_departement = $this->input->post('id_departement');
        $password = $this->input->post('password');
        $confirm_password = $this->input->post('confirm_password');
        $foto = $_FILES['foto']['name'];

        $where_email['email'] = $email;
        $cekEmail = $this->AdminModel->cekData('user', $where_email);

        try {
            if (empty($cekEmail)) {
                if ($password == $confirm_password) {
                    if ($foto) {
                        $config['upload_path'] = './assets/profile/';
                        $config['allowed_types'] = 'jpg|png|jpeg';

                        $this->load->library('upload', $config);
                        if (!$this->upload->do_upload('foto')) {
                            $result['status'] = 'Gagal Upload Foto';
                        } else {
                            $upload = $this->upload->data('file_name');
                        }

                        $data = [
                            'nama_user' => $nama_user,
                            'jk' => $jk,
                            'no_telp' => $no_telp,
                            'role' => $role,
                            'email' => $email,
                            'id_departement' => $id_departement,
                            'password' => password_hash($password, PASSWORD_DEFAULT),
                            'foto' => $upload
                        ];
                        $this->AdminModel->createData('user', $data);
                        $result['status'] = true;
                        echo json_encode($result);
                    } else {
                        $data = [
                            'nama_user' => $nama_user,
                            'jk' => $jk,
                            'no_telp' => $no_telp,
                            'role' => $role,
                            'email' => $email,
                            'id_departement' => $id_departement,
                            'password' => password_hash($password, PASSWORD_DEFAULT),
                            'foto' => 'default.png'
                        ];
                        $this->AdminModel->createData('user', $data);
                        $result['status'] = true;
                        echo json_encode($result);
                    }
                } else {
                    $result['status'] = 'Password Tidak Match!';
                    echo json_encode($result);
                }
            } else {
                $result['status'] = 'Email Sudah Terdaftar!';
                echo json_encode($result);
            }
        } catch (\Exception $e) {
            $result['status'] = false;
            echo json_encode($result);
        }
    }

    // ####################################### BARANG MASUK ####################################### //

    public function get_barang_masuk()
    {
        $join = 'barang.id_barang=barang_masuk.id_barang';
        try {
            $result['status'] = true;
            $result['data'] = $this->AdminModel->join('barang_masuk', 'barang', $join)->result();
            echo json_encode($result);
        } catch (\Exception $e) {
            $result['status'] = false;
            echo json_encode($result);
        }
    }

    public function tambahBarangMasuk()
    {
        $tgl_datang = date('Y-m-d', strtotime($this->input->post('tanggal_kedatangan')));
        $id_supplier = $this->input->post('id_supplier');

        $batch_number = $this->input->post('batch_number');
        $id_barang = $this->input->post('id_barang');
        $satuan = $this->input->post('satuan');
        $qty_masuk = $this->input->post('qty');

        if (!$this->input->is_ajax_request()) {
            $result['status'] = false;
        } else {
            try {
                for ($i = 0; $i < count($batch_number); $i++) {
                    $data = [
                        'batch_number' => $batch_number[$i],
                        'tgl_datang' => $tgl_datang,
                        'id_supplier' => $id_supplier,
                        'id_barang' => $id_barang[$i],
                        'satuan' => $satuan[$i],
                        'qty_masuk' => $qty_masuk[$i],
                        'exp' => date('Y-m-d', strtotime($this->input->post('expired_date')[$i]))
                    ];
                    $where['id_barang'] = $id_barang[$i];
                    $query = $this->AdminModel->cekData('stok_barang', $where);

                    if ($query) {
                        $update_qty = $query['qty_stok'] + $qty_masuk[$i];
                        $update = [
                            'qty_stok' => $update_qty,
                            'updated_at' => date('Y-m-d'),
                        ];
                        $this->AdminModel->updateData('stok_barang', $update, $where);
                    } else {
                        $update = [
                            'id_barang' => $id_barang[$i],
                            'qty_stok' => $qty_masuk[$i],
                            'created_at' => date('Y-m-d'),
                            'updated_at' => date('Y-m-d'),
                        ];
                        $this->AdminModel->createData('stok_barang', $update);
                    }

                    $this->AdminModel->createData('barang_masuk', $data);
                }
                $result['status'] = true;
            } catch (\Exception $e) {
                $result['status'] = false;
            }
            echo json_encode($result);
        }
    }

    public function get_edit_barang_masuk()
    {
        $id['id_barang_masuk'] = $this->input->get('id_barang_masuk');
        if (!$this->input->is_ajax_request()) {
            $result['status'] = false;
        } else {
            try {
                $result['data'] = $this->AdminModel->cekData('barang_masuk', $id);
                $result['status'] = true;
            } catch (\Exception $e) {
                $result['status'] = false;
            }
        }
        echo json_encode($result);
    }

    public function edit_barang_masuk()
    {
        $id['id_barang_masuk'] = $this->input->get('id');
        $tgl_datang = date('Y-m-d', strtotime($this->input->get('tgl_datang')));
        $id_supplier = $this->input->get('id_supplier');

        $batch_number = $this->input->get('batch_number');
        $id_barang = $this->input->get('id_barang');
        $satuan = $this->input->get('satuan');
        $qty_masuk = $this->input->get('qty');
        $qty_old = $this->input->get('qty_old');
        $exp = date('Y-m-d', strtotime($this->input->get('expired_date')));

        if (!$this->input->is_ajax_request()) {
            $result['status'] = false;
        } else {
            try {
                $data = [
                    'tgl_datang' => $tgl_datang,
                    'id_supplier' => $id_supplier,
                    'batch_number' => $batch_number,
                    'id_barang' => $id_barang,
                    'satuan' => $satuan,
                    'qty_masuk' => $qty_masuk,
                    'exp' => $exp
                ];
                $where['id_barang'] = $id_barang;
                if ($qty_old > $qty_masuk) {
                    $qty_update = $qty_old - $qty_masuk;
                    $get_stok = $this->AdminModel->getWhere('stok_barang', $where)->row_array();

                    $hasil_stok = $get_stok['qty_stok'] - $qty_update;

                    $update = [
                        'qty_stok' => $hasil_stok
                    ];
                } else {
                    $qty_update = $qty_masuk - $qty_old;
                    $get_stok = $this->AdminModel->getWhere('stok_barang', $where)->row_array();

                    $hasil_stok = $get_stok['qty_stok'] + $qty_update;

                    $update = [
                        'qty_stok' => $hasil_stok
                    ];
                }
                $this->AdminModel->updateData('stok_barang', $update, $where);
                $this->AdminModel->updateData('barang_masuk', $data, $id);
                $result['status'] = true;
            } catch (\Exception $e) {
                $result['status'] = false;
            }
        }
        echo json_encode($result);
    }

    public function hapus_barang_masuk()
    {
        $id['id_barang_masuk'] = $this->input->get('id');
        if (!$this->input->is_ajax_request()) {
            $result['status'] = false;
        } else {
            try {
                $get_qty = $this->AdminModel->getWhere('barang_masuk', $id)->row_array();
                $id_stok['id_barang'] = $get_qty['id_barang'];
                var_dump($id_stok);

                $get_stok = $this->AdminModel->getWhere('stok_barang', $id_stok)->row_array();
                var_dump($get_stok);
                // die;
                $hasil_stok = $get_stok['qty_stok'] - $get_qty['qty_masuk'];
                $update = [
                    'qty_stok' => $hasil_stok
                ];
                $this->AdminModel->updateData('stok_barang', $update, $id_stok);
                $this->AdminModel->deleteData('barang_masuk', $id);
                $result['status'] = true;
            } catch (\Exception $e) {
                $result['status'] = true;
            }
        }
        echo json_encode($result);
    }

    public function get_detail_barang_masuk()
    {
        $id['id_barang_masuk'] = $this->input->get('id_barang_masuk');
        $join = 'barang.id_barang=barang_masuk.id_barang';
        $join2 = 'kategori_barang.id_kategori=barang.id_kategori';
        $join3 = 'supplier.id_supplier=barang_masuk.id_supplier';

        if (!$this->input->is_ajax_request()) {
            $result['status'] = false;
        } else {
            $result['status'] = true;
            $result['data'] = $this->AdminModel->tripleJoin_Where('barang_masuk', 'barang', 'kategori_barang', 'supplier', $join, $join2, $join3, $id)->row_array();
        }
        echo json_encode($result);
    }

    public function get_detail_barang_keluar()
    {
        $id['id_barang_keluar'] = $this->input->get('id_barang_keluar');
        $join = 'barang.id_barang=barang_keluar.id_barang';
        $join2 = 'kategori_barang.id_kategori=barang.id_kategori';
        $join3 = 'supplier.id_supplier=barang.id_supplier';

        if (!$this->input->is_ajax_request()) {
            $result['status'] = false;
        } else {
            $result['status'] = true;
            $result['data'] = $this->AdminModel->tripleJoin_Where('barang_keluar', 'barang', 'kategori_barang', 'supplier', $join, $join2, $join3, $id)->row_array();
        }
        echo json_encode($result);
    }

    public function BatchNumber()
    {
        $id['id_barang'] = $this->input->get('id');
        $id_barang = $this->input->get('id');

        $cek_batch = $this->AdminModel->getLimit('barang_masuk', $id, 'id_barang_masuk', 'DESC')->row_array();

        if ($cek_batch == NULL) {
            $str_barang = strlen($id_barang);
            if ($str_barang == 1) {
                $result['data'] = '00' . $id_barang . '_001';
            } elseif ($str_barang == 2) {
                $result['data'] = '0' . $id_barang . '_001';
            } else {
                $result['data'] = '' . $id_barang . '_001';
            }
            $result['status'] = true;
            echo json_encode($result);
        } else {
            $no_batch = explode("_", $cek_batch['batch_number']);

            $no_batch = $no_batch[1] + 1;
            $str_batch = strlen($no_batch);
            $str_barang = strlen($id_barang);
            if ($str_barang == 1) {
                if ($str_batch == 1) {
                    $result['data'] = '00' . $id_barang . '_00' . $no_batch . '';
                } elseif ($str_batch == 2) {
                    $result['data'] = '00' . $id_barang . '_0' . $no_batch . '';
                } else {
                    $result['data'] = '00' . $id_barang . '_' . $no_batch . '';
                }
                $result['status'] = true;
                echo json_encode($result);
            } elseif ($str_barang == 2) {
                if ($str_batch == 1) {
                    $result['data'] = '0' . $id_barang . '_00' . $no_batch . '';
                } elseif ($str_batch == 2) {
                    $result['data'] = '0' . $id_barang . '_0' . $no_batch . '';
                } else {
                    $result['data'] = '0' . $id_barang . '_' . $no_batch . '';
                }
                $result['status'] = true;
                echo json_encode($result);
            } else {
                if ($str_batch == 1) {
                    $result['data'] = '' . $id_barang . '_00' . $no_batch . '';
                } elseif ($str_batch == 2) {
                    $result['data'] = '' . $id_barang . '_0' . $no_batch . '';
                } else {
                    $result['data'] = '' . $id_barang . '_' . $no_batch . '';
                }
                $result['status'] = true;
                echo json_encode($result);
            }
        }
    }

    public function SessionBatchNumber()
    {
        $id_barang = $this->input->get('id_barang');
        $batch_number = $this->input->get('batch_number');

        $data = [
            'id_barang' => $id_barang,
            'batch_number' => $batch_number
        ];
        $this->AdminModel->createData('batch_number', $data);
        $result['data'] = $this->AdminModel->lastData('batch_number', 'id_batch_number', 'DESC')->row_array();
        $result['status'] = true;
        echo json_encode($result);
    }

    public function DeleteBatchNumber()
    {
        $this->db->truncate('batch_number');
        $result['status'] = true;
        echo json_encode($result);
    }

    public function SearchBatchNumber()
    {
        $where['id_barang'] = $this->input->get('id_barang');
        $result['data'] = $this->AdminModel->getLimit('batch_number', $where, 'id_batch_number', 'DESC')->row_array();
        $result['status'] = true;
        echo json_encode($result);
    }

    public function hapusBatchNumber()
    {
        $id['id_batch_number'] = $this->input->get('id');
        $this->AdminModel->deleteData('batch_number', $id);
        $result['status'] = true;
        echo json_encode($result);
    }

    // ####################################### PERMINTAAN BARANG ####################################### //

    public function get_permintaan()
    {
        $join = 'departement.id_departement = permintaan_barang.id_departement';
        if (!$this->input->is_ajax_request()) {
            $result['status'] = false;
        } else {
            $result['data'] = $this->AdminModel->join('permintaan_barang', 'departement', $join)->result();
            $result['status'] = true;
        }
        echo json_encode($result);
    }

    public function tambahpermintaan_barang()
    {
        $id_departement = $this->input->post('id_departement');
        $id_barang = $this->input->post('id_barang');
        $qty_permintaan = $this->input->post('qty_permintaan');
        $ket_permintaan = $this->input->post('ket_permintaan');
        $tgl_permintaan = date('Y-m-d', strtotime($this->input->post('tgl_permintaan')));

        if (!$this->input->is_ajax_request()) {
            $result['status'] = false;
        } else {
            $cekData = $this->AdminModel->lastData('permintaan_barang', 'id_permintaan', 'DESC')->row_array();

            if ($cekData != Null) {
                $id_permintaan = $cekData['id_permintaan'] + 1;
            } else {
                $id_permintaan = 1;
            }

            try {
                $data_permintaan = [
                    'id_departement' => $id_departement,
                    'id_detail_permintaan' => $id_permintaan,
                    'tgl_permintaan' => $tgl_permintaan
                ];
                for ($i = 0; $i < count($id_barang); $i++) {
                    $data_detail = [
                        'id_barang' => $id_barang[$i],
                        'id_permintaan' => $id_permintaan,
                        'qty_permintaan' => $qty_permintaan[$i],
                        'ket_permintaan' => $ket_permintaan[$i],
                    ];
                    $where['stok_barang.id_barang'] = $id_barang[$i];
                    $join = 'barang.id_barang=stok_barang.id_barang';
                    $query = $this->AdminModel->join_Where('stok_barang', 'barang', $join, $where)->row_array();
                    $qty_stok = $query['qty_stok'] - $qty_permintaan[$i];
                    if ($qty_stok < 0) {
                        $result['status'] = 'Cek Stok Barang Anda!';
                        $result['message'] = 'Cek Stok Barang ' . $query['nama_barang'] . 'Anda!';
                        echo json_encode($result);
                        die;
                    } else {
                        $result['status'] = true;
                        $data_simpan[] = $data_detail;
                    }
                }

                for ($i = 0; $i < count($data_simpan); $i++) {
                    $this->AdminModel->createData('detail_permintaan', $data_simpan[$i]);
                }
                $this->AdminModel->createData('permintaan_barang', $data_permintaan);
            } catch (\Exception $e) {
                $result['status'] = false;
            }
        }
        echo json_encode($result);
    }

    public function get_detail_permintaan()
    {
        $id['id_permintaan'] = $this->input->get('id');
        $join = 'departement.id_departement=permintaan_barang.id_departement';
        $join2 = 'barang.id_barang=detail_permintaan.id_barang';
        if (!$this->input->is_ajax_request()) {
            $result['status'] = false;
        } else {
            $permintaan = $this->AdminModel->join_Where('permintaan_barang', 'departement', $join, $id)->row_array();
            $where['id_permintaan'] = $permintaan['id_detail_permintaan'];
            $barang = $this->AdminModel->join_Where('detail_permintaan', 'barang', $join2, $where)->result();
            $result['data'] = $permintaan;
            $result['barang'] = $barang;
            $result['status'] = true;
        }
        echo json_encode($result);
    }

    public function get_permintaan_barang()
    {
        $id['id_detail_permintaan'] = $this->input->get('id');
        $join = 'barang.id_barang=detail_permintaan.id_barang';
        if (!$this->input->is_ajax_request()) {
            $result['status'] = false;
        } else {
            $result['data'] = $this->AdminModel->join_Where('detail_permintaan', 'barang', $join, $id)->row_array();
            $result['status'] = true;
        }
        echo json_encode($result);
    }

    public function editBarang_Permintaan()
    {
        $id['id_detail_permintaan'] = $this->input->get('id');
        $id_barang = $this->input->get('id_barang');
        $qty_permintaan = $this->input->get('qty_permintaan');
        $ket_permintaan = $this->input->get('ket_permintaan');

        if (!$this->input->is_ajax_request()) {
            $result['status'] = false;
        } else {
            try {
                $data = [
                    'id_barang' => $id_barang,
                    'qty_permintaan' => $qty_permintaan,
                    'ket_permintaan' => $ket_permintaan,
                ];

                $this->AdminModel->updateData('detail_permintaan', $data, $id);
                $result['status'] = true;
            } catch (\Exception $e) {
                $result['status'] = false;
            }
        }
        echo json_encode($result);
    }

    public function deleteBarang_Permintaan()
    {
        $id['id_detail_permintaan'] = $this->input->get('id');
        if (!$this->input->is_ajax_request()) {
            $result['status'] = false;
        } else {
            try {
                $this->AdminModel->deleteData('detail_permintaan', $id);
                $result['status'] = true;
            } catch (\Exception $e) {
                $result['status'] = false;
            }
        }
        echo json_encode($result);
    }

    public function tambahDetail_Permintaan()
    {
        $id_detail_permintaan = $this->input->post('id');
        $id_barang = $this->input->post('id_barang');
        $qty_permintaan = $this->input->post('qty_permintaan');
        $ket_permintaan = $this->input->post('ket_permintaan');
        if (!$this->input->is_ajax_request()) {
            $result['status'] = false;
        } else {
            try {
                for ($i = 0; $i < count($id_barang); $i++) {
                    $data = [
                        'id_permintaan' => $id_detail_permintaan,
                        'id_barang' => $id_barang[$i],
                        'qty_permintaan' => $qty_permintaan[$i],
                        'ket_permintaan' => $ket_permintaan[$i]
                    ];
                    $where['stok_barang.id_barang'] = $id_barang[$i];
                    $join = 'barang.id_barang=stok_barang.id_barang';
                    $query = $this->AdminModel->join_Where('stok_barang', 'barang', $join, $where)->row_array();
                    $qty_stok = $query['qty_stok'] - $qty_permintaan[$i];
                    if ($qty_stok < 0) {
                        $result['status'] = 'Cek Stok Barang Anda!';
                        $result['message'] = 'Cek Stok Barang ' . $query['nama_barang'] . 'Anda !';
                        die;
                    } else {
                        $result['status'] = true;
                        $data_simpan[] = $data;
                    }
                }
                for ($i = 0; $i < count($data_simpan); $i++) {
                    $this->AdminModel->createData('detail_permintaan', $data_simpan[$i]);
                }
                $result['status'] = true;
            } catch (\Exception $e) {
                $result['status'] = false;
            }
            echo json_encode($result);
        }
    }

    public function deletePermintaanBarang()
    {
        $id_permintaan['id_permintaan'] = $this->input->get('id');

        if (!$this->input->is_ajax_request()) {
            $result['status'] = false;
        } else {
            try {
                $getDetail = $this->AdminModel->getWhere('permintaan_barang', $id_permintaan)->row_array();
                if ($getDetail) {
                    $where['id_permintaan'] = $getDetail['id_detail_permintaan'];
                    $this->AdminModel->deleteData('detail_permintaan', $where);
                }
                $this->AdminModel->deleteData('permintaan_barang', $id_permintaan);
                $result['status'] = true;
            } catch (\Exception $e) {
                $result['status'] = false;
            }
        }

        echo json_encode($result);
    }

    // ####################################### PROSES PERMINTAAN BARANG #######################################//

    public function get_permintaan_proses()
    {
        $id['id_permintaan'] = $this->input->get('id');
        $join = 'departement.id_departement=permintaan_barang.id_departement';
        $join2 = 'barang.id_barang=detail_permintaan.id_barang';
        if (!$this->input->is_ajax_request()) {
            $result['status'] = false;
        } else {
            $permintaan = $this->AdminModel->join_Where('permintaan_barang', 'departement', $join, $id)->row_array();
            $where['id_permintaan'] = $permintaan['id_detail_permintaan'];
            $result['data'] = $this->AdminModel->join_Where('detail_permintaan', 'barang', $join2, $where)->result();
        }
        echo json_encode($result);
    }
    public function get_proses_permintaan()
    {
        $id['id_permintaan'] = $this->input->get('id');
        $join = 'departement.id_departement=permintaan_barang.id_departement';
        $join2 = 'barang.id_barang=detail_permintaan.id_barang';
        if (!$this->input->is_ajax_request()) {
            $result['status'] = false;
        } else {
            $permintaan = $this->AdminModel->join_Where('permintaan_barang', 'departement', $join, $id)->row_array();
            $where['id_permintaan'] = $permintaan['id_detail_permintaan'];
            $barang = $this->AdminModel->join_Where('detail_permintaan', 'barang', $join2, $where)->result();

            foreach ($barang as $row) {
                $kondisi['barang_masuk.id_barang'] = $row->id_barang;
                $get_barang = $this->AdminModel->get_barang('barang_masuk', $kondisi)->result();
                if ($get_barang) {
                    foreach ($get_barang as $key) {

                        $cek_qty = $key->qty_masuk - 1;
                        if ($cek_qty >= 0) {
                            if ($row->qty_permintaan != $row->qty_keluar_permintaan) {
                                $rekomendasi[] = [
                                    'id_permintaan' => $permintaan['id_permintaan'],
                                    'id_departement' => $permintaan['id_departement'],
                                    'id_detail_permintaan' => $row->id_detail_permintaan,
                                    'id_barang' => $key->id_barang,
                                    'nama_barang' => $key->nama_barang,
                                    'batch_number' => $key->batch_number,
                                    'qty_masuk' => $key->qty_masuk,
                                ];
                            } else {
                                if (empty($rekomendasi)) {
                                    $rekomendasi = NULL;
                                }
                            }
                        } else {
                            if (empty($rekomendasi)) {
                                $rekomendasi = NULL;
                            }
                        }
                    }
                } else {
                    if (empty($rekomendasi)) {
                        $rekomendasi = 'barang habis';
                    }
                }
            }
            $join = 'barang.id_barang=barang_keluar.id_barang';
            $barang_keluar = $this->AdminModel->join_Where('barang_keluar', 'barang', $join, $id)->result();
            if ($barang_keluar) {
                $result['barang_keluar'] = $barang_keluar;
            } else {
                $result['barang_keluar'] = NULL;
            }
            $result['data'] = $permintaan;
            $result['rekomendasi'] = $rekomendasi;
            $result['barang'] = $barang;
            $result['status'] = true;
        }
        echo json_encode($result);
    }

    public function search()
    {
        $batch_number = $this->input->get('batch_number');
        if (!$this->input->is_ajax_request()) {
            $result['status'] = false;
        } else {
            $result['data'] = $this->AdminModel->SearchBatch('barang_masuk', $batch_number);
            $result['status'] = true;
        }
        echo json_encode($result);
    }

    public function barang_keluar()
    {
        if (!$this->input->is_ajax_request()) {
            $result['status'] = false;
        } else {
            $id['id_permintaan'] = $this->input->get('id');
            $join = 'barang.id_barang=barang_keluar.id_barang';
            $barang_keluar = $this->AdminModel->join_Where('barang_keluar', 'barang', $join, $id)->result();
            if ($barang_keluar) {
                $result['barang_keluar'] = $barang_keluar;
            } else {
                $result['barang_keluar'] = NULL;
            }
        }
        echo json_encode($result);
    }

    public function ProsesPermintaan()
    {
        $id_barang = $this->input->get('id_barang');
        $id_permintaan = $this->input->get('id_permintaan');
        $batch_number = $this->input->get('batch_number');
        $qty_keluar = $this->input->get('qty_keluar');
        $ketersediaan = $this->input->get('ketersediaan');
        $detail_permintaan = $this->AdminModel->getDetailPermintaan($id_permintaan, $id_barang);
        $where['id_permintaan'] = $id_permintaan;
        $departement = $this->AdminModel->getWhere('permintaan_barang', $where)->row_array();
        $id_departement = $departement['id_departement'];
        $id_detail_permintaan = $detail_permintaan['id_detail_permintaan'];
        if (!$this->input->is_ajax_request()) {
            $result['status'] = false;
        } else {
            try {
                if ($qty_keluar > $ketersediaan) {
                    $result['status'] = 'Input Data Kuantiti Salah!';
                } else {
                    //update barang masuk
                    $out = $ketersediaan - $qty_keluar;
                    $update_barang_masuk = [
                        'qty_masuk' => $out,
                    ];
                    $where_barang_masuk['batch_number'] = $batch_number;

                    // update detail permintaan 
                    $where_detail_permintaan['id_detail_permintaan'] = $id_detail_permintaan;
                    $qty_detail = $this->AdminModel->getWhere('detail_permintaan', $where_detail_permintaan)->row_array();

                    $out_detail = $qty_detail['qty_keluar_permintaan'] + $qty_keluar;
                    $update_detail_permintaan = [
                        'qty_keluar_permintaan' => $out_detail,
                    ];


                    // update stok barang 
                    $where_stok['id_barang'] = $id_barang;
                    $qty_stok = $this->AdminModel->getWhere('stok_barang', $where_stok)->row_array();
                    $out_stok = $qty_stok['qty_stok'] - $qty_keluar;
                    $update_stok_barang = [
                        'qty_stok' => $out_stok
                    ];

                    //update barang keluar
                    $update_barang_keluar = [
                        'tgl_keluar' => date('Y-m-d'),
                        'id_permintaan' => $id_permintaan,
                        'id_departement' => $id_departement,
                        'id_barang' => $id_barang,
                        'qty_diserahkan' => $qty_keluar,
                        'batch_number' => $batch_number,
                    ];

                    if ($qty_keluar != 0) {
                        $this->db->trans_start();
                        if ($out == 0) {
                            $this->db->delete('barang_masuk', $where_barang_masuk);
                        } else {
                            $this->db->update('barang_masuk', $update_barang_masuk, $where_barang_masuk);
                        }

                        $this->db->update('detail_permintaan', $update_detail_permintaan, $where_detail_permintaan);
                        $this->db->update('stok_barang', $update_stok_barang, $where_stok);
                        $this->db->insert('barang_keluar', $update_barang_keluar);

                        $this->db->trans_complete();
                        if ($this->db->trans_status() === FALSE) {
                            $this->db->trans_rollback();
                        } else {
                            $this->db->trans_commit();
                        }
                    }
                }
                $result['status'] = true;
            } catch (\Exception $e) {
                $result['status'] = false;
            }
        }
        echo json_encode($result);
    }

    public function update_status_permintaan()
    {
        $id['id_permintaan'] = $this->input->get('id_permintaan');
        if (!$this->input->is_ajax_request()) {
            $result['status'] = false;
        } else {
            $update = [
                'status_permintaan' => 'Selesai'
            ];

            $this->AdminModel->updateData('permintaan_barang', $update, $id);
            $result['status'] = true;
        }
        echo json_encode($result);
    }

    public function status_proses_permintaan()
    {
        $id['id_permintaan'] = $this->input->get('id');
        if (!$this->input->is_ajax_request()) {
            $result['status'] = false;
        } else {
            $update = [
                'status_permintaan' => 'Proses'
            ];

            $this->AdminModel->updateData('permintaan_barang', $update, $id);
            $result['status'] = true;
        }
        echo json_encode($result);
    }

    // ####################################### DATA BARANG KELUAR ####################################### //

    public function get_barang_keluar()
    {
        $join = 'barang.id_barang=barang_keluar.id_barang';
        $join2 = 'departement.id_departement=barang_keluar.id_departement';
        if (!$this->input->is_ajax_request()) {
            $result['status'] = false;
        } else {
            try {
                $result['data'] = $this->AdminModel->doubleJoin('barang_keluar', 'barang', 'departement', $join, $join2)->result();
                $result['status'] = true;
            } catch (\Exception $e) {
                $result['status'] = false;
            }
        }

        echo json_encode($result);
    }

    // ####################################### PO ####################################### //

    public function get_po()
    {
        $join = 'user.id_user=purchase_order.id_user';
        if (!$this->input->is_ajax_request()) {
            $result['status'] = false;
        } else {
            try {
                $result['data'] = $this->AdminModel->join('purchase_order', 'user', $join)->result();
                $result['status'] = true;
            } catch (\Exception $e) {
                $result['status'] = false;
            }
        }

        echo json_encode($result);
    }

    public function simpanPO()
    {
        $id_barang = $this->input->post('id_barang');
        $qty_po = $this->input->post('qty_po');
        $ket_po = $this->input->post('ket_po');

        if (!$this->input->is_ajax_request()) {
            $result['status'] = false;
        } else {
            try {
                $cekData = $this->AdminModel->lastData('purchase_order', 'id_po', 'DESC')->row_array();
                if ($cekData != Null) {
                    $id_detail_po = $cekData['id_detail_po'] + 1;
                } else {
                    $id_detail_po = 1;
                }

                $data_po = [
                    'id_user' => $_SESSION['id_user'],
                    'tgl_po' => date('Y-m-d'),
                    'id_detail_po' => $id_detail_po,
                ];

                $this->AdminModel->createData('purchase_order', $data_po);

                for ($i = 0; $i < count($id_barang); $i++) {
                    $data_detail = [
                        'id_po' => $id_detail_po,
                        'id_barang' => $id_barang[$i],
                        'qty_po' => $qty_po[$i],
                        'ket_po' => $ket_po[$i],
                    ];

                    $this->AdminModel->createData('detail_po', $data_detail);
                }

                $result['status'] = true;
                $result['message'] = 'Data PO Berhasil Disimpan';
            } catch (\Exception $e) {
                $result['status'] = false;
                $result['message'] = 'Data PO Gagal Disimpan';
            }
        }

        echo json_encode($result);
    }

    public function get_stok()
    {
        if (!$this->input->is_ajax_request()) {
            $result['status'] = false;
        } else {
            $join = 'barang.id_barang=stok_barang.id_barang';
            try {
                $result['data'] = $this->AdminModel->join('stok_barang', 'barang', $join)->result();
                $result['status'] = true;
            } catch (\Exception $e) {
                $result['status'] = false;
            }
        }

        echo json_encode($result);
    }

    public function get_detail_po()
    {
        $id = $this->input->get('id');
        $sum = 'SUM(qty_po) AS Total';
        if (!$this->input->is_ajax_request()) {
            $result['status'] = false;
        } else {
            $where['id_po'] = $id;
            $join = 'user.id_user=purchase_order.id_user';
            $result['data'] = $this->AdminModel->join_Where('purchase_order', 'user', $join, $where)->row_array();
            $where_detail['id_po'] = $result['data']['id_detail_po'];
            $join2 = 'barang.id_barang=detail_po.id_barang';
            $result['detail_po'] = $this->AdminModel->join_Where('detail_po', 'barang', $join2, $where_detail)->result();
            $result['total'] = $this->AdminModel->sum_where('detail_po', $where_detail, $sum)->row_array();
            $result['status'] = true;
        }

        echo json_encode($result);
    }

    // ####################################### NOTIFIKASI ####################################### //

    public function get_notifikasi()
    {
        $join = 'departement.id_departement = permintaan_barang.id_departement';
        $where['status_permintaan'] = 'Waiting';
        $count = 'COUNT(id_permintaan) AS Total';
        if (!$this->input->is_ajax_request()) {
            $result['status'] = false;
        } else {
            $result['data'] = $this->AdminModel->join_Where('permintaan_barang', 'departement', $join, $where)->result();
            $result['detail'] = $this->AdminModel->join_Where_Limit('permintaan_barang', 'departement', $join, $where)->result();
            $result['total'] = $this->AdminModel->count_where('permintaan_barang', $count, $where)->row_array();
            $result['status'] = true;
        }
        echo json_encode($result);
    }

    // ####################################### STOK BARANG ####################################### //

    public function searchStok()
    {
        $id_barang['stok_barang.id_barang'] = $this->input->get('id')[0];
        $join = 'barang.id_barang=stok_barang.id_barang';

        $join2 = 'barang.id_barang=barang_masuk.id_barang';
        $where['barang_masuk.id_barang'] = $this->input->get('id')[0];
        if (!$this->input->is_ajax_request()) {
            $result['status'] = false;
        } else {
            $result['stok_barang'] = $this->AdminModel->join_Where('stok_barang', 'barang', $join, $id_barang)->row_array();
            $result['detail_stok_barang'] = $this->AdminModel->join_Where('barang_masuk', 'barang', $join2, $where)->result();
            $result['status'] = true;
        }

        echo json_encode($result);
    }

    public function view_all_stok()
    {
        $join = 'barang.id_barang=stok_barang.id_barang';
        $join2 = 'barang.id_barang=barang_masuk.id_barang';
        if (!$this->input->is_ajax_request()) {
            $result['status'] = false;
        } else {
            $result['stok_barang'] = $this->AdminModel->join('stok_barang', 'barang', $join)->result();
            $result['detail_stok_barang'] = $this->AdminModel->join('barang_masuk', 'barang', $join2)->result();
            $result['status'] = true;
        }
        echo json_encode($result);
    }

    // ####################################### LAPORAN BARANG MASUK ####################################### //

    public function search_laporan_barang_masuk()
    {
        if (!$this->input->is_ajax_request()) {
            $result['status'] = false;
        } else {
            $start_date = date('Y-m-d', strtotime($this->input->get('start_date')));
            $end_date = date('Y-m-d', strtotime($this->input->get('end_date')));

            $join = 'barang.id_barang=barang_masuk.id_barang';
            $where = 'tgl_datang BETWEEN "' . $start_date . '" AND "' . $end_date . '"';

            $result['barang_masuk'] = $this->AdminModel->join_Where('barang_masuk', 'barang', $join, $where)->result();
        }

        echo json_encode($result);
    }

    // ####################################### LAPORAN BARANG KELUAR ####################################### //

    public function search_laporan_barang_keluar()
    {
        if (!$this->input->is_ajax_request()) {
            $result['status'] = false;
        } else {
            $start_date = date('Y-m-d', strtotime($this->input->get('start_date')));
            $end_date = date('Y-m-d', strtotime($this->input->get('end_date')));

            $join = 'barang.id_barang=barang_keluar.id_barang';
            $where = 'tgl_keluar BETWEEN "' . $start_date . '" AND "' . $end_date . '"';

            $result['barang_keluar'] = $this->AdminModel->join_Where('barang_keluar', 'barang', $join, $where)->result();
        }

        echo json_encode($result);
    }

    ####################################### LAPORAN PERMINTAAN BARANG ####################################### //

    public function search_laporan_permintaan_barang()
    {
        if (!$this->input->is_ajax_request()) {
            $result['status'] = false;
        } else {
            $start_date = date('Y-m-d', strtotime($this->input->get('start_date')));
            $end_date = date('Y-m-d', strtotime($this->input->get('end_date')));

            $join = 'departement.id_departement=permintaan_barang.id_departement';
            $where = 'tgl_permintaan BETWEEN "' . $start_date . '" AND "' . $end_date . '"';
            $data = $this->AdminModel->join_Where('permintaan_barang', 'departement', $join, $where)->result();
            $sum = 'SUM(qty_permintaan) as Total';

            for ($i = 0; $i < count($data); $i++) {
                $wheres['id_permintaan'] = $data[$i]->id_detail_permintaan;
                $permintaan[] = [
                    'tgl_permintaan' => $data[$i]->tgl_permintaan,
                    'nama_departement' => $data[$i]->nama_departement,
                    'status_permintaan' => $data[$i]->status_permintaan,
                    'total' => $this->AdminModel->sum_where('detail_permintaan', $wheres, $sum)->row_array(),
                ];
            }
            $result['permintaan_barang'] = $permintaan;
            $result['status'] = true;
        }

        echo json_encode($result);
    }

    // ####################################### LAPORAN PO ####################################### //

    public function search_laporan_po()
    {
        if (!$this->input->is_ajax_request()) {
            $result['status'] = false;
        } else {
            $start_date = date('Y-m-d', strtotime($this->input->get('start_date')));
            $end_date = date('Y-m-d', strtotime($this->input->get('end_date')));

            $join = 'user.id_user=purchase_order.id_user';
            $where = 'tgl_po BETWEEN "' . $start_date . '" AND "' . $end_date . '"';
            $data = $this->AdminModel->join_Where('purchase_order', 'user', $join, $where)->result();
            $sum = 'SUM(qty_po) as Total';

            for ($i = 0; $i < count($data); $i++) {
                $wheres['id_po'] = $data[$i]->id_detail_po;

                $po[] = [
                    'tgl_po' => $data[$i]->tgl_po,
                    'nama_user' => $data[$i]->nama_user,
                    'total' => $this->AdminModel->sum_where('detail_po', $wheres, $sum)->row_array(),
                ];
            }
            $result['po'] = $po;
            $result['status'] = true;
        }

        echo json_encode($result);
    }

    // ####################################### LAPORAN STOK BARANG ####################################### //

    public function search_laporan_stok_barang()
    {
        if (!$this->input->is_ajax_request()) {
            $result['status'] = false;
        } else {
            $start_date = date('Y-m-d', strtotime($this->input->get('start_date')));
            $end_date = date('Y-m-d', strtotime($this->input->get('end_date')));

            $join = 'barang.id_barang=barang_masuk.id_barang';
            $where = 'tgl_datang BETWEEN "' . $start_date . '" AND "' . $end_date . '"';
            $result['stok_barang'] = $this->AdminModel->get_stok('barang_masuk', 'barang', $join, $where)->result();
            $result['status'] = true;
        }

        echo json_encode($result);
    }

    public function dashboard()
    {
        if (!$this->input->is_ajax_request()) {
            $result['status'] = false;
        } else {
            $select = 'SUM(qty_masuk) AS Total';
            $select2 = 'SUM(qty_diserahkan) AS Total';
            $select3 = 'SUM(qty_permintaan) AS Total';
            $select4 = 'SUM(qty_po) AS Total';
            $result['barang_masuk'] = $this->AdminModel->sum('barang_masuk', $select)->row_array();
            $result['barang_keluar'] = $this->AdminModel->sum('barang_keluar', $select2)->row_array();
            $result['permintaan_barang'] = $this->AdminModel->sum('detail_permintaan', $select3)->row_array();
            $result['po'] = $this->AdminModel->sum('detail_po', $select4)->row_array();
            $result['status'] = true;
        }

        echo json_encode($result);
    }
}
