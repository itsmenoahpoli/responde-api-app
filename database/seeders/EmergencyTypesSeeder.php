<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Emergencies\EmergencyType;

class EmergencyTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $emergencyTypes = [
            'BUILDING-COLLAPSE',
            'CONSTRUCTION-ACCIDENTS',
            'ELECTRICAL-ACCIDENTS',
            'MACHINE-ACCIDENTS',
            'STRUCT-BY-ACCIDENTS',
            'CAUGHT-IN-BETWEEN-ACCIDENTS',
            'CRANE-ACCIDENTS',
            'HEAVY-EQUIPMENT-COLLAPSE',
            'SLIPS-TRIPS-FALLS',
            'VEHICLE-ACCIDENTS',
            'LANDSLIDE-ACCIDENTS',
            'FIRE-ACCIDENTS',
            'TERRORIST-ATTACK',
            'VOLCANIC-ERUPTION',
            'OTHERS',
        ];

        foreach ($emergencyTypes as $emergencyType)
        {
            EmergencyType::create([
                'name' => $emergencyType,
                'is_enabled' => 1
            ]);
        }
    }
}
