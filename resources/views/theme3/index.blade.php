@extends('theme3.main')
@section('content')

    <!-- Home Banner - Theme 3 Brutalist Style -->
    @php
        $Section_0 = App\Models\FrontHomePage::where('section', 'Section 0')->where('parent_id', $parent_id)->first();
        $Section_0_content_value = !empty($Section_0->content_value)
        ? json_decode($Section_0->content_value, true)
        : [];
    @endphp
    @if (empty($Section_0_content_value['section_enabled']) || $Section_0_content_value['section_enabled'] == 'active')
        <section class="theme3-hero">
            <div class="theme3-container">
                <div class="theme3-hero-grid">
                    <div>
                        <h1 class="theme3-hero-title">{{ $Section_0_content_value['title'] }}</h1>
                        <p class="theme3-hero-text">{{ $Section_0_content_value['sub_title'] }}</p>
                        <a href="{{ $propertiesUrl ?? '#' }}" class="theme3-btn">VIEW PROPERTIES →</a>
                    </div>
                    <div>
                        <img src="{{ asset(Storage::url($Section_0_content_value['banner_image1_path'])) }}" alt="" style="width: 100%; filter: grayscale(100%);">
                    </div>
                </div>
            </div>
        </section>
    @endif

    <!-- Features - Theme 3 -->
    @php
        $Section_1 = App\Models\FrontHomePage::where('section', 'Section 1')->where('parent_id', $parent_id)->first();
        $Section_1_content_value = !empty($Section_1->content_value)
            ? json_decode($Section_1->content_value, true)
            : [];
    @endphp
    @if (empty($Section_1_content_value['section_enabled']) || $Section_1_content_value['section_enabled'] == 'active')
        <section class="theme3-features">
            <div class="theme3-container">
                <h2 class="theme3-section-title">{{ $Section_1_content_value['Sec1_title'] }}</h2>
                <p class="theme3-section-subtitle">{{ $Section_1_content_value['Sec1_info'] }}</p>
                <div class="theme3-features-grid">
                    @php $is4_check = 0; @endphp
                    @for ($is4 = 1; $is4 <= 4; $is4++)
                        @if (!empty($Section_1_content_value['Sec1_box' . $is4 . '_enabled']) && $Section_1_content_value['Sec1_box' . $is4 . '_enabled'] == 'active')
                            @php $is4_check++; @endphp
                            <div class="theme3-card">
                                <img src="{{ asset(Storage::url($Section_1_content_value['Sec1_box' . $is4 . '_image_path'])) }}" alt="">
                                <h3>{{ $Section_1_content_value['Sec1_box' . $is4 . '_title'] }}</h3>
                                <p>{{ $Section_1_content_value['Sec1_box' . $is4 . '_info'] }}</p>
                            </div>
                        @endif
                    @endfor
                </div>
            </div>
        </section>
    @endif

    <!-- Funfact - Theme 3 -->
    @php
        $Section_2 = App\Models\FrontHomePage::where('section', 'Section 2')->where('parent_id', $parent_id)->first();
        $Section_2_content_value = !empty($Section_2->content_value)
            ? json_decode($Section_2->content_value, true)
            : [];
    @endphp
    @if (empty($Section_2_content_value['section_enabled']) || $Section_2_content_value['section_enabled'] == 'active')
        <section class="theme3-funfact">
            <div class="theme3-container">
                <div class="theme3-funfact-grid">
                    <div class="theme3-funfact-item">{{ $Section_2_content_value['Box1_number'] }}<span>{{ $Section_2_content_value['Box1_title'] }}</span></div>
                    <div class="theme3-funfact-item">{{ $Section_2_content_value['Box2_number'] }}<span>{{ $Section_2_content_value['Box2_title'] }}</span></div>
                    <div class="theme3-funfact-item">{{ $Section_2_content_value['Box3_number'] }}<span>{{ $Section_2_content_value['Box3_title'] }}</span></div>
                    <div class="theme3-funfact-item">{{ $Section_2_content_value['Box4_number'] }}<span>{{ $Section_2_content_value['Box4_title'] }}</span></div>
                </div>
            </div>
        </section>
    @endif

    <!-- Amenities - Theme 3 -->
 <!-- Amenities - Theme 3 -->
@php
    $Section_3 = App\Models\FrontHomePage::where('section', 'Section 3')->where('parent_id', $parent_id)->first();
    $Section_3_content_value = !empty($Section_3->content_value)
        ? json_decode($Section_3->content_value, true)
        : [];
@endphp
@if (empty($Section_3_content_value['section_enabled']) || $Section_3_content_value['section_enabled'] == 'active')
    <section class="theme3-amenities">
        <div class="theme3-container">
            <h2 class="theme3-section-title">{{ $Section_3_content_value['Sec3_title'] }}</h2>
            <p class="theme3-section-subtitle">{{ $Section_3_content_value['Sec3_info'] }}</p>
            @if (isset($allAmenities) && count($allAmenities) > 0)
                <div class="theme3-amenities-slider owl-carousel">
                    @foreach ($allAmenities as $amenity)
                        @php $image = !empty($amenity->image) ? $amenity->image : 'default.png'; @endphp
                        <div class="theme3-amenity-item">
                            <img src="{{ asset(Storage::url('upload/amenity/') . '/' . $image) }}" alt="">
                            <h4>{{ ucfirst($amenity->name) }}</h4>
                        </div>
                    @endforeach
                </div>
            @else
                <p>NO AMENITIES AVAILABLE</p>
            @endif
        </div>
    </section>
