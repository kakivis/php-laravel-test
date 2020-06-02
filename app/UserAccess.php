<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\UserAccess
 *
 * @property int $id
 * @property string $last_login
 * @property int $user_id
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserAccess newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserAccess newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserAccess query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserAccess whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserAccess whereLastLogin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserAccess whereUserId($value)
 * @mixin \Eloquent
 */
class UserAccess extends Model {

    public $timestamps = false;
}
