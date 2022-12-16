<?php
include "navbar_kasir.php";
$tgl = date('d-m-y');
?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

   <div class="container col-11">

        <div class="col-md py-5">
        <center><h1>DAFTAR PELANGGAN</h1></center>
        <div class="mb-2">

        <form action="" method="post" class="form-inline py-3" style="float: right">
        <input name="search" class="form-control mr-sm-2" type="search" placeholder="Cari pelanggan" aria-label="Search" value="<?php
        if(isset($_POST['cari'])){
            echo $_POST['search'];
        }
        ?>">
        
        <button name="cari" class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
        </form>

        <button type="button" class="btn btn-success py-2 col-sm-2 mb-2" data-toggle="modal" data-target="#tambah">
        Tambah Pelanggan
        </button>

        </div>

        <?php
      include "../koneksi.php";
    if(isset($_POST['cari'])){
      $cari = $_POST['search'];
      $qry_member = mysqli_query($konn,"select * from member where nama like'%".$cari."%'");
    }else{
        $qry_member = mysqli_query($konn,"select * from member");
    }
    $row = mysqli_num_rows($qry_member);
    if ($row < 1){
      ?>
      <div class="col-12 py-5">
      <center>
        <h1 style="color:red;">
          <b>
            Mohon Maaf, Pelanggan Yang Anda Cari Tidak Ditemukan
          </b>
        </h1>
      </center>
      </div>

      <?php
    }else{
        ?>
        <table class="table table-hover table-striped">
    <thead>
    <tr>

        <th>NO</th>
        <th>NAMA </th>
        <th>ALAMAT</th> 
        <th>JENIS KELAMIN</th>
        <th>TLP</th>
        <th></th>
</tr>
    </thead>
    <tbody>
        <?php
        $no=0;
        while($data_pelanggan = mysqli_fetch_array($qry_member)){
        $no++;?>
        <tr><td><?=$no?> </td>
        <td> <?=$data_pelanggan['nama']?> </td>
        <td> <?=$data_pelanggan['alamat']?> </td>
        <td> <?=$data_pelanggan['jenis_kelamin']?> </td>
        <td> <?=$data_pelanggan['tlp']?> </td>
        <td>
            <form action="" method="post" style="float:right">

            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#transaksi<?php echo $data_pelanggan['id']?>">
            Buat Transaksi Baru
            </button>

            <button type="button" class="btn btn-warning text-light" data-toggle="modal" data-target="#edit<?php echo $data_pelanggan['id']?>">
            Edit
            </button>
            <input type="hidden" name="id"  value="<?php echo $data_pelanggan['id']?>">

            <input type="submit" name="hapus" value="Hapus" onclick="return confirm('Are you sure you want to delete this item?') "class="btn btn-danger">
            </form>
            
        </td>


            <!-- Modal Transaski -->
            <div class="modal fade" id="transaksi<?php echo $data_pelanggan['id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Transaksi Baru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="masukkan_keranjang.php" method="post">
                <div class="modal-body">
                    
                        <?php
                        include "../koneksi.php";
                        ?>
                            <?php
                            $id_pelanggan = $data_pelanggan['id'];
                            $sql = mysqli_query($konn,"select * from member where id='$id_pelanggan' ");
                            $pelanggan = mysqli_fetch_array($sql);

                            ?>
                                    <?php
                            $jenis = mysqli_query($konn,"select * from paket ");
                            ?>
                             <?php
                            $qry_outlet = mysqli_query($konn,"select * from outlet where id_outlet='".$_SESSION['id_outlet']."'");
                            $dt_outlet = mysqli_fetch_array($qry_outlet);
                            ?>

                    <label for="">Member</label>
                    <input type="hidden" name="id"  value="<?php echo $pelanggan['id']?>">
                    <input type="text" name="nama" value="<?php echo $pelanggan['nama']?>" id="" class="form-control" readonly>

                    <label for="">alamat</label>
                    <input type="text" name="alamat" value="<?php echo $pelanggan['alamat']?>" id="" class="form-control" readonly>

                    <label for="">no telp</label>
                    <input type="text" name="tlp" value="<?php echo $pelanggan['tlp']?>" id="" class="form-control" readonly>

                    <label for="">Tanggal Beli</label>
                    
                    <input type="text" name="tgl_beli" value="<?php echo $tgl?>" id="" class="form-control" readonly>
                    <input type="hidden" name="id_user"  value="<?php echo $_SESSION['id']?>">

                    <label for="">outlet</label>
                    <input type="text" name="outlett" value="<?php echo $dt_outlet['nama_outlet']?>" id="" class="form-control" readonly>
                    <input type="hidden" name="id_outlet"  value="<?php echo $dt_outlet['id_outlet']?>">

                    <label for="">Jenis Paket</label>
                    <br>
                    <select name="jenis_paket" id="" class="form-control">
                    <option value="">Pilih paket</option>
                        <?php
                            while($paket = mysqli_fetch_array($jenis)){
                            $id = $paket['id_pkt'];
                            $JenisPaket = $paket['jenis'];

                        ?>
                            <option value="<?php echo $id?>"><?php echo $JenisPaket?></option>
                        <?php
                    }
                    ?>

                    </select>

                        <div class="row mx-1">
                            <label for="">Banyak</label>
                            <input type="number" name="qty" class="form-control col-3" value="1">
                           
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Masukkan Keranjang</button>
                    
                </div>
                </form>
                </div>
            </div>
            </div>




            <!-- Modal Edit -->
            <div class="modal fade" id="edit<?php echo $data_pelanggan['id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Pelanggan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <form action="" method="post">
                    <input type="hidden" name="id"  value="<?php echo $data_pelanggan['id']?>">
                    Nama :

                    <input type="text" name="nama" value="<?php echo $data_pelanggan['nama']?>" class="form-control">

                    Alamat :

                    <input type="text" name="alamat" value="<?php echo $data_pelanggan['alamat']?>" class="form-control">

                    Jenis Kelamin :

                    <select name="gender" id="" class="form-control">
                        <option value=""><?php echo $data_pelanggan['jenis_kelamin']?></option>
                        <option value="laki-laki">Laki_Laki</option>
                        <option value="perempuan">Perempuan</option>
                    </select>

                    No Tlpn :

                    <input type="text" name="tlp" value="<?php echo $data_pelanggan['tlp']?>" class="form-control">
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" name="edit" value="Ubah" class="btn btn-success">
                    </form>
            </div>
            </div>

        </tr>
    

        
        <?php
        }
    }

        ?>
    </tbody>
    </table>

        <!-- Modal Tambah -->
        <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Pelanggan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="" method="post">

                    Nama :

                    <input type="text" name="nama" value="" class="form-control">

                    Alamat :

                    <input type="text" name="alamat" value="" class="form-control">

                    Jenis Kelamin :

                    <select name="gender" id="" class="form-control">
                        <option value="">Pilih Jenis Kelamin</option>
                        <option value="laki-laki">Laki_Laki</option>
                        <option value="perempuan">Perempuan</option>
                    </select>
                    
                    No Tlpn :

                    <input type="text" name="tlp" class="form-control">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <input type="submit" name="simpan" value="Tambah" class="btn btn-success">
                </form>
            </div>
            </div>
        </div>
        </div>

        <?php

