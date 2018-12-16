<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(DaysTableSeeder::class);
        $this->call(DescriptionsTableSeeder::class);
        $this->call(SessionsTableSeeder::class);
        $this->call(DescriptionSessionTableSeeder::class);
    }
}
