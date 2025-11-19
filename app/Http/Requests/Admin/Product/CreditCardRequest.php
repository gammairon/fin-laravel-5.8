<?php

namespace App\Http\Requests\Admin\Product;

use Illuminate\Foundation\Http\FormRequest;

class CreditCardRequest extends FormRequest
{

    protected $checkboxes = [
        'pay_wave',
        'visa',
        'master_card',
        'google_pay',
        'app_store',
    ];
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
        foreach ($this->checkboxes as $checkbox){
            $this->request->set($checkbox, $this->request->get($checkbox, 0));
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'slug'                      => 'required|string|max:191|alpha_dash|unique:credit_cards,slug',
            'name'                      => 'required|string|max:255',
            'bank_id'                   => 'required|integer|exists:banks,id',
            'subtitle'                  => 'nullable|string|max:255',
            'ref_link'                  => 'nullable|string|max:255',
            'rating'                    => 'nullable|numeric|between:0,100',
            'pay_wave'                  => 'nullable|boolean',
            'visa'                      => 'nullable|boolean',
            'master_card'               => 'nullable|boolean',
            'google_pay'                => 'nullable|boolean',
            'app_store'                 => 'nullable|boolean',
            'min_percent_bid'           => 'required|numeric',
            'max_percent_bid'           => 'nullable|numeric',
            'min_credit_limit'          => 'required|numeric',
            'max_credit_limit'          => 'nullable|numeric',
            'grace_period'              => 'nullable|integer',
            'service_cost'              => 'nullable|numeric',
            'issue_fee'                 => 'nullable|numeric',
            'repayment_terms'           => 'nullable|string',
            'fine'                      => 'nullable|string',
            'insurance'                 => 'nullable|string',
            'cashback_fee'              => 'nullable|numeric',
            'cashback_text'             => 'nullable|string',
            'additional_features'       => 'nullable|string',
            'min_age'                   => 'nullable|integer',
            'max_age'                   => 'nullable|integer',
            'special_offer'             => 'nullable|string',

            'primary_media'             => 'array',
            'primary_media.url'         => 'nullable|string',
            'primary_media.alt'         => 'nullable|string',
            'primary_media.title'       => 'nullable|string',

            'seo'                       => 'array',
            'seo.title'                 => 'nullable|string|max:255',
            'seo.description'           => 'nullable|string',
            'seo.keywords'              => 'nullable|string',
            'seo.canonical'             => 'nullable|string|max:255|url',
            'seo.robot_index'           => 'nullable|string',
            'seo.robot_follow'          => 'nullable|string',

            //meta
            'self_withdrawal_fees'      => 'array',
            'self_withdrawal_fees.*'    => 'nullable|string',

            'foreign_withdrawal_fees'   => 'array',
            'foreign_withdrawal_fees.*' => 'nullable|string',

            'additional_fees'           => 'array',
            'additional_fees.*'         => 'nullable|string',

            'documents'                 => 'array',
            'documents.*'               => 'nullable|string',
        ];

        if($this->isMethod('put')){
            $rules['slug'] = 'required|string|max:191|alpha_dash|unique:credit_cards,slug,'.$this->credit_card->id;
        }

        return $rules;
    }
}
