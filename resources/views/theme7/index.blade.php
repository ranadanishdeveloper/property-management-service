@extends('theme7.main')
@section('content')

<style>
/* ============================================
   THEME 7 - NEON BRUTALIST (LIGHT VERSION)
   Colors: Neon Pink #ff2a6d + Cyan #05d9e8
   Background: Light #f8f9fa
   Clean border-radius: 8px (consistent with other pages)
   ============================================ */

/* ---------- VARIABLES ---------- */
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

/* ---------- CONTAINER - FIXED WIDTH, NO OVERFLOW ---------- */
.cyber-container {
    max-width: 1280px;
    margin: 0 auto;
    padding: 0 24px;
    width: 100%;
    overflow-x: hidden;
}

/* ---------- SECTION COMMON ---------- */
.cyber-section {
    padding: 80px 0;
    overflow-x: hidden;
}

.cyber-section-tag {
    display: inline-block;
    border-left: 4px solid var(--neon-pink);
    padding-left: 12px;
    font-size: 12px;
    font-weight: 700;
    color: var(--neon-cyan);
    letter-spacing: 3px;
    margin-bottom: 20px;
}

.cyber-section-title {
    font-size: 2.5rem;
    margin-bottom: 48px;
    color: var(--dark-text);
    text-transform: uppercase;
}

/* ========== TOP BANNER ========== */
.cyber-top-banner {
    position: relative;
    min-height: 85vh;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    background: var(--light-bg);
    overflow: hidden;
    border-radius: 8px;
    margin-top: 80px;
}

.cyber-banner-bg {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 0;
}

.cyber-banner-bg img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    opacity: 0.3;
    transition: transform 8s ease;
}

.cyber-top-banner:hover .cyber-banner-bg img {
    transform: scale(1.05);
}

.cyber-banner-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(135deg, rgba(255, 42, 109, 0.1), rgba(5, 217, 232, 0.05));
    z-index: 1;
}

.cyber-banner-content {
    position: relative;
    z-index: 2;
    max-width: 800px;
    padding: 40px;
}

.cyber-banner-badge {
    display: inline-block;
    background: rgba(255, 42, 109, 0.1);
    border: 1px solid var(--neon-pink);
    padding: 6px 18px;
    font-size: 11px;
    font-weight: 700;
    letter-spacing: 3px;
    color: var(--neon-pink);
    margin-bottom: 24px;
    border-radius: 6px;
}

.cyber-banner-content h1 {
    font-size: clamp(2.5rem, 6vw, 4.5rem);
    color: var(--dark-text);
    margin-bottom: 20px;
}

.cyber-banner-content h1 span {
    color: var(--neon-cyan);
}

.cyber-banner-content p {
    color: var(--gray-text);
    font-size: 1.1rem;
    margin-bottom: 32px;
}

.cyber-banner-btn {
    display: inline-flex;
    align-items: center;
    gap: 12px;
    background: var(--neon-pink);
    color: white;
    padding: 14px 36px;
    text-decoration: none;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: 2px;
    transition: all 0.2s;
    border-radius: 6px;
}

.cyber-banner-btn:hover {
    background: var(--neon-cyan);
    color: var(--dark-text);
    transform: translateY(-3px);
}

/* ========== CAROUSEL COMMON - FIXED OVERFLOW ========== */
.cyber-carousel {
    overflow-x: auto;
    overflow-y: hidden;
    position: relative;
    padding: 20px 0;
    scrollbar-width: thin;
    -webkit-overflow-scrolling: touch;
}

.cyber-carousel::-webkit-scrollbar {
    height: 6px;
}

.cyber-carousel::-webkit-scrollbar-track {
    background: #e9ecef;
    border-radius: 10px;
}

.cyber-carousel::-webkit-scrollbar-thumb {
    background: var(--neon-pink);
    border-radius: 10px;
}

.cyber-carousel-track {
    display: flex;
    gap: 24px;
    width: max-content;
}

/* ========== PROPERTY ITEM - CLEAN RADIUS ========== */
.cyber-property-item {
    width: 320px;
    flex-shrink: 0;
    background: var(--card-bg);
    border: 2px solid var(--neon-pink);
    transition: all 0.2s;
    border-radius: 8px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.05);
    overflow: hidden;
}

.cyber-property-item:hover {
    transform: translateY(-8px);
    border-color: var(--neon-cyan);
    box-shadow: var(--glow-cyan);
}

.cyber-property-img {
    height: 220px;
    overflow: hidden;
}

