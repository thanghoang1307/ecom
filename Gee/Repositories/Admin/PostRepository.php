<?php

namespace App\Repositories\Admin;

use App\Repositories\Admin\PostInterface;
use App\Repositories\EloquentRepository;
use Illuminate\Support\Facades\DB;

class PostRepository extends EloquentRepository implements PostInterface {

	public function getModel() {
		return \App\Models\Admin\Post::class;
	}

	public function createUniqueSlug($slug){
		$unique_slug = $slug;
		$i = 1;
		while ($this->_model->where('slug',$unique_slug)->count()){
			$unique_slug = $slug.'-'.$i;
			$i++;
		}
		return $unique_slug;
	}
	public function getMore($count){
	return $this->_model->offset($count)->whereIn('post_type',['post','video'])->limit(4)->get();
	}
	public function getNewPost(){
		return $this->_model->whereIn('post_type',['post','video'])->orderBy('created_at','desc')->limit(8)->get();
	}

	public function getNewVideo(){
		return $this->_model->where('post_type','video')->orderBy('created_at','desc')->take(3)->get();
	}

	public function getMostViewed(){
		return $this->_model->whereIn('post_type',['post','video'])->orderBy('view','desc')->take(5)->get();
	}
}