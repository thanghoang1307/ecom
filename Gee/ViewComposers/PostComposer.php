<?php
namespace App\ViewComposers;

use Illuminate\View\View;
use App\Repositories\Admin\PostInterface;


class PostComposer {
protected $post;
public function __construct(PostInterface $post){
$this->post = $post;
}
public function compose(View $view){
$posts = $this->post->getNewPost();
$videos = $this->post->getNewVideo();
$most_vieweds = $this->post->getMostViewed();
$view->with([
	'posts' => $posts,
	'videos' => $videos,
	'most_vieweds' => $most_vieweds,
]);
}
}