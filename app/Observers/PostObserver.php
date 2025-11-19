<?php

namespace App\Observers;

use App\Entity\Blog\Post;
use Illuminate\Support\Facades\Cache;

class PostObserver extends BaseObserver
{
    protected $cacheTags = ['posts'];

    public function saved(Post $post)
    {
        $this->clearCache($this->cacheTags);
    }

    public function deleted(Post $post)
    {
        $this->clearCache($this->cacheTags);
    }
}
