<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\User
 *
 * @property-read \App\Models\Client $client
 * @property-read \App\Models\Rol $rol
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @mixin \Eloquent
 * @property int $id
 * @property string $username
 * @property string $password
 * @property string $name
 * @property string $last_name
 * @property int $fk_id_rol
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereFkIdRol($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUsername($value)
 */
class User extends Model
{
    protected $table = "user";

    protected $fillable = [
        'username',
        'password',
        'name',
        'last_name',
    ];

    public static function rules($prefix = "")
    {
        return [
            $prefix . 'name' => 'required',
            $prefix . 'last_name' => 'required',
        ];
    }

    public static function messages($prefix = "")
    {
        return [
            $prefix . 'name.required' => 'El campo es requerido',
            $prefix . 'last_name.required' => 'El campo es requerido',
            $prefix . 'username.required' => 'El campo  es requerido',
            $prefix . 'username.unique' => 'El usuario ya existe',
            $prefix . 'password.required' => 'La campo es requerido',
        ];
    }

    public function rol()
    {
        return $this->belongsTo(
            Rol::class,
            'fk_id_rol',
            'id'
        );
    }

    public function client()
    {
        return $this->hasOne(
            Client::class,
            'fk_id_user',
            'id'
        );
    }
}
