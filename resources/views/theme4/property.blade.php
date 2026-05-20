@extends('theme4.main')
@section('content')

<style>
/* ============================================
   PROPERTY LISTING - SAME DARK THEME AS INDEX
   Professional Elegant Design with Stunning Animations
============================================ */

:root {
    --primary: #6366f1;
    --primary-dark: #4f46e5;
    --secondary: #a855f7;
    --accent: #f59e0b;
    --pink: #ec4899;
    --cyan: #06b6d4;
    --dark: #0a0a0a;
    --darker: #050505;
    --card: rgba(255, 255, 255, 0.03);
    --border: rgba(255, 255, 255, 0.08);
    --glow: 0 0 30px rgba(99, 102, 241, 0.3);
}

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Inter', sans-serif;
    background: var(--darker);
    color: #fff;
    overflow-x: hidden;
}

.container {
    max-width: 1280px;
    margin: 0 auto;
    padding: 0 24px;
}

/* ========== HERO SECTION - LEFT/RIGHT LAYOUT ========== */
.property-hero-premium {
    position: relative;
    padding: 120px 0 60px;
    margin-bottom: 60px;
    overflow: hidden;
}

.hero-left-right {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 60px;
    align-items: center;
}

.hero-image {
    position: relative;
    border-radius: 30px;
    overflow: hidden;
    animation: fadeInLeft 0.8s ease;
}

.hero-image img {
    width: 100%;
    height: 400px;
    object-fit: cover;
    border-radius: 30px;
    transition: transform 0.5s;
}

.hero-image:hover img {
    transform: scale(1.05);
}

