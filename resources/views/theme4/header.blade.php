@php
    $routeName = \Request::route()->getName();
    $admin_logo = getSettingsValByName('company_logo');

    // Check if this is a custom domain request
    $isCustomDomain = isset($is_custom_domain)
        ? $is_custom_domain
        : request()->getHost() !== '13.61.10.174' &&
            request()->getHost() !== 'localhost' &&
            request()->getHost() !== '127.0.0.1';

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

<header class="t4-header"
    style="position: fixed; top: 0; left: 0; right: 0; background: rgba(15, 23, 42, 0.95); backdrop-filter: blur(20px); z-index: 1000; padding: 16px 0; transition: all 0.4s cubic-bezier(0.2, 0.9, 0.4, 1.1); border-bottom: 1px solid rgba(255, 255, 255, 0.1);">
    <div style="max-width: 1280px; margin: 0 auto; padding: 0 24px;">
        <div style="display: flex; justify-content: space-between; align-items: center;">
            <!-- Logo with animation -->
            <div class="t4-logo" style="transition: all 0.3s ease;">
                <a href="{{ $homeUrl }}">
                    <img src="{{ asset(Storage::url('upload/logo/')) . '/' . (isset($admin_logo) && !empty($admin_logo) ? $admin_logo : 'logo.png') }}"
                        alt="Logo"
                        style="height: 45px; width: auto; transition: transform 0.3s ease; filter: brightness(0) invert(1);">
                </a>
            </div>

            <!-- Navigation Menu -->
            <nav>
                <ul style="display: flex; gap: 32px; list-style: none; margin: 0; padding: 0;">
                    <li>
                        <a href="{{ $homeUrl }}"
                            style="text-decoration: none; color: #e2e8f0; font-weight: 500; font-size: 15px; transition: all 0.3s ease; display: flex; align-items: center; gap: 8px; position: relative;"
                            class="{{ in_array($routeName, ['web.page', 'custom.domain.home']) ? 'active' : '' }}">
                            <i class="fas fa-home"></i> {{ __('Home') }}
                            <span
                                style="position: absolute; bottom: -8px; left: 0; width: 0; height: 2px; background: linear-gradient(135deg, #6366f1, #a855f7); transition: width 0.3s ease;"></span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ $isCustomDomain ? route('custom.domain.properties') : route('property.home', $user->code) }}"
                            style="text-decoration: none; color: #e2e8f0; font-weight: 500; font-size: 15px; transition: all 0.3s ease; display: flex; align-items: center; gap: 8px; position: relative;"
                            class="{{ in_array($routeName, ['property.home', 'property.detail', 'custom.domain.properties', 'custom.domain.property.detail']) ? 'active' : '' }}">
                            <i class="fas fa-building"></i> {{ __('Properties') }}
                            <span
                                style="position: absolute; bottom: -8px; left: 0; width: 0; height: 2px; background: linear-gradient(135deg, #6366f1, #a855f7); transition: width 0.3s ease;"></span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ $blogUrl }}"
                            style="text-decoration: none; color: #e2e8f0; font-weight: 500; font-size: 15px; transition: all 0.3s ease; display: flex; align-items: center; gap: 8px; position: relative;"
                            class="{{ in_array($routeName, ['blog.home', 'blog.detail', 'custom.domain.blog', 'custom.domain.blog.detail']) ? 'active' : '' }}">
                            <i class="fas fa-newspaper"></i> {{ __('Blog') }}
                            <span
                                style="position: absolute; bottom: -8px; left: 0; width: 0; height: 2px; background: linear-gradient(135deg, #6366f1, #a855f7); transition: width 0.3s ease;"></span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ $contactUrl }}"
                            style="text-decoration: none; color: #e2e8f0; font-weight: 500; font-size: 15px; transition: all 0.3s ease; display: flex; align-items: center; gap: 8px; position: relative;"
                            class="{{ in_array($routeName, ['contact.home', 'custom.domain.contact']) ? 'active' : '' }}">
                            <i class="fas fa-envelope"></i> {{ __('Contact') }}
                            <span
                                style="position: absolute; bottom: -8px; left: 0; width: 0; height: 2px; background: linear-gradient(135deg, #6366f1, #a855f7); transition: width 0.3s ease;"></span>
                        </a>
                    </li>
                </ul>
            </nav>

            <!-- Header Buttons -->
            <div style="display: flex; gap: 12px;">
                @if (Auth::check())
                    <a href="{{ route('dashboard') }}"
                        style="padding: 10px 24px; border-radius: 50px; font-weight: 600; text-decoration: none; display: inline-flex; align-items: center; gap: 8px; font-size: 14px; background: linear-gradient(135deg, #6366f1, #a855f7); color: white; transition: all 0.3s ease; box-shadow: 0 2px 10px rgba(99, 102, 241, 0.3);">
                        <i class="fas fa-tachometer-alt"></i> Dashboard
                    </a>
                @else
                    <a href=""
                        style="padding: 10px 24px; border-radius: 50px; font-weight: 600; text-decoration: none; display: inline-flex; align-items: center; gap: 8px; font-size: 14px; border: 1px solid rgba(255, 255, 255, 0.3); color: white; background: transparent; transition: all 0.3s ease;">
                        <i class="fas fa-sign-in-alt"></i> Login
                    </a>



                    <a href=""
                        style="padding: 10px 24px; border-radius: 50px; font-weight: 600; text-decoration: none; display: inline-flex; align-items: center; gap: 8px; font-size: 14px; background: linear-gradient(135deg, #6366f1, #a855f7); color: white; transition: all 0.3s ease; box-shadow: 0 2px 10px rgba(99, 102, 241, 0.3);">
                        <i class="fas fa-user-plus"></i> Sign Up
                    </a>
                @endif
            </div>

            <!-- Mobile Menu Toggle -->
            <div style="display: none; cursor: pointer; font-size: 24px; color: white; transition: transform 0.3s ease;"
                class="t4-mobile-toggle">
                <i class="fas fa-bars"></i>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div style="position: fixed; top: 0; left: -100%; width: 80%; max-width: 320px; height: 100%; background: #0f172a; z-index: 1001; transition: left 0.4s cubic-bezier(0.2, 0.9, 0.4, 1.1); box-shadow: 2px 0 20px rgba(0, 0, 0, 0.3); overflow-y: auto;"
        class="t4-mobile-menu">
        <div
            style="display: flex; justify-content: space-between; align-items: center; padding: 20px; border-bottom: 1px solid rgba(255, 255, 255, 0.1);">
            <div class="t4-logo">
                <a href="{{ $homeUrl }}">
                    <img src="{{ asset(Storage::url('upload/logo/')) . '/' . (isset($admin_logo) && !empty($admin_logo) ? $admin_logo : 'logo.png') }}"
                        alt="Logo" style="height: 40px; width: auto;">
                </a>
            </div>
            <div style="cursor: pointer; font-size: 24px; color: white; transition: transform 0.3s ease;"
                class="t4-mobile-close">
                <i class="fas fa-times"></i>
            </div>
        </div>
        <ul style="list-style: none; padding: 20px; margin: 0;">
            <li
                style="margin-bottom: 16px; opacity: 0; transform: translateX(-20px); animation: slideIn 0.3s ease forwards; animation-delay: 0.05s;">
                <a href="{{ $homeUrl }}"
                    style="text-decoration: none; color: #e2e8f0; font-size: 16px; display: flex; align-items: center; gap: 12px; padding: 10px; border-radius: 12px; transition: all 0.3s ease;"><i
                        class="fas fa-home"></i> {{ __('Home') }}</a></li>
            <li
                style="margin-bottom: 16px; opacity: 0; transform: translateX(-20px); animation: slideIn 0.3s ease forwards; animation-delay: 0.1s;">
                <a href="{{ $isCustomDomain ? route('custom.domain.properties') : route('property.home', $user->code) }}"
                    style="text-decoration: none; color: #e2e8f0; font-size: 16px; display: flex; align-items: center; gap: 12px; padding: 10px; border-radius: 12px; transition: all 0.3s ease;"><i
                        class="fas fa-building"></i> {{ __('Properties') }}</a></li>
            <li
                style="margin-bottom: 16px; opacity: 0; transform: translateX(-20px); animation: slideIn 0.3s ease forwards; animation-delay: 0.15s;">
                <a href="{{ $blogUrl }}"
                    style="text-decoration: none; color: #e2e8f0; font-size: 16px; display: flex; align-items: center; gap: 12px; padding: 10px; border-radius: 12px; transition: all 0.3s ease;"><i
                        class="fas fa-newspaper"></i> {{ __('Blog') }}</a></li>
            <li
                style="margin-bottom: 16px; opacity: 0; transform: translateX(-20px); animation: slideIn 0.3s ease forwards; animation-delay: 0.2s;">
                <a href="{{ $contactUrl }}"
                    style="text-decoration: none; color: #e2e8f0; font-size: 16px; display: flex; align-items: center; gap: 12px; padding: 10px; border-radius: 12px; transition: all 0.3s ease;"><i
                        class="fas fa-envelope"></i> {{ __('Contact') }}</a></li>
            @if (!Auth::check())
                <li
                    style="margin-bottom: 16px; opacity: 0; transform: translateX(-20px); animation: slideIn 0.3s ease forwards; animation-delay: 0.25s;">
                    <a href="{{ route('login') }}"
                        style="text-decoration: none; color: #e2e8f0; font-size: 16px; display: flex; align-items: center; gap: 12px; padding: 10px; border-radius: 12px; transition: all 0.3s ease;"><i
                            class="fas fa-sign-in-alt"></i> {{ __('Login') }}</a></li>
                <li
                    style="margin-bottom: 16px; opacity: 0; transform: translateX(-20px); animation: slideIn 0.3s ease forwards; animation-delay: 0.3s;">
                    <a href="{{ route('register') }}"
                        style="text-decoration: none; color: #e2e8f0; font-size: 16px; display: flex; align-items: center; gap: 12px; padding: 10px; border-radius: 12px; transition: all 0.3s ease;"><i
                            class="fas fa-user-plus"></i> {{ __('Register') }}</a></li>
            @else
                <li
                    style="margin-bottom: 16px; opacity: 0; transform: translateX(-20px); animation: slideIn 0.3s ease forwards; animation-delay: 0.25s;">
                    <a href="{{ route('dashboard') }}"
                        style="text-decoration: none; color: #e2e8f0; font-size: 16px; display: flex; align-items: center; gap: 12px; padding: 10px; border-radius: 12px; transition: all 0.3s ease;"><i
                            class="fas fa-tachometer-alt"></i> {{ __('Dashboard') }}</a></li>
            @endif
        </ul>
    </div>
