<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Admin\PostInterface;

class PostController extends Controller
{
    protected $post;
    public function __construct(PostInterface $post){
        $this->post = $post;
    }

    public function index()
    {   $posts = $this->post->getAllWithoutScope();
        return view('admin.post.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {   $unique_slug = $this->post->createUniqueSlug(to_slug($request->title));
        $post = $this->post->create(array_merge($request->all(),['slug' => $unique_slug]));

        return redirect()->route('admin.post.edit',$post->slug);
    }

    public function edit($slug)
    {   $post = $this->post->findWithoutScope($slug);
        return view('admin.post.edit',compact('post'));
    }

    public function update(Request $request, $slug)
    {
        $this->post->updateWithoutScope($slug, $request->all());
        return redirect()->route('admin.post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function delete($slug)
    {
        $this->post->deleteWithoutScope($slug);
        return redirect()->route('admin.post.index');
    }
}
