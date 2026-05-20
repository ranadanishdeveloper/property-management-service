@extends('theme6.main')
@section('content')

<style>
/* ============================================
   THEME 6 - BLOG DETAIL PAGE
   Modern Magazine Style with Unified Container
=========================================== */

:root {
    --primary: #ff6b4a;
    --primary-dark: #e85d3e;
    --primary-soft: rgba(255,107,74,0.1);
    --dark: #1a1a2e;
    --gray: #6c757d;
    --gray-light: #e8e8e8;
    --light: #f8f9fa;
    --white: #ffffff;
    --shadow: 0 10px 30px rgba(0,0,0,0.05);
    --shadow-lg: 0 20px 40px rgba(0,0,0,0.08);
    --shadow-xl: 0 30px 60px rgba(0,0,0,0.1);
}

/* ========== UNIFIED CONTAINER ========== */
.theme6-container {
    max-width: 1280px;
    margin: 0 auto;
    padding: 0 28px;
    width: 100%;
}

/* ========== BLOG DETAIL HERO ========== */
.blog-detail-hero {
    padding: 140px 0 50px;
    background: linear-gradient(135deg, #fff8f5 0%, #ffffff 100%);
    text-align: center;
    position: relative;
    overflow: hidden;
}

.blog-detail-hero::before {
    content: '';
    position: absolute;
    top: -30%;
    right: -20%;
    width: 60%;
    height: 150%;
    background: radial-gradient(circle, rgba(255,107,74,0.08), transparent);
    border-radius: 50%;
    animation: floatBg 20s ease-in-out infinite;
}

@keyframes floatBg {
    0%, 100% { transform: translate(0, 0) rotate(0deg); }
    50% { transform: translate(-20px, -20px) rotate(5deg); }
}

.blog-detail-hero h1 {
    font-size: 48px;
    font-weight: 800;
    max-width: 900px;
    margin: 0 auto 20px;
    position: relative;
    z-index: 2;
    line-height: 1.2;
    background: linear-gradient(135deg, var(--dark), var(--primary));
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}

.blog-meta {
    display: flex;
    justify-content: center;
    gap: 30px;
    color: var(--gray);
    font-size: 14px;
    position: relative;
    z-index: 2;
    flex-wrap: wrap;
}

.blog-meta i {
    color: var(--primary);
    margin-right: 6px;
}

/* ========== BLOG DETAIL SECTION ========== */
.blog-detail-section {
    padding: 40px 0 80px;
    background: var(--light);
}

/* ========== FEATURED IMAGE ========== */
.blog-featured-image {
    border-radius: 28px;
    overflow: hidden;
    margin-bottom: 50px;
    box-shadow: var(--shadow-lg);
    max-height: 550px;
    position: relative;
}

.blog-featured-image img {
    width: 100%;
    max-height: 550px;
    object-fit: cover;
    transition: transform 0.5s ease;
}

.blog-featured-image:hover img {
    transform: scale(1.02);
}

/* ========== BLOG CONTENT CARD ========== */
.blog-content-card {
    max-width: 900px;
    margin: 0 auto;
    background: var(--white);
    border-radius: 28px;
    padding: 50px;
    box-shadow: var(--shadow);
    transition: all 0.3s;
}

.blog-content-card:hover {
    box-shadow: var(--shadow-xl);
}

.blog-content {
    line-height: 1.8;
}

.blog-content p {
    margin-bottom: 24px;
    color: var(--gray);
    font-size: 16px;
    line-height: 1.8;
}

.blog-content h2 {
    font-size: 28px;
    font-weight: 700;
    margin: 35px 0 20px;
    color: var(--dark);
}

.blog-content h3 {
    font-size: 22px;
    font-weight: 600;
    margin: 30px 0 15px;
    color: var(--dark);
}

.blog-content h4 {
    font-size: 18px;
    font-weight: 600;
    margin: 25px 0 12px;
    color: var(--dark);
}

.blog-content img {
    max-width: 100%;
    border-radius: 16px;
    margin: 20px 0;
}

.blog-content blockquote {
    background: var(--primary-soft);
    border-left: 4px solid var(--primary);
    padding: 20px 30px;
    margin: 25px 0;
    border-radius: 16px;
    font-style: italic;
    color: var(--dark);
}

.blog-content ul, 
.blog-content ol {
    margin: 15px 0 15px 25px;
    color: var(--gray);
}

.blog-content li {
    margin-bottom: 8px;
}

/* ========== SHARE SECTION ========== */
.share-section {
    text-align: center;
    margin-top: 50px;
    padding-top: 40px;
    border-top: 1px solid var(--gray-light);
}

.share-section h4 {
    font-size: 18px;
    font-weight: 600;
    margin-bottom: 20px;
    color: var(--dark);
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
    background: var(--light);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--dark);
    text-decoration: none;
    transition: all 0.3s;
    font-size: 18px;
}

