<?php
/**
 * User: Gamma-iron
 * Date: 05.03.2020
 */

namespace App\UseCases\Front\Product;


use App\UseCases\BaseService;
use Illuminate\Support\Collection;

class CreditCashService extends BaseService
{

    public function getMinAmount(Collection $banks): int
    {
        $amount = 0;

        foreach ($banks as $bank) {
            if(!$amount)
                $amount = $bank->creditsCash->min('min_amount');
            else
                $amount = $bank->creditsCash->min('min_amount') < $amount ? $bank->creditsCash->min('min_amount'):$amount;
        }
        return $amount;
    }

    public function getMaxAmount(Collection $banks): int
    {
        $amount = 0;

        foreach ($banks as $bank) {
            if(!$amount)
                $amount = $bank->creditsCash->max('max_amount');
            else
                $amount = $bank->creditsCash->max('max_amount') < $amount ? $bank->creditsCash->max('max_amount'):$amount;
        }
        return $amount;
    }
}
