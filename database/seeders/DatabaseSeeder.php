<?php

namespace Database\Seeders;

use App\Models\User;
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
        \App\Models\FromWhereList::factory(100)->create();
        \App\Models\Industry::factory(100)->create();
        \App\Models\LandingPageContact::factory(100)->create();
        if (User::all()->count() == 0)
            $this->call(UserSeeder::class);
    }
}
