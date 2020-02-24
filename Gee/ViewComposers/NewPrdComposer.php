<?php
namespace App\ViewComposers;

use Illuminate\View\View;
use App\Repositories\Prd\PrdInterface;


class NewPrdComposer {
protected $prd;
public function __construct(PrdInterface $prd){
$this->prd = $prd;
}

public function compose(View $view){
$new_prds = $this->prd->getNew(8);
$view->with([
	'prds' => $new_prds,
]);
}
}