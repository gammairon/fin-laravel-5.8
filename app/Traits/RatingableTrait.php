<?php
/**
 * User: Gamma-iron
 * Date: 04.03.2020
 */

namespace App\Traits;


use App\Entity\Rating;
use Illuminate\Database\Eloquent\SoftDeletes;

trait RatingableTrait
{

    public static function bootRatingableTrait()
    {
        static::deleting(function ($entity) {

            if (in_array(SoftDeletes::class, class_uses_recursive($entity))) {
                if (! $entity->forceDeleting) {
                    return;
                }
            }

            if($entity->rating)
                $entity->rating()->delete();
        });

        static::created(function ($entity) {
            Rating::create([
                'ratingable_id' => $entity->id,
                'ratingable_type' => static::class,
            ]);
        });
    }

    public function rating()
    {
        return $this->morphOne('App\Entity\Rating', 'ratingable');
    }

    /**
     *
     * @param $rating - Количество балов проставленное одним учасником за один раз
     */
    public function setReting($rating)
    {
        if(!is_numeric($rating))
            return;

        $this->votes += 1;
        $this->total += $rating;
        $this->average += $this->total / $this->votes;

        return $this;
    }

}
