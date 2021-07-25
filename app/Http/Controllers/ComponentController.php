<?php

namespace App\Http\Controllers;

use App\Models\Component;
use Illuminate\Http\Request;

class ComponentController extends Controller
{
    public function metadata()
    {
        $components = Component::withCount([
            'issues as number_of_issues'
        ])->with([
            'issues.timelogs'
        ])->get();

        $response = [];
        foreach ($components as $component) {
            $totalSeconds = 0;
            foreach ($component->issues as $issue) {
                foreach ($issue->timelogs as $timelog) {
                    $totalSeconds += $timelog->seconds_logged;
                }
            }

            $response[] = [
                'component_id'     => $component->id,
                'number_of_issues' => $component->number_of_issues,
                'seconds_logged'   => $totalSeconds,
            ];
        }

        return response()->json($response);
    }
}
