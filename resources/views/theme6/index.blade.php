@extends('theme6.main')
@section('content')

<style>
/* ============================================
   ÆTHER MAGAZINE - COMPLETELY NEW VISUAL IDENTITY
   Futuristic editorial layout with unified container
============================================ */

:root {
    --primary: #ff6b4a;
    --primary-dark: #e85d3e;
    --primary-glow: rgba(255, 107, 74, 0.25);
    --primary-soft: rgba(255, 107, 74, 0.1);
    --dark: #0a0c15;
    --charcoal: #1a1d2b;
    --gray: #6c727f;
    --light-mist: #f8f9fe;
    --white: #ffffff;
    --shadow-floating: 0 25px 45px -12px rgba(0, 0, 0, 0.12);
    --shadow-lift: 0 15px 30px -10px rgba(0, 0, 0, 0.08);
    --radius-card: 1.8rem;
    --radius-xl: 2.2rem;
}

/* ========== UNIFIED CONTAINER ========== */
.container-aether {
    max-width: 1280px;
    margin: 0 auto;
    padding: 0 28px;
    width: 100%;
}

/* ========== FRESH ANIMATIONS ========== */
@keyframes morphUp {
    0% { opacity: 0; transform: translateY(60px) scale(0.96); filter: blur(6px);}
    100% { opacity: 1; transform: translateY(0) scale(1); filter: blur(0);}
}
@keyframes slideGlide {
    0% { opacity: 0; transform: translateX(-45px); }
    100% { opacity: 1; transform: translateX(0); }
}
@keyframes scalePop {
    0% { opacity: 0; transform: scale(0.92); }
    100% { opacity: 1; transform: scale(1); }
}
@keyframes driftSlow {
    0% { opacity: 0; transform: translateY(40px) rotate(-1deg);}
    100% { opacity: 1; transform: translateY(0) rotate(0);}
}
.animate-morph { animation: morphUp 0.85s cubic-bezier(0.2, 0.9, 0.4, 1.1) forwards; }
.animate-glide { animation: slideGlide 0.7s ease forwards; }
.animate-pop { animation: scalePop 0.6s ease forwards; }
.animate-drift { animation: driftSlow 0.8s ease forwards; }
.delay-1 { animation-delay: 0.1s; }
.delay-2 { animation-delay: 0.2s; }
.delay-3 { animation-delay: 0.3s; }
.delay-4 { animation-delay: 0.4s; }
.delay-5 { animation-delay: 0.5s; }

/* ========== BUTTONS ========== */
.btn-aether {
    background: var(--primary);
    color: white;
    padding: 14px 34px;
    border-radius: 50px;
    font-weight: 600;
    display: inline-flex;
    align-items: center;
    gap: 10px;
    text-decoration: none;
    transition: all 0.25s ease;
    border: none;
    box-shadow: 0 8px 20px var(--primary-glow);
}
.btn-aether:hover {
    background: var(--primary-dark);
    transform: translateY(-4px);
    box-shadow: 0 18px 28px rgba(255,107,74,0.35);
}
.btn-outline-light {
    background: transparent;
    border: 1.5px solid rgba(255,255,255,0.4);
    backdrop-filter: blur(4px);
    box-shadow: none;
}
.btn-outline-light:hover {
    background: rgba(255,255,255,0.1);
    border-color: white;
}

