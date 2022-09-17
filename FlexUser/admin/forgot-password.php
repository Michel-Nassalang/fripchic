<?php
error_reporting(0);
include('../../parts/database.php');
// ------------------------------------------------

?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Mot de passe oublié</title>

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
	<script type="text/javascript">
	function valid()
		{
		if(document.chngpwd.newpassword.value!= document.chngpwd.confirmpassword.value)
		{
			var insert =document.querySelector("#insert");
			insert.innerHTML = "Vos deux mots de passe entrés ne correspondent pas.";
			document.chngpwd.confirmpassword.focus();
			return false;
		}
		return true;
		}
	</script>
</head> 
<body>
	<div class="error_page">

		<div class="error-top">
			<h2 class="inner-tittle page">Frip Chic</h2>
			<div class="login">
<!-- --------------------------------------------- -->
<?php
if(isset($_POST['submit']))
{
    $email=htmlspecialchars($_POST['email']);
	$mobile=htmlspecialchars($_POST['mobile']);
	$newpassword=password_hash($_POST['newpassword'],PASSWORD_DEFAULT);
	$sql ="SELECT email FROM administrateur WHERE email=:email and tel=:mobile";
	$query= $db -> prepare($sql);
	$query-> bindParam(':email', $email, PDO::PARAM_STR);
	$query-> bindParam(':mobile', $mobile, PDO::PARAM_STR);
	$query-> execute();
	$results = $query -> fetchAll(PDO::FETCH_OBJ);
	if($query -> rowCount() > 0)
	{
	$con="UPDATE administrateur set password=:newpassword WHERE email=:email and tel=:mobile";
	$chngpwd = $db->prepare($con);
	$chngpwd-> bindParam(':email', $email, PDO::PARAM_STR);
	$chngpwd-> bindParam(':mobile', $mobile, PDO::PARAM_STR);
	$chngpwd-> bindParam(':newpassword', $newpassword, PDO::PARAM_STR);
	$chngpwd->execute();
?>	
					<div class="buttons login">					
						<h3 class="inner-tittle t-inner">Vous avez réussi à changer votre mot de passe.</h3>
						<a href="index.php" class="btn btn-default"> Voir mon compte</a>
					</div> 
<?php
	}
	else {
?>	
					<div class="buttons login">					
						<h3 class="inner-tittle t-inner">Echec, veuillez vérifier vos email et numéro de téléphone.</h3>
						<a href="forgot-password.php" class="btn btn-default"> Essayez à nouveau</a>
					</div> 
<?php
	}
}else {
?>
				<div class="buttons login">
					<h3 class="inner-tittle t-inner" style="color: lightblue" id="insert">Mot de passe oublié</h3>
				</div>
				<form id="login" method="post" name="chngpwd" onSubmit="return valid();"> 

					<input type="text" class="text" placeholder="Adresse E-mail "  name="email" required="true">
					<input type="text" class="text" placeholder="Numéro de Télephone"  required="true" name="mobile" maxlength="10" pattern="[0-9]+">
					<input type="password" placeholder="Nouveau mot de passe"  name="newpassword" required="true">
					<input type="password" placeholder="Confirmation"  name="confirmpassword" required="true">
					<div class="submit"><input type="submit" onclick="myFunction()" value="Réinitialiser" name="submit" ></div>
					<div class="clearfix"></div>

					<div class="new">
						<p><a href="index.php">Voir mon compte</a></p>
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