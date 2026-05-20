@extends('theme8.main')
@section('content')

<style>
/* ============================================
   THEME 8 - PROPERTY LISTING PAGE
   iOS Glassmorphism + Horizontal Filters + Grid Results
   ============================================ */

/* Hero Section */
.glass-property-hero {
    background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
    padding: 60px 0 50px;
    text-align: center;
}

.glass-property-hero h1 {
    font-size: 2.8rem;
    color: white;
    margin-bottom: 15px;
}

.glass-property-hero h1 span {
    color: #007aff;
}

.glass-property-hero p {
    color: #94a3b8;
    max-width: 600px;
    margin: 0 auto;
}

/* Filter Card */
.glass-filter-card {
    background: rgba(255, 255, 255, 0.8);
    backdrop-filter: blur(20px);
    border-radius: 24px;
    padding: 30px;
    margin-top: 40px;
    box-shadow: 0 4px 16px rgba(0, 0, 0, 0.06);
}

.glass-filter-row {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    align-items: flex-end;
}

.glass-filter-item {
    flex: 1;
    min-width: 180px;
}

.glass-filter-item label {
    display: block;
    font-size: 12px;
    font-weight: 600;
    margin-bottom: 8px;
    color: #64748b;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.glass-filter-item label i {
    color: #007aff;
    margin-right: 5px;
}

.glass-filter-item select,
.glass-filter-item input {
    width: 100%;
    padding: 12px 16px;
    border: 1px solid rgba(0, 0, 0, 0.1);
    border-radius: 16px;
    font-size: 14px;
    background: white;
    transition: all 0.2s;
}

.glass-filter-item select:focus,
.glass-filter-item input:focus {
    outline: none;
    border-color: #007aff;
    box-shadow: 0 0 0 3px rgba(0, 122, 255, 0.1);
}

.glass-btn-search {
    background: #007aff;
    color: white;
    border: none;
    padding: 12px 28px;
    border-radius: 16px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.2s;
    display: flex;
    align-items: center;
    gap: 8px;
}

.glass-btn-search:hover {
    background: #005fc1;
    transform: translateY(-2px);
}

.glass-btn-reset {
    background: #f1f5f9;
    color: #64748b;
    border: none;
    padding: 12px 24px;
    border-radius: 16px;
    font-weight: 600;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    transition: all 0.2s;
}

.glass-btn-reset:hover {
    background: #e2e8f0;
    color: #0f172a;
}

/* Results Section */
.glass-results {
    padding: 60px 0;
    background: #f5f5f7;
}

.glass-results-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    margin-bottom: 30px;
    padding-bottom: 15px;
    border-bottom: 1px solid rgba(0, 0, 0, 0.05);
}

.glass-results-count {
    font-size: 14px;
    color: #64748b;
}

.glass-results-count strong {
    color: #0f172a;
    font-size: 16px;
}

.glass-sort select {
    padding: 8px 16px;
    border: 1px solid rgba(0, 0, 0, 0.1);
    border-radius: 12px;
    font-size: 13px;
    background: white;
}

/* Properties Grid */
.glass-properties-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 30px;
}

.glass-property-card {
    background: rgba(255, 255, 255, 0.8);
    backdrop-filter: blur(20px);
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 4px 16px rgba(0, 0, 0, 0.06);
    transition: all 0.3s;
}

.glass-property-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 20px 30px rgba(0, 0, 0, 0.1);
    background: rgba(255, 255, 255, 0.95);
}

.glass-property-img {
    position: relative;
    height: 220px;
    overflow: hidden;
}

.glass-property-img img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s;
}

.glass-property-card:hover .glass-property-img img {
    transform: scale(1.05);
}

.glass-property-badge {
    position: absolute;
    top: 15px;
    right: 15px;
    background: #007aff;
    color: white;
    padding: 4px 12px;
    border-radius: 20px;
    font-size: 11px;
    font-weight: 600;
    z-index: 2;
}

