<?php
session_start();
error_reporting(0);
include('../../parts/database.php');

?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Connexion Administration</title>

	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<!-- Bootstrap Core CSS -->
	<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
	<!-- Custom CSS -->
	<link href="css/style.css" rel='stylesheet' type='text/css' />
	<!-- Graph CSS -->
	<link href="css/font-awesome.css" rel="stylesheet"> 
	<!-- jQuery -->
	<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'>
	<!-- lined-icons -->
	<link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
	<!-- //lined-icons -->
	<script src="js/jquery-1.10.2.min.js"></script>
	<!--clock init-->
</head> 
<body>
	<div class="error_page">

		<div class="error-top">
			<h2 class="inner-tittle page">Frip Chic</h2>
			<div class="login">
<?php
if(isset($_POST['login'])) 
{
    $user=htmlspecialchars($_POST['nom_user']);
    $password=htmlspecialchars($_POST['password']);
    $sql ="SELECT * FROM administrateur WHERE nom_user=:nom_user";
    $query=$db->prepare($sql);
    $query-> bindParam(':nom_user', $user, PDO::PARAM_STR);
    $query-> execute();
    $results=$query->fetch();
    if(password_verify($password, $results['password']))
	{
		$_SESSION['admin']=$results['id'];
		$_SESSION['login']=$user;
		header('Location:dashboard.php');
	} else{
?>	
				<div class="buttons login">
					<h3 class="inner-tittle t-inner" style="color: lightblue">Echec, veuillez vérifier votre mot de passe.</h3>
						<a href="index.php" class="btn btn-default"> Essayez à nouveau</a>
				</div>
				<div class="new">
					<p><a href="forgot-password.php">Mot de passe oublié ?</a></p>
					<p><a href="../index.php">Retour Acceuil</a></p>
					<div class="clearfix"></div>
				</div>
<?php
}
}else {

?>	
				<div class="buttons login">
					<h3 class="inner-tittle t-inner" style="color: lightblue">Connexion</h3>
				</div>
				<form id="login" method="post" name="login"> 
					<input type="text" class="text" placeholder="Nom utilisateur" name="nom_user" required="true">
					<input type="password" placeholder="Password" name="password" required="true">
					<div class="submit"><input type="submit"  value="Se connecter" name="login" ></div>
					<div class="clearfix"></div>

					<div class="new">
						<p><a href="forgot-password.php">Mot de passe oublié ?</a></p>
						<p><a href="../index.php">Retour Acceuil</a></p>

						<div class="clearfix"></div>
					</div>
				</form>
<?php
}
?>
			</div>
		</div>
		<!--//login-top-->
	</div>

	<!--//login-->
	<!--footer section start-->
	<div class="footer">
		
		<?php include_once('includes/footer.php');?>
	</div>
	<!--footer section end-->
	<!--/404-->
	<!--js -->
	<script src="js/jquery.nicescroll.js"></script>
	<script src="js/scripts.js"></script>
	<!-- Bootstrap Core JavaScript -->
	<script src="js/bootstrap.min.js"></script>
</body>
</html>