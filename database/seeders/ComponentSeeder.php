<?php

namespace Database\Seeders;

use App\Models\Component;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

class ComponentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $api = env('API_JSON_SERVER');

        $response = Http::get("{$api}/components");
        $components = $response->json();
    
        foreach ($components as $component) {
            Component::create([
                'name' => $component['name']
            ]);
        }
    }
}
