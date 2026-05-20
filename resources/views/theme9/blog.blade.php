@extends('theme9.main')
@section('content')

<style>
/* ============================================
   THEME 9 - BLOG PAGE
   Dark theme + Gold accents + Grid layout
   ============================================ */

/* Hero Section */
.blog-hero {
    background: linear-gradient(135deg, #0a0a0a, #1a1a1a);
    padding: 100px 0 60px;
    margin-top: 80px;

    text-align: center;
}

.blog-hero h1 {
    font-size: 3rem;
    font-weight: 800;
    color: white;
    margin-bottom: 15px;
}

.blog-hero h1 span {
    color: #d4af37;
}

.blog-hero p {
    color: #a0a0a0;
    max-width: 600px;
    margin: 0 auto;
}

/* Blog Grid Section */
.blog-section {
    padding: 60px 0;
    background: #0a0a0a;
}

.blog-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 30px;
}

.blog-card {
    background: #1a1a1a;
    border-radius: 20px;
    overflow: hidden;
    transition: all 0.3s;
}

.blog-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 20px 30px rgba(0,0,0,0.3);
}

.blog-image {
    position: relative;
    height: 220px;
    overflow: hidden;
}

.blog-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s;
}

.blog-card:hover .blog-image img {
    transform: scale(1.05);
}

.blog-date {
    position: absolute;
    bottom: 15px;
    left: 15px;
    background: #d4af37;
    color: #0a0a0a;
    padding: 8px 12px;
    border-radius: 12px;
    text-align: center;
    min-width: 55px;
}

.blog-date .day {
    font-size: 18px;
    font-weight: 800;
    line-height: 1;
}

.blog-date .month {
    font-size: 10px;
    font-weight: 600;
    text-transform: uppercase;
}

.blog-info {
    padding: 20px;
}

.blog-meta {
    display: flex;
    gap: 15px;
    margin-bottom: 12px;
    font-size: 12px;
    color: #a0a0a0;
}

.blog-meta i {
    color: #d4af37;
    margin-right: 5px;
}

.blog-info h3 {
    font-size: 1.2rem;
    margin-bottom: 12px;
    line-height: 1.4;
}

.blog-info h3 a {
    color: white;
    text-decoration: none;
    transition: color 0.2s;
}

.blog-info h3 a:hover {
    color: #d4af37;
}

.blog-excerpt {
    color: #a0a0a0;
    font-size: 13px;
    line-height: 1.6;
    margin-bottom: 16px;
}

.blog-readmore {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    color: #d4af37;
    text-decoration: none;
    font-size: 13px;
    font-weight: 600;
    transition: all 0.2s;
}

.blog-readmore i {
    transition: transform 0.2s;
}

.blog-readmore:hover {
    gap: 12px;
}

.blog-readmore:hover i {
    transform: translateX(4px);
}

/* Pagination */
.pagination {
    display: flex;
    justify-content: center;
    gap: 10px;
    margin-top: 50px;
    flex-wrap: wrap;
}

.pagination .page-item {
    list-style: none;
}

.pagination .page-link {
    width: 42px;
    height: 42px;
    display: flex;
    align-items: center;
    justify-content: center;
    border: 1px solid #2a2a2a;
    border-radius: 12px;
    color: #a0a0a0;
    text-decoration: none;
    transition: all 0.2s;
    background: #1a1a1a;
}

.pagination .page-link:hover {
    background: #d4af37;
    border-color: #d4af37;
    color: #0a0a0a;
}

.pagination .active .page-link {
    background: #d4af37;
    border-color: #d4af37;
    color: #0a0a0a;
}

.pagination .disabled .page-link {
    opacity: 0.5;
    cursor: not-allowed;
}

/* Empty State */
.empty-state {
    text-align: center;
    padding: 60px;
    background: #1a1a1a;
    border-radius: 20px;
    grid-column: 1 / -1;
}

.empty-state i {
    font-size: 60px;
    color: #d4af37;
    opacity: 0.3;
    margin-bottom: 20px;
}

.empty-state h3 {
    color: white;
    font-size: 24px;
    margin-bottom: 10px;
}

/* Container */
.container {
    max-width: 1280px;
    margin: 0 auto;
    padding: 0 24px;
    width: 100%;
}

/* Responsive */
@media (max-width: 1024px) {
    .blog-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 768px) {
    .blog-grid {
        grid-template-columns: 1fr;
    }

    .blog-hero h1 {
        font-size: 2rem;
    }

    .container {
        padding: 0 20px;
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
<section class="blog-hero " style="margin-top: 83px">
    <h1>Latest <span>Stories</span></h1>
    <p>Insights, news, and expert advice on real estate, property investment, and market trends.</p>
</section>

<!-- ========== BLOG GRID ========== -->
<section class="blog-section">
    <div class="container">
        <div class="blog-grid">
            @forelse ($blogs as $blog)
                @php
                    $detailUrl = $isCustomDomain
                        ? route('custom.domain.blog.detail', ['slug' => $blog->slug])
                        : route('blog.detail', ['code' => $user->code, 'slug' => $blog->slug]);
                @endphp
                <div class="blog-card">
                    <div class="blog-image">
                        <img src="{{ asset(Storage::url($blog->image)) }}" alt="{{ $blog->title }}">
                        <div class="blog-date">
                            <div class="day">{{ date('d', strtotime($blog->created_at)) }}</div>
                            <div class="month">{{ date('M', strtotime($blog->created_at)) }}</div>
                        </div>
                    </div>
                    <div class="blog-info">
                        <div class="blog-meta">
                            <span><i class="fas fa-calendar-alt"></i> {{ dateformat($blog->created_at) }}</span>
                            <span><i class="fas fa-user"></i> {{ $blog->author ?? 'Admin' }}</span>
                        </div>
                        <h3><a href="{{ $isCustomDomain ? route('custom.domain.property.detail', ['id' => \Crypt::encrypt($property->id)]) : route('property.detail', ['code' => $user->code, \Crypt::encrypt($property->id)]) }}">{{ $blog->title }}</a></h3>
                        <p class="blog-excerpt">{{ \Illuminate\Support\Str::limit(strip_tags($blog->content), 100) }}</p>
                        <a href="{{ $isCustomDomain ? route('custom.domain.property.detail', ['id' => \Crypt::encrypt($property->id)]) : route('property.detail', ['code' => $user->code, \Crypt::encrypt($property->id)]) }}" class="blog-readmore">Read More <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            @empty
                <div class="empty-state">
                    <i class="fas fa-newspaper"></i>
                    <h3>No Blog Posts Found</h3>
                    <p>Check back later for new articles and insights.</p>
                </div>
            @endforelse
        </div>

        @if(isset($blogs) && $blogs->hasPages())
            <ul class="pagination">
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
            <p class="pagination-info" style="text-align: center; color: #a0a0a0; font-size: 12px; margin-top: 20px;">
                Showing {{ ($blogs->currentPage() - 1) * $blogs->perPage() + 1 }} –
                {{ min($blogs->currentPage() * $blogs->perPage(), $blogs->total()) }}
                of {{ $blogs->total() }} posts
            </p>
        @endif
    </div>
</section>

@endsection
