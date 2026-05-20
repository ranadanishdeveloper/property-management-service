@extends('theme2.main')
@section('content')
@php
    $isCustomDomain = isset($is_custom_domain) ? $is_custom_domain : (request()->getHost() !== '13.61.10.174' && request()->getHost() !== 'localhost' && request()->getHost() !== '127.0.0.1');
@endphp
    <!-- Home Banner Style V1 - Theme 2 Glassmorphism Style -->
    @php
        $Section_0 = App\Models\FrontHomePage::where('section', 'Section 0')->where('parent_id', $parent_id)->first();
        $Section_0_content_value = !empty($Section_0->content_value)
        ? json_decode($Section_0->content_value, true)
        : [];
    @endphp
    @if (empty($Section_0_content_value['section_enabled']) || $Section_0_content_value['section_enabled'] == 'active')
        <section class="theme2-hero-section">
            <div class="theme2-container">
                <div class="theme2-hero-grid">
                    <div class="theme2-hero-content">
                        <h1 class="theme2-hero-title">{{ $Section_0_content_value['title'] }}</h1>
                        <p class="theme2-hero-text">{{ $Section_0_content_value['sub_title'] }}</p>
                        <a href="{{ $propertiesUrl ?? '#' }}" class="theme2-btn theme2-btn-primary">Explore Properties →</a>
                    </div>
                    <div class="theme2-hero-image">
                        <img class="theme2-glass-img" src="{{ asset(Storage::url($Section_0_content_value['banner_image1_path'])) }}" alt="">
                    </div>
                </div>
            </div>
        </section>
    @endif

    <!-- Need something - Theme 2 -->
    @php
        $Section_1 = App\Models\FrontHomePage::where('section', 'Section 1')->where('parent_id', $parent_id)->first();
        $Section_1_content_value = !empty($Section_1->content_value)
            ? json_decode($Section_1->content_value, true)
            : [];
    @endphp
    @if (empty($Section_1_content_value['section_enabled']) || $Section_1_content_value['section_enabled'] == 'active')
        <section class="theme2-features">
            <div class="theme2-container">
                <div class="theme2-section-header">
                    <h2>{{ $Section_1_content_value['Sec1_title'] }}</h2>
                    <p>{{ $Section_1_content_value['Sec1_info'] }}</p>
                </div>
                <div class="theme2-features-grid">
                    @php $is4_check = 0; @endphp
                    @for ($is4 = 1; $is4 <= 4; $is4++)
                        @if (!empty($Section_1_content_value['Sec1_box' . $is4 . '_enabled']) && $Section_1_content_value['Sec1_box' . $is4 . '_enabled'] == 'active')
                            @php $is4_check++; @endphp
                            <div class="theme2-feature-card">
                                <div class="theme2-feature-icon">
                                    <img src="{{ asset(Storage::url($Section_1_content_value['Sec1_box' . $is4 . '_image_path'])) }}" alt="">
                                </div>
                                <h3>{{ $Section_1_content_value['Sec1_box' . $is4 . '_title'] }}</h3>
                                <p>{{ $Section_1_content_value['Sec1_box' . $is4 . '_info'] }}</p>
                            </div>
                        @endif
                    @endfor
                </div>
            </div>
        </section>
    @endif

    <!-- Funfact - Theme 2 -->
    @php
        $Section_2 = App\Models\FrontHomePage::where('section', 'Section 2')->where('parent_id', $parent_id)->first();
        $Section_2_content_value = !empty($Section_2->content_value)
            ? json_decode($Section_2->content_value, true)
            : [];
    @endphp
    @if (empty($Section_2_content_value['section_enabled']) || $Section_2_content_value['section_enabled'] == 'active')
        <section class="theme2-funfact">
            <div class="theme2-container">
                <div class="theme2-funfact-grid">
                    <div class="theme2-funfact-card">
                        <div class="theme2-funfact-number">{{ $Section_2_content_value['Box1_number'] }}</div>
                        <p>{{ $Section_2_content_value['Box1_title'] }}</p>
                    </div>
                    <div class="theme2-funfact-card">
                        <div class="theme2-funfact-number">{{ $Section_2_content_value['Box2_number'] }}</div>
                        <p>{{ $Section_2_content_value['Box2_title'] }}</p>
                    </div>
                    <div class="theme2-funfact-card">
                        <div class="theme2-funfact-number">{{ $Section_2_content_value['Box3_number'] }}</div>
                        <p>{{ $Section_2_content_value['Box3_title'] }}</p>
                    </div>
                    <div class="theme2-funfact-card">
                        <div class="theme2-funfact-number">{{ $Section_2_content_value['Box4_number'] }}</div>
                        <p>{{ $Section_2_content_value['Box4_title'] }}</p>
                    </div>
                </div>
            </div>
        </section>
    @endif

    <!-- Category / Amenities - Theme 2 -->
