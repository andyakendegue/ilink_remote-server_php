<?php

/**
 * PHP API for Login, Register, Changepassword, Resetpassword Requests and for Email Notifications.
 **/
header('Content-type: application/json');

// Program SMSM Sending
/* Send an SMS using Twilio. You can run this file 3 different ways:
*
* 1. Save it as sendnotifications.php and at the command line, run
*         php sendnotifications.php
*
* 2. Upload it to a web host and load mywebhost.com/sendnotifications.php
*    in a web browser.
*
* 3. Download a local server like WAMP, MAMP or XAMPP. Point the web root
*    directory to the folder containing this file, and load
*    localhost:8888/sendnotifications.php in a web browser.
*/

// Step 1: Get the Twilio-PHP library from twilio.com/docs/libraries/php,
// following the instructions to install it with Composer.
require_once "vendor/autoload.php";
use Twilio\Rest\Client;

// Step 2: set our AccountSid and AuthToken from https://twilio.com/console
$AccountSid = "ACacdb9c9601741af001ebbc7eca4969cd";


$AuthToken = "0aa2ed8f08775286180f8b40baaf57fb";


// Step 3: instantiate a new Twilio Rest Client
$client = new Client($AccountSid, $AuthToken);

$sender_name = "Ilink";
$sender_number = "+447400348273";


