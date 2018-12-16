<?php

use Illuminate\Database\Seeder;
use App\Session;
use App\Day;

class SessionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {
        $sessions = [
            ['relaxation', 1, '2018-12-12'],
            ['physical', 2, '2018-12-13'],
            ['mindfulness', 3, '2018-12-14'],
            ['social', 4, '2018-12-15'],
            ['giving-back', 5, '2018-12-16'],
            ['relaxation', 2, '2018-12-16'],
        ];

        $count = count($sessions);

        foreach ($sessions as $key => $sessionData) {
            $session = new Session();

            # Extract the date from the session data
            $date = $sessionData[2];

            # Find that day in the days table
            $day_id = Day::where('date', '=', $date)->pluck('id')->first();

            $session->created_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
            $session->updated_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
            $session->type = $sessionData[0];
            $session->hours = $sessionData[1];
            $session->day_id = $day_id; # Add the day data

            $session->save();
            $count--;
        }
    }
}
