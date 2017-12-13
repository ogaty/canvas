<?php

class BlogXmlPageTest extends TestCase
{
    use InteractsWithDatabase, CreatesUser;

    /** @test */
    public function blog_front()
    {
        $response = $this->get(route('canvas.sitemap'));
        $response->assertStatus(200);
    }
}
