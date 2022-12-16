<?php
        session_start();
include "navbar_admin.php";
?>
<?php
include "../koneksi.php";
?>
<?php 
    include "../koneksi.php";
    date_default_timezone_set("Asia/Jakarta");
    $tgl = date('y-m-d');
    $lama_hari = '3';
    $batas_waktu=date('d-m-y',mktime(0,0,0,date('m'),(date('d')+$lama_hari),date('Y')));
    $cart=@$_SESSION['cart'];
    $id_member=@$_SESSION['cart'][0]['id_pelanggan'];
    $id_user=$_SESSION['id'];
    $id_outlet=@$_SESSION['cart'][0]['id_outlet'];

    // echo $id_member;
    if(($cart)!=null){
        mysqli_query($konn,"insert into transaksi (id_member,id_outlet,tgl,batas_waktu,id_user) value ('$id_member','$id_outlet','$tgl','$batas_waktu','$id_user')")  or die (mysqli_error($konn));
         $id=mysqli_insert_id($konn);
        foreach ($cart as $key_produk => $val_produk) {
            mysqli_query($konn,"insert into detail_transaksi(id_transaksi,id_paket,qty,total) value('".$id."','".$val_produk['id_paket']."','".$val_produk['qty']."','".$val_produk['total']."')") or die (mysqli_error($konn));
        }
        unset($_SESSION['cart']);
        header('location: transaksi.php');
    }
?>
