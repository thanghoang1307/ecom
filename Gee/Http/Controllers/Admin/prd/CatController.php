<?php

namespace App\Http\Controllers\Admin\Prd;

use Illuminate\Http\Request;
use App\Repositories\Prd\CatInterface;
use App\Http\Controllers\Controller as Controller;

class CatController extends Controller
{
    protected $cat;

    public function __construct (CatInterface $cat){
        $this->cat = $cat;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $cats = $this->cat->getAll();
        return view('admin.cat.index',compact('cats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $cat = $this->cat->create($request->all());
        return redirect()->route('admin.cat.edit',$cat->id);
    }

    public function edit($id)
    {   $cats = $this->cat->getAll()->except($id);
        $cat = $this->cat->find($id);
        return view('admin.cat.edit',compact(['cat','cats']));
    }

    public function update(Request $request, $id)
    {
        $cat = $this->cat->update($id, $request->all());
        return redirect()->route('admin.cat.index');
    }

    public function delete($id)
    {
     $cat = $this->cat->delete($id);
    return redirect()->route('admin.cat.index');
    }
}
