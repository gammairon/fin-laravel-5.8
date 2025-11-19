
@extends('layouts.admin')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><h3>{{ __('Создание Страницы') }}</h3></div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.blog.pages.store') }}" enctype="multipart/form-data">
                            @csrf

                            @include('admin.blog.pages.form', compact('page', 'statuses', 'seo', 'pages', 'users'))

                            <div class="form-group row mb-0 mt-4">
                                <div class="col-md-6 offset-md-3 text-center">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Создать') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
