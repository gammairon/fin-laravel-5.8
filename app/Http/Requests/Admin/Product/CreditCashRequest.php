<?php

namespace App\Http\Requests\Admin\Product;

use Illuminate\Foundation\Http\FormRequest;

class CreditCashRequest extends FormRequest
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
            'slug'                     => 'required|string|max:191|alpha_dash|unique:credit_cash,slug',
            'name'                     => 'required|string|max:255',
            'bank_id'                  => 'required|integer|exists:banks,id',
            'subtitle'                 => 'nullable|string|max:255',
            'ref_link'                 => 'nullable|string|max:255',
            'rating'                   => 'nullable|numeric|between:0,100',
            'min_amount'               => 'required|numeric',
            'max_amount'               => 'nullable|numeric',
            'min_term'                 => 'required|integer',
            'max_term'                 => 'nullable|integer',
            'repayment_annuity'        => 'nullable|boolean',
            'repayment_differentiated' => 'nullable|boolean',
            'repayment_bullitny'       => 'nullable|boolean',
            'fine'                     => 'nullable|string',
            'insurance'                => 'nullable|string',
            'additional_terms'         => 'nullable|string',
            'min_age'                  => 'nullable|integer',
            'max_age'                  => 'nullable|integer',
            'experience'               => 'nullable|string|max:255',
            'registration'             => 'nullable|string|max:255',
            'nationality'              => 'nullable|string|max:255',
            'optional_documents'       => 'nullable|string',
            'special_offer'            => 'nullable|string',


            'primary_media'            => 'array',
            'primary_media.url'        => 'nullable|string',
            'primary_media.alt'        => 'nullable|string',
            'primary_media.title'      => 'nullable|string',

            'seo'                      => 'array',
            'seo.title'                => 'nullable|string|max:255',
            'seo.description'          => 'nullable|string',
            'seo.keywords'             => 'nullable|string',
            'seo.canonical'            => 'nullable|string|max:255|url',
            'seo.robot_index'          => 'nullable|string',
            'seo.robot_follow'         => 'nullable|string',

            //meta
            'documents'                => 'array',
            'documents.*'              => 'nullable|string',

            'bids'                     => 'array',
            'bids.*.*'                 => 'nullable|numeric',

        ];

        if($this->isMethod('put')){
            $rules['slug'] = 'required|string|max:191|alpha_dash|unique:credit_cash,slug,'.$this->credit_cash->id;
        }

        return $rules;
    }
}
