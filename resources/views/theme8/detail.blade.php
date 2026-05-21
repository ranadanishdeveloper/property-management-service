@extends('theme8.main')
@section('content')

<style>
/* ============================================
   THEME 8 - PROPERTY DETAIL PAGE
   iOS Glassmorphism + Image Carousel + Details
   ============================================ */

.glass-detail-section {
    padding: 40px 0 80px;
    background: #f5f5f7;
}

/* Property Header */
.glass-property-header {
    margin-bottom: 30px;
}

.glass-property-title {
    font-size: 2.5rem;
    font-weight: 800;
    margin-bottom: 15px;
    color: #1d1c1e;
}

.glass-property-meta {
    display: flex;
    gap: 15px;
    flex-wrap: wrap;
    margin-bottom: 20px;
}

.glass-meta-badge {
    background: rgba(0, 122, 255, 0.1);
    color: #007aff;
    padding: 6px 16px;
    border-radius: 30px;
    font-size: 13px;
    font-weight: 600;
}

.glass-property-price {
    font-size: 2rem;
    font-weight: 800;
    color: #007aff;
}

/* Image Carousel */
.glass-carousel-section {
    margin-bottom: 50px;
}

.glass-carousel-container {
    position: relative;
    border-radius: 24px;
    overflow: hidden;
    background: white;
    box-shadow: 0 4px 16px rgba(0, 0, 0, 0.06);
}

.glass-carousel-track {
    display: flex;
    transition: transform 0.5s ease;
}

.glass-carousel-slide {
    min-width: 100%;
    height: 500px;
}

.glass-carousel-slide img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    cursor: pointer;
}

.glass-carousel-btn {
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
    z-index: 10;
}

.glass-carousel-btn:hover {
    background: #007aff;
    color: white;
}

.glass-carousel-prev { left: 20px; }
.glass-carousel-next { right: 20px; }

.glass-carousel-dots {
    display: flex;
    justify-content: center;
    gap: 8px;
    margin-top: 15px;
}

.glass-carousel-dot {
    width: 8px;
    height: 8px;
    background: #cbd5e1;
    border-radius: 50%;
    cursor: pointer;
    transition: all 0.2s;
}

.glass-carousel-dot.active {
    background: #007aff;
    width: 24px;
    border-radius: 4px;
}

.glass-thumbnail-strip {
    display: flex;
    gap: 12px;
    margin-top: 20px;
    overflow-x: auto;
    padding-bottom: 10px;
}

.glass-thumbnail-item {
    width: 80px;
    height: 70px;
    border-radius: 12px;
    overflow: hidden;
    cursor: pointer;
    opacity: 0.6;
    transition: all 0.2s;
    border: 2px solid transparent;
}

.glass-thumbnail-item.active {
    opacity: 1;
    border-color: #007aff;
}

.glass-thumbnail-item img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

/* Two Column Layout */
.glass-two-column {
    display: grid;
    grid-template-columns: 1fr 0.4fr;
    gap: 40px;
}

/* Info Cards */
.glass-info-card {
    background: rgba(255, 255, 255, 0.8);
    backdrop-filter: blur(20px);
    border-radius: 24px;
    padding: 30px;
    margin-bottom: 30px;
    box-shadow: 0 4px 16px rgba(0, 0, 0, 0.06);
}

.glass-info-card h3 {
    font-size: 1.3rem;
    font-weight: 700;
    margin-bottom: 20px;
    padding-bottom: 12px;
    border-bottom: 2px solid #007aff;
    display: inline-block;
}

.glass-info-card p {
    color: #4a5568;
    line-height: 1.7;
}

/* Amenities Grid */
.glass-amenities-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 15px;
}

.glass-amenity-item {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 12px 16px;
    background: rgba(0, 122, 255, 0.05);
    border-radius: 16px;
}

.glass-amenity-item i {
    color: #007aff;
    font-size: 18px;
}

