<?php

namespace App\Models\Emergencies;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmergencyLog extends Model
{
    use HasFactory;

    protected $guarded = [];

    /** Relationshps */
    public function emergency_sos()
    {
        return $this->belongsTo('App\Models\Emergencies\EmergencySos');
    }

    public function emergency_type()
    {
        return $this->belongsTo('App\Models\Emergencies\EmergencyType');
    }
}
