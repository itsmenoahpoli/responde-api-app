<?php

namespace App\Models\Emergencies;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use F9Web\LaravelDeletable\Traits\RestrictsDeletion;

class EmergencyType extends Model
{
    use HasFactory, RestrictsDeletion;

    protected $guarded = [];

    public function isDeletable() : bool
    {
        return $this->emergencySos->doesntExist();
    }

    /** Relationships */
    public function emergency_sos()
    {
        return $this->hasMany('App\Models\Emergencies\EmergencySos');
    }
}
