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


$postdata = file_get_contents("php://input");
if(isset($postdata)) {
    $request = json_decode($postdata);
}

if (isset($request->tag) && $request->tag != '') {
    // Get tag
    $tag = $request->tag;


    // Include Database handler
    require_once 'include/DB_Functions.php';
    $db = new DB_Functions();
    // response Array
    $response = array("tag" => $tag, "success" => 0, "error" => 0);

    // check for tag type
    if ($tag == 'login') {
        // Request type is check Login
        $phone = $request->phone;
        $password = $request->password;

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
            echo json_encode($response);

        } else {
            // user not found
            // echo json with error = 1
            $response["error"] = 1;
            $response["error_msg"] = "Téléphone ou mot de passe incorrect!";
            echo json_encode($response);


        }
    } else if ($tag == 'login_ios') {
        // login ios

        // check for tag type
        // Request type is check Login
        $phone = $request->phone;
        $password = $request->password;

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

            echo json_encode($response);


        } else {
            // user not found
            // echo json with error = 1
            $response["error"] = 1;
            $response["error_msg"] = "Téléphone ou mot de passe incorrect!";
            echo json_encode($response);

        }


    } else if ($tag == 'login_ios_geo') {
        // login ios

        // check for tag type
        // Request type is check Login
        $phone = $request->phone;
        $password = $request->password;

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

        } else {
            // user not found
            // echo json with error = 1
            $response["error"] = 1;
            $response["error_msg"] = "Téléphone ou mot de passe incorrect!";
            echo json_encode($response);

        }


    } else if ($tag == 'login_geolocated') {
        // check for tag type
        // Request type is check Login
        $phone = $request->phone;
        $password = $request->password;

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

            echo json_encode($response);

        } else {
            // user not found
            // echo json with error = 1
            $response["error"] = 1;
            $response["error_msg"] = "Téléphone ou mot de passe incorrect!";
            echo json_encode($response);


        }
    } else if ($tag == 'ask_supervisor') {
        //Ask upervisor
        $phone = $request->phone;
        $nombre_membres = $request->membres;
        $categorie = $request->category;

        $demand = $db->storeDemand($phone, $nombre_membres, $categorie);
        if ($demand) {


            $subject = "Nouvelle demande superviseur";
            $email = "andymigoumbi@gmail.com";
            $message = "Bonjour,\n\nUne nouvelle demande de superviseur a ete enregistree.\nNumero de telephone : $phone \n\n\nCordialement,\nL'équipe Ilink.";
            $from = "noreply@ilink.com";
            $headers = "From:" . $from;
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
            $response["success"] = 1;
            echo json_encode($response);
        } else {
            // user failed to store
            $response["error"] = 1;
            $response["error_msg"] = "La demande n'a pas pu être envoyée!";
            echo json_encode($response);

        }

    } else if ($tag == 'chgpass') {
        //Change Password Geolocated
        $phone = $request->phone;
        $category = $request->category;
        $newpassword = $request->password;


        $hash = $db->hashSSHA($newpassword);
        $encrypted_password = $hash["encrypted"]; // encrypted password
        $salt = $hash["salt"];
        $subject = "Nouveau mot de passe";
        $message = "Salut cher membre,\n\nLa modification du mot de passe est reussie.\n\nCordialement,\nL'équipe Ilink.";
        $from = "noreply@ilink.com";
        $headers = "From:" . $from;
        if ($db->isPhoneExisted($phone, $category)) {

            $user = $db->forgotPassword($phone, $encrypted_password, $salt);
            if ($user) {
                

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
                    $response["success"] = 1;

                    echo json_encode($response);

                } 

            } else {
                $response["error"] = 1;
                $response["error_msg"] = "la modification du mot de passe a échouée!";
                echo json_encode($response);

            }


            


        } else {

            $response["error"] = 2;
            $response["error_msg"] = "L'utilisateur n'existe pas!";
            echo json_encode($response);
            //echo "L'utilisateur n'existe pas";

        }
    } else if ($tag == 'chgpass_simple') {
        //Change Password Simple
        $phone = $request->phone;
        $newpassword = $request->password;


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

                    $response["success"] = 1;
                    echo json_encode($response);
                    //echo "success";
                }

            } else {
                $response["error"] = 1;
                $response["error_msg"] = "la modification du mot de passe a échouée!";
                echo json_encode($response);
            }


            // user is already existed - error response


        } else {

            $response["error"] = 2;
            $response["error_msg"] = "L'utilisateur n'existe pas!";
            echo json_encode($response);

        }
    } else if ($tag == 'updateLocation') {
        // Update Location

        $latitude = $request->latitude;
        $longitude = $request->longitude;
        $phone = $request->phone;


        if ($db->isPhoneExistedSimple($phone)) {

            $user = $db->updateLocationSimple($phone, $latitude, $longitude);
            if ($user) {
                $response["success"] = 1;

                echo json_encode($response);
            } else {
                $response["error"] = 1;
                $response["error_msg"] = "La position n'a pas pu être mise à jour!";
                
                echo json_encode($response);
            }


            // user is already existed - error response


        } else {

            $response["error"] = 1;
            $response["error_msg"] = "L'utilisateur n'existe pas!";
            echo json_encode($response);

        }


    } else if ($tag == 'forpass_simple') {
                
        
        if($request->forgotpassword) {
            
                    $forgotpassword = $request->forgotpassword;

        $randomcode = $db->random_string();


        $hash = $db->hashSSHA($randomcode);
        $encrypted_password = $hash["encrypted"]; // encrypted password
        $salt = $hash["salt"];
        $subject = "Password Recovery";
        $message = "Salut cher membre,\n\nVotre mot de passe a été changé avec succès. Votre nouveau mot de passe est $randomcode . Connectez vous avec votre nouveau mot de passe.\n\nCordialement,\nL'équipe Ilink'.";
        $from = "noreply@ilink-app.com";
        $headers = "From:" . $from;
        if ($db->isPhoneExistedSimple($forgotpassword)) {

            $user = $db->forgotPasswordSimple($forgotpassword, $encrypted_password, $salt);
            
            if ($user) {
                $mail = $db->getEmailSimple($phone);
                
                if($mail){
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
                $response["success"] = 1;
                echo json_encode($response);
                }
                
                
            } else {
                $response["error"] = 1;
                $response["error_msg"] = "La modification du mot de passe a échouée!";
                echo json_encode($response);
            }


            // user is already existed - error response


        } else {

            $response["error"] = 1;
            $response["error_msg"] = "L'utilisateur n'existe pas";
            echo json_encode($response);

        }
            
        } else {
            $response["error"] = 1;
            $response["error_msg"] = "no number sent!";
            echo json_encode($response);
            
        }


    } else if ($tag == 'forpass') {
        
        if($request->forgotpassword) {
            
            $forgotpassword = $request->forgotpassword;

        $randomcode = $db->random_string();


        $hash = $db->hashSSHA($randomcode);
        $encrypted_password = $hash["encrypted"]; // encrypted password
        $salt = $hash["salt"];
        $subject = "Password Recovery";
        $message = "Salut cher membre,\n\nVotre mot de passe a été changé avec succès. Votre nouveau mot de passe est $randomcode . Connectez vous avec votre nouveau mot de passe.\n\nCordialement,\nL'équipe Ilink'.";
        $from = "noreply@ilink-app.com";
        $headers = "From:" . $from;
        if ($db->isPhoneExisted($forgotpassword)) {

            $user = $db->forgotPassword($forgotpassword, $encrypted_password, $salt);
            
            if ($user) {
                $mail = $db->getEmail($phone);
                
                if($mail){
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
                $response["success"] = 1;
                $response["message"] = "le message vous a été envoyé";
                echo json_encode($response);
                    
                }
                
                
            } else {
                $response["error"] = 1;
                $response["error_msg"] = "La modification du mot de passe a échouée!";
                echo json_encode($response);
            }


            // user is already existed - error response


        } else {

            $response["error"] = 1;
            $response["error_msg"] = "L'utilisateur n'existe pas";
            echo json_encode($response);

        }

            
        } else {
            $response["error"] = 1;
            $response["error_msg"] = "no number sent!";
            echo json_encode($response);
            
        }
        
    } else if ($tag == 'register') {
        // Request type is Register new user
        $fname = $request->firstname;
        $lname = $request->lastname;
        $email = $request->email;
        $phone = $request->phone;
        $password = $request->password;
        $country = $request->country_code;
        $network = $request->network;
        $latitude = "0";
        $longitude = "0";
        $member = "0";
        $category = $request->category;
        $validate = $request->active;


        // check if user is already existed
        // check if user is already existed
        if ($db->isPhoneExistedSimple($phone)) {
            // user is already existed - error response
            $response["error"] = 1;
            $response["error_msg"] = "le numero de telephone existe deja";
            echo json_encode($response);
        } else {
            // store user
            $user = $db->storeUserSimple($fname, $lname, $email, $phone, $password, $country, $network, $member, $category, $latitude, $longitude, $validate);
            if ($user) {
                // user stored successfully
                $response["success"] = 1;
                $response["user"]["fname"] = $user["firstname"];
                $response["user"]["lname"] = $user["lastname"];
                $response["user"]["email"] = $user["email"];
                $response["user"]["uid"] = $user["unique_id"];
                $response["user"]["created_at"] = $user["created_at"];
                $validation = $user["validation_code"];


                $subject = "Bienvenue sur Ilink";
                $message = "Salut,\n\nVotre compte vient d'etre crée.\nVotre identifiant : $phone \nVotre mot de passe : $password\nVotre code de validation : $validation\nPays : $country \n\nCordialement,\nL'équipe Ilink.";
                $from = "noreply@ilink.com";
                $headers = "From:" . $from;
                $name = "ilink";
                mail($email, $subject, $message, $headers);

                echo json_encode($response);
            } else {
                // user failed to store
                $response["error"] = 1;
                $response["error_msg"] = "Une erreur s'est produite lors de l'enregistrement de l'utilisateur!";
                echo json_encode($response);

            }


        }
        
    } else if ($tag == 'register_geolocated') {
        // Register Geolocated
        // Request type is Register new user
        $fname = $request->firstname;
        $lname = $request->lastname;
        $email = $request->email;
        $phone = $request->phone;
        $password = $request->password;
        $country = $request->country_code;
        $network = $request->network;
        $latitude = $request->latitude;
        $longitude = $request->longitude;
        $member = $request->member;
        $category = $request->category;
        $validate = $request->active;
        $nombre_codes = "2";


        // check if user is already existed
        if ($db->isPhoneExisted($phone, $category)) {
            // user is already existed - error response
            $response["error"] = 1;
            $response["error_msg"] = "le numero de telephone existe deja";
            echo json_encode($response);
        } else {

            // Verifie que le code membre existe
            $membercodetest = $db->isMemberCodeExisted($member, $nombre_codes, $phone);
            if ($membercodetest) {

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

                    $from = "noreply@ilink-app.com";
                    $headers = "From:" . $from;
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


                        $response["success"] = 1;


                        echo json_encode($response);
                    } else if ($code_verification == "super") {
                        /*
                        $z = $db->validateNumberSupervisor($phone);
                        if (isset($z['validation_code'])) {


                            $username = $z['lastname'];
                            $validation_code = $z['validation_code'];
                            $country = $z['country_code'];
                            $email = $z['email'];
                            $member_code = $z['member_code'];
                            $subject = "Bienvenue sur Ilink";
                            $message3 = "Salut $username,\n\nVotre compte vient d'etre crée.\nVotre identifiant : $phone \nVotre mot de passe : celui que vous avez choisi pendant votre inscription\nVotre code de validation : $validation_code\nVotre code membre est : $member_code\nPays : $country \n\nCordialement,\nEquipe Ilink.";
                            $from = "noreply@ilink-app.com";
                            $headers = "From:" . $from;
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


                            $response["success"] = 1;


                            echo json_encode($response);
                        } else {
                          $response["error"] = 1;
                          $response["error_msg"] = "le numero ne peut être accepte";
                          echo json_encode($response);
                        }
                        */
                        
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


                        $response["success"] = 1;


                        echo json_encode($response);
                        
                        
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
                            $from = "noreply@ilink-app.com";
                            $headers = "From:" . $from;
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


                            $response["success"] = 1;


                            echo json_encode($response);
                        } else {
                          $response["error"] = 1;
                          $response["error_msg"] = "le numero ne peut être accepte";
                          echo json_encode($response);
                        }


                    }

                    //mail($email,$subject,$message2,$headers);

                    //smtpmailer($email,$from,$name,$subject,$message);
                    //echo json_encode($response);

                } else {
                    // user failed to store
                    $response["error"] = 1;
                    $response["error_msg"] = "Une erreur s'est produite lors de l'enregistrement!";
                    echo json_encode($response);

                }
            } else {
                // user is already existed - error response
                $response["error"] = 1;
                $response["error_msg"] = "le code membre $member n'existe pas. Detail de l'erreur : " . $membercodetest;
                echo json_encode($response);
            }

        }


    } else {
        $response["error"] = 1;
        $response["error_msg"] = "L'opération n'est pas reconnue par Ilink!";
        echo json_encode($response);
    }

} else {

    $response["error"] = 1;
    $response["error_msg"] = "Aucun tag n'a été envoyé!";
    echo json_encode($response);

}

?>
