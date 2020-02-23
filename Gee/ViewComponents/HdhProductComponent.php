<?php
namespace App\ViewComponents;

use Illuminate\Support\Facades\View;
use App\Repositories\Prd\CatInterface;
use Illuminate\Contracts\Support\Htmlable;

class HdhProductComponent implements Htmlable {

	protected $cat;
	protected $type;
	protected $cat_id;
	public function __construct(CatInterface $cat){
		$this->cat = $cat;
	}

	public function toHtml(){
	$title = 'Hệ điều hành';
	return View::make('components.cat')->with(['prds' => $this->cat->getPrdByCat(1),
'cat' => $this->cat->find(1)])->render();
	}

}