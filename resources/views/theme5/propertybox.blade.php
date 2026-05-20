<style>
/* ============================================
   THEME 5 - PROPERTY CARD STYLES
   Light & Modern Design
============================================ */

:root {
    --primary: #3b82f6;
    --primary-light: #eff6ff;
    --primary-dark: #2563eb;
    --text-dark: #0f172a;
    --text-gray: #475569;
    --text-light: #64748b;
    --bg-white: #ffffff;
    --border: #e2e8f0;
    --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
    --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
    --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.05);
}

.properties-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 30px;
    margin: 40px 0;
}

.property-card {
    background: var(--bg-white);
    border: 1px solid var(--border);
    border-radius: 20px;
    overflow: hidden;
    transition: all 0.3s ease;
    position: relative;
}

.property-card:hover {
    transform: translateY(-6px);
    box-shadow: var(--shadow-lg);
    border-color: var(--primary);
}

.property-image {
    position: relative;
    height: 220px;
    overflow: hidden;
    background: #f1f5f9;
}

.property-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.4s ease;
}

.property-card:hover .property-image img {
    transform: scale(1.05);
}

.property-badge {
    position: absolute;
    top: 12px;
    left: 12px;
    background: var(--primary);
    color: white;
    padding: 4px 12px;
    border-radius: 20px;
    font-size: 11px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    z-index: 2;
}

.property-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0, 0, 0, 0.4);
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
    width: 48px;
    height: 48px;
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
    transform: scale(1.1) !important;
}

.property-info {
    padding: 18px;
}

.property-type {
    display: inline-block;
    background: var(--primary-light);
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
    color: var(--text-dark);
    text-decoration: none;
    transition: color 0.2s;
}

.property-info h3 a:hover {
    color: var(--primary);
}

.property-address {
    font-size: 12px;
    color: var(--text-light);
    margin-bottom: 10px;
    display: flex;
    align-items: center;
    gap: 5px;
}

.property-address i {
    font-size: 11px;
    transition: transform 0.2s;
}

.property-card:hover .property-address i {
    transform: translateX(-3px);
}

.property-description {
    font-size: 13px;
    color: var(--text-gray);
    line-height: 1.5;
    margin-bottom: 12px;
}

.property-divider {
    border: none;
    height: 1px;
    background: var(--border);
    margin: 12px 0;
}

