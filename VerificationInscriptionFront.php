<?php
session_start();
include '../header.php';
?>
<div class="container">
    <?php
    if (isset($_POST['signIn']) && count($connexionErreur) == 0)
    {
        ?>
        <p class="confirmationinsc">
            Ravi de vous ravoir! <?= isset($_SESSION['login']) ? $_SESSION['login'] : $_POST['login'] ?>
        </p>
        <?php
    }
    else if (isset($_POST['submit']) && count($connexionErreur) == 0)
    {
        ?>
        <p class="confirmationinsc">
            Félicitations et bienvenue sur notre site. <?= isset($_SESSION['login']) ? ', bienvenue ' . $_SESSION['login'] : '' ?>.
        </p>
        <a href="connexionDemo.php" class="waves-effect waves-purple btn" title="Retour vers la connexion">Retour vers la connexion</a>
        <?php
        var_dump(mail($destinataire, $objet, $message, $header));
    }
    else
    {
        ?> 

        <div class="row">
            <!-- formulaire d'inscription -->
            <form class="col s12" action="#" method="POST">
                <div class="row">        
                    <div class="input-field col s6">
                        <input id="nom" type="text" class="validate" name="nom" value="<?= isset($_POST['nom']) ? $_POST['nom'] : '' ?>">
                        <label for="nom">Nom</label>
                        <span class="nom_erreur"><?= isset($connexionErreur['nom']) ? $connexionErreur['nom'] : '' ?></span>
                    </div>
                    <div class="input-field col s6">
                        <input id="prenom" type="text" class="validate" name="prenom" value="<?= isset($_POST['prenom']) ? $_POST['prenom'] : '' ?>">
                        <label for="prenom">Prénom</label>
                        <span class="prenom_erreur"><?= isset($connexionErreur['prenom']) ? $connexionErreur['prenom'] : '' ?></span>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <input id="login" type="text" class="validate" name="login" value="<?= isset($_POST['login']) ? $_POST['login'] : '' ?>">
                        <label for="login">Login</label>
                        <span class="login_erreur"><?= isset($connexionErreur['login']) ? $connexionErreur['login'] : '' ?></span>
                        <span id="login_erreur"></span>
                    </div>
                    <div class="input-field col s6">
                        <input id="motdepasse" type="motdepasse" class="validate" name="motdepasse" value="<?= isset($_POST['motdepasse']) ? $_POST['motdepasse'] : '' ?>">
                        <label for="motdepasse">Mot de passe</label>
                        <span class="motdepasse_erreur"><?= isset($connexionErreur['motdepasse']) ? $connexionErreur['motdepasse'] : '' ?></span>
                    </div>
                </div>   
                <div class="row">
                    <div class="input-field col s12">
                        <input id="mail" type="email" class="validate" name="mail" value="<?= isset($_POST['mail']) ? $_POST['mail'] : '' ?>">
                        <label for="email">Email</label>
                        <span class="mail_erreur"><?= isset($connexionErreur['mail']) ? $connexionErreur['mail'] : '' ?></span>
                    </div>
                </div>
                <div class="row">
                    <div class="col s2">
                        <label>
                            <input type="checkbox" name="keepLog" id="keepLog">
                            <span>Rester connecter</span>
                        </label>
                    </div>
                </div> 
                <div class="row">
                    <div class="col s6 center-align">
                        <input type="submit" name="submit" id="submit" class="waves-effect waves-light btn">
                    </div>
                    <div class="col s6 center-align">
                        <!-- Boutton de connecter-->
                        <a class="waves-effect waves-light btn modal-trigger" href="#modal1">Connexion</a>
                    </div>
                </div>
            </form>
        </div>
        <!-- Pour se connecter -->
        <div id="modal1" class="modal bottom-sheet">
            <div class="modal-content">
                <h4>Connexion</h4>
                <form action="#" method="POST">
                    <div class="row">
                        <div class="col s2">
                            <label>
                                <input type="checkbox" name="keepLog" id="keepLog">
                                <span>Rester connecter</span>
                            </label>
                        </div>
                        <div class="input-field col s5">
                            <input id="login" type="text" class="validate" name="login" value="<?= isset($_POST['login']) ? $_POST['login'] : '' ?>">
                            <label for="login">Login</label>
                            <span class="login_erreur"><?= isset($connexionErreur['login']) ? $connexionErreur['login'] : '' ?></span>

                        </div>
                        <div class="input-field col s5">
                            <input id="motdepasse" type="motdepasse" class="validate" name="motdepasse" value="<?= isset($_POST['motdepasse']) ? $_POST['motdepasse'] : '' ?>">
                            <label for="motdepasse">Mot de passe</label>
                            <span class="motdepasse_erreur"><?= isset($connexionErreur['motdepasse']) ? $connexionErreur['motdepasse'] : '' ?></span>
                        </div>
                    </div>   
                    <div class="row">
                        <div class="col s6 center-align">
                            <a href="#!" class="modal-close waves-effect waves-purple btn cancel">Annuler</a>
                        </div>
                        <div class="col s6 center-align">
                            <input type="submit" name="signIn" id="submit" class="waves-effect waves-purple btn" value="Se connecter">
                        </div>
                    </div>

                </form>              
            </div>
        </div>
        <?php
    }
    ?>

</div>

<?php
include '../footer.php';
?>    