<?php

namespace App\Http\Controllers;

use App\Models\FollowRequest;
use App\Models\StatusRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use \App\Models\Request as RequestModel;

class RequestController extends Controller
{

    public function index(Request $request)
    {
        $type = $request->get('type');
        $statusRequest = StatusRequest::find($type);
        $requests = RequestModel::whereFkIdStatusRequest($type)
            ->latest()
            ->get();
        return view('request.index', [
            'requests' => $requests,
            'statusRequest' => $statusRequest
        ]);
    }

    public function view($requestId)
    {
        $request = RequestModel::find($requestId);
        return view('request.view', ['request' => $request]);
    }

    public function createComment(Request $request, $requestId)
    {
        if (\Auth::user()->isAdmin()) {
            $requestModel = RequestModel::find($requestId);
            $requestModel->fk_id_status_request = StatusRequest::IN_PROGRESS;
            $requestModel->save();
        }
        $followRequest = new FollowRequest();
        $followRequest->comment = request('comment');
        $followRequest->fk_id_request = $requestId;
        $followRequest->fk_id_user_transmitter = \Auth::id();
        $followRequest->save();
        return back();
    }

    public function markCompleted($requestId)
    {
        $requestModel = RequestModel::find($requestId);
        $requestModel->fk_id_status_request = StatusRequest::COMPLETED;
        $requestModel->save();
        return back();
    }
}
