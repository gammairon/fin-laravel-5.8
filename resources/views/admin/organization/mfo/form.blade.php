<div class="row">
    <div class="col-xs-12 col-md-8 offset-md-2">
        @include('admin.partials.primary_media', ['model' => $mfo])
    </div>
</div>

<hr/>

<div class="row">
    <div class="col-xs-12 col-md-6">
        <div class="form-group">
            <label for="name" class="col-form-label text-md-righ required">{{ __('Название МФО') }}</label>

            <div>
                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name', $mfo->name) }}" required>

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
            <label for="subtitle" class="col-form-label text-md-righ required">{{ __('Подзаголовок') }}</label>

            <div>
                <input id="subtitle" type="text" class="form-control{{ $errors->has('subtitle') ? ' is-invalid' : '' }}" name="subtitle" value="{{ old('subtitle', $mfo->subtitle) }}" required>

                @if ($errors->has('subtitle'))
                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('subtitle') }}</strong>
                                            </span>
                @endif

            </div>
        </div>
    </div>
</div>

<div class="row">

    <div class="col-xs-12 col-md-6">
        <div class="form-group">
            <label for="slug" class="col-form-label text-md-right required">{{ __('Slug МФО') }}</label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" >{{'mfo/' }}</span>
                </div>
                <input id="slug" type="text" class="form-control{{ $errors->has('slug') ? ' is-invalid' : '' }}" name="slug" value="{{ old('slug', $mfo->slug) }}" required>
                @if($mfo->exists)
                    <div class="input-group-append">
                        <span class="input-group-text"><a href="{{ route('mfo.single', $mfo) }}" target="_blank">Просмотреть</a></span>
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

    <div class="col-xs-12 col-md-6">
        <div class="form-group">
            <label for="ref_link" class="col-form-label text-md-right required">{{ __('Реф.ссылка') }}</label>

            <div>
                <input id="ref_link" type="text" class="form-control{{ $errors->has('ref_link') ? ' is-invalid' : '' }}" name="ref_link" value="{{ old('ref_link', $mfo->ref_link) }}" required>

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
    <div class="col-xs-12 col-md-4">
        <div class="form-group">
            <label for="rating" class="col-form-label text-md-right">{{ __('Рейтинг от 0 - 100 балов') }}</label>

            <div>
                <input id="rating" type="text" class="numeric form-control{{ $errors->has('rating') ? ' is-invalid' : '' }}" name="rating" value="{{ old('rating', $mfo->rating) }}">

                @if ($errors->has('rating'))
                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('rating') }}</strong>
                                            </span>
                @endif

            </div>
        </div>
    </div>

    <div class="col-xs-12 col-md-4">
        <div class="form-group">
            <label for="first_credit" class="col-form-label text-md-right">{{ __('Первый кредит') }}</label>

            <div>
                <input id="first_credit" type="text" class="numeric form-control{{ $errors->has('first_credit') ? ' is-invalid' : '' }}" name="first_credit" value="{{ old('first_credit', $mfo->first_credit) }}">

                @if ($errors->has('first_credit'))
                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('first_credit') }}</strong>
                                            </span>
                @endif

            </div>
        </div>
    </div>

    <div class="col-xs-12 col-md-4">
        <div class="form-group">
            <label for="repeat_credit_bid" class="col-form-label text-md-right">{{ __('Ставка для повторного займа') }}</label>

            <div>
                <input id="repeat_credit_bid" type="text" class="numeric form-control{{ $errors->has('repeat_credit_bid') ? ' is-invalid' : '' }}" name="repeat_credit_bid" value="{{ old('repeat_credit_bid', $mfo->repeat_credit_bid) }}">

                @if ($errors->has('repeat_credit_bid'))
                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('repeat_credit_bid') }}</strong>
                                            </span>
                @endif

            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-md-6">
        <div class="form-group">
            <label for="license" class="col-form-label text-md-right">{{ __('Лицензия') }}</label>

            <div>
                <input id="license" type="text" class="form-control{{ $errors->has('license') ? ' is-invalid' : '' }}" name="license" value="{{ old('license', $mfo->license) }}" >

                @if ($errors->has('license'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('license') }}</strong>
                    </span>
                @endif

            </div>
        </div>
    </div>
    <div class="col-xs-12 col-md-6">
        <div class="form-group">
            <label for="registration" class="col-form-label text-md-right">{{ __('Регистрациия') }}</label>

            <div>
                <input id="registration" type="text" class="edit-date form-control{{ $errors->has('registration') ? ' is-invalid' : '' }}" name="registration" value="{{ old('registration', $mfo->registration) }}" >

                @if ($errors->has('registration'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('registration') }}</strong>
                    </span>
                @endif

            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col">
        <div class="form-group">
            <label for="preview" class="col-form-label text-md-right">{{ __('Анонс') }}</label>

            <div>
                <textarea name="preview" id="preview" class="form-control ">{{old('preview', $mfo->preview)}}</textarea>

                @if ($errors->has('preview'))
                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('preview') }}</strong>
                                            </span>
                @endif
            </div>
        </div>
    </div>
