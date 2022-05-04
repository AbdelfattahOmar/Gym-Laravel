<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GymManagerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory(40)->create();
        $gymsManager = User::latest()->take(40)->get();
        foreach ($gymsManager as $gymManagerRole) {
            $gymManagerRole->assignRole('gymManager');
        }
    }
}
