<?php
$action = $_GET['action'];
if ($action == 'add') {
    $connect = mysqli_connect("localhost", "root", "", "website_school") or die(mysqli_error());
    $nama_pelajaran = $_POST['nama_pelajaran'];
    $sql = "INSERT INTO pelajaran(nama_pelajaran)VALUE('$nama_pelajaran')";
    $simpan = mysqli_query($connect, $sql);
    if ($simpan == true) {
        header('location: ../list-pelajaran.php?data=pelajaran');
        echo "<script>alert('Data galeri berhasil ditambah');window.location='../list-pelajaran.php?data=pelajaran';</script>";
    } else {
        echo "<script>alert('Data gagal ditambahkan.');window.location='../list-pelajaran.php?data=pelajaran';</script>";
    }
}

if ($action == 'edit') {
    $connect = mysqli_connect("localhost", "root", "", "website_school") or die(mysqli_error());
    $id = $_POST['id_pelajaran'];
    $nama_pelajaran = $_POST['nama_pelajaran'];
    $sql = "UPDATE pelajaran SET  nama_pelajaran='$nama_pelajaran' WHERE id_pelajaran ='$id'";
    $simpan = mysqli_query($connect, $sql);
    if ($simpan == true) {
        header('location: ../list-pelajaran.php?data=pelajaran');
        echo "<script>alert('Data galeri berhasil diedit');window.location='../list-pelajaran.php?data=pelajaran';</script>";
    } else {
        echo "<script>alert('Data gagal ditambahkan.');window.location='../list-pelajaran.php?data=pelajaran';</script>";
    }

}
if ($action == 'delete') {
    $connect = mysqli_connect("localhost", "root", "", "website_school") or die(mysqli_error());
    $id = $_GET['id'];
    $sql = "DELETE FROM pelajaran WHERE id_pelajaran='$id'";
    $simpan = mysqli_query($connect, $sql);
    if ($simpan == true) {
        header('location: ../list-pelajaran.php?data=pelajaran');
        echo "<script>alert('Berhasil dihapus');window.location='../list-pelajaran.php?data=pelajaran';</script>";
    } else {
        echo "<script>alert('Gagal menghapus.');window.location='../list-pelajaran.php?data=pelajaran';</script>";
    }
}
