<?php
/**
 * User: Gamma-iron
 * Date: 16.08.2019
 */

namespace App\Entity\Product;



use App\Traits\CommentTrait;
use App\Entity\Seo\SeoInterface;
use App\Traits\MediaTrait;
use App\Traits\ProductMetaTrait;
use App\Traits\SeoTrait;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;

abstract class BankProduct extends Model implements HasMedia, SeoInterface
{
    use MediaTrait, ProductMetaTrait, SeoTrait, CommentTrait;

    protected $guarded = [];

    protected $appends = ['self_link', 'primary_img'];

    protected $hidden = [ 'created_at', 'updated_at', 'media'];

    const SLUG_PREFIX = null;

    abstract public function getLink();


    public function getSelfLinkAttribute()
    {
        return $this->getLink();
    }

    public function getPrimaryImgAttribute()
    {
        $stdObj = new \stdClass();
        $stdObj->url = $this->getPrimary()->getUrl('thumb');
        $stdObj->alt = $this->getPrimaryAlt();
        $stdObj->title = $this->getPrimaryTitle();
        return $stdObj;
    }
    //Overrides Seo trait
    public function getSlugPrefix()
    {
        if(is_null($this->bank_id))
            throw new \InvalidArgumentException('Do not set Bank for this product');

        return $this->bank->getSlugPrefix().$this->bank->slug.'/'.static::SLUG_PREFIX.'/';
    }

    public function delete()
    {

        return doTransaction(function (){

            return parent::delete();

        }, false);

    }


    public function bank()
    {
        return $this->belongsTo('App\Entity\Organization\Bank');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }


    /**
     * Метод возвращает массив с slug банка и собственного slug
     * для построения маршрута в функции route() из фронта
     * @return array
     */
    public function getRouteKeys():array
    {
        return [$this->bank->slug, $this->slug];
    }

}
