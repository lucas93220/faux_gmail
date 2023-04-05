<?php
try {
    $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
    $bdd = new PDO('mysql:host=localhost;dbname=gmail', 'root', '', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',$pdo_options));

    if(isset($_POST['email']) && isset($_POST['psw'])) {
        $email = $_POST['email'];
        $password = $_POST['psw'];

        // Vérifier si l'email existe déjà dans la base de données
        $query = $bdd->prepare('SELECT * FROM accounts WHERE login = :email');
        $query->bindParam(':email', $email);
        $query->execute();

        if($query->rowCount() > 0) {
            echo "<strong>Cette adresse e-mail est déjà utilisée</strong>";
            exit;
        }

        // Si l'email n'existe pas encore, insérer une nouvelle entrée dans la base de données
        $password = password_hash($password, PASSWORD_DEFAULT);
        $query = $bdd->prepare('INSERT INTO accounts (login, password) VALUES (:email, :password)');
        $query->bindParam(':email', $email);
        $query->bindParam(':password', $password);
        $query->execute();

        echo "<strong>Inscription réussie</strong>";
        exit;
    }

    // Si les champs email et psw ne sont pas renseignés
    echo "<strong>Veuillez remplir les champs email et mot de passe</strong>";
} catch(Exception $e) {
    die("Erreur de connexion : ".$e->getMessage());
}
?>