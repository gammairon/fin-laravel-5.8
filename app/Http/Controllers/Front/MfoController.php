<?php

namespace App\Http\Controllers\Front;

use App\Entity\Organization\Mfo;
use App\Entity\Seo\Seo;
use App\UseCases\JsonLd\Organization;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;

class MfoController extends Controller
{

    public function all()
    {
        $mfos = Mfo::with('media')->orderByDesc('rating')->limit(9)->get();;
        $seo = Seo::whereSeoeableType('mfo')->first();
        $this->setSeo($seo);
        return view('front.organization.mfo_all', compact('mfos', 'seo'));
    }

    public function single(Mfo $mfo)
    {
        list($mfo, $additionalMfos) = Cache::tags(['mfos'])->remember('single:mfo:'.$mfo->id, 43200, function () use ($mfo){
            return [
                $mfo->load(['media', 'seo']),
                Mfo::with(['media'])->where('id', '<>', $mfo->id)->orderByDesc('rating')->limit(4)->get(),
            ];
        });

        $this->setSeo($mfo->seo);
        $this->setJsonLd(new Organization($mfo));

        return view('front.organization.mfo', compact('mfo', 'additionalMfos'));
    }
}
