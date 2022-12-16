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
            <h3> Tambah Pengguna</h3>
                <form action="" method="post">

                    Nama pengguna :

                    <input type="text" name="nama" value="" class="form-control">

                    Username :

                    <input type="text" name="username" value="" class="form-control">

                    Password :

                    <input type="password" name="password" value="" class="form-control">

                    
                    
                    <label for="inputState">role</label>
                    <select id="inputState" class="form-control" name="role">
                        <option selected>pilih role disini...</option>
                        <option>kasir</option>
                        <option>admin</option>
                        <option>owner</option>
                    </select>

                    </br>

                    <input type="submit" name="simpan" value="Tambah Pengguna" class="btn btn-success mb-3" style="width: 100%">
                    <a href="tampil_pengguna.php" class="btn btn-danger"style="width: 100%">Batal</a>

                </form>
                <?php

                if(isset($_POST['simpan'])){

                    $nama=$_POST['nama'];
                    $username=$_POST['username'];
                    $password=$_POST['password'];
                    $role=$_POST['role'];

                    if(empty($nama)){
                        echo "<script>alert('nama pengguna tidak boleh kosong');location.href='tambah_pengguna.php';</script>";
                    } elseif(empty($username)){

                        echo "<script>alert('alamat pengguna tidak boleh kosong');location.href='tambah_pengguna.php';</script>";
                    } elseif(empty($password)){

                        echo "<script>alert('password tidak boleh kosong');location.href='tambah_pengguna.php';</script>";
                    } elseif(empty($role)){

                        echo "<script>alert('role tidak boleh kosong');location.href='tambah_pengguna.php';</script>";
                    }   else {
                        include "../koneksi.php";

                        $insert=mysqli_query($konn,"insert into user (nama, username, password, role) value ('".$nama."','".$username."','".md5($password)."','".$role."')") or die(mysqli_error($konn));

                        if($insert){
                           echo "<script>alert('Sukses menambahkan pengguna');location.href='tampil_pengguna.php';</script>";
                         } else {
                             echo "<script>alert('Gagal menambahkan pengguna');location.href='tambah_pengguna.php';</script>";
                         }
                    }
                }
                ?>


                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
            </div>
        
    </div>
</body>

</html>