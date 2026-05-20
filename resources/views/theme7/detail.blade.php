@extends('theme7.main')
@section('content')

<style>
/* ============================================
   THEME 7 - PROPERTY DETAIL (NEON BRUTALIST - LIGHT VERSION)
   Full Image Carousel + Details
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
    max-width: 1280px;
    margin: 0 auto;
    padding: 0 24px;
    width: 100%;
}

.cyber-detail-section {
    padding: 40px 0 80px;
    background: var(--light-bg);
}

/* ========== PROPERTY HEADER ========== */
.cyber-property-title {
    font-size: 48px;
    font-weight: 800;
    margin-bottom: 20px;
    color: var(--dark-text);
}

.cyber-property-title span {
    color: var(--neon-cyan);
}

.cyber-property-meta {
    display: flex;
    gap: 15px;
    margin-bottom: 30px;
    flex-wrap: wrap;
}

.cyber-meta-badge {
    background: rgba(255, 42, 109, 0.1);
    border: 1px solid var(--neon-pink);
    padding: 6px 18px;
    font-size: 12px;
    font-weight: 700;
    color: var(--neon-pink);
    border-radius: 6px;
}

.cyber-property-price {
    font-size: 32px;
    font-weight: 800;
    color: var(--neon-pink);
}

/* ========== IMAGE CAROUSEL ========== */
.cyber-carousel-section {
    margin-bottom: 50px;
    position: relative;
}

.cyber-carousel-container {
    position: relative;
    overflow: hidden;
    border: 2px solid var(--neon-pink);
    border-radius: 8px;
}

.cyber-carousel-track {
    display: flex;
    transition: transform 0.5s cubic-bezier(0.2, 0.9, 0.4, 1);
}

.cyber-carousel-slide {
    min-width: 100%;
    height: 500px;
}

.cyber-carousel-slide img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    cursor: pointer;
}

.cyber-carousel-btn {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    width: 50px;
    height: 50px;
    background: var(--card-bg);
    border: 2px solid var(--neon-cyan);
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.2s;
    z-index: 10;
    color: var(--neon-cyan);
    border-radius: 8px;
}

.cyber-carousel-btn:hover {
    background: var(--neon-cyan);
    color: var(--dark-text);
    border-color: var(--neon-cyan);
}

.cyber-carousel-prev { left: 20px; }
.cyber-carousel-next { right: 20px; }

.cyber-carousel-dots {
    display: flex;
    justify-content: center;
    gap: 10px;
    margin-top: 20px;
}

.cyber-carousel-dot {
    width: 10px;
    height: 10px;
    background: #e9ecef;
    cursor: pointer;
    transition: all 0.2s;
    border-radius: 50%;
}

.cyber-carousel-dot.active {
    background: var(--neon-pink);
    width: 25px;
    border-radius: 4px;
}

.cyber-thumbnail-strip {
    display: flex;
    gap: 12px;
    margin-top: 20px;
    overflow-x: auto;
    padding-bottom: 10px;
}

.cyber-thumbnail-item {
    width: 80px;
    height: 70px;
    cursor: pointer;
    opacity: 0.5;
    transition: all 0.2s;
    border: 2px solid transparent;
    overflow: hidden;
    border-radius: 6px;
}

.cyber-thumbnail-item.active {
    opacity: 1;
    border-color: var(--neon-pink);
}

.cyber-thumbnail-item img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

/* ========== TWO COLUMN LAYOUT ========== */
.cyber-two-column {
    display: grid;
    grid-template-columns: 1fr 0.4fr;
    gap: 40px;
}

/* ========== INFO CARDS ========== */
.cyber-info-card {
    background: var(--card-bg);
    border: 1px solid var(--neon-cyan);
    padding: 30px;
    margin-bottom: 30px;
    border-radius: 8px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.05);
}

.cyber-info-card h3 {
    font-size: 22px;
    font-weight: 700;
    margin-bottom: 20px;
    padding-bottom: 12px;
    border-bottom: 2px solid var(--neon-pink);
    display: inline-block;
    color: var(--dark-text);
}

.cyber-info-card p {
    color: var(--gray-text);
    line-height: 1.7;
}

/* ========== AMENITIES ========== */
.cyber-amenities-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 15px;
}

.cyber-amenity-item {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 12px 16px;
    background: rgba(5, 217, 232, 0.08);
    border-left: 3px solid var(--neon-cyan);
    border-radius: 6px;
}

.cyber-amenity-item i {
    color: var(--neon-cyan);
    font-size: 18px;
}

.cyber-amenity-item span {
    color: var(--dark-text);
    font-size: 14px;
}

/* ========== ADVANTAGES ========== */
.cyber-advantages-list {
    display: flex;
    flex-wrap: wrap;
    gap: 12px;
}

