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
<!-- start banner Area -->
<section class="banner-area relative about-banner" id="home">
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="row d-flex align-items-center justify-content-center">
            <div class="about-content col-lg-12">
                <h1 class="text-white">
                    Materi
                </h1>
                <p class="text-white link-nav"><a href="index.php">Beranda </a> <span
                            class="lnr lnr-arrow-right"></span> <a href="materi.php?halaman=1"> Materi Pembelajaran</a></p>
            </div>
        </div>
    </div>
</section>
<!-- End banner Area -->

<!-- Start popular-courses Area -->
<section class="popular-courses-area section-gap courses-page">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="menu-content pb-70 col-lg-8">
                <div class="title text-center">
                    <h1 class="mb-10">Materi Pembelajaran</h1>
                    <p>Materi Pelajaran yang sudah dijelaskan dipertemuan sebelumnya</p>
                </div>
            </div>
        </div>
        <div class="row">
            <?php
            require 'connection/config.php';
            $halaman = 4;
            $page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
            $mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
            $result = mysqli_query($conn, "SELECT * FROM materi");
            $total = mysqli_num_rows($result);
            $pages = ceil($total/$halaman);
            $query = mysqli_query($conn, "SELECT * FROM materi LIMIT $mulai, $halaman");
            while ($data = mysqli_fetch_array($query)) {
                $pelajaran = $data['id_pelajaran'];
                $query_2 = mysqli_query($conn, "SELECT * FROM pelajaran WHERE id_pelajaran='$pelajaran'");
                $data_2 = mysqli_fetch_array($query_2);
                echo '
						<div class="single-popular-carusel col-lg-3 col-md-6">
							<div class="thumb-wrap relative">
								<div class="thumb relative">
									<div class="overlay overlay-bg"></div>	
									<img class="img-fluid" src="img/buku.png" alt="">
								</div>
								<div class="meta d-flex justify-content-between">
									<h4 style="color: black">' . $data_2['nama_pelajaran'] . '</h4>
								</div>									
							</div>
							<div class="details">
								<a href="course-details.html">
									<h4>
										' . $data['judul_materi'] . '
									</h4>
								</a>
								<p>' . $data['deskripsi_materi'] . '</p>
							</div>
							<a href="admin/pages/proses/dwonload-materi.php?filename=' . $data['lampiran_file_materi'] . '" class="primary-btn text-uppercase mx-auto">Unduh</a>													
						</div>';
            }
            ?>
        </div>
        <nav class="blog-pagination justify-content-center d-flex">
            <ul class="pagination">
                <?php
                $halaman = $_GET['halaman'];
                ?>
                <?php for ($i=1; $i<=$pages ; $i++){ ?>
                    <li <?php if($halaman== $i){ $class ='page-item active'; }else{ $class='page-item';} ?>  class="<?php echo $class ?>"><a href="?halaman=<?php echo $i; ?>" class="page-link"><?php echo $i; ?></a></li>
                <?php } ?>
            </ul>
        </nav>
    </div>
</section>
<!-- End popular-courses Area -->

<!-- Start search-course Area -->
<section class="search-course-area relative">
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="row justify-content-between align-items-center">
            <div class="col-lg-6 col-md-6 search-course-left">
                <h1 class="text-white">
                    Tujuan Pendidikan <br>
                    SMP ISLAM TERPADU
                </h1>
                <p style="color: white">
                    Berkembangnya potensi peserta didik agar menjadi manusia.
                </p>
                <div class="row details-content">
                    <div class="col single-detials">
                        <span class="lnr lnr-graduation-hat"></span>
                        <a href="#"><h4>Pendidikan Nasional</h4></a>
                        <p style="color: white">
                            beriman dan bertakwa kepada Tuhan Yang Maha Esa, berakhlak mulia, sehat, berilmu, cakap,
                            kreatif, mandiri,
                            dan menjadi warga negara yang demokratis serta bertanggung jawab
                        </p>
                    </div>
                    <div class="col single-detials">
                        <span class="lnr lnr-license"></span>
                        <a href="#"><h4>Pendidikan Dasar</h4></a>
                        <p style="color: white">
                            meletakkan dasar kecerdasan, pengetahuan, kepribadian, akhlak mulia,
                            serta keterampilan untuk hidup mandiri dan mengikuti pendidikan lebih lanjut.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 search-course-right section-gap">
                <form class="form-wrap" action="#">
                    <h4 class="text-white pb-20 text-center mb-30">Daftar dan bergabung bersama SMP IT AL-FIRDAUS</h4>
                    <input type="text" class="form-control" name="name" placeholder="Nama">
                    <input type="text" class="form-control" name="phone" placeholder="Nomor Ponsel">
                    <input type="email" class="form-control" name="email" placeholder="Alamat Email">
                    <button class="primary-btn text-uppercase">Daftar</button>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- End search-course Area -->

<!-- Start cta-two Area -->
<section class="cta-two-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 cta-left">
                <h1>Info Terbaru SMP IT AL-FIRDAUS</h1>
            </div>
            <div class="col-lg-4 cta-right">
                <a class="primary-btn wh" href="pengumuman.php?halaman=1">Lihat</a>
            </div>
        </div>
    </div>
</section>
<!-- End cta-two Area -->

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