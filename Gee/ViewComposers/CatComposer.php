<?php
namespace App\ViewComposers;

use Illuminate\View\View;
use App\Repositories\Prd\CatInterface;
use App\Repositories\Prd\PrdInterface;
use App\Repositories\Admin\BannerInterface;



class CatComposer {
protected $cat;
protected $banner;
protected $prd;
public function __construct(CatInterface $cat, BannerInterface $banner, PrdInterface $prd){
$this->cat = $cat;
$this->banner = $banner;
$this->prd = $prd;
}
public function compose(View $view){
$cats = $this->cat->getAll();
$carts = session()->get('cart.items');
if ($carts){
$cart_key = array_keys(session()->get('cart.items'));
$prds_in_cart = $this->prd->find($cart_key);
$cart_total = $this->prd->sumPrice($carts);
} else {
$prds_in_cart = [];
$cart_total = 0;
}
$view->with([
	'cats' => $cats,
	'prds_in_cart' => $prds_in_cart,
	'carts' => $carts,
	'cart_total' => $cart_total,
	'top_banner' => $this->banner->find(12),
]);
}
}