.share-link:hover {
    background: var(--primary);
    color: white;
    transform: translateY(-3px);
}

.back-btn {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    color: var(--primary);
    text-decoration: none;
    font-weight: 600;
    transition: all 0.3s;
    font-size: 14px;
}

.back-btn i {
    transition: transform 0.3s;
}

.back-btn:hover {
    gap: 12px;
    color: var(--primary-dark);
}

.back-btn:hover i {
    transform: translateX(-3px);
}

/* ========== AUTHOR SECTION ========== */
.author-section {
    max-width: 900px;
    margin: 40px auto 0;
    background: var(--light);
    border-radius: 20px;
    padding: 30px;
    display: flex;
    align-items: center;
    gap: 20px;
    flex-wrap: wrap;
}

.author-avatar {
    width: 80px;
    height: 80px;
    background: var(--primary);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 32px;
}

.author-info h4 {
    font-size: 18px;
    font-weight: 700;
    margin-bottom: 5px;
}

.author-info p {
    font-size: 13px;
    color: var(--gray);
    margin-bottom: 8px;
}

/* ========== RELATED POSTS ========== */
.related-posts {
    max-width: 900px;
    margin: 50px auto 0;
}

.related-posts h3 {
    font-size: 24px;
    font-weight: 700;
    margin-bottom: 25px;
    text-align: center;
}

.related-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 25px;
}

.related-card {
    background: var(--white);
    border-radius: 18px;
    overflow: hidden;
    transition: all 0.3s;
    box-shadow: var(--shadow);
    text-decoration: none;
}

.related-card:hover {
    transform: translateY(-5px);
    box-shadow: var(--shadow-lg);
}

.related-card img {
    width: 100%;
    height: 140px;
    object-fit: cover;
}

.related-card .related-content {
    padding: 15px;
}

.related-card h4 {
    font-size: 15px;
    font-weight: 600;
    color: var(--dark);
    margin-bottom: 8px;
    line-height: 1.4;
}

.related-card .related-date {
    font-size: 11px;
    color: var(--gray);
}

/* ========== RESPONSIVE ========== */
@media (max-width: 1024px) {
    .related-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 768px) {
    .theme6-container {
        padding: 0 20px;
    }
    
    .blog-detail-hero {
        padding: 100px 0 40px;
    }
    
    .blog-detail-hero h1 {
        font-size: 28px;
    }
    
    .blog-meta {
        gap: 15px;
        font-size: 12px;
    }
    
    .blog-content-card {
        padding: 25px;
    }
    
    .blog-featured-image {
        border-radius: 20px;
        margin-bottom: 30px;
    }
    
    .blog-content p {
        font-size: 15px;
    }
    
    .blog-content h2 {
        font-size: 22px;
    }
    
    .related-grid {
        grid-template-columns: 1fr;
    }
    
    .author-section {
        flex-direction: column;
        text-align: center;
    }
}

@media (max-width: 480px) {
    .share-links {
        gap: 10px;
    }
    
    .share-link {
        width: 38px;
        height: 38px;
        font-size: 16px;
    }
}
</style>

@php
    $isCustomDomain = isset($is_custom_domain) ? $is_custom_domain : (request()->getHost() !== '13.61.10.174' && request()->getHost() !== 'localhost' && request()->getHost() !== '127.0.0.1');
    $blogUrl = $isCustomDomain ? route('custom.domain.blog') : route('blog.home', ['code' => $user->code]);
    
    // Calculate read time (approx 200 words per minute)
    $wordCount = str_word_count(strip_tags($blog->content ?? ''));
    $readTime = max(1, ceil($wordCount / 200));
    
    // FIXED: Remove 'status' column if it doesn't exist
    // Get related posts (excluding current) - without status condition
    $relatedPosts = \App\Models\Blog::where('parent_id', $user->id)
        ->where('id', '!=', $blog->id)
        ->latest()
        ->take(3)
        ->get();
