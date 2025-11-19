<?php

namespace App\Http\Controllers\Admin\Organization;

use App\Entity\Organization\Mfo;
use App\Entity\Seo\Seo;
use App\Http\Controllers\Admin\BaseAdminController;
use App\Http\Requests\Admin\Organization\MfoRequest;
use App\UseCases\Admin\Organization\MfoService;
use Illuminate\Http\Request;

class MfoController extends BaseAdminController
{

    protected $service;

    public function __construct(MfoService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        $query = Mfo::query();

        $this->setSearchQuery($query, $request->input('search'));

        $mfos = $query->paginate(config('settings.perPage'));

        return view('admin.organization.mfo.list', compact('mfos'));
    }


    public function create()
    {
        return view('admin.organization.mfo.create', [
            'mfo' => new Mfo(),
            'seo' => new Seo(),
        ]);
    }


    public function store(MfoRequest $request)
    {
        if( $organization = $this->service->create($request->all()) )
            return redirect()->route('admin.organizations.mfo.index')->with('success', 'МФО был удачно создан!');
        else
            return back()->with('error', 'Не удалось создать МФО, попробуйте ещё раз!')->withInput();
    }

    public function edit(Mfo $mfo)
    {
        return view('admin.organization.mfo.edit', [
            'mfo' => $mfo,
            'seo' => $mfo->seo ?:new Seo(),
        ]);
    }


    public function update(MfoRequest $request, Mfo $mfo)
    {
        if($mfo = $this->service->update($mfo, $request->all()))
            return redirect()->route('admin.organizations.mfo.edit', $mfo)->with(['success' => 'МФО был удачно обновлен!']);
        else
            return back()->with(['error' => 'Не удалось обновить МФО, попробуйте ещё раз!'])->withInput();
    }

    public function destroy(Mfo $mfo)
    {
        $name = $mfo->name;

        $msg = ['error' => 'Не удалось удалить МФО: '.$name.'! Попробуйте ещё раз!'];

        if ($mfo->delete())
            $msg = ['success' => 'МФО: '.$name.' был удален!'];

        return redirect()->route('admin.organizations.mfo.index')->with($msg);

    }

    public function all(Request $request)
    {
        $msg = ['error' => 'Не удалось удалить все МФО, попробуйте ещё раз!'];

        if($this->service->deleteItems($request->input('ids', [])))
            $msg = ['success' => 'МФО были удачно удалены!'];

        return back()->with($msg);
    }
}
