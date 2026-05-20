@extends('theme8.main')
@section('content')

<style>
/* ============================================
   THEME 8 - iOS HOMEPAGE
   Glassmorphism + Triangle Banner + Filter Inside Banner
   ============================================ */

/* Hero Section - Triangle/Half Banner */
.glass-hero {
    position: relative;
    min-height: 85vh;
    background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
    overflow: hidden;
}

/* Background Image with Triangle Clip */
.glass-hero-bg {
    position: absolute;
    top: 0;
    right: 0;
    width: 55%;
    height: 100%;
    clip-path: polygon(25% 0%, 100% 0%, 100% 100%, 0% 100%);
    overflow: hidden;
}

.glass-hero-bg img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    filter: brightness(0.85);
    transition: transform 0.5s ease;
}

.glass-hero:hover .glass-hero-bg img {
    transform: scale(1.03);
}

.glass-hero-bg::after {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(135deg, rgba(0, 122, 255, 0.15), transparent);
    pointer-events: none;
}

/* Content Area */
.glass-hero-content {
    position: relative;
    z-index: 2;
    width: 100%;
    padding: 60px 0;
    display: flex;
    align-items: center;
    min-height: 85vh;
}

.glass-hero-content-inner {
    width: 100%;
}

.glass-hero-badge {
    display: inline-block;
    background: rgba(0, 122, 255, 0.15);
    backdrop-filter: blur(10px);
    padding: 8px 20px;
    border-radius: 30px;
    font-size: 12px;
    font-weight: 600;
    color: #007aff;
    margin-bottom: 24px;
    border: 1px solid rgba(0, 122, 255, 0.3);
}

.glass-hero-content h1 {
    font-size: 3.8rem;
    font-weight: 800;
    color: white;
    margin-bottom: 20px;
    line-height: 1.2;
}

