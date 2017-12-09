<?php

class PostsIndexPageTest extends TestCase
{
    use InteractsWithDatabase, CreatesUser;

    /** @test */
    public function testPostIndex()
    {
        $this->user = factory(\App\Models\User::class)->make();

        $this->be($this->user);
        $response = $this->get(route('canvas.admin.post.index'));
        $response->assertStatus(200);
        $response->assertDontSee('Sign in');
    }
}
