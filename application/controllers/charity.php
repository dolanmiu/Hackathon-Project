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
        $donation->start_date = new DateTime;
        $donation->paymill_subscription_id = $subscription['id'];
        $donation->user_id = Auth::user()->id;
        $donation->amount = $amount;
        $donation->save();

        $notification = new Notification;
        $notification->recurring($id, $amount);

        return Redirect::to_action("charity@notify", array($amount, $id));

      }
    }
  }




  public function action_notify($amount, $charity_id)
  {
    $facebook = IoC::resolve('facebook-sdk');
    $uid = $facebook->getUser();

    if($uid){
      try {
        $charity = Charity::find($charity_id)->name;
        $first_name = Auth::user()->first_name;
        $effect = Effect::where('min_amount', '<', $amount)->first();
        $attachment = array(
          'message' => $first_name . " donated £" . $amount . " to " . $charity,
          'name' => "Help " . $charity . " on Social Pledge",
          'link' => "http://socialpledge.eu/charity/" . $charity_id,
          'description' => "With £" . $amount . " " . $first_name . " is helping " . $charity . " do amazing things for people who need it the most" ,
          'picture'=> "http://socialpledge.eu/assets/img/homepage-big1.jpg",
          );
        $req = $facebook->api('/'.$uid.'/feed', 'POST', $attachment);
        
        Session::flash('amount_donated', $amount);

        return Redirect::to_action('');

      } catch (FacebookApiException $e) {
        error_log($e);
        print_r($e);
        $user = null;
      }
    }
    else{
      $loginUrl = $facebook->getLoginUrl();
      return Redirect::to($loginUrl);
    }
  }

  public function action_edit($id)
  {
    $charity = Charity::find($id);
    return View::make('charity.edit')->with('charity', $charity);    
  }

}