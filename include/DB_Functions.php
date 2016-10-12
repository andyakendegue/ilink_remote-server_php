<?php

class DB_Functions {

    private $db;

    //put your code here
    // constructor
    function __construct() {
        require_once 'DB_Connect.php';
        // connecting to database
        $this->db = new DB_Connect();
        $this->db->connect();
    }

    // destructor
    function __destruct() {
        
    }


    /**
     * Random string which is sent by mail to reset password
     */

public function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
public function random_string()
{
    $character_set_array = array();
    $character_set_array[] = array('count' => 7, 'characters' => 'abcdefghijklmnopqrstuvwxyz');
    $character_set_array[] = array('count' => 1, 'characters' => '0123456789');
    $temp_array = array();
    foreach ($character_set_array as $character_set) {
        for ($i = 0; $i < $character_set['count']; $i++) {
            $temp_array[] = $character_set['characters'][rand(0, strlen($character_set['characters']) - 1)];
        }
    }
    shuffle($temp_array);
    return implode('', $temp_array);
}

/// Forget Password Geolocated

public function forgotPassword($forgotpassword, $newpassword, $salt){
    require_once 'include/config.php';
        // connecting to mysql

$con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD,DB_DATABASE);
	$result = mysqli_query($con,"UPDATE `users` SET `encrypted_password` = '$newpassword',`salt` = '$salt' WHERE `phone` = '$forgotpassword'");

if ($result) {
 
return true;

}
else
{
return false;
}

}

/// Forget Password Simple users

public function forgotPasswordSimple($phone, $encrypted_password, $salt){
    require_once 'include/config.php';
        // connecting to mysql

$con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD,DB_DATABASE);
$result = mysqli_query($con,"UPDATE `users_simple` SET `encrypted_password` = '$encrypted_password',`salt` = '$salt' WHERE `phone` = '$phone'");

if ($result) {
 
return true;

}
else
{
return false;
}

}

/// Get Email of user from phone

public function getEmail($phone){
    require_once 'include/config.php';
        // connecting to mysql

$con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD,DB_DATABASE);
	$result = mysqli_query($con,"SELECT email FROM users WHERE phone = '$phone'");

if ($result) {
 return mysqli_fetch_array($result);
//return true;

}
else
{
return false;
}

}

/// Get Email of user from phone

public function getEmailSimple($phone){
    require_once 'include/config.php';
        // connecting to mysql

$con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD,DB_DATABASE);
	$result = mysqli_query($con,"SELECT email FROM users_simple WHERE phone = '$phone'");

if ($result) {
 return mysqli_fetch_array($result);
//return true;

}
else
{
return false;
}

}


/// Update Geolocated User Location
public function updateLocation($phone, $latitude, $longitude){
    require_once 'include/config.php';
        // connecting to mysql

$con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD,DB_DATABASE);
	$result = mysqli_query($con,"UPDATE `users` SET `latitude` = '$latitude',`longitude` = '$longitude' WHERE `phone` = '$phone'");

if ($result) {
 
return true;

}
else
{
return false;
}

}
/// Update Simple User Location
public function updateLocationSimple($phone, $latitude, $longitude){
    require_once 'include/config.php';
        // connecting to mysql

$con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD,DB_DATABASE);
	$result = mysqli_query($con,"UPDATE `users_simple` SET `latitude` = '$latitude',`longitude` = '$longitude' WHERE `phone` = '$phone'");

