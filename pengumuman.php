<!DOCTYPE html>
<html lang="zxx" class="no-js">
<head>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/fav.png">
    <!-- Author Meta -->
    <meta name="author" content="colorlib">
    <!-- Meta Description -->
    <meta name="description" content="">
    <!-- Meta Keyword -->
    <meta name="keywords" content="">
    <!-- meta character set -->
    <meta charset="UTF-8">
    <!-- Site Title -->
    <title>SMP IT PURWODADI</title>

    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
    <!--
    CSS
    ============================================= -->
    <link rel="stylesheet" href="css/linearicons.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/nice-select.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
<?php include "component/header.php" ?>
<section class="banner-area relative about-banner" id="home">
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="row d-flex align-items-center justify-content-center">
            <div class="about-content col-lg-12">
                <h1 class="text-white">
                    Pengumuman
                </h1>
                <p class="text-white link-nav"><a href="index.php">Beranda </a> <span
                            class="lnr lnr-arrow-right"></span> <a href="pengumuman.php?halaman=1"> Pengumuman</a></p>
            </div>
        </div>
    </div>
</section>
<!-- End banner Area -->
<!-- End banner Area -->

<!-- Start top-category-widget Area -->
<section class="top-category-widget-area pt-90 pb-90 ">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="single-cat-widget">
                    <div class="content relative">
                        <div class="overlay overlay-bg"></div>
                        <a href="#" target="_blank">
                            <div class="thumb">
                                <img class="content-image img-fluid d-block mx-auto" src="img/blog/akademik.jpg"
                                     style="height: 230px" alt="">
                            </div>
                            <div class="content-details">
                                <h4 class="content-title mx-auto text-uppercase">Pendidikan</h4>
                                <span></span>
                                <p>Pengumuman yang berhubungan dengan akademik</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="single-cat-widget">
                    <div class="content relative">
                        <div class="overlay overlay-bg"></div>
                        <a href="#" target="_blank">
                            <div class="thumb">
                                <img class="content-image img-fluid d-block mx-auto" src="img/blog/cat-widget2.jpg"
                                     style="height: 230px" alt="">
                            </div>
                            <div class="content-details">
                                <h4 class="content-title mx-auto text-uppercase">Pengumuman</h4>
                                <span></span>
                                <p>SMP IT AL-FIRDAUS</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="single-cat-widget">
                    <div class="content relative">
                        <div class="overlay overlay-bg"></div>
                        <a href="#" target="_blank">
                            <div class="thumb">
                                <img class="content-image img-fluid d-block mx-auto" src="img/blog/non-akademik.jpg"
                                     style="height: 230px" alt="">
                            </div>
                            <div class="content-details">
                                <h4 class="content-title mx-auto text-uppercase">Non Pendidikan</h4>
                                <span></span>
                                <p>Pengumuman yang berhubungan dengan nonakademik</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End top-category-widget Area -->

