<?php
/**
 * Created by PhpStorm.
 * User: presa
 * Date: 09/07/2019
 * Time: 07:54 PM
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\StatusRequest
 *
 * @property int $id
 * @property string $name
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\StatusRequest newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\StatusRequest newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\StatusRequest query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\StatusRequest whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\StatusRequest whereName($value)
 * @mixin \Eloquent
 */
class StatusRequest extends Model
{
    const NEW = 1;
    const IN_PROGRESS= 2;
    const COMPLETED = 3;

    protected $table = "status_request";

}
