<?php
/**
 * User: Gamma-iron
 * Date: 26.05.2019
 */

namespace App\UseCases\Blade;


use App\Entity\Organization\Mfo;
use Gornymedia\Shortcodes\Facades\Shortcode;

class ShortcodeFactory
{
    private $viewPath = 'front/shortcodes';

    protected $shortcodes = [
        'mfo_list',
        'mfo_list_group',
        'mfo_contact_list'
    ];


    public function __construct(array $config = [])
    {
    }

    public function register()
    {
        foreach ($this->shortcodes as $shortcode) {
            $this->$shortcode();
        }
    }

    public function mfo_list()
    {
        Shortcode::add('mfo_list', function($atts, $content, $name)
        {
            /*$a = Shortcode::atts([
                'view_name' => $name,
                'foo' => 'something',
            ], $atts);*/

            $mfos = Mfo::with('media')->orderByDesc('rating')->get();

            return view($this->viewPath.'/mfo_list', compact('mfos'));
        });
    }

    public function mfo_list_group()
    {
        Shortcode::add('mfo_list_group', function($atts, $content, $name)
        {
            $properties = Shortcode::atts([
                'list_id' => 0,
            ], $atts);

            $mfos = Mfo::with('media')->join('list_mfo', function ($query) use ($properties){
                $query->on('mfo.id', 'list_mfo.mfo_id')
                    ->where('list_mfo.list_id', $properties['list_id']);
            })->orderBy('list_mfo.sort')->get();


            return view($this->viewPath.'/mfo_list', compact('mfos'));
        });
    }

    public function mfo_contact_list()
    {
        Shortcode::add('mfo_contact_list', function($atts, $content, $name)
        {
            $properties = Shortcode::atts([
                'list_id' => 0,
            ], $atts);

            if ($properties['list_id'] != 0){
                $mfos = Mfo::with('media')->whereNotNull('license')->join('list_mfo', function ($query) use ($properties){
                    $query->on('mfo.id', 'list_mfo.mfo_id')
                        ->where('list_mfo.list_id', $properties['list_id']);
                })->orderBy('list_mfo.sort')->get();
            }
            else{
                $mfos = Mfo::with('media')->whereNotNull('license')->orderByDesc('rating')->get();
            }




            return view($this->viewPath.'/mfo_contact_list', compact('mfos'));
        });
    }

}