<!-- Category / Amenities - Theme 2 -->
@php
    $Section_3 = App\Models\FrontHomePage::where('section', 'Section 3')->where('parent_id', $parent_id)->first();
    $Section_3_content_value = !empty($Section_3->content_value)
        ? json_decode($Section_3->content_value, true)
        : [];
@endphp
@if (empty($Section_3_content_value['section_enabled']) || $Section_3_content_value['section_enabled'] == 'active')
    <section class="theme2-amenities">
        <div class="theme2-container">
            <div class="theme2-section-header">
                <h2>{{ $Section_3_content_value['Sec3_title'] }}</h2>
                <p>{{ $Section_3_content_value['Sec3_info'] }}</p>
            </div>
            @if (isset($allAmenities) && count($allAmenities) > 0)
                <div class="theme2-amenities-slider owl-carousel">
                    @foreach ($allAmenities as $amenity)
                        @php $image = !empty($amenity->image) ? $amenity->image : 'default.png'; @endphp
                        <div class="theme2-amenity-card">
                            <img src="{{ asset(Storage::url('upload/amenity/') . '/' . $image) }}" alt="">
                            <h4>{{ ucfirst($amenity->name) }}</h4>
                            <p>{{ \Illuminate\Support\Str::limit(strip_tags($amenity->description), 50, '...') }}</p>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-center">{{ __('No Amenities Available') }}</p>
            @endif
        </div>
    </section>
@endif

    <!-- CTA Banner - Theme 2 -->
    @php
        $Section_4 = App\Models\FrontHomePage::where('section', 'Section 4')->where('parent_id', $parent_id)->first();
        $Section_4_content_value = !empty($Section_4->content_value)
            ? json_decode($Section_4->content_value, true)
            : [];
    @endphp
    @if (empty($Section_4_content_value['section_enabled']) || $Section_4_content_value['section_enabled'] == 'active')
        <section class="theme2-cta">
            <div class="theme2-container">
                <div class="theme2-cta-content">
                    <h2>{{ $Section_4_content_value['Sec4_title'] ?? '' }}</h2>
                    @if (!empty($Section_4_content_value['Sec4_Box_title']))
                        @foreach ($Section_4_content_value['Sec4_Box_title'] as $sec4_key => $sec4_item)
                            <div class="theme2-cta-item">
                                <h4>{{ $sec4_item ?? '' }}</h4>
                                <p>{{ $Section_4_content_value['Sec4_Box_subtitle'][$sec4_key] ?? '' }}</p>
                            </div>
                        @endforeach
                    @endif
                </div>
                <img src="{{ asset(Storage::url($Section_4_content_value['about_image_path'])) }}" alt="">
            </div>
        </section>
    @endif

   <!-- Popular Services / Properties - Theme 2 (Latest 8 Properties) -->
@php
    $Section_5 = App\Models\FrontHomePage::where('section', 'Section 5')->first();
    $Section_5_content_value = !empty($Section_5->content_value)
        ? json_decode($Section_5->content_value, true)
        : [];

    // Get latest 8 properties directly
    $latestProperties = \App\Models\Property::where('parent_id', $user->id)
        ->latest()
        ->take(8)
        ->get();
@endphp
@if (empty($Section_5_content_value['section_enabled']) || $Section_5_content_value['section_enabled'] == 'active')
    <section class="theme2-properties">
        <div class="theme2-container">
            <div class="theme2-properties-header">
                <h2>{{ $Section_5_content_value['Sec5_title'] ?? 'Featured Properties' }}</h2>
                <p>{{ $Section_5_content_value['Sec5_info'] ?? 'Discover our exclusive collection of premium properties' }}</p>
            </div>

            @if($latestProperties->count() > 0)
                <div class="theme2-property-grid">
                    @foreach ($latestProperties as $property)
                        @php
                            $thumbnail = !empty($property->thumbnail->image) ? $property->thumbnail->image : 'default.jpg';
                        @endphp
                        <div class="theme2-property-card">
                            <div class="theme2-property-image">
                                <img src="{{ asset(Storage::url('upload/property/thumbnail/' . $thumbnail)) }}" alt="{{ $property->name }}">
                                <span class="theme2-property-badge">{{ ucfirst($property->listing_type ?? 'Property') }}</span>
                            </div>
                            <div class="theme2-property-info">
                                <h3>{{ ucfirst($property->name) }}</h3>
                                <p>{{ \Illuminate\Support\Str::limit(strip_tags($property->description ?? ''), 50, '...') }}</p>
                                <div class="theme2-property-meta">
                                    <span class="theme2-property-type">{{ \App\Models\Property::types()[$property->type] ?? ucfirst($property->type) }}</span>
                                    <span class="theme2-property-price">{{ priceFormat($property->price) }}</span>
                                </div>
                                <a href="{{ $isCustomDomain ? route('custom.domain.property.detail', ['id' => \Crypt::encrypt($property->id)]) : route('property.detail', ['code' => $user->code, \Crypt::encrypt($property->id)]) }}" class="theme2-btn-link">View Details →</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-center">{{ __('No Properties Available') }}</p>
            @endif
        </div>
    </section>
