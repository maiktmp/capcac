<?php
/**
 * Created by PhpStorm.
 * User: presa
 * Date: 07/07/2019
 * Time: 09:40 PM
 */

namespace App\Http\Controllers;


use App\Http\Request\CreateVoucherRequest;
use App\Models\Voucher;
use Carbon\Carbon;
use Illuminate\Http\Request;

class VoucherController extends Controller
{
    public function index()
    {
//        $vouchers = Voucher::all()->groupBy('MONTH()');
        $months = Voucher::getMonths();
//        return dd($months);
        return view('voucher.index', ['months' => $months]);
    }

    public function createPost(CreateVoucherRequest $request)
    {
        $fileOk = $request->hasFile('file_url') &&
            $request->file('file_url')->isValid();

        if ($fileOk) {
            $fileUrl = $this->storeFile(
                $request->file('file_url')
            );
            $voucher = new Voucher();
            $voucher->amount = $request->input('amount', 0);
            $voucher->description = $request->input('description', "");
            $voucher->fk_id_transaction_type = $request->input('fk_id_transaction_type');
            $voucher->date = Carbon::now();
            $voucher->voucher_url = $fileUrl;
            try {
                $voucher->saveOrFail();
                return response()->json(['success' => true]);
            } catch (\Throwable $e) {
                abort(500, $e->getMessage());
            }
        }

    }

    public function filter(Request $request)
    {
        $id = $request->get('id', null);
        $description = $request->get('description', null);
        $start = $request->get('start', null);
        $end = $request->get('end', null);
        $type = $request->get('type', null);

        $filtered = false;
        $data = Voucher::query();
        if (!is_null($id)) {
            $filtered = true;
            $data->where('id', $id);
        }

        if (!is_null($description)) {
            $filtered = true;
            $data->where('description', 'like', '%' . $description . '%');
        }

        if (!is_null($start) && !is_null($end)) {
            $filtered = true;
            $data->whereBetween('date', [$start, $end]);
        }

        if ($type !== "0") {
            $filtered = true;
            $data->where('fk_id_transaction_type', $type);
        }
        if ($type === "0") {
            $filtered = true;
        }

//        return dd($data);

        $results = !$filtered ? [] : $data->get();
        return view('voucher.filter', ['results' => $results]);
    }

    /**
     * @param $file \File
     * @param $bookCategoryId
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
