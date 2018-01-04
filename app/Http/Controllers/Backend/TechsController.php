<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Session;
use App\Models\Post;
use App\Jobs\PostFormFields;
use App\Http\Controllers\Controller;
use App\Http\Requests\TechsCreateRequest;
use App\Http\Requests\TechsUpdateRequest;


class TechsController extends Controller
{
    public function index()
    {
        $data = Post::where('custom_code', 'techs')->get();

        return view('backend.techs.index', compact('data'));
    }

    public function create()
    {
        $data = $this->dispatch(new PostFormFields());

        return view('backend.techs.create', $data);
    }

    public function store(TechsCreateRequest $request)
    {
        $post = Post::create($request->postFillData());
        $post->syncTags($request->get('tags', []));

        $request->session()->put('_new-post', trans('canvas::messages.create_success', ['entity' => 'post']));

        return redirect()->route('canvas.admin.techs.edit', $post->id);
    }

    public function edit($id)
    {
        $data = $this->dispatch(new PostFormFields($id));

        return view('backend.techs.edit', $data);
    }

    public function update(TechsUpdateRequest $request, $id)
    {
        $post = Post::findOrFail($id);
        $post->fill($request->postFillData());
        $post->save();
        $post->syncTags($request->get('tags', []));

        $request->session()->put('_update-post', trans('canvas::messages.update_success', ['entity' => 'Post']));

        return redirect()->route('canvas.admin.techs.edit', $id);
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->tags()->detach();
        $post->delete();

        $request->session()->put('_delete-post', trans('canvas::messages.delete_success', ['entity' => 'Post']));

        return redirect()->route('canvas.admin.techs.index');
    }

}
