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
        $penalties = Penalty::whereFkIdWaterSource($waterSourceId)->onlyTrashed()->paginate(15);
        return view('payment.index', [
            'penalties' => $penalties,
            'payments' => $payments
        ]);
    }

    public function create($waterSourceId)
    {
        $waterSource = WaterSource::find($waterSourceId);
        $lastPayment = Payment::whereFkIdWaterSource($waterSourceId)->orderBy('end_date', 'DESC')->first();
        return view('payment.create', [
            'waterSource' => $waterSource,
            'lastPayment' => $lastPayment,
        ]);
    }

    public function computePayment(Request $request, $waterSourceId)
    {
        $startDate = $request->get('start_date', null);
        $endDate = $request->get('end_date', null);

        $moths = WaterSource::diffDays($startDate, $endDate);
        if ($moths === 0) {
            return response()->json([
                'success' => false,
                'errors' => 'Los pagos deben cubrir un mes.'
            ]);
        }

        if (WaterSource::endDateIsPast($startDate, $endDate)) {
            return response()->json([
                'success' => false,
                'errors' => 'La fecha final no puede ser menor a la inicial'
            ]);
        }
        $days = WaterSource::diffDays($startDate, $endDate);
//        if ($days > 31) {
//            return response()->json([
//                'success' => false,
//                'errors' => 'Los pagos deben cubrir un mes.'
//            ]);
//        }

        $paymentsExistsStart = Payment::whereFkIdWaterSource($waterSourceId)
            ->whereBetween('start_date', [$startDate, $endDate])
            ->get();

        $paymentsExistsEnd = Payment::whereFkIdWaterSource($waterSourceId)
            ->WhereBetween('end_date', [$startDate, $endDate])
            ->get();

        if (sizeof($paymentsExistsStart) > 0) {
            return response()->json([
                'success' => false,
                'errors' => 'Ya existe un pago en el periodo de ' .
                    $paymentsExistsStart[0]->start_date . " al " .
                    $paymentsExistsStart[0]->end_date
            ]);
        }

        if (sizeof($paymentsExistsEnd) > 0) {
            return response()->json([
                'success' => false,
                'errors' => 'Ya existe un pago en el periodo de ' .
                    $paymentsExistsEnd[0]->start_date . " al " .
                    $paymentsExistsEnd[0]->end_date
            ]);
        }

        $waterSource = WaterSource::find($waterSourceId);
        $total = $waterSource->computePayment($startDate, $endDate);
        $moths = $waterSource->diffMonths($startDate, $endDate);
        return response()->json([
            'success' => true,
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

    public function viewPaymentVoucher($voucherId)
    {
        $voucher = Voucher::find($voucherId);
        return view('voucher.pdf', ['voucher' => $voucher]);
    }

    public function uploadFile($paymentId)
    {
        return view('penalty._upload_file', ['paymentId' => $paymentId]);
    }

    public function uploadFilePost(Request $request, $voucherId)
    {
        $fileOk = $request->hasFile('file_url') &&
            $request->file('file_url')->isValid();
        if ($fileOk) {
            $fileUrl = $this->storeFile(
                $request->file('file_url')
            );
            $voucher = Voucher::find($voucherId);
            $voucher->file_url = $fileUrl;
            $voucher->save();
            return response()->json(['success' => true]);
        }
    }


    /**
     * @param $file \File
     * @return string
     */
    private function storeFile($file)
    {
        $path = '/uploads';

        $name = 'comprobante_' . str_replace('.', '', (string)microtime(true)) . '_' . $file->getClientOriginalName() . '.' . $file->extension();

        // Create path if does not exists
        if (!file_exists(public_path() . $path)) {
            mkdir(
                public_path() . $path,
                0777,
                true
            );
        }

        // Move image to corresponding directory
        $file->move(public_path() . $path, $name);
        return $path . '/' . $name;
    }
}
