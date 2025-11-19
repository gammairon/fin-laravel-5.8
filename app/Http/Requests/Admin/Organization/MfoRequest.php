<?php

namespace App\Http\Requests\Admin\Organization;

use Illuminate\Foundation\Http\FormRequest;

class MfoRequest extends FormRequest
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

    protected function prepareForValidation()
    {
        $this->request->set('receiving_method_card', $this->request->get('receiving_method_card', 0));
        $this->request->set('receiving_method_cash', $this->request->get('receiving_method_cash', 0));
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     *
     */
    public function rules()
    {

        $rules = [
            'slug'                    => 'required|string|max:191|alpha_dash|unique:mfo,slug',
            'name'                    => 'required|string|max:255',
            'subtitle'                => 'nullable|string|max:255',
            'ref_link'                => 'nullable|string|max:255|url',
            'rating'                  => 'nullable|numeric|between:0,100',
            'license'                 => 'nullable|string|max:255',
            'registration'            => 'nullable|string|max:255',
            'first_credit'            => 'nullable|numeric|min:0',
            'preview'                 => 'nullable|string',
            'free_credit_description' => 'nullable|string',
            'free_credit_bid'         => 'nullable|numeric|min:0',
            'free_credit_amount'      => 'nullable|numeric|min:0',
            'min_amount'              => 'nullable|numeric|min:0',
            'max_amount'              => 'nullable|numeric|min:0',
            'repeat_credit_bid'       => 'nullable|numeric|min:0',
            'min_term'                => 'nullable|numeric|integer|min:0',
            'max_term'                => 'nullable|numeric|integer|min:0',
            'min_age'                 => 'nullable|numeric|integer|min:0',
            'max_age'                 => 'nullable|numeric|integer|min:0',
            'time_review'             => 'nullable|numeric|integer|min:0',
            'receiving_method_card'   => 'nullable|boolean',
            'receiving_method_cash'   => 'nullable|boolean',
            'special_offer'           => 'nullable|string',
            'web_site'                => 'nullable|string|url|max:255',
            'phone'                   => 'nullable|string|max:255',
            'email'                   => 'nullable|string|email|max:255',
            'postcode'                => 'nullable|string|max:255',
            'country'                 => 'required|string|max:255',
            'city'                    => 'required|string|max:255',
            'street'                  => 'required|string|max:255',
            'house'                   => 'nullable|string|max:255',
            'work_time'               => 'nullable|string',

            'primary_media'           => 'array',
            'primary_media.url'       => 'nullable|string',
            'primary_media.alt'       => 'nullable|string',
            'primary_media.title'     => 'nullable|string',

            'seo'                     => 'array',
            'seo.title'               => 'nullable|string|max:255',
            'seo.description'         => 'nullable|string',
            'seo.keywords'            => 'nullable|string',
            'seo.canonical'           => 'nullable|string|max:255|url',
            'seo.robot_index'         => 'nullable|string|max:255',
            'seo.robot_follow'        => 'nullable|string|max:255',
        ];

        if($this->isMethod('put')){
            $rules['slug'] = 'required|string|max:191|alpha_dash|unique:mfo,slug,'.$this->mfo->id;
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'rating.between' => 'Рейтинг должен быть от 0 до 100',
        ];
    }
}
