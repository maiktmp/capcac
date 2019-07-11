<?php

namespace App\Http\Controllers;


use App\Http\Request\CreateUserRequest;
use App\Http\Request\UpdateUserRequest;
use App\Models\Client;
use App\Models\Rol;
use App\Models\User;
use DB;
use Exception;

class ClientController extends Controller
{

    public function index()
    {
        $users = User::whereFkIdRol(Rol::CLIENT)
            ->paginate(15);
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

    public function update($clientId)
    {
        $client = Client::with('user')->find($clientId);

        return view('client.update', ['client' => $client]);
    }

    public function updatePost(UpdateUserRequest $request, $clientId)
    {
        $client = Client::find($clientId);
        $password = $request->input('user.password', null);
        try {
            DB::beginTransaction();

            $user = $client->user;
            $passwordStore = $user->password;
            $user->fill($request->input('user'));
            $user->password = $password !== null ? $password : $passwordStore;
            $transactionOk = $user->save();

            $client->fill($request->input('client'));
            $transactionOk = $transactionOk && $client->save();

            if ($transactionOk) {
                DB::commit();
                return redirect()->route('client_index');
            }

        } catch (Exception $e) {
            DB::rollBack();
            return back()
                ->withErrors(['general' => "No se pudo actualizar el cliente " . $e->getMessage()])
                ->withInput();
        }
    }
}
