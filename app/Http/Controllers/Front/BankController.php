<?php

namespace App\Http\Controllers\Front;

use App\Entity\Organization\Bank;
use App\Entity\Seo\Seo;
use App\Helpers\Common;
use App\Http\Controllers\Controller;
use App\UseCases\JsonLd\Organization;

class BankController extends Controller
{

    public function all()
    {

        $banks = Bank::with('media', 'tag')->orderBy('name')->get();

        //$groupedBanks = Common::groupedBanks($banks);

        $this->setSeo(Seo::whereSeoeableType('banks')->first());

        return view('front.organization.banks_all', ['banks' => $banks]);
    }

    public function single($bank)
    {
        $bank = $bank->load(['media', 'seo']);
        $this->setSeo($bank->seo, $bank);
        $this->setJsonLd(new Organization($bank));

        return view('front.organization.bank', compact('bank'));
    }
}
