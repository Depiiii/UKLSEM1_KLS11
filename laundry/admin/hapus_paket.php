<?php
include "navbar_admin.php";
?>

<?php
        if($_GET['id']){
        include "../koneksi.php";
        $qry_hapus=mysqli_query($konn,"delete from paket where
        id_pkt='".$_GET['id']."'");
        mysqli_error($konn);
        if($qry_hapus){
            echo "<script>alert('Sukses menghapus paket');location.href='paket_cucian.php';</script>";
        } else {
            echo "<script>alert('Gagal menghapus paket');location.href='paket_cucian.php';</script>";
        }
        }
?>