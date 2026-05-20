@extends('theme6.main')
@section('content')

<style>
/* ============================================
   ÆETHER PROPERTIES - HORIZONTAL FILTER LAYOUT
   Fresh Magazine Style | Filters Horizontal | Results Grid
============================================ */

:root {
    --primary: #ff6b4a;
    --primary-dark: #e85d3e;
    --primary-glow: rgba(255, 107, 74, 0.25);
    --primary-soft: rgba(255, 107, 74, 0.1);
    --dark: #0a0c15;
    --gray: #6c727f;
    --light-mist: #f8f9fe;
    --white: #ffffff;
    --shadow-floating: 0 25px 45px -12px rgba(0, 0, 0, 0.12);
    --shadow-lift: 0 15px 30px -10px rgba(0, 0, 0, 0.08);
}

/* ========== CONTAINER ========== */
.container-aether {
    max-width: 1400px;
    margin: 0 auto;
    padding: 0 28px;
}

/* ========== HERO SECTION ========== */
.hero-properties {
    background: linear-gradient(135deg, #0a0c15 0%, #1a1d2b 100%);
    padding: 140px 0 80px;
    position: relative;
    overflow: hidden;
}

.hero-properties::before {
    content: '';
    position: absolute;
    top: -30%;
    right: -10%;
    width: 60%;
    height: 150%;
    background: radial-gradient(circle, rgba(255,107,74,0.15), transparent);
    border-radius: 50%;
    animation: floatBg 25s ease-in-out infinite;
}

@keyframes floatBg {
    0%, 100% { transform: translate(0, 0) rotate(0deg); }
    50% { transform: translate(-30px, -30px) rotate(5deg); }
}

.hero-properties h1 {
    font-size: clamp(2.5rem, 6vw, 4rem);
    font-weight: 800;
    text-align: center;
    color: white;
    margin-bottom: 16px;
}

.hero-properties h1 span {
    background: linear-gradient(135deg, #ff6b4a, #ff9f4a);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}

.hero-properties p {
    text-align: center;
    color: #a0a5c0;
    max-width: 600px;
    margin: 0 auto;
}

/* ========== SEARCH CARD - HORIZONTAL FILTERS ========== */
.search-card-horizontal {
    background: rgba(255,255,255,0.1);
    backdrop-filter: blur(20px);
    border-radius: 24px;
    padding: 30px;
    margin-top: 40px;
    border: 1px solid rgba(255,255,255,0.2);
}

.filter-row {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    align-items: flex-end;
}

.filter-item {
    flex: 1;
    min-width: 180px;
}

.filter-item label {
    display: block;
    font-size: 12px;
    font-weight: 600;
    margin-bottom: 8px;
    color: rgba(255,255,255,0.8);
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.filter-item label i {
    margin-right: 6px;
    color: var(--primary);
}

.filter-item select,
.filter-item input {
    width: 100%;
    padding: 12px 16px;
    border: none;
    border-radius: 14px;
    font-size: 14px;
    background: white;
    color: var(--dark);
    cursor: pointer;
    transition: all 0.3s;
}

.filter-item select:focus,
.filter-item input:focus {
    outline: none;
    box-shadow: 0 0 0 3px rgba(255,107,74,0.3);
}

.btn-search-horizontal {
    background: var(--primary);
    color: white;
    border: none;
    padding: 12px 28px;
    border-radius: 14px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s;
    display: flex;
    align-items: center;
    gap: 8px;
}

.btn-search-horizontal:hover {
    background: var(--primary-dark);
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(255,107,74,0.3);
}

.btn-reset-horizontal {
    background: rgba(255,255,255,0.2);
    border: 1px solid rgba(255,255,255,0.3);
    color: white;
    padding: 12px 24px;
    border-radius: 14px;
    text-decoration: none;
    transition: all 0.3s;
    display: inline-flex;
    align-items: center;
    gap: 8px;
}

.btn-reset-horizontal:hover {
    background: rgba(255,255,255,0.3);
    transform: translateY(-2px);
}

/* ========== SECTION TITLE ========== */
.section-header {
    text-align: center;
    margin-bottom: 40px;
}

.section-header .tag {
    display: inline-block;
    background: var(--primary-soft);
    color: var(--primary);
    padding: 6px 18px;
    border-radius: 50px;
    font-size: 12px;
    font-weight: 600;
    margin-bottom: 15px;
}

.section-header h2 {
    font-size: 32px;
    font-weight: 700;
    margin-bottom: 10px;
    color: var(--dark);
}

/* ========== PROPERTIES GRID ========== */
.properties-section {
    padding: 60px 0 80px;
    background: var(--light-mist);
}

.results-info {
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    margin-bottom: 30px;
    padding: 0 0 15px 0;
    border-bottom: 2px solid #e8e8e8;
}

.results-count {
    font-size: 14px;
    color: var(--gray);
}

.results-count strong {
    color: var(--primary);
    font-size: 18px;
}

.sort-dropdown select {
    padding: 8px 16px;
    border: 1px solid #e8e8e8;
    border-radius: 30px;
    font-size: 13px;
    background: white;
    cursor: pointer;
}

.properties-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 30px;
}

.property-card {
    background: white;
    border-radius: 20px;
    overflow: hidden;
    transition: all 0.4s;
    box-shadow: 0 10px 30px rgba(0,0,0,0.05);
    position: relative;
    opacity: 0;
    animation: cardFadeUp 0.6s ease forwards;
}

@keyframes cardFadeUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.property-card:nth-child(1) { animation-delay: 0.05s; }
.property-card:nth-child(2) { animation-delay: 0.1s; }
.property-card:nth-child(3) { animation-delay: 0.15s; }
.property-card:nth-child(4) { animation-delay: 0.2s; }
.property-card:nth-child(5) { animation-delay: 0.25s; }
.property-card:nth-child(6) { animation-delay: 0.3s; }

.property-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 20px 40px rgba(0,0,0,0.1);
}

.property-image {
    position: relative;
    height: 220px;
    overflow: hidden;
}

.property-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.5s;
}

.property-card:hover .property-image img {
    transform: scale(1.05);
}

.property-badge {
    position: absolute;
    top: 15px;
    right: 15px;
    background: var(--primary);
    color: white;
    padding: 5px 12px;
    border-radius: 20px;
    font-size: 11px;
    font-weight: 600;
    text-transform: uppercase;
    z-index: 2;
}

.property-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0,0,0,0.4);
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: opacity 0.3s;
    z-index: 2;
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
    text-decoration: none;
    transition: all 0.3s;
    transform: scale(0.8);
}

