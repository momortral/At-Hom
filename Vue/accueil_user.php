
<?php
require ("../Modele/connexion M.php");
?>

<!DOCTYPE HTML>
<head>
    <title> accueil user</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="CSS/style.css">
</head>

<body>
<?php
require ("../Controleur/test_ajout_capteur.php")
?>

<header>
    <?php
    require ("Header.php");
    ?>
</header>

<?php
require ("Menu_user.php");
?>

<section id="gestion_cap">
<?php
$capteurs = $bdd->query("SELECT * FROM capteur WHERE idmaison=1");
while($donnees = $capteurs->fetch()){ ?>
    <p>Il y a un capteur <?php echo $donnees['type_capteur'] ?> dans la pièce : <?php echo $donnees['nom_pièce']?></p>
<?php }
?>
</section>

<footer>
    <?php
    require ("footer.html");
    ?>
</footer>
</body>
