<?php declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\ServiceStatus;
use App\Models\UpdateRequest;
use Illuminate\Http\Request;

class UpdateRequestController extends Controller
{
    public function submitForm()
    {
        $categories = \App\Models\Category::all();
        $statuses = ServiceStatus::getSelectEnum('status');

        return view('submit', ['categories' => $categories, 'statuses' => $statuses, 'captcha' => captcha_img()]);
    }

    public function submit(Request $request)
    {
        $rules = ['captcha' => 'required|captcha'];
        $validator = validator()->make(request()->all(), $rules);
        if ($validator->fails()) {
            return redirect()
                ->route('update.submit')
                ->withInput()
                ->withErrors($validator, 'updateErrorBag');
        }
        $status = new ServiceStatus();
        $status->category_id = $request->category;
        $status->status = $request->status;
        $status->name = $request->name ?? $request->update_id;
        $status->delivery = $request->delivery || $request->delivery == 'on';
        $status->service_offered = $request->service_offered || $request->service_offered == 'on';
        $status->phone = $request->phone;
        $status->link = $request->link;
        $status->notes = $request->notes;
        $status->draft_status = 'Draft';
        $status->save();

        try {
            $updateRequest = new UpdateRequest();
            $updateRequest->status_id = $status->id;
            $updateRequest->update_status_id = intval($request->update_id);
            $updateRequest->save();
        } catch (\Exception $exception) {
            $status->delete();
            throw $exception;
        }

        return redirect(route('home'))->with('message', 'Thank you for update!');
    }

    public function publish(Request $request, $id)
    {
        $updateRequest = UpdateRequest::findOrFail($id);
        if ($updateRequest->state == 'Closed') {
            return redirect('/admin/update-requests');
        }
        /** @var ServiceStatus $status */
        $status = $updateRequest->status()
                                ->first();

        if ($updateStatus = $updateRequest->update_status()->first()) {
            $updateStatus->draft();
            $updateStatus->save();
        }
        $status->publish();
        $status->save();

        $updateRequest->state = 'Closed';
        $updateRequest->save();

        return redirect('/admin/update-requests');
    }
}
