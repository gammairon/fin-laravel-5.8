<?php

namespace App\Http\Controllers\Admin;

use App\Entity\Seo\Seo;
use App\Entity\User\User;
use App\Http\Requests\Admin\User\UserRequest;
use App\UseCases\Admin\User\UserService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UsersController extends BaseAdminController
{
    protected $service;

    public function __construct(UserService $service)
    {
        $this->service = $service;
    }


    public function index(Request $request)
    {
        $query = User::query();

        $this->setSearchQuery($query, $request->input('search'));

        $users = $query->paginate(config('settings.perPage'));

        return view('admin.users.list', compact('users'));
    }

    public function create()
    {
        $roles = Role::all()->reverse();
        $seo = new Seo();
        return view('admin.users.create', compact('roles', 'seo'));
    }

    public function store(UserRequest $request)
    {
        if($this->service->create($request))
            return redirect()->route('admin.users.index')->with('success', 'Пользователь был удачно создан!');
        else
            return back()->with('error', 'Не удалось создать пользователя, попробуйте ещё раз!')->withInput();
    }

    public function edit(User $user)
    {
        $roles = Role::all();
        $userRoleId = $user->getRole()->id;
        $seo = $user->seo ?: new Seo();
        return view('admin.users.edit', compact('roles', 'user', 'userRoleId', 'seo'));
    }

    public function update(UserRequest $request, User $user)
    {
        if($this->service->update($request, $user))
            return back()->with('success', 'Пользователь был удачно обновлен!');
        else
            return back()->with('error', 'Не удалось обновить пользователя, попробуйте ещё раз!')->withInput();
    }

    public function destroy(User $user)
    {
        $userName = $user->name;

        if ($user->delete())
            return redirect()->route('admin.users.index')->with('success', 'Пользователь: '.$userName.' был удален!');
        else
            return redirect()->route('admin.users.index')->with('error', 'Не удалось удалить пользователя: '.$userName.'! Попробуйте ещё раз!');

    }
}
