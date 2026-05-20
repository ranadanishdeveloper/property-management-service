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

<header class="aether-header">
    <div class="container-aether">
        <div class="aether-header-inner">
            <!-- Logo -->
            <div class="aether-logo">
                <a href="{{ $homeUrl }}" class="logo-link">
                    @if(!empty($admin_logo))
                        <img src="{{ asset(Storage::url('upload/logo/' . $admin_logo)) }}" alt="Logo" class="logo-img">
                    @else
                        <div class="logo-text">
                            <span class="logo-primary">{{ $settings['app_name'] ?? 'Prop' }}</span>
                            <span class="logo-secondary">Manage</span>
                        </div>
                    @endif
                </a>
            </div>

            <!-- Main Navigation -->
            <nav class="aether-nav">
                <ul class="nav-menu">
                    <li class="nav-item">
                        <a href="{{ $homeUrl }}" class="nav-link {{ in_array($routeName, ['web.page', 'custom.domain.home']) ? 'active' : '' }}">
                            <span class="nav-icon"><i class="fas fa-home"></i></span>
                            <span class="nav-text">{{ __('Home') }}</span>
                            <span class="nav-indicator"></span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ $isCustomDomain ? route('custom.domain.properties') : route('property.home', $user->code) }}" class="nav-link {{ in_array($routeName, ['property.home', 'property.detail', 'custom.domain.properties', 'custom.domain.property.detail']) ? 'active' : '' }}">
                            <span class="nav-icon"><i class="fas fa-building"></i></span>
                            <span class="nav-text">{{ __('Properties') }}</span>
                            <span class="nav-indicator"></span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ $blogUrl }}" class="nav-link {{ in_array($routeName, ['blog.home', 'blog.detail', 'custom.domain.blog', 'custom.domain.blog.detail']) ? 'active' : '' }}">
                            <span class="nav-icon"><i class="fas fa-newspaper"></i></span>
                            <span class="nav-text">{{ __('Blog') }}</span>
                            <span class="nav-indicator"></span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ $contactUrl }}" class="nav-link {{ in_array($routeName, ['contact.home', 'custom.domain.contact']) ? 'active' : '' }}">
                            <span class="nav-icon"><i class="fas fa-envelope"></i></span>
                            <span class="nav-text">{{ __('Contact') }}</span>
                            <span class="nav-indicator"></span>
                        </a>
                    </li>
                </ul>
            </nav>

            <!-- Right Actions -->
            <div class="aether-actions">
                @if(Auth::check())
                    <div class="user-menu">
                        <button class="user-avatar">
                            <i class="fas fa-user-circle"></i>
                            <span class="user-name">{{ Auth::user()->name }}</span>
                            <i class="fas fa-chevron-down"></i>
                        </button>
                        <div class="user-dropdown">
                            <a href="{{ route('dashboard') }}" class="dropdown-item">
                                <i class="fas fa-tachometer-alt"></i> Dashboard
                            </a>


                            <a href="#" class="dropdown-item">
                                <i class="fas fa-heart"></i> Favorites
                            </a>
                            <a href="#" class="dropdown-item">
                                <i class="fas fa-cog"></i> Settings
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
                        </div>
                    </div>
                @else
                    <a href="#" class="aether-btn aether-btn-outline">
                        <i class="fas fa-sign-in-alt"></i>
                        <span>Login</span>
                    </a>
                    <a href="#" class="aether-btn aether-btn-primary">
                        <i class="fas fa-user-plus"></i>
                        <span>Sign Up</span>
                    </a>
                @endif

                <!-- Mobile Menu Toggle -->
                <button class="mobile-toggle" id="mobileToggle">
                    <span class="toggle-line"></span>
                    <span class="toggle-line"></span>
                    <span class="toggle-line"></span>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Navigation -->
    <div class="mobile-nav" id="mobileNav">
        <div class="mobile-nav-container">
            <div class="mobile-nav-header">
                <div class="mobile-logo">
                    @if(!empty($admin_logo))
                        <img src="{{ asset(Storage::url('upload/logo/' . $admin_logo)) }}" alt="Logo">
                    @else
                        <span>{{ $settings['app_name'] ?? 'PropManage' }}</span>
                    @endif
                </div>
                <button class="mobile-close" id="mobileClose">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <ul class="mobile-nav-menu">
                <li><a href="{{ $homeUrl }}" class="mobile-nav-link {{ in_array($routeName, ['web.page', 'custom.domain.home']) ? 'active' : '' }}"><i class="fas fa-home"></i> Home</a></li>
                <li><a href="{{ $isCustomDomain ? route('custom.domain.properties') : route('property.home', $user->code) }}" class="mobile-nav-link {{ in_array($routeName, ['property.home', 'property.detail', 'custom.domain.properties', 'custom.domain.property.detail']) ? 'active' : '' }}"><i class="fas fa-building"></i> Properties</a></li>
                <li><a href="{{ $blogUrl }}" class="mobile-nav-link {{ in_array($routeName, ['blog.home', 'blog.detail', 'custom.domain.blog', 'custom.domain.blog.detail']) ? 'active' : '' }}"><i class="fas fa-newspaper"></i> Blog</a></li>
                <li><a href="{{ $contactUrl }}" class="mobile-nav-link {{ in_array($routeName, ['contact.home', 'custom.domain.contact']) ? 'active' : '' }}"><i class="fas fa-envelope"></i> Contact</a></li>
            </ul>
            @if(!Auth::check())
                <div class="mobile-auth">
                    <a href="{{ route('login') }}" class="mobile-btn mobile-btn-outline">Login</a>
                    <a href="{{ route('register') }}" class="mobile-btn mobile-btn-primary">Sign Up</a>
                </div>
            @endif
        </div>
    </div>
