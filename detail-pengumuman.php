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
<?php include "component/header.php"?>
<!-- start banner Area -->
<section class="banner-area relative" id="home">
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="row d-flex align-items-center justify-content-center">
            <div class="about-content col-lg-12">
                <?php
                require 'connection/config.php';
                $id = $_GET['id'];
                $query = mysqli_query($conn, "SELECT * FROM pengumuman WHERE id_pengumuman='$id'");
                $data = mysqli_fetch_array($query);
                ?>
                <h1 class="text-white">
                    <?php echo $data['judul_pengumuman']?>
                </h1>
                <p class="text-white link-nav"><a href="index.php">Beranda </a> <span class="lnr lnr-arrow-right"></span><a
                            href="pengumuman.php?halaman=1">Pengumuman</a> <span class="lnr lnr-arrow-right"></span> <a
                            href="detail-pengumuman.php?id=<?php echo $data['id_pengumuman']?> ?>"> <?php echo $data['judul_pengumuman']?></a></p>
            </div>
        </div>
    </div>
</section>
<!-- End banner Area -->

<!-- Start post-content Area -->
<section class="post-content-area single-post-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 posts-list">
                <div class="single-post row">
                    <div class="col-lg-12">
                        <div class="feature-img">
                            <?php
                            if($data['foto_pendukung_pengumuman_satu']=='') {
                                ?>
                                <img class="img-fluid" src="img/pengumuman.jpg" alt="">
                                <?php
                            }else {
                                ?>
                                <img class="img-fluid" src="admin/pages/upload/gambar-event/<?php echo $data['foto_pendukung_pengumuman_satu'] ?>" style="height: 300px" alt="">
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                    <div class="col-lg-3  col-md-3 meta-details">
                        <ul class="tags">
                            <?php
                            if ($data['kategori_pengumuman'] == 'akademik') {
                                $ketegori = "Pendidikan";
                            } else {
                                $ketegori = "Non Pendidikan";
                            }
                            ?>
                            <li><a href="#"><?php echo $ketegori ?></a></li>
                        </ul>
                        <div class="user-details row">
                            <p class="user-name col-lg-12 col-md-12 col-6"><a href="#"><?php echo $data['penulis_pengumuman']?></a> <span
                                        class="lnr lnr-user"></span></p>
                            <p class="date col-lg-12 col-md-12 col-6"><a href="#"><?php echo tgl_indo($data['tanggal_terbit_pengumuman']); ?></a> <span
                                        class="lnr lnr-calendar-full"></span></p>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-9">
                        <h3 class="mt-20 mb-20"><?php echo $data['judul_pengumuman'] ?></h3>
                        <p class="excert">
                            <?php echo $data['deskripsi_pengumuman']?>
                        </p>
                    </div>
                    <div class="col-lg-12">
                        <div class="quotes">
                            Keterangan Lain (Tempat/Waktu) :<br>
                            <?php echo $data['pelaksanaan_kegiatan_pengumuman']?>
                        </div>
                        <div class="row mt-30 mb-30">
                            <div class="col-6">
                                <img class="img-fluid" src="admin/pages/upload/gambar-event/<?php echo $data['foto_pendukung_pengumuman_satu']?>" style="height: 200px"alt="">
                            </div>
                            <div class="col-6">
                                <img class="img-fluid" src="admin/pages/upload/gambar-event/<?php echo $data['foto_pendukung_pengumuman_dua']?>" style="height: 200px" alt="">
                            </div>
                        </div>
                    </div>
                </div>
<!--                <div class="comments-area">-->
<!--                    <h4>05 Comments</h4>-->
<!--                    <div class="comment-list">-->
<!--                        <div class="single-comment justify-content-between d-flex">-->
<!--                            <div class="user justify-content-between d-flex">-->
<!--                                <div class="thumb">-->
<!--                                    <img src="img/blog/c1.jpg" alt="">-->
<!--                                </div>-->
<!--                                <div class="desc">-->
<!--                                    <h5><a href="#">Emilly Blunt</a></h5>-->
<!--                                    <p class="date">December 4, 2017 at 3:12 pm </p>-->
<!--                                    <p class="comment">-->
<!--                                        Never say goodbye till the end comes!-->
<!--                                    </p>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="reply-btn">-->
<!--                                <a href="" class="btn-reply text-uppercase">reply</a>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="comment-list left-padding">-->
<!--                        <div class="single-comment justify-content-between d-flex">-->
<!--                            <div class="user justify-content-between d-flex">-->
<!--                                <div class="thumb">-->
<!--                                    <img src="img/blog/c2.jpg" alt="">-->
<!--                                </div>-->
<!--                                <div class="desc">-->
<!--                                    <h5><a href="#">Elsie Cunningham</a></h5>-->
<!--                                    <p class="date">December 4, 2017 at 3:12 pm </p>-->
<!--                                    <p class="comment">-->
<!--                                        Never say goodbye till the end comes!-->
<!--                                    </p>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="reply-btn">-->
<!--                                <a href="" class="btn-reply text-uppercase">reply</a>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="comment-list left-padding">-->
<!--                        <div class="single-comment justify-content-between d-flex">-->
<!--                            <div class="user justify-content-between d-flex">-->
<!--                                <div class="thumb">-->
<!--                                    <img src="img/blog/c3.jpg" alt="">-->
<!--                                </div>-->
<!--                                <div class="desc">-->
<!--                                    <h5><a href="#">Annie Stephens</a></h5>-->
<!--                                    <p class="date">December 4, 2017 at 3:12 pm </p>-->
<!--                                    <p class="comment">-->
<!--                                        Never say goodbye till the end comes!-->
<!--                                    </p>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="reply-btn">-->
<!--                                <a href="" class="btn-reply text-uppercase">reply</a>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="comment-list">-->
<!--                        <div class="single-comment justify-content-between d-flex">-->
<!--                            <div class="user justify-content-between d-flex">-->
<!--                                <div class="thumb">-->
<!--                                    <img src="img/blog/c4.jpg" alt="">-->
<!--                                </div>-->
<!--                                <div class="desc">-->
<!--                                    <h5><a href="#">Maria Luna</a></h5>-->
<!--                                    <p class="date">December 4, 2017 at 3:12 pm </p>-->
<!--                                    <p class="comment">-->
<!--                                        Never say goodbye till the end comes!-->
<!--                                    </p>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="reply-btn">-->
<!--                                <a href="" class="btn-reply text-uppercase">reply</a>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="comment-list">-->
<!--                        <div class="single-comment justify-content-between d-flex">-->
<!--                            <div class="user justify-content-between d-flex">-->
<!--                                <div class="thumb">-->
<!--                                    <img src="img/blog/c5.jpg" alt="">-->
<!--                                </div>-->
<!--                                <div class="desc">-->
<!--                                    <h5><a href="#">Ina Hayes</a></h5>-->
<!--                                    <p class="date">December 4, 2017 at 3:12 pm </p>-->
<!--                                    <p class="comment">-->
<!--                                        Never say goodbye till the end comes!-->
<!--                                    </p>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="reply-btn">-->
<!--                                <a href="" class="btn-reply text-uppercase">reply</a>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="comment-form">-->
<!--                    <h4>Leave a Comment</h4>-->
<!--                    <form>-->
<!--                        <div class="form-group form-inline">-->
<!--                            <div class="form-group col-lg-6 col-md-12 name">-->
<!--                                <input type="text" class="form-control" id="name" placeholder="Enter Name"-->
<!--                                       onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Name'">-->
<!--                            </div>-->
<!--                            <div class="form-group col-lg-6 col-md-12 email">-->
<!--                                <input type="email" class="form-control" id="email" placeholder="Enter email address"-->
<!--                                       onfocus="this.placeholder = ''"-->
<!--                                       onblur="this.placeholder = 'Enter email address'">-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <div class="form-group">-->
<!--                            <input type="text" class="form-control" id="subject" placeholder="Subject"-->
<!--                                   onfocus="this.placeholder = ''" onblur="this.placeholder = 'Subject'">-->
<!--                        </div>-->
<!--                        <div class="form-group">-->
<!--                            <textarea class="form-control mb-10" rows="5" name="message" placeholder="Messege"-->
<!--                                      onfocus="this.placeholder = ''" onblur="this.placeholder = 'Messege'"-->
<!--                                      required=""></textarea>-->
<!--                        </div>-->
<!--                        <a href="#" class="primary-btn text-uppercase">Post Comment</a>-->
<!--                    </form>-->
<!--                </div>-->
            </div>
            <div class="col-lg-4 sidebar-widgets">
                <div class="widget-wrap">
                    <div class="single-sidebar-widget popular-post-widget">
                        <h4 class="popular-title">Pengumuman Populer</h4>
                        <div class="popular-post-list">
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
<?php include "component/footer.php"?>
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