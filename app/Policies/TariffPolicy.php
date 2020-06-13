<?php

namespace App\Policies;

use App\User;
use App\Tariff;
use Illuminate\Auth\Access\HandlesAuthorization;

class TariffPolicy
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

    public function pass(User $user, Tariff $tariff)
    {
        return $user->id == $tariff->user_id;
    }
}
