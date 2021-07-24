<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $api = env('API_JSON_SERVER');

        $response = Http::get("{$api}/users");
        $users = $response->json();

        foreach ($users as $user) {
            User::create([
                'name' => $user['name'],
                'email' => $user['email']
            ]);
        }

    }
}