</header>

<style>
/* ============================================
   AETHER HEADER - PREMIUM MAGAZINE STYLE
   Glassmorphism + Smooth Animations
============================================ */

.aether-header {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    background: rgba(255, 255, 255, 0.96);
    backdrop-filter: blur(20px);
    z-index: 1000;
    padding: 20px 0;
    transition: all 0.4s cubic-bezier(0.2, 0.9, 0.4, 1.1);
    border-bottom: 1px solid rgba(0, 0, 0, 0.04);
}

.aether-header.scrolled {
    padding: 12px 0;
    background: rgba(255, 255, 255, 0.98);
    box-shadow: 0 8px 30px rgba(0, 0, 0, 0.06);
    border-bottom-color: rgba(255, 107, 74, 0.15);
}

/* Container */
.container-aether {
    max-width: 1280px;
    margin: 0 auto;
    padding: 0 28px;
}

.aether-header-inner {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 30px;
}

/* ========== LOGO ========== */
.aether-logo {
    flex-shrink: 0;
}

.logo-link {
    text-decoration: none;
    display: block;
    transition: transform 0.3s ease;
}

.logo-link:hover {
    transform: scale(1.02);
}

.logo-img {
    height: 42px;
    object-fit: contain;
}

.logo-text {
    font-size: 28px;
    font-weight: 800;
    letter-spacing: -0.5px;
}

.logo-primary {
    color: #1a1a2e;
}

