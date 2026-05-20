@extends('theme8.main')
@section('content')

<style>
/* ============================================
   THEME 8 - BLOG LISTING PAGE
   iOS Glassmorphism + Blog Grid + Pagination
   ============================================ */

/* Hero Section */
.glass-blog-hero {
    background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
    padding: 60px 0 50px;
    text-align: center;
}

.glass-blog-hero h1 {
    font-size: 2.8rem;
    color: white;
    margin-bottom: 15px;
}

.glass-blog-hero h1 span {
    color: #007aff;
}

.glass-blog-hero p {
    color: #94a3b8;
    max-width: 600px;
    margin: 0 auto;
}

/* Blog Grid Section */
.glass-blog-section {
    padding: 60px 0;
    background: #f5f5f7;
}

.glass-blog-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 30px;
}

.glass-blog-card {
    background: rgba(255, 255, 255, 0.8);
    backdrop-filter: blur(20px);
    border-radius: 24px;
    overflow: hidden;
    box-shadow: 0 4px 16px rgba(0, 0, 0, 0.06);
    transition: all 0.3s;
}

.glass-blog-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 20px 30px rgba(0, 0, 0, 0.1);
    background: rgba(255, 255, 255, 0.95);
}

.glass-blog-image {
    position: relative;
    height: 220px;
    overflow: hidden;
}

.glass-blog-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s;
}

.glass-blog-card:hover .glass-blog-image img {
    transform: scale(1.05);
}

.glass-blog-date {
    position: absolute;
    bottom: 15px;
    left: 15px;
    background: rgba(0, 122, 255, 0.9);
    backdrop-filter: blur(10px);
    color: white;
    padding: 8px 12px;
    border-radius: 12px;
    text-align: center;
    min-width: 55px;
}

.glass-blog-date .day {
    font-size: 18px;
    font-weight: 800;
    line-height: 1;
}

.glass-blog-date .month {
    font-size: 10px;
    font-weight: 600;
    text-transform: uppercase;
}

.glass-blog-info {
    padding: 20px;
}

.glass-blog-meta {
    display: flex;
    gap: 15px;
    margin-bottom: 12px;
    font-size: 12px;
    color: #8e8e93;
}

.glass-blog-meta i {
    color: #007aff;
    margin-right: 5px;
}

.glass-blog-info h3 {
    font-size: 1.2rem;
    margin-bottom: 12px;
    line-height: 1.4;
}

.glass-blog-info h3 a {
    color: #1d1c1e;
    text-decoration: none;
    transition: color 0.2s;
}

.glass-blog-info h3 a:hover {
    color: #007aff;
}

.glass-blog-excerpt {
    color: #6c757d;
    font-size: 13px;
    line-height: 1.6;
    margin-bottom: 16px;
}

.glass-blog-readmore {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    color: #007aff;
    text-decoration: none;
    font-size: 13px;
    font-weight: 600;
    transition: all 0.2s;
}

.glass-blog-readmore i {
    transition: transform 0.2s;
}

.glass-blog-readmore:hover {
    gap: 12px;
}

.glass-blog-readmore:hover i {
    transform: translateX(4px);
}

/* Pagination */
.glass-pagination {
    display: flex;
    justify-content: center;
    gap: 10px;
    margin-top: 50px;
    flex-wrap: wrap;
}

.glass-pagination .page-item {
    list-style: none;
}

.glass-pagination .page-link {
    width: 42px;
    height: 42px;
    display: flex;
    align-items: center;
    justify-content: center;
    border: 1px solid rgba(0, 0, 0, 0.1);
    border-radius: 12px;
    color: #64748b;
    text-decoration: none;
    transition: all 0.2s;
    background: white;
}

.glass-pagination .page-link:hover {
    background: #007aff;
    border-color: #007aff;
    color: white;
}

.glass-pagination .active .page-link {
    background: #007aff;
    border-color: #007aff;
    color: white;
}

.glass-pagination .disabled .page-link {
    opacity: 0.5;
    cursor: not-allowed;
}

/* Empty State */
.glass-empty-state {
    text-align: center;
    padding: 80px;
    background: rgba(255, 255, 255, 0.5);
    border-radius: 24px;
    grid-column: 1 / -1;
}

.glass-empty-state i {
    font-size: 60px;
    color: #007aff;
    opacity: 0.3;
    margin-bottom: 20px;
}

.glass-empty-state h3 {
    font-size: 24px;
    margin-bottom: 10px;
}

/* Responsive */
@media (max-width: 1024px) {
    .glass-blog-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 768px) {
    .glass-blog-grid {
        grid-template-columns: 1fr;
    }

    .glass-blog-hero h1 {
        font-size: 2rem;
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
<section class="glass-blog-hero">
    <div class="glass-container">
        <h1>Latest <span>// Stories</span></h1>
        <p>Insights, news, and expert advice on real estate, property investment, and market trends.</p>
    </div>
</section>

<!-- ========== BLOG GRID ========== -->
<section class="glass-blog-section">
    <div class="glass-container">
        <div class="glass-blog-grid">
            @forelse ($blogs as $blog)
                @php
                    $detailUrl = $isCustomDomain
                        ? route('custom.domain.blog.detail', ['slug' => $blog->slug])
                        : route('blog.detail', ['code' => $user->code, 'slug' => $blog->slug]);
                @endphp
                <div class="glass-blog-card">
                    <div class="glass-blog-image">
                        <img src="{{ asset(Storage::url($blog->image)) }}" alt="{{ $blog->title }}">
                        <div class="glass-blog-date">
                            <div class="day">{{ date('d', strtotime($blog->created_at)) }}</div>
                            <div class="month">{{ date('M', strtotime($blog->created_at)) }}</div>
                        </div>
                    </div>
                    <div class="glass-blog-info">
                        <div class="glass-blog-meta">
                            <span><i class="fas fa-calendar-alt"></i> {{ dateformat($blog->created_at) }}</span>
                            <span><i class="fas fa-user"></i> {{ $blog->author ?? 'Admin' }}</span>
                        </div>
                        <h3><a href="{{ $isCustomDomain ? route('custom.domain.property.detail', ['id' => \Crypt::encrypt($property->id)]) : route('property.detail', ['code' => $user->code, \Crypt::encrypt($property->id)]) }}">{{ $blog->title }}</a></h3>
                        <p class="glass-blog-excerpt">{{ \Illuminate\Support\Str::limit(strip_tags($blog->content), 100) }}</p>
                        <a href="{{ $isCustomDomain ? route('custom.domain.property.detail', ['id' => \Crypt::encrypt($property->id)]) : route('property.detail', ['code' => $user->code, \Crypt::encrypt($property->id)]) }}" class="glass-blog-readmore">Read More <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            @empty
                <div class="glass-empty-state">
                    <i class="fas fa-newspaper"></i>
                    <h3>No Blog Posts Found</h3>
                    <p>Check back later for new articles and insights.</p>
                </div>
            @endforelse
        </div>

        @if(isset($blogs) && $blogs->hasPages())
            <ul class="glass-pagination">
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
            <p class="glass-pagination-info" style="text-align: center; color: #8e8e93; font-size: 12px; margin-top: 20px;">
                Showing {{ ($blogs->currentPage() - 1) * $blogs->perPage() + 1 }} –
                {{ min($blogs->currentPage() * $blogs->perPage(), $blogs->total()) }}
                of {{ $blogs->total() }} posts
            </p>
        @endif
    </div>
</section>

@endsection
