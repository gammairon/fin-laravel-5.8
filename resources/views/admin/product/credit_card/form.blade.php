<div class="row">
    <div class="col-xs-12 col-md-8 offset-md-2">
        @include('admin.partials.primary_media', ['model' => $creditCard])
    </div>
</div>

<div class="row">
    <div class="col">
        <h3>Общая информация</h3>
    </div>
</div>

<div class="row">

    <div class="col-xs-12 col-md-6">
        <div class="form-group">
            <label for="name" class="col-form-label text-md-right required">{{ __('Заголовок H1') }}</label>

            <div>
                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name', $creditCard->name) }}" required>

                @if ($errors->has('name'))
                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                @endif

            </div>
        </div>
    </div>
    <div class="col-xs-12 col-md-6">
        <div class="form-group">
            <label for="slug" class="col-form-label text-md-right required">{{ __('Slug') }}</label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" >{{ 'karty/' }}</span>
                </div>
                <input id="slug" type="text" class="form-control{{ $errors->has('slug') ? ' is-invalid' : '' }}" name="slug" value="{{ old('slug', $creditCard->slug) }}" required>
                @if($creditCard->exists)
                    <div class="input-group-append">
                        <span class="input-group-text"><a href="{{ route('bank.karta', ['bank' => $creditCard->bank, 'creditCard' => $creditCard]) }}" target="_blank">Просмотреть</a></span>
                    </div>
                @endif
                @if ($errors->has('slug'))
                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('slug') }}</strong>
                                            </span>
                @endif
            </div>

        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-md-6">
        <div class="form-group">
            <label for="subtitle" class="col-form-label text-md-right">{{ __('Подзаголовок') }}</label>

            <div>
                <input id="subtitle" type="text" class="form-control{{ $errors->has('subtitle') ? ' is-invalid' : '' }}" name="subtitle" value="{{ old('subtitle', $creditCard->subtitle) }}" required>

                @if ($errors->has('subtitle'))
                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('subtitle') }}</strong>
                                            </span>
                @endif

            </div>
        </div>
    </div>
    <div class="col-xs-12 col-md-6">
        <div class="form-group">
            <label for="bank_id" class="col-form-label text-md-right required">{{ __('Банк') }}</label>

            <div>
                <select id="bank_id" class="form-control{{ $errors->has('organization_id') ? ' is-invalid' : '' }}" name="bank_id" required>
                    <option value="">Выберите Банк</option>
                    @foreach ($banks as $id => $name)
                        <option value="{{$id}}" {{selected( $creditCard->bank ? $creditCard->bank->id:'', $id)}}>{{$name}}</option>
                    @endforeach
                </select>

                @if ($errors->has('bank_id'))
                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('bank_id') }}</strong>
                                            </span>
                @endif

            </div>
        </div>
    </div>