if ($result) {
 
return true;

}
else
{
return false;
}

}
/**
     * Adding new user to mysqli database
     * returns user details
     */

    public function storeUserSimple($fname, $lname, $email, $phone, $password, $country, $network, $member,$category,$latitude,$longitude,$validate) {
        $uuid = uniqid('', true);
        $balance =0;
        $hash = $this->hashSSHA($password);
        $encrypted_password = $hash["encrypted"]; // encrypted password
        $salt = $hash["salt"]; // salt
        //$validation_code = generateRandomString();
        $validation_code = $this->random_string();
            require_once 'include/config.php';
        // connecting to mysql

$con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD,DB_DATABASE);
                
        $result = mysqli_query($con,"INSERT INTO users_simple(unique_id, firstname, lastname, phone, country_code, network, member_code, email, category, balance, latitude, longitude, encrypted_password, salt, validation_code, active, created_at) VALUES('$uuid', '$fname', '$lname', '$phone','$country','$network','$member', '$email','$category','$balance','$latitude','$longitude', '$encrypted_password', '$salt', '$validation_code','$validate', NOW())");
        // check for successful store
        if ($result) {
            // get user details 
            $uid = mysqli_insert_id($con); // last inserted id
            $result = mysqli_query($con,"SELECT * FROM users_simple WHERE uid = $uid");
            // return user details
            return mysqli_fetch_array($result);
        } else {
            return false;
        }
    }
    
    /**
     * Adding new user to mysqli database
     * returns user details
     */

    public function storeUser($fname, $lname, $email, $phone, $password, $country, $network, $member,$category,$latitude,$longitude,$validate) {
        $uuid = uniqid('', true);
        $balance =0;
        $hash = $this->hashSSHA($password);
        $encrypted_password = $hash["encrypted"]; // encrypted password
        $salt = $hash["salt"]; // salt
        //$validation_code = generateRandomString();
        $validation_code = $this->random_string();
            require_once 'include/config.php';
        // connecting to mysql

$con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD,DB_DATABASE);
                
        $result = mysqli_query($con,"INSERT INTO users(unique_id, firstname, lastname, phone, country_code, network, member_code, email, category, balance, latitude, longitude, encrypted_password, salt, validation_code, active, created_at) VALUES('$uuid', '$fname', '$lname', '$phone','$country','$network','$member', '$email','$category','$balance','$latitude','$longitude', '$encrypted_password', '$salt', '$validation_code','$validate', NOW())");
        // check for successful store
        if ($result) {
            // get user details 
            $uid = mysqli_insert_id($con); // last inserted id
            $result = mysqli_query($con,"SELECT * FROM users WHERE uid = $uid");
            // return user details
            return mysqli_fetch_array($result);
        } else {
            return false;
        }
    }
    
    /**
     * Adding new supervisor demand to mysqli database
     * returns user details
     */

    public function storeDemand($phone, $membres, $categorie) {
    
    $statut = "en cours";
        
        
            require_once 'include/config.php';
        // connecting to mysql

$con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD,DB_DATABASE);
                
        $result = mysqli_query($con,"INSERT INTO demande_superviseur(categorie, nbrecode, phone, statut) VALUES('$categorie', '$membres', '$phone', '$statut')");
        // check for successful store
        if ($result) {
            // get user details 
            //$uid = mysqli_insert_id($con); // last inserted id
            //$result = mysqli_query($con,"SELECT * FROM users WHERE uid = $uid");
            // return user details
            //return mysqli_fetch_array($result);
            echo "success";
        } else {
            return false;
        }
    }


    /**
     * Verifies user by email and password
     */
    public function getUserByEmailAndPassword($email, $password) {
        require_once 'include/config.php';
        // connecting to mysql

$con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD,DB_DATABASE);
        $result = mysqli_query($con,"SELECT * FROM users WHERE email = '$email'") or die(mysqli_error());
        // check for result 
        $no_of_rows = mysqli_num_rows($result);
        if ($no_of_rows > 0) {
            $result = mysqli_fetch_array($result);
            $salt = $result['salt'];
            $encrypted_password = $result['encrypted_password'];
            $hash = $this->checkhashSSHA($salt, $password);
            // check for password equality
            if ($encrypted_password == $hash) {
                // user authentication details are correct
                return $result;
            }
        } else {
            // user not found
            return false;
        }
    }
    
     /**
     * Verifies user by phone and password
     */
    public function getUserByPhoneAndPasswordSimple($phone, $password) {
        require_once 'include/config.php';
        // connecting to mysql

$con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD,DB_DATABASE);
        $result = mysqli_query($con,"SELECT * FROM users_simple WHERE phone = '$phone'") or die(mysqli_error());
        // check for result 
        $no_of_rows = mysqli_num_rows($result);
        if ($no_of_rows > 0) {
            $result = mysqli_fetch_array($result);
            $salt = $result['salt'];
            $encrypted_password = $result['encrypted_password'];
            $hash = $this->checkhashSSHA($salt, $password);
            // check for password equality
            if ($encrypted_password == $hash) {
                // user authentication details are correct
                return $result;
            }
        } else {
            // user not found
            return false;
        }
    }
     /**
     * Verifies user by phone and password
     */
    public function getUserByPhoneAndPasswordGeolocated($phone, $password) {
        require_once 'include/config.php';
        // connecting to mysql

$con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD,DB_DATABASE);
        $result = mysqli_query($con,"SELECT * FROM users WHERE phone = '$phone'") or die(mysqli_error());
        // check for result 
        $no_of_rows = mysqli_num_rows($result);
        if ($no_of_rows > 0) {
            $result = mysqli_fetch_array($result);
            $salt = $result['salt'];
            $encrypted_password = $result['encrypted_password'];
            $hash = $this->checkhashSSHA($salt, $password);
            // check for password equality
            if ($encrypted_password == $hash) {
                // user authentication details are correct
                return $result;
            }
        } else {
            // user not found
            return false;
        }
    }
    /**
     * Get Locations
     */
    
    public function getLocationByEmailAndPassword($email, $password) {
        require_once 'include/config.php';
        // connecting to mysql

$con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD,DB_DATABASE);
        $result = mysqli_query($con,"SELECT * FROM users WHERE email = '$email'") or die(mysqli_error());
        // check for result 
        $no_of_rows = mysqli_num_rows($result);
        if ($no_of_rows > 0) {
            $result = mysqli_fetch_array($result);
            $salt = $result['salt'];
            $encrypted_password = $result['encrypted_password'];
            $hash = $this->checkhashSSHA($salt, $password);

            // check for password equality
            if ($encrypted_password == $hash) {
                // user authentication details are correct
                return $result;
            }
        } else {
            // user not found
            return false;
        }
    }

 
 /**
     * Check user is existed or not
     */
    public function isUserExisted($email) {
        require_once 'include/config.php';
        // connecting to mysql

$con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD,DB_DATABASE);
        $result = mysqli_query($con,"SELECT email from users WHERE email = '$email'");
        $no_of_rows = mysqli_num_rows($result);
        if ($no_of_rows > 0) {
            // user existed 
            return true;
        } else {
            // user not existed
            return false;
        }
    }

