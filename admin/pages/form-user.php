<!doctype html>
<html lang="en">
<?php
session_start();
include "../connection/config.php";
?>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="../assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/libs/css/style.css">
    <link rel="stylesheet" href="../assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="../assets/vendor/charts/chartist-bundle/chartist.css">
    <link rel="stylesheet" href="../assets/vendor/charts/morris-bundle/morris.css">
    <link rel="stylesheet" href="../assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../assets/vendor/charts/c3charts/c3.css">
    <link rel="stylesheet" href="../assets/vendor/fonts/flag-icon-css/flag-icon.min.css">
    <title>ADMIN</title>
</head>

<body>
<!-- ============================================================== -->
<!-- main wrapper -->
<!-- ============================================================== -->
<div class="dashboard-main-wrapper">
    <!-- ============================================================== -->
    <!-- navbar -->
    <!-- ============================================================== -->
    <div class="dashboard-header">
        <?php include "../component/navigation-notive-profile.php" ?>
    </div>
    <!-- ============================================================== -->
    <!-- end navbar -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- left sidebar -->
    <!-- ============================================================== -->
    <div class="nav-left-sidebar sidebar-dark">
        <div class="menu-list">
            <nav class="navbar navbar-expand-lg navbar-light">
                <?php
                if($_SESSION['status_pengguna'] == 'admin'){
                    $status_login = 'Admin';
                }else{
                    $status_login = 'Petugas';
                }
                ?>
                <a class="d-xl-none d-lg-none" href="dashboard.php?data=home"><?php echo $status_login ?></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <?php include "../component/navigation-pages.php" ?>
                </div>
            </nav>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end left sidebar -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- wrapper  -->
    <!-- ============================================================== -->
    <div class="dashboard-wrapper">
        <div class="dashboard-ecommerce">
            <div class="container-fluid dashboard-content ">
                <!-- ============================================================== -->
                <!-- pageheader  -->
                <!-- ============================================================== -->
                <?php include "../component/pageheader.php" ?>
                <!-- ============================================================== -->
                <!-- end pageheader  -->
                <!-- ============================================================== -->
                <div class="ecommerce-widget">
                    <div class="row">
                        <!-- ============================================================== -->
                        <!-- add event  -->
                        <!-- ============================================================== -->
                        <div class="col-xl-12 col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="card">
                                <?php
                                $action = $_GET['action'];
                                if ($action == 'edit') {
                                    $page_title = 'Edit';
                                } else {
                                    $page_title = 'Tambah';
                                }
                                ?>
                                <h5 class="card-header"><?php echo $page_title ?> Akun</h5>
                                <div class="card-body">
                                    <?php
                                    $action = $_GET['action'];
                                    if ($action == 'edit') {
                                        $id = $_GET['id'];
                                        $sql = mysqli_query($conn, "SELECT * FROM pengguna WHERE id_pengguna = '$id'");
                                        $data = mysqli_fetch_array($sql);
                                    }
                                    ?>
                                    <form action="proses/user.php?action=<?php echo $action ?>" method="post"
                                          enctype="multipart/form-data">
                                        <?php
                                        if ($action == 'edit') {
                                            $id = $data['id_pengguna'];
                                            $name_pengguna = $data['nama_pengguna'];
                                            $username = $data['username'];
                                            $password = '';
                                            $nip_pengguna = $data['nip_pengguna'];
                                            $email_pengguna = $data['email_pengguna'];
                                            $status = $data['status'];
                                            $button_title = "Edit";
                                        } else {
                                            $name_pengguna = '';
                                            $username = '';
                                            $password = '';
                                            $nip_pengguna = '';
                                            $email_pengguna = '';
                                            $button_title = "Tambah";
                                        }
                                        ?>
                                        <?php
                                        if ($action == 'edit') {
                                            ?>
                                            <div class="form-group">
                                                <label for="id_pengguna" class="col-form-label">ID User</label>
                                                <input id="id_pengguna" name="id_pengguna" type="text"
                                                       value="<?php echo $id ?>" class="form-control" readonly>
                                            </div>
                                            <?php
                                        }
                                        ?>
                                        <div class="form-group">
                                            <label for="nama_pengguna" class="col-form-label">Nama</label>
                                            <input id="nama_pengguna" name="nama_pengguna" type="text"
                                                   value="<?php echo $name_pengguna ?>" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="username" class="col-form-label">Username</label>
                                            <input id="username" name="username" type="text"
                                                   value="<?php echo $username ?>"
                                                   class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="password" class="col-form-label">Password</label>
                                            <input id="password" name="password" type="text"
                                                   value="<?php echo $password ?>"
                                                   class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="nip_pengguna" class="col-form-label">NIP</label>
                                            <input id="nip_pengguna" name="nip_pengguna" type="text"
                                                   value="<?php echo $nip_pengguna ?>"
                                                   class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="email_pengguna">Email Pengguna</label>
                                            <input class="form-control" id="email_pengguna" name="email_pengguna"
                                                      value="<?php echo $email_pengguna ?>" type="text">
                                        </div>
                                        <label>Format File (png, jpg, jpeg)</label>
                                        <div class="custom-file mb-3">
                                            <input type="file" class="custom-file-input" id="foto_pengguna"
                                                   name="foto_pengguna">
                                            <label class="custom-file-label" for="customFile">Foto</label>
                                        </div>
                                        <?php
                                        if ($action == 'edit') {
                                            ?>
                                            <div class="form-group">
                                                <label>Status</label>
                                                <select class="form-control" name="status">
                                                    <option <?php if($data['status']=='aktif')echo 'selected'; ?> value="aktif">Aktif</option>
                                                    <option <?php if($data['status']=='nonaktif')echo 'selected'; ?> value="nonaktif">NonAktif</option>
                                                </select>
                                            </div>
                                            <?php
                                        }else {
                                            ?>
                                            <div class="form-group">
                                                <label>Status</label>
                                                <select class="form-control" name="status">
                                                    <option value="aktif">Aktif</option>
                                                    <option value="nonaktif">Nonaktif</option>
                                                </select>
                                            </div>
                                            <?php
                                        }
                                        ?>
                                        <div class="form-group row text-right">
                                            <div class="col col-sm-12 col-lg-1 offset-sm-1 offset-lg-0">
                                                <button type="submit"
                                                        class="btn btn-space btn-primary"><?php echo $button_title ?></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- ============================================================== -->
                        <!-- end add event -->
                        <!-- ============================================================== -->
                    </div>
                </div>
            </div>
        </div>
        <?php include "../component/footer.php" ?>
    </div>
    <!-- ============================================================== -->
    <!-- end wrapper  -->
    <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- end main wrapper  -->
<!-- ============================================================== -->
<!-- Optional JavaScript -->
<!-- jquery 3.3.1 -->
<script src="../assets/vendor/jquery/jquery-3.3.1.min.js"></script>
<!-- bootstap bundle js -->
<script src="../assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
<!-- slimscroll js -->
<script src="../assets/vendor/slimscroll/jquery.slimscroll.js"></script>
<!-- main js -->
<script src="../assets/libs/js/main-js.js"></script>
<!-- chart chartist js -->
<script src="../assets/vendor/charts/chartist-bundle/chartist.min.js"></script>
<!-- sparkline js -->
<script src="../assets/vendor/charts/sparkline/jquery.sparkline.js"></script>
<!-- morris js -->
<script src="../assets/vendor/charts/morris-bundle/raphael.min.js"></script>
<script src="../assets/vendor/charts/morris-bundle/morris.js"></script>
<!-- chart c3 js -->
<script src="../assets/vendor/charts/c3charts/c3.min.js"></script>
<script src="../assets/vendor/charts/c3charts/d3-5.4.0.min.js"></script>
<script src="../assets/vendor/charts/c3charts/C3chartjs.js"></script>
<script src="../assets/libs/js/dashboard-ecommerce.js"></script>
</body>

</html>
