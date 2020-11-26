<?php

namespace App\Policies;

use App\User;
use App\Petition;
use Illuminate\Auth\Access\HandlesAuthorization;

class petitionsPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function pass(User $user, Petition $petition){
        return $user->id == $petition->user_id;
    }
}
