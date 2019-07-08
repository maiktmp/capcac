<?php

namespace App\Http\Controllers;

use App\Http\Request\CreatePenaltyRequest;
use App\Models\Penalty;
use App\Models\PenaltyPayment;
use App\Models\TransactionType;
use App\Models\Voucher;
use App\Models\WaterSource;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PenaltyController extends Controller
{

    public function index($waterSourceId)
    {
        $penalties = Penalty::whereFkIdWaterSource($waterSourceId)->paginate(15);
        return view('penalty.index', ['penalties' => $penalties]);

    }

    public function create($waterSourceId)
    {
        return view('penalty.create', ['waterSourceId' => $waterSourceId]);
    }

    public function createPost(CreatePenaltyRequest $request, $waterSourceId)
    {
        $penalty = new Penalty();
        $penalty->fill($request->all());
        $penalty->fk_id_water_source = $waterSourceId;
        $penalty->date = Carbon::now();
        $penalty->saveOrFail();
        return response()->json(['success' => true]);
    }

    public function penaltyPayment($paymentId)
    {
        $penalty = Penalty::find($paymentId);

        $voucher = new Voucher();
        $voucher->date = Carbon::now();
        $voucher->amount = $penalty->amount;
        $voucher->description = $penalty->description;
        $voucher->fk_id_transaction_type = TransactionType::INPUT;
        $voucher->save();

        $penaltyPayment = new PenaltyPayment();
        $penaltyPayment->fk_id_water_source = $penalty->fk_id_water_source;
        $penaltyPayment->fk_id_voucher = $voucher->id;
        $penaltyPayment->save();

        $penalty->delete();

        return response()->json(['success' => true]);
    }
}