.cyber-property-img img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.cyber-property-info {
    padding: 20px;
}

.cyber-property-info h3 {
    color: var(--dark-text);
}

.cyber-property-price {
    color: var(--neon-pink);
    font-size: 1.3rem;
    font-weight: 800;
    margin: 10px 0;
}

/* ========== AMENITY ITEM - CLEAN RADIUS ========== */
.cyber-amenity-item {
    width: 240px;
    flex-shrink: 0;
    background: var(--card-bg);
    border: 1px solid var(--neon-cyan);
    padding: 28px 20px;
    text-align: center;
    box-shadow: 0 2px 8px rgba(0,0,0,0.05);
    min-height: 240px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    border-radius: 8px;
}

.cyber-amenity-item img {
    width: 70px;
    height: 70px;
    object-fit: cover;
    margin-bottom: 16px;
    border-radius: 50%;
}

.cyber-amenity-item h4 {
    color: var(--dark-text);
    margin-bottom: 8px;
}

.cyber-amenity-item p {
    font-size: 12px;
    color: var(--gray-text);
    margin-top: 8px;
}

.cyber-amenity-item:hover {
    border-color: var(--neon-pink);
    transform: translateY(-5px);
}

/* ========== TESTIMONIAL ITEM - CLEAN RADIUS ========== */
.cyber-testimonial-item {
    width: 340px;
    flex-shrink: 0;
    background: var(--card-bg);
    border: 1px solid var(--neon-cyan);
    padding: 28px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.05);
    border-radius: 8px;
}

.cyber-testimonial-item:hover {
    border-color: var(--neon-pink);
    transform: translateX(8px);
}

.cyber-rating {
    color: #f59e0b;
    margin: 16px 0;
}

/* ========== HERO (SPLIT SCREEN) ========== */
.cyber-hero {
    min-height: 85vh;
    display: grid;
    grid-template-columns: 1fr 1fr;
    background: var(--light-bg);
    width: 100%;
    max-width: 100%;
    overflow-x: hidden;
    border-radius: 8px;
    margin: 40px 0;
}

.cyber-hero-left {
    padding: 80px 40px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    width: 100%;
    overflow-x: hidden;
}

.cyber-hero-left h1 {
    font-size: 3.5rem;
    margin: 20px 0;
    color: var(--dark-text);
    word-wrap: break-word;
}

.cyber-typewriter {
    font-family: 'Space Mono', monospace;
    font-size: 1.1rem;
    color: var(--neon-cyan);
    margin-bottom: 30px;
    border-right: 3px solid var(--neon-pink);
    width: fit-content;
    white-space: nowrap;
    overflow: hidden;
    animation: typing 3s steps(30, end), blink 0.8s step-end infinite;
}

@keyframes typing {
    from { width: 0; }
    to { width: 100%; }
}

@keyframes blink {
    0%, 100% { border-color: transparent; }
    50% { border-color: var(--neon-pink); }
}

.cyber-hero-right {
    display: flex;
    align-items: center;
    justify-content: center;
    position: relative;
    width: 100%;
    overflow-x: hidden;
}

.cyber-3d-card {
    width: 300px;
    max-width: 90%;
    height: 400px;
    background: var(--card-bg);
    border: 3px solid var(--neon-cyan);
    transform: rotate(8deg) perspective(1000px) rotateY(-10deg);
    transition: all 0.3s;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    gap: 20px;
    box-shadow: 0 4px 16px rgba(0,0,0,0.08);
    border-radius: 8px;
}

.cyber-3d-card:hover {
    transform: rotate(0deg) perspective(1000px) rotateY(0deg);
    border-color: var(--neon-pink);
}

.cyber-btn {
    display: inline-block;
    background: transparent;
    border: 2px solid var(--neon-pink);
    padding: 12px 32px;
    color: var(--neon-pink);
    text-decoration: none;
    font-weight: 800;
    transition: all 0.2s;
    width: fit-content;
    border-radius: 6px;
}

.cyber-btn:hover {
    background: var(--neon-pink);
    color: white;
}

/* ========== STATS ========== */
.cyber-stats {
    background: var(--light-bg);
    padding: 60px 0;
    border-top: 1px solid #e9ecef;
    border-bottom: 1px solid #e9ecef;
}

.cyber-stats-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 40px;
    text-align: center;
}

.cyber-stat .num {
    font-size: 3rem;
    font-weight: 800;
    color: var(--neon-pink);
    font-family: 'Space Mono', monospace;
}

