<?php

$config_path = $_SERVER['DOCUMENT_ROOT'].'application/config';
$facebook_inc = $config_path.'/facebook.php';

require $facebook_inc;

// Create our Application instance (replace this with your appId and secret).
$facebook = new Facebook(array(
  'appId'  => '517608504962463',
  'secret' => 'af535d7e7c6d4bbc1a352b39353adc07',
));

$user = $facebook->getUser();

if ($user) {
  try {
    // Proceed knowing you have a logged in user who's authenticated.
    $user_profile = $facebook->api('/me');
  } catch (FacebookApiException $e) {
    error_log($e);
    $user = null;
  }
}
