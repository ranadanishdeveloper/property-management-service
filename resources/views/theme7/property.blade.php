@extends('theme7.main')
@section('content')

<style>
/* ============================================
   THEME 7 - PROPERTY LISTING (NEON BRUTALIST - LIGHT VERSION)
   Horizontal Filters + Results Grid
   Colors: Neon Pink #ff2a6d + Cyan #05d9e8
   Background: Light #f8f9fa
   Clean border-radius: 8px (consistent with other pages)
   ============================================ */

:root {
    --neon-pink: #ff2a6d;
    --neon-cyan: #05d9e8;
    --neon-purple: #b100e8;
    --light-bg: #f8f9fa;
    --card-bg: #ffffff;
    --dark-text: #1a1a1a;
    --gray-text: #6c757d;
    --glow-pink: 0 0 10px rgba(255, 42, 109, 0.3);
    --glow-cyan: 0 0 10px rgba(5, 217, 232, 0.3);
}

.cyber-container {
    max-width: 1400px;
    margin: 0 auto;
    padding: 0 24px;
    width: 100%;
}

/* ========== HERO SECTION ========== */
.cyber-hero-properties {
    background: linear-gradient(135deg, #e9ecef 0%, #f8f9fa 100%);
    padding: 120px 0 60px;
    position: relative;
    overflow: hidden;
    border-bottom: 2px solid var(--neon-pink);
}

.cyber-hero-properties h1 {
    font-size: clamp(2.5rem, 6vw, 4rem);
    font-weight: 800;
    text-align: center;
    color: var(--dark-text);
    margin-bottom: 16px;
}

.cyber-hero-properties h1 span {
    color: var(--neon-cyan);
}

.cyber-hero-properties p {
    text-align: center;
    color: var(--gray-text);
    max-width: 600px;
    margin: 0 auto;
}

/* ========== HORIZONTAL FILTER CARD ========== */
.cyber-filter-card {
    background: var(--card-bg);
    border: 2px solid var(--neon-pink);
    padding: 30px;
    margin-top: 40px;
    border-radius: 8px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.05);
}

.cyber-filter-row {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    align-items: flex-end;
}

.cyber-filter-item {
    flex: 1;
    min-width: 180px;
}

.cyber-filter-item label {
    display: block;
    font-size: 11px;
    font-weight: 700;
    margin-bottom: 8px;
    color: var(--neon-cyan);
    text-transform: uppercase;
    letter-spacing: 2px;
}

.cyber-filter-item label i {
    margin-right: 6px;
    color: var(--neon-pink);
}

.cyber-filter-item select,
.cyber-filter-item input {
    width: 100%;
    padding: 12px 16px;
    border: 1px solid var(--neon-cyan);
    border-radius: 6px;
    font-size: 14px;
    background: var(--light-bg);
    color: var(--dark-text);
    cursor: pointer;
}

.cyber-filter-item select:focus,
.cyber-filter-item input:focus {
    outline: none;
    border-color: var(--neon-pink);
    box-shadow: var(--glow-pink);
}

.cyber-btn-search {
    background: var(--neon-pink);
    color: white;
    border: none;
    padding: 12px 28px;
    font-weight: 800;
    cursor: pointer;
    transition: all 0.2s;
    display: flex;
    align-items: center;
    gap: 8px;
    border-radius: 6px;
}

.cyber-btn-search:hover {
    background: var(--neon-cyan);
    color: var(--dark-text);
    transform: translateY(-2px);
}

.cyber-btn-reset {
    background: transparent;
    border: 2px solid var(--neon-cyan);
    color: var(--neon-cyan);
    padding: 12px 24px;
    text-decoration: none;
    font-weight: 700;
    transition: all 0.2s;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    border-radius: 6px;
}

.cyber-btn-reset:hover {
    background: var(--neon-cyan);
    color: var(--dark-text);
    border-color: var(--neon-cyan);
}

/* ========== RESULTS SECTION ========== */
.cyber-results {
    padding: 60px 0;
    background: var(--light-bg);
}

.cyber-results-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    margin-bottom: 40px;
    padding-bottom: 20px;
    border-bottom: 1px solid var(--neon-pink);
}

.cyber-results-count {
    font-size: 14px;
    color: var(--gray-text);
}

.cyber-results-count strong {
    color: var(--neon-pink);
    font-size: 18px;
}

.cyber-sort select {
    padding: 8px 16px;
    border: 1px solid var(--neon-cyan);
    background: var(--card-bg);
    color: var(--dark-text);
    font-size: 13px;
    border-radius: 6px;
}

/* ========== PROPERTY GRID ========== */
.cyber-properties-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 30px;
}

.cyber-property-card {
    background: var(--card-bg);
    border: 2px solid var(--neon-pink);
    transition: all 0.3s;
    border-radius: 8px;
    animation: fadeUp 0.5s ease forwards;
    opacity: 0;
    box-shadow: 0 2px 8px rgba(0,0,0,0.05);
    overflow: hidden;
}

