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

      <table class="table" id="">
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
                  <?php $no = 1 ?>
                  <?php foreach ($produk as $p) : ?>
                        <tr>
                              <td><?= $no++ ?></td>
                              <td><?= $p['kode_barang'] ?></td>
                              <td><?= $p['nama_barang'] ?></td>
                              <td><?= $p['kode_ukuran'] ?></td>
                              <td><?= $p['kode_warna'] ?></td>
                              <td><?= $p['harga'] ?></td>
                              <td><?= $p['harga_dasar'] ?></td>
                              <td>
                                    <button class="btn btn-warning">edit</button>
                                    <a href="<?= base_url('api/Admin_api/del_dataproduk/' . $p['id_produk']) ?>" class="btn btn-danger">delete</a>
                              </td>
                        </tr>
                  <?php endforeach; ?>
            </tbody>
      </table>


      <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="scrollableModalTitle" aria-hidden="true" id="modal_adddata">
            <div class="modal-dialog modal-dialog-scrollable">
                  <div class="modal-content">
                        <div class="modal-header">
                              <h4 class="modal-title" id="myModalLabel">Add Data</h4>
                              </button>
                        </div>
                        <form action="<?= base_url('api/Admin_api/save_dataproduk') ?>" method="POST">
                              <div class="modal-body mt-0">
                                    <div>
                                          <label for="">Kode Barang</label>
                                          <input type="text" class="form-control" id="kode_barang" name="kode_barang">
                                    </div>
                                    <div>
                                          <label for="">Nama Barang</label>
                                          <input type="text" class="form-control" id="nama_barang" name="nama_barang">
                                    </div>
                                    <div>
                                          <label for="">Kode Ukuran</label>
                                          <input type="text" class="form-control" id="kode_ukuran" name="kode_ukuran">
                                    </div>
                                    <div>
                                          <label for="">Kode Warna</label>
                                          <input type="text" class="form-control" id="kode_warna" name="kode_warna">
                                    </div>
                                    <div>
                                          <label for="">Harga</label>
                                          <input type="text" class="form-control" id="harga" name="harga">
                                    </div>
                                    <div>
                                          <label for="">Harga Dasar</label>
                                          <input type="text" class="form-control" id="harga_dasar" name="harga_dasar">
                                    </div>
                              </div>
                              <div class="modal-footer">
                                    <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-sm btn-success" data-dismiss="modal">Simpan</button>
                              </div>
                        </form>
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

<script>
      $(document).ready(function() {
            $(document).on('click', '#edit_produk', function() {
                  $("#modal_editdata").modal('show');

                  var id_produk = $(this).data('id_produk');
                  var kode_barang = $(this).data('kode_barang');
                  var nama_barang = $(this).data('nama_barang');
                  var kode_ukuran = $(this).data('kode_ukuran');
                  var kode_warna = $(this).data('kode_warna');
                  var harga = $(this).data('harga');
                  var harga_dasar = $(this).data('harga_dasar');

                  console.log(kode_barang + 'ni');

                  $('#kode_barang_e').val(kode_barang);
                  $('#nama_barang_e').val(nama_barang);
                  $('#kode_ukuran_e').val(kode_ukuran);
                  $('#kode_warna_e').val(kode_warna);
                  $('#harga_e ').val(harga);
                  $('#harga_dasar_e').val(harga_dasar);

                  console.log(id_produk);

            });
      });

      function add_data() {
            $("#modal_adddata").modal('show');
      }
</script>