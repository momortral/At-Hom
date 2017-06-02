<?php
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=athom;charset=utf8', 'root', '',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}
?>

<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
   <link rel='stylesheet' href="CSS/contact.css">
    <title>Title</title>
</head>
<body>

<header>
    <?php
    require("Header.php");
    ?>
</header>

<?php
$admin = true;
if ($admin == false){ ?>
<section>
    <div class="grande">
        <p>
            <img src="../Autre/images/bonhommetel.jpg" id="telephone">
        </p>
        <fieldset id="principale">
            <legend>Votre message</legend>
            <form method="post" action="../Modele/traitement.php">
                <div id="gauche">
                    <p><label>Nom*</label><br /><input type="text" name="nom" placeholder="Votre nom..." required/></p>
                    <p><label>Prenom*</label><br/><input type="text" name="prenom" placeholder="Votre prenom..." required></p>
                    <p><label>Mail*</label><br/><input type="text" name="mail" placeholder="Votre mail..." required></p>
                </div>
                <div id="droite">
                    <p><label for="commentaire" id="commentaire">Commentaire*</label>
                        <textarea name="commentaire" id="commentaire" placeholder="Pas de commentaire..."></textarea> </p>
                    <input type="submit" id="sent" value="envoyer" />
                </div>
            </form>
        </fieldset>
    </div>
</section>
<?php }
else {
    $derniers_messages = $bdd->query('SELECT * FROM commentaire WHERE reponse=0');?>
    <div class  ="affichage_commentaire">
        <?php while ($donnees = $derniers_messages->fetch()){?>
            <div class="message">
                <p> Un message a été envoyé par <span><?php echo $donnees['prenom'],' ', $donnees['nom']; ?>!</span><p>
                <?php echo $donnees['commentaire']; ?>
                <form method="post" action="../Modele/traitement_reponse.php">
                    <div id="reponse">
                        <p  ><!--<label for="reponse" id="reponse">Une réponse à ce message?</label>-->
                           <textarea name="reponse" id="reponse" placeholder="Votre réponse..."></textarea></p>
                        <input type="submit" id="sent_reponse" value="Envoyer" />
                        <input type="hidden" name="mail" value="<?php echo $donnees['mail'] ?>">
                    </div>
                </form>
            </div>
        <?php } ?>
    </div>
<?php $derniers_messages->closeCursor(); } ?>


<footer>
    <?php
    require("footer.html");
    ?>
</footer>

</body>
</html>