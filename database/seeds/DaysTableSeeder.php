<?php

use Illuminate\Database\Seeder;
use App\Day;

class DaysTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $days = [
            ['2018-12-12'],
            ['2018-12-13'],
            ['2018-12-14'],
            ['2018-12-15'],
            ['2018-12-16'],
        ];

        $count = count($days);

        foreach ($days as $key =>$dayData)
        {
            $day = new Day();

            $day->created_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
            $day->updated_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
            $day->date = $dayData[0];

            $day->save();
            $count--;
        }
    }
}
