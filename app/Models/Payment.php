<?php
/**
 * Created by PhpStorm.
 * User: presa
 * Date: 27/06/2019
 * Time: 08:43 PM
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Payment
 *
 * @property int $id
 * @property string $start_date
 * @property string $end_date
 * @property float $price
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $fk_id_water_source
 * @method static \Illuminate\Database\Eloquent\Builder|Payment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Payment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Payment query()
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereFkIdWaterSource($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property int $fk_id_voucher
 * @property-read \App\Models\Voucher $voucher
 * @property-read \App\Models\WaterSource $waterSource
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Payment whereFkIdVoucher($value)
 * @property string|null $file_url
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Payment whereFileUrl($value)
 */
class Payment extends Model
{
    protected $table = 'payment';
    protected $fillable = [
        'start_date',
        'end_date',
    ];

    public function waterSource()
    {
        return $this->belongsTo(
            WaterSource::class,
            'fk_id_water_source',
            'id'
        );
    }

    public function voucher()
    {
        return $this->belongsTo(
            Voucher::class,
            'fk_id_voucher',
            'id'
        );
    }
}
