@include('theme3.head')

<body class="theme3-body">
    <div class="theme3-wrapper">
        @include('theme3.header')
        
        <main class="theme3-main">
            @yield('content')
        </main>
        
        @include('theme3.footer')
    </div>
    
    @include('theme3.scripts')
</body>
</html>
