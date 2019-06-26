<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\FollowRequest
 *
 * @property-read \App\Models\Request $Request
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\FollowRequest newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\FollowRequest newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\FollowRequest query()
 * @mixin \Eloquent
 * @property int $id
 * @property string $comment
 * @property int $fk_id_request
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\FollowRequest whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\FollowRequest whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\FollowRequest whereFkIdRequest($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\FollowRequest whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\FollowRequest whereUpdatedAt($value)
 */
class FollowRequest extends Model
{
    protected $table = "follow_request";

    public function Request()
    {
        return $this->belongsTo(
            Request::class,
            'fk_id_request',
            'id'
        );
    }
}
