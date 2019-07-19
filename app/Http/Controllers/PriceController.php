<?php
/**
 * Created by PhpStorm.
 * User: presa
 * Date: 18/07/2019
 * Time: 10:34 PM
 */

namespace App\Http\Controllers;


use App\Models\State;
use App\Models\WaterSourceType;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PriceController extends Controller
{

    public function update()
    {
        $states = State::all();
        $waterSourceTypes = WaterSourceType::all();
        return view('prices.update', [
            'states' => $states,
            'waterSourceTypes' => $waterSourceTypes
        ]);
    }

    public function updatePost(Request $request)
    {
        $states = $request->state;
        $waterSourceTypes = $request->waterSourceType;
        foreach ($states as $id => $discount) {
            $state = State::find($id);
            $state->discount = $discount;
            $state->save();
        }
        foreach ($waterSourceTypes as $id => $price) {
            $waterSourceType = WaterSourceType::find($id);
            $waterSourceType->price = $price;
            $waterSourceType->save();
        }
        return response()->json(['success' => true]);
    }
}
