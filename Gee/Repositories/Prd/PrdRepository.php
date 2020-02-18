<?php
namespace App\Repositories\Prd;

use App\Repositories\EloquentRepository;
use App\Repositories\Prd\PrdInterface;
use Illuminate\Support\Facades\DB;

class PrdRepository extends EloquentRepository implements PrdInterface {
	public function getModel(){
	return \App\Models\Prd\Prd::class;
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

	public function addAttr($prd_id, array $attrs_id_array = null) {
	if ($attrs_id_array){
        foreach ($attrs_id_array as $attr_id){
        DB::table('prd_attr_vals')->insert([
        'prd_id' => $prd_id,
        'attr_id' => $attr_id,
        ]);
        }
    }
	}

	public function getAttrsIn($id){
	return $this->find($id)->attrs()->get();
	}

	public function getAttrsInIdArray($id){
	return $this->find($id)->attrs()->pluck('attr_id')->toArray();
	}

	public function deleteAttrFromPrd($attr_id,$prd_id){
	DB::table('prd_attr_vals')->where('attr_id',$attr_id)->where('prd_id',$prd_id)->delete();
	}
}
