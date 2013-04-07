<?php

class Charity_Controller extends Base_Controller
{

  public function action_index()
  {
    $charities = Charity::all();
    return View::make('charity.index')->with('charities', $charities); 
  }

  public function action_create()
  {
    return View::make('charity.register');  
  }



  public function action_view($id)
  {
    $charity = Charity::find($id);
    return View::make('charity.view')
    ->with('charity', $charity); 
  }



  public function action_donate($id)
  {
    $isRecurring = Input::get('donationType') == "recurring";

    $charity = Charity::find($id);
    
    if (!$isRecurring) {
      define('PAYMILL_API_HOST', 'https://api.paymill.com/v2/');
      define('PAYMILL_API_KEY', 'e213b1e800cda98c29fb6bd7d3bde9df');

      Autoloader::directories(array(path('app').'libraries/Paymill-PHP-master/lib'));

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
        );
        $transaction = $transactionsObject->create($params);

        echo "<pre> ";
        print_r($transaction);

      }

    } 

    else {
      Autoloader::directories(array(path('app').'libraries/Paymill-PHP-master/lib'));

      $token = $_POST['paymillToken'];
      $currency = Input::get('currency');
      $amount = Input::get('amount');
      $monthly = Input::get('monthly');
      $email = Input::get('email');
      $card_holdername = Input::get('card-holdername');

      if ($token) {

        $current_user = Auth::user();
        if(isset($current_user->paymill_id))
        {
          $client = Paymill::getClient($current_user->paymill_id);
        }
        else
        {
          $client = Paymill::clientFactoryMethod($email,$card_holdername);
          $current_user->paymill_id = $client['id'];
          $current_user->save();
        }
        // Sanity check
        $offer = Paymill::offerFactoryMethod($amount*100,$currency,$monthly." MONTH", "offer1");
        $payment = Paymill::paymentFactoryMethod($token, $client);
        $subscription = Paymill::subscriptionFactoryMethod($client, $offer, $payment);


        $donation = new Donation;

        $donation->charity_id = $id;
        $donation->paymill_subscription_id = $subscription['id'];
        $donation->user_id = Auth::user()->id;
        $donation->amount = $amount;
        $donation->save();

      }



    // echo $id;
    //return Redirect::back();
    }
  }

  public function action_edit($id)
  {
    $charity = Charity::find($id);
    return View::make('charity.edit')->with('charity', $charity);    
  }

}