<script src="{{ asset('js/jquery.js') }}"></script>
<script src="{{ asset('assets/web/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/web/js/owl.js') }}"></script>
<script src="{{ asset('assets/js/plugins/notifier.js') }}"></script>

<script>
    // Hide preloader
    window.addEventListener('load', function() {
        const preloader = document.querySelector('.theme2-preloader');
        if (preloader) {
            preloader.style.display = 'none';
        }
    });
    
    // Back to top button
    const backToTop = document.querySelector('.theme2-back-to-top');
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
    
    $(document).ready(function() {
        // Initialize Owl Carousel for Amenities
        if ($('.theme2-amenities-slider').length) {
            $('.theme2-amenities-slider').owlCarousel({
                loop: true,
                margin: 30,
                nav: true,
                dots: false,
                responsive: {
                    0: { items: 1 },
                    576: { items: 2 },
                    768: { items: 3 },
                    992: { items: 4 },
                    1200: { items: 5 }
                },
                navText: ['‹', '›']
            });
        }
        
        // Initialize Testimonial Slider
        if ($('.theme2-testimonial-slider').length) {
            $('.theme2-testimonial-slider').owlCarousel({
                loop: true,
                margin: 30,
                nav: true,
                dots: true,
                items: 1,
                autoplay: true,
                autoplayTimeout: 5000,
                navText: ['‹', '›']
            });
        }
        
        // Tab functionality for properties
        $('.theme2-tab-btn').on('click', function() {
            var type = $(this).data('type');
            $('.theme2-property-panel').hide();
            $('#panel-' + type).show();
            $('.theme2-tab-btn').removeClass('active');
            $(this).addClass('active');
        });
        
        // Make sure first panel is visible
        $('.theme2-property-panel').hide();
        $('.theme2-property-panel:first').show();
    });
</script>

<!-- AJAX Search Functionality -->
<script>
    $(document).ready(function() {
        // Country -> State
        $(document).on('change', '#country', function() {
            var country = $(this).val();
            var getStatesUrl = $('#get-states-url').data('url');
            
            $('#state').html('<option>Loading...</option>');
            $('#city').html('<option value="">Select City</option>');
            
            if (country && getStatesUrl) {
                $.ajax({
                    url: getStatesUrl,
                    type: 'GET',
                    data: { country: country },
                    success: function(res) {
                        $('#state').empty().append('<option value="">Select State</option>');
                        $.each(res, function(index, value) {
                            $('#state').append('<option value="' + value + '">' + value + '</option>');
                        });
                    },
                    error: function() {
                        console.log('Failed to load states.');
                    }
                });
            }
        });
        
        // State -> City
        $(document).on('change', '#state', function() {
            var state = $(this).val();
            var getCitiesUrl = $('#get-cities-url').data('url');
            
            $('#city').html('<option>Loading...</option>');
            
            if (state && getCitiesUrl) {
                $.ajax({
                    url: getCitiesUrl,
                    type: 'GET',
                    data: { state: state },
                    success: function(res) {
                        $('#city').empty().append('<option value="">Select City</option>');
                        $.each(res, function(index, value) {
                            $('#city').append('<option value="' + value + '">' + value + '</option>');
                        });
                    },
                    error: function() {
                        console.log('Failed to load cities.');
                    }
                });
            }
        });
        
        // Reset button
        $(document).on('click', '#reset_button', function(e) {
            e.preventDefault();
            let url = $(this).attr('href');
            if (url) {
                $.ajax({
                    url: url,
                    type: 'GET',
                    beforeSend: function() {
                        $('#package-wrapper').html('<div class="text-center py-5">Loading...</div>');
                    },
                    success: function(data) {
                        $('#package-wrapper').html(data);
                        window.history.pushState(null, null, url);
                        $('#country, #state, #city').val('');
                    },
                    error: function() {
                        console.log('Failed to reset.');
                    }
                });
            }
        });
        
        // Pagination via AJAX
        $(document).on('click', '.pagination a', function(e) {
            e.preventDefault();
            let url = $(this).attr('href');
            
            if (url) {
                $.ajax({
                    url: url,
                    type: 'GET',
                    beforeSend: function() {
                        $('#package-wrapper').html('<div class="text-center py-5">Loading...</div>');
                    },
                    success: function(data) {
                        $('#package-wrapper').html(data);
                        window.history.pushState(null, null, url);
                    },
                    error: function() {
                        console.log('Something went wrong.');
                    }
                });
            }
        });
    });
</script>

<script>
    var successImg = '{{ asset("assets/images/notification/ok-48.png") }}';
    var errorImg = '{{ asset("assets/images/notification/high_priority-48.png") }}';
</script>

@stack('theme2-script')
