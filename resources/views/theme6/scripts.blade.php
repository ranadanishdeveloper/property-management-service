<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('assets/web/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/web/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/web/js/owl.js') }}"></script>
<script src="{{ asset('assets/js/plugins/feather.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/notifier.js') }}"></script>

@stack('theme6-script')

<script>
    // Preloader
    window.addEventListener('load', function() {
        const preloader = document.querySelector('.theme6-preloader');
        if (preloader) {
            setTimeout(function() {
                preloader.classList.add('fade-out');
                setTimeout(function() {
                    preloader.style.display = 'none';
                }, 500);
            }, 800);
        }
    });

    // Back to Top Button
    const backToTop = document.querySelector('.theme6-back-to-top');
    if (backToTop) {
        window.addEventListener('scroll', function() {
            if (window.scrollY > 300) {
                backToTop.classList.add('show');
            } else {
                backToTop.classList.remove('show');
            }
        });

        backToTop.addEventListener('click', function() {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    }

    // Header scroll effect
    const header = document.querySelector('.theme6-header');
    if (header) {
        window.addEventListener('scroll', function() {
            if (window.scrollY > 50) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
        });
    }

    // Mobile menu toggle (handled in mobile_nav)
    const toggleBtn = document.querySelector('.theme6-mobile-toggle');
    const mobileMenu = document.querySelector('.theme6-mobile-menu');
    const closeBtn = document.querySelector('.theme6-mobile-close');
    const overlay = document.querySelector('.theme6-mobile-overlay');

    if (toggleBtn && mobileMenu && closeBtn && overlay) {
        toggleBtn.addEventListener('click', function() {
            mobileMenu.classList.add('open');
            overlay.classList.add('active');
            document.body.style.overflow = 'hidden';
        });

        closeBtn.addEventListener('click', function() {
            mobileMenu.classList.remove('open');
            overlay.classList.remove('active');
            document.body.style.overflow = '';
        });

        overlay.addEventListener('click', function() {
            mobileMenu.classList.remove('open');
            overlay.classList.remove('active');
            document.body.style.overflow = '';
        });
    }

    // Smooth scroll for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({ behavior: 'smooth' });
            }
        });
    });
</script>

<script>
    var successImg = '{{ asset("assets/images/notification/ok-48.png") }}';
    var errorImg = '{{ asset("assets/images/notification/high_priority-48.png") }}';
</script>
<script src="{{ asset('js/custom.js') }}"></script>

@if ($statusMessage = Session::get('success'))
    <script>
        notifier.show('Success!', '{!! $statusMessage !!}', 'success', successImg, 4000);
    </script>
@endif
@if ($statusMessage = Session::get('error'))
    <script>
        notifier.show('Error!', '{!! $statusMessage !!}', 'error', errorImg, 4000);
    </script>
@endif