</div>
<hr/>

<div class="row">
    <div class="col">
        <h3>Бесплатный кредит</h3>
    </div>
</div>
<div class="row">

    <div class="col-xs-12 col-md-6">
        <div class="form-group">
            <label for="free_credit_bid" class="col-form-label text-md-right ">{{ __('Ставка') }}</label>

            <div>
                <input id="free_credit_bid" type="text" class="numeric form-control{{ $errors->has('free_credit_bid') ? ' is-invalid' : '' }}" name="free_credit_bid" value="{{ old('free_credit_bid', $mfo->free_credit_bid) }}" >

                @if ($errors->has('free_credit_bid'))
                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('free_credit_bid') }}</strong>
                                            </span>
                @endif

            </div>
        </div>
    </div>

    <div class="col-xs-12 col-md-6">
        <div class="form-group">
            <label for="free_credit_amount" class="col-form-label text-md-right ">{{ __('Сумма') }}</label>

            <div>
                <input id="free_credit_amount" type="text" class="numeric form-control{{ $errors->has('free_credit_amount') ? ' is-invalid' : '' }}" name="free_credit_amount" value="{{ old('free_credit_amount', $mfo->free_credit_amount) }}" >

                @if ($errors->has('free_credit_amount'))
                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('free_credit_amount') }}</strong>
                                            </span>
                @endif

            </div>
        </div>
    </div>

</div>

<div class="row">
    <div class="col">
        <div class="form-group">
            <label for="free_credit_description" class="col-form-label text-md-right">{{ __('Описание') }}</label>

            <div>
                <textarea name="free_credit_description" id="free_credit_description" class="form-control html-editor">{{old('free_credit_description', $mfo->free_credit_description)}}</textarea>

                @if ($errors->has('free_credit_description'))
                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('free_credit_description') }}</strong>
                                            </span>
                @endif
            </div>
        </div>
    </div>
</div>
<hr/>

<div class="row">
    <div class="col">
        <h3>Сумма</h3>
    </div>
</div>
<div class="row">

    <div class="col-xs-12 col-md-6">
        <div class="form-group">
            <label for="min_amount" class="col-form-label text-md-right required">{{ __('Мин. сумма') }}</label>

            <div>
                <input id="min_amount" type="text" class="numeric form-control{{ $errors->has('min_amount') ? ' is-invalid' : '' }}" name="min_amount" value="{{ old('min_amount', $mfo->min_amount) }}" required>

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
            <label for="max_amount" class="col-form-label text-md-right required">{{ __('Макс. сумма') }}</label>

            <div>
                <input id="max_amount" type="text" class="numeric form-control{{ $errors->has('max_amount') ? ' is-invalid' : '' }}" name="max_amount" value="{{ old('max_amount', $mfo->max_amount) }}" required>

                @if ($errors->has('max_amount'))
                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('max_amount') }}</strong>
                                            </span>
                @endif

            </div>
        </div>
    </div>

