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
        $type = $request->get('type');

        $instances = ServiceStatus::where('name', 'like', "%$q%")
                                  ->where('draft_status', '=', 'Public')
                                  ->get();
        $result = [];
        foreach ($instances as $instance) {
            $result[] = ['value' => $instance->id, 'text' => $instance->name];
        }

        return new JsonResponse($result);
    }

    public function getById(Request $request)
    {
        $id = $request->get('q');

        $instance = ServiceStatus::where('id', '=', $id)
                                 ->where('draft_status', '=', 'Public')
                                 ->get()
                                 ->first();

        return new JsonResponse($instance);
    }
}
