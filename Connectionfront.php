<?php
session_start();
include 'header.php';
include '../controler/sessionDemoControler.php';
?>

<div class="uk-container">
    <?php
    // si une vraiable de session est définie
    if (isset($_SESSION['login']) && (count($loginErreur) == 0)) {
        ?>
        <p>
            Bienvenue <?= $_SESSION['login'] ?>. Votre connexion est un succès!
        </p>
        <form method="POST" action="#">
            <input type="submit" id="back" name="back" value="Retour à la connexion" class="waves-effect waves-purple btn" /> 
        </form>
        <?php
        // sinon on affiche le formulaire de connexion
    } else {
        var_dump($_POST);
        ?>
        
        <div class = "uk-card uk-card-default uk-card-body uk-width-1-2@m">
            <form action = "#" method = "POST">
                <div class = "uk-margin">
                    <label for = "login">Identifiant</label>
                    <input id = "login" name = "login" type = "text" class = "uk-input" placeholder = "Identifiant" />
                </div>
                <div class = "uk-margin">
                    <label for = "motdepasse">Mot de passe</label>
                    <input id = "motdepasse" type = "motdepasse" name = "motdepasse" class = "uk-input" placeholder = "Mot de passe" />
                </div>
                <input type = "submit" id = "submit" name = "submit" class = "waves-effect waves-purple btn" value = "Se connecter" />
            </form>
        </div>
        <?php
    }
    ?>

</div>

<?php
include 'footer.php';
?>    