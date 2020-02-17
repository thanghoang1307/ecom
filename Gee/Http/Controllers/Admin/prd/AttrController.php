<?php

namespace App\Http\Controllers\Admin\Prd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller as Controller;
use App\Repositories\Prd\AttrInterface;

class AttrController extends Controller
{
    protected $attr;
    public function __construct(AttrInterface $attr){
    $this->attr = $attr;
    }

    public function index()
    {
        $attrs = $this->attr->getAll();
        return view('admin.attr.index',compact('attrs'));
    }

    public function create(Request $request)
    {   
        $request['is_required'] =  $request['is_required'] == "on" ? 1 : 0;
        $request['is_looped'] = $request['is_looped'] == "on" ? 1 : 0;
       
        $attr = $this->attr->create($request->all());
        return redirect()->route('admin.attr.edit',$attr->id);
    }

    public function edit($id)
    {   
        $attr = $this->attr->find($id);
        return view('admin.attr.edit',compact('attr'));
    }

    public function update(Request $request, $id)
    {   
        $request['is_required'] =  $request['is_required'] == "on" ? 1 : 0;
        $request['is_looped'] = $request['is_looped'] == "on" ? 1 : 0;
        
        $attr = $this->attr->update($id, $request->all());
        return redirect()->route('admin.attr.index');
    }
     public function delete($id)
    {
     $attr = $this->attr->delete($id);
    return redirect()->route('admin.attr.index',$id);
    }

   
}
