<?php

class Effect extends Eloquent 
{
   public function charity()
   {
      return $this->has_one("Charity");
   }
}