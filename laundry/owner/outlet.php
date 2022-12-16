<?php
include "navbar_owner.php";
?>
<?php
include "../koneksi.php";
?>
<?php   
$id=$_SESSION['id'];
    ?>
    
     <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />

     <div class="container col-10">
         <header class="">
                <div class="p-4 p-lg-5 bg-light rounded-3 text-center">
                    <div class="m-4 m-lg-5">
                        <h1 class="display-5 fw-bold">OUTLET DEP LAUNDRY</h1>
                    
                    </div>
                   
                </div>
        </header>

        <div class="row">
        <a href="tambah_outlet.php" class="btn btn-success mb-5 col-3">Tambah outlet</a>
  <div class="container col-11">
<table class="table table-hover table-striped">
    <thead>
      
        <th>ID OUTLET</th>
        <th>NAMA OUTLET</th>
        <th>ALAMAT</th>
        <th>TELP</th>
        <th>AKSI</th>
        <th></th>
</div>


<?php
include "../koneksi.php";
    ?>
        <?php
    $sql = mysqli_query($konn,"SELECT o.id_outlet, o.nama_outlet, u.username, o.alamat, o.tlp FROM outlet o join user u on u.id=o.id_owner where id_owner= '$id'" );
            while($outlet = mysqli_fetch_array($sql))     {
        ?>
    <tr>
   
        <td> <?=$outlet['id_outlet']?> </td>
        <td> <?=$outlet['nama_outlet']?> </td>
        <td> <?=$outlet['alamat']?> </td>
        <td> <?=$outlet['tlp']?> </td>
        <td>
        <a href="edit_outlet.php?id=<?=$outlet['id_outlet'] ?>"class="btn btn-success">Ubah </a>
        <a href="hapus_outlet.php?id=<?=$outlet['id_outlet'] ?>" onclick="return confirm('Are you sure you want to delete this item?') "class="btn btn-danger">Hapus</a>
        <a href="histori.php?id=<?=$outlet['id_outlet'] ?>"class="btn btn-warning">histori</a>
        </td>
    </tr>

                <?php
            }
                ?>

