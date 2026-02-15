<?php

//Si la variable $_POST existe et n'est pas vide, on défini les variables pui on créer une reqête pour créer un nouvel utilisateur

    if(!empty($_POST)){
        if(isset($_POST["Email"], $_POST["Password"]) && !empty($_POST["Email"]) && !empty($_POST["Password"]) && !empty($_POST["prenom"]) && !empty($_POST["telephone"]) && !empty($_POST["ville"]) && !empty($_POST["pays"]) && !empty($_POST["adresse"]) && !empty($_POST["cp"])){

            $Email = strip_tags($_POST["Email"]);
            $Password = password_hash($_POST["Password"], PASSWORD_ARGON2ID);
            $Prenom = $_POST["prenom"];
            $Tel = $_POST["telephone"];
            $Ville = $_POST["ville"];
            $Pays = $_POST["pays"];
            $Adr = $_POST["adresse"];
            $Cp = $_POST["cp"];
                if ($_POST["role"] == "on"){
                $Role = "Employe";
                }else{
                    $Role = "Visiteur";
                }

                require "../Require/connect.php";

                $sql = "INSERT INTO `user` (`Email`,`Password`,`prenom`,`telephone`,`ville`,`pays`,`adresse`,`cp`,`Role`) VALUES ('$Email','$Password','$Prenom','$Tel','$Ville','$Pays','$Adr','$Cp','$Role')";
                $db -> exec($sql);

// On démarre la session

                session_start();

//On incrémente les données à la variable $_SESSION

            if ($_SESSION["conect"]["Utilisateur"] == "admin@viteetgourmand.fr"){
                header("location: index.php");
            }else{

                $_SESSION ["conect"] = [
                    "Utilisateur" => $Email,
                    "Prenom" => $Prenom,
                    "Tel" => $Tel,
                    "Ville" => $Ville,
                    "Pays" => $Pays,
                    "Adresse" => $Adr,
                    "Cp" => $Cp,
                    "Role" => $Role

                ];
            }
        


// On se redirige automatiquement vers la page d'accueil

                header("location: index.php");

//On verifie si l'administrateur souhaite créer un nouvel utilisateur

        }else{
            if (!empty($_POST["mail"]) && !empty ($_POST["mdp"])){
                session_start();
                require_once "../Require/Header_connect.php";
                $Mail_empl = $_POST["mail"];
                $Mdp = $_POST["mdp"];
            }else{
            echo("Le formulaire est incomplet");
        }
    }
    }else{
        require_once "../Require/Header.html";
    }

        
?>


<html>

<!-- Formulaire de création de compte -->

<body>

<H3>Formulaire d'inscription :</H3>
    
<section class="Formulaire_Connection">
    <form method="post">

    <div class="Section_Formulaire1">

        <div id="formulaire_inscription">
        <label for="Email">Email</label>
        <input type="Email" name="Email" value="<?php if (!empty($_POST["mail"])){ echo $Mail_empl; }?>"> 
        </div>

        <div id="formulaire_inscription">
        <label for="Password">Mot de passe</label>
        <input type="Password" name="Password" value="<?php if (!empty($_POST["mdp"])){ echo $Mdp; }?>"> 
        </div>

        <div id="formulaire_inscription">
        <label for="prenom">Prénom</label>
        <input type="text" name="prenom">
        </div>

        <div id="formulaire_inscription">
        <label for="telephone">Téléphone</label>
        <input type="text" name="telephone">
        </div>

<?php 
if (isset($_SESSION) && $_SESSION["conect"]["Utilisateur"] == "admin@viteetgourmand.fr"){
    echo("<div id='formulaire_inscription'>");
    echo("<label> Employé : </label>");
    echo("<input type='checkbox' name='role'>");
    echo("</div>");
}
?>

    </div>

    <div class="Section_Formulaire2">

        <div id="formulaire_inscription">
        <label for="ville">Ville</label>
        <input type="text" name="ville">
        </div>

        <div id="formulaire_inscription">
        <label for="pays">Pays</label>
        <input type="text" name="pays">
        </div>

        <div id="formulaire_inscription">
        <label for="adresse">Adresse</label>
        <input type="text" name="adresse">
        </div>

        <div id="formulaire_inscription">
        <label for="cp">Code Postal</label>
        <input type="text" name="cp">
        </div>

        <button type="submit">enregistrer</button>

    </div>

    </form>

</section>

</body>

</html>

<?php

// On affiche le contenu du Footer

require_once "../Require/Footer.html";
?>