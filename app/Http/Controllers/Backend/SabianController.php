<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Session;
use App\Models\Post;
use App\Jobs\PostFormFields;
use App\Http\Controllers\Controller;
use App\Http\Requests\SabianCreateRequest;
use App\Http\Requests\SabianUpdateRequest;

class SabianController extends Controller
{
    public function index()
    {
        $data = Post::where('custom_code', 'sabian')->get();

        return view('backend.sabian.index', compact('data'));
    }

    public function create()
    {
        $data = $this->dispatch(new PostFormFields());

        return view('backend.sabian.create', $data);
    }

    public function store(SabianCreateRequest $request)
    {
        $post = Post::create($request->postFillData());
        $post->syncTags($request->get('tags', []));

        $request->session()->put('_new-post', trans('canvas::messages.create_success', ['entity' => 'post']));

        return redirect()->route('canvas.admin.sabian.edit', $post->id);
    }

    public function edit($id)
    {
        $data = $this->dispatch(new PostFormFields($id));

        return view('backend.sabian.edit', $data);
    }

    public function update(SabianUpdateRequest $request, $id)
    {
        $post = Post::findOrFail($id);
        $post->fill($request->postFillData());
        $post->save();
        $post->syncTags($request->get('tags', []));

        $request->session()->put('_update-post', trans('canvas::messages.update_success', ['entity' => 'Post']));

        return redirect()->route('canvas.admin.sabian.edit', $id);
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->tags()->detach();
        $post->delete();

        $request->session()->put('_delete-post', trans('canvas::messages.delete_success', ['entity' => 'Post']));

        return redirect()->route('canvas.admin.sabian.index');
    }

}