.cyber-stat .label {
    color: var(--gray-text);
    font-size: 12px;
    letter-spacing: 2px;
}

/* ========== CTA ========== */
.cyber-cta {
    background: linear-gradient(135deg, var(--neon-pink), var(--neon-purple));
    padding: 80px 0;
    text-align: center;
    border-radius: 8px;
    margin: 40px 0;
}

.cyber-cta h2 {
    font-size: 2.5rem;
    margin-bottom: 20px;
    color: white;
}

.cyber-cta .cyber-btn {
    border-color: white;
    color: white;
    margin-top: 20px;
}

.cyber-cta .cyber-btn:hover {
    background: white;
    color: var(--neon-pink);
}

/* ========== FEATURES ========== */
.cyber-features {
    padding: 80px 0;
    background: var(--light-bg);
}

.cyber-features-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 28px;
}

.cyber-feature {
    background: var(--card-bg);
    border: 1px solid var(--neon-pink);
    padding: 32px 24px;
    text-align: center;
    box-shadow: 0 2px 8px rgba(0,0,0,0.05);
    border-radius: 8px;
}

.cyber-feature h3 {
    color: var(--dark-text);
}

.cyber-feature-icon {
    font-size: 40px;
    color: var(--neon-cyan);
    margin-bottom: 20px;
}

.cyber-feature:hover {
    border-color: var(--neon-cyan);
    transform: translateY(-8px);
}

/* ========== ABOUT ========== */
.cyber-about {
    padding: 80px 0;
    background: var(--light-bg);
}

.cyber-about-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 40px;
}

.cyber-about-img img {
    width: 100%;
    border: 3px solid var(--neon-pink);
    border-radius: 8px;
}

.cyber-about-card {
    background: var(--card-bg);
    border-left: 4px solid var(--neon-cyan);
    padding: 28px;
    margin-bottom: 24px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.05);
    border-radius: 8px;
}

/* ========== RESPONSIVE ========== */
@media (max-width: 1024px) {
    .cyber-features-grid,
    .cyber-about-grid {
        grid-template-columns: 1fr;
    }
    .cyber-hero {
        grid-template-columns: 1fr;
    }
    .cyber-stats-grid {
        grid-template-columns: repeat(2, 1fr);
    }
    .cyber-property-item {
        width: 280px;
    }
    .cyber-amenity-item {
        width: 220px;
    }
    .cyber-testimonial-item {
        width: 300px;
    }
}

@media (max-width: 768px) {
    .cyber-section {
        padding: 50px 0;
    }
    .cyber-section-title {
        font-size: 1.8rem;
    }
    .cyber-features-grid {
        grid-template-columns: 1fr;
    }
    .cyber-hero-left h1 {
        font-size: 2rem;
    }
    .cyber-typewriter {
        font-size: 0.8rem;
        white-space: normal;
        animation: none;
    }
    .cyber-stats-grid {
        grid-template-columns: 1fr;
    }
    .cyber-property-item {
        width: 260px;
    }
    .cyber-testimonial-item {
        width: 280px;
    }
    .cyber-amenity-item {
        width: 200px;
        min-height: 220px;
    }
    .cyber-amenity-item img {
        width: 60px;
        height: 60px;
    }
    .cyber-hero-left {
        padding: 40px 20px;
    }
    .cyber-3d-card {
        width: 250px;
        height: 320px;
    }
}

@media (max-width: 480px) {
    .cyber-container {
        padding: 0 16px;
    }
    .cyber-property-item {
        width: 100%;
    }
    .cyber-amenity-item {
        width: 100%;
    }
    .cyber-testimonial-item {
        width: 100%;
    }
}

/* ---------- ANIMATIONS ---------- */
@keyframes fadeUp {
    from { opacity: 0; transform: translateY(30px); }
    to { opacity: 1; transform: translateY(0); }
}

.animate-fade {
    animation: fadeUp 0.6s ease forwards;
    opacity: 0;
}

.delay-1 { animation-delay: 0.1s; }
.delay-2 { animation-delay: 0.2s; }
.delay-3 { animation-delay: 0.3s; }
</style>

<!-- ========== TOP BANNER ========== -->
@php
    $Section_0 = App\Models\FrontHomePage::where('section', 'Section 0')->where('parent_id', $parent_id)->first();
    $Section_0_content_value = !empty($Section_0->content_value) ? json_decode($Section_0->content_value, true) : [];

    $bannerImage = !empty($Section_0_content_value['banner_image1_path'])
        ? $Section_0_content_value['banner_image1_path']
        : '';
