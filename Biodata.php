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

<body>
    <nav class="navbar bg-primary fixed-top">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1 text-light ">BIODATA SISWA</span>
            <h4>Hai..! <span><?php echo $_SESSION['username'] ?></span> selamat datang di halaman data siswa.</h4>
            <div class="d-grid gap-2 d-md-block">
                <a href="from.php" onclick="return confirm('klik ok untuk melanjutkan!')"><button type="button" class="btn btn-warning">Kembali</button></a>
                <!-- <a href="Sign.php" onclick="return confirm('Yakin ingin keluar dari halaman ini?')"><button type="button" class="btn  btn-danger">Log out</button></a> -->
            </div>
        </div>
    </nav>
    <div class="bg">
        <div class="mx-auto ">
            <!-- untuk mengeluarkan data -->
            <div class="card">
                <div class="card-header text-white bg-danger">
                    Data Mahasiswa
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col" class="bg-danger text-white">No</th>
                                <th scope="col" class="bg-danger text-white">NIM</th>
                                <th scope="col" class="bg-danger text-white">Nama</th>
                                <th scope="col" class="bg-danger text-white">Alamat</th>
                                <th scope="col" class="bg-danger text-white">Gender</th>
                                <th scope="col" class="bg-danger text-white">Tanggal Lahir</th>
                                <th scope="col" class="bg-danger text-white">Jurusan</th>
                                <th scope="col" class="bg-danger text-white">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if(isset($_POST))

                            $query   = "SELECT * FROM mahasiswa ORDER BY id ASC";
                            $q2     = mysqli_query($koneksi, $query);
                            $urut   = 1;
                            while ($r2 = mysqli_fetch_array($q2)) {
                                $id         = $r2['id'];
                                $nim        = $r2['nim'];
                                $nama       = $r2['nama'];
                                $alamat     = $r2['alamat'];
                                $gender     = $r2['gender'];
                                // $tanggal_lahir = $r2['tanggal__lahir'];
                                $fakultas   = $r2['fakultas'];
                            ?>
                                <tr>
                                    <th scope="row" class="text-white"><?php echo $urut++ ?></th>
                                    <td scope="row" class="text-white"><?php echo $nim ?></td>
                                    <td scope="row" class="text-white"><?php echo $nama ?></td>
                                    <td scope="row" class="text-white"><?php echo $alamat ?></td>
                                    <td scope="row" class="text-white"><?php echo $gender ?></td>
                                    <td scope="row" class="text-white"><?php echo date('d-m-Y', strtotime($r2['tanggal_lahir'])) ?></td>
                                    <td scope="row" class="text-white"><?php echo $fakultas ?></td>
                                    <td scope="row" class="text-white">
                                        <a href="from.php?op=edit&id=<?php echo $id ?>"><button type="button" class="btn btn-warning">Edit</button></a>
                                        <a href="Biodata.php?op=delete&id=<?php echo $id ?>" onclick="return confirm('Apakah anda ingin menghapus data ini ?')"><button type="button" class="btn btn-danger">Delete</button></a>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
