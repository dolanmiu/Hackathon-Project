<?php

class User extends Eloquent 
{
  public function donations()
  {
    return $this->has_many("Donation");
  }
  
  public function charities()
  {
      return $this->has_many_and_belongs_to('Charity', 'charity_admins');
  }
}