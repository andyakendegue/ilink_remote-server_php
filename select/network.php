<?php
/**
 * Created by PhpStorm.
 * User: capp
 * Date: 09/08/2016
 * Time: 13:48
 */

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

$postdata = file_get_contents("php://input");

if(isset($postdata)) {
  
    $request = json_decode($postdata);
}

$country = $request->country_code;

$con = mysqli_connect($host,$uname,$pwd,$db) or die("connection failed");

$r=mysqli_query($con,"select * from network where `Reseau` = '$country'");

while($row=mysqli_fetch_array($r, MYSQLI_ASSOC )) {

    $rows[] = $row;

}

echo json_encode($rows);
mysqli_close($con);
