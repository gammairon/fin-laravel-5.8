<div class="row">
    <div class="col-xs-12 col-md-8 offset-md-2">
        @include('admin.partials.primary_media', ['model' => $category])
    </div>
</div>

<div class="row">

    <div class="col-xs-12 col-md-6">
        <div class="form-group">
            <label for="name" class="col-form-label text-md-right">{{ __('Имя Категории') }}</label>

            <div>
                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name', $category->name) }}" required>

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
            <label for="slug" class="col-form-label text-md-right">{{ __('Slug Категории') }}</label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" >{{ $category->getSlugPrefix() }}</span>
                </div>
                <input id="slug" type="text" class="form-control{{ $errors->has('slug') ? ' is-invalid' : '' }}" name="slug" value="{{ old('slug', $category->slug) }}" required>

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
                <textarea name="description" id="description" class="form-control html-editor">{{old('description', $category->description)}}</textarea>

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

    <div class="col-xs-12 col-md-4">
        <div class="form-group">
            <label for="parent_id" class="col-form-label text-md-right">{{ __('Родительская категория') }}</label>

            <div>
                <select id="parent_id" name="parent_id" class="form-control{{ $errors->has('parent_id') ? ' is-invalid' : '' }}" >
                    <option value="">Нет родительской</option>
                    @foreach ($categories as $id => $name)
                        <option value="{{$id}}" {{selectedOld('parent_id', $id, $category->parent_id)}}>{{$name}}</option>
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
</div>

@include('admin.partials.seo_block', ['seo' => $seo])
