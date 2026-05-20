@php
    $routeName = \Request::route()->getName();
    $admin_logo = getSettingsValByName('company_logo');

    $isCustomDomain = isset($is_custom_domain)
        ? $is_custom_domain
        : request()->getHost() !== '13.61.10.174' &&
            request()->getHost() !== 'localhost' &&
            request()->getHost() !== '127.0.0.1';

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

<nav class="theme2-nav" id="theme2-nav">
    <div class="theme2-nav-container">
        <div class="theme2-logo">
            <a href="{{ $homeUrl }}">
                <img src="{{ asset(Storage::url('upload/logo/')) . '/' . (isset($admin_logo) && !empty($admin_logo) ? $admin_logo : 'logo.png') }}"
                     alt="Logo"
                     style="height: 45px; width: auto; transition: transform 0.3s ease;">
            </a>
        </div>
        <ul class="theme2-nav-menu">
            <li><a href="{{ $homeUrl }}"
                    class="{{ in_array($routeName, ['web.page', 'custom.domain.home']) ? 'active' : '' }}">Home</a></li>
            <li><a href="{{ $propertiesUrl }}"
                    class="{{ in_array($routeName, ['property.home', 'property.detail', 'custom.domain.properties', 'custom.domain.property.detail']) ? 'active' : '' }}">Properties</a>
            </li>
            <li><a href="{{ $blogUrl }}"
                    class="{{ in_array($routeName, ['blog.home', 'blog.detail', 'custom.domain.blog', 'custom.domain.blog.detail']) ? 'active' : '' }}">Blog</a>
            </li>
            <li><a href="{{ $contactUrl }}"
                    class="{{ in_array($routeName, ['contact.home', 'custom.domain.contact']) ? 'active' : '' }}">Contact</a>
            </li>
        </ul>
    </div>
</nav>

<script>
    window.addEventListener('scroll', function() {
        const nav = document.getElementById('theme2-nav');
        if (window.scrollY > 50) {
            nav.classList.add('scrolled');
        } else {
            nav.classList.remove('scrolled');
        }
    });
</script>
