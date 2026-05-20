@extends('theme5.main')
@section('content')

<style>
/* ============================================
   THEME 5 - PROPERTY DETAIL PAGE
   Light & Modern Design Matching Index
============================================ */

:root {
    --primary: #3b82f6;
    --primary-light: #eff6ff;
    --primary-dark: #2563eb;
    --text-dark: #0f172a;
    --text-gray: #475569;
    --text-light: #64748b;
    --bg-white: #ffffff;
    --bg-light: #f8fafc;
    --border: #e2e8f0;
    --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
    --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
    --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.05);
}

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Inter', sans-serif;
    background: var(--bg-white);
    color: var(--text-dark);
}

.detail-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 24px;
}

/* Property Detail Section */
.detail-hero {
    padding: 100px 0 40px;
}

/* ========== PROPERTY HEADER ========== */
.property-header {
    margin-bottom: 40px;
}

.property-header h1 {
    font-size: 42px;
    font-weight: 800;
    margin-bottom: 16px;
    color: var(--text-dark);
}

.property-header h1 span {
    color: var(--primary);
}

.property-meta {
    display: flex;
    flex-wrap: wrap;
    gap: 12px;
    align-items: center;
    margin-bottom: 20px;
}

.property-badge {
    display: inline-block;
    background: var(--primary-light);
    padding: 6px 16px;
    border-radius: 30px;
    font-size: 13px;
    font-weight: 500;
    color: var(--primary);
}

.property-badge-sale {
    background: #dcfce7;
    color: #16a34a;
}

.property-badge-rent {
    background: #fef3c7;
    color: #d97706;
}

.property-price {
    font-size: 28px;
    font-weight: 700;
    color: var(--primary);
}

/* ========== IMAGE GALLERY ========== */
.gallery-wrapper {
    margin-bottom: 50px;
}

.gallery-grid {
    display: grid;
    grid-template-columns: 1fr 0.8fr;
    gap: 20px;
}

.gallery-main {
    position: relative;
    border-radius: 20px;
    overflow: hidden;
    height: 450px;
    cursor: pointer;
    background: var(--bg-light);
}

.gallery-main img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.4s;
}

.gallery-main:hover img {
    transform: scale(1.03);
}

.gallery-side {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 20px;
}

.gallery-side-item {
    border-radius: 16px;
    overflow: hidden;
    height: 215px;
    cursor: pointer;
    position: relative;
    background: var(--bg-light);
}

.gallery-side-item img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.4s;
}

.gallery-side-item:hover img {
    transform: scale(1.03);
}

.gallery-more-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0, 0, 0, 0.6);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 20px;
    font-weight: 700;
    color: white;
}

/* ========== INFO CARDS ========== */
.info-card {
    background: var(--bg-white);
    border: 1px solid var(--border);
    border-radius: 20px;
    padding: 28px;
    margin-bottom: 30px;
    transition: all 0.3s;
}

.info-card:hover {
    box-shadow: var(--shadow-lg);
    border-color: var(--primary);
}

.card-header {
    display: flex;
    align-items: center;
    gap: 12px;
    margin-bottom: 20px;
    padding-bottom: 15px;
    border-bottom: 1px solid var(--border);
}

.card-header i {
    font-size: 24px;
    color: var(--primary);
}

.card-header h3 {
    font-size: 18px;
    font-weight: 600;
    margin: 0;
    color: var(--text-dark);
}

.description-text {
    color: var(--text-gray);
    line-height: 1.7;
    font-size: 15px;
}

/* ========== AMENITIES LIST ========== */
.amenities-list {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 12px;
}

.amenity-item {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 10px;
    background: var(--bg-light);
    border-radius: 12px;
    transition: all 0.3s;
}

.amenity-item:hover {
    background: var(--primary-light);
    transform: translateX(5px);
}

.amenity-item img {
    width: 40px;
    height: 40px;
    object-fit: cover;
    border-radius: 8px;
}

.amenity-item i {
    font-size: 18px;
    color: var(--primary);
}

.amenity-item span {
    font-size: 14px;
    color: var(--text-gray);
}

/* ========== ADVANTAGES LIST ========== */
.advantages-list {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
}

.advantage-item {
    display: flex;
    align-items: center;
    gap: 8px;
    padding: 8px 16px;
    background: var(--primary-light);
    border-radius: 30px;
    font-size: 13px;
    transition: all 0.3s;
    color: var(--primary);
}

.advantage-item:hover {
    background: var(--primary);
    color: white;
    transform: translateY(-2px);
}