/* ========== HERO - FULLSCREEN MAGAZINE ========== */
.hero-magazine {
    min-height: 90vh;
    position: relative;
    display: flex;
    align-items: center;
    background: #05070f;
    overflow: hidden;
}
.hero-backdrop {
    position: absolute;
    inset: 0;
    z-index: 0;
}
.hero-backdrop img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    filter: brightness(0.4) contrast(1.05);
    transition: transform 10s ease;
}
.hero-magazine:hover .hero-backdrop img {
    transform: scale(1.04);
}
.hero-content-new {
    position: relative;
    z-index: 2;
    max-width: 720px;
}
.hero-badge {
    display: inline-block;
    background: rgba(255,107,74,0.2);
    backdrop-filter: blur(8px);
    padding: 6px 18px;
    border-radius: 60px;
    font-size: 0.75rem;
    font-weight: 600;
    color: var(--primary);
    margin-bottom: 24px;
    border: 1px solid rgba(255,107,74,0.3);
}
.hero-magazine h1 {
    font-size: clamp(3rem, 8vw, 5.2rem);
    font-weight: 800;
    line-height: 1.08;
    color: white;
}
.hero-magazine h1 span {
    background: linear-gradient(135deg, #ffb69a, #ff4d2e);
    background-clip: text;
    -webkit-background-clip: text;
    color: transparent;
}
.hero-stats-row {
    display: flex;
    flex-wrap: wrap;
    gap: 2rem;
    margin-top: 2rem;
}
.hero-stats-row .stat-num {
    font-size: 2rem;
    font-weight: 800;
    color: var(--primary);
    line-height: 1;
}

/* ========== ASYMMETRICAL FEATURE GRID ========== */
.asym-feature {
    padding: 5rem 0;
    background: var(--light-mist);
}
.asym-grid-new {
    display: grid;
    grid-template-columns: 1.3fr 0.9fr;
    gap: 2rem;
}
.asym-large-card {
    background: white;
    border-radius: var(--radius-xl);
    overflow: hidden;
    box-shadow: var(--shadow-lift);
}
.asym-large-card img {
    width: 100%;
    height: 420px;
    object-fit: cover;
    transition: 0.5s;
}
.asym-large-card:hover img {
    transform: scale(1.02);
}
.asym-stack {
    display: flex;
    flex-direction: column;
    gap: 1.5rem;
}
.asym-info-card {
    background: white;
    padding: 1.8rem;
    border-radius: 1.6rem;
    transition: all 0.25s;
    border: 1px solid #efeff8;
}
.asym-info-card:hover {
    transform: translateX(10px);
    border-color: var(--primary-soft);
    box-shadow: var(--shadow-floating);
}

/* ========== TRIPTYCH FEATURES ========== */
.triptych-section {
    padding: 5rem 0;
    background: white;
}
.triptych-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 1.8rem;
}
.triptych-item {
    background: white;
    border-radius: 1.8rem;
    padding: 2rem 1.5rem;
    text-align: center;
    transition: all 0.3s;
    border: 1px solid #f0eff6;
    box-shadow: 0 10px 25px -8px rgba(0,0,0,0.03);
}
.triptych-item:hover {
    transform: translateY(-10px);
    border-color: var(--primary);
    box-shadow: var(--shadow-floating);
}
.triptych-icon {
    width: 70px;
    height: 70px;
    background: var(--primary-soft);
    border-radius: 28px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 1.2rem;
    font-size: 2rem;
    color: var(--primary);
    transition: 0.2s;
}
.triptych-item:hover .triptych-icon {
    background: var(--primary);
    color: white;
    transform: rotate(4deg);
}

/* ========== STATS GLASS SECTION ========== */
.stats-glass {
    background: linear-gradient(115deg, #ff6b4a, #db4a2a);
    padding: 3.5rem 0;
}
.stats-grid-glass {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 1.5rem;
    text-align: center;
}
.stat-glass-item {
    background: rgba(255,255,255,0.12);
    backdrop-filter: blur(10px);
    border-radius: 1.5rem;
    padding: 1.5rem;
    transition: 0.2s;
}
.stat-glass-item:hover {
    background: rgba(255,255,255,0.22);
    transform: translateY(-3px);
}

/* ========== OVERLAP FLOATING SECTION ========== */
.overlap-section-new {
    padding: 5rem 0 7rem;
    position: relative;
}
.overlap-wrapper {
    position: relative;
}
.overlap-image {
    width: 100%;
    border-radius: 2rem;
    overflow: hidden;
}
.overlap-image img {
    width: 100%;
    height: 400px;
    object-fit: cover;
}
.overlap-floating-card {
    background: white;
    border-radius: 2rem;
    box-shadow: var(--shadow-floating);
    padding: 2rem 2.2rem;
    width: 50%;
    margin-left: auto;
    margin-top: -3.5rem;
    position: relative;
    z-index: 4;
}
.overlap-floating-card ul {
    list-style: none;
    margin-top: 1rem;
}
.overlap-floating-card li {
    margin-bottom: 0.8rem;
    display: flex;
    align-items: center;
    gap: 10px;
}

/* ========== PROPERTY CINEMA GRID ========== */
.property-cinema {
    padding: 5rem 0;
    background: #ffffff;
}
.cinema-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 2rem;
}
.cinema-property-card {
    background: white;
    border-radius: 1.6rem;
    overflow: hidden;
    box-shadow: var(--shadow-lift);
    transition: all 0.3s;
}
.cinema-property-card:hover {
    transform: translateY(-12px);
    box-shadow: var(--shadow-floating);
}
.cinema-image {
    height: 240px;
    overflow: hidden;
}
.cinema-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: 0.5s;
}
.cinema-property-card:hover .cinema-image img {
    transform: scale(1.04);
}
.price-highlight {
    color: var(--primary);
    font-weight: 800;
    font-size: 1.3rem;
    margin: 10px 0;
}

