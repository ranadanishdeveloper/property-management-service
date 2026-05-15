@extends('theme.main')
@section('content')
    <section class="our-blog pt-0">
        <div class="container">
            <div class="row">

            </div>
        </div>
    </section>

    @if (!empty($blog->image))
        @php $image = $blog->image; @endphp
    @else
        @php $image = 'default.png'; @endphp
    @endif

    <section class="our-blog pt40">
        <div class="container">
            <div class="row wow fadeInUp" data-wow-delay="100ms">
                <div class="col-lg-12">
                    <h2 class="blog-title">{{ ucfirst($blog->title) }}</h2>
                    <div class="blog-single-meta">
                        <div class="post-author d-sm-flex align-items-center">
                            <a class="body-light-color" href="">{{ dateformat($blog['created_at']) }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mx-auto maxw1600 mt40 wow fadeInUp" data-wow-delay="300ms">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-8">
                    <div class="large-thumb"
                        style="background-image: url({{ Storage::url($blog->image) }}); background-size: cover; background-position: center; min-height: 400px;">

                    </div>
                </div>
            </div>
        </div>
        <div class="container mt20">
            <div class="row wow fadeInUp" data-wow-delay="500ms">
                <div class="col-xl-8 offset-xl-2">
                    <div class="blockquote-style1 mb60 ui-content">
                        <blockquote class="blockquote">
                            <p class="fst-italic fz15 fw500 ff-heading dark-color">{!! $blog->content !!}</p>
                        </blockquote>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
