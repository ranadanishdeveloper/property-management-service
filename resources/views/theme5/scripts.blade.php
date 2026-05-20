<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('theme5/js/script.js') }}"></script>

@stack('theme5-script')

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Preloader
        const preloader = document.querySelector('.theme5-preloader');
        if (preloader) {
            setTimeout(function() {
                preloader.classList.add('fade-out');
                setTimeout(function() {
                    preloader.style.display = 'none';
                }, 500);
            }, 800);
        }

        // Back to Top Button
        const backToTop = document.querySelector('.theme5-back-to-top');
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

        // Add neon glow effect on hover for cards
        const cards = document.querySelectorAll('.hex-card, .amenity-masonry-card, .property-scroll-card, .testimonial-neon-card');
        cards.forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transition = 'all 0.3s ease';
            });
        });
    });
</script>