.glass-hero-content h1 span {
    color: #007aff;
    background: linear-gradient(135deg, #007aff, #40a0ff);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}

.glass-hero-content p {
    color: #cbd5e1;
    font-size: 1.1rem;
    margin-bottom: 32px;
    line-height: 1.6;
    max-width: 550px;
}

/* ========== FILTER CARD INSIDE BANNER ========== */
.glass-filter-card {
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(20px);
    border-radius: 20px;
    padding: 20px 25px;
    margin-top: 130px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
    width: 100%;
}

.glass-filter-row {
    display: flex;
    flex-wrap: nowrap;
    gap: 15px;
    align-items: flex-end;
    width: 100%;
}

.glass-filter-item {
    flex: 1;
    min-width: 0;
}

.glass-filter-item label {
    display: block;
    font-size: 11px;
    font-weight: 600;
    margin-bottom: 6px;
    color: #1e293b;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    white-space: nowrap;
}

.glass-filter-item label i {
    color: #007aff;
    margin-right: 4px;
}

.glass-filter-item select,
.glass-filter-item input {
    width: 100%;
    padding: 10px 12px;
    border: 1px solid #e2e8f0;
    border-radius: 12px;
    font-size: 13px;
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
    padding: 10px 16px;
    border-radius: 12px;
    font-weight: 600;
    font-size: 13px;
    cursor: pointer;
    transition: all 0.2s;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    width: 100%;
    white-space: nowrap;
}

.glass-btn-search:hover {
    background: #005fc1;
    transform: translateY(-2px);
}

.glass-btn-reset {
    background: #f1f5f9;
    color: #64748b;
    border: none;
    padding: 10px 16px;
    border-radius: 12px;
    font-weight: 600;
    font-size: 13px;
    text-decoration: none;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    transition: all 0.2s;
    width: 100%;
    white-space: nowrap;
}

.glass-btn-reset:hover {
    background: #e2e8f0;
    color: #0f172a;
}

.glass-btn {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    background: #007aff;
    color: white;
    padding: 14px 34px;
    border-radius: 30px;
    text-decoration: none;
    font-weight: 600;
    transition: all 0.3s;
    box-shadow: 0 4px 14px rgba(0, 122, 255, 0.3);
}

.glass-btn:hover {
    background: #005fc1;
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(0, 122, 255, 0.4);
}

/* Section Common */
.glass-section {
    padding: 80px 0;
}

.glass-section-light {
    background: #f5f5f7;
}

.glass-section-header {
    text-align: center;
    margin-bottom: 50px;
}

.glass-section-tag {
    display: inline-block;
    background: rgba(0, 122, 255, 0.1);
    color: #007aff;
    padding: 5px 14px;
    border-radius: 30px;
    font-size: 12px;
    font-weight: 600;
    margin-bottom: 15px;
}

.glass-section-header h2 {
    font-size: 2.2rem;
    margin-bottom: 15px;
}

.glass-section-header p {
    color: #8e8e93;
    max-width: 600px;
    margin: 0 auto;
}

/* ========== STATS BAR ========== */
.glass-stats-bar {
    background: linear-gradient(135deg, #007aff, #005fc1);
    padding: 50px 0;
}

.glass-stats-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 40px;
    text-align: center;
}

.glass-stat-item {
    text-align: center;
}

.glass-stat-number {
    font-size: 2.8rem;
    font-weight: 800;
    color: white;
    margin-bottom: 8px;
    letter-spacing: -0.02em;
}

.glass-stat-label {
    font-size: 14px;
    color: rgba(255, 255, 255, 0.85);
    text-transform: uppercase;
    letter-spacing: 1px;
}

/* ========== CTA SECTION ========== */
.glass-cta {
    background: linear-gradient(135deg, #f8f9fa, #e9ecef);
    padding: 70px 0;
    text-align: center;
    position: relative;
    overflow: hidden;
}

.glass-cta::before {
    content: '';
    position: absolute;
    top: -50%;
    right: -20%;
    width: 60%;
    height: 200%;
    background: radial-gradient(circle, rgba(0, 122, 255, 0.05), transparent);
    border-radius: 50%;
}

.glass-cta h2 {
    font-size: 2.5rem;
    font-weight: 800;
    color: #1d1c1e;
    margin-bottom: 15px;
    position: relative;
    z-index: 2;
}

.glass-cta p {
    font-size: 1.1rem;
    color: #6c757d;
    margin-bottom: 30px;
    position: relative;
    z-index: 2;
}

.glass-cta .glass-btn {
    background: #007aff;
    color: white;
    box-shadow: 0 4px 14px rgba(0, 122, 255, 0.3);
    position: relative;
    z-index: 2;
}

/* ========== PROPERTIES VERTICAL LIST (1 PER ROW) ========== */
.glass-properties-vertical {
    display: flex;
    flex-direction: column;
    gap: 30px;
}

.glass-property-row {
    display: flex;
    background: rgba(255, 255, 255, 0.8);
    backdrop-filter: blur(20px);
    border-radius: 24px;
    overflow: hidden;
    box-shadow: 0 4px 16px rgba(0, 0, 0, 0.06);
    transition: all 0.3s;
}

.glass-property-row:hover {
    transform: translateY(-4px);
    box-shadow: 0 20px 30px rgba(0, 0, 0, 0.1);
    background: rgba(255, 255, 255, 0.95);
}

.glass-property-row-img {
    width: 280px;
    height: 200px;
    flex-shrink: 0;
    overflow: hidden;
}

.glass-property-row-img img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s;
}

.glass-property-row:hover .glass-property-row-img img {
    transform: scale(1.05);
}

.glass-property-row-info {
    flex: 1;
    padding: 20px;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

.glass-property-row-header {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    flex-wrap: wrap;
    gap: 15px;
    margin-bottom: 15px;
}

.glass-property-type {
    display: inline-block;
    background: rgba(0, 122, 255, 0.1);
    color: #007aff;
    padding: 4px 12px;
    border-radius: 20px;
    font-size: 11px;
    font-weight: 600;
}

.glass-property-price {
    font-weight: 800;
    font-size: 1.3rem;
    color: #007aff;
}

.glass-property-row-info h3 {
    font-size: 1.3rem;
    margin-bottom: 8px;
}

.glass-property-row-info h3 a {
    color: #1d1c1e;
    text-decoration: none;
}

.glass-property-row-info h3 a:hover {
    color: #007aff;
}

.glass-property-address {
    font-size: 13px;
    color: #8e8e93;
    margin-bottom: 12px;
    display: flex;
    align-items: center;
    gap: 5px;
}

.glass-property-description {
    font-size: 13px;
    color: #8e8e93;
    line-height: 1.5;
    margin-bottom: 15px;
}

.glass-property-row-footer {
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 15px;
}

.glass-property-features {
    display: flex;
    gap: 20px;
    font-size: 13px;
    color: #8e8e93;
}

.glass-property-features i {
    color: #007aff;
    margin-right: 5px;
}

.glass-view-link {
    color: #007aff;
    text-decoration: none;
    font-weight: 600;
    display: inline-flex;
    align-items: center;
    gap: 8px;
}

/* ========== CAROUSEL STYLES ========== */
.glass-carousel {
    overflow: hidden;
    position: relative;
    padding: 20px 0;
}

.glass-carousel-track {
    display: flex;
    gap: 24px;
    transition: transform 0.5s cubic-bezier(0.2, 0.9, 0.4, 1);
}

.glass-carousel-nav {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    width: 44px;
    height: 44px;
    background: white;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    transition: all 0.2s;
    z-index: 5;
}

.glass-carousel-nav:hover {
    background: #007aff;
    color: white;
}

.glass-carousel-prev { left: -10px; }
.glass-carousel-next { right: -10px; }

/* Amenity Card */
.glass-amenity-card {
    min-width: 220px;
    text-align: center;
    padding: 30px 20px;
    background: rgba(255, 255, 255, 0.7);
    backdrop-filter: blur(20px);
    border-radius: 24px;
    transition: all 0.3s;
    min-height: 220px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
}

.glass-amenity-card:hover {
    transform: translateY(-5px);
    background: rgba(255, 255, 255, 0.95);
}

.glass-amenity-card img {
    width: 70px;
    height: 70px;
    border-radius: 50%;
    object-fit: cover;
    margin-bottom: 16px;
}

.glass-amenity-card h4 {
    font-size: 16px;
    font-weight: 700;
    margin-bottom: 8px;
    color: #1d1c1e;
}

.glass-amenity-card p {
    font-size: 12px;
    color: #8e8e93;
    line-height: 1.4;
    max-width: 180px;
}

/* Testimonial Card */
.glass-testimonial-card {
    min-width: 340px;
    background: rgba(255, 255, 255, 0.8);
    backdrop-filter: blur(20px);
    border-radius: 24px;
    padding: 32px;
    box-shadow: 0 4px 16px rgba(0, 0, 0, 0.06);
    min-height: 280px;
    display: flex;
    flex-direction: column;
}

.glass-testimonial-card i.fa-quote-left {
    font-size: 2.5rem;
    color: #007aff;
    opacity: 0.3;
    margin-bottom: 20px;
}

.glass-testimonial-card p {
    font-size: 14px;
    line-height: 1.6;
    color: #4a5568;
    margin-bottom: 20px;
    flex: 1;
}

.glass-rating {
    color: #f59e0b;
    margin: 16px 0;
    font-size: 14px;
}

/* Blog Card */
.glass-blog-card {
    min-width: 340px;
    background: rgba(255, 255, 255, 0.8);
    backdrop-filter: blur(20px);
    border-radius: 24px;
    overflow: hidden;
    transition: all 0.3s;
}

.glass-blog-card:hover {
    transform: translateY(-5px);
    background: rgba(255, 255, 255, 0.95);
}

.glass-blog-img {
    height: 200px;
    overflow: hidden;
}

.glass-blog-img img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s;
}

.glass-blog-card:hover .glass-blog-img img {
    transform: scale(1.05);
}

.glass-blog-info {
    padding: 20px;
}

.glass-blog-meta {
    display: flex;
    gap: 15px;
    margin-bottom: 10px;
    font-size: 12px;
    color: #8e8e93;
}

.glass-blog-meta i {
    color: #007aff;
    margin-right: 4px;
}

.glass-blog-info h3 {
    font-size: 1.1rem;
    margin-bottom: 10px;
}

.glass-blog-info h3 a {
    color: #1d1c1e;
    text-decoration: none;
}

.glass-blog-info h3 a:hover {
    color: #007aff;
}

.glass-blog-excerpt {
    font-size: 13px;
    color: #8e8e93;
    line-height: 1.5;
    margin-bottom: 15px;
}

.glass-blog-readmore {
    color: #007aff;
    text-decoration: none;
    font-weight: 600;
    font-size: 13px;
    display: inline-flex;
    align-items: center;
    gap: 5px;
}

/* Features Grid */
.glass-features-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 30px;
}

.glass-feature-card {
    text-align: center;
    padding: 40px 30px;
    background: rgba(255, 255, 255, 0.7);
    backdrop-filter: blur(20px);
    border-radius: 24px;
    transition: all 0.3s;
}

.glass-feature-card:hover {
    transform: translateY(-5px);
    background: rgba(255, 255, 255, 0.9);
    box-shadow: 0 20px 30px rgba(0, 0, 0, 0.08);
}

.glass-feature-icon {
    width: 70px;
    height: 70px;
    background: rgba(0, 122, 255, 0.1);
    border-radius: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 20px;
    font-size: 28px;
    color: #007aff;
}

/* About Section */
.glass-about-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 50px;
    align-items: center;
}

