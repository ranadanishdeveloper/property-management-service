@extends('theme8.main')
@section('content')

<style>
/* ============================================
   THEME 8 - BLOG DETAIL PAGE
   iOS Glassmorphism + Blog Content + Share + Related
   ============================================ */

/* Blog Detail Hero */
.glass-blog-detail-hero {
    background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
    padding: 80px 0 50px;
    text-align: center;
}

.glass-blog-detail-hero h1 {
    font-size: 2.5rem;
    color: white;
    max-width: 800px;
    margin: 0 auto 20px;
    line-height: 1.3;
}

.glass-blog-detail-meta {
    display: flex;
    justify-content: center;
    gap: 30px;
    color: #94a3b8;
    font-size: 14px;
    flex-wrap: wrap;
}

.glass-blog-detail-meta i {
    color: #007aff;
    margin-right: 6px;
}

/* Blog Detail Section */
.glass-blog-detail-section {
    padding: 40px 0 80px;
    background: #f5f5f7;
}

/* Featured Image */
.glass-blog-featured {
    border-radius: 24px;
    overflow: hidden;
    margin-bottom: 40px;
    box-shadow: 0 4px 16px rgba(0, 0, 0, 0.06);
}

.glass-blog-featured img {
    width: 100%;
    max-height: 550px;
    object-fit: cover;
}

/* Content Card */
.glass-blog-content-card {
    max-width: 800px;
    margin: 0 auto;
    background: rgba(255, 255, 255, 0.8);
    backdrop-filter: blur(20px);
    border-radius: 24px;
    padding: 50px;
    box-shadow: 0 4px 16px rgba(0, 0, 0, 0.06);
}

.glass-blog-content {
    line-height: 1.8;
    color: #4a5568;
}

.glass-blog-content p {
    margin-bottom: 24px;
    font-size: 16px;
    line-height: 1.8;
}

.glass-blog-content h2 {
    font-size: 1.8rem;
    font-weight: 700;
    margin: 35px 0 20px;
    color: #1d1c1e;
}

.glass-blog-content h3 {
    font-size: 1.4rem;
    font-weight: 600;
    margin: 30px 0 15px;
    color: #1d1c1e;
}

.glass-blog-content img {
    max-width: 100%;
    border-radius: 16px;
    margin: 20px 0;
}

.glass-blog-content blockquote {
    background: rgba(0, 122, 255, 0.05);
    border-left: 4px solid #007aff;
    padding: 20px 30px;
    margin: 25px 0;
    font-style: italic;
    color: #1d1c1e;
    border-radius: 16px;
}

.glass-blog-content ul,
.glass-blog-content ol {
    margin: 15px 0 15px 25px;
}

.glass-blog-content li {
    margin-bottom: 8px;
}

/* Share Section */
.glass-share-section {
    text-align: center;
    margin-top: 50px;
    padding-top: 40px;
    border-top: 1px solid rgba(0, 0, 0, 0.05);
}

.glass-share-section h4 {
    font-size: 1.1rem;
    font-weight: 600;
    margin-bottom: 20px;
    color: #1d1c1e;
}

.glass-share-links {
    display: flex;
    justify-content: center;
    gap: 15px;
    margin-bottom: 30px;
    flex-wrap: wrap;
}

.glass-share-link {
    width: 44px;
    height: 44px;
    background: white;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #007aff;
    text-decoration: none;
    transition: all 0.2s;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
}

.glass-share-link:hover {
    background: #007aff;
    color: white;
    transform: translateY(-3px);
}

.glass-back-btn {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    color: #007aff;
    text-decoration: none;
    font-weight: 500;
    transition: all 0.2s;
}

.glass-back-btn:hover {
    gap: 12px;
}

/* Author Section */
.glass-author-section {
    max-width: 800px;
    margin: 40px auto 0;
    background: rgba(255, 255, 255, 0.8);
    backdrop-filter: blur(20px);
    border-radius: 24px;
    padding: 30px;
    display: flex;
    align-items: center;
    gap: 20px;
    flex-wrap: wrap;
}

.glass-author-avatar {
    width: 70px;
    height: 70px;
    background: #007aff;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 28px;
}

.glass-author-info h4 {
    font-size: 1.1rem;
    font-weight: 700;
    margin-bottom: 5px;
}

.glass-author-info p {
    font-size: 13px;
    color: #8e8e93;
}

/* Related Posts */
.glass-related-posts {
    max-width: 800px;
    margin: 50px auto 0;
}

.glass-related-posts h3 {
    font-size: 1.5rem;
    font-weight: 700;
    margin-bottom: 25px;
    text-align: center;
}

.glass-related-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 25px;
}

.glass-related-card {
    background: rgba(255, 255, 255, 0.8);
    backdrop-filter: blur(20px);
    border-radius: 20px;
    overflow: hidden;
    text-decoration: none;
    transition: all 0.3s;
}

.glass-related-card:hover {
    transform: translateY(-5px);
    background: rgba(255, 255, 255, 0.95);
}

.glass-related-card img {
    width: 100%;
    height: 140px;
    object-fit: cover;
}

.glass-related-content {
    padding: 15px;
}

.glass-related-content h4 {
    font-size: 14px;
    font-weight: 600;
    color: #1d1c1e;
    margin-bottom: 8px;
    line-height: 1.4;
}

.glass-related-date {
    font-size: 11px;
    color: #8e8e93;
}

