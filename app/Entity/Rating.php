<?php
/**
 * User: Gamma-iron
 * Date: 04.03.2020
 */

namespace App\Entity;


use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $guarded = [];

    public $timestamps = false;


    public function ratingable()
    {
        return $this->morphTo();
    }
}
