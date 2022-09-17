<?php
session_start();
error_reporting(0);
include('../../parts/database.php');
if (strlen($_SESSION['admin']==0)) {
  header('location:logout.php');
  } else{
// -------------------------------------------------
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Ajout d'article</title>

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
							<li class="active">Ajout d'article</li>
						</ol>
					</div>
<?php
// -------------------------------------------------
		if(isset($_POST['submit'])){

			$nom = htmlspecialchars($_POST['nom']);
			$prix = htmlspecialchars($_POST['prix']);
			$price = htmlspecialchars($_POST['price']);
			$description = htmlspecialchars($_POST['description']);
			$categorie = htmlspecialchars($_POST['categorie']);
			$stock = htmlspecialchars($_POST['stock']);
			$caracteristique = htmlspecialchars($_POST['caracteristique']);
			$taille = htmlspecialchars($_POST['taille']);
			$couleurs = htmlspecialchars($_POST['couleurs']);
			$genre = htmlspecialchars($_POST['genre']);
			$type = htmlspecialchars($_POST['type']);

			$sql="INSERT INTO produits(nom,prix,price,description,categorie,stock,caracteristique,taille,couleurs,genre,type) VALUES (:nom,:prix,:price,:description,:categorie,:stock,:caracteristique,:taille,:couleurs,:genre,:type)";
			$query=$db->prepare($sql);
			$query->bindParam(':nom',$nom,PDO::PARAM_STR);
			$query->bindParam(':prix',$prix,PDO::PARAM_STR);
			$query->bindParam(':price',$price,PDO::PARAM_STR);
			$query->bindParam(':description',$description,PDO::PARAM_STR);
			$query->bindParam(':categorie',$categorie,PDO::PARAM_STR);
			$query->bindParam(':stock',$stock,PDO::PARAM_STR);
			$query->bindParam(':caracteristique',$caracteristique,PDO::PARAM_STR);
			$query->bindParam(':taille',$taille,PDO::PARAM_STR);
			$query->bindParam(':couleurs',$couleurs,PDO::PARAM_STR);
			$query->bindParam(':genre',$genre,PDO::PARAM_STR);
			$query->bindParam(':type',$type,PDO::PARAM_STR);
			$query->execute();
			$query->closeCursor();
	?>
<!-- ------------------------------------------------- -->	
					<div class="forms-main">						
						<h2 class="inner-tittle">Votre ajout a été bien pris en charge.</h2>
						<a href="add-article.php" class="btn btn-default"> Ajouter un autre article</a>
					</div> 
<!-- ------------------------------------------------- -->
	<?php
		}else{
	?>
<!-- ------------------------------------------------- -->
					<div class="forms-main">
						<h2 class="inner-tittle">Ajout d'Article </h2>
						<div class="graph-form">
							<div class="form-body">
								<form method="post"> 
									
									<div class="form-group"> <label for="">Nom</label> <input type="text" name="nom" placeholder="Nom du produit" value="" class="form-control" required='true'> </div>
									<div class="form-group"> <label for="">Prix</label> <input type="number" name="prix" placeholder="Prix du produit" value="" class="form-control" required='true'> </div>
									<div class="form-group"> <label for="">Prix initiale</label> <input type="number" name="price" placeholder="Prix du produit" value="" class="form-control" required='true'> </div>
									<div class="form-group"> <label for="">Description</label> <textarea type="text" name="description"  placeholder="Description du produit" value="" class="form-control" required='true' rows="8"></textarea>  </div>
									<div class="form-group"> <label for="">Categorie</label> <input type="text" name="categorie"  placeholder="Categorie du produit" value="" class="form-control" required='true'>  </div>
									<div class="form-group"> <label for="">Stock</label> <input type="number" name="stock" placeholder="Stock du produit" value="" class="form-control" required='true'> </div>
									<div class="form-group"> <label for="">Caractéristiques</label> <textarea type="text" name="caracteristique" placeholder="Caractéristiques du produit" value="" class="form-control" required='true'></textarea> </div>
									<div class="form-group"> <label for="">Taille</label> <input type="text" name="taille" placeholder="Taille du produit" value="" class="form-control" required='true'> </div>
									<div class="form-group"> <label for="">Couleurs</label> <input type="text" name="couleurs" placeholder="Couleurs du produit" value="" class="form-control" required='true'> </div>
									<div class="form-group"> <label for="">Genre</label> <input type="text" name="genre" placeholder="Genre du produit" value="" class="form-control" required='true'> </div>
									<div class="form-group"> <label for="">Type</label> <input type="text" name="type" placeholder="Type du produit" value="" class="form-control" required='true'> </div>
										
									<button type="submit" class="btn btn-default" name="submit" id="submit">Ajouter</button> 
								</form> 
							</div>
						</div>
					</div> 
<!-- ------------------------------------------------- -->
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
<?php 
}  
?>