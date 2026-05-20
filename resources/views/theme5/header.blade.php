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

<header class="theme5-header" style="position: fixed; top: 0; left: 0; right: 0; background: rgba(255, 255, 255, 0.98); backdrop-filter: blur(20px); z-index: 1000; padding: 16px 0; transition: all 0.3s ease; border-bottom: 1px solid #e2e8f0; box-shadow: 0 1px 3px rgba(0,0,0,0.05);">
    <div style="max-width: 1200px; margin: 0 auto; padding: 0 24px;">
        <div style="display: flex; justify-content: space-between; align-items: center;">
            <!-- Logo -->
            <div class="theme5-logo">
                <a href="{{ $homeUrl }}">
                    <img src="{{ asset(Storage::url('upload/logo/')) . '/' . (isset($admin_logo) && !empty($admin_logo) ? $admin_logo : 'logo.png') }}"
                         alt="Logo" style="height: 40px; width: auto; transition: transform 0.3s;">
                </a>
            </div>

            <!-- Navigation Menu -->
            <nav>
                <ul style="display: flex; gap: 32px; list-style: none; margin: 0; padding: 0;">
                    <li>
                        <a href="{{ $homeUrl }}" style="text-decoration: none; color: #1e293b; font-weight: 500; font-size: 15px; transition: all 0.3s; display: flex; align-items: center; gap: 8px; position: relative;" class="{{ in_array($routeName, ['web.page', 'custom.domain.home']) ? 'active' : '' }}">
                            <i class="fas fa-home" style="font-size: 14px;"></i> <span>{{ __('Home') }}</span>
                            <span style="position: absolute; bottom: -8px; left: 0; width: 0; height: 2px; background: #3b82f6; transition: width 0.3s;"></span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ $isCustomDomain ? route('custom.domain.properties') : route('property.home', $user->code) }}" style="text-decoration: none; color: #1e293b; font-weight: 500; font-size: 15px; transition: all 0.3s; display: flex; align-items: center; gap: 8px; position: relative;" class="{{ in_array($routeName, ['property.home', 'property.detail', 'custom.domain.properties', 'custom.domain.property.detail']) ? 'active' : '' }}">
                            <i class="fas fa-building" style="font-size: 14px;"></i> <span>{{ __('Properties') }}</span>
                            <span style="position: absolute; bottom: -8px; left: 0; width: 0; height: 2px; background: #3b82f6; transition: width 0.3s;"></span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ $blogUrl }}" style="text-decoration: none; color: #1e293b; font-weight: 500; font-size: 15px; transition: all 0.3s; display: flex; align-items: center; gap: 8px; position: relative;" class="{{ in_array($routeName, ['blog.home', 'blog.detail', 'custom.domain.blog', 'custom.domain.blog.detail']) ? 'active' : '' }}">
                            <i class="fas fa-newspaper" style="font-size: 14px;"></i> <span>{{ __('Blog') }}</span>
                            <span style="position: absolute; bottom: -8px; left: 0; width: 0; height: 2px; background: #3b82f6; transition: width 0.3s;"></span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ $contactUrl }}" style="text-decoration: none; color: #1e293b; font-weight: 500; font-size: 15px; transition: all 0.3s; display: flex; align-items: center; gap: 8px; position: relative;" class="{{ in_array($routeName, ['contact.home', 'custom.domain.contact']) ? 'active' : '' }}">
                            <i class="fas fa-envelope" style="font-size: 14px;"></i> <span>{{ __('Contact') }}</span>
                            <span style="position: absolute; bottom: -8px; left: 0; width: 0; height: 2px; background: #3b82f6; transition: width 0.3s;"></span>
                        </a>
                    </li>
                </ul>
            </nav>

            <!-- Header Buttons -->
            <div style="display: flex; gap: 12px;">
                @if(Auth::check())
                    <a href="{{ route('dashboard') }}" style="padding: 8px 20px; border-radius: 8px; font-weight: 500; text-decoration: none; display: inline-flex; align-items: center; gap: 8px; font-size: 14px; background: #3b82f6; color: white; transition: all 0.3s; box-shadow: 0 1px 2px rgba(0,0,0,0.05);">
                        <i class="fas fa-tachometer-alt"></i> Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}" style="padding: 8px 20px; border-radius: 8px; font-weight: 500; text-decoration: none; display: inline-flex; align-items: center; gap: 8px; font-size: 14px; border: 1px solid #cbd5e1; color: #1e293b; background: white; transition: all 0.3s;">
                        <i class="fas fa-sign-in-alt"></i> Login
                    </a>
                    <a href="{{ route('register') }}" style="padding: 8px 20px; border-radius: 8px; font-weight: 500; text-decoration: none; display: inline-flex; align-items: center; gap: 8px; font-size: 14px; background: #3b82f6; color: white; transition: all 0.3s; box-shadow: 0 1px 2px rgba(0,0,0,0.05);">
                        <i class="fas fa-user-plus"></i> Sign Up
                    </a>
                @endif
            </div>

            <!-- Mobile Menu Toggle -->
            <div style="display: none; cursor: pointer; font-size: 22px; color: #1e293b; transition: transform 0.3s;" class="theme5-mobile-toggle">
                <i class="fas fa-bars"></i>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div style="position: fixed; top: 0; left: -100%; width: 80%; max-width: 320px; height: 100%; background: white; z-index: 1001; transition: left 0.4s cubic-bezier(0.2, 0.9, 0.4, 1.1); box-shadow: 2px 0 20px rgba(0,0,0,0.1); overflow-y: auto;" class="theme5-mobile-menu">
        <div style="display: flex; justify-content: space-between; align-items: center; padding: 20px; border-bottom: 1px solid #e2e8f0;">
            <div class="theme5-logo">
                <a href="{{ $homeUrl }}">
                    <img src="{{ asset(Storage::url('upload/logo/')) . '/' . (isset($admin_logo) && !empty($admin_logo) ? $admin_logo : 'logo.png') }}"
                         alt="Logo" style="height: 35px; width: auto;">
                </a>
            </div>
            <div style="cursor: pointer; font-size: 22px; color: #1e293b; transition: transform 0.3s;" class="theme5-mobile-close">
                <i class="fas fa-times"></i>
            </div>
        </div>
        <ul style="list-style: none; padding: 20px; margin: 0;">
            <li style="margin-bottom: 12px;"><a href="{{ $homeUrl }}" style="text-decoration: none; color: #1e293b; font-size: 16px; display: flex; align-items: center; gap: 12px; padding: 12px; border-radius: 10px; transition: all 0.3s;"><i class="fas fa-home" style="width: 20px;"></i> {{ __('Home') }}</a></li>
            <li style="margin-bottom: 12px;"><a href="{{ $isCustomDomain ? route('custom.domain.properties') : route('property.home', $user->code) }}" style="text-decoration: none; color: #1e293b; font-size: 16px; display: flex; align-items: center; gap: 12px; padding: 12px; border-radius: 10px; transition: all 0.3s;"><i class="fas fa-building" style="width: 20px;"></i> {{ __('Properties') }}</a></li>
            <li style="margin-bottom: 12px;"><a href="{{ $blogUrl }}" style="text-decoration: none; color: #1e293b; font-size: 16px; display: flex; align-items: center; gap: 12px; padding: 12px; border-radius: 10px; transition: all 0.3s;"><i class="fas fa-newspaper" style="width: 20px;"></i> {{ __('Blog') }}</a></li>
            <li style="margin-bottom: 12px;"><a href="{{ $contactUrl }}" style="text-decoration: none; color: #1e293b; font-size: 16px; display: flex; align-items: center; gap: 12px; padding: 12px; border-radius: 10px; transition: all 0.3s;"><i class="fas fa-envelope" style="width: 20px;"></i> {{ __('Contact') }}</a></li>
            <div style="height: 1px; background: #e2e8f0; margin: 16px 0;"></div>
            @if(!Auth::check())
                <li style="margin-bottom: 12px;"><a href="#" style="text-decoration: none; color: #1e293b; font-size: 16px; display: flex; align-items: center; gap: 12px; padding: 12px; border-radius: 10px; transition: all 0.3s;"><i class="fas fa-sign-in-alt" style="width: 20px;"></i> {{ __('Login') }}</a></li>
                <li style="margin-bottom: 12px;"><a href="#" style="text-decoration: none; color: #1e293b; font-size: 16px; display: flex; align-items: center; gap: 12px; padding: 12px; border-radius: 10px; transition: all 0.3s;"><i class="fas fa-user-plus" style="width: 20px;"></i> {{ __('Register') }}</a></li>
            @else
                <li style="margin-bottom: 12px;"><a href="{{ route('dashboard') }}" style="text-decoration: none; color: #1e293b; font-size: 16px; display: flex; align-items: center; gap: 12px; padding: 12px; border-radius: 10px; transition: all 0.3s;"><i class="fas fa-tachometer-alt" style="width: 20px;"></i> {{ __('Dashboard') }}</a></li>
            @endif
        </ul>




    </div>
