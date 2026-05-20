@extends('theme5.main')
@section('content')

<style>
/* ============================================
   THEME 5 - BLOG DETAIL PAGE
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

/* Blog Detail Hero */
.blog-detail-hero {
    padding: 100px 0 40px;
}

/* Blog Header */
.blog-header {
    text-align: center;
    margin-bottom: 40px;
}

.blog-header h1 {
    font-size: 42px;
    font-weight: 800;
    margin-bottom: 16px;
    color: var(--text-dark);
}

.blog-header h1 span {
    color: var(--primary);
}

.blog-meta {
    display: flex;
    justify-content: center;
    gap: 20px;
    margin-top: 20px;
    flex-wrap: wrap;
}

.blog-meta-item {
    display: flex;
    align-items: center;
    gap: 8px;
    color: var(--text-light);
    font-size: 14px;
}

.blog-meta-item i {
    color: var(--primary);
}

/* Blog Image */
.blog-image-wrapper {
    margin-bottom: 40px;
}

.blog-featured-image {
    border-radius: 20px;
    overflow: hidden;
    max-height: 500px;
    background: var(--bg-light);
}

.blog-featured-image img {
    width: 100%;
    height: 100%;
    max-height: 500px;
    object-fit: cover;
}

/* Blog Content */
.blog-content-wrapper {
    max-width: 800px;
    margin: 0 auto;
}

.blog-content-card {
    background: var(--bg-white);
    border: 1px solid var(--border);
    border-radius: 20px;
    padding: 40px;
    transition: all 0.3s;
}

.blog-content-card:hover {
    box-shadow: var(--shadow-md);
}

.blog-content-card p {
    color: var(--text-gray);
    line-height: 1.8;
    margin-bottom: 20px;
    font-size: 16px;
}

.blog-content-card h1,
.blog-content-card h2,
.blog-content-card h3,
.blog-content-card h4 {
    color: var(--text-dark);
    margin: 25px 0 15px;
}

.blog-content-card img {
    max-width: 100%;
    border-radius: 12px;
    margin: 20px 0;
}

/* Blog Footer */
.blog-footer {
    max-width: 800px;
    margin: 40px auto 0;
    padding-top: 30px;
    border-top: 1px solid var(--border);
}

.share-section {
    text-align: center;
}

.share-title {
    font-size: 16px;
    font-weight: 600;
    margin-bottom: 15px;
    color: var(--text-dark);
}

.share-links {
    display: flex;
    justify-content: center;
    gap: 12px;
}

.share-link {
    width: 38px;
    height: 38px;
    background: var(--bg-light);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--text-gray);
    text-decoration: none;
    transition: all 0.2s;
}

.share-link:hover {
    background: var(--primary);
    color: white;
    transform: translateY(-3px);
}

/* Back Button */
.back-button {
    text-align: center;
    margin-top: 40px;
}

.back-btn {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 10px 24px;
    background: var(--bg-white);
    border: 1px solid var(--border);
    border-radius: 40px;
    color: var(--text-dark);
    text-decoration: none;
    transition: all 0.2s;
}

.back-btn i {
    font-size: 12px;
}

.back-btn:hover {
    background: var(--primary-light);
    border-color: var(--primary);
    color: var(--primary);
    transform: translateY(-2px);
}

/* Responsive */
@media (max-width: 768px) {
    .blog-detail-hero {
        padding: 80px 0 30px;
    }

    .blog-header h1 {
        font-size: 28px;
    }

    .blog-meta {
        gap: 12px;
    }

    .blog-content-card {
        padding: 25px;
    }

    .blog-content-card p {
        font-size: 14px;
    }

    .blog-featured-image {
        max-height: 250px;
    }
}
</style>

<!-- ========== BLOG DETAIL SECTION ========== -->
@php
    $isCustomDomain = isset($is_custom_domain) ? $is_custom_domain : (request()->getHost() !== '13.61.10.174' && request()->getHost() !== 'localhost' && request()->getHost() !== '127.0.0.1');

    if ($isCustomDomain) {
        $blogUrl = route('custom.domain.blog');
    } else {
        $blogUrl = route('blog.home', ['code' => $user->code]);
    }
@endphp

<div class="blog-detail-hero">
    <div class="container">
        <!-- Blog Header -->
        <div class="blog-header">
            <h1>{{ ucfirst($blog->title) }}</h1>
            <div class="blog-meta">
                <div class="blog-meta-item"><i class="fas fa-calendar-alt"></i> {{ dateformat($blog->created_at) }}</div>
                <div class="blog-meta-item"><i class="fas fa-user"></i> Admin</div>
                <div class="blog-meta-item"><i class="fas fa-clock"></i> {{ __('5 min read') }}</div>
            </div>
        </div>

        <!-- Blog Image -->
        <div class="blog-image-wrapper">
            <div class="blog-featured-image">
                <img src="{{ Storage::url($blog->image) }}" alt="{{ $blog->title }}">
            </div>
        </div>

        <!-- Blog Content -->
        <div class="blog-content-wrapper">
            <div class="blog-content-card">
                {!! $blog->content !!}
            </div>

            <!-- Blog Footer - Share -->
            <div class="blog-footer">
                <div class="share-section">
                    <h4 class="share-title">Share this article:</h4>
                    <div class="share-links">
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}" target="_blank" class="share-link">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->fullUrl()) }}" target="_blank" class="share-link">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(request()->fullUrl()) }}" target="_blank" class="share-link">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a href="mailto:?subject={{ $blog->title }}&body={{ urlencode(request()->fullUrl()) }}" class="share-link">
                            <i class="fas fa-envelope"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Back to Blog Button -->
            <div class="back-button">
                <a href="{{ $blogUrl }}" class="back-btn">
                    <i class="fas fa-arrow-left"></i> Back to Blog
                </a>
            </div>
        </div>
    </div>
</div>

@endsection