/* ========== SPLIT CTA ========== */
.split-cta-new {
    display: grid;
    grid-template-columns: 1fr 1fr;
    background: #0f1222;
}
.split-left-new {
    background: var(--primary);
    padding: 3rem;
}
.split-right-new {
    background: #111624;
    padding: 3rem;
}

/* ========== CAROUSEL STYLES ========== */
.carousel-modern {
    overflow: hidden;
    padding: 1rem 0 2rem;
    position: relative;
}
.carousel-track {
    display: flex;
    gap: 1.8rem;
    transition: transform 0.5s cubic-bezier(0.2, 0.9, 0.4, 1);
}
.carousel-nav {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    background: white;
    width: 44px;
    height: 44px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    box-shadow: 0 5px 12px rgba(0,0,0,0.08);
    transition: 0.2s;
    z-index: 8;
}
.carousel-nav:hover {
    background: var(--primary);
    color: white;
}

/* ========== SECTION HEADER ========== */
.section-marker {
    text-align: center;
    margin-bottom: 2.5rem;
}
.section-marker .tag-line {
    background: var(--primary-soft);
    display: inline-block;
    padding: 0.3rem 1.2rem;
    border-radius: 2rem;
    font-size: 0.7rem;
    font-weight: 700;
    color: var(--primary);
}
.section-marker h2 {
    font-size: 2.2rem;
    margin-top: 0.5rem;
}

/* ========== RESPONSIVE ========== */
@media (max-width: 1024px) {
    .asym-grid-new, .triptych-grid, .cinema-grid, .stats-grid-glass {
        grid-template-columns: 1fr;
    }
    .overlap-floating-card {
        width: 90%;
        margin: -2rem auto 0;
        position: relative;
        left: 0;
        right: 0;
    }
    .split-cta-new {
        grid-template-columns: 1fr;
    }
    .hero-stats-row {
        flex-direction: column;
        gap: 0.8rem;
    }
}

@media (max-width: 768px) {
    .container-aether {
        padding: 0 20px;
    }
    .asym-feature, .triptych-section, .property-cinema, .overlap-section-new {
        padding: 3rem 0;
    }
    .hero-magazine {
        min-height: 80vh;
    }
}
</style>

<!-- ========== HERO MAGAZINE SECTION ========== -->
@php
    $Section_0 = App\Models\FrontHomePage::where('section', 'Section 0')->where('parent_id', $parent_id)->first();
    $Section_0_content_value = !empty($Section_0->content_value) ? json_decode($Section_0->content_value, true) : [];
@endphp

<section class="hero-magazine">
    <div class="hero-backdrop">
        <img src="{{ asset(Storage::url($Section_0_content_value['banner_image1_path'] ?? '')) }}" alt="Hero Visual">
    </div>
    <div class="container-aether">
        <div class="hero-content-new">

            <h1 class="animate-morph delay-1">{{ $Section_0_content_value['title'] ?? 'Find Your' }} <span>{{ __('Dream Horizon') }}</span></h1>
            <p class="animate-drift delay-2" style="color: #e2e8f0; font-size: 1.2rem;">{{ $Section_0_content_value['sub_title'] ?? 'Discover exceptional properties with our curated collection' }}</p>
            <div class="animate-pop delay-3" style="margin: 1.8rem 0 2rem;">
                <a href="{{ $isCustomDomain ? route('custom.domain.properties') : route('property.home', $user->code) }}" class="btn-aether">Explore Collection <i class="fas fa-arrow-right"></i></a>
            </div>
            <div class="hero-stats-row animate-morph delay-4">
                <div><span class="stat-num">500+</span><p style="color:#cbd5e1;">Properties</p></div>
                <div><span class="stat-num">98%</span><p style="color:#cbd5e1;">Satisfaction</p></div>
                <div><span class="stat-num">24/7</span><p style="color:#cbd5e1;">Support</p></div>
            </div>
        </div>
    </div>
