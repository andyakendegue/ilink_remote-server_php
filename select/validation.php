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

$con = mysqli_connect($host,$uname,$pwd,$db) or die("connection failed");

$postdata = file_get_contents("php://input");

if(isset($postdata)) {

  $request = json_decode($postdata);

}

$phone = $request->phone;
$codes = $request->nbre_code;
$category = $request->category;
$codes_superviseur = $request->nbre_code_superviseur;
$validation = $request->active;
$code_membre = $request->code_membre;
$mbr_reseau = "";
$mbr_ss_reseau = "";



if ($category == "geolocated") {

  $r=mysqli_query($con,"UPDATE `users` SET `active` = '$validation' WHERE `phone` = '$phone'");

  if ($r) {

      $var1["success"] =1;
      $var1["message"] = "Geolocated user has been validated successfully !";
    echo json_encode($var1);

  } else {

        $var2["error"] = 1;
        $var2["error_msg"] = "Geolocated user cannot be validated !".mysqli_error($con);
        $var2["Phone"] = $phone;
        $var2["code"] = $codes;
        $var2["categorie"] = $category;
        $var2["code superviseur"] = $codes_superviseur;
        $var2["Validation"] = $validation;
        $var2["code_membre"] = $code_membre;
      
      echo json_encode($var2);

  }

} else if ($category == "hyper") {
  if ($codes == "0") {

    $r=mysqli_query($con,"UPDATE `users` SET `active = '$validation', `mbre_reseau` = '$codes_superviseur', `mbre_ss_reseau` = '$codes', `code_parrain` = '$code_membre', `member_code` = '$code_membe' WHERE `phone` = '$phone'");

    if ($r) {

            $var3["success"] =1;
      $var3["message"] = "User has been validated successfully !";
        echo json_encode($var3);

    } else {

        
        $var4["error"] = 1;
        $var4["error_msg"] = "User cannot be validated !".mysqli_error($con);
        $var4["Phone"] = $phone;
        $var4["code"] = $codes;
        $var4["categorie"] = $category;
        $var4["code superviseur"] = $codes_superviseur;
        $var4["Validation"] = $validation;
        $var4["code_membre"] = $code_membre;
        echo json_encode($var4);

    }

  } else {

    $r=mysqli_query($con,"UPDATE `users` SET `active` = '$validation', `mbre_reseau` = '$codes_superviseur', `mbre_ss_reseau` = '$codes', `code_parrain` = '$code_membre', `member_code` = '$code_membre' WHERE `phone` = '$phone'");

    $s=mysqli_query($con,"UPDATE `codemembre` SET `nbrecode` = '$codes' WHERE `phone` = '$phone'");

    $code_int = intval($codes);

    for ($i = 0; $i < $code_int; $i++) {

      $code_final = randomString();
      $statut = "0";
      $insert_code = mysqli_query($con,"INSERT INTO codeGenerer(CodeID ,CodeAssoc, Statut) VALUES( '$code_membre','$code_final', '$statut')");

    }

    if ($r && $s ) {

            $var5["success"] =1;
      $var5["message"] = "User has been validated successfully !";
        echo json_encode($var5);

    } else {

  
        
        $var6["error"] = 1;
        $var6["error_msg"] = "User cannot be validated !".mysqli_error($con);
        $var6["Phone"] = $phone;
        $var6["code"] = $codes;
        $var6["categorie"] = $category;
        $var6["code superviseur"] = $codes_superviseur;
        $var6["Validation"] = $validation;
        $var6["code_membre"] = $code_membre;
        
        echo json_encode($var6);
        

    }

  }

} else if ($category == "super") {

  $r=mysqli_query($con,"UPDATE `users` SET `active` = '$validation' WHERE `phone` = '$phone'");

  $code_int = intval($codes);
    

  for ($i = 0; $i < $code_int; $i++) {

    $code_final = randomString();
    $statut = "0";
    $insert_code = mysqli_query($con,"INSERT INTO codeGenerer(CodeID ,CodeAssoc, Statut) VALUES( '$code_membre','$code_final', '$statut')");

  }

  if ($r) {

    $var7["success"] =1;
      $var7["message"] = "User has been validated successfully !";
      echo json_encode($var7);

  } else {

      
        $var8["error"] = 1;
        $var8["error_msg"] = "User cannot be validated !".mysqli_error($con);
        $var8["Phone"] = $phone;
        $var8["code"] = $codes;
        $var8["categorie"] = $category;
        $var8["code superviseur"] = $codes_superviseur;
        $var8["Validation"] = $validation;
        $var8["code_membre"] = $code_membre;
      echo json_encode($var8);

  }

} else {


    
        $var9["error"] = 1;
        $var9["error_msg"] = "User cannot be validated !".mysqli_error($con);
    
        $var9["Phone"] = $phone;
        $var9["code"] = $codes;
        $var9["categorie"] = $category;
        $var9["code superviseur"] = $codes_superviseur;
        $var9["Validation"] = $validation;
        $var9["code_membre"] = $code_membre;
    echo json_encode($var9);

}

function randomString($length = 10) {

  $str = "";
  $characters = array_merge(range('A','Z'), range('a','z'), range('0','9'));
  $max = count($characters) - 1;

  for ($i = 0; $i < $length; $i++) {
    $rand = mt_rand(0, $max);
    $str .= $characters[$rand];
  }

  return $str;

}


mysqli_close($con);
?>
