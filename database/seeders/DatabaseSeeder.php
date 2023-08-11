<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Course;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);


        $arr = ['A', 'B', 'C', 'D'];

        foreach ($arr as $value) {


            Teacher::create([
                'name' => "Teacher $value",
                'phone' => fake()->phoneNumber(),
                'email' => fake()->email()
            ]);

            Course::create([
                'teacher_id' => Teacher::all()->random()->id,
                'name' => "Course $value",
                'slug' => Str::slug("Course $value")
            ]);

            Student::create([
                'course_id' => Course::all()->random()->id,
                'name' => "Student $value"
            ]);
        }
    }
}
