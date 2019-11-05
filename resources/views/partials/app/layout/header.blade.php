<header id="app-header" class="{{ $header_class ?? '' }}">
    <div class="nav">
        <form action="{{ route('app.search') }}" class="search">
            <button class="btn btn-search material-icons">search</button>
            <input type="text" name="q" autocomplete="none"
                   class="form-control form-control--global-search"
                   placeholder="{{ trans('pages.catalog.search.placeholder') }}" required>
        </form>
    </div>
    <div class="container-fluid h-100">
        <div class="row justify-content-between align-items-center h-100">
            <div class="col-auto">
                <ul class="menu list-unstyled">
                    <li class="nav-item">
                        <a href="{{ url('/') }}" class="nav-link nav-link--logo">
                            <svg width="60" height="60">
                                <use xlink:href="#logo"></use>
                            </svg>
                        </a>
                    </li>
                    @foreach(app('nav')->frontend() as $item)
                        <li class="nav-item d-block d-lg-none">
                            <a href="{{ $item->route }}" class="nav-link">
                                {!! $item->name !!}
                            </a>
                        </li>
                    @endforeach
                    <li class="d-lg-none menu-close" data-menu-close>
                        <i class="material-icons">close</i>
                    </li>
                </ul>
            </div>
            <div class="col-auto">
                <div class="navbar navbar--center navbar--left flex-nowrap">
                    <nav class="nav align-items-center flex-nowrap pr-3 pr-lg-0">
                        <a href="{{ url('/') }}" class="nav-link nav-link--logo d-lg-none">
                            <svg width="60" height="60">
                                <use xlink:href="#logo"></use>
                            </svg>
                        </a>

                        <ul class="menu list-unstyled">

                            @foreach(app('nav')->frontend() as $item)
                                <li class="nav-item">
                                    <a href="{{ $item->route }}" class="nav-link">
                                        {!! $item->name !!}
                                    </a>
                                </li>
                            @endforeach

                            <li class="d-lg-none menu-close" data-menu-close>
                                <i class="material-icons">close</i>
                            </li>
                        </ul>

                        <div class="d-lg-none pl-3">
                            <a href="#menu" class="material-icons menu-toggle" data-menu>menu</a>
                        </div>
                    </nav>
                </div>
            </div>
            <div class="col-auto">
                <div class="d-flex align-items-center">

                    <div class="navbar navbar--right ml-auto text-right ">
                        <div class="locale-selector mt-1 ml-auto ml-lg-3 mt-lg-0">
                            @foreach(config('app.locales') as $locale)
                                @if (app()->getLocale() === $locale)
                                    <span class="locale-selector__item is-active">{{ $locale }}</span>
                                @else
                                    <a href="{{ route('app.locale', [$locale]) }}"
                                       class="locale-selector__item">{{ $locale }}</a>
                                @endif
                            @endforeach
                        </div>
                    </div>

                    <a href="#search" class="material-icons nav-link nav-link--search" data-search>search</a>
                </div>
            </div>
        </div>
        @if (!in_array(app('router')->currentRouteName(), ['app.home', 'login', 'register', 'password.request', 'password.reset']))
            <ul class="breadcrumbs list-unstyled d-none d-lg-flex ml-3">
                <li itemprop="itemListElement">
                    <a href="{{ route('app.home') }}" class="text-dark">
                        @lang('pages.home.title')
                    </a>
                </li>
                <li class="breadcrumbs-separator">/</li>
                @yield('breadcrumbs')
            </ul>
        @endif
    </div>
</header>