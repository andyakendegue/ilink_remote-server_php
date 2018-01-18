<?php

if (isset($_SERVER['HTTP_ORIGIN'])) {
    header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
    header('Access-Control-Allow-Credentials: true');
    header('Access-Control-Max-Age: 86400');    // cache for 1 day
}

// Access-Control headers are received during OPTIONS requests

if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {

    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS");

    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
        header("Access-Control-Allow-Headers:        {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");

    exit(0);
    
}

$host='localhost';
$uname='root';
$pwd='vps@2017GA';
$db="ilink";

// Step 1: Get the Twilio-PHP library from twilio.com/docs/libraries/php,
// following the instructions to install it with Composer.
require_once "../vendor/autoload.php";
use Twilio\Rest\Client;

// Step 2: set our AccountSid and AuthToken from https://twilio.com/console
$AccountSid = "ACacdb9c9601741af001ebbc7eca4969cd";


$AuthToken = "0aa2ed8f08775286180f8b40baaf57fb";


// Step 3: instantiate a new Twilio Rest Client
$client = new Client($AccountSid, $AuthToken);

$sender_name = "Ilink";
$sender_number = "+447400348273";

$postdata = file_get_contents("php://input");

if(isset($postdata)) {

    $request = json_decode($postdata);
}


$con = mysqli_connect($host,$uname,$pwd,$db) or die("connection failed");

$phone = $request->phone;

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
    $nbreMembres = $z['mbre_reseau'];

}





if ($r && $s && $t && $u && $v && $w && $x && $y && $z) {
    $subject = "Bienvenue sur Ilink";
$message1 = "Salut $username,\n\nVotre compte vient d 'être validé.\nVotre identifiant : $phone \nVotre mot de passe : celui que vous avez choisi pendant votre inscription\nVotre code de validation : $validation_code\nVotre code membre est : $member_code\nPays : $country \n vous avez le droit d'avoir $nbreMembres membres \n\nCordialement,\nEquipe Ilink.";
$from = "contact@ilink-app.com";
$headers = "De:" . $from;
$name = "ilink";
mail($email,$subject,$message1,$headers);
// Start Sending SMS
$sms = $client->account->messages->create(

// the number we are sending to - Any phone number
    $phone,

    array(
        // Step 6: Change the 'From' number below to be a valid Twilio number
        // that you've purchased
        'from' => $sender_number,


        // the sms body
        'body' => $message1
    )
);
// Stop Sending SMS



            $response["success"] = 1;
            $response["message"] = "success";

            echo json_encode($response);

            

} else {


            $response["error"] = 1;
            $response["error_msg"] = "User cannot be accepted";
    
            echo json_encode($response);

}



mysqli_close($con);

?>
