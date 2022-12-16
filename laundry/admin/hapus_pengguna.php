<?php
include "navbar_admin.php";
?>

<?php
        if($_GET['id']){
        include "../koneksi.php";
        $qry_hapus=mysqli_query($konn,"delete from user where
        id='".$_GET['id']."'");
        if($qry_hapus){
            echo "<script>alert('Sukses menghapus pengguna');location.href='tampil_pengguna.php';</script>";
        } else {
            echo "<script>alert('Gagal menghapus pengguna');location.href='tampil_pengguna.php';</script>";
        }
        }
?>