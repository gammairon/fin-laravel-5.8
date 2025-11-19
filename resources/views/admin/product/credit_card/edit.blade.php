@extends('layouts.admin')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><h3>{{ __('Редактирование Продукта "Кредитная Карта"') }}</h3></div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.products.credit-cards.update', $creditCard) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            @include('admin.product.credit_card.form', compact('creditCard', 'banks', 'seo', 'selfWithdrawalFees', 'foreignWithdrawalFees', 'additionalFees', 'documents'))

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

    @include('admin.product.credit_card.script_templates')

@endsection
