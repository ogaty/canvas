<?php

use App\Models\Tag;
use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;

trait InteractsWithDatabase
{
    use DatabaseTransactions;

    /**
     * Set up the test environment.
     *
     * @return void
     */
    protected function setUp()
    {
        parent::setUp();

        // Disable searchable trait to speed up tests.
        Post::disableSearchSyncing();
        Tag::disableSearchSyncing();
        User::disableSearchSyncing();

        $this->runDatabaseMigrations();

        $this->seed(TestDatabaseSeeder::class);
    }

    /**
     * Define hooks to migrate the database before and after each test.
     *
     * @return void
     */
    public function runDatabaseMigrations()
    {
        $this->artisan('migrate');

        $this->beforeApplicationDestroyed(function () {
            $this->artisan('migrate:reset');
        });
    }
}
