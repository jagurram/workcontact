<?php

namespace App\Events;

use App\User;

class UserCreated
{

    public $user;

    /**
     * Create a new event instance.
     *
     * @param \App\User $user
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }
}