<?php

// On démarre la session

session_start();

// Si la session contient un utilisateur, on affiche un Header_connect, sinon on affiche le Header basique

    if (isset($_SESSION["conect"])){
        require_once "../Require/Header_connect.php";        
    }else{
        require_once "../Require/Header.html";
}

//On se connecte à la base de donnée sql

require_once "../Require/connect.php";

//Si la variable $_POST est renseignée, on effectue la requête pour créer un nouveau menu

if(!empty ($_POST)){
    if(!empty($_POST["titre"] && !empty($_POST["nb_pers"]) && !empty($_POST["prix_pers"]) && !empty($_POST["regime"]) && !empty($_POST["des"]) && !empty($_POST["qte"]) && !empty($_FILES["Images"]))){
    
    $titre = $_POST["titre"];
    $nb_per = $_POST["nb_pers"];
    $prix_pers = $_POST["prix_pers"];
    $regime = $_POST["regime"];
    $des =  $_POST["des"];
    $qte = $_POST["qte"];

    $file_basename = pathinfo($_FILES["Images"]["name"], PATHINFO_BASENAME);
    $file_extension = pathinfo($_FILES["Images"]["name"], PATHINFO_EXTENSION);
    $newimage = $file_basename . '_' . date("Ymd_His"). '.' .$file_extension;


    $sql = "INSERT INTO `menus` (`titre`,`nb_pers_mini`,`prix_pers`,`regime`,`description`,`quantite_restante`,`libelle`) VALUES ('$titre','$nb_per','$prix_pers','$regime','$des','$qte','$newimage')";

    $db -> exec($sql);

    $target_directory = "../Images/";
    $target_path = $target_directory . $newimage;
    move_uploaded_file($_FILES["Images"]["tmp_name"],$target_path);

    header("location: ../Php/Menus.php");

    }
}

?>

<body>

<!-- Formulaire de création de menu -->

    <form method="post" enctype="multipart/form-data">
        <section class="Nouv_Menu">
            <div class="div_nouv_menu">
            <label> titre : </label>
            <input type="text" name="titre">
            </div>

            <div class="div_nouv_menu">
            <label> Nombre de personne minimum :</label>
            <input type="text" name="nb_pers">
            </div>

            <div class="div_nouv_menu">
            <label> Prix par personne :</label>
            <input type="text" name="prix_pers">
            </div>

            <div class="div_nouv_menu">
            <label> Regime : </label>
            <input type="text" name="regime">
            </div>

            <div class="div_nouv_menu">
            <label> Description : </label>
            <input type="text" name="des">
            </div>

            <div class="div_nouv_menu">
            <label> Quantité restante :</label>
            <input type="text" name="qte">
            </div>

            <div class="div_nouv_menu">
            <label> Image :</label>
            <input type="file" name="Images" required>
            </div>

            <div class="div_nouv_menu">
            <button type="submit"> Valider</button>
            </div>

        </section>

    </form>

</body>

<?php

// On affiche le contenu du Footer

require_once "../Require/Footer.html";
?>