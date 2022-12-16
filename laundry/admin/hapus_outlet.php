<?php
include "navbar_admin.php";
?>

<?php
        if($_GET['id']){
        include "../koneksi.php";
        $qry_hapus=mysqli_query($konn,"delete from outlet where
        id_outlet='".$_GET['id']."'");
         mysqli_error($konn);
        if($qry_hapus){
            echo "<script>alert('Sukses menghapus outlet');location.href='outlet.php';</script>";
        } else {
            echo "<script>alert('Gagal menghapus outlet');location.href='outlet.php';</script>";
        }
        }
?>