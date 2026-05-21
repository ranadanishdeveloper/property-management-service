@extends('theme6.main')
@section('content')

<style>
/* ============================================
   THEME 6 - PROPERTY DETAIL PAGE
   Modern Design with Full Carousel & Unified Container
=========================================== */

:root {
    --primary: #ff6b4a;
    --primary-dark: #e85d3e;
    --dark: #1a1a2e;
    --gray: #6c757d;
    --light: #f8f9fa;
    --white: #ffffff;
    --shadow: 0 10px 30px rgba(0,0,0,0.05);
    --shadow-lg: 0 20px 40px rgba(0,0,0,0.1);
}

/* ========== UNIFIED CONTAINER ========== */
.theme6-container {
    max-width: 1280px;
    margin: 0 auto;
    padding: 0 28px;
    width: 100%;
}

/* ========== DETAIL SECTION ========== */
.detail-section {
    padding: 40px 0 80px;
    background: var(--light);
}

.property-title {
    font-size: 48px;
    font-weight: 800;
    margin-bottom: 20px;
    background: linear-gradient(135deg, var(--dark), var(--primary));
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}

.property-meta {
    display: flex;
    gap: 15px;
    margin-bottom: 30px;
    flex-wrap: wrap;
}

.property-badge {
    background: rgba(255,107,74,0.1);
    color: var(--primary);
    padding: 6px 18px;
    border-radius: 30px;
    font-size: 13px;
    font-weight: 600;
}

.property-price {
    font-size: 32px;
    font-weight: 700;
    color: var(--primary);
}

/* ========== IMAGE CAROUSEL ========== */
.image-carousel-section {
    margin-bottom: 50px;
    position: relative;
}

.carousel-container {
    position: relative;
    overflow: hidden;
    border-radius: 24px;
}

.carousel-track {
    display: flex;
    transition: transform 0.5s ease;
}

.carousel-slide {
    min-width: 100%;
    height: 500px;
}

.carousel-slide img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    cursor: pointer;
}

.carousel-btn {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    width: 50px;
    height: 50px;
    background: rgba(0,0,0,0.6);
    backdrop-filter: blur(5px);
    border: 1px solid rgba(255,255,255,0.2);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.3s;
    z-index: 10;
    color: white;
    font-size: 20px;
}

.carousel-btn:hover {
    background: var(--primary);
    transform: translateY(-50%) scale(1.1);
}

.carousel-prev { left: 20px; }
.carousel-next { right: 20px; }

.carousel-dots {
    display: flex;
    justify-content: center;
    gap: 10px;
    margin-top: 15px;
}

.carousel-dot {
    width: 10px;
    height: 10px;
    background: #ddd;
    border-radius: 50%;
    cursor: pointer;
    transition: all 0.3s;
}

.carousel-dot.active {
    background: var(--primary);
    width: 25px;
    border-radius: 5px;
}

/* ========== THUMBNAIL STRIP ========== */
.thumbnail-strip {
    display: flex;
    gap: 12px;
    margin-top: 20px;
    overflow-x: auto;
    padding-bottom: 10px;
    scrollbar-width: thin;
}

.thumbnail-item {
    width: 80px;
    height: 70px;
    border-radius: 12px;
    overflow: hidden;
    cursor: pointer;
    opacity: 0.6;
    transition: all 0.3s;
    flex-shrink: 0;
    border: 2px solid transparent;
}

.thumbnail-item.active {
    opacity: 1;
    border-color: var(--primary);
    transform: translateY(-3px);
}

.thumbnail-item:hover {
    opacity: 1;
    transform: translateY(-2px);
}

.thumbnail-item img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

/* ========== INFO CARDS ========== */
.info-card {
    background: var(--white);
    border: 1px solid rgba(0,0,0,0.05);
    border-radius: 24px;
    padding: 30px;
    margin-bottom: 30px;
    transition: all 0.3s;
    box-shadow: var(--shadow);
}

.info-card:hover {
    box-shadow: var(--shadow-lg);
}

.info-card h3 {
    font-size: 22px;
    font-weight: 700;
    margin-bottom: 20px;
    padding-bottom: 15px;
    border-bottom: 2px solid var(--primary);
    display: inline-block;
}

.info-card p {
    color: var(--gray);
    line-height: 1.7;
}

/* ========== AMENITIES ========== */
.amenities-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 15px;
}

