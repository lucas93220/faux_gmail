<?php
/*
namespace App;
use \PDO;
*/
class Database{
    
    private $db_name;
    private $db_user;
    private $db_pass;
    private $db_host;
    private $pdo;

    //connection à la bdd
    public function __construct($db_name, $db_user='root', $db_pass='', $db_host ='localhost')
    {
        $this->db_name = $db_name;
        $this->db_user = $db_user;
        $this->db_pass = $db_pass;
        $this->db_host = $db_host;
        
    }
    
    private function getPDO(){
    $pdo = new PDO('mysql:dbname=sql;host=localhost','root','');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
            $this->pdo = $pdo;
            return $pdo;
    
    }
    public function query($_state){ //envoyer en paramètre la requête sql
    $req = $this->getPDO()->query($_state);
    $datas = $req->fetchAll(PDO::FETCH_OBJ);
    return $datas;
    
    }
}

    ?>