<?php
$action = $_GET['action'];
if ($action == 'add') {
    $connect = mysqli_connect("localhost", "root", "", "website_school") or die(mysqli_error());
    $judul_materi = $_POST['judul_materi'];
    $deskripsi_materi = $_POST['deskripsi_materi'];
    $id_pelajaran = $_POST['id_pelajaran'];
    $tanggal_penerbitan_materi = $_POST['tanggal_penerbitan_materi'];
    $lampiran_file_materi = $_FILES['lampiran_file_materi']['name'];;
    $penerbit_materi = $_POST['penerbit_materi'];
    if ($lampiran_file_materi != "") {
        $ekstensi_diperbolehkan = array('pdf', 'doc', 'docx'); //ekstensi file gambar yang bisa diupload
        $x = explode('.', $lampiran_file_materi); //memisahkan nama file dengan ekstensi yang diupload
        $ekstensi = strtolower(end($x));
        $file_tmp = $_FILES['lampiran_file_materi']['tmp_name'];
        if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
            move_uploaded_file($file_tmp, '../upload/file-materi/' . $lampiran_file_materi); //memindah file gambar ke folder gambar
            $sql = "INSERT INTO materi(judul_materi, deskripsi_materi,id_pelajaran,tanggal_penerbitan_materi,lampiran_file_materi,penerbit_materi)VALUE('$judul_materi','$deskripsi_materi','$id_pelajaran','$tanggal_penerbitan_materi','$lampiran_file_materi','$penerbit_materi')";
            $simpan = mysqli_query($connect, $sql);
            if ($simpan == true) {
                header('location: ../list-materi.php?data=materi');
                echo "<script>alert('Data Materi berhasil ditambah');window.location='../list-materi.php?data=materi';</script>";
            } else {
                echo "<script>alert('Data gagal ditambahkan.');window.location='../list-materi.php?data=materi';</script>";
            }
        } else {
            echo "<script>alert('Ekstensi dokumen yang boleh hanya pdf atau doc.');window.location='../list-materi.php?data=materi';</script>";
        }
    } else {
        $sql = "INSERT INTO materi(judul_materi, deskripsi_materi,id_pelajaran,tanggal_penerbitan_materi,lampiran_file_materi,penerbit_materi)VALUE('$judul_materi','$deskripsi_materi','$id_pelajaran','$tanggal_penerbitan_materi',null,'$penerbit_materi')";
        $simpan = mysqli_query($connect, $sql);
        if ($simpan == true) {
            header('location: ../list-materi.php?data=materi');
            echo "<script>alert('Data berhasil ditambah dan Dokumen Null.');window.location='../list-materi.php?data=materi';</script>";
        } else {
            echo "<script>alert('Data gagal ditambahkan.');window.location='../list-materi.php?data=materi';</script>";
        }
    }
}
if ($action == 'edit') {
    $connect = mysqli_connect("localhost", "root", "", "website_school") or die(mysqli_error());
    $id = $_POST['id_materi'];
    $judul_materi = $_POST['judul_materi'];
    $deskripsi_materi = $_POST['deskripsi_materi'];
    $id_pelajaran = $_POST['id_pelajaran'];
    $tanggal_penerbitan_materi = $_POST['tanggal_penerbitan_materi'];
    $lampiran_file_materi = $_FILES['lampiran_file_materi']['name'];
    $penerbit_materi = $_POST['penerbit_materi'];
    if ($lampiran_file_materi != "") {
        $ekstensi_diperbolehkan = array('pdf', 'doc'); //ekstensi file gambar yang bisa diupload
        $x = explode('.', $lampiran_file_materi); //memisahkan nama file dengan ekstensi yang diupload
        $ekstensi = strtolower(end($x));
        $file_tmp = $_FILES['lampiran_file_materi']['tmp_name'];
        if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
            move_uploaded_file($file_tmp, '../upload/file-materi/' . $lampiran_file_materi); //memindah file gambar ke folder gambar
            $sql = "UPDATE materi SET judul_materi='$judul_materi', deskripsi_materi='$deskripsi_materi',id_pelajaran='$id_pelajaran',tanggal_penerbitan_materi='$tanggal_penerbitan_materi',lampiran_file_materi='$lampiran_file_materi',penerbit_materi='$penerbit_materi' WHERE id_materi='$id'";
            $simpan = mysqli_query($connect, $sql);
            if ($simpan == true) {
                header('location: ../list-materi.php?data=materi');
                echo "<script>alert('Data Materi berhasil diedit');window.location='../list-materi.php?data=materi';</script>";
            } else {
                echo "<script>alert('Data gagal ditambahkan.');window.location='../list-materi.php?data=materi';</script>";
            }
        } else {
            echo "<script>alert('Ekstensi dokumen yang boleh hanya pdf atau doc.');window.location='../list-materi.php?data=materi';</script>";
        }
    } else {
        $sql = "UPDATE materi SET judul_materi='$judul_materi', deskripsi_materi='$deskripsi_materi',id_pelajaran='$id_pelajaran',tanggal_penerbitan_materi='$tanggal_penerbitan_materi',lampiran_file_materi= null ,penerbit_materi='$penerbit_materi' WHERE id_materi='$id'";
        $simpan = mysqli_query($connect, $sql);
        if ($simpan == true) {
            header('location: ../list-materi.php?data=materi');
            echo "<script>alert('Data berhasil diedit dan Dokumen Null.');window.location='../list-materi.php?data=materi';</script>";
        } else {
            echo "<script>alert('Data gagal ditambahkan.');window.location='../list-materi.php?data=materi';</script>";
        }
    }
}
if ($action == 'delete') {
    $connect = mysqli_connect("localhost", "root", "", "website_school") or die(mysqli_error());
    $id = $_GET['id'];
    $sql = "DELETE FROM materi WHERE id_materi='$id'";
    $simpan = mysqli_query($connect, $sql);
    if ($simpan == true) {
        header('location: ../list-materi.php?data=materi');
        echo "<script>alert('Berhasil dihapus');window.location='../list-materi.php?data=materi';</script>";
    } else {
        echo "<script>alert('Gagal menghapus.');window.location='../list-materi.php?data=materi';</script>";
    }
}
