<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $settings['app_name'] ?? 'PropManage' }} | {{ $page_title ?? 'Home' }}</title>

    <!-- Font Awesome 6 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Google Fonts - Cyberpunk style -->
    <link href="https://fonts.googleapis.com/css2?family=Space+Mono:wght@400;700&family=Syne:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        /* ============================================
           THEME 7 - NEON BRUTALIST (LIGHT BACKGROUND ONLY)
           Colors: Neon Pink #ff2a6d + Cyan #05d9e8
           Background: Light #f5f5f5
           Everything else same as original
           ============================================ */

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Space Mono', monospace;
            background: #f5f5f5;
            color: #1a1a1a;
            line-height: 1.5;
            overflow-x: hidden;
        }

        h1, h2, h3, h4, h5, h6 {
            font-family: 'Syne', sans-serif;
            font-weight: 800;
            letter-spacing: -0.02em;
            text-transform: uppercase;
            color: #1a1a1a;
        }

        /* ========== COLOR VARIABLES ========== */
        :root {
            --neon-pink: #ff2a6d;
            --neon-cyan: #05d9e8;
            --neon-purple: #b100e8;
            --dark-bg: #f5f5f5;
            --card-bg: #ffffff;
            --glow-pink: 0 0 10px rgba(255, 42, 109, 0.5);
            --glow-cyan: 0 0 10px rgba(5, 217, 232, 0.5);
            --border-pixel: 2px solid;
        }

        /* ========== SIDEBAR LAYOUT ========== */
        .cyber-layout {
            display: flex;
            min-height: 100vh;
        }

        /* Vertical Sidebar */
        .cyber-sidebar {
            position: fixed;
            left: 0;
            top: 0;
            width: 260px;
            height: 100vh;
            background: #ffffff;
            border-right: 2px solid var(--neon-pink);
            padding: 40px 20px;
            z-index: 100;
            transform: translateX(0);
            transition: transform 0.3s cubic-bezier(0.77, 0, 0.18, 1);
        }

        .cyber-sidebar.collapsed {
            transform: translateX(-260px);
        }

        .cyber-logo {
            text-align: center;
            margin-bottom: 50px;
            padding-bottom: 20px;
            border-bottom: 2px solid var(--neon-cyan);
        }

        .cyber-logo a {
            font-size: 24px;
            font-weight: 800;
            text-decoration: none;
            color: var(--neon-cyan);
            text-shadow: var(--glow-cyan);
            letter-spacing: 2px;
        }

        .cyber-nav {
            list-style: none;
        }

        .cyber-nav li {
            margin-bottom: 20px;
        }

        .cyber-nav a {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 12px 16px;
            text-decoration: none;
            color: #1a1a1a;
            font-family: 'Space Mono', monospace;
            font-size: 14px;
            font-weight: 700;
            text-transform: uppercase;
            border-left: 3px solid transparent;
            transition: all 0.2s;
        }

        .cyber-nav a i {
            width: 24px;
            color: var(--neon-pink);
        }

        .cyber-nav a:hover,
        .cyber-nav a.active {
            background: rgba(255, 42, 109, 0.1);
            border-left-color: var(--neon-pink);
            color: var(--neon-pink);
        }

        /* Sidebar Toggle Button */
        .cyber-toggle {
            position: fixed;
            left: 270px;
            top: 20px;
            width: 44px;
            height: 44px;
            background: var(--card-bg);
            border: 2px solid var(--neon-cyan);
            color: var(--neon-cyan);
            cursor: pointer;
            z-index: 101;
            transition: all 0.3s;
            font-size: 20px;
        }

        .cyber-toggle:hover {
            background: var(--neon-cyan);
            color: var(--dark-bg);
            box-shadow: var(--glow-cyan);
        }

        .cyber-toggle.collapsed {
            left: 20px;
        }

        /* Main Content */
        .cyber-main {
            flex: 1;
            margin-left: 260px;
            transition: margin-left 0.3s;
            overflow-x: hidden;
        }

        .cyber-main.full-width {
            margin-left: 0;
        }

        /* Container - fits in page */
        .cyber-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 24px;
            width: 100%;
        }

        /* Back to top */
        .cyber-back-top {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 50px;
            height: 50px;
            background: var(--neon-pink);
            border: none;
            color: white;
            cursor: pointer;
            z-index: 99;
            opacity: 0;
            visibility: hidden;
            transition: all 0.2s;
            clip-path: polygon(0% 0%, 100% 0%, 100% 80%, 50% 100%, 0% 80%);
        }

        .cyber-back-top.visible {
            opacity: 1;
            visibility: visible;
        }

        .cyber-back-top:hover {
            background: var(--neon-cyan);
            transform: translateY(-5px);
        }

        /* Preloader */
        .cyber-preloader {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: var(--dark-bg);
            z-index: 9999;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .cyber-preloader.hidden {
            display: none;
        }

        .cyber-loader {
            width: 60px;
            height: 60px;
            border: 3px solid var(--neon-pink);
            border-top-color: var(--neon-cyan);
            animation: spin 0.6s linear infinite;
            clip-path: polygon(20% 0%, 80% 0%, 100% 20%, 100% 80%, 80% 100%, 20% 100%, 0% 80%, 0% 20%);
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        /* Responsive */
        @media (max-width: 768px) {
            .cyber-sidebar {
                transform: translateX(-260px);
            }
            .cyber-main {
                margin-left: 0;
            }
            .cyber-toggle {
                left: 20px;
            }
            .cyber-container {
                padding: 0 16px;
            }
        }
    </style>
</head>
<body>
    <div class="cyber-preloader" id="cyberPreloader">
        <div class="cyber-loader"></div>
    </div>

    <div class="cyber-layout">
        @include('theme7.header')

        <main class="cyber-main" id="cyberMain">
            @yield('content')
        </main>
    </div>

    @include('theme7.footer')

    <button class="cyber-back-top" id="cyberBackTop">
        <i class="fas fa-arrow-up"></i>
    </button>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const preloader = document.getElementById('cyberPreloader');
            if (preloader) {
                setTimeout(() => preloader.classList.add('hidden'), 500);
            }

            const backTop = document.getElementById('cyberBackTop');
            if (backTop) {
                window.addEventListener('scroll', () => {
                    backTop.classList.toggle('visible', window.scrollY > 300);
                });
                backTop.addEventListener('click', () => window.scrollTo({ top: 0, behavior: 'smooth' }));
            }

            const toggle = document.getElementById('cyberToggle');
            const sidebar = document.getElementById('cyberSidebar');
            const main = document.getElementById('cyberMain');

            if (toggle && sidebar && main) {
                toggle.addEventListener('click', () => {
                    sidebar.classList.toggle('collapsed');
                    toggle.classList.toggle('collapsed');
                    main.classList.toggle('full-width');
                });
            }
        });
    </script>

    @stack('theme7-scripts')
</body>
</html>
