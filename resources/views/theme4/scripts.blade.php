<script>








document.addEventListener('DOMContentLoaded', function() {
    const mobileToggle = document.querySelector('.t4-mobile-toggle');
    const mobileMenu = document.querySelector('.t4-mobile-menu');
    const mobileClose = document.querySelector('.t4-mobile-close');

    // Create overlay
    const overlay = document.createElement('div');
    overlay.className = 't4-menu-overlay';
    document.body.appendChild(overlay);

    function openMenu() {
        mobileMenu.classList.add('open');
        overlay.classList.add('active');
        document.body.style.overflow = 'hidden';
    }

    function closeMenu() {
        mobileMenu.classList.remove('open');
        overlay.classList.remove('active');
        document.body.style.overflow = '';
    }

    if (mobileToggle) {
        mobileToggle.addEventListener('click', openMenu);
    }

    if (mobileClose) {
        mobileClose.addEventListener('click', closeMenu);
    }

    overlay.addEventListener('click', closeMenu);

    // Sticky Header on Scroll
    const header = document.querySelector('.t4-header');
    window.addEventListener('scroll', () => {
        if (window.scrollY > 50) {
            header.classList.add('scrolled');
        } else {
            header.classList.remove('scrolled');
        }
    });
});
</script>