@endphp

<div class="cyber-top-banner">
    <div class="cyber-banner-bg">
        <img src="{{ asset(Storage::url($bannerImage)) }}" alt="Banner">
    </div>
    <div class="cyber-banner-overlay"></div>
    <div class="cyber-banner-content">
        <div class="cyber-banner-badge">// EXCLUSIVE OFFER</div>
        <h1>{{ $Section_0_content_value['title'] ?? 'FIND YOUR' }} <span>{{ __('DREAM PROPERTY') }}</span></h1>
        <p>{{ $Section_0_content_value['sub_title'] ?? 'Discover exceptional properties with our curated collection. Limited time offers available.' }}</p>
        <a href="{{ $isCustomDomain ? route('custom.domain.properties') : route('property.home', $user->code) }}" class="cyber-banner-btn">
            EXPLORE NOW <i class="fas fa-arrow-right"></i>
        </a>
    </div>
</div>

<!-- ========== PROPERTIES CAROUSEL ========== -->
@php
    $Section_5 = App\Models\FrontHomePage::where('section', 'Section 5')->first();
    $Section_5_content_value = !empty($Section_5->content_value) ? json_decode($Section_5->content_value, true) : [];

    $latestProperties = \App\Models\Property::where('parent_id', $user->id)
        ->latest()
        ->take(10)
        ->get();
@endphp

<div class="cyber-section">
    <div class="cyber-container">
        <div class="cyber-section-tag">// HOT LISTINGS</div>
        <h2 class="cyber-section-title">{{ $Section_5_content_value['Sec5_title'] ?? 'PROPERTIES YOU\'LL LOVE' }}</h2>

        @if($latestProperties->count() > 0)
            <div class="cyber-carousel" id="propertiesCarousel">
                <div class="cyber-carousel-track" id="propertiesTrack">
                    @foreach ($latestProperties as $property)
                        @php
                            $thumbnail = !empty($property->thumbnail->image) ? $property->thumbnail->image : 'default.jpg';
                        @endphp
                        <div class="cyber-property-item">
                            <div class="cyber-property-img">
                                <img src="{{ asset(Storage::url('upload/property/thumbnail/' . $thumbnail)) }}" alt="{{ $property->name }}">
                            </div>
                            <div class="cyber-property-info">
                                <span style="color: var(--neon-cyan); font-size: 11px;">{{ ucfirst($property->listing_type ?? 'PROPERTY') }}</span>
                                <h3 style="margin: 8px 0;">{{ ucfirst($property->name) }}</h3>
                                <div class="cyber-property-price">
                                    @if(function_exists('priceformat'))
                                        {{ priceformat($property->price) }}
                                    @else
                                        ${{ number_format($property->price ?? 0, 0, '.', ',') }}
                                    @endif
                                </div>
                                <a href="{{ $isCustomDomain ? route('custom.domain.property.detail', ['id' => \Crypt::encrypt($property->id)]) : route('property.detail', ['code' => $user->code, \Crypt::encrypt($property->id)]) }}" style="color: var(--neon-cyan); text-decoration: none;">VIEW →</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @else
            <div style="text-align: center; padding: 60px; background: var(--card-bg); border: 2px solid var(--neon-pink); border-radius: 8px;">
                <i class="fas fa-building" style="font-size: 48px; color: var(--neon-pink);"></i>
                <h3>NO PROPERTIES FOUND</h3>
            </div>
        @endif
    </div>
</div>

<!-- ========== HERO (SPLIT SCREEN) ========== -->
<div class="cyber-hero">
    <div class="cyber-hero-left">
        <div class="cyber-section-tag">// EST. 2024</div>
        <h1>{{ $Section_0_content_value['title'] ?? 'FIND YOUR' }} <span>{{ __('EDGE') }}</span></h1>
        <div class="cyber-typewriter">{{ $Section_0_content_value['sub_title'] ?? 'DISCOVER EXCEPTIONAL PROPERTIES' }}</div>
        <a href="{{ $isCustomDomain ? route('custom.domain.properties') : route('property.home', $user->code) }}" class="cyber-btn" style="margin-top: 20px">EXPLORE →</a>
    </div>
    <div class="cyber-hero-right">
        <div class="cyber-3d-card">
            <i class="fas fa-building" style="font-size: 80px; color: var(--neon-cyan);"></i>
            <p style="text-align: center; padding: 0 20px;">{{ $Section_0_content_value['title'] ?? 'FIND YOUR' }}</p>
            <div style="width: 80%; height: 2px; background: var(--neon-pink);"></div>
            <span style="color: var(--neon-pink);">500+ PROPERTIES</span>
        </div>
    </div>
