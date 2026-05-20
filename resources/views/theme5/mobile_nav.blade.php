<!-- Mobile Navigation Overlay -->
<div class="theme5-mobile-overlay" style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.8); backdrop-filter: blur(10px); z-index: 1000; display: none; opacity: 0; transition: opacity 0.3s ease;"></div>

<!-- Mobile Navigation Menu -->
<div class="theme5-mobile-nav" style="position: fixed; top: 0; left: -100%; width: 80%; max-width: 350px; height: 100%; background: linear-gradient(135deg, #0a0a0a 0%, #0a0a2e 100%); z-index: 1001; transition: left 0.4s cubic-bezier(0.2, 0.9, 0.4, 1.1); box-shadow: 5px 0 30px rgba(0, 0, 0, 0.5); border-right: 1px solid rgba(0, 243, 255, 0.3); overflow-y: auto;">

    <!-- Mobile Nav Header -->
    <div style="display: flex; justify-content: space-between; align-items: center; padding: 20px; border-bottom: 1px solid rgba(0, 243, 255, 0.2); margin-bottom: 20px;">
        <div class="theme5-logo">
            <a href="{{ $homeUrl ?? '#' }}">
                @php $admin_logo = getSettingsValByName('company_logo'); @endphp
                <img src="{{ asset(Storage::url('upload/logo/')) . '/' . (isset($admin_logo) && !empty($admin_logo) ? $admin_logo : 'logo.png') }}"
                     alt="Logo" style="height: 40px; width: auto; filter: drop-shadow(0 0 10px rgba(0,243,255,0.5));">
            </a>
        </div>
        <div class="theme5-mobile-close" style="cursor: pointer; font-size: 24px; color: #00f3ff; transition: transform 0.3s; display: flex; align-items: center; justify-content: center; width: 40px; height: 40px; border-radius: 50%; background: rgba(0, 243, 255, 0.1);">
            <i class="fas fa-times"></i>
        </div>
    </div>

    <!-- Mobile Nav Menu Items -->
    <ul style="list-style: none; padding: 0 20px; margin: 0;">
        <li style="margin-bottom: 5px; opacity: 0; transform: translateX(-20px); animation: slideInMobile 0.3s ease forwards; animation-delay: 0.05s;">
            <a href="{{ $homeUrl ?? '#' }}" style="display: flex; align-items: center; gap: 15px; padding: 14px 16px; text-decoration: none; color: #e2e8f0; font-size: 16px; font-weight: 500; border-radius: 12px; transition: all 0.3s;">
                <i class="fas fa-home" style="width: 24px; color: #00f3ff;"></i>
                <span>{{ __('Home') }}</span>
            </a>
        </li>
        <li style="margin-bottom: 5px; opacity: 0; transform: translateX(-20px); animation: slideInMobile 0.3s ease forwards; animation-delay: 0.1s;">
            <a href="{{ $propertiesUrl ?? '#' }}" style="display: flex; align-items: center; gap: 15px; padding: 14px 16px; text-decoration: none; color: #e2e8f0; font-size: 16px; font-weight: 500; border-radius: 12px; transition: all 0.3s;">
                <i class="fas fa-building" style="width: 24px; color: #00f3ff;"></i>
                <span>{{ __('Properties') }}</span>
            </a>
        </li>
        <li style="margin-bottom: 5px; opacity: 0; transform: translateX(-20px); animation: slideInMobile 0.3s ease forwards; animation-delay: 0.15s;">
            <a href="{{ $blogUrl ?? '#' }}" style="display: flex; align-items: center; gap: 15px; padding: 14px 16px; text-decoration: none; color: #e2e8f0; font-size: 16px; font-weight: 500; border-radius: 12px; transition: all 0.3s;">
                <i class="fas fa-newspaper" style="width: 24px; color: #00f3ff;"></i>
                <span>{{ __('Blog') }}</span>
            </a>
        </li>
        <li style="margin-bottom: 5px; opacity: 0; transform: translateX(-20px); animation: slideInMobile 0.3s ease forwards; animation-delay: 0.2s;">
            <a href="{{ $contactUrl ?? '#' }}" style="display: flex; align-items: center; gap: 15px; padding: 14px 16px; text-decoration: none; color: #e2e8f0; font-size: 16px; font-weight: 500; border-radius: 12px; transition: all 0.3s;">
                <i class="fas fa-envelope" style="width: 24px; color: #00f3ff;"></i>
                <span>{{ __('Contact') }}</span>
            </a>
        </li>
    </ul>

    <!-- Divider -->
    <div style="height: 1px; background: linear-gradient(90deg, transparent, #00f3ff, #ff00ff, transparent); margin: 20px;"></div>

    <!-- Auth Section -->
    <ul style="list-style: none; padding: 0 20px; margin: 0;">
        @if(!Auth::check())
            <li style="margin-bottom: 5px; opacity: 0; transform: translateX(-20px); animation: slideInMobile 0.3s ease forwards; animation-delay: 0.25s;">
                <a href="" style="display: flex; align-items: center; gap: 15px; padding: 14px 16px; text-decoration: none; color: #e2e8f0; font-size: 16px; font-weight: 500; border-radius: 12px; transition: all 0.3s;">
                    <i class="fas fa-sign-in-alt" style="width: 24px; color: #00f3ff;"></i>
                    <span>{{ __('Login') }}</span>
                </a>
            </li>
            <li style="margin-bottom: 5px; opacity: 0; transform: translateX(-20px); animation: slideInMobile 0.3s ease forwards; animation-delay: 0.3s;">
                <a href="" style="display: flex; align-items: center; gap: 15px; padding: 14px 16px; text-decoration: none; color: #e2e8f0; font-size: 16px; font-weight: 500; border-radius: 12px; transition: all 0.3s;">
                    <i class="fas fa-user-plus" style="width: 24px; color: #00f3ff;"></i>
                    <span>{{ __('Register') }}</span>
                </a>
            </li>
        @else
            <li style="margin-bottom: 5px; opacity: 0; transform: translateX(-20px); animation: slideInMobile 0.3s ease forwards; animation-delay: 0.25s;">
                <a href="{{ route('dashboard') }}" style="display: flex; align-items: center; gap: 15px; padding: 14px 16px; text-decoration: none; color: #e2e8f0; font-size: 16px; font-weight: 500; border-radius: 12px; transition: all 0.3s;">
                    <i class="fas fa-tachometer-alt" style="width: 24px; color: #00f3ff;"></i>
                    <span>{{ __('Dashboard') }}</span>
                </a>
            </li>
        @endif
    </ul>

    <!-- Social Links Section -->
    <div style="padding: 20px; margin-top: 30px; border-top: 1px solid rgba(0, 243, 255, 0.1);">
        <p style="color: #00f3ff; font-size: 12px; margin-bottom: 15px; text-align: center; letter-spacing: 2px;">FOLLOW US</p>
        <div style="display: flex; justify-content: center; gap: 15px;">
            <a href="{{ $Section_8_content_value['fb_link'] ?? '#' }}" style="width: 40px; height: 40px; background: rgba(0, 243, 255, 0.1); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: #00f3ff; text-decoration: none; transition: all 0.3s; border: 1px solid rgba(0,243,255,0.3);">
                <i class="fab fa-facebook-f"></i>
            </a>
            <a href="{{ $Section_8_content_value['twitter_link'] ?? '#' }}" style="width: 40px; height: 40px; background: rgba(0, 243, 255, 0.1); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: #00f3ff; text-decoration: none; transition: all 0.3s; border: 1px solid rgba(0,243,255,0.3);">
                <i class="fab fa-twitter"></i>
            </a>
            <a href="{{ $Section_8_content_value['insta_link'] ?? '#' }}" style="width: 40px; height: 40px; background: rgba(0, 243, 255, 0.1); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: #00f3ff; text-decoration: none; transition: all 0.3s; border: 1px solid rgba(0,243,255,0.3);">
                <i class="fab fa-instagram"></i>
            </a>
            <a href="{{ $Section_8_content_value['linkedin_link'] ?? '#' }}" style="width: 40px; height: 40px; background: rgba(0, 243, 255, 0.1); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: #00f3ff; text-decoration: none; transition: all 0.3s; border: 1px solid rgba(0,243,255,0.3);">
                <i class="fab fa-linkedin-in"></i>
            </a>
        </div>
    </div>
