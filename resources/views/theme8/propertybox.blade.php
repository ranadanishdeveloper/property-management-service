@php
    $isCustomDomain = isset($is_custom_domain)
        ? $is_custom_domain
        : request()->getHost() !== '13.61.10.174' &&
            request()->getHost() !== 'localhost' &&
            request()->getHost() !== '127.0.0.1';

    if (!function_exists('priceformat')) {
        function priceformat($price) {
            if (empty($price)) {
                return 'Price on Request';
            }
            return '$' . number_format($price, 0, '.', ',');
        }
    }
@endphp

<div class="glass-properties-grid">
    @forelse ($properties as $property)
        @php
            $thumbnail = !empty($property->thumbnail->image) ? $property->thumbnail->image : 'default.jpg';
            $detailUrl = $isCustomDomain
                ? route('custom.domain.property.detail', ['id' => \Crypt::encrypt($property->id)])
                : route('property.detail', ['code' => $user->code, \Crypt::encrypt($property->id)]);

            $propertyTypes = [
                'residential' => 'Residential',
                'commercial' => 'Commercial',
                'industrial' => 'Industrial',
                'land' => 'Land',
                'apartment' => 'Apartment',
                'villa' => 'Villa',
                'house' => 'House',
                'office' => 'Office',
                'shop' => 'Shop',
            ];
            $propertyTypeName = $propertyTypes[$property->type] ?? ucfirst($property->type);

            $totalBedrooms = ($property->units && $property->units->count() > 0) ? $property->units->sum('bedroom') : 0;
            $totalBathrooms = ($property->units && $property->units->count() > 0) ? $property->units->sum('baths') : 0;
        @endphp
        <div class="glass-property-card">
            <div class="glass-property-img">
                <img src="{{ asset(Storage::url('upload/property/thumbnail/' . $thumbnail)) }}" alt="{{ $property->name }}">
                <span class="glass-property-badge">{{ strtoupper($property->listing_type ?? 'For Sale') }}</span>
                <div class="glass-property-overlay">
                    <a href="{{ $detailUrl }}" class="glass-property-view">
                        <i class="fas fa-eye"></i>
                    </a>
                </div>
            </div>
            <div class="glass-property-info">
                <span class="glass-property-type">{{ $propertyTypeName }}</span>
                <h3><a href="{{ $detailUrl }}">{{ ucfirst($property->name) }}</a></h3>
                <div class="glass-property-address">
                    <i class="fas fa-map-marker-alt"></i>
                    <span>{{ $property->city ?? 'Location' }}{{ $property->state ? ', ' . $property->state : '' }}</span>
                </div>
                <div class="glass-property-price">{{ priceformat($property->price) }}</div>
                <div class="glass-property-footer">
                    <div class="glass-property-features">
                        <span><i class="fas fa-bed"></i> {{ $totalBedrooms ?: 'N/A' }}</span>
                        <span><i class="fas fa-bath"></i> {{ $totalBathrooms ?: 'N/A' }}</span>
                    </div>
                    <a href="{{ $detailUrl }}" class="glass-view-link" style="color: #007aff; font-size: 12px;">View →</a>
                </div>
            </div>
        </div>
    @empty
        <div class="glass-empty-state">
            <i class="fas fa-building"></i>
            <h3>{{ __('No Properties Found') }}</h3>
            <p>{{ $noPropertiesMessage ?? 'Try adjusting your search filters or check back later for new listings.' }}</p>
        </div>
    @endforelse
</div>

@if (isset($properties) && $properties->hasPages())
    <ul class="glass-pagination">
        @if ($properties->onFirstPage())
            <li class="disabled"><span class="page-link"><i class="fas fa-chevron-left"></i></span></li>
        @else
            <li><a class="page-link" href="{{ $properties->previousPageUrl() }}"><i class="fas fa-chevron-left"></i></a></li>
        @endif

        @php
            $currentPage = $properties->currentPage();
            $lastPage = $properties->lastPage();
            $start = max(1, $currentPage - 2);
            $end = min($lastPage, $currentPage + 2);
        @endphp

        @if ($start > 1)
            <li><a class="page-link" href="{{ $properties->url(1) }}">1</a></li>
            @if ($start > 2)
                <li class="disabled"><span class="page-link">...</span></li>
            @endif
        @endif

        @for ($i = $start; $i <= $end; $i++)
            <li class="{{ $i == $currentPage ? 'active' : '' }}">
                <a class="page-link" href="{{ $properties->url($i) }}">{{ $i }}</a>
            </li>
        @endfor

        @if ($end < $lastPage)
            @if ($end < $lastPage - 1)
                <li class="disabled"><span class="page-link">...</span></li>
            @endif
            <li><a class="page-link" href="{{ $properties->url($lastPage) }}">{{ $lastPage }}</a></li>
        @endif

        @if ($properties->hasMorePages())
            <li><a class="page-link" href="{{ $properties->nextPageUrl() }}"><i class="fas fa-chevron-right"></i></a></li>
        @else
            <li class="disabled"><span class="page-link"><i class="fas fa-chevron-right"></i></span></li>
        @endif
    </ul>
    <p class="glass-pagination-info" style="text-align: center; color: #8e8e93; font-size: 12px; margin-top: 20px;">
        Showing {{ ($properties->currentPage() - 1) * $properties->perPage() + 1 }} –
        {{ min($properties->currentPage() * $properties->perPage(), $properties->total()) }}
        of {{ $properties->total() }} properties
    </p>
@endif
