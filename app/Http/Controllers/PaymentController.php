<?php

namespace App\Http\Controllers;


use App\Models\Payment;
use App\Models\WaterSource;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index($waterSourceId)
    {
        $payments = Payment::whereFkIdWaterSource($waterSourceId)->paginate(15);
        return view('payment.index', ['payments' => $payments]);
    }

    public function create($waterSourceId)
    {
        $waterSource = WaterSource::find($waterSourceId);
        return view('payment.create', ['waterSource' => $waterSource]);
    }

    public function computePayment(Request $request, $waterSourceId)
    {
        $startDate = $request->get('start_date', null);
        $endDate = $request->get('end_date', null);
        $waterSource = WaterSource::find($waterSourceId);
        $total = $waterSource->computePayment($startDate, $endDate);
        $moths = $waterSource->diffMonths($startDate, $endDate);
        return response()->json([
            'total' => $total,
            'months' => $moths
        ]);
    }

    public function createPost(Request $request, $waterSourceId)
    {
        $waterSource = WaterSource::find($waterSourceId);
        $startDate = $request->input('start_date', null);
        $endDate = $request->input('end_date', null);
        $payment = new Payment();
        $payment->fill($request->all());
        $payment->price = $waterSource->computePayment($startDate, $endDate);
        $payment->fk_id_water_source = $waterSourceId;
        $payment->save();
        return response()->json(['success' => true]);
    }
}