@endif

    <!-- Properties - Theme 3 (continued) -->
 <!-- Properties - Theme 3 (Latest 8 Properties) -->
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
    <section class="theme3-properties">
        <div class="theme3-container">
            <h2 class="theme3-section-title">{{ $Section_5_content_value['Sec5_title'] ?? 'Featured Properties' }}</h2>
            <p class="theme3-section-subtitle">{{ $Section_5_content_value['Sec5_info'] ?? 'Discover our exclusive collection' }}</p>
            
            @if($latestProperties->count() > 0)
                <div class="theme3-properties-grid">
                    @foreach ($latestProperties as $property)
                        @php 
                            $thumbnail = !empty($property->thumbnail->image) ? $property->thumbnail->image : 'default.jpg'; 
                        @endphp
                        <div class="theme3-property-card">
                            <div class="theme3-property-image">
                                <img src="{{ asset(Storage::url('upload/property/thumbnail/' . $thumbnail)) }}" alt="{{ $property->name }}">
                                <span class="theme3-property-badge">{{ ucfirst($property->listing_type ?? 'Property') }}</span>
                            </div>
                            <div class="theme3-property-info">
                                <h3>{{ ucfirst($property->name) }}</h3>
                                <p>{{ \Illuminate\Support\Str::limit(strip_tags($property->description ?? ''), 60) }}</p>
                                <div class="theme3-property-meta">
                                    <span>{{ \App\Models\Property::types()[$property->type] ?? ucfirst($property->type) }}</span>
                                    <span class="theme3-property-price">{{ priceFormat($property->price) }}</span>
                                </div>
                                <a href="{{ route('property.detail', ['code' => $user->code, \Crypt::encrypt($property->id)]) }}" class="theme3-property-link">VIEW DETAILS →</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-center">No properties available at the moment.</p>
            @endif
        </div>
    </section>
@endif

    <!-- CTA Banner 2 & Testimonials continue same pattern... -->
    @php
        $Section_6 = App\Models\FrontHomePage::where('section', 'Section 6')->where('parent_id', $parent_id)->first();
        $Section_6_content_value = !empty($Section_6->content_value)
            ? json_decode($Section_6->content_value, true)
            : [];
    @endphp
    @if (empty($Section_6_content_value['section_enabled']) || $Section_6_content_value['section_enabled'] == 'active')
        <section class="theme3-cta">
            <div class="theme3-container">
                <div>
                    <h2>{{ $Section_6_content_value['Sec6_title'] }}</h2>
                    <p>{{ $Section_6_content_value['Sec6_info'] }}</p>
                    <a href="{{ $Section_6_content_value['sec6_btn_link'] }}" class="theme3-btn">{{ $Section_6_content_value['sec6_btn_name'] }} →</a>
                </div>
                <img src="{{ asset(Storage::url($Section_6_content_value['banner_image2_path'])) }}" alt="">
            </div>
        </section>
    @endif

    <!-- Testimonials - Theme 3 -->
    <!-- Testimonials - Theme 3 -->
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
    <section class="theme3-testimonials">
        <div class="theme3-container">
            <h2 class="theme3-section-title text-center">{{ $Section_7_content_value['Sec7_title'] ?? '' }}</h2>
            <p class="theme3-section-subtitle text-center">{{ $Section_7_content_value['Sec7_info'] ?? '' }}</p>

            @if(count($testimonials) > 0)
                <div class="theme3-testimonial-slider owl-carousel">
                    @foreach ($testimonials as $index => $num)
                        @php
                            $imagePath = $Section_7_content_value["Sec7_box{$num}_image_path"] ?? '';
                        @endphp
                        <div class="theme3-testimonial">
                            <div class="theme3-testimonial-content">
                                <img style="width: fit-content; height: 100px;" src="{{ !empty($imagePath) ? asset(Storage::url($imagePath)) : asset('images/default-avatar.png') }}"
                                     alt="testimonial" class="theme3-testimonial-avatar">
                                <p>"{{ $Section_7_content_value["Sec7_box{$num}_review"] ?? '' }}"</p>
                                <h4>{{ $Section_7_content_value["Sec7_box{$num}_name"] ?? '' }}</h4>
                                <span>{{ $Section_7_content_value["Sec7_box{$num}_tag"] ?? '' }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-center">NO TESTIMONIALS AVAILABLE</p>
            @endif
        </div>
    </section>
@endif
@endsection

@push('theme3-script')
<script>
    function showTheme3Tab(type) {
        document.querySelectorAll('[id^="theme3-type-"]').forEach(el => {
            el.style.display = 'none';
        });
        document.getElementById('theme3-type-' + type).style.display = 'block';
        document.querySelectorAll('.theme3-tab-btn').forEach(btn => {
            btn.classList.remove('active');
        });
        event.target.classList.add('active');
    }
</script>
@endpush
