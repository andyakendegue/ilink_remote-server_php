<?php

$host='localhost';
$uname='ilink';
$pwd='ilink2016GA';
$db="ilink";

$con = mysqli_connect($host,$uname,$pwd,$db) or die("connection failed");
//mysql_select_db($db,$con) or die("db selection failed");

//$id=$_POST['id'];

$phone = $_POST['phone'];

$r=mysqli_query($con,"select * from demande_superviseur WHERE phone = '$phone'");
$no_rows = mysqli_num_rows($r);

if($no_rows > 0){
    $r = mysqli_fetch_array($r);
    $code_membre = $r['code'];
    $nbre_codes = $r['nbrecode'];
    $category = $r['categorie'];
}
$null_statut = "0";
$s=mysqli_query($con,"UPDATE demande_superviseur SET Statut = 'traite' WHERE phone = '$phone'");
$t=mysqli_query($con,"select * from codeGenerer WHERE CodeID = '$code_membre' AND Statut = '$null_statut' ");

$noRows = mysqli_num_rows($t);

if($noRows > 0){
    $t = mysqli_fetch_array($t);
    $code_parrain = $code_membre;
    $code_membre = $t['CodeAssoc'];



}

$u=mysqli_query($con,"UPDATE users SET member_code = '$code_membre', code_parrain = '$code_parrain', mbre_reseau='$nbre_codes', mbre_ss_reseau = '0' WHERE phone = '$phone'");
$v=mysqli_query($con,"UPDATE codeGenerer SET Statut = '1' WHERE CodeAssoc = '$code_membre'");
$w=mysqli_query($con,"INSERT INTO codemembre(code, categorie, nbrecode, phone) VALUES('$code_membre','$category','$nbre_codes','$phone')");

$x=mysqli_query($con,"select * from codemembre WHERE code = '$code_parrain'");
$no = mysqli_num_rows($x);

if($no > 0){
    $x = mysqli_fetch_array($x);
    $nbredecode = $x['nbrecode'];



}
$code_int = intval($nbredecode);
$code_int = $code_int -1;
$y=mysqli_query($con,"UPDATE codemembre SET nbrecode = '$code_int' WHERE code = '$code_parrain'");


$z=mysqli_query($con,"select * from users WHERE phone = '$phone'");
$now = mysqli_num_rows($z);

if($now > 0){
    $z = mysqli_fetch_array($z);
    $username = $z['lastname'];
    $validation_code = $z['validation_code'];
    $country = $z['country_code'];
    $email = $z['email'];
    $member_code = $z['member_code'];



}



$subject = "Bienvenue sur Ilink";
$message1 = "Salut $username,\n\nVotre compte vient d'etre crée.\nVotre identifiant : $phone \nVotre mot de passe : celui que vous avez choisi pendant votre inscription\nVotre code de validation : $validation_code\nVotre code membre est : $member_code\nPays : $country \n\nCordialement,\nEquipe Ilink.";
$from = "contact@ilink-app.com";
$headers = "De:" . $from;
$name = "ilink";
mail($email,$subject,$message1,$headers);

mysqli_close($con);
?>