/* Responsive */
@media (max-width: 1024px) {
    .glass-related-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 768px) {
    .glass-blog-detail-hero {
        padding: 60px 0 40px;
    }

    .glass-blog-detail-hero h1 {
        font-size: 1.8rem;
    }

    .glass-blog-detail-meta {
        gap: 15px;
        font-size: 12px;
    }

    .glass-blog-content-card {
        padding: 25px;
    }

    .glass-blog-content p {
        font-size: 15px;
    }

    .glass-related-grid {
        grid-template-columns: 1fr;
    }

    .glass-author-section {
        flex-direction: column;
        text-align: center;
    }
}
</style>

@php
    $isCustomDomain = isset($is_custom_domain) ? $is_custom_domain : (request()->getHost() !== '13.61.10.174' && request()->getHost() !== 'localhost' && request()->getHost() !== '127.0.0.1');
    $blogUrl = $isCustomDomain ? route('custom.domain.blog') : route('blog.home', ['code' => $user->code]);

    $wordCount = str_word_count(strip_tags($blog->content ?? ''));
    $readTime = max(1, ceil($wordCount / 200));

    $relatedPosts = \App\Models\Blog::where('parent_id', $user->id)
        ->where('id', '!=', $blog->id)
        ->latest()
        ->take(3)
        ->get();

    if (!function_exists('dateformat')) {
        function dateformat($date) {
            return date('F d, Y', strtotime($date));
        }
    }
@endphp

<!-- ========== BLOG DETAIL HERO ========== -->
<section class="glass-blog-detail-hero">
    <div class="glass-container">
        <h1>{{ ucfirst($blog->title) }}</h1>
        <div class="glass-blog-detail-meta">
            <span><i class="fas fa-calendar-alt"></i> {{ dateformat($blog->created_at) }}</span>
            <span><i class="fas fa-user"></i> {{ $blog->author ?? 'Admin' }}</span>
            <span><i class="fas fa-clock"></i> {{ $readTime }} min read</span>
            @if(isset($blog->category) && $blog->category)
            <span><i class="fas fa-tag"></i> {{ ucfirst($blog->category) }}</span>
            @endif
        </div>
    </div>
</section>

<!-- ========== BLOG DETAIL SECTION ========== -->
<section class="glass-blog-detail-section">
    <div class="glass-container">
        @if(!empty($blog->image))
        <div class="glass-blog-featured">
            <img src="{{ asset(Storage::url($blog->image)) }}" alt="{{ $blog->title }}">
        </div>
        @endif

        <div class="glass-blog-content-card">
            <div class="glass-blog-content">
                {!! $blog->content !!}
            </div>

            <div class="glass-share-section">
                <h4>Share this article</h4>
                <div class="glass-share-links">
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}" target="_blank" class="glass-share-link">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->fullUrl()) }}&text={{ urlencode($blog->title) }}" target="_blank" class="glass-share-link">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(request()->fullUrl()) }}&title={{ urlencode($blog->title) }}" target="_blank" class="glass-share-link">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a href="https://wa.me/?text={{ urlencode($blog->title . ' - ' . request()->fullUrl()) }}" target="_blank" class="glass-share-link">
                        <i class="fab fa-whatsapp"></i>
                    </a>
                    <a href="mailto:?subject={{ $blog->title }}&body={{ urlencode(request()->fullUrl()) }}" class="glass-share-link">
                        <i class="fas fa-envelope"></i>
                    </a>
                </div>
                <a href="{{ $blogUrl }}" class="glass-back-btn">
                    <i class="fas fa-arrow-left"></i> Back to Blog
                </a>
            </div>
        </div>

        <div class="glass-author-section">
            <div class="glass-author-avatar">
                <i class="fas fa-user-edit"></i>
            </div>
            <div class="glass-author-info">
                <h4>Written by {{ $blog->author ?? 'Admin' }}</h4>
                <p>Property expert with years of experience in real estate market analysis and investment strategies.</p>
                <p style="font-size: 12px; margin-top: 5px;">
                    <i class="fas fa-calendar-alt"></i> Published on {{ dateformat($blog->created_at) }}
                    @if(isset($blog->updated_at) && $blog->updated_at && $blog->updated_at != $blog->created_at)
                        | Updated on {{ dateformat($blog->updated_at) }}
                    @endif
                </p>
            </div>
        </div>

        @if($relatedPosts->isNotEmpty())
        <div class="glass-related-posts">
            <h3>You Might Also Like</h3>
            <div class="glass-related-grid">
                @foreach($relatedPosts as $related)
                    @php
                        $relatedUrl = $isCustomDomain
                            ? route('custom.domain.blog.detail', ['slug' => $related->slug])
                            : route('blog.detail', ['code' => $user->code, 'slug' => $related->slug]);
                    @endphp
                    <a href="{{ $relatedUrl }}" class="glass-related-card">
                        @if(!empty($related->image))
                        <img src="{{ asset(Storage::url($related->image)) }}" alt="{{ $related->title }}">
                        @else
                        <img src="https://placehold.co/400x200/e2e8f0/94a3b8?text=No+Image" alt="{{ $related->title }}">
                        @endif
                        <div class="glass-related-content">
                            <h4>{{ \Illuminate\Support\Str::limit($related->title, 50) }}</h4>
                            <span class="glass-related-date"><i class="fas fa-calendar-alt"></i> {{ dateformat($related->created_at) }}</span>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
        @endif
    </div>
</section>

@endsection
