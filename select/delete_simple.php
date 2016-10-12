<?php

$host='localhost';
$uname='ilink';
$pwd='ilink2016GA';
$db="ilink";

$con = mysqli_connect($host,$uname,$pwd,$db) or die("connection failed");
//mysql_select_db($db,$con) or die("db selection failed");

$phone = $_POST['phone'];


//$id=$_POST['id'];
$r=mysqli_query($con,"DELETE FROM `users_simple` WHERE `phone` = '$phone'");
if ($r) {
 
echo "success";

}
else
{
echo "failure";
}
        





mysqli_close($con);
?>