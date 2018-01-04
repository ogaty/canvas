<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Session;
use App\Models\Post;
use App\Jobs\PostFormFields;
use App\Http\Controllers\Controller;
use App\Http\Requests\GamesCreateRequest;
use App\Http\Requests\GamesUpdateRequest;

class GamesController extends Controller
{
    public function index()
    {
        $data = Post::where('custom_code', 'games')->get();

        return view('backend.games.index', compact('data'));
    }

    public function create()
    {
        $data = $this->dispatch(new PostFormFields());

        return view('backend.games.create', $data);
    }

    public function store(GamesCreateRequest $request)
    {
        $post = Post::create($request->postFillData());
        $post->syncTags($request->get('tags', []));

        $request->session()->put('_new-post', trans('canvas::messages.create_success', ['entity' => 'post']));

        return redirect()->route('canvas.admin.games.edit', $post->id);
    }

    public function edit($id)
    {
        $data = $this->dispatch(new PostFormFields($id));

        return view('backend.games.edit', $data);
    }

    public function update(GamesUpdateRequest $request, $id)
    {
        $post = Post::findOrFail($id);
        $post->fill($request->postFillData());
        $post->save();
        $post->syncTags($request->get('tags', []));

        $request->session()->put('_update-post', trans('canvas::messages.update_success', ['entity' => 'Post']));

        return redirect()->route('canvas.admin.games.edit', $id);
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->tags()->detach();
        $post->delete();

        $request->session()->put('_delete-post', trans('canvas::messages.delete_success', ['entity' => 'Post']));

        return redirect()->route('canvas.admin.games.index');
    }

}
