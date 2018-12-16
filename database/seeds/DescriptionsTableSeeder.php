<?php

use Illuminate\Database\Seeder;
use App\Description;

class DescriptionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $descriptions = ['relaxation', 'physical', 'mindfulness', 'social', 'giving-back'];

        foreach ($descriptions as $descriptionType)
        {
            $description = new Description();
            $description->type = $descriptionType;
            $description->save();
        };
    }
}
