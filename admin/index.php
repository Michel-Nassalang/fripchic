<?php 
session_start();

$user='Michel';
$monpass='flexzone';

if (isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username&&$password){
        if ($username==$user&&$password==$monpass){

            $_SESSION['username']=$username;
            header('Location: admin.php');

        }else{
            echo 'Identifiants non reconnus';
        }
    }else{
        echo 'veuillez remplir tous les champs s\'il vous plait';
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible">
        <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="fontawesome/css/all.css"> 
        <link rel="stylesheet" href="admin.css">
        <title>Connexion</title>
    </head>
    <body>
        <div class="admin">
            <h1>Connexion</h1>
        </div>
        <div class="form">
            <form action="" method="POST" >
                <h2>Connexion</h2>
                <h3>Pseudo :</h3> <input type="text" name="username" placeholder="identifiant" class="entree">
                <h3>Password :</h3> <input type="password" name="password" placeholder="mot de passe" class="entree"> <br><br>
                <input type="submit" name="submit" value="LOGIN" class='submit'>
            </form>
        </div>
        
    </body>
</html>