</div>

<style>
/* Mobile Nav Animations */
@keyframes slideInMobile {
    from {
        opacity: 0;
        transform: translateX(-20px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

/* Mobile Nav Item Hover Effects */
.theme5-mobile-nav ul li a:hover {
    background: linear-gradient(90deg, rgba(0, 243, 255, 0.15), transparent) !important;
    color: #00f3ff !important;
    transform: translateX(5px);
}

.theme5-mobile-nav ul li a:hover i {
    color: #ff00ff !important;
    text-shadow: 0 0 5px #ff00ff;
}

/* Social Links Hover */
.theme5-mobile-nav .social-links a:hover {
    background: linear-gradient(135deg, #00f3ff, #ff00ff) !important;
    color: white !important;
    transform: translateY(-3px);
    box-shadow: 0 0 15px rgba(0,243,255,0.5);
}

/* Close Button Hover */
.theme5-mobile-close:hover {
    transform: rotate(90deg) scale(1.1);
    background: linear-gradient(135deg, #00f3ff, #ff00ff) !important;
    color: white !important;
}

/* Open state for mobile nav */
.theme5-mobile-nav.open {
    left: 0 !important;
}

/* Overlay active state */
.theme5-mobile-overlay.active {
    display: block !important;
    opacity: 1 !important;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Mobile Navigation Elements
    const mobileToggle = document.querySelector('.theme5-mobile-toggle');
    const mobileNav = document.querySelector('.theme5-mobile-nav');
    const mobileOverlay = document.querySelector('.theme5-mobile-overlay');
    const mobileClose = document.querySelector('.theme5-mobile-close');

    // Open mobile menu
    function openMobileMenu() {
        if (mobileNav) mobileNav.classList.add('open');
        if (mobileOverlay) mobileOverlay.classList.add('active');
        document.body.style.overflow = 'hidden';
    }

    // Close mobile menu
    function closeMobileMenu() {
        if (mobileNav) mobileNav.classList.remove('open');
        if (mobileOverlay) mobileOverlay.classList.remove('active');
        document.body.style.overflow = '';
    }

    // Event Listeners
    if (mobileToggle) {
        mobileToggle.addEventListener('click', openMobileMenu);
    }

    if (mobileClose) {
        mobileClose.addEventListener('click', closeMobileMenu);
    }

    if (mobileOverlay) {
        mobileOverlay.addEventListener('click', closeMobileMenu);
    }

    // Close on escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && mobileNav && mobileNav.classList.contains('open')) {
            closeMobileMenu();
        }
    });
});
</script>
