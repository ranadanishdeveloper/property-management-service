@extends('theme9.main')
@section('content')

<style>
/* ============================================
   THEME 9 - PROPERTY DETAIL PAGE
   Dark theme + Gold accents + Image Carousel + Details
   Same styling as properties page
   ============================================ */

/* Property Detail Hero */
.property-detail-hero {
    background: linear-gradient(135deg, #0a0a0a, #1a1a1a);
    padding: 100px 0 60px;
    margin-top: 80px;

    text-align: center;
}

.property-title {
    font-size: 2.5rem;
    font-weight: 800;
    color: white;
    margin-bottom: 15px;
}

.property-meta {
    display: flex;
    justify-content: center;
    gap: 15px;
    flex-wrap: wrap;
    margin-bottom: 20px;
}

.meta-badge {
    background: rgba(212, 175, 55, 0.15);
    color: #d4af37;
    padding: 6px 16px;
    border-radius: 20px;
    font-size: 13px;
    font-weight: 600;
}

.property-price {
    font-size: 2rem;
    font-weight: 800;
    color: #d4af37;
}

/* Image Carousel */
.carousel-section {
    margin-bottom: 50px;
}

.carousel-container {
    position: relative;
    border-radius: 20px;
    overflow: hidden;
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
    width: 44px;
    height: 44px;
    background: #d4af37;
    border: none;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.2s;
    z-index: 10;
    color: #0a0a0a;
}

.carousel-btn:hover {
    background: #b8941e;
    transform: translateY(-50%) scale(1.05);
}

.carousel-prev { left: 20px; }
.carousel-next { right: 20px; }

.carousel-dots {
    display: flex;
    justify-content: center;
    gap: 8px;
    margin-top: 15px;
}

.carousel-dot {
    width: 8px;
    height: 8px;
    background: #2a2a2a;
    border-radius: 50%;
    cursor: pointer;
    transition: all 0.2s;
}

.carousel-dot.active {
    background: #d4af37;
    width: 24px;
    border-radius: 4px;
}

.thumbnail-strip {
    display: flex;
    gap: 12px;
    margin-top: 20px;
    overflow-x: auto;
    padding-bottom: 10px;
    scrollbar-width: thin;
}

.thumbnail-strip::-webkit-scrollbar {
    height: 4px;
}

.thumbnail-strip::-webkit-scrollbar-track {
    background: #2a2a2a;
    border-radius: 10px;
}

.thumbnail-strip::-webkit-scrollbar-thumb {
    background: #d4af37;
    border-radius: 10px;
}

.thumbnail-item {
    width: 80px;
    height: 70px;
    border-radius: 12px;
    overflow: hidden;
    cursor: pointer;
    opacity: 0.6;
    transition: all 0.2s;
    border: 2px solid transparent;
    flex-shrink: 0;
}

.thumbnail-item.active {
    opacity: 1;
    border-color: #d4af37;
}

.thumbnail-item img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

/* Two Column Layout */
.two-column {
    display: grid;
    grid-template-columns: 1fr 0.4fr;
    gap: 40px;
}

/* Info Cards - Same as properties page card */
.info-card {
    background: #1a1a1a;
    border-radius: 20px;
    padding: 30px;
    margin-bottom: 30px;
}

.info-card h3 {
    font-size: 1.3rem;
    font-weight: 700;
    margin-bottom: 20px;
    padding-bottom: 12px;
    border-bottom: 2px solid #d4af37;
    display: inline-block;
    color: white;
}

.info-card p {
    color: #a0a0a0;
    line-height: 1.7;
}

/* Amenities Grid */
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
    background: rgba(212, 175, 55, 0.05);
    border-radius: 12px;
}

.amenity-item i {
    color: #d4af37;
    font-size: 18px;
}

.amenity-item span {
    color: #a0a0a0;
}

/* Advantages */
.advantages-list {
    display: flex;
    flex-wrap: wrap;
    gap: 12px;
}

.advantage-item {
    padding: 8px 20px;
    background: rgba(212, 175, 55, 0.1);
    color: #d4af37;
    border-radius: 20px;
    font-size: 13px;
    font-weight: 500;
}

