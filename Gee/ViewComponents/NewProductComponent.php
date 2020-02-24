<?php
namespace App\ViewComponents;

use Illuminate\Support\Facades\View;
use App\Repositories\Prd\PrdInterface;
use Illuminate\Contracts\Support\Htmlable;

class NewProductComponent implements Htmlable {

	protected $prd;
	public function __construct(PrdInterface $prd){
		$this->prd = $prd;
	}

	public function toHtml(){
	$title = 'Sản phẩm mới';
	return View::make('components.new')->with(['prds' => $this->prd->getNew(8),
		'title' => $title])->render();
	}

}