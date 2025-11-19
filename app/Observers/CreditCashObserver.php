<?php
/**
 * User: Gamma-iron
 * Date: 18.02.2020
 */

namespace App\Observers;


use App\Entity\Product\CreditCash;

class CreditCashObserver extends BaseObserver
{
    protected $cacheTags = ['credit_cash'];

    public function saved(CreditCash $creditCash)
    {
        $this->clearCache($this->cacheTags);
    }

    public function deleted(CreditCash $creditCash)
    {
        $this->clearCache($this->cacheTags);
    }
}
