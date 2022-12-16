
    <?php
    include "../koneksi.php";
    ?>
    <?php
include "navbar_owner.php";
$user=$_SESSION['id'];

?>
     <div class="container col-10">
         <header class="">
                <div class="p-4 p-lg-5 bg-light rounded-3 text-center">
                    <div class="m-4 m-lg-5">
                        <h1 class="display-5 fw-bold">DATA DIRI PENGGUNA</h1>
                    
                    </div>
                   
                </div>
        </header>
    <?php
    $qry_user = mysqli_query($konn,"select * from user where id='$user'");
    while($data_pengguna = mysqli_fetch_array($qry_user)){
        $row = mysqli_num_rows($qry_user);
    ?>
 
        
        <div class="container">
        <th>NAMA OWNER</th>
        <input type="text" name="nama" value="<?php echo $data_pengguna['nama']?>" id="" class="form-control" readonly>
        <br>
        <th>USERNAME OWNER</th>
        <input type="text" name="username" value="<?php echo $data_pengguna['username']?>" id="" class="form-control" readonly>
        <br>
        <th>ROLE</th>
        <input type="text" name="role" value="<?php echo $data_pengguna['role']?>" id="" class="form-control" readonly>
     
        <td>
    


<?php
    }
    ?>   