<?php
session_start();
    if($_POST){
        include "../koneksi.php";
        $qry_get_paket=mysqli_query($konn,"select * from paket where id_pkt='$_POST[jenis_paket]'");
        $dt_paket=mysqli_fetch_array($qry_get_paket);
        $qty= $_POST['qty'];
        $harga= $dt_paket['harga'];
        $total = $harga * $qty;
        $_SESSION['cart'][]=array(
            'id_pelanggan'=>$_POST['id'],
            'nama_pelanggan'=>$_POST['nama'],
            'id_outlet'=>$_POST['id_outlet'],
            'id_paket'=>$dt_paket['id_pkt'],
            'jenis'=>$dt_paket['jenis'],
            'qty'=>$_POST['qty'],
            'harga'=>$dt_paket['harga'],
            'total'=>$total,


        );
        $_SESSION['id_pelanggan']=$_POST['id'];
        header('location: keranjang.php');
    }

?>
