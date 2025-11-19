<?php

namespace App\Entity\Blog;



/**
 * App\Entity\Blog\Tag
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $slug
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Blog\Tag newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Blog\Tag newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Blog\Tag query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Blog\Tag whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Blog\Tag whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Blog\Tag whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Blog\Tag whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Blog\Tag whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Blog\Tag whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\MediaLibrary\Models\Media[] $media
 * @property-read \Kalnoy\Nestedset\Collection|\App\Entity\Blog\Post[] $posts
 * @property-read \App\Entity\Seo\Seo $seo
 */
class Tag extends BlogBaseModel
{

    protected $guarded = [];


    public function posts()
    {
        return $this->belongsToMany('App\Entity\Blog\Post');
    }

    //Overrides Seo trait
    public function getSlugPrefix()
    {
        return 'tag/';
    }
}
