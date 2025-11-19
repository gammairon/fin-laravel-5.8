<?php
/**
 * User: Gamma-iron
 * Date: 18.02.2020
 */

namespace App\Observers;


use App\Entity\Organization\Bank;

class BankObserver extends BaseObserver
{
    protected $cacheTags = ['banks'];

    public function saved(Bank $bank)
    {
        $this->clearCache($this->cacheTags);
    }

    public function deleted(Bank $bank)
    {
        $this->clearCache($this->cacheTags);
    }
}