.glass-about-img img {
    width: 100%;
    border-radius: 32px;
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.08);
}

.glass-about-card {
    background: rgba(255, 255, 255, 0.7);
    backdrop-filter: blur(20px);
    padding: 28px;
    border-radius: 24px;
    margin-bottom: 24px;
}

/* View All Link */
.glass-view-all {
    text-align: center;
    margin-top: 40px;
}

.glass-view-all a {
    color: #007aff;
    text-decoration: none;
    font-weight: 600;
    display: inline-flex;
    align-items: center;
    gap: 8px;
}

/* Responsive */
@media (max-width: 1024px) {
    .glass-features-grid {
        grid-template-columns: repeat(2, 1fr);
    }

    .glass-stats-grid {
        grid-template-columns: repeat(2, 1fr);
        gap: 30px;
    }

    .glass-about-grid {
        grid-template-columns: 1fr;
        text-align: center;
    }

    .glass-hero-bg {
        display: none;
    }

    .glass-property-row {
        flex-direction: column;
    }

    .glass-property-row-img {
        width: 100%;
        height: 220px;
    }

    .glass-filter-row {
        flex-wrap: wrap;
    }

    .glass-filter-item {
        min-width: calc(33.33% - 10px);
    }
}

@media (max-width: 768px) {
    .glass-section {
        padding: 50px 0;
    }

    .glass-hero-content h1 {
        font-size: 2.2rem;
    }

    .glass-features-grid,
    .glass-stats-grid {
        grid-template-columns: 1fr;
    }

    .glass-amenity-card {
        min-width: 180px;
        min-height: 200px;
        padding: 20px;
    }

    .glass-testimonial-card {
        min-width: 280px;
        min-height: 260px;
        padding: 24px;
    }

    .glass-blog-card {
        min-width: 280px;
    }

    .glass-property-row-header {
        flex-direction: column;
    }

    .glass-cta h2 {
        font-size: 1.8rem;
    }

    .glass-filter-row {
        flex-direction: column;
    }

    .glass-filter-item {
        width: 100%;
    }
}
</style>

