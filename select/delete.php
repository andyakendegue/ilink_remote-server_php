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

$r=mysqli_query($con,"DELETE FROM `users` WHERE `phone` = '$phone'");
$s=mysqli_query($con,"DELETE FROM `codemembre` WHERE `phone` = '$phone'");
$t=mysqli_query($con,"DELETE FROM `demande_superviseur` WHERE `phone` = '$phone'");

if ($r && $s && $t) {


    
    $response["success"] = 1;
            $response["message"] = "User has been deleted succesfully";

            echo json_encode($response);

            

} else {


    $response["error"] = 1;
            $response["error_msg"] = "User cannot be deleted";
            echo json_encode($response);

}

mysqli_close($con);
?>
