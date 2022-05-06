<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        // \App\Models\User::factory(10)->create();
        $this->call(PermissionsSeeder::class);
        $this->call(CitySeeder::class);
        $this->call(GymSeeder::class);
        $this->call(AdminUserSeeder::class);
        $this->call(CitiesManagerSeeder::class);
        $this->call(GymManagerSeeder::class);
        $this->call(CoachesSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(TrainingPackagesSeeder::class);
        $this->call(TrainingSessionSeeder::class);
        $this->call(TrainingSessionUserSeeder::class);
        $this->call(TrainingPackagesSeeder::class);
        $this->call(AttendanceSeeder::class);
        $this->call(RevenueSeeder::class);
    }
}
