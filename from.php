<?php
    include 'function.php';    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <link rel="stylesheet" href="ASSETS/css/from.css">
    <link rel="stylesheet" href="BOOTSTRAP/css/bootstrap.min.css">
</head>

<body>
 
    <div class="bg">
    <nav class="navbar bg-primary fixed-top" >
        <div class="container-fluid">
            <span class="navbar-brand mb-0 ml-20  h1 text-light">BIODATA SISWA</span>
            <h4>Hai..!  <span><?php echo $_SESSION['username'] ?></span>,  selamat datang di halaman from.</h4>
            <a href="Sign.php" onclick="return confirm('Yakin ingin keluar dari halaman ini?')"><button type="button" class="btn btn-danger">Log out</button></a>
        </div>
    </nav>
        <div class="mx-auto ">
            <div class="container">
            <!-- untuk memasukkan data -->
                <div class="card bg-opacity-50 ">
                    <div class="card-header text-white bg-primary">
                        Create / Edit Data
                    </div>
                    <div class="card-body">
                        <?php
                        if ($error) {
                        ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo $error ?>
                            </div>
                        <?php
                            header("refresh:5;url=from.php"); //5 : detik
                        }
                        ?>
                        <?php
                        if ($sukses) {
                        ?>
                            <div class="alert alert-success" role="alert">
                                <?php echo $sukses ?>
                            </div>
                        <?php
                            header("refresh:5;url=from.php");
                        }
                        ?>
                        <form action="" method="POST">
                            <div class="mb-3 row">
                                <label for="nim" class="col-sm-2 col-form-label">NIM</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="nim" name="nim" value="<?php echo $nim ?>">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $nama ?>">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="gender" class="col-sm-2 col-form-label">Gender</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="gender" id="gender">
                                        <option value="">- Pilih Gender -</option>
                                        <option value="Laki-Laki" <?php if ($gender == "Laki-Laki") echo "selected" ?>>Laki-Laki</option>
                                        <option value="Perempuan" <?php if ($gender == "Perempuan") echo "selected" ?>>Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="tanggal_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="<?php echo $tanggal_lahir ?>">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $alamat ?>">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="fakultas" class="col-sm-2 col-form-label">Jurusan</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="fakultas" id="fakultas">
                                        <option value="">- Pilih Fakultas -</option>
                                        <option value="Pemesinan" <?php if ($fakultas == "Pemesinan") echo "selected" ?>>Pemesinan</option>
                                        <option value="Otrotonik" <?php if ($fakultas == "Ototronik") echo "selected" ?>>Ototronik</option>
                                        <option value="Pembuatan Kain" <?php if ($fakultas == "Pembuatan Kain") echo "selected" ?>>Pembuatan Kain</option>
                                        <option value="Rekayasa Perangkat Lunak" <?php if ($fakultas == "Rekayasa Perangkat Lunak") echo "selected" ?>>Rekayasa Perangkat Lunak</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <input type="submit" name="simpan" value="Simpan Data" class="btn btn-primary" />
                                <a href="Biodata.php" onclick="return confirm('klik ok untuk melanjutkan!')"><button type="button" class="btn btn-warning">Lihat data</button></a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>