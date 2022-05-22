<?php

defined('BASEPATH') or exit('No direct script access allowed');

class RestClient extends CI_Controller
{
      function __construct()
      {
            parent::__construct();
            $this->api = "http://localhost/restfulapi/api";
            // $this->api = "https://dev.farizdotid.com/api/daerahindonesia/provinsi";
            // $this->api = "http://api.openweathermap.org/data/2.5/weather?q=jakarta" . "&appid=3c95727e876f0dbb3def499ea46fb708";
      }

      public function index()
      {
            $data['data_produk'] = json_decode($this->curl->simple_get($this->api . '/produk'), true);
            // $data['data_produk'] = json_decode($this->curl->simple_get($this->api), true);
            // $data = json_decode($this->curl->simple_get($this->api), true);
            // var_dump($data['data_produk'][1]['id_produk']);
            // var_dump($data['data_produk']);
            $this->load->view('client', $data);
      }
}

/* End of file Cuaca.php */
