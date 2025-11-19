<?php
/**
 * User: Gamma-iron
 * Date: 21.08.2019
 */

namespace App\Entity\Product\Meta;


use Illuminate\Database\Eloquent\Model;

class CreditCashBid extends Model
{

    protected $table = 'credit_cash_bids';

    public $timestamps = false;

    protected $guarded = [];

    //Relations
    public function creditCash()
    {
        return $this->belongsTo('App\Entity\Product\CreditCash');
    }

}
