<?php

// On démarre la session

session_start();

// Si la session contient un utilisateur, on affiche un Header_connect, sinon on affiche le Header basique

    if (isset($_SESSION["conect"])){
        require_once "../Require/Header_connect.php";        
    }else{
        require_once "../Require/Header.html";
}
    
// On se connect à la base de donnée, et on verifie si l'utilisateur et le mot de passe sont existant puis on se connect
    if(!empty($_POST)){

        if(isset($_POST["Email"], $_POST["Password"]) && !empty($_POST["Email"]) && !empty($_POST["Password"])){

            require_once "../Require/connect.php";

            $Email = $_POST["Email"];

            $sql = "SELECT * FROM `user` WHERE `Email` = '$Email'";

            $requete = $db->query($sql);
            $User = $requete->fetch();

            if(!$User){
                die ("L'adresse mail n'est pas reconnue");
            }
            if (!password_verify($_POST["Password"], $User ["Password"])){
                die("Mot de passe incorrect");
            }

            session_start();

// On récupère l'adresse mail de l'utilisateur et on l'incrémente dans la variable $_SESSION

            $_SESSION ["conect"] = [
                "Utilisateur" => $User["Email"]
            ];

// On se redirige automatiquement vers la page d'accueil

            header("location: index.php");

        }
    }
?>

<html>

<!-- Formulaire de connection -->

<section id="Formulaire_Connection" class="Contacte_sec">
    <div id="div">
        <form method="post">
            <label for="Email">Email</label>
            <input type="Email" name="Email">

            <label for="Password">Mot de passe</label>
            <input type="Password" name="Password">

<!-- Bouton de redirection vers la page Mdp_Oublié.php -->

            <button type="submit"> Se connecter </button>

            <a href="../Php/Mdp_Oublié.php">Mot de passe oublié</a>
        </form>
    </div>

<!-- Bouton de redirection vers la page Nouvel_Utilisateur.php -->

    <div id="div">
        <a id="Nouv_Membre" href="../Php/Nouvel_Utilisateur.php"> Nouveau Membre</a>
    </div>
</section>

</html>

<?php

// On affiche le contenu du Footer

require_once "../Require/Footer.html";
?>