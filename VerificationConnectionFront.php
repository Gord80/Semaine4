<?php
session_start();
include '../header.php';
?>

<?php

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
    // s'il n'y pas d'erreur
    if (count($connexionErreur) == 0)
    {
        $state = false;
        $query = 'SELECT * FROM `user`'
                . 'WHERE `login_user` = :login';
        $result = $db->prepare($query);
        $result->bindValue(':login', $login, PDO::PARAM_STR);
        // si la requète s'exécute
        if ($result->execute())
        {
            $selectResult = $result->fetch(PDO::FETCH_OBJ);
            // si on a bien un objet
            if (is_object($selectResult))
            {
                // vérification du mot de passe
                if (password_verify($motdepasse, $selectResult-$motdepasse_user))
                {
                    // definission des variable de session selon le choix de l'utilisateur
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