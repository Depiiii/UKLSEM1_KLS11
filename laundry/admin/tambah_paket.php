<?php
include "navbar_admin.php";
?>
<!DOCTYPE html>

<html>

<head>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title></title>

</head>
<body>
    <div class="container col-10">
            <div class="col-md py-5">
            <h3> Tambah Paket</h3>
                <form action="" method="post">

                    Jenis Paket :

                    <input type="text" name="jenis" value="" class="form-control">

                    Harga :

                    <input type="text" name="harga" value="" class="form-control mb-5">

                    <input type="submit" name="simpan" value="Tambah Paket" class="btn btn-success mb-3" style="width: 100%">
                    <a href="paket_cucian.php" class="btn btn-danger"style="width: 100%">Batal</a>

                </form>
                <?php

                if(isset($_POST['simpan'])){

                    $jenis=$_POST['jenis'];
                    $harga=$_POST['harga'];
                    echo $jenis;

                    if(empty($jenis)){
                        echo "<script>alert('jenis paket tidak boleh kosong');location.href='tambah_paket.php';</script>";
                    } elseif(empty($harga)){

                        echo "<script>alert('harga paket tidak boleh kosong');location.href='tambah_paket.php';</script>";
                    }   else {
                        include "../koneksi.php";

                        $insert=mysqli_query($konn,"insert into paket (jenis, harga) values ('$jenis','$harga') ") or die(mysqli_error($konn));

                        if($insert){
                           echo "<script>alert('Sukses menambahkan paket');location.href='paket_cucian.php';</script>";
                         } else {
                             echo "<script>alert('Gagal menambahkan paket');location.href='paket_cucian.php';</script>";
                         }
                    }
                }
                ?>


                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
            </div>
        
    </div>
</body>

</html>