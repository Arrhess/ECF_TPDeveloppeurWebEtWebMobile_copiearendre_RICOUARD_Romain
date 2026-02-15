<?php
// On démarre la session

session_start();

// Si la session contient un utilisateur, on affiche un Header_connect, sinon on affiche le Header basique

    if (isset($_SESSION["conect"])){
        require_once "../Require/Header_connect.php";
    }else{
        require_once "../Require/Header.html";
}
?>

<html>

<!-- Contenu de la page d'accueil -->

<body>
    
<section>
    <div id="description_img"><img id="Photo_profil" height="100vw" src="../Images/Julie.jpeg" alt="Julie">
    <div id="description_profil">
        <p>
        Julie est une créatrice culinaire passionnée qui trouve son inspiration autant dans les saveurs que dans les mots. Sa cuisine, à la fois créative et accessible, vise à transformer chaque repas en un moment de partage et de découverte.
        Grande lectrice, elle puise dans ses lectures une richesse d'idées pour imaginer des plats qui racontent une histoire. À travers ce site, Julie souhaite partager son amour pour la gastronomie
        </p>
        <div id="images_exp">
            <h3>Les spécialités de la chef :</h3>
            <img src="../Images/Plat1.jpeg" height="100vw" alt="Plat1">
            <img src="../Images/Plat2.jpeg" height="100vw" alt="Plat2">
        </div>
        </div>
    </div>





    <div id="description_img"><img id="Photo_profil" height="100vw" src="../Images/José.jpeg" alt="Julie">
        <div id="description_profil">
        <p>
        José est un créateur culinaire dont la philosophie est simple : l'énergie dans le corps nourrit la créativité dans l'assiette. Ancien athlète, il a transposé la discipline et la rigueur du sport dans sa cuisine pour développer une approche unique de la gastronomie : saine, performante et sans jamais sacrifier le goût.
        </p>
            <div id="images_exp">
                <h3>Les spécialités du chef :</h3>
                <div>
                    <img src="../Images/Plat3.jpeg" height="100vw" alt="Plat3">
                    <img src="../Images/Plat4.jpeg" height="100vw" alt="Plat4">
                </div>
            </div>
        </div>
    </div>


</section>

</body>

<?php

// On affiche le contenu du Footer

require_once "../Require/Footer.html";
?>


</html>