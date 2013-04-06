<?php

class Seed_Task {

    public function run($arguments)
    {

      // Create 5 charities
      DB::raw("DELETE FROM charities;");

      for($i = 0; $i<5; $i++)
      {
        $charity = new Charity;
        $charity->name = "Charity #" . $i;
        $charity->save();

        for($j = 0; $j < rand(5,20); $j++)
        {
          $user = new User;
          $user->first_name = "First name " . $j;
          $user->save();

          for($k = 0; $k < rand(1,3); $k++)
          {
            $donation = new Donation;
            $donation->amount = $k * rand(1,10)/10;
            $donation->user_id = $user->id;
            $donation->charity_id = $charity->id;
            $donation->frequency = rand(1,3);
            $donation->save();
          }

        }

      }
      // Create 100 users


    }
}