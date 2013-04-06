<?php

class User extends Eloquent 
{
    public function comments()
    {
          return $this->has_many('Comment');
    }

     public function charities()
     {
          return $this->has_many_and_belongs_to('Charity', 'charity_admins');
     }

}