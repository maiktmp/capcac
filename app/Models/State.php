<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\State
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\State newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\State newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\State query()
 * @mixin \Eloquent
 * @property int $id
 * @property string $name
 * @property float $discount
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\State whereDiscount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\State whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\State whereName($value)
 */
class State extends Model
{
    protected $table = "state";

    public static function asMap()
    {
        return self::pluck('name', 'id');
    }
}