if (isset($_POST['tag']) && $_POST['tag'] != '') {
    // Get tag
    $tag = $_POST['tag'];


    // Include Database handler
    require_once 'include/DB_Functions.php';
    $db = new DB_Functions();
    // response Array
    $response = array("tag" => $tag, "success" => 0, "error" => 0);

    // check for tag type
    if ($tag == 'login') {
        // Request type is check Login
        $phone = $_POST['phone'];
        $password = $_POST['password'];

        // check for user
        $user = $db->getUserByPhoneAndPasswordSimple($phone, $password);
        if ($user != false) {
            // user found
            // echo json with success = 1
            $response["success"] = 1;
            $response["user"]["fname"] = $user["firstname"];
            $response["user"]["lname"] = $user["lastname"];
            $response["user"]["email"] = $user["email"];
            $response["user"]["phone"] = $user["phone"];
            $response["user"]["country_code"] = $user["country_code"];
            $response["user"]["validation_code"] = $user["validation_code"];
            $response["user"]["network"] = $user["network"];
            $response["user"]["active"] = $user["active"];
            $response["user"]["uid"] = $user["unique_id"];
            $response["user"]["created_at"] = $user["created_at"];
            //echo json_encode($response);
            echo "success";
        } else {
            // user not found
            // echo json with error = 1
            $response["error"] = 1;
            $response["error_msg"] = "Incorrect email or password!";
            //echo json_encode($response);
            echo "failure";

        }
    } else if ($tag == 'login_ios') {
        // login ios

        // check for tag type
        // Request type is check Login
        $phone = $_POST['phone'];
        $password = $_POST['password'];

        // check for user
        $user = $db->getUserByPhoneAndPasswordSimple($phone, $password);
        if ($user != false) {
            // user found
            // echo json with success = 1
            $response["success"] = 1;
            $response["user"]["fname"] = $user["firstname"];
            $response["user"]["lname"] = $user["lastname"];
            $response["user"]["email"] = $user["email"];
            $response["user"]["phone"] = $user["phone"];
            $response["user"]["country_code"] = $user["country_code"];
            $response["user"]["validation_code"] = $user["validation_code"];
            $response["user"]["network"] = $user["network"];
            $response["user"]["active"] = $user["active"];
            $response["user"]["uid"] = $user["unique_id"];
            $response["user"]["created_at"] = $user["created_at"];

            //echo json_encode($response);
            //echo "success";

            error_log("User $username: password match.");
            echo '{"success":1}';
        } else {
            // user not found
            // echo json with error = 1
            $response["error"] = 1;
            $response["error_msg"] = "Incorrect email or password!";
            //echo json_encode($response);
            //echo "failure";
            error_log("User $username: password doesn't match.");
            echo '{"success":0,"error_message":"Invalid Username/Password"}';

        }


    } else if ($tag == 'login_ios_geo') {
        // login ios

        // check for tag type
        // Request type is check Login
        $phone = $_POST['phone'];
        $password = $_POST['password'];

        // check for user
        $user = $db->getUserByPhoneAndPasswordGeolocated($phone, $password);
        if ($user != false) {
            // user found
            // echo json with success = 1
            $response["success"] = 1;
            $response["user"]["fname"] = $user["firstname"];
            $response["user"]["lname"] = $user["lastname"];
            $response["user"]["email"] = $user["email"];
            $response["user"]["category"] = $user["category"];
            $response["user"]["user"]["member_code"] = $user["member_code"];
            $response["user"]["code_parrain"] = $user["code_parrain"];
            $response["user"]["country_code"] = $user["country_code"];
            $response["user"]["network"] = $user["network"];
            $response["user"]["phone"] = $user["phone"];
            $response["user"]["latitude"] = $user["latitude"];
            $response["user"]["longitude"] = $user["longitude"];
            $response["user"]["balance"] = $user["balance"];

            $response["user"]["validation_code"] = $user["validation_code"];
            $response["user"]["active"] = $user["active"];
            $response["user"]["mbre_reseau"] = $user["mbre_reseau"];
            $response["user"]["mbre_ss_reseau"] = $user["mbre_ss_reseau"];
            $response["user"]["ouvert"] = $user["ouvert"];
            $response["user"]["uid"] = $user["unique_id"];
            $response["user"]["created_at"] = $user["created_at"];


            echo json_encode($response);
            //echo "success";

            error_log("User $username: password match.");
            //echo '{"success":1}';
        } else {
            // user not found
            // echo json with error = 1
            $response["error"] = 1;
            $response["error_msg"] = "Incorrect email or password!";
            //echo json_encode($response);
            //echo "failure";
            error_log("User $username: password doesn't match.");
            echo '{"success":0,"error_message":"Invalid Username/Password"}';

        }


    } else if ($tag == 'login_geolocated') {
        // check for tag type
        // Request type is check Login
        $phone = $_POST['phone'];
        $password = $_POST['password'];

        // check for user
        $user = $db->getUserByPhoneAndPasswordGeolocated($phone, $password);
        if ($user != false) {
            // user found
            // echo json with success = 1
            $response["success"] = 1;
            $response["user"]["fname"] = $user["firstname"];
            $response["user"]["lname"] = $user["lastname"];
            $response["user"]["email"] = $user["email"];
            $response["user"]["category"] = $user["category"];
            $response["user"]["member_code"] = $user["member_code"];
            $response["user"]["code_parrain"] = $user["code_parrain"];
            $response["user"]["country_code"] = $user["country_code"];
            $response["user"]["network"] = $user["network"];
            $response["user"]["phone"] = $user["phone"];
            $response["user"]["latitude"] = $user["latitude"];
            $response["user"]["longitude"] = $user["longitude"];
            $response["user"]["balance"] = $user["balance"];

            $response["user"]["validation_code"] = $user["validation_code"];
            $response["user"]["active"] = $user["active"];
            $response["user"]["mbre_reseau"] = $user["mbre_reseau"];
            $response["user"]["mbre_ss_reseau"] = $user["mbre_ss_reseau"];
            $response["user"]["ouvert"] = $user["ouvert"];
            $response["user"]["uid"] = $user["unique_id"];
            $response["user"]["created_at"] = $user["created_at"];

            //echo json_encode($response);
            echo "success";
        } else {
            // user not found
            // echo json with error = 1
            $response["error"] = 1;
            $response["error_msg"] = "Incorrect email or password!";
            //echo json_encode($response);
            echo "failure";

        }
    } else if ($tag == 'ask_supervisor') {
        //Ask upervisor
        $phone = $_POST['phone'];
        $nombre_membres = $_POST['membres'];
        $categorie = $_POST['category'];

        $demand = $db->storeDemand($phone, $nombre_membres, $categorie);
        if ($demand) {


            $subject = "Nouvelle demande superviseur";
            $email = "andymigoumbi@gmail.com";
            $message = "Bonjour,\n\nUne nouvelle demande de superviseur a ete enregistree.\nNumero de telephone : $phone \n\n\nCordialement,\nLe Serveur Ilink.";
            $from = "contact@ilink.com";
            $headers = "De:" . $from;
            $name = "ilink";
            mail($email, $subject, $message, $headers);
            // Start Sending SMS
            $sms = $client->account->messages->create(

            // the number we are sending to - Any phone number
                $phone,

                array(
                    // Step 6: Change the 'From' number below to be a valid Twilio number
                    // that you've purchased
                    'from' => $sender_number,


                    // the sms body
                    'body' => $message
                )
            );
            // Stop Sending SMS


            //smtpmailer($email,$from,$name,$subject,$message);
            //echo json_encode($response);
            echo "success";
        } else {
            // user failed to store
            $response["error"] = 1;
            $response["error_msg"] = "JSON Error occured in Registartion";
            //echo json_encode($response);
            echo "failed";

        }

    } else if ($tag == 'chgpass') {
        //Change Password Geolocated
        $phone = $_POST['phone'];
        $category = $_POST['category'];
        $newpassword = $_POST['password'];


        $hash = $db->hashSSHA($newpassword);
        $encrypted_password = $hash["encrypted"]; // encrypted password
        $salt = $hash["salt"];
        $subject = "Nouveau mot de passe";
        $message = "Salut cher membre,\n\nLa modification du mot de passe est reussie.\n\nCordialement,\nIlink.";
        $from = "contact@ilink.com";
        $headers = "De:" . $from;
        if ($db->isPhoneExisted($phone, $category)) {

            $user = $db->forgotPassword($phone, $encrypted_password, $salt);
            if ($user) {
                $response["success"] = 1;

                $mail = $db->getEmail($phone);
                if ($mail) {
                    mail($mail["email"], $subject, $message, $headers);


                    // Start Sending SMS
                    $sms = $client->account->messages->create(

                    // the number we are sending to - Any phone number
                        $phone,

                        array(
                            // Step 6: Change the 'From' number below to be a valid Twilio number
                            // that you've purchased
                            'from' => $sender_number,


                            // the sms body
                            'body' => $message
                        )
                    );
                    // Stop Sending SMS


                    //echo json_encode($response);
                    echo "success";
                }

            } else {
                $response["error"] = 1;
                //echo json_encode($response);
                echo "error";
            }


            // user is already existed - error response


        } else {

            $response["error"] = 2;
            $response["error_msg"] = "User not exist";
            //echo json_encode($response);
            echo "L'utilisateur n'existe pas";

        }
    } else if ($tag == 'chgpass_simple') {
        //Change Password Simple
        $phone = $_POST['phone'];
        $newpassword = $_POST['password'];


        $hash = $db->hashSSHA($newpassword);
        $encrypted_password = $hash["encrypted"]; // encrypted password
        $salt = $hash["salt"];
        $subject = "Nouveau mot de passe";
        $message = "Salut cher membre,\n\nLa modification du mot de passe est reussie.\n\nVotre nouveau mot de passe est : $newpassword\n\nCordialement,\nIlink.";
        $from = "contact@ilink.com";
        $headers = "De:" . $from;
        if ($db->isPhoneExistedSimple($phone)) {

            $user = $db->forgotPasswordSimple($phone, $encrypted_password, $salt);
            if ($user) {
                $response["success"] = 1;

                $mail = $db->getEmailSimple($phone);
                if ($mail) {
                    mail($mail["email"], $subject, $message, $headers);

                    // Start Sending SMS
                    $sms = $client->account->messages->create(

                    // the number we are sending to - Any phone number
                        $phone,

                        array(
                            // Step 6: Change the 'From' number below to be a valid Twilio number
                            // that you've purchased
                            'from' => $sender_number,


                            // the sms body
                            'body' => $message
                        )
                    );
                    // Stop Sending SMS


                    //echo json_encode($response);
                    echo "success";
                }

            } else {
                $response["error"] = 1;
                json_encode($response);

                //print_r($response);
                echo "error";
            }


            // user is already existed - error response


        } else {

            $response["error"] = 2;
            $response["error_msg"] = "User not exist";
            //echo json_encode($response);
            echo "l'utilisateur n'existe pas";

        }
    } else if ($tag == 'updateLocation') {
        // Update Location

        $latitude = $_POST['latitude'];
        $longitude = $_POST['longitude'];
        $phone = $_POST['phone'];


        if ($db->isPhoneExistedSimple($phone)) {

            $user = $db->updateLocationSimple($phone, $latitude, $longitude);
            if ($user) {
                $response["success"] = 1;

                echo json_encode($response);
            } else {
                $response["error"] = 1;
                echo json_encode($response);
            }


            // user is already existed - error response


        } else {

            $response["error"] = 2;
            $response["error_msg"] = "User not exist";
            echo json_encode($response);

        }


    } else if ($tag == 'forpass') {
        $forgotpassword = $_POST['forgotpassword'];

        $randomcode = $db->random_string();


        $hash = $db->hashSSHA($randomcode);
        $encrypted_password = $hash["encrypted"]; // encrypted password
        $salt = $hash["salt"];
        $subject = "Password Recovery";
        $message = "Hello User,\n\nYour Password is sucessfully changed. Your new Password is $randomcode . Login with your new Password and change it in the User Panel.\n\nRegards,\nLearn2Crack Team.";
        $from = "contact@learn2crack.com";
        $headers = "From:" . $from;
        if ($db->isUserExisted($forgotpassword)) {

            $user = $db->forgotPassword($forgotpassword, $encrypted_password, $salt);
            if ($user) {
                $response["success"] = 1;
                mail($forgotpassword, $subject, $message, $headers);

                // Start Sending SMS
                $sms = $client->account->messages->create(

                // the number we are sending to - Any phone number
                    $forgotpassword,

                    array(
                        // Step 6: Change the 'From' number below to be a valid Twilio number
                        // that you've purchased
                        'from' => $sender_number,


                        // the sms body
                        'body' => $message
                    )
                );
                // Stop Sending SMS
                echo json_encode($response);
            } else {
                $response["error"] = 1;
                echo json_encode($response);
            }


            // user is already existed - error response


        } else {

            $response["error"] = 2;
            $response["error_msg"] = "User not exist";
            echo json_encode($response);

        }

    } else if ($tag == 'register') {
        // Request type is Register new user
        $fname = $_POST['firstname'];
        $lname = $_POST['lastname'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $password = $_POST['password'];
        $country = $_POST['country_code'];
        $network = $_POST['network'];
        $latitude = "0";
        $longitude = "0";
        $member = "0";
        $category = $_POST['category'];
        $validate = $_POST['active'];


        // check if user is already existed
        // check if user is already existed
        if ($db->isPhoneExistedSimple($phone)) {
            // user is already existed - error response
            $response["error"] = 2;
            $response["error_msg"] = "User already existed";
            //echo json_encode($response);
            echo "le numero de telephone existe deja";
        } else {
            // store user
            $user = $db->storeUserSimple($fname, $lname, $email, $phone, $password, $country, $network, $member, $category, $latitude, $longitude, $validate);
            if ($user) {
                // user stored successfully
                $response["success"] = 1;
                $response["user"]["fname"] = $user["firstname"];
                $response["user"]["lname"] = $user["lastname"];
                $response["user"]["email"] = $user["email"];
                $response["user"]["uname"] = $user["username"];
                $response["user"]["uid"] = $user["unique_id"];
                $response["user"]["created_at"] = $user["created_at"];
                $validation = $user["validation_code"];


                $subject = "Bienvenue sur Ilink";
                $message = "Salut,\n\nVotre compte vient d'etre crée.\nVotre identifiant : $phone \nVotre mot de passe : $password\nVotre code de validation : $validation\nPays : $country \n\nCordialement,\nEquipe Ilink.";
                $from = "contact@ilink.com";
                $headers = "De:" . $from;
                $name = "ilink";
                mail($email, $subject, $message, $headers);


                //smtpmailer($email,$from,$name,$subject,$message);
                //echo json_encode($response);
                echo "success";
            } else {
                // user failed to store
                $response["error"] = 1;
                $response["error_msg"] = "JSON Error occured in Registartion";
                //echo json_encode($response);
                echo "failed";

            }


        }
    } else if ($tag == 'register_geolocated') {
        // Register Geolocated
        // Request type is Register new user
        $fname = $_POST['firstname'];
        $lname = $_POST['lastname'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $password = $_POST['password'];
        $country = $_POST['country_code'];
        $network = $_POST['network'];
        $latitude = $_POST['latitude'];
        $longitude = $_POST['longitude'];
        $member = $_POST['member'];
        $category = $_POST['category'];
        $validate = $_POST['active'];
        $nombre_codes = "2";


        // check if user is already existed
        if ($db->isPhoneExisted($phone, $category)) {
            // user is already existed - error response
            $response["error"] = 2;
            $response["error_msg"] = "User already existed";
            //echo json_encode($response);
            echo "le numero de telephone existe deja";
        } else {

            // Verifie que le code membre existe
            $membercodetest = $db->isMemberCodeExisted($member, $nombre_codes, $phone);
            if ($membercodetest == "success") {

                $user = $db->storeUser($fname, $lname, $email, $phone, $password, $country, $network, $member, $category, $latitude, $longitude, $validate, $nombre_codes);


                if (isset($user["unique_id"])) {
                    //if ($user) {
                    // user stored successfully
                    $response["success"] = 1;
                    $response["user"]["fname"] = $user["firstname"];
                    $response["user"]["lname"] = $user["lastname"];
                    $response["user"]["email"] = $user["email"];
                    $response["user"]["uname"] = $user["username"];
                    $response["user"]["uid"] = $user["unique_id"];
                    $response["user"]["created_at"] = $user["created_at"];
                    $validation = $user["validation_code"];
                    $username = $user["lastname"];


                    $subject = "Bienvenue sur Ilink";
                    $message1 = "Salut $username,\n\nVotre compte vient d'etre crée.\nVotre identifiant : $phone \nVotre mot de passe : $password\nVotre code de validation : $validation\nPays : $country \n\nCordialement,\nEquipe Ilink.";
                    $message2 = "Salut $username,\n\nVotre compte vient d'etre crée.\nVotre identifiant : $phone \nVotre mot de passe : $password\n\nPays : $country \n\n\nVotre code de validation vous sera envoye une fois que votre Hyperviseur l'aura validé\n\nCordialement,\nEquipe Ilink.";

                    $from = "contact@ilink-app.com";
                    $headers = "De:" . $from;
                    $name = "ilink";
                    // A activer apres

                    $code_verification = $db->isCodeExisted($phone, $member);


                    if ($code_verification == "hyper") {
                        mail($email, $subject, $message1, $headers);

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


                        echo "success";
                    } else if ($code_verification == "super") {
                        mail($email, $subject, $message2, $headers);

                        // Start Sending SMS
                        $sms = $client->account->messages->create(

                        // the number we are sending to - Any phone number
                            $phone,

                            array(
                                // Step 6: Change the 'From' number below to be a valid Twilio number
                                // that you've purchased
                                'from' => $sender_number,


                                // the sms body
                                'body' => $message2
                            )
                        );
                        // Stop Sending SMS


                        echo "success";
                    } else if ($code_verification == "geolocated") {


                        $z = $db->validateNumber($phone);
                        if (isset($z['validation_code'])) {


                            $username = $z['lastname'];
                            $validation_code = $z['validation_code'];
                            $country = $z['country_code'];
                            $email = $z['email'];
                            $member_code = $z['member_code'];
                            $subject = "Bienvenue sur Ilink";
                            $message3 = "Salut $username,\n\nVotre compte vient d'etre crée.\nVotre identifiant : $phone \nVotre mot de passe : celui que vous avez choisi pendant votre inscription\nVotre code de validation : $validation_code\nVotre code membre est : $member_code\nPays : $country \n\nCordialement,\nEquipe Ilink.";
                            $from = "contact@ilink-app.com";
                            $headers = "De:" . $from;
                            $name = "ilink";
                            mail($email, $subject, $message3, $headers);

                            // Start Sending SMS
                            $sms = $client->account->messages->create(

                            // the number we are sending to - Any phone number
                                $phone,

                                array(
                                    // Step 6: Change the 'From' number below to be a valid Twilio number
                                    // that you've purchased
                                    'from' => $sender_number,


                                    // the sms body
                                    'body' => $message3
                                )
                            );
                            // Stop Sending SMS


                            echo "success";
                        } else {
                            echo "le numero ne peut etre accepte";
                        }


                    }

                    //mail($email,$subject,$message2,$headers);

                    //smtpmailer($email,$from,$name,$subject,$message);
                    //echo json_encode($response);

                } else {
                    // user failed to store
                    $response["error"] = 1;
                    $response["error_msg"] = "JSON Error occured in Registartion";
                    echo json_encode($user);
                    //echo json_encode($response);
                    //echo "failed";

                }
            } else {
                // user is already existed - error response
                $response["error"] = 2;
                $response["error_msg"] = "le code membre n'existe pas $member Detail de erreur : " . $membercodetest;
                //echo json_encode($response);
                //echo "le code membre n'existe pas $member Detail de erreur : " . $membercodetest;
            }

        }


    } else {
        $response["error"] = 3;
        $response["error_msg"] = "JSON ERROR";
        echo json_encode($response);
    }
    /*

    } else {
        echo '{"success":0,"error_message":"Invalid Data."}';
    }
    */
} else {

    echo '{"success":0,"error_message":"No tag sent."}';

}

?>
