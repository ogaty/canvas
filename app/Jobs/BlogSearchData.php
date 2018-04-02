<?php

namespace App\Jobs;

use Carbon\Carbon;
use App\Models\Tag;
use App\Models\Post;
use App\Models\Settings;
use Illuminate\Queue\SerializesModels;

/**
 * Class BlogIndexData.
 */
class BlogSearchData
{
    use SerializesModels;

    protected $search;

    /**
     * Constructor.
     *
     * @param string|null $tag
     */
    public function __construct($search)
    {
        $this->search = $search;
    }

    /**
     * Execute the command.
     *
     * @return array
     */
    public function handle()
    {
        if ($this->search) {
            return $this->blogSearchData($this->search);
        }

        return $this->normalIndexData();
    }

    /**
     * Return data for a tag index page.
     *
     * @param string $tag
     * @return array
     */
    protected function blogSearchData($search)
    {
        $posts = Post::where('published_at', '<=', Carbon::now())
            ->where('is_published', 1)
            ->where('title', 'like', '%'.$search.'%')
            ->orderBy('published_at', 'desc')
            ->simplePaginate(config('blog.posts_per_page'));

        return [
            'title' => Settings::where('setting_name', 'blog_title')->find(1),
            'subtitle' => Settings::where('setting_name', 'blog_subtitle')->find(1),
            'posts' => $posts,
            'tag' => null,
            'page_image' => config('blog.page_image'),
            'meta_description' => Settings::where('setting_name', 'blog_description')->find(1),
            'reverse_direction' => false,
        ];
    }

    /**
     * Return data for normal index page.
     *
     * @return array
     */
    protected function normalIndexData()
    {
        $posts = Post::with('tags')
            ->where('published_at', '<=', Carbon::now())
            ->where('custom_code', 'blog')
            ->where('is_published', 1)
            ->orderBy('published_at', 'desc')
            ->simplePaginate(config('blog.posts_per_page'));

        return [
            'title' => Settings::where('setting_name', 'blog_title')->find(1),
            'subtitle' => Settings::where('setting_name', 'blog_subtitle')->find(1),
            'posts' => $posts,
            'page_image' => config('blog.page_image'),
            'meta_description' => Settings::where('setting_name', 'blog_description')->find(1),
            'reverse_direction' => false,
            'tag' => null,
        ];
    }
}
