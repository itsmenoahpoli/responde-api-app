<?php

namespace App\Repositories\Interfaces;

interface IEmergencySosRepository
{
    public function getAllEmergencySos(object $query);

    public function createEmergencySos(object $data);

    public function getEmergencySosById(int $emergencySosId);

    public function updateEmergencySosById(int $emergencySosId);
}
