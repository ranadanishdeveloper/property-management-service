@extends('theme7.main')
@section('content')

<style>
/* ============================================
   THEME 7 - BLOG LISTING (NEON BRUTALIST - LIGHT VERSION)
   Blog Grid with Pagination
   Colors: Neon Pink #ff2a6d + Cyan #05d9e8
   Background: Light #f8f9fa
   Clean border-radius: 8px (consistent with contact page)
   ============================================ */

:root {
    --neon-pink: #ff2a6d;
    --neon-cyan: #05d9e8;
    --neon-purple: #b100e8;
    --light-bg: #f8f9fa;
    --card-bg: #ffffff;
    --dark-text: #1a1a1a;
    --gray-text: #6c757d;
    --glow-pink: 0 0 10px rgba(255, 42, 109, 0.3);
    --glow-cyan: 0 0 10px rgba(5, 217, 232, 0.3);
}

.cyber-container {
    max-width: 1280px;
    margin: 0 auto;
    padding: 0 24px;
    width: 100%;
}

/* ========== BLOG HERO ========== */
.cyber-blog-hero {
    background: linear-gradient(135deg, #e9ecef 0%, #f8f9fa 100%);
    padding: 120px 0 60px;
    text-align: center;
    border-bottom: 2px solid var(--neon-pink);
}

.cyber-blog-hero h1 {
    font-size: clamp(2.5rem, 6vw, 4rem);
    font-weight: 800;
    color: var(--dark-text);
    margin-bottom: 16px;
}

.cyber-blog-hero h1 span {
    color: var(--neon-cyan);
}

.cyber-blog-hero p {
    color: var(--gray-text);
    max-width: 600px;
    margin: 0 auto;
}

/* ========== BLOG GRID ========== */
.cyber-blog-section {
    padding: 60px 0 80px;
    background: var(--light-bg);
}

.cyber-blog-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 30px;
}

.cyber-blog-card {
    background: var(--card-bg);
    border: 2px solid var(--neon-pink);
    transition: all 0.3s;
    border-radius: 8px;
    animation: fadeUp 0.5s ease forwards;
    opacity: 0;
    box-shadow: 0 2px 8px rgba(0,0,0,0.05);
    overflow: hidden;
}

.cyber-blog-card:nth-child(1) { animation-delay: 0.05s; }
.cyber-blog-card:nth-child(2) { animation-delay: 0.1s; }
.cyber-blog-card:nth-child(3) { animation-delay: 0.15s; }
.cyber-blog-card:nth-child(4) { animation-delay: 0.2s; }
.cyber-blog-card:nth-child(5) { animation-delay: 0.25s; }
.cyber-blog-card:nth-child(6) { animation-delay: 0.3s; }

@keyframes fadeUp {
    from { opacity: 0; transform: translateY(30px); }
    to { opacity: 1; transform: translateY(0); }
}

.cyber-blog-card:hover {
    transform: translateY(-8px);
    border-color: var(--neon-cyan);
    box-shadow: var(--glow-cyan);
}

.cyber-blog-image {
    position: relative;
    height: 220px;
    overflow: hidden;
}

.cyber-blog-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.4s;
}

.cyber-blog-card:hover .cyber-blog-image img {
    transform: scale(1.05);
}

.cyber-blog-date {
    position: absolute;
    bottom: 15px;
    left: 15px;
    background: var(--neon-pink);
    color: white;
    padding: 8px 12px;
    text-align: center;
    border-radius: 6px;
}

.cyber-blog-date .day {
    font-size: 18px;
    font-weight: 800;
    line-height: 1;
}

.cyber-blog-date .month {
    font-size: 10px;
    font-weight: 700;
    text-transform: uppercase;
}

.cyber-blog-info {
    padding: 20px;
}

.cyber-blog-meta {
    display: flex;
    gap: 15px;
    margin-bottom: 12px;
    font-size: 11px;
    color: var(--neon-cyan);
    font-weight: 700;
    text-transform: uppercase;
}

