<?php
/**
 * Created by PhpStorm.
 * User: capp
 * Date: 23/10/2016
 * Time: 22:15
 */
$phone = "04645969";
$subject = "Bienvenue sur Ilink";
$message = "Salut,\n\nVotre compte vient d'etre crée.\nVotre identifiant : $phone \nVotre mot de passe : $password\nVotre code de validation : $validation\nPays : $country \n\nCordialement,\nEquipe Ilink.";
$from = "contact@ilink.com";

$name = "ilink";
$headers = "From : $from";
$email = "andymigoumbi@gmail.com";


if(mail($email,$subject,$message,$headers)) {
    echo "sent";
} else {
    echo "not sent";
}