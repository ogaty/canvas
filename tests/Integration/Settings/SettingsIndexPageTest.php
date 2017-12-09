<?php

class SettingsIndexPageTest extends TestCase
{
    use InteractsWithDatabase, CreatesUser;

    /** @test */
    public function testSettingIndex()
    {
        $this->user = factory(\App\Models\User::class)->make();

        $this->be($this->user);
        $response = $this->get(route('canvas.admin.settings'));
        $response->assertStatus(200);
        $response->assertDontSee('Sign in');
    }
}