.cyber-blog-meta i {
    color: var(--neon-pink);
    margin-right: 5px;
}

.cyber-blog-info h3 {
    font-size: 1.2rem;
    margin-bottom: 12px;
    line-height: 1.4;
}

.cyber-blog-info h3 a {
    color: var(--dark-text);
    text-decoration: none;
    transition: color 0.2s;
}

.cyber-blog-info h3 a:hover {
    color: var(--neon-cyan);
}

.cyber-blog-excerpt {
    color: var(--gray-text);
    font-size: 13px;
    line-height: 1.6;
    margin-bottom: 16px;
}

.cyber-blog-readmore {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    color: var(--neon-pink);
    text-decoration: none;
    font-size: 12px;
    font-weight: 700;
    text-transform: uppercase;
    transition: all 0.2s;
}

.cyber-blog-readmore i {
    transition: transform 0.2s;
}

.cyber-blog-readmore:hover {
    gap: 12px;
    color: var(--neon-cyan);
}

.cyber-blog-readmore:hover i {
    transform: translateX(4px);
}

/* ========== PAGINATION ========== */
.cyber-pagination {
    display: flex;
    justify-content: center;
    gap: 10px;
    margin-top: 50px;
    flex-wrap: wrap;
}

.cyber-pagination .page-item {
    list-style: none;
}

.cyber-pagination .page-link {
    width: 42px;
    height: 42px;
    display: flex;
    align-items: center;
    justify-content: center;
    border: 1px solid var(--neon-cyan);
    background: transparent;
    color: var(--neon-cyan);
    text-decoration: none;
    transition: all 0.2s;
    font-weight: 700;
    border-radius: 6px;
}

.cyber-pagination .page-link:hover {
    background: var(--neon-cyan);
    color: var(--dark-text);
    border-color: var(--neon-cyan);
    transform: translateY(-2px);
}

.cyber-pagination .active .page-link {
    background: var(--neon-pink);
    border-color: var(--neon-pink);
    color: white;
}

.cyber-pagination .disabled .page-link {
    opacity: 0.4;
    cursor: not-allowed;
}

/* ========== EMPTY STATE ========== */
.cyber-empty-state {
    text-align: center;
    padding: 80px;
    background: var(--card-bg);
    border: 2px solid var(--neon-pink);
    grid-column: 1 / -1;
    border-radius: 8px;
}

.cyber-empty-state i {
    font-size: 60px;
    color: var(--neon-pink);
    opacity: 0.5;
    margin-bottom: 20px;
}

.cyber-empty-state h3 {
    font-size: 24px;
    margin-bottom: 10px;
    color: var(--dark-text);
}

.cyber-empty-state p {
    color: var(--gray-text);
}

/* ========== RESPONSIVE ========== */
@media (max-width: 1024px) {
    .cyber-blog-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 768px) {
    .cyber-container {
        padding: 0 20px;
    }

    .cyber-blog-hero {
        padding: 100px 0 40px;
    }

    .cyber-blog-grid {
        grid-template-columns: 1fr;
    }
}
</style>

@php
    $isCustomDomain = isset($is_custom_domain) ? $is_custom_domain : (request()->getHost() !== '13.61.10.174' && request()->getHost() !== 'localhost' && request()->getHost() !== '127.0.0.1');

    if (!function_exists('dateformat')) {
        function dateformat($date) {
            return date('F d, Y', strtotime($date));
        }
    }
@endphp

<!-- ========== BLOG HERO ========== -->
<section class="cyber-blog-hero">
    <div class="cyber-container">
        <h1>LATEST <span>// STORIES</span></h1>
        <p>Insights, news, and expert advice on real estate, property investment, and market trends.</p>
    </div>
</section>

