<?php 
require_once('parts/database.php');

	if (isset($_GET['produits'])) {
		$prod_id = htmlspecialchars($_GET['produits']);
		$_SESSION['id_produit'] = $prod_id;
		header('Location: produits-page.php'); 
		exit();
	}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
	<!-- Meta Tag -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name='copyright' content=''>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Title Tag  -->
    <title>Frip Chic - Boutique</title>
	<!-- Favicon -->
	<link rel="icon" type="ico" href="images/frip-chic.ico">
	<!-- Web Font -->
	<link href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;display=swap" rel="stylesheet">
	
	<!-- StyleSheet -->
	
	<!-- Bootstrap -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<!-- Magnific Popup -->
    <link rel="stylesheet" href="css/magnific-popup.min.css">
	<!-- Font Awesome -->
    <link rel="stylesheet" href="css/font-awesome.css">
	<!-- Fancybox -->
	<link rel="stylesheet" href="css/jquery.fancybox.min.css">
	<!-- Themify Icons -->
    <link rel="stylesheet" href="css/themify-icons.css">
	<!-- Jquery Ui -->
    <link rel="stylesheet" href="css/jquery-ui.css">
	<!-- Nice Select CSS -->
    <link rel="stylesheet" href="css/niceselect.css">
	<!-- Animate CSS -->
    <link rel="stylesheet" href="css/animate.css">
	<!-- Flex Slider CSS -->
    <link rel="stylesheet" href="css/flex-slider.min.css">
	<!-- Owl Carousel -->
    <link rel="stylesheet" href="css/owl-carousel.css">
	<!-- Slicknav -->
    <link rel="stylesheet" href="css/slicknav.min.css">
	
	<!-- Eshop StyleSheet -->
	<link rel="stylesheet" href="css/reset.css">
	<link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/responsive.css">

	<!-- Color CSS -->
	<!-- <link rel="stylesheet" href="css/color/color1.css"> -->
	<link rel="stylesheet" href="css/color/color2.css">
	<!--<link rel="stylesheet" href="css/color/color3.css">-->
	<!--<link rel="stylesheet" href="css/color/color4.css">-->
	<!--<link rel="stylesheet" href="css/color/color5.css">-->
	<!--<link rel="stylesheet" href="css/color/color6.css">-->
	<!--<link rel="stylesheet" href="css/color/color7.css">-->
	<!--<link rel="stylesheet" href="css/color/color8.css">-->
	<!--<link rel="stylesheet" href="css/color/color9.css">-->
	<!--<link rel="stylesheet" href="css/color/color10.css">-->
	<!--<link rel="stylesheet" href="css/color/color11.css">-->
	<!--<link rel="stylesheet" href="css/color/color12.css">-->

	<link rel="stylesheet" href="#" id="colors">
	
</head>
<body class="js">
	
	<!-- Preloader -->
	<div class="preloader">
		<div class="preloader-inner">
			<div class="preloader-icon">
				<span></span>
				<span></span>
			</div>
		</div>
	</div>
	<!-- End Preloader -->
	
	
	<!-- Colors ----------------------------------------->
<?php
require_once('parts/colors.php');
?>
	<!-- End Colors ------------------------------------->
		
    <!-- Header ------------------------------------->
