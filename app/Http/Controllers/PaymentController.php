<?php

namespace App\Http\Controllers;


use App\Models\Payment;
use App\Models\Penalty;
use App\Models\TransactionType;
use App\Models\Voucher;
use App\Models\WaterSource;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index($waterSourceId)
    {
        $payments = Payment::whereFkIdWaterSource($waterSourceId)->paginate(15);
        $penalties = Penalty::onlyTrashed()->paginate(15);
        return view('payment.index', [
            'penalties' => $penalties,
            'payments' => $payments
        ]);
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

        $voucher = new Voucher();
        $voucher->date = Carbon::now();
        $voucher->amount = $waterSource->computePayment($startDate, $endDate);
        $voucher->description = $request->input('description', null);
        $voucher->fk_id_transaction_type = TransactionType::INPUT;
        try {
            \DB::beginTransaction();
            $voucher->save();

            $payment = new Payment();
            $payment->fill($request->all());
            $payment->price = $waterSource->computePayment($startDate, $endDate);
            $payment->fk_id_water_source = $waterSourceId;
            $payment->fk_id_voucher = $voucher->id;
            $payment->save();

            \DB::commit();
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            \DB::rollBack();
            abort(500, 'Ocurrio un error ' . $e->getMessage());
        }
    }

    public function viewPaymentVoucher($paymentId)
    {
        $payment = Payment::with('voucher')->find($paymentId);
        return view('voucher.pdf', ['payment' => $payment]);
    }
}