<!-- ========== BLOG GRID ========== -->
<section class="cyber-blog-section">
    <div class="cyber-container">
        <div class="cyber-blog-grid">
            @forelse ($blogs as $blog)
                @php
                    $detailUrl = $isCustomDomain
                        ? route('custom.domain.blog.detail', ['slug' => $blog->slug])
                        : route('blog.detail', ['code' => $user->code, 'slug' => $blog->slug]);
                @endphp
                <div class="cyber-blog-card">
                    <div class="cyber-blog-image">
                        <img src="{{ asset(Storage::url($blog->image)) }}" alt="{{ $blog->title }}">
                        <div class="cyber-blog-date">
                            <div class="day">{{ date('d', strtotime($blog->created_at)) }}</div>
                            <div class="month">{{ date('M', strtotime($blog->created_at)) }}</div>
                        </div>
                    </div>
                    <div class="cyber-blog-info">
                        <div class="cyber-blog-meta">
                            <span><i class="fas fa-calendar-alt"></i> {{ dateformat($blog->created_at) }}</span>
                            <span><i class="fas fa-user"></i> {{ $blog->author ?? 'ADMIN' }}</span>
                        </div>
                        <h3><a href="{{ $isCustomDomain ? route('custom.domain.property.detail', ['id' => \Crypt::encrypt($property->id)]) : route('property.detail', ['code' => $user->code, \Crypt::encrypt($property->id)]) }}">{{ $blog->title }}</a></h3>
                        <p class="cyber-blog-excerpt">{{ \Illuminate\Support\Str::limit(strip_tags($blog->content), 100) }}</p>
                        <a href="{{ $isCustomDomain ? route('custom.domain.property.detail', ['id' => \Crypt::encrypt($property->id)]) : route('property.detail', ['code' => $user->code, \Crypt::encrypt($property->id)]) }}" class="cyber-blog-readmore">READ MORE <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            @empty
                <div class="cyber-empty-state">
                    <i class="fas fa-newspaper"></i>
                    <h3>NO BLOG POSTS FOUND</h3>
                    <p>Check back later for new articles and insights.</p>
                </div>
            @endforelse
        </div>

        @if(isset($blogs) && $blogs->hasPages())
            <ul class="cyber-pagination">
                @if ($blogs->onFirstPage())
                    <li class="disabled"><span class="page-link"><i class="fas fa-chevron-left"></i></span></li>
                @else
                    <li><a class="page-link" href="{{ $blogs->previousPageUrl() }}"><i class="fas fa-chevron-left"></i></a></li>
                @endif

                @php
                    $currentPage = $blogs->currentPage();
                    $lastPage = $blogs->lastPage();
                    $start = max(1, $currentPage - 2);
                    $end = min($lastPage, $currentPage + 2);
                @endphp

                @if ($start > 1)
                    <li><a class="page-link" href="{{ $blogs->url(1) }}">1</a></li>
                    @if ($start > 2)
                        <li class="disabled"><span class="page-link">...</span></li>
                    @endif
                @endif

                @for ($i = $start; $i <= $end; $i++)
                    <li class="{{ $i == $currentPage ? 'active' : '' }}">
                        <a class="page-link" href="{{ $blogs->url($i) }}">{{ $i }}</a>
                    </li>
                @endfor

                @if ($end < $lastPage)
                    @if ($end < $lastPage - 1)
                        <li class="disabled"><span class="page-link">...</span></li>
                    @endif
                    <li><a class="page-link" href="{{ $blogs->url($lastPage) }}">{{ $lastPage }}</a></li>
                @endif

                @if ($blogs->hasMorePages())
                    <li><a class="page-link" href="{{ $blogs->nextPageUrl() }}"><i class="fas fa-chevron-right"></i></a></li>
                @else
                    <li class="disabled"><span class="page-link"><i class="fas fa-chevron-right"></i></span></li>
                @endif
            </ul>
            <p class="cyber-pagination-info" style="text-align: center; color: var(--gray-text); font-size: 12px; margin-top: 20px;">
                SHOWING {{ ($blogs->currentPage() - 1) * $blogs->perPage() + 1 }} –
                {{ min($blogs->currentPage() * $blogs->perPage(), $blogs->total()) }}
                OF {{ $blogs->total() }} POSTS
            </p>
        @endif
    </div>
</section>

@endsection
