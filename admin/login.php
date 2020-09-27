<?php
session_start();
include "connection/config.php";
$username = $_POST['username'];
$password = $_POST['password'];
$passwordHas = md5($username.$password);
// query untuk mendapatkan record dari username
$data = mysqli_query($conn, "SELECT * FROM pengguna WHERE username= '$username' and password='$passwordHas' and status='aktif'");
$user = mysqli_fetch_assoc($data);
$cek = mysqli_num_rows($data);
$id_user = $user['id_pengguna'];
if($cek  > 0) {
    $_SESSION['username']= $username;
    $_SESSION['NIP_pengguna']= $user['NIP_pengguna'];
    $_SESSION['nama_pengguna']= $user['nama_pengguna'];
    $_SESSION['email_pengguna']= $user['email_pengguna'];
    $_SESSION['status_pengguna']= $user['status_pengguna'];
    $_SESSION['foto_pengguna']= $user['foto_pengguna'];
    $_SESSION['status']= $user['status'];
    $_SESSION['id_pengguna']= $id_user;

    $response['error'] = $user['nama_pengguna'];
    $response['error_id'] = $_SESSION['id_pengguna'];
    $response['error_cek'] = $cek;
    $response['error_akses'] = $user['status_pengguna'];

    if($_SESSION['status_pengguna'] == "admin"){
        header("Location:pages/dashboard.php?data=home");
    }else{
        header("Location:pages/dashboard.php?data=home");
    }
    echo json_encode($response);
}else{
    echo '<script>
          alert("Gagal Login, Anda Belum Terdaftar atau Status Non Aktif");
            window.location = "index.php"
           </script>';
    }
?>