<!-- Start post-content Area -->
<section class="post-content-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 posts-list">
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
                require 'connection/config.php';
                $halaman = 2;
                $page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
                $mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
                $result = mysqli_query($conn, "SELECT * FROM pengumuman WHERE status_pengumuman='publikasi'");
                $total = mysqli_num_rows($result);
                $pages = ceil($total/$halaman);
                $query = mysqli_query($conn, "SELECT * FROM pengumuman WHERE status_pengumuman='publikasi' ORDER BY id_pengumuman DESC LIMIT $mulai, $halaman");
                while ($data = mysqli_fetch_array($query)) {
                    $tgl = tgl_indo($data['tanggal_terbit_pengumuman']);
                    if ($data['kategori_pengumuman'] == 'akademik') {
                        $ketegori = "Pendidikan";
                    } else {
                        $ketegori = "Non Pendidikan";
                    }
                    $num_char = 300;
                    $text = $data['deskripsi_pengumuman'];
                    if ($data['foto_pendukung_pengumuman_satu'] == '') {
                        echo '
							<div class="single-post row">
								<div class="col-lg-3  col-md-3 meta-details">
									<ul class="tags">
										<li><a href="#">' . $ketegori . '</a></li>
									</ul>
									<div class="user-details row">
										<p class="user-name col-lg-12 col-md-12 col-6"><a href="#">' . $data['penulis_pengumuman'] . '</a> <span class="lnr lnr-user"></span></p>
										<p class="date col-lg-12 col-md-12 col-6"><a href="#">' . $tgl . '</a> <span class="lnr lnr-calendar-full"></span></p>
									</div>
								</div>
								<div class="col-lg-9 col-md-9 ">
									<div class="feature-img">
										<img class="img-fluid" src="img/pengumuman.jpg" style="height: 300px" alt="">
									</div>
									<a class="posts-title" href="detail-pengumuman.php?id='.$data['id_pengumuman'].'"><h3>' . $data['judul_pengumuman'] . '</h3></a>
									<p class="excert">' . substr($text, 0, $num_char) . '...' . '</p>
									<a href="detail-pengumuman.php?id='.$data['id_pengumuman'].'" class="primary-btn">Detail</a>
								</div>
							</div>
							';
                    } else {
                        $num_char = 300;
                        $text = $data['deskripsi_pengumuman'];
                        echo '
                        <div class="single-post row">
								<div class="col-lg-3  col-md-3 meta-details">
									<ul class="tags">
										<li><a href="#">' . $ketegori . '</a></li>
									</ul>
									<div class="user-details row">
										<p class="user-name col-lg-12 col-md-12 col-6"><a href="#">' . $data['penulis_pengumuman'] . '</a> <span class="lnr lnr-user"></span></p>
										<p class="date col-lg-12 col-md-12 col-6"><a href="#">' . $tgl . '</a> <span class="lnr lnr-calendar-full"></span></p>
									</div>
								</div>
								<div class="col-lg-9 col-md-9 ">
									<div class="feature-img">
										<img class="img-fluid" src="admin/pages/upload/gambar-event/' . $data['foto_pendukung_pengumuman_satu'] . '" style="height: 300px; alt="">
									</div>
									<a class="posts-title" href="detail-pengumuman.php?id='.$data['id_pengumuman'].'"><h3>' . $data['judul_pengumuman'] . '</h3></a>
									<p class="excert">
									' . substr($text, 0, $num_char) . '...' . '
									</p>
									<a href="detail-pengumuman.php?id='.$data['id_pengumuman'].'" class="primary-btn">Detail</a>
								</div>
							</div>';
                    }
                }

                ?>
                <nav class="blog-pagination justify-content-center d-flex">
                    <ul class="pagination">
                        <?php
                        $halaman = $_GET['halaman'];
                        ?>
                        <?php for ($i=1; $i<=$pages ; $i++){ ?>
                        <li <?php if($halaman== $i){ $class ='page-item active'; }else{ $class='page-item';} ?>  class="<?php echo $class ?>""><a href="?halaman=<?php echo $i; ?>" class="page-link"><?php echo $i; ?></a></li>
                        <?php } ?>
                    </ul>
                </nav>
            </div>
            <div class="col-lg-4 sidebar-widgets">
                <div class="widget-wrap">
                    <div class="single-sidebar-widget popular-post-widget">
                        <h4 class="popular-title">Pengumuman Populer</h4>
                        <div class="popular-post-list">
                            <?php
                            require 'connection/config.php';
                            $query = mysqli_query($conn, "SELECT * FROM pengumuman ORDER BY id_pengumuman DESC limit 4");
                            while ($data = mysqli_fetch_array($query)) {
                                $tgl = tgl_indo($data['tanggal_terbit_pengumuman']);
                                if ($data['foto_pendukung_pengumuman_satu'] == '') {
                                    echo '
                            <div class="single-post-list d-flex flex-row align-items-center">
                                <div class="thumb">
                                    <img class="img-fluid" src="img/pengumuman.jpg" style="width: 50px;height: 50px" alt="">
                                </div>
                                <div class="details">
                                    <a href="detail-pengumuman.php?id='.$data['id_pengumuman'].'"><h6>' .$data['judul_pengumuman'].'</h6></a>
                                    <p>'.$tgl.'</p>
                                </div>
                            </div>';
                                } else {
                                  echo '
                                  <div class="single-post-list d-flex flex-row align-items-center">
                                <div class="thumb">
                                    <img class="img-fluid" src="admin/pages/upload/gambar-event/'.$data['foto_pendukung_pengumuman_satu']. '" style="width: 50px;height: 50px" alt="">
                                </div>
                                <div class="details">
                                    <a href="detail-pengumuman.php?id='.$data['id_pengumuman'].'"><h6>' .$data['judul_pengumuman'].'</h6></a>
                                    <p>'.$tgl.'</p>
                                </div>
                            </div>\';';
                                }
                            }
                            ?>

                        </div>
                    </div>
                    <div class="single-sidebar-widget tag-cloud-widget">
                        <h4 class="tagcloud-title">Tag</h4>
                        <ul>
                            <li><a href="#">Technology</a></li>
                            <li><a href="#">Fashion</a></li>
                            <li><a href="#">Architecture</a></li>
                            <li><a href="#">Fashion</a></li>
                            <li><a href="#">Food</a></li>
                            <li><a href="#">Technology</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End post-content Area -->

<!-- start footer Area -->
<?php include "component/footer.php" ?>
<!-- End footer Area -->


<script src="js/vendor/jquery-2.2.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="js/vendor/bootstrap.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
<script src="js/easing.min.js"></script>
<script src="js/hoverIntent.js"></script>
<script src="js/superfish.min.js"></script>
<script src="js/jquery.ajaxchimp.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/jquery.tabs.min.js"></script>
<script src="js/jquery.nice-select.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/mail-script.js"></script>
<script src="js/main.js"></script>
</body>
</html>