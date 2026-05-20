<style>
    /* ============================================
   THEME 6 - PROPERTY CARD STYLES
   Modern Glassmorphism Design
=========================================== */

    .property-card {
        background: var(--white);
        border-radius: 20px;
        overflow: hidden;
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        box-shadow: var(--shadow);
        position: relative;
    }

    .property-card:hover {
        transform: translateY(-8px);
        box-shadow: var(--shadow-lg);
    }

    .property-image {
        position: relative;
        height: 240px;
        overflow: hidden;
        background: var(--light);
    }

    .property-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .property-card:hover .property-image img {
        transform: scale(1.08);
    }

    .property-badge {
        position: absolute;
        top: 15px;
        right: 15px;
        background: linear-gradient(135deg, var(--primary), var(--primary-dark));
        color: white;
        padding: 5px 14px;
        border-radius: 20px;
        font-size: 11px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        z-index: 2;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .property-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.5);
        backdrop-filter: blur(3px);
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        transition: opacity 0.3s ease;
        z-index: 3;
    }

    .property-card:hover .property-overlay {
        opacity: 1;
    }

    .property-view {
        width: 50px;
        height: 50px;
        background: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--primary);
        font-size: 18px;
        text-decoration: none;
        transition: all 0.3s ease;
        transform: scale(0.8);
    }

    .property-card:hover .property-view {
        transform: scale(1);
    }

    .property-view:hover {
        background: var(--primary);
        color: white;
        transform: scale(1.1);
        box-shadow: 0 0 20px rgba(255, 107, 74, 0.5);
    }

    .property-info {
        padding: 20px;
    }

    .property-type {
        display: inline-block;
        background: rgba(255, 107, 74, 0.1);
        color: var(--primary);
        padding: 4px 12px;
        border-radius: 20px;
        font-size: 11px;
        font-weight: 600;
        margin-bottom: 10px;
    }

    .property-info h3 {
        font-size: 18px;
        margin-bottom: 8px;
        font-weight: 600;
    }

    .property-info h3 a {
        color: var(--dark);
        text-decoration: none;
        transition: color 0.2s;
    }

    .property-info h3 a:hover {
        color: var(--primary);
    }

    .property-address {
        font-size: 12px;
        color: var(--gray);
        margin-bottom: 10px;
        display: flex;
        align-items: center;
        gap: 5px;
    }

    .property-address i {
        font-size: 11px;
        color: var(--primary);
    }

    .property-description {
        font-size: 13px;
        color: var(--gray);
        line-height: 1.5;
        margin-bottom: 12px;
    }

    .property-divider {
        height: 1px;
        background: linear-gradient(90deg, transparent, #eee, transparent);
        margin: 12px 0;
    }

    .property-footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 10px;
    }

    .property-price {
        font-size: 22px;
        font-weight: 700;
        color: var(--primary);
    }

    .property-price small {
        font-size: 12px;
        font-weight: 400;
        color: var(--gray);
    }

    .property-link {
        color: var(--primary);
        text-decoration: none;
        font-weight: 500;
        font-size: 13px;
        display: inline-flex;
        align-items: center;
        gap: 5px;
        transition: all 0.3s;
    }

    .property-link i {
        font-size: 11px;
        transition: transform 0.3s;
    }

    .property-link:hover {
        gap: 10px;
        color: var(--primary-dark);
    }

    .property-link:hover i {
        transform: translateX(3px);
    }

    /* Empty State */
    .empty-state {
        text-align: center;
        padding: 60px;
        background: var(--light);
        border-radius: 20px;
        grid-column: 1 / -1;
    }

    .empty-state i {
        font-size: 50px;
        color: var(--primary);
        opacity: 0.5;
        margin-bottom: 15px;
    }

    .empty-state h3 {
        font-size: 20px;
        margin-bottom: 8px;
        color: var(--dark);
    }

    .empty-state p {
        color: var(--gray);
    }

    /* Pagination */
    .pagination-modern {
        display: flex;
        justify-content: center;
        gap: 10px;
        margin: 50px 0 30px;
        flex-wrap: wrap;
        padding: 0;
    }

    .pagination-modern li {
        list-style: none;
    }

    .pagination-modern .page-link {
        width: 42px;
        height: 42px;
        display: flex;
        align-items: center;
        justify-content: center;
        border: 1px solid #eee;
        border-radius: 12px;
        color: var(--dark);
        text-decoration: none;
        transition: all 0.3s;
        font-weight: 500;
        background: white;
    }

    .pagination-modern .page-link:hover {
        background: var(--primary);
        border-color: var(--primary);
        color: white;
        transform: translateY(-2px);
    }

    .pagination-modern .active .page-link {
        background: var(--primary);
        border-color: var(--primary);
        color: white;
    }

    .pagination-modern .disabled .page-link {
        opacity: 0.5;
        cursor: not-allowed;
    }

    .pagination-modern .disabled .page-link:hover {
        transform: none;
        background: transparent;
        color: var(--dark);
    }

    .pagination-info {
        text-align: center;
        color: var(--gray);
        font-size: 13px;
        margin-top: 15px;
    }

    /* Card Animation */
    .property-card {
        animation: fadeInUp 0.6s ease forwards;
        opacity: 0;
    }

    .property-card:nth-child(1) {
        animation-delay: 0.05s;
    }

    .property-card:nth-child(2) {
        animation-delay: 0.1s;
    }

    .property-card:nth-child(3) {
        animation-delay: 0.15s;
    }

    .property-card:nth-child(4) {
        animation-delay: 0.2s;
    }

    .property-card:nth-child(5) {
        animation-delay: 0.25s;
    }

    .property-card:nth-child(6) {
        animation-delay: 0.3s;
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Responsive */
    @media (max-width: 768px) {
        .property-image {
            height: 220px;
        }

        .property-price {
            font-size: 18px;
        }

        .property-info h3 {
            font-size: 16px;
        }

        .pagination-modern .page-link {
            width: 36px;
            height: 36px;
            font-size: 12px;
        }

        .property-footer {
            flex-direction: column;
            align-items: flex-start;
        }
    }
</style>

@php
    $isCustomDomain = isset($is_custom_domain)
        ? $is_custom_domain
        : request()->getHost() !== '13.61.10.174' &&
            request()->getHost() !== 'localhost' &&
            request()->getHost() !== '127.0.0.1';

    // Custom price formatting function if helper doesn't exist
if (!function_exists('priceformat')) {
    function priceformat($price)
    {
        if (empty($price)) {
            return 'Price on Request';
        }
        return '$' . number_format($price, 0, '.', ',');
        }
    }
@endphp

<div class="properties-grid">
    @forelse ($properties as $property)
        @php
            $thumbnail = !empty($property->thumbnail->image) ? $property->thumbnail->image : 'default.jpg';
            $detailUrl = $isCustomDomain
                ? route('custom.domain.property.detail', ['id' => \Crypt::encrypt($property->id)])
                : route('property.detail', ['code' => $user->code, \Crypt::encrypt($property->id)]);

            // Get property type name
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

            // Format price
            $formattedPrice = !empty($property->price)
                ? '$' . number_format($property->price, 0, '.', ',')
                : 'Price on Request';
        @endphp
        <div class="property-card">
            <div class="property-image">
                <img src="{{ asset(Storage::url('upload/property/thumbnail/' . $thumbnail)) }}"
                    alt="{{ $property->name }}">
                <span class="property-badge">{{ ucfirst($property->listing_type ?? 'For Sale') }}</span>
                <div class="property-overlay">
                    <a href="{{ $isCustomDomain ? route('custom.domain.property.detail', ['id' => \Crypt::encrypt($property->id)]) : route('property.detail', ['code' => $user->code, \Crypt::encrypt($property->id)]) }}" class="property-view">
                        <i class="fas fa-eye"></i>
                    </a>
                </div>
            </div>
            <div class="property-info">
                <span class="property-type">{{ $propertyTypeName }}</span>
                <h3><a href="{{ $isCustomDomain ? route('custom.domain.property.detail', ['id' => \Crypt::encrypt($property->id)]) : route('property.detail', ['code' => $user->code, \Crypt::encrypt($property->id)]) }}">{{ ucfirst($property->name) }}</a></h3>
                <div class="property-address">
                    <i class="fas fa-map-marker-alt"></i>
                    <span>{{ $property->address ?? '' }}{{ $property->city ? ', ' . $property->city : '' }}</span>
                </div>
                <p class="property-description">
                    {{ \Illuminate\Support\Str::limit(strip_tags($property->description ?? ''), 70, '...') }}
                </p>
                <div class="property-divider"></div>
                <div class="property-footer">
                    <span class="property-price">{{ priceFormat($property->price) }}</span>
                    <a href="{{ $isCustomDomain ? route('custom.domain.property.detail', ['id' => \Crypt::encrypt($property->id)]) : route('property.detail', ['code' => $user->code, \Crypt::encrypt($property->id)]) }}" class="property-link">
                        View Details <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    @empty
        <div class="empty-state">
            <i class="fas fa-building"></i>
            <h3>{{ __('No Properties Found') }}</h3>
            <p>{{ $noPropertiesMessage ?? 'Try adjusting your search filters or check back later for new listings.' }}
            </p>
        </div>
    @endforelse
</div>

@if (isset($properties) && $properties->hasPages())
    <ul class="pagination-modern">
        @if ($properties->onFirstPage())
            <li class="disabled"><span class="page-link"><i class="fas fa-chevron-left"></i></span></li>
        @else
            <li><a class="page-link" href="{{ $properties->previousPageUrl() }}"><i
                        class="fas fa-chevron-left"></i></a></li>
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
            <li><a class="page-link" href="{{ $properties->nextPageUrl() }}"><i class="fas fa-chevron-right"></i></a>
            </li>
        @else
            <li class="disabled"><span class="page-link"><i class="fas fa-chevron-right"></i></span></li>
        @endif
    </ul>
    <p class="pagination-info">
        Showing {{ ($properties->currentPage() - 1) * $properties->perPage() + 1 }} –
        {{ min($properties->currentPage() * $properties->perPage(), $properties->total()) }}
        of {{ $properties->total() }} properties
    </p>
@endif
