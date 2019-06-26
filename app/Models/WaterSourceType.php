<?php
/**
 * Created by PhpStorm.
 * User: presa
 * Date: 22/06/2019
 * Time: 11:09 PM
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\WaterSourceType
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\WaterSourceType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\WaterSourceType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\WaterSourceType query()
 * @mixin \Eloquent
 * @property int $id
 * @property string $name
 * @property float $price
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\WaterSourceType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\WaterSourceType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\WaterSourceType wherePrice($value)
 */
class WaterSourceType extends Model
{
    protected $table = "water_source_type";


    public static function asMap()
    {
        return self::pluck('name', 'id');
    }
}