.logo-secondary {
    background: linear-gradient(135deg, #ff6b4a, #ff9f4a);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}

/* ========== NAVIGATION ========== */
.aether-nav {
    flex: 1;
}

.nav-menu {
    display: flex;
    justify-content: center;
    gap: 8px;
    list-style: none;
    margin: 0;
    padding: 0;
}

.nav-item {
    position: relative;
}

.nav-link {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 10px 20px;
    text-decoration: none;
    color: #2c3e50;
    font-weight: 500;
    font-size: 15px;
    border-radius: 50px;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}

.nav-link .nav-icon {
    font-size: 14px;
    opacity: 0.7;
    transition: all 0.3s;
}

.nav-link:hover {
    background: rgba(255, 107, 74, 0.08);
    color: #ff6b4a;
}

.nav-link:hover .nav-icon {
    opacity: 1;
    transform: translateY(-2px);
}

.nav-link.active {
    background: rgba(255, 107, 74, 0.12);
    color: #ff6b4a;
}

.nav-link.active .nav-icon {
    opacity: 1;
    color: #ff6b4a;
}

/* Active Indicator Animation */
.nav-indicator {
    position: absolute;
    bottom: -2px;
    left: 50%;
    width: 0;
    height: 3px;
    background: linear-gradient(90deg, #ff6b4a, #ff9f4a);
    border-radius: 3px;
    transition: all 0.3s ease;
    transform: translateX(-50%);
}

.nav-link.active .nav-indicator {
    width: 40px;
}

/* ========== ACTIONS ========== */
.aether-actions {
    display: flex;
    align-items: center;
    gap: 12px;
}

/* Buttons */
.aether-btn {
    padding: 10px 24px;
    border-radius: 50px;
    font-weight: 600;
    font-size: 14px;
    text-decoration: none;
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
    gap: 8px;
}

.aether-btn-primary {
    background: linear-gradient(135deg, #ff6b4a, #e85d3e);
    color: white;
    box-shadow: 0 2px 10px rgba(255, 107, 74, 0.25);
}

.aether-btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(255, 107, 74, 0.35);
}

.aether-btn-outline {
    border: 1.5px solid #e2e8f0;
    color: #1a1a2e;
    background: transparent;
}

.aether-btn-outline:hover {
    border-color: #ff6b4a;
    color: #ff6b4a;
    transform: translateY(-2px);
    background: rgba(255, 107, 74, 0.05);
}

/* User Menu */
.user-menu {
    position: relative;
}

.user-avatar {
    display: flex;
    align-items: center;
    gap: 10px;
    background: rgba(255, 107, 74, 0.1);
    border: none;
    padding: 8px 18px;
    border-radius: 50px;
    cursor: pointer;
    transition: all 0.3s;
    font-size: 14px;
    font-weight: 500;
    color: #1a1a2e;
}

.user-avatar i:first-child {
    font-size: 22px;
    color: #ff6b4a;
}

.user-avatar i:last-child {
    font-size: 12px;
    transition: transform 0.3s;
}

.user-menu:hover .user-avatar {
    background: rgba(255, 107, 74, 0.18);
}

.user-menu:hover .user-avatar i:last-child {
    transform: rotate(180deg);
}

.user-dropdown {
    position: absolute;
    top: calc(100% + 10px);
    right: 0;
    background: white;
    border-radius: 16px;
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
    min-width: 200px;
    opacity: 0;
    visibility: hidden;
    transform: translateY(-10px);
    transition: all 0.3s;
    z-index: 100;
}

.user-menu:hover .user-dropdown {
    opacity: 1;
    visibility: visible;
    transform: translateY(0);
}

.dropdown-item {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 12px 20px;
    text-decoration: none;
    color: #4a5568;
    transition: all 0.2s;
    font-size: 14px;
}

.dropdown-item i {
    width: 18px;
    color: #ff6b4a;
}

.dropdown-item:hover {
    background: #f7fafc;
    color: #ff6b4a;
    padding-left: 26px;
}

.dropdown-divider {
    height: 1px;
    background: #e2e8f0;
    margin: 8px 0;
}

/* Mobile Toggle */
.mobile-toggle {
    display: none;
    background: none;
    border: none;
    cursor: pointer;
    padding: 10px;
    width: 44px;
    height: 44px;
    position: relative;
    border-radius: 12px;
    transition: all 0.3s;
}

.mobile-toggle:hover {
    background: rgba(255, 107, 74, 0.1);
}

.toggle-line {
    display: block;
    width: 24px;
    height: 2px;
    background: #1a1a2e;
    margin: 5px 0;
    transition: all 0.3s;
    border-radius: 2px;
}

.mobile-toggle.active .toggle-line:nth-child(1) {
    transform: rotate(45deg) translate(5px, 5px);
}

.mobile-toggle.active .toggle-line:nth-child(2) {
    opacity: 0;
}

.mobile-toggle.active .toggle-line:nth-child(3) {
    transform: rotate(-45deg) translate(7px, -6px);
}

/* Mobile Navigation */
.mobile-nav {
    position: fixed;
    top: 0;
    right: -100%;
    width: 85%;
    max-width: 400px;
    height: 100vh;
    background: white;
    z-index: 1100;
    transition: right 0.4s cubic-bezier(0.2, 0.9, 0.4, 1.1);
    box-shadow: -5px 0 30px rgba(0, 0, 0, 0.1);
}

.mobile-nav.active {
    right: 0;
}

.mobile-nav-container {
    padding: 24px;
    height: 100%;
    display: flex;
    flex-direction: column;
}

.mobile-nav-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 30px;
    padding-bottom: 20px;
    border-bottom: 1px solid #e2e8f0;
}

.mobile-logo img {
    height: 35px;
}

.mobile-logo span {
    font-size: 20px;
    font-weight: 700;
    background: linear-gradient(135deg, #ff6b4a, #ff9f4a);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}

.mobile-close {
    background: none;
    border: none;
    font-size: 24px;
    cursor: pointer;
    color: #4a5568;
    transition: all 0.3s;
}

.mobile-close:hover {
    color: #ff6b4a;
    transform: rotate(90deg);
}

.mobile-nav-menu {
    list-style: none;
    padding: 0;
    margin: 0;
    flex: 1;
}

.mobile-nav-link {
    display: flex;
    align-items: center;
    gap: 15px;
    padding: 15px;
    text-decoration: none;
    color: #2c3e50;
    font-weight: 500;
    border-radius: 12px;
    transition: all 0.3s;
    margin-bottom: 8px;
}

.mobile-nav-link i {
    width: 24px;
    color: #ff6b4a;
    font-size: 18px;
}

.mobile-nav-link:hover,
.mobile-nav-link.active {
    background: rgba(255, 107, 74, 0.1);
    color: #ff6b4a;
    transform: translateX(5px);
}

.mobile-auth {
    display: flex;
    gap: 12px;
    margin-top: 20px;
    padding-top: 20px;
    border-top: 1px solid #e2e8f0;
}

.mobile-btn {
    flex: 1;
    text-align: center;
    padding: 12px;
    border-radius: 50px;
    text-decoration: none;
    font-weight: 500;
    transition: all 0.3s;
}

.mobile-btn-primary {
    background: linear-gradient(135deg, #ff6b4a, #e85d3e);
    color: white;
}

.mobile-btn-outline {
    border: 1px solid #e2e8f0;
    color: #4a5568;
}

/* Overlay */
.mobile-nav-overlay {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0, 0, 0, 0.5);
    z-index: 1050;
    opacity: 0;
    visibility: hidden;
    transition: all 0.3s;
}

.mobile-nav-overlay.active {
    opacity: 1;
    visibility: visible;
}

/* Animations */
@keyframes headerSlideDown {
    from {
        opacity: 0;
        transform: translateY(-30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.aether-header {
    animation: headerSlideDown 0.6s ease forwards;
}

/* Responsive */
@media (max-width: 992px) {
    .aether-nav {
        display: none;
    }

    .mobile-toggle {
        display: block;
    }

    .aether-actions {
        gap: 8px;
    }

    .aether-btn span {
        display: none;
    }

    .aether-btn i {
        margin: 0;
        font-size: 18px;
    }

    .aether-btn {
        padding: 10px 14px;
    }

    .user-name {
        display: none;
    }
}

@media (max-width: 768px) {
    .container-aether {
        padding: 0 20px;
    }

    .aether-header {
        padding: 14px 0;
    }

    .logo-img {
        height: 35px;
    }
}

@media (max-width: 480px) {
    .aether-btn-outline {
        display: none;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Sticky header on scroll
    const header = document.querySelector('.aether-header');
    if (header) {
        window.addEventListener('scroll', function() {
            if (window.scrollY > 50) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
        });
    }

    // Mobile menu toggle
    const mobileToggle = document.getElementById('mobileToggle');
    const mobileNav = document.getElementById('mobileNav');
    const mobileClose = document.getElementById('mobileClose');

    // Create overlay
    const overlay = document.createElement('div');
    overlay.className = 'mobile-nav-overlay';
    document.body.appendChild(overlay);

    function openMobileNav() {
        mobileNav.classList.add('active');
        overlay.classList.add('active');
        document.body.style.overflow = 'hidden';
    }

    function closeMobileNav() {
        mobileNav.classList.remove('active');
        overlay.classList.remove('active');
        document.body.style.overflow = '';
    }

    if (mobileToggle) {
        mobileToggle.addEventListener('click', openMobileNav);
    }

    if (mobileClose) {
        mobileClose.addEventListener('click', closeMobileNav);
    }

    overlay.addEventListener('click', closeMobileNav);

    // Nav link hover animation
    const navLinks = document.querySelectorAll('.nav-link');
    navLinks.forEach(link => {
        link.addEventListener('mouseenter', function() {
            const icon = this.querySelector('.nav-icon i');
            if (icon) {
                icon.style.animation = 'none';
                icon.offsetHeight;
                icon.style.animation = 'navPulse 0.3s ease';
                setTimeout(() => {
                    icon.style.animation = '';
                }, 300);
            }
        });
    });

    // Add pulse animation style
    const style = document.createElement('style');
    style.textContent = `
        @keyframes navPulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.2); }
            100% { transform: scale(1); }
        }
    `;
    document.head.appendChild(style);

    // Close mobile nav on link click
    const mobileLinks = document.querySelectorAll('.mobile-nav-link');
    mobileLinks.forEach(link => {
        link.addEventListener('click', closeMobileNav);
    });
});
</script>
