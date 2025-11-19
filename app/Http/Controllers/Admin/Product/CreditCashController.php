<?php

namespace App\Http\Controllers\Admin\Product;

use App\Entity\Organization\Bank;
use App\Entity\Product\CreditCash;
use App\Entity\Product\Meta\CreditCashBid;
use App\Entity\Seo\Seo;
use App\Http\Controllers\Admin\BaseAdminController;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Product\CreditCashRequest;
use App\UseCases\Admin\Product\CreditCashService;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class CreditCashController extends BaseAdminController
{

    protected $service;

    public function __construct(CreditCashService $service)
    {
        $this->service = $service;
    }


    public function index(Request $request)
    {
        $query = CreditCash::query();

        $this->setSearchQuery($query, $request->input('search'));

        $credits = $query->paginate(config('settings.perPage'));

        return view('admin.product.credit_cash.list', compact('credits'));
    }

    public function create()
    {
        $creditCash = new CreditCash();
        $banks = Bank::all()->pluck('name', 'id');
        $documents = [''];
        $bids = collect([new CreditCashBid()]);
        $seo = new Seo();
        return view('admin.product.credit_cash.create', compact('creditCash', 'banks', 'documents', 'bids', 'seo'));
    }

    public function store(CreditCashRequest $request)
    {

        if( $creditCash = $this->service->create($request->all()) )
            return redirect()->route('admin.products.credit-cash.index')->with('success', 'Продукт был удачно создан!');
        else
            return back()->with('error', 'Не удалось создать продукт, попробуйте ещё раз!')->withInput();
    }

    public function edit(CreditCash $creditCash)
    {
        $banks = Bank::all()->pluck('name', 'id');
        $documents = $creditCash->getDocuments();
        $bids = $creditCash->bids;
        $seo = $creditCash->seo ?: new Seo();
        return view('admin.product.credit_cash.edit', compact('creditCash', 'banks', 'documents', 'bids', 'seo'));
    }

    public function update(CreditCashRequest $request, CreditCash $creditCash)
    {
        $msg = ['error' => 'Не удалось обновить продукт, попробуйте ещё раз!'];

        if($creditCash = $this->service->update($creditCash, $request->all()))
            $msg = ['success' => 'Продукт был удачно обновлен!'];

        return redirect()->route('admin.products.credit-cash.edit', $creditCash)->with($msg);
    }

    public function destroy(CreditCash $creditCash)
    {
        $name = $creditCash->name;
        $msg = ['error' => 'Не удалось удалить Продукт: '.$name.'! Попробуйте ещё раз!'];

        if ($creditCash->delete())
            $msg = ['success' => 'Продукт: '.$name.' был удален!'];

        return redirect()->route('admin.products.credit-cash.index')->with($msg);
    }

    public function all(Request $request)
    {
        $msg = ['error' => 'Не удалось удалить все продукты, попробуйте ещё раз!'];

        if($this->service->deleteItems($request->input('ids', [])))
            $msg = ['success' => 'Продукты были удачно удалены!'];

        return back()->with($msg);
    }
}
