<?php
// On démarre la session

    session_start();

// Si la session contient un utilisateur, on affiche un Header_connect, sinon on affiche le Header basique

    if (isset($_SESSION["conect"])){
        require_once "../Require/Header_connect.php";        
    }else{
        header("location: ../Php/Connection.php");
}

//On se connect à la base de donnée Sql

require_once "../Require/connect.php";

// On met en place une requête sql pour récuperer les données de l'utilisateur connecté

$Email = $_SESSION["conect"]["Utilisateur"];
$sql = "SELECT * FROM `user` WHERE `Email` = '$Email'";
$requete1 = $db ->prepare($sql);

// On met en place une requête sql pour récuperer les données du menu choisi

$id = $_GET["id"];
$Menu = "SELECT * FROM `menus` WHERE `titre` = '$id'";
$requete2 = $db -> prepare($Menu);

//On execute les deux reqêtes

$requete1 -> execute();
$requete2 -> execute();

//On permet l'affichage des données des reqêtes executées

foreach ($requete1 as $Email_):
endforeach;

foreach ($requete2 as $Menu_):
endforeach;

//On incrémente les données de $_SESSION avec les valeurs du formulaire

if (!empty($_POST["qte"]) && !empty($_POST["date"]) && !empty($_POST["heure"]) && !empty($_POST["lieu"]) && !empty($_POST["CP"]) && !empty($_POST["Ville"])){
    $Num_Cmd = $_POST["date"].$_POST["heure"];
    $_SESSION ["conect"] = [
        "Utilisateur" => $_SESSION["conect"]["Utilisateur"],
        "Prix_Menu" => $Menu_ ["prix_pers"],
        "titre" => $Menu_["titre"],
        "cmd" => $Num_Cmd,
        "qte" => $_POST["qte"],
        "date" => $_POST["date"],
        "heure" => $_POST["heure"],
        "lieu" => $_POST["lieu"],
        "cp" => $_POST["CP"],
        "ville" => $_POST["Ville"],
        "mousse" => $_POST["Mousse"],
        "flan" => $_POST["Flan"],
        "tarte" => $_POST["Tarte_Pomme"],
        "Pret_mat" => $_POST["Pret"],
        "prenom" => $_POST["Prenom"],
        "pays" => $_POST["Pays"],
        "tel" => $_POST["tel"]
        ];

//On se redirige automatiquement vers la page panier.php

    header("location: ../Php/Panier.php");

}

?>

<body>

<!-- Contenu du formulaire en method POST pour les transmettre à la variable $_SESSION -->

<form method="post">
<section class="Menu_Cmd">
    <H3> Menu <?php echo ($Menu_["titre"]);?> :</H3>

                    <div class="Image_menu">
                    <img src="../Images/<?php echo $Menu_ ["libelle"];?>" width="250vw" alt="Image_Menu">
                    </div>

                    <div class="div_menus_cmd">
                    <label class="titre_menus"> Nombre de personne Minimum pour la commande :</label>
                    <label> <?php echo $Menu_ ["nb_pers_mini"]; ?> </label>
                    </div>

                    <div class="div_menus_cmd">
                    <label class="titre_menus"> Prix /pers :</label>
                    <label> <?php echo $Menu_ ["prix_pers"]; ?> </label>
                    </div>

                    <div class="div_menus_cmd">
                    <label class="titre_menus"> Regime :</label>
                    <label> <?php echo $Menu_ ["regime"]; ?> </label>
                    </div>

                    <div class="div_menus_cmd">
                    <label class="titre_menus"> Description :</label>
                    <label> <?php echo $Menu_ ["description"]; ?> </label>
                    </div>

                    <div class="div_menus_cmd">
                    <label class="titre_menus"> Quantité restante :</label>
                    <label> <?php echo $Menu_ ["quantite_restante"]; ?> </label>
                    </div>

                    <div class="div_menus_cmd">
                    <label class="titre_menus"> Les Desserts :</label> <br>
                    <label> Ce menu vous permet d'avoir 3 desserts aux choix : </label>
                    <ul>
                        <li> Mousse au chocolat </li>
                        <li> Flan </li>
                        <li> Tarte aux Pommes </li>
                    </ul>
                    </div>
    


</section>

                    
                    <div class="Det_cmd">
                    <label> Prénom :</label>
                    <input type="text" name="Prenom" value= "<?php echo $Email_["prenom"];?>">
                    </div>

                    <div class="Det_cmd">
                    <label> Telephone :</label>
                    <input type="text" name="tel" value= "<?php echo $Email_["telephone"];?>">
                    </div>

                    <div class="Det_cmd">
                    <label> Quantité à commander :</label>
                    <input type="number" name="qte">
                    </div>

                    <div class="Det_cmd">
                    <label> Date souhaitée de la livraison :</label>
                    <input type="date" name="date">
                    </div>

                    <div class="Det_cmd">
                    <label> Heure souhaitée de la livraison :</label>
                    <input type="time" name="heure">
                    </div>

                    <div class="Det_cmd">
                    <label> Adresse de livraison :</label>
                    <input type="text" name="lieu" value= "<?php echo $Email_["adresse"];?>"> 
                    </div>

                    <div class="Det_cmd">
                    <label> Code postal :</label>
                    <input type="text" name="CP" value= "<?php echo $Email_["Cp"];?>">
                    </div>

                    <div class="Det_cmd">
                    <label> Ville :</label>
                    <input type="text" name="Ville" value= "<?php echo $Email_["ville"];?>">
                    </div>

                    <div class="Det_cmd">
                    <label> Pays :</label>
                    <input type="text" name="Pays" value= "<?php echo $Email_["pays"];?>">
                    </div>

                    <div class="Det_cmd">
                    <label> Dessert :</label> </br>
                    <input type="number" name="Mousse" > Mousse 5€ / pers </br>
                    <input type="number" name="Flan" > Flan 3€ / pers </br>
                    <input type="number" name="Tarte_Pomme" > Tarte aux Pommes 3€ / pers </br>
                    </div>

                    <div class="Det_cmd">
                    <label> Souhaiter vous emprunter du materiel ?</label>
                    <input type="checkbox" name="Pret">
                    </div>

                    <button type="submit">Valider la commande</button>


</form>

</body>

<?php

// On affiche le contenu du Footer

require_once "../Require/Footer.html";
?>