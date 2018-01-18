<?php
// Step 1: Get the Twilio-PHP library from twilio.com/docs/libraries/php,
// following the instructions to install it with Composer.




class DB_Functions {

  private $db;



  //put your code here
  // constructor
  function __construct() {
    require_once 'DB_Connect.php';
    // connecting to database
    $this->db = new DB_Connect();
    $this->db->connect();
  }

  // destructor
  function __destruct() {

  }



  public function forgotPassword($forgotpassword, $newpassword, $salt){

    // connecting to mysql

    require_once 'config.php';
    $con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD,DB_DATABASE);
    $result = mysqli_query($con,"UPDATE `utilisateurs` SET `mdp` = '$newpassword',`phone` = '$salt' WHERE `email` = '$forgotpassword'");

    if ($result) {

      return true;

    }
    else
    {
      return false;
    }

  }

  public function storeUser($fname, $lname, $email, $phone, $sexe, $image, $password, $qr_code) {
    //$uuid = uniqid('', true);
    $hash = $this->hashSSHA($password);
    $encrypted_password = $hash["encrypted"]; // encrypted password
    $salt = $hash["salt"]; // salt

    // connecting to mysql
    require_once 'config.php';

    $con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD,DB_DATABASE);

    $result = mysqli_query($con,"INSERT INTO utilisateurs(nom, prenom, phone, email,  sexe, date_ajout, date_modification, qr_code, avatar, mdp, token ) VALUES( '$lname', '$fname',  '$phone','$email', '$sexe', NOW() , NOW(), '$qr_code', '$image', '$encrypted_password', '$salt')");
    // check for successful store
    if ($result) {
      // get user details
      $uid = mysqli_insert_id($con); // last inserted id
      $result = mysqli_query($con,"SELECT * FROM utilisateurs WHERE id = $uid");
      // return user details
      return mysqli_fetch_array($result);
    } else {
      return false;
    }
  }
  public function storeMessage($message, $email, $id) {


    // connecting to mysql
    require_once 'config.php';

    $con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD,DB_DATABASE);

    $result = mysqli_query($con,"INSERT INTO message(id_expediteur, email_expediteur, message, date ) VALUES( '$id', '$email',  '$message',  NOW())");
    // check for successful store
    if ($result) {
      // get user details
      $uid = mysqli_insert_id($con); // last inserted id
      $result = mysqli_query($con,"SELECT * FROM message WHERE id = $uid");
      // return user details
      return mysqli_fetch_array($result);
    } else {
      return false;
    }
  }

  public function storeCommande($id_restaurant, $id_client, $article, $montant, $statut) {


    // connecting to mysql
    require_once 'config.php';

    $con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD,DB_DATABASE);

    $result = mysqli_query($con,"INSERT INTO commandes(id_restaurant, id_client, article, montant, statut, date ) VALUES( '$id_restaurant', '$id_client', '$article', '$montant', '$statut',  NOW())");
    // check for successful store
    if ($result) {
      // get user details
      $uid = mysqli_insert_id($con); // last inserted id
      $result = mysqli_query($con,"SELECT * FROM commandes WHERE id = $uid");
      // return user details
      return mysqli_fetch_array($result);
    } else {
      return false;
    }
  }


  /**
  * Verifies user by email and password
  */
  public function getUserByEmailAndPassword($email, $password) {

    // connecting to mysql
    require_once 'config.php';

    $con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD,DB_DATABASE);
    $result = mysqli_query($con,"SELECT * FROM utilisateurs WHERE email = '$email'") or die(mysqli_error());
    // check for result
    $no_of_rows = mysqli_num_rows($result);
    if ($no_of_rows > 0) {
      $result = mysqli_fetch_array($result);
      $salt = $result['token'];
      $encrypted_password = $result['mdp'];
      $hash = $this->checkhashSSHA($salt, $password);
      // check for password equality
      if ($encrypted_password == $hash) {
        // user authentication details are correct
        return $result;
      }
    } else {
      // user not found
      return false;
    }
  }


    /**
    * Check user is existed or not
    */
    public function isUserExisted($email) {
      require_once 'config.php';
      // connecting to mysql

      require_once 'config.php';
      $con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD,DB_DATABASE);
      $result = mysqli_query($con,"SELECT email from utilisateurs WHERE email = '$email'");
      $no_of_rows = mysqli_num_rows($result);
      if ($no_of_rows > 0) {
        // user existed
        return true;
      } else {
        // user not existed
        return false;
      }
    }

  public function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
      $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
  }

  public function random_string()
  {
    $character_set_array = array();
    $character_set_array[] = array('count' => 7, 'characters' => 'abcdefghijklmnopqrstuvwxyz');
    $character_set_array[] = array('count' => 1, 'characters' => '0123456789');
    $temp_array = array();
    foreach ($character_set_array as $character_set) {
      for ($i = 0; $i < $character_set['count']; $i++) {
        $temp_array[] = $character_set['characters'][rand(0, strlen($character_set['characters']) - 1)];
      }
    }
    shuffle($temp_array);
    return implode('', $temp_array);
  }

  /**
  * Encrypting password
  * returns salt and encrypted password
  */
  public function hashSSHA($password) {
    $salt = sha1(rand());
    $salt = substr($salt, 0, 10);
    $encrypted = base64_encode(sha1($password . $salt, true) . $salt);
    $hash = array("salt" => $salt, "encrypted" => $encrypted);
    return $hash;
  }

  /**
  * Decrypting password
  * returns hash string
  */
  public function checkhashSSHA($salt, $password) {
    $hash = base64_encode(sha1($password . $salt, true) . $salt);
    return $hash;
  }

}

?>
