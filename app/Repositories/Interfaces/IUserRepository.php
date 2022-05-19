<?php

namespace App\Repositories\Interfaces;

interface IUserRepository
{
    public function getAllUser(object $query);

    public function getUserById(int $userId);

    public function deleteUserById(int $userId);

    public function createUser(object $data);

    public function updateUser(object $data, int $userId);

    public function getAllUserEmergencies(int $user);

    public function getUserEmergency(int $emergencyId);
}