/**
     * Check user is existed or not
     */
    public function isPhoneExistedSimple($phone) {
        require_once 'include/config.php';
        // connecting to mysql

$con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD,DB_DATABASE);
        $result = mysqli_query($con,"SELECT phone from users_simple WHERE phone = '$phone'");
        $no_of_rows = mysqli_num_rows($result);
        if ($no_of_rows > 0) {
            // user existed 
            return true;
        } else {
            // user not existed
            return false;
        }
    }
    /**
     * Check user is existed or not
     */
    public function isPhoneExisted($phone,$category) {
        require_once 'include/config.php';
        // connecting to mysql

$con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD,DB_DATABASE);
        $result = mysqli_query($con,"SELECT phone from users WHERE phone = '$phone' AND category = '$category' ");
        $no_of_rows = mysqli_num_rows($result);
        if ($no_of_rows > 0) {
            // user existed 
            return true;
        } else {
            // user not existed
            return false;
        }
    }
    
    /**
     * Check member code is existed or not
     */
    public function isMemberCodeExisted($membre, $nombre_codes, $phone) {
        require_once 'include/config.php';
        // connecting to mysql

        $con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD,DB_DATABASE);
        $result = mysqli_query($con,"SELECT * from codeGenerer WHERE CodeAssoc = '$membre'  ");
        $no_of_rows = mysqli_num_rows($result);
        if ($no_of_rows > 0) {
            // user existed 
            $result = mysqli_fetch_array($result);
            $code = $result['CodeID'];
            $statut = "1";

            //$maj = mysqli_query($con,"DELETE FROM codeGenerer  WHERE CodeAssoc = '$code'");
               if ($code=="HYPER"){
                    $categorie = "hyper";
                   $maj = mysqli_query($con,"UPDATE codeGenerer SET CodeID = '$membre',Statut = '$statut' WHERE CodeAssoc = '$membre'");

                   $maj2 = mysqli_query($con,"INSERT INTO codemembre(code ,categorie, nbrecode, phone) VALUES( '$membre','$categorie', '$nombre_codes', '$phone')");


                } else {
                   $result2 = mysqli_query($con,"SELECT * from codemembre WHERE code = '$membre'  ");
                   $no_of_rows2 = mysqli_num_rows($result2);
                   if($no_of_rows2 > 0){
                       $result2 = mysqli_fetch_array($result2);
                       $cat = $result2['categorie'];
                       $statut = "en cours";

                       if ($cat == "hyper") {
                           $categ = "super";
                           $res = mysqli_query($con,"SELECT * from users WHERE member_code = '$membre'  ");
                           $no_rows = mysqli_num_rows($res);

                           if($no_rows > 0){
                               $res = mysqli_fetch_array($res);
                               $mbre = $res['mbre_ss_reseau'];
                           }


                           $maj = mysqli_query($con,"INSERT INTO demande_superviseur(categorie, code, nbrecode, phone, statut) VALUES('$categ', '$membre','$mbre', '$phone', '$statut')");

                           $maj2 = "ok";



                       } else if($cat == "super") {
                           $categ = "geolocated";
                           $res = mysqli_query($con,"SELECT * from users WHERE member_code = '$membre'  ");
                           $no_rows = mysqli_num_rows($res);

                           if($no_rows > 0){
                               $res = mysqli_fetch_array($res);
                               $mbre = $res['mbre_reseau'];
                           }
                           $maj = mysqli_query($con,"INSERT INTO demande_superviseur(categorie, code, nbrecode, phone, statut) VALUES('$categ', '$membre','$mbre', '$phone', '$statut')");

                           $maj2 = "ok";
                       }



                   }


               }

            if($maj && $maj2) {
                return true;
            } else {
                return false;
            }



        } else {
            // user not existed
            return false;
        }
    }
    
        /**
     * Check Hyperviseur code is existed or not
     */
    public function isCodeExisted($phone_number,$member_code) {
        require_once 'include/config.php';
        // connecting to mysql

        $con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD,DB_DATABASE);
        $result = mysqli_query($con,"SELECT * from codemembre WHERE code = '$member_code'  ");
        $no_of_rows = mysqli_num_rows($result);
        if ($no_of_rows > 0) {
            // user existed 
            $result = mysqli_fetch_array($result);
            $code = $result['categorie'];
            $phone = $result['phone'];
            $hyper = "hyper";
            $super = "super";
            $geo = "geolocated";
            $aucun = "aucun";

            if ($phone != $phone_number) {

                Switch($code){
                    case "hyper":

                        $maj3 = mysqli_query($con,"UPDATE users SET category = '$super' WHERE phone = '$phone_number'");

                        return $super;
                        break;
                    case "super":
                        $maj3 = mysqli_query($con,"UPDATE users SET category = '$geo' WHERE phone = '$phone_number'");

                        return $geo;
                        break;
                    case "geolocated":
                        $maj3 = "ok";

                        return $aucun;
                        break;
                    default:
                        return $aucun;
                        break;


                }

            } else {

                $maj3 = mysqli_query($con,"UPDATE users SET category = '$hyper' WHERE phone = '$phone_number'");
                return $hyper;

            }



            
        } else {
            // user not existed
            return "aucun";
        }
    }

    /**
     * Check Hyperviseur code is existed or not
     */
    public function isMemberExisted($code) {
        require_once 'include/config.php';
        // connecting to mysql

        $con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD,DB_DATABASE);
        $result = mysqli_query($con,"SELECT * from codemembre WHERE code = '$code'  ");
        $no_of_rows = mysqli_num_rows($result);
        if ($no_of_rows > 0) {
            // user existed
            $result = mysqli_fetch_array($result);
            $code = $result['categorie'];
            $hyper = "hyper";
            $super = "super";
            $geo = "geolocated";

            Switch($code){
                case "hyper":
                    return $hyper;
                    break;
                case "super":
                    return $super;
                    break;
                default:
                    return $geo;
                    break;


            }


        } else {
            // user not existed
            return "aucun";
        }
    }