</div>

<!-- ========== STATS ========== -->
@php
    $Section_2 = App\Models\FrontHomePage::where('section', 'Section 2')->where('parent_id', $parent_id)->first();
    $Section_2_content_value = !empty($Section_2->content_value) ? json_decode($Section_2->content_value, true) : [];
@endphp

<div class="cyber-stats">
    <div class="cyber-container">
        <div class="cyber-stats-grid">
            <div class="cyber-stat"><div class="num">{{ $Section_2_content_value['Box1_number'] ?? '500' }}+</div><div class="label">{{ $Section_2_content_value['Box1_title'] ?? 'PROPERTIES' }}</div></div>
            <div class="cyber-stat"><div class="num">{{ $Section_2_content_value['Box2_number'] ?? '1000' }}+</div><div class="label">{{ $Section_2_content_value['Box2_title'] ?? 'HAPPY CLIENTS' }}</div></div>
            <div class="cyber-stat"><div class="num">{{ $Section_2_content_value['Box3_number'] ?? '50' }}+</div><div class="label">{{ $Section_2_content_value['Box3_title'] ?? 'CITIES' }}</div></div>
            <div class="cyber-stat"><div class="num">{{ $Section_2_content_value['Box4_number'] ?? '10' }}+</div><div class="label">{{ $Section_2_content_value['Box4_title'] ?? 'YEARS' }}</div></div>
        </div>
    </div>
</div>

<!-- ========== CTA ========== -->
@php
    $Section_6 = App\Models\FrontHomePage::where('section', 'Section 6')->where('parent_id', $parent_id)->first();
    $Section_6_content_value = !empty($Section_6->content_value) ? json_decode($Section_6->content_value, true) : [];
@endphp

<div class="cyber-cta">
    <div class="cyber-container">
        <h2>{{ $Section_6_content_value['Sec6_title'] ?? 'READY TO GET STARTED?' }}</h2>
        <p style="margin-bottom: 20px;">{{ __('Let us help you find your perfect property') }}</p>
        <a href="{{ $Section_6_content_value['sec6_btn_link'] ?? '#' }}" class="cyber-btn">GET STARTED →</a>
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

<div class="cyber-section">
    <div class="cyber-container">
        <div class="cyber-section-tag">// CLIENT LOVE</div>
        <h2 class="cyber-section-title">{{ $Section_7_content_value['Sec7_title'] ?? 'WHAT OUR CLIENTS SAY' }}</h2>

        <div class="cyber-carousel" id="testimonialsCarousel">
            <div class="cyber-carousel-track" id="testimonialsTrack">
                @foreach ($activeTestimonials as $num)
                <div class="cyber-testimonial-item">
                    <i class="fas fa-quote-left" style="font-size: 2rem; color: var(--neon-pink); opacity: 0.5;"></i>
                    <p style="margin: 16px 0;">{{ \Illuminate\Support\Str::limit($Section_7_content_value["Sec7_box{$num}_review"] ?? 'AMAZING SERVICE! HIGHLY RECOMMEND.', 100) }}</p>
                    <div class="cyber-rating">★★★★★</div>
                    <div style="display: flex; align-items: center; gap: 12px; margin-top: 16px;">
                        @php $imgPath = $Section_7_content_value["Sec7_box{$num}_image_path"] ?? ''; @endphp
                        @if(!empty($imgPath))
                            <img src="{{ asset(Storage::url($imgPath)) }}" style="width: 44px; height: 44px; border-radius: 50%; object-fit: cover;">
                        @else
                            <div style="width: 44px; height: 44px; background: var(--neon-pink); border-radius: 50%; display: flex; align-items: center; justify-content: center;"><i class="fas fa-user"></i></div>
                        @endif
                        <div>
                            <strong>{{ $Section_7_content_value["Sec7_box{$num}_name"] ?? 'CLIENT' }}</strong>
                            <br>
                            <span style="font-size: 10px; color: var(--neon-cyan);">{{ $Section_7_content_value["Sec7_box{$num}_tag"] ?? 'VERIFIED' }}</span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<!-- ========== FEATURES ========== -->
@php
    $Section_1 = App\Models\FrontHomePage::where('section', 'Section 1')->where('parent_id', $parent_id)->first();
    $Section_1_content_value = !empty($Section_1->content_value) ? json_decode($Section_1->content_value, true) : [];
