@php
    $isCustomDomain = isset($is_custom_domain) ? $is_custom_domain : (request()->getHost() !== '13.61.10.174' && request()->getHost() !== 'localhost' && request()->getHost() !== '127.0.0.1');

    if (!function_exists('dateformat')) {
        function dateformat($date) {
            return date('F d, Y', strtotime($date));
        }
    }
@endphp

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
                <h3><a href="{{ route('custom.domain.blog.detail', ['slug' => $blog->slug]) }}">{{ $blog->title }}</a></h3>
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
    <p class="cyber-pagination-info" style="text-align: center; color: #8a8aaa; font-size: 12px; margin-top: 20px;">
        SHOWING {{ ($blogs->currentPage() - 1) * $blogs->perPage() + 1 }} –
        {{ min($blogs->currentPage() * $blogs->perPage(), $blogs->total()) }}
        OF {{ $blogs->total() }} POSTS
    </p>
@endif
