@extends('theme9.main')
@section('content')
@php
    $isCustomDomain = isset($is_custom_domain) ? $is_custom_domain : (request()->getHost() !== '13.61.10.174' && request()->getHost() !== 'localhost' && request()->getHost() !== '127.0.0.1');
@endphp
<style>
/* ============================================
   THEME 9 - VELORA (DARK THEME + LIGHT TEXT)
   All sections inside container
   Carousels for Properties + Amenities
   ============================================ */

/* ---------- ANIMATIONS ---------- */
@keyframes slideIn {
    0% { opacity: 0; transform: translateX(-40px); }
    100% { opacity: 1; transform: translateX(0); }
}

@keyframes slideUp {
    0% { opacity: 0; transform: translateY(40px); }
    100% { opacity: 1; transform: translateY(0); }
}

@keyframes zoomBlur {
    0% { opacity: 0; transform: scale(0.9); filter: blur(5px); }
    100% { opacity: 1; transform: scale(1); filter: blur(0); }
}

@keyframes rotateIn {
    0% { opacity: 0; transform: rotate(-10deg); }
    100% { opacity: 1; transform: rotate(0); }
}

@keyframes fadeScale {
    0% { opacity: 0; transform: scale(0.95); }
    100% { opacity: 1; transform: scale(1); }
}

.slide-in { animation: slideIn 0.7s ease forwards; opacity: 0; }
.slide-up { animation: slideUp 0.7s ease forwards; opacity: 0; }
.zoom-blur { animation: zoomBlur 0.8s ease forwards; opacity: 0; }
.rotate-in { animation: rotateIn 0.5s ease forwards; opacity: 0; }
.fade-scale { animation: fadeScale 0.6s ease forwards; opacity: 0; }

.d1 { animation-delay: 0.1s; }
.d2 { animation-delay: 0.2s; }
.d3 { animation-delay: 0.3s; }
.d4 { animation-delay: 0.4s; }
.d5 { animation-delay: 0.5s; }
.d6 { animation-delay: 0.6s; }

/* ---------- CONTAINER ---------- */
.container {
    max-width: 1280px;
    margin: 0 auto;
    padding: 0 24px;
    width: 100%;
}

/* ---------- MAIN BANNER ---------- */
.main-banner {
    position: relative;
    min-height: 85vh;
    display: flex;
    align-items: center;
    background: linear-gradient(135deg, #0a0a0a, #1a1a1a);
    margin-top: 80px;

    overflow: hidden;
}

.banner-bg {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    z-index: 0;
}

.banner-bg img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    opacity: 0.3;
}

.banner-content {
    position: relative;
    z-index: 1;
    max-width: 900px;
    padding-left: 340px;
}

.banner-badge {
    display: inline-block;
    background: rgba(212, 175, 55, 0.2);
    padding: 6px 16px;
    font-size: 12px;
    letter-spacing: 2px;
    color: #d4af37;
    margin-bottom: 20px;
}

.banner-content h1 {
    font-size: 3.5rem;
    font-weight: 800;
    color: white;
    line-height: 1.1;
    margin-bottom: 20px;
}

