<?php

namespace Database\Seeders;

use App\Models\Issue;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

class IssueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $api = env('API_JSON_SERVER');

        $response = Http::get("{$api}/issues");
        $issues = $response->json();
    
        foreach ($issues as $issue) {
            $newIssue = Issue::create([
                'code' => $issue['code']
            ]);
    
            $newIssue->components()->sync($issue['components']);
    
            $newIssue->save();
        }
    }
}
