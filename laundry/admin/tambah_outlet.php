<?php
include "navbar_admin.php";
?>

<?php
include "../koneksi.php";
    ?>
<!DOCTYPE html>

<html>

<head>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title></title>
    <?php
                            $qry_owner = mysqli_query($konn,"SELECT * FROM `user` WHERE `role`='owner'");
                            ?>
</head>
<body>
    <div class="container col-10">
            <div class="col-md py-5">
            <h3> Tambah outlet</h3>
                <form action="" method="post">

                    nama outlet :

                    <input type="text" name="nama_outlet" value="" class="form-control">

                    alamat :

                    <input type="text" name="alamat" value="" class="form-control ">

                    no telp :

                    <input type="text" name="tlp" value="" class="form-control ">

                    <label for="">owner</label>
                   
                    <select name="owner" id="" class="form-control">
                    <option value="">Pilih owner</option>
                        <?php
                            while($owner = mysqli_fetch_array($qry_owner)){
                            $id_owner = $owner['id'];
                            $nama_owner = $owner['nama'];

                        ?>
                            <option value="<?php echo $id_owner?>"><?php echo $nama_owner?></option>
                        <?php
                    }
                    ?>
                    </select>
<br>
                    <input type="submit" name="simpan" value="Tambah outlet" class="btn btn-success mb-3" style="width: 100%">
                    <a href="outlet.php" class="btn btn-danger"style="width: 100%">Batal</a>

                </form>
                <?php

                if(isset($_POST['simpan'])){
                    $id_owner=$_POST['owner'];
                    $nama=$_POST['nama_outlet'];
                    $alamat=$_POST['alamat'];
                    $tlp=$_POST['tlp'];
                    $owner=$_POST['owner'];


                    

                    if(empty($nama)){
                        echo "<script>alert('nama outlet tidak boleh kosong');location.href='outlet.php';</script>";

                    } elseif(empty($alamat)){

                        echo "<script>alert('alamat tidak boleh kosong');location.href='outlet.php';</script>";

                    } elseif(empty($tlp)){

                        echo "<script>alert('nomor telp tidak boleh kosong');location.href='outlet.php';</script>";

                    }   else {
                        include "../koneksi.php";

                        $insert=mysqli_query($konn,"insert into outlet (nama_outlet,alamat,tlp,id_owner) values ('$nama','$alamat','$tlp','$id_owner') ") or die(mysqli_error($konn));

                        if($insert){
                           echo "<script>alert('Sukses menambahkan outlet');location.href='outlet.php';</script>";
                         } else {
                             echo "<script>alert('Gagal menambahkan outlet');location.href='outlet.php';</script>";
                         }
                    }
                }
                ?>


                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
            </div>
        
    </div>
</body>

</html>