<?php

$host='localhost';
$uname='ilink';
$pwd='ilink2016GA';
$db="ilink";

$con = mysqli_connect($host,$uname,$pwd,$db) or die("connection failed");
//mysql_select_db($db,$con) or die("db selection failed");

$phone = $_POST['phone'];
$codes = $_POST['nbre_code'];
$category = $_POST['categorie'];
$codes_superviseur = $_POST['nbre_code_superviseur'];
$validation = $_POST['validate'];
$code_membre = $_POST['code_membre'];
$mbr_reseau = "";
$mbr_ss_reseau = "";


//$id=$_POST['id'];
//$r=mysqli_query($con,"UPDATE users SET active = '$validation' WHERE phone = '$phone'");

if ($category == "geolocated") {


        $r=mysqli_query($con,"UPDATE users SET active = '$validation' WHERE phone = '$phone'");

    if ($r) {

        echo "success";

    } else {
        echo "failure Phone : $phone code : $codes categorie : $category code superviseur : $codes_superviseur Validation : $validation code membre : $code_membre";

    }


} else if ($category == "hyper") {
    if ($codes == "0") {

        $r=mysqli_query($con,"UPDATE users SET active = '$validation', mbre_reseau = '$codes', mbre_ss_reseau = '$codes_superviseur', code_parrain = '$code_membre', member_code = '$code_membe' WHERE phone = '$phone'");

        if ($r) {

            echo "success";

        } else {
            echo "failure Phone : $phone code : $codes categorie : $category code superviseur : $codes_superviseur Validation : $validation code membre : $code_membre";

        }

    } else {
        $r=mysqli_query($con,"UPDATE users SET active = '$validation', mbre_reseau = '$codes', mbre_ss_reseau = '$codes_superviseur', code_parrain = '$code_membre', member_code = '$code_membre' WHERE phone = '$phone'");

        $s=mysqli_query($con,"UPDATE codemembre SET nbrecode = '$codes' WHERE phone = '$phone'");

        $code_int = intval($codes);

        for ($i = 0; $i < $code_int; $i++) {

            $code_final = randomString();
            $statut = "0";
            $insert_code = mysqli_query($con,"INSERT INTO codeGenerer(CodeID ,CodeAssoc, Statut) VALUES( '$code_membre','$code_final', '$statut')");


        }

        if ($r && $s ) {

            echo "success";

        }
        else
        {
            echo "failure Phone : $phone code : $codes categorie : $category code superviseur : $codes_superviseur Validation : $validation code membre : $code_membre";

        }

    }

} else if ($category == "super") {
    $r=mysqli_query($con,"UPDATE users SET active = '$validation' WHERE phone = '$phone'");

    if ($r) {

        echo "success";

    } else {
        echo "failure Phone : $phone code : $codes categorie : $category code superviseur : $codes_superviseur Validation : $validation code membre : $code_membre";

    }


} else {
    echo "failure Phone : $phone code : $codes categorie : $category code superviseur : $codes_superviseur Validation : $validation code membre : $code_membre";

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