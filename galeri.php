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
			<section class="banner-area relative about-banner" id="home">	
				<div class="overlay overlay-bg"></div>
				<div class="container">				
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								Galeri
							</h1>	
							<p class="text-white link-nav"><a href="index.php">Beranda </a>  <span class="lnr lnr-arrow-right"></span>  <a href="galeri.php"> Galeri</a></p>
						</div>	
					</div>
				</div>
			</section>
			<!-- End banner Area -->	
				
			<!-- Start gallery Area -->
			<section class="gallery-area section-gap">
				<div class="container">
					<div class="row">
                        <?php
                        require 'connection/config.php';
                        $halaman = 6;
                        $page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
                        $mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
                        $result = mysqli_query($conn, "SELECT * FROM galeri");
                        $total = mysqli_num_rows($result);
                        $pages = ceil($total/$halaman);
                        $query = mysqli_query($conn, "SELECT * FROM galeri LIMIT $mulai, $halaman");
                        while ($data = mysqli_fetch_array($query)) {
                        echo '
						<div class="col-lg-4">
							<a href="admin/pages/upload/gambar-galeri/'.$data['photo_galeri'].'" class="img-gal">
								<div class="single-imgs relative">		
									<div class="overlay overlay-bg"></div>
									<div class="relative">				
										<img class="img-fluid" src="admin/pages/upload/gambar-galeri/'.$data['photo_galeri'].'" style="height: 300px" alt="">				
									</div>
                                        <h4 style="text-align: center; background-color: #777777;color: white"> '.$data['kegiatan_galeri'].'</h4>                              
								</div>
							</a>
						</div>
						'; }?>
					</div>
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
			</section>
			<!-- End gallery Area -->

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
            <?php include "component/footer.php"?>
			<!-- End footer Area -->


			<script src="js/vendor/jquery-2.2.4.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
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