@extends('layouts.app', ['page_title' => $page->title])

@section('breadcrumbs')
    <li>
        <span>{{ $page->title }}</span>
    </li>
@endsection

@section('content')

    <section id="content">
        <div class="container">
            {!! $page->body !!}
        </div>
        @if($page->slug == 'expertise' || $page->slug == 'contacts')
            <div class="text-center mt-8">
                <button class="btn btn-primary"
                        data-toggle="modal"
                        data-target="#question">
                    @if($page->slug == 'expertise')
                        @lang('pages.expert.btn')
                    @else
                        @lang('pages.expert.contacts')
                    @endif
                </button>
            </div>
            @include('app.pages.question-modal')
        @endif
    </section>

@endsection