<?php
require_once('parts/header.php');
?>
	<!-- End Header --------------------------------->

		<!-- Breadcrumbs -->
		<div class="breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="bread-inner">
							<ul class="bread-list">
								<li><a href="index.php">Acceuil<i class="ti-arrow-right"></i></a></li>
								<li class="active"><a href="blog-single.html">Boutique</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Breadcrumbs -->
		
		<!-- Product Style -->
		<section class="product-area shop-sidebar shop section">
			<div class="container">
				<div class="row">
					<div class="col-lg-3 col-md-4 col-12">
						<div class="shop-sidebar">
								<!-- Single Widget -->
								<div class="single-widget category">
									<h3 class="title">Categories</h3>
									<ul class="categor-list">
										<li><a href="#">T-shirts</a></li>
										<li><a href="#">jackets</a></li>
										<li><a href="#">jeans</a></li>
										<li><a href="#">Chaussures</a></li>
										<li><a href="#">Sacs</a></li>
										<li><a href="#">Montres</a></li>
										<li><a href="#">accesoires</a></li>
									</ul>
								</div>
								<!--/ End Single Widget -->
								<!-- Shop By Price -->
									<div class="single-widget range">
										<h3 class="title">Par Prix</h3>
										<div class="price-filter">
											<div class="price-filter-inner">
												<div id="slider-range"></div>
													<div class="price_slider_amount">
													<div class="label-input">
														<span>Entre:</span><input type="text" id="amount" name="price" placeholder="ajouter ton prix"/>
													</div>
												</div>
											</div>
										</div>
										<ul class="check-box-list">
											<li>
												<label class="checkbox-inline" for="1"><input name="news" id="1" type="checkbox">$20 - $50<span class="count">(3)</span></label>
											</li>
											<li>
												<label class="checkbox-inline" for="2"><input name="news" id="2" type="checkbox">$50 - $100<span class="count">(5)</span></label>
											</li>
											<li>
												<label class="checkbox-inline" for="3"><input name="news" id="3" type="checkbox">$100 - $250<span class="count">(8)</span></label>
											</li>
										</ul>
									</div>
									<!--/ End Shop By Price -->
								<!-- Single Widget -->
								<div class="single-widget recent-post">
									<h3 class="title">Derniers Posts</h3>
									<!-- Single Post -->
									<div class="single-post first">
										<div class="image">
											<img src="images/single-shop-img1.png" alt="#">
										</div>
										<div class="content">
											<h5><a href="#">Girls Dress</a></h5>
											<p class="price">$99.50</p>
											<ul class="reviews">
												<li class="yellow"><i class="ti-star"></i></li>
												<li class="yellow"><i class="ti-star"></i></li>
												<li class="yellow"><i class="ti-star"></i></li>
												<li><i class="ti-star"></i></li>
												<li><i class="ti-star"></i></li>
											</ul>
										</div>
									</div>
									<!-- End Single Post -->
									<!-- Single Post -->
									<div class="single-post first">
										<div class="image">
											<img src="images/single-shop-img2.png" alt="#">
										</div>
										<div class="content">
											<h5><a href="#">Women Clothings</a></h5>
											<p class="price">$99.50</p>
											<ul class="reviews">
												<li class="yellow"><i class="ti-star"></i></li>
												<li class="yellow"><i class="ti-star"></i></li>
												<li class="yellow"><i class="ti-star"></i></li>
												<li class="yellow"><i class="ti-star"></i></li>
												<li><i class="ti-star"></i></li>
											</ul>
										</div>
									</div>
									<!-- End Single Post -->
									<!-- Single Post -->
									<div class="single-post first">
										<div class="image">
											<img src="images/single-shop-img3.png" alt="#">
										</div>
										<div class="content">
											<h5><a href="#">Man Tshirt</a></h5>
											<p class="price">$99.50</p>
											<ul class="reviews">
												<li class="yellow"><i class="ti-star"></i></li>
												<li class="yellow"><i class="ti-star"></i></li>
												<li class="yellow"><i class="ti-star"></i></li>
												<li class="yellow"><i class="ti-star"></i></li>
												<li class="yellow"><i class="ti-star"></i></li>
											</ul>
										</div>
									</div>
									<!-- End Single Post -->
								</div>
								<!--/ End Single Widget -->
								<!-- Single Widget -->
								<div class="single-widget category">
									<h3 class="title">Marques</h3>
									<ul class="categor-list">
										<li><a href="#">Gucci</a></li>
										<li><a href="#">Vesace</a></li>
										<li><a href="#">Dolce & Gabana</a></li>
										<li><a href="#">Umbro</a></li>
										<li><a href="#">zara</a></li>
									</ul>
								</div>
								<!--/ End Single Widget -->
						</div>
					</div>
					<div class="col-lg-9 col-md-8 col-12">
						<div class="row">
							<div class="col-12">
								<!-- Shop Top -->
								<div class="shop-top">
									<div class="shop-shorter">
										<div class="single-shorter">
											<label>Afficher :</label>
											<select name="navig">
												<option selected="selected"><a href="?nav=9">09</a></option>
												<option><a href="?nav=15">15</a></option>
												<option><a href="?nav=25">25</a></option>
												<option><a href="?nav=30">30</a></option>
											</select>
										</div>
										<div class="single-shorter">
											<label>Trier par :</label>
											<select>
												<option selected="selected">Nom</option>
												<option>Prix</option>
												<option>Taille</option>
											</select>
										</div>
									</div>
									<ul class="view-mode">
										<li class="active"><a href="boutique-grid.php"><i class="fa fa-th-large"></i></a></li>
										<li><a href="boutique-list.php"><i class="fa fa-th-list"></i></a></li>
									</ul>
								</div>
								<!--/ End Shop Top -->
							</div>
						</div>
						<div class="row">

						<?php 
							$debut = 1;
							$fin = 10;
							if(isset($_GET['nav'])){
								$fin=htmlspecialchars($_GET['nav']);
							}
							$produits = $db->prepare("SELECT * FROM produits");
            				// $produits->bindValue('fin', $fin, PDO::PARAM_INT);
            				// $produits->bindValue('debut', $debut, PDO::PARAM_INT);
							$produits->execute();
						?>
							<!-- ------------------------ Produits --------------------------- -->
						<?php 
							while ($retour = $produits->fetch(PDO::FETCH_OBJ)) {
						?>
							<div class="col-lg-4 col-md-6 col-12">
									<div class="single-product">
										<div class="product-img">
											<a href="?produits=<?= $retour->id ?>">
												<img class="default-img" src="images/products/p_<?= $retour->id ?>_1.jpg" alt="#">
												<img class="hover-img" src="images/products/p_<?= $retour->id ?>_2.jpg" alt="#">
											</a>
											<div class="button-head">
												<div class="product-action">
													<a data-toggle="modal" data-target="#exampleModal"  href="?produits=<?= $retour->id ?>"><i class=" ti-eye"></i><span>Voir produit</span></a>
													<a  href="#"><i class=" ti-heart "></i><span>Ajouter aux souhaits</span></a>
													<a  href="#"><i class="ti-bar-chart-alt"></i><span>Voir similaires</span></a>
												</div>
												<div class="product-action-2">
													<a title="Au panier" href="#">Ajouter au panier</a>
												</div>
											</div>
										</div>
										<div class="product-content">
											<h3><a href="?produits=<?= $retour->id ?>"><?= $retour->nom ?></a></h3>
											<div class="product-price">
												<span><?= $retour->prix ?> Fcfa</span>
											</div>
										</div>
									</div>
								</div>
						<?php 		
							}
						?>
							
							<!-- ------------------------ Produits --------------------------- -->

						</div>
								<div class="col-12">
									<!-- Pagination -->
									<div class="pagination">
										<ul class="pagination-list">
											<li><a href="#"><i class="ti-arrow-left"></i></a></li>
											<li class="active"><a href="#">1</a></li>
											<li><a href="#">2</a></li>
											<li><a href="#">3</a></li>
											<li><a href="#"><i class="ti-arrow-right"></i></a></li>
										</ul>
									</div>
									<!--/ End Pagination -->
								</div>
					</div>
				</div>
			</div>
		</section>
		<!--/ End Product Style 1  -->	


		<!-- Start Shop Newsletter  -->
        <section class="shop-newsletter section">
            <div class="container">
                <div class="inner-top">
                    <div class="row">
                        <div class="col-lg-8 offset-lg-2 col-12">
                            <!-- Start Newsletter Inner -->
                            <div class="inner">
                                <h4>Newsletter</h4>
                                <p> S'inscrire à notre newsletter et obtenir <span>10%</span> de moins sur votre premier achat.</p>
                                <form action="mail/mail.php" method="get" target="_blank" class="newsletter-inner">
                                    <input name="EMAIL" placeholder="Your email address" required="" type="email">
                                    <button class="btn">S'inscrire</button>
                                </form>
                            </div>
                            <!-- End Newsletter Inner -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
	<!-- End Shop Newsletter -->
		

	<!-- Footer ----------------------------------------->
