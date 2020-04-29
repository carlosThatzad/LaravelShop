<?php

namespace App\Models;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;
use DB;
use Illuminate\Notifications\Notifiable;
use App\Models\UserRoles;
class User extends Model
{
    use Notifiable,Authenticatable;
    protected $table = 'users';
    protected $fillable = ['name','lastname','email', 'password','telephone','role_id',''];
    protected $hidden = [ 'password', 'remember_token',];
    protected $casts = ['email_verified_at' => 'datetime', ];

    private function rol()
    {
        return $this->belongsTo(UserRoles::class, 'role_id', 'id')->first();
    }
    public function isAdmin()
    {
        return $this->rol()->id == 1 ? true : false;
    }

}
