<?php

class Charity_Controller extends Base_Controller
{

  public function action_index()
  {
    $charities = Charity::all();
    return View::make('charity.index')->with('charities', $charities); 
  }

  public function action_register()
  {
    return View::make('charity.register');  
  }

  public function action_donate($id)
  {
   $charity = Charity::find($id);
   return View::make('charity.single')->with('charity', $charity); 
 }

}