<?php
$action = $_GET['action'];
if($action == 'add') {
    $connect = mysqli_connect("localhost", "root", "", "website_school") or die(mysqli_error());
    $nama_pengguna = $_POST['nama_pengguna'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $nip_pengguna = $_POST['nip_pengguna'];
    $passwordHas = md5($username.$password);
    $email_pengguna = $_POST['email_pengguna'];
    $status = $_POST['status'];
    $foto_pengguna = $_FILES['foto_pengguna']['name'];
    if ($foto_pengguna != "") {
        $ekstensi_diperbolehkan = array('png', 'jpg','jpeg'); //ekstensi file gambar yang bisa diupload
        $x = explode('.', $foto_pengguna); //memisahkan nama file dengan ekstensi yang diupload
        $ekstensi = strtolower(end($x));
        $file_tmp = $_FILES['foto_pengguna']['tmp_name'];
        $angka_acak = rand(1, 999);
        $nama_gambar_baru = $angka_acak . '-' . $foto_pengguna; //menggabungkan angka acak dengan nama file sebenarnya
        if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
            move_uploaded_file($file_tmp, '../upload/gambar-user/' . $nama_gambar_baru); //memindah file gambar ke folder gambar
            // jalankan query INSERT untuk menambah data ke database pastikan sesuai urutan (id tidak perlu karena dibikin otomatis)
            $sql = "INSERT INTO pengguna(nama_pengguna, username,password,nip_pengguna,email_pengguna, status ,foto_pengguna,status_pengguna)VALUE('$nama_pengguna','$username','$passwordHas','$nip_pengguna','$email_pengguna','$status','$nama_gambar_baru','petugas')";
            $simpan = mysqli_query($connect, $sql);
            // periska query apakah ada error
            if (!$simpan) {
                die ("Query gagal dijalankan: " . mysqli_errno($connect) .
                    " - " . mysqli_error($connect));
            } else {
                //tampil alert dan akan redirect ke halaman index.php
                //silahkan ganti index.php sesuai halaman yang akan dituju
                echo "<script>alert('Data berhasil ditambah.');window.location='../list-user.php?data=account';</script>";
            }

        } else {
            //jika file ekstensi tidak jpg dan png maka alert ini yang tampil
            echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');window.location='../list-user.php?data=account';</script>";
        }
    } else {
        $sql = "INSERT INTO pengguna(nama_pengguna, username,password,nip_pengguna,email_pengguna, status ,foto_pengguna,status_pengguna)VALUE('$nama_pengguna','$username','$passwordHas','$nip_pengguna','$email_pengguna','$status',null,'petugas'))";
        $simpan = mysqli_query($connect, $sql);

        if ($simpan == true) {
            header('location: ../list-user.php?data=account');
            echo "<script>alert('Data berhasil ditambah dan Gambar Null.');window.location='../list-user.php?data=account';</script>";
        } else {
            echo "<script>alert('Data gagal ditambahkan.');window.location='../list-user.php?data=account';</script>";
        }
    }
}
if($action == 'edit'){
    $connect = mysqli_connect("localhost", "root", "", "website_school") or die(mysqli_error());
    $id = $_POST['id_pengguna'];
    $nama_pengguna = $_POST['nama_pengguna'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $passwordHas = md5($username.$password);
    $nip_pengguna = $_POST['nip_pengguna'];
    $email_pengguna = $_POST['email_pengguna'];
    $status = $_POST['status'];
    $foto_pengguna = $_FILES['foto_pengguna']['name'];
    if ($foto_pengguna != "") {
        $ekstensi_diperbolehkan = array('png', 'jpg','jpeg'); //ekstensi file gambar yang bisa diupload
        $x = explode('.', $foto_pengguna); //memisahkan nama file dengan ekstensi yang diupload
        $ekstensi = strtolower(end($x));
        $file_tmp = $_FILES['foto_pengguna']['tmp_name'];
        $angka_acak = rand(1, 999);
        $nama_gambar_baru = $angka_acak . '-' . $foto_pengguna; //menggabungkan angka acak dengan nama file sebenarnya
        if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
            move_uploaded_file($file_tmp, '../upload/gambar-user/' . $nama_gambar_baru); //memindah file gambar ke folder gambar
            // jalankan query INSERT untuk menambah data ke database pastikan sesuai urutan (id tidak perlu karena dibikin otomatis)
            $sql = "UPDATE pengguna SET nama_pengguna='$nama_pengguna', username='$username',password='$passwordHas',nip_pengguna='$nip_pengguna',email_pengguna='$email_pengguna',status='$status',foto_pengguna='$nama_gambar_baru' WHERE id_pengguna='$id'";
            $simpan = mysqli_query($connect, $sql);
            // periska query apakah ada error
            if (!$simpan) {
                die ("Query gagal dijalankan: " . mysqli_errno($connect) .
                    " - " . mysqli_error($connect));
            } else {
                //tampil alert dan akan redirect ke halaman index.php
                //silahkan ganti index.php sesuai halaman yang akan dituju
                echo "<script>alert('Data berhasil diedit.');window.location='../list-user.php?data=account';</script>";
            }
        } else {
            //jika file ekstensi tidak jpg dan png maka alert ini yang tampil
            echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');window.location='../list-user.php?data=account';</script>";
        }
    } else {
        $sql = "UPDATE pengguna SET nama_pengguna='$nama_pengguna', username='$username',password='$passwordHas',nip_pengguna='$nip_pengguna',ststus='$status',foto_pengguna=null WHERE id_pengguna='$id'";
        $simpan = mysqli_query($connect, $sql);

        if ($simpan == true) {
            header('location: ../list-user.php?data=account');
            echo "<script>alert('Data berhasil diedit dan Gambar Null.');window.location='../list-user.php?data=account';</script>";
        } else {
            echo "<script>alert('Data gagal ditambahkan.');window.location='../list-user.php?data=account';</script>";
        }
    }
}
if($action == 'active'){
    $connect = mysqli_connect("localhost", "root", "", "website_school") or die(mysqli_error());
    $id = $_GET['id'];
    $sql = "UPDATE pengguna SET status='aktif' WHERE id_pengguna='$id'";
    $simpan = mysqli_query($connect, $sql);
    if($simpan == true){
        header('location: ../list-user.php?data=account');
        echo "<script>alert('Akun berhasil diaktifkan');window.location='../list-user.php?data=account';</script>";
    }else{
        echo "<script>alert('Data gagal diperbarui.');window.location='../list-user.php?data=account';</script>";
    }
}
if($action == 'nonactive'){
    $connect = mysqli_connect("localhost", "root", "", "website_school") or die(mysqli_error());
    $id = $_GET['id'];
    $sql = "UPDATE pengguna SET status='noaktif' WHERE id_pengguna='$id'";
    $simpan = mysqli_query($connect, $sql);
    if($simpan == true){
        header('location: ../list-user.php?data=account');
        echo "<script>alert('Akun berhasil dinonaktifkan');window.location='../list-user.php?data=account';</script>";
    }else{
        echo "<script>alert('Data gagal diperbarui.');window.location='../list-user.php?data=account';</script>";
    }
}
if($action == 'reset'){
    $connect = mysqli_connect("localhost", "root", "", "website_school") or die(mysqli_error());
    $id = $_GET['id'];
    $sql = "UPDATE pengguna SET password='12345678' WHERE id_pengguna='$id'";
    $simpan = mysqli_query($connect, $sql);
    if($simpan == true){
        header('location: ../list-user.php?data=account');
        echo "<script>alert('Password berhasil direset');window.location='../list-user.php?data=account';</script>";
    }else{
        echo "<script>alert('Password gagal diperbarui.');window.location='../list-user.php?data=account';</script>";
    }
}
if($action == 'delete'){
    $connect = mysqli_connect("localhost", "root", "", "website_school") or die(mysqli_error());
    $id = $_GET['id'];
    $sql = "DELETE FROM pengguna WHERE id_pengguna='$id'";
    $simpan = mysqli_query($connect, $sql);
    if($simpan == true){
        header('location: ../list-user.php?data=account');
        echo "<script>alert('Berhasil dihapus');window.location='../list-user.php?data=account';</script>";
    }else{
        echo "<script>alert('Gagal menghapus.');window.location='../list-user.php?data=account';</script>";
    }
}