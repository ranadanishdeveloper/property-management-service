@extends('theme6.main')
@section('content')

<style>
/* ============================================
   THEME 6 - BLOG PAGE
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
    --shadow-lg: 0 20px 40px rgba(0,0,0,0.1);
    --shadow-hover: 0 25px 50px -12px rgba(0,0,0,0.15);
}

/* ========== UNIFIED CONTAINER ========== */
.theme6-container {
    max-width: 1280px;
    margin: 0 auto;
    padding: 0 28px;
    width: 100%;
}

/* ========== BLOG HERO SECTION ========== */
.blog-hero {
    padding: 140px 0 70px;
    background: linear-gradient(135deg, #fff8f5 0%, #ffffff 100%);
    text-align: center;
    position: relative;
    overflow: hidden;
}

.blog-hero::before {
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

.blog-hero h1 {
    font-size: 52px;
    font-weight: 800;
    margin-bottom: 16px;
    position: relative;
    z-index: 2;
}

.blog-hero h1 span {
    background: linear-gradient(135deg, var(--primary), var(--primary-dark));
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}

.blog-hero p {
    font-size: 18px;
    color: var(--gray);
    max-width: 600px;
    margin: 0 auto;
    position: relative;
    z-index: 2;
}

/* ========== BLOG SECTION ========== */
.blog-section {
    padding: 60px 0 80px;
    background: var(--light);
}

/* ========== BLOG GRID ========== */
.blog-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 30px;
    margin-bottom: 50px;
}

/* ========== BLOG CARD ========== */
.blog-card {
    background: var(--white);
    border-radius: 24px;
    overflow: hidden;
    transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    box-shadow: var(--shadow);
    position: relative;
}

.blog-card:hover {
    transform: translateY(-8px);
    box-shadow: var(--shadow-hover);
}

.blog-image {
    height: 240px;
    overflow: hidden;
    position: relative;
    background: var(--light);
}

.blog-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.5s ease;
}

.blog-card:hover .blog-image img {
    transform: scale(1.05);
}

.blog-date {
    position: absolute;
    bottom: 15px;
    left: 15px;
    background: linear-gradient(135deg, var(--primary), var(--primary-dark));
    color: white;
    padding: 8px 14px;
    border-radius: 16px;
    text-align: center;
    min-width: 65px;
    box-shadow: 0 4px 12px rgba(255,107,74,0.3);
    z-index: 2;
}

.blog-date .day {
    font-size: 20px;
    font-weight: 800;
    line-height: 1;
}

