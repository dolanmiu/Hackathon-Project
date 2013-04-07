<?php

// Autoloader::directories(array(path('app').'controllers'));
// include 'paymill_methods.php';


$client = Paymill::clientFactoryMethod("email@server.com","description");
$offer = Paymill::offerFactoryMethod("4200","EUR","1 MONTH","offer1");
// $payment = Paymill::paymentFactoryMethod($token);
// $subscription = Paymill::subscriptionFactoryMethod($client['id'], $offer['id'], $payment['id']);	