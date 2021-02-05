<?php

namespace App\Policies;

use App\User;
use App\Operator;
use Illuminate\Auth\Access\HandlesAuthorization;

class OperatorPolicy
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

    public function pass(User $user, Operator $operator){
        return $user->id == $operator->user_id; 
    }
}
