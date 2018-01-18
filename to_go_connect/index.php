<?php
//header('Content-type: application/json');

error_reporting(E_ALL);
ini_set('display_errors', 1);

$postdata = file_get_contents("php://input");
if(isset($postdata)) {
  $request = json_decode($postdata);
}


if (isset($request->tag) && $request->tag != "") {
  // Get tag
  $tag = $request->tag;


  // Include Database handler
  require_once 'DB_Functions.php';
  $db = new DB_Functions();
  // response Array
  $response = array("tag" => $tag, "success" => 0, "error" => 0);

  // check for tag type

  if ($tag == "login") {
    // Request type is check Login
    $username = $request->username;
    $password = $request->password;

    // check for user
    $user = $db->getUserByEmailAndPassword($username, $password);
    if ($user != false) {
      // user found
      // echo json with success = 1
      $response["success"] = 1;
      $response["user"]["id"] = $user["id"];
      $response["user"]["fname"] = $user["nom"];
      $response["user"]["lname"] = $user["prenom"];
      $response["user"]["email"] = $user["email"];
      $response["user"]["phone"] = $user["phone"];
      $response["user"]["sexe"] = $user["sexe"];
      $response["user"]["qr_code"] = $user["qr_code"];
      $response["user"]["image"] = $user["avatar"];
      $response["user"]["date_ajout"] = $user["date_ajout"];
      $response["user"]["date_modification"] = $user["date_modification"];

      echo json_encode($response);
      //echo "success";
    } else {
      // user not found
      // echo json with error = 1
      $response["error"] = 1;
      $response["error_msg"] = "Email ou Mot de passe incorrect!";
      echo json_encode($response);
      //echo "failure";

    }
  } else if ($tag == 'forpass'){
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
      mail($forgotpassword,$subject,$message,$headers);

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
  }
  else {
    $response["error"] = 1;
    echo json_encode($response);
  }


  // user is already existed - error response


}
else {

  $response["error"] = 2;
  $response["error_msg"] = "User not exist";
  echo json_encode($response);

}

} else if ($tag == 'register') {
  // Request type is Register new user
  $fname = $request->firstname;
  $lname = $request->lastname;
  $email = $request->email;
  $phone = $request->phone;
  $sexe = $request->sexe;
  $qr_code = file_get_contents('http://localhost:8000/utilisateurs/'.$fname.'/edit');
  $password = $request->password;
  $image = "c";



  // check if user is already existed
  // check if user is already existed
  if ($db->isUserExisted($email)) {
    // user is already existed - error response
    $response["error"] = 2;
    $response["error_msg"] = "User already existed";
    echo json_encode($response);
    //echo "le numero de telephone existe deja";
  } else {
    // store user
    $user = $db->storeUser($fname, $lname, $email, $phone, $sexe, $image, $password, $qr_code);
    if ($user) {
      // user stored successfully
      $response["success"] = 1;
      $response["user"]["fname"] = $user["nom"];
      $response["user"]["lname"] = $user["prenom"];
      $response["user"]["email"] = $user["email"];
      $response["user"]["phone"] = $user["phone"];
      $response["user"]["sexe"] = $user["sexe"];
      $response["user"]["image"] = $user["avatar"];
      $response["user"]["date_ajout"] = $user["date_ajout"];
      $response["user"]["date_modification"] = $user["date_modification"];


      /*$subject = "Bienvenue sur Ilink";
      $message = "Salut,\n\nVotre compte vient d'etre crée.\nVotre identifiant : $phone \nVotre mot de passe : $password\nVotre code de validation : $validation\nPays : $country \n\nCordialement,\nEquipe Ilink.";
      $from = "contact@ilink.com";
      $headers = "De:" . $from;
      $name = "ilink";
      mail($email,$subject,$message,$headers);
      */


      //smtpmailer($email,$from,$name,$subject,$message);
      echo json_encode($response);

    } else {
      // user failed to store
      $response["error"] = 1;
      $response["error_msg"] = "JSON Error occured in Registartion";
      echo json_encode($response);


    }


  }
} else if ($tag == 'message') {
  // Request type is Register new user
  $message = $request->message;
  $email = $request->email;
  $id = $request->id;




    // store user
    $message = $db->storeMessage($message, $email, $id);
    if ($message) {
      // user stored successfully
      $response["success"] = 1;
      $response["message"] = "Votre message a bien été reçu !";


      /*$subject = "Bienvenue sur Ilink";
      $message = "Salut,\n\nVotre compte vient d'etre crée.\nVotre identifiant : $phone \nVotre mot de passe : $password\nVotre code de validation : $validation\nPays : $country \n\nCordialement,\nEquipe Ilink.";
      $from = "contact@ilink.com";
      $headers = "De:" . $from;
      $name = "ilink";
      mail($email,$subject,$message,$headers);
      */


      //smtpmailer($email,$from,$name,$subject,$message);
      echo json_encode($response);

    } else {
      // user failed to store
      $response["error"] = 1;
      $response["error_msg"] = "JSON Error occured in Registartion";
      echo json_encode($response);


    }



}else if ($tag == 'info') {
  // Request type is Register new user
  $fname = $request->firstname;
  $lname = $request->lastname;
  $email = $request->email;
  $phone = $request->phone;
  $sexe = $request->sexe;
  $password = $request->password;
  $image = "c";



  // check if user is already existed
  // check if user is already existed
  if ($db->isUserExisted($email)) {
    // user is already existed - error response
    $response["error"] = 2;
    $response["error_msg"] = "User already existed";
    echo json_encode($response);
    //echo "le numero de telephone existe deja";
  } else {
    // store user
    $user = $db->storeUser($fname, $lname, $email, $phone, $sexe, $image, $password);
    if ($user) {
      // user stored successfully
      $response["success"] = 1;
      $response["user"]["fname"] = $user["nom"];
      $response["user"]["lname"] = $user["prenom"];
      $response["user"]["email"] = $user["email"];
      $response["user"]["phone"] = $user["phone"];
      $response["user"]["sexe"] = $user["sexe"];
      $response["user"]["image"] = $user["avatar"];
      $response["user"]["date_ajout"] = $user["date_ajout"];
      $response["user"]["date_modification"] = $user["date_modification"];


      /*$subject = "Bienvenue sur Ilink";
      $message = "Salut,\n\nVotre compte vient d'etre crée.\nVotre identifiant : $phone \nVotre mot de passe : $password\nVotre code de validation : $validation\nPays : $country \n\nCordialement,\nEquipe Ilink.";
      $from = "contact@ilink.com";
      $headers = "De:" . $from;
      $name = "ilink";
      mail($email,$subject,$message,$headers);
      */


      //smtpmailer($email,$from,$name,$subject,$message);
      echo json_encode($response);

    } else {
      // user failed to store
      $response["error"] = 1;
      $response["error_msg"] = "JSON Error occured in Registartion";
      echo json_encode($response);


    }


  }
} else if ($tag == 'commande') {
  // Request type is Register new user
  $id_restaurant = $request->id_restaurant;
  $id_client = $request->id_client;
  $article = $request->article;
  $montant = $request->montant;
  $statut = $request->statut;




    // store user
    $commande = $db->storeCommande($id_restaurant, $id_client, $article, $montant, $statut);
    if ($commande) {
      // user stored successfully
      $response["success"] = 1;
      $response["message"] = "la commande a bien été enregistrée";


      /*$subject = "Bienvenue sur Ilink";
      $message = "Salut,\n\nVotre compte vient d'etre crée.\nVotre identifiant : $phone \nVotre mot de passe : $password\nVotre code de validation : $validation\nPays : $country \n\nCordialement,\nEquipe Ilink.";
      $from = "contact@ilink.com";
      $headers = "De:" . $from;
      $name = "ilink";
      mail($email,$subject,$message,$headers);
      */


      //smtpmailer($email,$from,$name,$subject,$message);
      echo json_encode($response);

    } else {
      // user failed to store
      $response["error"] = 1;
      $response["error_msg"] = "JSON Error occured in Registartion";
      echo json_encode($response);


    }



} else {
  echo '{"error":1, "error_msg":"Invalid Data."}';
  }

}
else {
  $response["error"] = 1;
  $response["error_msg"] = "No Tag sent";
  echo json_encode($response);
}




?>
