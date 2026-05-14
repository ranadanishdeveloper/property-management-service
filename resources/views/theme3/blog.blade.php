@extends('theme3.main')
@section('content')

@php
    $Section_0 = App\Models\Additional::where('section', 'Section 0')->where('parent_id', $user->id)->first();
    $Section_0_content_value = !empty($Section_0->content_value)
        ? json_decode($Section_0->content_value, true)
        : [];
@endphp

@if (empty($Section_0_content_value['section_enabled']) || $Section_0_content_value['section_enabled'] == 'active')
    <section class="theme3-blog-hero">
        <div class="theme3-blog-banner" style="background-image: url('{{ asset(Storage::url($Section_0_content_value['banner_image1_path'])) }}');">
            <div class="theme3-blog-overlay"></div>
            <div class="theme3-container">
                <div class="theme3-blog-hero-content">
                    <h2 class="theme3-blog-hero-title">{{ $Section_0_content_value['title'] ?? 'Our Blog' }}</h2>
                    <p class="theme3-blog-hero-text">{{ $Section_0_content_value['sub_title'] ?? 'Latest news and insights' }}</p>
                </div>
            </div>
        </div>
    </section>
@endif

<section class="theme3-blog-section">
    <div class="theme3-container">
        <div class="theme3-blog-header">
            <h2 class="theme3-blog-title">{{ __('Latest Articles') }}</h2>
            <p class="theme3-blog-subtitle">{{ __('Stay updated with our latest news and insights') }}</p>
        </div>

        <div id="blog-wrapper">
            @include('theme3.blogbox')
        </div>
    </div>
</section>

@endsection

@push('theme3-script')
<script>
    $(document).on('click', '.theme3-pagination-list .page-link', function(e) {
        e.preventDefault();
        let url = $(this).attr('href');

        $.ajax({
            url: url,
            type: 'GET',
            beforeSend: function() {
                $('#blog-wrapper').html('<div class="theme3-loading"><div class="loader"></div><p>Loading articles...</p></div>');
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
</script>
@endpush
