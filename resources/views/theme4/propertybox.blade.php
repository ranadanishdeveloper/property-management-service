<style>
/* ========== PROPERTY CARD PREMIUM STYLES ========== */
.properties-grid-premium {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 30px;
    margin: 40px 0;
}

.property-card-premium {
    background: linear-gradient(135deg, rgba(255,255,255,0.03), rgba(255,255,255,0.01));
    border: 1px solid rgba(255, 255, 255, 0.05);
    border-radius: 24px;
    overflow: hidden;
    transition: all 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    position: relative;
}

.property-card-premium::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.05), transparent);
    transition: left 0.6s;
    z-index: 1;
}

.property-card-premium:hover::before {
    left: 100%;
}

.property-card-premium:hover {
    transform: translateY(-12px);
    border-color: rgba(99, 102, 241, 0.4);
    box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5), 0 0 0 1px rgba(99, 102, 241, 0.2);
}

.property-image-premium {
    position: relative;
    height: 240px;
    overflow: hidden;
}

.property-image-premium img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.6s cubic-bezier(0.2, 0.9, 0.4, 1.1);
}

.property-card-premium:hover .property-image-premium img {
    transform: scale(1.1);
}

.property-type-badge {
    position: absolute;
    top: 16px;
    left: 16px;
    background: linear-gradient(135deg, #6366f1, #a855f7);
    padding: 5px 14px;
    border-radius: 20px;
    font-size: 11px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    color: white;
    box-shadow: 0 2px 10px rgba(0,0,0,0.2);
    z-index: 2;
    transition: transform 0.3s;
}

.property-card-premium:hover .property-type-badge {
    transform: scale(1.05);
}

.property-overlay-premium {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0, 0, 0, 0.6);
    backdrop-filter: blur(5px);
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: opacity 0.4s ease;
    z-index: 3;
}

.property-card-premium:hover .property-overlay-premium {
    opacity: 1;
}

.property-view-btn {
    width: 55px;
    height: 55px;
    background: white;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #6366f1;
    font-size: 20px;
    text-decoration: none;
    transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    transform: scale(0.8) rotate(-180deg);
}

.property-card-premium:hover .property-view-btn {
    transform: scale(1) rotate(0deg);
}

.property-view-btn:hover {
    transform: scale(1.1) !important;
    background: #6366f1;
    color: white;
    box-shadow: 0 0 20px rgba(99, 102, 241, 0.5);
}

.property-info-premium {
    padding: 22px;
}

.property-info-premium h3 {
    font-size: 18px;
    margin-bottom: 8px;
    font-weight: 600;
}

.property-info-premium h3 a {
    color: white;
    text-decoration: none;
    transition: color 0.3s ease;
}

.property-info-premium h3 a:hover {
    color: #6366f1;
}

.property-address {
    font-size: 13px;
    color: #94a3b8;
    margin-bottom: 12px;
    display: flex;
    align-items: center;
    gap: 6px;
}

.property-address i {
    transition: transform 0.3s;
}

.property-card-premium:hover .property-address i {
    transform: translateX(-3px);
}

.property-description {
    font-size: 13px;
    color: #94a3b8;
    line-height: 1.5;
    margin-bottom: 15px;
}

.property-divider {
    border: none;
    height: 1px;
    background: linear-gradient(90deg, rgba(255,255,255,0.08), rgba(255,255,255,0.02));
    margin: 15px 0;
    transition: width 0.3s;
}

.property-card-premium:hover .property-divider {
    background: linear-gradient(90deg, rgba(99,102,241,0.3), rgba(168,85,247,0.1));
}

.property-price {
    font-size: 22px;
    font-weight: 700;
    color: #a855f7;
    transition: all 0.3s;
}

.property-card-premium:hover .property-price {
    animation: pricePulse 0.5s ease;
}

@keyframes pricePulse {
    0%, 100% { transform: scale(1); }
    50% { transform: scale(1.05); text-shadow: 0 0 10px rgba(168,85,247,0.5); }
}

.property-details-link {
    color: #6366f1;
    transition: all 0.3s;
    display: inline-flex;
    align-items: center;
    gap: 5px;
    text-decoration: none;
}

.property-details-link i {
    transition: transform 0.3s;
}

.property-details-link:hover {
    color: #a855f7;
}

.property-details-link:hover i {
    transform: translateX(5px);
}

/* Empty State */
.empty-state-premium {
    text-align: center;
    padding: 60px;
    background: rgba(255, 255, 255, 0.03);
    border-radius: 24px;
    grid-column: 1 / -1;
    transition: all 0.3s;
}

.empty-state-premium:hover {
    background: rgba(99, 102, 241, 0.05);
    transform: translateY(-5px);
}

