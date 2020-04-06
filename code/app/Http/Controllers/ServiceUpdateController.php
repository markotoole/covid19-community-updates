<?php declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\ServiceStatus;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ServiceUpdateController extends Controller
{
    public function searchByName(Request $request)
    {
        $q = $request->get('q');

        $instances = ServiceStatus::where('name', 'like', "%$q%")
                                  ->where('draft_status', '=', 'Public')
                                  ->get();
        $result = [];
        foreach ($instances as $instance) {
            $result[] = ['value' => $instance->id, 'text' => $instance->name];
        }

        return new JsonResponse($result);
    }
}
