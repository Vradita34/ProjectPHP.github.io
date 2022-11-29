<?php

// koneksi
$host       = "localhost";
$user       = "root";
$pass       = "";
$db         = "project";

$koneksi    = mysqli_connect($host, $user, $pass, $db);
if (!$koneksi) { //cek koneksi
    die("Tidak bisa terkoneksi ke database");
}
$nim            = "";
$nama           = "";
$alamat         = "";
$gender         = "";
$tanggal_lahir  = "";
$fakultas       = "";
$sukses         = "";
$error          = "";

if (isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = "";
}

// @include 'config.php';

session_start();

if(!isset($_SESSION['username'])){
    header('location:sign.php');
}


// delete
if ($op == 'delete') {
    $id         = $_GET['id'];
    $sql1       = "DELETE FROM mahasiswa WHERE id = '$id'";
    $q1         = mysqli_query($koneksi, $sql1);
    if ($q1) {
        $sukses = "Berhasil hapus data";
    } else {
        $error  = "Gagal melakukan delete data";
    }
}
if ($op == 'edit') {
    $id             = $_GET['id'];
    $sql1           = "SELECT * FROM mahasiswa WHERE id = '$id'";
    $q1             = mysqli_query($koneksi, $sql1);
    $r1             = mysqli_fetch_array($q1);
    $nim            = $r1['nim'];
    $nama           = $r1['nama'];
    $alamat         = $r1['alamat'];
    $gender         = $r1['gender'];
    $tanggal_lahir  = $r1['tanggal_lahir'];
    $fakultas       = $r1['fakultas'];

    if ($nim == '') {
        $error = "Data tidak ditemukan";
    }
}
if (isset($_POST['simpan'])) { //untuk create
    $nim            = $_POST['nim'];
    $nama           = $_POST['nama'];
    $alamat         = $_POST['alamat'];
    $gender         = $_POST['gender'];
    $tanggal_lahir  = $_POST['tanggal_lahir'];
    $fakultas       = $_POST['fakultas'];

    if ($nim && $nama && $alamat && $gender && $tanggal_lahir  && $fakultas) {
        if ($op == 'edit') { //untuk update
            $sql1       = "UPDATE mahasiswa SET nim = '$nim',nama='$nama',alamat = '$alamat', gender='$gender', tanggal_lahir= '$tanggal_lahir', fakultas='$fakultas' where id = '$id'";
            $q1         = mysqli_query($koneksi, $sql1);
            if ($q1) {
                $sukses = "Data berhasil diupdate";
            } else {
                $error  = "Data gagal diupdate";
            }
        } else { //untuk insert
            $sql1   = "INSERT INTO mahasiswa(nim,nama,alamat,gender,tanggal_lahir,fakultas) VALUES ('$nim','$nama','$alamat','$gender','$tanggal_lahir','$fakultas')";
            $q1     = mysqli_query($koneksi, $sql1);
            if ($q1) {
                $sukses     = "Berhasil memasukkan data baru";
            } else {
                $error      = "Gagal memasukkan data";
            }
        }
    } else {
        $error = "Silakan masukkan semua data";
    }
}
?>
