<style>
/* Blog Card Styles - Same as Index Property Cards */
.blog-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 30px;
    margin: 40px 0;
}

.blog-card {
    background: linear-gradient(135deg, rgba(255,255,255,0.03), rgba(255,255,255,0.01));
    border: 1px solid rgba(255, 255, 255, 0.05);
    border-radius: 24px;
    overflow: hidden;
    transition: all 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
}

.blog-card:hover {
    transform: translateY(-10px);
    border-color: rgba(99, 102, 241, 0.4);
    box-shadow: 0 0 30px rgba(99, 102, 241, 0.3);
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
    transition: transform 0.7s;
}

.blog-card:hover .blog-image img {
    transform: scale(1.08);
}

.blog-date {
    position: absolute;
    bottom: 15px;
    left: 15px;
    background: linear-gradient(135deg, #6366f1, #a855f7);
    padding: 8px 16px;
    border-radius: 12px;
    text-align: center;
    min-width: 60px;
}

.blog-date .day {
    font-size: 20px;
    font-weight: 700;
    line-height: 1;
}

.blog-date .month {
    font-size: 10px;
    text-transform: uppercase;
}

.blog-content {
    padding: 22px;
}

.blog-meta {
    display: flex;
    gap: 15px;
    margin-bottom: 12px;
    font-size: 12px;
    color: #94a3b8;
}

.blog-meta i {
    margin-right: 5px;
    color: #6366f1;
}

.blog-content h3 {
    font-size: 18px;
    margin-bottom: 12px;
    line-height: 1.4;
}

.blog-content h3 a {
    color: white;
    text-decoration: none;
    transition: color 0.3s;
}

.blog-content h3 a:hover {
    color: #6366f1;
}

.blog-excerpt {
    font-size: 13px;
    color: #94a3b8;
    line-height: 1.6;
    margin-bottom: 15px;
}

.blog-readmore {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    font-size: 13px;
    font-weight: 500;
    color: #a855f7;
    text-decoration: none;
    transition: all 0.3s;
}

.blog-readmore:hover {
    gap: 12px;
    color: #6366f1;
}

/* Pagination */
.pagination-blog {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 10px;
    margin: 50px 0 30px;
    flex-wrap: wrap;
    list-style: none;
    padding: 0;
}

.pagination-blog .page-item {
    list-style: none;
}

.pagination-blog .page-link {
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
    transition: all 0.3s;
    font-size: 14px;
    font-weight: 500;
}

.pagination-blog .page-link:hover {
    background: rgba(99, 102, 241, 0.3);
    border-color: #6366f1;
    transform: translateY(-3px);
}

.pagination-blog .active .page-link {
    background: linear-gradient(135deg, #6366f1, #a855f7);
    border-color: transparent;
    box-shadow: 0 5px 20px rgba(99, 102, 241, 0.3);
}

.pagination-blog .disabled .page-link {
    opacity: 0.4;
    cursor: not-allowed;
    transform: none;
}

.pagination-info {
    text-align: center;
    color: #94a3b8;
    font-size: 14px;
    margin-top: 20px;
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

    .blog-image {
        height: 200px;
    }
}
</style>

@php
    $isCustomDomain = isset($is_custom_domain) ? $is_custom_domain : (request()->getHost() !== '13.61.10.174' && request()->getHost() !== 'localhost' && request()->getHost() !== '127.0.0.1');
@endphp

<div class="blog-grid">
    @forelse ($blogs as $blog)
        @php
            $blogDate = date('d', strtotime($blog->created_at));
            $blogMonth = date('M', strtotime($blog->created_at));

            if ($isCustomDomain) {
                $detailUrl = route('custom.domain.blog.detail', ['slug' => $blog->slug]);
            } else {
                $detailUrl = route('blog.detail', ['code' => $user->code, 'slug' => $blog->slug]);
            }
        @endphp
        <div class="blog-card" data-aos="fade-up" data-aos-delay="{{ $loop->index * 50 }}">
            <div class="blog-image">
                <img src="{{ Storage::url($blog->image) }}" alt="{{ $blog->title }}">
                <div class="blog-date">
                    <div class="day">{{ $blogDate }}</div>
                    <div class="month">{{ $blogMonth }}</div>
                </div>
            </div>
            <div class="blog-content">
                <div class="blog-meta">
                    <span><i class="fas fa-calendar-alt"></i> {{ dateformat($blog->created_at) }}</span>
                    <span><i class="fas fa-user"></i> Admin</span>
                </div>
                <h3><a href="{{ route('custom.domain.blog.detail', ['slug' => $blog->slug]) }}">{{ $blog->title }}</a></h3>
                <p class="blog-excerpt">{{ \Illuminate\Support\Str::limit(strip_tags($blog->content), 80, '...') }}</p>
                <a href="{{ route('custom.domain.blog.detail', ['slug' => $blog->slug]) }}" class="blog-readmore">Read More <i class="fas fa-arrow-right"></i class="fas fa-arrow-right"></i></a>
            </div>
        </div>
    @empty
        <div class="empty-blog" style="grid-column: 1/-1;">
            <i class="fas fa-newspaper"></i>
            <h3>No Blogs Found</h3>
            <p>No blog articles available at the moment.</p>
        </div>
    @endforelse
</div>

<!-- Pagination -->
@if($blogs->hasPages())
<ul class="pagination-blog">
    @if ($blogs->onFirstPage())
        <li class="page-item disabled"><span class="page-link"><i class="fas fa-chevron-left"></i></span></li>
    @else
        <li class="page-item"><a class="page-link" href="{{ $blogs->previousPageUrl() }}"><i class="fas fa-chevron-left"></i></a></li>
    @endif

    @foreach ($blogs->links()->elements[0] as $page => $url)
        @if (is_string($page))
            <li class="page-item disabled"><span class="page-link">{{ $page }}</span></li>
        @else
            <li class="page-item {{ $page == $blogs->currentPage() ? 'active' : '' }}">
                <a class="page-link" href="{{ $url }}">{{ $page }}</a>
            </li>
        @endif
    @endforeach

    @if ($blogs->hasMorePages())
        <li class="page-item"><a class="page-link" href="{{ $blogs->nextPageUrl() }}"><i class="fas fa-chevron-right"></i></a></li>
    @else
        <li class="page-item disabled"><span class="page-link"><i class="fas fa-chevron-right"></i></span></li>
    @endif
</ul>

<p class="pagination-info">
    Showing {{ ($blogs->currentPage() - 1) * $blogs->perPage() + 1 }} –
    {{ min($blogs->currentPage() * $blogs->perPage(), $blogs->total()) }}
    of {{ $blogs->total() }} blog{{ $blogs->total() > 1 ? 's' : '' }} available
</p>
@endif
