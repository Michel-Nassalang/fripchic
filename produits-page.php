<?php 
require_once('parts/database.php');
?>

<?php 
require_once('parts/achat.php');

if(isset($_GET['acheter'])){
	$achat = new ACHAT();
	$quantite = "<script>$('.input-number').val();</script>";
	if(isset($_GET['couleur'])){
		$couleur = htmlspecialchars($_GET['couleur']);
		if (isset($_GET['taille'])) {
			$taille = htmlspecialchars($_GET['taille']);
			$achat->acheter($_SESSION['id_produit'],$couleur,$taille,$quantite);
		}else {
			$achat->cacheter($_SESSION['id_produit'],$couleur,$quantite);
		}
	}else{
		if (isset($_GET['taille'])) {
			$taille = htmlspecialchars($_GET['taille']);
			$achat->tacheter($_SESSION['id_produit'],$taille,$quantite);
		}else {
			$achat->tcacheter($_SESSION['id_produit'],$quantite);
		}
	}
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
    <title>Frip Chic - Produits</title>
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
								<li class="active"><a href="boutique-grid.php">Produits</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Breadcrumbs -->
		
		<!-- -------------------------------- Recupération des données du produit -------------------------------- -->

		<?php 
			$prod = $db->prepare("SELECT * FROM produits WHERE id=:id");
			$prod->execute([
				"id" => $_SESSION['id_produit']
			]);
			$produit = $prod->fetch(PDO::FETCH_OBJ);
		?>

		<!-- Shop Single -->
		<section class="shop single section">
					<div class="container">
						<div class="row"> 
							<div class="col-12">
								<form action="" method="get">
								<div class="row">
									<div class="col-lg-6 col-12">
										<!-- Product Slider -->
										<div class="product-gallery">
											<!-- Images slider -->
											<div class="flexslider-thumbnails">
												<ul class="slides">
													<?php for ($i=1; $i <5 ; $i++) { 
													?>	
													<li data-thumb="images/products/p_<?= $produit->id ?>_<?= $i?>.jpg" rel="adjustX:10, adjustY:">
														<img src="images/products/p_<?= $produit->id ?>_<?= $i?>.jpg" alt="#">
													</li>
													<?php
													} ?>
													<!-- <li data-thumb="images/bx-slider1.jpg" rel="adjustX:10, adjustY:">
														<img src="images/bx-slider1.jpg" alt="#">
													</li>
													<li data-thumb="images/bx-slider2.jpg">
														<img src="images/bx-slider2.jpg" alt="#">
													</li>
													<li data-thumb="images/bx-slider3.jpg">
														<img src="images/bx-slider3.jpg" alt="#">
													</li>
													<li data-thumb="images/bx-slider4.jpg">
														<img src="images/bx-slider4.jpg" alt="#">
													</li> -->
												</ul>
											</div>
											<!-- End Images slider -->
										</div>
										<!-- End Product slider -->
									</div>

									<div class="col-lg-6 col-12">
										<div class="product-des">
											<!-- Description -->
											<div class="short">
												<h4><?= $produit->nom ?></h4>
												<div class="rating-main">
													<ul class="rating">
														<li><i class="fa fa-star"></i></li>
														<li><i class="fa fa-star"></i></li>
														<li><i class="fa fa-star"></i></li>
														<li><i class="fa fa-star-half-o"></i></li>
														<li class="dark"><i class="fa fa-star-o"></i></li>
													</ul>
													<a class="total-review">(102) Avis</a>
												</div>
												<p class="price"><span class="discount"><?= $produit->prix ?> Fcfa</span><s><?= $produit->price ?> Fcfa</s> </p>
												<p class="description"><?= $produit->description ?></p>
											</div>
											<!--/ End Description -->
											<!-- Color -->
											<div class="color">
												<h4>Options disponibles <span>Couleurs</span></h4>
												<ul>
													<?php
														$couleurs =  explode("/", (string)$produit->couleurs);
														for ($i=0; $i < count($couleurs); $i++) { 
													?>	
													<li><a class="couleur<?= $i ?> <?= $couleurs[$i] ?>"><i class="ti-check"></i></a></li>
													<?php
														}
													?>
												</ul>
											</div>
											<!--/ End Color -->
											<!-- Size -->
											<div class="size">
												<h4>Taille</h4>
												<ul>
													<?php
														$taille =  explode("/", (string)$produit->taille);
														for ($i=0; $i < count($taille); $i++) { 
													?>	
													<li><a class="taille<?= $i ?>"><?= $taille[$i] ?></a></li>
													<?php
														}
													?>
												</ul>
											</div>
											<!--/ End Size -->
											<!-- Product Buy -->
											<div class="product-buy">
												<div class="quantity">
													<h6>Quantité :</h6>
													<!-- Input Order -->
													<div class="input-group">
														<div class="button minus">
															<button type="button" class="btn btn-primary btn-number" disabled="disabled" data-type="minus" data-field="quant[1]">
																<i class="ti-minus"></i>
															</button>
														</div>
														<input type="text" name="quant[1]" class="input-number"  data-min="1" data-max="<?= $produit->stock ?>" value="1">
														<div class="button plus">
															<button type="button" class="btn btn-primary btn-number" data-type="plus" data-field="quant[1]">
																<i class="ti-plus"></i>
															</button>
														</div>
													</div>
													<!--/ End Input Order -->
												</div>
												<div class="add-to-cart">
													<a href="?acheter=<?= $_SESSION['id_produit'] ?>"  class="btn">Ajouter au panier</a>
													<a href="#" class="btn min"><i class="ti-heart"></i></a>
													<a href="#" class="btn min"><i class="fa fa-compress"></i></a>
												</div>
												<p class="cat">Categorie :<a href="#"><?= $produit->categorie ?></a></p>
												<p class="availability">Disponibilité : <?= $produit->stock ?> Produits En Stock</p>
											</div>
											<!--/ End Product Buy -->
										</div>
									</div>
								</div>
								</form>
								<div class="row">
									<div class="col-12">
										<div class="product-info">
											<div class="nav-main">
												<!-- Tab Nav -->
												<ul class="nav nav-tabs" id="myTab" role="tablist">
													<li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#description" role="tab">Description</a></li>
													<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#reviews" role="tab">Avis</a></li>
												</ul>
												<!--/ End Tab Nav -->
											</div>
											<div class="tab-content" id="myTabContent">
												<!-- Description Tab -->
												<div class="tab-pane fade show active" id="description" role="tabpanel">
													<div class="tab-single">
														<div class="row">
															<div class="col-12">
																<div class="single-des">
																	<p><?= $produit->description ?></p>
																</div>
																<div class="single-des">
																	<p><?= $produit->description ?></p>
																</div>
																<div class="single-des">
																	<h4>Caractéristiques du produit:</h4>
																	<ul>
																	<?php
																		$carac =  explode("/", (string)$produit->caracteristique);
																		for ($i=0; $i < count($carac); $i++) { 
																	?>	
																		<li><?= $carac[$i] ?></li>
																	<?php
																		}
																	?>
																	</ul>
																</div>
															</div>
														</div>
													</div>
												</div>
												<!--/ End Description Tab -->
												<!-- Reviews Tab -->
												<div class="tab-pane fade" id="reviews" role="tabpanel">
													<div class="tab-single review-panel">
														<div class="row">
															<div class="col-12">
																<div class="ratting-main">
																	<div class="avg-ratting">
																		<h4>4.5 <span>(global)</span></h4>
																		<span>Basé sur 1 Commentaire</span>
																	</div>
																	<!-- Single Rating -->
																	<div class="single-rating">
																		<div class="rating-author">
																			<img src="images/comments1.jpg" alt="#">
																		</div>
																		<div class="rating-des">
																			<h6>Naimur Rahman</h6>
																			<div class="ratings">
																				<ul class="rating">
																					<li><i class="fa fa-star"></i></li>
																					<li><i class="fa fa-star"></i></li>
																					<li><i class="fa fa-star"></i></li>
																					<li><i class="fa fa-star-half-o"></i></li>
																					<li><i class="fa fa-star-o"></i></li>
																				</ul>
																				<div class="rate-count">(<span>3.5</span>)</div>
																			</div>
																			<p>Duis tincidunt mauris ac aliquet congue. Donec vestibulum consequat cursus. Aliquam pellentesque nulla dolor, in imperdiet.</p>
																		</div>
																	</div>
																	<!--/ End Single Rating -->
																	<!-- Single Rating -->
																	<div class="single-rating">
																		<div class="rating-author">
																			<img src="images/comments2.jpg" alt="#">
																		</div>
																		<div class="rating-des">
																			<h6>Advin Geri</h6>
																			<div class="ratings">
																				<ul class="rating">
																					<li><i class="fa fa-star"></i></li>
																					<li><i class="fa fa-star"></i></li>
																					<li><i class="fa fa-star"></i></li>
																					<li><i class="fa fa-star"></i></li>
																					<li><i class="fa fa-star"></i></li>
																				</ul>
																				<div class="rate-count">(<span>5.0</span>)</div>
																			</div>
																			<p>Duis tincidunt mauris ac aliquet congue. Donec vestibulum consequat cursus. Aliquam pellentesque nulla dolor, in imperdiet.</p>
																		</div>
																	</div>
																	<!--/ End Single Rating -->
																</div>
																<!-- Review -->
																<div class="comment-review">
																	<div class="add-review">
																		<h5>Ajout d'un Avis</h5>
																		<p>Votre adresse Email ne sera pas publiée. Les champs éxigés sont marqués</p>
																	</div>
																	<h4>Votre note</h4>
																	<div class="review-inner">
																		<div class="ratings">
																			<ul class="rating">
																				<li><i class="fa fa-star"></i></li>
																				<li><i class="fa fa-star"></i></li>
																				<li><i class="fa fa-star"></i></li>
																				<li><i class="fa fa-star"></i></li>
																				<li><i class="fa fa-star"></i></li>
																			</ul>
																		</div>
																	</div>
																</div>
																<!--/ End Review -->
																<!-- Form -->
																<form class="form" method="post" action="https://wpthemesgrid.com/themes/eshop/mail/mail.php">
																	<div class="row">
																		<div class="col-lg-6 col-12">
																			<div class="form-group">
																				<label>Nom<span>*</span></label>
																				<input type="text" name="name" required="required" placeholder="">
																			</div>
																		</div>
																		<div class="col-lg-6 col-12">
																			<div class="form-group">
																				<label>Email<span>*</span></label>
																				<input type="email" name="email" required="required" placeholder="">
																			</div>
																		</div>
																		<div class="col-lg-12 col-12">
																			<div class="form-group">
																				<label>Ecrire mon avis<span>*</span></label>
																				<textarea name="message" rows="6" placeholder="" ></textarea>
																			</div>
																		</div>
																		<div class="col-lg-12 col-12">
																			<div class="form-group button5">	
																				<button type="submit" class="btn">Soumettre</button>
																			</div>
																		</div>
																	</div>
																</form>
																<!--/ End Form -->
															</div>
														</div>
													</div>
												</div>
												<!--/ End Reviews Tab -->
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
		</section>
		<!--/ End Shop Single -->
		
		<!-- -------------------------------- Fin Recupération des données du produit -------------------------------- -->

		<!-- Start Most Popular -->
	<div class="product-area most-popular related-product section">
        <div class="container">
            <div class="row">
				<div class="col-12">
					<div class="section-title">
						<h2>Produits apparentés</h2>
					</div>
				</div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="owl-carousel popular-slider">
						<!-- Start Single Product -->
						<div class="single-product">
							<div class="product-img">
								<a href="product-details.html">
									<img class="default-img" src="images/products/p15.jpg" alt="#">
									<img class="hover-img" src="images/products/p16.jpg" alt="#">
									<span class="out-of-stock">Hot</span>
								</a>
								<div class="button-head">
									<div class="product-action">
										<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
										<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
										<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
									</div>
									<div class="product-action-2">
										<a title="Add to cart" href="#">Add to cart</a>
									</div>
								</div>
							</div>
							<div class="product-content">
								<h3><a href="product-details.html">Black Sunglass For Women</a></h3>
								<div class="product-price">
									<span class="old">$60.00</span>
									<span>$50.00</span>
								</div>
							</div>
						</div>
						<!-- End Single Product -->
						<!-- Start Single Product -->
						<div class="single-product">
                            <div class="product-img">
                                <a href="product-details.html">
                                    <img class="default-img" src="images/products/p1.jpg" alt="#">
                                    <img class="hover-img" src="images/products/p2.jpg" alt="#">
                                </a>
								<div class="button-head">
									<div class="product-action">
										<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
										<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
										<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
									</div>
									<div class="product-action-2">
										<a title="Add to cart" href="#">Add to cart</a>
									</div>
								</div>
                            </div>
                            <div class="product-content">
                                <h3><a href="product-details.html">Women Hot Collection</a></h3>
                                <div class="product-price">
                                    <span>$50.00</span>
                                </div>
                            </div>
                        </div>
						<!-- End Single Product -->
						<!-- Start Single Product -->
						<div class="single-product">
                            <div class="product-img">
                                <a href="product-details.html">
                                    <img class="default-img" src="images/products/p3.jpg" alt="#">
                                    <img class="hover-img" src="images/products/p4.jpg" alt="#">
									<span class="new">New</span>
                                </a>
								<div class="button-head">
									<div class="product-action">
										<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
										<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
										<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
									</div>
									<div class="product-action-2">
										<a title="Add to cart" href="#">Add to cart</a>
									</div>
								</div>
                            </div>
                            <div class="product-content">
                                <h3><a href="product-details.html">Awesome Pink Show</a></h3>
                                <div class="product-price">
                                    <span>$50.00</span>
                                </div>
                            </div>
                        </div>
						<!-- End Single Product -->
						<!-- Start Single Product -->
						<div class="single-product">
                            <div class="product-img">
                                <a href="product-details.html">
                                    <img class="default-img" src="images/products/p5.jpg" alt="#">
                                    <img class="hover-img" src="images/products/p6.jpg" alt="#">
                                </a>
								<div class="button-head">
									<div class="product-action">
										<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
										<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
										<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
									</div>
									<div class="product-action-2">
										<a title="Add to cart" href="#">Add to cart</a>
									</div>
								</div>
                            </div>
                            <div class="product-content">
                                <h3><a href="product-details.html">Awesome Bags Collection</a></h3>
                                <div class="product-price">
                                    <span>$50.00</span>
                                </div>
                            </div>
                        </div>
						<!-- End Single Product -->
                    </div>
                </div>
            </div>
        </div>
    </div>
	<!-- End Most Popular Area -->
	
	<!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="ti-close" aria-hidden="true"></span></button>
                    </div>
                    <div class="modal-body">
                        <div class="row no-gutters">
                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                <!-- Product Slider -->
									<div class="product-gallery">
										<div class="quickview-slider-active">
											<div class="single-slider">
												<img src="images/modal1.png" alt="#">
											</div>
											<div class="single-slider">
												<img src="images/modal2.png" alt="#">
											</div>
											<div class="single-slider">
												<img src="images/modal3.png" alt="#">
											</div>
											<div class="single-slider">
												<img src="images/modal4.png" alt="#">
											</div>
										</div>
									</div>
								<!-- End Product slider -->
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                <div class="quickview-content">
                                    <h2>Flared Shift Dress</h2>
                                    <div class="quickview-ratting-review">
                                        <div class="quickview-ratting-wrap">
                                            <div class="quickview-ratting">
                                                <i class="yellow fa fa-star"></i>
                                                <i class="yellow fa fa-star"></i>
                                                <i class="yellow fa fa-star"></i>
                                                <i class="yellow fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <a href="#"> (1 customer review)</a>
                                        </div>
                                        <div class="quickview-stock">
                                            <span><i class="fa fa-check-circle-o"></i> in stock</span>
                                        </div>
                                    </div>
                                    <h3>$29.00</h3>
                                    <div class="quickview-peragraph">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia iste laborum ad impedit pariatur esse optio tempora sint ullam autem deleniti nam in quos qui nemo ipsum numquam.</p>
                                    </div>
									<div class="size">
										<div class="row">
											<div class="col-lg-6 col-12">
												<h5 class="title">Size</h5>
												<select>
													<option selected="selected">s</option>
													<option>m</option>
													<option>l</option>
													<option>xl</option>
												</select>
											</div>
											<div class="col-lg-6 col-12">
												<h5 class="title">Color</h5>
												<select>
													<option selected="selected">orange</option>
													<option>purple</option>
													<option>black</option>
													<option>pink</option>
												</select>
											</div>
										</div>
									</div>
                                    <div class="quantity">
										<!-- Input Order -->
										<div class="input-group">
											<div class="button minus">
												<button type="button" class="btn btn-primary btn-number" disabled="disabled" data-type="minus" data-field="quant[1]">
													<i class="ti-minus"></i>
												</button>
											</div>
											<input type="text" name="quant[1]" class="input-number"  data-min="1" data-max="1000" value="1">
											<div class="button plus">
												<button type="button" class="btn btn-primary btn-number" data-type="plus" data-field="quant[1]">
													<i class="ti-plus"></i>
												</button>
											</div>
										</div>
										<!--/ End Input Order -->
									</div>
									<div class="add-to-cart">
										<a href="#" class="btn">Add to cart</a>
										<a href="#" class="btn min"><i class="ti-heart"></i></a>
										<a href="#" class="btn min"><i class="fa fa-compress"></i></a>
									</div>
                                    <div class="default-social">
										<h4 class="share-now">Share:</h4>
                                        <ul>
                                            <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                                            <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                                            <li><a class="youtube" href="#"><i class="fa fa-pinterest-p"></i></a></li>
                                            <li><a class="dribbble" href="#"><i class="fa fa-google-plus"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    <!-- Modal end -->
	
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
	<!-- Zoom JS -->
	<script src="js/zoomsl.min.js"></script>
	<script src="js/products.js" ></script>
	<!-- <script>
		$(function(){
		$(".flexslider-thumbnails .slides li img").imagezoomsl({
			scrollspeedanimate: 5 , 
			zoomspeedanimate: 7,
			loopspeedanimate: 2.5,   
			magnifierspeedanimate: 350
		});
		});
	</script> -->
	
</body>

</html>