</div>
<div class="row">
    <div class="col-xs-12 col-md-6">
        <div class="form-group">
            <label for="rating" class="col-form-label text-md-right">{{ __('Рейтинг') }}</label>

            <div>
                <input id="rating" type="text" class="numeric form-control{{ $errors->has('rating') ? ' is-invalid' : '' }}" name="rating" value="{{ old('rating', $creditCard->rating) }}" >

                @if ($errors->has('rating'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('rating') }}</strong>
                    </span>
                @endif

            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-md-8">
        <div class="form-group">
            <label for="ref_link" class="col-form-label text-md-right">{{ __('Реферальная ссылка') }}</label>

            <div>
                <input id="ref_link" type="text" class="form-control{{ $errors->has('ref_link') ? ' is-invalid' : '' }}" name="ref_link" value="{{ old('ref_link', $creditCard->ref_link) }}" >

                @if ($errors->has('ref_link'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('ref_link') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-md-4 ">
        <div class="form-group">
            <label for="bank_id" class="col-form-label text-md-right">{{ __('Метки') }}</label>

            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="pay_wave" name="pay_wave" value="1" {{checked(1, old('pay_wave', $creditCard->pay_wave) )}}>
                <label class="form-check-label" for="pay_wave">PayWave/PayPass</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="visa" name="visa" value="1" {{checked(1, old('visa', $creditCard->visa) )}}>
                <label class="form-check-label" for="visa">Платежная система Visa</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="master_card" name="master_card" value="1" {{checked(1, old('master_card', $creditCard->master_card) )}}>
                <label class="form-check-label" for="master_card">Платежная система MasterCard</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="google_pay" name="google_pay" value="1" {{checked(1, old('google_pay', $creditCard->google_pay) )}}>
                <label class="form-check-label" for="google_pay">Google Play приложение</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="app_store" name="app_store" value="1" {{checked(1, old('app_store', $creditCard->app_store) )}}>
                <label class="form-check-label" for="app_store">AppStore приложение</label>
            </div>
        </div>

    </div>

</div>
<hr/>

<div class="row">
    <div class="col">
        <h3>Условия</h3>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-md-3">
        <div class="form-group">
            <label for="min_percent_bid" class="col-form-label text-md-right required">{{ __('Мин. Процентная ставка, %') }}</label>

            <div>
                <input id="min_percent_bid" type="text" class="numeric form-control{{ $errors->has('min_percent_bid') ? ' is-invalid' : '' }}" name="min_percent_bid" value="{{ old('min_percent_bid', $creditCard->min_percent_bid) }}" required>

                @if ($errors->has('min_percent_bid'))
                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('min_percent_bid') }}</strong>
                                            </span>
                @endif

            </div>
        </div>
    </div>
    <div class="col-xs-12 col-md-3">
        <div class="form-group">
            <label for="max_percent_bid" class="col-form-label text-md-right ">{{ __('Макс. Процентная ставка, %') }}</label>

            <div>
                <input id="max_percent_bid" type="text" class="numeric form-control{{ $errors->has('max_percent_bid') ? ' is-invalid' : '' }}" name="max_percent_bid" value="{{ old('max_percent_bid', $creditCard->max_percent_bid) }}" >

                @if ($errors->has('max_percent_bid'))
                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('max_percent_bid') }}</strong>
                                            </span>
                @endif

            </div>
        </div>
    </div>

    <div class="col-xs-12 col-md-3">
        <div class="form-group">
            <label for="min_credit_limit" class="col-form-label text-md-right required">{{ __('Мин. Кредитный лимит, грн') }}</label>

            <div>
                <input id="min_credit_limit" type="text" class="numeric form-control{{ $errors->has('min_percent_bid') ? ' is-invalid' : '' }}" name="min_credit_limit" value="{{ old('min_credit_limit', $creditCard->min_credit_limit) }}" required>

                @if ($errors->has('min_credit_limit'))
                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('min_credit_limit') }}</strong>
                                            </span>
                @endif

            </div>
        </div>
    </div>
    <div class="col-xs-12 col-md-3">
        <div class="form-group">
            <label for="max_credit_limit" class="col-form-label text-md-right ">{{ __('Макс. Кредитный лимит, грн') }}</label>

            <div>
                <input id="max_credit_limit" type="text" class="numeric form-control{{ $errors->has('max_credit_limit') ? ' is-invalid' : '' }}" name="max_credit_limit" value="{{ old('max_credit_limit', $creditCard->max_credit_limit) }}" >

                @if ($errors->has('max_credit_limit'))
                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('max_credit_limit') }}</strong>
                                            </span>
                @endif

            </div>
        </div>
    </div>

</div>

<div class="row">
    <div class="col-xs-12 col-md-4">
        <div class="form-group">
            <label for="grace_period" class="col-form-label text-md-right">{{ __('Льготный период, дней') }}</label>

            <div>
                <input id="grace_period" type="number" class="numeric form-control{{ $errors->has('grace_period') ? ' is-invalid' : '' }}" name="grace_period" value="{{ old('grace_period', $creditCard->grace_period) }}" >

                @if ($errors->has('grace_period'))
                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('grace_period') }}</strong>
                                            </span>
                @endif

            </div>
        </div>
    </div>
    <div class="col-xs-12 col-md-4">
        <div class="form-group">
            <label for="service_cost" class="col-form-label text-md-right ">{{ __('Стоимость обслуживания, грн') }}</label>

            <div>
                <input id="service_cost" type="text" class="numeric form-control{{ $errors->has('service_cost') ? ' is-invalid' : '' }}" name="service_cost" value="{{ old('service_cost', $creditCard->service_cost) }}" >

                @if ($errors->has('service_cost'))
                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('service_cost') }}</strong>
                                            </span>
                @endif

            </div>
        </div>
    </div>
    <div class="col-xs-12 col-md-4">
        <div class="form-group">
            <label for="issue_fee" class="col-form-label text-md-right ">{{ __('Плата за выпуск, грн') }}</label>

            <div>
                <input id="issue_fee" type="text" class="numeric form-control{{ $errors->has('issue_fee') ? ' is-invalid' : '' }}" name="issue_fee" value="{{ old('issue_fee', $creditCard->issue_fee) }}" >

                @if ($errors->has('issue_fee'))
                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('issue_fee') }}</strong>
                                            </span>
                @endif

            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="form-group">
            <label for="repayment_terms" class="col-form-label text-md-right">{{ __('Условия погашения задолженности') }}</label>

            <div>
                <textarea name="repayment_terms" id="repayment_terms" class="form-control">{{old('repayment_terms', $creditCard->repayment_terms)}}</textarea>

                @if ($errors->has('repayment_terms'))
                    <span class="invalid-feedback" role="alert">
                                                   <strong>{{ $errors->first('repayment_terms') }}</strong>
                                               </span>
                @endif
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="form-group">
            <label for="fine" class="col-form-label text-md-right">{{ __('Штрафы и пеня за просрочку') }}</label>

            <div>
                <textarea name="fine" id="fine" class="form-control">{{old('fine', $creditCard->fine)}}</textarea>

                @if ($errors->has('fine'))
                    <span class="invalid-feedback" role="alert">
                                                   <strong>{{ $errors->first('fine') }}</strong>
                                               </span>
                @endif
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="form-group">
            <label for="insurance" class="col-form-label text-md-right">{{ __('Страхование') }}</label>

            <div>
                <textarea name="insurance" id="insurance" class="form-control">{{old('insurance', $creditCard->insurance)}}</textarea>

                @if ($errors->has('insurance'))
                    <span class="invalid-feedback" role="alert">
                                                   <strong>{{ $errors->first('insurance') }}</strong>
                                               </span>
                @endif
            </div>
        </div>
    </div>
