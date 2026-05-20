@extends('theme9.main')
@section('content')

<style>
/* ============================================
   THEME 9 - PROPERTIES PAGE
   Dark theme + Gold accents + Filter + Grid
   ============================================ */

/* Hero Section */
.properties-hero {
    background: linear-gradient(135deg, #0a0a0a, #1a1a1a);
    padding: 100px 0 60px;
    margin-top: 80px;

    text-align: center;
}

.properties-hero h1 {
    font-size: 3rem;
    font-weight: 800;
    color: white;
    margin-bottom: 15px;
}

.properties-hero h1 span {
    color: #d4af37;
}

.properties-hero p {
    color: #a0a0a0;
    max-width: 600px;
    margin: 0 auto;
}

/* Filter Card */
.filter-card {

    border-radius: 20px;
    padding: 40px;
    margin-top: 40px;
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
    color: #d4af37;
    letter-spacing: 1px;
}

.filter-item select,
.filter-item input {
    width: 100%;
    padding: 12px 16px;
    border: 1px solid #2a2a2a;
    border-radius: 12px;
    font-size: 14px;
    background: #0a0a0a;
    color: white;
    transition: all 0.2s;
}

.filter-item select:focus,
.filter-item input:focus {
    outline: none;
    border-color: #d4af37;
}

.btn-search {
    background: #d4af37;
    color: #0a0a0a;
    border: none;
    padding: 12px 28px;
    border-radius: 12px;
    font-weight: 700;
    cursor: pointer;
    transition: all 0.2s;
    display: flex;
    align-items: center;
    gap: 8px;
}

.btn-search:hover {
    background: #b8941e;
    transform: translateY(-2px);
}

.btn-reset {
    background: #2a2a2a;
    color: #a0a0a0;
    border: none;
    padding: 12px 24px;
    border-radius: 12px;
    font-weight: 600;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    transition: all 0.2s;
}

.btn-reset:hover {
    background: #3a3a3a;
    color: white;
}

/* Results Section */
.results-section {
    padding: 60px 0;
    background: #0a0a0a;
}

.results-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    margin-bottom: 30px;
    padding-bottom: 15px;
    border-bottom: 1px solid #2a2a2a;
}

.results-count {
    font-size: 14px;
    color: #a0a0a0;
}

.results-count strong {
    color: #d4af37;
}

.sort-dropdown select {
    padding: 8px 16px;
    border: 1px solid #2a2a2a;
    border-radius: 10px;
    font-size: 13px;
    background: #1a1a1a;
    color: white;
}

/* Properties Grid */
.properties-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 30px;
}

.property-card {
    background: #1a1a1a;
    border-radius: 20px;
    overflow: hidden;
    transition: all 0.3s;
}

.property-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 20px 30px rgba(0,0,0,0.3);
}

.property-img {
    position: relative;
    height: 220px;
    overflow: hidden;
}

.property-img img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s;
}

.property-card:hover .property-img img {
    transform: scale(1.05);
}

.property-badge {
    position: absolute;
    top: 15px;
    right: 15px;
    background: #d4af37;
    color: #0a0a0a;
    padding: 4px 12px;
    border-radius: 20px;
    font-size: 11px;
    font-weight: 700;
    z-index: 2;
}

.property-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0,0,0,0.6);
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: opacity 0.3s;
    z-index: 3;
}

.property-card:hover .property-overlay {
    opacity: 1;
}

.property-view {
    width: 50px;
    height: 50px;
    background: #d4af37;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #0a0a0a;
    text-decoration: none;
    transition: all 0.3s;
    transform: scale(0.8);
}

.property-card:hover .property-view {
    transform: scale(1);
}

.property-view:hover {
    background: #b8941e;
    transform: scale(1.1);
}

.property-info {
    padding: 20px;
}

.property-type {
    display: inline-block;
    background: rgba(212, 175, 55, 0.15);
    color: #d4af37;
    padding: 4px 12px;
    border-radius: 20px;
    font-size: 11px;
    font-weight: 600;
    margin-bottom: 10px;
}

.property-info h3 {
    font-size: 1.1rem;
    margin-bottom: 8px;
    color: white;
}

.property-info h3 a {
    color: white;
    text-decoration: none;
}

.property-info h3 a:hover {
    color: #d4af37;
}

.property-address {
    font-size: 12px;
    color: #a0a0a0;
    margin-bottom: 10px;
    display: flex;
    align-items: center;
    gap: 5px;
}

.property-price {
    font-size: 1.3rem;
    font-weight: 800;
    color: #d4af37;
    margin: 12px 0;
}

.property-footer {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding-top: 12px;
    border-top: 1px solid #2a2a2a;
}

.property-features {
    display: flex;
    gap: 12px;
    font-size: 12px;
    color: #a0a0a0;
}

.property-features i {
    color: #d4af37;
    margin-right: 4px;
}

/* Pagination */
.pagination {
    display: flex;
    justify-content: center;
    gap: 10px;
    margin-top: 50px;
    flex-wrap: wrap;
}

.pagination .page-item {
    list-style: none;
}

.pagination .page-link {
    width: 42px;
    height: 42px;
    display: flex;
    align-items: center;
    justify-content: center;
    border: 1px solid #2a2a2a;
    border-radius: 12px;
    color: #a0a0a0;
    text-decoration: none;
    transition: all 0.2s;
    background: #1a1a1a;
}

.pagination .page-link:hover {
    background: #d4af37;
    border-color: #d4af37;
    color: #0a0a0a;
}

.pagination .active .page-link {
    background: #d4af37;
    border-color: #d4af37;
    color: #0a0a0a;
}

