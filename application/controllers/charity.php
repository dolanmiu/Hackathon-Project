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
    $charity = Charity::find($id);

    // INSERT CODE TO PROCESS PAYMENT HERE! :)


    echo $id;
    //return Redirect::back();
  }




  public function action_edit($id)
  {
    $charity = Charity::find($id);
    return View::make('charity.edit')->with('charity', $charity);    
  }

}