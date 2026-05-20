@extends('theme7.main')
@section('content')

<style>
/* ============================================
   THEME 7 - BLOG DETAIL (NEON BRUTALIST - LIGHT VERSION)
   Full Blog Detail with Share, Author, Related Posts
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

/* ========== BLOG DETAIL HERO ========== */
.cyber-blog-hero {
    background: linear-gradient(135deg, #e9ecef 0%, #f8f9fa 100%);
    padding: 120px 0 60px;
    text-align: center;
    border-bottom: 2px solid var(--neon-pink);
}

.cyber-blog-hero h1 {
    font-size: clamp(2rem, 5vw, 3.5rem);
    font-weight: 800;
    max-width: 900px;
    margin: 0 auto 20px;
    color: var(--dark-text);
    line-height: 1.2;
}

.cyber-blog-hero h1 span {
    color: var(--neon-cyan);
}

.cyber-blog-meta {
    display: flex;
    justify-content: center;
    gap: 30px;
    color: var(--gray-text);
    font-size: 14px;
    flex-wrap: wrap;
}

.cyber-blog-meta i {
    color: var(--neon-pink);
    margin-right: 6px;
}

/* ========== BLOG DETAIL SECTION ========== */
.cyber-blog-detail {
    padding: 40px 0 80px;
    background: var(--light-bg);
}

.cyber-blog-featured {
    border: 2px solid var(--neon-pink);
    overflow: hidden;
    margin-bottom: 50px;
    border-radius: 8px;
}

.cyber-blog-featured img {
    width: 100%;
    max-height: 550px;
    object-fit: cover;
    transition: transform 0.4s;
}

.cyber-blog-featured:hover img {
    transform: scale(1.02);
}

.cyber-blog-content-card {
    max-width: 900px;
    margin: 0 auto;
    background: var(--card-bg);
    border: 1px solid var(--neon-cyan);
    padding: 50px;
    border-radius: 8px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.05);
}

.cyber-blog-content {
    line-height: 1.8;
    color: var(--dark-text);
}

.cyber-blog-content p {
    margin-bottom: 24px;
    color: var(--gray-text);
    font-size: 16px;
    line-height: 1.8;
}

.cyber-blog-content h2 {
    font-size: 28px;
    font-weight: 800;
    margin: 35px 0 20px;
    color: var(--neon-cyan);
}

.cyber-blog-content h3 {
    font-size: 22px;
    font-weight: 700;
    margin: 30px 0 15px;
    color: var(--neon-pink);
}

.cyber-blog-content img {
    max-width: 100%;
    border: 1px solid var(--neon-cyan);
    margin: 20px 0;
    border-radius: 8px;
}

.cyber-blog-content blockquote {
    background: rgba(255, 42, 109, 0.08);
    border-left: 4px solid var(--neon-pink);
    padding: 20px 30px;
    margin: 25px 0;
    font-style: italic;
    color: var(--neon-cyan);
    border-radius: 8px;
}

.cyber-blog-content ul,
.cyber-blog-content ol {
    margin: 15px 0 15px 25px;
    color: var(--gray-text);
}

.cyber-blog-content li {
    margin-bottom: 8px;
}

/* ========== SHARE SECTION ========== */
.cyber-share-section {
    text-align: center;
    margin-top: 50px;
    padding-top: 40px;
    border-top: 1px solid rgba(5, 217, 232, 0.2);
}

.cyber-share-section h4 {
    font-size: 18px;
    font-weight: 700;
    margin-bottom: 20px;
    color: var(--dark-text);
}

.cyber-share-links {
    display: flex;
    justify-content: center;
    gap: 15px;
    margin-bottom: 30px;
    flex-wrap: wrap;
}

.cyber-share-link {
    width: 44px;
    height: 44px;
    background: var(--card-bg);
    border: 1px solid var(--neon-pink);
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--neon-pink);
    text-decoration: none;
    transition: all 0.2s;
    border-radius: 8px;
}

.cyber-share-link:hover {
    background: var(--neon-pink);
    color: white;
    border-color: var(--neon-cyan);
    transform: translateY(-3px);
}

