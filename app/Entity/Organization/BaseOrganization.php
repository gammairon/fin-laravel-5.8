<?php
/**
 * User: Gamma-iron
 * Date: 29.10.2019
 */

namespace App\Entity\Organization;


use App\Entity\Seo\SeoInterface;
use App\Traits\CommentTrait;
use App\Traits\MediaTrait;
use App\Traits\RatingableTrait;
use App\Traits\SeoTrait;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;

abstract class BaseOrganization extends Model implements HasMedia, SeoInterface
{
    use MediaTrait,
        SeoTrait,
        CommentTrait,
        RatingableTrait;

    protected $guarded = [];

    protected $appends = ['self_link', 'primary_img', 'full_address'];

    protected $hidden = ['description', 'created_at', 'updated_at', 'media'];


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

    public function getFullAddressAttribute()
    {
        return $this->getFullAddress();
    }

    public function getFullAddress()
    {
        return $this->postcode.', '.$this->country.', '.$this->city.', '.$this->street.', '.$this->house;
    }

    abstract public function getLink();

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
