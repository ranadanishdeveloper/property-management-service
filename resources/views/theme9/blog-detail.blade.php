@extends('theme9.main')
@section('content')

<style>
/* ============================================
   THEME 9 - BLOG DETAIL PAGE
   Dark theme + Gold accents + Full content
   ============================================ */

/* Blog Detail Hero */
.blog-detail-hero {
    background: linear-gradient(135deg, #0a0a0a, #1a1a1a);
    padding: 100px 0 60px;
    margin-top: 80px;
   
    text-align: center;
}

.blog-detail-hero h1 {
    font-size: 2.5rem;
    color: white;
    max-width: 800px;
    margin: 0 auto 20px;
    line-height: 1.3;
}

.blog-detail-meta {
    display: flex;
    justify-content: center;
    gap: 30px;
    color: #a0a0a0;
    font-size: 14px;
    flex-wrap: wrap;
}

.blog-detail-meta i {
    color: #d4af37;
    margin-right: 6px;
}

/* Blog Detail Section */
.blog-detail-section {
    padding: 60px 0;
    background: #0a0a0a;
}

/* Featured Image */
.blog-featured {
    border-radius: 20px;
    overflow: hidden;
    margin-bottom: 40px;
}

.blog-featured img {
    width: 100%;
    max-height: 550px;
    object-fit: cover;
}

/* Content Card */
.blog-content-card {
    max-width: 800px;
    margin: 0 auto;
    background: #1a1a1a;
    border-radius: 20px;
    padding: 50px;
}

.blog-content {
    line-height: 1.8;
    color: #c0c0c0;
}

.blog-content p {
    margin-bottom: 24px;
    font-size: 16px;
    line-height: 1.8;
}

.blog-content h2 {
    font-size: 1.8rem;
    font-weight: 700;
    margin: 35px 0 20px;
    color: white;
}

.blog-content h3 {
    font-size: 1.4rem;
    font-weight: 600;
    margin: 30px 0 15px;
    color: white;
}

.blog-content img {
    max-width: 100%;
    border-radius: 16px;
    margin: 20px 0;
}

.blog-content blockquote {
    background: rgba(212, 175, 55, 0.1);
    border-left: 4px solid #d4af37;
    padding: 20px 30px;
    margin: 25px 0;
    font-style: italic;
    color: white;
    border-radius: 16px;
}

.blog-content ul,
.blog-content ol {
    margin: 15px 0 15px 25px;
}

.blog-content li {
    margin-bottom: 8px;
}

/* Share Section */
.share-section {
    text-align: center;
    margin-top: 50px;
    padding-top: 40px;
    border-top: 1px solid #2a2a2a;
}

.share-section h4 {
    font-size: 1.1rem;
    font-weight: 600;
    margin-bottom: 20px;
    color: white;
}

.share-links {
    display: flex;
    justify-content: center;
    gap: 15px;
    margin-bottom: 30px;
    flex-wrap: wrap;
}

.share-link {
    width: 44px;
    height: 44px;
    background: #2a2a2a;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #d4af37;
    text-decoration: none;
    transition: all 0.2s;
}

.share-link:hover {
    background: #d4af37;
    color: #0a0a0a;
    transform: translateY(-3px);
}

.back-btn {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    color: #d4af37;
    text-decoration: none;
    font-weight: 500;
    transition: all 0.2s;
}

.back-btn:hover {
    gap: 12px;
}

/* Author Section */
.author-section {
    max-width: 800px;
    margin: 40px auto 0;
    background: #1a1a1a;
    border-radius: 20px;
    padding: 30px;
    display: flex;
    align-items: center;
    gap: 20px;
    flex-wrap: wrap;
}

.author-avatar {
    width: 70px;
    height: 70px;
    background: #d4af37;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #0a0a0a;
    font-size: 28px;
}

.author-info h4 {
    font-size: 1.1rem;
    font-weight: 700;
    margin-bottom: 5px;
    color: white;
}

.author-info p {
    font-size: 13px;
    color: #a0a0a0;
}

/* Related Posts */
.related-posts {
    max-width: 800px;
    margin: 50px auto 0;
}

.related-posts h3 {
    font-size: 1.5rem;
    font-weight: 700;
    margin-bottom: 25px;
    text-align: center;
    color: white;
}

.related-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 25px;
}

