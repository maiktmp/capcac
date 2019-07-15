<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\WaterSource
 *
 * @method static \Illuminate\Database\Eloquent\Builder|WaterSource newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WaterSource newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WaterSource query()
 * @mixin \Eloquent
 * @property int $id
 * @property string $registration_date
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $fk_id_state
 * @property int $fk_id_client
 * @property int $fk_id_water_source_type
 * @method static \Illuminate\Database\Eloquent\Builder|WaterSource whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WaterSource whereFkIdClient($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WaterSource whereFkIdState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WaterSource whereFkIdWaterSourceType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WaterSource whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WaterSource whereRegistrationDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WaterSource whereUpdatedAt($value)
 * @property string $number
 * @property-read \App\Models\Client $client
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Payment[] $payments
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Penalty[] $penalties
 * @property-read \App\Models\WaterSourceType $waterSourceType
 * @method static \Illuminate\Database\Eloquent\Builder|WaterSource whereNumber($value)
 * @property-read \App\Models\State $state
 */
class WaterSource extends Model
{
    protected $table = "water_source";

    public static function rules()
    {
        return [
            'registration_date' => 'date|required'
        ];
    }

    public static function messages()
    {
        return [
            '*.required' => 'El campo es requerido.',
            '*.numeric' => 'El campo  debe ser de tipo númerico.',
            '*.date' => 'El campo debe ser una fecha.',
            '*.unique' => 'El número ya esta registrado.',
        ];
    }

    public function client()
    {
        return $this->belongsTo(
            Client::class,
            'fk_id_client',
            'id'
        );
    }

    public function waterSourceType()
    {
        return $this->belongsTo(
            WaterSourceType::class,
            'fk_id_water_source_type',
            'id'
        );
    }

    public function state()
    {
        return $this->belongsTo(
            State::class,
            'fk_id_state',
            'id'
        );
    }

    public function penalties()
    {
        return $this->hasMany(
            Penalty::class,
            'fk_id_water_source',
            'id'
        );
    }

    public function payments()
    {
        return $this->hasMany(
            Payment::class,
            'fk_id_water_source',
            'id'
        );
    }

    public function computePayment($startDate, $endDate)
    {
        $months = $this->diffMonths($startDate, $endDate);
        $price = $this->waterSourceType->price;
        $discount = $this->state->discount;

        $total = $price * ((100 - $discount) / 100);
        return $total * $months;

    }

    public static function diffMonths($startDate, $endDate)
    {
//        if ($this->payments->count() !== 0) {
//            $startDate = $this->payments()->orderBy('end_date', 'DESC')->first();
//        }
        $startDate = Carbon::createFromFormat('Y-m-d', $startDate);
        $endDate = Carbon::createFromFormat('Y-m-d', $endDate);
        return $startDate->diffInMonths($endDate);
    }

    public static function diffDays($startDate, $endDate)
    {
        $startDate = Carbon::createFromFormat('Y-m-d', $startDate);
        $endDate = Carbon::createFromFormat('Y-m-d', $endDate);
        return $startDate->diffInDays($endDate);
    }
}
