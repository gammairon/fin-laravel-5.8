<?php

namespace App\Http\Controllers\Admin\Blog;

use App\Entity\Blog\Category;
use App\Entity\Blog\Post;
use App\Entity\Blog\Tag;
use App\Entity\Seo\Seo;
use App\Entity\User\User;
use App\Http\Controllers\Admin\BaseAdminController;
use App\Http\Requests\Admin\Blog\PostRequest;
use App\UseCases\Admin\Blog\PostService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PostController extends BaseAdminController
{
    protected $service;

    public function __construct(PostService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        $query = Post::with('user')->latest('public_date');

        $this->setSearchQuery($query, $request->input('search'));
        
        $posts = $query->paginate(config('settings.perPage'));

        return view('admin.blog.posts.list', compact('posts'));
    }

    public function create()
    {
        return view('admin.blog.posts.create', [
            'post' => new Post(),
            'categories' => Category::get()->toTree(),
            'tags' => Tag::all(),
            'faqs' => [],
            'seo' => new Seo(),
            'currentUser' => Auth::user(),
            'statuses' => Post::getStatuses(),
            'users' => User::pluck('name', 'id')->all(),
        ]);
    }


    public function store(PostRequest $request)
    {
        if($this->service->create($request->all())){
            return redirect()->route('admin.blog.posts.index')->with('success', 'Пост был удачно создан!');
        } else {
            return back()->with('error', 'Не удалось создать пост, попробуйте ещё раз!')->withInput();
        }

    }

    public function edit(Post $post)
    {
        return view('admin.blog.posts.edit', [
            'post' => $post,
            'faqs' => $post->faqs,
            'seo' => $post->seo,
            'categories' => Category::get()->toTree(),
            'tags' => Tag::all(),
            'statuses' => Post::getStatuses(),
            'users' => User::pluck('name', 'id')->all(),
        ]);
    }

    public function update(PostRequest $request, Post $post)
    {
        if($post = $this->service->update($post, $request->all())){
            return redirect()->route('admin.blog.posts.edit', $post)->with('success', 'Пост был удачно обновлен!');
        } else {
            return back()->with('error', 'Не удалось обновить пост, попробуйте ещё раз!')->withInput();
        }

    }

    public function destroy(Post $post)
    {
        $name = $post->name;

        if ($post->delete()){
            return redirect()->route('admin.blog.posts.index')->with('success', 'Пост: '.$name.' был удален!');
        } else {
            return redirect()->route('admin.blog.posts.index')->with('error', 'Не удалось удалить пост: '.$name.'! Попробуйте ещё раз!');
        }

    }

    public function all(Request $request)
    {
        if ($this->service->deleteItems($request->input('ids', []))){
            return back()->with('success', 'Посты были удачно удалены!');
        } else {
            return back()->with('error', 'Не удалось удалить все посты, попробуйте ещё раз!');
        }
    }
}
