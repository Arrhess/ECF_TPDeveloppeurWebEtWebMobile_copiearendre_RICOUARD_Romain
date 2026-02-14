<?php

// On affiche le Header

    require_once "../Require/Header.html";

// On se connecte à la base de donnée SQL

    require_once "../Require/connect.php";

//On verifie si l'utilisateur existe

    if(!empty($_POST)){
        if (isset($_POST["Email"]) && !empty($_POST["Email"])){
            
            $Email = $_POST["Email"];

            $sql = "SELECT * FROM `user` WHERE `Email` = '$Email'";

            $requete = $db->query($sql);
            $User = $requete->fetch();

//On envoi un mail de réinitialisation de mot de passe

            if(!$User){
                die ("L'adresse mail n'est pas reconnue");
            }
                mail ($Email, "Reinitialisation du mot de passe", "Reinitialisation du mot de passe","From: romain_r_77@hotmail.fr");
        }else{
            die("Veuillez saisir l'adresse mail");
        }
    }



?>


<html>

<body>

<!-- Contenu de la page Mdp_Oublié en method POST -->

<H3>Mot de passe oublié :</H3>

<form method="post" class="Contacte_sec">
    <div clas="Mdp_oublie">
    <label>Adresse Email :</label>
    <input type="text" name="Email">
    <button type="submit"> réinitialiser mon mot de passe </button>
    </div>
</form>

</body>

</html>

<?php

// On affiche le contenu du Footer

require_once "../Require/Footer.html";
?>