</div>
<hr/>

<div class="row">
    <div class="col">
        <h3>Преимущества</h3>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-md-6">
        <div class="form-group">
            <label for="cashback_fee" class="col-form-label text-md-right ">{{ __('Кешбэк, %') }}</label>

            <div>
                <input id="cashback_fee" type="text" class="numeric form-control{{ $errors->has('cashback_fee') ? ' is-invalid' : '' }}" name="cashback_fee" value="{{ old('cashback_fee', $creditCard->cashback_fee) }}" >

                @if ($errors->has('cashback_fee'))
                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('cashback_fee') }}</strong>
                                            </span>
                @endif

            </div>
        </div>
    </div>
    <div class="col-xs-12 col-md-6">
        <div class="form-group">
            <label for="cashback_text" class="col-form-label text-md-right">{{ __('Кешбэк описание') }}</label>

            <div>
                <textarea name="cashback_text" id="cashback_text" class="form-control">{{old('cashback_text', $creditCard->cashback_text)}}</textarea>

                @if ($errors->has('cashback_text'))
                    <span class="invalid-feedback" role="alert">
                                                   <strong>{{ $errors->first('cashback_text') }}</strong>
                                               </span>
                @endif
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="form-group">
            <label for="additional_features" class="col-form-label text-md-right">{{ __('Дополнительные особенности') }}</label>

            <div>
                <textarea name="additional_features" id="additional_features" class="form-control">{{old('additional_features', $creditCard->additional_features)}}</textarea>

                @if ($errors->has('additional_features'))
                    <span class="invalid-feedback" role="alert">
                                                   <strong>{{ $errors->first('additional_features') }}</strong>
                                               </span>
                @endif
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="form-group">
            <label for="special_offer" class="col-form-label text-md-right">{{ __('Специальное предложение') }}</label>

            <div>
                <textarea name="special_offer" id="special_offer" class="form-control">{{old('special_offer', $creditCard->special_offer)}}</textarea>

                @if ($errors->has('special_offer'))
                    <span class="invalid-feedback" role="alert">
                                                   <strong>{{ $errors->first('special_offer') }}</strong>
                                               </span>
                @endif
            </div>
        </div>
    </div>
</div>
<hr/>

<div class="row">
    <div class="col">
        <h3>Коммисии и ставки</h3>
    </div>
</div>


