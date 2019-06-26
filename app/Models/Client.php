<?php
/**
 * Created by PhpStorm.
 * User: presa
 * Date: 22/06/2019
 * Time: 10:39 PM
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Client
 *
 * @property-read \App\Models\User $user
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\WaterSource[] $waterSources
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Client newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Client newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Client query()
 * @mixin \Eloquent
 * @property int $id
 * @property string $cellphone
 * @property string $street
 * @property int $ext_num
 * @property int $int_num
 * @property string $colony
 * @property string $town
 * @property string $zip_address
 * @property int $fk_id_user
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Client whereCellphone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Client whereColony($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Client whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Client whereExtNum($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Client whereFkIdUser($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Client whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Client whereIntNum($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Client whereStreet($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Client whereTown($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Client whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Client whereZipAddress($value)
 */
class Client extends Model
{
    protected $table = "client";
    protected $fillable = [
        'cellphone',
        'street',
        'ext_num',
        'int_num',
        'colony',
        'town',
        'zip_address',
        'email',
    ];

    public static function rules($prefix = "")
    {
        return [
            $prefix . '*' => 'required',
            $prefix . 'int_num' => 'nullable',
        ];
    }

    public static function messages($prefix = "")
    {
        return [$prefix . '*.required' => 'El campo es requerido'];
    }

    public function user()
    {
        return $this->belongsTo(
            User::class,
            'fk_id_user',
            'id'
        );
    }

    public function waterSources()
    {
        return $this->hasMany(
            WaterSource::class,
            'fk_id_client',
            'id'
        );
    }
}