.pagination .disabled .page-link {
    opacity: 0.5;
    cursor: not-allowed;
}

/* Empty State */
.empty-state {
    text-align: center;
    padding: 60px;
    background: #1a1a1a;
    border-radius: 20px;
    grid-column: 1 / -1;
}

.empty-state i {
    font-size: 60px;
    color: #d4af37;
    opacity: 0.3;
    margin-bottom: 20px;
}

.empty-state h3 {
    color: white;
    font-size: 24px;
    margin-bottom: 10px;
}

.empty-state p {
    color: #a0a0a0;
}

/* Container */
.container {
    max-width: 1280px;
    margin: 0 auto;
    padding: 0 24px;
    width: 100%;
}

/* Responsive */
@media (max-width: 1024px) {
    .properties-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 768px) {
    .filter-row {
        flex-direction: column;
    }

    .filter-item {
        width: 100%;
    }

    .properties-grid {
        grid-template-columns: 1fr;
    }

    .properties-hero h1 {
        font-size: 2rem;
    }

    .results-header {
        flex-direction: column;
        gap: 15px;
        align-items: flex-start;
    }

    .container {
        padding: 0 20px;
    }
}
</style>

<!-- ========== HERO SECTION ========== -->
@php
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

<section class="properties-hero  mt-5" style="margin-top: 83px">
    <h1>Find Your <span>Perfect Property</span></h1>
    <p>Discover luxury homes, apartments, and commercial spaces tailored to your needs</p>

    <div class="filter-card container" style="margin-top: 25px">
        @if ($isCustomDomain)
            {{ Form::open(['route' => 'search.filter', 'method' => 'GET', 'id' => 'package_filter']) }}
        @else
            {{ Form::open(['route' => ['search.filter', 'code' => $user->code], 'method' => 'GET', 'id' => 'package_filter']) }}
        @endif

        <div class="filter-row">
            <div class="filter-item">
                <label><i class="fas fa-globe"></i> COUNTRY</label>
                <select name="country" id="country">
                    <option value="">All Countries</option>
                    @foreach ($countries as $country)
                        <option value="{{ $country }}" {{ request('country') == $country ? 'selected' : '' }}>{{ $country }}</option>
                    @endforeach
                </select>
            </div>

            <div class="filter-item">
                <label><i class="fas fa-map-marker-alt"></i> STATE</label>
                <select name="state" id="state">
                    <option value="">Select State</option>
                </select>
            </div>

            <div class="filter-item">
                <label><i class="fas fa-city"></i> CITY</label>
                <select name="city" id="city">
                    <option value="">Select City</option>
                </select>
            </div>

            <div class="filter-item">
                <label>&nbsp;</label>
                <button type="submit" class="btn-search w-100">
                    <i class="fas fa-search"></i> Search
                </button>
            </div>

            <div class="filter-item">
                <label>&nbsp;</label>
                <a href="{{ $isCustomDomain ? route('search.filter') : route('search.filter', ['code' => $user->code]) }}" class="btn-reset w-100" id="reset_button">
                    <i class="fas fa-redo-alt"></i> Reset
                </a>
            </div>
        </div>

        {{ Form::close() }}
    </div>
</section>

<!-- ========== RESULTS SECTION ========== -->
<section class="results-section">
    <div class="container">
        <div id="package-wrapper">
            @include('theme9.propertybox')
        </div>
    </div>
</section>

@endsection

@push('theme9-scripts')
<script>
$(document).ready(function() {
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

    if ($('#country').val()) {
        $('#country').trigger('change');
    }

    $('#reset_button').on('click', function(e) {
        e.preventDefault();
        let url = $(this).attr('href');

        $.ajax({
            url: url,
            type: 'GET',
            beforeSend: function() {
                $('#package-wrapper').html('<div class="text-center py-5"><i class="fas fa-spinner fa-spin fa-3x" style="color: #d4af37;"></i><p class="mt-3">Loading properties...</p></div>');
            },
            success: function(data) {
                $('#package-wrapper').html(data);
                window.history.pushState(null, null, url);
                $('#country, #state, #city').val('');
            },
            error: function() { alert('Failed to reset.'); }
        });
    });

    $('#package_filter').on('submit', function(e) {
        e.preventDefault();
        let url = $(this).attr('action');
        let formData = $(this).serialize();

        $.ajax({
            url: url,
            type: 'GET',
            data: formData,
            beforeSend: function() {
                $('#package-wrapper').html('<div class="text-center py-5"><i class="fas fa-spinner fa-spin fa-3x" style="color: #d4af37;"></i><p class="mt-3">Loading properties...</p></div>');
            },
            success: function(data) {
                $('#package-wrapper').html(data);
                window.history.pushState(null, null, url + '?' + formData);
                $('html, body').animate({ scrollTop: $('.results-section').offset().top - 80 }, 500);
            },
            error: function() { alert('Something went wrong.'); }
        });
    });

    $(document).on('click', '.pagination .page-link', function(e) {
        e.preventDefault();
        let url = $(this).attr('href');

        $.ajax({
            url: url,
            type: 'GET',
            beforeSend: function() {
                $('#package-wrapper').html('<div class="text-center py-5"><i class="fas fa-spinner fa-spin fa-3x" style="color: #d4af37;"></i><p class="mt-3">Loading properties...</p></div>');
            },
            success: function(data) {
                $('#package-wrapper').html(data);
                window.history.pushState(null, null, url);
                $('html, body').animate({ scrollTop: $('.results-section').offset().top - 80 }, 500);
            },
            error: function() { alert('Something went wrong.'); }
        });
    });
});
</script>
@endpush
