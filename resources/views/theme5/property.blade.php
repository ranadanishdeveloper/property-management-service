@extends('theme5.main')
@section('content')

<style>
/* ============================================
   THEME 5 - PROPERTY LISTING PAGE
   Light & Airy Design Matching Index
============================================ */

:root {
    --primary: #3b82f6;
    --primary-dark: #2563eb;
    --primary-light: #eff6ff;
    --text-dark: #0f172a;
    --text-gray: #475569;
    --text-light: #64748b;
    --bg-white: #ffffff;
    --bg-light: #f8fafc;
    --border: #e2e8f0;
    --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
    --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
    --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.05);
}

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Inter', sans-serif;
    background: var(--bg-white);
    color: var(--text-dark);
}

.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 24px;
}

/* ========== HERO SECTION ========== */
.property-hero {
    padding: 100px 0 60px;
    background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 100%);
}

.hero-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 60px;
    align-items: center;
}

.hero-image {
    position: relative;
    border-radius: 24px;
    overflow: hidden;
    box-shadow: var(--shadow-lg);
}

.hero-image img {
    width: 100%;
    height: 350px;
    object-fit: cover;
    transition: transform 0.5s;
}

.hero-image:hover img {
    transform: scale(1.03);
}

.hero-badge {
    position: absolute;
    bottom: 20px;
    left: 20px;
    background: white;
    padding: 12px 20px;
    border-radius: 16px;
    box-shadow: var(--shadow-md);
}

.hero-badge span {
    font-size: 24px;
    font-weight: 800;
    color: var(--primary);
    display: block;
}

.hero-badge small {
    font-size: 12px;
    color: var(--text-light);
}

.hero-content h1 {
    font-size: 42px;
    font-weight: 800;
    margin-bottom: 16px;
    color: var(--text-dark);
}

.hero-content h1 span {
    color: var(--primary);
}

.hero-content p {
    font-size: 16px;
    color: var(--text-gray);
    margin-bottom: 30px;
    line-height: 1.6;
}

/* ========== SEARCH FORM ========== */
.search-card {
    background: white;
    border-radius: 20px;
    padding: 24px;
    box-shadow: var(--shadow-lg);
    border: 1px solid var(--border);
}

.form-group {
    margin-bottom: 16px;
}

.form-group label {
    font-size: 13px;
    font-weight: 500;
    margin-bottom: 6px;
    color: var(--text-dark);
    display: block;
}

.form-group label i {
    margin-right: 6px;
    color: var(--primary);
}

.form-group select {
    width: 100%;
    padding: 10px 14px;
    background: var(--bg-light);
    border: 1px solid var(--border);
    border-radius: 10px;
    color: var(--text-dark);
    font-size: 14px;
    transition: all 0.2s;
    cursor: pointer;
}

.form-group select:focus {
    outline: none;
    border-color: var(--primary);
    box-shadow: 0 0 0 3px rgba(59,130,246,0.1);
}

.btn-search {
    background: var(--primary);
    color: white;
    border: none;
    padding: 12px 20px;
    border-radius: 10px;
    font-weight: 600;
    width: 100%;
    transition: all 0.2s;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
}

.btn-search:hover {
    background: var(--primary-dark);
    transform: translateY(-2px);
}

.btn-reset {
    background: white;
    color: var(--text-dark);
    border: 1px solid var(--border);
    padding: 12px 20px;
    border-radius: 10px;
    font-weight: 600;
    width: 100%;
    transition: all 0.2s;
    text-decoration: none;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
}

.btn-reset:hover {
    border-color: var(--primary);
    color: var(--primary);
    transform: translateY(-2px);
}

.button-group {
    display: flex;
    gap: 12px;
    margin-top: 8px;
}

/* ========== SECTION TITLE ========== */
.section-title {
    text-align: center;
    margin-bottom: 40px;
}

.section-title .sub {
    font-size: 12px;
    color: var(--primary);
    text-transform: uppercase;
    letter-spacing: 2px;
    margin-bottom: 8px;
}

.section-title h2 {
    font-size: 32px;
    font-weight: 700;
    color: var(--text-dark);
}

/* ========== PROPERTY GRID ========== */
.properties-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 30px;
    margin: 40px 0;
}

.property-card {
    background: white;
    border: 1px solid var(--border);
    border-radius: 20px;
    overflow: hidden;
    transition: all 0.3s;
}

.property-card:hover {
    transform: translateY(-5px);
    box-shadow: var(--shadow-lg);
    border-color: var(--primary);
}

.property-image {
    position: relative;
    height: 200px;
    overflow: hidden;
    background: var(--bg-light);
}

.property-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.4s;
}

.property-card:hover .property-image img {
    transform: scale(1.05);
}

.property-badge {
    position: absolute;
    top: 12px;
    right: 12px;
    background: var(--primary);
    color: white;
    padding: 4px 12px;
    border-radius: 20px;
    font-size: 11px;
    font-weight: 600;
}

.property-overlay {
    position: absolute;
    inset: 0;
    background: rgba(0, 0, 0, 0.4);
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: opacity 0.3s;
}

.property-card:hover .property-overlay {
    opacity: 1;
}

.property-view {
    width: 45px;
    height: 45px;
    background: white;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--primary);
    transition: all 0.3s;
}

