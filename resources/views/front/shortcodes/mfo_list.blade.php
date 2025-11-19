<div class="microcredits">
    <div class="microcreditsWrap">
        <div class="container container-page">
            <div class="microcredits-content">
                <div class="row main-content">
                    <div class="col-12 col-md-12">

                        <mfo-list :mfos="{{$mfos}}" :min_amount="{{$mfos->min('min_amount')}}" :max_amount="{{$mfos->max('max_amount')}}" :min_days="{{$mfos->min('min_term')}}" :max_days="{{$mfos->max('max_term')}}"></mfo-list>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

