<?php

namespace App\Policies;

use App\User;
use App\Cause;
use Illuminate\Auth\Access\HandlesAuthorization;

class CausePolicy
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
    
    public function update(User $user, Cause $cause)
    {
        return $user->id == $cause->user_id;
    }
    
    public function create(User $user)
    {
        return $user->id == 1;
    }
}
