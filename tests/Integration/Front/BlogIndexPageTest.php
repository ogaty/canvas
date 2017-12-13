<?php

class BlogIndexPageTest extends TestCase
{
    use InteractsWithDatabase, CreatesUser;

    /** @test */
    public function blog_front()
    {
        $response = $this->get(route('canvas.home'));
        $response->assertStatus(200);
    }
}