</section>

<!-- ========== ASYMMETRICAL GRID (Section 4) ========== -->
@php
    $Section_4 = App\Models\FrontHomePage::where('section', 'Section 4')->where('parent_id', $parent_id)->first();
    $Section_4_content_value = !empty($Section_4->content_value) ? json_decode($Section_4->content_value, true) : [];
@endphp

<div class="asym-feature">
    <div class="container-aether">
        <div class="asym-grid-new">
            <div class="asym-large-card animate-pop">
                <img src="{{ asset(Storage::url($Section_4_content_value['about_image_path'] ?? '')) }}" alt="Vision">
            </div>
            <div class="asym-stack">
                <div class="asym-info-card animate-glide delay-1">
                    <i class="fas fa-heart" style="font-size: 2rem; color: var(--primary); margin-bottom: 1rem;"></i>
                    <h3>{{ $Section_4_content_value['Sec4_title'] ?? 'We Love What We Do' }}</h3>
                    <p>With over a decade of experience, we've helped thousands find their perfect property.</p>
                </div>
                <div class="asym-info-card animate-glide delay-2">
                    <i class="fas fa-bullseye" style="font-size: 2rem; color: var(--primary); margin-bottom: 1rem;"></i>
                    <h3>Our Mission</h3>
                    <p>To make property buying and selling simple, transparent, and enjoyable for everyone.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ========== FEATURES TRIPTYCH (Section 1) ========== -->
@php
    $Section_1 = App\Models\FrontHomePage::where('section', 'Section 1')->where('parent_id', $parent_id)->first();
    $Section_1_content_value = !empty($Section_1->content_value) ? json_decode($Section_1->content_value, true) : [];
@endphp

<div class="triptych-section">
    <div class="container-aether">
        <div class="section-marker">
            <span class="tag-line">WHY CHOOSE US</span>
            <h2>{{ $Section_1_content_value['Sec1_title'] ?? 'Simple & Transparent' }}</h2>
        </div>
        <div class="triptych-grid">
            @for ($i = 1; $i <= 3; $i++)
                @if (!empty($Section_1_content_value['Sec1_box' . $i . '_enabled']) && $Section_1_content_value['Sec1_box' . $i . '_enabled'] == 'active')
                <div class="triptych-item animate-pop delay-{{ $i }}">
                    <div class="triptych-icon"><i class="fas {{ $i == 1 ? 'fa-bolt' : ($i == 2 ? 'fa-shield-alt' : 'fa-headset') }}"></i></div>
                    <h3>{{ $Section_1_content_value['Sec1_box' . $i . '_title'] ?? 'Feature' }}</h3>
                    <p>{{ $Section_1_content_value['Sec1_box' . $i . '_info'] ?? 'Description' }}</p>
                </div>
                @endif
            @endfor
        </div>
    </div>
</div>

<!-- ========== STATS GLASS (Section 2) ========== -->
@php
    $Section_2 = App\Models\FrontHomePage::where('section', 'Section 2')->where('parent_id', $parent_id)->first();
    $Section_2_content_value = !empty($Section_2->content_value) ? json_decode($Section_2->content_value, true) : [];
@endphp

<div class="stats-glass">
    <div class="container-aether">
        <div class="stats-grid-glass">
            <div class="stat-glass-item"><div class="stat-num" style="color:white;">{{ $Section_2_content_value['Box1_number'] ?? '500' }}+</div><div>{{ $Section_2_content_value['Box1_title'] ?? 'Properties' }}</div></div>
            <div class="stat-glass-item"><div class="stat-num" style="color:white;">{{ $Section_2_content_value['Box2_number'] ?? '1000' }}+</div><div>{{ $Section_2_content_value['Box2_title'] ?? 'Happy Clients' }}</div></div>
            <div class="stat-glass-item"><div class="stat-num" style="color:white;">{{ $Section_2_content_value['Box3_number'] ?? '50' }}+</div><div>{{ $Section_2_content_value['Box3_title'] ?? 'Cities' }}</div></div>
            <div class="stat-glass-item"><div class="stat-num" style="color:white;">{{ $Section_2_content_value['Box4_number'] ?? '10' }}+</div><div>{{ $Section_2_content_value['Box4_title'] ?? 'Years' }}</div></div>
        </div>
    </div>
