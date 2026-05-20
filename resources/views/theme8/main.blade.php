<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $settings['app_name'] ?? 'PropManage' }} | {{ $page_title ?? 'Home' }}</title>

    <!-- Font Awesome 6 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Google Fonts - SF Pro style -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,300;14..32,400;14..32,500;14..32,600;14..32,700;14..32,800&display=swap" rel="stylesheet">

    <style>
        /* ============================================
           THEME 8 - GLASS (iOS Glassmorphism)
           Frosted glass effects, blur backgrounds
           Rounded corners, soft shadows
           ============================================ */

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            background: #f5f5f7;
            color: #1d1c1e;
            line-height: 1.5;
            overflow-x: hidden;
        }

        h1, h2, h3, h4, h5, h6 {
            font-weight: 700;
            letter-spacing: -0.02em;
            color: #1d1c1e;
        }

        /* ========== COLOR VARIABLES ========== */
        :root {
            --ios-blue: #007aff;
            --ios-green: #34c759;
            --ios-red: #ff3b30;
            --ios-orange: #ff9500;
            --ios-purple: #af52de;
            --ios-gray: #8e8e93;
            --ios-light-gray: #c6c6c8;
            --ios-bg: #f5f5f7;
            --glass-bg: rgba(255, 255, 255, 0.7);
            --glass-bg-dark: rgba(255, 255, 255, 0.85);
            --glass-border: rgba(255, 255, 255, 0.5);
            --shadow-sm: 0 2px 8px rgba(0, 0, 0, 0.04);
            --shadow-md: 0 4px 16px rgba(0, 0, 0, 0.06);
            --shadow-lg: 0 8px 24px rgba(0, 0, 0, 0.08);
            --shadow-xl: 0 16px 32px rgba(0, 0, 0, 0.1);
        }

        /* ========== GLASS EFFECT ========== */
        .glass {
            background: var(--glass-bg);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid var(--glass-border);
            border-radius: 20px;
        }

        .glass-card {
            background: var(--glass-bg-dark);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid var(--glass-border);
            border-radius: 24px;
            box-shadow: var(--shadow-md);
            transition: all 0.3s ease;
        }

        .glass-card:hover {
            transform: translateY(-4px);
            box-shadow: var(--shadow-lg);
            background: rgba(255, 255, 255, 0.85);
        }

        /* ========== CONTAINER ========== */
        .glass-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 24px;
            width: 100%;
        }

        /* ========== HEADER (Glass Top Bar) ========== */
        .glass-header {
            position: sticky;
            top: 0;
            z-index: 100;
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.5);
            padding: 12px 0;
        }

        .glass-header-inner {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .glass-logo a {
            font-size: 24px;
            font-weight: 700;
            text-decoration: none;
            background: linear-gradient(135deg, var(--ios-blue), var(--ios-purple));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .glass-nav {
            display: flex;
            gap: 32px;
            list-style: none;
        }

        .glass-nav a {
            text-decoration: none;
            color: #1d1c1e;
            font-weight: 500;
            font-size: 15px;
            transition: color 0.2s;
        }

        .glass-nav a:hover,
        .glass-nav a.active {
            color: var(--ios-blue);
        }

        .glass-buttons {
            display: flex;
            gap: 12px;
        }

        .glass-btn-outline {
            padding: 8px 20px;
            background: transparent;
            border: 1px solid var(--ios-blue);
            border-radius: 30px;
            text-decoration: none;
            color: var(--ios-blue);
            font-size: 14px;
            font-weight: 500;
            transition: all 0.2s;
        }

        .glass-btn-outline:hover {
            background: var(--ios-blue);
            color: white;
        }

        .glass-btn-primary {
            padding: 8px 20px;
            background: var(--ios-blue);
            border: none;
            border-radius: 30px;
            text-decoration: none;
            color: white;
            font-size: 14px;
            font-weight: 500;
            transition: all 0.2s;
        }

        .glass-btn-primary:hover {
            background: #005fc1;
            transform: translateY(-1px);
        }

        .glass-mobile-btn {
            display: none;
            background: none;
            border: none;
            font-size: 24px;
            cursor: pointer;
            color: var(--ios-blue);
        }

        /* Main Content */


        /* Back to Top */
        .glass-back-top {
            position: fixed;
            bottom: 24px;
            right: 24px;
            width: 48px;
            height: 48px;
            background: var(--ios-blue);
            border: none;
            border-radius: 30px;
            color: white;
            cursor: pointer;
            z-index: 99;
            opacity: 0;
            visibility: hidden;
            transition: all 0.2s;
            box-shadow: var(--shadow-md);
        }

        .glass-back-top.visible {
            opacity: 1;
            visibility: visible;
        }

        .glass-back-top:hover {
            background: #005fc1;
            transform: translateY(-2px);
        }

        /* Preloader */
        .glass-preloader {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: var(--ios-bg);
            z-index: 9999;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .glass-preloader.hidden {
            display: none;
        }

        .glass-loader {
            width: 48px;
            height: 48px;
            border: 3px solid rgba(0, 122, 255, 0.2);
            border-top-color: var(--ios-blue);
            border-radius: 50%;
            animation: spin 0.6s linear infinite;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        /* Mobile Sidebar */
        .glass-mobile-sidebar {
            position: fixed;
            top: 0;
            right: -100%;
            width: 80%;
            max-width: 300px;
            height: 100vh;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            z-index: 1100;
            transition: right 0.3s ease;
            padding: 80px 28px 40px;
            box-shadow: var(--shadow-xl);
        }

        .glass-mobile-sidebar.active {
            right: 0;
        }

        .glass-mobile-sidebar ul {
            list-style: none;
        }

        .glass-mobile-sidebar li {
            margin-bottom: 24px;
        }

        .glass-mobile-sidebar a {
            text-decoration: none;
            color: #1d1c1e;
            font-size: 18px;
            font-weight: 500;
        }

        .glass-mobile-close {
            position: absolute;
            top: 20px;
            right: 20px;
            background: none;
            border: none;
            font-size: 24px;
            cursor: pointer;
        }

        .glass-overlay {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.3);
            backdrop-filter: blur(4px);
            z-index: 1050;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s;
        }

        .glass-overlay.active {
            opacity: 1;
            visibility: visible;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .glass-nav,
            .glass-buttons {
                display: none;
            }

            .glass-mobile-btn {
                display: block;
            }

            .glass-container {
                padding: 0 20px;
            }
        }
    </style>
</head>
<body>
    <div class="glass-preloader" id="glassPreloader">
        <div class="glass-loader"></div>
    </div>

    @include('theme8.header')

    <main class="glass-main">
        @yield('content')
    </main>

    @include('theme8.footer')

    <button class="glass-back-top" id="glassBackTop">
        <i class="fas fa-arrow-up"></i>
    </button>

    <div class="glass-overlay" id="glassOverlay"></div>
    <div class="glass-mobile-sidebar" id="glassMobileSidebar">
        <button class="glass-mobile-close" id="glassMobileClose"><i class="fas fa-times"></i></button>
        <ul>
            <li><a href="">Home</a></li>
            <li><a href="{{ route('property.home', ['code' => $user->code ?? '']) }}">Properties</a></li>
            <li><a href="{{ route('blog.home', ['code' => $user->code ?? '']) }}">Blog</a></li>
            <li><a href="{{ route('contact.home', ['code' => $user->code ?? '']) }}">Contact</a></li>
            @if(Auth::check())
                <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li><a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
            @else
                <li><a href="">Login</a></li>
                <li><a href="">Sign Up</a></li>
            @endif
        </ul>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Preloader
            const preloader = document.getElementById('glassPreloader');
            if (preloader) {
                setTimeout(() => preloader.classList.add('hidden'), 500);
            }

            // Back to top
            const backTop = document.getElementById('glassBackTop');
            if (backTop) {
                window.addEventListener('scroll', () => {
                    backTop.classList.toggle('visible', window.scrollY > 300);
                });
                backTop.addEventListener('click', () => window.scrollTo({ top: 0, behavior: 'smooth' }));
            }

            // Mobile sidebar
            const mobileBtn = document.getElementById('glassMobileBtn');
            const sidebar = document.getElementById('glassMobileSidebar');
            const closeBtn = document.getElementById('glassMobileClose');
            const overlay = document.getElementById('glassOverlay');

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

    @stack('theme8-scripts')
</body>
</html>