.cyber-advantage-item {
    padding: 8px 20px;
    background: rgba(255, 42, 109, 0.1);
    border: 1px solid var(--neon-pink);
    font-size: 13px;
    color: var(--neon-pink);
    border-radius: 6px;
}

/* ========== UNITS ========== */
.cyber-units-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 20px;
}

.cyber-unit-card {
    background: rgba(5, 217, 232, 0.08);
    padding: 20px;
    border-left: 3px solid var(--neon-pink);
    border-radius: 8px;
}

.cyber-unit-card h4 {
    font-size: 18px;
    font-weight: 700;
    color: var(--neon-pink);
    margin-bottom: 15px;
}

.cyber-unit-detail {
    display: flex;
    justify-content: space-between;
    margin-bottom: 10px;
    font-size: 14px;
    color: var(--gray-text);
}

.cyber-unit-detail strong {
    color: var(--neon-cyan);
}

/* ========== SIDEBAR ========== */
.cyber-sidebar-card {
    background: var(--card-bg);
    border: 1px solid var(--neon-pink);
    padding: 25px;
    margin-bottom: 30px;
    border-radius: 8px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.05);
}

.cyber-sidebar-card h3 {
    font-size: 18px;
    font-weight: 700;
    margin-bottom: 20px;
    padding-bottom: 12px;
    border-bottom: 2px solid var(--neon-cyan);
    display: inline-block;
    color: var(--dark-text);
}

.cyber-location-box {
    display: flex;
    gap: 12px;
    margin-top: 15px;
    color: var(--gray-text);
}

.cyber-location-box i {
    color: var(--neon-pink);
    font-size: 18px;
}

.cyber-stats-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 15px;
}

.cyber-stat-card {
    text-align: center;
    padding: 15px;
    background: rgba(255, 42, 109, 0.08);
    border: 1px solid var(--neon-pink);
    border-radius: 8px;
}

.cyber-stat-card i {
    font-size: 24px;
    color: var(--neon-cyan);
    margin-bottom: 8px;
}

.cyber-stat-card .stat-value {
    font-size: 18px;
    font-weight: 700;
    color: var(--neon-pink);
}

.cyber-stat-card div:last-child {
    color: var(--gray-text);
    font-size: 12px;
}

.cyber-contact-btn {
    background: var(--neon-pink);
    color: white;
    border: none;
    padding: 14px;
    width: 100%;
    text-align: center;
    text-decoration: none;
    display: block;
    font-weight: 800;
    transition: all 0.2s;
    border-radius: 6px;
}

.cyber-contact-btn:hover {
    background: var(--neon-cyan);
    color: var(--dark-text);
    transform: translateY(-3px);
}

/* ========== MODAL ========== */
.cyber-modal {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.95);
    z-index: 10000;
    display: none;
    align-items: center;
    justify-content: center;
    cursor: pointer;
}

.cyber-modal.active {
    display: flex;
}

.cyber-modal img {
    max-width: 90%;
    max-height: 90%;
    object-fit: contain;
    animation: zoomIn 0.3s ease;
}

@keyframes zoomIn {
    from { opacity: 0; transform: scale(0.8); }
    to { opacity: 1; transform: scale(1); }
}

.cyber-modal-close {
    position: absolute;
    top: 20px;
    right: 30px;
    font-size: 40px;
    color: white;
    cursor: pointer;
    transition: transform 0.3s;
}

.cyber-modal-close:hover {
    transform: rotate(90deg);
}

/* ========== RESPONSIVE ========== */
@media (max-width: 1024px) {
    .cyber-two-column {
        grid-template-columns: 1fr;
    }
    .cyber-carousel-slide {
        height: 400px;
    }
}

@media (max-width: 768px) {
    .cyber-container {
        padding: 0 20px;
    }

    .cyber-property-title {
        font-size: 32px;
    }

    .cyber-property-price {
        font-size: 24px;
    }

    .cyber-carousel-slide {
        height: 280px;
    }

    .cyber-amenities-grid,
    .cyber-units-grid {
        grid-template-columns: 1fr;
    }

    .cyber-thumbnail-item {
        width: 60px;
        height: 55px;
    }

    .cyber-info-card {
        padding: 20px;
    }
}
</style>

@php
    $totalBedrooms = $units->sum('bedroom');
    $totalBathrooms = $units->sum('baths');
    $allImages = $property->propertyImages;
    $imageCount = $allImages->count();

    $isCustomDomain = isset($is_custom_domain) ? $is_custom_domain : (request()->getHost() !== '13.61.10.174' && request()->getHost() !== 'localhost' && request()->getHost() !== '127.0.0.1');

    if (!function_exists('priceformat')) {
        function priceformat($price) {
            if (empty($price)) {
                return 'PRICE ON REQUEST';
            }
            return '$' . number_format($price, 0, '.', ',');
        }
    }