.blog-date .month {
    font-size: 10px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.blog-category {
    position: absolute;
    top: 15px;
    right: 15px;
    background: rgba(0,0,0,0.7);
    backdrop-filter: blur(4px);
    color: white;
    padding: 5px 14px;
    border-radius: 20px;
    font-size: 11px;
    font-weight: 600;
    letter-spacing: 0.5px;
    z-index: 2;
}

.blog-content {
    padding: 24px;
}

.blog-meta {
    display: flex;
    gap: 20px;
    font-size: 12px;
    color: var(--gray);
    margin-bottom: 12px;
}

.blog-meta i {
    color: var(--primary);
    margin-right: 5px;
    font-size: 11px;
}

.blog-content h3 {
    font-size: 20px;
    font-weight: 700;
    margin-bottom: 12px;
    line-height: 1.4;
}

.blog-content h3 a {
    color: var(--dark);
    text-decoration: none;
    transition: color 0.2s;
}

.blog-content h3 a:hover {
    color: var(--primary);
}

.blog-excerpt {
    font-size: 14px;
    color: var(--gray);
    line-height: 1.6;
    margin-bottom: 20px;
}

.blog-readmore {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    color: var(--primary);
    text-decoration: none;
    font-weight: 600;
    font-size: 13px;
    transition: all 0.3s;
}

.blog-readmore i {
    font-size: 11px;
    transition: transform 0.3s;
}

.blog-readmore:hover {
    gap: 12px;
    color: var(--primary-dark);
}

.blog-readmore:hover i {
    transform: translateX(3px);
}

/* ========== PAGINATION ========== */
.pagination-modern {
    display: flex;
    justify-content: center;
    gap: 10px;
    margin-top: 20px;
    flex-wrap: wrap;
}

.pagination-modern .page-item {
    list-style: none;
}

.pagination-modern .page-link {
    width: 44px;
    height: 44px;
    display: flex;
    align-items: center;
    justify-content: center;
    border: 1px solid var(--gray-light);
    border-radius: 14px;
    color: var(--dark);
    text-decoration: none;
    transition: all 0.3s;
    font-weight: 500;
    background: var(--white);
}

.pagination-modern .page-link:hover {
    background: var(--primary);
    border-color: var(--primary);
    color: white;
    transform: translateY(-2px);
}

.pagination-modern .active .page-link {
    background: var(--primary);
    border-color: var(--primary);
    color: white;
}

.pagination-modern .disabled .page-link {
    opacity: 0.5;
    cursor: not-allowed;
}

.pagination-modern .disabled .page-link:hover {
    transform: none;
    background: transparent;
    color: var(--dark);
}

.pagination-info {
    text-align: center;
    color: var(--gray);
    font-size: 13px;
    margin-top: 20px;
}

/* ========== EMPTY STATE ========== */
.empty-blog {
    text-align: center;
    padding: 60px;
    background: var(--white);
    border-radius: 24px;
    grid-column: 1 / -1;
}

.empty-blog i {
    font-size: 60px;
    color: var(--primary);
    opacity: 0.5;
    margin-bottom: 20px;
}

.empty-blog h3 {
    font-size: 24px;
    margin-bottom: 10px;
    color: var(--dark);
}

.empty-blog p {
    color: var(--gray);
}

/* ========== CARD ANIMATIONS ========== */
.blog-card {
    animation: cardFadeUp 0.6s ease forwards;
    opacity: 0;
}

.blog-card:nth-child(1) { animation-delay: 0.05s; }
.blog-card:nth-child(2) { animation-delay: 0.1s; }
.blog-card:nth-child(3) { animation-delay: 0.15s; }
.blog-card:nth-child(4) { animation-delay: 0.2s; }
.blog-card:nth-child(5) { animation-delay: 0.25s; }
.blog-card:nth-child(6) { animation-delay: 0.3s; }

@keyframes cardFadeUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* ========== LOADING SPINNER ========== */
.loading-spinner {
    text-align: center;
    padding: 60px;
}

.loading-spinner i {
    font-size: 40px;
    color: var(--primary);
    animation: spin 1s linear infinite;
}

@keyframes spin {
    from { transform: rotate(0deg); }
    to { transform: rotate(360deg); }
}

/* ========== RESPONSIVE ========== */
@media (max-width: 1024px) {
    .blog-grid {
        grid-template-columns: repeat(2, 1fr);
        gap: 25px;
    }
    
    .blog-hero h1 {
        font-size: 42px;
    }
}

@media (max-width: 768px) {
    .theme6-container {
        padding: 0 20px;
    }
    
    .blog-hero {
        padding: 100px 0 50px;
    }
    
    .blog-hero h1 {
        font-size: 32px;
    }
    
    .blog-hero p {
        font-size: 16px;
    }
    
    .blog-section {
        padding: 40px 0 60px;
    }
    
    .blog-grid {
        grid-template-columns: 1fr;
        gap: 25px;
    }
    
    .blog-image {
        height: 220px;
    }
    
    .blog-content h3 {
        font-size: 18px;
    }
    
    .pagination-modern .page-link {
        width: 38px;
        height: 38px;
        font-size: 13px;
    }
}
</style>

@php
    $Section_0 = App\Models\Additional::where('section', 'Section 0')->where('parent_id', $user->id)->first();
    $Section_0_content_value = !empty($Section_0->content_value) ? json_decode($Section_0->content_value, true) : [];
@endphp

<!-- ========== BLOG HERO SECTION ========== -->
<section class="blog-hero">
    <div class="theme6-container">
        <h1>{{ $Section_0_content_value['title'] ?? 'Our' }} <span>{{ __('Blog') }}</span></h1>
        <p>{{ $Section_0_content_value['sub_title'] ?? 'Insights, tips, and news from the property world' }}</p>
    </div>
</section>

<!-- ========== BLOG SECTION ========== -->
<section class="blog-section">
    <div class="theme6-container">
        <div id="blog-wrapper">
            @include('theme6.blogbox')
        </div>
    </div>
</section>

@endsection

@push('theme6-script')
<script>
$(document).ready(function() {
    // Pagination AJAX
    $(document).on('click', '.pagination-modern .page-link', function(e) {
        e.preventDefault();
        let url = $(this).attr('href');
        
        $.ajax({
            url: url,
            type: 'GET',
            beforeSend: function() {
                $('#blog-wrapper').html('<div class="loading-spinner"><i class="fas fa-spinner fa-spin"></i><p>Loading articles...</p></div>');
            },
            success: function(data) {
                $('#blog-wrapper').html(data);
                window.history.pushState(null, null, url);
                $('html, body').animate({ scrollTop: $('.blog-section').offset().top - 100 }, 500);
            },
            error: function() {
                alert('Something went wrong. Please try again.');
            }
        });
    });
    
    // Search/filter form submission if exists
    $('#blog_filter').on('submit', function(e) {
        e.preventDefault();
        let url = $(this).attr('action');
        let formData = $(this).serialize();
        
        $.ajax({
            url: url,
            type: 'GET',
            data: formData,
            beforeSend: function() {
                $('#blog-wrapper').html('<div class="loading-spinner"><i class="fas fa-spinner fa-spin"></i><p>Loading articles...</p></div>');
            },
            success: function(data) {
                $('#blog-wrapper').html(data);
                window.history.pushState(null, null, url + '?' + formData);
            },
            error: function() {
                alert('Something went wrong.');
            }
        });
    });
});
</script>
@endpush