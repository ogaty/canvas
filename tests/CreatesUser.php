<?php

use App\Models\User;

trait CreatesUser
{
    /**
     * The user model.
     *
     * @var Canvas\Models\User
     */
    private $user;

    /**
     * Create the user model test subject.
     *
     * @return void
     */
    public function createUser()
    {
        $this->user = factory(User::class)->create();
        //$this->user = factory(User::class)->make();
        //$this->user = new User();
    }
}
