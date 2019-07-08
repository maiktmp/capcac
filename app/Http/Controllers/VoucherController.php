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
        return dd(Voucher::getSumInputs(8));
        return view('voucher.index');
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
