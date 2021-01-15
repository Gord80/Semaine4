<?php
 $.post('../../controler/connexionControler.php'
  {loginVerify: $(this).val()},    
 if (isset($_POST['loginVerify']))
{
    $login = $_POST['loginVerify'];
    $state = false;
    $query = 'SELECT COUNT(`id_user`) AS `count` FROM `user` WHERE `login_user` = :login';
    $result = $db->prepare($query);
    $result->bindValue(':login', $login, PDO::PARAM_STR);
    $result->execute();

    $selectResult = $result->fetch(PDO::FETCH_OBJ);
    $state = $selectResult->count;
    echo $state;
}    

function (data) {
            if (data == 1) {
                $('#loginErreur').html('Pseudo déja existant');
                $('#loginErreur').addClass('erreur');
            } else {
                $('#loginErreur').html('');
            }    