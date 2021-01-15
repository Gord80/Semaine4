<?php

try {
    $db = new PDO('mysql:host=localhost;charset=utf8;dbname=jarditou', 'root', '');
} catch (Exception $e) {
    echo 'erreur : ' . $e->getMessage() . '<br>';
    echo 'N° : ' . $e->getCode();
    die('fin du script');
}
  //contrôle du formulaire
 
$connexionErreur = array();
//regexp
$nomREGEXP = '/^[a-zA-Z]+$/';
$motdepasseREGEXP = '/^[a-zA-Z0-9]+$/';
$mailREGEXP = '/^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/';


if (isset($_POST['submit'])) {
    // champs nom
     
    if (!empty($_POST['nom'])) {
        if (preg_match($nomREGEXP, $_POST['nom'])) {
            $nom = htmlspecialchars($_POST['nom']);
        } else {
            $connexionErreur['nom'] = 'Mauvaise saisie du nom de famille!';
        }
    } else {
        $connexionErreur['nom'] = 'Veuillez renseigner un nom de famille!';
    }
   // champs prenom
    if (!empty($_POST['prenom'])) {
        if (preg_match($nomREGEXP, $_POST['prenom'])) {
            $prenom = htmlspecialchars($_POST['prenom']);
        } else {
            $connexionErreur['prenom'] = 'Mauvaise saisie du prénom!';
        }
    } else {
        $connexionErreur['motdepasse'] = 'Veuillez renseigner un prénom!';
    }
    // champs mot de passe
    if (!empty($_POST['motdepasse'])) {
        if (preg_match($motdepasseREGEXP, $_POST['motdepasse'])) {
            $motdepasse = password_hash($_POST['motdepasse'], PASSWORD_DEFAULT);
        } else {
            $connexionErreur['motdepasse'] = 'Mauvaise saisie du mot de passe!';
        }
    } else {
        $connexionErreur['motdepasse'] = 'Veuillez renseigner un mot de passe!';
    }
 // champs mail
    if (!empty($_POST['mail'])) {
        if (preg_match($mailREGEXP, $_POST['mail'])) {
            $mail = htmlspecialchars($_POST['mail']);
        } else {
            $connexionErreur['mail'] = 'Mauvaise saisie de l\'adresse mail!';
        }
    } else {
        $connexionErreur['mail'] = 'Veuillez renseigner une adresse mail!';
    }
 // champs login
    if (!empty($_POST['login'])) {
        if (preg_match($nomREGEXP, $_POST['login'])) {
            $login = htmlspecialchars($_POST['login']);
        } else {
            $connexionErreur['login'] = 'Mauvaise saisie du login!';
        }
    } else {
        $connexionErreur['login'] = 'Veuillez renseigner login!';
    }
    // Si pas d'erreurs dans la saisie
    if (count($connexionErreur) == 0) {
        $query = 'INSERT INTO `user` (`nom_user`, `prenom_user`, `motdepasse_user`, `mail_user`, `login_user`, `inscript_user`) VALUE (:nom, :prenom, :motdepasse, :mail, :login, NOW())';
        $result = $db->prepare($query);
        $result->bindValue(':nom', $nom PDO::PARAM_STR);
        $result->bindValue(':prenom', $prenom, PDO::PARAM_STR);
        $result->bindValue(':motdepasse', $motdepasse, PDO::PARAM_STR);
        $result->bindValue(':mail', $mail, PDO::PARAM_STR);
        $result->bindValue(':login', $login, PDO::PARAM_STR);
        $result->execute();
    }
    // garde en mémoire 
    if (isset($_POST['keepLog'])) {
        $_SESSION['prenom'] = $prenom;
        $_SESSION['nom'] = $nom;
        $_SESSION['login'] = $login;
        $_SESSION['mail'] = $mail;
        $_SESSION['motdepasse'] = $motdepasse;
    }
}