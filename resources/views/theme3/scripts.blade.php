<script src="{{ asset('js/jquery.js') }}"></script>
<script src="{{ asset('assets/web/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/web/js/owl.js') }}"></script>
<script src="{{ asset('assets/js/plugins/notifier.js') }}"></script>

<script>
    $(document).ready(function() {
        // Initialize Owl Carousel for Amenities
        if ($('.theme3-amenities-slider').length) {
            $('.theme3-amenities-slider').owlCarousel({
                loop: true,
                margin: 20,
                nav: true,
                dots: false,
                responsive: {
                    0: { items: 1 },
                    576: { items: 2 },
                    768: { items: 3 },
                    992: { items: 4 }
                },
                navText: ['‹', '›']
            });
        }
        
        // Initialize Testimonial Slider
        if ($('.theme3-testimonial-slider').length) {
            $('.theme3-testimonial-slider').owlCarousel({
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
        $('.theme3-tab-btn').on('click', function() {
            var type = $(this).data('type');
            $('[id^="theme3-type-"]').hide();
            $('#theme3-type-' + type).show();
            $('.theme3-tab-btn').removeClass('active');
            $(this).addClass('active');
        });
        
        // Make sure first property list is visible
        $('[id^="theme3-type-"]').hide();
        $('[id^="theme3-type-"]:first').show();
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

@stack('theme3-script')
