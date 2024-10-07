<?php

namespace Database\Seeders;

use App\Models\Employers;
use App\Models\Jobs;
use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JobsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Jobs::factory(30)->create();

        /** USED FOR LOGGING */
        /*
        $tags = Tag::factory(5)->create();
        foreach ($tags as $tag) {
            error_log('tagName: ' . $tag->name . " \n");
        }

        $employers = Employers::factory(5)->create();
        foreach ($employers as $employer) {
            error_log('employerName: ' . $employer->name . " \n");
        }


        $jobs = Jobs::factory(10)->create();

        foreach ($jobs as $job) {
            $job->tags()->attach($tags->random(2));
            // Retrieve the tags associated with the job
            $attachedTags = $job->tags()->get();  // Fetch the tags

            // Prepare a string of tag names for logging
            $tagNames = $attachedTags->pluck('name')->implode(', '); // Assuming the tag model has a 'name' attribute

            // Log the job title and its tags
            error_log('jobTitle: ' . $job->title . " tags: " . $tagNames . "\n");
        }
        */

    }
}
