@extends('theme5.main')
@section('content')

<style>
/* ============================================
   THEME 5 - LIGHT DESIGN WITH CAROUSEL NAVIGATION
   Proper Containers, Left/Right Buttons
============================================ */

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Inter', sans-serif;
    background: #ffffff;
    color: #1a1a1a;
}

.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 24px;
}

/* ========== HERO SECTION ========== */
.hero {
    padding: 100px 0 60px;
    background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
}

.hero-inner {
    text-align: center;
    max-width: 800px;
    margin: 0 auto;
}

.hero-tag {
    display: inline-block;
    background: #e0e7ff;
    color: #3b82f6;
    padding: 5px 14px;
    border-radius: 100px;
    font-size: 13px;
    font-weight: 500;
    margin-bottom: 24px;
}

.hero h1 {
    font-size: 52px;
    font-weight: 800;
    line-height: 1.2;
    margin-bottom: 20px;
    color: #0f172a;
}

.hero h1 span {
    color: #3b82f6;
}

.hero p {
    font-size: 18px;
    color: #475569;
    margin-bottom: 32px;
    line-height: 1.6;
}

.hero-buttons {
    display: flex;
    gap: 16px;
    justify-content: center;
    margin-bottom: 50px;
}

.btn {
    padding: 12px 28px;
    border-radius: 8px;
    font-weight: 600;
    text-decoration: none;
    transition: all 0.2s;
}

.btn-primary {
    background: #3b82f6;
    color: white;
}

.btn-primary:hover {
    background: #2563eb;
    transform: translateY(-2px);
}

.btn-outline {
    border: 1px solid #cbd5e1;
    color: #1e293b;
}

.btn-outline:hover {
    border-color: #3b82f6;
    color: #3b82f6;
}

.hero-image {
    margin-top: 20px;
    border-radius: 24px;
    overflow: hidden;
    box-shadow: 0 20px 40px -12px rgba(0,0,0,0.1);
}

.hero-image img {
    width: 100%;
    display: block;
}

/* ========== STATS BAR ========== */
.stats-bar {
    background: white;
    padding: 40px 0;
    border-bottom: 1px solid #e2e8f0;
}

.stats-grid {
    display: flex;
    justify-content: space-between;
    text-align: center;
    gap: 30px;
    flex-wrap: wrap;
}

.stat-item {
    flex: 1;
}

.stat-number {
    font-size: 36px;
    font-weight: 800;
    color: #3b82f6;
}

.stat-label {
    font-size: 14px;
    color: #64748b;
    margin-top: 5px;
}

/* ========== TWO COLUMN SPLIT ========== */
.split-section {
    display: grid;
    grid-template-columns: 1fr 1fr;
    min-height: 500px;
}

.split-content {
    background: #0f172a;
    padding: 80px 50px;
    display: flex;
    flex-direction: column;
    justify-content: center;
}

.split-content h2 {
    font-size: 40px;
    font-weight: 700;
    color: white;
    margin-bottom: 20px;
}

.split-content p {
    color: #94a3b8;
    line-height: 1.6;
    margin-bottom: 30px;
}

.split-feature {
    display: flex;
    align-items: center;
    gap: 12px;
    margin-bottom: 16px;
    color: white;
}

.split-feature i {
    color: #3b82f6;
}

.split-image {
    overflow: hidden;
}

.split-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

/* ========== FEATURE ROW ========== */
.feature-row {
    padding: 80px 0;
}

.feature-row-inner {
    display: flex;
    gap: 30px;
    flex-wrap: wrap;
}

.feature-card {
    flex: 1;
    background: white;
    border: 1px solid #e2e8f0;
    border-radius: 20px;
    padding: 30px;
    transition: all 0.3s;
}

.feature-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 20px 25px -5px rgba(0,0,0,0.05);
    border-color: #3b82f6;
}

.feature-card-image {
    width: 100%;
    height: 180px;
    border-radius: 16px;
    overflow: hidden;
    margin-bottom: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #f8fafc;
}

.feature-card-image img {
    width: 100%;
    height: 100%;
    object-fit: contain;
}

.feature-card h3 {
    font-size: 20px;
    margin-bottom: 12px;
}

.feature-card p {
    color: #64748b;
    line-height: 1.5;
}

/* ========== CAROUSEL COMMON STYLES ========== */
.carousel-wrapper {
    position: relative;
    padding: 0 40px;
}

