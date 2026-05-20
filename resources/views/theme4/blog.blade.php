@extends('theme4.main')
@section('content')

<style>
/* ============================================
   BLOG LISTING - SAME DARK THEME AS INDEX
============================================ */

:root {
    --primary: #6366f1;
    --primary-dark: #4f46e5;
    --secondary: #a855f7;
    --accent: #f59e0b;
    --pink: #ec4899;
    --cyan: #06b6d4;
    --dark: #0a0a0a;
    --darker: #050505;
    --card: rgba(255, 255, 255, 0.03);
    --border: rgba(255, 255, 255, 0.08);
    --glow: 0 0 30px rgba(99, 102, 241, 0.3);
}

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Inter', sans-serif;
    background: var(--darker);
    color: #fff;
    overflow-x: hidden;
}

.container {
    max-width: 1280px;
    margin: 0 auto;
    padding: 0 24px;
}

/* Blog Hero Section */
.blog-hero {
    position: relative;
    padding: 120px 0 60px;
    margin-bottom: 40px;
    overflow: hidden;
}

.blog-hero-content {
    text-align: center;
    animation: fadeInUp 0.8s ease;
}

.blog-hero-badge {
    display: inline-block;
    background: linear-gradient(135deg, rgba(99,102,241,0.2), rgba(168,85,247,0.2));
    padding: 6px 18px;
    border-radius: 30px;
    font-size: 13px;
    margin-bottom: 20px;
}

.blog-hero h1 {
    font-size: 48px;
    font-weight: 800;
    margin-bottom: 16px;
    background: linear-gradient(135deg, #fff, #a855f7, #6366f1);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}

.blog-hero p {
    font-size: 18px;
    color: #94a3b8;
    max-width: 600px;
    margin: 0 auto;
}

/* Blog Grid */
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
    box-shadow: var(--glow);
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

/* Empty State */
.empty-blog {
    text-align: center;
    padding: 60px;
    background: rgba(255, 255, 255, 0.03);
    border-radius: 24px;
}

.empty-blog i {
    font-size: 60px;
    color: #6366f1;
    margin-bottom: 20px;
    opacity: 0.5;
}

.empty-blog h3 {
    font-size: 24px;
    margin-bottom: 10px;
}

/* Animations */
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Responsive */
@media (max-width: 1024px) {
    .blog-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 768px) {
    .blog-hero {
        padding: 100px 0 40px;
    }

    .blog-hero h1 {
        font-size: 32px;
    }

    .blog-grid {
        grid-template-columns: 1fr;
    }

    .blog-image {
        height: 200px;
    }
}
</style>

<!-- ========== BLOG HERO SECTION ========== -->
@php
    $Section_0 = App\Models\Additional::where('section', 'Section 0')->where('parent_id', $user->id)->first();
    $Section_0_content_value = !empty($Section_0->content_value)
        ? json_decode($Section_0->content_value, true)
        : [];

    $isCustomDomain = isset($is_custom_domain) ? $is_custom_domain : (request()->getHost() !== '13.61.10.174' && request()->getHost() !== 'localhost' && request()->getHost() !== '127.0.0.1');
@endphp

@if (empty($Section_0_content_value['section_enabled']) || $Section_0_content_value['section_enabled'] == 'active')
<section class="blog-hero">
    <div class="container">
        <div class="blog-hero-content">
            <div class="blog-hero-badge">📝 LATEST STORIES</div>
            <h1>{{ $Section_0_content_value['title'] ?? 'Our Blog' }}</h1>
            <p>{{ $Section_0_content_value['sub_title'] ?? 'Insights, tips, and news from the property world' }}</p>
        </div>
    </div>
</section>
@endif

<!-- ========== BLOG GRID SECTION ========== -->
<section class="blog-section" style="padding: 0 0 60px;">
    <div class="container">
        <div id="blog-wrapper">
            @include('theme4.blogbox')
        </div>
    </div>
</section>

@endsection

@push('theme4-script')
<script>
$(document).ready(function() {
    // Pagination via AJAX
    $(document).on('click', '.pagination-blog .page-link', function(e) {
        e.preventDefault();
        let url = $(this).attr('href');

        $.ajax({
            url: url,
            type: 'GET',
            beforeSend: function() {
                $('#blog-wrapper').html('<div class="text-center py-5"><i class="fas fa-spinner fa-spin fa-2x"></i><p class="mt-3">Loading posts...</p></div>');
            },
            success: function(data) {
                $('#blog-wrapper').html(data);
                window.history.pushState(null, null, url);
                $('html, body').animate({ scrollTop: $('#blog-wrapper').offset().top - 100 }, 500);
            },
            error: function() {
                alert('Something went wrong.');
            }
        });
    });
});
</script>
@endpush
