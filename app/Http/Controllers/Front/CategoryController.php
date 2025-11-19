<?php

namespace App\Http\Controllers\Front;

use App\Entity\Blog\Category;
use App\Entity\Blog\Post;
use App\Entity\Seo\Seo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;

class CategoryController extends Controller
{

    public function all(Request $request)
    {
        /*$cacheKey = 'all:posts'.$request->input('page');

        $posts = Cache::tags(['posts'])->remember($cacheKey, 21600, function (){
            return Post::with(['categories', 'user', 'tags', 'media'])->public()->select(['id', 'slug', 'name', 'public_date', 'views', 'excerpt'])->defaultOrdered()->simplePaginate(config('settings.perPage'));
        });*/

        $posts = Post::with(['media', 'tags'])->public()->simplePaginate(5);

        $categories = Category::has('posts')->get();

        $readAlsoPosts = Post::with(['media'])->orderByDesc('views')->public()->limit(4)->get();

        if($request->ajax()){
            return response()->json([
                'content' => view('front.partials.category_post', compact('posts'))->render(),
                'paginator' => $posts,
            ]);
        }

        $this->setSeo(Seo::whereSeoeableType('news')->first());

        return view('front.blog.category_all', compact('posts', 'readAlsoPosts', 'categories'));
    }

    public function single(Request $request, Category $category)
    {

        /*$category = Category::whereSlug($slug)->firstOrFail();

        $cacheKey = 'category:'.$category->id.':posts'.$request->input('page');

        $posts = Cache::tags(['posts'])->remember($cacheKey, 21600, function () use ($category){
            return $category->posts()->with(['categories', 'user', 'tags', 'media'])->public()->select(['id', 'slug', 'name', 'public_date', 'views', 'excerpt'])->defaultOrdered()->simplePaginate(config('settings.perPage'));
        });*/

        $posts = $category->posts()->with(['media', 'tags'])->public()->simplePaginate(5);

        $categories = Category::has('posts')->get();

        $readAlsoPosts = Post::with(['media'])->orderByDesc('views')->public()->limit(4)->get();

        if($request->ajax()){
            return response()->json([
                'content' => view('front.partials.category_post', compact('posts'))->render(),
                'paginator' => $posts,
            ]);
        }

        $this->setSeo($category->seo);

        $currentCategory = $category;

        return view('front.blog.category_all', compact('posts', 'readAlsoPosts', 'categories', 'currentCategory'));
    }
}
