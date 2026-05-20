@php
    $isCustomDomain = isset($is_custom_domain)
        ? $is_custom_domain
        : request()->getHost() !== '13.61.10.174' &&
            request()->getHost() !== 'localhost' &&
            request()->getHost() !== '127.0.0.1';

    if (!function_exists('priceformat')) {
        function priceformat($price) {
            if (empty($price)) {
                return 'PRICE ON REQUEST';
            }
            return '$' . number_format($price, 0, '.', ',');
        }
    }
@endphp

<div class="cyber-properties-grid">
    @forelse ($properties as $property)
        @php
            $thumbnail = !empty($property->thumbnail->image) ? $property->thumbnail->image : 'default.jpg';
            $detailUrl = $isCustomDomain
                ? route('custom.domain.property.detail', ['id' => \Crypt::encrypt($property->id)])
                : route('property.detail', ['code' => $user->code, \Crypt::encrypt($property->id)]);

            $propertyTypes = [
                'residential' => 'RESIDENTIAL',
                'commercial' => 'COMMERCIAL',
                'industrial' => 'INDUSTRIAL',
                'land' => 'LAND',
                'apartment' => 'APARTMENT',
                'villa' => 'VILLA',
                'house' => 'HOUSE',
                'office' => 'OFFICE',
                'shop' => 'SHOP',
            ];
            $propertyTypeName = $propertyTypes[$property->type] ?? strtoupper($property->type);

            // FIX: Check if units exists and is a collection before calling sum()
            $totalBedrooms = ($property->units && $property->units->count() > 0) ? $property->units->sum('bedroom') : 0;
            $totalBathrooms = ($property->units && $property->units->count() > 0) ? $property->units->sum('baths') : 0;
        @endphp
        <div class="cyber-property-card">
            <div class="cyber-property-img">
                <img src="{{ asset(Storage::url('upload/property/thumbnail/' . $thumbnail)) }}" alt="{{ $property->name }}">
                <span class="cyber-property-badge">{{ strtoupper($property->listing_type ?? 'FOR SALE') }}</span>
                <div class="cyber-property-overlay">
                    <a href="{{ $detailUrl }}" class="cyber-property-view">
                        <i class="fas fa-eye"></i>
                    </a>
                </div>
            </div>
            <div class="cyber-property-info">
                <span class="cyber-property-type">{{ $propertyTypeName }}</span>
                <h3><a href="{{ $detailUrl }}">{{ ucfirst($property->name) }}</a></h3>
                <div class="cyber-property-address">
                    <i class="fas fa-map-marker-alt"></i>
                    <span>{{ $property->address ?? '' }}{{ $property->city ? ', ' . $property->city : '' }}</span>
                </div>
                <div class="cyber-property-price">{{ priceformat($property->price) }}</div>
                <div class="cyber-property-footer">
                    <div class="cyber-property-features">
                        <span><i class="fas fa-bed"></i> {{ $totalBedrooms ?: 'N/A' }}</span>
                        <span><i class="fas fa-bath"></i> {{ $totalBathrooms ?: 'N/A' }}</span>
                    </div>
                    <a href="{{ $detailUrl }}" class="cyber-property-view" style="width: 35px; height: 35px;">
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    @empty
        <div class="cyber-empty-state">
            <i class="fas fa-building"></i>
            <h3>{{ __('NO PROPERTIES FOUND') }}</h3>
            <p>{{ $noPropertiesMessage ?? 'TRY ADJUSTING YOUR SEARCH FILTERS OR CHECK BACK LATER FOR NEW LISTINGS.' }}</p>
        </div>
    @endforelse
</div>

@if (isset($properties) && $properties->hasPages())
    <ul class="cyber-pagination">
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
    <p class="cyber-pagination-info" style="text-align: center; color: #8a8aaa; font-size: 12px; margin-top: 20px;">
        SHOWING {{ ($properties->currentPage() - 1) * $properties->perPage() + 1 }} –
        {{ min($properties->currentPage() * $properties->perPage(), $properties->total()) }}
        OF {{ $properties->total() }} PROPERTIES
    </p>
@endif
