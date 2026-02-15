<?php 

// Si la session contient un utilisateur, on affiche un Header_connect, sinon on affiche le Header basique

require_once "../Require/connect.php";
    if (isset($_SESSION["conect"])){
        require_once "../Require/Header_connect.php";
    }else{
        require_once "../Require/Header.html";
}

//On effectue une reqête sql pour afficher la commande à modifier

$Num_cmd = $_POST["cmd"];

$sql = "SELECT * FROM `commande` WHERE `numero_commande` = '$Num_cmd'";
$cmd = $db->query($sql);

?>

<!-- On affiche la commande à modifier -->

<?php foreach ($cmd as $cmds):?>

<section class="mes_commandes">

<div class="int_colonne">
    <label class="titre_colonne"> Commande :</label>
    <label class="result_colonne"> <?php echo ($cmds["numero_commande"]); ?> </label>
</div>
<div class="int_colonne">
    <label class="titre_colonne"> Date cmd :</label>
    <label class="result_colonne"> <?php echo ($cmds["date_commande"]); ?> </label>
</div>
<div class="int_colonne">
    <label class="titre_colonne"> Date presta :</label>
    <label class="result_colonne"> <?php echo ($cmds["date_prestation"]); ?> </label>
</div>
<div class="int_colonne">
    <label class="titre_colonne"> Heure livraison :</label>
    <label class="result_colonne"> <?php echo ($cmds["heure_livraison"]); ?> </label>
</div>
<div class="int_colonne">
    <label class="titre_colonne"> Prix :</label>
    <label class="result_colonne"> <?php echo ($cmds["prix_total"]); ?> €</label>
</div>
<div class="int_colonne">
    <label class="titre_colonne"> Nb menu :</label>
    <label class="result_colonne"> <?php echo ($cmds["nombre_personne"]); ?> </label>
</div>
<div class="int_colonne">
    <label class="titre_colonne"> Prix Liv :</label>
    <label class="result_colonne"> <?php echo ($cmds["prix_livraison"]); ?> €</label>
</div>
<div class="int_colonne">
    <label class="titre_colonne"> Statut :</label>
    <label class="result_colonne"> <?php echo ($cmds["statut"]); ?> </label>
</div>
<div class="int_colonne">
    <label class="titre_colonne"> Pret materiel :</label>
    <label class="result_colonne"> <?php echo ($cmds["pret_materiel"]); ?> </label>
</div>
<div class="int_colonne">
    <label class="titre_colonne"> Date rest materiel :</label>
    <label class="result_colonne"> <?php echo ($cmds["restitution_materiel"]); ?> </label>
</div>
<div class="int_colonne">
    <label class="titre_colonne"> Nb Mousse Chocolat :</label>
    <label class="result_colonne"> <?php echo ($cmds["mousse_chocolat"]); ?> </label>
</div>
<div class="int_colonne">
    <label class="titre_colonne"> Nb Flans :</label>
    <label class="result_colonne"> <?php echo ($cmds["flan"]); ?> </label>
</div>
<div class="int_colonne">
    <label class="titre_colonne"> Nb Tartes :</label>
    <label class="result_colonne"> <?php echo ($cmds["tarte_pomme"]); ?> </label>
</div>

</section class="Modif">

<?php endforeach; ?>

<!-- Formulaire de modification de la commande -->

<form method ="post" action="../Php/Mon_Compte.php">
    <div class="check_liste">
    <Input type="checkbox" name="Etat" Value="Accepté">Accepté</Input>
    </div>

    <div class="check_liste">
    <Input type="checkbox" name="Etat" Value="En preparation">En preparation</Input>
    </div>

    <div class="check_liste">
    <Input type="checkbox" name="Etat" Value="En cours de livraison">En cours de livraison</Input>
    </div>

    <div class="check_liste">
    <Input type="checkbox" name="Etat" Value="Livré">Livré</Input>
    </div>

    <div class="check_liste">
    <Input type="checkbox" name="Etat" Value="En attente du retour du materiel">En attente du retour du materiel</Input>
    </div>

    <div class="check_liste">
    <Input type="checkbox" name="Etat" Value="Terminé">Terminé</Input>
    </div>

    <div class="check_liste">
    <Input type="checkbox" name="Etat" Value="Annulé">Annulé</Input>
    </div>

    <label name="cmd"> Commande :</label>
    <input type="text" name="cmd" value="<?php echo ($Num_cmd);?>">


    <a href="Php/Mon_Compte.php"><button> Valider</button></a>

</form>

<?php

// On affiche le contenu du Footer

require_once "../Require/Footer.html";
?>

