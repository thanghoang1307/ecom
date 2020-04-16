<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller as Controller;
use App\Repositories\Admin\PostInterface;
use Illuminate\Support\Facades\DB;
use Illumniate\Support\Facades\View;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $post;

    public function __construct(PostInterface $post){
    $this->post = $post;
    }

    public function show($slug)
    {   
        $post = $this->post->find($slug);
        if($post){
        $post->view += 1;
        $post->save();
        return view('front.post-detail',compact('post'));
    } else {
        abort(404);
    }
    }

    public function list(){
        return view('front.post-list');
    }

    public function viewMore(Request $request){
    $posts = $this->post->getMore($request->count);
    $total = $this->post->getAllData()->count();
    return response()->json(['html' => view('components.post-loop', compact('posts'))->render(), 'total' => $total]);
    
    // return response()->view('components.post-loop',['posts' => $posts]);
    }
}