.amenity-item {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 12px 16px;
    background: var(--light);
    border-radius: 14px;
    transition: all 0.3s;
}

.amenity-item:hover {
    background: rgba(255,107,74,0.1);
    transform: translateX(5px);
}

.amenity-item i {
    color: var(--primary);
    font-size: 18px;
}

/* ========== ADVANTAGES ========== */
.advantages-list {
    display: flex;
    flex-wrap: wrap;
    gap: 12px;
}

.advantage-item {
    padding: 8px 20px;
    background: rgba(255,107,74,0.1);
    border-radius: 30px;
    font-size: 14px;
    color: var(--primary);
    transition: all 0.3s;
}

.advantage-item:hover {
    background: var(--primary);
    color: white;
    transform: translateY(-2px);
}

/* ========== UNITS ========== */
.units-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 20px;
}

.unit-card {
    background: var(--light);
    border-radius: 18px;
    padding: 20px;
    transition: all 0.3s;
}

.unit-card:hover {
    transform: translateY(-5px);
    box-shadow: var(--shadow);
}

.unit-card h4 {
    font-size: 18px;
    font-weight: 700;
    color: var(--primary);
    margin-bottom: 15px;
}

.unit-detail {
    display: flex;
    justify-content: space-between;
    margin-bottom: 10px;
    font-size: 14px;
}

.unit-detail strong {
    color: var(--dark);
}

/* ========== SIDEBAR CARDS ========== */
.sidebar-card {
    background: var(--white);
    border: 1px solid rgba(0,0,0,0.05);
    border-radius: 24px;
    padding: 25px;
    margin-bottom: 30px;
    box-shadow: var(--shadow);
}

.sidebar-card h3 {
    font-size: 18px;
    font-weight: 700;
    margin-bottom: 20px;
    padding-bottom: 12px;
    border-bottom: 2px solid var(--primary);
    display: inline-block;
}

.location-box {
    display: flex;
    gap: 12px;
    margin-top: 15px;
    color: var(--gray);
}

.location-box i {
    color: var(--primary);
    font-size: 18px;
}

.stats-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 12px;
}

.stat-card {
    text-align: center;
    padding: 15px;
    background: var(--light);
    border-radius: 16px;
    transition: all 0.3s;
}

.stat-card:hover {
    background: rgba(255,107,74,0.1);
    transform: translateY(-3px);
}

.stat-card i {
    font-size: 24px;
    color: var(--primary);
    margin-bottom: 8px;
}

.stat-card .stat-value {
    font-size: 18px;
    font-weight: 700;
    color: var(--primary);
}

.contact-btn {
    background: linear-gradient(135deg, var(--primary), var(--primary-dark));
    color: white;
    border: none;
    padding: 14px;
    border-radius: 12px;
    width: 100%;
    text-align: center;
    text-decoration: none;
    display: block;
    font-weight: 600;
    transition: all 0.3s;
}

.contact-btn:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 20px rgba(255,107,74,0.3);
}

/* ========== TWO COLUMN LAYOUT ========== */
.two-column {
    display: grid;
    grid-template-columns: 1fr 0.4fr;
    gap: 40px;
}

/* ========== MODAL ========== */
.image-modal {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0,0,0,0.95);
    z-index: 10000;
    display: none;
    align-items: center;
    justify-content: center;
    cursor: pointer;
}

.image-modal.active {
    display: flex;
}

.image-modal img {
    max-width: 90%;
    max-height: 90%;
    object-fit: contain;
    animation: zoomIn 0.3s ease;
}

@keyframes zoomIn {
    from {
        opacity: 0;
        transform: scale(0.8);
    }
    to {
        opacity: 1;
        transform: scale(1);
    }
}

.modal-close {
    position: absolute;
    top: 20px;
    right: 30px;
    font-size: 40px;
    color: white;
    cursor: pointer;
    transition: transform 0.3s;
}

.modal-close:hover {
    transform: rotate(90deg);
}

/* ========== RESPONSIVE ========== */
@media (max-width: 1024px) {
    .two-column {
        grid-template-columns: 1fr;
    }
    .carousel-slide {
        height: 400px;
    }
}