/* Units Grid */
.units-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 20px;
}

.unit-card {
    background: rgba(212, 175, 55, 0.05);
    padding: 20px;
    border-radius: 16px;
}

.unit-card h4 {
    font-size: 1.1rem;
    font-weight: 700;
    color: #d4af37;
    margin-bottom: 12px;
}

.unit-detail {
    display: flex;
    justify-content: space-between;
    margin-bottom: 8px;
    font-size: 13px;
    color: #a0a0a0;
}

.unit-detail strong {
    color: white;
}

/* Sidebar - Same as properties page */
.sidebar-card {
    background: #1a1a1a;
    border-radius: 20px;
    padding: 25px;
    margin-bottom: 30px;
}

.sidebar-card h3 {
    font-size: 1.1rem;
    font-weight: 700;
    margin-bottom: 20px;
    padding-bottom: 12px;
    border-bottom: 2px solid #d4af37;
    display: inline-block;
    color: white;
}

.location-box {
    display: flex;
    gap: 12px;
    margin-top: 15px;
    color: #a0a0a0;
}

.location-box i {
    color: #d4af37;
    font-size: 18px;
}

.stats-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 15px;
}

.stat-card {
    text-align: center;
    padding: 15px;
    background: rgba(212, 175, 55, 0.05);
    border-radius: 12px;
}

.stat-card i {
    font-size: 24px;
    color: #d4af37;
    margin-bottom: 8px;
}

.stat-card .stat-value {
    font-size: 1.1rem;
    font-weight: 700;
    color: #d4af37;
}

.stat-card div:last-child {
    color: #a0a0a0;
    font-size: 12px;
    margin-top: 5px;
}

.contact-btn {
    display: block;
    background: #d4af37;
    color: #0a0a0a;
    text-align: center;
    padding: 14px;
    border-radius: 12px;
    text-decoration: none;
    font-weight: 700;
    margin-top: 20px;
    transition: all 0.2s;
}

.contact-btn:hover {
    background: #b8941e;
    transform: translateY(-2px);
}