<!-- ========== HERO SECTION WITH TRIANGLE BANNER ========== -->
@php
    $Section_0 = App\Models\FrontHomePage::where('section', 'Section 0')->where('parent_id', $parent_id)->first();
    $Section_0_content_value = !empty($Section_0->content_value) ? json_decode($Section_0->content_value, true) : [];

    $bannerImage = !empty($Section_0_content_value['banner_image1_path'])
        ? $Section_0_content_value['banner_image1_path']
        : '';

    $countries = \App\Models\Property::where('parent_id', $user->id)->distinct()->pluck('country');
    $isCustomDomain = isset($is_custom_domain) ? $is_custom_domain : (request()->getHost() !== '13.61.10.174' && request()->getHost() !== 'localhost' && request()->getHost() !== '127.0.0.1');

    if ($isCustomDomain) {
        $getStatesRoute = route('get-states');
        $getCitiesRoute = route('get-cities');
    } else {
        $getStatesRoute = route('get-states', $user->code);
        $getCitiesRoute = route('get-cities', $user->code);
    }
@endphp

<section class="glass-hero">
    @if($bannerImage)
    <div class="glass-hero-bg">
        <img src="{{ asset(Storage::url($bannerImage)) }}" alt="Hero Banner">
    </div>
    @endif

    <div class="glass-container">
        <div class="glass-hero-content">
            <div class="glass-hero-content-inner">
                <div class="glass-hero-badge">✨ PREMIUM REAL ESTATE</div>
                <h1>{{ $Section_0_content_value['title'] ?? 'Find Your' }} </h1>
                <p>{{ $Section_0_content_value['sub_title'] ?? 'Discover exceptional properties with our curated collection.' }}</p>

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
                            <button type="submit" class="glass-btn-search">
                                <i class="fas fa-search"></i> Search
                            </button>
                        </div>


                    </div>

                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ========== STATS BAR ========== -->


<!-- ========== PROPERTIES SECTION (VERTICAL LIST) ========== -->
@php
    $Section_5 = App\Models\FrontHomePage::where('section', 'Section 5')->first();
    $Section_5_content_value = !empty($Section_5->content_value) ? json_decode($Section_5->content_value, true) : [];

    $latestProperties = \App\Models\Property::where('parent_id', $user->id)
        ->latest()
        ->take(4)
        ->get();
@endphp

