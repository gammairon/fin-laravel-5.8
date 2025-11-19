<?php

namespace App\Http\Requests\Admin\Organization;

use Illuminate\Foundation\Http\FormRequest;

class BankRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'slug'                => 'required|string|max:191|alpha_dash|unique:banks,slug',
            'name'                => 'required|string|max:255',
            'tag_id'              => 'required|integer|exists:tags,id',
            'title_h1'            => 'required|string|max:255',
            'description'         => 'nullable|string',
            'shareholders'        => 'nullable|string',
            'postcode'            => 'nullable|string|max:255',
            'country'             => 'required|string|max:255',
            'city'                => 'required|string|max:255',
            'street'              => 'required|string|max:255',
            'house'               => 'nullable|string|max:255',
            'phone'               => 'nullable|string|max:255',
            'email'               => 'nullable|email|string|max:255',
            'web_site'            => 'nullable|string|url|max:255',
            'mfo'                 => 'nullable|string|max:255',
            'egrdpou'             => 'nullable|string|max:255',
            'ref_link'            => 'nullable|string',
            'rating'              => 'nullable|numeric|between:0,100',
            'license'             => 'nullable|string|max:255',
            'registration'        => 'nullable|string|max:255',
            'direct_shareholders' => 'nullable|string',
            'country_capital'     => 'nullable|string|max:255',
            'preview'             => 'nullable|string',

            'primary_media'       => 'array',
            'primary_media.url'   => 'nullable|string',
            'primary_media.alt'   => 'nullable|string',
            'primary_media.title' => 'nullable|string',

            'seo'                 => 'array',
            'seo.title'           => 'nullable|string|max:255',
            'seo.description'     => 'nullable|string',
            'seo.keywords'        => 'nullable|string',
            'seo.canonical'       => 'nullable|string|max:255',
            'seo.robot_index'     => 'nullable|string',
            'seo.robot_follow'    => 'nullable|string',

            'cards_page'                 => 'array',
            'cards_page.title'           => 'nullable|string|max:255',
            'cards_page.description'     => 'nullable|string',
            'cards_page.keywords'        => 'nullable|string',
            'cards_page.canonical'       => 'nullable|string|max:255',
            'cards_page.robot_index'     => 'nullable|string',
            'cards_page.robot_follow'    => 'nullable|string',
            'cards_page.title_page'      => 'nullable|string|max:255',
            'cards_page.subtitle'        => 'nullable|string|max:255',
            'cards_page.content'         => 'nullable|string',

            'credits_page'                 => 'array',
            'credits_page.title'           => 'nullable|string|max:255',
            'credits_page.description'     => 'nullable|string',
            'credits_page.keywords'        => 'nullable|string',
            'credits_page.canonical'       => 'nullable|string|max:255',
            'credits_page.robot_index'     => 'nullable|string',
            'credits_page.robot_follow'    => 'nullable|string',
            'credits_page.title_page'      => 'nullable|string|max:255',
            'credits_page.subtitle'        => 'nullable|string|max:255',
            'credits_page.content'         => 'nullable|string',

        ];

        if($this->isMethod('put')){
            $rules['slug'] = 'required|string|max:191|alpha_dash|unique:banks,slug,'.$this->bank->id;
        }

        return $rules;
    }
}
