@extends('theme2.main')
@push('theme2-css')
    <style>
        .theme2-carousel-item {
            height: 400px;
            overflow: hidden;
            border-radius: 10px;
        }
        .theme2-carousel-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .theme2-carousel-indicators {
            display: flex;
            gap: 10px;
            justify-content: center;
            margin-top: 15px;
        }
        .theme2-carousel-indicators li {
            width: 80px;
            height: 60px;
            cursor: pointer;
            list-style: none;
            border-radius: 8px;
            overflow: hidden;
            opacity: 0.6;
            transition: opacity 0.3s;
        }
        .theme2-carousel-indicators li.active {
            opacity: 1;
            border: 2px solid #fff;
        }
        .theme2-carousel-indicators li img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
    </style>
@endpush

@section('content')
    @php
        $Section_3 = App\Models\Additional::where('section', 'Section 3')->first();
        $Section_3_content_value = !empty($Section_3->content_value)
            ? json_decode($Section_3->content_value, true)
            : [];
    @endphp

    @if (empty($Section_3_content_value['section_enabled']) || $Section_3_content_value['section_enabled'] == 'active')
        <section class="theme2-detail-hero">
            <div class="theme2-detail-banner" style="background-image: url('{{ asset(Storage::url($Section_3_content_value['sec3_banner_image_path'])) }}');">
                <div class="theme2-detail-overlay"></div>
                <div class="theme2-container">
                    <div class="theme2-detail-banner-content">
                        <h2 class="theme2-detail-banner-title">{{ $Section_3_content_value['sec3_title'] }}</h2>
                        <p class="theme2-detail-banner-text">{{ $Section_3_content_value['sec3_sub_title'] }}</p>
                    </div>
                </div>
            </div>
        </section>
    @endif

    <section class="theme2-detail-section">
        <div class="theme2-container">
            <div class="theme2-detail-card">
                <!-- Header -->
                <div class="theme2-detail-header">
                    <div class="theme2-detail-header-left">
                        <h3 class="theme2-detail-title">{{ ucfirst($property->name) }}</h3>
                    </div>
                    <div class="theme2-detail-header-right">
                        <span class="theme2-detail-type-badge">{{ \App\Models\Property::types()[$property->type] }}</span>
                    </div>
                </div>

                <!-- Main Content Row -->
                <div class="theme2-detail-row">
                    <!-- Left Column - Images -->
                    <div class="theme2-detail-col theme2-detail-images">
                        <div class="theme2-detail-carousel">
                            <div id="theme2Carousel" class="theme2-carousel">
                                <div class="theme2-carousel-inner">
                                    @foreach ($property->propertyImages as $key => $image)
                                        @php $img = !empty($image->image) ? $image->image : 'default.jpg'; @endphp
                                        <div class="theme2-carousel-item {{ $key === 0 ? 'active' : '' }}" data-slide="{{ $key }}">
                                            <img src="{{ asset(Storage::url('upload/property/image/') . $img) }}" alt="Property image">
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="theme2-carousel-thumbnails">
                                @foreach ($property->propertyImages as $key => $image)
                                    @php $img = !empty($image->image) ? $image->image : 'default.jpg'; @endphp
                                    <div class="theme2-thumbnail {{ $key === 0 ? 'active' : '' }}" data-slide="{{ $key }}">
                                        <img src="{{ asset(Storage::url('upload/property/image/') . $img) }}" alt="Thumbnail">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <!-- Right Column - Property Info -->
                    <div class="theme2-detail-col theme2-detail-info">
                        <div class="theme2-info-card">
                            <div class="theme2-info-header">
                                <h4 class="theme2-info-title">{{ __('Property Detail') }}</h4>
                                <div class="theme2-info-price">
                                    @if (!empty($property->price) && $property->listing_type == 'rent')
                                        {{ __('Rent Price') }} :
                                        <span class="theme2-price">{{ priceformat($property->price) }}/Monthly</span>
                                    @else
                                        {{ __('Sell Price') }}:
                                        <span class="theme2-price">{{ priceformat($property->price) }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="theme2-info-description">
                                {!! $property->description !!}
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Amenities Section -->
                <div class="theme2-detail-section-block">
                    <h4 class="theme2-section-title">{{ __('Included Amenities') }}</h4>
                    <hr class="theme2-divider">
                    @if ($selectedAmenities->count())
                        <div class="theme2-amenities-grid">
                            @foreach ($selectedAmenities as $amenity)
                                <div class="theme2-amenity-item">
                                    <i class="fas fa-check-circle theme2-check-icon"></i>
                                    @if ($amenity->image)
                                        <img src="{{ fetch_file('upload/amenity/' . $amenity->image) }}" alt="{{ $amenity->name }}" class="theme2-amenity-img">
                                    @endif
                                    <h6 class="theme2-amenity-name">{{ $amenity->name }}</h6>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="theme2-text-muted">{{ __('No amenities selected.') }}</p>
                    @endif
                </div>

                <!-- Advantages Section -->
                <div class="theme2-detail-section-block">
                    <h4 class="theme2-section-title">{{ __('Advantages') }}</h4>
                    <hr class="theme2-divider">
                    @if ($selectedAdvantages->count())
                        <div class="theme2-advantages-list">
                            @foreach ($selectedAdvantages as $advantage)
                                <div class="theme2-advantage-item">
                                    <i class="fas fa-check-circle theme2-success-icon"></i>
                                    {{ $advantage->name }}
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="theme2-text-muted">{{ __('No advantages selected.') }}</p>
                    @endif
                </div>

                <!-- Address Section -->
                <div class="theme2-detail-section-block">
                    <h4 class="theme2-section-title">{{ __('Address') }}</h4>
                    <hr class="theme2-divider">
                    <div class="theme2-address">
                        <i class="fas fa-map-marker-alt theme2-address-icon"></i>
                        {{ $property->address }}, {{ $property->city }}, {{ $property->state }}, {{ $property->country }} - {{ $property->zip_code }}
                    </div>
                </div>

                <!-- Property Units Section -->
                @if($units->isNotEmpty())
                    <div class="theme2-detail-section-block">
                        <h4 class="theme2-section-title">{{ __('Property Unit') }}</h4>
                        <hr class="theme2-divider">
                        <div class="theme2-units-grid">
                            @foreach ($units as $unit)
                                <div class="theme2-unit-card">
                                    <div class="theme2-unit-header">
                                        <h3 class="theme2-unit-title">{{ ucfirst($unit->name) }}</h3>
                                    </div>
                                    <hr class="theme2-unit-divider">
                                    <ul class="theme2-unit-list">
                                        <li>
                                            <strong>{{ __('Bedroom') }}:</strong>
                                            <span>{{ $unit->bedroom }}</span>
                                        </li>
                                        <li>
                                            <strong>{{ __('Kitchen') }}:</strong>
                                            <span>{{ $unit->kitchen }}</span>
                                        </li>
                                        <li>
                                            <strong>{{ __('Bath') }}:</strong>
                                            <span>{{ $unit->baths }}</span>
                                        </li>
                                        @if ($property->listing_type == 'rent')
                                            <li>
                                                <strong>{{ __('Rent Type') }}:</strong>
                                                <span>{{ $unit->rent_type }}</span>
                                            </li>
                                            <li>
                                                <strong>{{ __('Rent') }}:</strong>
                                                <span>{{ priceFormat($unit->rent) }}</span>
                                            </li>
                                        @endif
                                    </ul>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection

@push('theme2-script')
<script>
    $(document).ready(function() {
        // Carousel functionality
        $('.theme2-thumbnail').click(function() {
            var slideIndex = $(this).data('slide');

            // Update active classes
            $('.theme2-carousel-item').removeClass('active');
            $('.theme2-carousel-item[data-slide="' + slideIndex + '"]').addClass('active');

            $('.theme2-thumbnail').removeClass('active');
            $(this).addClass('active');
        });
    });
</script>
@endpush
