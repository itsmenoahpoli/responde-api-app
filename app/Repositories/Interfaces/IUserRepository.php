<?php

namespace App\Repositories\Interfaces;

interface IUserRepository
{
    public function getAllUser($query);

    public function getUserById($id);

    public function deleteUserById($id);

    public function createUser($data);

    public function updateUser($data, $id);
}
