<div class="row">
    <div class="col-xs-12 col-md-8 offset-md-2">
        @include('admin.partials.primary_media', ['model' => $page])
    </div>
</div>

<div class="row">

    <div class="col-xs-12 col-md-6">
        <div class="form-group">
            <label for="name" class="col-form-label text-md-right">{{ __('Title Страницы') }}</label>

            <div>
                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name', $page->name) }}" required>

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
                <input id="slug" type="text" class="form-control{{ $errors->has('slug') ? ' is-invalid' : '' }}" name="slug" value="{{ old('slug', $page->slug) }}" required>
                <div class="input-group-append">
                    <span class="input-group-text"><a href="{{ route('page', ['slug' => $page->slug]) }}" target="_blank">Просмотреть</a></span>
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
                <textarea name="content" id="content" class="form-control html-editor">{{old('content', $page->content)}}</textarea>

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
    <div class="col-xs-12 col-md-3">
        <div class="form-group">
            <label for="status" class="col-form-label text-md-right">{{ __('Статус') }}</label>

            <div>
                <select id="status" name="status" class="form-control{{ $errors->has('status') ? ' is-invalid' : '' }}" required>
                    @foreach ($statuses as $key => $name)
                        <option value="{{$key}}" {{selected(old('status', $page->status), $key)}}>{{ucfirst($name)}}</option>
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

    <div class="col-xs-12 col-md-3">
        <div class="form-group">
            <label for="public_date" class="col-form-label text-md-right">{{ __('Дата публикации') }}</label>
            <!-- <aria-label="Recipient's username"  -->


            <div class="input-group mb-3 date date-field edit-date">
                <input id="public_date" type="text" class="form-control{{ $errors->has('public_date') ? ' is-invalid' : '' }}" name="public_date" value="{{ old('public_date', $page->public_date ? $page->public_date->format('d/m/Y'):'') }}" >
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

    <div class="col-xs-12 col-md-3">
        <div class="form-group">
            <label for="status" class="col-form-label text-md-right">{{ __('Родительская страница') }}</label>

            <div>
                <select id="parent_id" name="parent_id" class="form-control{{ $errors->has('parent_id') ? ' is-invalid' : '' }}" >
                    <option value="">Нет родительской</option>
                    @foreach ($pages as $id => $name)
                        <option value="{{$id}}" {{selected(old('parent_id', $page->parent_id), $id)}}>{{$name}}</option>
                    @endforeach
                </select>

                @if ($errors->has('parent_id'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('parent_id') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div>

    <div class="col-xs-12 col-md-3">
        <div class="form-group">
            <label for="user_id" class="col-form-label text-md-right">{{ __('Автор') }}</label>

            <div>
                <select id="user_id" name="user_id" class="form-control{{ $errors->has('user_id') ? ' is-invalid' : '' }}" required>
                    @foreach ($users as $id => $username)
                        <option value="{{$id}}" {{selected(old('user_id', $page->user_id ?? Auth::id() ), $id)}}>{{$username}}</option>
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
