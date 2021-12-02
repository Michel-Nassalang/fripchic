<?php 
    try {
        $db = new PDO('mysql:host=localhost;dbname=site-e-commerce', 'root', '', array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
    } catch (PDOException $e) {
        die('Erreur : ' . $e->getMessage());
    } 
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="compte.css">
    <title>Discussion</title>
</head>
<body>
    <div class="fixel">
        <form action="" method="post">
            <input type="text" name="nom" placeholder="Prénom Nom">
            <input type="text" name ="pseudo" placeholder="Pseudo">
            <input type="email" name="email" placeholder="Email">
            <input type="password" name="password" placeholder="Mot de Passe">
            <input type="password" name="confirmation" placeholder="Confirmation">
            <input type="text" name="age" placeholder="Age">
            <select name="genre" id="genre">
                <option value="Homme" selected>Homme</option>
                <option value="Femme">Femme</option>
            </select>
            <input type="submit" class="submit" value="Je m'inscris"><br>
            <a href="../index.php" style ="color:white; text-decoration:none">Me connecter</a>
        </form>
    </div>
</body>
</html>
<?php 
    //------------------------------------------------
    if(isset($_POST['nom']) && isset($_POST['pseudo']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['confirmation']) && isset($_POST['age']) && isset($_POST['genre']) &&
    !empty($_POST['nom']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['confirmation']) && !empty($_POST['age']))
    {   $nom = htmlspecialchars($_POST['nom']);
        $pseudo = htmlspecialchars($_POST['pseudo']);
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);
        $confirmation = htmlspecialchars($_POST['confirmation']);
        $age = htmlspecialchars($_POST['age']);
        $genre = htmlspecialchars($_POST['genre']);
        $pass = password_hash($password, PASSWORD_DEFAULT);
        $selection_mail = $db->prepare('SELECT * FROM administration WHERE email = :email');
        $selection_mail->execute([
                    'email' => $email
                ]);
        $e_mail = $selection_mail->fetch();
        $selection_pseudo = $db->prepare('SELECT * FROM administration WHERE pseudo = :pseudo');
        $selection_pseudo->execute([
                    'pseudo' => $pseudo
                ]);
        $p_seudo = $selection_pseudo->fetch();
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
<?php }
        elseif (!empty($p_seudo)) {
?>
            <div class="code_erreur">
                <p>Veuillez réessayer avec un autre pseudo car ce dernier est déjà utilisé.</p>
            </div>
<?php
        }elseif ((int)$age < 18) {
            ?>
                        <div class="code_erreur">
                            <p>Vous n'êtes pas majeur alors vous ne pouvez vous inscrire sur ce plateforme. <br>
                            Veuillez nous excusez !</p>
                        </div>
            <?php
                    }
        else{
            $insertion = $db->prepare('INSERT INTO administration(nom, pseudo, email, pass,  age, genre, date) VALUES (:nom, :pseudo, :email, :pass, :age, :genre, CURDATE())');
            $insertion->execute([
                "nom" => $nom,
                "pseudo" => $pseudo,
                "email" => $email,
                "pass" => $pass,
                "age" => $age,
                "genre" => $genre
            ]);
        }
    } elseif(!empty($_POST['nom']) && !empty($_POST['pseudo']) && !empty($_POST['email']) && !empty($_POST['password']) && 
    !empty($_POST['confirmation']) && !empty($_POST['age']) && !empty($_POST['genre'])) {
        ?>
         <div class="code_erreur">
                <p>Veuillez remplir tous les champs s'il vous plait.</p>
            </div>
        <?php
    }
?>