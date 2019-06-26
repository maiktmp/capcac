<?php
/**
 * Created by PhpStorm.
 * User: presa
 * Date: 22/06/2019
 * Time: 11:11 PM
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\PenaltyPayment
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PenaltyPayment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PenaltyPayment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PenaltyPayment query()
 * @mixin \Eloquent
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $fk_id_voucher
 * @property int $fk_id_water_source
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PenaltyPayment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PenaltyPayment whereFkIdVoucher($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PenaltyPayment whereFkIdWaterSource($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PenaltyPayment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PenaltyPayment whereUpdatedAt($value)
 */
class PenaltyPayment extends Model
{
    protected $table = "penalty_payment";
}
