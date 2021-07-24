<?php

namespace Database\Seeders;

use App\Models\Issue;
use App\Models\Timelog;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

class TimelogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $api = env('API_JSON_SERVER');

        $response = Http::get("{$api}/timelogs");
        $timelogs = $response->json();

        foreach ($timelogs as $timelog) {
            $newTimelog = new Timelog();

            $newTimelog->seconds_logged = $timelog['seconds_logged'];
            
            $user = User::find($timelog['user_id']);
            $issue = Issue::find($timelog['issue_id']);
            
            $newTimelog->user()->associate($user);
            $newTimelog->issue()->associate($issue);

            $newTimelog->save();
        }
    }
}
