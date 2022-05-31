<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Emergencies\EmergencyTypes;
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
        $emergencyTypes = EmergencyTypes::all();

        foreach ($emergencyTypes as $emergencyType)
        {
            EmergencySmsTemplate::create([
                'emergency_type_id' => $emergencyType->id,
                'code' => 'SMS-'.$emergencyType->code,
                'name' => 'SMS-TEMPLATE-'.$emergentyType->name,
                'message' => $this->makeSmsTemplate($emergencyType)
            ]);
        }
    }

    public function makeSmsTemplate($emergentyType)
    {
        return '';
    }
}
