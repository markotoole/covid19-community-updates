<?php declare(strict_types=1);

namespace App\Admin\Controllers;

use App\Models\UpdateRequest;

class StatusDashboard
{
    public static function operations()
    {
        $newRequests = UpdateRequest::where('state', '=', 'new')
                                     ->count();
        $links = [
            ['name' => 'Public services', 'link' => '/admin/service-statuses?state=public'],
            ['name' => sprintf("New requests (%s)", $newRequests), 'link' => '/admin/update-requests?&status=new'],
        ];

        return view('admin/box', compact('links'));
    }
}
