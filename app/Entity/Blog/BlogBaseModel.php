<?php
/**
 * User: Gamma-iron
 * Date: 29.10.2019
 */

namespace App\Entity\Blog;

use App\Entity\Seo\SeoInterface;
use App\Traits\MediaTrait;
use App\Traits\SeoTrait;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;

abstract class BlogBaseModel extends Model implements HasMedia, SeoInterface
{
    use MediaTrait,
        SeoTrait;


    public function delete()
    {
        return doTransaction(function(){

            return parent::delete();

        }, false);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}