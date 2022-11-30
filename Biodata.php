<?php
// error_reporting(0);
include_once 'function.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <link rel="stylesheet" href="ASSETS/css/data.css">
    <link rel="stylesheet" href="BOOTSTRAP/css/bootstrap.min.css">
</head>
<nav class="navbar bg-danger fixed-top">
    <div class="container-fluid">
        <span class="navbar-brand mb-0 h1 text-light ">BIODATA SISWA</span>
        <h4>Hai..! <span><?php echo $_SESSION['username'] ?></span> selamat datang di halaman data siswa.</h4>
        <div class="d-grid gap-2 d-md-block">
            <a href="from.php" onclick="return confirm('klik ok untuk melanjutkan!')"><button type="button" class="btn btn-warning">Kembali</button></a>
            <!-- <a href="Sign.php" onclick="return confirm('Yakin ingin keluar dari halaman ini?')"><button type="button" class="btn  btn-danger">Log out</button></a> -->
        </div>
    </div>
</nav>

<body>
    <div class="bg">
        <div class="mx-auto ">
            <!-- untuk mengeluarkan data -->
            <div class="card">
                <div class="card-header text-white bg-danger">
                    Data Mahasiswa
                    <form class="d-flex" method="POST">
                        <?php
                        $kata_kunci = "";
                        if (isset($_POST['kata_kunci'])) {
                            $kata_kunci = $_POST['kata_kunci'];
                        }
                        ?>
                        <input class="form-control me-2" name="kata_kunci" value="<?php echo $kata_kunci; ?>" type="search" placeholder="Cari disini" aria-label="Search">
                        <button class="btn btn-success mx-sm-2" type="submit" value="pilih" >Search</button>
                        <button class="btn btn-warning" type="submit" value="all" >All</button>
                    </form>
                </div>
                <div class="card-body">
                    <table class="table  table-hover">
                        <br>
                        <thead>
                            <tr>
                                <th scope="col" class="bg-danger text-white">No</th>
                                <th scope="col" class="bg-danger text-white">NIM</th>
                                <th scope="col" class="bg-danger text-white">Nama</th>
                                <th scope="col" class="bg-danger text-white">Alamat</th>
                                <th scope="col" class="bg-danger text-white">Jenis Kelamin</th>
                                <th scope="col" class="bg-danger text-white">Tanggal Lahir</th>
                                <th scope="col" class="bg-danger text-white">Jurusan</th>
                                <th scope="col" class="bg-danger text-white">Aksi</th>

                            </tr>
                        </thead>
                        <?php

                        include "config.php";
                        if (isset($_POST['kata_kunci'])) {
                            $kata_kunci = trim($_POST['kata_kunci']);
                            $sql = "select * from mahasiswa where nim like '%" . $kata_kunci . "%' or nama like '%" . $kata_kunci . "%'  or alamat like '%" . $kata_kunci . "%'  or gender like '%" . $kata_kunci . "%'  or tanggal_lahir like '%" . $kata_kunci . "%' or fakultas like '%" . $kata_kunci . "%' order by id asc";
                        } elseif($_POST['all']) {
                            $sql   = "SELECT * FROM mahasiswa ORDER BY id ASC";
                        } else {
                            echo "<script>alert
                                ('data tidak ditemukan!')</script>";
                        }


                        $hasil = mysqli_query($conn, $sql);
                        $no = 1;
                        while ($data = mysqli_fetch_array($hasil)) {
                            $id         = $data['id'];
                            $nim        = $data['nim'];
                            $nama       = $data['nama'];
                            $alamat     = $data['alamat'];
                            $gender     = $data['gender'];
                            // $tanggal_lahir = $data['tanggal__lahir'];
                            $fakultas   = $data['fakultas'];
                        ?>
                            <tr>
                                <th scope="row" class="text-white"><?php echo $no++ ?></th>
                                <td scope="row" class="text-white"><?php echo $nim ?></td>
                                <td scope="row" class="text-white"><?php echo $nama ?></td>
                                <td scope="row" class="text-white"><?php echo $alamat ?></td>
                                <td scope="row" class="text-white"><?php echo $gender ?></td>
                                <td scope="row" class="text-white"><?php echo date('d-m-Y', strtotime($data['tanggal_lahir'])) ?></td>
                                <td scope="row" class="text-white"><?php echo $fakultas ?></td>
                                <td scope="row" class="text-white">
                                    <a href="from.php?op=edit&id=<?php echo $id ?>"><button type="button" class="btn btn-warning">Edit</button></a>
                                    <a href="Biodata.php?op=delete&id=<?php echo $id ?>" onclick="return confirm('Apakah anda ingin menghapus data ini ?')"><button type="button" class="btn btn-danger">Delete</button></a>
                                </td>
                            </tr>
                            </tbody>
                        <?php
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>

</body>
</html>