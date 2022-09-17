<?php 
require_once('parts/database.php');
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
    <title>Frip Chic - Inscription</title>
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
								<li class="active"><a href="register.php">Inscription</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Breadcrumbs -->
				
		<!-- Shop Login -->
		<section class="shop login section">
			<div class="container">
				<div class="row"> 
					<div class="col-lg-6 offset-lg-3 col-12">
						<div class="login-form">
							<h2>Inscription</h2>
<?php 
    //------------------------------------------------
    if(isset($_POST['submit']) && isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['password-v']) &&
    !empty($_POST['nom']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['password-v']))
    {   $nom = htmlspecialchars($_POST['nom']);
        $prenom = htmlspecialchars($_POST['prenom']);
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);
        $confirmation = htmlspecialchars($_POST['password-v']);
        $pass = password_hash($password, PASSWORD_DEFAULT);
        $selection_mail = $db->prepare('SELECT * FROM clients WHERE email = :email');
        $selection_mail->execute([
                    'email' => $email
                ]);
        $e_mail = $selection_mail->fetch();
        if($password != $confirmation)
        {
?>
            <div class="code_erreur">
                <p>Les mots de passe donnés ne sont pas équivalents. <br>
                Veuillez vérifier si le mot de passe donné correspond à celui donné dans la confirmation</p>
            </div>  
<?php
        }
        elseif (!empty($e_mail)) {
?>
            <div class="code_erreur">
                <p>L'email que que vous avait donné existe déjà pour un compte. <br>
                Merci de réessayer avec une autre adresse email</p>
            </div>
<?php 
        }
        else{
            $insertion = $db->prepare('INSERT INTO clients(nom, prenom, email, password, date) VALUES (:nom, :prenom, :email, :pass, CURDATE())');
            $insertion->execute([
                "nom" => $nom,
                "prenom" => $prenom,
                "email" => $email,
                "pass" => $pass,
            ]);
			
?>
	<p>Nous vous félicitons. Vous avez réussi votre inscription.</p>
							<h2>Félicitations</h2>
<?php
        }
    } else{
        ?>
			<p>Veuillez donner vos identifiants pour la création de votre compte</p>
        <?php
    }
?>
							<!-- Form -->
							<form class="form" method="post" action="">
								<div class="row">
									<div class="col-12">
										<div class="form-group">
											<label>Nom<span>*</span></label>
											<input type="text" name="nom" placeholder="" required="required">
										</div>
									</div>
									<div class="col-12">
										<div class="form-group">
											<label>Prénom<span>*</span></label>
											<input type="text" name="prenom" placeholder="" required="required">
										</div>
									</div>
									<div class="col-12">
										<div class="form-group">
											<label>Email<span>*</span></label>
											<input type="text" name="email" placeholder="" required="required">
										</div>
									</div>
									<div class="col-12">
										<div class="form-group">
											<label>Mot de Passe<span>*</span></label>
											<input type="password" name="password" placeholder="" required="required">
										</div>
									</div>
									<div class="col-12">
										<div class="form-group">
											<label>Confirmer le Mot de Passe<span>*</span></label>
											<input type="password" name="password-v" placeholder="" required="required">
										</div>
									</div>
									<div class="col-12">
										<div class="form-group login-btn">
											<button class="btn" type="submit" name="submit">S'inscrire</button>
											<a href="login.php" class="btn">Se connecter</a>
										</div>
										<div class="checkbox">
											<label class="checkbox-inline" for="2"><input name="news" id="2" type="checkbox">S'inscrire au Newsletter</label>
										</div>
									</div>
								</div>
							</form>
							<!--/ End Form -->
						</div>
					</div>
				</div>
			</div>
		</section>
		<!--/ End Login -->

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