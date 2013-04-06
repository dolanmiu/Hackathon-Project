<?php

class Transaction extends Eloquent 
{
   public function donation()
   {
      return $this->has_one("Donation");
   }

}