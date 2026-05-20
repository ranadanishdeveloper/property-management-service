@php
    $routeName = \Request::route()->getName();
    $admin_logo = getSettingsValByName('company_logo');

    $isCustomDomain = isset($is_custom_domain) ? $is_custom_domain : (request()->getHost() !== '13.61.10.174' && request()->getHost() !== 'localhost' && request()->getHost() !== '127.0.0.1');

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

<header class="theme3-header">
    <div class="theme3-nav-container">
        <div class="theme3-logo">
            <a href="{{ $homeUrl }}">
                <img src="{{ asset(Storage::url('upload/logo/')) . '/' . (isset($admin_logo) && !empty($admin_logo) ? $admin_logo : 'logo.png') }}" alt="Logo" style="height: 40px; width: auto;">
            </a>
        </div>
        <ul class="theme3-nav-menu">
            <li><a href="{{ $homeUrl }}" class="{{ in_array($routeName, ['web.page', 'custom.domain.home']) ? 'active' : '' }}">HOME</a></li>
            <li><a href="{{ $propertiesUrl }}" class="{{ in_array($routeName, ['property.home', 'property.detail', 'custom.domain.properties', 'custom.domain.property.detail']) ? 'active' : '' }}">PROPERTIES</a></li>
            <li><a href="{{ $blogUrl }}" class="{{ in_array($routeName, ['blog.home', 'blog.detail', 'custom.domain.blog', 'custom.domain.blog.detail']) ? 'active' : '' }}">BLOG</a></li>
            <li><a href="{{ $contactUrl }}" class="{{ in_array($routeName, ['contact.home', 'custom.domain.contact']) ? 'active' : '' }}">CONTACT</a></li>
        </ul>
    </div>
</header>
