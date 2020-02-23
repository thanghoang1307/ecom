<?php

namespace App\Repositories\Admin;

use App\Repositories\Admin\BannerInterface;
use App\Repositories\EloquentRepository;
use Illuminate\Support\Facades\DB;

class BannerRepository extends EloquentRepository implements BannerInterface {

	public function getModel() {
		return \App\Models\Admin\Banner::class;
	}
}