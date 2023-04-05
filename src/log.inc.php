<?php

try {
    $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
    $bdd = new PDO('mysql:host=localhost;dbname=gmail', 'root', '', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',$pdo_options));

    // On récupère tout le contenu de la table accounts
    $reponse = $bdd->query('SELECT login, password FROM accounts');

    $loggedIn = false;

    while($data = $reponse->fetch()) {
        if(isset($_POST['email']) && isset($_POST['psw'])) {
            $email = $_POST['email'];
            $password = $_POST['psw'];

            

            if(!$email || !$password) {
                echo "<strong>Vous avez oublié votre mail ou password?</strong>";
                exit;
            } else if($email == $data['login'] && password_verify($password, $data['password'])) {
                echo "<strong>Vous êtes connecté</strong>";
                $loggedIn = true;
                break;
            }
            if(!$loggedIn) {
                echo "<strong>Email ou mot de passe incorrect.</strong>";
                exit;
            }
        }
    }
    $reponse->closeCursor();

   
}
catch(Exception $e) {
    die("Erreur de connexion : ".$e->getMessage());
}

        ?>