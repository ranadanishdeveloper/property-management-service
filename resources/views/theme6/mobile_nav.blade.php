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

<!-- Mobile Menu -->
<div class="theme6-mobile-menu">
    <div class="theme6-mobile-menu-header">
        <div class="theme6-logo">
            <a href="{{ $homeUrl }}">
                <img src="{{ asset(Storage::url('upload/logo/')) . '/' . (isset($admin_logo) && !empty($admin_logo) ? $admin_logo : 'logo.png') }}"
                     alt="Logo" class="theme6-logo-img">
            </a>
        </div>
        <div class="theme6-mobile-close">
            <i class="fas fa-times"></i>
        </div>
    </div>
    <ul class="theme6-mobile-nav-menu">
        <li><a href="{{ $homeUrl }}"><i class="fas fa-home"></i> {{ __('Home') }}</a></li>
        <li><a href="{{ $isCustomDomain ? route('custom.domain.properties') : route('property.home', $user->code) }}"><i class="fas fa-building"></i> {{ __('Properties') }}</a></li>
        <li><a href="{{ $blogUrl }}"><i class="fas fa-newspaper"></i> {{ __('Blog') }}</a></li>
        <li><a href="{{ $contactUrl }}"><i class="fas fa-envelope"></i> {{ __('Contact') }}</a></li>
        @if(!Auth::check())
            <li><a href=""><i class="fas fa-sign-in-alt"></i> {{ __('Login') }}</a></li>
            <li><a href=""><i class="fas fa-user-plus"></i> {{ __('Register') }}</a></li>
        @else
            <li><a href="{{ route('dashboard') }}"><i class="fas fa-tachometer-alt"></i> {{ __('Dashboard') }}</a></li>
        @endif
    </ul>
</div>

<div class="theme6-mobile-overlay"></div>

<style>
.theme6-mobile-menu {
    position: fixed;
    top: 0;
    left: -100%;
    width: 80%;
    max-width: 300px;
    height: 100%;
    background: white;
    z-index: 1001;
    transition: left 0.3s cubic-bezier(0.2, 0.9, 0.4, 1.1);
    box-shadow: 2px 0 20px rgba(0,0,0,0.1);
    overflow-y: auto;
}

.theme6-mobile-menu.open {
    left: 0;
}

.theme6-mobile-menu-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 20px;
    border-bottom: 1px solid #eee;
}

.theme6-mobile-close {
    cursor: pointer;
    font-size: 22px;
    color: #1a1a2e;
}

.theme6-mobile-nav-menu {
    list-style: none;
    padding: 20px;
    margin: 0;
}

.theme6-mobile-nav-menu li {
    margin-bottom: 15px;
}

.theme6-mobile-nav-menu a {
    text-decoration: none;
    color: #1a1a2e;
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 10px;
    border-radius: 8px;
    transition: all 0.3s;
}

.theme6-mobile-nav-menu a:hover {
    background: #f5f5f5;
    color: #ff6b4a;
}

.theme6-mobile-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0,0,0,0.5);
    z-index: 1000;
    display: none;
    opacity: 0;
    transition: opacity 0.3s;
}

.theme6-mobile-overlay.active {
    display: block;
    opacity: 1;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const toggleBtn = document.querySelector('.theme6-mobile-toggle');
    const mobileMenu = document.querySelector('.theme6-mobile-menu');
    const closeBtn = document.querySelector('.theme6-mobile-close');
    const overlay = document.querySelector('.theme6-mobile-overlay');

    function openMenu() {
        mobileMenu.classList.add('open');
        if (overlay) overlay.classList.add('active');
        document.body.style.overflow = 'hidden';
    }

    function closeMenu() {
        mobileMenu.classList.remove('open');
        if (overlay) overlay.classList.remove('active');
        document.body.style.overflow = '';
    }

    if (toggleBtn) toggleBtn.addEventListener('click', openMenu);
    if (closeBtn) closeBtn.addEventListener('click', closeMenu);
    if (overlay) overlay.addEventListener('click', closeMenu);
});
</script>