.carousel-container {
    overflow-x: auto;
    scroll-behavior: smooth;
    scrollbar-width: none;
    -ms-overflow-style: none;
}

.carousel-container::-webkit-scrollbar {
    display: none;
}

.carousel-track {
    display: flex;
    gap: 24px;
    width: max-content;
}

.carousel-btn {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    width: 40px;
    height: 40px;
    background: white;
    border: 1px solid #e2e8f0;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.3s;
    z-index: 10;
    box-shadow: 0 2px 8px rgba(0,0,0,0.05);
}

.carousel-btn:hover {
    background: #3b82f6;
    border-color: #3b82f6;
    color: white;
}

.carousel-prev {
    left: 0;
}

.carousel-next {
    right: 0;
}

/* ========== AMENITIES CAROUSEL ========== */
.amenities-section {
    padding: 60px 0;
}

.amenity-card {
    width: 260px;
    background: white;
    border: 1px solid #e2e8f0;
    border-radius: 20px;
    padding: 25px;
    text-align: center;
    flex-shrink: 0;
    transition: all 0.3s;
}

.amenity-card:hover {
    transform: translateY(-5px);
    border-color: #3b82f6;
}

.amenity-image {
    width: 80px;
    height: 80px;
    border-radius: 20px;
    overflow: hidden;
    margin: 0 auto 20px;
}

.amenity-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

/* ========== PROPERTIES GRID ========== */
.properties-section {
    padding: 60px 0;
}

.section-header {
    text-align: center;
    margin-bottom: 50px;
}

.section-header .sub {
    font-size: 12px;
    color: #3b82f6;
    text-transform: uppercase;
    letter-spacing: 2px;
    margin-bottom: 8px;
}

.section-header h2 {
    font-size: 36px;
    font-weight: 700;
    color: #0f172a;
}

.tabs {
    display: flex;
    justify-content: center;
    gap: 12px;
    margin-bottom: 40px;
    flex-wrap: wrap;
}

.tab-btn {
    padding: 8px 24px;
    background: white;
    border: 1px solid #e2e8f0;
    border-radius: 40px;
    cursor: pointer;
    font-weight: 500;
    transition: all 0.2s;
}

.tab-btn.active,
.tab-btn:hover {
    background: #3b82f6;
    border-color: #3b82f6;
    color: white;
}

.properties-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 30px;
}

.property-card {
    background: white;
    border: 1px solid #e2e8f0;
    border-radius: 20px;
    overflow: hidden;
    transition: all 0.3s;
}

.property-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 20px 25px -5px rgba(0,0,0,0.05);
}

.property-image {
    height: 220px;
    overflow: hidden;
}

.property-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s;
}

.property-card:hover .property-image img {
    transform: scale(1.05);
}

.property-info {
    padding: 20px;
}

.property-type {
    display: inline-block;
    background: #e0e7ff;
    color: #3b82f6;
    padding: 4px 12px;
    border-radius: 20px;
    font-size: 11px;
    font-weight: 600;
    margin-bottom: 10px;
}

.property-price {
    font-size: 22px;
    font-weight: 700;
    color: #3b82f6;
    margin: 12px 0;
}

/* ========== CTA BANNER ========== */
.cta-banner {
    background: linear-gradient(135deg, #3b82f6 0%, #8b5cf6 100%);
    border-radius: 30px;
    padding: 60px 50px;
    margin: 60px 0;
    text-align: center;
}

.cta-banner h2 {
    font-size: 36px;
    color: white;
    margin-bottom: 16px;
}

.cta-banner p {
    color: rgba(255,255,255,0.9);
    margin-bottom: 30px;
}

.cta-banner .btn-white {
    background: white;
    color: #3b82f6;
    border: none;
}

.cta-banner .btn-white:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 20px rgba(0,0,0,0.1);
}

/* ========== TESTIMONIALS CAROUSEL ========== */
.testimonials-section {
    padding: 60px 0;
}

.testimonial-card {
    width: 340px;
    background: white;
    border: 1px solid #e2e8f0;
    border-radius: 24px;
    padding: 30px;
    flex-shrink: 0;
    transition: all 0.3s;
}

.testimonial-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 20px 25px -5px rgba(0,0,0,0.05);
}

.testimonial-author-img {
    width: 60px;
    height: 60px;
    border-radius: 50%;
    overflow: hidden;
    margin-bottom: 16px;
}

.testimonial-author-img img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