</div>

<!-- ========== AMENITIES CAROUSEL (Section 3 + allAmenities) ========== -->
@php
    $Section_3 = App\Models\FrontHomePage::where('section', 'Section 3')->where('parent_id', $parent_id)->first();
    $Section_3_content_value = !empty($Section_3->content_value) ? json_decode($Section_3->content_value, true) : [];
@endphp

<div class="triptych-section" style="background: #fefaf8;">
    <div class="container-aether">
        <div class="section-marker">
            <span class="tag-line">PREMIUM AMENITIES</span>
            <h2>{{ $Section_3_content_value['Sec3_title'] ?? 'Available Amenities' }}</h2>
            <p>{{ $Section_3_content_value['Sec3_info'] ?? 'Discover world-class amenities designed for your comfort' }}</p>
        </div>
        <div class="carousel-modern" id="amenitiesCarousel">
            <div class="carousel-track" id="amenitiesTrack">
                @if(isset($allAmenities) && count($allAmenities) > 0)
                    @foreach ($allAmenities as $amenity)
                    <div class="triptych-item" style="min-width: 270px;">
                        <div style="width: 80px; height:80px; margin:0 auto 1rem; border-radius: 50%; overflow: hidden; background:#f3f4f6;">
                            <img src="{{ asset(Storage::url('upload/amenity/' . ($amenity->image ?? 'default.png'))) }}" style="width:100%;height:100%;object-fit:cover;">
                        </div>
                        <h4>{{ ucfirst($amenity->name) }}</h4>
                        <p style="font-size: 13px;">{{ \Illuminate\Support\Str::limit(strip_tags($amenity->description), 50) }}</p>
                    </div>
                    @endforeach
                    @foreach ($allAmenities as $amenity)
                    <div class="triptych-item" style="min-width: 270px;">
                        <div style="width: 80px; height:80px; margin:0 auto 1rem; border-radius: 50%; overflow: hidden;">
                            <img src="{{ asset(Storage::url('upload/amenity/' . ($amenity->image ?? 'default.png'))) }}" style="width:100%;height:100%;object-fit:cover;">
                        </div>
                        <h4>{{ ucfirst($amenity->name) }}</h4>
                        <p style="font-size: 13px;">{{ \Illuminate\Support\Str::limit(strip_tags($amenity->description), 50) }}</p>
                    </div>
                    @endforeach
                @endif
            </div>
            <div class="carousel-nav" id="amenitiesPrev" style="left: -10px;"><i class="fas fa-chevron-left"></i></div>
            <div class="carousel-nav" id="amenitiesNext" style="right: -10px;"><i class="fas fa-chevron-right"></i></div>
        </div>
    </div>
</div>

<!-- ========== OVERLAP FLOATING SECTION ========== -->
<div class="overlap-section-new">
    <div class="container-aether">
        <div class="overlap-wrapper">
            <div class="overlap-image">
                <img src="{{ asset(Storage::url($Section_4_content_value['about_image_path'] ?? '')) }}" alt="Why Choose Us">
            </div>
            <div class="overlap-floating-card">
                <h3 style="font-size: 1.6rem;">Why Choose Us?</h3>
                <ul>
                    <li><i class="fas fa-check-circle" style="color: #ff6b4a;"></i> Expert Guidance</li>
                    <li><i class="fas fa-check-circle" style="color: #ff6b4a;"></i> Best Price Guarantee</li>
                    <li><i class="fas fa-check-circle" style="color: #ff6b4a;"></i> 24/7 Customer Support</li>
                    <li><i class="fas fa-check-circle" style="color: #ff6b4a;"></i> Hassle-Free Process</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- ========== PROPERTIES CINEMA GRID (Section 5) ========== -->
@php
    $Section_5 = App\Models\FrontHomePage::where('section', 'Section 5')->first();
    $Section_5_content_value = !empty($Section_5->content_value) ? json_decode($Section_5->content_value, true) : [];

    // Get latest 8 properties directly
    $latestProperties = \App\Models\Property::where('parent_id', $user->id)
        ->latest()
        ->take(8)
        ->get();
