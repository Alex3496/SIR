<?php

namespace App\Policies;

use App\User;
use App\Equipment;
use Illuminate\Auth\Access\HandlesAuthorization;

class EquipmentPolicy
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

    public function pass(User $user, Equipment $equipment){
        return $user->id == $equipment->user_id; 
    }
}