<section class="glass-section">
    <div class="glass-container">
        <div class="glass-section-header">
            <div class="glass-section-tag">🔥 FEATURED LISTINGS</div>
            <h2>{{ $Section_5_content_value['Sec5_title'] ?? 'Latest Properties' }}</h2>
            <p>Discover our most recent properties</p>
        </div>

        @if($latestProperties->count() > 0)
            <div class="glass-properties-vertical">
                @foreach ($latestProperties as $property)
                    @php
                        $thumbnail = !empty($property->thumbnail->image) ? $property->thumbnail->image : 'default.jpg';
                        $totalBedrooms = ($property->units && $property->units->count() > 0) ? $property->units->sum('bedroom') : 0;
                        $totalBathrooms = ($property->units && $property->units->count() > 0) ? $property->units->sum('baths') : 0;
                    @endphp
                    <div class="glass-property-row">
                        <div class="glass-property-row-img">
                            <img src="{{ asset(Storage::url('upload/property/thumbnail/' . $thumbnail)) }}" alt="{{ $property->name }}">
                        </div>
                        <div class="glass-property-row-info">
                            <div>
                                <div class="glass-property-row-header">
                                    <span class="glass-property-type">{{ ucfirst($property->listing_type ?? 'Property') }}</span>
                                    <div class="glass-property-price">
                                        @if(function_exists('priceformat'))
                                            {{ priceformat($property->price) }}
                                        @else
                                            ${{ number_format($property->price ?? 0, 0, '.', ',') }}
                                        @endif
                                    </div>
                                </div>
                                <h3><a href="{{ $isCustomDomain ? route('custom.domain.property.detail', ['id' => \Crypt::encrypt($property->id)]) : route('property.detail', ['code' => $user->code, \Crypt::encrypt($property->id)]) }}">{{ ucfirst($property->name) }}</a></h3>
                                <div class="glass-property-address">
                                    <i class="fas fa-map-marker-alt"></i>
                                    <span>{{ $property->address ?? '' }}{{ $property->city ? ', ' . $property->city : '' }}{{ $property->state ? ', ' . $property->state : '' }}</span>
                                </div>
                                <p class="glass-property-description">
                                    {{ \Illuminate\Support\Str::limit(strip_tags($property->description ?? ''), 120) }}
                                </p>
                            </div>
                            <div class="glass-property-row-footer">
                                <div class="glass-property-features">
                                    <span><i class="fas fa-bed"></i> {{ $totalBedrooms ?: 'N/A' }} Beds</span>
                                    <span><i class="fas fa-bath"></i> {{ $totalBathrooms ?: 'N/A' }} Baths</span>
                                    <span><i class="fas fa-vector-square"></i> {{ $property->area ?? 'N/A' }} sq ft</span>
                                </div>
                                <a href="{{ $isCustomDomain ? route('custom.domain.property.detail', ['id' => \Crypt::encrypt($property->id)]) : route('property.detail', ['code' => $user->code, \Crypt::encrypt($property->id)]) }}" class="glass-view-link">
                                    View Details <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="glass-view-all">
                <a href="{{ $isCustomDomain ? route('custom.domain.properties') : route('property.home', $user->code) }}">View All Properties <i class="fas fa-arrow-right"></i></a>
            </div>
        @else
            <div style="text-align: center; padding: 60px; background: rgba(255,255,255,0.5); border-radius: 24px;">
                <i class="fas fa-building" style="font-size: 48px; color: #007aff; opacity: 0.5;"></i>
                <h3 style="margin-top: 15px;">No Properties Found</h3>
            </div>
        @endif
    </div>
</section>
@php
    $Section_2 = App\Models\FrontHomePage::where('section', 'Section 2')->where('parent_id', $parent_id)->first();
    $Section_2_content_value = !empty($Section_2->content_value) ? json_decode($Section_2->content_value, true) : [];
@endphp

<div class="glass-stats-bar ">
    <div class="glass-container ">
        <div class="glass-stats-grid container">
            <div class="glass-stat-item">
                <div class="glass-stat-number">{{ $Section_2_content_value['Box1_number'] ?? '850' }}+</div>
                <div class="glass-stat-label">{{ $Section_2_content_value['Box1_title'] ?? 'Total Property' }}</div>
            </div>
            <div class="glass-stat-item">
                <div class="glass-stat-number">{{ $Section_2_content_value['Box2_number'] ?? '1500' }}+</div>
                <div class="glass-stat-label">{{ $Section_2_content_value['Box2_title'] ?? 'Total Tenant' }}</div>
            </div>
            <div class="glass-stat-item">
                <div class="glass-stat-number">{{ $Section_2_content_value['Box3_number'] ?? '500' }}+</div>
                <div class="glass-stat-label">{{ $Section_2_content_value['Box3_title'] ?? 'Total Amenities' }}</div>
            </div>
            <div class="glass-stat-item">
                <div class="glass-stat-number">{{ $Section_2_content_value['Box4_number'] ?? '10' }}+</div>
                <div class="glass-stat-label">{{ $Section_2_content_value['Box4_title'] ?? 'Years of Experience' }}</div>
            </div>
        </div>
    </div>
</div>
<!-- ========== FEATURES (Section 1) ========== -->
@php
    $Section_1 = App\Models\FrontHomePage::where('section', 'Section 1')->where('parent_id', $parent_id)->first();
    $Section_1_content_value = !empty($Section_1->content_value) ? json_decode($Section_1->content_value, true) : [];
@endphp

<section class="glass-section glass-section-light">
    <div class="glass-container">
        <div class="glass-section-header">
            <div class="glass-section-tag">⭐ WHY CHOOSE US</div>
            <h2>{{ $Section_1_content_value['Sec1_title'] ?? 'Simple & Transparent' }}</h2>
            <p>We make property buying and selling easy</p>
        </div>

        <div class="glass-features-grid">
            @for ($i = 1; $i <= 3; $i++)
                @if (!empty($Section_1_content_value['Sec1_box' . $i . '_enabled']) && $Section_1_content_value['Sec1_box' . $i . '_enabled'] == 'active')
                <div class="glass-feature-card">
                    <div class="glass-feature-icon"><i class="fas {{ $i == 1 ? 'fa-bolt' : ($i == 2 ? 'fa-shield-alt' : 'fa-headset') }}"></i></div>
                    <h3>{{ $Section_1_content_value['Sec1_box' . $i . '_title'] ?? 'Feature' }}</h3>
                    <p>{{ $Section_1_content_value['Sec1_box' . $i . '_info'] ?? 'Description' }}</p>
                </div>
                @endif
            @endfor
        </div>
    </div>
