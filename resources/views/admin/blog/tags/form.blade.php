<div class="row">
    <div class="col-xs-12 col-md-8 offset-md-2">
        @include('admin.partials.primary_media', ['model' => $tag])
    </div>
</div>

<div class="row">

    <div class="col-xs-12 col-md-6">
        <div class="form-group">
            <label for="name" class="col-form-label text-md-right">{{ __('Имя Тега') }}</label>

            <div>

                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name', $tag->name) }}" required>

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
            <label for="slug" class="col-form-label text-md-right">{{ __('Slug Тега') }}</label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" >{{ config('app.url').'/tags/' }}</span>
                </div>
                <input id="slug" type="text" class="form-control{{ $errors->has('slug') ? ' is-invalid' : '' }}" name="slug" value="{{ old('slug', $tag->slug) }}" required>

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
            <label for="description" class="col-form-label text-md-right">{{ __('Краткое описание') }}</label>

            <div>
                <textarea name="description" id="description" class="form-control html-editor">{{old('description', $tag->description)}}</textarea>

                @if ($errors->has('description'))
                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('description') }}</strong>
                                            </span>
                @endif
            </div>
        </div>
    </div>
</div>

@include('admin.partials.seo_block', ['seo' => $seo])

