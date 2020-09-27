<!DOCTYPE html>
<!--suppress ALL -->
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
<section class="banner-area relative" id="home">
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="row fullscreen d-flex align-items-center justify-content-between">
            <div class="banner-content col-lg-9 col-md-12">
                <h1 class="text-uppercase">
                    SMP ISLAM TERPADU AL-FIRDAUS
                </h1>
                <p class="pt-10 pb-10" style="color: white">
                    Visi : Menjadi sekolah yang unggul dan islami, meliputi Unggul dalam prestasi akademik, Unggul dalam
                    prestasi non akademik,
                    Unggul dalam penggunaan media pembelajaran, Unggul dalam seni dan budaya, dan Unggul dalam life
                    skill.
                </p>
                <a href="#" class="primary-btn text-uppercase">Gabung</a>
            </div>
        </div>
    </div>
</section>
<!-- End banner Area -->

<!-- Start feature Area -->
<section class="feature-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="single-feature">
                    <div class="title">
                        <h4>MISI SEKOLAH</h4>
                    </div>
                    <div class="desc-wrap">
                        <ol>
                            <li>1. Menjadikan sekolah tempat membentuk generasi yang unggul dalam prestasi.</li>
                            <li>2. Mewujudkan generasi yang berakhlak mulia dan berwawasan global.</li>
                            <li>3. Membina dan mengembangkan potensi intelektual, emosional, spritual dan fisik secara
                                seimbang.
                            </li>
                            <li>4. Membina, mendidik dengan memadukan kurikulum dinas pendididkan dan dasar-dasar Islam
                                secara terpadu.
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End feature Area -->

<!-- Start popular-course Area -->
<section class="popular-course-area section-gap">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="menu-content pb-70 col-lg-8">
                <div class="title text-center">
                    <h1 class="mb-10">Pembelajaran Materi</h1>
                    <p>Materi Pelajaran yang sudah dijelaskan dipertemuan sebelumnya</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="active-popular-carusel">
                <?php
                require 'connection/config.php';
                $query = mysqli_query($conn, "SELECT * FROM materi");
                while ($data = mysqli_fetch_array($query)) {
                    $pelajaran = $data['id_pelajaran'];
                    $query_2 = mysqli_query($conn, "SELECT * FROM pelajaran WHERE id_pelajaran='$pelajaran'");
                    $data_2 = mysqli_fetch_array($query_2);
                    echo '
                <div class="single-popular-carusel">
                    <div class="thumb-wrap relative">
                        <div class="thumb relative">
                            <div class="overlay overlay-bg"></div>
                            <img class="img-fluid" src="img/buku.png" alt="">
                        </div>
                        <div class="meta d-flex justify-content-between">
                            <h4 style="color: black">' .$data_2['nama_pelajaran'] .'</h4>
                        </div>
                    </div>
                    <div class="details">
                        <a href="#">
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
        </div>
    </div>
</section>
<!-- End popular-course Area -->
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
<!-- Start upcoming-event Area -->
<section class="upcoming-event-area section-gap">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="menu-content pb-70 col-lg-8">
                <div class="title text-center">
                    <h1 class="mb-10">Pengumuman</h1>
                    <p>Berita seputar kegiatan sekolah dan ekstrakulikuler.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="active-upcoming-event-carusel">
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
                $query = mysqli_query($conn, "SELECT * FROM pengumuman ORDER BY id_pengumuman DESC");
                while ($data = mysqli_fetch_array($query)) {
                    $tgl = tgl_indo($data['tanggal_terbit_pengumuman']);
                    if ($data['foto_pendukung_pengumuman_satu'] == '') {
                        $num_char = 150;
                        $text = $data['deskripsi_pengumuman'];
                        echo '
                <div class="single-carusel row align-items-center">
                    <div class="col-12 col-md-6 thumb">
                        <img class="img-fluid" src="img/pengumuman.jpg" style="height: 200px;width: 200px" alt="">
                    </div>
                    <div class="detials col-12 col-md-6">
                        <p>' . $tgl . '</p>
                        <a href="detail-pengumuman.php?id=' . $data['id_pengumuman'] . '"><h4>' . $data['judul_pengumuman'] . '</h4></a>
                        <p>
                            ' . substr($text, 0, $num_char) . '...' . '
                        </p>
                    </div>
                </div>';
                    } else {
                        $num_char = 150;
                        $text = $data['deskripsi_pengumuman'];
                        echo '
                <div class="single-carusel row align-items-center">
                    <div class="col-12 col-md-6 thumb">
                        <img class="img-fluid" src="admin/pages/upload/gambar-event/' . $data['foto_pendukung_pengumuman_satu'] . '" style="height: 200px;width: 200px" alt="">
                    </div>
                    <div class="detials col-12 col-md-6">
                        <p>' . $tgl . '</p>
                        <a href="detail-pengumuman.php?id=' . $data['id_pengumuman'] . '"><h4>' . $data['judul_pengumuman'] . '</h4></a>
                        <p>
                            ' . substr($text, 0, $num_char) . '...' . '
                        </p>
                    </div>
                </div>
                ';
                    }
                }
                ?>

            </div>
        </div>
    </div>
</section>
<!-- End upcoming-event Area -->

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