@endphp

<section class="cyber-detail-section">
    <div class="cyber-container">
        <!-- Property Header -->
        <h1 class="cyber-property-title">{{ ucfirst($property->name) }} <span>// {{ $property->listing_type == 'rent' ? 'FOR RENT' : 'FOR SALE' }}</span></h1>
        <div class="cyber-property-meta">
            <span class="cyber-meta-badge">{{ \App\Models\Property::types()[$property->type] ?? ucfirst($property->type) }}</span>
            <span class="cyber-meta-badge">{{ ucfirst($property->listing_type) }}</span>
            <span class="cyber-property-price">{{ priceformat($property->price) }}{{ $property->listing_type == 'rent' ? ' / MONTH' : '' }}</span>
        </div>

        <!-- Image Carousel -->
        <div class="cyber-carousel-section">
            <div class="cyber-carousel-container">
                <div class="cyber-carousel-track" id="carouselTrack">
                    @foreach ($allImages as $image)
                        <div class="cyber-carousel-slide">
                            <img src="{{ asset(Storage::url('upload/property/image/' . ($image->image ?? 'default.jpg'))) }}" alt="{{ $property->name }}">
                        </div>
                    @endforeach
                </div>
                @if($imageCount > 1)
                    <button class="cyber-carousel-btn cyber-carousel-prev" id="carouselPrev"><i class="fas fa-chevron-left"></i></button>
                    <button class="cyber-carousel-btn cyber-carousel-next" id="carouselNext"><i class="fas fa-chevron-right"></i></button>
                @endif
            </div>

            <!-- Carousel Dots -->
            @if($imageCount > 1)
            <div class="cyber-carousel-dots" id="carouselDots">
                @foreach ($allImages as $key => $image)
                    <div class="cyber-carousel-dot {{ $key == 0 ? 'active' : '' }}" data-index="{{ $key }}"></div>
                @endforeach
            </div>
            @endif

            <!-- Thumbnail Strip -->
            @if($imageCount > 1)
            <div class="cyber-thumbnail-strip">
                @foreach ($allImages as $key => $image)
                    <div class="cyber-thumbnail-item {{ $key == 0 ? 'active' : '' }}" data-index="{{ $key }}">
                        <img src="{{ asset(Storage::url('upload/property/image/' . ($image->image ?? 'default.jpg'))) }}" alt="Thumbnail">
                    </div>
                @endforeach
            </div>
            @endif
        </div>

        <!-- Two Column Layout -->
        <div class="cyber-two-column">
            <!-- Left Column -->
            <div class="cyber-left-column">
                <!-- Description -->
                <div class="cyber-info-card">
                    <h3>// DESCRIPTION</h3>
                    <div>{!! $property->description !!}</div>
                </div>

                <!-- Amenities -->
                @if(isset($selectedAmenities) && $selectedAmenities->count() > 0)
                <div class="cyber-info-card">
                    <h3>// AMENITIES</h3>
                    <div class="cyber-amenities-grid">
                        @foreach ($selectedAmenities as $amenity)
                            <div class="cyber-amenity-item">
                                <i class="fas fa-check-circle"></i>
                                <span>{{ $amenity->name }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>
                @endif

                <!-- Advantages -->
                @if(isset($selectedAdvantages) && $selectedAdvantages->count() > 0)
                <div class="cyber-info-card">
                    <h3>// ADVANTAGES</h3>
                    <div class="cyber-advantages-list">
                        @foreach ($selectedAdvantages as $advantage)
                            <div class="cyber-advantage-item">{{ $advantage->name }}</div>
                        @endforeach
                    </div>
                </div>
                @endif

                <!-- Property Units -->
                @if($units->isNotEmpty())
                <div class="cyber-info-card">
                    <h3>// PROPERTY UNITS</h3>
                    <div class="cyber-units-grid">
                        @foreach ($units as $unit)
                            <div class="cyber-unit-card">
                                <h4>{{ ucfirst($unit->name) }}</h4>
                                <div class="cyber-unit-detail"><strong>BEDROOM:</strong> <span>{{ $unit->bedroom }}</span></div>
                                <div class="cyber-unit-detail"><strong>KITCHEN:</strong> <span>{{ $unit->kitchen }}</span></div>
                                <div class="cyber-unit-detail"><strong>BATH:</strong> <span>{{ $unit->baths }}</span></div>
                                @if ($property->listing_type == 'rent')
                                    <div class="cyber-unit-detail"><strong>RENT:</strong> <span>{{ priceformat($unit->rent) }}</span></div>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>

            <!-- Right Column - Sidebar -->
            <div class="cyber-right-column">
                <!-- Location -->
                <div class="cyber-sidebar-card">
                    <h3>// LOCATION</h3>
                    <div class="cyber-location-box">
                        <i class="fas fa-map-marker-alt"></i>
                        <p>{{ $property->address }}, {{ $property->city }}, {{ $property->state }}, {{ $property->country }}{{ $property->zip_code ? ' - ' . $property->zip_code : '' }}</p>
                    </div>
                </div>

                <!-- Quick Stats -->
                <div class="cyber-sidebar-card">
                    <h3>// QUICK STATS</h3>
                    <div class="cyber-stats-grid">
                        <div class="cyber-stat-card">
                            <i class="fas fa-tag"></i>
                            <div class="stat-value">{{ \App\Models\Property::types()[$property->type] ?? ucfirst($property->type) }}</div>
                            <div>TYPE</div>
                        </div>
                        <div class="cyber-stat-card">
                            <i class="fas fa-bed"></i>
                            <div class="stat-value">{{ $totalBedrooms ?: 'N/A' }}</div>
                            <div>BEDROOMS</div>
                        </div>
                        <div class="cyber-stat-card">
                            <i class="fas fa-bath"></i>
                            <div class="stat-value">{{ $totalBathrooms ?: 'N/A' }}</div>
                            <div>BATHROOMS</div>
                        </div>
                        <div class="cyber-stat-card">
                            <i class="fas fa-chart-line"></i>
                            <div class="stat-value">{{ strtoupper($property->listing_type) }}</div>
                            <div>LISTING</div>
                        </div>
                    </div>
                </div>

                <!-- Contact -->
                <div class="cyber-sidebar-card">
                    <h3>// CONTACT AGENT</h3>
                    <p style="color: var(--gray-text); margin-bottom: 20px; font-size: 14px;">Have questions? Contact our property expert for more details.</p>
                    <a href="{{ $isCustomDomain ? route('custom.domain.contact') : route('contact.home', $user->code) }}" class="cyber-contact-btn">
                        <i class="fas fa-envelope"></i> SEND MESSAGE
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Image Modal -->
<div class="cyber-modal" id="imageModal">
    <span class="cyber-modal-close">&times;</span>
    <img id="modalImage" src="" alt="Full size image">
</div>

@endsection

@push('theme7-scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // ========== CAROUSEL FUNCTIONALITY ==========
    const track = document.getElementById('carouselTrack');
    const prevBtn = document.getElementById('carouselPrev');
    const nextBtn = document.getElementById('carouselNext');
    const dots = document.querySelectorAll('.cyber-carousel-dot');
    const thumbnails = document.querySelectorAll('.cyber-thumbnail-item');
    const slides = document.querySelectorAll('.cyber-carousel-slide');
    let currentIndex = 0;
    const totalSlides = slides.length;

    if (totalSlides > 0) {
        function updateCarousel(index) {
            if (index < 0) index = 0;
            if (index >= totalSlides) index = totalSlides - 1;
            currentIndex = index;
            const offset = -currentIndex * 100;
            track.style.transform = `translateX(${offset}%)`;

            dots.forEach((dot, i) => {
                dot.classList.toggle('active', i === currentIndex);
            });

            thumbnails.forEach((thumb, i) => {
                thumb.classList.toggle('active', i === currentIndex);
            });
        }

        if (prevBtn && nextBtn) {
            prevBtn.addEventListener('click', () => {
                currentIndex--;
                if (currentIndex < 0) currentIndex = totalSlides - 1;
                updateCarousel(currentIndex);
            });

            nextBtn.addEventListener('click', () => {
                currentIndex++;
                if (currentIndex >= totalSlides) currentIndex = 0;
                updateCarousel(currentIndex);
            });
        }

        dots.forEach((dot, index) => {
            dot.addEventListener('click', () => updateCarousel(index));
        });

        thumbnails.forEach((thumb, index) => {
            thumb.addEventListener('click', () => updateCarousel(index));
        });

        // Auto swipe every 5 seconds
        if (totalSlides > 1) {
            setInterval(() => {
                currentIndex++;
                if (currentIndex >= totalSlides) currentIndex = 0;
                updateCarousel(currentIndex);
            }, 5000);
        }
    }

    // ========== MODAL FUNCTIONALITY ==========
    const modal = document.getElementById('imageModal');
    const modalImg = document.getElementById('modalImage');
    const modalClose = document.querySelector('.cyber-modal-close');

    track?.addEventListener('click', (e) => {
        if (e.target.tagName === 'IMG') {
            modalImg.src = e.target.src;
            modal.classList.add('active');
            document.body.style.overflow = 'hidden';
        }
    });

    function closeModal() {
        modal.classList.remove('active');
        document.body.style.overflow = '';
    }

    modalClose?.addEventListener('click', closeModal);
    modal?.addEventListener('click', (e) => {
        if (e.target === modal) closeModal();
    });

    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && modal.classList.contains('active')) closeModal();
    });
});
</script>
@endpush
