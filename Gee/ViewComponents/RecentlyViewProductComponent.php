<?php
namespace App\ViewComponents;

use Illuminate\Support\Facades\View;
use Illuminate\Contracts\Support\Htmlable;
use App\Repositories\Prd\PrdInterface;

class RecentlyViewProductComponent implements Htmlable {

	protected $prd;
	public function __construct(PrdInterface $prd){
		$this->prd = $prd;
	}

	public function toHtml(){
	$prds = session()->get('products.recently_viewed');
	return View::make('components.recently_view')->with(['prds' => $this->prd->find($prds) ? $this->prd->find($prds)->take(8) : null])->render();
	}

}