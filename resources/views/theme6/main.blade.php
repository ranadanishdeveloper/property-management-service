@include('theme6.head')

<body class="theme6-body">
    <div class="theme6-wrapper">
        <!-- Preloader -->
        <div class="theme6-preloader">
            <div class="theme6-loader"></div>
        </div>

        <!-- Main Navigation -->
        @include('theme6.header')

        <!-- Mobile Navigation -->
        @include('theme6.mobile_nav')

        <!-- Main Content -->
        <main class="theme6-main">
            @yield('content')
        </main>

        <!-- Footer -->
        @include('theme6.footer')

        <!-- Back to Top -->
        <button class="theme6-back-to-top">
            <i class="fas fa-arrow-up"></i>
        </button>
    </div>

    @include('theme6.scripts')
</body>
</html>