.glass-property-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0, 0, 0, 0.4);
    backdrop-filter: blur(4px);
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: opacity 0.3s;
    z-index: 3;
}

.glass-property-card:hover .glass-property-overlay {
    opacity: 1;
}

.glass-property-view {
    width: 50px;
    height: 50px;
    background: white;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #007aff;
    text-decoration: none;
    transition: all 0.3s;
    transform: scale(0.8);
}

.glass-property-card:hover .glass-property-view {
    transform: scale(1);
}

.glass-property-view:hover {
    background: #007aff;
    color: white;
}

.glass-property-info {
    padding: 20px;
}

.glass-property-type {
    display: inline-block;
    background: rgba(0, 122, 255, 0.1);
    color: #007aff;
    padding: 4px 12px;
    border-radius: 20px;
    font-size: 11px;
    font-weight: 600;
    margin-bottom: 10px;
}

.glass-property-info h3 {
    font-size: 1.1rem;
    margin-bottom: 8px;
}

.glass-property-info h3 a {
    color: #1d1c1e;
    text-decoration: none;
}

.glass-property-info h3 a:hover {
    color: #007aff;
}

.glass-property-address {
    font-size: 12px;
    color: #8e8e93;
    margin-bottom: 10px;
    display: flex;
    align-items: center;
    gap: 5px;
}

.glass-property-price {
    font-size: 1.3rem;
    font-weight: 800;
    color: #007aff;
    margin: 12px 0;
}

.glass-property-footer {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding-top: 12px;
    border-top: 1px solid rgba(0, 0, 0, 0.05);
}

.glass-property-features {
    display: flex;
    gap: 12px;
    font-size: 12px;
    color: #8e8e93;
}

.glass-property-features i {
    color: #007aff;
    margin-right: 4px;
}

/* Pagination */
.glass-pagination {
    display: flex;
    justify-content: center;
    gap: 10px;
    margin-top: 50px;
    flex-wrap: wrap;
}

.glass-pagination .page-item {
    list-style: none;
}

.glass-pagination .page-link {
    width: 42px;
    height: 42px;
    display: flex;
    align-items: center;
    justify-content: center;
    border: 1px solid rgba(0, 0, 0, 0.1);
    border-radius: 12px;
    color: #64748b;
    text-decoration: none;
    transition: all 0.2s;
    background: white;
}

.glass-pagination .page-link:hover {
    background: #007aff;
    border-color: #007aff;
    color: white;
}

.glass-pagination .active .page-link {
    background: #007aff;
    border-color: #007aff;
    color: white;
}

.glass-pagination .disabled .page-link {
    opacity: 0.5;
    cursor: not-allowed;
}

/* Empty State */
.glass-empty-state {
    text-align: center;
    padding: 80px;
    background: rgba(255, 255, 255, 0.5);
    border-radius: 24px;
    grid-column: 1 / -1;
}

.glass-empty-state i {
    font-size: 60px;
    color: #007aff;
    opacity: 0.3;
    margin-bottom: 20px;
}

.glass-empty-state h3 {
    font-size: 24px;
    margin-bottom: 10px;
}

