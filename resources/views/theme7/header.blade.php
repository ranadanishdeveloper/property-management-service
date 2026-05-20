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

<aside class="cyber-sidebar" id="cyberSidebar">
    <div class="cyber-logo">
        <a href="{{ $homeUrl }}">
            @if(!empty($admin_logo))
                <img src="{{ asset(Storage::url('upload/logo/' . $admin_logo)) }}" alt="Logo" style="height: 40px; width: auto;">
            @else
                <span style="font-size: 24px; font-weight: 800; color: var(--neon-cyan);">{{ $settings['app_name'] ?? 'PROP' }}</span>
            @endif
        </a>
    </div>

    <ul class="cyber-nav">
        <li><a href="{{ $homeUrl }}" class="{{ in_array($routeName, ['web.page', 'custom.domain.home']) ? 'active' : '' }}"><i class="fas fa-home"></i> HOME</a></li>
        <li><a href="{{ $isCustomDomain ? route('custom.domain.properties') : route('property.home', $user->code) }}" class="{{ in_array($routeName, ['property.home', 'property.detail', 'custom.domain.properties', 'custom.domain.property.detail']) ? 'active' : '' }}"><i class="fas fa-building"></i> PROPERTIES</a></li>
        <li><a href="{{ $blogUrl }}" class="{{ in_array($routeName, ['blog.home', 'blog.detail', 'custom.domain.blog', 'custom.domain.blog.detail']) ? 'active' : '' }}"><i class="fas fa-newspaper"></i> BLOG</a></li>
        <li><a href="{{ $contactUrl }}" class="{{ in_array($routeName, ['contact.home', 'custom.domain.contact']) ? 'active' : '' }}"><i class="fas fa-envelope"></i> CONTACT</a></li>
        @if(Auth::check())
            <li><a href="{{ route('dashboard') }}"><i class="fas fa-tachometer-alt"></i> DASHBOARD</a></li>
            <li><a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"></i> LOGOUT</a></li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
        @else
            <li><a href="{{ route('login') }}"><i class="fas fa-sign-in-alt"></i> LOGIN</a></li>
            <li><a href="{{ route('register') }}"><i class="fas fa-user-plus"></i> SIGN UP</a></li>
        @endif
    </ul>

    <div style="position: absolute; bottom: 40px; left: 20px; right: 20px;">
        <div style="height: 2px; background: var(--neon-cyan); margin-bottom: 20px;"></div>
        <div style="display: flex; gap: 16px; justify-content: center;">
            <a href="#" style="color: var(--neon-pink);"><i class="fab fa-twitter"></i></a>
            <a href="#" style="color: var(--neon-pink);"><i class="fab fa-instagram"></i></a>
            <a href="#" style="color: var(--neon-pink);"><i class="fab fa-github"></i></a>
        </div>
    </div>
</aside>

<button class="cyber-toggle" id="cyberToggle">
    <i class="fas fa-bars"></i>
</button>