.empty-state-premium i {
    font-size: 60px;
    color: #6366f1;
    margin-bottom: 20px;
    opacity: 0.5;
}

.empty-state-premium h3 {
    font-size: 24px;
    margin-bottom: 10px;
}

.empty-state-premium p {
    color: #94a3b8;
}

/* Pagination */
.pagination-premium {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 10px;
    margin: 50px 0 30px;
    flex-wrap: wrap;
    list-style: none;
    padding: 0;
}

.pagination-premium .page-item {
    list-style: none;
}

.pagination-premium .page-link {
    display: flex;
    align-items: center;
    justify-content: center;
    min-width: 42px;
    height: 42px;
    padding: 0 14px;
    background: rgba(255, 255, 255, 0.05);
    border: 1px solid rgba(255, 255, 255, 0.1);
    border-radius: 12px;
    color: white;
    text-decoration: none;
    transition: all 0.3s ease;
    font-size: 14px;
    font-weight: 500;
}

.pagination-premium .page-link:hover {
    background: rgba(99, 102, 241, 0.3);
    border-color: #6366f1;
    transform: translateY(-3px);
}

.pagination-premium .active .page-link {
    background: linear-gradient(135deg, #6366f1, #a855f7);
    border-color: transparent;
    box-shadow: 0 5px 20px rgba(99, 102, 241, 0.3);
}

.pagination-premium .disabled .page-link {
    opacity: 0.4;
    cursor: not-allowed;
    transform: none;
}

.pagination-info {
    text-align: center;
    color: #94a3b8;
    font-size: 14px;
    margin-top: 20px;
    padding-bottom: 20px;
}

/* Responsive */
@media (max-width: 1200px) {
    .properties-grid-premium {
        grid-template-columns: repeat(3, 1fr);
        gap: 25px;
    }
}

@media (max-width: 992px) {
    .properties-grid-premium {
        grid-template-columns: repeat(2, 1fr);
        gap: 20px;
    }
}

@media (max-width: 768px) {
    .properties-grid-premium {
        grid-template-columns: 1fr;
        gap: 20px;
    }

    .property-image-premium {
        height: 220px;
    }

    .empty-state-premium {
        padding: 40px 20px;
    }

    .empty-state-premium i {
        font-size: 40px;
    }

    .empty-state-premium h3 {
        font-size: 20px;
    }

    .pagination-premium {
        gap: 5px;
    }

    .pagination-premium .page-link {
        min-width: 36px;
        height: 36px;
        font-size: 12px;
    }
}

@media (max-width: 480px) {
    .property-info-premium h3 {
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

<div class="properties-grid-premium">
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

        <div class="property-card-premium" data-aos="fade-up" data-aos-delay="{{ $loop->index * 50 }}">
            <div class="property-image-premium">
                <img src="{{ asset(Storage::url('upload/property/thumbnail/' . $thumbnail)) }}" alt="{{ $property->name }}">
                <span class="property-type-badge">{{ \App\Models\Property::types()[$property->type] }}</span>
                <div class="property-overlay-premium">
                    <a href="{{ $isCustomDomain ? route('custom.domain.property.detail', ['id' => \Crypt::encrypt($property->id)]) : route('property.detail', ['code' => $user->code, \Crypt::encrypt($property->id)]) }}" class="property-view-btn">
                        <i class="fas fa-eye"></i>
                    </a>
                </div>
            </div>
            <div class="property-info-premium">
                <h3><a href="{{ $isCustomDomain ? route('custom.domain.property.detail', ['id' => \Crypt::encrypt($property->id)]) : route('property.detail', ['code' => $user->code, \Crypt::encrypt($property->id)]) }}">{{ ucfirst($property->name) }}</a></h3>
                <div class="property-address">
                    <i class="fas fa-map-marker-alt"></i>
                    <span>{{ $property->address }}, {{ $property->city ?? '' }}</span>
                </div>
                <p class="property-description">
                    {{ \Illuminate\Support\Str::limit(strip_tags($property->description), 80, '...') }}
                </p>
                <hr class="property-divider">
                <div style="display: flex; justify-content: space-between; align-items: center;">
                    <span class="property-price">{{ priceformat($property->price) }}</span>
                    <a href="{{ $isCustomDomain ? route('custom.domain.property.detail', ['id' => \Crypt::encrypt($property->id)]) : route('property.detail', ['code' => $user->code, \Crypt::encrypt($property->id)]) }}" class="property-details-link">
                        Details <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    @empty
        <div class="empty-state-premium">
            <i class="fas fa-building"></i>
            <h3>{{ __('No Properties Found') }}</h3>
            <p>{{ $noPropertiesMessage ?? 'Try adjusting your search filters' }}</p>
        </div>
    @endforelse
</div>

<!-- Pagination -->
@if($properties->hasPages())
<ul class="pagination-premium">
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
