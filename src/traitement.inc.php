<?php

try {
    $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
    $bdd = new PDO('mysql:host=localhost;dbname=gmail', 'root', '', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',$pdo_options));

    if(isset($_POST['email']) && isset($_POST['psw'])) {
        $email = $_POST['email'];
        $password = $_POST['psw'];

        $query = $bdd->prepare('SELECT * FROM accounts WHERE login = :email');
        $query->bindParam(':email', $email);
        $query->execute();

        if($query->rowCount() > 0) {
            echo "<strong>Cette adresse e-mail est déjà utilisée</strong>";
            exit;
        }
        

        $password = password_hash($password, PASSWORD_DEFAULT);
        $query = $bdd->prepare('INSERT INTO accounts (login, password) VALUES (:email, :password)');
        $query->bindParam(':email', $email);
        $query->bindParam(':password', $password);
        $query->execute();

        echo "<strong>Inscription réussie</strong>";
        exit;
    }

   
} catch(Exception $e) {
    die("Erreur de connexion : ".$e->getMessage());
}
?>