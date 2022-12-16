<?php
include "navbar_admin.php";
?>

            <?php
                if($_GET['id']){
                    include "../koneksi.php";
                    $qry=mysqli_query($konn,"select * from user where
                    id='".$_GET['id']."'");
                    $dt= mysqli_fetch_array($qry);
                    
                }
            ?>
            <body>
            <div class="container col-10">
                        <div class="col-md py-5">
                        <h3> Ubah Pengguna</h3>
                            <form action="" method="post">
                                <input type="hidden" name="id" value="<?=$dt['id']; ?>" />
                                
                                Nama Pengguna :

                                <input type="text" name="nama" value="<?=$dt['nama']?>" class="form-control">

                                Username :

                                <input type="text" name="username" value="<?=$dt['username']?>" class="form-control">

                                Password :

                                <input type="password" name="password" value="" class="form-control">

                                role :

                                <input type="text" name="role" value="<?=$dt['role']?>" class="form-control">
                                </br>

                                <input type="submit" name="edit" value="Ubah Petugas" class="btn btn-primary" style="width: 100%">

                            </form>
                            <?php

                            if(isset($_POST['edit'])){

                            $id=$_POST['id'];

                            $nama=$_POST['nama'];

                            $username=$_POST['username'];

                            $password=$_POST['password'];;

                            if(empty($nama)){

                                echo "<script>alert('nama petugas tidak boleh kosong');location.href='ubah_pengguna.php';</script>";


                            } elseif(empty($username)){

                                echo "<script>alert('username tidak boleh kosong');location.href='ubah_pengguna.php';</script>";

                            } else {

                                include "../koneksi.php";

                                if(empty($password)){

                                    $update=mysqli_query($konn,"update user set nama='".$nama."', username='".$username."' where id = '".$id."' ") or die(mysqli_error($konn));

                                    if($update){

                                        echo "<script>alert('Sukses update pengguna');location.href='tampil_pengguna.php';</script>";

                                    } else {

                                        echo "<script>alert('Gagal update pengguna');location.href='ubah_pengguna.php?id=".$id."';</script>";

                                    }

                                } else {

                                    $update=mysqli_query($konn,"update user set nama='".$nama."',username='".$username."', password='".md5($password)."'where id = '".$id."'") or die(mysqli_error($konn));

                                    if($update){
                                                
                                        echo "<script>alert('Sukses update pengguna');location.href='tampil_pengguna.php';</script>";

                                    } else {

                                        echo "<script>alert('Gagal update pengguna');location.href='ubah_pengguna.php?id=".$id."';</script>";

                                    }

                                }



                            }

                            }

                            ?>
