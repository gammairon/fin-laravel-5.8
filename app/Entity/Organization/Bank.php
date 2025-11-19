<?php

namespace App\Entity\Organization;

use App\Entity\Seo\Seo;
use Carbon\Carbon;


/**
 * App\Entity\Organization\Bank
 *
 * @property int $id
 * @property int $tag_id
 * @property string $slug
 * @property string $name
 * @property string $title_h1
 * @property string|null $description
 * @property string|null $shareholders
 * @property string|null $postcode
 * @property string $country
 * @property string $city
 * @property string $street
 * @property string $house
 * @property string|null $phone
 * @property string|null $email
 * @property string|null $web_site
 * @property string|null $mfo
 * @property string|null $egrdpou
 * @property \Illuminate\Support\Carbon|null $date_reg
 * @property string|null $direct_shareholders
 * @property string|null $country_capital
 * @property string|null $preview
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Kalnoy\Nestedset\Collection|\App\Entity\Comment[] $comments
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Entity\Product\CreditCard[] $creditsCard
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Entity\Product\CreditCash[] $creditsCash
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\MediaLibrary\Models\Media[] $media
 * @property-read \App\Entity\Seo\Seo $seo
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Organization\Bank newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Organization\Bank newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Organization\Bank query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Organization\Bank whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Organization\Bank whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Organization\Bank whereCountryCapital($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Organization\Bank whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Organization\Bank whereDateReg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Organization\Bank whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Organization\Bank whereDirectShareholders($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Organization\Bank whereEgrdpou($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Organization\Bank whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Organization\Bank whereHouse($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Organization\Bank whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Organization\Bank whereMfo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Organization\Bank whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Organization\Bank wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Organization\Bank wherePostcode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Organization\Bank wherePreview($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Organization\Bank whereShareholders($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Organization\Bank whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Organization\Bank whereStreet($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Organization\Bank whereTagId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Organization\Bank whereTitleH1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Organization\Bank whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Organization\Bank whereWebSite($value)
 * @mixin \Eloquent
 */

class Bank extends BaseOrganization
{

    const CARDS_PAGE_SEO = 'bank_cards_page_seo';
    const CREDITS_PAGE_SEO = 'bank_credits_page_seo';

    public function getLink()
    {
        return route('bank.single', ['bank' => $this]);
    }

    /**
     * Новости которые выводятся на странице банка
     * @param int $limit
     * @return mixed
     */
    public function getNews($limit = 3)
    {
        return $this->tag->posts()->limit($limit)->get();
    }


    /**
     * Возвращаэт сущность Seo которая выводится на странице карт текущего банка
     * @return Seo
     */
    public function getCardsPageSeo(): Seo
    {
        $seo = $this->exists ? Seo::whereSeoeableId($this->id)->whereSeoeableType(self::CARDS_PAGE_SEO)->first() : new Seo();

        //Чтобы не прописывать в ручную банкам которые уже существуют но без СЕО
        return $seo ?? new Seo();
    }

    /**
     * Возвращаэт сущность Seo которая выводится на странице кредитов текущего банка
     * @return Seo
     */
    public function getCreditsPageSeo(): Seo
    {
        $seo = $this->exists ? Seo::whereSeoeableId($this->id)->whereSeoeableType(self::CREDITS_PAGE_SEO)->first() : new Seo();

        return $seo ?? new Seo();
    }



    public function delete()
    {

        return doTransaction(function (){

            //Delete Products
            $this->creditsCash->each(function ($model, $key){
                /** @var \Illuminate\Database\Eloquent\Model $model */
                $model->delete();
            });

            $this->creditsCard->each(function ($model, $key){
                /** @var \Illuminate\Database\Eloquent\Model $model */
                $model->delete();
            });

            return parent::delete();
        });
    }

    //Relations
    public function creditsCash()
    {
        return $this->hasMany('App\Entity\Product\CreditCash');
    }

    public function creditsCard()
    {
        return $this->hasMany('App\Entity\Product\CreditCard');
    }

    public function tag()
    {
        return $this->belongsTo('App\Entity\Blog\Tag');
    }

    //Overrides Seo trait
    public function getSlugPrefix()
    {
        return 'bank/';
    }
}
