<?php
    $id_outlet = $_POST["id"];
    $nama_outlet = $_POST["nama"];
    $alamat = $_POST["alamat"];
    $telp = $_POST['tlp'];

    include "../koneksi.php";
        $input = mysqli_query($konn, "UPDATE outlet SET nama_outlet='".$nama_outlet."', 
        alamat='".$alamat."', tlp='".$telp."' where id_outlet='".$id_outlet."'") or die (mysqli_error($konn)); 

        if ($input) {
            echo "<script>alert('Berhasil merubah outlet');location.href='outlet.php';</script>";
        }
        else {
            echo "<script>alert('Gagal merubah outlet');location.href='outlet.php';</script>";
        }
    

?>