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

        for ($e = 0; $e < count($emergencyTypes); $e++)
        {
            $emergencyCode = $e + 1;

            EmergencyType::create([
                'code' => "EMRGNCY-{$this->formatDigit($emergencyCode)}",
                'name' => $emergencyTypes[$e],
                'is_enabled' => 1
            ]);
        }
    }

    public function formatDigit(int $digit)
    {
        if ($digit < 10)
        {
            return '00'.$digit;
        }

        if ($digit > 10)
        {
            return '0'.$digit;
        }

        return $digit;
    }
}
