@extends('theme4.main')
@section('content')
@php
    $isCustomDomain = isset($is_custom_domain) ? $is_custom_domain : (request()->getHost() !== '13.61.10.174' && request()->getHost() !== 'localhost' && request()->getHost() !== '127.0.0.1');
@endphp
<style>
/* ============================================
   THEME 4 - PROFESSIONAL ELEGANT DESIGN
   Hero Image as Background, Stunning Animations
============================================ */

:root {
    --primary: #6366f1;
    --primary-dark: #4f46e5;
    --secondary: #a855f7;
    --accent: #f59e0b;
    --pink: #ec4899;
    --cyan: #06b6d4;
    --dark: #0a0a0a;
    --darker: #050505;
    --card: rgba(255, 255, 255, 0.03);
    --border: rgba(255, 255, 255, 0.08);
    --glow: 0 0 30px rgba(99, 102, 241, 0.3);
    --glow-pink: 0 0 30px rgba(236, 72, 153, 0.3);
}

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Inter', sans-serif;
    background: var(--darker);
    color: #fff;
    overflow-x: hidden;
}

.container {
    max-width: 1280px;
    margin: 0 auto;
    padding: 0 24px;
}

/* ========== HERO SECTION - FULLSCREEN WITH BG IMAGE ========== */
.hero-luxury {
    position: relative;
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    overflow: hidden;
    isolation: isolate;
}

.hero-luxury-bg {
    position: absolute;
    inset: 0;
    z-index: -2;
}

.hero-luxury-bg img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    filter: brightness(0.4) contrast(1.1);
    transform: scale(1);
    transition: transform 0.3s ease;
}

.hero-luxury-overlay {
    position: absolute;
    inset: 0;
    background: radial-gradient(circle at center, rgba(0,0,0,0.3) 0%, rgba(0,0,0,0.7) 100%);
    z-index: -1;
}

