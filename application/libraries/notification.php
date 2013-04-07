<?php

class Notification
{
  public static function recurring($charity_id, $amount)
  {
    $facebook = IoC::resolve('facebook-sdk');
    $uid = $facebook->getUser();

    if($uid){
      try {
      // Proceed knowing you have a logged in user who's authenticated.
        $user_profile = $facebook->api('/me');
      //print_r($user_profile);

        $attachment = array(
          'message' => "User",
          'name' => "Name",
          'link' => "https://upload.wikimedia.org/wikipedia/commons/4/4c/Bananas.jpg",
          'description' => "Usernam",
          'picture'=> "https://upload.wikimedia.org/wikipedia/commons/4/4c/Bananas.jpg",
          );
      //$two = $facebook->api('/'.$uid.'/feed', 'POST', $attachment);

      //print_r($two);

      } catch (FacebookApiException $e) {
        error_log($e);
        print_r($e);
        $user = null;
      }
    }
    else{
      $loginUrl = $facebook->getLoginUrl();
      return Redirect::to($loginUrl);
    };
  }
}