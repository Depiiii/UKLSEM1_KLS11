<?php

include "navbar_kasir.php";
?>
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