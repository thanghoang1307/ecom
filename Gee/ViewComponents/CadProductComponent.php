<?php
namespace App\ViewComponents;

use Illuminate\Support\Facades\View;
use App\Repositories\Prd\CatInterface;
use Illuminate\Contracts\Support\Htmlable;

class CadProductComponent implements Htmlable {

	protected $cat;
	public function __construct(CatInterface $cat){
		$this->cat = $cat;
	}

	public function toHtml(){
	return View::make('components.cat')->with(['prds' => $this->cat->getPrdByCat(4),
		'cat' => $this->cat->find(4)])->render();
	}

}