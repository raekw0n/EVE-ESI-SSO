<?php

namespace Mesa;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

/**
 * Mesa\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Passport\Client[] $clients
 * @property-read int|null $clients_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Passport\Token[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Illuminate\Database\Eloquent\Builder|\Mesa\User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Mesa\User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Mesa\User query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Mesa\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Mesa\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Mesa\User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Mesa\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Mesa\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Mesa\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Mesa\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Mesa\User whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class User extends Authenticatable
{
    use Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
