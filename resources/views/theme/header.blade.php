@php
    $routeName = \Request::route()->getName();
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

<header class="header-nav nav-homepage-style at-home3 stricky main-menu border-0 ">
    <!-- Ace Responsive Menu -->
    <nav class="posr">
        <div class="container posr">
            <div class="row align-items-center justify-content-between">
                <div class="col-auto px-0 px-xl-3">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="logos">
                            <a class="header-logo logo1 landing-logo" href="{{ $homeUrl }}">
                                <img src="{{ asset(Storage::url('upload/logo/')) . '/' . (isset($admin_logo) && !empty($admin_logo) ? $admin_logo : 'logo.png') }}" class="img-fluid"
                                    style="width: 240px;" alt="Header Logo">
                            </a>
                            <a class="header-logo logo2 landing-logo" href="{{ $homeUrl }}">
                                <img src="{{ asset(Storage::url('upload/logo/')) . '/' . (isset($admin_logo) && !empty($admin_logo) ? $admin_logo : 'logo.png') }}" class="img-fluid"
                                    alt="Header Logo">
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-auto pe-0 pe-xl-3">
                    <div class="d-flex align-items-center">
                        <ul id="respMenu" class="ace-responsive-menu" data-menu-style="horizontal">
                            <li>
                                <a class="list-item mr5 {{ in_array($routeName, ['web.page', 'custom.domain.home']) ? 'active custom-active-style' : '' }}"
                                    href="{{ $homeUrl }}">{{ __('Home') }}</a>
                            </li>
                            <li>
                                <a class="list-item mr5 {{ in_array($routeName, ['property.home', 'property.detail', 'custom.domain.properties', 'custom.domain.property.detail']) ? 'active custom-active-style' : '' }}"
                                    href="{{ $isCustomDomain ? route('custom.domain.properties') : route('property.home', $user->code) }}">{{ __('Properties') }}</a>
                            </li>
                            <li>
                                <a class="list-item mr5 {{ in_array($routeName, ['blog.home', 'blog.detail', 'custom.domain.blog', 'custom.domain.blog.detail']) ? 'active custom-active-style' : '' }}"
                                    href="{{ $blogUrl }}">{{ __('Blog') }}</a>
                            </li>
                            <li>
                                <a class="list-item mr5 {{ in_array($routeName, ['contact.home', 'custom.domain.contact']) ? 'active custom-active-style' : '' }}"
                                    href="{{ $contactUrl }}">{{ __('Contact') }}</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>