</div>
<hr/>

<div class="row">
    <div class="col">
        <h3>Срок</h3>
    </div>
</div>
<div class="row">

    <div class="col-xs-12 col-md-6">
        <div class="form-group">
            <label for="min_term" class="col-form-label text-md-right required">{{ __('Мин. срок') }}</label>

            <div>
                <input id="min_term" type="number" class="numeric form-control{{ $errors->has('min_term') ? ' is-invalid' : '' }}" name="min_term" value="{{ old('min_term', $mfo->min_term) }}" required>

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
            <label for="max_term" class="col-form-label text-md-right required">{{ __('Макс. срок') }}</label>

            <div>
                <input id="max_term" type="number" class="numeric form-control{{ $errors->has('max_term') ? ' is-invalid' : '' }}" name="max_term" value="{{ old('max_term', $mfo->max_term) }}" required>

                @if ($errors->has('max_term'))
                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('max_term') }}</strong>
                                            </span>
                @endif

            </div>
        </div>
    </div>

</div>
<hr/>

<div class="row">
    <div class="col">
        <h3>Возраст</h3>
    </div>
</div>
<div class="row">

    <div class="col-xs-12 col-md-6">
        <div class="form-group">
            <label for="min_age" class="col-form-label text-md-right required">{{ __('Мин. Возраст') }}</label>

            <div>
                <input id="min_age" type="number" class="numeric form-control{{ $errors->has('min_age') ? ' is-invalid' : '' }}" name="min_age" value="{{ old('min_age', $mfo->min_age) }}" required>

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
            <label for="max_age" class="col-form-label text-md-right required">{{ __('Макс. Возраст') }}</label>

            <div>
                <input id="max_age" type="number" class="numeric form-control{{ $errors->has('max_age') ? ' is-invalid' : '' }}" name="max_age" value="{{ old('max_age', $mfo->max_age) }}" required>

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
            <label for="time_review" class="col-form-label text-md-right required">{{ __('Время рассмотрения') }}</label>

            <div>
                <input id="time_review" type="text" class="numeric form-control{{ $errors->has('time_review') ? ' is-invalid' : '' }}" name="time_review" value="{{ old('time_review', $mfo->time_review) }}" required>

                @if ($errors->has('time_review'))
                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('time_review') }}</strong>
                                            </span>
                @endif

            </div>
        </div>
    </div>

    <div class="col-xs-12 col-md-2">
        <div class="form-group">
            <label class="col-form-label text-md-right">Способы получения: </label>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="1" name="receiving_method_card" id="receiving_method_card" {{checked(1, $mfo->receiving_method_card)}}>
                <label class="form-check-label" for="receiving_method_card">
                    Карта
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="1" id="receiving_method_cash" name="receiving_method_cash" {{checked(1, $mfo->receiving_method_cash)}}>
                <label class="form-check-label" for="receiving_method_cash">
                    Наличными
                </label>
            </div>
        </div>
    </div>

    <div class="col-xs-12 col-md-6">
        <div class="form-group">
            <label for="special_offer" class="col-form-label text-md-right">{{ __('Специальное предложение') }}</label>

            <div>
                <textarea name="special_offer" id="special_offer" class="form-control ">{{old('special_offer', $mfo->special_offer)}}</textarea>

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
        <h3>Контакты</h3>
    </div>
