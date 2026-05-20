@include('theme4.head')

<body class="theme4-body">
    <div class="theme4-wrapper">
        <!-- Preloader -->
        <div class="theme4-preloader">
            <div class="theme4-loader"></div>
        </div>

        <!-- Main Navigation -->
        @include('theme4.header')

        <!-- Mobile Navigation -->
        @include('theme4.mobile_nav')

        <!-- Main Content -->
        <main class="theme4-main">
            @yield('content')
        </main>

        <!-- Footer -->
        @include('theme4.footer')

        <!-- Back to Top -->
        <button class="theme4-back-to-top">
            <i class="fas fa-arrow-up"></i>
        </button>
    </div>

    @include('theme4.scripts')
</body>
</html>
