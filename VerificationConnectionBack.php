<?php

try {
    $db = new PDO('mysql:host=localhost;charset=utf8;dbname=jarditou', 'root', '');
} catch (Exception $e) {
    echo 'erreur : ' . $e->getMessage() . '<br>';
    echo 'N° : ' . $e->getCode();
    die('fin du script');
}
/*
  Accès à la connexion
 */
if (isset($_POST['signIn']))
{
    // Vidage sessions
    session_unset();

    // login
    if (!empty($_POST['login']))
    {
        if (preg_match($namePattern, $_POST['login']))
        {
            $login = htmlspecialchars($_POST['login']);
        }
        else
        {
            $connexionErreur['login'] = 'Veuillez renseigner un login valide!';
        }
    }
    else
    {
        $$connexionErreur['login'] = 'Veuillez renseigner votre login!';
    }
    // mot de passe
    if (!empty($_POST['motdepasse']))
    {
        if (preg_match($namePattern, $_POST['motdepasse']))
        {
            $motdepasse = htmlspecialchars($_POST['motdepasse']);
        }
        else
        {
            $connexionErreur['motdepasse'] = 'Veuillez renseigner un mot de passe valide!';
        }
    }
    else
    {
        $connexionErreur['motdepasse'] = 'Veuillez renseigner votre mot de passe!';
    }

    // Execution Script sans erreurs

    if (count($connexionErreur) == 0)
    {
        $state = false;
        $query = 'SELECT * FROM `user`'
                . 'WHERE `login_user` = :login';
        $result = $db->prepare($query);
        $result->bindValue(':login', $login, PDO::PARAM_STR);
        // si la requète fonctionne correctement
        if ($result->execute())
        {
            $selectResult = $result->fetch(PDO::FETCH_OBJ);
            // si présence de l'objet
            if (is_object($selectResult))
            {
                // vérification du mot de passe
                if (password_verify($motdepasse, $selectResult-$motdepasse_user))
                {
                    // Enregistrement utilisateur
                    if (isset($_POST['keepLog']))
                    {
                        $_SESSION['login'] = $login;
                        $_SESSION['motdepasse'] = $motdepasse;
                    }
                    $state = true;
                }
                else
                {
                    // message d'erreur en cas d'erreur de mot de passe
                    $connexionErreur['motdepasse'] = 'Erreur lors de la saisie. Veuillez reessayer.';
                }
            }
            else
            {
                // message d'erreur en cas d'erreur de pseudo
                $connexionErreur['erreur'] = 'Erreur de login. Veuillez reessayer';
            }
        }
        else
        {
            // message en cas mauvaise connexion à la BDD
            $connexionErreur['Erreur'] = 'Impossibilité de connexion à la base de données';
        }
        return $state;
    }
}