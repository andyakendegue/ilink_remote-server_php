<?php

$host='localhost';
$uname='ilink';
$pwd='ilink2016GA';
$db="ilink";

$con = mysqli_connect($host,$uname,$pwd,$db) or die("connection failed");
//mysql_select_db($db,$con) or die("db selection failed");

$phone = $_POST['phone'];
$validation = $_POST['validate'];



//$id=$_POST['id'];
$r=mysqli_query($con,"UPDATE `users_simple` SET `active` = '$validation' WHERE `phone` = '$phone'");
if ($r) {
 
echo "success";

}
else
{
echo "failure";
}
        





mysqli_close($con);
?>