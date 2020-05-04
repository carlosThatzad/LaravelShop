<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

final class UserRoles extends Model
{
    protected $table = 'users_roles';
    protected $fillable = [ 'name'];


    public function role()
    {
        return $this->hasMany(User::class, 'role_id', 'id');
    }

}
