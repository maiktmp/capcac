<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\WaterSource
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\WaterSource newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\WaterSource newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\WaterSource query()
 * @mixin \Eloquent
 * @property int $id
 * @property string $registration_date
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $fk_id_state
 * @property int $fk_id_client
 * @property int $fk_id_water_source_type
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\WaterSource whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\WaterSource whereFkIdClient($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\WaterSource whereFkIdState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\WaterSource whereFkIdWaterSourceType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\WaterSource whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\WaterSource whereRegistrationDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\WaterSource whereUpdatedAt($value)
 */
class WaterSource extends Model
{
 protected $table = "water_source";
}