.property-footer {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.property-price {
    font-size: 20px;
    font-weight: 700;
    color: var(--primary);
}

.property-link {
    color: var(--text-gray);
    text-decoration: none;
    font-size: 13px;
    font-weight: 500;
    display: inline-flex;
    align-items: center;
    gap: 4px;
    transition: all 0.2s;
}

.property-link i {
    font-size: 11px;
    transition: transform 0.2s;
}

.property-link:hover {
    color: var(--primary);
}

.property-link:hover i {
    transform: translateX(4px);
}

/* Empty State */
.empty-state {
    text-align: center;
    padding: 60px;
    background: #f8fafc;
    border-radius: 20px;
    grid-column: 1 / -1;
}

.empty-state i {
    font-size: 48px;
    color: var(--primary);
    opacity: 0.5;
    margin-bottom: 16px;
}

.empty-state h3 {
    font-size: 20px;
    margin-bottom: 8px;
    color: var(--text-dark);
}

.empty-state p {
    color: var(--text-light);
}

/* Pagination */
.pagination {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 8px;
    margin: 40px 0 20px;
    flex-wrap: wrap;
    list-style: none;
    padding: 0;
}

.pagination .page-item {
    list-style: none;
}

.pagination .page-link {
    display: flex;
    align-items: center;
    justify-content: center;
    min-width: 40px;
    height: 40px;
    padding: 0 12px;
    background: white;
    border: 1px solid var(--border);
    border-radius: 10px;
    color: var(--text-dark);
    text-decoration: none;
    transition: all 0.2s;
    font-size: 14px;
    font-weight: 500;
}

.pagination .page-link:hover {
    background: var(--primary-light);
    border-color: var(--primary);
    color: var(--primary);
}

.pagination .active .page-link {
    background: var(--primary);
    border-color: var(--primary);
    color: white;
}

.pagination .disabled .page-link {
    opacity: 0.5;
    cursor: not-allowed;
}

.pagination-info {
    text-align: center;
    color: var(--text-light);
    font-size: 13px;
    margin-top: 16px;
}

/* Responsive */
@media (max-width: 1024px) {
    .properties-grid {
        grid-template-columns: repeat(2, 1fr);
        gap: 25px;
    }
}

@media (max-width: 768px) {
    .properties-grid {
        grid-template-columns: 1fr;
        gap: 20px;
    }

    .property-image {
        height: 200px;
    }

    .empty-state {
        padding: 40px 20px;
    }

    .empty-state i {
        font-size: 36px;
    }

    .empty-state h3 {
        font-size: 18px;
    }

    .pagination {
        gap: 5px;
    }

    .pagination .page-link {
        min-width: 36px;
        height: 36px;
        font-size: 12px;
    }
}

@media (max-width: 480px) {
    .property-info h3 {
        font-size: 16px;
    }

    .property-price {
        font-size: 18px;
    }
}
</style>

@php
    $isCustomDomain = isset($is_custom_domain) ? $is_custom_domain : (request()->getHost() !== '13.61.10.174' && request()->getHost() !== 'localhost' && request()->getHost() !== '127.0.0.1');
@endphp

<div class="properties-grid">
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

        <div class="property-card" data-aos="fade-up" data-aos-delay="{{ $loop->index * 50 }}">
            <div class="property-image">
                <img src="{{ asset(Storage::url('upload/property/thumbnail/' . $thumbnail)) }}" alt="{{ $property->name }}">
                <span class="property-badge">{{ ucfirst($property->listing_type) }}</span>
                <div class="property-overlay">
                    <a href="{{ $isCustomDomain ? route('custom.domain.property.detail', ['id' => \Crypt::encrypt($property->id)]) : route('property.detail', ['code' => $user->code, \Crypt::encrypt($property->id)]) }}" class="property-view">
                        <i class="fas fa-eye"></i>
                    </a>
                </div>
            </div>
            <div class="property-info">
                <span class="property-type">{{ \App\Models\Property::types()[$property->type] }}</span>
                <h3><a href="{{ $isCustomDomain ? route('custom.domain.property.detail', ['id' => \Crypt::encrypt($property->id)]) : route('property.detail', ['code' => $user->code, \Crypt::encrypt($property->id)]) }}">{{ ucfirst($property->name) }}</a></h3>
                <div class="property-address">
                    <i class="fas fa-map-marker-alt"></i>
                    <span>{{ $property->address }}, {{ $property->city ?? '' }}</span>
                </div>
                <p class="property-description">
                    {{ \Illuminate\Support\Str::limit(strip_tags($property->description), 70, '...') }}
                </p>
                <div class="property-divider"></div>
                <div class="property-footer">
                    <span class="property-price">{{ priceformat($property->price) }}</span>
                    <a href="{{ $isCustomDomain ? route('custom.domain.property.detail', ['id' => \Crypt::encrypt($property->id)]) : route('property.detail', ['code' => $user->code, \Crypt::encrypt($property->id)]) }}" class="property-link">
                        Details <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    @empty
        <div class="empty-state">
            <i class="fas fa-building"></i>
            <h3>{{ __('No Properties Found') }}</h3>
            <p>{{ $noPropertiesMessage ?? 'Try adjusting your search filters' }}</p>
        </div>
    @endforelse
</div>

<!-- Pagination -->
@if($properties->hasPages())
<ul class="pagination">
    @if ($properties->onFirstPage())
        <li class="page-item disabled"><span class="page-link"><i class="fas fa-chevron-left"></i></span></li>
    @else
        <li class="page-item"><a class="page-link" href="{{ $properties->previousPageUrl() }}"><i class="fas fa-chevron-left"></i></a></li>
    @endif

    @foreach ($properties->links()->elements[0] as $page => $url)
        @if (is_string($page))
            <li class="page-item disabled"><span class="page-link">{{ $page }}</span></li>
        @else
            <li class="page-item {{ $page == $properties->currentPage() ? 'active' : '' }}">
                <a class="page-link" href="{{ $url }}">{{ $page }}</a>
            </li>
        @endif
    @endforeach

    @if ($properties->hasMorePages())
        <li class="page-item"><a class="page-link" href="{{ $properties->nextPageUrl() }}"><i class="fas fa-chevron-right"></i></a></li>
    @else
        <li class="page-item disabled"><span class="page-link"><i class="fas fa-chevron-right"></i></span></li>
    @endif
</ul>

<p class="pagination-info">
    Showing {{ ($properties->currentPage() - 1) * $properties->perPage() + 1 }} –
    {{ min($properties->currentPage() * $properties->perPage(), $properties->total()) }}
    of {{ $properties->total() }} properties
</p>
@endif
