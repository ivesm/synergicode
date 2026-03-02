<?php 

namespace App\Actions;

use App\Models\User;

class CreateUser
{
    public function execute(array $data): User
    {
        
        return User::create($data);
    }
}