<?php
require_once('parts/footer.php');
?>
	<!-- End Footer ------------------------------------->
	
    <!-- Jquery -->
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery-migrate-3.0.0.js"></script>
	<script src="js/jquery-ui.min.js"></script>
	<!-- Popper JS -->
	<script src="js/popper.min.js"></script>
	<!-- Bootstrap JS -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Color JS -->
	<script src="js/colors.js"></script>
	<!-- Slicknav JS -->
	<script src="js/slicknav.min.js"></script>
	<!-- Owl Carousel JS -->
	<script src="js/owl-carousel.js"></script>
	<!-- Magnific Popup JS -->
	<script src="js/magnific-popup.js"></script>
	<!-- Fancybox JS -->
	<script src="js/facnybox.min.js"></script>
	<!-- Waypoints JS -->
	<script src="js/waypoints.min.js"></script>
	<!-- Countdown JS -->
	<script src="js/finalcountdown.min.js"></script>
	<!-- Nice Select JS -->
	<script src="js/nicesellect.js"></script>
	<!-- Ytplayer JS -->
	<script src="js/ytplayer.min.js"></script>
	<!-- Flex Slider JS -->
	<script src="js/flex-slider.js"></script>
	<!-- ScrollUp JS -->
	<script src="js/scrollup.js"></script>
	<!-- Onepage Nav JS -->
	<script src="js/onepage-nav.min.js"></script>
	<!-- Easing JS -->
	<script src="js/easing.js"></script>
	<!-- Active JS -->
	<script src="js/active.js"></script>
</body>

</html>