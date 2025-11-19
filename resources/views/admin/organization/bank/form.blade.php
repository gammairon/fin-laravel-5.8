<div class="row">
    <div class="col-xs-12 col-md-8 offset-md-2">
        @include('admin.partials.primary_media', ['model' => $bank])
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
            <label for="name" class="col-form-label text-md-right required">{{ __('Название Банка') }}</label>

            <div>
                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name', $bank->name) }}" required>

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
            <label for="slug" class="col-form-label text-md-right required">{{ __('Slug Банка') }}</label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" >{{ 'bank/' }}</span>
                </div>
                <input id="slug" type="text" class="form-control{{ $errors->has('slug') ? ' is-invalid' : '' }}" name="slug" value="{{ old('slug', $bank->slug) }}" required>
                <div class="input-group-append">
                    <span class="input-group-text"><a href="{{ route('bank.single', ['slug' => $bank->slug]) }}" target="_blank">Просмотреть</a></span>
                </div>
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
            <label for="title_h1" class="col-form-label text-md-right required">{{ __('Заголовок H1') }}</label>

            <div>
                <input id="title_h1" type="text" class="form-control{{ $errors->has('title_h1') ? ' is-invalid' : '' }}" name="title_h1" value="{{ old('title_h1', $bank->title_h1) }}" required>

                @if ($errors->has('title_h1'))
                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('title_h1') }}</strong>
                                            </span>
                @endif

            </div>
        </div>
    </div>
    <div class="col-xs-12 col-md-6">
        <div class="form-group">
            <label for="ref_link" class="col-form-label text-md-right">{{ __('Реферальная ссылка') }}</label>

            <div>
                <input id="ref_link" type="text" class="form-control{{ $errors->has('ref_link') ? ' is-invalid' : '' }}" name="ref_link" value="{{ old('ref_link', $bank->ref_link) }}" >

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
                <input id="rating" type="text" class="numeric form-control{{ $errors->has('rating') ? ' is-invalid' : '' }}" name="rating" value="{{ old('rating', $bank->rating) }}" >

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
    <div class="col">
        <div class="form-group">
            <label for="description" class="col-form-label text-md-right">{{ __('Описание') }}</label>

            <div>
                <textarea name="description" id="description" class="form-control html-editor">{{old('description', $bank->description)}}</textarea>

                @if ($errors->has('description'))
                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('description') }}</strong>
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
                <textarea name="preview" id="preview" class="form-control">{{old('preview', $bank->preview)}}</textarea>

                @if ($errors->has('preview'))
                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('preview') }}</strong>
                                            </span>
                @endif
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col">
        <div class="form-group">
            <label for="shareholders" class="col-form-label text-md-right">{{ __('Акционеры банка') }}</label>

            <div>
                <textarea name="shareholders" id="shareholders" class="form-control">{{old('shareholders', $bank->shareholders)}}</textarea>

                @if ($errors->has('shareholders'))
                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('shareholders') }}</strong>
                                            </span>
                @endif
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col">
        <h3>Контактная информация</h3>
    </div>
</div>
<hr/>
<div class="row">
    <div class="col">
        <h4>Главный офис</h4>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-md-6">
        <div class="form-group">
            <label for="postcode" class="col-form-label text-md-right">{{ __('Почтовый индекс') }}</label>

            <div>
                <input id="postcode" type="text" class="form-control{{ $errors->has('postcode') ? ' is-invalid' : '' }}" name="postcode" value="{{ old('postcode', $bank->postcode) }}" >

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
                <input id="country" type="text" class="form-control{{ $errors->has('country') ? ' is-invalid' : '' }}" name="country" value="{{ old('country', $bank->country) }}" required>

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
                <input id="city" type="text" class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}" name="city" value="{{ old('city', $bank->city) }}" required>

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
                <input id="street" type="text" class="form-control{{ $errors->has('street') ? ' is-invalid' : '' }}" name="street" value="{{ old('street', $bank->street) }}" required>

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
                <input id="house" type="text" class="form-control{{ $errors->has('house') ? ' is-invalid' : '' }}" name="house" value="{{ old('house', $bank->house) }}" >

                @if ($errors->has('house'))
                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('house') }}</strong>
                                            </span>
                @endif

            </div>
        </div>
    </div>