@endif

    <!-- Banner 2 - Theme 2 -->
    @php
        $Section_6 = App\Models\FrontHomePage::where('section', 'Section 6')->where('parent_id', $parent_id)->first();
        $Section_6_content_value = !empty($Section_6->content_value)
            ? json_decode($Section_6->content_value, true)
            : [];
    @endphp
    @if (empty($Section_6_content_value['section_enabled']) || $Section_6_content_value['section_enabled'] == 'active')
        <section class="theme2-banner">
            <div class="theme2-container">
                <div class="theme2-banner-content">
                    <h2>{{ $Section_6_content_value['Sec6_title'] }}</h2>
                    <p>{{ $Section_6_content_value['Sec6_info'] }}</p>
                    <a href="{{ $Section_6_content_value['sec6_btn_link'] }}" class="theme2-btn theme2-btn-secondary">
                        {{ $Section_6_content_value['sec6_btn_name'] }} →
                    </a>
                </div>
                <img src="{{ asset(Storage::url($Section_6_content_value['banner_image2_path'])) }}" alt="">
            </div>
        </section>
    @endif

  <!-- Testimonials - Theme 2 -->
@php
    $Section_7 = App\Models\FrontHomePage::where('section', 'Section 7')->where('parent_id', $parent_id)->first();
    $Section_7_content_value = !empty($Section_7->content_value)
        ? json_decode($Section_7->content_value, true)
        : [];
@endphp
@if (empty($Section_7_content_value['section_enabled']) || $Section_7_content_value['section_enabled'] == 'active')
    @php
        $testimonials = [];
        foreach ($Section_7_content_value as $key => $value) {
            if (Str::startsWith($key, 'Sec7_box') && Str::endsWith($key, '_Enabled') && $value === 'active') {
                $boxNumber = str_replace(['Sec7_box', '_Enabled'], '', $key);
                $testimonials[] = $boxNumber;
            }
        }
    @endphp
    <section class="theme2-testimonials">
        <div class="theme2-container">
            <div class="theme2-section-header text-center">
                <h2>{{ $Section_7_content_value['Sec7_title'] ?? '' }}</h2>
                <p>{{ $Section_7_content_value['Sec7_info'] ?? '' }}</p>
            </div>

            @if(count($testimonials) > 0)
                <div class="theme2-testimonial-slider owl-carousel">
                    @foreach ($testimonials as $index => $num)
                        @php
                            $imagePath = $Section_7_content_value["Sec7_box{$num}_image_path"] ?? '';
                        @endphp
                        <div class="theme2-testimonial-card">
                            <div class="theme2-testimonial-content">
                                <img style="width: fit-content; height: 100px;" src="{{ !empty($imagePath) ? asset(Storage::url($imagePath)) : asset('images/default-avatar.png') }}"
                                     alt="testimonial" class="theme2-testimonial-avatar">
                                <i class="fas fa-quote-left"></i>
                                <p>"{{ $Section_7_content_value["Sec7_box{$num}_review"] ?? '' }}"</p>
                                <h4>{{ $Section_7_content_value["Sec7_box{$num}_name"] ?? '' }}</h4>
                                <span>{{ $Section_7_content_value["Sec7_box{$num}_tag"] ?? '' }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-center">No testimonials available</p>
            @endif
        </div>
    </section>
@endif
@endsection

@push('theme2-script')
<script>
    function showTheme2Tab(type) {
        document.querySelectorAll('.theme2-property-panel').forEach(panel => {
            panel.style.display = 'none';
        });
        document.getElementById('panel-' + type).style.display = 'block';

        document.querySelectorAll('.theme2-tab-btn').forEach(btn => {
            btn.classList.remove('active');
        });
        event.target.classList.add('active');
    }
</script>
@endpush
