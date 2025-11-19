<?php

namespace App\Http\Controllers\Admin\Organization;

use App\Entity\Blog\Tag;
use App\Entity\Organization\Bank;
use App\Entity\Seo\Seo;
use App\Http\Controllers\Admin\BaseAdminController;
use App\Http\Requests\Admin\Organization\BankRequest;
use App\UseCases\Admin\Organization\BankService;
use Illuminate\Http\Request;

class BankController extends BaseAdminController
{
    protected $service;

    public function __construct(BankService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        $query = Bank::query();

        $this->setSearchQuery($query, $request->input('search'));

        $banks = $query->paginate(config('settings.perPage'));

        return view('admin.organization.bank.list', compact('banks'));
    }

    public function create()
    {
        $bank = new Bank();
        return view('admin.organization.bank.create', [
            'bank' => $bank,
            'seo' => new Seo(),
            'cardsPageSeo' => $bank->getCardsPageSeo(),
            'creditsPageSeo' => $bank->getCreditsPageSeo(),
            'tags' => Tag::select(['id', 'name'])->get(),
        ]);
    }

    public function store(BankRequest $request)
    {
        if( $bank = $this->service->create($request->all()) )
            return redirect()->route('admin.organizations.banks.index')->with('success', 'Банк был удачно создан!');
        else
            return back()->with('error', 'Не удалось создать Банк, попробуйте ещё раз!')->withInput();
    }

    public function edit(Bank $bank)
    {
        return view('admin.organization.bank.edit', [
            'bank' => $bank,
            'seo' => $bank->seo ?:new Seo(),
            'cardsPageSeo' => $bank->getCardsPageSeo(),
            'creditsPageSeo' => $bank->getCreditsPageSeo(),
            'tags' => Tag::select(['id', 'name'])->get(),
        ]);
    }

    public function update(BankRequest $request, Bank $bank)
    {
        if($bank = $this->service->update($bank, $request->all()))
            return redirect()->route('admin.organizations.banks.edit', $bank)->with(['success' => 'Банк был удачно обновлен!']);
        else
            return back()->with(['error' => 'Не удалось обновить Банк, попробуйте ещё раз!']);
    }

    public function destroy(Bank $bank)
    {
        $name = $bank->name;
        $msg = ['error' => 'Не удалось удалить Банк: '.$name.'! Попробуйте ещё раз!'];

        if ($bank->delete())
            $msg = ['success' => 'Банк: '.$name.' был удален!'];

        return redirect()->route('admin.organizations.banks.index')->with($msg);
    }


    public function all(Request $request)
    {
        $msg = ['error' => 'Не удалось удалить все Банки, попробуйте ещё раз!'];

        if($this->service->deleteItems($request->input('ids', [])))
            $msg = ['success' => 'Банки были удачно удалены!'];

        return back()->with($msg);
    }
}
