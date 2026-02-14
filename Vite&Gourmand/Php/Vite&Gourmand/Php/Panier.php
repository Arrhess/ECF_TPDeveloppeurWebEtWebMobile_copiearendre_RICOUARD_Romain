<?php
// On démarre la session

session_start();

// Si la session contient un utilisateur, on affiche un Header_connect, sinon on affiche le Header basique

    if (isset($_SESSION["conect"])){
        require_once "../Require/Header_connect.php";        
    }else{
        require_once "../Require/Header.html";
}

//On se connecte à la base de donnée

require "../Require/connect.php";

//On definit les variable pour le pret de materiel

$Prix_unitaire = $_SESSION["conect"]["Prix_Menu"];

if($_SESSION["conect"]["Pret_mat"] == "on"){
    $Pret_Mat = "1";
}else{
    $Pret_Mat = "0";
}

//On définit le prix de la livraison en fonction de la ville de l'utilisateur

if($_SESSION["conect"]["ville"] == "Bordeaux" || $_SESSION["conect"]["ville"] == "bordeaux" ){
    $Prix_Liv = 0;
}else{
    $Prix_Liv = 5;
}

//On définit les variables pour la commande

$Email = $_SESSION["conect"]["Utilisateur"];
$Num_cmd = $_SESSION["conect"]["cmd"];
$Menu = $_SESSION["conect"]["titre"];
$Qte = $_SESSION["conect"]["qte"];
$Prix = ($_SESSION["conect"]["qte"]) * $Prix_unitaire + $Prix_Liv;
$Mousse = $_SESSION["conect"]["mousse"];
$Flan = $_SESSION["conect"]["flan"];
$Tarte = $_SESSION["conect"]["tarte"];
$Date_Liv = $_SESSION["conect"]["date"];
$Heure_Liv = $_SESSION["conect"]["heure"];
$Lieu_Liv = $_SESSION["conect"]["lieu"];
$Cp = $_SESSION["conect"]["cp"];
$Ville = $_SESSION["conect"]["ville"];
$Date_Cmd = date('Y-m-d');
$Statut = "En attente";
$Rest_Mat = $_SESSION["conect"]["date"];
$Prenom = $_SESSION["conect"]["prenom"];;
$Pays = $_SESSION["conect"]["pays"];;
$Tel = $_SESSION["conect"]["tel"];;

//On créer et on execute la reqête pour établir une nouvelle commande

if (isset ($_POST)){
    if(isset($_POST)){
    $sql = "INSERT INTO `commande` (`numero_commande`,`date_commande`,`date_prestation`,`heure_livraison`,`prix_total`,`nombre_personne`,`prix_livraison`,`statut`,`pret_materiel`,`restitution_materiel`,`Email`,`prenom`,`adresse`,`ville`,`pays`,`telephone`,`mousse_chocolat`,`flan`,`tarte_pomme`) VALUES ('$Num_cmd','$Date_Cmd','$Date_Liv','$Heure_Liv','$Prix','$Qte','$Prix_Liv','$Statut','$Pret_Mat','$Rest_Mat','$Email','$Prenom','$Lieu_Liv','$Ville','$Pays','$Tel','$Mousse','$Flan','$Tarte')";
    $db -> exec($sql);

}

}

?>


<!-- Formulaire de validation de panier -->

<body>
<section>
    <form action="../Php/Mon_Compte.php" method="post">
        <h3>Récap commande :</h3>
        <div>
            <label>Numero de la commande : <?php echo ($_SESSION["conect"]["cmd"]) ?></label><br><br>

            <label>Menu commandé : <?php echo ($_SESSION["conect"]["titre"]) ?></label><br><br>

            <label>Qté commandée : <?php echo ($_SESSION["conect"]["qte"]) ?> menus</label><br>

            <label>Total : <?php  echo ($Prix) ?> €</label><br>

            <h3>Quantité desserts :</h3>

            <label>Mousse au chocolat: <?php echo ($_SESSION["conect"]["mousse"]) ?></label><br>
            <label>Flan : <?php echo ($_SESSION["conect"]["flan"]) ?></label><br>
            <label>Tarte aux pommes : <?php echo ($_SESSION["conect"]["tarte"]) ?></label><br><br>

            <h3>Détails livraison :</h3>

            <label>Date de livraison demandée : <?php echo ($_SESSION["conect"]["date"]) ?></label><br>
            <label>Heure de livraison demandée : <?php echo ($_SESSION["conect"]["heure"]) ?></label><br>
            <label>Lieu de livraison demandée : <?php echo ($_SESSION["conect"]["lieu"]) ?></label><br>
            <label>Code postal : <?php echo ($_SESSION["conect"]["cp"]) ?></label><br>
            <label>Ville : <?php echo ($_SESSION["conect"]["ville"]) ?></label><br>

            <a href="../Php/Mon_Compte.php"><button> Valider la commande </button></a>

        </div>
    </form>
</section>


</body>

<?php

// On affiche le contenu du Footer

require_once "../Require/Footer.html";
?>