.cyber-property-card:nth-child(1) { animation-delay: 0.05s; }
.cyber-property-card:nth-child(2) { animation-delay: 0.1s; }
.cyber-property-card:nth-child(3) { animation-delay: 0.15s; }
.cyber-property-card:nth-child(4) { animation-delay: 0.2s; }
.cyber-property-card:nth-child(5) { animation-delay: 0.25s; }
.cyber-property-card:nth-child(6) { animation-delay: 0.3s; }

@keyframes fadeUp {
    from { opacity: 0; transform: translateY(30px); }
    to { opacity: 1; transform: translateY(0); }
}

.cyber-property-card:hover {
    transform: translateY(-8px);
    border-color: var(--neon-cyan);
    box-shadow: var(--glow-cyan);
}

.cyber-property-img {
    position: relative;
    height: 220px;
    overflow: hidden;
}

.cyber-property-img img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.4s;
}

.cyber-property-card:hover .cyber-property-img img {
    transform: scale(1.05);
}

.cyber-property-badge {
    position: absolute;
    top: 15px;
    right: 15px;
    background: var(--neon-pink);
    color: white;
    padding: 4px 12px;
    font-size: 10px;
    font-weight: 700;
    text-transform: uppercase;
    border-radius: 4px;
    z-index: 2;
}

.cyber-property-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0, 0, 0, 0.5);
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: opacity 0.3s;
    z-index: 3;
}

.cyber-property-card:hover .cyber-property-overlay {
    opacity: 1;
}

.cyber-property-view {
    width: 50px;
    height: 50px;
    background: var(--neon-pink);
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    text-decoration: none;
    transition: all 0.3s;
    border-radius: 8px;
    transform: scale(0.8);
}

.cyber-property-card:hover .cyber-property-view {
    transform: scale(1);
}

.cyber-property-view:hover {
    background: var(--neon-cyan);
    transform: scale(1.1);
}

.cyber-property-info {
    padding: 20px;
}

.cyber-property-type {
    display: inline-block;
    background: rgba(255, 42, 109, 0.1);
    color: var(--neon-pink);
    padding: 4px 12px;
    font-size: 10px;
    font-weight: 700;
    margin-bottom: 12px;
    border-radius: 4px;
}

.cyber-property-info h3 {
    font-size: 1.1rem;
    margin-bottom: 8px;
}

.cyber-property-info h3 a {
    color: var(--dark-text);
    text-decoration: none;
    transition: color 0.2s;
}

.cyber-property-info h3 a:hover {
    color: var(--neon-cyan);
}

.cyber-property-address {
    font-size: 12px;
    color: var(--gray-text);
    margin-bottom: 12px;
    display: flex;
    align-items: center;
    gap: 5px;
}

.cyber-property-price {
    font-size: 1.3rem;
    font-weight: 800;
    color: var(--neon-pink);
    margin: 12px 0;
}

.cyber-property-footer {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding-top: 12px;
    border-top: 1px solid rgba(5, 217, 232, 0.2);
}

.cyber-property-features {
    display: flex;
    gap: 12px;
    font-size: 12px;
    color: var(--gray-text);
}

.cyber-property-features span i {
    color: var(--neon-cyan);
    margin-right: 4px;
}

/* ========== PAGINATION ========== */
.cyber-pagination {
    display: flex;
    justify-content: center;
    gap: 10px;
    margin-top: 50px;
    flex-wrap: wrap;
}

.cyber-pagination .page-item {
    list-style: none;
}

.cyber-pagination .page-link {
    width: 42px;
    height: 42px;
    display: flex;
    align-items: center;
    justify-content: center;
    border: 1px solid var(--neon-cyan);
    background: transparent;
    color: var(--neon-cyan);
    text-decoration: none;
    transition: all 0.2s;
    font-weight: 700;
    border-radius: 6px;
}

.cyber-pagination .page-link:hover {
    background: var(--neon-cyan);
    color: var(--dark-text);
    border-color: var(--neon-cyan);
    transform: translateY(-2px);
}

.cyber-pagination .active .page-link {
    background: var(--neon-pink);
    border-color: var(--neon-pink);
    color: white;
}

.cyber-pagination .disabled .page-link {
    opacity: 0.4;
    cursor: not-allowed;
}

/* ========== EMPTY STATE ========== */
.cyber-empty-state {
    text-align: center;
    padding: 80px;
    background: var(--card-bg);
    border: 2px solid var(--neon-pink);
    grid-column: 1 / -1;
    border-radius: 8px;
}

.cyber-empty-state i {
    font-size: 60px;
    color: var(--neon-pink);
    opacity: 0.5;
    margin-bottom: 20px;
}

.cyber-empty-state h3 {
    font-size: 24px;
    margin-bottom: 10px;
    color: var(--dark-text);
}