.hero-image-badge {
    position: absolute;
    bottom: 20px;
    left: 20px;
    background: linear-gradient(135deg, #6366f1, #a855f7);
    padding: 12px 20px;
    border-radius: 15px;
    backdrop-filter: blur(10px);
}

.hero-image-badge span {
    font-size: 24px;
    font-weight: 800;
    display: block;
}

.hero-content {
    animation: fadeInRight 0.8s ease;
}

.hero-content h1 {
    font-size: 48px;
    font-weight: 800;
    margin-bottom: 16px;
    background: linear-gradient(135deg, #fff, #a855f7, #6366f1);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}

.hero-content p {
    font-size: 18px;
    color: #94a3b8;
    margin-bottom: 30px;
    line-height: 1.6;
}

/* ========== SEARCH FORM ========== */
.search-form-premium {
    background: rgba(15, 23, 42, 0.95);
    backdrop-filter: blur(20px);
    border-radius: 24px;
    padding: 30px;
    border: 1px solid rgba(255, 255, 255, 0.1);
    margin-top: 20px;
}

.search-form-premium .form-group {
    margin-bottom: 20px;
}

.search-form-premium label {
    font-size: 13px;
    font-weight: 500;
    margin-bottom: 8px;
    color: #cbd5e1;
    display: block;
}

.search-form-premium label i {
    margin-right: 6px;
    color: #6366f1;
}

.search-form-premium select {
    width: 100%;
    padding: 12px 16px;
    background: rgba(255, 255, 255, 0.08);
    border: 1px solid rgba(255, 255, 255, 0.15);
    border-radius: 12px;
    color: white;
    font-size: 14px;
    transition: all 0.3s;
    cursor: pointer;
}

.search-form-premium select:hover {
    background: rgba(255, 255, 255, 0.12);
    border-color: rgba(99, 102, 241, 0.5);
}

.search-form-premium select:focus {
    outline: none;
    border-color: #6366f1;
    background: rgba(99, 102, 241, 0.1);
    box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.2);
}

.search-form-premium select option {
    background: #0f172a;
    color: white;
}

/* ========== BUTTONS - SAME AS INDEX ========== */
.btn-search-premium {
    background: linear-gradient(135deg, #6366f1, #a855f7);
    color: white;
    border: none;
    padding: 14px 28px;
    border-radius: 12px;
    font-weight: 600;
    width: 100%;
    transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    position: relative;
    overflow: hidden;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
}

.btn-search-premium::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
    transition: left 0.5s;
}

.btn-search-premium:hover::before {
    left: 100%;
}

.btn-search-premium:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 30px rgba(99, 102, 241, 0.4);
}

.btn-reset-premium {
    background: rgba(255, 255, 255, 0.08);
    color: white;
    border: 1px solid rgba(255, 255, 255, 0.15);
    padding: 14px 20px;
    border-radius: 12px;
    font-weight: 600;
    width: 100%;
    transition: all 0.3s;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    text-decoration: none;
}

.btn-reset-premium:hover {
    background: rgba(99, 102, 241, 0.2);
    border-color: #6366f1;
    transform: translateY(-2px);
    color: white;
}

.button-group {
    display: flex;
    gap: 12px;
    margin-top: 10px;
}

/* ========== SECTION TITLE ========== */
.section-title-premium {
    text-align: center;
    margin-bottom: 50px;
}

.section-title-premium h2 {
    font-size: 36px;
    font-weight: 700;
    margin-bottom: 12px;
    background: linear-gradient(135deg, #fff, #a855f7);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}

.section-title-premium p {
    color: #94a3b8;
    font-size: 16px;
}

/* ========== PROPERTY GRID - SAME AS INDEX ========== */
.properties-premium-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 30px;
    margin: 40px 0;
}

.property-premium-card {
    background: linear-gradient(135deg, rgba(255,255,255,0.03), rgba(255,255,255,0.01));
    border: 1px solid rgba(255, 255, 255, 0.05);
    border-radius: 24px;
    overflow: hidden;
    transition: all 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
}

.property-premium-card:hover {
    transform: translateY(-12px);
    border-color: rgba(99, 102, 241, 0.4);
    box-shadow: var(--glow);
}

.property-premium-image {
    position: relative;
    height: 240px;
    overflow: hidden;
}

.property-premium-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.7s;
}

.property-premium-card:hover .property-premium-image img {
    transform: scale(1.1);
}

.property-premium-badge {
    position: absolute;
    top: 16px;
    right: 16px;
    background: linear-gradient(135deg, #6366f1, #a855f7);
    padding: 6px 14px;
    border-radius: 20px;
    font-size: 11px;
    font-weight: 600;
    text-transform: uppercase;
}

.property-premium-overlay {
    position: absolute;
    inset: 0;
    background: rgba(0, 0, 0, 0.6);
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: opacity 0.3s;
}

.property-premium-card:hover .property-premium-overlay {
    opacity: 1;
}

.property-premium-view {
    width: 55px;
    height: 55px;
    background: white;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #6366f1;
    font-size: 20px;
    transition: all 0.3s;
}

.property-premium-view:hover {
    transform: scale(1.1);
    background: #6366f1;
    color: white;
}

.property-premium-info {
    padding: 22px;
}

.property-premium-info h3 {
    font-size: 18px;
    margin-bottom: 8px;
}

.property-premium-info h3 a {
    color: white;
    text-decoration: none;
    transition: color 0.3s;
}

.property-premium-info h3 a:hover {
    color: #6366f1;
}

.property-premium-info p {
    color: #94a3b8;
    font-size: 13px;
    margin-bottom: 15px;
}

.property-premium-meta {
    display: flex;
    gap: 16px;
    margin: 12px 0;
    font-size: 12px;
    color: #94a3b8;
}

.property-premium-footer {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-top: 15px;
    padding-top: 15px;
    border-top: 1px solid rgba(255, 255, 255, 0.1);
}

.property-premium-price {
    font-size: 22px;
    font-weight: 700;
    color: #a855f7;
}

.property-premium-link {
    width: 40px;
    height: 40px;
    background: rgba(99, 102, 241, 0.2);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    transition: all 0.3s;
}

.property-premium-link:hover {
    background: #6366f1;
    transform: translateX(6px);
}

/* ========== PAGINATION ========== */
.pagination-premium {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 10px;
    margin: 50px 0 30px;
    flex-wrap: wrap;
    list-style: none;
    padding: 0;
}

.pagination-premium .page-item {
    list-style: none;
}

.pagination-premium .page-link {
    display: flex;
    align-items: center;
    justify-content: center;
    min-width: 42px;
    height: 42px;
    padding: 0 14px;
    background: rgba(255, 255, 255, 0.05);
    border: 1px solid rgba(255, 255, 255, 0.1);
    border-radius: 12px;
    color: white;
    text-decoration: none;
    transition: all 0.3s;
    font-size: 14px;
    font-weight: 500;
}

.pagination-premium .page-link:hover {
    background: rgba(99, 102, 241, 0.3);
    border-color: #6366f1;
    transform: translateY(-3px);
}

.pagination-premium .active .page-link {
    background: linear-gradient(135deg, #6366f1, #a855f7);
    border-color: transparent;
    box-shadow: 0 5px 20px rgba(99, 102, 241, 0.3);
}

.pagination-premium .disabled .page-link {
    opacity: 0.4;
    cursor: not-allowed;
    transform: none;
}

.pagination-info {
    text-align: center;
    color: #94a3b8;
    font-size: 14px;
    margin-top: 20px;
    padding-bottom: 20px;
}

/* ========== EMPTY STATE ========== */
.empty-state-premium {
    text-align: center;
    padding: 60px;
    background: rgba(255, 255, 255, 0.03);
    border-radius: 24px;
    grid-column: 1 / -1;
}

.empty-state-premium i {
    font-size: 60px;
    color: #6366f1;
    margin-bottom: 20px;
    opacity: 0.5;
}

.empty-state-premium h3 {
    font-size: 24px;
    margin-bottom: 10px;
}

.empty-state-premium p {
    color: #94a3b8;
}

/* ========== ANIMATIONS ========== */
@keyframes fadeInLeft {
    from {
        opacity: 0;
        transform: translateX(-40px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

@keyframes fadeInRight {
    from {
        opacity: 0;
        transform: translateX(40px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

/* ========== RESPONSIVE ========== */
@media (max-width: 1024px) {
    .properties-premium-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 992px) {
    .hero-left-right {
        grid-template-columns: 1fr;
        gap: 40px;
    }

    .hero-content h1 {
        font-size: 36px;
        text-align: center;
    }

    .hero-content p {
        text-align: center;
    }

    .hero-image img {
        height: 300px;
    }
}

@media (max-width: 768px) {
    .property-hero-premium {
        padding: 100px 0 40px;
    }

    .hero-content h1 {
        font-size: 28px;
    }

    .hero-content p {
        font-size: 14px;
    }

    .hero-image img {
        height: 220px;
    }

    .button-group {
        flex-direction: column;
    }

    .properties-premium-grid {
        grid-template-columns: 1fr;
    }

    .section-title-premium h2 {
        font-size: 28px;
    }
}
</style>

<!-- ========== HERO SECTION - LEFT/RIGHT LAYOUT ========== -->
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

    $userId = $user->id;
    $countries = \App\Models\Property::where('parent_id', $userId)->distinct()->pluck('country');
@endphp

@if (empty($Section_3_content_value['section_enabled']) || $Section_3_content_value['section_enabled'] == 'active')
<section class="property-hero-premium">
    <div class="container">
        <div class="hero-left-right">
            <!-- Left Side - Image -->
            <div class="hero-image">
                <img src="{{ asset(Storage::url($Section_3_content_value['sec3_banner_image_path'] ?? '')) }}" alt="Property Search">
                <div class="hero-image-badge">
                    <span>500+</span>
                    <small>Properties Available</small>
                </div>
            </div>

            <!-- Right Side - Content & Search -->
            <div class="hero-content">
                <h1>{{ $Section_3_content_value['sec3_title'] ?? 'Find Your Perfect Property' }}</h1>
                <p>{{ $Section_3_content_value['sec3_sub_title'] ?? 'Discover luxury homes, apartments, and commercial spaces tailored to your needs' }}</p>

                <!-- Search Form -->
                <div class="search-form-premium">
                    @if ($isCustomDomain)
                        {{ Form::open(['route' => 'search.filter', 'method' => 'GET', 'id' => 'package_filter']) }}
                    @else
                        {{ Form::open(['route' => ['search.filter', 'code' => $user->code], 'method' => 'GET', 'id' => 'package_filter']) }}
                    @endif
                    <div class="row g-3">
                        <div class="col-12">
                            <div class="form-group">
                                <label><i class="fas fa-globe"></i> {{ __('Country') }}</label>
                                <select class="form-select" name="country" id="country">
                                    <option value="">{{ __('All Countries') }}</option>
                                    @foreach ($countries as $country)
                                        <option value="{{ $country }}">{{ $country }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label><i class="fas fa-map-marker-alt"></i> {{ __('State') }}</label>
                                <select class="form-select" name="state" id="state">
                                    <option value="">{{ __('Select State First') }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label><i class="fas fa-city"></i> {{ __('City') }}</label>
                                <select class="form-select" name="city" id="city">
                                    <option value="">{{ __('Select City First') }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="button-group">
                                <button type="submit" class="btn-search-premium" id="search_button">
                                    <i class="fas fa-search"></i> {{ __('Search Properties') }}
                                </button>
                                <a href="{{ $isCustomDomain ? route('search.filter') : route('search.filter', ['code' => $user->code]) }}"
                                   class="btn-reset-premium" id="reset_button">
                                    <i class="fas fa-sync-alt"></i> {{ __('Reset') }}
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

<!-- ========== PROPERTIES SECTION ========== -->
<section class="properties-section-premium" style="padding: 60px 0;">
    <div class="container">
        <div class="section-title-premium">
            <h2>{{ __('Featured Properties') }}</h2>
            <p>{{ __('Discover our curated collection of premium properties') }}</p>
        </div>
        <div id="package-wrapper">
            @include('theme4.propertybox')
        </div>
    </div>
</section>

@endsection

@push('theme4-script')
<script>
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
            error: function() { alert('Failed to load states.'); }
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
            error: function() { alert('Failed to load cities.'); }
        });
    });

    // Pagination via AJAX
    $(document).on('click', '.pagination-premium .page-link', function(e) {
        e.preventDefault();
        let url = $(this).attr('href');

        $.ajax({
            url: url,
            type: 'GET',
            beforeSend: function() {
                $('#package-wrapper').html('<div class="text-center py-5"><i class="fas fa-spinner fa-spin fa-2x"></i><p class="mt-3">Loading properties...</p></div>');
            },
            success: function(data) {
                $('#package-wrapper').html(data);
                window.history.pushState(null, null, url);
                $('html, body').animate({ scrollTop: $('#package-wrapper').offset().top - 100 }, 500);
            },
            error: function() { alert('Something went wrong.'); }
        });
    });

    // Reset button
    $('#reset_button').on('click', function(e) {
        e.preventDefault();
        let url = $(this).attr('href');
        $.ajax({
            url: url,
            type: 'GET',
            beforeSend: function() {
                $('#package-wrapper').html('<div class="text-center py-5"><i class="fas fa-spinner fa-spin fa-2x"></i><p class="mt-3">Loading properties...</p></div>');
            },
            success: function(data) {
                $('#package-wrapper').html(data);
                window.history.pushState(null, null, url);
                $('#country, #state, #city').val('');
            },
            error: function() { alert('Failed to reset.'); }
        });
    });
});
</script>
@endpush
