<?php

namespace App\Http\Controllers;

use App\Models\ServiceStatus;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function main(Request $request)
    {
        $delivery = $request->get('delivery');
        $businessesStatusesQuery = ServiceStatus::query()
                                               ->where('draft_status', '=', 'Public')
                                               ->where('type', '=', 'Business');
        $communityStatusesQuery = ServiceStatus::query()
                                               ->where('draft_status', '=', 'Public')
                                               ->where('type', '=', 'Community groups');
        if (! is_null($delivery)) {
            $businessesStatusesQuery->where('delivery', '=', $delivery != 'no');
            $communityStatusesQuery->where('delivery', '=', $delivery != 'no');
        }

        return view(
            'home',
            [
                'statuses' => $businessesStatusesQuery->get(),
                'community' => $communityStatusesQuery->get(),
            ]
        );
    }
}
