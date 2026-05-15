@extends('theme3.main')
@section('content')

@php
    $Section_3 = App\Models\Additional::where('section', 'Section 3')->where('parent_id', $user->id)->first();
    $Section_3_content_value = !empty($Section_3->content_value)
        ? json_decode($Section_3->content_value, true)
        : [];

    $isCustomDomain = isset($is_custom_domain)
        ? $is_custom_domain
        : request()->getHost() !== '13.61.10.174' &&
            request()->getHost() !== 'localhost' &&
            request()->getHost() !== '127.0.0.1';

    if ($isCustomDomain) {
        $getStatesRoute = route('get-states');
        $getCitiesRoute = route('get-cities');
    } else {
        $getStatesRoute = route('get-states', $user->code);
        $getCitiesRoute = route('get-cities', $user->code);
    }
@endphp

@if (empty($Section_3_content_value['section_enabled']) || $Section_3_content_value['section_enabled'] == 'active')
    @php
        $userId = $user->id;
        $countries = \App\Models\Property::where('parent_id', $userId)->distinct()->pluck('country');
    @endphp

    <section class="theme3-breadcumb-section">
        <div class="theme3-cta-banner"
            style="background-image: url('{{ asset(Storage::url($Section_3_content_value['sec3_banner_image_path'])) }}'); background-position: center; background-size: cover;">
            <div class="theme3-banner-overlay"></div>
            <div class="theme3-container">
                <div class="theme3-banner-content">
                    <div class="theme3-banner-text">
                        <h2 class="theme3-banner-title">{{ $Section_3_content_value['sec3_title'] }}</h2>
                        <p class="theme3-banner-subtitle">{{ $Section_3_content_value['sec3_sub_title'] }}</p>

                        @if ($isCustomDomain)
                            {{ Form::open(['route' => 'search.filter', 'method' => 'GET', 'id' => 'package_filter']) }}
                        @else
                            {{ Form::open(['route' => ['search.filter', 'code' => $user->code], 'method' => 'GET', 'id' => 'package_filter']) }}
                        @endif

                        <div class="theme3-search-box">
                            <div class="theme3-search-row">
                                <!-- Country Dropdown -->
                                <div class="theme3-search-group">
                                    <label class="theme3-search-label">{{ __('Select Country') }}</label>
                                    <select class="theme3-search-select" name="country" id="country">
                                        <option value="">{{ __('Select Country') }}</option>
                                        @foreach ($countries as $country)
                                            <option value="{{ $country }}">{{ $country }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- State Dropdown -->
                                <div class="theme3-search-group">
                                    <label class="theme3-search-label">{{ __('Select State') }}</label>
                                    <select class="theme3-search-select" name="state" id="state">
                                        <option value="">{{ __('Select State') }}</option>
                                    </select>
                                </div>

                                <!-- City Dropdown -->
                                <div class="theme3-search-group">
                                    <label class="theme3-search-label">{{ __('Select City') }}</label>
                                    <select class="theme3-search-select" name="city" id="city">
                                        <option value="">{{ __('Select City') }}</option>
                                    </select>
                                </div>

                                <!-- Search Button -->
                                <div class="theme3-search-group">
                                    <label class="theme3-search-label">&nbsp;</label>
                                    <button type="submit" class="theme3-search-btn" id="search_button">
                                        <i class="fas fa-search me-1"></i> {{ __('Search') }}
                                    </button>
                                </div>

                                <!-- Reset Button -->
                                <div class="theme3-search-group">
                                    <label class="theme3-search-label">&nbsp;</label>
                                    <a href="{{ $isCustomDomain ? route('search.filter') : route('search.filter', ['code' => $user->code]) }}"
                                        class="theme3-reset-btn" id="reset_button">
                                        <i class="fas fa-rotate-left me-1"></i> {{ __('Reset') }}
                                    </a>
                                </div>
                            </div>
                        </div>

                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif

<!-- Properties Section -->
<section class="theme3-properties-list">
    <div class="theme3-container">
        <div class="theme3-section-header text-center">
            <h3 class="theme3-section-title">{{ __('Find Your Perfect Property') }}</h3>
        </div>
        <div id="package-wrapper">
            @include('theme3.propertybox')
        </div>
    </div>
</section>

<!-- Hidden inputs for AJAX -->
<input type="hidden" id="get-states-url" data-url="{{ $getStatesRoute }}">
<input type="hidden" id="get-cities-url" data-url="{{ $getCitiesRoute }}">

@endsection

@push('theme3-script')
<script>
    $(document).ready(function() {
        // Pagination via AJAX
        $(document).on('click', '.theme3-pagination-list .page-link', function(e) {
            e.preventDefault();
            let url = $(this).attr('href');

            $.ajax({
                url: url,
                type: 'GET',
                beforeSend: function() {
                    $('#package-wrapper').html('<div class="theme3-loading"><div class="loader"></div><p>Loading properties...</p></div>');
                },
                success: function(data) {
                    $('#package-wrapper').html(data);
                    window.history.pushState(null, null, url);
                },
                error: function() {
                    alert('Something went wrong.');
                }
            });
        });
    });

    $(document).ready(function() {
        // Country -> State
        $('#country').on('change', function() {
            var country = $(this).val();
            $('#state').html('<option>Loading...</option>');
            $('#city').html('<option value="">Select City</option>');

            $.ajax({
                url: "{{ $getStatesRoute }}",
                type: 'GET',
                data: { country: country },
                success: function(res) {
                    $('#state').empty().append('<option value="">Select State</option>');
                    $.each(res, function(index, value) {
                        $('#state').append('<option value="' + value + '">' + value + '</option>');
                    });
                },
                error: function() {
                    alert('Failed to load states.');
                }
            });
        });

        // State -> City
        $('#state').on('change', function() {
            var state = $(this).val();
            $('#city').html('<option>Loading...</option>');

            $.ajax({
                url: "{{ $getCitiesRoute }}",
                type: 'GET',
                data: { state: state },
                success: function(res) {
                    $('#city').empty().append('<option value="">Select City</option>');
                    $.each(res, function(index, value) {
                        $('#city').append('<option value="' + value + '">' + value + '</option>');
                    });
                },
                error: function() {
                    alert('Failed to load cities.');
                }
            });
        });

        $('#reset_button').on('click', function(e) {
            e.preventDefault();
            let url = $(this).attr('href');
            $.ajax({
                url: url,
                type: 'GET',
                beforeSend: function() {
                    $('#package-wrapper').html('<div class="theme3-loading"><div class="loader"></div><p>Loading properties...</p></div>');
                },
                success: function(data) {
                    $('#package-wrapper').html(data);
                    window.history.pushState(null, null, url);
                    $('#country, #state, #city').val('');
                },
                error: function() {
                    alert('Failed to reset.');
                }
            });
        });
    });
</script>
@endpush
