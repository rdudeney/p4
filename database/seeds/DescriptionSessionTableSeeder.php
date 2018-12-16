<?php

use Illuminate\Database\Seeder;
use App\Session;
use App\Description;

class DescriptionSessionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sessions = [
            1 => ['relaxation', 'mindfulness'],
            2 => ['mindfulness'],
            3 => ['physical'],
            4 => ['physical', 'social'],
            5 => ['giving-back'],
            6 => ['giving-back']
        ];

        foreach($sessions as $id => $descriptions)
        {
            # First get the session
            $session = Session::where('id', 'like', $id)->first();

            # Now loop through each description for this session, adding the pivot
            foreach ($descriptions as $descriptionType)
            {
                $description = Description::where('type', 'like', $descriptionType)->first();

                #Connect this description to the session
                $session->descriptions()->save($description);
            }
        }
    }
}
