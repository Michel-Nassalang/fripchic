<?php
    require_once('database.php');
    
    class ACHAT{
        function acheter($produit,$couleur,$taille,$quantite){
            $selection = $db->prepare("SELECT * FROM produits WHERE id=:id_prod");
            $selection->bindParam(':id_prod',$produit, PDO::PARAM_INT);
            $selection->execute();
            $product = $selection->fetch(PDO::FETCH_OBJ);
            $id_prod = $product->id;
            $nom_prod = $product->nom;
            $prix_prod = $product->prix;
            $id_client = $_SESSION['id'];
            
            $verif = $db->prepare("SELECT * FROM panier WHERE id_pro=:id_pro");
            $verif->bind_param(':id_prod',$id_prod,PDO::PARAM_INT);
            $verif->execute();
            $present = $verif->fetchColumn();
            if($present == 0){
                $insertion = $db->prepare("INSERT INTO panier(id_prod,id_client,nom,prix,couleur,taille,quantite) VALUES (:id_prod,:id_client,:nom,:prix,:couleur,:taille,:quantite)");
                $insertion->bindParam(':id_prod', $id_prod,PDO::PARAM_INT);
                $insertion->bindParam(':id_client', $id_client,PDO::PARAM_INT);
                $insertion->bindParam(':nom', $nom,PDO::PARAM_STR);
                $insertion->bindParam(':prix', $prix,PDO::PARAM_STR);
                $insertion->bindParam(':couleur', $couleur,PDO::PARAM_STR);
                $insertion->bindParam(':taille', $taille,PDO::PARAM_STR);
                $insertion->bindParam(':quantite', $quantite,PDO::PARAM_INT);
                $insertion->execute();
            }else {
                $ajour = $db->prepare("UPDATE panier SET quantite=quantite+:quantity WHERE id_prod=:id_prod");
                $ajour->bindParam(':id_prod', $id_prod,PDO::PARAM_INT);
                $ajour->bindParam(':quantity', $quantite,PDO::PARAM_INT);
                $ajour->execute();
            }
        }
        function cacheter($produit,$couleur,$quantite){
            $selection = $db->prepare("SELECT * FROM produits WHERE id=:id_prod");
            $selection->bindParam(':id_prod',$produit, PDO::PARAM_INT);
            $selection->execute();
            $product = $selection->fetch(PDO::FETCH_OBJ);
            $id_prod = $product->id;
            $nom_prod = $product->nom;
            $prix_prod = $product->prix;
            $id_client = $_SESSION['id'];
            
            $verif = $db->prepare("SELECT * FROM panier WHERE id_pro=:id_pro");
            $verif->bind_param(':id_prod',$id_prod,PDO::PARAM_INT);
            $verif->execute();
            $present = $verif->fetchColumn();
            if($present == 0){
                $insertion = $db->prepare("INSERT INTO panier(id_prod,id_client,nom,prix,couleur,quantite) VALUES (:id_prod,:id_client,:nom,:prix,:couleur,:quantite)");
                $insertion->bindParam(':id_prod', $id_prod,PDO::PARAM_INT);
                $insertion->bindParam(':id_client', $id_client,PDO::PARAM_INT);
                $insertion->bindParam(':nom', $nom,PDO::PARAM_STR);
                $insertion->bindParam(':prix', $prix,PDO::PARAM_STR);
                $insertion->bindParam(':couleur', $couleur,PDO::PARAM_STR);
                $insertion->bindParam(':quantite', $quantite,PDO::PARAM_INT);
                $insertion->execute();
            }else {
                $ajour = $db->prepare("UPDATE panier SET quantite=quantite+:quantity WHERE id_prod=:id_prod");
                $ajour->bindParam(':id_prod', $id_prod,PDO::PARAM_INT);
                $ajour->bindParam(':quantity', $quantite,PDO::PARAM_INT);
                $ajour->execute();
            }
        }

        function tacheter($produit,$taille,$quantite){
            $selection = $db->prepare("SELECT * FROM produits WHERE id=:id_prod");
            $selection->bindParam(':id_prod',$produit, PDO::PARAM_INT);
            $selection->execute();
            $product = $selection->fetch(PDO::FETCH_OBJ);
            $id_prod = $product->id;
            $nom_prod = $product->nom;
            $prix_prod = $product->prix;
            $id_client = $_SESSION['id'];
            
            $verif = $db ->prepare("SELECT * FROM panier WHERE id_pro=:id_pro");
            $verif->bind_param(':id_prod',$id_prod,PDO::PARAM_INT);
            $verif->execute();
            $present = $verif->fetchColumn();
            if($present == 0){
                $insertion = $db->prepare("INSERT INTO panier(id_prod,id_client,nom,prix,taille,quantite) VALUES (:id_prod,:id_client,:nom,:prix,:taille,:quantite)");
                $insertion->bindParam(':id_prod', $id_prod,PDO::PARAM_INT);
                $insertion->bindParam(':id_client', $id_client,PDO::PARAM_INT);
                $insertion->bindParam(':nom', $nom,PDO::PARAM_STR);
                $insertion->bindParam(':prix', $prix,PDO::PARAM_STR);
                $insertion->bindParam(':taille', $taille,PDO::PARAM_STR);
                $insertion->bindParam(':quantite', $quantite,PDO::PARAM_INT);
                $insertion->execute();
            }else {
                $ajour = $db->prepare("UPDATE panier SET quantite=quantite+:quantity WHERE id_prod=:id_prod");
                $ajour->bindParam(':id_prod', $id_prod,PDO::PARAM_INT);
                $ajour->bindParam(':quantity', $quantite,PDO::PARAM_INT);
                $ajour->execute();
            }
        }
        function tcacheter($produit,$quantite){
            $selection = $db->prepare("SELECT * FROM produits WHERE id=:id_prod");
            $selection->bindParam(':id_prod',$produit, PDO::PARAM_INT);
            $selection->execute();
            $product = $selection->fetch(PDO::FETCH_OBJ);
            $id_prod = $product->id;
            $nom_prod = $product->nom;
            $prix_prod = $product->prix;
            $id_client = $_SESSION['id'];
            
            $verif = $db ->prepare("SELECT * FROM panier WHERE id_pro=:id_pro");
            $verif->bind_param(':id_prod',$id_prod,PDO::PARAM_INT);
            $verif->execute();
            $present = $verif->fetchColumn();
            if($present == 0){
                $insertion = $db->prepare("INSERT INTO panier(id_prod,id_client,nom,prix,quantite) VALUES (:id_prod,:id_client,:nom,:prix,:quantite)");
                $insertion->bindParam(':id_prod', $id_prod,PDO::PARAM_INT);
                $insertion->bindParam(':id_client', $id_client,PDO::PARAM_INT);
                $insertion->bindParam(':nom', $nom,PDO::PARAM_STR);
                $insertion->bindParam(':prix', $prix,PDO::PARAM_STR);
                $insertion->bindParam(':quantite', $quantite,PDO::PARAM_INT);
                $insertion->execute();
            }else {
                $ajour = $db->prepare("UPDATE panier SET quantite=quantite+:quantity WHERE id_prod=:id_prod");
                $ajour->bindParam(':id_prod', $id_prod,PDO::PARAM_INT);
                $ajour->bindParam(':quantity', $quantite,PDO::PARAM_INT);
                $ajour->execute();
            }
        }
    }
?>