@endphp

<!-- ========== BLOG DETAIL HERO ========== -->
<section class="blog-detail-hero">
    <div class="theme6-container">
        <h1>{{ ucfirst($blog->title) }}</h1>
        <div class="blog-meta">
            <span><i class="fas fa-calendar-alt"></i> {{ dateFormat($blog->created_at) }}</span>
            <span><i class="fas fa-user"></i> {{ $blog->author ?? 'Admin' }}</span>
            <span><i class="fas fa-clock"></i> {{ $readTime }} min read</span>
            @if(isset($blog->category) && $blog->category)
            <span><i class="fas fa-tag"></i> {{ ucfirst($blog->category) }}</span>
            @endif
        </div>
    </div>
</section>

<!-- ========== BLOG DETAIL SECTION ========== -->
<section class="blog-detail-section">
    <div class="theme6-container">
        <!-- Featured Image -->
        @if(!empty($blog->image))
        <div class="blog-featured-image">
            <img src="{{ asset(Storage::url($blog->image)) }}" alt="{{ $blog->title }}">
        </div>
        @endif
        
        <!-- Blog Content Card -->
        <div class="blog-content-card">
            <div class="blog-content">
                {!! $blog->content !!}
            </div>
            
            <!-- Share Section -->
            <div class="share-section">
                <h4><i class="fas fa-share-alt"></i> Share this article</h4>
                <div class="share-links">
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}" target="_blank" class="share-link" rel="noopener">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->fullUrl()) }}&text={{ urlencode($blog->title) }}" target="_blank" class="share-link" rel="noopener">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(request()->fullUrl()) }}&title={{ urlencode($blog->title) }}" target="_blank" class="share-link" rel="noopener">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a href="https://wa.me/?text={{ urlencode($blog->title . ' - ' . request()->fullUrl()) }}" target="_blank" class="share-link" rel="noopener">
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
        
        <!-- Author Section -->
        <div class="author-section">
            <div class="author-avatar">
                <i class="fas fa-user-edit"></i>
            </div>
            <div class="author-info">
                <h4>Written by {{ $blog->author ?? 'Admin' }}</h4>
                <p>Property expert with years of experience in real estate market analysis and investment strategies.</p>
                <p style="font-size: 12px; margin-top: 5px;">
                    <i class="fas fa-calendar-alt"></i> Published on {{ dateFormat($blog->created_at) }}
                    @if(isset($blog->updated_at) && $blog->updated_at && $blog->updated_at != $blog->created_at)
                        | Updated on {{ dateFormat($blog->updated_at) }}
                    @endif
                </p>
            </div>
        </div>
        
        <!-- Related Posts -->
        @if($relatedPosts->isNotEmpty())
        <div class="related-posts">
            <h3><i class="fas fa-newspaper"></i> You Might Also Like</h3>
            <div class="related-grid">
                @foreach($relatedPosts as $related)
                    @php
                        $relatedUrl = $isCustomDomain ? route('custom.domain.blog.detail', ['slug' => $related->slug]) : route('blog.detail', ['code' => $user->code, 'slug' => $related->slug]);
                    @endphp
                    <a href="{{ $relatedUrl }}" class="related-card">
                        @if(!empty($related->image))
                        <img src="{{ asset(Storage::url($related->image)) }}" alt="{{ $related->title }}">
                        @else
                        <img src="https://placehold.co/400x200/e8e8e8/ccc?text=No+Image" alt="{{ $related->title }}">
                        @endif
                        <div class="related-content">
                            <h4>{{ \Illuminate\Support\Str::limit($related->title, 50) }}</h4>
                            <span class="related-date"><i class="fas fa-calendar-alt"></i> {{ dateFormat($related->created_at) }}</span>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
        @endif
    </div>
</section>

@endsection

@push('theme6-script')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Add copy to clipboard functionality for share links if needed
    const shareLinks = document.querySelectorAll('.share-link');
    shareLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            // Track share event if needed
            console.log('Shared via:', this.href);
        });
    });
    
    // Smooth scroll for anchor links within content
    document.querySelectorAll('.blog-content a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                e.preventDefault();
                target.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        });
    });
});
</script>
@endpush