<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * App\Models\Penalty
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Penalty newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Penalty newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Penalty query()
 * @mixin \Eloquent
 * @property int $id
 * @property string $date
 * @property string $description
 * @property float $amount
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon $deleted_at
 * @property int $fk_id_water_source
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Penalty whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Penalty whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Penalty whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Penalty whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Penalty whereFkIdWaterSource($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Penalty whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Penalty whereUpdatedAt($value)
 */
class Penalty extends Model
{
    use SoftDeletes;
    protected $table = "penalty";

    protected $fillable = [
        'amount',
        'description'
    ];

    protected $dates = [
            'deleted_at'
        ];

    protected $casts = [
        'deleted_at' => 'date:Y-m-d',
    ];

    public static function rules()
    {
        return [
            'amount' => 'required|numeric'
        ];
    }

    public static function messages()
    {
        return [
            'amount.required' => 'El campo es requerido',
            'amount' => 'Ingrese un valor númerico.'
        ];
    }

    public function waterSource()
    {
        return $this->belongsTo(
            WaterSource::class,
            'fk_id_water_source',
            'id'
        );
    }
}
