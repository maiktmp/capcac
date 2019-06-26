<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;


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
    protected $table = "penalty";
}
