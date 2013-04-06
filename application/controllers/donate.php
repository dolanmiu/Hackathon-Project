<?php

class Donate_Controller extends Controller {

  public function action_index()
  {
    $facebook = IoC::resolve('facebook-sdk');
    $uid = $facebook->getUser();
    echo $uid;
  }
}