<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Request
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Request newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Request newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Request query()
 * @mixin \Eloquent
 * @property int $id
 * @property string $description
 * @property string $last_name
 * @property int $fk_id_user
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Request whereAttended($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Request whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Request whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Request whereFkIdUser($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Request whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Request whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Request whereUpdatedAt($value)
 * @property int $fk_id_status_request
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\FollowRequest[] $followRequests
 * @property-read \App\Models\StatusRequest $statusRequest
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Request whereFkIdStatusRequest($value)
 */
class Request extends Model
{
    protected $table = "request";

    public function user()
    {
        return $this->belongsTo(
            User::class,
            'fk_id_user',
            'id'
        );
    }

    public function statusRequest()
    {
        return $this->belongsTo(
            StatusRequest::class,
            'fk_id_status_request',
            'id'
        );
    }

    public function followRequests()
    {
        return $this->hasMany(
            FollowRequest::class,
            'fk_id_request',
            'id'
        );
    }

}
