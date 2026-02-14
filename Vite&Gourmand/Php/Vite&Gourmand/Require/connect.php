<?php
//Definition des constantes

define("DBHOST","localhost:3307");
define("DBUSER","root");
define("DBPASS","");
define("DBNAME","vite&gourmand");

// DSN de connection

$dsn = "mysql:dbname=".DBNAME.";host=".DBHOST;

//On se connect à la base de donnée Sql

try{
    $db = new PDO($dsn, DBUSER, DBPASS);
    // On s'assure d'utiliser utf-8
    $db->exec("SET NAMES utf8");
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
    die($e->getMessage());
}

?>
