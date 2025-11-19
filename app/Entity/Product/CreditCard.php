<?php

namespace App\Entity\Product;


/**
 * App\Entity\Product\CreditCard
 *
 * @property int $id
 * @property int $bank_id
 * @property string $name
 * @property string $slug
 * @property string|null $subtitle
 * @property int $pay_wave
 * @property int $visa
 * @property int $master_card
 * @property int $google_pay
 * @property int $app_store
 * @property float $min_percent_bid
 * @property float $max_percent_bid
 * @property float $min_credit_limit
 * @property float $max_credit_limit
 * @property int $grace_period
 * @property float $service_cost
 * @property float $issue_fee
 * @property string|null $repayment_terms
 * @property string|null $fine
 * @property string|null $insurance
 * @property float $cashback_fee
 * @property string|null $cashback_text
 * @property string|null $additional_features
 * @property int $min_age
 * @property int $max_age
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Entity\Organization\Bank $bank
 * @property-read \Kalnoy\Nestedset\Collection|\App\Entity\Comment[] $comments
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\MediaLibrary\Models\Media[] $media
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Entity\Product\ProductMeta[] $metas
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $organization
 * @property-read \App\Entity\Seo\Seo $seo
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Product\CreditCard newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Product\CreditCard newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Product\CreditCard query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Product\CreditCard whereAdditionalFeatures($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Product\CreditCard whereAppStore($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Product\CreditCard whereBankId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Product\CreditCard whereCashbackFee($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Product\CreditCard whereCashbackText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Product\CreditCard whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Product\CreditCard whereFine($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Product\CreditCard whereGooglePay($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Product\CreditCard whereGracePeriod($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Product\CreditCard whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Product\CreditCard whereInsurance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Product\CreditCard whereIssueFee($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Product\CreditCard whereMasterCard($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Product\CreditCard whereMaxAge($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Product\CreditCard whereMaxCreditLimit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Product\CreditCard whereMaxPercentBid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Product\CreditCard whereMinAge($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Product\CreditCard whereMinCreditLimit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Product\CreditCard whereMinPercentBid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Product\CreditCard whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Product\CreditCard wherePayWave($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Product\CreditCard whereRepaymentTerms($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Product\CreditCard whereServiceCost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Product\CreditCard whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Product\CreditCard whereSubtitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Product\CreditCard whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Product\CreditCard whereVisa($value)
 * @mixin \Eloquent
 */

class CreditCard extends BankProduct
{

    const SLUG_PREFIX = 'karty';

    public function getLink()
    {
        return route('bank.karta', ['bank' => $this->bank, 'creditCard' => $this]);
    }


    //Relations
    public function getSelfWithdrawalFees(): array
    {
        return $this->getMeta('self_withdrawal_fee');
    }

    public function getForeignWithdrawalFees(): array
    {
        return $this->getMeta('foreign_withdrawal_fee');
    }

    public function getAdditionalFees(): array
    {
        return $this->getMeta('additional_fee');
    }

    public function getDocuments(): array
    {
        return $this->getMeta('document');
    }

}