@endphp

<div class="property-cinema">
    <div class="container-aether">
        <div class="section-marker">
            <span class="tag-line">FEATURED LISTINGS</span>
            <h2>{{ $Section_5_content_value['Sec5_title'] ?? 'Popular Properties' }}</h2>
        </div>

        @if($latestProperties->count() > 0)
            <div class="cinema-grid">
                @foreach ($latestProperties as $index => $property)
                    @php
                        $thumbnail = !empty($property->thumbnail->image) ? $property->thumbnail->image : 'default.jpg';
                    @endphp
                    <div class="cinema-property-card animate-pop delay-{{ ($index % 3) + 1 }}">
                        <div class="cinema-image">
                            <img src="{{ asset(Storage::url('upload/property/thumbnail/' . $thumbnail)) }}" alt="{{ $property->name }}">
                        </div>
                        <div style="padding: 1.5rem;">
                            <span style="color: var(--primary); font-weight: 600;">{{ ucfirst($property->listing_type ?? 'Property') }}</span>
                            <h3 style="margin: 8px 0;">{{ ucfirst($property->name) }}</h3>
                            <p style="color: var(--gray); font-size: 0.85rem;">{{ \Illuminate\Support\Str::limit(strip_tags($property->description ?? ''), 60) }}</p>
                            <div class="price-highlight">
                                @if(function_exists('priceformat'))
                                    {{ priceformat($property->price) }}
                                @else
                                    ${{ number_format($property->price ?? 0, 0, '.', ',') }}
                                @endif
                            </div>
                            <a href="{{ $isCustomDomain ? route('custom.domain.property.detail', ['id' => \Crypt::encrypt($property->id)]) : route('property.detail', ['code' => $user->code, \Crypt::encrypt($property->id)]) }}" style="color: var(--primary); text-decoration: none; font-weight: 500;">View Details →</a>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div style="text-align: center; padding: 60px; background: #f8f9fa; border-radius: 20px;">
                <i class="fas fa-building" style="font-size: 50px; color: var(--primary); opacity: 0.5;"></i>
                <h3 style="margin-top: 15px;">No Properties Found</h3>
                <p>No properties are available at the moment. Please check back later.</p>
            </div>
        @endif
    </div>
</div>

<!-- ========== SPLIT CTA (Section 6) ========== -->
@php
    $Section_6 = App\Models\FrontHomePage::where('section', 'Section 6')->where('parent_id', $parent_id)->first();
    $Section_6_content_value = !empty($Section_6->content_value) ? json_decode($Section_6->content_value, true) : [];
@endphp

<div class="container split-cta-new">
    <div class=" split-left-new animate-glide">
        <div class="container-aether" style="padding: 0;">
            <h2 style="color:white; font-size: 2rem;">{{ $Section_6_content_value['Sec6_title'] ?? 'Ready to Get Started?' }}</h2>
            <p style="color:#ffefe8;">Let us help you find your perfect property</p>
            <a href="{{ $Section_6_content_value['sec6_btn_link'] ?? '#' }}" class="btn-aether" style="background:white; color:var(--primary); margin-top: 1.5rem; display: inline-block;">Get Started →</a>
        </div>
    </div>
    <div class="split-right-new animate-glide delay-1">
        <div class="container-aether" style="padding: 0;">
            <h2 style="color:white;">Need Help?</h2>
            <p style="color:#b9c3e0;">Our experts are here 24/7</p>
            <a href="{{ route('contact.home', $user->code) }}" class="btn-aether btn-outline-light" style="margin-top: 1.5rem; display: inline-block;">Contact Us →</a>
        </div>
    </div>
</div>

<!-- ========== TESTIMONIALS CAROUSEL (Section 7) ========== -->
@php
    $Section_7 = App\Models\FrontHomePage::where('section', 'Section 7')->where('parent_id', $parent_id)->first();
    $Section_7_content_value = !empty($Section_7->content_value) ? json_decode($Section_7->content_value, true) : [];
    $activeTestimonials = [];
    for ($i = 1; $i <= 8; $i++) {
        if (!empty($Section_7_content_value["Sec7_box{$i}_Enabled"]) && $Section_7_content_value["Sec7_box{$i}_Enabled"] == 'active') {
            $activeTestimonials[] = $i;
        }
    }