.cyber-back-btn {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    color: var(--neon-cyan);
    text-decoration: none;
    font-weight: 700;
    transition: all 0.2s;
    font-size: 14px;
    text-transform: uppercase;
}

.cyber-back-btn i {
    transition: transform 0.2s;
}

.cyber-back-btn:hover {
    gap: 12px;
    color: var(--neon-pink);
}

.cyber-back-btn:hover i {
    transform: translateX(-3px);
}

/* ========== AUTHOR SECTION ========== */
.cyber-author-section {
    max-width: 900px;
    margin: 40px auto 0;
    background: var(--card-bg);
    border: 1px solid var(--neon-pink);
    padding: 30px;
    display: flex;
    align-items: center;
    gap: 20px;
    flex-wrap: wrap;
    border-radius: 8px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.05);
}

.cyber-author-avatar {
    width: 80px;
    height: 80px;
    background: var(--neon-pink);
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 32px;
    border-radius: 50%;
}

.cyber-author-info h4 {
    font-size: 18px;
    font-weight: 700;
    margin-bottom: 5px;
    color: var(--dark-text);
}

.cyber-author-info p {
    font-size: 13px;
    color: var(--gray-text);
    margin-bottom: 8px;
}

/* ========== RELATED POSTS ========== */
.cyber-related-posts {
    max-width: 900px;
    margin: 50px auto 0;
}

.cyber-related-posts h3 {
    font-size: 24px;
    font-weight: 800;
    margin-bottom: 25px;
    text-align: center;
    color: var(--dark-text);
}

.cyber-related-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 25px;
}

.cyber-related-card {
    background: var(--card-bg);
    border: 1px solid var(--neon-cyan);
    transition: all 0.2s;
    text-decoration: none;
    overflow: hidden;
    box-shadow: 0 2px 8px rgba(0,0,0,0.05);
    border-radius: 8px;
}

.cyber-related-card:hover {
    transform: translateY(-5px);
    border-color: var(--neon-pink);
}

.cyber-related-card img {
    width: 100%;
    height: 140px;
    object-fit: cover;
}

.cyber-related-content {
    padding: 15px;
}

.cyber-related-content h4 {
    font-size: 14px;
    font-weight: 700;
    color: var(--dark-text);
    margin-bottom: 8px;
    line-height: 1.4;
}

.cyber-related-date {
    font-size: 11px;
    color: var(--neon-cyan);
}

