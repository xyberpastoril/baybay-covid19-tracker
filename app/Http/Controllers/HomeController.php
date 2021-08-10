<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $startDate = \Carbon\Carbon::now()->subDays(14);

        for($i = 0; $i < 14; $i++){
            $raw = \App\Models\ActiveCases::where('date_issued', '=', $startDate->format('Y-m-d'))->first();

            
            $dateLabels[$i] = $startDate->format('M. j');
            $confirmed[$i] = $raw ? $raw['confirmed'] : null;
            $probable[$i] = $raw ? $raw['probable'] : null;
            $suspected[$i] = $raw ? $raw['suspected'] : null;
            $references[$i] = $raw ? $raw['reference'] : null;
            if($raw) $latest = $i;

            $startDate = $startDate->addDays(1);
        }

        $obj = \App\Models\ActiveCases::orderBy('updated_at', 'DESC')->first();
        if($obj) $lastUpdated = new \Carbon\Carbon(\App\Models\ActiveCases::orderBy('updated_at', 'DESC')->first()->updated_at);

        return view('home', [
            // 'data' => \App\Models\ActiveCases::where('date_issued', '>=', 'DATEADD(day,-14, GETDATE())')->orderBy('date_issued', 'ASC')->get(),
            'dateLabels' => $dateLabels,
            'confirmed' => $confirmed,
            'probable' => $probable,
            'suspected' => $suspected,
            'references' => $references,
            'lastUpdated' => (isset($lastUpdated) ? $lastUpdated : ''),
            'latest' => (isset($latest) ? $latest : null)
        ]);
    }
}