.related-card {
    background: #1a1a1a;
    border-radius: 16px;
    overflow: hidden;
    text-decoration: none;
    transition: all 0.3s;
}

.related-card:hover {
    transform: translateY(-5px);
}

.related-card img {
    width: 100%;
    height: 140px;
    object-fit: cover;
}

.related-content {
    padding: 15px;
}

.related-content h4 {
    font-size: 14px;
    font-weight: 600;
    color: white;
    margin-bottom: 8px;
    line-height: 1.4;
}

.related-date {
    font-size: 11px;
    color: #a0a0a0;
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
    .related-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 768px) {
    .blog-detail-hero {
        padding: 80px 0 40px;
    }

    .blog-detail-hero h1 {
        font-size: 1.8rem;
    }

    .blog-detail-meta {
        gap: 15px;
        font-size: 12px;
    }

    .blog-content-card {
        padding: 25px;
    }

    .blog-content p {
        font-size: 15px;
    }

    .related-grid {
        grid-template-columns: 1fr;
    }

    .author-section {
        flex-direction: column;
        text-align: center;
    }

    .container {
        padding: 0 20px;
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
<section class="blog-detail-hero " style="margin-top: 83px">
    <h1>{{ ucfirst($blog->title) }}</h1>
    <div class="blog-detail-meta">
        <span><i class="fas fa-calendar-alt"></i> {{ dateformat($blog->created_at) }}</span>
        <span><i class="fas fa-user"></i> {{ $blog->author ?? 'Admin' }}</span>
        <span><i class="fas fa-clock"></i> {{ $readTime }} min read</span>
        @if(isset($blog->category) && $blog->category)
        <span><i class="fas fa-tag"></i> {{ ucfirst($blog->category) }}</span>
        @endif
    </div>
</section>

<!-- ========== BLOG DETAIL SECTION ========== -->
<section class="blog-detail-section">
    <div class="container">
        @if(!empty($blog->image))
        <div class="blog-featured">
            <img src="{{ asset(Storage::url($blog->image)) }}" alt="{{ $blog->title }}">
        </div>
        @endif

        <div class="blog-content-card">
            <div class="blog-content">
                {!! $blog->content !!}
            </div>

            <div class="share-section">
                <h4>Share this article</h4>
                <div class="share-links">
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}" target="_blank" class="share-link">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->fullUrl()) }}&text={{ urlencode($blog->title) }}" target="_blank" class="share-link">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(request()->fullUrl()) }}&title={{ urlencode($blog->title) }}" target="_blank" class="share-link">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a href="https://wa.me/?text={{ urlencode($blog->title . ' - ' . request()->fullUrl()) }}" target="_blank" class="share-link">
                        <i class="fab fa-whatsapp"></i>
                    </a>
                    <a href="mailto:?subject={{ $blog->title }}&body={{ urlencode(request()->fullUrl()) }}" class="share-link">
                        <i class="fas fa-envelope"></i>
                    </a>
                </div>
                <a href="{{ $blogUrl }}" class="back-btn">
                    <i class="fas fa-arrow-left"></i> Back to Blog
                </a>
            </div>
        </div>

        <div class="author-section">
            <div class="author-avatar">
                <i class="fas fa-user-edit"></i>
            </div>
            <div class="author-info">
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
        <div class="related-posts">
            <h3>You Might Also Like</h3>
            <div class="related-grid">
                @foreach($relatedPosts as $related)
                    @php
                        $relatedUrl = $isCustomDomain
                            ? route('custom.domain.blog.detail', ['slug' => $related->slug])
                            : route('blog.detail', ['code' => $user->code, 'slug' => $related->slug]);
                    @endphp
                    <a href="{{ $relatedUrl }}" class="related-card">
                        @if(!empty($related->image))
                        <img src="{{ asset(Storage::url($related->image)) }}" alt="{{ $related->title }}">
                        @else
                        <img src="https://placehold.co/400x200/2a2a2a/666?text=No+Image" alt="{{ $related->title }}">
                        @endif
                        <div class="related-content">
                            <h4>{{ \Illuminate\Support\Str::limit($related->title, 50) }}</h4>
                            <span class="related-date"><i class="fas fa-calendar-alt"></i> {{ dateformat($related->created_at) }}</span>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
        @endif
    </div>
</section>

@endsection
