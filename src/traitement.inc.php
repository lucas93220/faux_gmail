<?php 

try{
    if(isset($_POST['submit'])){
        error_reporting(E_ALL & ~E_WARNING);
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $email = $_POST['mail'];
        $password = $_POST['psw'];

        // On se connecte à MySQL
        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        $bdd = new PDO('mysql:host=localhost;dbname=gmail', 'root', '', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',$pdo_options));
        
        // Verifie si l'utilisateur est déja inscrit
        $sql = "SELECT * FROM accounts WHERE login = '$email' ";
        $result = $bdd->prepare($sql);
        $result->execute();

        if($result->rowCount() > 0){
            if(password_verify($password, $data['password']))
            {
                echo "<p class=\"success\">Vous êtes déja inscrit, 
                <a href=\"connexion.php\" title=\"pub\">Connectez vous</a>
                </p>";
                $_SESSION['email'] = $email;   
            }else
            {
                
                echo "<p class=\"error\">Cette adresse mail est déja utilisé !!!</p>";
                }
                
            
        }
        else
        {
            $password = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO accounts (nom, prenom, login, password) VALUES ('$nom', '$prenom', '$email', '$password')";
            $req = $bdd->prepare($sql);
            $req->execute();
            echo "<p class=\"success\">Inscription effectuée :
                 <a href=\"connexion.php\" title=\"pub\">Connectez vous</a>
                 </p>";
        }
        $result->closeCursor();
    }}
    catch(Exception $e){
        die("Erreur de connexion : ".$e->getMessage());
    }


?>