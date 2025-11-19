<?php

namespace App\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Intervention\Image\Exception\InvalidArgumentException;
use UniSharp\LaravelFilemanager\Events\ImageWasUploaded;

class LfmUploadListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $method = 'on'.class_basename($event);
        if (method_exists($this, $method)) {
            call_user_func([$this, $method], $event);
        }
    }

    public function onImageWasUploaded(ImageWasUploaded $event)
    {
        $path = $event->path();

        $ext = pathinfo($path, PATHINFO_EXTENSION);

        if($ext == 'webp' || $ext == 'gif' || $ext == 'svg')
            return;

        if(!$this->requirementsAreInstalled())
            return;

        if($this->convert($path))
            @unlink($path);

    }


    /**
     * @param string $path
     * @return bool|string
     */
    protected function convert(string $path)
    {
        $dataImg = file_get_contents($path);

        $im = imagecreatefromstring($dataImg);

        if ($im === false)
            return false;

        $pathToWebpFile = pathinfo($path, PATHINFO_DIRNAME).'/'.pathinfo($path, PATHINFO_FILENAME).'.webp';

        imagewebp($im, $pathToWebpFile, 70);

        imagedestroy($im);

        return $pathToWebpFile;
    }

    protected function requirementsAreInstalled() : bool
    {
        if (! function_exists('imagecreatefromstring')) {
            return false;
        }

        if (! function_exists('imagewebp')) {
            return false;
        }

        if (! function_exists('imagedestroy')) {
            return false;
        }

        return true;
    }
}
