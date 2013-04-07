<?php

class Seed_Task {

    public function run($arguments)
    {

      // Create 5 charities

      $charities = array();

      for($i = 0; $i < 10; $i++)
      {
        $charity = new Charity;
        $charity->name = "Charity #" . $i;
        $charity->save();
        $charities[$charity->id] = array('users'=>0, 'amount'=>0);
        
        $j = 0;
        while($j < 200)
        {
          $effect = new Effect;
          $effect->charity_id = $charity->id;
          $effect->min_amount = $j;
          $j += rand(1,30);
          $effect->max_amount = $j;
          $effect->description = 
          $effect->save();
        }

      }

     for($j = 0; $j < 100; $j++)
        {
          $user = new User;
          $user->first_name = "First name " . $j;
          $user->last_name = "Last name " . $j;
          $user->save();

          for($k = 0; $k < rand(1,3); $k++)
          {
            $donation = new Donation;
            $donation->amount = ($k+1) * 10 * rand(1,10)/10;
            $donation->user_id = $user->id;
            $donation->charity_id = array_rand($charities);
            

            $donation->frequency = rand(1,3);
            $donation->save();
          }
        }


    }
}