<?php

class Charity extends Eloquent 
{
   // public static $table = 'charities'; 
   public function admins()
   {
    return $this->has_many_and_belongs_to('User', 'charity_admins');
   }

   public function effects()
   {
    return $this->has_many("Effect");
   }
}