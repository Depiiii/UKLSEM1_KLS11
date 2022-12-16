    <?php
include "navbar_admin.php";
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

   <div class="container col-50">

        <div class="col-md py-5">
        <div class="mb-5">

        <form action="" method="post" class="form-inline py-3" style="float: right">
        <input name="search" class="form-control mr-sm-2" type="search" placeholder="Cari owner" aria-label="Search" value="<?php
        if(isset($_POST['cari'])){
            echo $_POST['search'];
        }
        ?>">

        <button name="cari" class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
        </form>
        <h1>Tabel owner</h1>
        <br>
        <button type="button" class="btn btn-success py-2 col-sm-2 mb-2" data-toggle="modal" data-target="#tambah">
        Tambah owner
        </button>
      

        </div>

        <?php
      include "../koneksi.php";
    if(isset($_POST['cari'])){
      $cari = $_POST['search'];
      $qry_user = mysqli_query($konn,"select * from user user join outlet on outlet.id_owner=user.id where nama like'%".$cari."%' AND  user.role='owner'") or die (mysqli_error($konn));
    }else{
    $qry_user = mysqli_query($konn,"select * from user join outlet on outlet.id_owner=user.id where role='owner'")or die (mysqli_error($konn));
    }
    $row = mysqli_num_rows($qry_user);
    if ($row < 1){
      ?>
      <div class="col-12 py-5">
      <center>
        <h1 style="color:red;">
          <b>
            Mohon Maaf, Pengguna Yang Anda Cari Tidak Ditemukan
          </b>
        </h1>
      </center>
      </div>

      <?php
    }else{
        ?>
        <table class="table table-hover table-striped">
    <thead>
    <tr>

        <th>NO</th>
        <th>NAMA OWNER</th>
        <th>USERNAME</th>  
        <th>role</th>
        <th>Nama Outlet</th>
        <th></th>
</tr>
    </thead>
    <tbody>
        <?php
        $no=0;
        while($data_pengguna = mysqli_fetch_array($qry_user)){
        $row = mysqli_num_rows($qry_user);
        $no++;?>
        <tr><td><?=$no?> </td>
        <td> <?=$data_pengguna['nama']?> </td>
        <td> <?=$data_pengguna['username']?> </td>
        <td> <?=$data_pengguna['role']?> </td>
        <td> <?=$data_pengguna['nama_outlet']?></td>
        <td>
            <form action="" method="post" style="float:right">
            <input type="hidden" name="id" value="<?php echo $data_pengguna['id']?>">
            <button type="button" class="btn btn-warning text-light" data-toggle="modal" data-target="#edit<?php echo $data_pengguna['id']?>">
            Edit
            </button>
            <input type="hidden" name="id"  value="<?php echo $data_pengguna['id']?>">

            <input type="submit" name="hapus" value="Hapus" onclick="return confirm('Are you sure you want to delete this item?') "class="btn btn-danger">
            </form>
            
        </td>
        
            <!-- Modal Edit -->
            <div class="modal fade" id="edit<?php echo $data_pengguna['id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Pengguna</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <form action="proses_edit_owner.php" method="post">
                    <input type="hidden" name="id"  value="<?php echo $data_pengguna['id']?>">
                    Nama Pengguna :

                    <input type="text" name="nama" value="<?=$data_pengguna['nama']?>" class="form-control">

                    Username :

                    <input type="text" name="username" value="<?=$data_pengguna['username']?>" class="form-control">

                    Password :

                    <input type="password" name="password" value="" class="form-control">

                    <label for="">role</label>
                    <input type="hidden" name="id"  value="<?php echo $data_pengguna['id']?>">
                    <input type="text" name="role" value="<?php echo $data_pengguna['role']?>" id="" class="form-control" readonly>

                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" name="edit" value="Ubah" class="btn btn-success">
                    </form>
            </div>
            </div>

        </tr>
    

        
        <?php
        }
    }

        ?>
    </tbody>
    </table>

        <!-- Modal Tambah -->
        <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Pelanggan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="" method="post">

                Nama pengguna :

                <input type="text" name="nama" value="" class="form-control">

                Username :

                <input type="text" name="username" value="" class="form-control">

                Password :

                <input type="password" name="password" value="" class="form-control">

                <label for="">role</label>
                    <input type="hidden" name="id"  value="<?php echo $data_pengguna['id']?>">
                    <input type="text" name="role" value="owner" id="" class="form-control" readonly>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <input type="submit" name="simpan" value="Tambah" class="btn btn-success">
                </form>
            </div>
            </div>
        </div>
        </div>

