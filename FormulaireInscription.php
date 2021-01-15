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
                        <span class="erreur"><?= isset($connexionErreur['login']) ? $connexionErreur['login'] : '' ?></span>
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
                            <input type="checkbox" name="resterco" id="resterco">
                            <span>Rester connecter</span>
                        </label>
                    </div>
                </div>
                <div class="row">
                    <div class="col s6 center-align">
                        <input type="submit" name="submit" id="submit" class="waves-effect waves-purple btn">
                    </div>
                    <div class="col s6 center-align">
     
      