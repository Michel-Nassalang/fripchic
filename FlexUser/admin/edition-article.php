<?php
error_reporting(0);
include_once('../../parts/database.php');
if (strlen($_SESSION['admin']==0)) {
  header('location:logout.php');
  } else{
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Edition de produit</title>

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
							<li class="active">Edition de produit</li>
						</ol>
					</div>	
<!-- -------------------------------------------- -->
<?php
	if(isset($_POST['submit'])){
			$id=htmlspecialchars($_GET['edition']);
			$nom=htmlspecialchars($_POST['nom']);
			$prix=htmlspecialchars($_POST['prix']);
			$price = htmlspecialchars($_POST['price']);
			$description = htmlspecialchars($_POST['description']);
			$categorie = htmlspecialchars($_POST['categorie']);
			$stock = htmlspecialchars($_POST['stock']);
			$caracteristique = htmlspecialchars($_POST['caracteristique']);
			$taille = htmlspecialchars($_POST['taille']);
			$couleurs = htmlspecialchars($_POST['couleurs']);
			$genre = htmlspecialchars($_POST['genre']);
			$type = htmlspecialchars($_POST['type']);

			$sql="UPDATE produits set nom=:nom,prix=:prix,price=:price,description=:description,categorie=:categorie,stock=:stock,caracteristique=:cararteristique,taille=:taille,couleurs=:couleurs,genre=:genre,type=:type WHERE id=:id";
			$update=$db->prepare($sql);
			$update->bindParam(':id',$id,PDO::PARAM_STR);
			$update->bindParam(':nom',$nom,PDO::PARAM_STR);
			$update->bindParam(':prix',$prix,PDO::PARAM_INT);
			$update->bindParam(':price',$price,PDO::PARAM_INT);
			$update->bindParam(':description',$description,PDO::PARAM_STR);
			$update->bindParam(':categorie',$categorie,PDO::PARAM_STR);
			$update->bindParam(':stock',$stock,PDO::PARAM_INT);
			$update->bindParam(':cararteristique',$caracteristique,PDO::PARAM_STR);
			$update->bindParam(':taille',$taille,PDO::PARAM_STR);
			$update->bindParam(':couleurs',$couleurs,PDO::PARAM_STR);
			$update->bindParam(':genre',$genre,PDO::PARAM_STR);
			$update->bindParam(':type',$type,PDO::PARAM_STR);
			// $update->execute([
			// 	"id"=>$id,
			// 	"nom"=>$nom,
			// 	"prix"=>$prix,
			// 	"price"=>$price,
			// 	"description"=>$description,
			// 	"categorie"=>$categorie,
			// 	"stock"=>$stock,
			// 	"caracteristique"=>$caracteristique,
			// 	"taille"=>$taille,
			// 	"couleurs"=>$couleurs,
			// 	"genre"=>$genre,
			// 	"type"=>$type
			// ]);
			$update->execute();
?>	
					<div class="forms-main">						
						<h2 class="inner-tittle">Votre mis à jour a été pris en charge.</h2>
						<a href="manage-article.php" class="btn btn-default"> Voir les produits</a>
					</div> 
<?php
	}else{
?>
<!-- -------------------------------------------- -->
					<div class="forms-main">
						<h2 class="inner-tittle">Edition de produit</h2>
						<div class="graph-form">
							<div class="form-body">
								<form method="post"> 
									<?php $id=$_GET['edition'];
										$sql="SELECT * FROM produits WHERE id=:id";
										$query = $db -> prepare($sql);
										$query->bindParam(':id',$id,PDO::PARAM_STR);
										$query->execute();
										$results=$query->fetchAll(PDO::FETCH_OBJ);
										if($query->rowCount() > 0)
										{
										foreach($results as $row)
										{               
									?>
											<div class="form-group"> <label for="">Nom de la catégorie</label> <input type="text" name="nom" value="<?= $row->nom;?>" class="form-control" required='true'> </div>
											<div class="form-group"> <label for="">Prix</label> <input type="number" name="prix" value="<?= $row->prix;?>" class="form-control" required='true'> </div>
											<div class="form-group"> <label for="">Prix initiale</label> <input type="number" name="price" value="<?= $row->price;?>" class="form-control" required='true'> </div>
											<div class="form-group"> <label for="">Description</label> <textarea type="text" name="description" value="" class="form-control" required='true' rows="8"><?= $row->description;?></textarea>  </div>
											<div class="form-group"> <label for="">Categorie</label> <input type="text" name="categorie" value="<?= $row->categorie;?>" class="form-control" required='true'>  </div>
											<div class="form-group"> <label for="">Stock</label> <input type="number" name="stock" value="<?= $row->stock;?>" class="form-control" required='true'> </div>
											<div class="form-group"> <label for="">Caractéristiques</label> <textarea type="text" name="caracteristique" value="" class="form-control" required='true'><?= $row->caracteristique;?></textarea> </div>
											<div class="form-group"> <label for="">Taille</label> <input type="text" name="taille" value="<?= $row->taille;?>" class="form-control" required='true'> </div>
											<div class="form-group"> <label for="">Couleurs</label> <input type="text" name="couleurs" value="<?= $row->couleurs;?>" class="form-control" required='true'> </div>
											<div class="form-group"> <label for="">Genre</label> <input type="text" name="genre" value="<?= $row->genre;?>" class="form-control" required='true'> </div>
											<div class="form-group"> <label for="">Type</label> <input type="text" name="type" value="<?= $row->type;?>" class="form-control" required='true'> </div>

											<button type="submit" class="btn btn-default" name="submit" id="submit">Mettre à jour</button> 
											<a href="manage-article.php" class="btn btn-default" id="submit">Annuler</a>
										
									<?php }
										}  ?>
								</form> 
							</div>
						</div>
					</div>
<!-- -------------------------------------------- -->
<?php }
?>
<!-- -------------------------------------------- -->
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
<!-- -------------------------------------------- -->
<?php
}  ?>