<?php

namespace App\Http\Controllers\Admin\Prd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller as Controller;
use App\Repositories\Prd\AttrFamilyInterface;
use App\Repositories\Prd\AttrGrInterface;
use App\Repositories\Prd\AttrInterface;
use App\Repositories\Prd\AttrGrMapInterface;

class AttrFamilyController extends Controller
{
	protected $attr_family;
    protected $attr_gr;
    protected $attr;
    protected $attr_gr_map;

	public function __construct(AttrFamilyInterface $attr_family, AttrGrInterface $attr_gr, AttrInterface $attr, AttrGrMapInterface $attr_gr_map){
		$this->attr_family = $attr_family;
        $this->attr_gr = $attr_gr;
        $this->attr = $attr;
        $this->attr_gr_map = $attr_gr_map;
	}
    public function index()
    {
        $attr_families = $this->attr_family->getAll();
        return view('admin.attr_family.index',compact('attr_families'));
    }   

    public function create(Request $request){
        $attr_family = $this->attr_family->create($request->all());
        return redirect()->route('admin.attr_family.edit',$attr_family->id);
    }
    public function edit($id){
        $family = $this->attr_family->find($id);
    $attrs = $this->attr->getAllData()->diff($this->attr->find($family->attr_gr_maps->pluck('attr_id')));
    return view('admin.attr_family.edit',compact('family','attrs'));
    }

    public function createAttrGr(Request $request){
    $attr_gr = $this->attr_gr->create($request->all());
    return redirect()->back();
    }

    public function addAttr(Request $request){
    foreach ($request->except(['attr_gr_id','_token']) as $code => $id){
    $this->attr_gr_map->create([
        'attr_id' => $id,
        'attr_gr_id' => $request->attr_gr_id,
        ]);
    }
    return redirect()->back();
    }

    public function deleteAttrGr($attr_gr_id){
    $this->attr_gr->delete($attr_gr_id);
    return redirect()->back();
    }

    public function deleteAttr($attr_id){
    $this->attr_gr_map->deleteByAttrId($attr_id);
    return redirect()->back();
    }
}
