<?php
namespace App\ViewComposers;

use Illuminate\View\View;
use App\Repositories\Prd\PrdInterface;


class CartComposer {
protected $prd;
public function __construct(PrdInterface $prd){
$this->prd = $prd;
}

public function compose(View $view){
$carts = session()->get('cart.items');
	if ($carts){
	$ids = array_keys(session()->get('cart.items'));
	$prds = $this->prd->find($ids);
	$total = $this->prd->sumPrice($carts);
	}
	else {
	$prds = [];
	$total = 0;
	}
$view->with([
	'prds' => $prds,
	'total' => $total,
	'carts' => $carts,
]);
}
}