// ini untuk simpan 

if(isset($_POST['simpan'])){

    $nama=$_POST['nama'];
    $alamat = $_POST['alamat'];
    $gender = $_POST['gender'];
    $tlp = $_POST['tlp'];

    if(empty($nama)){
        echo "<script>alert('nama pengguna tidak boleh kosong');location.href='tampil_pelanggan.php';</script>";
    } elseif(empty($alamat)){

        echo "<script>alert('alamat pengguna tidak boleh kosong');location.href='tampil_pelanggan.php';</script>";
    } elseif(empty($gender)){

        echo "<script>alert('Gender tidak boleh kosong');location.href='tampil_pelanggan.php';</script>";
    } elseif(empty($tlp)){

        echo "<script>alert('No tlpn tidak boleh kosong');location.href='tampil_pelanggan.php';</script>";
    }   else {
        include "../koneksi.php";

        $insert=mysqli_query($konn,"insert into member (nama, alamat, jenis_kelamin, tlp) value ('$nama','$alamat','$gender','$tlp')") or die(mysqli_error($konn));

        if($insert){
           echo "<script>alert('Sukses Tambah');location.href='tampil_pelanggan.php';</script>";
         } else {
             echo "<script>alert('Gagal Tambah');location.href='tampil_pelanggan.php';</script>";
         }
    }
}
?>




<?php
//ini untuk hapus

        if(isset($_POST['hapus'])){
        include "../koneksi.php";
        $id = $_POST['id'];
        $qry_hapus=mysqli_query($konn,"delete from member where id='$id'");
        if($qry_hapus){
            echo "<script>location.href='tampil_pelanggan.php';</script>";
          } else {
              echo "<script>alert('Gagal Hapus');location.href='tampil_pelanggan.php';</script>";
          }
        }
?>



<?php

// Ini Buat edit 

                            if(isset($_POST['edit'])){

                            $id=$_POST['id'];

                            $nama=$_POST['nama'];

                            $alamat=$_POST['alamat'];

                            $jenis_kelamin=$_POST['gender'];

                            $tlp=$_POST['tlp'];

                            if(empty($nama)){

                                echo "<script>alert('nama pelanggan tidak boleh kosong');location.href='ubah_pelanggan.php';</script>";


                            } elseif(empty($alamat)){

                                echo "<script>alert('alamat tidak boleh kosong');location.href='ubah_pelanggan.php';</script>";

                                
                            } elseif(empty($jenis_kelamin)){

                                echo "<script>alert('jenis kelamin tidak boleh kosong');location.href='ubah_pelanggan.php';</script>";
                                
                            } elseif(empty($tlp)){

                                echo "<script>alert('telpon tidak boleh kosong');location.href='ubah_pelanggan.php';</script>";



                                } else {

                                    $update=mysqli_query($konn,"update pelanggan set nama='".$nama."',alamat='".$alamat."',jenis_kelamin='".$jenis_kelamin."',tlp='".$tlp."'where id = '".$id."'") or die(mysqli_error($konn));

                                    if($update){
                                                
                                        echo "<script>alert('Sukses update pelanggan');location.href='tampil_pelanggan.php';</script>";

                                    } else {

                                        echo "<script>alert('Gagal update pelanggan');location.href='tampil_pelanggan.php';</script>";

                                    }

                                }



                            }

                            

?>


