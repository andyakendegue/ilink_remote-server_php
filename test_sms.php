<?php
/**
 * Created by PhpStorm.
 * User: capp
 * Date: 05/10/2016
 * Time: 13:36
 */

    /* Send an SMS using Twilio. You can run this file 3 different ways:
     *
     * 1. Save it as sendnotifications.php and at the command line, run
     *         php sendnotifications.php
     *
     * 2. Upload it to a web host and load mywebhost.com/sendnotifications.php
     *    in a web browser.
     *
     * 3. Download a local server like WAMP, MAMP or XAMPP. Point the web root
     *    directory to the folder containing this file, and load
     *    localhost:8888/sendnotifications.php in a web browser.
     */

    // Step 1: Get the Twilio-PHP library from twilio.com/docs/libraries/php,
    // following the instructions to install it with Composer.
    require_once "vendor/autoload.php";
    use Twilio\Rest\Client;

    // Step 2: set our AccountSid and AuthToken from https://twilio.com/console
    $AccountSid = "ACacdb9c9601741af001ebbc7eca4969cd";


    $AuthToken = "0aa2ed8f08775286180f8b40baaf57fb";


    // Step 3: instantiate a new Twilio Rest Client
    $client = new Client($AccountSid, $AuthToken);

    $sender_name = "Ilink";
    $sender_number = "+447400348273";

    // Step 4: make an array of people we know, to send them a message.
    // Feel free to change/add your own phone number and name here.
    $people = array(
        "+24105609191" => "Mr Jacques",
        "+24104645969" => "capp",
        "+24102874963" => "andy"

    );

    // Step 5: Loop over all our friends. $number is a phone number above, and
    // $name is the name next to it




    foreach ($people as $number => $name) {

        try {

            $sms = $client->account->messages->create(

            // the number we are sending to - Any phone number
                $number,

                array(
                    // Step 6: Change the 'From' number below to be a valid Twilio number
                    // that you've purchased
                    'from' => $sender_name,


                    // the sms body
                    'body' => "Hey $name, We are testing our Ilink SMS API!"
                )
            );

            // Display a confirmation message on the screen
            echo "Sent message to $name";

        } catch (Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), $e->getCode(), "\n";

            if($e->getCode()=="21662") {
                $sms = $client->account->messages->create(

                // the number we are sending to - Any phone number
                    $number,

                    array(
                        // Step 6: Change the 'From' number below to be a valid Twilio number
                        // that you've purchased
                        'from' => $sender_number,


                        // the sms body
                        'body' => "Hey $name, We are testing our Ilink SMS API!"
                    )
                );

                // Display a confirmation message on the screen
                echo "Sent message to $name";

            }

        }
    }


?>