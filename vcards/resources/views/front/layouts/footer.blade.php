<!-- start subscribe section -->
<section class="subscribe-section padding-t-100px padding-b-100px">
    <div class="container">
        <div class="subscribe-section__subscribe-inner position-relative rounded-20">
            <div class="position-relative subscribe-section__subscribe-block text-center mx-auto">
                <h2 class="text-white">{{__('auth.subscribe_here')}}</h2>
                <p class="text-blue-100 fs-18">
                  {{__('messages.placeholder.receive_latest_news')}}
                </p>
                <form action="{{route('email.sub')}}" method="post" id="addEmail">
                    @csrf()
                    <div class="subscribe-inputgrp position-relative">
                        <input name="email" type="email" class="form-control" placeholder="{{ __('messages.front.your_email_address') }}">
                        <div class="subscribe-btn d-flex align-items-center">
                            <button type="submit" class="btn btn-primary">{{ __('messages.subscribe') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- end subscribe section -->


<!-- start footer section -->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-12  mb-md-5 mb-3 text-center">
                @if($setting['terms_conditions'] !== '' || $setting['privacy_policy'] !== '')
                <h3 class="mb-4 pb-1">{{__('messages.services')}}</h3>
                @endif
                <ul class="ps-0">
                    <li>
                        @if($setting['terms_conditions'] !== '')
                            <a href="{{ route('terms.conditions') }}"
                               class="text-decoration-none  mb-3 d-block fw-light {{ request()->routeIs('terms.conditions') ? 'active' : 'text-secondary' }}">{!! __('messages.vcard.term_condition') !!}</a>
                        @endif
                    </li>
                    <li>
                        @if($setting['privacy_policy'] !== '')
                            <a href="{{ route('privacy.policy') }}"
                               class="text-decoration-none  mb-3 d-block fw-light {{ request()->routeIs('privacy.policy') ? 'active' : 'text-secondary' }}">{{(__('messages.vcard.privacy_policy'))}}</a>
                        @endif
                    </li>
                </ul>
            </div>
           
            <div class=" col-12 {{$setting['terms_conditions'] !== '' || $setting['privacy_policy'] !== '' ? 'col-lg-6' : 'col-12'}} text-center ">
                <h3 class="mb-4 pb-1">{{__('messages.setting.address')}}</h3>
                <div class="footer-info ">
                    <div class="d-flex footer-info__block mb-3 pb-1 text-center justify-content-center">
                        <i class="fa-solid fa-house text-success fs-5 me-3"></i>
                        <a
                                class="text-decoration-none text-secondary fs-6">
                            {{ $setting['address'] }}
                        </a>
                    </div>
                    <div class="d-flex align-items-center footer-info__block mb-3 pb-1 text-center justify-content-center">
                        <i class="fa-solid fa-envelope text-success fs-5 me-3"></i>
                        <a href="mailto:{{ $setting['email'] }}"
                           class="text-decoration-none text-secondary fs-6">
                            {{ $setting['email'] }}
                        </a>
                    </div>
                    <div class="d-flex align-items-center footer-info__block mb-3 pb-1 text-center justify-content-center">
                        <i class="fa-solid fa-phone text-success fs-5 me-3"></i>
                        <a href="tel:+ {{ $setting['phone'] }}"
                           class="text-decoration-none text-secondary fs-6">
                            {{ $setting['phone'] }}
                        </a>
                    </div>
                </div>

            </div>
            <div class="container text-center mt-lg-5 copy-right">
                <p class="mb-0 text-gray-100 pt-4">©
                    {{ \Carbon\Carbon::now()->year }}
                    {{__('auth.copyright_by')." "}} <span class="text-success">{{ $setting['app_name'] }}</span></p>
            </div>
        </div>
    </div>
</footer>
<!-- end footer section -->
