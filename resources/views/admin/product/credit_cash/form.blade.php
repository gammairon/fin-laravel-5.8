<div class="row">
    <div class="col-xs-12 col-md-8 offset-md-2">
        @include('admin.partials.primary_media', ['model' => $creditCash])
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
            <label for="name" class="col-form-label text-md-right required">{{ __('Название (Заголовок H1)') }}</label>

            <div>
                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name', $creditCash->name) }}" required>

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
                    <span class="input-group-text" >credity/</span>
                </div>
                <input id="slug" type="text" class="form-control{{ $errors->has('slug') ? ' is-invalid' : '' }}" name="slug" value="{{ old('slug', $creditCash->slug) }}" required>
                @if($creditCash->exists)
                    <div class="input-group-append">
                        <span class="input-group-text"><a href="{{ route('bank.credit', ['bank' => $creditCash->bank, 'creditCash' => $creditCash]) }}" target="_blank">Просмотреть</a></span>
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
                <input id="subtitle" type="text" class="form-control{{ $errors->has('subtitle') ? ' is-invalid' : '' }}" name="subtitle" value="{{ old('subtitle', $creditCash->subtitle) }}" >

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
                <select id="bank_id" class="form-control{{ $errors->has('bank_id') ? ' is-invalid' : '' }}" name="bank_id" required>
                    <option value="">Выберите Банк</option>
                    @foreach ($banks as $id => $name)
                        <option value="{{$id}}" {{selected($creditCash->bank_id, $id)}}>{{$name}}</option>
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
    <div class="col-xs-12 col-md-12">
        <div class="form-group">
            <label for="ref_link" class="col-form-label text-md-right">{{ __('Реферальная ссылка') }}</label>

            <div>
                <input id="ref_link" type="text" class="form-control{{ $errors->has('ref_link') ? ' is-invalid' : '' }}" name="ref_link" value="{{ old('ref_link', $creditCash->ref_link) }}" >

                @if ($errors->has('ref_link'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('ref_link') }}</strong>
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
                <input id="rating" type="text" class="numeric form-control{{ $errors->has('rating') ? ' is-invalid' : '' }}" name="rating" value="{{ old('rating', $creditCash->rating) }}" >

                @if ($errors->has('rating'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('rating') }}</strong>
                    </span>
                @endif

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
    <div class="col-xs-12 col-md-6">
        <div class="form-group">
            <label for="min_amount" class="col-form-label text-md-right required">{{ __('Мин. сумма (грн)') }}</label>

            <div>
                <input id="min_amount" type="text" class="numeric form-control{{ $errors->has('min_amount') ? ' is-invalid' : '' }}" name="min_amount" value="{{ old('min_amount', $creditCash->min_amount) }}" required>

                @if ($errors->has('min_amount'))
                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('min_amount') }}</strong>
                                            </span>
                @endif

            </div>
        </div>
    </div>

    <div class="col-xs-12 col-md-6">
        <div class="form-group">
            <label for="max_amount" class="col-form-label text-md-right">{{ __('Макс. сумма (грн)') }}</label>

            <div>
                <input id="max_amount" type="text" class="numeric form-control{{ $errors->has('max_amount') ? ' is-invalid' : '' }}" name="max_amount" value="{{ old('max_amount', $creditCash->max_amount) }}">

                @if ($errors->has('max_amount'))
                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('max_amount') }}</strong>
                                            </span>
                @endif

            </div>
        </div>
    </div>

</div>

<div class="row">

    <div class="col-xs-12 col-md-6">
        <div class="form-group">
            <label for="min_term" class="col-form-label text-md-right required">{{ __('Мин. срок (месяцев)') }}</label>

            <div>
                <input id="min_term" type="number" class="numeric form-control{{ $errors->has('min_term') ? ' is-invalid' : '' }}" name="min_term" value="{{ old('min_term', $creditCash->min_term) }}" required>

                @if ($errors->has('min_term'))
                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('min_term') }}</strong>
                                            </span>
                @endif

            </div>
        </div>
    </div>

    <div class="col-xs-12 col-md-6">
        <div class="form-group">
            <label for="max_term" class="col-form-label text-md-right">{{ __('Макс. срок (месяцев)') }}</label>

            <div>
                <input id="max_term" type="number" class="numeric form-control{{ $errors->has('max_term') ? ' is-invalid' : '' }}" name="max_term" value="{{ old('max_term', $creditCash->max_term) }}" >

                @if ($errors->has('max_term'))
                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('max_term') }}</strong>
                                            </span>
                @endif

            </div>
        </div>
    </div>

