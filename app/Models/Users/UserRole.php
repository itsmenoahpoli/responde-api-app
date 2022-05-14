<?php

namespace App\Models\Users;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    use HasFactory;

    protected $guarded = [];

    /** Relationships */
    public function users()
    {
        return $this->hasMany('App\Models\User');
    }
}
