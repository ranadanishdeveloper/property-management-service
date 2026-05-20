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

<!-- Glass Header -->
<header class="glass-header">
    <div class="glass-container">
        <div class="glass-header-inner">
            <div class="glass-logo">
                <a href="{{ $homeUrl }}">
                    @if(!empty($admin_logo))
                        <img src="{{ asset(Storage::url('upload/logo/' . $admin_logo)) }}" alt="Logo" style="height: 32px;">
                    @else
                        {{ $settings['app_name'] ?? 'Prop' }}<span style="color: #007aff;">Manage</span>
                    @endif
                </a>
            </div>

            <ul class="glass-nav">
                <li><a href="{{ $homeUrl }}" class="{{ in_array($routeName, ['web.page', 'custom.domain.home']) ? 'active' : '' }}">Home</a></li>
                <li><a href="{{ $isCustomDomain ? route('custom.domain.properties') : route('property.home', $user->code) }}" class="{{ in_array($routeName, ['property.home', 'property.detail', 'custom.domain.properties', 'custom.domain.property.detail']) ? 'active' : '' }}">Properties</a></li>
                <li><a href="{{ $blogUrl }}" class="{{ in_array($routeName, ['blog.home', 'blog.detail', 'custom.domain.blog', 'custom.domain.blog.detail']) ? 'active' : '' }}">Blog</a></li>
                <li><a href="{{ $contactUrl }}" class="{{ in_array($routeName, ['contact.home', 'custom.domain.contact']) ? 'active' : '' }}">Contact</a></li>
            </ul>

            <div class="glass-buttons">
                @if(Auth::check())
                    <a href="{{ route('dashboard') }}" class="glass-btn-outline"><i class="fas fa-user"></i> {{ Auth::user()->name }}</a>
                    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="glass-btn-outline">Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
                @else
                    <a href="" class="glass-btn-outline">Login</a>
                    <a href="" class="glass-btn-primary">Sign Up</a>
                @endif
            </div>

            <button class="glass-mobile-btn" id="glassMobileBtn">
                <i class="fas fa-bars"></i>
            </button>
        </div>
    </div>
</header>
