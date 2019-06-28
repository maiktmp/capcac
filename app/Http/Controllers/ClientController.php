<?php

namespace App\Http\Controllers;


use App\Http\Request\CreateUserRequest;
use App\Models\Client;
use App\Models\Rol;
use App\Models\User;
use DB;
use Exception;

class ClientController extends Controller
{

    public function index()
    {
        $users = User::paginate(15);
        return view('client.index', ['users' => $users]);
    }

    public function createPost(CreateUserRequest $request)
    {
        try {
            DB::beginTransaction();
            $user = new User();
            $user->fill($request->input('user'));
            $user->fk_id_rol = Rol::CLIENT;
            $transactionOk = $user->save();

            $client = new Client();
            $client->fill($request->input('client'));
            $client->fk_id_user = $user->id;
            $transactionOk = $transactionOk && $client->save();

//            $waterSource = new WaterSource();
//            $waterSource->registration_date = Carbon::now();
//            $waterSource->fk_id_client = $client->id;
//            $waterSource->fk_id_state = $request->input('fk_id_state');
//            $waterSource->fk_id_water_source_type = $request->input('fk_id_water_source_type');
//            $transactionOk = $transactionOk && $waterSource->save();
            if ($transactionOk) {
                DB::commit();
                return redirect()->route('client_index');
            }

        } catch (Exception $e) {
            DB::rollBack();
            return back()
                ->withErrors(['general' => "No se pudo crear el cliente " . $e->getMessage()])
                ->withInput();
        }
    }
}
