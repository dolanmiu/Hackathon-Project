<?php

class Donation extends Eloquent 
{
   public function charity()
   {
      return $this->has_one("Charity");
   }

   public function transactions()
   {
      return $this->has_many("Transaction");
   }
}