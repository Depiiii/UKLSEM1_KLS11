<?php
        session_start();
include "navbar_admin.php";
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<?php
include "../koneksi.php";

?>
<?php
        if(@$_SESSION['cart'] == 0){
            echo '<script>alert("Keranjang anda kosong");location.href="tampil_pelanggan.php"</script>';
        }else{
            ?>
<h2 class="mb-4">Daftar paket di Keranjang</h2>
            <table class="table table-hover striped">
            <thead>
       
            <tr>
    
                <th>NO</th>
                <th>pelanggan</th>
                <th>jenis paket</th>
                <th>nama outlet</th>
                <th>Jumlah</th>
                <th>harga</th>
                <th>total</th>
                <th>aksi</th>
                <th></th>
    
            </tr>

        </thead>
    
        <tbody>
            <?php
            foreach (@$_SESSION['cart'] as $key_produk => $val_produk): ?>

                <tr>    

                    <td><?=($key_produk+1)?></td>
                    <td><?=$val_produk['nama_pelanggan']?></td>
                    <td><?=$val_produk['jenis']?></td>
                    <td><?=$val_produk['id_outlet']?></td>
                    <td><?=$val_produk['qty']?></td>
                    <td><?=$val_produk['harga']?></td>
                    <td><?=$val_produk['total']?></td>
                    <td><a href="hapus_keranjang.php?id=<?=$key_produk?>" class="btn btn-danger"><strong>X</strong></a></td>
    
                </tr>
                <?php endforeach ?>
            <?php

            }
        
        ?>
                </tbody>

</table>
                <form action="checkout.php" method="post">
                    <input type="submit" name="checkout" value="Check Out" class="btn btn-success col-3 mb-4 " style="float:right;" />
                </form>