<?php
namespace App\Repositories\Prd;

use App\Repositories\EloquentRepository;
use App\Repositories\Prd\PrdInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use \DateTime;


class PrdRepository extends EloquentRepository implements PrdInterface {
	public function getModel(){
		return \App\Models\Prd\Prd::class;
	}

	public function getNew($qty){
		return $this->_model->orderBy('created_at','desc')->take($qty)->get();
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

	public function addAttrValue($prd_id,$request)
	{	$attr_default = ['name','sku','brand_id','regular_price','sale_price','short_desc','long_desc','thumb','meta_title','meta_desc','meta_keys','slug','_token','categories','images'];
		$attrs_in = array_diff_key($request, array_flip($attr_default));
		if ($attrs_in){
		foreach ($attrs_in as $code => $value)
		{
			$attr = DB::table('attrs')->where('code',$code)->first();
			switch($attr->type){
				case 'datetime':
				$attrs_in[$attr->code] = [ $attr->type.'_val' => $value ? DateTime::createFromFormat("d/m/Y H:i", $value) : null];
				break;
				case 'date':
				$attrs_in[$attr->code] = [ $attr->type.'_val' => $value ? DateTime::createFromFormat("d/m/Y", $value) : null ];
				break;
				case 'boolean':
				if (count($attrs_in[$attr->code]) == 2){
				$attrs_in[$attr->code] = [ $attr->type.'_val' => true ];
				} else {
					$attrs_in[$attr->code] = [ $attr->type.'_val' => false ];
				}
				
				break;
				default:
				$attrs_in[$attr->code] = [ $attr->type.'_val' => $value ];
			}
			
			$attrs_in[$attr->id] = $attrs_in[$attr->code];
			unset($attrs_in[$attr->code]);
		}
		// Sync chưa sync được những value không có trong database
		
		$this->_model->find($prd_id)->attrs()->sync($attrs_in);}
	}

	public function addCats($id, $request){
	$this->_model->find($id)->cats()->sync($request);
	}

	public function sumPrice($items){
	$total = 0;
	$ids = array_keys($items);
	$prds = $this->find($ids);
	foreach ($prds as $prd) {
	$total += $prd->current_price*$items[$prd->id];
	}
	return $total;
	}
}
