<?php

namespace App\Http\Controllers;


use App\Entity\Blog\Category;
use App\Entity\CurrencyRate;
use App\Entity\Organization\Mfo;
use App\Entity\Product\CreditCard;
use App\Entity\Product\CreditCash;
use App\Entity\Seo\Seo;
use App\UseCases\Front\PageService;
use App\UseCases\JsonLd\NewsArticle;
use App\UseCases\JsonLd\WebSite;
use Illuminate\Support\Facades\Cache;
use Lullabot\AMP\AMP;

class HomeController extends Controller
{

    protected $pageService;

    protected $amp;

    public function __construct(PageService $service, AMP $amp)
    {
        $this->pageService = $service;

        $this->amp = $amp;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        list($advices, $questionAnswers) = Cache::tags(['posts'])->rememberForever('front:posts', function (){
            return [
                Category::find(6)->posts()->public()->with(['media'])->select(['id', 'slug', 'name', 'public_date'])->latest('public_date')->limit(4)->get(),
                Category::find(7)->posts()->public()->with(['media'])->select(['id', 'slug', 'name', 'public_date'])->latest('public_date')->limit(4)->get()
            ];
        });

        $cardCredits = Cache::tags(['credit_cards'])->rememberForever('front:credit_cards', function (){
            return CreditCard::with(['bank', 'media'])->limit(3)->get();
        });

        $cashCredits = Cache::tags(['credit_cash'])->rememberForever('front:credit_cash', function (){
            return CreditCash::with(['bank.media', 'media', 'bids'])->limit(3)->get();
        });

        $mfos = Cache::tags(['mfos'])->rememberForever('front:mfos', function (){
            return Mfo::with(['media'])->limit(3)->get();
        });

        $currencyRates = CurrencyRate::all();

        $this->setSeo(Seo::whereSeoeableType(Seo::FRONT_SEO)->first());

        $this->setJsonLd(new WebSite());

        return view('front.home', compact('advices', 'questionAnswers', 'cardCredits', 'cashCredits', 'mfos', 'currencyRates'));
    }


    public function show($slug)
    {
        return $this->pageService->getView($slug);
    }

    public  function showAmp($slug)
    {
        $post = $this->pageService->getPost($slug);
        $this->pageService->setAdditionData($post);
        $this->setJsonLd(new NewsArticle($post));
        $this->amp->loadHtml($post->content);
        return view('front.amp.post', [
            'post' => $post,
            'ampContent' => $this->amp->convertToAmpHtml()
        ]);
    }

    /*public function iformer()
    {
        return view('front.ad.informer37905');
    }*/

}
