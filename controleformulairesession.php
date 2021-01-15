<?php
if (isset($_POST['submit'])) {
   // Vérification login
    if (!empty($_POST['login'])) {
        if (preg_match($loginREGEXP, $_POST['login'])) {
            $login = $_POST['login'];
        } else {
            $formerreur = 'Renseignez un login valide!';
        }
    } else {
        $formerreur = 'Renseignez un login!';
    }
  // Vérification mot de passe
    if (!empty($_POST['motdepasse'])) {
        if (preg_match($motdepasseREGEXP, $_POST['motdepasse'])) {
            $login = $_POST['motdepasse'];
        } else {
            $formerreur = 'Renseignez un mot de passe valide!';
        }
    } else {
        $formerreur = 'Renseignez un mot de passe!';
    }
}    