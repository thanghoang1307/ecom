<?php
namespace App\ViewComposers;

use Illuminate\View\View;
use App\Repositories\Admin\BannerInterface;
use App\Repositories\Admin\SettingInterface;

class SettingComposer
{	
    protected $banner;
    protected $setting;
	public function __construct(BannerInterface $banner, SettingInterface $setting){
        $this->banner = $banner;
        $this->setting = $setting;
	}

    public function compose(View $view)
    {   
        
        $view->with([
            'main_banners' => $this->banner->getMainBanner(),
            'sub_banner_1' => $this->banner->getSubBanner1(),
            'sub_banner_2' => $this->banner->getSubBanner2(),
            'sub_banner_3' => $this->banner->getSubBanner3(),
            'middle_banners_1' => $this->banner->getMiddleBanner1(),
            'middle_banners_2' => $this->banner->getMiddleBanner2(),
            'settings' => $this->setting->getAllData(),
        ]);
    }
}