/* Responsive */
@media (max-width: 1024px) {
    .glass-properties-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 768px) {
    .glass-filter-row {
        flex-direction: column;
    }

    .glass-filter-item {
        width: 100%;
    }

    .glass-properties-grid {
        grid-template-columns: 1fr;
    }

    .glass-property-hero h1 {
        font-size: 2rem;
    }

    .glass-results-header {
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

<section class="glass-property-hero">
    <div class="glass-container">
        <h1>{{ $Section_3_content_value['sec3_title'] ?? 'Find Your' }} <span>{{ __('Perfect Property') }}</span></h1>
        <p>{{ $Section_3_content_value['sec3_sub_title'] ?? 'Discover luxury homes, apartments, and commercial spaces tailored to your needs' }}</p>

        <!-- Filter Card -->
        <div class="glass-filter-card">
            @if ($isCustomDomain)
                {{ Form::open(['route' => 'search.filter', 'method' => 'GET', 'id' => 'package_filter']) }}
            @else
                {{ Form::open(['route' => ['search.filter', 'code' => $user->code], 'method' => 'GET', 'id' => 'package_filter']) }}
            @endif

            <div class="glass-filter-row">
                <div class="glass-filter-item">
                    <label><i class="fas fa-globe"></i> Country</label>
                    <select name="country" id="country">
                        <option value="">All Countries</option>
                        @foreach ($countries as $country)
                            <option value="{{ $country }}" {{ request('country') == $country ? 'selected' : '' }}>{{ $country }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="glass-filter-item">
                    <label><i class="fas fa-map-marker-alt"></i> State</label>
                    <select name="state" id="state">
                        <option value="">Select State</option>
                    </select>
                </div>

                <div class="glass-filter-item">
                    <label><i class="fas fa-city"></i> City</label>
                    <select name="city" id="city">
                        <option value="">Select City</option>
                    </select>
                </div>

                <div class="glass-filter-item">
                    <label>&nbsp;</label>
                    <button type="submit" class="glass-btn-search w-100">
                        <i class="fas fa-search"></i> Search
                    </button>
                </div>

                <div class="glass-filter-item">
                    <label>&nbsp;</label>
                    <a href="{{ $isCustomDomain ? route('search.filter') : route('search.filter', ['code' => $user->code]) }}" class="glass-btn-reset w-100" id="reset_button">
                        <i class="fas fa-redo-alt"></i> Reset
                    </a>
                </div>
            </div>

            {{ Form::close() }}
        </div>
    </div>
</section>

<!-- ========== RESULTS SECTION ========== -->
<section class="glass-results">
    <div class="glass-container">
        <div id="package-wrapper">
            @include('theme8.propertybox')
        </div>
    </div>
</section>

@endsection

@push('theme8-scripts')
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

    // Trigger on load
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
                $('#package-wrapper').html('<div class="text-center py-5"><i class="fas fa-spinner fa-spin fa-3x" style="color: #007aff;"></i><p class="mt-3">Loading properties...</p></div>');
            },
            success: function(data) {
                $('#package-wrapper').html(data);
                window.history.pushState(null, null, url);
                $('#country, #state, #city').val('');
            },
            error: function() { alert('Failed to reset.'); }
        });
    });

    // Filter form
    $('#package_filter').on('submit', function(e) {
        e.preventDefault();
        let url = $(this).attr('action');
        let formData = $(this).serialize();

        $.ajax({
            url: url,
            type: 'GET',
            data: formData,
            beforeSend: function() {
                $('#package-wrapper').html('<div class="text-center py-5"><i class="fas fa-spinner fa-spin fa-3x" style="color: #007aff;"></i><p class="mt-3">Loading properties...</p></div>');
            },
            success: function(data) {
                $('#package-wrapper').html(data);
                window.history.pushState(null, null, url + '?' + formData);
                $('html, body').animate({ scrollTop: $('.glass-results').offset().top - 80 }, 500);
            },
            error: function() { alert('Something went wrong.'); }
        });
    });

    // Pagination
    $(document).on('click', '.glass-pagination .page-link', function(e) {
        e.preventDefault();
        let url = $(this).attr('href');

        $.ajax({
            url: url,
            type: 'GET',
            beforeSend: function() {
                $('#package-wrapper').html('<div class="text-center py-5"><i class="fas fa-spinner fa-spin fa-3x" style="color: #007aff;"></i><p class="mt-3">Loading properties...</p></div>');
            },
            success: function(data) {
                $('#package-wrapper').html(data);
                window.history.pushState(null, null, url);
                $('html, body').animate({ scrollTop: $('.glass-results').offset().top - 80 }, 500);
            },
            error: function() { alert('Something went wrong.'); }
        });
    });
});
</script>
@endpush