/* ========== RESPONSIVE ========== */
@media (max-width: 1024px) {
    .cyber-related-grid {
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

    .cyber-blog-hero h1 {
        font-size: 28px;
    }

    .cyber-blog-meta {
        gap: 15px;
        font-size: 12px;
    }

    .cyber-blog-content-card {
        padding: 25px;
    }

    .cyber-blog-featured {
        margin-bottom: 30px;
    }

    .cyber-blog-content p {
        font-size: 15px;
    }

    .cyber-blog-content h2 {
        font-size: 22px;
    }

    .cyber-related-grid {
        grid-template-columns: 1fr;
    }

    .cyber-author-section {
        flex-direction: column;
        text-align: center;
    }
}

@media (max-width: 480px) {
    .cyber-share-links {
        gap: 10px;
    }

    .cyber-share-link {
        width: 38px;
        height: 38px;
        font-size: 16px;
    }
}
</style>

@php
    $isCustomDomain = isset($is_custom_domain) ? $is_custom_domain : (request()->getHost() !== '13.61.10.174' && request()->getHost() !== 'localhost' && request()->getHost() !== '127.0.0.1');
    $blogUrl = $isCustomDomain ? route('custom.domain.blog') : route('blog.home', ['code' => $user->code]);

    // Calculate read time
    $wordCount = str_word_count(strip_tags($blog->content ?? ''));
    $readTime = max(1, ceil($wordCount / 200));

    // Get related posts
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
<section class="cyber-blog-hero">
    <div class="cyber-container">
        <h1>{{ ucfirst($blog->title) }} <span>// ARTICLE</span></h1>
        <div class="cyber-blog-meta">
            <span><i class="fas fa-calendar-alt"></i> {{ dateformat($blog->created_at) }}</span>
            <span><i class="fas fa-user"></i> {{ $blog->author ?? 'ADMIN' }}</span>
            <span><i class="fas fa-clock"></i> {{ $readTime }} MIN READ</span>
            @if(isset($blog->category) && $blog->category)
            <span><i class="fas fa-tag"></i> {{ strtoupper($blog->category) }}</span>
            @endif
        </div>
    </div>
</section>

<!-- ========== BLOG DETAIL SECTION ========== -->
<section class="cyber-blog-detail">
    <div class="cyber-container">
        <!-- Featured Image -->
        @if(!empty($blog->image))
        <div class="cyber-blog-featured">
            <img src="{{ asset(Storage::url($blog->image)) }}" alt="{{ $blog->title }}">
        </div>
        @endif

        <!-- Blog Content Card -->
        <div class="cyber-blog-content-card">
            <div class="cyber-blog-content">
                {!! $blog->content !!}
            </div>

            <!-- Share Section -->
            <div class="cyber-share-section">
                <h4>// SHARE THIS ARTICLE</h4>
                <div class="cyber-share-links">
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}" target="_blank" class="cyber-share-link" rel="noopener">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->fullUrl()) }}&text={{ urlencode($blog->title) }}" target="_blank" class="cyber-share-link" rel="noopener">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(request()->fullUrl()) }}&title={{ urlencode($blog->title) }}" target="_blank" class="cyber-share-link" rel="noopener">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a href="https://wa.me/?text={{ urlencode($blog->title . ' - ' . request()->fullUrl()) }}" target="_blank" class="cyber-share-link" rel="noopener">
                        <i class="fab fa-whatsapp"></i>
                    </a>
                    <a href="mailto:?subject={{ $blog->title }}&body={{ urlencode(request()->fullUrl()) }}" class="cyber-share-link">
                        <i class="fas fa-envelope"></i>
                    </a>
                </div>
                <a href="{{ $blogUrl }}" class="cyber-back-btn">
                    <i class="fas fa-arrow-left"></i> BACK TO BLOG
                </a>
            </div>
        </div>

        <!-- Author Section -->
        <div class="cyber-author-section">
            <div class="cyber-author-avatar">
                <i class="fas fa-user-edit"></i>
            </div>
            <div class="cyber-author-info">
                <h4>WRITTEN BY {{ strtoupper($blog->author ?? 'ADMIN') }}</h4>
                <p>Property expert with years of experience in real estate market analysis and investment strategies.</p>
                <p style="font-size: 12px; margin-top: 5px;">
                    <i class="fas fa-calendar-alt"></i> PUBLISHED ON {{ dateformat($blog->created_at) }}
                    @if(isset($blog->updated_at) && $blog->updated_at && $blog->updated_at != $blog->created_at)
                        | UPDATED ON {{ dateformat($blog->updated_at) }}
                    @endif
                </p>
            </div>
        </div>

        <!-- Related Posts -->
        @if($relatedPosts->isNotEmpty())
        <div class="cyber-related-posts">
            <h3>// YOU MIGHT ALSO LIKE</h3>
            <div class="cyber-related-grid">
                @foreach($relatedPosts as $related)
                    @php
                        $relatedUrl = $isCustomDomain
                            ? route('custom.domain.blog.detail', ['slug' => $related->slug])
                            : route('blog.detail', ['code' => $user->code, 'slug' => $related->slug]);
                    @endphp
                    <a href="{{ $relatedUrl }}" class="cyber-related-card">
                        @if(!empty($related->image))
                        <img src="{{ asset(Storage::url($related->image)) }}" alt="{{ $related->title }}">
                        @else
                        <img src="https://placehold.co/400x200/e9ecef/8a8aaa?text=NO+IMAGE" alt="{{ $related->title }}">
                        @endif
                        <div class="cyber-related-content">
                            <h4>{{ \Illuminate\Support\Str::limit($related->title, 50) }}</h4>
                            <span class="cyber-related-date"><i class="fas fa-calendar-alt"></i> {{ dateformat($related->created_at) }}</span>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
        @endif
    </div>
</section>

@endsection