@media (max-width: 768px) {
    .theme6-container {
        padding: 0 20px;
    }

    .detail-section {
        padding: 30px 0 60px;
    }

    .property-title {
        font-size: 32px;
    }

    .property-price {
        font-size: 24px;
    }

    .carousel-slide {
        height: 280px;
    }

    .amenities-grid {
        grid-template-columns: 1fr;
    }

    .units-grid {
        grid-template-columns: 1fr;
    }

    .thumbnail-item {
        width: 60px;
        height: 55px;
    }

    .info-card {
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
@endphp

<!-- ========== MAIN DETAIL SECTION WITH UNIFIED CONTAINER ========== -->
<section class="detail-section">
    <div class="theme6-container">
        <!-- Property Header -->
        <h1 class="property-title">{{ ucfirst($property->name) }}</h1>
        <div class="property-meta">
            <span class="property-badge">{{ \App\Models\Property::types()[$property->type] ?? ucfirst($property->type) }}</span>
            <span class="property-badge">{{ ucfirst($property->listing_type) }}</span>
            <span class="property-price">{{ priceFormat($property->price) }}{{ $property->listing_type == 'rent' ? '/month' : '' }}</span>
        </div>

        <!-- Image Carousel -->
        <div class="image-carousel-section">
            <div class="carousel-container">
                <div class="carousel-track" id="carouselTrack">
                    @foreach ($allImages as $image)
                        <div class="carousel-slide">
                            <img src="{{ asset(Storage::url('upload/property/image/' . ($image->image ?? 'default.jpg'))) }}" alt="{{ $property->name }}">
                        </div>
                    @endforeach
                </div>
                @if($imageCount > 1)
                    <button class="carousel-btn carousel-prev" id="carouselPrev"><i class="fas fa-chevron-left"></i></button>
                    <button class="carousel-btn carousel-next" id="carouselNext"><i class="fas fa-chevron-right"></i></button>
                @endif
            </div>

            <!-- Carousel Dots -->
            @if($imageCount > 1)
            <div class="carousel-dots" id="carouselDots">
                @foreach ($allImages as $key => $image)
                    <div class="carousel-dot {{ $key == 0 ? 'active' : '' }}" data-index="{{ $key }}"></div>
                @endforeach
            </div>
            @endif

            <!-- Thumbnail Strip -->
            @if($imageCount > 1)
            <div class="thumbnail-strip">
                @foreach ($allImages as $key => $image)
                    <div class="thumbnail-item {{ $key == 0 ? 'active' : '' }}" data-index="{{ $key }}">
                        <img src="{{ asset(Storage::url('upload/property/image/' . ($image->image ?? 'default.jpg'))) }}" alt="Thumbnail">
                    </div>
                @endforeach
            </div>
            @endif
        </div>

        <!-- Two Column Layout -->
        <div class="two-column">
            <!-- Left Column -->
            <div class="left-column">
                <!-- Description -->
                <div class="info-card">
                    <h3>Description</h3>
                    <div>{!! $property->description !!}</div>
                </div>

                <!-- Amenities -->
                @if(isset($selectedAmenities) && $selectedAmenities->count() > 0)
                <div class="info-card">
                    <h3>Amenities</h3>
                    <div class="amenities-grid">
                        @foreach ($selectedAmenities as $amenity)
                            <div class="amenity-item">
                                <i class="fas fa-check-circle"></i>
                                <span>{{ $amenity->name }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>
                @endif

                <!-- Advantages -->
                @if(isset($selectedAdvantages) && $selectedAdvantages->count() > 0)
                <div class="info-card">
                    <h3>Advantages</h3>
                    <div class="advantages-list">
                        @foreach ($selectedAdvantages as $advantage)
                            <div class="advantage-item">{{ $advantage->name }}</div>
                        @endforeach
                    </div>
                </div>
                @endif

                <!-- Property Units -->
                @if($units->isNotEmpty())
                <div class="info-card">
                    <h3>Property Units</h3>
                    <div class="units-grid">
                        @foreach ($units as $unit)
                            <div class="unit-card">
                                <h4>{{ ucfirst($unit->name) }}</h4>
                                <div class="unit-detail"><strong>Bedroom:</strong> <span>{{ $unit->bedroom }}</span></div>
                                <div class="unit-detail"><strong>Kitchen:</strong> <span>{{ $unit->kitchen }}</span></div>
                                <div class="unit-detail"><strong>Bath:</strong> <span>{{ $unit->baths }}</span></div>
                                @if ($property->listing_type == 'rent')
                                    <div class="unit-detail"><strong>Rent:</strong> <span>{{ priceFormat($unit->rent) }}</span></div>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>

            <!-- Right Column - Sidebar -->
            <div class="right-column">
                <!-- Location -->
                <div class="sidebar-card">
                    <h3>Location</h3>
                    <div class="location-box">
                        <i class="fas fa-map-marker-alt"></i>
                        <p>{{ $property->address }}, {{ $property->city }}, {{ $property->state }}, {{ $property->country }}{{ $property->zip_code ? ' - ' . $property->zip_code : '' }}</p>
                    </div>
                </div>

                <!-- Quick Stats -->
                <div class="sidebar-card">
                    <h3>Quick Stats</h3>
                    <div class="stats-grid">
                        <div class="stat-card">
                            <i class="fas fa-tag"></i>
                            <div class="stat-value">{{ \App\Models\Property::types()[$property->type] ?? ucfirst($property->type) }}</div>
                            <div>Type</div>
                        </div>
                        <div class="stat-card">
                            <i class="fas fa-bed"></i>
                            <div class="stat-value">{{ $totalBedrooms ?: 'N/A' }}</div>
                            <div>Bedrooms</div>
                        </div>
                        <div class="stat-card">
                            <i class="fas fa-bath"></i>
                            <div class="stat-value">{{ $totalBathrooms ?: 'N/A' }}</div>
                            <div>Bathrooms</div>
                        </div>
                        <div class="stat-card">
                            <i class="fas fa-chart-line"></i>
                            <div class="stat-value">{{ ucfirst($property->listing_type) }}</div>
                            <div>Listing</div>
                        </div>
                    </div>
                </div>

                <!-- Contact -->
                <div class="sidebar-card">
                    <h3>Contact Agent</h3>
                    <p style="color: var(--gray); margin-bottom: 20px; font-size: 14px;">Have questions? Contact our property expert for more details.</p>
                    <a href="{{ $isCustomDomain ? route('custom.domain.contact') : route('contact.home', $user->code) }}" class="contact-btn">
                        <i class="fas fa-envelope"></i> Send Message
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Image Modal -->
<div class="image-modal" id="imageModal">
    <span class="modal-close">&times;</span>
    <img id="modalImage" src="" alt="Full size image">
</div>

@endsection

@push('theme6-script')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // ========== CAROUSEL FUNCTIONALITY ==========
    const track = document.getElementById('carouselTrack');
    const prevBtn = document.getElementById('carouselPrev');
    const nextBtn = document.getElementById('carouselNext');
    const dots = document.querySelectorAll('.carousel-dot');
    const thumbnails = document.querySelectorAll('.thumbnail-item');
    const slides = document.querySelectorAll('.carousel-slide');
    let currentIndex = 0;
    const totalSlides = slides.length;

    if (totalSlides > 0) {
        function updateCarousel(index) {
            if (index < 0) index = 0;
            if (index >= totalSlides) index = totalSlides - 1;
            currentIndex = index;
            const offset = -currentIndex * 100;
            track.style.transform = `translateX(${offset}%)`;

            // Update dots
            dots.forEach((dot, i) => {
                dot.classList.toggle('active', i === currentIndex);
            });

            // Update thumbnails
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

        // Dot click
        dots.forEach((dot, index) => {
            dot.addEventListener('click', () => {
                updateCarousel(index);
            });
        });

        // Thumbnail click
        thumbnails.forEach((thumb, index) => {
            thumb.addEventListener('click', () => {
                updateCarousel(index);
            });
        });

        // Auto swipe carousel every 5 seconds (only if more than 1 slide)
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
    const modalClose = document.querySelector('.modal-close');

    // Main carousel image click
    track?.addEventListener('click', (e) => {
        if (e.target.tagName === 'IMG') {
            modalImg.src = e.target.src;
            modal.classList.add('active');
            document.body.style.overflow = 'hidden';
        }
    });

    // Close modal function
    function closeModal() {
        modal.classList.remove('active');
        document.body.style.overflow = '';
    }

    modalClose?.addEventListener('click', closeModal);

    modal?.addEventListener('click', (e) => {
        if (e.target === modal) {
            closeModal();
        }
    });

    // Escape key close modal
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && modal.classList.contains('active')) {
            closeModal();
        }
    });
});
</script>
@endpush
