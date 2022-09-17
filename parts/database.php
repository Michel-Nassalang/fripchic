<?php
        try {
            $db = new PDO('mysql:host=localhost;dbname=frip-chic', 'root', '', array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
            session_start();
        } catch (PDOException $e) {
            die('Erreur : ' . $e->getMessage());
        }    
?>