<?php

namespace Database\Seeders\ApiTests;

use App\Models\Application;
use Illuminate\Database\Seeder;

class ApplicationsTestSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        for ($i = 1; $i < 4; $i++) {
            $application = new Application();

            $application->id = $i;
            $application->name = 'name' . $i;
            $application->description = 'description' . $i;
            $application->status = $i;

            $application->save();
        }
    }
}
