<?php

namespace App\Repositories;

use App\Repositories\IUserRepository;
use App\Models\User;

class UserRepository extends IUserRepository
{
    protected $model;
    protected $modelRelationships;

    public function __construct(User $model)
    {
        $this->model = $model;
    }
}
