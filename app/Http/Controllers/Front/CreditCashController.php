<?php

namespace App\Http\Controllers\Front;

use App\Entity\Organization\Bank;
use App\Entity\Product\CreditCash;
use App\Entity\Seo\Seo;
use App\UseCases\Front\Product\CreditCashService;
use App\UseCases\JsonLd\Product;
use App\Http\Controllers\Controller;

class CreditCashController extends Controller
{
    private $service;

    public function __construct(CreditCashService $service)
    {
        $this->service = $service;
    }

    public function allCredits()
    {
        /*$banks = Bank::has('creditsCash')->with(['seo', 'media', 'creditsCash' => function($query){
            $query->with(['bids', 'metas'])->orderByDesc('max_amount');
        }])->get();*/
        $credits = CreditCash::with(['media', 'bank', 'bids'])->orderByDesc('rating')->get();

        $seo = Seo::whereSeoeableType('credit_cash_archive')->first();
        $this->setSeo($seo);

        return view('front.product.credit_cash_all', compact( 'credits', 'seo'));
    }

    public function bankCredits(Bank $bank)
    {
        $credits = $bank->creditsCash()->with(['bids', 'metas', 'media', 'bank' => function($query){
            $query->with(['seo', 'media']);
        }])->orderByDesc('rating')->get();


        $seo = $bank->getCreditsPageSeo();

        $this->setSeo($seo);

        return view('front.product.credit_cash_all', compact( 'credits','seo'));
    }

    public function single($bank, $creditCash)
    {
        $creditCash->load(['bank', 'bids', 'metas', 'media']);
        $this->setSeo($creditCash->seo);
        $this->setJsonLd(new Product($creditCash));
        return view('front.product.credit_cash', compact('creditCash', 'bank'));
    }
}
