@php
    $admin_logo = getSettingsValByName('company_logo');

    // Check if this is a custom domain request
    $isCustomDomain = isset($is_custom_domain) ? $is_custom_domain : (request()->getHost() !== '13.61.10.174' && request()->getHost() !== 'localhost' && request()->getHost() !== '127.0.0.1');

    // Set URLs based on domain type
    if ($isCustomDomain) {
        $homeUrl = route('custom.domain.home');
        $propertiesUrl = route('custom.domain.properties');
        $blogUrl = route('custom.domain.blog');
        $contactUrl = route('custom.domain.contact');
    } else {
        $homeUrl = route('web.page', $user->code);
        $propertiesUrl = route('property.home', ['code' => $user->code]);
        $blogUrl = route('blog.home', ['code' => $user->code]);
        $contactUrl = route('contact.home', ['code' => $user->code]);
    }
@endphp

<div id="page" class="mobilie_header_nav stylehome1">
    <div class="mobile-menu">
        <div class="header bdrb1">
            <div class="menu_and_widgets">
                <div class="mobile_menu_bar d-flex justify-content-between align-items-center">
                    <a class="mobile_logo" href="{{ $homeUrl }}">
                        <img src="{{ asset(Storage::url('upload/logo/')) . '/' . (isset($admin_logo) && !empty($admin_logo) ? $admin_logo : 'logo.png') }}"
                            alt="" class="img-fluid" style="width: 200px;">
                    </a>

                    <div class="right-side text-end">
                        <a class="menubar ml30" href="#menu"><img
                                src="{{ asset('assets/web/images/mobile-dark-nav-icon.svg') }}" alt=""></a>
                    </div>
                </div>
            </div>
            <div class="posr">
                <div class="mobile_menu_close_btn"><span class="far fa-times"></span></div>
            </div>
        </div>
    </div>
    <!-- /.mobile-menu -->
    <nav id="menu" class="">
        <ul>
            <li><a href="{{ $homeUrl }}">{{ __('Home') }}</a></li>
            <li><a href="{{ $isCustomDomain ? route('custom.domain.properties') : route('property.home', $user->code) }}">{{ __('Properties') }}</a></li>
            <li><a href="{{ $blogUrl }}">{{ __('Blog') }}</a></li>
            <li><a href="{{ $contactUrl }}">{{ __('Contact') }}</a></li>
        </ul>
    </nav>
</div>
