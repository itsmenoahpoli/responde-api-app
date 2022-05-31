<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Emergencies\EmergencyType;
use App\Models\Emergencies\EmergencySmsTemplate;


class EmergencySmsTemplatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $emergencyTypes = EmergencyType::all();

        foreach ($emergencyTypes as $emergencyType)
        {
            EmergencySmsTemplate::create([
                'emergency_type_id' => $emergencyType->id,
                'code' => 'SMS-'.$emergencyType->code,
                'name' => 'SMS-TEMPLATE-'.$emergencyType->name,
                'message' => $this->makeSmsTemplate($emergencyType)
            ]);
        }
    }

    public function makeSmsTemplate($emergencyType)
    {
        return <<<EOD
            [$emergencyType->code] $emergencyType->name - REPORTED FROM LOCATION: Longtitude 121.023415 Latitude 14.556586 (Makati, Metro Manila, Philippines)
            BY USER user::name AT report::currentTime
        EOD;
    }
}
