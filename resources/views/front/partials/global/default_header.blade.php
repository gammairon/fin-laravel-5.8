<header class="header fixed-header">
    <div class="container container-page">
        <nav class="navbar navbar-expand-xl navbar-light bg-light">
            <a class="navbar-brand" href="{{route('home')}}"><img class="lazyload" src="{{asset('/storage/images/logo.png')}}" alt="FinFin"></a>
            <div class="mobile-title">Меню</div>
            <button class="navbar-toggler" data-target="#navbar1" >
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbar1">
                <div class="search-mobile">
                    <input placeholder="Поиск по сайту…" role="input" type="text" value="" class="search-mobile__input">
                </div>

                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#">Карты</a>
                        <div class="dropdown-menu">
                            <div class="dropdown-menuWrap">
                                <a class="dropdown-item" href="{{route('karty')}}">Кредитные карты</a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#">Кредиты</a>
                        <div class="dropdown-menu">
                            <div class="dropdown-menuWrap">
                                <a class="dropdown-item" href="{{route('mfo.all')}}">Микрозаймы</a>
                                <a class="dropdown-item" href="{{route('credity')}}">Потребительские кредиты</a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link no-dropdown" href="{{route('banki')}}">Банки</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#">Еще</a>
                        <div class="dropdown-menu">
                            <div class="dropdown-menuWrap">
                                {{--<a class="dropdown-item" href="#">Рейтинг банков</a>--}}
                                <a class="dropdown-item" href="https://finfin.com.ua/novosti/rubrika/sovety">Советы</a>
                                <a class="dropdown-item" href="https://finfin.com.ua/novosti/rubrika/vopros-otvet">Вопрос ответ</a>
                                <a class="dropdown-item" href="https://finfin.com.ua/kontakty">Контакты</a>
                            </div>
                        </div>
                    </li>
                </ul>
                <div class="search-main">
                    <svg class="search-icon"><use xlink:href="#control-search">
                            <svg viewBox="0 0 23 23" id="control-search"><g class="c1"><circle cx="7.76" cy="7.76" r="5.9"></circle><path d="M11.545 11.545L13.5 13.5"></path><rect x="15.303" y="11.803" width="4" height="11" rx="2" transform="rotate(-45 17.303 17.303)"></rect></g></svg>
                        </use></svg>
                </div>
            </div>
        </nav>
    </div>
    <div class="fixed-top search-input">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="search-close-btn"><i class="fa fa-times" aria-hidden="true"></i></div>
                    <h4>Поиск</h4>
                    <form action="" method="GET">
                        <input type="text" name="search" value="" placeholder="Что Вы хотите найти?">
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>
