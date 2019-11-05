<div class="modal fade" id="question" tabindex="-1" role="dialog"
     aria-labelledby="buyModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    @if($page->slug == 'expertise')
                        @lang('pages.expert.btn')
                    @else
                        @lang('pages.expert.contacts')
                    @endif
                </h5>
                <i class="material-icons close" data-dismiss="modal" aria-label="Close">close</i>
            </div>
            <div class="modal-body">
                <form action="{{$page->slug == 'expertise' ? route('app.expertise') : route('app.contacts')}}" method="post">
                    @csrf
                    <div class="form-group{{ $errors->has('name') ? ' is-invalid' : '' }}">
                        <label for="name" class="small">@lang('forms.name')</label>
                        <input type="text" class="form-control border" id="name" name="name"
                               value="{{ old('name') }}" required>
                        @if($errors->has('name'))
                            <div class="mt-1 text-danger">
                                {{ $errors->first('name') }}
                            </div>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('contact') ? ' is-invalid' : '' }}">
                        <label for="email" class="small">E-mail</label>
                        <input type="email" class="form-control border" id="email" name="email"
                               value="{{ old('email') }}"
                               required>
                        @if($errors->has('email'))
                            <div class="mt-1 text-danger">
                                {{ $errors->first('email') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('phone') ? ' is-invalid' : '' }}">
                        <label for="phone" class="small">@lang('pages.expert.phone')</label>
                        <input type="tel" class="form-control border" id="phone" name="phone"
                               value="{{ old('phone') }}"
                               required>
                        @if($errors->has('phone'))
                            <div class="mt-1 text-danger">
                                {{ $errors->first('phone') }}
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="message" class="small">@lang('pages.expert.message')</label>
                        <textarea class="form-control border" id="message"
                                  name="message">{{ old('message') }}</textarea>
                    </div>

                    <button class="btn btn-primary">
                        @if($page->slug == 'expertise')
                            @lang('pages.expert.btn')
                        @else
                            @lang('pages.expert.contacts')
                        @endif
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>