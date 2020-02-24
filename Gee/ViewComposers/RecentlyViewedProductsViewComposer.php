<?php
namespace App\ViewComposers;

use Illuminate\View\View;
use App\Repositories\Prd\PrdInterface;

class RecentlyViewedProductsViewComposer
{	
	protected $prd;
	public function __construct(PrdInterface $prd){
		$this->prd = $prd;
	}

    public function compose(View $view)
    {
        $prds = session()->get('products.recently_viewed');
        $view->with([
            'prds' => $this->prd->find($prds) ? $this->prd->find($prds)->take(8) : null,
        ]);
    }
}