<?php

// ini untuk simpan ya ayang

                if(isset($_POST['simpan'])){

                    $nama=$_POST['nama'];
                    $username=$_POST['username'];
                    $password=$_POST['password'];
                    $role=$_POST['role'];

                    if(empty($nama)){
                        echo "<script>alert('nama pengguna tidak boleh kosong');location.href='tampil_pengguna_owner.php';</script>";
                    } elseif(empty($username)){

                        echo "<script>alert('alamat pengguna tidak boleh kosong');location.href='tampil_pengguna_owner.php';</script>";
                    } elseif(empty($password)){

                        echo "<script>alert('password tidak boleh kosong');location.href='tampil_pengguna_owner.php';</script>";
                    } elseif(empty($role)){

                        echo "<script>alert('role tidak boleh kosong');location.href='tampil_pengguna_owner.php';</script>";
                    }   else {
                        include "../koneksi.php";

                        $insert=mysqli_query($konn,"insert into user (nama, username, password, role) value ('".$nama."','".$username."','".md5($password)."','".$role."')") or die(mysqli_error($konn));

                        if($insert){
                            //select id owner paling besar (ototmatis data yang baru masuk)
                            // as untuk menampung data yang di max() menjadi nama data baru (relevan sesuai yang ngoding mau ngasi nama apa)
                            $query_id = mysqli_query($konn, "SELECT max(id) as id FROM user")or die(mysqli_error($konn));
                            $select_id = mysqli_fetch_array($query_id);
                            //ambil data owner terbaru (id)
                            $id_owner = $select_id['id'];

                            //select id owner paling besar (ototmatis data yang baru masuk)
                            $query_owner = mysqli_query($konn, "SELECT * from user where id='$id_owner'")or die(mysqli_error($konn));
                            $select_owner = mysqli_fetch_array($query_owner);
                            //ambil data owner terbaru (nama)
                            $nama_owner = $select_owner['nama'];

                            //query untuk menambah outlet
                            $qry_outlet= mysqli_query($konn,"insert into outlet (nama_outlet,id_owner) values ('outlet $nama_owner','$id_owner')") or die(mysqli_error($konn));
                            if($qry_outlet){
                                echo "<script>alert('Sukses menambahkan pengguna & owner');location.href='tampil_pengguna_owner.php';</script>";
                            }else{
                                echo "<script>alert('Gagal menambahkan owner');location.href='tampil_pengguna_owner.php';</script>";
                            }
                           
                         } else {
                             echo "<script>alert('Gagal menambahkan pengguna & owner');location.href='tampil_pengguna_owner.php';</script>";
                         }
                    }
                }
                ?>




<?php
//ini untuk hapus ya sayang

        if(isset($_POST['hapus'])){
            $id = $_POST['id'];
            include "../koneksi.php";
            $qry_hapus=mysqli_query($konn,"delete from user where
            id='$id'");
            if($qry_hapus){
                echo "<script>alert('Sukses menghapus pengguna');location.href='tampil_pengguna_owner.php';</script>";
            } else {
                echo "<script>alert('Gagal menghapus pengguna');location.href='tampil_pengguna_owner.php';</script>";
            }
            }
    ?>




