<!doctype html>
<html lang="en">

<head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">

      <!-- Bootstrap CSS -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

      <title>Hello, world!</title>
</head>

<body>
      <h1>NIBRAS</h1>
      <button class="btn btn-success" onclick="add_data()">Add Data</button>
      <table class="table" id="dataproduk">
            <thead>
                  <tr>
                        <th scope="col">#</th>
                        <th scope="col">Kode Barang</th>
                        <th scope="col">Nama Barang</th>
                        <th scope="col">Kode Ukuran</th>
                        <th scope="col">Kode Warna</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Harga Dasar</th>
                        <th scope="col">Aksi</th>
                  </tr>
            </thead>
            <tbody>
                  <?php foreach ($data_produk as $d) { ?>
                        <tr>
                              <td><?= $d['kode_barang'] ?></td>
                              <td><?= $d['nama_barang'] ?></td>
                              <td><?= $d['kode_barang'] ?></td>
                              <td><?= $d['kode_ukuran'] ?></td>
                              <td><?= $d['kode_warna'] ?></td>
                              <td><?= $d['harga'] ?></td>
                              <td><?= $d['harga_dasar'] ?></td>
                        </tr>
                  <?php } ?>

            </tbody>
      </table>


      <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="scrollableModalTitle" aria-hidden="true" id="modal_adddata">
            <div class="modal-dialog modal-dialog-scrollable">
                  <div class="modal-content">
                        <div class="modal-header">
                              <h4 class="modal-title" id="myModalLabel">Add Data</h4>
                              </button>
                        </div>
                        <div class="modal-body mt-0">
                              <div>
                                    <label for="">Kode Barang</label>
                                    <input type="text" class="form-control" id="kode_barang">
                              </div>
                              <div>
                                    <label for="">Nama Barang</label>
                                    <input type="text" class="form-control" id="nama_barang">
                              </div>
                              <div>
                                    <label for="">Kode Ukuran</label>
                                    <input type="text" class="form-control" id="kode_ukuran">
                              </div>
                              <div>
                                    <label for="">Kode Warna</label>
                                    <input type="text" class="form-control" id="kode_warna">
                              </div>
                              <div>
                                    <label for="">Harga</label>
                                    <input type="text" class="form-control" id="harga">
                              </div>
                              <div>
                                    <label for="">Harga Dasar</label>
                                    <input type="text" class="form-control" id="harga_dasar">
                              </div>
                        </div>
                        <div class="modal-footer">
                              <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Batal</button>
                              <button type="button" class="btn btn-sm btn-success" data-dismiss="modal" onclick="simpan_produk()">Simpan</button>
                        </div>
                  </div>
            </div>
      </div>

      <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="scrollableModalTitle" aria-hidden="true" id="modal_editdata">
            <div class="modal-dialog modal-dialog-scrollable">
                  <div class="modal-content">
                        <div class="modal-header">
                              <h4 class="modal-title" id="myModalLabel">Edit Data</h4>
                              </button>
                        </div>
                        <div class="modal-body mt-0">
                              <div>
                                    <label for="">Kode Barang</label>
                                    <input type="text" class="form-control" id="kode_barang_e">
                              </div>
                              <div>
                                    <label for="">Nama Barang</label>
                                    <input type="text" class="form-control" id="nama_barang_e">
                              </div>
                              <div>
                                    <label for="">Kode Ukuran</label>
                                    <input type="text" class="form-control" id="kode_ukuran_e">
                              </div>
                              <div>
                                    <label for="">Kode Warna</label>
                                    <input type="text" class="form-control" id="kode_warna_e">
                              </div>
                              <div>
                                    <label for="">Harga</label>
                                    <input type="text" class="form-control" id="harga_e">
                              </div>
                              <div>
                                    <label for="">Harga Dasar</label>
                                    <input type="text" class="form-control" id="harga_dasar_e">
                              </div>
                        </div>
                        <div class="modal-footer">
                              <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Batal</button>
                              <button type="button" class="btn btn-sm btn-success" data-dismiss="modal" onclick="update_produk()">Simpan</button>
                        </div>
                  </div>
            </div>
      </div>

      <!-- <p>If you click on me, I will disappear.</p>
      <p>Click me away!</p>
      <p>Click me too!</p> -->

      <!-- Optional JavaScript; choose one of the two! -->

      <!-- Option 1: Bootstrap Bundle with Popper -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
      <script src="https://cdn.datatables.net/1.12.0/js/jquery.dataTables.min.js"></script>
      <!-- <script src="https://cdn.datatables.net/1.12.0/css/jquery.dataTables.min.css"></script> -->

      <!-- Option 2: Separate Popper and Bootstrap JS -->
      <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>