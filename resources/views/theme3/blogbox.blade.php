@if(isset($blogs) && count($blogs) > 0)
    <div class="theme3-blog-grid">
        @foreach ($blogs as $blog)
            @php
                $blogImage = !empty($blog->image) ? $blog->image : 'default.png';
            @endphp
            <div class="theme3-blog-card">
                <div class="theme3-blog-image">
                    <a href="{{ route('blog.detail', ['code' => $user->code, 'slug' => $blog->slug]) }}">
                        <img src="{{ asset(Storage::url('upload/blog/image/' . $blogImage)) }}" alt="{{ $blog->title }}">
                    </a>
                    <div class="theme3-blog-date">
                        <span class="date-day">{{ date('d', strtotime($blog->created_at)) }}</span>
                        <span class="date-month">{{ date('M', strtotime($blog->created_at)) }}</span>
                    </div>
                </div>
                <div class="theme3-blog-content">
                    <div class="theme3-blog-meta">
                        <span><i class="fas fa-calendar-alt"></i> {{ dateformat($blog->created_at) }}</span>
                        <span><i class="fas fa-user"></i> Admin</span>
                    </div>
                    <h3 class="theme3-blog-card-title">
                        <a href="{{ route('blog.detail', ['code' => $user->code, 'slug' => $blog->slug]) }}">
                            {{ $blog->title }}
                        </a>
                    </h3>
                    <p class="theme3-blog-excerpt">
                        {{ \Illuminate\Support\Str::limit(strip_tags($blog->content), 80, '...') }}
                    </p>
                    <a href="{{ route('blog.detail', ['code' => $user->code, 'slug' => $blog->slug]) }}" class="theme3-blog-readmore">
                        {{ __('Read More') }} <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Pagination -->
    @if($blogs->hasPages())
        <div class="theme3-pagination-wrapper">
            <ul class="theme3-pagination-list">
                @if ($blogs->onFirstPage())
                    <li class="disabled"><span><i class="fas fa-angle-left"></i></span></li>
                @else
                    <li><a href="{{ $blogs->previousPageUrl() }}" class="page-link"><i class="fas fa-angle-left"></i></a></li>
                @endif

                @foreach ($blogs->links()->elements[0] as $page => $url)
                    @if (is_string($page))
                        <li class="disabled"><span>{{ $page }}</span></li>
                    @else
                        <li class="{{ $page == $blogs->currentPage() ? 'active' : '' }}">
                            <a href="{{ $url }}" class="page-link">{{ $page }}</a>
                        </li>
                    @endif
                @endforeach

                @if ($blogs->hasMorePages())
                    <li><a href="{{ $blogs->nextPageUrl() }}" class="page-link"><i class="fas fa-angle-right"></i></a></li>
                @else
                    <li class="disabled"><span><i class="fas fa-angle-right"></i></span></li>
                @endif
            </ul>

            <p class="theme3-pagination-info">
                {{ ($blogs->currentPage() - 1) * $blogs->perPage() + 1 }} –
                {{ min($blogs->currentPage() * $blogs->perPage(), $blogs->total()) }}
                of {{ $blogs->total() }} blog{{ $blogs->total() > 1 ? 's' : '' }} available
            </p>
        </div>
    @endif
@else
    <div class="theme3-no-blogs">
        <i class="fas fa-newspaper"></i>
        <h3>{{ __('No Blogs Found') }}</h3>
        <p>{{ __('No blog articles available at the moment.') }}</p>
    </div>
@endif
