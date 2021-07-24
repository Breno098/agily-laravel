<?php

use App\Models\Component;
use App\Models\Issue;
use App\Models\Timelog;
use App\Models\User;
use Facade\FlareClient\Time\Time;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Http;

Route::get('/', function () {
    
    $api = env('API_JSON_SERVER');

    $response = Http::get("{$api}/timelogs");
    $timelogs = $response->json();

    foreach ($timelogs as $timelog) {
        $newTimelog = new Timelog;

        $newTimelog->seconds_logged = $timelog['seconds_logged'];
        
        $user = User::find($timelog['user_id']);
        $issue = Issue::find($timelog['issue_id']);
        
        $newTimelog->user()->associate($user);
        $newTimelog->issue()->associate($issue);

        $newTimelog->save();
    }

    return response()->json(Timelog::all());
});
