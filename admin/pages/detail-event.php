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
    <title>List Account</title>
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
        <?php include "../component/navigation-notive-profile.php"?>
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
                <a class="d-xl-none d-lg-none" href="dashboard.php?data=home"><?php echo $status_login?></a>
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
                <?php include "../component/pageheader.php"?>
                <!-- ============================================================== -->
                <!-- end pageheader  -->
                <!-- ============================================================== -->
                <div class="ecommerce-widget">
                    <div class="row">
                        <?php
                        // --- connection ke database
                        $connect = mysqli_connect("localhost", "root", "", "website_school") or die(mysqli_error());
                        // --- tampil event
                        $id = $_GET['id'];
                        $sql = "SELECT * FROM pengumuman where id_pengumuman='$id'";
                        $query = mysqli_query($connect, $sql);
                        $data = mysqli_fetch_array($query)
                        ?>
                        <!-- ============================================================== -->
                        <!-- recent event detail  -->
                        <!-- ============================================================== -->
                        <div class="col-xl-12 col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="card">
                                <img class="img-fluid" src="upload/gambar-event/<?php echo $data['foto_pendukung_pengumuman_satu']?>" alt=" Card image cap">
                                <div class="card-body">
                                    <h3 class="card-title"><?php echo $data['judul_pengumuman']?></h3>
                                    <p class="card-text"><?php echo $data['kategori_pengumuman']?></p>
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><p style="color: black">Deskripsi :</p>
                                        <?php echo $data['deskripsi_pengumuman']?>
                                     <li class="list-group-item"><p style="color: black">Status :</p>
                                         <?php echo $data['status_pengumuman']?>
                                     </li>
                                    <li class="list-group-item"><p style="color: black">Penerbit :</p>
                                        <?php echo $data['penulis_pengumuman']?>
                                    </li>
                                </ul>
                                <?php
                                if ($_SESSION['status_pengguna'] == 'admin' || $_SESSION['status_pengguna'] == 'petugas') {
                                    ?>
                                    <div class="text-center card-body">
                                        <a href="form-event.php?action=edit&data=event&id=<?php echo $data['id_pengumuman'] ?>"
                                           class="btn btn-danger col-xl-6">Edit Berita</a>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                        <!-- grid column -->
                        <div class="col-xl-12 col-lg-6 col-md-6 col-sm-8 col-12">
                            <!-- .card -->
                            <div class="card card-figure">
                                <!-- .card-figure -->
                                <figure class="figure">
                                    <img class="img-fluid" src="upload/gambar-event/<?php echo $data['foto_pendukung_pengumuman_dua']?>" style="height: 330px" alt="Card image cap">
                                    <!-- .figure-caption -->
                                    <figcaption class="figure-caption">
                                        <h6 class="figure-title text-center"> Gambar Event </h6>
                                    </figcaption>
                                    <!-- /.figure-caption -->
                                </figure>
                                <!-- /.card-figure -->
                                <!-- /.card -->
                            </div>
                        </div>
                        <!-- grid column end -->
                        <!-- end event detail  -->
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