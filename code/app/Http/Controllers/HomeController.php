<?php

namespace App\Http\Controllers;

use App\Models\ServiceStatus;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function main(Request $request)
    {
        $delivery = $request->get('delivery');
        $statusesQuery = ServiceStatus::query()
                                      ->where('draft_status', '=', 'Public');
        if (! is_null($delivery)) {
            $statusesQuery->where('delivery', '=', $delivery != 'no');
        }

        return view(
            'home',
            [
                'statuses' => $statusesQuery->get(),
            ]
        );
    }
}
