<?php
namespace App\ViewComposers;

use Illuminate\View\View;
use App\Repositories\Admin\BannerInterface;

class SettingComposer
{	
    protected $banner;
	public function __construct(BannerInterface $banner){
        $this->banner = $banner;
	}

    public function compose(View $view)
    {
        $view->with([
            'main_banner_1' => $this->banner->find(1),
            'main_banner_2' => $this->banner->find(2),
            'main_banner_3' => $this->banner->find(3),
            'main_banner_4' => $this->banner->find(4),
            'sub_banner_1' => $this->banner->find(5),
            'sub_banner_2' => $this->banner->find(6),
            'sub_banner_3' => $this->banner->find(7),
            'middle_banner_1' => $this->banner->find(8),
            'middle_banner_2' => $this->banner->find(9),
            'middle_banner_3' => $this->banner->find(10),
            'middle_banner_4' => $this->banner->find(11),
        ]);
    }
}