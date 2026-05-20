@php
    $isCustomDomain = isset($is_custom_domain) ? $is_custom_domain : (request()->getHost() !== '13.61.10.174' && request()->getHost() !== 'localhost' && request()->getHost() !== '127.0.0.1');
@endphp

<div class="theme3-property-row">
    @forelse ($properties as $property)
        @php
            if (!empty($property->thumbnail) && !empty($property->thumbnail->image)) {
                $thumbnail = $property->thumbnail->image;
            } else {
                $thumbnail = 'default.jpg';
            }

            if ($isCustomDomain) {
                $detailUrl = route('custom.domain.property.detail', ['id' => \Crypt::encrypt($property->id)]);
            } else {
                $detailUrl = route('property.detail', ['code' => $user->code, \Crypt::encrypt($property->id)]);
            }
        @endphp

        <div class="theme3-property-col">
            <div class="theme3-listing-card">
                <div class="theme3-list-thumb">
                    <a href="{{ $isCustomDomain ? route('custom.domain.property.detail', ['id' => \Crypt::encrypt($property->id)]) : route('property.detail', ['code' => $user->code, \Crypt::encrypt($property->id)]) }}">
                        <img src="{{ asset(Storage::url('upload/property/thumbnail/' . $thumbnail)) }}" alt="{{ $property->name }}">
                    </a>
                    <div class="theme3-property-badge {{ $property->listing_type }}">
                        {{ $property->listing_type == 'rent' ? 'FOR RENT' : 'FOR SALE' }}
                    </div>
                    <div class="theme3-property-price">{{ priceformat($property->price) }}</div>
                </div>
                <div class="theme3-list-content">
                    <p class="theme3-list-type">
                        <span class="theme3-type-badge">{{ \App\Models\Property::types()[$property->type] }}</span>
                    </p>
                    <h5 class="theme3-list-title">
                        <a href="{{ $isCustomDomain ? route('custom.domain.property.detail', ['id' => \Crypt::encrypt($property->id)]) : route('property.detail', ['code' => $user->code, \Crypt::encrypt($property->id)]) }}">{{ ucfirst($property->name) }}</a>
                    </h5>
                    <p class="theme3-list-desc">
                        {{ \Illuminate\Support\Str::limit(strip_tags($property->description), 50, '...') }}
                    </p>
                    <div class="theme3-list-meta">
                        <p class="theme3-list-address">
                            <i class="fas fa-map-marker-alt"></i> {{ $property->address }}
                        </p>
                        <a href="{{ $isCustomDomain ? route('custom.domain.property.detail', ['id' => \Crypt::encrypt($property->id)]) : route('property.detail', ['code' => $user->code, \Crypt::encrypt($property->id)]) }}" class="theme3-view-link">
                            View Details <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="theme3-no-properties-col">
            <div class="theme3-no-properties">
                <i class="fas fa-building"></i>
                <p>{{ $noPropertiesMessage ?? 'No properties available' }}</p>
            </div>
        </div>
    @endforelse
</div>

<!-- Pagination -->
<div class="theme3-pagination-wrapper">
    @if ($properties->hasPages())
        <ul class="theme3-pagination-list">
            @if ($properties->onFirstPage())
                <li class="disabled"><span><i class="fas fa-angle-left"></i></span></li>
            @else
                <li><a href="{{ $properties->previousPageUrl() }}" class="page-link"><i class="fas fa-angle-left"></i></a></li>
            @endif

            @foreach ($properties->links()->elements[0] as $page => $url)
                @if (is_string($page))
                    <li class="disabled"><span>{{ $page }}</span></li>
                @else
                    <li class="{{ $page == $properties->currentPage() ? 'active' : '' }}">
                        <a href="{{ $url }}" class="page-link">{{ $page }}</a>
                    </li>
                @endif
            @endforeach

            @if ($properties->hasMorePages())
                <li><a href="{{ $properties->nextPageUrl() }}" class="page-link"><i class="fas fa-angle-right"></i></a></li>
            @else
                <li class="disabled"><span><i class="fas fa-angle-right"></i></span></li>
            @endif
        </ul>

        <p class="theme3-pagination-info">
            {{ ($properties->currentPage() - 1) * $properties->perPage() + 1 }} –
            {{ min($properties->currentPage() * $properties->perPage(), $properties->total()) }}
            of {{ $properties->total() }} property available
        </p>
    @endif
</div>
