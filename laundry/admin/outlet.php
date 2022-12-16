<?php
include "navbar_admin.php";
?>

<?php
include "../koneksi.php";
    ?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

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
        <th>OWNER</th>
        <th>ALAMAT</th>
        <th>TELP</th>
        <th>AKSI</th>
        <th></th>
</div>


<?php
include "../koneksi.php";
    ?>
        <?php
    $sql = mysqli_query($konn,"SELECT o.id_outlet, o.nama_outlet, u.username, o.alamat, o.tlp FROM outlet o join user u on u.id=o.id_owner where role= 'owner'" );
            while($outlet = mysqli_fetch_array($sql))     {
        ?>
    <tr>
   
        <td> <?=$outlet['id_outlet']?> </td>
        <td> <?=$outlet['nama_outlet']?> </td>
        <td> <?=$outlet['username']?> </td>
        <td> <?=$outlet['alamat']?> </td>
        <td> <?=$outlet['tlp']?> </td>
        <td>
        <a href="edit_outlet.php?id=<?=$outlet['id_outlet'] ?>"class="btn btn-success">Ubah </a>
        <a href="hapus_outlet.php?id=<?=$outlet['id_outlet'] ?>" onclick="return confirm('Are you sure you want to delete this item?') "class="btn btn-danger">Hapus</a>
        </td>
    </tr>

                <?php
            }
                ?>

