<?php

namespace Database\Seeders;

use App\Models\Employers;
use App\Models\Tag;
use App\Models\User;
use App\Models\Jobs;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Factories\JobsFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        /*User::factory()->create([
            'first_name' => 'Test',
            'last_name' => 'User',
            'email' => 'test@example.com',
        ]);
        */

        User::factory(10)->create();

        // Create 5 tags
        $tags = Tag::factory()->count(5)->create();

        Employers::factory()
            ->count(5)
            ->has(Jobs::factory()->count(5))  // Each employer has 3 jobs
            ->create()
            ->each(function ($employer) use ($tags) {
                // Load jobs to ensure they are accessible
                $employer->load('jobs');  // Ensure jobs are loaded

                // For each job created, attach 2 random tags
                $employer->jobs->each(function ($job) use ($tags) {
                    $job->tags()->attach($tags->random(2));  // Attach 2 random tags to each job
                });
            });

        // Call your JobsSeeder here
        /*$this->call([
            JobsSeeder::class,      // Add your jobs seeder here
        ]);
        */
    }
}
