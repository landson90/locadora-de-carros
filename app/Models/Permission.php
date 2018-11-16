<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Profile;

class Permission extends Model
{
    //
    protected $fillable = [
        'name', 'description'
    ];

    public function profiles()
    {
        return $this->belongsToMany(Profile::class);
    }
}