.property-card:hover .property-view {
    transform: scale(1);
}

.property-view:hover {
    background: var(--primary);
    color: white;
    transform: scale(1.1);
}

.property-content {
    padding: 20px;
}

.property-type {
    display: inline-block;
    background: var(--primary-soft);
    color: var(--primary);
    padding: 4px 12px;
    border-radius: 20px;
    font-size: 11px;
    font-weight: 600;
    margin-bottom: 10px;
}

.property-content h3 {
    font-size: 1.1rem;
    margin-bottom: 8px;
}

.property-content h3 a {
    color: var(--dark);
    text-decoration: none;
    transition: color 0.3s;
}

.property-content h3 a:hover {
    color: var(--primary);
}

.property-address {
    font-size: 12px;
    color: var(--gray);
    margin-bottom: 10px;
    display: flex;
    align-items: center;
    gap: 5px;
}

.property-price {
    font-size: 1.3rem;
    font-weight: 700;
    color: var(--primary);
    margin: 12px 0;
}

.property-footer {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding-top: 12px;
    border-top: 1px solid #f0f0f0;
}

.property-features {
    display: flex;
    gap: 12px;
    font-size: 12px;
    color: var(--gray);
}

.property-features span i {
    margin-right: 4px;
    color: var(--primary);
}

/* ========== PAGINATION ========== */
.pagination-modern {
    display: flex;
    justify-content: center;
    gap: 10px;
    margin-top: 50px;
    flex-wrap: wrap;
}

.pagination-modern .page-item {
    list-style: none;
}

.pagination-modern .page-link {
    width: 42px;
    height: 42px;
    display: flex;
    align-items: center;
    justify-content: center;
    border: 1px solid #e8e8e8;
    border-radius: 14px;
    color: var(--dark);
    text-decoration: none;
    transition: all 0.3s;
    font-weight: 500;
}

