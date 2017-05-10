<?php
// Be sure to include the file you've just downloaded
require_once('AfricasTalkingGateway.php');
require_once('dbConnector.php');

// Specify your login credentials
$username   = "fixxit2";
$apikey     = "0a22fcb242bbcd3cd91891a92989277d060ab14a556da768a89c3a1803a994d5";

// Specify the numbers that you want to send to in a comma-separated list
// Please ensure you include the country code (+254 for Kenya in this case)



//1. Check if the user is in the db

$recipients = '+254707991991';


// And of course we want our recipients to know what we really do
$message    = "You have been registered to yhub as Loise";

// Create a new instance of our awesome gateway class
$gateway    = new AfricasTalkingGateway($username, $apikey);

// Any gateway error will be captured by our custom Exception class below, 
// so wrap the call in a try-catch block

try 
{ 
  // Thats it, hit send and we'll take care of the rest. 
  $results = $gateway->sendMessage($recipients, $message);
			
  foreach($results as $result) {
    // status is either "Success" or "error message"
    echo " Number: " .$result->number;
    echo " Status: " .$result->status;
    echo " MessageId: " .$result->messageId;
    echo " Cost: "   .$result->cost."\n";
  }
}
catch ( AfricasTalkingGatewayException $e )
{
  echo "Encountered an error while sending: ".$e->getMessage();
}

// DONE!!! 

?>

