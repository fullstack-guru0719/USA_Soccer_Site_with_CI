<?php
require 'connect-php-sdk-master/vendor/autoload.php';

$access_token = 'EAAAEDwXchuvjDCHomAh2tsxlc66JzpZcetbszEgQBr67YSBDfFsMhmCnTbAcyPq';
//$access_token = 'sandbox-sq0csb-dR7MClEIdRQA4OdYMlkIt0tctUVkzoPToAiE3cn_ZCc';
# setup authorization 
\SquareConnect\Configuration::getDefaultConfiguration()->setAccessToken($access_token);
# create an instance of the Transaction API class
$transactions_api = new \SquareConnect\Api\TransactionsApi();
//$location_id = 'RMZJ3ZTRG0TFA';
$location_id = 'CBASEFRsruaSKu7JvOR48vOPfkAgAQ';
$nonce = $_POST['nonce'];
$amount = $_POST['amount']*100;
$request_body = array (
    "card_nonce" => $nonce,
    # Monetary amounts are specified in the smallest unit of the applicable currency.
    # This amount is in cents. It's also hard-coded for $1.00, which isn't very useful.
    "amount_money" => array (
        "amount" => (int) $amount,
        "currency" => "USD"
    ),
    # Every payment you process with the SDK must have a unique idempotency key.
    # If you're unsure whether a particular payment succeeded, you can reattempt
    # it with the same idempotency key without worrying about double charging
    # the buyer.
    "idempotency_key" => uniqid()
);

try {
    $result = $transactions_api->charge($location_id,  $request_body);
    // print_r($result);
	
	// echo '';
	if($result['transaction']['id']){
	    //print_r($_POST);
		//echo 'Payment success!';
		//echo "Transation ID: ".$result['transaction']['id']."";
		
		$to = $_POST['email'];
        $subject = "Thank You For The Donation";
        $txt = "Thank You For The Donation";
        $headers = "From: donations@pecuniance.com" . "\r\n" .
        "CC: ";
        
        mail($to,$subject,$txt,$headers);
        header('Location:https://laaztecs.com/donations/index.php?success=yes');
		
		
		
	}
} catch (\SquareConnect\ApiException $e) {
    echo "Exception when calling TransactionApi->charge:";
    var_dump($e->getResponseBody());
}
?>