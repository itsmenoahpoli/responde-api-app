<?php

namespace App\Repositories;

use App\Repositories\IUserRepository;
use App\Models\User;
use App\Http\Resources\UserResources;

class UserRepository extends IUserRepository
{
    protected $model;
    protected $modelRelationships;

    public function __construct(User $model)
    {
        $this->model = $model;
        $this->modelRelationships = [
            'user_role',
            'emergencies'
        ];
    }

    public function baseModel()
    {
        return $this->model->with($modelRelationships);
    }

    public function getAllUser($query)
    {
        try
        {
            $users = $this->baseModel()
            ->search($query)
            ->get();

            return new UserResources($users);
        } catch (Exception $e)
        {
            return response()->json(
                $e->getMessage(),
                500
            );
        }
    }
}
