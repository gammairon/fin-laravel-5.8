
<div class="row">
    <div class="col-xs-12 col-md-8 offset-md-2">
        @include('admin.partials.primary_media', ['model' => $post])
    </div>
</div>

<div class="row">
    <div class="col">
        <div class="form-check mb-3 mt-3 h5">
            <input type="hidden" name="top" value="0" >
            <input class="form-check-input" type="checkbox" id="top" name="top" value="1" {{checked(1, old('top', $post->top) )}}>
            <label class="form-check-label" for="top">Топ новость</label>
        </div>
    </div>
</div>

<div class="row">

    <div class="col-xs-12 col-md-6">
        <div class="form-group">
            <label for="name" class="col-form-label text-md-right required">{{ __('Title Страницы') }}</label>

            <div>
                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name', $post->name) }}" required>

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
            <label for="slug" class="col-form-label text-md-right">{{ __('Slug Страницы') }}</label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" >{{ config('app.url').'/' }}</span>
                </div>
                <input id="slug" type="text" class="form-control{{ $errors->has('slug') ? ' is-invalid' : '' }}" name="slug" value="{{ old('slug', $post->slug) }}" >
                <div class="input-group-append">
                    <span class="input-group-text"><a href="{{ route('page', ['slug' => $post->slug]) }}" target="_blank">Просмотреть</a></span>
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
    <div class="col">
        <div class="form-group">
            <label for="content" class="col-form-label text-md-right">{{ __('Content') }}</label>

            <div>
                <textarea name="content" id="content" class="form-control html-editor">{{old('content', $post->content)}}</textarea>

                @if ($errors->has('content'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('content') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col">
        <div class="form-group">
            <label for="excerpt" class="col-form-label text-md-right">{{ __('Краткое содержание') }}</label>

            <div>
                <textarea name="excerpt" id="excerpt" class="form-control">{{old('excerpt', $post->excerpt)}}</textarea>

                @if ($errors->has('excerpt'))
                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('excerpt') }}</strong>
                                            </span>
                @endif
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-md-6">
        <h3>Выберите категории</h3>

        {!!buildCheckboxTree($categories, 'categories', $post->categories->pluck('id')->toArray() )!!}

    </div>
    <div class="col-xs-12 col-md-6">
        <h3>Выберите Теги</h3>
        <select name="tags[]" class="select2-multi" multiple>

            @foreach ($tags as $tag)
                <option value="{{$tag->id}}" {{in_array($tag->id, $post->tags->pluck('id')->toArray()) ? 'selected':'' }}>{{$tag->name}}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-md-4">
        <div class="form-group">
            <label for="status" class="col-form-label text-md-right">{{ __('Статус') }}</label>

            <div>
                <select id="status" name="status" class="form-control{{ $errors->has('status') ? ' is-invalid' : '' }}" required>
                    @foreach ($statuses as $key => $name)
                        <option value="{{$key}}" {{selected(old('status', $post->status), $key)}}>{{ucfirst($name)}}</option>
                    @endforeach
                </select>

                @if ($errors->has('status'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('status') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div>

    <div class="col-xs-12 col-md-4">
        <div class="form-group">
            <label for="public_date" class="col-form-label text-md-right">{{ __('Дата публикации') }}</label>

            <div class="input-group mb-3 date date-field edit-date">
                <input id="public_date" type="text" class="form-control{{ $errors->has('public_date') ? ' is-invalid' : '' }}" name="public_date" value="{{ old('public_date', $post->public_date ? $post->public_date->format('d/m/Y'):'') }}" >
                <div class="input-group-append input-group-addon">
                    <span class="input-group-text" ><i class="fa fa-calendar" aria-hidden="true"></i></span>
                </div>

                @if ($errors->has('public_date'))
                    <span class="invalid-feedback show" role="alert">
                        <strong>{{ $errors->first('public_date') }}</strong>
                    </span>
                @endif

            </div>
        </div>
    </div>

    <div class="col-xs-12 col-md-4">
        <div class="form-group">
            <label for="user_id" class="col-form-label text-md-right">{{ __('Автор') }}</label>

            <div>
                <select id="user_id" name="user_id" class="form-control{{ $errors->has('user_id') ? ' is-invalid' : '' }}" required>
                    @foreach ($users as $id => $username)
                        <option value="{{$id}}" {{selected(old('user_id', $post->user_id ?? Auth::id()), $id)}}>{{$username}}</option>
                    @endforeach
                </select>

                @if ($errors->has('user_id'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('user_id') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div>
</div>


@include('admin.partials.seo_block', ['seo' => $seo])

@include('admin.partials.faq_block', ['faqs' => $faqs])
