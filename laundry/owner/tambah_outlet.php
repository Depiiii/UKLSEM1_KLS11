<?php
include "navbar_owner.php";
?>
<?php
include "../koneksi.php";
?>
<br></br>
<div class="container">
<h3> Tambah outlet</h3>
<form action="proses_tambah_outlet.php" method="post" enctype="multipart/form-data">

                    nama outlet :

                    <input type="text" name="nama" value="" class="form-control">

                    alamat :

                    <input type="text" name="alamat" value="" class="form-control ">

                    nomor telp :

                    <input type="text" name="tlp" value="" class="form-control ">
<br>
                    <input type="submit" name="simpan" value="Tambah outlet" class="btn btn-success mb-3" style="width: 100%">
                    <a href="outlet.php" class="btn btn-danger"style="width: 100%">Batal</a>