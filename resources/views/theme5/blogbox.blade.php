<style>
.blog-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 30px;
    margin: 40px 0;
}

.blog-card {
    background: white;
    border: 1px solid #e2e8f0;
    border-radius: 20px;
    overflow: hidden;
    transition: all 0.3s;
}

.blog-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.05);
    border-color: #3b82f6;
}

.blog-image {
    position: relative;
    height: 200px;
    overflow: hidden;
    background: #f8fafc;
}

.blog-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.4s;
}

.blog-card:hover .blog-image img {
    transform: scale(1.05);
}

.blog-date {
    position: absolute;
    bottom: 12px;
    left: 12px;
    background: #3b82f6;
    color: white;
    padding: 6px 12px;
    border-radius: 12px;
    text-align: center;
    min-width: 55px;
}

.blog-date .day {
    font-size: 18px;
    font-weight: 700;
    line-height: 1;
}

.blog-date .month {
    font-size: 10px;
    text-transform: uppercase;
}

.blog-content {
    padding: 20px;
}

.blog-meta {
    display: flex;
    gap: 15px;
    margin-bottom: 10px;
    font-size: 12px;
    color: #64748b;
}

.blog-meta i {
    margin-right: 4px;
    color: #3b82f6;
}

.blog-content h3 {
    font-size: 18px;
    margin-bottom: 10px;
    line-height: 1.4;
}

.blog-content h3 a {
    color: #0f172a;
    text-decoration: none;
    transition: color 0.2s;
}

.blog-content h3 a:hover {
    color: #3b82f6;
}

.blog-excerpt {
    font-size: 13px;
    color: #475569;
    line-height: 1.5;
    margin-bottom: 15px;
}

.blog-readmore {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    font-size: 13px;
    font-weight: 500;
    color: #3b82f6;
    text-decoration: none;
    transition: all 0.2s;
}

.blog-readmore i {
    font-size: 11px;
    transition: transform 0.2s;
}

.blog-readmore:hover {
    gap: 10px;
    color: #2563eb;
}

.blog-readmore:hover i {
    transform: translateX(3px);
}

/* Pagination */
.pagination-blog {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 8px;
    margin: 40px 0 30px;
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
    min-width: 40px;
    height: 40px;
    padding: 0 12px;
    background: white;
    border: 1px solid #e2e8f0;
    border-radius: 10px;
    color: #0f172a;
    text-decoration: none;
    transition: all 0.2s;
    font-size: 14px;
    font-weight: 500;
}

.pagination-blog .page-link:hover {
    background: #eff6ff;
    border-color: #3b82f6;
    color: #3b82f6;
}

.pagination-blog .active .page-link {
    background: #3b82f6;
    border-color: #3b82f6;
    color: white;
}

.pagination-blog .disabled .page-link {
    opacity: 0.5;
    cursor: not-allowed;
}

.pagination-info {
    text-align: center;
    color: #64748b;
    font-size: 13px;
    margin-top: 16px;
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
                <h3><a href="{{ $detailUrl }}">{{ $blog->title }}</a></h3>
                <p class="blog-excerpt">{{ \Illuminate\Support\Str::limit(strip_tags($blog->content), 80, '...') }}</p>
                <a href="{{ $detailUrl }}" class="blog-readmore">Read More <i class="fas fa-arrow-right"></i></a>
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
