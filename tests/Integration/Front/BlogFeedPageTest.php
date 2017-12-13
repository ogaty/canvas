<?php

class BlogFeedPageTest extends TestCase
{
    use InteractsWithDatabase, CreatesUser;

    /** @test */
    public function blog_feed_front()
    {
        $response = $this->get(route('canvas.feed'));
        $response->assertStatus(200);
    }
}