.advantage-item i {
    font-size: 12px;
}

/* ========== UNITS GRID ========== */
.units-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 20px;
}

.unit-card {
    background: var(--bg-light);
    border: 1px solid var(--border);
    border-radius: 16px;
    padding: 18px;
    transition: all 0.3s;
}

.unit-card:hover {
    transform: translateY(-3px);
    box-shadow: var(--shadow-md);
    border-color: var(--primary);
}

.unit-card h4 {
    font-size: 16px;
    font-weight: 600;
    margin-bottom: 12px;
    color: var(--primary);
}

.unit-details {
    display: flex;
    flex-direction: column;
    gap: 8px;
}

.unit-detail {
    display: flex;
    justify-content: space-between;
    font-size: 13px;
}

.unit-detail strong {
    color: var(--text-light);
}

.unit-detail span {
    color: var(--text-dark);
    font-weight: 500;
}

/* ========== SIDEBAR CARDS ========== */
.sidebar-card {
    background: var(--bg-white);
    border: 1px solid var(--border);
    border-radius: 20px;
    padding: 24px;
    margin-bottom: 30px;
    transition: all 0.3s;
}

.sidebar-card:hover {
    box-shadow: var(--shadow-md);
}

.sidebar-title {
    font-size: 16px;
    font-weight: 600;
    margin-bottom: 20px;
    display: flex;
    align-items: center;
    gap: 10px;
    padding-bottom: 15px;
    border-bottom: 1px solid var(--border);
    color: var(--text-dark);
}

.sidebar-title i {
    color: var(--primary);
    font-size: 18px;
}

/* ========== LOCATION BOX ========== */
.location-box {
    display: flex;
    align-items: flex-start;
    gap: 12px;
    padding: 15px;
    background: var(--bg-light);
    border-radius: 16px;
    margin-bottom: 20px;
}

.location-box i {
    font-size: 18px;
    color: var(--primary);
    margin-top: 2px;
}

.location-box p {
    color: var(--text-gray);
    font-size: 14px;
    line-height: 1.5;
    margin: 0;
}

/* ========== STATS GRID ========== */
.stats-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 12px;
    margin-bottom: 20px;
}

.stat-box {
    text-align: center;
    padding: 15px;
    background: var(--bg-light);
    border-radius: 16px;
    transition: all 0.3s;
}

.stat-box:hover {
    background: var(--primary-light);
    transform: translateY(-2px);
}

.stat-box i {
    font-size: 22px;
    color: var(--primary);
    margin-bottom: 8px;
}

.stat-box .stat-label {
    font-size: 11px;
    color: var(--text-light);
    margin-bottom: 4px;
}

.stat-box .stat-value {
    font-size: 15px;
    font-weight: 700;
    color: var(--primary);
}

/* ========== CONTACT BUTTON ========== */
.contact-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    width: 100%;
    padding: 12px 24px;
    background: var(--primary);
    border: none;
    border-radius: 12px;
    color: white;
    font-weight: 600;
    text-decoration: none;
    transition: all 0.3s;
}

.contact-btn:hover {
    background: var(--primary-dark);
    transform: translateY(-2px);
}

/* ========== MODAL ========== */
.image-modal {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.9);
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
    animation: zoomIn 0.2s ease;
}

@keyframes zoomIn {
    from {
        opacity: 0;
        transform: scale(0.9);
    }
    to {
        opacity: 1;
        transform: scale(1);
    }
}

.image-modal-close {
    position: absolute;
    top: 20px;
    right: 30px;
    font-size: 40px;
    color: white;
    cursor: pointer;
    transition: transform 0.2s;
}

.image-modal-close:hover {
    transform: rotate(90deg);
}

/* ========== TWO COLUMN LAYOUT ========== */
.two-column-layout {
    display: grid;
    grid-template-columns: 1fr 0.4fr;
    gap: 40px;
}

/* ========== RESPONSIVE ========== */
@media (max-width: 1024px) {
    .two-column-layout {
        grid-template-columns: 1fr;
    }

    .gallery-grid {
        grid-template-columns: 1fr;
    }

    .gallery-side {
        grid-template-columns: repeat(4, 1fr);
    }

    .gallery-side-item {
        height: 120px;
    }

    .property-header h1 {
        font-size: 32px;
    }
}

