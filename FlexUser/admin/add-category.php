<?php
session_start();
error_reporting(0);
include_once('../../parts/database.php');
if (strlen($_SESSION['admin']==0)) {
  header('location:logout.php');
  } else{
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Ajout de categorie</title>

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
							<li class="active">Ajout de categorie</li>
						</ol>
					</div> 
	<?php
		if(isset($_POST['submit'])){
		$nom=htmlspecialchars($_POST['nom']);

		$verif = $db->prepare("SELECT count(id) FROM categories WHERE nom=:nom");
		$verif->bindParam(':nom',$nom,PDO::PARAM_STR);
		$verif->execute();
		$count = $verif->fetchColumn();
		if ($count==0) {
			$sql="INSERT INTO categories(nom) VALUES(:nom)";
			$query=$db->prepare($sql);
			$query->bindParam(':nom',$nom,PDO::PARAM_STR);
			$query->execute();
	?>	
					<div class="forms-main">						
						<h2 class="inner-tittle">Votre ajout a été pris en charge.</h2>
						<a href="add-category.php" class="btn btn-default"> Ajouter une autre catégorie</a>
					</div> 
	<?php
		}else {
	?>	
					<div class="forms-main">						
						<h2 class="inner-tittle">Votre ajout existe déja.</h2>
						<a href="add-category.php" class="btn btn-default"> Ajouter une autre catégorie</a>
					</div> 
	<?php			
		}
		}else{
	?>
					<div class="forms-main">
						<h2 class="inner-tittle">Ajout de categorie </h2>
						<div class="graph-form">
							<div class="form-body">
								<form method="post"> 
									
									<div class="form-group"> <label for="">Nom</label> <input type="text" name="nom" placeholder="Nom de catégorie" value="" class="form-control" required='true'> </div>
										
									<button type="submit" class="btn btn-default" name="submit" id="submit">Ajouter</button> 
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
<?php
}
?>