/* ========== FOOTER ========== */
.footer {
    background: #0f172a;
    color: white;
    padding: 60px 0 30px;
    margin-top: 60px;
}

.footer-grid {
    display: grid;
    grid-template-columns: 2fr 1fr 1fr 1fr;
    gap: 40px;
    margin-bottom: 40px;
}

.footer-logo p {
    color: #94a3b8;
    margin-top: 16px;
    font-size: 14px;
}

.footer h4 {
    font-size: 16px;
    margin-bottom: 20px;
}

.footer-links {
    list-style: none;
}

.footer-links li {
    margin-bottom: 12px;
}

.footer-links a {
    color: #94a3b8;
    text-decoration: none;
    font-size: 14px;
    transition: color 0.2s;
}

.footer-links a:hover {
    color: white;
}

.footer-bottom {
    text-align: center;
    padding-top: 30px;
    border-top: 1px solid #1e293b;
    color: #64748b;
    font-size: 13px;
}

/* ========== RESPONSIVE ========== */
@media (max-width: 1024px) {
    .split-section {
        grid-template-columns: 1fr;
    }

    .properties-grid {
        grid-template-columns: repeat(2, 1fr);
    }

    .footer-grid {
        grid-template-columns: repeat(2, 1fr);
    }

    .hero h1 {
        font-size: 40px;
    }
}

@media (max-width: 768px) {
    .properties-grid {
        grid-template-columns: 1fr;
    }

    .footer-grid {
        grid-template-columns: 1fr;
        text-align: center;
    }

    .hero h1 {
        font-size: 32px;
    }

    .hero-buttons {
        flex-direction: column;
        align-items: center;
    }

    .stats-grid {
        flex-direction: column;
    }

    .feature-row-inner {
        flex-direction: column;
    }

    .split-content {
        padding: 50px 30px;
    }

    .split-content h2 {
        font-size: 32px;
    }

    .cta-banner {
        padding: 40px 20px;
    }

    .cta-banner h2 {
        font-size: 28px;
    }

    .carousel-wrapper {
        padding: 0 30px;
    }
}
</style>

<!-- ========== HERO SECTION ========== -->
@php
    $Section_0 = App\Models\FrontHomePage::where('section', 'Section 0')->where('parent_id', $parent_id)->first();
    $Section_0_content_value = !empty($Section_0->content_value) ? json_decode($Section_0->content_value, true) : [];
@endphp
@if (empty($Section_0_content_value['section_enabled']) || $Section_0_content_value['section_enabled'] == 'active')
<div class="hero">
    <div class="container">
        <div class="hero-inner">
            <div class="hero-tag">✨ PREMIUM REAL ESTATE</div>
            <h1>{{ $Section_0_content_value['title'] ?? 'Find Your' }} <span>{{ __('Dream Home') }}</span></h1>
            <p>{{ $Section_0_content_value['sub_title'] ?? 'Discover exceptional properties with our curated collection of luxury homes and investment opportunities.' }}</p>
            <div class="hero-buttons">
                <a href="{{ $isCustomDomain ? route('custom.domain.properties') : route('property.home', $user->code) }}" class="btn btn-primary">Explore Properties →</a>
                <a href="{{ route('contact.home', $user->code) }}" class="btn btn-outline">Contact Us</a>
            </div>
            <div class="hero-image">
                <img src="{{ asset(Storage::url($Section_0_content_value['banner_image1_path'] ?? '')) }}" alt="Hero">
            </div>
        </div>
    </div>
</div>
@endif

<!-- ========== STATS BAR ========== -->
@php
    $Section_2 = App\Models\FrontHomePage::where('section', 'Section 2')->where('parent_id', $parent_id)->first();
    $Section_2_content_value = !empty($Section_2->content_value) ? json_decode($Section_2->content_value, true) : [];
@endphp
@if (empty($Section_2_content_value['section_enabled']) || $Section_2_content_value['section_enabled'] == 'active')
<div class="stats-bar">
    <div class="container">
        <div class="stats-grid">
            <div class="stat-item"><div class="stat-number">{{ $Section_2_content_value['Box1_number'] ?? '500' }}+</div><div class="stat-label">{{ $Section_2_content_value['Box1_title'] ?? 'Properties' }}</div></div>
            <div class="stat-item"><div class="stat-number">{{ $Section_2_content_value['Box2_number'] ?? '1000' }}+</div><div class="stat-label">{{ $Section_2_content_value['Box2_title'] ?? 'Happy Clients' }}</div></div>
            <div class="stat-item"><div class="stat-number">{{ $Section_2_content_value['Box3_number'] ?? '50' }}+</div><div class="stat-label">{{ $Section_2_content_value['Box3_title'] ?? 'Cities' }}</div></div>
            <div class="stat-item"><div class="stat-number">{{ $Section_2_content_value['Box4_number'] ?? '10' }}+</div><div class="stat-label">{{ $Section_2_content_value['Box4_title'] ?? 'Years Experience' }}</div></div>
        </div>
    </div>
