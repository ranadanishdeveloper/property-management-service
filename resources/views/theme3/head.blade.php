@php
    if (!empty($user)) {
        \App::setLocale($user->lang);
    }
    $routeName = \Request::route()->getName();
@endphp

<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <meta name="author" content="{{ !empty($settings['app_name']) ? $settings['app_name'] : env('APP_NAME') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ !empty($settings['app_name']) ? $settings['app_name'] : env('APP_NAME') }} </title>

    <meta name="title" content="{{ $settings['meta_seo_title'] }}">
    <meta name="keywords" content="{{ $settings['meta_seo_keyword'] }}">
    <meta name="description" content="{{ $settings['meta_seo_description'] }}">

    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ env('APP_URL') }}">
    <meta property="og:title" content="{{ $settings['meta_seo_title'] }}">
    <meta property="og:description" content="{{ $settings['meta_seo_description'] }}">
    <meta property="og:image" content="{{ asset(Storage::url('upload/seo')) . '/' . $settings['meta_seo_image'] }}">

    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ env('APP_URL') }}">
    <meta property="twitter:title" content="{{ $settings['meta_seo_title'] }}">
    <meta property="twitter:description" content="{{ $settings['meta_seo_description'] }}">
    <meta property="twitter:image"
        content="{{ asset(Storage::url('upload/seo')) . '/' . $settings['meta_seo_image'] }}">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Space+Mono:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Required CSS files -->
    <link rel="stylesheet" href="{{ asset('assets/web/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/web/css/jquery-ui.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/web/css/ace-responsive-menu.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/web/css/menu.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/web/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/web/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/web/css/bootstrap-select.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/web/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/web/css/slider.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" id="main-style-link" />
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/notifier.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/fonts/feather.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/web/css/ud-custom-spacing.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/web/css/responsive.css') }}">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">

    <!-- Favicon -->
    <link href="images/favicon.ico" sizes="128x128" rel="shortcut icon" type="image/x-icon" />
    <link href="images/apple-touch-icon-60x60.png" sizes="60x60" rel="apple-touch-icon">
    <link href="images/apple-touch-icon-72x72.png" sizes="72x72" rel="apple-touch-icon">
    <link href="images/apple-touch-icon-114x114.png" sizes="114x114" rel="apple-touch-icon">
    <link href="images/apple-touch-icon-180x180.png" sizes="180x180" rel="apple-touch-icon">

    @stack('css-page')
    @stack('theme3-css')

    <style>
        /* Theme 3 - Professional Brutalist CSS */
        /* Colors: Navy Blue #1A2A4F, Gold #C6A43F */
        .theme3-body {
            font-family: 'Space Mono', monospace;
            background: #C6A43F;
            color: #1A2A4F;
        }

        .theme3-wrapper {
            min-height: 100vh;
        }

        .theme3-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* Brutalist Header */
        .theme3-header {
            background: #1A2A4F;
            padding: 20px 0;
            border-bottom: 4px solid #C6A43F;
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .theme3-nav-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .theme3-logo {
            background: #C6A43F;
            padding: 10px 20px;
            display: inline-block;
        }

        .theme3-logo img {
            height: 40px;
            filter: brightness(0) invert(1);
        }

        .theme3-nav-menu {
            display: flex;
            gap: 0;
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .theme3-nav-menu a {
            color: #C6A43F;
            text-decoration: none;
            padding: 10px 20px;
            font-weight: bold;
            border-left: 2px solid #C6A43F;
            transition: all 0s;
        }

        .theme3-nav-menu a:hover,
        .theme3-nav-menu a.active {
            background: #C6A43F;
            color: #1A2A4F;
        }

        /* Main Content */
        .theme3-main {
            min-height: 80vh;
            padding: 60px 0;
        }

        /* Section Titles */
        .theme3-section-title {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 20px;
            text-transform: uppercase;
            letter-spacing: -2px;
        }

        .theme3-section-subtitle {
            font-size: 1.1rem;
            margin-bottom: 50px;
            opacity: 0.7;
        }

        /* Hero Section */
        .theme3-hero {
            padding: 80px 0;
            border-bottom: 4px solid #1A2A4F;
            margin-bottom: 60px;
        }

        .theme3-hero-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 60px;
            align-items: center;
        }

        .theme3-hero-title {
            font-size: 4rem;
            font-weight: 800;
            margin-bottom: 20px;
            text-transform: uppercase;
            letter-spacing: -3px;
            line-height: 1.1;
        }

        .theme3-hero-text {
            font-size: 1.2rem;
            margin-bottom: 30px;
            line-height: 1.5;
            opacity: 0.8;
        }

        /* Buttons */
        .theme3-btn {
            display: inline-block;
            background: #1A2A4F;
            color: #C6A43F;
            padding: 15px 30px;
            text-decoration: none;
            font-weight: bold;
            border: none;
            cursor: pointer;
            font-family: 'Space Mono', monospace;
            font-size: 1rem;
            transition: all 0s;
        }

        .theme3-btn:hover {
            background: #fff;
            color: #C6A43F;
        }

        /* Cards */
        .theme3-card {
            background: #1A2A4F;
            color: #C6A43F;
            padding: 30px;
            border: 3px solid #C6A43F;
            box-shadow: 8px 8px 0 rgba(198, 164, 63, 0.3);
            transition: all 0.1s linear;
        }

        .theme3-card:hover {
            transform: translate(-4px, -4px);
            box-shadow: 12px 12px 0 rgba(198, 164, 63, 0.5);
        }

        .theme3-card img {
            width: 100%;
            height: 150px;
            object-fit: cover;
            margin-bottom: 20px;
            filter: grayscale(100%);
        }

        .theme3-card h3 {
            margin-bottom: 15px;
            font-size: 1.3rem;
        }

        /* Features */
        .theme3-features {
            padding: 80px 0;
        }

        .theme3-features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 30px;
        }

        /* Funfact */
        .theme3-funfact {
            background: #1A2A4F;
            color: #C6A43F;
            padding: 60px 0;
            margin: 40px 0;
        }

        .theme3-funfact-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 30px;
            text-align: center;
        }

        .theme3-funfact-item {
            font-size: 3rem;
            font-weight: 800;
            display: flex;
            flex-direction: column;
        }

        .theme3-funfact-item span {
            font-size: 1rem;
            margin-top: 10px;
        }

        /* Amenities */
        .theme3-amenities {
            padding: 80px 0;
        }

        .theme3-amenities-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 20px;
        }

        .theme3-amenity-item {
            background: #1A2A4F;
            color: #C6A43F;
            padding: 20px;
            text-align: center;
            border: 2px solid #C6A43F;
        }

        .theme3-amenity-item img {
            width: 100%;
            height: 120px;
            object-fit: cover;
            margin-bottom: 15px;
            filter: grayscale(100%);
        }

        /* Properties */
        .theme3-properties {
            padding: 80px 0;
        }

        .theme3-property-list {
            margin-top: 40px;
        }

        .theme3-property-item {
            display: grid;
            grid-template-columns: 250px 1fr;
            gap: 30px;
            background: #1A2A4F;
            color: #C6A43F;
            margin-bottom: 30px;
            border: 3px solid #C6A43F;
            padding: 0;
            overflow: hidden;
        }

        .theme3-property-item img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            filter: grayscale(100%);
        }

        .theme3-property-item>div {
            padding: 20px;
        }

        .theme3-property-item h3 {
            margin-bottom: 10px;
        }

        .theme3-property-item p {
            margin-bottom: 15px;
            line-height: 1.4;
        }

        .theme3-property-meta {
            display: flex;
            gap: 20px;
            margin-bottom: 15px;
            font-weight: bold;
        }

        .theme3-property-item a {
            color: #C6A43F;
            text-decoration: none;
            font-weight: bold;
            display: inline-block;
        }

        .theme3-property-item a:hover {
            text-decoration: underline;
        }

        /* Testimonials */
        .theme3-testimonials {
            padding: 80px 0;
        }

        .theme3-testimonial-slider {
            max-width: 800px;
            margin: 0 auto;
        }

        .theme3-testimonial {
            background: #1A2A4F;
            color: #C6A43F;
            padding: 40px;
            margin: 20px;
            border: 3px solid #C6A43F;
            text-align: center;
            box-shadow: 8px 8px 0 rgba(198, 164, 63, 0.3);
        }

        .theme3-testimonial-avatar {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            object-fit: cover;
            margin: 0 auto 20px;
            border: 3px solid #C6A43F;
        }

        .theme3-testimonial p {
            font-size: 1.2rem;
            line-height: 1.5;
            margin-bottom: 20px;
        }

        .theme3-testimonial h4 {
            margin-bottom: 5px;
            font-size: 1.1rem;
        }

        .theme3-testimonial span {
            opacity: 0.7;
            font-size: 0.9rem;
        }

        /* Owl Carousel Navigation */
        .theme3-testimonial-slider .owl-nav button {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background: #C6A43F !important;
            color: #1A2A4F !important;
            width: 40px;
            height: 40px;
            border: 2px solid #C6A43F;
            font-size: 20px !important;
            font-weight: bold;
        }

        .theme3-testimonial-slider .owl-nav button.owl-prev {
            left: -50px;
        }

        .theme3-testimonial-slider .owl-nav button.owl-next {
            right: -50px;
        }

        .theme3-testimonial-slider .owl-dots {
            text-align: center;
            margin-top: 30px;
        }

        .theme3-testimonial-slider .owl-dot {
            display: inline-block;
            margin: 0 5px;
        }

        .theme3-testimonial-slider .owl-dot span {
            width: 10px;
            height: 10px;
            background: #1A2A4F;
            display: block;
            border-radius: 50%;
            opacity: 0.5;
        }

        .theme3-testimonial-slider .owl-dot.active span {
            opacity: 1;
        }

        /* Text center utility */
        .text-center {
            text-align: center;
        }

        /* Tab Buttons */
        .theme3-tab-buttons {
            display: flex;
            justify-content: center;
            gap: 0;
            margin-top: 40px;
        }

        .theme3-tab-btn {
            padding: 12px 30px;
            background: #C6A43F;
            color: #1A2A4F;
            border: 2px solid #1A2A4F;
            cursor: pointer;
            font-family: 'Space Mono', monospace;
            font-weight: bold;
        }

        .theme3-tab-btn.active,
        .theme3-tab-btn:hover {
            background: #1A2A4F;
            color: #C6A43F;
        }

        /* CTA Section */
        .theme3-cta {
            padding: 80px 0;
            background: #1A2A4F;
            color: #C6A43F;
            margin: 40px 0;
        }

        .theme3-cta .theme3-container {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 50px;
            align-items: center;
        }

        .theme3-cta h2 {
            font-size: 2rem;
            margin-bottom: 20px;
        }

        .theme3-cta p {
            margin-bottom: 25px;
        }

        .theme3-cta .theme3-btn {
            background: #C6A43F;
            color: #1A2A4F;
        }

        .theme3-cta .theme3-btn:hover {
            background: #333;
        }

        .theme3-cta img {
            width: 100%;
            filter: grayscale(100%);
        }

        /* Footer */
        .theme3-footer {
            background: #1A2A4F;
            color: #C6A43F;
            padding: 60px 0 30px;
            margin-top: 60px;
            border-top: 4px solid #C6A43F;
        }

        /* Responsive */
        @media (max-width: 992px) {

            .theme3-hero-grid,
            .theme3-cta .theme3-container {
                grid-template-columns: 1fr;
                gap: 40px;
            }

            .theme3-hero-title {
                font-size: 2.5rem;
            }

            .theme3-funfact-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .theme3-property-item {
                grid-template-columns: 1fr;
            }

            .theme3-nav-menu {
                display: none;
            }
        }

        @media (max-width: 768px) {
            .theme3-funfact-grid {
                grid-template-columns: 1fr;
            }

            .theme3-section-title {
                font-size: 2rem;
            }
        }

        /* ========== BLOG PAGE STYLES ========== */
        .theme3-blog-hero {
            margin-top: -100px;
            margin-bottom: 50px;
        }

        .theme3-blog-banner {
            position: relative;
            padding: 100px 0;
            background-size: cover;
            background-position: center;
            border-radius: 0px;
            overflow: hidden;
        }

        .theme3-blog-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.6);
        }

        .theme3-blog-hero-content {
            position: relative;
            z-index: 2;
            text-align: center;
        }

        .theme3-blog-hero-title {
            font-size: 3rem;
            font-weight: 800;
            color: #fff;
            margin-bottom: 15px;
            text-transform: uppercase;
        }

        .theme3-blog-hero-text {
            font-size: 1.2rem;
            color: rgba(255, 255, 255, 0.9);
        }

        .theme3-blog-section {
            padding: 60px 0 80px;
        }

        .theme3-blog-header {
            text-align: center;
            margin-bottom: 50px;
        }

        .theme3-blog-title {
            font-size: 2rem;
            font-weight: 700;
            color: #C6A43F;
            margin-bottom: 10px;
            text-transform: uppercase;
        }

        .theme3-blog-subtitle {
            font-size: 1rem;
            color: rgba(26, 42, 79, 0.7);
        }

        .theme3-blog-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 30px;
        }

        .theme3-blog-card {
            background: #fff;
            border: 2px solid #C6A43F;
            box-shadow: 8px 8px 0 rgba(0, 0, 0, 0.1);
            transition: all 0.2s;
        }

        .theme3-blog-card:hover {
            transform: translate(-4px, -4px);
            box-shadow: 12px 12px 0 rgba(0, 0, 0, 0.15);
        }

        .theme3-blog-image {
            position: relative;
            height: 220px;
            overflow: hidden;
        }

        .theme3-blog-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            filter: grayscale(100%);
            transition: all 0.2s;
        }

        .theme3-blog-card:hover .theme3-blog-image img {
            filter: grayscale(0%);
        }

        .theme3-blog-date {
            position: absolute;
            top: 15px;
            left: 15px;
            background: #C6A43F;
            color: #1A2A4F;
            border-radius: 0px;
            padding: 8px 12px;
            text-align: center;
            min-width: 55px;
            border: 1px solid #1A2A4F;
        }

        .theme3-blog-date .date-day {
            display: block;
            font-size: 1.2rem;
            font-weight: 800;
            line-height: 1;
        }

        .theme3-blog-date .date-month {
            display: block;
            font-size: 0.7rem;
            text-transform: uppercase;
        }

        .theme3-blog-content {
            padding: 20px;
        }

        .theme3-blog-meta {
            display: flex;
            gap: 15px;
            margin-bottom: 12px;
            font-size: 0.75rem;
            color: #666;
        }

        .theme3-blog-meta i {
            margin-right: 5px;
        }

        .theme3-blog-card-title {
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 10px;
            line-height: 1.4;
        }

        .theme3-blog-card-title a {
            color: #C6A43F;
            text-decoration: none;
        }

        .theme3-blog-card-title a:hover {
            text-decoration: underline;
        }

        .theme3-blog-excerpt {
            font-size: 0.85rem;
            color: #666;
            line-height: 1.5;
            margin-bottom: 15px;
        }

        .theme3-blog-readmore {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-size: 0.85rem;
            font-weight: 600;
            color: #C6A43F;
            text-decoration: none;
            text-transform: uppercase;
        }

        .theme3-blog-readmore:hover {
            gap: 12px;
        }

        /* ========== BLOG DETAIL PAGE ========== */
        .theme3-blog-detail-section {
            padding: 60px 0 80px;
        }

        .theme3-blog-detail-header {
            text-align: center;
            margin-bottom: 40px;
        }

        .theme3-breadcrumb {
            margin-bottom: 20px;
            font-size: 0.9rem;
        }

        .theme3-breadcrumb a {
            color: #C6A43F;
            text-decoration: none;
        }

        .theme3-breadcrumb a:hover {
            text-decoration: underline;
        }

        .theme3-breadcrumb .separator {
            margin: 0 10px;
            color: #999;
        }

        .theme3-breadcrumb .current {
            color: #C6A43F;
            font-weight: bold;
        }

        .theme3-blog-detail-title {
            font-size: 2.5rem;
            font-weight: 800;
            color: #C6A43F;
            margin-bottom: 20px;
            line-height: 1.3;
        }

        .theme3-blog-detail-meta {
            display: flex;
            justify-content: center;
            gap: 25px;
            flex-wrap: wrap;
        }

        .theme3-blog-detail-meta .meta-item {
            display: flex;
            align-items: center;
            gap: 8px;
            color: #666;
            font-size: 0.9rem;
        }

        .theme3-blog-detail-image {
            margin-bottom: 40px;
            border-radius: 0px;
            overflow: hidden;
            border: 2px solid #C6A43F;
            box-shadow: 8px 8px 0 rgba(0, 0, 0, 0.1);
        }

        .theme3-blog-detail-image img {
            width: 100%;
            max-height: 500px;
            object-fit: cover;
            filter: grayscale(100%);
        }

        .theme3-blog-detail-content {
            max-width: 800px;
            margin: 0 auto;
        }

        .theme3-blog-content-wrapper {
            background: #fff;
            border: 2px solid #C6A43F;
            box-shadow: 8px 8px 0 rgba(0, 0, 0, 0.1);
            padding: 40px;
        }

        .theme3-blog-content-wrapper p {
            margin-bottom: 20px;
            line-height: 1.8;
            color: #333;
        }

        .theme3-blog-content-wrapper h1,
        .theme3-blog-content-wrapper h2,
        .theme3-blog-content-wrapper h3,
        .theme3-blog-content-wrapper h4 {
            color: #C6A43F;
            margin: 25px 0 15px;
        }

        .theme3-blog-content-wrapper img {
            max-width: 100%;
            border-radius: 0px;
            margin: 20px 0;
            border: 1px solid #C6A43F;
        }

        .theme3-blog-detail-footer {
            max-width: 800px;
            margin: 40px auto 0;
            padding-top: 30px;
            border-top: 2px solid #C6A43F;
        }

        .theme3-share-section {
            text-align: center;
        }

        .theme3-share-title {
            font-size: 1rem;
            color: #C6A43F;
            margin-bottom: 15px;
        }

        .theme3-share-links {
            display: flex;
            justify-content: center;
            gap: 15px;
        }

        .theme3-share-links .share-link {
            width: 40px;
            height: 40px;
            background: #f0f0f0;
            border: 1px solid #C6A43F;
            border-radius: 0px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #C6A43F;
            text-decoration: none;
            transition: all 0.2s;
        }

        .theme3-share-links .share-link:hover {
            background: #C6A43F;
            color: #1A2A4F;
            transform: translate(-2px, -2px);
            box-shadow: 2px 2px 0 #C6A43F;
        }

        .theme3-back-to-blog {
            text-align: center;
            margin-top: 40px;
        }

        .theme3-back-btn {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 12px 30px;
            background: #C6A43F;
            border: 2px solid #1A2A4F;
            color: #1A2A4F;
            text-decoration: none;
            font-weight: bold;
            text-transform: uppercase;
            transition: all 0.2s;
        }

        .theme3-back-btn:hover {
            background: #1A2A4F;
            transform: translate(-2px, -2px);
            box-shadow: 4px 4px 0 #C6A43F;
            color: #C6A43F;
        }

        .theme3-no-blogs {
            text-align: center;
            padding: 60px;
            background: #fff;
            border: 2px solid #C6A43F;
            box-shadow: 8px 8px 0 rgba(0, 0, 0, 0.1);
        }

        .theme3-no-blogs i {
            font-size: 4rem;
            margin-bottom: 20px;
            opacity: 0.5;
        }

        /* ========== DETAIL PAGE STYLES ========== */
        .theme3-detail-hero {
            margin-top: -100px;
            margin-bottom: 40px;
        }

        .theme3-detail-banner {
            position: relative;
            padding: 80px 0;
            background-size: cover;
            background-position: center;
            overflow: hidden;
            border: 2px solid #1A2A4F;
        }

        .theme3-detail-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.6);
        }

        .theme3-detail-banner-content {
            position: relative;
            z-index: 2;
        }

        .theme3-detail-banner-title {
            font-size: 2rem;
            font-weight: 700;
            color: #fff;
            margin-bottom: 15px;
            text-transform: uppercase;
        }

        .theme3-detail-banner-text {
            font-size: 1rem;
            color: rgba(255, 255, 255, 0.9);
        }

        .theme3-detail-section {
            padding: 40px 0 80px;
        }

        .theme3-detail-card {
            background: #fff;
            border: 2px solid #C6A43F;
            box-shadow: 8px 8px 0 rgba(0, 0, 0, 0.1);
            padding: 30px;
        }

        .theme3-detail-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            flex-wrap: wrap;
            gap: 15px;
            padding-bottom: 15px;
            border-bottom: 2px solid #C6A43F;
        }

        .theme3-detail-title {
            font-size: 1.8rem;
            font-weight: 700;
            color: #C6A43F;
            margin: 0;
            text-transform: uppercase;
        }

        .theme3-detail-type-badge {
            background: #C6A43F;
            border: 1px solid #1A2A4F;
            padding: 6px 16px;
            font-size: 0.9rem;
            color: #1A2A4F;
            font-weight: bold;
        }

        .theme3-detail-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 30px;
            margin-bottom: 40px;
        }

        .theme3-detail-carousel {
            background: #f5f5f5;
            border: 2px solid #C6A43F;
            padding: 15px;
        }

        .theme3-carousel-inner {
            position: relative;
            height: 350px;
        }

        .theme3-carousel-item {
            display: none;
            height: 100%;
        }

        .theme3-carousel-item.active {
            display: block;
        }

        .theme3-carousel-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .theme3-carousel-thumbnails {
            display: flex;
            gap: 10px;
            margin-top: 15px;
            flex-wrap: wrap;
        }

        .theme3-thumbnail {
            width: 80px;
            height: 60px;
            cursor: pointer;
            border: 2px solid #ddd;
            overflow: hidden;
            opacity: 0.6;
            transition: opacity 0.2s;
        }

        .theme3-thumbnail.active {
            opacity: 1;
            border-color: #1A2A4F;
        }

        .theme3-thumbnail img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .theme3-info-card {
            background: #f5f5f5;
            border: 2px solid #C6A43F;
            padding: 20px;
        }

        .theme3-info-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            flex-wrap: wrap;
            gap: 15px;
        }

        .theme3-info-title {
            font-size: 1.3rem;
            font-weight: 700;
            color: #C6A43F;
            margin: 0;
            text-transform: uppercase;
        }

        .theme3-info-price {
            font-size: 0.9rem;
            color: #666;
        }

        .theme3-price {
            font-size: 1.3rem;
            font-weight: 700;
            color: #1A2A4F;
            margin-left: 8px;
        }

        .theme3-info-description {
            color: #333;
            line-height: 1.6;
        }

        .theme3-detail-section-block {
            margin-top: 30px;
            padding-top: 20px;
            border-top: 2px solid #C6A43F;
        }

        .theme3-amenities-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 15px;
        }

        .theme3-amenity-item {
            background: #f5f5f5;
            border: 1px solid #C6A43F;
            padding: 12px;
            display: flex;
            align-items: center;
            gap: 10px;
            transition: all 0.2s;
        }

        .theme3-amenity-item:hover {
            transform: translate(-2px, -2px);
            box-shadow: 4px 4px 0 #C6A43F;
        }

        .theme3-check-icon {
            color: #1A2A4F;
            font-size: 1rem;
        }

        .theme3-amenity-img {
            width: 40px;
            height: 40px;
            object-fit: cover;
            border: 1px solid #C6A43F;
        }

        .theme3-amenity-name {
            margin: 0;
            font-size: 0.9rem;
            color: #333;
        }

        .theme3-advantages-list {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 12px;
        }

        .theme3-advantage-item {
            background: #f5f5f5;
            border: 1px solid #C6A43F;
            padding: 10px 15px;
            display: flex;
            align-items: center;
            gap: 10px;
            color: #333;
        }

        .theme3-success-icon {
            color: #1A2A4F;
        }

        .theme3-address {
            background: #f5f5f5;
            border: 1px solid #C6A43F;
            padding: 15px 20px;
            display: flex;
            align-items: center;
            gap: 12px;
            color: #333;
        }

        .theme3-address-icon {
            color: #1A2A4F;
            font-size: 1.2rem;
        }

        .theme3-units-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 20px;
        }

        .theme3-unit-card {
            background: #f5f5f5;
            border: 2px solid #C6A43F;
            padding: 20px;
            transition: all 0.2s;
        }

        .theme3-unit-card:hover {
            transform: translate(-4px, -4px);
            box-shadow: 8px 8px 0 rgba(0, 0, 0, 0.1);
        }

        .theme3-unit-title {
            font-size: 1.1rem;
            font-weight: 700;
            color: #C6A43F;
            margin: 0;
            text-transform: uppercase;
        }

        .theme3-unit-divider {
            border-color: #C6A43F;
            margin: 15px 0;
        }

        .theme3-unit-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .theme3-unit-list li {
            display: flex;
            justify-content: space-between;
            padding: 8px 0;
            color: #333;
            border-bottom: 1px solid #ddd;
        }

        .theme3-unit-list li:last-child {
            border-bottom: none;
        }

        .theme3-unit-list strong {
            color: #C6A43F;
        }

        .theme3-text-muted {
            color: #999;
        }

        /* ========== PROPERTY PAGE STYLES ========== */
        .theme3-breadcumb-section {
            position: relative;
            margin-top: -100px;
        }

        .theme3-cta-banner {
            position: relative;
            padding: 80px 0;
            overflow: hidden;
            border: 2px solid #1A2A4F;
        }

        .theme3-banner-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.6);
        }

        .theme3-banner-content {
            position: relative;
            z-index: 2;
        }

        .theme3-banner-title {
            font-size: 2.5rem;
            font-weight: 800;
            color: #fff;
            margin-bottom: 15px;
            text-transform: uppercase;
        }

        .theme3-banner-subtitle {
            font-size: 1.1rem;
            color: rgba(255, 255, 255, 0.9);
            margin-bottom: 30px;
        }

        .theme3-search-box {
            background: #fff;
            border: 2px solid #C6A43F;
            padding: 25px;
        }

        .theme3-search-row {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
            gap: 15px;
            align-items: end;
        }

        .theme3-search-group {
            display: flex;
            flex-direction: column;
        }

        .theme3-search-label {
            font-size: 14px;
            font-weight: 700;
            color: #C6A43F;
            margin-bottom: 8px;
            text-transform: uppercase;
        }

        .theme3-search-select {
            width: 100%;
            padding: 12px 15px;
            background: #fff;
            border: 1px solid #C6A43F;
            font-size: 14px;
            color: #333;
            cursor: pointer;
        }

        .theme3-search-select:focus {
            outline: none;
            border-color: #1A2A4F;
        }

        .theme3-search-btn {
            width: 100%;
            padding: 12px 20px;
            background: #C6A43F;
            border: 2px solid #1A2A4F;
            color: #1A2A4F;
            font-weight: 700;
            cursor: pointer;
            text-transform: uppercase;
            transition: all 0.2s;
        }

        .theme3-search-btn:hover {
            background: #1A2A4F;
            color: #C6A43F;
            transform: translate(-2px, -2px);
            box-shadow: 4px 4px 0 #C6A43F;
        }

        .theme3-reset-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            padding: 12px 20px;
            background: #f5f5f5;
            border: 1px solid #C6A43F;
            color: #333;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.2s;
        }

        .theme3-reset-btn:hover {
            background: #ddd;
            text-decoration: none;
            color: #C6A43F;
        }

        .theme3-properties-list {
            padding: 60px 0;
        }

        .theme3-property-row {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 25px;
        }

        .theme3-property-col {
            width: 100%;
        }

        .theme3-listing-card {
            background: #fff;
            border: 2px solid #C6A43F;
            box-shadow: 8px 8px 0 rgba(0, 0, 0, 0.1);
            transition: all 0.2s;
            height: 100%;
        }

        .theme3-listing-card:hover {
            transform: translate(-4px, -4px);
            box-shadow: 12px 12px 0 rgba(0, 0, 0, 0.15);
        }

        .theme3-list-thumb {
            position: relative;
            overflow: hidden;
            height: 220px;
            border-bottom: 2px solid #C6A43F;
        }

        .theme3-list-thumb img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: all 0.2s;
            filter: grayscale(100%);
        }

        .theme3-listing-card:hover .theme3-list-thumb img {
            filter: grayscale(0%);
        }

        .theme3-property-badge {
            position: absolute;
            top: 15px;
            left: 15px;
            padding: 5px 12px;
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            border: 1px solid #C6A43F;
        }

        .theme3-property-badge.sale {
            background: #1A2A4F;
            color: #C6A43F;
        }

        .theme3-property-badge.rent {
            background: #C6A43F;
            color: #1A2A4F;
        }

        .theme3-property-price {
            position: absolute;
            bottom: 15px;
            right: 15px;
            background: rgba(0, 0, 0, 0.8);
            padding: 5px 12px;
            font-size: 14px;
            font-weight: 700;
            color: #1A2A4F;
            border: 1px solid #C6A43F;
        }

        .theme3-list-content {
            padding: 20px;
        }

        .theme3-list-type {
            margin-bottom: 10px;
        }

        .theme3-type-badge {
            display: inline-block;
            background: #C6A43F;
            padding: 4px 12px;
            font-size: 11px;
            font-weight: 600;
            color: #1A2A4F;
            text-transform: uppercase;
        }

        .theme3-list-title {
            margin-bottom: 10px;
            font-size: 1.1rem;
            font-weight: 700;
        }

        .theme3-list-title a {
            color: #C6A43F;
            text-decoration: none;
        }

        .theme3-list-title a:hover {
            text-decoration: underline;
        }

        .theme3-list-desc {
            font-size: 13px;
            color: #666;
            margin-bottom: 15px;
            line-height: 1.5;
        }

        .theme3-list-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 10px;
            padding-top: 12px;
            border-top: 1px solid #ddd;
        }

        .theme3-list-address {
            font-size: 12px;
            margin-bottom: 0;
            color: #666;
        }

        .theme3-list-address i {
            margin-right: 5px;
            color: #1A2A4F;
        }

        .theme3-view-link {
            font-size: 12px;
            font-weight: 700;
            color: #C6A43F;
            text-decoration: none;
            text-transform: uppercase;
        }

        .theme3-view-link:hover {
            color: #1A2A4F;
        }

        .theme3-pagination-wrapper {
            text-align: center;
            margin-top: 50px;
        }

        .theme3-pagination-list {
            display: inline-flex;
            gap: 8px;
            list-style: none;
            flex-wrap: wrap;
            justify-content: center;
            margin-bottom: 15px;
        }

        .theme3-pagination-list li a,
        .theme3-pagination-list li span {
            display: inline-block;
            padding: 8px 14px;
            background: #fff;
            border: 1px solid #C6A43F;
            color: #C6A43F;
            text-decoration: none;
            font-weight: bold;
        }

        .theme3-pagination-list li.active a,
        .theme3-pagination-list li a:hover {
            background: #1A2A4F;
            color: #C6A43F;
            transform: translate(-2px, -2px);
            box-shadow: 2px 2px 0 #C6A43F;
        }

        .theme3-pagination-list li.disabled span {
            opacity: 0.5;
            cursor: not-allowed;
        }

        .theme3-pagination-info {
            font-size: 13px;
            color: #666;
            margin-top: 15px;
        }

        .theme3-no-properties-col {
            width: 100%;
        }

        .theme3-no-properties {
            text-align: center;
            padding: 60px 20px;
            background: #fff;
            border: 2px solid #C6A43F;
            box-shadow: 8px 8px 0 rgba(0, 0, 0, 0.1);
        }

        .theme3-no-properties i {
            font-size: 48px;
            margin-bottom: 15px;
            opacity: 0.5;
        }

        .theme3-no-properties p {
            margin: 0;
            color: #666;
        }

        .theme3-loading {
            text-align: center;
            padding: 60px;
            background: #fff;
            border: 2px solid #C6A43F;
        }

        .theme3-loading .loader {
            width: 50px;
            height: 50px;
            border: 3px solid #f0f0f0;
            border-radius: 50%;
            border-top-color: #C6A43F;
            animation: spin 1s ease-in-out infinite;
            margin: 0 auto 20px;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        /* ========== CONTACT PAGE STYLES ========== */
        .theme3-contact-section {
            padding: 60px 0 80px;
            min-height: 80vh;
        }

        .theme3-contact-header {
            text-align: center;
            margin-bottom: 50px;
        }

        .theme3-contact-header-content {
            max-width: 700px;
            margin: 0 auto;
        }

        .theme3-contact-title {
            font-size: 2.5rem;
            font-weight: 800;
            color: #C6A43F;
            margin-bottom: 15px;
            text-transform: uppercase;
            letter-spacing: -1px;
        }

        .theme3-contact-subtitle {
            font-size: 1.1rem;
            color: #666;
            line-height: 1.6;
        }

        .theme3-contact-form-wrapper {
            max-width: 700px;
            margin: 0 auto 60px;
        }

        .theme3-contact-card {
            background: #fff;
            border: 2px solid #C6A43F;
            box-shadow: 8px 8px 0 rgba(0, 0, 0, 0.1);
            padding: 40px;
        }

        .theme3-alert {
            padding: 15px 20px;
            margin-bottom: 25px;
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 0.9rem;
            border: 1px solid #C6A43F;
        }

        .theme3-alert-success {
            background: #e8f5e9;
            color: #2e7d32;
            border-left: 4px solid #2e7d32;
        }

        .theme3-alert-danger {
            background: #ffebee;
            color: #c62828;
            border-left: 4px solid #c62828;
        }

        .theme3-form-group {
            margin-bottom: 25px;
        }

        .theme3-form-label {
            display: block;
            font-size: 0.85rem;
            font-weight: 600;
            color: #C6A43F;
            margin-bottom: 8px;
            text-transform: uppercase;
        }

        .theme3-form-control {
            width: 100%;
            padding: 12px 16px;
            background: #fff;
            border: 1px solid #C6A43F;
            font-size: 0.95rem;
            color: #333;
            transition: all 0.2s;
        }

        .theme3-form-control:focus {
            outline: none;
            border-color: #1A2A4F;
            box-shadow: 0 0 0 2px rgba(198, 164, 63, 0.2);
        }

        .theme3-form-control::placeholder {
            color: #999;
        }

        .theme3-textarea {
            resize: vertical;
            min-height: 120px;
        }

        .theme3-form-submit {
            text-align: center;
            margin-top: 30px;
        }

        .theme3-submit-btn {
            display: inline-block;
            padding: 14px 40px;
            background: #C6A43F;
            border: 2px solid #1A2A4F;
            color: #1A2A4F;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .theme3-submit-btn:hover {
            background: #1A2A4F;
            color: #C6A43F;
            transform: translate(-2px, -2px);
            box-shadow: 4px 4px 0 #C6A43F;
        }

        .theme3-contact-info {
            margin-top: 40px;
        }

        .theme3-info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 25px;
        }

        .theme3-info-card {
            background: #fff;
            border: 2px solid #C6A43F;
            box-shadow: 8px 8px 0 rgba(0, 0, 0, 0.1);
            padding: 30px 25px;
            text-align: center;
            transition: all 0.2s;
        }

        .theme3-info-card:hover {
            transform: translate(-4px, -4px);
            box-shadow: 12px 12px 0 rgba(0, 0, 0, 0.15);
        }

        .theme3-info-icon {
            width: 70px;
            height: 70px;
            background: #C6A43F;
            border: 2px solid #1A2A4F;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
        }

        .theme3-info-icon i {
            font-size: 2rem;
            color: #1A2A4F;
        }

        .theme3-info-title {
            font-size: 1.2rem;
            font-weight: 700;
            color: #C6A43F;
            margin-bottom: 12px;
            text-transform: uppercase;
        }

        .theme3-info-text {
            font-size: 0.9rem;
            color: #666;
            line-height: 1.5;
            margin: 0;
        }

        /* Responsive */
        @media (max-width: 992px) {
            .theme3-detail-row {
                grid-template-columns: 1fr;
            }
            .theme3-blog-grid {
                grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            }
        }

        @media (max-width: 768px) {
            .theme3-property-row {
                grid-template-columns: 1fr;
            }
            .theme3-search-row {
                grid-template-columns: 1fr;
            }
            .theme3-banner-title {
                font-size: 1.5rem;
            }
            .theme3-blog-grid {
                grid-template-columns: 1fr;
            }
            .theme3-contact-card {
                padding: 25px;
            }
            .theme3-info-grid {
                grid-template-columns: 1fr;
            }
            .theme3-submit-btn {
                width: 100%;
            }
            .theme3-detail-card {
                padding: 20px;
            }
        }
    </style>
</head>
