<?php

namespace App\Entity\Product;


/**
 * App\Entity\Product\CreditCash
 *
 * @property int $id
 * @property int $organization_id
 * @property string $organization_type
 * @property string $name
 * @property string $slug
 * @property string|null $ref_link
 * @property float|null $rating
 * @property float|null $min_amount
 * @property float|null $max_amount
 * @property float|null $income_max_amount
 * @property int|null $min_term
 * @property int|null $max_term
 * @property float|null $percent_new_individual
 * @property float|null $percent_new_legal
 * @property float|null $percent_client
 * @property string|null $docs_individual
 * @property string|null $docs_legal
 * @property string|null $experience
 * @property string|null $special_offer
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\MediaLibrary\Models\Media[] $media
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Entity\Product\Meta\ProductMeta[] $metas
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $organization
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Product\CreditCash newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Product\CreditCash newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Product\CreditCash query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Product\CreditCash whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Product\CreditCash whereDocsIndividual($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Product\CreditCash whereDocsLegal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Product\CreditCash whereExperience($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Product\CreditCash whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Product\CreditCash whereIncomeMaxAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Product\CreditCash whereMaxAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Product\CreditCash whereMaxTerm($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Product\CreditCash whereMinAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Product\CreditCash whereMinTerm($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Product\CreditCash whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Product\CreditCash whereOrganizationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Product\CreditCash whereOrganizationType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Product\CreditCash wherePercentClient($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Product\CreditCash wherePercentNewIndividual($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Product\CreditCash wherePercentNewLegal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Product\CreditCash whereRating($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Product\CreditCash whereRefLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Product\CreditCash whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Product\CreditCash whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \App\Entity\Seo\Seo $seo
 * @property int $bank_id
 * @property string|null $subtitle
 * @property int|null $time_review
 * @property int $repayment_annuity
 * @property int $repayment_differentiated
 * @property int $repayment_bullitny
 * @property string|null $fine
 * @property string|null $insurance
 * @property string|null $additional_terms
 * @property int|null $min_age
 * @property int|null $max_age
 * @property string|null $registration
 * @property string|null $nationality
 * @property string|null $optional_documents
 * @property-read \App\Entity\Organization\Bank $bank
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Entity\Product\Meta\CreditCashBid[] $bids
 * @property-read \Kalnoy\Nestedset\Collection|\App\Entity\Comment[] $comments
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Product\CreditCash whereAdditionalTerms($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Product\CreditCash whereBankId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Product\CreditCash whereFine($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Product\CreditCash whereInsurance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Product\CreditCash whereMaxAge($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Product\CreditCash whereMinAge($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Product\CreditCash whereNationality($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Product\CreditCash whereOptionalDocuments($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Product\CreditCash whereRegistration($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Product\CreditCash whereRepaymentAnnuity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Product\CreditCash whereRepaymentBullitny($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Product\CreditCash whereRepaymentDifferentiated($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Product\CreditCash whereSubtitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Product\CreditCash whereTimeReview($value)
 */
class CreditCash extends BankProduct
{

    protected $table = 'credit_cash';

    const SLUG_PREFIX = 'credity';

    protected $appends = ['self_link', 'primary_img', 'min_bid', 'max_bid', 'documents'];

    public function getMinBidAttribute()
    {
        return $this->getMinBid();
    }

    public function getMaxBidAttribute()
    {
        return $this->getMaxBid();
    }

    public function getDocumentsAttribute()
    {
        return $this->getDocuments();
    }

    public function getLink()
    {
        return route('bank.credit', ['bank' => $this->bank, 'creditCash' => $this]);
    }

    public function getFirstDocument()
    {
        if($documents = $this->getDocuments())
            return $documents[0];

        return null;
    }

    public function getMaxBid()
    {
        if($this->bids->isNotEmpty())
            return $this->bids->max('percent');

        return null;
    }

    public function getMinBid()
    {
        if($this->bids->isNotEmpty())
            return $this->bids->min('percent');

        return null;
    }

    public function repaymentToStr(): string
    {
        $str = [];
        if($this->repayment_annuity)
            $str[] = 'Аннуитетный';
        if($this->repayment_differentiated)
            $str[] = 'Дифференцированный';
        if($this->repayment_bullitny)
            $str[] = 'Буллитный';

        return count($str) ? implode(', ', $str):null;
    }

    //Relations
    public function getDocuments(): array
    {
        return $this->getMeta('document');
    }

    public function bids()
    {
        return $this->hasMany('App\Entity\Product\Meta\CreditCashBid');
    }


}