</header>

<style>
/* Header scroll animation */
.theme5-header {
    transition: all 0.4s cubic-bezier(0.2, 0.9, 0.4, 1.1) !important;
}

.theme5-header.scrolled {
    padding: 12px 0 !important;
    background: rgba(255, 255, 255, 0.98) !important;
    border-bottom-color: #3b82f6 !important;
    box-shadow: 0 4px 6px -1px rgba(0,0,0,0.05) !important;
}

/* Logo hover animation */
.theme5-logo:hover img {
    transform: scale(1.03);
}

/* Navigation link hover underline animation */
nav ul li a:hover span,
nav ul li a.active span {
    width: 100% !important;
}

nav ul li a.active {
    color: #3b82f6 !important;
}

nav ul li a:hover {
    color: #3b82f6 !important;
}

/* Button hover animations */
.theme5-header-buttons a:first-child:hover,
.theme5-header-buttons a:last-child:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1);
}

.theme5-header-buttons a:nth-child(2):hover {
    border-color: #3b82f6 !important;
    color: #3b82f6 !important;
    background: #eff6ff !important;
}

/* Mobile menu animations */
.theme5-mobile-menu.open {
    left: 0 !important;
}

.theme5-mobile-close:hover {
    transform: rotate(90deg);
}

.theme5-mobile-toggle:hover {
    transform: scale(1.05);
}