.property-view:hover {
    background: var(--primary);
    color: white;
    transform: scale(1.1);
}

.property-info {
    padding: 18px;
}

.property-type {
    display: inline-block;
    background: var(--primary-light);
    color: var(--primary);
    padding: 4px 12px;
    border-radius: 20px;
    font-size: 11px;
    font-weight: 600;
    margin-bottom: 10px;
}

.property-info h3 {
    font-size: 18px;
    margin-bottom: 8px;
}

.property-info h3 a {
    color: var(--text-dark);
    text-decoration: none;
    transition: color 0.2s;
}

.property-info h3 a:hover {
    color: var(--primary);
}

.property-address {
    font-size: 12px;
    color: var(--text-light);
    margin-bottom: 10px;
    display: flex;
    align-items: center;
    gap: 5px;
}

.property-description {
    font-size: 13px;
    color: var(--text-gray);
    line-height: 1.5;
    margin-bottom: 12px;
}

.property-footer {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-top: 12px;
    padding-top: 12px;
    border-top: 1px solid var(--border);
}

.property-price {
    font-size: 20px;
    font-weight: 700;
    color: var(--primary);
}

.property-link {
    color: var(--primary);
    text-decoration: none;
    font-weight: 500;
    font-size: 13px;
}

.property-link i {
    transition: transform 0.2s;
}

.property-link:hover i {
    transform: translateX(4px);
}

/* ========== PAGINATION ========== */
.pagination {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 8px;
    margin: 40px 0 20px;
    flex-wrap: wrap;
    list-style: none;
    padding: 0;
}

.pagination .page-item {
    list-style: none;
}

.pagination .page-link {
    display: flex;
    align-items: center;
    justify-content: center;
    min-width: 40px;
    height: 40px;
    padding: 0 12px;
    background: white;
    border: 1px solid var(--border);
    border-radius: 10px;
    color: var(--text-dark);
    text-decoration: none;
    transition: all 0.2s;
    font-size: 14px;
    font-weight: 500;
}

.pagination .page-link:hover {
    background: var(--primary-light);
    border-color: var(--primary);
    color: var(--primary);
}

.pagination .active .page-link {
    background: var(--primary);
    border-color: var(--primary);
    color: white;
}

.pagination .disabled .page-link {
    opacity: 0.5;
    cursor: not-allowed;
}

.pagination-info {
    text-align: center;
    color: var(--text-light);
    font-size: 13px;
    margin-top: 16px;
}

/* ========== EMPTY STATE ========== */
.empty-state {
    text-align: center;
    padding: 60px;
    background: var(--bg-light);
    border-radius: 24px;
    grid-column: 1 / -1;
}

.empty-state i {
    font-size: 48px;
    color: var(--primary);
    opacity: 0.5;
    margin-bottom: 16px;
}

.empty-state h3 {
    font-size: 20px;
    margin-bottom: 8px;
}

.empty-state p {
    color: var(--text-light);
}

/* ========== RESPONSIVE ========== */
@media (max-width: 1024px) {
    .properties-grid {
        grid-template-columns: repeat(2, 1fr);
    }

    .hero-grid {
        grid-template-columns: 1fr;
        text-align: center;
    }

    .hero-content h1 {
        font-size: 32px;
    }
}

@media (max-width: 768px) {
    .properties-grid {
        grid-template-columns: 1fr;
    }

    .hero-image img {
        height: 250px;
    }

    .hero-content h1 {
        font-size: 28px;
    }

    .button-group {
        flex-direction: column;
    }

    .section-title h2 {
        font-size: 28px;
    }

    .hero-badge {
        padding: 8px 16px;
    }

    .hero-badge span {
        font-size: 18px;
    }
}
</style>

<!-- ========== HERO SECTION ========== -->
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
<section class="property-hero">
    <div class="container">
        <div class="hero-grid">
            <div class="hero-image">
                <img src="{{ asset(Storage::url($Section_3_content_value['sec3_banner_image_path'] ?? '')) }}" alt="Properties">
                <div class="hero-badge">
                    <span>500+</span>
                    <small>Properties Available</small>
                </div>
            </div>
            <div class="hero-content">
                <h1>{{ $Section_3_content_value['sec3_title'] ?? 'Find Your' }} <span>{{ __('Perfect Property') }}</span></h1>
                <p>{{ $Section_3_content_value['sec3_sub_title'] ?? 'Discover luxury homes, apartments, and commercial spaces tailored to your needs' }}</p>

                <!-- Search Form -->
                <div class="search-card">
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
                                <button type="submit" class="btn-search" id="search_button">
                                    <i class="fas fa-search"></i> {{ __('Search Properties') }}
                                </button>
                                <a href="{{ $isCustomDomain ? route('search.filter') : route('search.filter', ['code' => $user->code]) }}"
                                   class="btn-reset" id="reset_button">
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
<section class="properties-section" style="padding: 60px 0;">
    <div class="container">
        <div class="section-title">
            <div class="sub">FEATURED LISTINGS</div>
            <h2>{{ __('Popular Properties') }}</h2>
        </div>
        <div id="package-wrapper">
            @include('theme5.propertybox')
        </div>
    </div>
</section>

@endsection

@push('theme5-script')
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
    $(document).on('click', '.pagination .page-link', function(e) {
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