</div>
@endif

<!-- ========== TWO COLUMN SPLIT SECTION (UPDATED TEXT) ========== -->
@php
    $Section_4 = App\Models\FrontHomePage::where('section', 'Section 4')->where('parent_id', $parent_id)->first();
    $Section_4_content_value = !empty($Section_4->content_value) ? json_decode($Section_4->content_value, true) : [];
@endphp
@if (empty($Section_4_content_value['section_enabled']) || $Section_4_content_value['section_enabled'] == 'active')
<div class="container split-section">
    <div class="split-content">
        <h2>A whole world of freelance talent at your fingertips</h2>
        <p>We're dedicated to helping you find the perfect place to call home. With years of experience and hundreds of happy clients, we know what matters most.</p>

        <div class="split-feature">
            <i class="fas fa-check-circle"></i>
            <span>Proof of quality</span>
        </div>
        <div class="split-feature">
            <i class="fas fa-check-circle"></i>
            <span>No cost until you hire</span>
        </div>
        <div class="split-feature">
            <i class="fas fa-check-circle"></i>
            <span>Safe and secure</span>
        </div>
    </div>
    <div class="split-image">
        <img src="{{ asset(Storage::url($Section_4_content_value['about_image_path'] ?? '')) }}" alt="About">
    </div>
</div>
@endif

<!-- ========== FEATURE ROW ========== -->
@php
    $Section_1 = App\Models\FrontHomePage::where('section', 'Section 1')->where('parent_id', $parent_id)->first();
    $Section_1_content_value = !empty($Section_1->content_value) ? json_decode($Section_1->content_value, true) : [];
@endphp
@if (empty($Section_1_content_value['section_enabled']) || $Section_1_content_value['section_enabled'] == 'active')
<div class="feature-row">
    <div class="container">
        <div class="feature-row-inner">
            @for ($i = 1; $i <= 3; $i++)
                @if (!empty($Section_1_content_value['Sec1_box' . $i . '_enabled']) && $Section_1_content_value['Sec1_box' . $i . '_enabled'] == 'active')
                <div class="feature-card">
                    <div class="feature-card-image">
                        <img src="{{ asset(Storage::url($Section_1_content_value['Sec1_box' . $i . '_image_path'] ?? '')) }}" alt="Feature">
                    </div>
                    <h3>{{ $Section_1_content_value['Sec1_box' . $i . '_title'] ?? 'Feature' }}</h3>
                    <p>{{ $Section_1_content_value['Sec1_box' . $i . '_info'] ?? 'Description' }}</p>
                </div>
                @endif
            @endfor
        </div>
    </div>
</div>
@endif

<!-- ========== AMENITIES CAROUSEL WITH BUTTONS ========== -->
@php
    $Section_3 = App\Models\FrontHomePage::where('section', 'Section 3')->where('parent_id', $parent_id)->first();
    $Section_3_content_value = !empty($Section_3->content_value) ? json_decode($Section_3->content_value, true) : [];
@endphp
@if (empty($Section_3_content_value['section_enabled']) || $Section_3_content_value['section_enabled'] == 'active')
<div class="amenities-section">
    <div class="container">
        <div class="section-header">
            <div class="sub">AMENITIES</div>
            <h2>{{ $Section_3_content_value['Sec3_title'] ?? 'Modern Living' }}</h2>
        </div>
    </div>
    <div class="container">
        <div class="carousel-wrapper">
            <div class="carousel-container" id="amenitiesContainer">
                <div class="carousel-track" id="amenitiesTrack">
                    @if(isset($allAmenities) && count($allAmenities) > 0)
                        @foreach ($allAmenities as $amenity)
                        <div class="amenity-card">
                            <div class="amenity-image">
                                <img src="{{ asset(Storage::url('upload/amenity/' . ($amenity->image ?? 'default.png'))) }}" alt="{{ $amenity->name }}">
                            </div>
                            <h4>{{ ucfirst($amenity->name) }}</h4>
                            <p style="font-size: 13px; color: #64748b; margin-top: 8px;">{{ \Illuminate\Support\Str::limit(strip_tags($amenity->description), 50) }}</p>
                        </div>
                        @endforeach
                    @endif
                </div>
            </div>
            <div class="carousel-btn carousel-prev" id="amenitiesPrev"><i class="fas fa-chevron-left"></i></div>
            <div class="carousel-btn carousel-next" id="amenitiesNext"><i class="fas fa-chevron-right"></i></div>
        </div>
    </div>
