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
/*
$host='localhost';
$uname='ilink';
$pwd='ilink2016GA';
$db="ilink";
*/
$postdata = file_get_contents("php://input");
if(isset($postdata)) {
    $request = json_decode($postdata);
}
$host='localhost';
$uname='root';
$pwd='vps@2017GA';
$db="ilink";

$con = mysqli_connect($host,$uname,$pwd,$db) or die("connection failed");
//mysql_select_db($db,$con) or die("db selection failed");

$phone = $request->phone;
$ouvert = $request->ouvert;



//$id=$_POST['id'];
$r=mysqli_query($con,"UPDATE `users` SET `ouvert` = '$ouvert' WHERE `phone` = '$phone'");
if ($r) {


$response["success"] = 1;
            $response["message"] = "Success";

            echo json_encode($response);
          

} else {


    $response["error"] = 1;
            $response["error_msg"] = "Failure";
            echo json_encode($response);
}






mysqli_close($con);
?>
