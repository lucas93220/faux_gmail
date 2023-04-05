<?php
 try{
    error_reporting(E_ALL & ~E_WARNING);
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $password = $_POST['psw'];
    $_bdd=new PDO('mysql:host=localhost;dbname=gmail;charset=utf8', 'root', '');
         }
            catch(Exception $e)
                  {
                      die('Erreur : '.$e->getMessage());
                  }
                  
                  if(isset($_POST['email']) || isset($_POST['psw'])){
                     
                    $_email = $_POST["email"];
    
                    //on test les chaines de caractère//
                    if(!$_POST['email'] || !$_POST['psw']){
                        echo "<p class=\"warning\">Vous avez obliez votre mail ou password?</p>";
                        }
                        else if(!filter_var($_email, FILTER_VALIDATE_EMAIL)){ //attention à ma fonction
                            echo "<p class=\"warning\">Mail invalide</p>";
                        }
                        else if(is_numeric($_email)){
                                echo "<p class=\"warning\">Vous devez saisir des caractères</p>";
                        }
                        else{
    
                        //password_hash($_POST['psw'],PASSWORD_DEFAULT);
                        $password = password_hash($password, PASSWORD_DEFAULT);
                        $req = $_bdd->prepare("INSERT INTO accounts (nom, prenom, login, password)VALUES('$nom','$prenom','$email','$password')");
                        $req->execute();

                        
                        echo "<p class=\"success\">Merci votre contenu est ajouté : 
                                <a href=\"connexion.php\" title=\"pub\">Connectez vous</a>
                                
                        </p>";
                        
                    }                
                    
                }
?>