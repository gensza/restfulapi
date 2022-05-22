<?php // INI REST SERVER
defined('BASEPATH') or exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class Produk extends RestController
{

      function __construct()
      {
            // Construct the parent class
            parent::__construct();

            // di limit hanya bisa minta request 2 kali saja
            // $this->methods['index_get']['limit'] = 2;
      }

      public function index_get($id = 0)
      {
            $check_data = $this->db->get_where('produk', ['id_produk' => $id])->row_array();

            // jika mengisikan id produk
            if ($id) {
                  if ($check_data) {
                        $this->response($check_data, RestController::HTTP_OK);
                  } else {
                        $this->response([
                              'status' => FALSE,
                              'message' => 'id produk tidak ditemukan'
                        ], 404);
                  }
            } else {

                  $data = $this->db->get('produk')->result();

                  $this->response($data, RestController::HTTP_OK);
            }
      }

      public function index_post()
      {
            $data = [
                  'kode_barang' => $this->post('kode_barang'),
                  'nama_barang' => $this->post('nama_barang'),
                  'kode_ukuran' => $this->post('kode_ukuran'),
                  'kode_warna' => $this->post('kode_warna'),
                  'harga' => $this->post('harga'),
                  'harga_dasar' => $this->post('harga_dasar'),
            ];

            $insert = $this->db->insert('produk', $data);

            if ($insert) {
                  $this->response($data, RestController::HTTP_OK);
            } else {
                  $this->response([
                        'status' => FALSE,
                        'message' => 'Gagal menambahkan data'
                  ], 502);
            }
      }

      public function index_put()
      {
            $id_produk = $this->put('id_produk');

            $data = [
                  'kode_barang' => $this->put('kode_barang'),
                  'nama_barang' => $this->put('nama_barang'),
                  'kode_ukuran' => $this->put('kode_ukuran'),
                  'kode_warna' => $this->put('kode_warna'),
                  'harga' => $this->put('harga'),
                  'harga_dasar' => $this->put('harga_dasar'),
            ];

            $this->db->where('id_produk', $id_produk);
            $update = $this->db->update('produk', $data);

            if ($update) {
                  // $this->response($data, RestController::HTTP_OK);
                  $this->response([
                        'status' => TRUE,
                        'message' => 'Berhasil update data'
                  ], 200);
            } else {
                  $this->response([
                        'status' => FALSE,
                        'message' => 'Gagal menambahkan data'
                  ], 502);
            }
      }

      public function index_delete()
      {
            $id_produk = $this->delete('id_produk');

            $check_data = $this->db->get_where('produk', ['id_produk' => $id_produk])->row_array();

            if ($check_data) {

                  $this->db->where('id_produk', $id_produk);
                  $delete = $this->db->delete('produk');

                  if ($delete) {
                        $this->response([
                              'status' => TRUE,
                              'message' => 'Berhasil menghapus data'
                        ], RestController::HTTP_OK);
                  } else {
                        $this->response([
                              'status' => FALSE,
                              'message' => 'Gagal menghapus data'
                        ], 404);
                  }
            } else {
                  $this->response([
                        'status' => FALSE,
                        'message' => 'produk tidak ditemukan'
                  ], 404);
            }
      }
}
