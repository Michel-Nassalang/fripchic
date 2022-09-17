<?php
error_reporting(0);
include('../../parts/database.php');
if (strlen($_SESSION['admin']==0)) {
  header('location:logout.php');
  } else{
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Mot de passe Administrateur</title>

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
	<script src="js/css3clock.js"></script>
	<!--Easy Pie Chart-->
	<!--skycons-icons-->
	<script src="js/skycons.js"></script>
	<!--//skycons-icons-->
	<script type="text/javascript">
	function valid()
		{
		if(document.changepassword.newpassword.value!= document.changepassword.confirmpassword.value)
		{
			var insert =document.querySelector("#insert");
			insert.innerHTML = "Vos deux mots de passe entrés ne correspondent pas.";
			document.changepassword.confirmpassword.focus();
			return false;
		}
		return true;
		}
	</script>
</head> 
<body>
	<div class="page-container">
		<!--/content-inner-->
		<div class="left-content">
			<div class="inner-content">
	
				<?php include_once('includes/header.php');?>
				<!--//outer-wp-->
				<div class="outter-wp">
					<!--/sub-heard-part-->
					<div class="sub-heard-part">
						<ol class="breadcrumb m-b-0">
							<li><a href="dashboard.php">Acceuil</a></li>
							<li class="active">Changement de mot de passe</li>
						</ol>
					</div>
<?php	
if(isset($_POST['submit']))
{
$adminid=$_SESSION['admin'];
$cpassword=htmlspecialchars($_POST['currentpassword']);
$newpassword=password_hash($_POST['newpassword'], PASSWORD_DEFAULT);
$sql ="SELECT * FROM administrateur WHERE id=:adminid";
$query= $db -> prepare($sql);
$query-> bindParam(':adminid', $adminid, PDO::PARAM_STR);
$query-> execute();
$result = $query->fetch();

if(password_verify($cpassword,$result['password']))
{
$con="UPDATE administrateur SET password=:newpassword WHERE id=:adminid";
$chngpwd = $db->prepare($con);
$chngpwd-> bindParam(':adminid', $adminid, PDO::PARAM_STR);
$chngpwd-> bindParam(':newpassword', $newpassword, PDO::PARAM_STR);
$chngpwd->execute();
?>	
					<div class="forms-main">						
						<h2 class="inner-tittle">Vous avez réussi à changer votre mot de passe.</h2>
						<a href="admin-profile.php" class="btn btn-default"> Voir profil</a>
					</div> 
	<?php
} else {
?>	
					<div class="forms-main">						
						<h2 class="inner-tittle">Echec, veuillez vérifier votre ancien mot de passe.</h2>
						<a href="change-password.php" class="btn btn-default"> Essayez à nouveau</a>
					</div> 
<?php
}
}else {
?>
					<!--/forms-->
					<div class="forms-main">
						<h2 class="inner-tittle" id="insert">Changement de mot de passe </h2>
						<div class="graph-form">
							<div class="form-body">
								<form name="changepassword" method="post" action="" onSubmit="return valid();"> 
																	
									<div class="form-group"> <label for="">Mot de passe actuel</label> <input type="password" name="currentpassword" class="form-control" required="true"> </div>
									<div class="form-group"> <label for="">Nouveau mot de passe</label> <input type="password" name="newpassword"  class="form-control" required="true"> </div>
									<div class="form-group"> <label for="">Confirmation </label><input type="password" name="confirmpassword" value=""  class="form-control" required="true"> </div>
									
									<button type="submit" class="btn btn-default" onclick="myFunction()" name="submit" id="submit">Change</button> 
								</form> 
							</div>
						</div>
					</div> 
<?php
}
?>
				</div>
				<?php include_once('includes/footer.php');?>
			</div>
		</div>		
		<?php include_once('includes/sidebar.php');?>
		<div class="clearfix"></div>		
	</div>
	<script>
		var toggle = true;

		$(".sidebar-icon").click(function() {                
			if (toggle)
			{
				$(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
				$("#menu span").css({"position":"absolute"});
			}
			else
			{
				$(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
				setTimeout(function() {
					$("#menu span").css({"position":"relative"});
				}, 400);
			}

			toggle = !toggle;
		});
	</script>
	<!--js -->
	<script src="js/jquery.nicescroll.js"></script>
	<script src="js/scripts.js"></script>

	<!-- Bootstrap Core JavaScript -->
	<script src="js/bootstrap.min.js"></script>
</body>
</html>
<?php }  ?>