.banner-content h1 span { color: #d4af37; }

.banner-content p {
    color: #c0c0c0;
    margin-bottom: 30px;
    font-size: 1.1rem;
}

.btn-banner {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    background: #d4af37;
    color: #0a0a0a;
    padding: 14px 34px;
    text-decoration: none;
    font-weight: 700;
    border-radius: 50px;
    transition: all 0.3s;
}

.btn-banner:hover { background: #b8941e; transform: translateY(-3px); }

.banner-stats {
    display: flex;
    gap: 40px;
    margin-top: 50px;
}

.banner-stats .stat h3 { font-size: 1.8rem; color: #d4af37; margin: 0; }
.banner-stats .stat span { font-size: 13px; color: #a0a0a0; }

/* ---------- SECTION HEADER ---------- */
.section-header {
    text-align: center;
    margin-bottom: 50px;
}

.section-header span {
    color: #d4af37;
    letter-spacing: 3px;
    font-size: 12px;
}

.section-header h2 {
    font-size: 2.5rem;
    margin-top: 10px;
    color: white;
}

.section-header p {
    color: #a0a0a0;
    max-width: 600px;
    margin: 10px auto 0;
}

/* ---------- CAROUSEL COMMON ---------- */
.carousel-container {
    position: relative;
    overflow: hidden;
}

.carousel-track {
    display: flex;
    gap: 24px;
    transition: transform 0.5s ease;
}

.carousel-btn {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    width: 44px;
    height: 44px;
    background: #d4af37;
    border: none;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    z-index: 5;
    transition: all 0.3s;
    color: #0a0a0a;
}

.carousel-btn:hover { background: #b8941e; transform: translateY(-50%) scale(1.05); }
.carousel-prev { left: -10px; }
.carousel-next { right: -10px; }

/* ---------- PROPERTY CAROUSEL CARD ---------- */
.property-card {
    min-width: 320px;
    background: #1a1a1a;
    border-radius: 20px;
    overflow: hidden;
    transition: all 0.3s;
}

.property-card:hover { transform: translateY(-10px); box-shadow: 0 20px 40px rgba(0,0,0,0.3); }

.property-card img {
    width: 100%;
    height: 220px;
    object-fit: cover;
}

.property-card .info { padding: 20px; }
.property-card .info h3 { color: white; font-size: 1.1rem; margin-bottom: 5px; }
.property-card .price { color: #d4af37; font-size: 1.3rem; font-weight: 800; margin: 10px 0; }
.property-card .features { display: flex; gap: 15px; font-size: 13px; color: #a0a0a0; }
.property-card .features i { color: #d4af37; margin-right: 5px; }

/* ---------- FEATURES: CIRCULAR CARDS ---------- */
.features-circular {
    padding: 80px 0;
    background: #0a0a0a;
}

.circular-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 40px;
    text-align: center;
}

.circular-card {
    background: rgba(255,255,255,0.05);
    padding: 40px;
    border-radius: 50%;
    width: 250px;
    height: 250px;
    margin: 0 auto;
    display: flex;
    flex-direction: column;
    justify-content: center;
    transition: all 0.3s;
    color: white;
}

.circular-card:hover {
    background: #d4af37;
    transform: scale(1.05);
    color: #0a0a0a;
}

.circular-card i { font-size: 48px; margin-bottom: 20px; }
.circular-card h3 { font-size: 1.3rem; margin-bottom: 10px; }
.circular-card p { color: #c0c0c0; font-size: 13px; }
.circular-card:hover p { color: #0a0a0a; }

/* ---------- STATS: COUNTER BARS ---------- */
.stats-bars {
    padding: 80px 0;
    background: #0a0a0a;
}

.bar-item { margin-bottom: 40px; }
.bar-item span { font-weight: 600; margin-bottom: 10px; display: block; color: #e0e0e0; }
.bar { height: 8px; background: #2a2a2a; border-radius: 10px; overflow: hidden; }
.bar-fill { width: 0; height: 100%; background: #d4af37; border-radius: 10px; transition: width 1.5s ease; }
.stats-number { font-size: 2rem; font-weight: 800; color: #d4af37; margin-top: 8px; }

/* ---------- TESTIMONIALS: VERTICAL TIMELINE ---------- */
.timeline {
    padding: 80px 0;
    background: #0a0a0a;
}

.timeline-item {
    display: flex;
    gap: 30px;
    margin-bottom: 50px;
    padding: 20px;
    border-left: 3px solid #d4af37;
}

.timeline-year {
    font-size: 2rem;
    font-weight: 800;
    color: #d4af37;
    min-width: 100px;
}

.timeline-content i { font-size: 2rem; color: #d4af37; opacity: 0.5; margin-bottom: 15px; display: block; }
.timeline-content p { font-style: italic; line-height: 1.6; color: #c0c0c0; }

/* ---------- AMENITIES CAROUSEL CARD ---------- */
.amenities-section {
    padding: 80px 0;
    background: #0a0a0a;
}

.amenity-card {
    min-width: 240px;
    background: #1a1a1a;
    text-align: center;
    padding: 30px 20px;
    border-radius: 20px;
    transition: all 0.3s;
}

.amenity-card:hover { transform: translateY(-5px); background: #2a2a2a; }

.amenity-card img {
    width: 70px;
    height: 70px;
    border-radius: 50%;
    object-fit: cover;
    margin-bottom: 15px;
}

.amenity-card h4 { color: white; margin-bottom: 10px; }
.amenity-card p { font-size: 12px; color: #a0a0a0; }

/* ---------- ABOUT: NUMBERED LIST ---------- */
.about-numbered {
    padding: 80px 0;
    background: #0a0a0a;
}

.numbered-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 50px;
    align-items: center;
}

.numbered-list { counter-reset: step; }
.numbered-item {
    counter-increment: step;
    margin-bottom: 30px;
    display: flex;
    gap: 20px;
    align-items: flex-start;
}

.numbered-item::before {
    content: "0" counter(step);
    background: #d4af37;
    color: #0a0a0a;
    width: 50px;
    height: 50px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 800;
    font-size: 1.3rem;
    border-radius: 50%;
    flex-shrink: 0;
}

.numbered-item h3 { color: white; margin-bottom: 5px; }
.numbered-item p { color: #c0c0c0; }

.numbered-img img { width: 100%; border-radius: 20px; }

/* ---------- STICKY CTA ---------- */
.sticky-cta {
    position: fixed;
    bottom: 30px;
    right: 30px;
    z-index: 100;
}

.sticky-cta a {
    background: #d4af37;
    color: #0a0a0a;
    padding: 15px 30px;
    border-radius: 50px;
    text-decoration: none;
    font-weight: 700;
    display: flex;
    align-items: center;
    gap: 10px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.3);
    transition: all 0.3s;
}

.sticky-cta a:hover { transform: translateY(-3px); background: #b8941e; }

/* ---------- RESPONSIVE ---------- */
@media (max-width: 992px) {
    .circular-grid { grid-template-columns: repeat(2, 1fr); }
    .numbered-grid { grid-template-columns: 1fr; text-align: center; }
    .numbered-item { justify-content: center; text-align: left; }
    .banner-stats { justify-content: center; }
    .banner-content { text-align: center; margin: 0 auto; }
}

@media (max-width: 768px) {
    .circular-grid { grid-template-columns: 1fr; }
    .circular-card { width: 200px; height: 200px; }
    .timeline-item { flex-direction: column; gap: 10px; }
    .property-card { min-width: 280px; }
    .banner-content h1 { font-size: 2.2rem; }
    .amenity-card { min-width: 200px; }
    .container { padding: 0 20px; }
    .main-banner { margin-top: 70px; }
    .banner-content { padding: 40px; }
}
</style>

<!-- ========== MAIN BANNER ========== -->
@php
    $Section_0 = App\Models\FrontHomePage::where('section', 'Section 0')->where('parent_id', $parent_id)->first();
    $Section_0_content_value = !empty($Section_0->content_value) ? json_decode($Section_0->content_value, true) : [];

    $bannerImage = !empty($Section_0_content_value['banner_image1_path'])
        ? Storage::url($Section_0_content_value['banner_image1_path'])
        : '';

    $Section_2 = App\Models\FrontHomePage::where('section', 'Section 2')->where('parent_id', $parent_id)->first();
    $Section_2_content_value = !empty($Section_2->content_value) ? json_decode($Section_2->content_value, true) : [];
@endphp

<section class="main-banner">
    @if(!empty($bannerImage))
    <div class="banner-bg">
        <img src="{{ $bannerImage }}" alt="Banner">
    </div>
    @endif
    <div class="banner-content zoom-blur d1">
        <div class="banner-badge">✦ PREMIUM REAL ESTATE</div>
        <h1>{{ $Section_0_content_value['title'] ?? 'Find Your' }} <span>{{ __('Dream Property') }}</span></h1>
        <p>{{ $Section_0_content_value['sub_title'] ?? 'Discover exceptional properties with our curated collection.' }}</p>
        <a href="{{ $isCustomDomain ? route('custom.domain.properties') : route('property.home', $user->code) }}" class="btn-banner">Explore Now →</a>
        <div class="banner-stats">
            <div class="stat"><h3>500+</h3><span>Properties</span></div>
            <div class="stat"><h3>98%</h3><span>Satisfaction</span></div>
            <div class="stat"><h3>24/7</h3><span>Support</span></div>
        </div>
    </div>
</section>

<!-- ========== PROPERTIES CAROUSEL (Section 5) ========== -->
@php
    $latestProperties = \App\Models\Property::where('parent_id', $user->id)->latest()->take(10)->get();
@endphp

<section class="features-circular">
    <div class="container">
        <div class="section-header">
            <span>✦ CURATED COLLECTION</span>
            <h2>Exclusive Properties</h2>
            <p>Discover our most sought-after properties</p>
        </div>

        @if($latestProperties->count() > 0)
            <div class="carousel-container" id="propertiesCarousel">
                <div class="carousel-track" id="propertiesTrack">
                    @foreach($latestProperties as $property)
                    @php
                        $thumbnail = !empty($property->thumbnail->image) ? $property->thumbnail->image : 'default.jpg';
                        $bedrooms = ($property->units && $property->units->count() > 0) ? $property->units->sum('bedroom') : 0;
                        $bathrooms = ($property->units && $property->units->count() > 0) ? $property->units->sum('baths') : 0;
                    @endphp
                    <div class="property-card slide-up">
                        <img src="{{ asset(Storage::url('upload/property/thumbnail/' . $thumbnail)) }}" alt="{{ $property->name }}">
                        <div class="info">
                            <h3>{{ \Illuminate\Support\Str::limit($property->name, 25) }}</h3>
                            <div class="price">${{ number_format($property->price ?? 0, 0, '.', ',') }}</div>
                            <div class="features">
                                <span><i class="fas fa-bed"></i> {{ $bedrooms ?: 'N/A' }}</span>
                                <span><i class="fas fa-bath"></i> {{ $bathrooms ?: 'N/A' }}</span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @foreach($latestProperties as $property)
                    @php
                        $thumbnail = !empty($property->thumbnail->image) ? $property->thumbnail->image : 'default.jpg';
                        $bedrooms = ($property->units && $property->units->count() > 0) ? $property->units->sum('bedroom') : 0;
                        $bathrooms = ($property->units && $property->units->count() > 0) ? $property->units->sum('baths') : 0;
                    @endphp
                    <div class="property-card slide-up">
                        <img src="{{ asset(Storage::url('upload/property/thumbnail/' . $thumbnail)) }}" alt="{{ $property->name }}">
                        <div class="info">
                            <h3>{{ \Illuminate\Support\Str::limit($property->name, 25) }}</h3>
                            <div class="price">${{ number_format($property->price ?? 0, 0, '.', ',') }}</div>
                            <div class="features">
                                <span><i class="fas fa-bed"></i> {{ $bedrooms ?: 'N/A' }}</span>
                                <span><i class="fas fa-bath"></i> {{ $bathrooms ?: 'N/A' }}</span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <button class="carousel-btn carousel-prev" id="propertiesPrev"><i class="fas fa-chevron-left"></i></button>
                <button class="carousel-btn carousel-next" id="propertiesNext"><i class="fas fa-chevron-right"></i></button>
            </div>
        @else
            <div style="text-align: center; padding: 60px; background: #1a1a1a; border-radius: 20px;">
                <i class="fas fa-building" style="font-size: 48px; color: #d4af37; opacity: 0.5;"></i>
                <h3 style="color: white; margin-top: 15px;">No Properties Found</h3>
            </div>
        @endif
    </div>
</section>

<!-- ========== FEATURES CIRCULAR (Section 1) ========== -->
@php
    $Section_1 = App\Models\FrontHomePage::where('section', 'Section 1')->where('parent_id', $parent_id)->first();
    $Section_1_content_value = !empty($Section_1->content_value) ? json_decode($Section_1->content_value, true) : [];
@endphp

<section class="features-circular">
    <div class="container">
        <div class="section-header">
            <span>✦ WHY CHOOSE US</span>
            <h2>The Velora Experience</h2>
            <p>We make property buying and selling effortless</p>
        </div>
        <div class="circular-grid">
            @for ($i = 1; $i <= 3; $i++)
                @if (!empty($Section_1_content_value['Sec1_box' . $i . '_enabled']) && $Section_1_content_value['Sec1_box' . $i . '_enabled'] == 'active')
                <div class="circular-card rotate-in d{{ $i }}">
                    <i class="fas {{ $i == 1 ? 'fa-bolt' : ($i == 2 ? 'fa-shield-alt' : 'fa-headset') }}"></i>
                    <h3>{{ $Section_1_content_value['Sec1_box' . $i . '_title'] ?? 'Feature' }}</h3>
                    <p>{{ $Section_1_content_value['Sec1_box' . $i . '_info'] ?? 'Description' }}</p>
                </div>
                @endif
            @endfor
        </div>
    </div>
</section>

<!-- ========== STATS COUNTER BARS (Section 2) ========== -->
<section class="stats-bars">
    <div class="container">
        <div class="section-header">
            <span>✦ OUR NUMBERS</span>
            <h2>Statistics That Matter</h2>
            <p>Real numbers, real results</p>
        </div>
        <div class="bar-item slide-up d1">
            <span>{{ $Section_2_content_value['Box1_title'] ?? 'Properties Sold' }}</span>
            <div class="bar"><div class="bar-fill" data-width="85"></div></div>
            <div class="stats-number">{{ $Section_2_content_value['Box1_number'] ?? '500' }}+</div>
        </div>
        <div class="bar-item slide-up d2">
            <span>{{ $Section_2_content_value['Box2_title'] ?? 'Happy Clients' }}</span>
            <div class="bar"><div class="bar-fill" data-width="92"></div></div>
            <div class="stats-number">{{ $Section_2_content_value['Box2_number'] ?? '1000' }}+</div>
        </div>
        <div class="bar-item slide-up d3">
            <span>{{ $Section_2_content_value['Box3_title'] ?? 'Cities Covered' }}</span>
            <div class="bar"><div class="bar-fill" data-width="78"></div></div>
            <div class="stats-number">{{ $Section_2_content_value['Box3_number'] ?? '50' }}+</div>
        </div>
        <div class="bar-item slide-up d4">
            <span>{{ $Section_2_content_value['Box4_title'] ?? 'Years Experience' }}</span>
            <div class="bar"><div class="bar-fill" data-width="95"></div></div>
            <div class="stats-number">{{ $Section_2_content_value['Box4_number'] ?? '10' }}+</div>
        </div>
    </div>
</section>

<!-- ========== TESTIMONIALS TIMELINE (Section 7) ========== -->
@php
    $Section_7 = App\Models\FrontHomePage::where('section', 'Section 7')->where('parent_id', $parent_id)->first();
    $Section_7_content_value = !empty($Section_7->content_value) ? json_decode($Section_7->content_value, true) : [];
    $activeTestimonials = [];
    for ($i = 1; $i <= 6; $i++) {
        if (!empty($Section_7_content_value["Sec7_box{$i}_Enabled"]) && $Section_7_content_value["Sec7_box{$i}_Enabled"] == 'active') {
            $activeTestimonials[] = $i;
        }
    }
    if (empty($activeTestimonials)) { $activeTestimonials = [1, 2, 3]; }
@endphp

<section class="timeline">
    <div class="container">
        <div class="section-header">
            <span>✦ CLIENT LOVE</span>
            <h2>What Our Clients Say</h2>
            <p>Real stories from happy customers</p>
        </div>
        @foreach ($activeTestimonials as $index => $num)
        <div class="timeline-item slide-up d{{ ($index % 3) + 1 }}">
            <div class="timeline-year">202{{ $index + 1 }}</div>
            <div class="timeline-content">
                <i class="fas fa-quote-left"></i>
                <p>{{ \Illuminate\Support\Str::limit($Section_7_content_value["Sec7_box{$num}_review"] ?? 'Amazing service! Highly recommend.', 150) }}</p>
                <div style="margin-top: 15px;">
                    <strong>{{ $Section_7_content_value["Sec7_box{$num}_name"] ?? 'Client' }}</strong>
                    <span style="color: #d4af37; margin-left: 10px;">★★★★★</span>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>

<!-- ========== AMENITIES CAROUSEL (Section 3) ========== -->
@php
    $amenitiesList = isset($allAmenities) ? $allAmenities : collect();
@endphp

<section class="amenities-section">
    <div class="container">
        <div class="section-header">
            <span>✦ PREMIUM AMENITIES</span>
            <h2>Luxury Living Features</h2>
            <p>World-class amenities designed for your comfort</p>
        </div>

        @if($amenitiesList->count() > 0)
            <div class="carousel-container" id="amenitiesCarousel">
                <div class="carousel-track" id="amenitiesTrack">
                    @foreach ($amenitiesList as $amenity)
                    <div class="amenity-card fade-scale">
                        <img src="{{ asset(Storage::url('upload/amenity/' . ($amenity->image ?? 'default.png'))) }}" alt="{{ $amenity->name }}">
                        <h4>{{ ucfirst($amenity->name) }}</h4>
                        <p>{{ \Illuminate\Support\Str::limit(strip_tags($amenity->description), 60) }}</p>
                    </div>
                    @endforeach
                    @foreach ($amenitiesList as $amenity)
                    <div class="amenity-card fade-scale">
                        <img src="{{ asset(Storage::url('upload/amenity/' . ($amenity->image ?? 'default.png'))) }}" alt="{{ $amenity->name }}">
                        <h4>{{ ucfirst($amenity->name) }}</h4>
                        <p>{{ \Illuminate\Support\Str::limit(strip_tags($amenity->description), 60) }}</p>
                    </div>
                    @endforeach
                </div>
                <button class="carousel-btn carousel-prev" id="amenitiesPrev"><i class="fas fa-chevron-left"></i></button>
                <button class="carousel-btn carousel-next" id="amenitiesNext"><i class="fas fa-chevron-right"></i></button>
            </div>
        @else
            <div style="text-align: center; padding: 60px; background: #1a1a1a; border-radius: 20px;">
                <i class="fas fa-cube" style="font-size: 48px; color: #d4af37; opacity: 0.5;"></i>
                <h3 style="color: white; margin-top: 15px;">No Amenities Found</h3>
            </div>
        @endif
    </div>
</section>

<!-- ========== ABOUT NUMBERED LIST (Section 4) ========== -->
@php
    $Section_4 = App\Models\FrontHomePage::where('section', 'Section 4')->where('parent_id', $parent_id)->first();
    $Section_4_content_value = !empty($Section_4->content_value) ? json_decode($Section_4->content_value, true) : [];
@endphp

<section class="about-numbered">
    <div class="container">
        <div class="numbered-grid">
            <div class="numbered-list">
                <div class="numbered-item slide-in d1">
                    <div><h3>{{ $Section_4_content_value['Sec4_title'] ?? 'We Love What We Do' }}</h3><p>With over a decade of experience, we've helped thousands find their perfect property.</p></div>
                </div>
                <div class="numbered-item slide-in d2">
                    <div><h3>Expert Guidance</h3><p>Our team of professionals ensures you get the best advice.</p></div>
                </div>
                <div class="numbered-item slide-in d3">
                    <div><h3>Best Price Guarantee</h3><p>We match any competitive offer on similar properties.</p></div>
                </div>
            </div>
            <div class="numbered-img zoom-blur d2">
                <img src="{{ asset(Storage::url($Section_4_content_value['about_image_path'] ?? '')) }}" alt="About">
            </div>
        </div>
    </div>
</section>

<!-- ========== STICKY CTA BUTTON (Section 6) ========== -->
@php
    $Section_6 = App\Models\FrontHomePage::where('section', 'Section 6')->where('parent_id', $parent_id)->first();
    $Section_6_content_value = !empty($Section_6->content_value) ? json_decode($Section_6->content_value, true) : [];
@endphp

<div class="sticky-cta">
    <a href="{{ $Section_6_content_value['sec6_btn_link'] ?? '#' }}">
        <i class="fas fa-headset"></i> Get Help
    </a>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Properties Carousel
    const propertiesTrack = document.getElementById('propertiesTrack');
    const propertiesPrev = document.getElementById('propertiesPrev');
    const propertiesNext = document.getElementById('propertiesNext');

    if (propertiesTrack && propertiesPrev && propertiesNext) {
        let position = 0;
        const firstCard = propertiesTrack.children[0];
        const cardWidth = firstCard ? firstCard.offsetWidth + 24 : 344;
        const maxScroll = Math.max(0, propertiesTrack.scrollWidth - propertiesTrack.parentElement.offsetWidth);

        propertiesNext.addEventListener('click', () => {
            if (position < maxScroll) {
                position = Math.min(position + cardWidth, maxScroll);
                propertiesTrack.style.transform = `translateX(-${position}px)`;
            }
        });

        propertiesPrev.addEventListener('click', () => {
            if (position > 0) {
                position = Math.max(position - cardWidth, 0);
                propertiesTrack.style.transform = `translateX(-${position}px)`;
            }
        });
    }

    // Amenities Carousel
    const amenitiesTrack = document.getElementById('amenitiesTrack');
    const amenitiesPrev = document.getElementById('amenitiesPrev');
    const amenitiesNext = document.getElementById('amenitiesNext');

    if (amenitiesTrack && amenitiesPrev && amenitiesNext) {
        let position = 0;
        const firstCard = amenitiesTrack.children[0];
        const cardWidth = firstCard ? firstCard.offsetWidth + 24 : 264;
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

    // Animate counter bars on scroll
    const bars = document.querySelectorAll('.bar-fill');
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const width = entry.target.getAttribute('data-width');
                entry.target.style.width = width + '%';
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.5 });
    bars.forEach(bar => observer.observe(bar));
});
</script>

@endsection
