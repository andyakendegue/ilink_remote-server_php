<?php
/**
 * Created by PhpStorm.
 * User: capp
 * Date: 09/08/2016
 * Time: 13:48
 */


$host='localhost';
$uname='ilink';
$pwd='ilink2016GA';
$db="ilink";

$country = $_POST['country'];
$con = mysqli_connect($host,$uname,$pwd,$db) or die("connection failed");


//$id=$_POST['id'];
$r=mysqli_query($con,"select * from network where `Reseau` = '$country'");
while($row=mysqli_fetch_array($r, MYSQLI_ASSOC ))
{
    //$flag[name]=$row[name];
    if ($row!="" || !is_null($row)) {
        $rows[] = $row;
    }


    //print_r($rows);
}


print(json_encode($rows));
mysqli_close($con);
