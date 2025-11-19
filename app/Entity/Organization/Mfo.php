<?php

namespace App\Entity\Organization;


use App\Filters\Mfo\MfoFilter;
use App\Filters\Mfo\MfoSorteble;
use Illuminate\Database\Eloquent\Builder;


/**
 * App\Entity\Organization\Mfo
 *
 * @property int $id
 * @property string $slug
 * @property string $name
 * @property string|null $ref_link
 * @property float $rating
 * @property float $first_credit
 * @property string|null $free_credit_description
 * @property float $free_credit_bid
 * @property float $free_credit_amount
 * @property float $min_amount
 * @property float $max_amount
 * @property float $repeat_credit_bid
 * @property int $min_term
 * @property int $max_term
 * @property int $min_age
 * @property int $max_age
 * @property int $time_review
 * @property int $receiving_method_card
 * @property int $receiving_method_cash
 * @property string|null $special_offer
 * @property string|null $preview
 * @property string|null $web_site
 * @property string|null $phone
 * @property string|null $email
 * @property string|null $postcode
 * @property string $country
 * @property string $city
 * @property string $street
 * @property string|null $house
 * @property string|null $work_time
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Kalnoy\Nestedset\Collection|\App\Entity\Comment[] $comments
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\MediaLibrary\Models\Media[] $media
 * @property-read \App\Entity\Seo\Seo $seo
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Organization\Mfo filter($inputs)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Organization\Mfo newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Organization\Mfo newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Organization\Mfo query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Organization\Mfo sort($orderKey)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Organization\Mfo whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Organization\Mfo whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Organization\Mfo whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Organization\Mfo whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Organization\Mfo whereFirstCredit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Organization\Mfo whereFreeCreditAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Organization\Mfo whereFreeCreditBid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Organization\Mfo whereFreeCreditDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Organization\Mfo whereHouse($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Organization\Mfo whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Organization\Mfo whereMaxAge($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Organization\Mfo whereMaxAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Organization\Mfo whereMaxTerm($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Organization\Mfo whereMinAge($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Organization\Mfo whereMinAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Organization\Mfo whereMinTerm($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Organization\Mfo whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Organization\Mfo wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Organization\Mfo wherePostcode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Organization\Mfo wherePreview($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Organization\Mfo whereRating($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Organization\Mfo whereReceivingMethodCard($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Organization\Mfo whereReceivingMethodCash($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Organization\Mfo whereRefLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Organization\Mfo whereRepeatCreditBid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Organization\Mfo whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Organization\Mfo whereSpecialOffer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Organization\Mfo whereStreet($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Organization\Mfo whereTimeReview($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Organization\Mfo whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Organization\Mfo whereWebSite($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Organization\Mfo whereWorkTime($value)
 * @mixin \Eloquent
 */

class Mfo extends BaseOrganization
{

    protected $table = 'mfo';


    public function getLink()
    {
        return route('mfo.single', ['mfo' => $this]);
    }

    public function delete()
    {

        return doTransaction(function(){

            return parent::delete();

        }, false);

    }

    //Scopes=====================================
    public function scopeFilter(Builder $builder, array $inputs)
    {
        return (new MfoFilter(collect($inputs)))->filter($builder);
    }


    public function scopeSort(Builder $builder, $orderKey)
    {
        return (new MfoSorteble($orderKey))->sort($builder);
    }

    //Overrides Seo trait
    public function getSlugPrefix()
    {
        return 'mfo/';
    }
}
