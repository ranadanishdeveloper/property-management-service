@php $isCustomDomain = isset($is_custom_domain) ? $is_custom_domain : (request()->getHost() !== '13.61.10.174' && request()->getHost() !== 'localhost' && request()->getHost() !== '127.0.0.1'); @endphp

<div class="blog-grid">
    @forelse ($blogs as $blog)
        @php
            $detailUrl = $isCustomDomain ? route('custom.domain.blog.detail', ['slug' => $blog->slug]) : route('blog.detail', ['code' => $user->code, 'slug' => $blog->slug]);
        @endphp
        <div class="blog-card">
            <div class="blog-image">
                <img src="{{ Storage::url($blog->image) }}" alt="{{ $blog->title }}">
                <div class="blog-date">
                    <div class="day">{{ date('d', strtotime($blog->created_at)) }}</div>
                    <div class="month">{{ date('M', strtotime($blog->created_at)) }}</div>
                </div>
            </div>
            <div class="blog-content">
                <div class="blog-meta">
                    <span><i class="fas fa-calendar-alt"></i> {{ dateformat($blog->created_at) }}</span>
                    <span><i class="fas fa-user"></i> Admin</span>
                </div>
                <h3><a href="{{ $detailUrl }}">{{ $blog->title }}</a></h3>
                <p class="blog-excerpt">{{ \Illuminate\Support\Str::limit(strip_tags($blog->content), 80) }}</p>
                <a href="{{ $detailUrl }}" class="blog-readmore">Read More →</a>
            </div>
        </div>
    @empty
        <div class="text-center py-5">No blogs found</div>
    @endforelse
</div>

@if($blogs->hasPages())
<ul class="pagination">
    @if ($blogs->onFirstPage()) <li class="disabled"><span>←</span></li> @else <li><a href="{{ $blogs->previousPageUrl() }}">←</a></li> @endif
    @foreach ($blogs->links()->elements[0] as $page => $url)
        <li class="{{ $page == $blogs->currentPage() ? 'active' : '' }}"><a href="{{ $url }}">{{ $page }}</a></li>
    @endforeach
    @if ($blogs->hasMorePages()) <li><a href="{{ $blogs->nextPageUrl() }}">→</a></li> @else <li class="disabled"><span>→</span></li> @endif
</ul>
@endif