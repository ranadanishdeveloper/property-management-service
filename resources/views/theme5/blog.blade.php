@extends('theme5.main')
@section('content')

<style>
/* ============================================
   THEME 5 - BLOG LISTING PAGE
   Light & Modern Design Matching Index
============================================ */

:root {
    --primary: #3b82f6;
    --primary-light: #eff6ff;
    --primary-dark: #2563eb;
    --text-dark: #0f172a;
    --text-gray: #475569;
    --text-light: #64748b;
    --bg-white: #ffffff;
    --bg-light: #f8fafc;
    --border: #e2e8f0;
    --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
    --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
    --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.05);
}

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Inter', sans-serif;
    background: var(--bg-white);
    color: var(--text-dark);
}

.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 24px;
}

/* Blog Hero Section */
.blog-hero {
    padding: 100px 0 60px;
    background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 100%);
}

.blog-hero-content {
    text-align: center;
}

.blog-hero-badge {
    display: inline-block;
    background: var(--primary-light);
    padding: 6px 16px;
    border-radius: 30px;
    font-size: 12px;
    margin-bottom: 20px;
    color: var(--primary);
}

.blog-hero h1 {
    font-size: 42px;
    font-weight: 800;
    margin-bottom: 16px;
    color: var(--text-dark);
}

.blog-hero h1 span {
    color: var(--primary);
}

.blog-hero p {
    font-size: 16px;
    color: var(--text-gray);
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
    background: var(--bg-white);
    border: 1px solid var(--border);
    border-radius: 20px;
    overflow: hidden;
    transition: all 0.3s;
}

.blog-card:hover {
    transform: translateY(-5px);
    box-shadow: var(--shadow-lg);
    border-color: var(--primary);
}

.blog-image {
    position: relative;
    height: 200px;
    overflow: hidden;
    background: var(--bg-light);
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
    background: var(--primary);
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
    color: var(--text-light);
}

.blog-meta i {
    margin-right: 4px;
    color: var(--primary);
}

.blog-content h3 {
    font-size: 18px;
    margin-bottom: 10px;
    line-height: 1.4;
}

.blog-content h3 a {
    color: var(--text-dark);
    text-decoration: none;
    transition: color 0.2s;
}

.blog-content h3 a:hover {
    color: var(--primary);
}

.blog-excerpt {
    font-size: 13px;
    color: var(--text-gray);
    line-height: 1.5;
    margin-bottom: 15px;
}

.blog-readmore {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    font-size: 13px;
    font-weight: 500;
    color: var(--primary);
    text-decoration: none;
    transition: all 0.2s;
}

.blog-readmore i {
    font-size: 11px;
    transition: transform 0.2s;
}

.blog-readmore:hover {
    gap: 10px;
    color: var(--primary-dark);
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
    border: 1px solid var(--border);
    border-radius: 10px;
    color: var(--text-dark);
    text-decoration: none;
    transition: all 0.2s;
    font-size: 14px;
    font-weight: 500;
}

.pagination-blog .page-link:hover {
    background: var(--primary-light);
    border-color: var(--primary);
    color: var(--primary);
}

.pagination-blog .active .page-link {
    background: var(--primary);
    border-color: var(--primary);
    color: white;
}

.pagination-blog .disabled .page-link {
    opacity: 0.5;
    cursor: not-allowed;
}

.pagination-info {
    text-align: center;
    color: var(--text-light);
    font-size: 13px;
    margin-top: 16px;
}

/* Empty State */
.empty-blog {
    text-align: center;
    padding: 60px;
    background: var(--bg-light);
    border-radius: 20px;
    grid-column: 1 / -1;
}

.empty-blog i {
    font-size: 48px;
    color: var(--primary);
    opacity: 0.5;
    margin-bottom: 16px;
}

.empty-blog h3 {
    font-size: 20px;
    margin-bottom: 8px;
    color: var(--text-dark);
}

.empty-blog p {
    color: var(--text-light);
}

/* Responsive */
@media (max-width: 1024px) {
    .blog-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 768px) {
    .blog-hero {
        padding: 80px 0 40px;
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
            <h1>{{ $Section_0_content_value['title'] ?? 'Our' }} <span>{{ __('Blog') }}</span></h1>
            <p>{{ $Section_0_content_value['sub_title'] ?? 'Insights, tips, and news from the property world' }}</p>
        </div>
    </div>
</section>
@endif

<!-- ========== BLOG GRID SECTION ========== -->
<section class="blog-section" style="padding: 40px 0 60px;">
    <div class="container">
        <div id="blog-wrapper">
            @include('theme5.blogbox')
        </div>
    </div>
</section>

@endsection

@push('theme5-script')
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