.pagination-modern .page-link:hover {
    background: var(--primary);
    border-color: var(--primary);
    color: white;
    transform: translateY(-2px);
}

.pagination-modern .active .page-link {
    background: var(--primary);
    border-color: var(--primary);
    color: white;
}

/* ========== EMPTY STATE ========== */
.empty-state {
    text-align: center;
    padding: 60px;
    background: white;
    border-radius: 24px;
    grid-column: 1 / -1;
}

.empty-state i {
    font-size: 50px;
    color: var(--primary);
    opacity: 0.5;
    margin-bottom: 15px;
}

.empty-state h3 {
    font-size: 22px;
    margin-bottom: 10px;
}

/* ========== RESPONSIVE ========== */
@media (max-width: 1024px) {
    .properties-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 768px) {
    .container-aether {
        padding: 0 20px;
    }
    
    .hero-properties {
        padding: 100px 0 50px;
    }
    
    .filter-row {
        flex-direction: column;
    }
    
    .filter-item {
        width: 100%;
    }
    
    .btn-search-horizontal,
    .btn-reset-horizontal {
        width: 100%;
        justify-content: center;
    }
    
    .properties-grid {
        grid-template-columns: 1fr;
    }
    
    .results-info {
        flex-direction: column;
        gap: 15px;
        align-items: flex-start;
    }
}
</style>

<!-- ========== HERO SECTION ========== -->
@php
    $Section_3 = App\Models\Additional::where('section', 'Section 3')->where('parent_id', $user->id)->first();
    $Section_3_content_value = !empty($Section_3->content_value) ? json_decode($Section_3->content_value, true) : [];
    
    $isCustomDomain = isset($is_custom_domain) ? $is_custom_domain : (request()->getHost() !== '13.61.10.174' && request()->getHost() !== 'localhost' && request()->getHost() !== '127.0.0.1');
    
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

<section class="hero-properties">
    <div class="container-aether">
        <h1>{{ $Section_3_content_value['sec3_title'] ?? 'Find Your' }} <span>{{ __('Perfect Property') }}</span></h1>
        <p>{{ $Section_3_content_value['sec3_sub_title'] ?? 'Discover luxury homes, apartments, and commercial spaces tailored to your needs' }}</p>
        
        <!-- Horizontal Filter Form -->
        <div class="search-card-horizontal">
            @if ($isCustomDomain)
                {{ Form::open(['route' => 'search.filter', 'method' => 'GET', 'id' => 'package_filter']) }}
            @else
                {{ Form::open(['route' => ['search.filter', 'code' => $user->code], 'method' => 'GET', 'id' => 'package_filter']) }}
            @endif
            
            <div class="filter-row">
                <div class="filter-item">
                    <label><i class="fas fa-globe"></i> Country</label>
                    <select name="country" id="country" class="filter-select">
                        <option value="">All Countries</option>
                        @foreach ($countries as $country)
                            <option value="{{ $country }}" {{ request('country') == $country ? 'selected' : '' }}>{{ $country }}</option>
                        @endforeach
                    </select>
                </div>
                
                <div class="filter-item">
                    <label><i class="fas fa-map-marker-alt"></i> State</label>
                    <select name="state" id="state" class="filter-select">
                        <option value="">Select State</option>
                    </select>
                </div>
                
                <div class="filter-item">
                    <label><i class="fas fa-city"></i> City</label>
                    <select name="city" id="city" class="filter-select">
                        <option value="">Select City</option>
                    </select>
                </div>
                
                <div class="filter-item">
                    <label>&nbsp;</label>
                    <button type="submit" class="btn-search-horizontal w-100">
                        <i class="fas fa-search"></i> Search Properties
                    </button>
                </div>
                
                <div class="filter-item">
                    <label>&nbsp;</label>
                    <a href="{{ $isCustomDomain ? route('search.filter') : route('search.filter', ['code' => $user->code]) }}" class="btn-reset-horizontal w-100" id="reset_button">
                        <i class="fas fa-redo-alt"></i> Reset
                    </a>
                </div>
            </div>
            
            {{ Form::close() }}
        </div>
    </div>
