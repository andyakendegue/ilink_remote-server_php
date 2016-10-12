<?php

$host='localhost';
$uname='ilink';
$pwd='ilink2016GA';
$db="ilink";

$con = mysqli_connect($host,$uname,$pwd,$db) or die("connection failed");
//mysql_select_db($db,$con) or die("db selection failed");

$phone = $_POST['phone'];




//$id=$_POST['id'];
$r=mysqli_query($con,"select * from users_simple WHERE phone = '$phone'");
while($row=mysqli_fetch_array($r, MYSQLI_ASSOC ))
{
        //$flag[name]=$row[name];
        $rows[] = $row; 
        //print_r($rows);
        }
        
print(json_encode($rows));

mysqli_close($con);
?>