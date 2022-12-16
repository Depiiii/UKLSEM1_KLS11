<?php
if (isset($_POST['submit'])){
    ?>
    <?php
include "../koneksi.php";?>
<?php
    $id_pkt = $_POST["id_pkt"];
    $jenis = $_POST["jenis"];
    $harga = $_POST["harga"];

    $input = mysqli_query($konn, "UPDATE paket SET 
    jenis='".$jenis."', harga='".$harga."'
    where id_pkt='".$id_pkt."'");

    if ($input) {
        echo "<script>alert('Berhasil merubah paket');location.href='paket_cucian.php';</script>";
    }
    else {
        echo "<script>alert('Gagal merubah paket');location.href='paket_cucian.php';</script>";
    }
}

?>