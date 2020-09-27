<?php
$action = $_GET['action'];
if ($action == 'add') {
    $connect = mysqli_connect("localhost", "root", "", "website_school") or die(mysqli_error());
    $photo_galeri = $_FILES['photo_galeri']['name'];;
    $kegiatan_galeri = $_POST['kegiatan_galeri'];
    if ($photo_galeri != "") {
        $ekstensi_diperbolehkan = array('png', 'jpg','jpeg'); //ekstensi file gambar yang bisa diupload
        $x = explode('.', $photo_galeri); //memisahkan nama file dengan ekstensi yang diupload
        $ekstensi = strtolower(end($x));
        $file_tmp = $_FILES['photo_galeri']['tmp_name'];
        $angka_acak = rand(1, 999);
        $nama_gambar_baru = $angka_acak . '-' . $photo_galeri; //menggabungkan angka acak dengan nama file sebenarnya
        if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
            move_uploaded_file($file_tmp, '../upload/gambar-galeri/' . $nama_gambar_baru); //memindah file gambar ke folder gambar
            $sql = "INSERT INTO galeri(photo_galeri, kegiatan_galeri)VALUE('$nama_gambar_baru','$kegiatan_galeri')";
            $simpan = mysqli_query($connect, $sql);
            if ($simpan == true) {
                header('location: ../list-galeri.php?data=galeri');
                echo "<script>alert('Data galeri berhasil ditambah');window.location='../list-galeri.php?data=galeri';</script>";
            } else {
                echo "<script>alert('Data gagal ditambahkan.');window.location='../list-galeri.php?data=galeri';</script>";
            }
        }else{
            echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');window.location='../list-galeri.php?data=galeri';</script>";
        }
    }else{
        $sql = "INSERT INTO galeri(photo_galeri, kegiatan_galeri)VALUE(null,'$kegiatan_galeri')";
        $simpan = mysqli_query($connect, $sql);
        if ($simpan == true) {
            header('location: ../list-galeri.php?data=galeri');
            echo "<script>alert('Data galeri berhasil ditambah tanpa foto');window.location='../list-galeri.php?data=galeri';</script>";
        } else {
            echo "<script>alert('Data gagal ditambahkan.');window.location='../list-galeri.php?data=galeri';</script>";
        }
    }
}
if($action == 'edit'){
    $connect = mysqli_connect("localhost", "root", "", "website_school") or die(mysqli_error());
    $id = $_POST['id_galeri'];
    $photo_galeri = $_FILES['photo_galeri']['name'];;
    $kegiatan_galeri = $_POST['kegiatan_galeri'];
    if ($photo_galeri != "") {
        $ekstensi_diperbolehkan = array('png', 'jpg','jpeg'); //ekstensi file gambar yang bisa diupload
        $x = explode('.', $photo_galeri); //memisahkan nama file dengan ekstensi yang diupload
        $ekstensi = strtolower(end($x));
        $file_tmp = $_FILES['photo_galeri']['tmp_name'];
        $angka_acak = rand(1, 999);
        $nama_gambar_baru = $angka_acak . '-' . $photo_galeri; //menggabungkan angka acak dengan nama file sebenarnya
        if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
            move_uploaded_file($file_tmp, '../upload/gambar-galeri/' . $nama_gambar_baru); //memindah file gambar ke folder gambar
            $sql = "UPDATE galeri SET photo_galeri='$nama_gambar_baru', kegiatan_galeri='$kegiatan_galeri' WHERE id_galeri ='$id'";
            $simpan = mysqli_query($connect, $sql);
            if ($simpan == true) {
                header('location: ../list-galeri.php?data=galeri');
                echo "<script>alert('Data galeri berhasil diedit');window.location='../list-galeri.php?data=galeri';</script>";
            } else {
                echo "<script>alert('Data gagal ditambahkan.');window.location='../list-galeri.php?data=galeri';</script>";
            }
        }else{
            echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');window.location='../list-galeri.php?data=galeri';</script>";
        }
    }else{
        $sql = "UPDATE galeri SET photo_galeri=null ,kegiatan_galeri='$kegiatan_galeri' WHERE id_galeri= '$id'";
        $simpan = mysqli_query($connect, $sql);
        if ($simpan == true) {
            header('location: ../list-galeri.php?data=galeri');
            echo "<script>alert('Data harga berhasil diedit tanpa foto');window.location='../list-galeri.php?data=galeri';</script>";
        } else {
            echo "<script>alert('Data gagal ditambahkan.');window.location='../list-galeri.php?data=galeri';</script>";
        }
    }
}
if($action == 'delete'){
    $connect = mysqli_connect("localhost", "root", "", "website_school") or die(mysqli_error());
    $id = $_GET['id'];
    $sql = "DELETE FROM galeri WHERE id_galeri='$id'";
    $simpan = mysqli_query($connect, $sql);
    if($simpan == true){
        header('location: ../list-galeri.php?data=galeri');
        echo "<script>alert('Berhasil dihapus');window.location='../list-galeri.php?data=galeri';</script>";
    }else{
        echo "<script>alert('Gagal menghapus.');window.location='../list-galeri.php?data=galeri';</script>";
    }
}
