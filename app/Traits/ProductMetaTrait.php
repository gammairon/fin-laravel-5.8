<?php
/**
 * User: Gamma-iron
 * Date: 16.05.2019
 */

namespace App\Traits;

use App\Entity\Product\Meta\ProductMeta;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Arr;

trait ProductMetaTrait
{

    public static function bootProductMetaTrait()
    {
        static::deleting(function ($entity) {

            if (in_array(SoftDeletes::class, class_uses_recursive($entity))) {
                if (! $entity->forceDeleting) {
                    return;
                }
            }

            $entity->deleteMetas();
        });
    }

    public function organization()
    {
        return $this->morphTo();
    }

    public function metas()
    {
        return $this->morphMany('App\Entity\Product\Meta\ProductMeta', 'product');
    }

    public function getMeta(string  $key)
    {
        return !is_null($this->getMetas($key)) ? Arr::pluck($this->getMetas($key), 'meta_value') : null;
    }

    public function getMetas(string  $key)
    {
        $metas = $this->metas->where('meta_key', $key);

        return $metas->isNotEmpty() ? $metas: null;
    }

    public function deleteMeta(string  $key)
    {
        ProductMeta::where([
            'product_id' => $this->id,
            'product_type' => static::class,
            'meta_key' => $key,
        ])->delete();

        return $this;
    }

    public function deleteMetas()
    {
        return $this->metas()->get()->each->delete();
    }

    public function saveMetas(string  $key, $values = [])
    {
        $values = is_array($values) ? $values: [$values];

        foreach ($values as $value){

            $value = is_array($value) ? serialize($value):$value;

            (new ProductMeta([
                'product_id' => $this->id,
                'product_type' => static::class,
                'meta_key' => $key,
                'meta_value' => $value,
            ]))->save();
        }

        return $this;
    }

    public function syncMeta(string  $key, $values = [])
    {
        $this->deleteMeta($key)->saveMetas($key, $values);
    }
}
