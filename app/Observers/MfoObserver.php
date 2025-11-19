<?php
/**
 * User: Gamma-iron
 * Date: 18.02.2020
 */

namespace App\Observers;


use App\Entity\Organization\Mfo;

class MfoObserver extends BaseObserver
{
    protected $cacheTags = ['mfos'];

    public function saved(Mfo $mfo)
    {
        $this->clearCache($this->cacheTags);
    }

    public function deleted(Mfo $mfo)
    {
        $this->clearCache($this->cacheTags);
    }
}
