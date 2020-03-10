<?php
namespace App\ViewComposers;

use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

class LocationComposer {

public function compose(View $view){
$cities = DB::table('cities')->get();
$view->with([
	'cities' => $cities,
]);
}
}