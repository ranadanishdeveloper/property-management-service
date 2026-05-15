@extends('theme2.main')
@section('content')

@php
    $blogImage = !empty($blog->image) ? $blog->image : 'default.png';
@endphp

<section class="theme2-blog-detail-section">
    <div class="theme2-container">
        <!-- Blog Header -->
        <div class="theme2-blog-detail-header">
            <div class="theme2-breadcrumb">
                <a href="{{ route('custom.domain.blog', ['code' => $user->code]) }}">{{ __('Blog') }}</a>
                <span class="separator">/</span>
                <span class="current">{{ ucfirst($blog->title) }}</span>
            </div>

            <h1 class="theme2-blog-detail-title">{{ ucfirst($blog->title) }}</h1>

            <div class="theme2-blog-detail-meta">
                <div class="meta-item">
                    <i class="fas fa-calendar-alt"></i>
                    <span>{{ dateformat($blog->created_at) }}</span>
                </div>
                <div class="meta-item">
                    <i class="fas fa-user"></i>
                    <span>{{ __('Admin') }}</span>
                </div>
                <div class="meta-item">
                    <i class="fas fa-clock"></i>
                    <span>{{ __('5 min read') }}</span>
                </div>
            </div>
        </div>

        <!-- Blog Featured Image -->
        <div class="theme2-blog-detail-image">
            <img src="{{ Storage::url($blog->image) }}" alt="{{ $blog->title }}">
        </div>

        <!-- Blog Content -->
        <div class="theme2-blog-detail-content">
            <div class="theme2-blog-content-wrapper">
                {!! $blog->content !!}
            </div>
        </div>

        <!-- Blog Footer - Share -->
        <div class="theme2-blog-detail-footer">
            <div class="theme2-share-section">
                <h4 class="theme2-share-title">{{ __('Share this article:') }}</h4>
                <div class="theme2-share-links">
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
        <div class="theme2-back-to-blog">
            <a href="{{ route('custom.domain.blog.home', ['code' => $user->code]) }}" class="theme2-back-btn">
                <i class="fas fa-arrow-left"></i> {{ __('Back to Blog') }}
            </a>
        </div>
    </div>
</section>

@endsection