/* Mobile menu items hover */
.theme5-mobile-menu ul li a:hover {
    background: #eff6ff !important;
    color: #3b82f6 !important;
}

/* Responsive */
@media (max-width: 768px) {
    nav {
        display: none !important;
    }
    .theme5-header-buttons {
        display: none !important;
    }
    .theme5-mobile-toggle {
        display: block !important;
    }
}

/* Page load animation for header */
.theme5-header {
    animation: fadeInDown 0.5s ease forwards;
}

@keyframes fadeInDown {
    from {
        opacity: 0;
        transform: translateY(-20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Mobile menu toggle
    const toggleBtn = document.querySelector('.theme5-mobile-toggle');
    const mobileMenu = document.querySelector('.theme5-mobile-menu');
    const closeBtn = document.querySelector('.theme5-mobile-close');

    // Create overlay
    const overlay = document.createElement('div');
    overlay.style.position = 'fixed';
    overlay.style.top = '0';
    overlay.style.left = '0';
    overlay.style.width = '100%';
    overlay.style.height = '100%';
    overlay.style.background = 'rgba(0,0,0,0.4)';
    overlay.style.backdropFilter = 'blur(4px)';
    overlay.style.zIndex = '1000';
    overlay.style.display = 'none';
    overlay.style.opacity = '0';
    overlay.style.transition = 'opacity 0.3s ease';
    document.body.appendChild(overlay);

    function openMenu() {
        mobileMenu.classList.add('open');
        overlay.style.display = 'block';
        setTimeout(() => { overlay.style.opacity = '1'; }, 10);
        document.body.style.overflow = 'hidden';
    }

    function closeMenu() {
        mobileMenu.classList.remove('open');
        overlay.style.opacity = '0';
        setTimeout(() => { overlay.style.display = 'none'; }, 300);
        document.body.style.overflow = '';
    }

    if (toggleBtn) toggleBtn.addEventListener('click', openMenu);
    if (closeBtn) closeBtn.addEventListener('click', closeMenu);
    overlay.addEventListener('click', closeMenu);

    // Sticky header on scroll
    const header = document.querySelector('.theme5-header');
    window.addEventListener('scroll', function() {
        if (window.scrollY > 50) {
            header.classList.add('scrolled');
        } else {
            header.classList.remove('scrolled');
        }
    });
});
</script>
