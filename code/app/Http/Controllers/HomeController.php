<?php

namespace App\Http\Controllers;

use App\Models\ServiceStatus;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function main(Request $request)
    {
        return view(
            'home',
            [
                'statuses' => ServiceStatus::query()
                                           ->where('draft_status', '=', 'Public')->get(),
            ]
        );
    }
}
