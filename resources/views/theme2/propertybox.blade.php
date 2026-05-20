@php
    $isCustomDomain = isset($is_custom_domain) ? $is_custom_domain : (request()->getHost() !== '13.61.10.174' && request()->getHost() !== 'localhost' && request()->getHost() !== '127.0.0.1');
@endphp

<div class="theme2-property-row">
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

        <div class="theme2-property-col">
            <div class="theme2-listing-card">
                <div class="theme2-list-thumb">
                    <a href="{{ $isCustomDomain ? route('custom.domain.property.detail', ['id' => \Crypt::encrypt($property->id)]) : route('property.detail', ['code' => $user->code, \Crypt::encrypt($property->id)]) }}">
                        <img src="{{ asset(Storage::url('upload/property/thumbnail/' . $thumbnail)) }}" alt="{{ $property->name }}">
                    </a>
                    <div class="theme2-property-badge {{ $property->listing_type }}">
                        {{ $property->listing_type == 'rent' ? 'FOR RENT' : 'FOR SALE' }}
                    </div>
                    <div class="theme2-property-price">{{ priceformat($property->price) }}</div>
                </div>
                <div class="theme2-list-content">
                    <p class="theme2-list-type">
                        <span class="theme2-type-badge">{{ \App\Models\Property::types()[$property->type] }}</span>
                    </p>
                    <h5 class="theme2-list-title">
                        <a href="{{ $isCustomDomain ? route('custom.domain.property.detail', ['id' => \Crypt::encrypt($property->id)]) : route('property.detail', ['code' => $user->code, \Crypt::encrypt($property->id)]) }}">{{ ucfirst($property->name) }}</a>
                    </h5>
                    <p class="theme2-list-desc">
                        {{ \Illuminate\Support\Str::limit(strip_tags($property->description), 50, '...') }}
                    </p>
                    <div class="theme2-list-meta">
                        <p class="theme2-list-address">
                            <i class="fas fa-map-marker-alt"></i> {{ $property->address }}
                        </p>
                        <a href="{{ $isCustomDomain ? route('custom.domain.property.detail', ['id' => \Crypt::encrypt($property->id)]) : route('property.detail', ['code' => $user->code, \Crypt::encrypt($property->id)]) }}" class="theme2-view-link">
                            View Details <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="theme2-no-properties-col">
            <div class="theme2-no-properties">
                <i class="fas fa-building"></i>
                <p>{{ $noPropertiesMessage ?? 'No properties available' }}</p>
            </div>
        </div>
    @endforelse
</div>

<!-- Pagination -->
<div class="theme2-pagination-wrapper">
    @if ($properties->hasPages())
        <ul class="theme2-pagination-list">
            @if ($properties->onFirstPage())
                <li class="disabled"><span><i class="fas fa-angle-left"></i></span></li>
            @else
                <li><a href="{{ $properties->previousPageUrl() }}"><i class="fas fa-angle-left"></i></a></li>
            @endif

            @foreach ($properties->links()->elements[0] as $page => $url)
                @if (is_string($page))
                    <li class="disabled"><span>{{ $page }}</span></li>
                @else
                    <li class="{{ $page == $properties->currentPage() ? 'active' : '' }}">
                        <a href="{{ $url }}">{{ $page }}</a>
                    </li>
                @endif
            @endforeach

            @if ($properties->hasMorePages())
                <li><a href="{{ $properties->nextPageUrl() }}"><i class="fas fa-angle-right"></i></a></li>
            @else
                <li class="disabled"><span><i class="fas fa-angle-right"></i></span></li>
            @endif
        </ul>

        <p class="theme2-pagination-info">
            {{ ($properties->currentPage() - 1) * $properties->perPage() + 1 }} –
            {{ min($properties->currentPage() * $properties->perPage(), $properties->total()) }}
            of {{ $properties->total() }} property available
        </p>
    @endif
</div>