</div>
@endif

<!-- ========== PROPERTIES GRID ========== -->
<!-- ========== PROPERTIES GRID ========== -->
@php
    $Section_5 = App\Models\FrontHomePage::where('section', 'Section 5')->first();
    $Section_5_content_value = !empty($Section_5->content_value) ? json_decode($Section_5->content_value, true) : [];

    // Get latest 8 properties directly
    $latestProperties = \App\Models\Property::where('parent_id', $user->id)
        ->latest()
        ->take(8)
        ->get();
@endphp
@if (empty($Section_5_content_value['section_enabled']) || $Section_5_content_value['section_enabled'] == 'active')
<div class="properties-section">
    <div class="container">
        <div class="section-header">
            <div class="sub">FEATURED LISTINGS</div>
            <h2>{{ $Section_5_content_value['Sec5_title'] ?? 'Popular Properties' }}</h2>
        </div>

        @if($latestProperties->count() > 0)
            <div class="properties-grid">
                @foreach ($latestProperties as $property)
                    @php
                        $thumbnail = !empty($property->thumbnail->image) ? $property->thumbnail->image : 'default.jpg';
                    @endphp
                    <div class="property-card">
                        <div class="property-image">
                            <img src="{{ asset(Storage::url('upload/property/thumbnail/' . $thumbnail)) }}" alt="{{ $property->name }}">
                        </div>
                        <div class="property-info">
                            <span class="property-type">{{ \App\Models\Property::types()[$property->type] ?? ucfirst($property->type) }}</span>
                            <h3 style="margin: 8px 0;">{{ ucfirst($property->name) }}</h3>
                            <p style="font-size: 13px; color: #64748b;">{{ \Illuminate\Support\Str::limit(strip_tags($property->description ?? ''), 60) }}</p>
                            <div class="property-price">{{ priceFormat($property->price) }}</div>
                            <a href="{{ $isCustomDomain ? route('custom.domain.property.detail', ['id' => \Crypt::encrypt($property->id)]) : route('property.detail', ['code' => $user->code, \Crypt::encrypt($property->id)]) }}" style="color: #3b82f6; text-decoration: none; font-weight: 500;">View Details →</a>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div style="text-align: center; padding: 60px;">
                <p>No properties available at the moment.</p>
            </div>
        @endif
    </div>
</div>
@endif

<!-- ========== CTA BANNER ========== -->
@php
    $Section_6 = App\Models\FrontHomePage::where('section', 'Section 6')->where('parent_id', $parent_id)->first();
    $Section_6_content_value = !empty($Section_6->content_value) ? json_decode($Section_6->content_value, true) : [];
@endphp
@if (empty($Section_6_content_value['section_enabled']) || $Section_6_content_value['section_enabled'] == 'active')
<div class="container">
    <div class="cta-banner">
        <h2>{{ $Section_6_content_value['Sec6_title'] ?? 'Ready to Get Started?' }}</h2>
        <p>{{ $Section_6_content_value['Sec6_info'] ?? 'Let us help you find your perfect property' }}</p>
        <a href="{{ $Section_6_content_value['sec6_btn_link'] ?? '#' }}" class="btn btn-white">{{ $Section_6_content_value['sec6_btn_name'] ?? 'Get Started' }} →</a>
    </div>
</div>
@endif

<!-- ========== TESTIMONIALS CAROUSEL WITH BUTTONS ========== -->
@php
    $Section_7 = App\Models\FrontHomePage::where('section', 'Section 7')->where('parent_id', $parent_id)->first();
    $Section_7_content_value = !empty($Section_7->content_value) ? json_decode($Section_7->content_value, true) : [];
