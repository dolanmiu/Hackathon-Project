<?php
class Paymill{

    static function offerFactoryMethod($amount,$currency,$interval,$name){
        Autoloader::directories(array(path('app').'libraries/Paymill-PHP-master/lib'));

        $params = array(
    'amount'   => $amount,       // E.g. "4200" for 42.00 EUR
    'currency' => $currency,        // ISO 4217
    'interval' => $interval,
    'name'     => $name
    );
        $apiKey        = Config::get('paymill.api_key');
        $apiEndpoint   = Config::get('paymill.api_host');
        $offersObject  = new Services_Paymill_Offers($apiKey, $apiEndpoint);
        $offer         = $offersObject->create($params);
        self::test($offer);
        return $offer;
    }

    static function subscriptionFactoryMethod($client, $offer, $payment){
        Autoloader::directories(array(path('app').'libraries/Paymill-PHP-master/lib'));

        $params = array(
            'client'   => $client['id'],
            'offer'    => $offer['id'],
            'payment'  => $payment['id']
            );

        $apiKey        = Config::get('paymill.api_key');
        $apiEndpoint   = Config::get('paymill.api_host');
        $subscriptionsObject = new Services_Paymill_Subscriptions($apiKey, $apiEndpoint);
        $subscription        = $subscriptionsObject->create($params);
// print_r($subscription);
        self::test($subscription);
        return $subscription;
    }

    static function clientFactoryMethod($email, $description){
        Autoloader::directories(array(path('app').'libraries/Paymill-PHP-master/lib'));

// $email         = $email;
// $description   = $description;
        $apiKey        = Config::get('paymill.api_key');
        $apiEndpoint   = Config::get('paymill.api_host');
        $clientsObject = new Services_Paymill_Clients($apiKey, $apiEndpoint);
        $client        = $clientsObject->create(array(
            'email'       => $email, 
            'description' => $description
            ));
        self::test($client);
        return $client;
    }

    static function paymentFactoryMethod($token, $client){
        Autoloader::directories(array(path('app').'libraries/Paymill-PHP-master/lib'));
    // echo $token;
        $params = array(
            'token' => $token,
            'client' => $client
            );

        $apiKey        = Config::get('paymill.api_key');
        $apiEndpoint   = Config::get('paymill.api_host');
        $paymentsObject = new Services_Paymill_Payments(
            $apiKey, $apiEndpoint
            );
        $creditcard = $paymentsObject->create($params);
        self::test($creditcard);
        return $creditcard;
    }

    static function deleteSubscription($subscriptionid) {
        $apiKey        = Config::get('paymill.api_key');
        $apiEndpoint   = Config::get('paymill.api_host');
        $subscriptionsObject = new Services_Paymill_Subscriptions($apiKey, $apiEndpoint);
        $subscription        = $subscriptionsObject->delete($subscriptionid);

    }

    static function getClient($clientid) {
        Autoloader::directories(array(path('app').'libraries/Paymill-PHP-master/lib'));
        $clients = $clientsObject->getOne($clientid);
        return $client;
    }

    static function getSubscription($subscriptionid) {
        Autoloader::directories(array(path('app').'libraries/Paymill-PHP-master/lib'));
        $subscription = $clientsObject->getOne($subscriptionid);
        return $subscription;
    }

    static function getOffer($offerid) {
        Autoloader::directories(array(path('app').'libraries/Paymill-PHP-master/lib'));
        $offer = $clientsObject->getOne($offerid);
        return $offer;
    }

    static function getPayment($paymentid) {
        Autoloader::directories(array(path('app').'libraries/Paymill-PHP-master/lib'));
        $payment = $clientsObject->getOne($paymentid);
        return $payment;
    }

    static function test($client) {
        echo '<pre>';
        print_r($client);

    }

}

