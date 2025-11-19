<?php
/**
 * User: Gamma-iron
 * Date: 29.03.2019
 */

namespace App\UseCases\Admin;

use App\UseCases\BaseService;
use Illuminate\Support\Arr;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Illuminate\Support\Facades\Cache;

abstract class Service extends BaseService
{


    /**
     * @param HasMedia $model
     * @param array $data
     * @param null|string $collName
     */
    public function updatePrimaryPhoto(HasMedia $model, array $data, $collName = null)
    {
        $collName = $model->getPrimaryCollName($collName);

        $keyMedia = $collName == 'primary' ? 'primary_media':$collName;

        $url = Arr::get($data, $keyMedia.'.url');

        if(is_null($url)){

            if($model->hasPrimary($collName))
                $model->deletePrimary($collName);

            return;
        }

        $file = public_path($url);

        $properties = [
            'alt' => Arr::get($data, $keyMedia.'.alt') ?? Arr::get($data, 'name'),
            'title' => Arr::get($data, $keyMedia.'.title')
        ];


        $model->updatePrimary($file, $properties, $collName);
    }


    protected function transaction(callable $func)
    {
        return doTransaction($func);
    }

}
