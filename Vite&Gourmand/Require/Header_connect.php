<!-- Contenu du Header si un utilisateur est connecté -->

<!DOCTYPE html>

<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vite & Gourmand</title>
    <script src="../JS/Script.js" defer></script>
    <link rel="stylesheet" href="../Css/Style.css"/>
</head>



<header>
    <h1>Vite & Gourmand</h1>
    <H6>Vous ètes connecté en tant que <?php echo $_SESSION["conect"]["Utilisateur"]; ?> </H6>
    
<!-- On défini le role de l'utilisateur qui est connecté pour détérminer si c'est un admin ou non -->

    <h6>Role : 
        <?php if($_SESSION["conect"]["Utilisateur"] == "romain_r_77@hotmail.fr"){
        $Role = "Admin";
        echo ($Role);
        }else{
        $Role = "Visiteur";
        echo ($Role);
        }; ?> 
    </h6> 

<!-- Barre de menu -->

    <section id="Deroul_Menu">
        <div><a id="Boutt_Menu" href="../Php/index.php">Accueil</a></div>
        <?php if ($Role == "Admin"){
            echo ("<div><a id='Boutt_Menu' href='../Php/Mon_Compte.php'>Espace Administrateur</a></div>");
        }else{
            echo ("<div><a id='Boutt_Menu' href='../Php/Mon_Compte.php'>Mon Compte</a></div>");
        } ?> 
        <div><a id="Boutt_Menu" href="../Php/Deconnection.php">Deconnection</a></div>
        <div><a id="Boutt_Menu" href="../Php/Menus.php">Tous les menus</a></div>
        <div><a id="Boutt_Menu" href="../Php/Contacts.php">Contact</a></div>
    </section>
</header>


</html>