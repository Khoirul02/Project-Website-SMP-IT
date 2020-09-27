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
                    <div class="row">
                        <?php
                        function tgl_indo($tanggal)
                        {
                            $bulan = array(
                                1 => 'Januari',
                                'Februari',
                                'Maret',
                                'April',
                                'Mei',
                                'Juni',
                                'Juli',
                                'Agustus',
                                'September',
                                'Oktober',
                                'November',
                                'Desember'
                            );
                            $pecahkan = explode('-', $tanggal);

                            // variabel pecahkan 0 = tanggal
                            // variabel pecahkan 1 = bulan
                            // variabel pecahkan 2 = tahun

                            return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
                        }
                        ?>
                        <?php
                        // --- connection ke database
                        $connect = mysqli_connect("localhost", "root", "", "website_school") or die(mysqli_error());
                        // --- tampil event
                        $sql = "SELECT * FROM pengumuman";
                        $query = mysqli_query($connect, $sql);
                        while ($data = mysqli_fetch_array($query)) {
                            if ($data['foto_pendukung_pengumuman_satu'] == '') {
                                $tgl = tgl_indo($data['tanggal_terbit_pengumuman']);
                                $num_char = 10;
                                $text = $data['judul_pengumuman'];
                                echo "                        
                        <!-- ============================================================== -->
                        <!-- recent event  -->
                        <!-- ============================================================== -->
                        <div class=\"col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12\">
                            <div class=\"card\">
                                <img class=\"card-img-top img-fluid p-2\" src=\"upload/gambar-event/34-s.jpg\"
                                     alt=\"Card image cap\" style=\"height: 300px\">
                                <div class=\"card-body\">
                                    <h3 class=\"card-title\">" . substr($text, 0, $num_char) . '...' . "</h3>
                                    <p class=\"card-text\">" . $tgl  . "</p>
                                    <a href=\"detail-event.php?data=event&id=" . $data['id_pengumuman'] . "\" class=\"btn btn-primary\">Lihat Detail</a>
                                    <a href=\"proses/event.php?data=event&action=delete&id=" . $data['id_pengumuman'] . "\" class=\"btn btn-danger\">Hapus</a>
                                </div>
                            </div>
                        </div>
                        <!-- ============================================================== -->
                        <!-- end recent orders  -->
                        <!-- ============================================================== -->
                        ";
                            } else {
                                $tgl = tgl_indo($data['tanggal_terbit_pengumuman']);
                                $num_char = 15;
                                $text = $data['judul_pengumuman'];
                                echo "                        
                        <!-- ============================================================== -->
                        <!-- recent event  -->
                        <!-- ============================================================== -->
                        <div class=\"col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12\">
                            <div class=\"card\">
                                <img class=\"card-img-top img-fluid p-2\" src=\"upload/gambar-event/" . $data['foto_pendukung_pengumuman_satu'] . "\"
                                     alt=\"Card image cap\" style=\"height: 300px\">
                                <div class=\"card-body\">
                                    <h3 class=\"card-title\">" . substr($text, 0, $num_char) . '...' . "</h3>
                                    <p class=\"card-text\">" . $tgl . "</p>
                                    <a href=\"detail-event.php?data=event&id=" . $data['id_pengumuman'] . "\" class=\"btn btn-primary\">Lihat Detail</a>
                                    <a href=\"proses/event.php?data=event&action=delete&id=" . $data['id_pengumuman'] . "\" class=\"btn btn-danger\">Hapus</a>
                                </div>
                            </div>
                        </div>
                        <!-- ============================================================== -->
                        <!-- end recent orders  -->
                        <!-- ============================================================== -->
                        ";
                            }
                        } ?>
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