</div>
<hr/>

<div class="row">
    <div class="col">
        <h4>Контакты</h4>
    </div>
</div>

<div class="row">

    <div class="col-xs-12 col-md-4">
        <div class="form-group">
            <label for="phone" class="col-form-label text-md-right">{{ __('Телефон') }}</label>

            <div>
                <input id="phone" type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ old('phone', $bank->phone) }}" >

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
                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email', $bank->email) }}" >

                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                @endif

            </div>
        </div>
    </div>

    <div class="col-xs-12 col-md-4">
        <div class="form-group">
            <label for="web_site" class="col-form-label text-md-right">{{ __('Web Site') }}</label>

            <div>
                <input id="web_site" type="text" class="form-control{{ $errors->has('web_site') ? ' is-invalid' : '' }}" name="web_site" value="{{ old('web_site', $bank->web_site) }}" required>

                @if ($errors->has('web_site'))
                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('web_site') }}</strong>
                                            </span>
                @endif

            </div>
        </div>
    </div>
</div>
<hr/>

<div class="row">
    <div class="col">
        <h4>Юридическая информация</h4>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-md-4">
        <div class="form-group">
            <label for="mfo" class="col-form-label text-md-right">{{ __('МФО') }}</label>

            <div>
                <input id="mfo" type="text" class="form-control{{ $errors->has('mfo') ? ' is-invalid' : '' }}" name="mfo" value="{{ old('mfo', $bank->mfo) }}" >

                @if ($errors->has('mfo'))
                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('mfo') }}</strong>
                                            </span>
                @endif

            </div>
        </div>
    </div>

    <div class="col-xs-12 col-md-4">
        <div class="form-group">
            <label for="egrdpou" class="col-form-label text-md-right">{{ __('ЕГРДПОУ') }}</label>

            <div>
                <input id="egrdpou" type="text" class="form-control{{ $errors->has('egrdpou') ? ' is-invalid' : '' }}" name="egrdpou" value="{{ old('egrdpou', $bank->egrdpou) }}" >

                @if ($errors->has('egrdpou'))
                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('egrdpou') }}</strong>
                                            </span>
                @endif

            </div>
        </div>
    </div>

    <div class="col-xs-12 col-md-4">
        <div class="form-group">
            <label for="registration" class="col-form-label text-md-right">{{ __('Регистрациия') }}</label>

            <div>
                <input id="registration" type="text" class="edit-date form-control{{ $errors->has('registration') ? ' is-invalid' : '' }}" name="registration" value="{{ old('registration', $bank->registration) }}" >

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
    <div class="col-xs-12 col-md-6">
        <div class="form-group">
            <label for="license" class="col-form-label text-md-right">{{ __('Лицензия') }}</label>

            <div>
                <input id="license" type="text" class="form-control{{ $errors->has('license') ? ' is-invalid' : '' }}" name="license" value="{{ old('license', $bank->license) }}" >

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
            <label for="country_capital" class="col-form-label text-md-right">{{ __('Страна капитала') }}</label>

            <div>
                <input id="country_capital" type="text" class="form-control{{ $errors->has('country_capital') ? ' is-invalid' : '' }}" name="country_capital" value="{{ old('country_capital', $bank->country_capital) }}" >

                @if ($errors->has('country_capital'))
                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('country_capital') }}</strong>
                                            </span>
                @endif
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-md-12">
        <div class="form-group">
            <label for="direct_shareholders" class="col-form-label text-md-right">{{ __('Прямые акционеры') }}</label>

            <div>
                <textarea name="direct_shareholders" id="direct_shareholders" class="form-control">{{old('direct_shareholders', $bank->direct_shareholders)}}</textarea>

                @if ($errors->has('direct_shareholders'))
                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('direct_shareholders') }}</strong>
                                            </span>
                @endif
            </div>
        </div>
    </div>