@endphp
@if (empty($Section_7_content_value['section_enabled']) || $Section_7_content_value['section_enabled'] == 'active')
<div class="testimonials-section">
    <div class="container">
        <div class="section-header">
            <div class="sub">TESTIMONIALS</div>
            <h2>{{ $Section_7_content_value['Sec7_title'] ?? 'What Our Clients Say' }}</h2>
        </div>
    </div>
    <div class="container">
        <div class="carousel-wrapper">
            <div class="carousel-container" id="testimonialsContainer">
                <div class="carousel-track" id="testimonialsTrack">
                    @php
                        $testimonials = [];
                        for ($i = 1; $i <= 8; $i++) {
                            if (!empty($Section_7_content_value["Sec7_box{$i}_Enabled"]) && $Section_7_content_value["Sec7_box{$i}_Enabled"] == 'active') {
                                $testimonials[] = $i;
                            }
                        }
                    @endphp
                    @foreach ($testimonials as $num)
                    <div class="testimonial-card">
                        <div class="testimonial-author-img">
                            <img src="{{ asset(Storage::url($Section_7_content_value["Sec7_box{$num}_image_path"] ?? '')) }}" alt="Author">
                        </div>
                        <div style="font-size: 40px; color: #3b82f6; opacity: 0.2; margin: 10px 0;">“</div>
                        <p style="font-size: 14px; line-height: 1.6; color: #475569; font-style: italic;">{{ \Illuminate\Support\Str::limit($Section_7_content_value["Sec7_box{$num}_review"] ?? '', 120) }}</p>
                        <h4 style="margin-top: 16px; font-weight: 600;">{{ $Section_7_content_value["Sec7_box{$num}_name"] ?? 'Client' }}</h4>
                        <span style="font-size: 12px; color: #64748b;">{{ $Section_7_content_value["Sec7_box{$num}_tag"] ?? 'Client' }}</span>
                        <div style="margin-top: 12px; color: #f59e0b;">★★★★★</div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="carousel-btn carousel-prev" id="testimonialsPrev"><i class="fas fa-chevron-left"></i></div>
            <div class="carousel-btn carousel-next" id="testimonialsNext"><i class="fas fa-chevron-right"></i></div>
        </div>
    </div>
</div>
@endif

@endsection

@push('theme5-script')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // ========== AMENITIES CAROUSEL ==========
    const amenitiesContainer = document.getElementById('amenitiesContainer');
    const amenitiesPrev = document.getElementById('amenitiesPrev');
    const amenitiesNext = document.getElementById('amenitiesNext');

    if (amenitiesContainer && amenitiesPrev && amenitiesNext) {
        const scrollAmount = 300;

        amenitiesNext.addEventListener('click', () => {
            amenitiesContainer.scrollBy({ left: scrollAmount, behavior: 'smooth' });
        });

        amenitiesPrev.addEventListener('click', () => {
            amenitiesContainer.scrollBy({ left: -scrollAmount, behavior: 'smooth' });
        });
    }

    // ========== TESTIMONIALS CAROUSEL ==========
    const testimonialsContainer = document.getElementById('testimonialsContainer');
    const testimonialsPrev = document.getElementById('testimonialsPrev');
    const testimonialsNext = document.getElementById('testimonialsNext');

    if (testimonialsContainer && testimonialsPrev && testimonialsNext) {
        const scrollAmount = 370;

        testimonialsNext.addEventListener('click', () => {
            testimonialsContainer.scrollBy({ left: scrollAmount, behavior: 'smooth' });
        });

        testimonialsPrev.addEventListener('click', () => {
            testimonialsContainer.scrollBy({ left: -scrollAmount, behavior: 'smooth' });
        });
    }

    // ========== PROPERTY TABS ==========
    const tabs = document.querySelectorAll('.tab-btn');
    const panels = document.querySelectorAll('.tab-panel');

    tabs.forEach(tab => {
        tab.addEventListener('click', () => {
            const tabId = tab.dataset.tab;
            tabs.forEach(t => t.classList.remove('active'));
            panels.forEach(p => p.style.display = 'none');
            tab.classList.add('active');
            document.querySelector(`.tab-panel[data-tab="${tabId}"]`).style.display = 'block';
        });
    });

    // ========== SCROLL REVEAL ANIMATION ==========
    const fadeElements = document.querySelectorAll('.feature-card, .property-card, .amenity-card, .testimonial-card');
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, { threshold: 0.1 });

    fadeElements.forEach(el => {
        el.style.opacity = '0';
        el.style.transform = 'translateY(20px)';
        el.style.transition = 'all 0.5s ease';
        observer.observe(el);
    });
});
</script>
@endpush
