<?php
if (!empty($_POST['motdepasse'])) {
    if (preg_match($passwordPattern, $_POST['motdepasse'])) {
        $password = password_hash($_POST['motdepasse'], PASSWORD_DEFAULT);
    } else {
        $connexionErreur['motdepasse'] = 'Erreur lors de la saisie. Veuillez reessayer!';
    }
} else {
    $connexionErreur['motdepasse'] = 'Merci de renseigner un mot de passe!';
}    