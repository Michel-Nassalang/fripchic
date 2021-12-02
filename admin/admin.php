<?php 
session_start();

try {
    $db = new PDO('mysql:host=localhost;dbname=site-e-commerce','root','');
    $db ->setAttribute(PDO::ATTR_CASE, PDO::CASE_LOWER); // les noms des caracteres seront en minuscules
    $db ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // les erreurs lanceront des exceptions
}
catch(exception $e){
    echo 'Une erreur est survenue';
    die();

}

if (isset($_SESSION['username'])){
    if (isset($_GET['action'])){ 
    if($_GET['action']=='add'){
        if (isset($_POST['submit'])){
        $titre=htmlspecialchars($_POST['titre']);
        $description=htmlspecialchars($_POST['description']);
        $prix=htmlspecialchars($_POST['prix']);
        $numero1=htmlspecialchars($_POST['num1']);
        $numero2=htmlspecialchars($_POST['num2']);
        $numero3=htmlspecialchars($_POST['num3']);
        $numero4=htmlspecialchars($_POST['num4']);
        $categorie=htmlspecialchars($_POST['categorie']);
        $stock=htmlspecialchars($_POST['stock']);
        $image = htmlspecialchars($_FILES['image']['name']);
        $image_tmp = htmlspecialchars($_FILES['image']['tmp_name']);
        $image_error = htmlspecialchars($_FILES['image']['error']);
        $image_size =htmlspecialchars($_FILES['image']['size']);

        
        if(isset($titre)  && isset($description) && isset($prix)){
            if (isset($image) && $image_error == 0) {
                if ($image_size <= 3000000) {
                    $info_fichier = pathinfo($image);
                    $extension_fichier = $info_fichier['extension'];
                    $auto_extension = array('jpg', 'png', 'jpeg');
                    if (in_array($extension_fichier, $auto_extension)) {
                        $img = $image;
                        if ($extension_fichier === 'png') {
                            move_uploaded_file($image_tmp, '../images_produits/'.basename($titre . ".png"));
                        }else {
                            move_uploaded_file($image_tmp, '../images_produits/'.basename($titre . ".jpg"));
                        }
                    }
                    else {
                        echo '<p>Veuillez insérer une image de format png, jpg ou jpeg.</p>';
                    }
                }
                else {
                    echo '<p>Veuillez insérer une image de plus petite taille.</p>';
                }
            }
            $insert = $db ->prepare("INSERT INTO produits(titre, description, prix, n1, n2, n3, n4, categorie, stock) VALUES(:titre, :description, :prix, :n1, :n2, :n3, :n4, :categorie, :stock)");
            $insert ->execute([
                "titre" => $titre,
                "description" => $description,
                "prix" => $prix,
                "n1" => $numero1,
                "n2" => $numero2,
                "n3" => $numero3,
                "n4" => $numero4,
                "categorie" => $categorie,
                "stock" => $stock
            ]);
        }else{
            echo 'Veuillez remplir tous les champs.';
        }
        }
        ?>
    <form class='form2' action="" method="post" enctype="multipart/form-data">
        <h3>Titre du produit : </h3><input type="text" name="titre"/>
        <h3>Description du produit : </h3><input type="text" name="description"/>
        <h3>Prix du produit : </h3><input type="text" name="prix"/>
        <h3>Stock :</h3><input name="stock" />
        <h3>Categorie :</h3><select name="categorie">
            <?php $select= $db-> query("SELECT * FROM categories");
            while($s =$select->fetch(PDO::FETCH_OBJ)){
                ?>
                <option> <?php echo $s-> nom_categorie; ?> </option>
            <?php
            } ?>
        </select>
        <h3>numéros : </h3><input type="int" class='num' name='num1' required="required"><input type="int" class='num' name='num2' required="required"><input type="int" class='num' name='num3' required="required"><input type="int" class='num' name='num4' required="required"><br><br>
        <input type="file" name="image"/><br><br>
        <input type="submit" name="submit" value="Ajouter"/><br><br>
    </form>
    <?php 
    }else if($_GET['action']=='modifyanddelete'){
        $select = $db ->prepare("SELECT * FROM produits");
        $select ->execute();
        while($s=$select->fetch(PDO::FETCH_OBJ)){
            echo $s ->titre;
            ?>
            <a href="?action=modify&amp;id=<?php echo $s->id; ?>">Modifier</a>
            <a href="?action=delete&amp;id=<?php echo $s->id; ?>">Supprimer</a>
            <br><br>
            <?php 
        }
    }else if($_GET['action']=='modify'){
        $id=$_GET['id'];
        $select = $db ->prepare("SELECT * FROM produits WHERE id=$id");
        $select ->execute();

        $data = $select->fetch(PDO::FETCH_OBJ);

        ?>
    <form class='form2' action="" method="post" enctype="multipart/form-data">
        <h3>Titre du produit : </h3><input type="text" name="titre" value="<?php echo $data->titre; ?>"/>
        <h3>Description du produit : </h3><input type="text" name="description" value="<?php echo $data->description; ?>"/>
        <h3>Prix du produit : </h3><input type="text" name="prix" value="<?php echo $data->prix; ?>"/>
        <h3>numéros : </h3>
            <input type="int" class='num' name='num1' required="required" value="<?php echo $data->n1; ?>">
            <input type="int" class='num' name='num2' required="required" value="<?php echo $data->n2; ?>">
            <input type="int" class='num' name='num3' required="required" value="<?php echo $data->n3; ?>">
            <input type="int" class='num' name='num4' required="required" value="<?php echo $data->n4; ?>">
        <h3>Stock :</h3>
            <input name="stock" value="<?php echo $data->stock; ?>" />
            <h3>Categorie :</h3><select name="categorie" required="required">
            <?php $select= $db-> query("SELECT * FROM categories");
            while($data =$select->fetch(PDO::FETCH_OBJ)){
                ?>
                <option> <?php echo $data-> nom_categorie; ?> </option>
            <?php
            } ?>
        </select><br><br>
        <input type="file" name="image"/><br><br>
        <input type="submit" name="submit" value="Modifier"/><br><br>
    </form>
    <?php 

        if(isset($_POST['submit'])){

            $titre=htmlspecialchars($_POST['titre']);
            $description=htmlspecialchars($_POST['description']);
            $prix=htmlspecialchars($_POST['prix']);
            $numero1=htmlspecialchars($_POST['num1']);
            $numero2=htmlspecialchars($_POST['num2']);
            $numero3=htmlspecialchars($_POST['num3']);
            $numero4=htmlspecialchars($_POST['num4']);
            $categorie=htmlspecialchars($_POST['categorie']);
            $stock=htmlspecialchars($_POST['stock']);

            $update = $db->prepare("UPDATE produits SET titre=:titre,description=:description,prix=:prix, n1=:n1, n2=:n2, n3=:n3, n4=:n4, categorie=:categorie, stock=:stock WHERE id=$id");
            $update ->execute([
                "titre" => $titre,
                "description" => $description,
                "prix" => $prix,
                "n1" => $numero1,
                "n2" => $numero2,
                "n3" => $numero3,
                "n4" => $numero4,
                "categorie" => $categorie,
                "stock" => $stock
            ]);

            header('Location: admin.php?action=modifyanddelete');

        }


    }else if($_GET['action']=='delete'){

        $id=$_GET['id'];
        $delete = $db ->prepare("DELETE  FROM produits WHERE id=$id");
        $delete ->execute();

    }else if($_GET['action']=='add_category'){
        if(isset($_POST['submit'])){
            $nom_categorie = htmlspecialchars($_POST['categorie']);
            if($nom_categorie){
                $insert = $db ->prepare("INSERT INTO categories(nom_categorie) VALUES (:nom_categorie)");
                $insert ->execute([
                    "nom_categorie" => $nom_categorie
                ]);
            }else{
                echo 'Veuillez donner le nom de la catégorie que vous voulez ajouter';
            }
        }
        ?>
        <form action="" method="post">
            <h3>Titre de la catégorie :</h3>
            <input type="nom_category" name='categorie'><br><br>
            <input type="submit" name="submit" value="Ajouter">
        </form>
        <?php
    }else if($_GET['action']=='modifyanddelete_c'){
        $select = $db ->prepare("SELECT * FROM categories");
        $select ->execute();
        while($s=$select->fetch(PDO::FETCH_OBJ)){
            echo $s ->nom_categorie;
            ?>
            <a href="?action=modify_c&amp;id=<?php echo $s->id; ?>">Modifier</a>
            <a href="?action=delete_c&amp;id=<?php echo $s->id; ?>">Supprimer</a>
            <br><br>
            <?php 
        }}
        else if($_GET['action']=='modify_c'){
            $id=$_GET['id'];
            $select = $db ->prepare("SELECT * FROM categories WHERE id=$id");
            $select ->execute();
    
            $data = $select->fetch(PDO::FETCH_OBJ);
    
            ?>
        <form action="" method="post">
            <h3>Titre de la catégorie :</h3>
            <input type="nom_category" name='categorie' required="required" value="<?php echo $data->nom_categorie; ?>"><br><br>
            <input type="submit" name="submit" value="Ajouter">
        </form>
        
        <?php
        if(isset($_POST['submit'])){
            $categorie=htmlspecialchars($_POST['categorie']);

            $update = $db->prepare("UPDATE categories SET nom_categorie=:categorie WHERE id=$id");
            $update ->execute([
                "categorie" => $categorie
            ]);

            header('Location: admin.php?action=modifyanddelete_c');

        }


    }else if($_GET['action']=='delete_c'){

        $id=$_GET['id'];
        $delete = $db ->prepare("DELETE  FROM categories WHERE id=$id");
        $delete ->execute();

    }else{
        die('Une erreur s\'est produite.');
    }
    }else{

    }

}else{
    header('Location: ../codex.php');
}
?>

<link rel="stylesheet" href="admin.css">

<div class='acceuil'>
<h1 class='bvenue'>Bienvenue, <?php echo $_SESSION['username']; ?></h1>
</div>
<div class='ajout_produit'>
<a href="?action=add">Ajouter un produit</a>
</div>
<div class='ajout_categorie'>
<a href="?action=add_category">Ajouter une categorie</a>
</div>
<div class="modifier_produit">
<a href="?action=modifyanddelete">Modifier ou supprimer</a>
</div>
<div class="modifier_categorie">
<a href="?action=modifyanddelete_c">Mes categories</a>
</div>

