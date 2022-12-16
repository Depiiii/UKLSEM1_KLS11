<?php 
	require '../koneksi.php';
	date_default_timezone_set("Asia/Jakarta");
?>
<style>
	.judul{
		text-align: center;
	}
</style>
<html>
	<head>
		<title>LAPORAN WEB transaksi SUKA OLENG</title>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
		<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
	</head>
	<body>
		<script>window.print();</script>
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
						<div class="judul py-5 text-success">
						<h1>LAPORAN PENJUALAN DEP LAUNDRY</h1>
						<h5>Tanggal : <?php  echo date("j F Y, G:i");?></h5>
						</div>
                        
                        <table class="table table-hover table-striped">
                            
                       
                        
                       
                        

                        </thead>

                        <tbody>
        <?php 
                
                include "../koneksi.php";
                $id_tr = $_GET['id_transaksi'];
                $qry_member = mysqli_query($konn,"select m.nama, m.alamat, m.jenis_kelamin, m.tlp from member m join transaksi t on m.id = t.id_member where t.id='$id_tr' ");
                $no=0;
                $dt_pelanggan=mysqli_fetch_array($qry_member)
                // while($dt_pelanggan=mysqli_fetch_array($qry_member))
        
        // {
          
 ?>

<tr><th>NAMA PELANGGAN</th> 
 <td><?=$dt_pelanggan['nama']?></td>
</tr>
           
             <tr> <th>ALAMAT</th>
             <td><?=$dt_pelanggan['alamat']?></td>
             </tr>
             

             <tr><th>JENIS KELAMIN</th>
             <td><?=$dt_pelanggan['jenis_kelamin']?></td>
             </tr>
            
             <tr><th>NOMOR TELEPON</th>
             <td><?=$dt_pelanggan['tlp']?></td>
             </tr>

           
            </tr>
<br>




<?php
        // }
 ?>


                        <table class="table table-hover table-striped">
        <th>NO</th>
        <th>Tanggal beli</th>
        <!-- <th>nama member</th> -->
        <th>jenis paket</th>
        <th>harga</th>
        <th>Banyak</th>
        <th>total</th>
        <th>tgl bayar</th>
        <th>outlet</th>
        
    </thead>
    <tbody>
        <?php 
        
        include "../koneksi.php";
        $id_transaksi = $_GET['id_transaksi'];
        $qry_histori=mysqli_query($konn,"select * from transaksi where id='$id_transaksi'");
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


                // $qry_member = mysqli_query($konn,"select * from member where id='$id_member'");
                // $dt_member= mysqli_fetch_array($qry_member);

                $qry_outlet = mysqli_query($konn,"select * from outlet where id_outlet='$id_outlet'");
                $dt_outlet= mysqli_fetch_array($qry_outlet);
            

            ?>
            <?php
            $id = $dt_histori['id'];
        ?>
<tr>
            <td><?=$no?></td>
            <td><?=$dt_histori['tgl']?></td>
            <!-- <td><?=$dt_member['nama']?></td> -->
            <td><?php echo $barang_beli?></td>
            <td><?=$barang_harga?></td>
            <td><?=$barang_qty?></td>
            <td><?=$total?></td>
            <td><?=$dt_histori['tgl_bayar']?></td>
            <td><?=$dt_outlet['nama_outlet']?></td>


           
</tr>
        
        <?php
        
                                                    }
        ?>































    </tbody>
</table>
					<div class="clearfix"></div>
					<center>
                    <br>
						<h5 class="text-warning">Laporan Penjualan DEP LAUNDRY</h5>
					</center>
				</div>
			</div>
		</div>
	</body>
    
</html>
