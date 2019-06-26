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
 */
class Voucher extends Model
{

    protected $table = "voucher";
}