/* Advantages */
.glass-advantages-list {
    display: flex;
    flex-wrap: wrap;
    gap: 12px;
}

.glass-advantage-item {
    padding: 8px 20px;
    background: rgba(0, 122, 255, 0.1);
    color: #007aff;
    border-radius: 30px;
    font-size: 13px;
    font-weight: 500;
}

/* Units Grid */
.glass-units-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 20px;
}

.glass-unit-card {
    background: rgba(0, 122, 255, 0.05);
    padding: 20px;
    border-radius: 20px;
}

.glass-unit-card h4 {
    font-size: 1.1rem;
    font-weight: 700;
    color: #007aff;
    margin-bottom: 12px;
}

.glass-unit-detail {
    display: flex;
    justify-content: space-between;
    margin-bottom: 8px;
    font-size: 13px;
    color: #4a5568;
}

.glass-unit-detail strong {
    color: #1d1c1e;
}

/* Sidebar */
.glass-sidebar-card {
    background: rgba(255, 255, 255, 0.8);
    backdrop-filter: blur(20px);
    border-radius: 24px;
    padding: 25px;
    margin-bottom: 30px;
    box-shadow: 0 4px 16px rgba(0, 0, 0, 0.06);
}

.glass-sidebar-card h3 {
    font-size: 1.1rem;
    font-weight: 700;
    margin-bottom: 20px;
    padding-bottom: 12px;
    border-bottom: 2px solid #007aff;
    display: inline-block;
}

.glass-stats-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 15px;
}

.glass-stat-card {
    text-align: center;
    padding: 15px;
    background: rgba(0, 122, 255, 0.05);
    border-radius: 16px;
}

.glass-stat-card i {
    font-size: 24px;
    color: #007aff;
    margin-bottom: 8px;
}

.glass-stat-card .stat-value {
    font-size: 1.1rem;
    font-weight: 700;
    color: #007aff;
}

.glass-contact-btn {
    display: block;
    background: #007aff;
    color: white;
    text-align: center;
    padding: 14px;
    border-radius: 16px;
    text-decoration: none;
    font-weight: 600;
    margin-top: 20px;
    transition: all 0.2s;
}

.glass-contact-btn:hover {
    background: #005fc1;
    transform: translateY(-2px);
}

/* Modal */
.glass-modal {
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

.glass-modal.active {
    display: flex;
}

.glass-modal img {
    max-width: 90%;
    max-height: 90%;
    object-fit: contain;
    animation: zoomIn 0.3s ease;
}

@keyframes zoomIn {
    from { opacity: 0; transform: scale(0.8); }
    to { opacity: 1; transform: scale(1); }
}

.glass-modal-close {
    position: absolute;
    top: 20px;
    right: 30px;
    font-size: 40px;
    color: white;
    cursor: pointer;
    transition: transform 0.3s;
}

.glass-modal-close:hover {
    transform: rotate(90deg);
}

/* Responsive */
@media (max-width: 1024px) {
    .glass-two-column {
        grid-template-columns: 1fr;
    }

    .glass-carousel-slide {
        height: 400px;
    }
}

@media (max-width: 768px) {
    .glass-property-title {
        font-size: 1.8rem;
    }

    .glass-property-price {
        font-size: 1.5rem;
    }

    .glass-carousel-slide {
        height: 280px;
    }

    .glass-amenities-grid,
    .glass-units-grid {
        grid-template-columns: 1fr;
    }

    .glass-info-card {
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
                return 'Price on Request';
            }
            return '$' . number_format($price, 0, '.', ',');
        }
    }
@endphp

