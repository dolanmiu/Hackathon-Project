<?php

class Donation extends Eloquent 
{

  public static $timestamps = true;

   public function charity()
   {
      return $this->has_one("Charity");
   }

   public function transactions()
   {
      return $this->has_many("Transaction");
   }

   public function user()
   {
      return $this->has_one("User");
   }
}