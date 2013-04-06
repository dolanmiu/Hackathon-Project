<?php
class PaymillMethods {
	Autoloader::directories(array(path('app').'config/paymill.php'));

static function offerFactoryMethod($amount,$currency,$interval,$name){
$params = array(
    'amount'   => $amount,       // E.g. "4200" for 42.00 EUR
    'currency' => $currency,        // ISO 4217
    'interval' => $interval,
    'name'     => $name
);
$apiKey        = PAYMILL_API_KEY;
$apiEndpoint   = PAYMILL_API_HOST;
$offersObject  = new Services_Paymill_Offers($apiKey, $apiEndpoint);
$offer         = $offersObject->create($params);
return $offer;
}

static function subscriptionFactoryMethod($client, $offer, $payment){
$params = array(
    'client'   => 'client_88a388d9dd48f86c3136',
    'offer'    => 'offer_40237e20a7d5a231d99b',
    'payment'  => 'pay_95ba26ba2c613ebb0ca8'
);

$apiKey        = PAYMILL_API_KEY;
$apiEndpoint   = PAYMILL_API_HOST;
$subscriptionsObject = new Services_Paymill_Subscriptions($apiKey, $apiEndpoint);
$subscription        = $subscriptionsObject->create($params);
return $subscription
}

static function clientFactoryMethod($email, $description){
// $email         = $email;
// $description   = $description;
$apiKey        = PAYMILL_API_KEY;
$apiEndpoint   = PAYMILL_API_HOST;
$clientsObject = new Services_Paymill_Clients($apiKey, $apiEndpoint);
$client        = $clientsObject->create(array(
    'email'       => $email, 
    'description' => $description
    ));
return $client;
}

static function test($client) {
	echo $client['id'];
}
}

