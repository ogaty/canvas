<?php

use Easel\Models\User;

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
     * @before
     * @return void
     */
    public function createUser()
    {
        //$this->user = factory(Easel\Models\User::class)->create();
        //$this->user = factory(Easel\Models\User::class)->make();
        $this->user = new User();
    }
}
