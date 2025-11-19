<?php
/**
 * User: Gamma-iron
 * Date: 13.03.2020
 */

namespace App\Traits;


use App\Entity\Faq;
use Illuminate\Database\Eloquent\SoftDeletes;

trait FaqableTrait
{

    public static function bootFaqableTrait()
    {
        static::deleting(function ($entity) {

            if (in_array(SoftDeletes::class, class_uses_recursive($entity))) {
                if (! $entity->forceDeleting) {
                    return;
                }
            }

            if($entity->faqs)
                $entity->faqs()->delete();
        });

    }

    public function faqs()
    {
        return $this->morphMany('App\Entity\Faq', 'faqable');
    }

}
