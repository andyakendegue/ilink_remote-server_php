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
$validation = $request->active;

$r=mysqli_query($con,"UPDATE `users_simple` SET `active` = '$validation' WHERE `phone` = '$phone'");
if ($r) {
    
    $var1 = '{"success":1,"message":"User has been validated successfully !"}';

  echo json_encode($var1);

  } else {

    $var2 =  '{"error":1,"error_message":"User cannot be validated !"}';
  echo json_encode($var2);

  }







mysqli_close($con);
?>
