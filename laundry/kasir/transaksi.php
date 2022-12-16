<?php
include "navbar_kasir.php";
$tgl = date('y-m-d');
$idd=$_SESSION['id_outlet'];
date_default_timezone_set("Asia/Jakarta");
?>
    <?php
    include "../koneksi.php";
    ?>

  <div class="container col-11">
  <h1 class="py-5" align="center" > Transaksi Laundry</h1>
  <table class="table table-hover table-striped">
        <th>NO</th>
        <th>Tanggal beli</th>
        <th>nama member</th>
        <th>jenis paket</th>
        <th>harga</th>
        <th>Banyak</th>
        <th>total</th>
        <th>tgl bayar</th>
        <th>outlet</th>
        <th>status</th>
        <th>aksi</th>
        <th>pembayaran</th>
        <th>aksi</th>
        <th></th> 
        
    </thead>
    <tbody>
        <?php 
        
        include "../koneksi.php";
        $qry_histori=mysqli_query($konn,"select * from transaksi where  id_outlet= '".$_SESSION['id_outlet']."'order by id desc" );
        $no=0;
        while($dt_histori=mysqli_fetch_array($qry_histori))

{

    $barang_beli="<ol>";
    $barang_harga="<ul>";
    $total=0;
    $barang_qty="<ul>";
  
    $qry_produk=mysqli_query($konn,"select * from  detail_transaksi join paket on paket.id_pkt=detail_transaksi.id_paket where id_transaksi = '".$dt_histori['id']."'");
    while($dt_jenis=mysqli_fetch_array($qry_produk)){
        $barang_beli.="<li>".$dt_jenis['jenis']."</li>";
        $barang_harga.="<li>".$dt_jenis['harga']."</li>";
        $barang_qty.="<li>".$dt_jenis['qty']."</li>";

        $total+=$dt_jenis['total'];
    }

            $no++;

            $id_member=$dt_histori['id_member'];
            $id_outlet=$dt_histori['id_outlet'];


            $barang_total="<ul>";
            
            $qry_paket=mysqli_query($konn,"select * from  detail_transaksi where id_transaksi = '".$dt_histori['id']."'")or die (mysqli_error($konn));
            while($dt_detail=mysqli_fetch_array($qry_paket))
            {

                 $id_pkt=$dt_detail['id_paket'];
                
                $qry_paket = mysqli_query($konn,"select * from paket where id_pkt='$id_pkt'");
                $dt_paket= mysqli_fetch_array($qry_paket);
                $barang_total.="<li>".$dt_detail['total']."</li>";
            }
            $barang_harga.="</ul>";
            $barang_total.="</ul>";
            $barang_qty.="</ul>";


                $qry_member = mysqli_query($konn,"select * from member where id='$id_member'");
                $dt_member= mysqli_fetch_array($qry_member);

                $qry_outlet = mysqli_query($konn,"select * from outlet join user on user.id_outlet=outlet.id_outlet where user.id_outlet= '".$_SESSION['id_outlet']."'");
                $dt_outlet= mysqli_fetch_array($qry_outlet);
            

            ?>
            <?php
            $id = $dt_histori['id'];
        ?>
<tr>
            <td><?=$no?></td>
            <td><?=$dt_histori['tgl']?></td>
            <td><?=$dt_member['nama']?></td>
            <td><?php echo $barang_beli?></td>
            <td><?=$barang_harga?></td>
            <td><?=$barang_qty?></td>
            <td><?=$total?></td>
            <td><?=$dt_histori['tgl_bayar']?></td>
            <td><?=$dt_outlet['nama_outlet']?></td>


            <td style="width: 250px;">
                                                <?php   
                                                $status = $dt_histori['status'];
                                                ?>
                                                <?php
                                                $id = $dt_histori['id'];
                                                ?>
                                                <?php
                                                if ($status == "baru"){
                                                    ?>
                                                    <div class="alert alert-primary" role="alert">baru</div>
                                                    <?php
                                                }elseif ($status == "proses"){
                                                    ?>
                                                <div class="alert alert-success" role="alert">proses</div>
                                                    <?php
                                                }elseif ($status == "selesai"){
                                                    ?>
                                               <div class="alert alert-secondary" role="alert">selesai</div>
                                                    <?php
                                                }elseif ($status == "diambil"){
                                                    ?>
                                                    <div class="alert alert-dark" role="alert">diambil</div>
                                                    <?php
                                                }else{
                                                    ?>
                                                    <div class="btn btn-danger" style="pointer-events: none;width:200px;">gagal memproses produk</button>
                                                    <?php
                                                }
                                                ?>                          
             </td>
        <td style="width: 250px;">
                                                    <?php
                                                        $status = $dt_histori['status'];
                                                    ?>
                                                <?php
                                                    if ($status == "baru"){
                                                ?>
                                                        <form action="" method="post">
                                                        <input type="hidden" name="id" value="<?php echo $id?>">
                                                    <button type="sumbit" name="baru" class="btn btn-outline-primary">proses Produk</button>
                                                    </form>
                                                    <?php
                                                        }elseif ($status == "proses"){
                                                    ?>
                                                            <form action="" method="post">
                                                            <input type="hidden" name="id" value="<?php echo $id?>">
                                                            <button type="submit"  name="proses" class="btn btn-outline-primary">barang siap</button>
                                                            </form>
                                                            <?php
                                                                }elseif ($status == "selesai"){
                                                            ?>
                                                                <form action="" method="post">
                                                                <input type="hidden" name="id" value="<?php echo $id?>">
                                                                <button type="submit" name="selesai" class="btn btn-outline-primary">barang diambil</button>
                                                                </form>
                                                                    <?php
                                                                        }elseif ($status == "diambil"){
                                                                            ?>
                                                                                <?php
                                                                                    }else{
                                                                                ?>
                                                                                    <div class="btn btn-danger" style="pointer-events: none;width:200px;">gagal memproses produk</button>
                                                                                    <?php
                                                                                    }
                                                                                    ?>
                </td>                                                                    
                                               <td style="width: 250px;">
                                                <?php   
                                                $pembayaran = $dt_histori['pembayaran'];
                                                ?>
                                                <?php
                                                $id = $dt_histori['id'];
                                                ?>
                                                <?php
                                               
                                                if ($pembayaran == "belum_dibayar"){
                                                    ?>
                                                    <div class="alert alert-primary" role="alert">belum dibayar</div>
                                                    <?php
                                                }elseif ($pembayaran == "dibayar"){
                                                    ?>
                                                <div class="alert alert-success" role="alert">laundry telah dibayar </div>
                                                <td>
                                                <a href="cetak.php?id_transaksi=<?php echo $dt_histori['id']?>" class="btn btn-outline-primary">CETAK</a>
                                            </td> 
                                            <?php
                                        }else{
                                           ?>
                                                    <div class="btn btn-danger" style="pointer-events: none;width:200px;">gagal memproses produk</button>
                                        </div>    <?php
                                                }
                                                ?>                                                                                    
</td>

        <!-- BUTTON PEMBAYARAN -->

        <td style="width: 250px;">
                                                    <?php
                                                        $pembayaran = $dt_histori['pembayaran'];
                                                    ?>
                                                <?php
                                                    if ($pembayaran == "belum_dibayar"){
                                                ?>
                                                        <form action="" method="post">
                                                        <input type="hidden" name="id" value="<?php echo $id?>">
                                                    <button type="sumbit" name="belum_dibayar" class="btn btn-outline-primary">sudah dibayar</button>
                                                    </form>
                                                    <?php
                                                        }elseif ($pembayaran == "dibayar"){
                                                    ?>
                                                       <?php
                                                      }
                                                     ?>
        </td>
</tr>
        
        <?php
        
                                                    }
        ?>

    </tbody>