</div>

<div class="row">

    <div class="col-xs-12 col-md-6">
        <div class="form-group">
            <label class="col-form-label text-md-right">Тип погашения: </label>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="1" name="repayment_annuity" id="repayment_annuity" {{checked($creditCash->repayment_annuity, 1)}}>
                <label class="form-check-label" for="repayment_annuity">
                    Аннуитетный
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="1" id="repayment_differentiated" name="repayment_differentiated" {{checked($creditCash->repayment_differentiated, 1)}}>
                <label class="form-check-label" for="repayment_differentiated">
                    Дифференцированный
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="1" id="repayment_bullitny" name="repayment_bullitny" {{checked($creditCash->repayment_bullitny, 1)}}>
                <label class="form-check-label" for="repayment_bullitny">
                    Буллитный
                </label>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-md-12">
        <div class="form-group">
            <label for="fine" class="col-form-label text-md-right">{{ __('Штраф') }}</label>

            <div>
                <textarea name="fine" id="fine" class="form-control ">{{old('fine', $creditCash->fine)}}</textarea>

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
    <div class="col-xs-12 col-md-12">
        <div class="form-group">
            <label for="insurance" class="col-form-label text-md-right">{{ __('Страхование') }}</label>

            <div>
                <textarea name="insurance" id="insurance" class="form-control ">{{old('insurance', $creditCash->insurance)}}</textarea>

                @if ($errors->has('insurance'))
                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('insurance') }}</strong>
                                            </span>
                @endif
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-md-12">
        <div class="form-group">
            <label for="additional_terms" class="col-form-label text-md-right">{{ __('Дополнительные условия') }}</label>

            <div>
                <textarea name="additional_terms" id="additional_terms" class="form-control ">{{old('additional_terms', $creditCash->additional_terms)}}</textarea>

                @if ($errors->has('additional_terms'))
                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('additional_terms') }}</strong>
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
                <textarea name="special_offer" id="special_offer" class="form-control">{{old('special_offer', $creditCash->special_offer)}}</textarea>

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
        <h3>Требования</h3>
    </div>
</div>

<div class="row">

    <div class="col-xs-12 col-md-6">
        <div class="form-group">
            <label for="min_age" class="col-form-label text-md-right required">{{ __('Мин. Возраст (лет)') }}</label>

            <div>
                <input id="min_age" type="number" class="numeric form-control{{ $errors->has('min_age') ? ' is-invalid' : '' }}" name="min_age" value="{{ old('min_age', $creditCash->min_age) }}" required>

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
            <label for="max_age" class="col-form-label text-md-right">{{ __('Макс. Возраст (лет)') }}</label>

            <div>
                <input id="max_age" type="number" class="numeric form-control{{ $errors->has('max_age') ? ' is-invalid' : '' }}" name="max_age" value="{{ old('max_age', $creditCash->max_age) }}" >

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

    <div class="col-xs-12 col-md-4">
        <div class="form-group">
            <label for="experience" class="col-form-label text-md-right">{{ __('Стаж') }}</label>

            <div>
                <input id="experience" type="text" class="form-control{{ $errors->has('experience') ? ' is-invalid' : '' }}" name="experience" value="{{ old('experience', $creditCash->experience) }}">

                @if ($errors->has('experience'))
                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('experience') }}</strong>
                                            </span>
                @endif

            </div>
        </div>
    </div>

    <div class="col-xs-12 col-md-4">
        <div class="form-group">
            <label for="registration" class="col-form-label text-md-right">{{ __('Регистрация') }}</label>

            <div>
                <input id="registration" type="text" class="form-control{{ $errors->has('registration') ? ' is-invalid' : '' }}" name="registration" value="{{ old('registration', $creditCash->registration) }}">

                @if ($errors->has('registration'))
                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('registration') }}</strong>
                                            </span>
                @endif

            </div>
        </div>
    </div>

    <div class="col-xs-12 col-md-4">
        <div class="form-group">
            <label for="nationality" class="col-form-label text-md-right">{{ __('Гражданство') }}</label>

            <div>
                <input id="nationality" type="text" class="form-control{{ $errors->has('nationality') ? ' is-invalid' : '' }}" name="nationality" value="{{ old('nationality', $creditCash->nationality) }}">

                @if ($errors->has('nationality'))
                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('nationality') }}</strong>
                                            </span>
                @endif

            </div>
        </div>
    </div>