<section class="glass-detail-section">
    <div class="glass-container">
        <!-- Property Header -->
        <div class="glass-property-header">
            <h1 class="glass-property-title">{{ ucfirst($property->name) }}</h1>
            <div class="glass-property-meta">
                <span class="glass-meta-badge">{{ \App\Models\Property::types()[$property->type] ?? ucfirst($property->type) }}</span>
                <span class="glass-meta-badge">{{ ucfirst($property->listing_type) }}</span>
                <span class="glass-property-price">{{ priceformat($property->price) }}{{ $property->listing_type == 'rent' ? ' / month' : '' }}</span>
            </div>
        </div>

        <!-- Image Carousel -->
        <div class="glass-carousel-section">
            <div class="glass-carousel-container">
                <div class="glass-carousel-track" id="carouselTrack">
                    @foreach ($allImages as $image)
                        <div class="glass-carousel-slide">
                            <img src="{{ asset(Storage::url('upload/property/image/' . ($image->image ?? 'default.jpg'))) }}" alt="{{ $property->name }}">
                        </div>
                    @endforeach
                </div>
                @if($imageCount > 1)
                    <button class="glass-carousel-btn glass-carousel-prev" id="carouselPrev"><i class="fas fa-chevron-left"></i></button>
                    <button class="glass-carousel-btn glass-carousel-next" id="carouselNext"><i class="fas fa-chevron-right"></i></button>
                @endif
            </div>

            @if($imageCount > 1)
            <div class="glass-carousel-dots" id="carouselDots">
                @foreach ($allImages as $key => $image)
                    <div class="glass-carousel-dot {{ $key == 0 ? 'active' : '' }}" data-index="{{ $key }}"></div>
                @endforeach
            </div>
            <div class="glass-thumbnail-strip">
                @foreach ($allImages as $key => $image)
                    <div class="glass-thumbnail-item {{ $key == 0 ? 'active' : '' }}" data-index="{{ $key }}">
                        <img src="{{ asset(Storage::url('upload/property/image/' . ($image->image ?? 'default.jpg'))) }}" alt="Thumbnail">
                    </div>
                @endforeach
            </div>
            @endif
        </div>

        <!-- Two Column Layout -->
        <div class="glass-two-column">
            <!-- Left Column -->
            <div class="glass-left-column">
                <div class="glass-info-card">
                    <h3>Description</h3>
                    <div>{!! $property->description !!}</div>
                </div>

                @if(isset($selectedAmenities) && $selectedAmenities->count() > 0)
                <div class="glass-info-card">
                    <h3>Amenities</h3>
                    <div class="glass-amenities-grid">
                        @foreach ($selectedAmenities as $amenity)
                            <div class="glass-amenity-item">
                                <i class="fas fa-check-circle"></i>
                                <span>{{ $amenity->name }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>
                @endif

                @if(isset($selectedAdvantages) && $selectedAdvantages->count() > 0)
                <div class="glass-info-card">
                    <h3>Advantages</h3>
                    <div class="glass-advantages-list">
                        @foreach ($selectedAdvantages as $advantage)
                            <div class="glass-advantage-item">{{ $advantage->name }}</div>
                        @endforeach
                    </div>
                </div>
                @endif

                @if($units->isNotEmpty())
                <div class="glass-info-card">
                    <h3>Property Units</h3>
                    <div class="glass-units-grid">
                        @foreach ($units as $unit)
                            <div class="glass-unit-card">
                                <h4>{{ ucfirst($unit->name) }}</h4>
                                <div class="glass-unit-detail"><strong>Bedroom:</strong> <span>{{ $unit->bedroom }}</span></div>
                                <div class="glass-unit-detail"><strong>Kitchen:</strong> <span>{{ $unit->kitchen }}</span></div>
                                <div class="glass-unit-detail"><strong>Bath:</strong> <span>{{ $unit->baths }}</span></div>
                                @if ($property->listing_type == 'rent')
                                    <div class="glass-unit-detail"><strong>Rent:</strong> <span>{{ priceformat($unit->rent) }}</span></div>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>

            <!-- Right Column -->
            <div class="glass-right-column">
                <div class="glass-sidebar-card">
                    <h3>Location</h3>
                    <div style="display: flex; gap: 12px; margin-top: 15px;">
                        <i class="fas fa-map-marker-alt" style="color: #007aff; font-size: 18px;"></i>
                        <p>{{ $property->address }}, {{ $property->city }}, {{ $property->state }}, {{ $property->country }}{{ $property->zip_code ? ' - ' . $property->zip_code : '' }}</p>
                    </div>
                </div>

                <div class="glass-sidebar-card">
                    <h3>Quick Stats</h3>
                    <div class="glass-stats-grid">
                        <div class="glass-stat-card">
                            <i class="fas fa-tag"></i>
                            <div class="stat-value">{{ \App\Models\Property::types()[$property->type] ?? ucfirst($property->type) }}</div>
                            <div>Type</div>
                        </div>
                        <div class="glass-stat-card">
                            <i class="fas fa-bed"></i>
                            <div class="stat-value">{{ $totalBedrooms ?: 'N/A' }}</div>
                            <div>Bedrooms</div>
                        </div>
                        <div class="glass-stat-card">
                            <i class="fas fa-bath"></i>
                            <div class="stat-value">{{ $totalBathrooms ?: 'N/A' }}</div>
                            <div>Bathrooms</div>
                        </div>
                        <div class="glass-stat-card">
                            <i class="fas fa-chart-line"></i>
                            <div class="stat-value">{{ strtoupper($property->listing_type) }}</div>
                            <div>Listing</div>
                        </div>
                    </div>
                </div>

                <div class="glass-sidebar-card">
                    <h3>Contact Agent</h3>
                    <p style="color: #8e8e93; margin-bottom: 20px; font-size: 14px;">Have questions? Contact our property expert for more details.</p>
                    <a href="{{ $isCustomDomain ? route('custom.domain.contact') : route('contact.home', $user->code) }}" class="glass-contact-btn">
                        <i class="fas fa-envelope"></i> Send Message
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Image Modal -->
<div class="glass-modal" id="imageModal">
    <span class="glass-modal-close">&times;</span>
    <img id="modalImage" src="" alt="Full size image">
</div>

@endsection

@push('theme8-scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Carousel
    const track = document.getElementById('carouselTrack');
    const prevBtn = document.getElementById('carouselPrev');
    const nextBtn = document.getElementById('carouselNext');
    const dots = document.querySelectorAll('.glass-carousel-dot');
    const thumbnails = document.querySelectorAll('.glass-thumbnail-item');
    const slides = document.querySelectorAll('.glass-carousel-slide');
    let currentIndex = 0;
    const totalSlides = slides.length;

    if (totalSlides > 0) {
        function updateCarousel(index) {
            if (index < 0) index = 0;
            if (index >= totalSlides) index = totalSlides - 1;
            currentIndex = index;
            const offset = -currentIndex * 100;
            track.style.transform = `translateX(${offset}%)`;

            dots.forEach((dot, i) => dot.classList.toggle('active', i === currentIndex));
            thumbnails.forEach((thumb, i) => thumb.classList.toggle('active', i === currentIndex));
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

        dots.forEach((dot, index) => dot.addEventListener('click', () => updateCarousel(index)));
        thumbnails.forEach((thumb, index) => thumb.addEventListener('click', () => updateCarousel(index)));

        if (totalSlides > 1) {
            setInterval(() => {
                currentIndex++;
                if (currentIndex >= totalSlides) currentIndex = 0;
                updateCarousel(currentIndex);
            }, 5000);
        }
    }

    // Modal
    const modal = document.getElementById('imageModal');
    const modalImg = document.getElementById('modalImage');
    const modalClose = document.querySelector('.glass-modal-close');

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
    modal?.addEventListener('click', (e) => { if (e.target === modal) closeModal(); });
    document.addEventListener('keydown', (e) => { if (e.key === 'Escape' && modal.classList.contains('active')) closeModal(); });
});
</script>
@endpush
