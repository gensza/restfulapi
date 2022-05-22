<?php // INI REST CLIENT
defined('BASEPATH') or exit('No direct script access allowed');

use GuzzleHttp\Client;

class Admin_api extends CI_Controller
{

      /**
       * Index Page for this controller.
       *
       * Maps to the following URL
       * 		http://example.com/index.php/welcome
       *	- or -
       * 		http://example.com/index.php/welcome/index
       *	- or -
       * Since this controller is set as the default controller in
       * config/routes.php, it's displayed at http://example.com/
       *
       * So any other public methods not prefixed with an underscore will
       * map to /index.php/welcome/<method_name>
       * @see https://codeigniter.com/user_guide/general/urls.html
       */
      private $_client;

      public function __construct()
      {
            parent::__construct();
            $this->load->model('M_admin');

            $this->_client = new Client([
                  'base_uri' => 'http://localhost/restfulapi/api/produk',
                  'auth' => ['admin', '1234']
            ]);
      }

      public function index()
      {
            $response = $this->_client->request('GET', 'produk', [
                  'query' => [
                        'api_key' => '1'
                  ]
            ]);

            $data['produk'] = json_decode($response->getBody()->getContents(), true);

            $this->load->view('client', $data);
      }

      public function save_dataproduk()
      {
            $data_save['kode_barang'] = $this->input->post('kode_barang');
            $data_save['nama_barang'] = $this->input->post('nama_barang');
            $data_save['kode_ukuran'] = $this->input->post('kode_ukuran');
            $data_save['kode_warna'] = $this->input->post('kode_warna');
            $data_save['harga'] = $this->input->post('harga');
            $data_save['harga_dasar'] = $this->input->post('harga_dasar');
            $data_save['api_key'] = 1;

            $this->_client->request('POST', 'produk', [
                  'form_params' => $data_save
            ]);

            $this->index();
      }

      public function del_dataproduk($id_produk)
      {

            $this->_client->request('DELETE', 'produk', [
                  'form_params' => [
                        'id_produk' => $id_produk,
                        'api_key' => 1
                  ]
            ]);
            $this->index();
      }

      public function update_dataproduk()
      {
            $data_save['kode_barang'] = $this->input->post('kode_barang');
            $data_save['nama_barang'] = $this->input->post('nama_barang');
            $data_save['kode_ukuran'] = $this->input->post('kode_ukuran');
            $data_save['kode_warna'] = $this->input->post('kode_warna');
            $data_save['harga'] = $this->input->post('harga');
            $data_save['harga_dasar'] = $this->input->post('harga_dasar');

            $update_dataproduk = $this->M_admin->update_dataproduk($data_save);

            echo json_encode($update_dataproduk);
      }

      public function get_data_produk()
      {
            $list = $this->M_admin->get_datatables();
            $data = array();
            $no = $_POST['start'];
            foreach ($list as $field) {
                  $no++;

                  $aks = '<button class="btn btn-xs btn-warning fa fa-edit" id="edit_produk" name="edit_spp"
			  data-id_produk="' . $field->id_produk . '" data-kode_barang="' . $field->kode_barang . '"
			  data-nama_barang="' . $field->nama_barang . '" data-kode_ukuran="' . $field->kode_ukuran . '"
			  data-kode_warna="' . $field->kode_warna . '" data-harga="' . $field->harga . '"
			  data-harga_dasar="' . $field->harga_dasar . '"
                    data-toggle="tooltip" data-placement="top" title="detail" onClick="return false" style="padding-right:8px;">
                    Edit</button>
                    <button class="btn btn-danger btn-xs fa fa-eye" id="hapus_produk" name="hapus_produk"
                    data-id_produk="' . $field->id_produk . '"
                    data-toggle="tooltip" data-placement="top" title="Pilih" style="padding-right:8px;">
			  hapus
                    </button>';

                  $row = array();
                  $row[] = $no;
                  $row[] = $field->kode_barang;
                  $row[] = $field->nama_barang;
                  $row[] = $field->kode_ukuran;
                  $row[] = $field->kode_warna;
                  $row[] = $field->harga;
                  $row[] = $field->harga_dasar;
                  $row[] = $aks;

                  $data[] = $row;
            }

            $output = array(
                  "draw" => $_POST['draw'],
                  "recordsTotal" => $this->M_admin->count_all(),
                  "recordsFiltered" => $this->M_admin->count_filtered(),
                  "data" => $data,
            );
            //output dalam format JSON
            echo json_encode($output);
      }
}
