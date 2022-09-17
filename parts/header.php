<?php 
require_once('parts/database.php');
?>
<!-- Header -->
		<header class="header shop">
			<!-- Topbar -->
			<div class="topbar">
				<div class="container">
					<div class="row">
						<div class="col-lg-5 col-md-12 col-12">
							<!-- Top Left -->
							<div class="top-left">
								<ul class="list-main">
								<li><i class="ti-headphone-alt"></i> +221 771112236</li>
								<li><i class="ti-email"></i> clientele.fripchic@gmail.com</li>
								</ul>
							</div>
							<!--/ End Top Left -->
						</div>
						<div class="col-lg-7 col-md-12 col-12">
							<!-- Top Right -->
							<div class="right-content">
								<ul class="list-main">
								<li><i class="ti-location-pin"></i> Local de la boutique</li>
								<li><i class="ti-alarm-clock"></i> <a href="#">Deal du jour</a></li>
								<li><i class="ti-user"></i> <a href="count.php">Mon compte</a></li>
								<?php 
								if(isset($_SESSION['id']) && isset($_SESSION['email'])){
								?>
								<li><i class="ti-power-off"></i><a href="parts/deconnexion.php">Déconnexion</a></li>
								<?php 	
								}else{ 	
								?>
								<li><i class="ti-power-off"></i><a href="login.php">Connexion</a></li>
								<?php
								}
								?>
								</ul>
							</div>
							<!-- End Top Right -->
						</div>
					</div>
				</div>
			</div>
			<!-- End Topbar -->
			<div class="middle-inner">
				<div class="container">
					<div class="row">
						<div class="col-lg-2 col-md-2 col-12">
							<!-- Logo -->
							<div class="logo">
								<a href="index.php"><img src="images/logo-frip-chic.png" alt="logo"></a>
							</div>
							<!--/ End Logo -->
							<!-- Search Form -->
							<div class="search-top">
								<div class="top-search"><a href="#0"><i class="ti-search"></i></a></div>
								<!-- Search Form -->
								<div class="search-top">
									<form class="search-form">
										<input type="text" placeholder="Rechercher ici..." name="search">
										<button value="search" type="submit"><i class="ti-search"></i></button>
									</form>
								</div>
								<!--/ End Search Form -->
							</div>
							<!--/ End Search Form -->
							<div class="mobile-nav"></div>
						</div>
						<div class="col-lg-8 col-md-7 col-12">
							<div class="search-bar-top">
								<div class="search-bar">
									<select>
									<option selected="selected">Catégories</option>
									<option>Montre</option>
									<option>mobile</option>
									<option>Articles d'enfants</option>
									</select>
									<form>
									<input name="search" placeholder="Cherchez votre produit ici ..." type="search">
										<button class="btnn"><i class="ti-search"></i></button>
									</form>
								</div>
							</div>
						</div>
						<div class="col-lg-2 col-md-3 col-12">
							<div class="right-bar">
								<!-- Search Form -->
								<div class="sinlge-bar">
									<a href="#" class="single-icon"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
								</div>
								<div class="sinlge-bar">
									<a href="login.php" class="single-icon"><i class="fa fa-user-circle-o" aria-hidden="true"></i></a>
								</div>
								<div class="sinlge-bar shopping">
									<a href="#" class="single-icon"><i class="ti-bag"></i> <span class="total-count">2</span></a>
									<!-- Shopping Item -->
									<div class="shopping-item">
										<div class="dropdown-cart-header">
										<span>2 Articles</span>
										<a href="#">Voir panier</a>
										</div>
										<ul class="shopping-list">
										<li>
											<a href="#" class="remove" title="Remove this item"><i class="fa fa-remove"></i></a>
											<a class="cart-img" href="produits-page.php"><img src="images/product-1.jpg" alt="#"></a>
											<h4><a href="#">Woman Ring</a></h4>
											<p class="quantity">1x - <span class="amount">$99.00</span></p>
										</li>
										<li>
											<a href="#" class="remove" title="Remove this item"><i class="fa fa-remove"></i></a>
											<a class="cart-img" href="produits-page.php"><img src="images/product-2.jpg" alt="#"></a>
											<h4><a href="#">Woman Necklace</a></h4>
											<p class="quantity">1x - <span class="amount">$35.00</span></p>
										</li>
										</ul>
										<div class="bottom">
											<div class="total">
												<span>Total</span>
												<span class="total-amount">$134.00</span>
											</div>
											<a href="cart.php" class="btn animate">Panier</a>
										</div>
									</div>
									<!--/ End Shopping Item -->
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Header Inner -->
			<div class="header-inner">
				<div class="container">
					<div class="cat-nav-head">
						<div class="row">
							<div class="col-12">
								<div class="menu-area">
									<!-- Main Menu -->
									<nav class="navbar navbar-expand-lg">
										<div class="navbar-collapse">	
											<div class="nav-inner">		
											    <ul class="nav main-menu menu navbar-nav">
													<li class="active"><a href="index.php">Acceuil</a></li>
													<li><a href="boutique-grid.php">Produits</a></li>												
													<li><a href="#">Services</a></li>
													<li><a href="#">Boutique<i class="ti-angle-down"></i><span class="new">New</span></a>
														<ul class="dropdown">
															<li><a href="boutique-grid.php">Boutique</a></li>
															<li><a href="cart.php">Panier</a></li>
															<li><a href="checkout.php">Caisse</a></li>
														</ul>
													</li>							
													<li><a href="#">Blog<i class="ti-angle-down"></i></a>
														<ul class="dropdown">
															<li><a href="blog-grid-sidebar.php">Blog Articles</a></li>
															<li><a href="blog-single-sidebar.php">Blog client</a></li>
														</ul>
													</li>
													<li><a href="contact.php">Contacte Nous</a></li>
												</ul>
											</div>
										</div>
									</nav>
									<!--/ End Main Menu -->	
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--/ End Header Inner -->
		</header>
		<!--/ End Header -->