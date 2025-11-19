<?php
/**
 * User: Gamma-iron
 * Date: 18.02.2020
 */

namespace App\Observers;


use App\Entity\Product\CreditCard;

class CreditCardObserver extends BaseObserver
{
    protected $cacheTags = ['credit_cards'];

    public function saved(CreditCard $creditCard)
    {
        $this->clearCache($this->cacheTags);
    }

    public function deleted(CreditCard $creditCard)
    {
        $this->clearCache($this->cacheTags);
    }
}
