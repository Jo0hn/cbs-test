<?php
    $path = preg_replace( '/wp-content.*$/', '', __DIR__ );
    require_once( $path . 'wp-load.php' );
    require_once ("messages.php");
    require_once ("access.php");
    //twilio library
    require __DIR__ . '/twilio-php-main/src/Twilio/autoload.php';
    use Twilio\Rest\Client;
    //validate the submission of the form
    if(isset($_POST['btnguardar'])){
        if($_POST["phoneNumber"] != "" AND $_POST["message"] != ""){
               
                function validate_number($phone_number){
                    if(preg_match('/^\\+?[1-9][0-9]{7,14}$/', $phone_number)) {
                        // the format /^[0-9]{11}+$/ will check for phone number with 11 digits and only numbers
                        return true;
                    }
                }      
                if(validate_number($_POST["phoneNumber"])==TRUE){
                    $messages = new Messages($_POST["phoneNumber"],$_POST["message"]); 
                    $sid="AC5a4daf05438bf525d822fd756ac2995a";
                    $access = new Access($sid); 
                    $accessResponse = $access->validateAccess();
                    $idMessage = $messages->saveMessage();
                    $error=0;
                    // Your Account SID and Auth Token from twilio.com/console
                    $sid = $accessResponse->sid;
                    $token = $accessResponse->token;
                    $client = new Client($sid, $token);
                    try{
                        // Use the client to do fun stuff like send text messages!
                        $confirmationCode = $client->messages->create(
                            // the number you'd like to send the message to
                            $_POST["phoneNumber"],
                            [
                                // A Twilio phone number you purchased at twilio.com/console
                                'from' => '+18309994496',
                                // the body of the text message you'd like to send
                                'body' =>  $_POST["message"]
                            ]
                        );
                        $status = $confirmationCode->status;
                    } catch (Exception $e){
                        $status = $e->getMessage();
                        $error=1;
                    }
                    
                    $messages->sendMessage($idMessage, $status);
                    if($error=0){
                        header("Location: ".site_url()."/message?res=1");    
                    }elseif($error=1){
                        header("Location: ".site_url()."/message?res=6");  
                    }
                    
                }else{
                    header("Location: ".site_url()."/message?res=4");  
                }        
        }else{
            header("Location: ".site_url()."/message?res=3");   
        }
        
    }
?>