</header>

<style>
    /* Keyframe animations */
    @keyframes slideIn {
        from {
            opacity: 0;
            transform: translateX(-20px);
        }

        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    /* Header scroll animation */
    .t4-header {
        transition: all 0.4s cubic-bezier(0.2, 0.9, 0.4, 1.1) !important;
    }

    .t4-header.scrolled {
        padding: 10px 0 !important;
        background: rgba(15, 23, 42, 0.98) !important;
        backdrop-filter: blur(20px) !important;
        border-bottom-color: rgba(99, 102, 241, 0.3) !important;
    }

    /* Logo hover animation */
    .t4-logo:hover img {
        transform: scale(1.05);
    }

    /* Navigation link hover underline animation */
    nav ul li a:hover span {
        width: 100% !important;
    }

    nav ul li a.active span {
        width: 100% !important;
    }

    nav ul li a.active {
        color: #6366f1 !important;
    }

    /* Button hover animations */
    .t4-header-buttons a:first-child:hover,
    .t4-header-buttons a:last-child:hover {
        transform: translateY(-3px) scale(1.02);
        box-shadow: 0 8px 25px rgba(99, 102, 241, 0.4);
    }

    .t4-header-buttons a:nth-child(2):hover {
        border-color: #6366f1 !important;
        background: rgba(99, 102, 241, 0.15) !important;
        transform: translateY(-2px);
    }

    /* Mobile menu animations */
    .t4-mobile-menu.open {
        left: 0 !important;
    }

    .t4-mobile-close:hover {
        transform: rotate(90deg);
    }

    .t4-mobile-toggle:hover {
        transform: scale(1.1);
    }

    /* Mobile menu items hover */
    .t4-mobile-nav-menu a:hover {
        background: rgba(99, 102, 241, 0.2) !important;
        color: #6366f1 !important;
        transform: translateX(5px);
    }

    /* Responsive */
    @media (max-width: 768px) {
        nav {
            display: none !important;
        }

        .t4-header-buttons {
            display: none !important;
        }

        .t4-mobile-toggle {
            display: block !important;
        }
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

    /* Page load animation for header */
    .t4-header {
        animation: fadeInDown 0.6s ease forwards;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Mobile menu toggle
        const toggleBtn = document.querySelector('.t4-mobile-toggle');
        const mobileMenu = document.querySelector('.t4-mobile-menu');
        const closeBtn = document.querySelector('.t4-mobile-close');

        // Close mobile menu when clicking outside
        const overlay = document.createElement('div');
        overlay.style.position = 'fixed';
        overlay.style.top = '0';
        overlay.style.left = '0';
        overlay.style.width = '100%';
        overlay.style.height = '100%';
        overlay.style.background = 'rgba(0,0,0,0.5)';
        overlay.style.zIndex = '1000';
        overlay.style.display = 'none';
        overlay.style.opacity = '0';
        overlay.style.transition = 'opacity 0.3s ease';
        document.body.appendChild(overlay);

        function openMenu() {
            mobileMenu.classList.add('open');
            overlay.style.display = 'block';
            setTimeout(() => {
                overlay.style.opacity = '1';
            }, 10);
            document.body.style.overflow = 'hidden';
        }

        function closeMenu() {
            mobileMenu.classList.remove('open');
            overlay.style.opacity = '0';
            setTimeout(() => {
                overlay.style.display = 'none';
            }, 300);
            document.body.style.overflow = '';
        }

        if (toggleBtn) toggleBtn.addEventListener('click', openMenu);
        if (closeBtn) closeBtn.addEventListener('click', closeMenu);
        overlay.addEventListener('click', closeMenu);

        // Sticky header on scroll
        const header = document.querySelector('.t4-header');
        window.addEventListener('scroll', function() {
            if (window.scrollY > 50) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
        });
    });
</script>
