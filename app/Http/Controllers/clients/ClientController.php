<?php

namespace App\Http\Controllers\clients;

use App\Http\Controllers\Controller;
use App\Models\Request;
use App\Models\StatusRequest;
use App\Models\WaterSource;
use Auth;

class ClientController extends Controller
{
    public function profile()
    {
        $user = Auth::user();
        $waterSources = WaterSource::whereFkIdClient($user->client->id)->paginate(15);
        return view('clients.profile', [
            'user' => $user,
            'waterSources' => $waterSources,
        ]);
    }

    public function requests()
    {
        $requests = Request::whereFkIdUser(Auth::id())->get();
        return view('clients.request.index', [
            'requests' => $requests,
            'error' => request('errorMessage')
        ]);
    }

    public function createRequest()
    {
        $hasRequest = Request::whereIn('fk_id_status_request', [
            StatusRequest::IN_PROGRESS,
            StatusRequest::NEW
        ])->whereFkIdUser(Auth::id())
           ->count();
        if ($hasRequest > 0) {
            return redirect()->route('client_requests',
                ['errorMessage' => 'Tiene una solicitud en proceso, espere por favor.']
            );
        }

        $request = new Request();
        $request->fk_id_user = Auth::id();
        $request->fk_id_status_request = StatusRequest::NEW;
        $request->save();
        return view('request.view', ['request' => $request]);
    }
}
