<?php
include "../koneksi.php";?>
<?php
    $id = $_POST["id"];
    $nama = $_POST["nama"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $role = $_POST["role"];
    $outlet= $_POST["id_outlet"];

    $input = mysqli_query($konn, "UPDATE user SET 
    nama='".$nama."', username='".$username."', password='".md5($password)."', role='".$role."', id_outlet='".$outlet."'
    where id='".$id."'")or die(mysqli_error($konn));

    if ($input) {
        echo "<script>alert('Berhasil merubah pengguna');location.href='tampil_pengguna_kasir.php';</script>";
    }
    else {
        echo "<script>alert('Gagal merubah pengguna');location.href='tampil_pengguna_kasir.php';</script>";
    }


?>