/* ========== RESPONSIVE ========== */
@media (max-width: 1024px) {
    .cyber-properties-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 768px) {
    .cyber-container {
        padding: 0 20px;
    }

    .cyber-hero-properties {
        padding: 100px 0 40px;
    }

    .cyber-filter-row {
        flex-direction: column;
    }

    .cyber-filter-item {
        width: 100%;
    }

    .cyber-btn-search,
    .cyber-btn-reset {
        width: 100%;
        justify-content: center;
    }

    .cyber-properties-grid {
        grid-template-columns: 1fr;
    }

    .cyber-results-header {
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

<section class="cyber-hero-properties">
    <div class="cyber-container">
        <h1>{{ $Section_3_content_value['sec3_title'] ?? 'FIND YOUR' }} <span>{{ __('PERFECT PROPERTY') }}</span></h1>
        <p>{{ $Section_3_content_value['sec3_sub_title'] ?? 'Discover luxury homes, apartments, and commercial spaces tailored to your needs' }}</p>

        <!-- Horizontal Filter Form -->
        <div class="cyber-filter-card">
            @if ($isCustomDomain)
                {{ Form::open(['route' => 'search.filter', 'method' => 'GET', 'id' => 'package_filter']) }}
            @else
                {{ Form::open(['route' => ['search.filter', 'code' => $user->code], 'method' => 'GET', 'id' => 'package_filter']) }}
            @endif

            <div class="cyber-filter-row">
                <div class="cyber-filter-item">
                    <label><i class="fas fa-globe"></i> COUNTRY</label>
                    <select name="country" id="country" class="filter-select">
                        <option value="">ALL COUNTRIES</option>
                        @foreach ($countries as $country)
                            <option value="{{ $country }}" {{ request('country') == $country ? 'selected' : '' }}>{{ $country }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="cyber-filter-item">
                    <label><i class="fas fa-map-marker-alt"></i> STATE</label>
                    <select name="state" id="state" class="filter-select">
                        <option value="">SELECT STATE</option>
                    </select>
                </div>

                <div class="cyber-filter-item">
                    <label><i class="fas fa-city"></i> CITY</label>
                    <select name="city" id="city" class="filter-select">
                        <option value="">SELECT CITY</option>
                    </select>
                </div>

                <div class="cyber-filter-item">
                    <label>&nbsp;</label>
                    <button type="submit" class="cyber-btn-search w-100">
                        <i class="fas fa-search"></i> SEARCH
                    </button>
                </div>

                <div class="cyber-filter-item">
                    <label>&nbsp;</label>
                    <a href="{{ $isCustomDomain ? route('search.filter') : route('search.filter', ['code' => $user->code]) }}" class="cyber-btn-reset w-100" id="reset_button">
                        <i class="fas fa-redo-alt"></i> RESET
                    </a>
                </div>
            </div>

            {{ Form::close() }}
        </div>
    </div>
</section>

<!-- ========== PROPERTIES RESULTS SECTION ========== -->
<section class="cyber-results">
    <div class="cyber-container">
        <div id="package-wrapper">
            @include('theme7.propertybox')
        </div>
    </div>
</section>

@endsection

@push('theme7-scripts')
<script>
$(document).ready(function() {
    // Country -> State
    $('#country').on('change', function() {
        var country = $(this).val();
        $('#state').html('<option value="">LOADING...</option>');
        $('#city').html('<option value="">SELECT CITY</option>');

        $.ajax({
            url: "{{ $getStatesRoute }}",
            type: 'GET',
            data: { country: country },
            success: function(res) {
                $('#state').empty().append('<option value="">SELECT STATE</option>');
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
        $('#city').html('<option value="">LOADING...</option>');

        $.ajax({
            url: "{{ $getCitiesRoute }}",
            type: 'GET',
            data: { state: state },
            success: function(res) {
                $('#city').empty().append('<option value="">SELECT CITY</option>');
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
                $('#package-wrapper').html('<div class="text-center py-5"><i class="fas fa-spinner fa-spin fa-3x" style="color: var(--neon-pink);"></i><p class="mt-3">LOADING PROPERTIES...</p></div>');
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
                $('#package-wrapper').html('<div class="text-center py-5"><i class="fas fa-spinner fa-spin fa-3x" style="color: var(--neon-pink);"></i><p class="mt-3">LOADING PROPERTIES...</p></div>');
            },
            success: function(data) {
                $('#package-wrapper').html(data);
                window.history.pushState(null, null, url + '?' + formData);
                $('html, body').animate({ scrollTop: $('.cyber-results').offset().top - 80 }, 500);
            },
            error: function() { alert('Something went wrong.'); }
        });
    });

    // Pagination
    $(document).on('click', '.cyber-pagination .page-link', function(e) {
        e.preventDefault();
        let url = $(this).attr('href');

        $.ajax({
            url: url,
            type: 'GET',
            beforeSend: function() {
                $('#package-wrapper').html('<div class="text-center py-5"><i class="fas fa-spinner fa-spin fa-3x" style="color: var(--neon-pink);"></i><p class="mt-3">LOADING PROPERTIES...</p></div>');
            },
            success: function(data) {
                $('#package-wrapper').html(data);
                window.history.pushState(null, null, url);
                $('html, body').animate({ scrollTop: $('.cyber-results').offset().top - 80 }, 500);
            },
            error: function() { alert('Something went wrong.'); }
        });
    });
});
</script>
@endpush
