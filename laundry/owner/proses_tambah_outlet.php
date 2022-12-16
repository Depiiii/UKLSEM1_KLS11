<?php
if($_POST) {
    session_start();
    $id_owner = $_SESSION['id'];
    $nama=$_POST['nama'];
    $alamat=$_POST['alamat'];
    $tlp=$_POST['tlp'];

    if(empty($nama)){
        echo "<script>alert('nama outlet tidak boleh kosong');location.href='tambah_outlet.php';</script>";
    } elseif(empty($alamat)){
        echo "<script>alert('alamat outlet tidak boleh kosong');location.href='tambah_outlet.php';</script>";
    } elseif(empty($tlp)){
        echo "<script>alert('telpon outlet tidak boleh kosong');location.href='tambah_outlet.php';</script>"; 
    } else {
                include "../koneksi.php";
                
                $insert=mysqli_query($konn, "INSERT INTO `outlet` (nama_outlet, alamat, tlp, id_owner) VALUES ('$nama', '$alamat', '$tlp','$id_owner')") or die(mysqli_error($konn));

                if($insert) {
                    echo "<script>alert('Sukses menambahkan outlet');location.href='outlet.php';</script>";
                } else {
                    echo "<script>alert('Gagal menambahkan outlet');location.href='outlet.php';</script>";
                }
}
}
?>