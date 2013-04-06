<?php

class Donation extends Eloquent 
{
   public function charity()
   {
      return $this->has_one("Charity");
   }

}