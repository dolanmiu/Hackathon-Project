<?php

class Payment_Controller extends Base_Controller {

  /*
  |--------------------------------------------------------------------------
  | The Default Controller
  |--------------------------------------------------------------------------
  |
  | Instead of using RESTful routes and anonymous functions, you might wish
  | to use controllers to organize your application API. You'll love them.
  |
  | This controller responds to URIs beginning with "home", and it also
  | serves as the default controller for the application, meaning it
  | handles requests to the root of the application.
  |
  | You can respond to GET requests to "/home/profile" like so:
  |
  |   public function action_profile()
  |   {
  |     return "This is your profile!";
  |   }
  |
  | Any extra segments are passed to the method as parameters:
  |
  |   public function action_profile($id)
  |   {
  |     return "This is the profile for user {$id}.";
  |   }
  |
  */
  public function action_singletransaction()
  {
    return View::make("payment.transaction");
  }

  public function action_subscription()
  {
    return View::make("payment.subscription");
  }

  public function action_test()
  {
    return View::make("payment.test");
  }

  public function action_submitsingle()
  {

    define('PAYMILL_API_HOST', 'https://api.paymill.com/v2/');
    define('PAYMILL_API_KEY', 'e213b1e800cda98c29fb6bd7d3bde9df');

    Autoloader::directories(array(path('app').'libraries/Paymill-PHP-master/lib'));

    // set_include_path(implode(PATH_SEPARATOR, array(
    //   realpath(realpath(dirname(__FILE__)) . '/application/libraries/Paymill-PHP-master/lib'),
    //   get_include_path(),
    // )));
    // echo "here";

    $token = $_POST['paymillToken'];
    $currency = $_POST['currency'];
    $amount = $_POST['amount'];

    if ($token) {
      // require "Services/Paymill/Transactions.php";
      $transactionsObject = new Services_Paymill_Transactions(PAYMILL_API_KEY, PAYMILL_API_HOST);

      $params = array(
        'amount'      => $amount*100,  // Cent!
        'currency'    => $currency,   // ISO 4217
        'token'       => $token,
        'description' => 'Test Transaction',
        // 'client'      => 
        // 'email' => 'person@mail.com'
      );
      $transaction = $transactionsObject->create($params);

      echo "Transaction: ";
      print_r($transaction);

    }
  }
    public function action_submitsubscription()
  {
    Autoloader::directories(array(path('app').'libraries/Paymill-PHP-master/lib'));

    // set_include_path(implode(PATH_SEPARATOR, array(
    //   realpath(realpath(dirname(__FILE__)) . '/application/libraries/Paymill-PHP-master/lib'),
    //   get_include_path(),
    // )));
    // echo "here";

    $token = $_POST['paymillToken'];
    $currency = Input::get('currency');
    $amount = Input::get('amount');
    $monthly = Input::get('monthly');
    $email = Input::get('email');
    $card_holdername = Input::get('card-holdername');
    
    if ($token) {
      $client = Paymill::clientFactoryMethod($email,$card_holdername);
      $offer = Paymill::offerFactoryMethod($amount*100,$currency,$monthly." MONTH", "offer1");
      $payment = Paymill::paymentFactoryMethod($token, $client);
      $subscription = Paymill::subscriptionFactoryMethod($client, $offer, $payment);

      // echo "Transaction: ";
      // print_r($transaction);

    }
  }


}