@endphp

<div class="cyber-features">
    <div class="cyber-container">
        <div class="cyber-section-tag">// WHY CHOOSE US</div>
        <h2 class="cyber-section-title">{{ $Section_1_content_value['Sec1_title'] ?? 'SIMPLE & TRANSPARENT' }}</h2>

        <div class="cyber-features-grid">
            @for ($i = 1; $i <= 3; $i++)
                @if (!empty($Section_1_content_value['Sec1_box' . $i . '_enabled']) && $Section_1_content_value['Sec1_box' . $i . '_enabled'] == 'active')
                <div class="cyber-feature animate-fade delay-{{ $i }}">
                    <div class="cyber-feature-icon"><i class="fas {{ $i == 1 ? 'fa-bolt' : ($i == 2 ? 'fa-shield-alt' : 'fa-headset') }}"></i></div>
                    <h3>{{ $Section_1_content_value['Sec1_box' . $i . '_title'] ?? 'FEATURE' }}</h3>
                    <p>{{ $Section_1_content_value['Sec1_box' . $i . '_info'] ?? 'DESCRIPTION' }}</p>
                </div>
                @endif
            @endfor
        </div>
    </div>
</div>

<!-- ========== ABOUT ========== -->
@php
    $Section_4 = App\Models\FrontHomePage::where('section', 'Section 4')->where('parent_id', $parent_id)->first();
    $Section_4_content_value = !empty($Section_4->content_value) ? json_decode($Section_4->content_value, true) : [];
@endphp

<div class="cyber-about">
    <div class="cyber-container">
        <div class="cyber-about-grid">
            <div class="cyber-about-img">
                <img src="{{ asset(Storage::url($Section_4_content_value['about_image_path'] ?? '')) }}" alt="About">
            </div>
            <div>
                <div class="cyber-about-card">
                    <i class="fas fa-heart" style="font-size: 30px; color: var(--neon-pink); margin-bottom: 16px;"></i>
                    <h3>{{ $Section_4_content_value['Sec4_title'] ?? 'WE LOVE WHAT WE DO' }}</h3>
                    <p>With over a decade of experience, we've helped thousands find their perfect property.</p>
                </div>
                <div class="cyber-about-card">
                    <i class="fas fa-bullseye" style="font-size: 30px; color: var(--neon-cyan); margin-bottom: 16px;"></i>
                    <h3>OUR MISSION</h3>
                    <p>To make property buying and selling simple, transparent, and enjoyable for everyone.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ========== AMENITIES CAROUSEL ========== -->
@php
    $Section_3 = App\Models\FrontHomePage::where('section', 'Section 3')->where('parent_id', $parent_id)->first();
    $Section_3_content_value = !empty($Section_3->content_value) ? json_decode($Section_3->content_value, true) : [];
    $amenitiesList = isset($allAmenities) ? $allAmenities : collect();
@endphp

<div class="cyber-section" style="background: var(--light-bg);">
    <div class="cyber-container">
        <div class="cyber-section-tag">// PREMIUM AMENITIES</div>
        <h2 class="cyber-section-title">{{ $Section_3_content_value['Sec3_title'] ?? 'AVAILABLE AMENITIES' }}</h2>

        @if($amenitiesList->count() > 0)
            <div class="cyber-carousel" id="amenitiesCarousel">
                <div class="cyber-carousel-track" id="amenitiesTrack">
                    @foreach ($amenitiesList as $amenity)
                    <div class="cyber-amenity-item">
                        <img src="{{ asset(Storage::url('upload/amenity/' . ($amenity->image ?? 'default.png'))) }}" alt="{{ $amenity->name }}">
                        <h4>{{ ucfirst($amenity->name) }}</h4>
                        <p>{{ \Illuminate\Support\Str::limit(strip_tags($amenity->description), 60) }}</p>
                    </div>
                    @endforeach
                </div>
            </div>
        @else
            <div style="text-align: center; padding: 60px; background: var(--card-bg); border: 1px solid var(--neon-cyan); border-radius: 8px;">
                <i class="fas fa-cube" style="font-size: 48px; color: var(--neon-cyan);"></i>
                <h3>NO AMENITIES FOUND</h3>
            </div>
        @endif
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Carousels - removed duplicate loops
    const propertiesTrack = document.getElementById('propertiesTrack');
    const amenitiesTrack = document.getElementById('amenitiesTrack');
    const testimonialsTrack = document.getElementById('testimonialsTrack');

    // No duplicate items needed - single loops only
});
</script>

@endsection
