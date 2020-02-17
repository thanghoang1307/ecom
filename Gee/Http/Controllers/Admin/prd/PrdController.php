<?php

namespace App\Http\Controllers\Admin\Prd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller as Controller;
use App\Repositories\Prd\PrdInterface;
use App\Repositories\Prd\AttrGrInterface;

class PrdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $prd;
    protected $attr_gr;

    public function __construct(PrdInterface $prd, AttrGrInterface $attr_gr){
    $this->prd = $prd;
    $this->attr_gr = $attr_gr;
    }

    public function index()
    {   $prds = $this->prd->getAll();
        $attr_grs = $this->attr_gr->getAll();
        return view('admin.prd.index',compact(['prds','attr_grs']));
    }

    public function create(Request $request)
    {
        $prd = $this->prd->create($request->all());
        return redirect()->route('admin.prd.edit',$prd->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Prd  $prd
     * @return \Illuminate\Http\Response
     */
    
    public function edit($id)
    {
        $prd = $this->prd->find($id);
        return view('admin.prd.edit',compact('prd'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Prd  $prd
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Prd $prd)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Prd  $prd
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
     $prd = $this->prd->delete($id);
    return redirect()->route('admin.prd.index');
    }
}