/* Modal */
.modal {
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

.modal.active {
    display: flex;
}

.modal img {
    max-width: 90%;
    max-height: 90%;
    object-fit: contain;
    animation: zoomIn 0.3s ease;
}

@keyframes zoomIn {
    from { opacity: 0; transform: scale(0.8); }
    to { opacity: 1; transform: scale(1); }
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

/* Container */
.container {
    max-width: 1280px;
    margin: 0 auto;
    padding: 0 24px;
    width: 100%;
}

/* Responsive */
@media (max-width: 1024px) {
    .two-column {
        grid-template-columns: 1fr;
    }
    .carousel-slide {
        height: 400px;
    }
}

@media (max-width: 768px) {
    .property-title {
        font-size: 1.8rem;
    }
    .property-price {
        font-size: 1.5rem;
    }
    .carousel-slide {
        height: 280px;
    }
    .amenities-grid,
    .units-grid {
        grid-template-columns: 1fr;
    }
    .info-card {
        padding: 20px;
    }
    .thumbnail-item {
        width: 60px;
        height: 55px;
    }
    .container {
        padding: 0 20px;
    }
    .property-detail-hero {
        margin-top: 70px;
        padding: 80px 0 40px;
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

<!-- ========== PROPERTY DETAIL HERO ========== -->
<section class="property-detail-hero " style="margin-top: 83px">
    <h1 class="property-title">{{ ucfirst($property->name) }}</h1>
    <div class="property-meta">
        <span class="meta-badge">{{ \App\Models\Property::types()[$property->type] ?? ucfirst($property->type) }}</span>
        <span class="meta-badge">{{ ucfirst($property->listing_type) }}</span>
        <span class="property-price">{{ priceformat($property->price) }}{{ $property->listing_type == 'rent' ? ' / month' : '' }}</span>
    </div>
</section>

<!-- ========== IMAGE CAROUSEL ========== -->
<section class="container">
    <div class="carousel-section">
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

        @if($imageCount > 1)
        <div class="carousel-dots" id="carouselDots">
            @foreach ($allImages as $key => $image)
                <div class="carousel-dot {{ $key == 0 ? 'active' : '' }}" data-index="{{ $key }}"></div>
            @endforeach
        </div>
        <div class="thumbnail-strip" id="thumbnailStrip">
            @foreach ($allImages as $key => $image)
                <div class="thumbnail-item {{ $key == 0 ? 'active' : '' }}" data-index="{{ $key }}">
                    <img src="{{ asset(Storage::url('upload/property/image/' . ($image->image ?? 'default.jpg'))) }}" alt="Thumbnail">
                </div>
            @endforeach
        </div>
        @endif
    </div>
</section>

<!-- ========== DETAILS SECTION ========== -->
<section class="container">
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
                                <div class="unit-detail"><strong>Rent:</strong> <span>{{ priceformat($unit->rent) }}</span></div>
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
                        <div class="stat-value">{{ strtoupper($property->listing_type) }}</div>
                        <div>Listing</div>
                    </div>
                </div>
            </div>

            <!-- Contact -->
            <div class="sidebar-card">
                <h3>Contact Agent</h3>
                <p style="color: #a0a0a0; margin-bottom: 20px; font-size: 14px;">Have questions? Contact our property expert for more details.</p>
                <a href="{{ $isCustomDomain ? route('custom.domain.contact') : route('contact.home', $user->code) }}" class="contact-btn">
                    <i class="fas fa-envelope"></i> Send Message
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Image Modal -->
<div class="modal" id="imageModal">
    <span class="modal-close">&times;</span>
    <img id="modalImage" src="" alt="Full size image">
</div>

@endsection

@push('theme9-scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Get elements
    const track = document.getElementById('carouselTrack');
    const prevBtn = document.getElementById('carouselPrev');
    const nextBtn = document.getElementById('carouselNext');
    const dots = document.querySelectorAll('.carousel-dot');
    const thumbnails = document.querySelectorAll('.thumbnail-item');
    const slides = document.querySelectorAll('.carousel-slide');
    let currentIndex = 0;
    const totalSlides = slides.length;

    console.log('Total slides:', totalSlides);
    console.log('Thumbnails found:', thumbnails.length);

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

        // Previous button
        if (prevBtn) {
            prevBtn.addEventListener('click', () => {
                currentIndex--;
                if (currentIndex < 0) currentIndex = totalSlides - 1;
                updateCarousel(currentIndex);
            });
        }

        // Next button
        if (nextBtn) {
            nextBtn.addEventListener('click', () => {
                currentIndex++;
                if (currentIndex >= totalSlides) currentIndex = 0;
                updateCarousel(currentIndex);
            });
        }

        // Dot clicks
        dots.forEach((dot, index) => {
            dot.addEventListener('click', () => updateCarousel(index));
        });

        // Thumbnail clicks
        thumbnails.forEach((thumb, index) => {
            thumb.addEventListener('click', () => updateCarousel(index));
        });

        // Auto play every 5 seconds
        if (totalSlides > 1) {
            setInterval(() => {
                currentIndex++;
                if (currentIndex >= totalSlides) currentIndex = 0;
                updateCarousel(currentIndex);
            }, 5000);
        }
    }

    // Modal Functionality
    const modal = document.getElementById('imageModal');
    const modalImg = document.getElementById('modalImage');
    const modalClose = document.querySelector('.modal-close');

    if (track) {
        track.addEventListener('click', (e) => {
            if (e.target.tagName === 'IMG') {
                modalImg.src = e.target.src;
                modal.classList.add('active');
                document.body.style.overflow = 'hidden';
            }
        });
    }

    function closeModal() {
        modal.classList.remove('active');
        document.body.style.overflow = '';
    }

    if (modalClose) {
        modalClose.addEventListener('click', closeModal);
    }

    if (modal) {
        modal.addEventListener('click', (e) => {
            if (e.target === modal) closeModal();
        });
    }

    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && modal.classList.contains('active')) closeModal();
    });
});
</script>
@endpush
