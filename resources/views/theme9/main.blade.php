<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $settings['app_name'] ?? 'PropManage' }} | {{ $page_title ?? 'Home' }}</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,300;14..32,400;14..32,500;14..32,600;14..32,700;14..32,800&family=Playfair+Display:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: #f5f5f0;
            color: #1a1a1a;
            overflow-x: hidden;
        }

        h1, h2, h3 {
            font-family: 'Playfair Display', serif;
            font-weight: 700;
        }

        /* ========== MASTER ANIMATION KEYFRAMES ========== */
        @keyframes fadeInUp {
            0% {
                opacity: 0;
                transform: translateY(50px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeInLeft {
            0% {
                opacity: 0;
                transform: translateX(-50px);
            }
            100% {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes fadeInRight {
            0% {
                opacity: 0;
                transform: translateX(50px);
            }
            100% {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes scaleIn {
            0% {
                opacity: 0;
                transform: scale(0.9);
            }
            100% {
                opacity: 1;
                transform: scale(1);
            }
        }

        @keyframes slideInDown {
            0% {
                opacity: 0;
                transform: translateY(-50px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes zoomIn {
            0% {
                opacity: 0;
                transform: scale(0.7);
            }
            100% {
                opacity: 1;
                transform: scale(1);
            }
        }

        @keyframes rotateIn {
            0% {
                opacity: 0;
                transform: rotate(-10deg) scale(0.9);
            }
            100% {
                opacity: 1;
                transform: rotate(0) scale(1);
            }
        }

        @keyframes blinkGold {
            0%, 100% { border-color: #d4af37; }
            50% { border-color: transparent; }
        }

        /* Animation Classes */
        .animate-fade-up {
            animation: fadeInUp 0.8s cubic-bezier(0.2, 0.9, 0.4, 1.1) forwards;
            opacity: 0;
        }

        .animate-fade-left {
            animation: fadeInLeft 0.8s cubic-bezier(0.2, 0.9, 0.4, 1.1) forwards;
            opacity: 0;
        }

        .animate-fade-right {
            animation: fadeInRight 0.8s cubic-bezier(0.2, 0.9, 0.4, 1.1) forwards;
            opacity: 0;
        }

        .animate-scale {
            animation: scaleIn 0.8s cubic-bezier(0.2, 0.9, 0.4, 1.1) forwards;
            opacity: 0;
        }

        .animate-slide-down {
            animation: slideInDown 0.8s cubic-bezier(0.2, 0.9, 0.4, 1.1) forwards;
            opacity: 0;
        }

        .animate-zoom {
            animation: zoomIn 0.8s cubic-bezier(0.2, 0.9, 0.4, 1.1) forwards;
            opacity: 0;
        }

        .animate-rotate {
            animation: rotateIn 0.8s cubic-bezier(0.2, 0.9, 0.4, 1.1) forwards;
            opacity: 0;
        }

        /* Animation Delays */
        .delay-100 { animation-delay: 0.1s; }
        .delay-200 { animation-delay: 0.2s; }
        .delay-300 { animation-delay: 0.3s; }
        .delay-400 { animation-delay: 0.4s; }
        .delay-500 { animation-delay: 0.5s; }
        .delay-600 { animation-delay: 0.6s; }
        .delay-700 { animation-delay: 0.7s; }
        .delay-800 { animation-delay: 0.8s; }

        /* ========== CONTAINER ========== */
        .container {
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 24px;
            width: 100%;
        }

        /* ========== PRELOADER ========== */
        .preloader {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: #f5f5f0;
            z-index: 9999;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .preloader.hidden {
            display: none;
        }

        .loader {
            width: 60px;
            height: 60px;
            border: 3px solid #e0e0d8;
            border-top-color: #d4af37;
            border-radius: 50%;
            animation: spin 0.6s linear infinite;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        /* ========== BACK TO TOP ========== */
        .back-top {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 48px;
            height: 48px;
            background: #d4af37;
            border: none;
            cursor: pointer;
            z-index: 99;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s;
            clip-path: polygon(0% 0%, 100% 0%, 100% 80%, 50% 100%, 0% 80%);
        }

        .back-top.visible {
            opacity: 1;
            visibility: visible;
        }

        .back-top:hover {
            background: #b8941e;
            transform: translateY(-3px);
        }

        /* ========== RESPONSIVE ========== */
        @media (max-width: 768px) {
            .container {
                padding: 0 20px;
            }
        }
    </style>
</head>
<body>
    <div class="preloader" id="preloader">
        <div class="loader"></div>
    </div>

    @include('theme9.header')

    <main>
        @yield('content')
    </main>

    @include('theme9.footer')

    <button class="back-top" id="backTop">
        <i class="fas fa-arrow-up"></i>
    </button>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Preloader
            const preloader = document.getElementById('preloader');
            if (preloader) {
                setTimeout(() => preloader.classList.add('hidden'), 800);
            }

            // Back to top
            const backTop = document.getElementById('backTop');
            if (backTop) {
                window.addEventListener('scroll', () => {
                    backTop.classList.toggle('visible', window.scrollY > 300);
                });
                backTop.addEventListener('click', () => window.scrollTo({ top: 0, behavior: 'smooth' }));
            }
        });
    </script>

    @stack('theme9-scripts')
</body>
</html>
