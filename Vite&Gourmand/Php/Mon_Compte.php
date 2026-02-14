<?php
// On démarre la session

session_start();

// Si la session contient un utilisateur, on affiche un Header_connect, sinon on affiche le Header basique

require_once "../Require/connect.php";
    if (isset($_SESSION["conect"])){
        require_once "../Require/Header_connect.php";
    }else{
        require_once "../Require/Header.html";
}

//On se connecte à la base de donnée

require_once "../Require/connect.php";

//On effectue une reqête pour modifier la commande  

if (!empty ($_POST)){
    $statut = $_POST["Etat"];
    $cmd = $_POST["cmd"];
    $sql = "UPDATE `commande` SET `statut`='$statut' WHERE `numero_commande` = '$cmd'";

    $db -> exec($sql);
}

//On effectue une reqête pour récuperer les commandes attribuées à l'utilisateur  

$Email = $_SESSION["conect"]["Utilisateur"];

if($Email == "romain_r_77@hotmail.fr"){
    $sql = "SELECT * FROM `commande`";
}else{
    $sql = "SELECT * FROM `commande` WHERE `Email` = '$Email'";
}

$Commande = $db -> query($sql);

?>



<?php 

//Si l'utilisateur est un admin, on affiche le formulaire permettant la création d'un nouvel utilisateur

if($Email == "romain_r_77@hotmail.fr"){ 
    echo ("<form action='../Php/Nouvel_Utilisateur.php' method='post'>");
    echo("<H3> Creation d'un nouvel utilisateur </H3>");
    echo ("<label> adresse mail </label>");
    echo ("<input name='mail'>");
    echo ("<label> Mot de passe </label>");
    echo ("<input name='mdp'>");
    echo ("<button type='submit'>Créer l'utilisateur </button>");
    echo ("</form>");
    echo ("<H3>Commandes :</H3>");
}else{
    echo ("<H3>Mes Commandes :</H3>");
}
?>


<?php 

//Si l'Email correspond à celui de l'admin, on affiche le boutton pour modifier une commande

if($Email == "romain_r_77@hotmail.fr"){ 
    echo ("<form action='../Php/Modif_Cmd.php' method='post'>");
    echo ("<div>");
    echo("<label> Cmd : </label>");
    echo("<input type='text' name='cmd'");
    echo("<a href='../Php/Modif_Cmd.php'> <button type='submit'> Modifier</button> </a>");
    echo ("</div>");
    echo ("</form>");
}
?>


<!-- On affiche les commandes soit de l'utilisateur connecté soit toutes les commandes -->

<?php foreach ($Commande as $Commandes): ?>

    <section class="mes_commandes">

<div class="int_colonne">
    <label class="titre_colonne"> Commande :</label>
    <label class="result_colonne"> <?php echo ($Commandes["numero_commande"]); ?> </label>
</div>
<div class="int_colonne">
    <label class="titre_colonne"> Date cmd :</label>
    <label class="result_colonne"> <?php echo ($Commandes["date_commande"]); ?> </label>
</div>
<div class="int_colonne">
    <label class="titre_colonne"> Date presta :</label>
    <label class="result_colonne"> <?php echo ($Commandes["date_prestation"]); ?> </label>
</div>
<div class="int_colonne">
    <label class="titre_colonne"> Heure livraison :</label>
    <label class="result_colonne"> <?php echo ($Commandes["heure_livraison"]); ?> </label>
</div>
<div class="int_colonne">
    <label class="titre_colonne"> Prix :</label>
    <label class="result_colonne"> <?php echo ($Commandes["prix_total"]); ?> €</label>
</div>
<div class="int_colonne">
    <label class="titre_colonne"> Nb menu :</label>
    <label class="result_colonne"> <?php echo ($Commandes["nombre_personne"]); ?> </label>
</div>
<div class="int_colonne">
    <label class="titre_colonne"> Prix Liv :</label>
    <label class="result_colonne"> <?php echo ($Commandes["prix_livraison"]); ?> €</label>
</div>
<div class="int_colonne">
    <label class="titre_colonne"> Statut :</label>
    <label class="result_colonne"> <?php echo ($Commandes["statut"]); ?> </label>
</div>
<div class="int_colonne">
    <label class="titre_colonne"> Pret materiel :</label>
    <label class="result_colonne"> <?php echo ($Commandes["pret_materiel"]); ?> </label>
</div>
<div class="int_colonne">
    <label class="titre_colonne"> Date rest materiel :</label>
    <label class="result_colonne"> <?php echo ($Commandes["restitution_materiel"]); ?> </label>
</div>
<div class="int_colonne">
    <label class="titre_colonne"> Nb Mousse Chocolat :</label>
    <label class="result_colonne"> <?php echo ($Commandes["mousse_chocolat"]); ?> </label>
</div>
<div class="int_colonne">
    <label class="titre_colonne"> Nb Flans :</label>
    <label class="result_colonne"> <?php echo ($Commandes["flan"]); ?> </label>
</div>
<div class="int_colonne">
    <label class="titre_colonne"> Nb Tartes :</label>
    <label class="result_colonne"> <?php echo ($Commandes["tarte_pomme"]); ?> </label>
</div>

</section>

<?php endforeach; ?>




