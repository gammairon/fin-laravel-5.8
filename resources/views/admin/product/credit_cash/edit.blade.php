@extends('layouts.admin')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <p class="my-4">
                      <a href="{{ route('admin.products.credit-cash.create') }}" class="btn btn-success" >
                          <i class="fa fa-plus" aria-hidden="true"></i>
                          <span class="hidden-sm-down">Add New Credit Cash</span>
                      </a>
                  </p>
                <div class="card">
                    <div class="card-header"><h3>{{ __('Создание Продукта "Кредит Наличными"') }}</h3></div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.products.credit-cash.update', $creditCash) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            @include('admin.product.credit_cash.form', compact('creditCash', 'banks', 'documents', 'bids', 'seo'))

                            <div class="form-group row mb-0 mt-4">
                                <div class="col-md-6 offset-md-3 text-center">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Обновить') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('admin.product.credit_cash.script_templates')

@endsection
