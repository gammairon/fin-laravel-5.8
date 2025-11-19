<?php
/**
 * User: Gamma-iron
 * Date: 13.03.2020
 */

namespace App\Entity;


use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    protected $table = 'faqs';

    protected $guarded = [];

    public $timestamps = false;


    public function faqable()
    {
        return $this->morphTo();
    }
}