@media (max-width: 768px) {
    .property-header h1 {
        font-size: 28px;
    }

    .amenities-list {
        grid-template-columns: 1fr;
    }

    .units-grid {
        grid-template-columns: 1fr;
    }

    .gallery-side {
        grid-template-columns: repeat(2, 1fr);
    }

    .gallery-main {
        height: 300px;
    }

    .property-price {
        font-size: 22px;
    }
}
</style>

<!-- ========== PROPERTY DETAIL SECTION ========== -->
@php
    $isCustomDomain = isset($is_custom_domain) ? $is_custom_domain : (request()->getHost() !== '13.61.10.174' && request()->getHost() !== 'localhost' && request()->getHost() !== '127.0.0.1');

    $totalBedrooms = 0;
    $totalBathrooms = 0;
    if ($units && $units->isNotEmpty()) {
        $totalBedrooms = $units->sum('bedroom');
        $totalBathrooms = $units->sum('baths');
    }

    $imageCount = $property->propertyImages->count();
    $displayImages = $property->propertyImages->take(3);
    $remainingImages = $imageCount - 3;
@endphp

<div class="detail-hero">
    <div class="detail-container">
        <!-- Property Header -->
        <div class="property-header">
            <h1>{{ ucfirst($property->name) }} <span>{{ __('Property') }}</span></h1>
            <div class="property-meta">
                <span class="property-badge">{{ \App\Models\Property::types()[$property->type] }}</span>
                <span class="property-badge {{ $property->listing_type == 'sale' ? 'property-badge-sale' : 'property-badge-rent' }}">
                    {{ ucfirst($property->listing_type) }}
                </span>
                @if (!empty($property->price) && $property->listing_type == 'rent')
                    <span class="property-price">{{ priceformat($property->price) }}/month</span>
                @else
                    <span class="property-price">{{ priceformat($property->price) }}</span>
                @endif
            </div>
        </div>

        <!-- Image Gallery -->
        <div class="gallery-wrapper">
            <div class="gallery-grid">
                <div class="gallery-main" id="mainImage">
                    @php $firstImage = $property->propertyImages->first(); @endphp
                    <img id="mainGalleryImage" src="{{ asset(Storage::url('upload/property/image/' . ($firstImage->image ?? 'default.jpg'))) }}" alt="{{ $property->name }}">
                </div>
                <div class="gallery-side">
                    @foreach ($displayImages as $key => $image)
                        @if ($key > 0)
                            @php $img = !empty($image->image) ? $image->image : 'default.jpg'; @endphp
                            <div class="gallery-side-item" data-image="{{ asset(Storage::url('upload/property/image/' . $img)) }}">
                                <img src="{{ asset(Storage::url('upload/property/image/' . $img)) }}" alt="Gallery Image">
                            </div>
                        @endif
                    @endforeach
                    @if ($remainingImages > 0)
                        <div class="gallery-side-item" data-image="{{ asset(Storage::url('upload/property/image/' . ($property->propertyImages[3]->image ?? 'default.jpg'))) }}">
                            <img src="{{ asset(Storage::url('upload/property/image/' . ($property->propertyImages[3]->image ?? 'default.jpg'))) }}" alt="More Images">
                            <div class="gallery-more-overlay">+{{ $remainingImages }}</div>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Two Column Layout -->
        <div class="two-column-layout">
            <!-- Left Column -->
            <div class="left-column">
                <!-- Description Card -->
                <div class="info-card">
                    <div class="card-header">
                        <i class="fas fa-file-alt"></i>
                        <h3>Property Description</h3>
                    </div>
                    <div class="description-text">
                        {!! $property->description !!}
                    </div>
                </div>

                <!-- Amenities Card -->
                <div class="info-card">
                    <div class="card-header">
                        <i class="fas fa-gem"></i>
                        <h3>Included Amenities</h3>
                    </div>
                    @if ($selectedAmenities->count())
                        <div class="amenities-list">
                            @foreach ($selectedAmenities as $amenity)
                                <div class="amenity-item">
                                    @if ($amenity->image)
                                        <img src="{{ asset(Storage::url('upload/amenity/' . $amenity->image)) }}" alt="{{ $amenity->name }}">
                                    @else
                                        <i class="fas fa-check-circle"></i>
                                    @endif
                                    <span>{{ $amenity->name }}</span>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p style="color: var(--text-light);">No amenities selected.</p>
                    @endif
                </div>

                <!-- Advantages Card -->
                <div class="info-card">
                    <div class="card-header">
                        <i class="fas fa-star"></i>
                        <h3>Key Advantages</h3>
                    </div>
                    @if ($selectedAdvantages->count())
                        <div class="advantages-list">
                            @foreach ($selectedAdvantages as $advantage)
                                <div class="advantage-item">
                                    <i class="fas fa-check-circle"></i>
                                    {{ $advantage->name }}
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p style="color: var(--text-light);">No advantages selected.</p>
                    @endif
                </div>

                <!-- Property Units Card -->
                @if($units->isNotEmpty())
                    <div class="info-card">
                        <div class="card-header">
                            <i class="fas fa-building"></i>
                            <h3>Property Units</h3>
                        </div>
                        <div class="units-grid">
                            @foreach ($units as $unit)
                                <div class="unit-card">
                                    <h4>{{ ucfirst($unit->name) }}</h4>
                                    <div class="unit-details">
                                        <div class="unit-detail"><strong>Bedroom:</strong><span>{{ $unit->bedroom }}</span></div>
                                        <div class="unit-detail"><strong>Kitchen:</strong><span>{{ $unit->kitchen }}</span></div>
                                        <div class="unit-detail"><strong>Bath:</strong><span>{{ $unit->baths }}</span></div>
                                        @if ($property->listing_type == 'rent')
                                            <div class="unit-detail"><strong>Rent Type:</strong><span>{{ $unit->rent_type }}</span></div>
                                            <div class="unit-detail"><strong>Rent:</strong><span>{{ priceFormat($unit->rent) }}</span></div>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>

            <!-- Right Column - Sidebar -->
            <div class="right-column">
                <!-- Location Card -->
                <div class="sidebar-card">
                    <div class="sidebar-title"><i class="fas fa-map-marker-alt"></i><span>Location</span></div>
                    <div class="location-box">
                        <i class="fas fa-map-pin"></i>
                        <p>{{ $property->address }}, {{ $property->city }}, {{ $property->state }}, {{ $property->country }} - {{ $property->zip_code }}</p>
                    </div>
                </div>

                <!-- Quick Stats Card -->
                <div class="sidebar-card">
                    <div class="sidebar-title"><i class="fas fa-chart-line"></i><span>Quick Stats</span></div>
                    <div class="stats-grid">
                        <div class="stat-box"><i class="fas fa-tag"></i><div class="stat-label">Property Type</div><div class="stat-value">{{ \App\Models\Property::types()[$property->type] }}</div></div>
                        <div class="stat-box"><i class="fas fa-chart-simple"></i><div class="stat-label">Listing Type</div><div class="stat-value">{{ ucfirst($property->listing_type) }}</div></div>
                        <div class="stat-box"><i class="fas fa-bed"></i><div class="stat-label">Bedrooms</div><div class="stat-value">{{ $totalBedrooms ?: 'N/A' }}</div></div>
                        <div class="stat-box"><i class="fas fa-bath"></i><div class="stat-label">Bathrooms</div><div class="stat-value">{{ $totalBathrooms ?: 'N/A' }}</div></div>
                    </div>
                </div>

                <!-- Contact Card -->
                <div class="sidebar-card">
                    <div class="sidebar-title"><i class="fas fa-headset"></i><span>Need Help?</span></div>
                    <p style="color: var(--text-light); margin-bottom: 20px; font-size: 14px;">Contact our property experts for more information about this property.</p>
                    <a href="{{ route('contact.home', $user->code) }}" class="contact-btn"><i class="fas fa-envelope"></i> Contact Agent</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Image Modal -->
<div class="image-modal" id="imageModal">
    <span class="image-modal-close">&times;</span>
    <img id="modalImage" src="" alt="Full size image">
</div>

@endsection

@push('theme5-script')
<script>
$(document).ready(function() {
    // Gallery main image click
    $('#mainImage').on('click', function() {
        var imageUrl = $('#mainGalleryImage').attr('src');
        $('#modalImage').attr('src', imageUrl);
        $('#imageModal').addClass('active');
    });

    // Gallery side items click
    $('.gallery-side-item').on('click', function() {
        var imageUrl = $(this).data('image');
        if (imageUrl) {
            $('#mainGalleryImage').attr('src', imageUrl);
            $('#modalImage').attr('src', imageUrl);
        }
    });

    // Modal close
    $('.image-modal-close, .image-modal').on('click', function(e) {
        if (e.target === this) {
            $('#imageModal').removeClass('active');
        }
    });

    // Escape key close
    $(document).on('keydown', function(e) {
        if (e.key === 'Escape' && $('#imageModal').hasClass('active')) {
            $('#imageModal').removeClass('active');
        }
    });
});
</script>
@endpush
