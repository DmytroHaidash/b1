<footer id="app-footer">
    <div class="container">
        <div class="d-md-flex align-items-center footer-info">
            <div class="footer-logo pr-5">
                <a href="{{ url('/') }}" class="nav-link nav-link--logo">
                    {{--<svg width="160" height="160">--}}
                        {{--<use xlink:href="#helmet"></use>--}}
                    {{--</svg>--}}
                    {{--<br>--}}
                    <svg width="160" height="160">
                        <use xlink:href="#logo"></use>
                    </svg>
                </a>
            </div>

            <div class="flex-grow-1">
                <nav class="row font-weight-bold mb-5">
                    @foreach(app('nav')->frontendFooter() as $item)
                        <div class="col">
                            <a href="{{ $item->route }}">
                                {!! $item->name !!}
                            </a>
                        </div>
                    @endforeach
                </nav>
            </div>
        </div>
    </div>

    <div class="copyrights py-3">
        <div class="container text-center">
            &copy; {{ date('Y') }} @lang('common.footer.copyright')
        </div>
    </div>
</footer>