</section>

<!-- ========== PROPERTIES SECTION ========== -->
<section class="properties-section">
    <div class="container-aether">
        <div class="section-header">
            <div class="tag">FEATURED LISTINGS</div>
            <h2>Browse Our Properties</h2>
        </div>
        
        <div id="package-wrapper">
            @include('theme6.propertybox')
        </div>
    </div>
</section>

@endsection

@push('theme6-script')
<script>
$(document).ready(function() {
    // Country -> State
    $('#country').on('change', function() {
        var country = $(this).val();
        $('#state').html('<option value="">Loading...</option>');
        $('#city').html('<option value="">Select City</option>');
        
        $.ajax({
            url: "{{ $getStatesRoute }}",
            type: 'GET',
            data: { country: country },
            success: function(res) {
                $('#state').empty().append('<option value="">Select State</option>');
                $.each(res, function(index, value) {
                    var selected = (value == "{{ request('state') }}") ? 'selected' : '';
                    $('#state').append('<option value="' + value + '" ' + selected + '>' + value + '</option>');
                });
            },
            error: function() { alert('Failed to load states.'); }
        });
    });
    
    // State -> City
    $('#state').on('change', function() {
        var state = $(this).val();
        $('#city').html('<option value="">Loading...</option>');
        
        $.ajax({
            url: "{{ $getCitiesRoute }}",
            type: 'GET',
            data: { state: state },
            success: function(res) {
                $('#city').empty().append('<option value="">Select City</option>');
                $.each(res, function(index, value) {
                    var selected = (value == "{{ request('city') }}") ? 'selected' : '';
                    $('#city').append('<option value="' + value + '" ' + selected + '>' + value + '</option>');
                });
            },
            error: function() { alert('Failed to load cities.'); }
        });
    });
    
    // Trigger state change on page load if country is preselected
    if ($('#country').val()) {
        $('#country').trigger('change');
    }
    
    // Reset button
    $('#reset_button').on('click', function(e) {
        e.preventDefault();
        let url = $(this).attr('href');
        
        $.ajax({
            url: url,
            type: 'GET',
            beforeSend: function() {
                $('#package-wrapper').html('<div class="text-center py-5"><i class="fas fa-spinner fa-spin fa-2x" style="color: var(--primary);"></i><p class="mt-3">Loading properties...</p></div>');
            },
            success: function(data) {
                $('#package-wrapper').html(data);
                window.history.pushState(null, null, url);
                $('#country, #state, #city').val('');
            },
            error: function() { alert('Failed to reset.'); }
        });
    });
    
    // Filter form submission
    $('#package_filter').on('submit', function(e) {
        e.preventDefault();
        let url = $(this).attr('action');
        let formData = $(this).serialize();
        
        $.ajax({
            url: url,
            type: 'GET',
            data: formData,
            beforeSend: function() {
                $('#package-wrapper').html('<div class="text-center py-5"><i class="fas fa-spinner fa-spin fa-2x" style="color: var(--primary);"></i><p class="mt-3">Loading properties...</p></div>');
            },
            success: function(data) {
                $('#package-wrapper').html(data);
                window.history.pushState(null, null, url + '?' + formData);
                $('html, body').animate({ scrollTop: $('.properties-section').offset().top - 80 }, 500);
            },
            error: function() { alert('Something went wrong.'); }
        });
    });
    
    // Pagination
    $(document).on('click', '.pagination-modern .page-link', function(e) {
        e.preventDefault();
        let url = $(this).attr('href');
        
        $.ajax({
            url: url,
            type: 'GET',
            beforeSend: function() {
                $('#package-wrapper').html('<div class="text-center py-5"><i class="fas fa-spinner fa-spin fa-2x" style="color: var(--primary);"></i><p class="mt-3">Loading properties...</p></div>');
            },
            success: function(data) {
                $('#package-wrapper').html(data);
                window.history.pushState(null, null, url);
                $('html, body').animate({ scrollTop: $('.properties-section').offset().top - 80 }, 500);
            },
            error: function() { alert('Something went wrong.'); }
        });
    });
});
</script>
@endpush