<?php

namespace App\Http\Controllers;


use App\Http\Request\CreateWaterSourceRequest;
use App\Http\Request\UpdateUserRequest;
use App\Http\Request\UpdateWaterSourceRequest;
use App\Models\Client;
use App\Models\WaterSource;
use Illuminate\Http\Request;

class WaterSourceController extends Controller
{
    public function index($clientId)
    {
        $waterSources = WaterSource::whereFkIdClient($clientId)->paginate(15);
        $client = Client::find($clientId);

        return view('water_source.index', [
            'waterSources' => $waterSources,
            'client' => $client
        ]);
    }

    public function create($clientId)
    {
        return view('water_source.create', ['clientId' => $clientId]);
    }

    public function createPost(CreateWaterSourceRequest $request, $clientId)
    {
        $waterSource = new WaterSource();
        $waterSource->number = $request->input('number');
        $waterSource->registration_date = $request->input('registration_date');
        $waterSource->fk_id_client = $clientId;
        $waterSource->fk_id_state = $request->input('fk_id_state');
        $waterSource->fk_id_water_source_type = $request->input('fk_id_water_source_type');
        if ($waterSource->save()) {
            return response()->json(['success' => 'true']);
        }
    }

    public function update($waterSourceId)
    {
        $waterSource = WaterSource::find($waterSourceId);
        return view('water_source.update', ['waterSource' => $waterSource]);
    }

    public function updatePost(UpdateWaterSourceRequest $request, $waterSourceId)
    {
        $waterSource = WaterSource::find($waterSourceId);
        $waterSource->number = $request->input('number');
        $waterSource->registration_date = $request->input('registration_date');
        $waterSource->fk_id_state = $request->input('fk_id_state');
        $waterSource->fk_id_water_source_type = $request->input('fk_id_water_source_type');
        if ($waterSource->save()) {
            return response()->json(['success' => 'true']);
        }
    }
}