</div>

<div class="row">
    <div class="col-xs-12 col-md-12">
        <div class="form-group">
            <label for="optional_documents" class="col-form-label text-md-right">{{ __('Необязательные документы') }}</label>

            <div>
                <textarea name="optional_documents" id="optional_documents" class="form-control ">{{old('optional_documents', $creditCash->optional_documents)}}</textarea>

                @if ($errors->has('optional_documents'))
                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('optional_documents') }}</strong>
                                            </span>
                @endif
            </div>
        </div>
    </div>
</div>




<div class="row">
    <div class="col-xs-12 col-md-6">
        <div class="form-group multi-fields">
            <label for="documents" class="col-form-label text-md-right">{{ __('Документы') }}</label>
            @foreach (old('documents', $documents) as $document)

                <div class="multi-field">
                    @if (!$loop->first)
                        <div class="mt-4 mb-4">
                            <a href="javascrit:void(0);" class="remove_multi_field btn btn-danger">Удалить</a>
                        </div>
                    @endif
                    <textarea name="documents[]" class="form-control ">{{$document}}</textarea>
                </div>

            @endforeach
            <div class="multi-fields-container">

            </div>
            <div class="mt-4 mb-4">
                <a href="javascrit:void(0);" class="add_multi_field btn btn-success" data-template="#documents">Добавить Документ</a>
            </div>
        </div>
    </div>

    <div class="col-xs-12 col-md-6">
        <div id="bid-fields" class="form-group multi-fields">
            <label for="bids" class="col-form-label text-md-right">{{ __('Ставки') }}</label>
            @foreach (old('bids', $bids) as $key => $bid)

                <div class="multi-field">
                    @if (!$loop->first)
                        <div class="mt-4 mb-4">
                            <a href="javascrit:void(0);" class="remove_multi_field btn btn-danger">Удалить</a>
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-xs-12 col-md-4">
                            <div class="form-group">
                                <label class="col-form-label text-md-right">{{ __('Мин. сумма') }}</label>

                                <div>
                                    <input type="text" class="form-control numeric" name="bids[{{$key}}][min_amount]" value="{{ old('bids['.$key.'][min_amount]', $bid['min_amount']) }}">
                                </div>
                            </div>

                        </div>
                        <div class="col-xs-12 col-md-4">
                            <div class="form-group">
                                <label class="col-form-label text-md-right">{{ __('Макс. сумма') }}</label>

                                <div>
                                    <input type="text" class="form-control numeric" name="bids[{{$key}}][max_amount]" value="{{ old('bids['.$key.'][max_amount]', $bid['max_amount']) }}">
                                </div>
                            </div>

                        </div>
                        <div class="col-xs-12 col-md-4">
                            <div class="form-group">
                                <label class="col-form-label text-md-right">{{ __('Процентная ставка') }}</label>

                                <div>
                                    <input type="text" class="form-control numeric" name="bids[{{$key}}][percent]" value="{{ old('bids['.$key.'][percent]', $bid['percent']) }}">
                                </div>
                            </div>

                        </div>
                    </div>

                </div>

            @endforeach
            <div class="multi-fields-container">

            </div>
            <div class="mt-4 mb-4">
                <a href="javascrit:void(0);" class="add_multi_field btn btn-success" data-template="#bids">Добавить Ставку</a>
            </div>
        </div>
    </div>
</div>


@include('admin.partials.seo_block', ['seo' => $seo])
