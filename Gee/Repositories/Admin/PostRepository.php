<?php

namespace App\Repositories\Admin;

use App\Repositories\Admin\PostInterface;
use App\Repositories\EloquentRepository;
use Illuminate\Support\Facades\DB;
use App\Scopes\PostScope;

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

	public function getAllWithoutScope() {
		return $this->_model->withoutGlobalScope(PostScope::class)->paginate(10);
	}

	public function findWithoutScope($id) {
		return $this->_model->withoutGlobalScope(PostScope::class)->find($id);
	}

	public function updateWithoutScope($id, array $attributes) {
		$result = $this->findWithoutScope($id);
		if ($result) {
			$result->update($attributes);
			return $result;
		}
		return false;
	}

	public function deleteWithoutScope($id) {
		$result = $this->findWithoutScope($id);
		if ($result) {
			$result->delete();
			return true;
		}
		return false;
	}
}