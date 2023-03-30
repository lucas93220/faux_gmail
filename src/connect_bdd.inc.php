<?php

// connectioon bdd

try{
    $_bdd=new PDO('mysql:host=localhost;dbname=gmail;charset=utf8', 'root', '');
         }
            catch(Exception $e)
                  {
                      die('Erreur : '.$e->getMessage());
                  }

?>