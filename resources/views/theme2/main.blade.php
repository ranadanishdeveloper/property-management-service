@include('theme2.head')

<body class="theme2-body">
    <div class="theme2-wrapper">
        <!-- Preloader -->
        <div class="theme2-preloader">
            <div class="theme2-loader"></div>
        </div>

        <!-- Glass Navigation -->
        @include('theme2.header')

        <!-- Mobile Navigation -->
        @include('theme2.mobile_nav')

        <!-- Main Content -->
        <main class="theme2-main">
            @yield('content')
        </main>

        <!-- Footer -->
        @include('theme2.footer')

        <!-- Back to Top -->
        <button class="theme2-back-to-top">
            <i class="fas fa-arrow-up"></i>
        </button>
    </div>

    @include('theme2.scripts')
</body>
</html>
