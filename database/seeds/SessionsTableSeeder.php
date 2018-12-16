<?php

use Illuminate\Database\Seeder;
use App\Session;
use App\Day;
use App\Description;

class SessionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {
        $sessions = [
            [1, '2018-12-12'],
            [2, '2018-12-13'],
            [3, '2018-12-14'],
            [4, '2018-12-15'],
            [5, '2018-12-16'],
            [2, '2018-12-16'],
        ];

        $count = count($sessions);

        foreach ($sessions as $key => $sessionData) {
            $session = new Session();

            # Extract the date from the session data
            $date = $sessionData[1];

            # Find that day in the days table
            $day_id = Day::where('date', '=', $date)->pluck('id')->first();

            $session->created_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
            $session->updated_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
            $session->hours = $sessionData[0];
            $session->day_id = $day_id; # Add the day data

            $session->save();
            $count--;
        }
    }
}
