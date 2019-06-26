<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Request
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Request newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Request newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Request query()
 * @mixin \Eloquent
 * @property int $id
 * @property int $attended
 * @property string $description
 * @property string $last_name
 * @property int $fk_id_user
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Request whereAttended($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Request whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Request whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Request whereFkIdUser($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Request whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Request whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Request whereUpdatedAt($value)
 */
class Request extends Model
{
    protected $table = "request";
}
