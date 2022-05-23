<?php

namespace App\Models\Emergencies;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmergencySos extends Model
{
    use HasFactory;

    protected $guarded = [];

    /** Relationships */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function emergency_type()
    {
        return $this->belongsTo('App\Models\Emergencies\EmergencyType');
    }
}