</section>

<!-- ========== CTA SECTION ========== -->
@php
    $Section_6 = App\Models\FrontHomePage::where('section', 'Section 6')->where('parent_id', $parent_id)->first();
    $Section_6_content_value = !empty($Section_6->content_value) ? json_decode($Section_6->content_value, true) : [];
@endphp

<div class="glass-cta">
    <div class="glass-container">
        <h2>{{ $Section_6_content_value['Sec6_title'] ?? 'Simplify, Organize, Grow' }}</h2>
        <p>{{ $Section_6_content_value['Sec6_subtitle'] ?? 'Let us help you find your perfect property' }}</p>
        <a href="{{ $Section_6_content_value['sec6_btn_link'] ?? '#' }}" class="glass-btn">Get Started <i class="fas fa-arrow-right"></i></a>
    </div>
</div>

<!-- ========== TESTIMONIALS CAROUSEL ========== -->
@php
    $Section_7 = App\Models\FrontHomePage::where('section', 'Section 7')->where('parent_id', $parent_id)->first();
    $Section_7_content_value = !empty($Section_7->content_value) ? json_decode($Section_7->content_value, true) : [];
    $activeTestimonials = [];
    for ($i = 1; $i <= 8; $i++) {
        if (!empty($Section_7_content_value["Sec7_box{$i}_Enabled"]) && $Section_7_content_value["Sec7_box{$i}_Enabled"] == 'active') {
            $activeTestimonials[] = $i;
        }
    }
    if (empty($activeTestimonials)) {
        $activeTestimonials = [1, 2, 3];
    }
@endphp

<section class="glass-section glass-section-light">
    <div class="glass-container">
        <div class="glass-section-header">
            <div class="glass-section-tag">💬 TESTIMONIALS</div>
            <h2>{{ $Section_7_content_value['Sec7_title'] ?? 'What Our Clients Say' }}</h2>
            <p>Real stories from happy customers</p>
        </div>

        <div class="glass-carousel" id="testimonialsCarousel">
            <div class="glass-carousel-track" id="testimonialsTrack">
                @foreach ($activeTestimonials as $num)
                <div class="glass-testimonial-card">
                    <i class="fas fa-quote-left"></i>
                    <p>{{ \Illuminate\Support\Str::limit($Section_7_content_value["Sec7_box{$num}_review"] ?? 'Amazing service! Highly recommend.', 150) }}</p>
                    <div class="glass-rating">★★★★★</div>
                    <div style="display: flex; align-items: center; gap: 12px; margin-top: auto;">
                        @php $imgPath = $Section_7_content_value["Sec7_box{$num}_image_path"] ?? ''; @endphp
                        @if(!empty($imgPath))
                            <img src="{{ asset(Storage::url($imgPath)) }}" style="width: 48px; height: 48px; border-radius: 50%; object-fit: cover;">
                        @else
                            <div style="width: 48px; height: 48px; background: #e2e8f0; border-radius: 50%; display: flex; align-items: center; justify-content: center;"><i class="fas fa-user" style="color: #007aff;"></i></div>
                        @endif
                        <div>
                            <strong>{{ $Section_7_content_value["Sec7_box{$num}_name"] ?? 'Client' }}</strong>
                            <br>
                            <span style="font-size: 12px; color: #8e8e93;">{{ $Section_7_content_value["Sec7_box{$num}_tag"] ?? 'Client' }}</span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="glass-carousel-nav glass-carousel-prev" id="testimonialsPrev"><i class="fas fa-chevron-left"></i></div>
            <div class="glass-carousel-nav glass-carousel-next" id="testimonialsNext"><i class="fas fa-chevron-right"></i></div>
        </div>
    </div>
</section>

<!-- ========== ABOUT (Section 4) ========== -->
@php
    $Section_4 = App\Models\FrontHomePage::where('section', 'Section 4')->where('parent_id', $parent_id)->first();
    $Section_4_content_value = !empty($Section_4->content_value) ? json_decode($Section_4->content_value, true) : [];
@endphp

<section class="glass-section">
    <div class="glass-container">
        <div class="glass-about-grid">
            <div class="glass-about-img">
                <img src="{{ asset(Storage::url($Section_4_content_value['about_image_path'] ?? '')) }}" alt="About Us">
            </div>
            <div>
                <div class="glass-about-card">
                    <i class="fas fa-heart" style="font-size: 28px; color: #007aff; margin-bottom: 16px;"></i>
                    <h3>{{ $Section_4_content_value['Sec4_title'] ?? 'We Love What We Do' }}</h3>
                    <p>With over a decade of experience, we've helped thousands find their perfect property.</p>
                </div>
                <div class="glass-about-card">
                    <i class="fas fa-bullseye" style="font-size: 28px; color: #007aff; margin-bottom: 16px;"></i>
                    <h3>Our Mission</h3>
                    <p>To make property buying and selling simple, transparent, and enjoyable for everyone.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ========== AMENITIES CAROUSEL ========== -->