/// Update code member
    public function updateHyperMemberCode($phone, $categorie, $member_code, $nombre_codes){
        require_once 'include/config.php';
        // connecting to mysql

        $con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD,DB_DATABASE);
        $result = mysqli_query($con,"UPDATE `codeGenerer` SET `CodeID` = '$member_code',`Statut` = '1' WHERE `CodeAssoc` = '$member_code'");
        $resultats = mysqli_query($con,"INSERT INTO codemembre(code ,categorie, nbrecode, phone) VALUES( '$member_code','$categorie', '$nombre_codes', '$phone')");

        if ($result && $resultats) {

            return true;

        }
        else
        {
            return false;
        }

    }

    // update memeber code in generate table
    public function updateHyper ($code) {
        require_once 'include/config.php';
        // connecting to mysql

        $con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD,DB_DATABASE);
        $statut = "1";
        $resultats = mysqli_query($con,"UPDATE `codeGenerer` SET `CodeID` = '$code',`Statut` = '$statut' WHERE `CodeAssoc` = '$code'");
        if ($resultats) {

            return true;

        }
        else
        {
            return false;
        }
    }

    /**
     * Encrypting password
     * returns salt and encrypted password
     */
    public function hashSSHA($password) {

        $salt = sha1(rand());
        $salt = substr($salt, 0, 10);
        $encrypted = base64_encode(sha1($password . $salt, true) . $salt);
        $hash = array("salt" => $salt, "encrypted" => $encrypted);
        return $hash;
    }

    /**
     * Decrypting password
     * returns hash string
     */
    public function checkhashSSHA($salt, $password) {

        $hash = base64_encode(sha1($password . $salt, true) . $salt);

        return $hash;
    }

}

?>