</div>
<hr/>
<div class="row">

    <div class="col-xs-12 col-md-6">
        <div class="form-group">
            <label for="tag_id" class="required col-form-label">Выберите Тег(для ассоциации с новостями)</label>

            <div>
                <select name="tag_id" class="select2 form-control" >
                    @foreach ($tags as $tag)
                        <option value="{{$tag->id}}" {{selected($bank->tag_id, $tag->id)}}>{{$tag->name}}</option>
                    @endforeach
                </select>

                @if ($errors->has('tag_id'))
                    <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('tag_id') }}</strong>
                                                </span>
                @endif
            </div>
        </div>
    </div>

</div>
<div class="row">
    <div class="col-xs-12 col-md-6">
        <a href="{{route('admin.blog.tags.create')}}" target="_blank" class="btn btn-success">Добавить Тег</a>
    </div>
</div>


{{--Credits cards Page Content--}}

<div class="row mt-5 mb-3">
    <div class="col">
        <h3>
            <button class="btn btn-block btn-default" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                Контент и СЕО будет выведен на странице списка <strong class="text-uppercase">карт</strong> Банка
                <span class="badge badge-secondary"><i class="fa fa-angle-down"></i></span>
            </button>
        </h3>
    </div>
</div>

<div id="collapseOne" class="collapse" aria-labelledby="headingOne">
    <div class="row">
        <div class="col-xs-12 col-md-4">
            <div class="form-group">
                <label for="cards_page[title]" class="col-form-label">{{ __('Title') }}</label>

                <div>
                    <input id="cards_page[title]" type="text" class="form-control{{ $errors->has('cards_page.title') ? ' is-invalid' : '' }}" name="cards_page[title]" value="{{ old('cards_page.title', $cardsPageSeo->title) }}">

                    @if ($errors->has('cards_page.title'))
                        <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('cards_page.title') }}</strong>
                </span>
                    @endif

                </div>
            </div>
        </div>
        <div class="col-xs-12 col-md-4">
            <div class="form-group">
                <label for="cards_page[description]" class="col-form-label text-md-right">{{ __('Description') }}</label>

                <div>
                    <textarea name="cards_page[description]" id="cards_page[description]" class="form-control">{{old('cards_page.description', $cardsPageSeo->description)}}</textarea>

                    @if ($errors->has('cards_page.description'))
                        <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('cards_page.description') }}</strong>
                </span>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-md-4">
            <div class="form-group">
                <label for="cards_page[keywords]" class="col-form-label text-md-right">{{ __('Keywords') }}</label>

                <div>
                    <textarea name="cards_page[keywords]" id="cards_page[keywords]" class="form-control">{{old('cards_page.keywords', $cardsPageSeo->keywords)}}</textarea>

                    @if ($errors->has('cards_page.keywords'))
                        <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('cards_page.keywords') }}</strong>
                </span>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-md-4">
            <div class="form-group">
                <label for="cards_page[canonical]" class="col-form-label">{{ __('Canonical') }}</label>

                <div>
                    <input id="cards_page[canonical]" type="text" class="form-control{{ $errors->has('cards_page.canonical') ? ' is-invalid' : '' }}" name="cards_page[canonical]" value="{{ old('cards_page.canonical', $cardsPageSeo->canonical) }}" readonly>

                    @if ($errors->has('cards_page.canonical'))
                        <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('cards_page.canonical') }}</strong>
                </span>
                    @endif

                </div>
            </div>
        </div>

        <div class="col-xs-12 col-md-4 pt-2 pl-3" >
            <label>Robots</label>

            <div class="row">
                <div class="col">
                    <div class="form-check">
                        <input type="radio" id="robot_index_cards_page" class="form-check-input" name="cards_page[robot_index]" value="INDEX" {{ checked( 'INDEX', old('cards_page.robot_index', $cardsPageSeo->robot_index) ) }}>
                        <label for="robot_index_cards_page">INDEX</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" id="robot_noindex_cards_page" class="form-check-input" name="cards_page[robot_index]" value="NOINDEX" {{ checked( 'NOINDEX', old('cards_page.robot_index', $cardsPageSeo->robot_index) ) }}>
                        <label for="robot_noindex_cards_page">NOINDEX</label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-check">
                        <input type="radio" id="robot_follow_cards_page" class="form-check-input" name="cards_page[robot_follow]" value="FOLLOW" {{ checked( 'FOLLOW', old('cards_page.robot_follow', $cardsPageSeo->robot_follow) ) }}>
                        <label for="robot_follow_cards_page">FOLLOW</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" id="robot_nofollow_cards_page" class="form-check-input" name="cards_page[robot_follow]" value="NOFOLLOW" {{ checked( 'NOFOLLOW', old('cards_page.robot_follow', $cardsPageSeo->robot_follow) ) }}>
                        <label for="robot_nofollow_cards_page">NOFOLLOW</label>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <div class="row">
        <div class="col-xs-12 col-md-6">
            <div class="form-group">
                <label for="cards_page[title_page]" class="col-form-label text-md-right">{{ __('Title страницы') }}</label>
                <div>
                    <input id="cards_page[title_page]" type="text" class="form-control{{ $errors->has('cards_page.title_page') ? ' is-invalid' : '' }}" name="cards_page[title_page]" value="{{ old('cards_page.title_page', $cardsPageSeo->title_page) }}" >

                    @if ($errors->has('cards_page.title_page'))
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('cards_page.title_page') }}</strong>
                    </span>
                    @endif

                </div>
            </div>
        </div>

        <div class="col-xs-12 col-md-6">
            <div class="form-group">
                <label for="cards_page[subtitle_page]" class="col-form-label text-md-right">{{ __('Надпись под Title страницы(Subtitle)') }}</label>
                <div>
                    <input id="cards_page[subtitle_page]" type="text" class="form-control{{ $errors->has('cards_page.subtitle_page') ? ' is-invalid' : '' }}" name="cards_page[subtitle_page]" value="{{ old('cards_page.subtitle_page', $cardsPageSeo->subtitle_page) }}" >

                    @if ($errors->has('cards_page.subtitle_page'))
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('cards_page.subtitle_page') }}</strong>
                    </span>
                    @endif

                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-md-12">
            <div class="form-group">
                <label for="cards_page[content_page]" class="col-form-label text-md-right">{{ __('Контент страницы') }}</label>

                <div>
                    <textarea name="cards_page[content_page]" id="cards_page[content_page]" class="html-editor form-control">{{old('cards_page.content_page', $cardsPageSeo->content_page)}}</textarea>

                    @if ($errors->has('cards_page.content_page'))
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('cards_page.content_page') }}</strong>
                    </span>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<hr/>
{{--===============================--}}

