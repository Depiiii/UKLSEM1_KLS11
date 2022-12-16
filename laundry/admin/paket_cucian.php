<?php
include "navbar_admin.php";
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

   <div class="container col-10">
        <div class="com-md py-5">
        <h2 align="center" class="display-5 fw-bold">PAKET DEP LAUNDRY</h2>
            <a href="tambah_paket.php" class="btn btn-success mb-5 col-3">Tambah Paket</a>
        <table class="table table-hover table-striped">
    <thead>
    <tr>

        <th>NO</th>
        <th>NAMA PAKET</th>
        <th>HARGA</th> 
        <th></th>
      
</tr>
    </thead>
    <tbody>
        <?php
        include "../koneksi.php";
        $qry_paket = mysqli_query($konn,"select * from paket");
        $no=0;
        while($data_paket = mysqli_fetch_array($qry_paket)){
        $no++;?>
        <tr><td><?=$no?> </td>
        <td> <?=$data_paket['jenis']?> </td>
        <td> <?=$data_paket['harga']?> </td>

        <td>
        <a href="edit_paket.php?id=<?=$data_paket['id_pkt'] ?>"class="btn btn-success">Ubah </a>
        <a href="hapus_paket.php?id=<?=$data_paket['id_pkt'] ?>" onclick="return confirm('Are you sure you want to delete this item?') "class="btn btn-danger">Hapus</a>
        </td>
        </tr>
        <?php
        }

        ?>
    </tbody>
    </table>

