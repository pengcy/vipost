<?php

namespace App\Repositories;

use App\User;

class UserRepository
{
    /**
     * Get all users.
     *
     * @return Collection
     */
    public function getUsers()
    {
        return User::orderBy('created_at', 'asc')
                    ->get();
    }

}