@php
    $Section_3 = App\Models\FrontHomePage::where('section', 'Section 3')->where('parent_id', $parent_id)->first();
    $Section_3_content_value = !empty($Section_3->content_value) ? json_decode($Section_3->content_value, true) : [];
    $amenitiesList = isset($allAmenities) ? $allAmenities : collect();
@endphp

<section class="glass-section glass-section-light">
    <div class="glass-container">
        <div class="glass-section-header">
            <div class="glass-section-tag">🏆 PREMIUM AMENITIES</div>
            <h2>{{ $Section_3_content_value['Sec3_title'] ?? 'Available Amenities' }}</h2>
            <p>Discover world-class amenities designed for your comfort</p>
        </div>

        @if($amenitiesList->count() > 0)
            <div class="glass-carousel" id="amenitiesCarousel">
                <div class="glass-carousel-track" id="amenitiesTrack">
                    @foreach ($amenitiesList as $amenity)
                    <div class="glass-amenity-card">
                        <img src="{{ asset(Storage::url('upload/amenity/' . ($amenity->image ?? 'default.png'))) }}" alt="{{ $amenity->name }}">
                        <h4>{{ ucfirst($amenity->name) }}</h4>
                        <p>{{ \Illuminate\Support\Str::limit(strip_tags($amenity->description), 60) }}</p>
                    </div>
                    @endforeach
                </div>
                <div class="glass-carousel-nav glass-carousel-prev" id="amenitiesPrev"><i class="fas fa-chevron-left"></i></div>
                <div class="glass-carousel-nav glass-carousel-next" id="amenitiesNext"><i class="fas fa-chevron-right"></i></div>
            </div>
        @else
            <div style="text-align: center; padding: 60px; background: rgba(255,255,255,0.5); border-radius: 24px;">
                <i class="fas fa-cube" style="font-size: 48px; color: #007aff; opacity: 0.5;"></i>
                <h3 style="margin-top: 15px;">No Amenities Found</h3>
            </div>
        @endif
    </div>
</section>

<!-- ========== BLOG CAROUSEL (LATEST 3) ========== -->
@php
    $blogs = \App\Models\Blog::where('parent_id', $user->id)
        ->latest()
        ->take(3)
        ->get();
@endphp

@if($blogs->count() > 0)
<section class="glass-section">
    <div class="glass-container">
        <div class="glass-section-header">
            <div class="glass-section-tag">📰 LATEST INSIGHTS</div>
            <h2>From Our Blog</h2>
            <p>Tips, trends, and insights from real estate experts</p>
        </div>

        <div class="glass-carousel" id="blogCarousel">
            <div class="glass-carousel-track" id="blogTrack">
                @foreach ($blogs as $blog)
                    @php
                        $blogUrl = $isCustomDomain
                            ? route('custom.domain.blog.detail', ['slug' => $blog->slug])
                            : route('blog.detail', ['code' => $user->code, 'slug' => $blog->slug]);
                    @endphp
                    <div class="glass-blog-card">
                        <div class="glass-blog-img">
                            <img src="{{ asset(Storage::url($blog->image)) }}" alt="{{ $blog->title }}">
                        </div>
                        <div class="glass-blog-info">
                            <div class="glass-blog-meta">
                                <span><i class="fas fa-calendar-alt"></i> {{ date('M d, Y', strtotime($blog->created_at)) }}</span>
                                <span><i class="fas fa-user"></i> {{ $blog->author ?? 'Admin' }}</span>
                            </div>
                            <h3><a href="{{ $blogUrl }}">{{ \Illuminate\Support\Str::limit($blog->title, 50) }}</a></h3>
                            <p class="glass-blog-excerpt">{{ \Illuminate\Support\Str::limit(strip_tags($blog->content), 80) }}</p>
                            <a href="{{ $blogUrl }}" class="glass-blog-readmore">Read More <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="glass-carousel-nav glass-carousel-prev" id="blogPrev"><i class="fas fa-chevron-left"></i></div>
            <div class="glass-carousel-nav glass-carousel-next" id="blogNext"><i class="fas fa-chevron-right"></i></div>
        </div>

        <div class="glass-view-all">
            <a href="{{ $isCustomDomain ? route('custom.domain.blog') : route('blog.home', ['code' => $user->code]) }}">View All Articles <i class="fas fa-arrow-right"></i></a>
        </div>
    </div>