</div>
<div class="row">

    <div class="col-xs-12 col-md-4">
        <div class="form-group">
            <label for="web_site" class="col-form-label text-md-right required">{{ __('Веб-сайт') }}</label>

            <div>
                <input id="web_site" type="text" class="form-control{{ $errors->has('web_site') ? ' is-invalid' : '' }}" name="web_site" value="{{ old('web_site', $mfo->web_site) }}" required>

                @if ($errors->has('web_site'))
                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('web_site') }}</strong>
                                            </span>
                @endif

            </div>
        </div>
    </div>

    <div class="col-xs-12 col-md-4">
        <div class="form-group">
            <label for="phone" class="col-form-label text-md-right">{{ __('Телефоны') }}</label>

            <div>
                <input id="phone" type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ old('phone', $mfo->phone) }}" >

                @if ($errors->has('phone'))
                    <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('phone') }}</strong>
                                                </span>
                @endif

            </div>
        </div>
    </div>

    <div class="col-xs-12 col-md-4">
        <div class="form-group">
            <label for="email" class="col-form-label text-md-right">{{ __('Email') }}</label>

            <div>
                <input id="email" type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email', $mfo->email) }}" >

                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                @endif

            </div>
        </div>
    </div>
</div>

<div class="row">

    <div class="col-xs-12 col-md-6">
        <div class="form-group">
            <label for="work_time" class="col-form-label text-md-right">{{ __('Время работы поддержки') }}</label>

            <div>
                <input id="work_time" type="text" class="form-control{{ $errors->has('work_time') ? ' is-invalid' : '' }}" name="work_time" value="{{ old('work_time', $mfo->work_time) }}">

                @if ($errors->has('work_time'))
                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('work_time') }}</strong>
                                            </span>
                @endif

            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col">
        <h4>Адрес</h4>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-md-6">
        <div class="form-group">
            <label for="postcode" class="col-form-label text-md-right">{{ __('Почтовый индекс') }}</label>

            <div>
                <input id="postcode" type="text" class="form-control{{ $errors->has('postcode') ? ' is-invalid' : '' }}" name="postcode" value="{{ old('postcode', $mfo->postcode) }}" >

                @if ($errors->has('postcode'))
                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('postcode') }}</strong>
                                            </span>
                @endif

            </div>
        </div>
    </div>

    <div class="col-xs-12 col-md-6">
        <div class="form-group">
            <label for="country" class="col-form-label text-md-right required">{{ __('Страна') }}</label>

            <div>
                <input id="country" type="text" class="form-control{{ $errors->has('country') ? ' is-invalid' : '' }}" name="country" value="{{ old('country', $mfo->country) }}" required>

                @if ($errors->has('country'))
                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('country') }}</strong>
                                            </span>
                @endif

            </div>
        </div>
    </div>

</div>
<div class="row">
    <div class="col-xs-12 col-md-6">
        <div class="form-group">
            <label for="city" class="col-form-label text-md-right required">{{ __('Город') }}</label>

            <div>
                <input id="city" type="text" class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}" name="city" value="{{ old('city', $mfo->city) }}" required>

                @if ($errors->has('city'))
                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('city') }}</strong>
                                            </span>
                @endif

            </div>
        </div>
    </div>

    <div class="col-xs-12 col-md-6">
        <div class="form-group">
            <label for="street" class="col-form-label text-md-right required">{{ __('Улица') }}</label>

            <div>
                <input id="street" type="text" class="form-control{{ $errors->has('street') ? ' is-invalid' : '' }}" name="street" value="{{ old('street', $mfo->street) }}" required>

                @if ($errors->has('street'))
                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('street') }}</strong>
                                            </span>
                @endif

            </div>
        </div>
    </div>

</div>
<div class="row">
    <div class="col-xs-12 col-md-6">
        <div class="form-group">
            <label for="house" class="col-form-label text-md-right">{{ __('Дом') }}</label>

            <div>
                <input id="house" type="text" class="form-control{{ $errors->has('house') ? ' is-invalid' : '' }}" name="house" value="{{ old('house', $mfo->house) }}" >

                @if ($errors->has('house'))
                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('house') }}</strong>
                                            </span>
                @endif

            </div>
        </div>
    </div>

</div>

@include('admin.partials.seo_block', ['seo' => $seo])