{{--Credits cash Page Content--}}
<div class="row mt-4 mb-3">
    <div class="col">
        <h3>
            <button class="btn btn-block btn-default" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                Контент и СЕО будет выведен на странице списка <strong class="text-uppercase">кредитов</strong> Банка
                <span class="badge badge-secondary"><i class="fa fa-angle-down"></i></span>
            </button>
        </h3>
    </div>
</div>

<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo">
    <div class="row">
        <div class="col-xs-12 col-md-4">
            <div class="form-group">
                <label for="credits_page[title]" class="col-form-label">{{ __('Title') }}</label>

                <div>
                    <input id="credits_page[title]" type="text" class="form-control{{ $errors->has('credits_page.title') ? ' is-invalid' : '' }}" name="credits_page[title]" value="{{ old('credits_page.title', $creditsPageSeo->title) }}">

                    @if ($errors->has('credits_page.title'))
                        <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('credits_page.title') }}</strong>
                </span>
                    @endif

                </div>
            </div>
        </div>
        <div class="col-xs-12 col-md-4">
            <div class="form-group">
                <label for="credits_page[description]" class="col-form-label text-md-right">{{ __('Description') }}</label>

                <div>
                    <textarea name="credits_page[description]" id="credits_page[description]" class="form-control">{{old('credits_page.description', $creditsPageSeo->description)}}</textarea>

                    @if ($errors->has('credits_page.description'))
                        <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('credits_page.description') }}</strong>
                </span>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-md-4">
            <div class="form-group">
                <label for="credits_page[keywords]" class="col-form-label text-md-right">{{ __('Keywords') }}</label>

                <div>
                    <textarea name="credits_page[keywords]" id="credits_page[keywords]" class="form-control">{{old('credits_page.keywords', $creditsPageSeo->keywords)}}</textarea>

                    @if ($errors->has('credits_page.keywords'))
                        <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('credits_page.keywords') }}</strong>
                </span>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-md-4">
            <div class="form-group">
                <label for="credits_page[canonical]" class="col-form-label">{{ __('Canonical') }}</label>

                <div>
                    <input id="credits_page[canonical]" type="text" class="form-control{{ $errors->has('credits_page.canonical') ? ' is-invalid' : '' }}" name="credits_page[canonical]" value="{{ old('credits_page.canonical', $creditsPageSeo->canonical) }}" readonly>

                    @if ($errors->has('credits_page.canonical'))
                        <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('credits_page.canonical') }}</strong>
                </span>
                    @endif

                </div>
            </div>
        </div>

        <div class="col-xs-12 col-md-4 pt-2 pl-3" >
            <label>Robots</label>

            <div class="row">
                <div class="col">
                    <div class="form-check">
                        <input type="radio" id="robot_index_credits_page" class="form-check-input" name="credits_page[robot_index]" value="INDEX" {{ checked( 'INDEX', old('credits_page.robot_index', $creditsPageSeo->robot_index) ) }}>
                        <label for="robot_index_credits_page">INDEX</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" id="robot_noindex_credits_page" class="form-check-input" name="credits_page[robot_index]" value="NOINDEX" {{ checked( 'NOINDEX', old('credits_page.robot_index', $creditsPageSeo->robot_index) ) }}>
                        <label for="robot_noindex_credits_page">NOINDEX</label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-check">
                        <input type="radio" id="robot_follow_credits_page" class="form-check-input" name="credits_page[robot_follow]" value="FOLLOW" {{ checked( 'FOLLOW', old('credits_page.robot_follow', $creditsPageSeo->robot_follow) ) }}>
                        <label for="robot_follow_credits_page">FOLLOW</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" id="robot_nofollow_credits_page" class="form-check-input" name="credits_page[robot_follow]" value="NOFOLLOW" {{ checked( 'NOFOLLOW', old('credits_page.robot_follow', $creditsPageSeo->robot_follow) ) }}>
                        <label for="robot_nofollow_credits_page">NOFOLLOW</label>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <div class="row">
        <div class="col-xs-12 col-md-6">
            <div class="form-group">
                <label for="credits_page[title_page]" class="col-form-label text-md-right">{{ __('Title страницы') }}</label>
                <div>
                    <input id="credits_page[title_page]" type="text" class="form-control{{ $errors->has('credits_page.title_page') ? ' is-invalid' : '' }}" name="credits_page[title_page]" value="{{ old('credits_page.title_page', $creditsPageSeo->title_page) }}" >

                    @if ($errors->has('credits_page.title_page'))
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('credits_page.title_page') }}</strong>
                    </span>
                    @endif

                </div>
            </div>
        </div>

        <div class="col-xs-12 col-md-6">
            <div class="form-group">
                <label for="credits_page[subtitle_page]" class="col-form-label text-md-right">{{ __('Надпись под Title страницы(Subtitle)') }}</label>
                <div>
                    <input id="credits_page[subtitle_page]" type="text" class="form-control{{ $errors->has('credits_page.subtitle_page') ? ' is-invalid' : '' }}" name="credits_page[subtitle_page]" value="{{ old('credits_page.subtitle_page', $creditsPageSeo->subtitle_page) }}" >

                    @if ($errors->has('credits_page.subtitle_page'))
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('credits_page.subtitle_page') }}</strong>
                    </span>
                    @endif

                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-md-12">
            <div class="form-group">
                <label for="credits_page[content_page]" class="col-form-label text-md-right">{{ __('Контент страницы') }}</label>

                <div>
                    <textarea name="credits_page[content_page]" id="credits_page[content_page]" class="html-editor form-control">{{old('credits_page.content_page', $creditsPageSeo->content_page)}}</textarea>

                    @if ($errors->has('credits_page.content_page'))
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('credits_page.content_page') }}</strong>
                    </span>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
{{--===============================--}}


@include('admin.partials.seo_block', ['seo' => $seo])
