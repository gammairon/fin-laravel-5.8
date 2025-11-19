@extends('layouts.app')



@section('content')
    <main>
        <div class="list-banks mb-5">
            <div class="blogWrap">
                <div class="container container-page main-content">
                    <div class=" row list-banks-container">
                        <div class="col-12 col-md-10 left-part">
                            <section class="list-banks__top mb-0">
                                <div class="row">
                                    <div class="col-12 d-flex flex-column p-0">
                                        <div class="title">
                                            Банки <span>Украины</span>
                                        </div>
                                    </div>
                                </div>
                            </section>

                            <bank-list :banks="{{$banks}}"></bank-list>

                        </div>
                        <div class="col-2 pr-0 pl-0 mfo-sidebar sidebar" id="sidebar-one">
                            <div class="article-body__sidebar-panel sidebar__inner" id="list-banks__sb">
                                <div class="side-bar__img">
                                    <img src="/storage/images/imgad.jpg">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