.hero-luxury-content {
    position: relative;
    z-index: 2;
    max-width: 900px;
    margin: 0 auto;
    padding: 100px 0;
    animation: fadeInUp 1s ease;
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(50px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.hero-luxury-badge {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(10px);
    padding: 8px 24px;
    border-radius: 100px;
    margin-bottom: 30px;
    font-size: 14px;
    font-weight: 500;
    border: 1px solid rgba(255, 255, 255, 0.2);
    animation: pulse 2s infinite;
}

@keyframes pulse {
    0%, 100% { box-shadow: 0 0 0 0 rgba(99, 102, 241, 0.4); }
    50% { box-shadow: 0 0 0 15px rgba(99, 102, 241, 0); }
}

.hero-luxury-title {
    font-size: 72px;
    font-weight: 800;
    line-height: 1.1;
    margin-bottom: 24px;
    letter-spacing: -0.02em;
}

.hero-luxury-title .gradient-text {
    background: linear-gradient(135deg, #fff, #6366f1, #a855f7, #ec4899);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-size: 300% 300%;
    animation: gradientFlow 5s ease infinite;
}

@keyframes gradientFlow {
    0%, 100% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
}

.hero-luxury-text {
    font-size: 18px;
    color: rgba(255, 255, 255, 0.8);
    margin-bottom: 40px;
    line-height: 1.6;
    max-width: 700px;
    margin-left: auto;
    margin-right: auto;
}

.hero-luxury-buttons {
    display: flex;
    gap: 20px;
    justify-content: center;
    margin-bottom: 60px;
    flex-wrap: wrap;
}

.btn-luxury {
    padding: 14px 36px;
    border-radius: 50px;
    font-weight: 600;
    text-decoration: none;
    transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    display: inline-flex;
    align-items: center;
    gap: 10px;
    position: relative;
    overflow: hidden;
    z-index: 1;
}

.btn-luxury::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
    transition: left 0.5s;
    z-index: -1;
}

.btn-luxury:hover::before {
    left: 100%;
}

.btn-luxury-primary {
    background: linear-gradient(135deg, #6366f1, #a855f7);
    color: white;
    box-shadow: 0 5px 20px rgba(99, 102, 241, 0.4);
}

.btn-luxury-primary:hover {
    transform: translateY(-3px) scale(1.05);
    box-shadow: 0 15px 35px rgba(99, 102, 241, 0.5);
}

.btn-luxury-outline {
    border: 2px solid rgba(255, 255, 255, 0.3);
    color: white;
    background: rgba(255, 255, 255, 0.05);
    backdrop-filter: blur(10px);
}

.btn-luxury-outline:hover {
    border-color: #6366f1;
    background: rgba(99, 102, 241, 0.2);
    transform: translateY(-3px);
}

.hero-luxury-stats {
    display: flex;
    justify-content: center;
    gap: 80px;
    flex-wrap: wrap;
}

.hero-luxury-stat {
    text-align: center;
    animation: fadeInUp 1s ease 0.2s both;
}

.hero-luxury-stat h3 {
    font-size: 38px;
    font-weight: 800;
    background: linear-gradient(135deg, #fff, #a855f7);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}

.hero-luxury-stat p {
    font-size: 14px;
    color: rgba(255, 255, 255, 0.7);
    margin-top: 5px;
    letter-spacing: 1px;
}

/* ========== SECTION HEADER ========== */
.section-premium {
    text-align: center;
    margin-bottom: 60px;
}

.section-premium-badge {
    display: inline-block;
    background: linear-gradient(135deg, rgba(99, 102, 241, 0.2), rgba(168, 85, 247, 0.2));
    padding: 6px 20px;
    border-radius: 50px;
    font-size: 12px;
    margin-bottom: 16px;
    letter-spacing: 2px;
    text-transform: uppercase;
}

.section-premium h2 {
    font-size: 48px;
    font-weight: 700;
    margin-bottom: 16px;
}

.section-premium h2 span {
    background: linear-gradient(135deg, #6366f1, #a855f7);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}

.section-premium p {
    color: #94a3b8;
    font-size: 18px;
    max-width: 700px;
    margin: 0 auto;
}

/* ========== FEATURES SECTION - 3D HOVER CARDS ========== */
.features-premium {
    padding: 100px 0;
}

.features-premium-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 30px;
}

.feature-premium-card {
    background: linear-gradient(135deg, rgba(255,255,255,0.03), rgba(255,255,255,0.01));
    border: 1px solid rgba(255, 255, 255, 0.05);
    border-radius: 30px;
    padding: 40px 30px;
    text-align: center;
    transition: all 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    position: relative;
    overflow: hidden;
}

.feature-premium-card::after {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(135deg, rgba(99, 102, 241, 0.1), rgba(168, 85, 247, 0.1));
    opacity: 0;
    transition: opacity 0.5s;
}

.feature-premium-card:hover {
    transform: translateY(-15px) scale(1.02);
    border-color: rgba(99, 102, 241, 0.4);
    box-shadow: var(--glow);
}

.feature-premium-card:hover::after {
    opacity: 1;
}

.feature-premium-icon {
    width: 80px;
    height: 80px;
    margin: 0 auto 25px;
    background: linear-gradient(135deg, rgba(99, 102, 241, 0.2), rgba(168, 85, 247, 0.2));
    border-radius: 25px;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.4s;
    position: relative;
    z-index: 2;
}

.feature-premium-card:hover .feature-premium-icon {
    border-radius: 20px;
    transform: rotate(5deg) scale(1.1);
    background: linear-gradient(135deg, #6366f1, #a855f7);
}

.feature-premium-icon img {
    width: 45px;
    height: 45px;
    object-fit: contain;
    transition: all 0.4s;
}

.feature-premium-card:hover .feature-premium-icon img {
    filter: brightness(0) invert(1);
}

.feature-premium-card h3 {
    font-size: 22px;
    margin-bottom: 12px;
    position: relative;
    z-index: 2;
}

.feature-premium-card p {
    color: #94a3b8;
    font-size: 14px;
    line-height: 1.6;
    position: relative;
    z-index: 2;
}

.feature-premium-number {
    position: absolute;
    bottom: 20px;
    right: 25px;
    font-size: 60px;
    font-weight: 800;
    opacity: 0.03;
    transition: all 0.4s;
}

.feature-premium-card:hover .feature-premium-number {
    opacity: 0.08;
    transform: scale(1.1);
}

/* ========== STATS SECTION - COUNTER ========== */
.stats-premium {
    padding: 80px 0;
    background: linear-gradient(135deg, rgba(99, 102, 241, 0.05), rgba(168, 85, 247, 0.05));
    border-radius: 60px;
    margin: 40px 0;
}

.stats-premium-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 30px;
    text-align: center;
}

.stat-premium-item {
    padding: 20px;
    transition: all 0.4s;
}

.stat-premium-item:hover {
    transform: translateY(-5px);
}

.stat-premium-item h3 {
    font-size: 52px;
    font-weight: 800;
    background: linear-gradient(135deg, #6366f1, #a855f7);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    margin-bottom: 8px;
}

.stat-premium-item p {
    color: #94a3b8;
    font-size: 14px;
    letter-spacing: 1px;
}

/* ========== AMENITIES CAROUSEL ========== */
.amenities-premium {
    padding: 100px 0;
    overflow: hidden;
}

.amenities-carousel-container {
    position: relative;
    overflow: hidden;
    padding: 30px 0;
}

.amenities-carousel-track {
    display: flex;
    gap: 25px;
    transition: transform 0.5s cubic-bezier(0.2, 0.9, 0.4, 1.1);
    cursor: grab;
}

.amenities-carousel-track:active {
    cursor: grabbing;
}

.amenity-premium-card {
    flex: 0 0 280px;
    background: linear-gradient(135deg, rgba(255,255,255,0.03), rgba(255,255,255,0.01));
    border: 1px solid rgba(255, 255, 255, 0.05);
    border-radius: 24px;
    padding: 35px 25px;
    text-align: center;
    transition: all 0.4s;
}

.amenity-premium-card:hover {
    transform: translateY(-10px);
    border-color: rgba(99, 102, 241, 0.4);
    box-shadow: var(--glow);
}

.amenity-premium-icon {
    width: 70px;
    height: 70px;
    margin: 0 auto 20px;
    background: linear-gradient(135deg, rgba(99, 102, 241, 0.2), rgba(168, 85, 247, 0.2));
    border-radius: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.4s;
}

.amenity-premium-card:hover .amenity-premium-icon {
    border-radius: 15px;
    transform: rotate(5deg);
}

.amenity-premium-icon img {
    width: 40px;
    height: 40px;
    object-fit: contain;
}

.amenity-premium-card h4 {
    font-size: 18px;
    margin-bottom: 10px;
}

.amenity-premium-card p {
    font-size: 13px;
    color: #94a3b8;
    line-height: 1.5;
}

.carousel-nav {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    width: 50px;
    height: 50px;
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(10px);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.3s;
    z-index: 10;
}

.carousel-nav:hover {
    background: #6366f1;
    transform: translateY(-50%) scale(1.1);
}

.carousel-prev { left: 10px; }
.carousel-next { right: 10px; }

/* ========== SPLIT ABOUT SECTION ========== */
.about-premium {
    padding: 100px 0;
}

.about-premium-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 60px;
    align-items: center;
}

.about-premium-image {
    position: relative;
    border-radius: 30px;
    overflow: hidden;
    transition: all 0.5s;
}

.about-premium-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.7s;
}

.about-premium-image:hover img {
    transform: scale(1.05);
}

.about-premium-badge {
    position: absolute;
    bottom: 30px;
    left: 30px;
    background: linear-gradient(135deg, #6366f1, #a855f7);
    padding: 20px 30px;
    border-radius: 20px;
    text-align: center;
    animation: pulse 2s infinite;
}

.about-premium-badge h3 {
    font-size: 42px;
    font-weight: 800;
}

.about-premium-feature {
    display: flex;
    gap: 18px;
    margin-bottom: 28px;
    padding: 15px;
    border-radius: 20px;
    transition: all 0.4s;
    background: rgba(255, 255, 255, 0.02);
}

.about-premium-feature:hover {
    background: rgba(99, 102, 241, 0.1);
    transform: translateX(12px);
}

.about-premium-feature-icon {
    width: 55px;
    height: 55px;
    background: linear-gradient(135deg, rgba(99, 102, 241, 0.2), rgba(168, 85, 247, 0.2));
    border-radius: 18px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 24px;
    color: #6366f1;
    transition: all 0.3s;
}

.about-premium-feature:hover .about-premium-feature-icon {
    background: linear-gradient(135deg, #6366f1, #a855f7);
    color: white;
    transform: scale(1.05);
}

/* ========== PROPERTIES SECTION ========== */
.properties-premium {
    padding: 100px 0;
}

.properties-premium-tabs {
    display: flex;
    justify-content: center;
    gap: 16px;
    margin-bottom: 50px;
}

.tab-premium {
    padding: 12px 32px;
    background: rgba(255, 255, 255, 0.03);
    border: 1px solid rgba(255, 255, 255, 0.1);
    border-radius: 50px;
    color: white;
    cursor: pointer;
    transition: all 0.3s;
    font-weight: 500;
}

.tab-premium:hover {
    background: rgba(99, 102, 241, 0.3);
    transform: translateY(-2px);
}

.tab-premium.active {
    background: linear-gradient(135deg, #6366f1, #a855f7);
    border-color: transparent;
    box-shadow: 0 5px 20px rgba(99, 102, 241, 0.4);
}

.properties-premium-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 30px;
}

.property-premium-card {
    background: linear-gradient(135deg, rgba(255,255,255,0.03), rgba(255,255,255,0.01));
    border: 1px solid rgba(255, 255, 255, 0.05);
    border-radius: 24px;
    overflow: hidden;
    transition: all 0.5s;
}

.property-premium-card:hover {
    transform: translateY(-12px);
    border-color: rgba(99, 102, 241, 0.4);
    box-shadow: var(--glow);
}

.property-premium-image {
    position: relative;
    height: 240px;
    overflow: hidden;
}

.property-premium-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.7s;
}

.property-premium-card:hover .property-premium-image img {
    transform: scale(1.1);
}

.property-premium-badge {
    position: absolute;
    top: 16px;
    right: 16px;
    background: linear-gradient(135deg, #6366f1, #a855f7);
    padding: 6px 14px;
    border-radius: 20px;
    font-size: 11px;
    font-weight: 600;
    text-transform: uppercase;
}

.property-premium-overlay {
    position: absolute;
    inset: 0;
    background: rgba(0, 0, 0, 0.6);
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: opacity 0.3s;
}

.property-premium-card:hover .property-premium-overlay {
    opacity: 1;
}

.property-premium-view {
    width: 55px;
    height: 55px;
    background: white;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #6366f1;
    font-size: 20px;
    transition: all 0.3s;
}

.property-premium-view:hover {
    transform: scale(1.1);
    background: #6366f1;
    color: white;
}

.property-premium-info {
    padding: 22px;
}

.property-premium-info h3 {
    font-size: 18px;
    margin-bottom: 8px;
}

.property-premium-info p {
    color: #94a3b8;
    font-size: 13px;
    margin-bottom: 15px;
}

.property-premium-meta {
    display: flex;
    gap: 16px;
    margin: 12px 0;
    font-size: 12px;
    color: #94a3b8;
}

.property-premium-footer {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-top: 15px;
    padding-top: 15px;
    border-top: 1px solid rgba(255, 255, 255, 0.1);
}

.property-premium-price {
    font-size: 22px;
    font-weight: 700;
    color: #a855f7;
}

.property-premium-link {
    width: 40px;
    height: 40px;
    background: rgba(99, 102, 241, 0.2);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    transition: all 0.3s;
}

.property-premium-link:hover {
    background: #6366f1;
    transform: translateX(6px);
}

/* ========== CTA SECTION ========== */
.cta-premium {
    position: relative;
    padding: 100px 0;
    margin: 60px 0;
    border-radius: 60px;
    overflow: hidden;
}

.cta-premium-bg {
    position: absolute;
    inset: 0;
    background: linear-gradient(135deg, #6366f1, #a855f7, #ec4899);
}

.cta-premium-particles {
    position: absolute;
    top: -50%;
    right: -20%;
    width: 60%;
    height: 200%;
    background: radial-gradient(circle, rgba(255, 255, 255, 0.15), transparent);
    border-radius: 50%;
    animation: rotateParticles 20s linear infinite;
}

@keyframes rotateParticles {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

.cta-premium-content {
    position: relative;
    z-index: 2;
    text-align: center;
}

.cta-premium-content h2 {
    font-size: 48px;
    margin-bottom: 20px;
}

.cta-premium-content p {
    font-size: 18px;
    margin-bottom: 35px;
    opacity: 0.9;
}

.cta-premium-buttons {
    display: flex;
    gap: 20px;
    justify-content: center;
    flex-wrap: wrap;
}

.btn-premium-white {
    background: white;
    color: #6366f1;
}

.btn-premium-white:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
}

.btn-premium-transparent {
    border: 2px solid white;
    color: white;
    background: transparent;
}

.btn-premium-transparent:hover {
    background: white;
    color: #6366f1;
    transform: translateY(-3px);
}

/* ========== TESTIMONIALS CAROUSEL ========== */
.testimonials-premium {
    padding: 100px 0;
    overflow: hidden;
}

.testimonial-premium-card {
    flex: 0 0 350px;
    background: linear-gradient(135deg, rgba(255,255,255,0.03), rgba(255,255,255,0.01));
    border: 1px solid rgba(255, 255, 255, 0.05);
    border-radius: 24px;
    padding: 35px;
    transition: all 0.4s;
}

.testimonial-premium-card:hover {
    transform: translateY(-10px);
    border-color: rgba(99, 102, 241, 0.4);
    box-shadow: var(--glow);
}

.testimonial-premium-quote {
    font-size: 60px;
    color: #6366f1;
    opacity: 0.3;
    margin-bottom: 20px;
    font-family: serif;
}

.testimonial-premium-text {
    font-size: 15px;
    line-height: 1.7;
    color: #cbd5e1;
    margin-bottom: 25px;
    font-style: italic;
}

.testimonial-premium-author {
    display: flex;
    align-items: center;
    gap: 15px;
}

.testimonial-premium-author img {
    width: 55px;
    height: 55px;
    border-radius: 50%;
    object-fit: cover;
    border: 2px solid #6366f1;
}

.testimonial-premium-author h4 {
    font-size: 16px;
    margin-bottom: 4px;
}

.testimonial-premium-author span {
    font-size: 12px;
    color: #94a3b8;
}

.testimonial-premium-stars {
    margin-top: 15px;
    color: #f59e0b;
    font-size: 12px;
    letter-spacing: 2px;
}

/* ========== RESPONSIVE ========== */
@media (max-width: 1024px) {
    .features-premium-grid,
    .properties-premium-grid {
        grid-template-columns: repeat(2, 1fr);
    }

    .hero-luxury-title {
        font-size: 52px;
    }
}

@media (max-width: 768px) {
    .features-premium-grid,
    .properties-premium-grid,
    .stats-premium-grid {
        grid-template-columns: 1fr;
    }

    .about-premium-grid {
        grid-template-columns: 1fr;
    }

    .hero-luxury-title {
        font-size: 36px;
    }

    .section-premium h2 {
        font-size: 32px;
    }

    .hero-luxury-stats {
        gap: 30px;
    }

    .cta-premium-content h2 {
        font-size: 32px;
    }

    .amenity-premium-card,
    .testimonial-premium-card {
        flex: 0 0 280px;
    }
}

@media (max-width: 480px) {
    .hero-luxury-buttons {
        flex-direction: column;
        align-items: center;
    }

    .cta-premium-buttons {
        flex-direction: column;
        align-items: center;
    }
}
</style>

<!-- ========== HERO SECTION WITH BG IMAGE ========== -->
@php
    $Section_0 = App\Models\FrontHomePage::where('section', 'Section 0')->where('parent_id', $parent_id)->first();
    $Section_0_content_value = !empty($Section_0->content_value) ? json_decode($Section_0->content_value, true) : [];
@endphp
@if (empty($Section_0_content_value['section_enabled']) || $Section_0_content_value['section_enabled'] == 'active')
<section class="hero-luxury">
    <div class="hero-luxury-bg">
        <img src="{{ asset(Storage::url($Section_0_content_value['banner_image1_path'] ?? '')) }}" alt="Hero Background">
    </div>
    <div class="hero-luxury-overlay"></div>
    <div class="container">
        <div class="hero-luxury-content">
            <div class="hero-luxury-badge">
                <span>✨</span> PREMIUM REAL ESTATE
            </div>
            <h1 class="hero-luxury-title">{{ $Section_0_content_value['title'] ?? 'Where' }} <span class="gradient-text">{{ __('Dreams Find Home') }}</span></h1>
            <p class="hero-luxury-text">{{ $Section_0_content_value['sub_title'] ?? 'Discover exceptional properties curated for discerning buyers. Experience luxury living at its finest.' }}</p>
            <div class="hero-luxury-buttons">
                <a href="{{ $isCustomDomain ? route('custom.domain.properties') : route('property.home', $user->code) }}" class="btn-luxury btn-luxury-primary">Explore Collection <i class="fas fa-arrow-right"></i></a>
                <a href="{{ route('contact.home', $user->code) }}" class="btn-luxury btn-luxury-outline"><i class="fas fa-play-circle"></i> Virtual Tour</a>
            </div>
            <div class="hero-luxury-stats">
                <div class="hero-luxury-stat"><h3>500+</h3><p>LUXURY HOMES</p></div>
                <div class="hero-luxury-stat"><h3>98%</h3><p>SATISFACTION</p></div>
                <div class="hero-luxury-stat"><h3>24/7</h3><p>CONCIERGE</p></div>
            </div>
        </div>
    </div>
</section>
@endif

<!-- ========== FEATURES SECTION ========== -->
@php
    $Section_1 = App\Models\FrontHomePage::where('section', 'Section 1')->where('parent_id', $parent_id)->first();
    $Section_1_content_value = !empty($Section_1->content_value) ? json_decode($Section_1->content_value, true) : [];
@endphp
@if (empty($Section_1_content_value['section_enabled']) || $Section_1_content_value['section_enabled'] == 'active')
<section class="features-premium">
    <div class="container">
        <div class="section-premium">
            <div class="section-premium-badge">✦ SIGNATURE SERVICES</div>
            <h2>{{ $Section_1_content_value['Sec1_title'] ?? 'Unparalleled' }} <span>{{ __('Excellence') }}</span></h2>
            <p>{{ $Section_1_content_value['Sec1_info'] ?? 'Experience white-glove service and exceptional expertise in every transaction' }}</p>
        </div>
        <div class="features-premium-grid">
            @for ($i = 1; $i <= 3; $i++)
                @if (!empty($Section_1_content_value['Sec1_box' . $i . '_enabled']) && $Section_1_content_value['Sec1_box' . $i . '_enabled'] == 'active')
                <div class="feature-premium-card">
                    <div class="feature-premium-icon"><img src="{{ asset(Storage::url($Section_1_content_value['Sec1_box' . $i . '_image_path'] ?? '')) }}" alt="Icon"></div>
                    <h3>{{ $Section_1_content_value['Sec1_box' . $i . '_title'] ?? 'Feature' }}</h3>
                    <p>{{ $Section_1_content_value['Sec1_box' . $i . '_info'] ?? 'Description' }}</p>
                    <div class="feature-premium-number">0{{ $i }}</div>
                </div>
                @endif
            @endfor
        </div>
    </div>
</section>
@endif

<!-- ========== STATS SECTION ========== -->
@php
    $Section_2 = App\Models\FrontHomePage::where('section', 'Section 2')->where('parent_id', $parent_id)->first();
    $Section_2_content_value = !empty($Section_2->content_value) ? json_decode($Section_2->content_value, true) : [];
@endphp
@if (empty($Section_2_content_value['section_enabled']) || $Section_2_content_value['section_enabled'] == 'active')
<section class="stats-premium">
    <div class="container">
        <div class="stats-premium-grid">
            <div class="stat-premium-item"><h3>{{ $Section_2_content_value['Box1_number'] ?? '500' }}+</h3><p>PROPERTIES SOLD</p></div>
            <div class="stat-premium-item"><h3>{{ $Section_2_content_value['Box2_number'] ?? '1000' }}+</h3><p>HAPPY CLIENTS</p></div>
            <div class="stat-premium-item"><h3>{{ $Section_2_content_value['Box3_number'] ?? '50' }}+</h3><p>PREMIUM LOCATIONS</p></div>
            <div class="stat-premium-item"><h3>{{ $Section_2_content_value['Box4_number'] ?? '10' }}+</h3><p>YEARS OF EXCELLENCE</p></div>
        </div>
    </div>
</section>
@endif

<!-- ========== AMENITIES CAROUSEL ========== -->
@php
    $Section_3 = App\Models\FrontHomePage::where('section', 'Section 3')->where('parent_id', $parent_id)->first();
    $Section_3_content_value = !empty($Section_3->content_value) ? json_decode($Section_3->content_value, true) : [];
@endphp
@if (empty($Section_3_content_value['section_enabled']) || $Section_3_content_value['section_enabled'] == 'active')
<section class="amenities-premium">
    <div class="container">
        <div class="section-premium">
            <div class="section-premium-badge">✦ LUXURY AMENITIES</div>
            <h2>{{ $Section_3_content_value['Sec3_title'] ?? 'World-Class' }} <span>{{ __('Amenities') }}</span></h2>
            <p>{{ $Section_3_content_value['Sec3_info'] ?? 'Indulge in unparalleled comfort with our curated selection of premium amenities' }}</p>
        </div>
    </div>
    <div class="amenities-carousel-container">
        <div class="amenities-carousel-track" id="amenitiesTrack">
            @if(isset($allAmenities) && count($allAmenities) > 0)
                @foreach ($allAmenities as $amenity)
                <div class="amenity-premium-card">
                    <div class="amenity-premium-icon"><img src="{{ asset(Storage::url('upload/amenity/' . ($amenity->image ?? 'default.png'))) }}" alt="{{ $amenity->name }}"></div>
                    <h4>{{ ucfirst($amenity->name) }}</h4>
                    <p>{{ \Illuminate\Support\Str::limit(strip_tags($amenity->description), 60) }}</p>
                </div>
                @endforeach
                @foreach ($allAmenities as $amenity)
                <div class="amenity-premium-card">
                    <div class="amenity-premium-icon"><img src="{{ asset(Storage::url('upload/amenity/' . ($amenity->image ?? 'default.png'))) }}" alt="{{ $amenity->name }}"></div>
                    <h4>{{ ucfirst($amenity->name) }}</h4>
                    <p>{{ \Illuminate\Support\Str::limit(strip_tags($amenity->description), 60) }}</p>
                </div>
                @endforeach
            @endif
        </div>
        <div class="carousel-nav carousel-prev" id="amenitiesPrev"><i class="fas fa-chevron-left"></i></div>
        <div class="carousel-nav carousel-next" id="amenitiesNext"><i class="fas fa-chevron-right"></i></div>
    </div>
</section>
@endif

<!-- ========== ABOUT SECTION ========== -->
@php
    $Section_4 = App\Models\FrontHomePage::where('section', 'Section 4')->where('parent_id', $parent_id)->first();
    $Section_4_content_value = !empty($Section_4->content_value) ? json_decode($Section_4->content_value, true) : [];
@endphp
@if (empty($Section_4_content_value['section_enabled']) || $Section_4_content_value['section_enabled'] == 'active')
<section class="about-premium">
    <div class="container">
        <div class="about-premium-grid">
            <div class="about-premium-image">
                <img src="{{ asset(Storage::url($Section_4_content_value['about_image_path'] ?? '')) }}" alt="About">
                <div class="about-premium-badge"><h3>10+</h3><p>Years of Excellence</p></div>
            </div>
            <div class="about-premium-content">
                <div class="section-premium-badge">✦ OUR LEGACY</div>
                <h2 style="font-size: 42px; margin-bottom: 20px;">{{ $Section_4_content_value['Sec4_title'] ?? 'Redefining Luxury Living' }}</h2>
                <p style="color:#94a3b8; margin-bottom: 30px;">With over a decade of excellence, we've mastered the art of matching discerning clients with their dream properties.</p>
                @if(!empty($Section_4_content_value['Sec4_Box_title']))
                    @foreach ($Section_4_content_value['Sec4_Box_title'] as $key => $title)
                    <div class="about-premium-feature">
                        <div class="about-premium-feature-icon"><i class="fas fa-gem"></i></div>
                        <div><h4>{{ $title }}</h4><p style="color:#94a3b8;">{{ $Section_4_content_value['Sec4_Box_subtitle'][$key] ?? '' }}</p></div>
                    </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</section>
@endif

<!-- ========== PROPERTIES SECTION ========== -->
<!-- ========== PROPERTIES SECTION ========== -->
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
<section class="properties-premium">
    <div class="container">
        <div class="section-premium">
            <div class="section-premium-badge">✦ EXCLUSIVE LISTINGS</div>
            <h2>{{ $Section_5_content_value['Sec5_title'] ?? 'Featured' }} <span>{{ __('Properties') }}</span></h2>
            <p>{{ $Section_5_content_value['Sec5_info'] ?? 'Discover our curated collection of exceptional properties' }}</p>
        </div>

        @if($latestProperties->count() > 0)
            <div class="properties-premium-grid">
                @foreach ($latestProperties as $property)
                    @php
                        $thumbnail = !empty($property->thumbnail->image) ? $property->thumbnail->image : 'default.jpg';
                    @endphp
                    <div class="property-premium-card">
                        <div class="property-premium-image">
                            <img src="{{ asset(Storage::url('upload/property/thumbnail/' . $thumbnail)) }}" alt="{{ $property->name }}">
                            <span class="property-premium-badge">{{ ucfirst($property->listing_type ?? 'Property') }}</span>
                            <div class="property-premium-overlay">
                                <a href="{{ $isCustomDomain ? route('custom.domain.property.detail', ['id' => \Crypt::encrypt($property->id)]) : route('property.detail', ['code' => $user->code, \Crypt::encrypt($property->id)]) }}" class="property-premium-view"><i class="fas fa-eye"></i></a>
                            </div>
                        </div>
                        <div class="property-premium-info">
                            <h3>{{ ucfirst($property->name) }}</h3>
                            <p>{{ \Illuminate\Support\Str::limit(strip_tags($property->description ?? ''), 60) }}</p>
                            <div class="property-premium-meta">
                                <span><i class="fas fa-tag"></i> {{ \App\Models\Property::types()[$property->type] ?? ucfirst($property->type) }}</span>
                                <span><i class="fas fa-map-marker-alt"></i> {{ $property->city ?? 'Prime Location' }}</span>
                            </div>
                            <div class="property-premium-footer">
                                <span class="property-premium-price">{{ priceFormat($property->price) }}</span>
                                <a href="{{ $isCustomDomain ? route('custom.domain.property.detail', ['id' => \Crypt::encrypt($property->id)]) : route('property.detail', ['code' => $user->code, \Crypt::encrypt($property->id)]) }}" class="property-premium-link"><i class="fas fa-arrow-right"></i></a>
                            </div>
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
</section>
@endif
<!-- ========== CTA SECTION ========== -->
@php
    $Section_6 = App\Models\FrontHomePage::where('section', 'Section 6')->where('parent_id', $parent_id)->first();
    $Section_6_content_value = !empty($Section_6->content_value) ? json_decode($Section_6->content_value, true) : [];
@endphp
@if (empty($Section_6_content_value['section_enabled']) || $Section_6_content_value['section_enabled'] == 'active')
<section class="cta-premium">
    <div class="cta-premium-bg"><div class="cta-premium-particles"></div></div>
    <div class="container">
        <div class="cta-premium-content">
            <h2>{{ $Section_6_content_value['Sec6_title'] ?? 'Begin Your Luxury Journey' }}</h2>
            <p>{{ $Section_6_content_value['Sec6_info'] ?? 'Let our expert advisors guide you to your dream property' }}</p>
            <div class="cta-premium-buttons">
                <a href="{{ $Section_6_content_value['sec6_btn_link'] ?? '#' }}" class="btn-luxury btn-premium-white">{{ $Section_6_content_value['sec6_btn_name'] ?? 'Schedule Consultation' }} <i class="fas fa-calendar-check"></i></a>
                <a href="{{ route('contact.home', $user->code) }}" class="btn-luxury btn-premium-transparent"><i class="fas fa-headset"></i> Concierge Service</a>
            </div>
        </div>
    </div>
</section>
@endif

<!-- ========== TESTIMONIALS CAROUSEL ========== -->
@php
    $Section_7 = App\Models\FrontHomePage::where('section', 'Section 7')->where('parent_id', $parent_id)->first();
    $Section_7_content_value = !empty($Section_7->content_value) ? json_decode($Section_7->content_value, true) : [];
@endphp
@if (empty($Section_7_content_value['section_enabled']) || $Section_7_content_value['section_enabled'] == 'active')
<section class="testimonials-premium">
    <div class="container">
        <div class="section-premium">
            <div class="section-premium-badge">✦ CLIENT LOVE</div>
            <h2>{{ $Section_7_content_value['Sec7_title'] ?? 'What Our' }} <span>{{ __('Clients Say') }}</span></h2>
            <p>{{ $Section_7_content_value['Sec7_info'] ?? 'Real stories from our valued clients' }}</p>
        </div>
    </div>
    <div class="amenities-carousel-container">
        <div class="amenities-carousel-track" id="testimonialsTrack">
            @php
                $testimonials = [];
                for ($i = 1; $i <= 8; $i++) {
                    if (!empty($Section_7_content_value["Sec7_box{$i}_Enabled"]) && $Section_7_content_value["Sec7_box{$i}_Enabled"] == 'active') {
                        $testimonials[] = $i;
                    }
                }
            @endphp
            @foreach ($testimonials as $num)
            <div class="testimonial-premium-card">
                <div class="testimonial-premium-quote">“</div>
                <p class="testimonial-premium-text">{{ \Illuminate\Support\Str::limit($Section_7_content_value["Sec7_box{$num}_review"] ?? '', 150) }}</p>
                <div class="testimonial-premium-author">
                    <img src="{{ asset(Storage::url($Section_7_content_value["Sec7_box{$num}_image_path"] ?? '')) }}" alt="Author">
                    <div><h4>{{ $Section_7_content_value["Sec7_box{$num}_name"] ?? 'Client' }}</h4><span>{{ $Section_7_content_value["Sec7_box{$num}_tag"] ?? 'Happy Client' }}</span></div>
                </div>
                <div class="testimonial-premium-stars">★★★★★</div>
            </div>
            @endforeach
            @foreach ($testimonials as $num)
            <div class="testimonial-premium-card">
                <div class="testimonial-premium-quote">“</div>
                <p class="testimonial-premium-text">{{ \Illuminate\Support\Str::limit($Section_7_content_value["Sec7_box{$num}_review"] ?? '', 150) }}</p>
                <div class="testimonial-premium-author">
                    <img src="{{ asset(Storage::url($Section_7_content_value["Sec7_box{$num}_image_path"] ?? '')) }}" alt="Author">
                    <div><h4>{{ $Section_7_content_value["Sec7_box{$num}_name"] ?? 'Client' }}</h4><span>{{ $Section_7_content_value["Sec7_box{$num}_tag"] ?? 'Happy Client' }}</span></div>
                </div>
                <div class="testimonial-premium-stars">★★★★★</div>
            </div>
            @endforeach
        </div>
        <div class="carousel-nav carousel-prev" id="testimonialsPrev"><i class="fas fa-chevron-left"></i></div>
        <div class="carousel-nav carousel-next" id="testimonialsNext"><i class="fas fa-chevron-right"></i></div>
    </div>
</section>
@endif

@endsection

@push('theme4-script')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // ========== AMENITIES CAROUSEL ==========
    const amenitiesTrack = document.getElementById('amenitiesTrack');
    const amenitiesPrev = document.getElementById('amenitiesPrev');
    const amenitiesNext = document.getElementById('amenitiesNext');

    if (amenitiesTrack && amenitiesPrev && amenitiesNext) {
        let amenitiesPosition = 0;
        const amenitiesItem = amenitiesTrack.children[0];
        const amenitiesItemWidth = amenitiesItem ? amenitiesItem.offsetWidth + 25 : 305;
        const amenitiesMaxPosition = Math.max(0, (amenitiesTrack.children.length / 2 - 4) * amenitiesItemWidth);

        amenitiesNext.addEventListener('click', () => {
            if (amenitiesPosition < amenitiesMaxPosition) {
                amenitiesPosition += amenitiesItemWidth;
                amenitiesTrack.style.transform = `translateX(-${amenitiesPosition}px)`;
            }
        });

        amenitiesPrev.addEventListener('click', () => {
            if (amenitiesPosition > 0) {
                amenitiesPosition -= amenitiesItemWidth;
                amenitiesTrack.style.transform = `translateX(-${amenitiesPosition}px)`;
            }
        });
    }

    // ========== TESTIMONIALS CAROUSEL ==========
    const testimonialsTrack = document.getElementById('testimonialsTrack');
    const testimonialsPrev = document.getElementById('testimonialsPrev');
    const testimonialsNext = document.getElementById('testimonialsNext');

    if (testimonialsTrack && testimonialsPrev && testimonialsNext) {
        let testimonialsPosition = 0;
        const testimonialItem = testimonialsTrack.children[0];
        const testimonialItemWidth = testimonialItem ? testimonialItem.offsetWidth + 25 : 375;
        const testimonialMaxPosition = Math.max(0, (testimonialsTrack.children.length / 2 - 3) * testimonialItemWidth);

        testimonialsNext.addEventListener('click', () => {
            if (testimonialsPosition < testimonialMaxPosition) {
                testimonialsPosition += testimonialItemWidth;
                testimonialsTrack.style.transform = `translateX(-${testimonialsPosition}px)`;
            }
        });

        testimonialsPrev.addEventListener('click', () => {
            if (testimonialsPosition > 0) {
                testimonialsPosition -= testimonialItemWidth;
                testimonialsTrack.style.transform = `translateX(-${testimonialsPosition}px)`;
            }
        });
    }

    // ========== PROPERTY TABS ==========
    const tabs = document.querySelectorAll('.tab-premium');
    const contents = document.querySelectorAll('.properties-content');

    tabs.forEach(tab => {
        tab.addEventListener('click', () => {
            const tabId = tab.dataset.tab;
            tabs.forEach(t => t.classList.remove('active'));
            contents.forEach(c => c.style.display = 'none');
            tab.classList.add('active');
            document.querySelector(`.properties-content[data-tab="${tabId}"]`).style.display = 'block';
        });
    });

    // ========== SCROLL REVEAL ==========
    const revealElements = document.querySelectorAll('.feature-premium-card, .stat-premium-item, .property-premium-card, .amenity-premium-card, .testimonial-premium-card, .about-premium-feature');
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, { threshold: 0.1 });

    revealElements.forEach(el => {
        el.style.opacity = '0';
        el.style.transform = 'translateY(40px)';
        el.style.transition = 'all 0.7s ease';
        observer.observe(el);
    });
});
</script>
@endpush
