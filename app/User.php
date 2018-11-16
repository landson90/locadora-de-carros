<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Profile;
use App\Models\Permission;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    public function profiles() 
    {
        return $this->belongsToMany(Profile::class);
    }
    public function hasPermission(Permission $permission)
    {
        return $this->hasProfile($permission->profiles);
    }
    public function hasProfile($profile)
    {
        if(is_string($profile)){
            return $this->profiles()->get()->contains('name', $profile);
        }
        $arrayProfile = $this->profiles;
        //dd($arrayProfile);
        //dd($profile->intersect($arrayProfile)->count());
        return !! $profile->intersect($this->profiles)->count();
    }
    /**intersect
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
