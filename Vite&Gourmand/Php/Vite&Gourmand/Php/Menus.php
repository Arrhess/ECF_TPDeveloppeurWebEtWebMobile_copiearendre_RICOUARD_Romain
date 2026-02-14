<?php
// On démarre la session

session_start();

//On se connecte à la base de donnée sql

require_once "../Require/connect.php";

// Si la session contient un utilisateur, on affiche un Header_connect, sinon on affiche le Header basique

    if (isset($_SESSION["conect"])){
        require_once "../Require/Header_connect.php";
    }else{
        require_once "../Require/Header.html";
}

//On redirige l'utilisateur sur la page Nouveau_Menu.php

if (!empty($_POST["Nouveau_Menu"])){
    header("location: ../Php/Nouveau_Menu.php");
}

//On supprime le menu

if (!empty($_POST["Suppression_Menu"])){
    $titre_supp = $_POST["Suppression_Menu"];
    $sql = "DELETE FROM `menus` WHERE `titre`= '$titre_supp'";
    $db -> exec($sql);

    header("location: ../Php/Menus.php");
}


?>


<body> 

    <?php 

//Si l'utilisateur est un admin, on affiche le boutton Nouveau Menu

    if (isset ($Role) && $Role == "Admin"){ 
        echo ('<div class="Creation_Menu">');
        echo ('<form method="post" >');
        echo ('<label> Nom du menu : </button>');
        echo ('<input name="Nouveau_Menu">');
        echo ('<button type="submit"> nouveau menu </button>');
        echo ('</form >');
        echo ('</div>');
    }
    ?>

<!-- On effectue une requête sql pour afficher les menus -->

    <?php 
        $sql = "SELECT * FROM `menus`";
        $requete = $db->query($sql);

        $menus = $requete -> FetchAll();

//Affichage des menus

        foreach($menus as $menu):?>

    <section class="Affichage_Menus">

        <div class="Image_menu">
            <img src="../Images/<?php echo $menu ["libelle"];?>" width="250vw" alt="Image_Menu">
        </div>
                <form action="../Php/Form_Commande.php" method="get">
                <div class = "Menus">
                

                    <a class="cmd_form" href="../Php/Form_Commande.php?id=<?php echo $menu['titre']; ?>">Menu <?php echo $menu ["titre"]; ?></a>

                    <div class="div_menus">
                    <label class="titre_menus"> Nombre de personne Minimum pour la commande :</label>
                    <label> <?php echo $menu ["nb_pers_mini"]; ?> </label>
                    </div>

                    <div class="div_menus">
                    <label class="titre_menus"> Prix /pers :</label>
                    <label> <?php echo $menu ["prix_pers"]; ?> </label>
                    </div>

                    <div class="div_menus">
                    <label class="titre_menus"> Regime :</label>
                    <label> <?php echo $menu ["regime"]; ?> </label>
                    </div>

                    <div class="div_menus">
                    <label class="titre_menus"> Description :</label>
                    <label> <?php echo $menu ["description"]; ?> </label>
                    </div>

                    <div class="div_menus">
                    <label class="titre_menus"> Quantité restante :</label>
                    <label> <?php echo $menu ["quantite_restante"]; ?> </label>
                    </div>

                </div>
                </form>

        <?php 

//Si l'utilisateur est un Admin, on affiche le boutton Supprimer

    if (isset ($Role) && $Role == "Admin"){ 
        echo ('<div class="Suppression_Menu">');
        echo ('<form method="post" >');
        echo ('<label> Nom du menu :  </button>');
        echo ('<input name="Suppression_Menu">');
        echo ('<button type="submit"> Supprimer le Menu </button>');
        echo ('</form >');
        echo ('</div>');
    }
    ?>
    </section>
        <?php endforeach; ?>

</body>

<?php

// On affiche le contenu du Footer

require_once "../Require/Footer.html";
?>