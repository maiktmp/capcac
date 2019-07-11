<?php
/**
 * Created by PhpStorm.
 * User: presa
 * Date: 22/06/2019
 * Time: 11:10 PM
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Voucher
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Voucher newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Voucher newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Voucher query()
 * @mixin \Eloquent
 * @property int $id
 * @property string $date
 * @property float $amount
 * @property string $description
 * @property string $voucher_url
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $fk_id_transaction_type
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Voucher whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Voucher whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Voucher whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Voucher whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Voucher whereFkIdTransactionType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Voucher whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Voucher whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Voucher whereVoucherUrl($value)
 * @property-read \App\Models\Payment $payment
 * @property-read \App\Models\TransactionType $transactionType
 */
class Voucher extends Model
{
    protected $table = "voucher";

    public static function rules()
    {
        return [
            'amount' => 'required',
            'file_url' => 'required|file'
        ];
    }

    public static function messages()
    {
        return [
            'amount.required' => 'El campo es requerido',
            'file_url.required' => 'El campo es requerido',
            'file_url.file' => 'Ingrese un archivo válido'
        ];
    }

    public function transactionType()
    {
        return $this->belongsTo(
            TransactionType::class,
            'fk_id_transaction_type',
            'id'
        );
    }

    public function payment()
    {
        return $this->hasOne(
            Payment::class,
            'fk_id_voucher',
            'id'
        );
    }

    public static function getMonths()
    {
        return self::select(\DB::raw(" COUNT(*) as number, MONTH(date) as month"))
            ->groupBy('month')
            ->get();
    }

    public static function getSumInputs($month, $movement = null)
    {
        $query = self::select(\DB::raw("SUM(amount) as total"))
            ->whereRaw('MONTH(date) = ' . $month);
        if ($movement !== null) {
            $query->where('fk_id_transaction_type', $movement);
        } else {

            $totalO = self::select(\DB::raw("SUM(amount) as total"))
                ->whereRaw('MONTH(date) = ' . $month)
                ->where('fk_id_transaction_type', TransactionType::OUTPUT)->get();

            $totalI = self::select(\DB::raw("SUM(amount) as total"))
                ->whereRaw('MONTH(date) = ' . $month)
                ->where('fk_id_transaction_type', TransactionType::INPUT)->get();

            return $totalI[0]->total - $totalO[0]->total;
        }
        $total = $query->get();
        if ($movement === TransactionType::OUTPUT) {
            return 0 - $total[0]->total;
        }
        return $total[0]->total;
    }
}