@endphp

<div class="triptych-section" style="background: white;">
    <div class="container-aether">
        <div class="section-marker">
            <span class="tag-line">TESTIMONIALS</span>
            <h2>{{ $Section_7_content_value['Sec7_title'] ?? 'What Our Clients Say' }}</h2>
        </div>
        <div class="carousel-modern" id="testimonialsCarousel">
            <div class="carousel-track" id="testimonialsTrack">
                @foreach ($activeTestimonials as $num)
                <div class="triptych-item" style="min-width: 340px; text-align: left;">
                    <div style="font-size: 3rem; color: var(--primary); opacity: 0.3;">“</div>
                    <p>{{ \Illuminate\Support\Str::limit($Section_7_content_value["Sec7_box{$num}_review"] ?? '', 120) }}</p>
                    <div style="display: flex; align-items: center; gap: 1rem; margin-top: 1.2rem;">
                        <img src="{{ asset(Storage::url($Section_7_content_value["Sec7_box{$num}_image_path"] ?? '')) }}" style="width: 48px; height: 48px; border-radius: 50%; object-fit: cover;">
                        <div><strong>{{ $Section_7_content_value["Sec7_box{$num}_name"] ?? 'Client' }}</strong><br><span style="font-size: 12px;">{{ $Section_7_content_value["Sec7_box{$num}_tag"] ?? 'Client' }}</span></div>
                    </div>
                    <div style="margin-top: 10px; color: #f5b042;">★★★★★</div>
                </div>
                @endforeach
                @foreach ($activeTestimonials as $num)
                <div class="triptych-item" style="min-width: 340px; text-align: left;">
                    <div style="font-size: 3rem; color: var(--primary); opacity: 0.3;">“</div>
                    <p>{{ \Illuminate\Support\Str::limit($Section_7_content_value["Sec7_box{$num}_review"] ?? '', 120) }}</p>
                    <div style="display: flex; align-items: center; gap: 1rem; margin-top: 1.2rem;">
                        <img src="{{ asset(Storage::url($Section_7_content_value["Sec7_box{$num}_image_path"] ?? '')) }}" style="width: 48px; height: 48px; border-radius: 50%; object-fit: cover;">
                        <div><strong>{{ $Section_7_content_value["Sec7_box{$num}_name"] ?? 'Client' }}</strong><br><span style="font-size: 12px;">{{ $Section_7_content_value["Sec7_box{$num}_tag"] ?? 'Client' }}</span></div>
                    </div>
                    <div style="margin-top: 10px; color: #f5b042;">★★★★★</div>
                </div>
                @endforeach
            </div>
            <div class="carousel-nav" id="testimonialsPrev" style="left: -10px;"><i class="fas fa-chevron-left"></i></div>
            <div class="carousel-nav" id="testimonialsNext" style="right: -10px;"><i class="fas fa-chevron-right"></i></div>
        </div>
    </div>
</div>

@endsection

@push('theme6-script')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Amenities Carousel
    const amenitiesTrack = document.getElementById('amenitiesTrack');
    const amenitiesPrev = document.getElementById('amenitiesPrev');
    const amenitiesNext = document.getElementById('amenitiesNext');

    if (amenitiesTrack && amenitiesPrev && amenitiesNext) {
        let position = 0;
        const firstCard = amenitiesTrack.children[0];
        const cardWidth = firstCard ? firstCard.offsetWidth + 28 : 298;
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

    // Testimonials Carousel
    const testimonialsTrack = document.getElementById('testimonialsTrack');
    const testimonialsPrev = document.getElementById('testimonialsPrev');
    const testimonialsNext = document.getElementById('testimonialsNext');

    if (testimonialsTrack && testimonialsPrev && testimonialsNext) {
        let position = 0;
        const firstCard = testimonialsTrack.children[0];
        const cardWidth = firstCard ? firstCard.offsetWidth + 28 : 368;
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

    // Scroll reveal animation
    const revealElements = document.querySelectorAll('.triptych-item, .cinema-property-card, .asym-info-card, .stat-glass-item');
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.1 });

    revealElements.forEach(el => {
        el.style.opacity = '0';
        el.style.transform = 'translateY(25px)';
        el.style.transition = 'all 0.6s ease';
        observer.observe(el);
    });
});
</script>
@endpush
