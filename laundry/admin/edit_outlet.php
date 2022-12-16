<?php
include "navbar_admin.php";
?>
<?php
include "../koneksi.php";
    $qry_outlet = mysqli_query($konn,"select * from user where role = 'owner'");
    $query_outlet = mysqli_query($konn, "select * from outlet join user on user.id=outlet.id_owner where outlet.id_outlet='".$_GET['id']."'") or die (mysqli_error($konn));    
    $data_outlet = mysqli_fetch_array($query_outlet);
?>

<br></br>
<div class="container">
<div class="card">
    <h1 class="card-header">Ubah outlet</h1>
    <div class="card-body">

        <form method="POST" action="">
            <input type="hidden" name="id" value="<?=$data_outlet['id_outlet']?>">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama outlet</label>
                <input type="text" class="form-control" name="nama" value="<?=$data_outlet['nama_outlet']?>" >
            </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">alamat</label>
                    <input class="form-control" name="alamat"  placeholder="Masukkan alamat outlet" value="<?=$data_outlet['alamat']?>">
                </div>
                    <div class="mb-3">
                        <label for="tlp" class="form-label">nomor telepon</label>
                        <input class="form-control" name="tlp"  placeholder="Masukkan nomor telp outlet" value="<?=$data_outlet['tlp']?>" required>
                    </div>
                    <label for="owner" class="form-label">owner</label>
                    <select name="id_owner" id="" class="form-control">
                    <option value="">pilih owner</option>
                        <?php
                            while($outlet = mysqli_fetch_array($qry_outlet)){
                            $id_outlet = $outlet['id_owner'];
                            $username = $outlet['username'];

                        ?>
                            <option value="<?php echo $id_owner?>"><?php echo $username?></option>
                        <?php
                    }
                    ?>
                    </select>
<br>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
</div>

<?php
if (isset($_POST['submit'])){
    $id_outlet = $_GET['id'];
    $nama_outlet = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $telp = $_POST['tlp'];
    $id_owner = $_POST['id_owner'];

    include "../koneksi.php";
        $input = mysqli_query($konn, "UPDATE outlet SET nama_outlet = '$nama_outlet', alamat = '$alamat', tlp = '$telp' WHERE outlet.id_outlet = '$id_outlet'") or die (mysqli_error($konn)); 

        if ($input) {
            echo "<script>alert('Berhasil merubah outlet');location.href='outlet.php';</script>";
        }
        else {
            echo "<script>alert('Gagal merubah outlet');location.href='outlet.php';</script>";
        }
}

?>