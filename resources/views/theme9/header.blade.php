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

<style>
    .header {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        background: rgba(245, 245, 240, 0.95);
        backdrop-filter: blur(10px);
        z-index: 1000;
        padding: 20px 0;
        border-bottom: 1px solid #e0e0d8;
    }

    .header-inner {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .logo a {
        font-size: 24px;
        font-weight: 800;
        text-decoration: none;
        color: #1a1a1a;
    }

    .logo span {
        color: #d4af37;
    }

    .nav {
        display: flex;
        gap: 32px;
        list-style: none;
    }

    .nav a {
        text-decoration: none;
        color: #4a4a4a;
        font-weight: 500;
        transition: color 0.2s;
    }

    .nav a:hover,
    .nav a.active {
        color: #d4af37;
    }

    .buttons {
        display: flex;
        gap: 12px;
    }

    .btn-outline {
        padding: 8px 20px;
        border: 1px solid #d4af37;
        background: transparent;
        text-decoration: none;
        color: #1a1a1a;
        font-weight: 500;
        transition: all 0.2s;
    }

    .btn-outline:hover {
        background: #d4af37;
        color: white;
    }

    .btn-primary {
        padding: 8px 20px;
        background: #1a1a1a;
        text-decoration: none;
        color: white;
        font-weight: 500;
        transition: all 0.2s;
    }

    .btn-primary:hover {
        background: #d4af37;
        color: #1a1a1a;
    }

    .mobile-btn {
        display: none;
        background: none;
        border: none;
        font-size: 24px;
        cursor: pointer;
    }

    .mobile-sidebar {
        position: fixed;
        top: 0;
        right: -100%;
        width: 80%;
        max-width: 300px;
        height: 100vh;
        background: #f5f5f0;
        z-index: 1100;
        transition: right 0.3s ease;
        padding: 80px 28px 40px;
        box-shadow: -4px 0 20px rgba(0,0,0,0.1);
    }

    .mobile-sidebar.active {
        right: 0;
    }

    .mobile-sidebar ul {
        list-style: none;
    }

    .mobile-sidebar li {
        margin-bottom: 24px;
    }

    .mobile-sidebar a {
        text-decoration: none;
        color: #1a1a1a;
        font-size: 18px;
        font-weight: 500;
    }

    .mobile-close {
        position: absolute;
        top: 20px;
        right: 20px;
        background: none;
        border: none;
        font-size: 24px;
        cursor: pointer;
    }

    .overlay {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0,0,0,0.4);
        z-index: 1050;
        opacity: 0;
        visibility: hidden;
        transition: all 0.3s;
    }

    .overlay.active {
        opacity: 1;
        visibility: visible;
    }

    @media (max-width: 992px) {
        .nav, .buttons {
            display: none;
        }
        .mobile-btn {
            display: block;
        }
    }
</style>

<header class="header animate-slide-down">
    <div class="container">
        <div class="header-inner">
            <div class="logo">
                <a href="{{ $homeUrl }}">
                    @if(!empty($admin_logo))
                        <img src="{{ asset(Storage::url('upload/logo/' . $admin_logo)) }}" alt="Logo" style="height: 35px;">
                    @else
                        {{ $settings['app_name'] ?? 'FUSION' }}<span>.</span>
                    @endif
                </a>
            </div>

            <ul class="nav">
                <li><a href="{{ $homeUrl }}" class="{{ in_array($routeName, ['web.page', 'custom.domain.home']) ? 'active' : '' }}">HOME</a></li>
                <li><a href="{{ $propertiesUrl }}" class="{{ in_array($routeName, ['property.home', 'property.detail', 'custom.domain.properties', 'custom.domain.property.detail']) ? 'active' : '' }}">PROPERTIES</a></li>
                <li><a href="{{ $blogUrl }}" class="{{ in_array($routeName, ['blog.home', 'blog.detail', 'custom.domain.blog', 'custom.domain.blog.detail']) ? 'active' : '' }}">BLOG</a></li>
                <li><a href="{{ $contactUrl }}" class="{{ in_array($routeName, ['contact.home', 'custom.domain.contact']) ? 'active' : '' }}">CONTACT</a></li>
            </ul>

            <div class="buttons">
                @if(Auth::check())
                    <a href="{{ route('dashboard') }}" class="btn-outline">{{ Auth::user()->name }}</a>
                    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn-outline">LOGOUT</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
                @else
                    <a href="{{ route('login') }}" class="btn-outline">LOGIN</a>
                    <a href="{{ route('register') }}" class="btn-primary">SIGN UP</a>
                @endif
            </div>

            <button class="mobile-btn" id="mobileBtn">
                <i class="fas fa-bars"></i>
            </button>
        </div>
    </div>
</header>

<div class="overlay" id="overlay"></div>
<div class="mobile-sidebar" id="mobileSidebar">
    <button class="mobile-close" id="mobileClose"><i class="fas fa-times"></i></button>
    <ul>
        <li><a href="{{ $homeUrl }}">Home</a></li>
        <li><a href="{{ $propertiesUrl }}">Properties</a></li>
        <li><a href="{{ $blogUrl }}">Blog</a></li>
        <li><a href="{{ $contactUrl }}">Contact</a></li>
        @if(Auth::check())
            <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li><a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
        @else
            <li><a href="{{ route('login') }}">Login</a></li>
            <li><a href="{{ route('register') }}">Sign Up</a></li>
        @endif
    </ul>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const mobileBtn = document.getElementById('mobileBtn');
        const sidebar = document.getElementById('mobileSidebar');
        const closeBtn = document.getElementById('mobileClose');
        const overlay = document.getElementById('overlay');

        if (mobileBtn && sidebar && closeBtn && overlay) {
            mobileBtn.addEventListener('click', () => {
                sidebar.classList.add('active');
                overlay.classList.add('active');
                document.body.style.overflow = 'hidden';
            });

            const closeSidebar = () => {
                sidebar.classList.remove('active');
                overlay.classList.remove('active');
                document.body.style.overflow = '';
            };

            closeBtn.addEventListener('click', closeSidebar);
            overlay.addEventListener('click', closeSidebar);
        }
    });
</script>
