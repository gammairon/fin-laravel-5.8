<?php
/**
 * User: Gamma-iron
 * Date: 14.02.2020
 */

namespace App\Entity;


use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Entity\CurrencyRate
 *
 * @property int $id
 * @property string $txt
 * @property string $cc
 * @property string $exchangedate
 * @property float $old_rate
 * @property float $new_rate
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\CurrencyRate newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\CurrencyRate newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\CurrencyRate query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\CurrencyRate whereCc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\CurrencyRate whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\CurrencyRate whereExchangedate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\CurrencyRate whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\CurrencyRate whereNewRate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\CurrencyRate whereOldRate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\CurrencyRate whereTxt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\CurrencyRate whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class CurrencyRate extends Model
{
    public static $currencyCodes = ['USD', 'EUR', 'RUB', 'PLN'];

    protected $guarded = [];


    protected static function boot() {
        parent::boot();
        static::addGlobalScope('order', function (Builder $builder) {
            $builder->orderBy('ordered');
        });
    }
}
