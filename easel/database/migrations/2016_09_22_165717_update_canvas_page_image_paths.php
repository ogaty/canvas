<?php

use Illuminate\Database\Migrations\Migration;

class UpdateCanvasPageImagePaths extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \App\Models\Post::chunk(20, function (\Illuminate\Support\Collection $posts) {
            $posts->each(function (\App\Models\Post $post) {
                if (! starts_with($post->page_image, '/storage/')) {
                    $post->page_image = '/storage/'.$post->page_image;
                    $post->save();
                }
            });
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \App\Models\Post::chunk(20, function (\Illuminate\Support\Collection $posts) {
            $posts->each(function (\App\Models\Post $post) {
                if (starts_with($post->page_image, '/storage/')) {
                    $post->page_image = str_replace('/storage/', '', $post->page_image);
                    $post->save();
                }
            });
        });
    }
}
