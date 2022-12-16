<?php
include "navbar_admin.php";
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<?php
include "../koneksi.php";
$query_paket = mysqli_query($konn, "select * from paket" ) or die (mysqli_error($konn));    
$data_paket = mysqli_fetch_array($query_paket);
?>
<br></br>
<div class="container">
<div class="card">
    <h1 class="card-header">Ubah paket</h1>
    <div class="card-body">
        <form method="POST" action="proses_edit_paket.php" enctype="multipart/form-data">
            <input type="hidden" name="id_pkt" value="<?=$data_paket['id_pkt']?>">
            <div class="mb-3">
                <label for="jenis" class="form-label">jenis paket</label>
                <input type="text" class="form-control" name="jenis" value="<?=$data_paket['jenis']?>" placeholder="Masukkan jenis paket " required>
            </div>
            <div class="mb-3">
                <label for="harga" class="form-label">harga</label>
                <input type="text" class="form-control" name="harga" value="<?=$data_paket['harga']?>" placeholder="Masukkan harga paket" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>