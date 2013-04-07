<?php

class Auth_Controller extends Controller {

  public function action_session($provider)
  {

      $provider = 'facebook';

      Bundle::start('laravel-oauth2');

      // $provider = OAuth2::provider($provider, array(
      //     'id' => '517608504962463',
      //     'secret' => 'af535d7e7c6d4bbc1a352b39353adc07',
      // ));
      $provider = OAuth2::provider($provider, array(
          'id'      => Config::get('facebook.app_id'),
          'secret'  => Config::get('facebook.secret'),
      ));


      if ( ! isset($_GET['code']))
      {
          // By sending no options it'll come back here
          return $provider->authorize();
      }
      else
      {
          try
          {
              $params = $provider->access($_GET['code']);

              $token = new OAuth2_Token_Access(array('access_token' => $params->access_token));

              Session::put("access_token", $token);

              $fbuser = $provider->get_user_info($token);
              $uid = (int) $fbuser['uid'];
              $existing_user = User::where('fb_uid', '=', $uid)->first();

              if($existing_user)
              {
                Auth::login($existing_user->id);
              }
              
              else
             {
		$name_split = explode(" ", $fbuser['name']); 
                $user = new User;
                $user->fb_uid = $uid;
                $user->first_name = $name_split[0]; 
                $user->save();
              }
              
              return Redirect::home();

              echo "<pre>";
              var_dump($user);
          }

          catch (OAuth2_Exception $e)
          {
              show_error('That didnt work: '.$e);
          }

        }
  }


  public function action_fake()
  {
    Auth::login(1);
    return Redirect::home();
  }

  public function action_logout()
  {
    Auth::logout();
    return Redirect::home();
  }
}
