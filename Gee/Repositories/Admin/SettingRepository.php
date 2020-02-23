<?php

namespace App\Repositories\Admin;

use App\Repositories\Admin\SettingInterface;
use App\Repositories\EloquentRepository;

class SettingRepository extends EloquentRepository implements SettingInterface {

	public function getModel() {
		return \App\Models\Admin\Setting::class;
	}

	public function updateSetting(array $settings){
	foreach ($settings as $key => $value){
		$this->find($key)->update(['value' => $value]);
	}
	}
}