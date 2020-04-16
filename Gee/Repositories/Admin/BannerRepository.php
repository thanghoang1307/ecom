<?php

namespace App\Repositories\Admin;

use App\Repositories\Admin\BannerInterface;
use App\Repositories\EloquentRepository;
use Illuminate\Support\Facades\DB;

class BannerRepository extends EloquentRepository implements BannerInterface {

	public function getModel() {
		return \App\Models\Admin\Banner::class;
	}

	public function getTopBanner() {
		return $this->_model->where('position_id',7)->first();
	}

	public function getMainBanner() {
		return $this->_model->where('position_id',1)->get();
	}

	public function getSubBanner1() {
		return $this->_model->where('position_id',2)->first();
	}

	public function getSubBanner2() {
		return $this->_model->where('position_id',3)->first();
	}

	public function getSubBanner3() {
		return $this->_model->where('position_id',4)->first();
	}

	public function getMiddleBanner1() {
		return $this->_model->where('position_id',5)->get();
	}

	public function getMiddleBanner2() {
		return $this->_model->where('position_id',6)->get();
	}
}