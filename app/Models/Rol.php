<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Rol
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Rol newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Rol newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Rol query()
 * @mixin \Eloquent
 * @property int $id
 * @property string $name
 * @method static \Illuminate\Database\Eloquent\Builder|Rol whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rol whereName($value)
 */
class Rol extends Model
{
    const ADMIN = 1;
    const CLIENT = 2;
    protected $table = "rol";
}
