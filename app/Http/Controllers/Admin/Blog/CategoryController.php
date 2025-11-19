<?php

namespace App\Http\Controllers\Admin\Blog;

use App\Entity\Blog\Category;
use App\Entity\Seo\Seo;
use App\Http\Controllers\Admin\BaseAdminController;
use App\Http\Requests\Admin\Blog\CategoryRequest;
use App\UseCases\Admin\Blog\CategoryService;
use Illuminate\Http\Request;


class CategoryController extends BaseAdminController
{

    protected $service;

    public function __construct(CategoryService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        $query = Category::query();

        $this->setSearchQuery($query, $request->input('search'));

        $categories = $query->paginate(config('settings.perPage'));

        return view('admin.blog.categories.list', compact('categories'));
    }


    public function create()
    {
        return view('admin.blog.categories.create', [
            'category' => new Category(),
            'seo' => new Seo(),
            'categories' => Category::pluck('name', 'id')->all(),
        ]);
    }

    public function store(CategoryRequest $request)
    {
        if($this->service->create($request->all())){
            return redirect()->route('admin.blog.categories.index')->with('success', 'Категория была удачно создана!');
        } else {
            return back()->with('error', 'Не удалось создать категорию, попробуйте ещё раз!')->withInput();
        }

    }

    public function edit(Category $category)
    {
        return view('admin.blog.categories.edit', [
            'category' => $category,
            'seo' => $category->seo,
            'categories' => Category::whereKeyNot($category->id)->pluck('name', 'id')->all(),
        ]);
    }

    public function update(CategoryRequest $request, Category $category)
    {
        if($category = $this->service->update($category, $request->all())){
            return redirect()->route('admin.blog.categories.edit', $category)->with('success', 'Категория была удачно обновлена!');
        } else {
            return back()->with('error', 'Не удалось обновить категорию, попробуйте ещё раз!')->withInput();
        }

    }

    public function destroy(Category $category)
    {
        $name = $category->name;
        //$this->service->flushCache('categories');
        if ($category->delete()){
            return redirect()->route('admin.blog.categories.index')->with('success', 'Категория: '.$name.' была удалена!');
        } else {
            return redirect()->route('admin.blog.categories.index')->with('error', 'Не удалось удалить категорию: '.$name.'! Попробуйте ещё раз!');
        }

    }

    public function all(Request $request)
    {
        if($this->service->deleteItems($request->input('ids', []))){
            return back()->with('success', 'Категории были удачно удалены!');
        } else {
            return back()->with('error', 'Не удалось удалить все категории, попробуйте ещё раз!');
        }
            
    }
}
