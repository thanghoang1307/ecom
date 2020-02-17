<?php

namespace App\Http\Controllers\Admin\Prd;

use App\Http\Controllers\Controller as Controller;
use Illuminate\Http\Request;
use App\Repositories\Prd\AttrGrInterface;
use App\Repositories\Prd\AttrGrMapInterface;
use App\Repositories\Prd\AttrInterface;

class AttrGrController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $attr_gr;
    protected $attr;
    protected $attr_gr_map;
    public function __construct(AttrGrInterface $attr_gr, AttrInterface $attr, AttrGrMapInterface $attr_gr_map){
    $this->attr_gr = $attr_gr;
    $this->attr_gr_map = $attr_gr_map;
    $this->attr = $attr;
    }

    public function index()
    {   
        $attr_grs = $this->attr_gr->getAll();
        return view('admin.attr_gr.index',compact('attr_grs'));
    }

    public function create(Request $request)
    {
        $attr_gr = $this->attr_gr->create($request->all());
        return redirect()->route('admin.attr_gr.edit',$attr_gr->id);
    }

    public function edit($id)
    {   $attrs_in = $this->attr_gr->getAttrsIn($id);
        $attrs_in_id = $this->attr_gr->getAttrsInIdArray($id);
        $attrs_not_in = $this->attr->getAttrNotIn($attrs_in_id);
        $attr_gr = $this->attr_gr->find($id);
        return view('admin.attr_gr.edit',compact(['attr_gr','attrs_in','attrs_not_in']));
    }

    public function update(Request $request, $id)
    {
        $attr_gr = $this->attr_gr->update($id, $request->all());
        return redirect()->route('admin.attr_gr.index');
    }
    

    public function delete($id)
    {
     $attr_gr = $this->attr_gr->delete($id);
    return redirect()->route('admin.attr_gr.index');
    }

    public function addAttr($id, Request $request){
    $this->attr_gr_map->create(
        [
        'attr_id' => $request->attr_id,
        'attr_gr_id' => $id,
        ]);
    return redirect()->route('admin.attr_gr.edit',$id);
    }

    public function delete_attr($attr_id, $attr_gr_id){
    $this->attr_gr_map->deleteAttrFromAttrGr($attr_id, $attr_gr_id);
    return redirect()->route('admin.attr_gr.edit',$attr_gr_id);
    }
}
