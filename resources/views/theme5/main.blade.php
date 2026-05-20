@include('theme5.head')

<body class="theme5-body">
    <div class="theme5-wrapper">
        <!-- Preloader -->
        <div class="theme5-preloader">
            <div class="theme5-loader"></div>
        </div>

        <!-- Main Navigation -->
        @include('theme5.header')

        <!-- Mobile Navigation -->
        @include('theme5.mobile_nav')

        <!-- Main Content -->
        <main class="theme5-main">
            @yield('content')
        </main>

        <!-- Footer -->
        @include('theme5.footer')

        <!-- Back to Top -->
        <button class="theme5-back-to-top">
            <i class="fas fa-arrow-up"></i>
        </button>
    </div>

    @include('theme5.scripts')
</body>
</html>
