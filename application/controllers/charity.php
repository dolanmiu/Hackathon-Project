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
    if(Input::get('name'))
    {
      $charity = new Charity;
      $charity->create(
        array('name' => Input::get('name'),
        'email'=>Input::get('email'),
        'description'=>Input::get('description'),
        'tel_no'=>Input::get('tel_no'),
        'city'=>Input::get('city'),
      ));
      return Redirect::to_action('charity@index');
    }  

    return View::make('charity.register');
  }

  public function action_view($id)
  {
    $charity = Charity::find($id);
    return View::make('charity.view')
    ->with('charity', $charity); 
  }

  public function action_map($id)
  {
    $charity = Charity::find($id);

    $q="select u.location from charities c join donations d on c.id = d.charity_id join users u on u.id = d.user_id where c.id=".$id;
    $ptarray=DB::query();
    return View::make('charity.map')
      ->with('points', $ptarray)
      ->with('charity', $charity); 


  }


  public function action_donate($id)
  {
    $isRecurring = Input::get('donationType') == "recurring";

    $charity = Charity::find($id);

    $token = $_POST['paymillToken'];
      $currency = "EUR"; //$_POST['currency'];
      $amount = $_POST['amount'];
      $email = Input::get('email');
      $card_holdername = Input::get('card-holdername');
    
    if (!$isRecurring) {
      define('PAYMILL_API_HOST', 'https://api.paymill.com/v2/');
      define('PAYMILL_API_KEY', 'e213b1e800cda98c29fb6bd7d3bde9df');

      Autoloader::directories(array(path('app').'libraries/Paymill-PHP-master/lib'));

      $current_user = Auth::user();
      $charity=Charity::find($id);
      if(isset($current_user->paymill_id))
      {
        $client = Paymill::getClient($current_user->paymill_id);
      }
      else
      {
        $client = Paymill::clientFactoryMethod($email, $card_holdername);
        $current_user->paymill_id = $client['id'];
        $charity->people_total+=1;
        $current_user->save();
      }

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
        $charity->donation_total+=$amount;
        $charity->save();
        echo "<pre> ";
        print_r($transaction);

      }

    } 

    else {
      Autoloader::directories(array(path('app').'libraries/Paymill-PHP-master/lib'));
      $monthly = Input::get('monthly');
      
      if ($token) {

        $current_user = Auth::user();
        if(isset($current_user->paymill_id))
        {
          $client = Paymill::getClient($current_user->paymill_id);
        }
        else
        {
          $client = Paymill::clientFactoryMethod($email, $card_holdername);
          $current_user->paymill_id = $client['id'];
          $charity->people_total+=1;
          $current_user->save();
        }
        // Sanity check
        $offer = Paymill::offerFactoryMethod($amount*100,$currency,$monthly." MONTH", "offer1");
        $payment = Paymill::paymentFactoryMethod($token, $client);
        $subscription = Paymill::subscriptionFactoryMethod($client, $offer, $payment);
        $charity->donation_total+=$amount;
        $charity->save();


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

        return Redirect::to_action('charity@view', array($charity_id));

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