</section>
@endif

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
// Wait for DOM and jQuery to load
document.addEventListener('DOMContentLoaded', function() {

    // Country -> State filter (using plain JS)
    const countrySelect = document.getElementById('country');
    const stateSelect = document.getElementById('state');
    const citySelect = document.getElementById('city');

    if (countrySelect) {
        countrySelect.addEventListener('change', function() {
            var country = this.value;
            stateSelect.innerHTML = '<option value="">Loading...</option>';
            citySelect.innerHTML = '<option value="">Select City</option>';

            fetch("{{ $getStatesRoute }}?country=" + country)
                .then(response => response.json())
                .then(res => {
                    stateSelect.innerHTML = '<option value="">Select State</option>';
                    res.forEach(function(value) {
                        var option = document.createElement('option');
                        option.value = value;
                        option.textContent = value;
                        stateSelect.appendChild(option);
                    });
                })
                .catch(error => console.error('Error:', error));
        });
    }

    if (stateSelect) {
        stateSelect.addEventListener('change', function() {
            var state = this.value;
            citySelect.innerHTML = '<option value="">Loading...</option>';

            fetch("{{ $getCitiesRoute }}?state=" + state)
                .then(response => response.json())
                .then(res => {
                    citySelect.innerHTML = '<option value="">Select City</option>';
                    res.forEach(function(value) {
                        var option = document.createElement('option');
                        option.value = value;
                        option.textContent = value;
                        citySelect.appendChild(option);
                    });
                })
                .catch(error => console.error('Error:', error));
        });
    }

    // Reset button
    const resetBtn = document.getElementById('reset_button');
    if (resetBtn) {
        resetBtn.addEventListener('click', function(e) {
            e.preventDefault();
            window.location.href = this.href;
        });
    }

    // ========== AMENITIES CAROUSEL ==========
    const amenitiesTrack = document.getElementById('amenitiesTrack');
    const amenitiesPrev = document.getElementById('amenitiesPrev');
    const amenitiesNext = document.getElementById('amenitiesNext');

    if (amenitiesTrack && amenitiesPrev && amenitiesNext) {
        let position = 0;
        const firstCard = amenitiesTrack.children[0];
        const cardWidth = firstCard ? firstCard.offsetWidth + 24 : 244;
        const maxScroll = Math.max(0, amenitiesTrack.scrollWidth - amenitiesTrack.parentElement.offsetWidth);

        amenitiesNext.addEventListener('click', () => {
            if (position < maxScroll) {
                position = Math.min(position + cardWidth, maxScroll);
                amenitiesTrack.style.transform = `translateX(-${position}px)`;
            }
        });

        amenitiesPrev.addEventListener('click', () => {
            if (position > 0) {
                position = Math.max(position - cardWidth, 0);
                amenitiesTrack.style.transform = `translateX(-${position}px)`;
            }
        });
    }

    // ========== TESTIMONIALS CAROUSEL ==========
    const testimonialsTrack = document.getElementById('testimonialsTrack');
    const testimonialsPrev = document.getElementById('testimonialsPrev');
    const testimonialsNext = document.getElementById('testimonialsNext');

    if (testimonialsTrack && testimonialsPrev && testimonialsNext) {
        let position = 0;
        const firstCard = testimonialsTrack.children[0];
        const cardWidth = firstCard ? firstCard.offsetWidth + 24 : 364;
        const maxScroll = Math.max(0, testimonialsTrack.scrollWidth - testimonialsTrack.parentElement.offsetWidth);

        testimonialsNext.addEventListener('click', () => {
            if (position < maxScroll) {
                position = Math.min(position + cardWidth, maxScroll);
                testimonialsTrack.style.transform = `translateX(-${position}px)`;
            }
        });

        testimonialsPrev.addEventListener('click', () => {
            if (position > 0) {
                position = Math.max(position - cardWidth, 0);
                testimonialsTrack.style.transform = `translateX(-${position}px)`;
            }
        });
    }

    // ========== BLOG CAROUSEL ==========
    const blogTrack = document.getElementById('blogTrack');
    const blogPrev = document.getElementById('blogPrev');
    const blogNext = document.getElementById('blogNext');

    if (blogTrack && blogPrev && blogNext) {
        let position = 0;
        const firstCard = blogTrack.children[0];
        const cardWidth = firstCard ? firstCard.offsetWidth + 24 : 364;
        const maxScroll = Math.max(0, blogTrack.scrollWidth - blogTrack.parentElement.offsetWidth);

        blogNext.addEventListener('click', () => {
            if (position < maxScroll) {
                position = Math.min(position + cardWidth, maxScroll);
                blogTrack.style.transform = `translateX(-${position}px)`;
            }
        });

        blogPrev.addEventListener('click', () => {
            if (position > 0) {
                position = Math.max(position - cardWidth, 0);
                blogTrack.style.transform = `translateX(-${position}px)`;
            }
        });
    }
});
</script>

@endsection
