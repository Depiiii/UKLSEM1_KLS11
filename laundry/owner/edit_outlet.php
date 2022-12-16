<?php
include "navbar_owner.php";
?>
<?php
include "../koneksi.php";
$query_outlet = mysqli_query($konn, "select * from outlet where id_outlet='".$_GET['id']."'") or die (mysqli_error($konn));    
$data_outlet = mysqli_fetch_array($query_outlet);
?>
<br></br>
<div class="container">
<div class="card">
    <h1 class="card-header">Ubah outlet</h1>
    <div class="card-body">
        <form method="POST" action="proses_edit_outlet.php" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?=$data_outlet['id_outlet']?>">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama outlet</label>
                <input type="text" class="form-control" name="nama" value="<?=$data_outlet['nama_outlet']?>" placeholder="Masukkan nama produk" required>
            </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">alamat</label>
                    <textarea class="form-control" name="alamat" row="3" placeholder="Masukkan alamat outlet" required><?=$data_outlet['alamat']?></textarea>
                </div>
                    <div class="mb-3">
                        <label for="tlp" class="form-label">nomor telepon</label>
                        <textarea class="form-control" name="tlp" row="3" placeholder="Masukkan nomor telp outlet" required><?=$data_outlet['tlp']?></textarea>
                    </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
</div>