</table>

<?php
    if (isset($_POST['baru'])){
        $id_transaksi = $_POST['id'];
        include "../koneksi.php";
        $sql = mysqli_query($konn,"update transaksi set status = 'proses' WHERE id ='$id_transaksi' ");
        if ($sql) { 
            echo "<script>location.href='transaksi.php'</script>";
        }
    }

?>


<?php
    if (isset($_POST['proses'])){
        $id_transaksi = $_POST['id'];
        include "../koneksi.php";
        $sql = mysqli_query($konn,"update transaksi set status = 'selesai' WHERE id ='$id_transaksi' ");
        if ($sql) { 
            echo "<script>location.href='transaksi.php'</script>";
        }
    }

?>


<?php
    if (isset($_POST['selesai'])){
        $id_transaksi = $_POST['id'];
        include "../koneksi.php";
        $sql = mysqli_query($konn,"update transaksi set status = 'diambil' WHERE id ='$id_transaksi' ");
        if ($sql) { 
            echo "<script>location.href='transaksi.php'</script>";
        }
    }

?>

<?php
    if (isset($_POST['belum_dibayar'])){
        $id_transaksi = $_POST['id'];
        include "../koneksi.php";
        $bayar = mysqli_query($konn,"update transaksi set tgl_bayar='$tgl' , pembayaran = 'dibayar' WHERE id ='$id_transaksi' ");
        if ($bayar) { 
            echo "<script>location.href='transaksi.php'</script>";
        }
    }

?>