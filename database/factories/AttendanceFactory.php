<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class AttendanceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            
                'attendance_at' => '2022-05-06 07:00:00',
                'user_id' => rand(123, 222),
                'training_session_id' => rand(1, 10),
            
        ];
    }
}