<div class="row">
    <div class="col-xs-12 col-md-6">
        <div class="form-group multi-fields">
            <label for="self_withdrawal_fee" class="col-form-label text-md-right">{{ __('Комиссии за снятие наличных в банкомате своего банка') }}</label>
            @foreach (old('self_withdrawal_fees', $selfWithdrawalFees) as $self_withdrawal_fee)

                @if ($loop->first)
                    <div class="multi-field">
                        <textarea name="self_withdrawal_fees[]" class="form-control ">{{$self_withdrawal_fee}}</textarea>
                    </div>
                @else
                    <div class="multi-field">
                        <div class="mt-4 mb-4"><a href="javascrit:void(0);" class="remove_multi_field btn btn-danger">Удалить</a></div>
                        <textarea name="self_withdrawal_fees[]" class="form-control ">{{$self_withdrawal_fee}}</textarea>
                    </div>
                @endif
            @endforeach
            <div class="multi-fields-container">

            </div>
            <div class="mt-4 mb-4">
                <a href="javascrit:void(0);" class="add_multi_field btn btn-success" data-template="#self_withdrawal_fee">Добавить</a>
            </div>
        </div>
    </div>

    <div class="col-xs-12 col-md-6">
        <div class="form-group multi-fields">
            <label for="foreign_withdrawal_fee" class="col-form-label text-md-right">{{ __('Комиссии за снятие наличных в банкомате стороннего банка') }}</label>
            @foreach (old('foreign_withdrawal_fees', $foreignWithdrawalFees) as $foreign_withdrawal_fee)

                @if ($loop->first)
                    <div class="multi-field">
                        <textarea name="foreign_withdrawal_fees[]" class="form-control ">{{$foreign_withdrawal_fee}}</textarea>
                    </div>
                @else
                    <div class="multi-field">
                        <div class="mt-4 mb-4"><a href="javascrit:void(0);" class="remove_multi_field btn btn-danger">Удалить</a></div>
                        <textarea name="foreign_withdrawal_fees[]" class="form-control ">{{$self_withdrawal_fee}}</textarea>
                    </div>
                @endif
            @endforeach
            <div class="multi-fields-container">

            </div>
            <div class="mt-4 mb-4">
                <a href="javascrit:void(0);" class="add_multi_field btn btn-success" data-template="#foreign_withdrawal_fee">Добавить</a>
            </div>
        </div>
    </div>

</div>

<div class="row">
    <div class="col-xs-12 col-md-12">
        <div class="form-group multi-fields">
            <label for="additional_fee" class="col-form-label text-md-right">{{ __('Дополнительные комиссии') }}</label>
            @foreach (old('additional_fees', $additionalFees) as $additional_fee)

                @if ($loop->first)
                    <div class="multi-field">
                        <textarea name="additional_fees[]" class="form-control ">{{$additional_fee}}</textarea>
                    </div>
                @else
                    <div class="multi-field">
                        <div class="mt-4 mb-4"><a href="javascrit:void(0);" class="remove_multi_field btn btn-danger">Удалить</a></div>
                        <textarea name="additional_fees[]" class="form-control ">{{$additional_fee}}</textarea>
                    </div>
                @endif
            @endforeach
            <div class="multi-fields-container">

            </div>
            <div class="mt-4 mb-4">
                <a href="javascrit:void(0);" class="add_multi_field btn btn-success" data-template="#additional_fee">Добавить</a>
            </div>
        </div>
    </div>
</div>
<hr/>

<div class="row">
    <div class="col">
        <h3>Требования</h3>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-md-6">
        <div class="form-group">
            <label for="min_age" class="col-form-label text-md-right">{{ __('Мин. Возраст') }}</label>

            <div>
                <input id="min_age" type="number" class="numeric form-control{{ $errors->has('min_age') ? ' is-invalid' : '' }}" name="min_age" value="{{ old('min_age', $creditCard->min_age) }}" >

                @if ($errors->has('min_age'))
                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('min_age') }}</strong>
                                            </span>
                @endif

            </div>
        </div>
    </div>

    <div class="col-xs-12 col-md-6">
        <div class="form-group">
            <label for="max_age" class="col-form-label text-md-right">{{ __('Макс. Возраст') }}</label>

            <div>
                <input id="max_age" type="number" class="numeric form-control{{ $errors->has('max_age') ? ' is-invalid' : '' }}" name="max_age" value="{{ old('max_age', $creditCard->max_age) }}" >

                @if ($errors->has('max_age'))
                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('max_age') }}</strong>
                                            </span>
                @endif

            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-md-12">
        <div class="form-group multi-fields">
            <label for="documents" class="col-form-label text-md-right">{{ __('Документы') }}</label>
            @foreach (old('documents', $documents) as $document)

                @if ($loop->first)
                    <div class="multi-field">
                        <textarea name="documents[]" class="form-control ">{{$document}}</textarea>
                    </div>
                @else
                    <div class="multi-field">
                        <div class="mt-4 mb-4"><a href="javascrit:void(0);" class="remove_multi_field btn btn-danger">Удалить</a></div>
                        <textarea name="documents[]" class="form-control ">{{$document}}</textarea>
                    </div>
                @endif
            @endforeach
            <div class="multi-fields-container">

            </div>
            <div class="mt-4 mb-4">
                <a href="javascrit:void(0);" class="add_multi_field btn btn-success" data-template="#document">Добавить</a>
            </div>
        </div>
    </div>
</div>

@include('admin.partials.seo_block', ['seo' => $seo])
