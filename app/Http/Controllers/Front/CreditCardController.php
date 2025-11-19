<?php

namespace App\Http\Controllers\Front;


use App\Entity\Organization\Bank;
use App\Entity\Product\CreditCard;
use App\Entity\Seo\Seo;
use App\UseCases\Front\Product\CreditCardService;
use App\UseCases\JsonLd\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;


class CreditCardController extends Controller
{

    private $service;

    public function __construct(CreditCardService $service)
    {
        $this->service = $service;
    }

    public function allCards(Request $request)
    {

        $cards = CreditCard::with(['media', 'bank', 'metas'])->get();

        $banks = collect($cards->pluck('bank')->keyBy('id')->values());

        $seo = Seo::whereSeoeableType(Seo::CREDIT_CARDS_ARCHIVE_SEO )->first();

        $this->setSeo($seo);

        return view('front.product.credit_card_all', compact( 'cards', 'banks', 'seo'));
    }

    public function bankCards(Request $request, Bank $bank)
    {
        $cards = $bank->creditsCard()->with(['media', 'bank' => function($query){
            $query->with(['seo', 'media']);
        }])->orderByDesc('rating')->get();

        $seo = $bank->getCardsPageSeo();

        $this->setSeo($seo);

        $banks = collect([$bank]);

        return view('front.product.credit_card_all', compact( 'banks','cards', 'seo'));
    }

    public function single($bank, $creditCard)
    {
        list($creditCard, $additionalCards) = Cache::tags(['credit_cards'])->remember('single:credit_card:'.$creditCard->id, 43200, function () use ($bank, $creditCard){
            return [
                $creditCard->load(['bank', 'metas', 'media', 'seo']),
                CreditCard::with(['bank', 'media'])->where('id', '<>', $creditCard->id)->orderBy('max_credit_limit')->limit(4)->get(),
            ];
        });

        $this->setSeo($creditCard->seo);
        $this->setJsonLd(new Product($creditCard));
        return view('front.product.credit_card', compact('creditCard', 'bank', 'additionalCards'));
    }
}
