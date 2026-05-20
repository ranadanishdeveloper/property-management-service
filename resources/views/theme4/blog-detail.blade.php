@extends('theme4.main')
@section('content')

<style>
/* ============================================
   BLOG DETAIL - SAME DARK THEME AS INDEX
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

/* Blog Detail Hero */
.blog-detail-hero {
    padding: 120px 0 40px;
}

/* Blog Header */
.blog-header {
    text-align: center;
    margin-bottom: 40px;
    animation: fadeInUp 0.8s ease;
}

.blog-header h1 {
    font-size: 48px;
    font-weight: 800;
    margin-bottom: 16px;
    background: linear-gradient(135deg, #fff, #a855f7, #6366f1);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}

.blog-meta {
    display: flex;
    justify-content: center;
    gap: 25px;
    margin-top: 20px;
    flex-wrap: wrap;
}

.blog-meta-item {
    display: flex;
    align-items: center;
    gap: 8px;
    color: #94a3b8;
    font-size: 14px;
}

.blog-meta-item i {
    color: #6366f1;
}

/* Blog Image */
.blog-image-wrapper {
    margin-bottom: 40px;
    animation: fadeInUp 0.8s ease 0.1s both;
}

.blog-featured-image {
    border-radius: 24px;
    overflow: hidden;
    max-height: 500px;
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
    background: linear-gradient(135deg, rgba(255,255,255,0.03), rgba(255,255,255,0.01));
    border: 1px solid rgba(255, 255, 255, 0.05);
    border-radius: 24px;
    padding: 40px;
    transition: all 0.3s;
}

.blog-content-card:hover {
    border-color: rgba(99, 102, 241, 0.3);
}

.blog-content-card p {
    color: #cbd5e1;
    line-height: 1.8;
    margin-bottom: 20px;
    font-size: 16px;
}

.blog-content-card h1,
.blog-content-card h2,
.blog-content-card h3,
.blog-content-card h4 {
    color: white;
    margin: 25px 0 15px;
}

.blog-content-card img {
    max-width: 100%;
    border-radius: 16px;
    margin: 20px 0;
}

/* Blog Footer */
.blog-footer {
    max-width: 800px;
    margin: 40px auto 0;
    padding-top: 30px;
    border-top: 1px solid rgba(255, 255, 255, 0.08);
}

.share-section {
    text-align: center;
}

.share-title {
    font-size: 16px;
    font-weight: 600;
    margin-bottom: 15px;
    color: white;
}

.share-links {
    display: flex;
    justify-content: center;
    gap: 15px;
}

.share-link {
    width: 40px;
    height: 40px;
    background: rgba(255, 255, 255, 0.05);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    text-decoration: none;
    transition: all 0.3s;
}

.share-link:hover {
    background: linear-gradient(135deg, #6366f1, #a855f7);
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
    gap: 10px;
    padding: 12px 28px;
    background: rgba(255, 255, 255, 0.05);
    border: 1px solid rgba(255, 255, 255, 0.1);
    border-radius: 50px;
    color: white;
    text-decoration: none;
    transition: all 0.3s;
}

.back-btn:hover {
    background: rgba(99, 102, 241, 0.2);
    border-color: #6366f1;
    transform: translateY(-2px);
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
@media (max-width: 768px) {
    .blog-detail-hero {
        padding: 100px 0 30px;
    }

    .blog-header h1 {
        font-size: 32px;
    }

    .blog-meta {
        gap: 15px;
    }

    .blog-content-card {
        padding: 25px;
    }

    .blog-content-card p {
        font-size: 14px;
    }

    .blog-featured-image {
        max-height: 300px;
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
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}" target="_blank" class="share-link facebook">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->fullUrl()) }}" target="_blank" class="share-link twitter">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(request()->fullUrl()) }}" target="_blank" class="share-link linkedin">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a href="mailto:?subject={{ $blog->title }}&body={{ urlencode(request()->fullUrl()) }}" class="share-link email">
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
