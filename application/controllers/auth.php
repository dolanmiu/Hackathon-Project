<?php

class Auth_Controller extends Controller {

  public function action_session($provider)
  {
      Bundle::start('laravel-oauth2');

      $provider = OAuth2::provider($provider, array(
          'id' => '517608504962463',
          'secret' => 'af535d7e7c6d4bbc1a352b39353adc07',
      ));

      if ( ! isset($_GET['code']))
      {
          // By sending no options it'll come back here
          return $provider->authorize();
      }
      else
      {
          // Howzit?
          try
          {
              $params = $provider->access($_GET['code']);

              $token = new OAuth2_Token_Access(array('access_token' => $params->access_token));
              $user = $provider->get_user_info($token);

              // Here you should use this information to A) look for a user B) help a new user sign up with existing data.
              // If you store it all in a cookie and redirect to a registration page this is crazy-simple.
              echo "<pre>";
              var_dump($user);
          }

          catch (OAuth2_Exception $e)
          {
              show_error('That didnt work: '.$e);
          }

        }
  }
}