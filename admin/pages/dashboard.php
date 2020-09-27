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
    <title>Admin SMP IT AL-FIRDAUS</title>
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
                if ($_SESSION['status_pengguna'] == 'admin') {
                    $status_login = 'Admin';
                } else {
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
                    <?php
                    if ($_SESSION['status_pengguna'] == 'admin' || $_SESSION['status_pengguna'] == 'petugas') {
                        ?>
                        <div class="row">
                            <!-- ============================================================== -->
                            <!-- sales  -->
                            <!-- ============================================================== -->
                            <?php
                            $account = mysqli_query($conn, "select * from pengguna");
                            $event = mysqli_query($conn, "select * from pengumuman");
                            $theory = mysqli_query($conn, "select * from materi");
                            $gallery = mysqli_query($conn, "select * from galeri");
                            ?>
                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                                <div class="card border-3 border-top border-top-primary">
                                    <div class="card-body">
                                        <h5 class="text-muted">Pengguna</h5>
                                        <div class="metric-value d-inline-block">
                                            <h1 class="mb-1">
                                                <?php echo mysqli_num_rows($account) ?>
                                            </h1>
                                        </div>
                                        <div
                                                class="metric-label d-inline-block float-right text-success font-weight-bold">
                                        <span class="icon-circle-small icon-box-xs text-success bg-success-light"><i
                                                    class="fa fa-user"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- ============================================================== -->
                            <!-- end sales  -->
                            <!-- ============================================================== -->
                            <!-- =============================================x`================= -->
                            <!-- new customer  -->
                            <!-- ============================================================== -->
                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                                <div class="card border-3 border-top border-top-primary">
                                    <div class="card-body">
                                        <h5 class="text-muted">Pengumuman</h5>
                                        <div class="metric-value d-inline-block">
                                            <h1 class="mb-1">
                                                <?php echo mysqli_num_rows($event) ?>
                                            </h1>
                                        </div>
                                        <div
                                                class="metric-label d-inline-block float-right text-success font-weight-bold">
                                        <span class="icon-circle-small icon-box-xs text-success bg-success-light"><i
                                                    class="fa fa-calendar"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- ============================================================== -->
                            <!-- end new customer  -->
                            <!-- ============================================================== -->
                            <!-- ============================================================== -->
                            <!-- visitor  -->
                            <!-- ============================================================== -->
                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                                <div class="card border-3 border-top border-top-primary">
                                    <div class="card-body">
                                        <h5 class="text-muted">Materi</h5>
                                        <div class="metric-value d-inline-block">
                                            <h1 class="mb-1">
                                                <?php echo mysqli_num_rows($theory) ?>
                                            </h1>
                                        </div>
                                        <div
                                                class="metric-label d-inline-block float-right text-success font-weight-bold">
                                        <span class="icon-circle-small icon-box-xs text-success bg-success-light"><i
                                                    class="fa fa-shopping-cart"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- ============================================================== -->
                            <!-- end visitor  -->
                            <!-- ============================================================== -->
                            <!-- ============================================================== -->
                            <!-- total orders  -->
                            <!-- ============================================================== -->
                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                                <div class="card border-3 border-top border-top-primary">
                                    <div class="card-body">
                                        <h5 class="text-muted">Galeri</h5>
                                        <div class="metric-value d-inline-block">
                                            <h1 class="mb-1">
                                                <?php echo mysqli_num_rows($gallery) ?>
                                            </h1>
                                        </div>
                                        <div
                                                class="metric-label d-inline-block float-right text-danger font-weight-bold">
                                        <span
                                                class="icon-circle-small icon-box-xs text-danger bg-danger-light bg-danger-light "><i
                                                    class="fa fa-box-open"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- ============================================================== -->
                            <!-- end total orders  -->
                            <!-- ============================================================== -->
                        </div>
                        <?php
                    }
                    ?>
                    <div class="row">
                        <!-- ============================================================== -->

                        <!-- ============================================================== -->
                        <!-- recent orders  -->
                        <!-- ============================================================== -->
                        <?php
                        if ($_SESSION['status_pengguna'] == 'admin') {
                            ?>
                            <div class="col-xl-12 col-lg-12 col-md-6 col-sm-12 col-12">
                                <div class="card">
                                    <h5 class="card-header">Daftar Akun </h5>
                                    <div class="card-body p-0">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead class="bg-light">
                                                <tr class="border-0">
                                                    <th class="text-center">No</th>
                                                    <th class="text-center">Gambar</th>
                                                    <th class="text-center">Nama</th>
                                                    <th class="text-center">NIP</th>
                                                    <th class="text-center">Email</th>
                                                    <th class="text-center">Pengguna</th>
                                                    <th class="text-center">Status</th>
                                                    <th class="text-center">Aksi</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                $no = 1;
                                                $query = mysqli_query($conn, "SELECT * FROM pengguna limit 3");
                                                $cek = mysqli_num_rows($query);
                                                if ($cek > 0) {
                                                    while ($data = mysqli_fetch_array($query)) {
                                                        ?>
                                                        <tr>
                                                            <td class="text-center"><?php echo $no++ ?></td>
                                                            <td>
                                                                <div class="m-r-10">
                                                                    <?php
                                                                    if($data['foto_pengguna'] == '') {
                                                                        ?>
                                                                        <img src="upload/gambar-user/34-s.jpg"
                                                                             alt="user" class="rounded" width="45">
                                                                        <?php
                                                                    }else {
                                                                        ?>
                                                                        <img src="upload/gambar-user/<?php echo $data['foto_pengguna']?>"
                                                                             alt="user" class="rounded" width="45">
                                                                        <?php
                                                                    }
                                                                    ?>
                                                                </div>
                                                            </td>
                                                            <td class="text-center"><?php echo $data['nama_pengguna'] ?></td>
                                                            <td class="text-center"><?php echo $data['nip_pengguna'] ?></td>
                                                            <td class="text-center"><?php echo $data['email_pengguna'] ?></td>
                                                            <td class="text-center"><?php echo $data['username'] ?></td>
                                                            <?php
                                                            if ($data['status'] == 'aktif') {
                                                                $class = 'badge-success';
                                                            } else {
                                                                $class = 'badge-danger';
                                                            }
                                                            ?>
                                                            <td class="text-center"><span
                                                                        class="badge-dot <?php echo $class ?> mr-1"></span>
                                                                <?php echo $data['status'] ?>
                                                            </td>
                                                            <td>
                                                                <div class="input-group-append be-addon">
                                                                    <button type="button" data-toggle="dropdown"
                                                                            class="btn btn-secondary">Set
                                                                    </button>
                                                                    <div class="dropdown-menu">
                                                                        <a href="proses/user.php?id=<?php echo $data['id_pengguna'] ?>&action=active"
                                                                           class="dropdown-item">Aktifkan</a>
                                                                        <a href="proses/user.php?id=<?php echo $data['id_pengguna'] ?>&action=nonactive"
                                                                           class="dropdown-item">Non Aktifkan</a>
                                                                        <a href="form-user.php?id=<?php echo $data['id_pengguna'] ?>&action=edit&data=account"
                                                                           class="dropdown-item">Edit</a>
                                                                        <a href="proses/user.php?id=<?php echo $data['id_pengguna'] ?>&action=reset"
                                                                           class="dropdown-item">Reset Sandi</a>
                                                                        <a href="proses/user.php?id=<?php echo $data['id_pengguna'] ?>&action=delete"
                                                                           class="dropdown-item">Hapus</a>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                    }
                                                } else {
                                                    ?>
                                                    <tr>
                                                        <td colspan="8" class="text-center">Data Kosong</td>
                                                    </tr>
                                                    <?php
                                                }
                                                ?>
                                                </tbody>

                                            </table>
                                        </div>
                                    </div>
                                    <div class="card-footer text-center">
                                        <a href="list-user.php?data=account" class="btn-primary-link">Lihat Detail</a>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                        <!-- ============================================================== -->
                        <!-- end recent orders  -->
                        <!-- ============================================================== -->

                        <!-- ============================================================== -->
                        <!-- end recent transaction  -->
                        <!-- ============================================================== -->
                        <div class="col-xl-12 col-lg-12 col-md-6 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header">Daftar Pengumuman</h5>
                                <div class="card-body p-0">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead class="bg-light">
                                            <tr class="border-0">
                                                <th class="text-center">No</th>
                                                <th class="text-center">Gambar</th>
                                                <th class="text-center">Judul</th>
                                                <th class="text-center">Deskripsi</th>
                                                <th class="text-center">Penulis</th>
                                                <th class="text-center">Status</th>
                                                <th class="text-center">Aksi</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            $no = 1;
                                            $query = mysqli_query($conn, "SELECT * FROM pengumuman limit 3 ");
                                            $cek = mysqli_num_rows($query);
                                            if ($cek > 0) {
                                                while ($data = mysqli_fetch_array($query)) {
                                                    $num_char = 150;
                                                    $text = $data['deskripsi_pengumuman'];
                                                    ?>
                                                    <tr>
                                                        <td class="text-center"><?php echo $no++ ?></td>
                                                        <td>
                                                            <div class="m-r-10">
                                                                <?php
                                                                if($data['foto_pendukung_pengumuman_satu'] == '') {
                                                                    ?>
                                                                    <img src="upload/gambar-event/34-s.jpg"
                                                                         alt="user" class="rounded" width="45">
                                                                    <?php
                                                                }else {
                                                                    ?>
                                                                    <img src="upload/gambar-event/<?php echo $data['foto_pendukung_pengumuman_satu']?>"
                                                                         alt="user" class="rounded" width="45">
                                                                    <?php
                                                                }
                                                                ?>
                                                            </div>
                                                        </td>
                                                        <td class="text-center"><?php echo $data['judul_pengumuman'] ?></td>
                                                        <td class="text-center"><?php echo substr($text, 0, $num_char) . '...' ?></td>
                                                        <td class="text-center"><?php echo $data['penulis_pengumuman'] ?></td>
                                                        <td class="text-center">
                                                            <?php
                                                            if ($data['status_pengumuman'] == 'publikasi') {
                                                                $class = 'success';
                                                                $title = 'Publikasi';
                                                            } else {
                                                                $class = 'danger';
                                                                $title = 'Tidak Publikasi';
                                                            }
                                                            ?>
                                                            <span
                                                                    class="badge-dot badge-<?php echo $class ?> mr-1">
                                                        </span>
                                                            <?php echo $title ?>
                                                        </td>
                                                        <td class="text-center">
                                                            <div class="input-group-append be-addon">
                                                                <button type="button" data-toggle="dropdown"
                                                                        class="btn btn-secondary">Set
                                                                </button>
                                                                <div class="dropdown-menu">
                                                                    <a href="form-event.php?id=<?php echo $data['id_pengumuman'] ?>&action=edit&data=account"
                                                                       class="dropdown-item">Edit</a>
                                                                    <a href="proses/event.php?id=<?php echo $data['id_pengumuman'] ?>&action=delete"
                                                                       class="dropdown-item">Hapus</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                }
                                            } else {
                                                ?>
                                                <tr>
                                                    <td colspan="8" class="text-center">Data Kosong</td>
                                                </tr>
                                                <?php
                                            }
                                            ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="card-footer text-center">
                                    <a href="list-event.php?data=event"
                                       class="btn-primary-link">Lihat Detail</a>
                                </div>
                            </div>
                        </div>
                        <!-- ============================================================== -->
                        <!-- end recent transaction  -->
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