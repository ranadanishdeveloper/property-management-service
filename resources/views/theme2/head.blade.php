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
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
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
    @stack('theme2-css')

    <style>
        /* Theme 2 - Professional Forest Green & Gold */
        .theme2-body {
            font-family: 'Inter', sans-serif;
            background: #1B4D3E;
            min-height: 100vh;
            color: #fff;
        }

        /* ========== DETAIL PAGE STYLES ========== */

        /* Hero Banner */
        .theme2-detail-hero {
            margin-top: -100px;
            margin-bottom: 40px;
        }

        .theme2-detail-banner {
            position: relative;
            padding: 80px 0;
            background-size: cover;
            background-position: center;
            border-radius: 20px;
            overflow: hidden;
        }
h6, .h6, h5, .h5, h4, .h4, h3, .h3, h2, .h2, h1, .h1 {
    color: #fff;
}
        .theme2-detail-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.3));
        }

        .theme2-detail-banner-content {
            position: relative;
            z-index: 2;
        }

        .theme2-detail-banner-title {
            font-size: 2rem;
            font-weight: 700;
            color: #fff;
            margin-bottom: 15px;
        }

        .theme2-detail-banner-text {
            font-size: 1rem;
            color: rgba(255, 255, 255, 0.9);
        }

        /* Main Detail Card */
        .theme2-detail-section {
            padding: 40px 0 80px;
        }

        .theme2-detail-card {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 24px;
            padding: 30px;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        /* Header */
        .theme2-detail-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            flex-wrap: wrap;
            gap: 15px;
        }

        .theme2-detail-title {
            font-size: 1.8rem;
            font-weight: 700;
            color: #fff;
            margin: 0;
        }

        .theme2-detail-type-badge {
            background: rgba(255, 255, 255, 0.2);
            padding: 6px 16px;
            border-radius: 30px;
            font-size: 0.9rem;
            color: #fff;
        }

        /* Main Row */
        .theme2-detail-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 30px;
            margin-bottom: 40px;
        }

        /* Carousel */
        .theme2-detail-carousel {
            background: rgba(0, 0, 0, 0.3);
            border-radius: 16px;
            overflow: hidden;
            padding: 15px;
        }

        .theme2-carousel-inner {
            position: relative;
            height: 350px;
        }

        .theme2-carousel-item {
            display: none;
            height: 100%;
        }

        .theme2-carousel-item.active {
            display: block;
        }

        .theme2-carousel-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 12px;
        }

        .theme2-carousel-thumbnails {
            display: flex;
            gap: 10px;
            margin-top: 15px;
            flex-wrap: wrap;
        }

        /* ========== CONTACT PAGE STYLES ========== */

        .theme2-contact-section {
            padding: 60px 0 80px;
            min-height: 80vh;
        }

        /* Contact Header */
        .theme2-contact-header {
            text-align: center;
            margin-bottom: 50px;
        }

        .theme2-contact-header-content {
            max-width: 700px;
            margin: 0 auto;
        }

        .theme2-contact-title {
            font-size: 2.5rem;
            font-weight: 700;
            color: #fff;
            margin-bottom: 15px;
            background: linear-gradient(135deg, #fff, #e0e0e0);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .theme2-contact-subtitle {
            font-size: 1.1rem;
            color: rgba(255, 255, 255, 0.8);
            line-height: 1.6;
        }

        /* Contact Form Card */
        .theme2-contact-form-wrapper {
            max-width: 700px;
            margin: 0 auto 60px;
        }

        .theme2-contact-card {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 24px;
            padding: 40px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
        }

        /* Alerts */
        .theme2-alert {
            padding: 15px 20px;
            border-radius: 12px;
            margin-bottom: 25px;
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 0.9rem;
        }

        .theme2-alert-success {
            background: rgba(76, 175, 80, 0.2);
            border: 1px solid rgba(76, 175, 80, 0.3);
            color: #4caf50;
        }

        .theme2-alert-danger {
            background: rgba(244, 67, 54, 0.2);
            border: 1px solid rgba(244, 67, 54, 0.3);
            color: #ff5722;
        }

        .theme2-alert i {
            font-size: 1.2rem;
        }

        /* Form Groups */
        .theme2-form-group {
            margin-bottom: 25px;
        }

        .theme2-form-label {
            display: block;
            font-size: 0.85rem;
            font-weight: 500;
            color: rgba(255, 255, 255, 0.9);
            margin-bottom: 8px;
        }

        .theme2-form-control {
            width: 100%;
            padding: 12px 16px;
            background: rgba(255, 255, 255, 0.9);
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: 12px;
            font-size: 0.95rem;
            color: #333;
            transition: all 0.3s;
        }

        .theme2-form-control:focus {
            outline: none;
            background: #fff;
            border-color: #D4AF37;
            box-shadow: 0 0 0 3px rgba(212, 175, 55, 0.2);
        }

        .theme2-form-control::placeholder {
            color: #999;
        }

        /* ========== BLOG PAGE STYLES ========== */

        /* Blog Hero Banner */
        .theme2-blog-hero {
            margin-top: -100px;
            margin-bottom: 50px;
        }

        .theme2-blog-banner {
            position: relative;
            padding: 100px 0;
            background-size: cover;
            background-position: center;
            border-radius: 30px;
            overflow: hidden;
        }

        .theme2-blog-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: #1b4d3e;
        }

        .theme2-blog-hero-content {
            position: relative;
            z-index: 2;
            text-align: center;
        }

        .theme2-blog-hero-title {
            font-size: 3rem;
            font-weight: 800;
            color: #fff;
            margin-bottom: 15px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
        }

        .theme2-blog-hero-text {
            font-size: 1.2rem;
            color: rgba(255, 255, 255, 0.9);
        }

        /* Blog Section */
        .theme2-blog-section {
            padding: 60px 0 80px;
        }

        .theme2-blog-header {
            text-align: center;
            margin-bottom: 50px;
        }

        .theme2-blog-title {
            font-size: 2rem;
            font-weight: 700;
            color: #fff;
            margin-bottom: 10px;
        }

        .theme2-blog-subtitle {
            font-size: 1rem;
            color: rgba(255, 255, 255, 0.7);
        }

        /* Blog Grid */
        .theme2-blog-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 30px;
        }

        /* Blog Card */
        .theme2-blog-card {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            overflow: hidden;
            transition: all 0.3s;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .theme2-blog-card:hover {
            transform: translateY(-8px);
            background: rgba(255, 255, 255, 0.15);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
        }

        .theme2-blog-image {
            position: relative;
            height: 220px;
            overflow: hidden;
        }

        .theme2-blog-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s;
        }

        .theme2-blog-card:hover .theme2-blog-image img {
            transform: scale(1.05);
        }

        /* Blog Date Badge */
        .theme2-blog-date {
            position: absolute;
            top: 15px;
            left: 15px;
            background: rgba(255, 255, 255, 0.95);
            border-radius: 12px;
            padding: 8px 12px;
            text-align: center;
            min-width: 55px;
            color: #1B4D3E;
        }

        .theme2-blog-date .date-day {
            display: block;
            font-size: 1.2rem;
            font-weight: 800;
            line-height: 1;
        }

        .theme2-blog-date .date-month {
            display: block;
            font-size: 0.7rem;
            text-transform: uppercase;
        }

        /* Blog Content */
        .theme2-blog-content {
            padding: 20px;
        }

        .theme2-blog-meta {
            display: flex;
            gap: 15px;
            margin-bottom: 12px;
            font-size: 0.75rem;
            color: rgba(255, 255, 255, 0.7);
        }

        .theme2-blog-meta i {
            margin-right: 5px;
        }

        .theme2-blog-card-title {
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 10px;
            line-height: 1.4;
        }

        .theme2-blog-card-title a {
            color: #fff;
            text-decoration: none;
            transition: color 0.3s;
        }

        .theme2-blog-card-title a:hover {
            text-decoration: underline;
        }

        .theme2-blog-excerpt {
            font-size: 0.85rem;
            color: rgba(255, 255, 255, 0.8);
            line-height: 1.5;
            margin-bottom: 15px;
        }

        .theme2-blog-readmore {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-size: 0.85rem;
            font-weight: 500;
            color: #fff;
            text-decoration: none;
            transition: all 0.3s;
        }

        .theme2-blog-readmore:hover {
            gap: 12px;
            text-decoration: underline;
        }

        /* ========== BLOG DETAIL PAGE ========== */
        .theme2-blog-detail-section {
            padding: 60px 0 80px;
        }

        .theme2-blog-detail-header {
            text-align: center;
            margin-bottom: 40px;
        }

        .theme2-breadcrumb {
            margin-bottom: 20px;
            font-size: 0.9rem;
        }

        .theme2-breadcrumb a {
            color: rgba(255, 255, 255, 0.7);
            text-decoration: none;
        }

        .theme2-breadcrumb a:hover {
            color: #fff;
        }

        .theme2-breadcrumb .separator {
            margin: 0 10px;
            color: rgba(255, 255, 255, 0.5);
        }

        .theme2-breadcrumb .current {
            color: #fff;
        }

        .theme2-blog-detail-title {
            font-size: 2.5rem;
            font-weight: 800;
            color: #fff;
            margin-bottom: 20px;
            line-height: 1.3;
        }

        .theme2-blog-detail-meta {
            display: flex;
            justify-content: center;
            gap: 25px;
            flex-wrap: wrap;
        }

        .theme2-blog-detail-meta .meta-item {
            display: flex;
            align-items: center;
            gap: 8px;
            color: rgba(255, 255, 255, 0.7);
            font-size: 0.9rem;
        }

        .theme2-blog-detail-meta .meta-item i {
            font-size: 0.85rem;
        }

        /* Blog Detail Image */
        .theme2-blog-detail-image {
            margin-bottom: 40px;
            border-radius: 24px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }

        .theme2-blog-detail-image img {
            width: 100%;
            max-height: 500px;
            object-fit: cover;
        }

        /* Blog Detail Content */
        .theme2-blog-detail-content {
            max-width: 800px;
            margin: 0 auto;
        }

        .theme2-blog-content-wrapper {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 24px;
            padding: 40px;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .theme2-blog-content-wrapper p {
            margin-bottom: 20px;
            line-height: 1.8;
            color: rgba(255, 255, 255, 0.9);
        }

        .theme2-blog-content-wrapper h1,
        .theme2-blog-content-wrapper h2,
        .theme2-blog-content-wrapper h3,
        .theme2-blog-content-wrapper h4 {
            color: #fff;
            margin: 25px 0 15px;
        }

        .theme2-blog-content-wrapper img {
            max-width: 100%;
            border-radius: 12px;
            margin: 20px 0;
        }

        /* Blog Footer */
        .theme2-blog-detail-footer {
            max-width: 800px;
            margin: 40px auto 0;
            padding-top: 30px;
            border-top: 1px solid rgba(255, 255, 255, 0.2);
        }

        .theme2-share-section {
            text-align: center;
        }

        .theme2-share-title {
            font-size: 1rem;
            color: #fff;
            margin-bottom: 15px;
        }

        .theme2-share-links {
            display: flex;
            justify-content: center;
            gap: 15px;
        }

        .theme2-share-links .share-link {
            width: 40px;
            height: 40px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            text-decoration: none;
            transition: all 0.3s;
        }

        .theme2-share-links .share-link:hover {
            background: #fff;
            color: #1B4D3E;
            transform: translateY(-3px);
        }

        /* Back to Blog Button */
        .theme2-back-to-blog {
            text-align: center;
            margin-top: 40px;
        }

        .theme2-back-btn {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 12px 30px;
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: 50px;
            color: #fff;
            text-decoration: none;
            transition: all 0.3s;
        }

        .theme2-back-btn:hover {
            background: #fff;
            color: #1B4D3E;
        }

        /* No Blogs */
        .theme2-no-blogs {
            text-align: center;
            padding: 60px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 20px;
        }

        .theme2-no-blogs i {
            font-size: 4rem;
            margin-bottom: 20px;
            opacity: 0.5;
        }

        .theme2-no-blogs h3 {
            margin-bottom: 10px;
        }

        /* Responsive */
        @media (max-width: 992px) {
            .theme2-blog-grid {
                grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            }

            .theme2-blog-detail-title {
                font-size: 2rem;
            }

            .theme2-blog-hero-title {
                font-size: 2.5rem;
            }
        }

        @media (max-width: 768px) {
            .theme2-blog-grid {
                grid-template-columns: 1fr;
            }

            .theme2-blog-detail-title {
                font-size: 1.5rem;
            }

            .theme2-blog-detail-meta {
                gap: 15px;
            }

            .theme2-blog-content-wrapper {
                padding: 25px;
            }

            .theme2-blog-hero-title {
                font-size: 1.8rem;
            }
        }

        .theme2-textarea {
            resize: vertical;
            min-height: 120px;
        }

        /* Submit Button */
        .theme2-form-submit {
            text-align: center;
            margin-top: 30px;
        }

        .theme2-submit-btn {
            display: inline-block;
            padding: 14px 40px;
            background: #D4AF37;
            border: none;
            border-radius: 50px;
            color: #1B4D3E;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
        }

        .theme2-submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
            background: #C59B27;
            color: #fff;
        }

        /* Contact Info Cards */
        .theme2-contact-info {
            margin-top: 40px;
        }

        .theme2-info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 25px;
        }

        .theme2-info-card {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 30px 25px;
            text-align: center;
            transition: all 0.3s;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .theme2-info-card:hover {
            transform: translateY(-5px);
            background: rgba(255, 255, 255, 0.15);
        }

        .theme2-info-icon {
            width: 70px;
            height: 70px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
        }

        .theme2-info-icon i {
            font-size: 2rem;
            color: #fff;
        }

        .theme2-info-title {
            font-size: 1.2rem;
            font-weight: 600;
            color: #fff;
            margin-bottom: 12px;
        }

        .theme2-info-text {
            font-size: 0.9rem;
            color: rgba(255, 255, 255, 0.8);
            line-height: 1.5;
            margin: 0;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .theme2-contact-section {
                padding: 40px 0 60px;
            }

            .theme2-contact-title {
                font-size: 1.8rem;
            }

            .theme2-contact-card {
                padding: 25px;
            }

            .theme2-info-grid {
                grid-template-columns: 1fr;
                gap: 20px;
            }

            .theme2-info-card {
                padding: 20px;
            }

            .theme2-submit-btn {
                width: 100%;
            }
        }

        @media (max-width: 480px) {
            .theme2-contact-title {
                font-size: 1.5rem;
            }

            .theme2-contact-subtitle {
                font-size: 0.95rem;
            }
        }

        .theme2-thumbnail {
            width: 80px;
            height: 60px;
            cursor: pointer;
            border-radius: 8px;
            overflow: hidden;
            opacity: 0.6;
            transition: all 0.3s;
            border: 2px solid transparent;
        }

        .theme2-thumbnail.active {
            opacity: 1;
            border-color: #fff;
        }

        .theme2-thumbnail img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* Info Card */
        .theme2-info-card {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 16px;
            padding: 20px;
        }

        .theme2-info-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            flex-wrap: wrap;
            gap: 15px;
        }

        .theme2-info-title {
            font-size: 1.3rem;
            font-weight: 600;
            color: #fff;
            margin: 0;
        }

        .theme2-info-price {
            font-size: 0.9rem;
            color: rgba(255, 255, 255, 0.9);
        }

        .theme2-price {
            font-size: 1.3rem;
            font-weight: 700;
            color: #D4AF37;
            margin-left: 8px;
        }

        .theme2-info-description {
            color: rgba(255, 255, 255, 0.8);
            line-height: 1.6;
        }

        /* Section Blocks */
        .theme2-detail-section-block {
            margin-top: 30px;
        }

        .theme2-section-title {
            font-size: 1.2rem;
            font-weight: 600;
            color: #fff;
            margin-bottom: 15px;
        }

        .theme2-divider {
            border-color: rgba(255, 255, 255, 0.2);
            margin-bottom: 20px;
        }

        /* Amenities Grid */
        .theme2-amenities-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 15px;
        }

        .theme2-amenity-item {
            background: rgba(255, 255, 255, 0.05);
            border-radius: 12px;
            padding: 12px;
            display: flex;
            align-items: center;
            gap: 10px;
            transition: all 0.3s;
        }

        .theme2-amenity-item:hover {
            background: rgba(255, 255, 255, 0.1);
        }

        .theme2-check-icon {
            color: #D4AF37;
            font-size: 1rem;
        }

        .theme2-amenity-img {
            width: 40px;
            height: 40px;
            object-fit: cover;
            border-radius: 8px;
        }

        .theme2-amenity-name {
            margin: 0;
            font-size: 0.9rem;
            color: #fff;
        }

        /* Advantages List */
        .theme2-advantages-list {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 12px;
        }

        .theme2-advantage-item {
            background: rgba(255, 255, 255, 0.05);
            border-radius: 10px;
            padding: 10px 15px;
            display: flex;
            align-items: center;
            gap: 10px;
            color: rgba(255, 255, 255, 0.9);
        }

        .theme2-success-icon {
            color: #D4AF37;
        }

        /* Address */
        .theme2-address {
            background: rgba(255, 255, 255, 0.05);
            border-radius: 12px;
            padding: 15px 20px;
            display: flex;
            align-items: center;
            gap: 12px;
            color: rgba(255, 255, 255, 0.9);
        }

        .theme2-address-icon {
            color: #D4AF37;
            font-size: 1.2rem;
        }

        /* Units Grid */
        .theme2-units-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 20px;
        }

        .theme2-unit-card {
            background: rgba(255, 255, 255, 0.05);
            border-radius: 16px;
            padding: 20px;
            transition: all 0.3s;
        }

        .theme2-unit-card:hover {
            background: rgba(255, 255, 255, 0.1);
            transform: translateY(-3px);
        }

        .theme2-unit-title {
            font-size: 1.1rem;
            font-weight: 600;
            color: #fff;
            margin: 0;
        }

        .theme2-unit-divider {
            border-color: rgba(255, 255, 255, 0.2);
            margin: 15px 0;
        }

        .theme2-unit-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .theme2-unit-list li {
            display: flex;
            justify-content: space-between;
            padding: 8px 0;
            color: rgba(255, 255, 255, 0.8);
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }

        .theme2-unit-list li:last-child {
            border-bottom: none;
        }

        .theme2-unit-list strong {
            color: #fff;
        }

        /* Text Muted */
        .theme2-text-muted {
            color: rgba(255, 255, 255, 0.6);
        }

        /* Responsive */
        @media (max-width: 992px) {
            .theme2-detail-row {
                grid-template-columns: 1fr;
            }

            .theme2-detail-title {
                font-size: 1.5rem;
            }

            .theme2-amenities-grid {
                grid-template-columns: repeat(auto-fill, minmax(160px, 1fr));
            }
        }

        @media (max-width: 768px) {
            .theme2-detail-card {
                padding: 20px;
            }

            .theme2-detail-header {
                flex-direction: column;
                align-items: flex-start;
            }

            .theme2-carousel-inner {
                height: 250px;
            }

            .theme2-info-header {
                flex-direction: column;
                align-items: flex-start;
            }

            .theme2-units-grid {
                grid-template-columns: 1fr;
            }
        }

        /* Testimonials Theme 2 */
        .theme2-testimonials {
            padding: 80px 0;
        }

        .theme2-testimonial-slider {
            max-width: 900px;
            margin: 0 auto;
        }

        .theme2-testimonial-card {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 40px;
            text-align: center;
            margin: 20px;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .theme2-testimonial-avatar {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            object-fit: cover;
            margin: 0 auto 20px;
            border: 3px solid rgba(255, 255, 255, 0.3);
        }

        .theme2-testimonial-content i {
            font-size: 2rem;
            margin-bottom: 20px;
            opacity: 0.5;
            display: block;
        }

        .theme2-testimonial-content p {
            font-size: 1.2rem;
            line-height: 1.6;
            margin-bottom: 25px;
            font-style: italic;
        }

        .theme2-testimonial-content h4 {
            margin-bottom: 5px;
            font-size: 1.1rem;
        }

        .theme2-testimonial-content span {
            opacity: 0.7;
            font-size: 0.9rem;
        }

        /* Owl Carousel Navigation for Theme 2 */
        .theme2-testimonial-slider .owl-nav button {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background: rgba(255, 255, 255, 0.2) !important;
            width: 40px;
            height: 40px;
            border-radius: 50% !important;
            color: #fff !important;
            font-size: 20px !important;
        }

        .theme2-testimonial-slider .owl-nav button.owl-prev {
            left: -50px;
        }

        .theme2-testimonial-slider .owl-nav button.owl-next {
            right: -50px;
        }

        .theme2-testimonial-slider .owl-dots {
            text-align: center;
            margin-top: 30px;
        }

        /* ========== PROPERTY GRID ========== */
        .theme2-property-row {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 25px;
            margin: 0 -15px;
            padding: 0 15px;
        }

        /* Same as col-sm-6 col-xl-3 */
        .theme2-property-col {
            width: 100%;
            padding: 0 15px;
        }

        /* Property Card - Glassmorphism Style */
        .theme2-listing-card {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 16px;
            overflow: hidden;
            transition: all 0.3s ease;
            border: 1px solid rgba(255, 255, 255, 0.2);
            height: 100%;
        }

        .theme2-listing-card:hover {
            transform: translateY(-5px);
            background: rgba(255, 255, 255, 0.15);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }

        /* Thumbnail Image */
        .theme2-list-thumb {
            position: relative;
            overflow: hidden;
            height: 220px;
        }

        .theme2-list-thumb img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .theme2-listing-card:hover .theme2-list-thumb img {
            transform: scale(1.05);
        }

        /* Badge on Image */
        .theme2-property-badge {
            position: absolute;
            top: 15px;
            left: 15px;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .theme2-property-badge.sale {
            background: #D4AF37;
            color: #1B4D3E;
        }

        .theme2-property-badge.rent {
            background: #1B4D3E;
            color: #D4AF37;
        }

        /* Price on Image */
        .theme2-property-price {
            position: absolute;
            bottom: 15px;
            right: 15px;
            background: rgba(0, 0, 0, 0.7);
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 14px;
            font-weight: 700;
            color: #D4AF37;
        }

        /* Card Content */
        .theme2-list-content {
            padding: 20px;
        }

        /* Property Type Badge */
        .theme2-list-type {
            margin-bottom: 10px;
        }

        .theme2-type-badge {
            display: inline-block;
            background: rgba(255, 255, 255, 0.2);
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 500;
            color: #fff;
        }

        /* Title */
        .theme2-list-title {
            margin-bottom: 10px;
            font-size: 1.1rem;
            font-weight: 600;
        }

        .theme2-list-title a {
            color: #fff;
            text-decoration: none;
            transition: color 0.3s;
        }

        .theme2-list-title a:hover {
            text-decoration: underline;
        }

        /* Description */
        .theme2-list-desc {
            font-size: 13px;
            opacity: 0.8;
            margin-bottom: 15px;
            line-height: 1.5;
        }

        /* Meta Section - Address and Link */
        .theme2-list-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 10px;
            padding-top: 12px;
            border-top: 1px solid rgba(255, 255, 255, 0.2);
        }

        .theme2-list-address {
            font-size: 12px;
            margin-bottom: 0;
            opacity: 0.8;
        }

        .theme2-list-address i {
            margin-right: 5px;
        }

        .theme2-view-link {
            font-size: 13px;
            font-weight: 500;
            color: #fff;
            text-decoration: none;
            transition: all 0.3s;
        }

        .theme2-view-link:hover {
            text-decoration: underline;
            opacity: 0.8;
        }

        /* ========== PAGINATION ========== */
        .theme2-pagination-wrapper {
            text-align: center;
            margin-top: 50px;
        }

        .theme2-pagination-list {
            display: inline-flex;
            gap: 8px;
            list-style: none;
            flex-wrap: wrap;
            justify-content: center;
            margin-bottom: 15px;
        }

        .theme2-pagination-list li a,
        .theme2-pagination-list li span {
            display: inline-block;
            padding: 8px 14px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 8px;
            color: #fff;
            text-decoration: none;
            transition: all 0.3s;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .theme2-pagination-list li.active a,
        .theme2-pagination-list li a:hover {
            background: #D4AF37;
            color: #1B4D3E;
        }

        .theme2-pagination-list li.disabled span {
            opacity: 0.5;
            cursor: not-allowed;
        }

        .theme2-pagination-info {
            font-size: 13px;
            opacity: 0.8;
            margin-top: 15px;
        }

        /* ========== NO PROPERTIES ========== */
        .theme2-no-properties-col {
            width: 100%;
            padding: 0 15px;
        }

        .theme2-no-properties {
            text-align: center;
            padding: 60px 20px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 16px;
        }

        .theme2-no-properties i {
            font-size: 48px;
            margin-bottom: 15px;
            opacity: 0.5;
        }

        .theme2-no-properties p {
            margin: 0;
            opacity: 0.8;
        }

        /* ========== RESPONSIVE ========== */
        @media (min-width: 576px) {
            .theme2-property-row {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (min-width: 992px) {
            .theme2-property-row {
                grid-template-columns: repeat(3, 1fr);
            }
        }

        @media (min-width: 1200px) {
            .theme2-property-row {
                grid-template-columns: repeat(4, 1fr);
            }
        }

        @media (max-width: 767px) {
            .theme2-property-row {
                grid-template-columns: 1fr;
            }

            .theme2-list-meta {
                flex-direction: column;
                align-items: flex-start;
            }
        }

        .theme2-testimonial-slider .owl-dot {
            display: inline-block;
            margin: 0 5px;
        }

        .theme2-testimonial-slider .owl-dot span {
            width: 10px;
            height: 10px;
            background: rgba(255, 255, 255, 0.3);
            display: block;
            border-radius: 50%;
        }

        .theme2-testimonial-slider .owl-dot.active span {
            background: #fff;
        }

        .theme2-wrapper {
            overflow-x: hidden;
        }

        .theme2-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 30px;
        }

        /* Preloader */
        .theme2-preloader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: #1B4D3E;
            z-index: 9999;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .theme2-loader {
            width: 50px;
            height: 50px;
            border: 3px solid rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            border-top-color: #D4AF37;
            animation: spin 1s ease-in-out infinite;
        }

        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }

        /* Navigation */
        .theme2-nav {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 1000;
            padding: 20px 0;
            transition: all 0.3s ease;
        }

        .theme2-nav.scrolled {
            background: rgba(0, 0, 0, 0.3);
            backdrop-filter: blur(20px);
            padding: 15px 0;
        }

        .theme2-nav-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .theme2-logo img {
            height: 50px;
            filter: brightness(0) invert(1);
        }

        .theme2-nav-menu {
            display: flex;
            gap: 40px;
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .theme2-nav-menu a {
            color: #fff;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s;
            position: relative;
        }

        .theme2-nav-menu a::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 0;
            height: 2px;
            background: #D4AF37;
            transition: width 0.3s;
        }

        .theme2-nav-menu a:hover::after,
        .theme2-nav-menu a.active::after {
            width: 100%;
        }

        .theme2-nav-menu a:hover,
        .theme2-nav-menu a.active {
            color: #D4AF37;
        }

        /* Main Content */
        .theme2-main {
            padding-top: 100px;
        }

        /* Hero Section */
        .theme2-hero-section {
            padding: 60px 0;
        }

        .theme2-hero-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 60px;
            align-items: center;
        }

        .theme2-hero-title {
            font-size: 3.5rem;
            font-weight: 800;
            margin-bottom: 20px;
            background: linear-gradient(135deg, #fff, #D4AF37);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .theme2-hero-text {
            font-size: 1.2rem;
            margin-bottom: 30px;
            opacity: 0.9;
            line-height: 1.6;
        }

        .theme2-hero-image img {
            width: 100%;
            border-radius: 20px;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        /* Buttons */
        .theme2-btn {
            display: inline-block;
            padding: 12px 30px;
            border-radius: 50px;
            text-decoration: none;
            transition: all 0.3s;
            font-weight: 500;
            cursor: pointer;
        }

        .theme2-btn-primary {
            background: rgba(255, 255, 255, 0.2);
            border: 1px solid rgba(255, 255, 255, 0.3);
            color: #fff;
        }

        .theme2-btn-primary:hover {
            background: #D4AF37;
            color: #1B4D3E;
            transform: translateY(-2px);
        }

        .theme2-btn-secondary {
            background: #D4AF37;
            color: #1B4D3E;
        }

        .theme2-btn-link {
            color: #fff;
            text-decoration: none;
            display: inline-block;
            margin-top: 10px;
        }

        .theme2-btn-link:hover {
            color: #D4AF37;
        }

        /* Section Header */
        .theme2-section-header {
            text-align: center;
            margin-bottom: 50px;
        }

        .theme2-section-header h2 {
            font-size: 2.5rem;
            margin-bottom: 15px;
        }

        .theme2-section-header p {
            font-size: 1.1rem;
            opacity: 0.8;
        }

        /* Features Grid */
        .theme2-features {
            padding: 80px 0;
        }

        .theme2-features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 30px;
        }

        .theme2-feature-card {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 30px;
            text-align: center;
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: all 0.3s;
        }

        .theme2-feature-card:hover {
            transform: translateY(-10px);
            background: rgba(255, 255, 255, 0.15);
        }

        .theme2-feature-icon img {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 50%;
            margin-bottom: 20px;
        }

        .theme2-feature-card h3 {
            margin-bottom: 15px;
            font-size: 1.3rem;
        }

        .theme2-feature-card p {
            opacity: 0.8;
            line-height: 1.5;
        }

        /* Funfact */
        .theme2-funfact {
            background: rgba(0, 0, 0, 0.2);
            padding: 60px 0;
            margin: 40px 0;
        }

        .theme2-funfact-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 30px;
            text-align: center;
        }

        .theme2-funfact-card {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            padding: 30px;
            border-radius: 20px;
        }

        .theme2-funfact-number {
            font-size: 3rem;
            font-weight: 800;
            margin-bottom: 10px;
            color: #D4AF37;
        }

        /* Amenities */
        .theme2-amenities {
            padding: 80px 0;
        }

        .theme2-amenities-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 30px;
        }

        .theme2-amenity-card {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            padding: 20px;
            text-align: center;
            transition: all 0.3s;
        }

        .theme2-amenity-card:hover {
            transform: translateY(-5px);
        }

        .theme2-amenity-card img {
            width: 100%;
            height: 150px;
            object-fit: cover;
            border-radius: 10px;
            margin-bottom: 15px;
        }

        .theme2-amenity-card h4 {
            margin-bottom: 10px;
        }

        /* CTA Section */
        .theme2-cta {
            padding: 80px 0;
            background: rgba(0, 0, 0, 0.2);
        }

        .theme2-cta .theme2-container {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 50px;
            align-items: center;
        }

        .theme2-cta-content h2 {
            font-size: 2rem;
            margin-bottom: 30px;
        }

        .theme2-cta-item {
            margin-bottom: 20px;
            padding: 15px;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 10px;
        }

        .theme2-cta img {
            width: 100%;
            border-radius: 20px;
        }

        /* Properties Section */
        .theme2-properties {
            padding: 80px 0;
        }

        .theme2-properties-header {
            text-align: center;
            margin-bottom: 50px;
        }

        .theme2-property-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 30px;
        }

        .theme2-property-card {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            overflow: hidden;
            transition: all 0.3s;
        }

        .theme2-property-card:hover {
            transform: translateY(-5px);
        }

        .theme2-property-image {
            height: 250px;
            overflow: hidden;
        }

        .theme2-property-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s;
        }

        .theme2-property-card:hover .theme2-property-image img {
            transform: scale(1.1);
        }

        .theme2-property-info {
            padding: 20px;
        }

        .theme2-property-info h3 {
            margin-bottom: 10px;
        }

        .theme2-property-info p {
            opacity: 0.8;
            margin-bottom: 15px;
        }

        .theme2-property-meta {
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
            padding: 10px 0;
            border-top: 1px solid rgba(255, 255, 255, 0.2);
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
        }

        .theme2-property-type {
            background: rgba(255, 255, 255, 0.2);
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 0.85rem;
        }

        .theme2-property-price {
            font-size: 1.3rem;
            font-weight: bold;
            color: #D4AF37;
        }

        /* Tab Buttons */
        .theme2-tab-buttons {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-top: 40px;
        }

        .theme2-tab-btn {
            padding: 10px 25px;
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: 50px;
            color: #fff;
            cursor: pointer;
            transition: all 0.3s;
        }

        .theme2-tab-btn.active,
        .theme2-tab-btn:hover {
            background: #D4AF37;
            color: #1B4D3E;
            border-color: #D4AF37;
        }

        /* Banner Section */
        .theme2-banner {
            padding: 80px 0;
            background: rgba(0, 0, 0, 0.3);
        }

        .theme2-banner .theme2-container {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 50px;
            align-items: center;
        }

        .theme2-banner-content h2 {
            font-size: 2rem;
            margin-bottom: 20px;
        }

        .theme2-banner-content p {
            margin-bottom: 25px;
            opacity: 0.9;
        }

        .theme2-banner img {
            width: 100%;
            border-radius: 20px;
        }

        /* Testimonials */
        .theme2-testimonials {
            padding: 80px 0;
        }

        /* ========== SEARCH BOX SECTION ========== */
        .theme2-breadcumb-section {
            position: relative;
            margin-top: -100px;
        }

        .theme2-cta-banner {
            position: relative;
            padding: 80px 0;
            border-radius: 20px;
            overflow: hidden;
        }

        .theme2-banner-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: #1b4d3e;
        }

        .theme2-banner-content {
            position: relative;
            z-index: 2;
        }

        .theme2-banner-title {
            font-size: 2.5rem;
            font-weight: 700;
            color: #fff;
            margin-bottom: 15px;
        }

        .theme2-banner-subtitle {
            font-size: 1.1rem;
            color: rgba(255, 255, 255, 0.9);
            margin-bottom: 30px;
        }

        /* Search Box */
        .theme2-search-box {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(10px);
            border-radius: 16px;
            padding: 25px;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .theme2-search-row {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
            gap: 15px;
            align-items: end;
        }

        .theme2-search-group {
            display: flex;
            flex-direction: column;
        }

        .theme2-search-label {
            font-size: 14px;
            font-weight: 500;
            color: rgba(255, 255, 255, 0.9);
            margin-bottom: 8px;
        }

        .theme2-search-select {
            width: 100%;
            padding: 12px 15px;
            background: rgba(255, 255, 255, 0.9);
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: 10px;
            font-size: 14px;
            color: #333;
            cursor: pointer;
            transition: all 0.3s;
        }

        .theme2-search-select:focus {
            outline: none;
            background: #fff;
            box-shadow: 0 0 0 2px rgba(255, 255, 255, 0.3);
        }

        .theme2-search-btn {
            width: 100%;
            padding: 12px 20px;
            background: #D4AF37;
            border: none;
            border-radius: 10px;
            color: #1B4D3E;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
        }

        .theme2-search-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            background: #C59B27;
            color: #fff;
        }

        .theme2-reset-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            padding: 12px 20px;
            background: rgba(255, 255, 255, 0.2);
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: 10px;
            color: #fff;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s;
        }

        .theme2-reset-btn:hover {
            background: rgba(255, 255, 255, 0.3);
            color: #fff;
            text-decoration: none;
        }

        /* Properties List Section */
        .theme2-properties-list {
            padding: 60px 0;
        }

        .theme2-section-title {
            font-size: 2rem;
            margin-bottom: 40px;
            color: #fff;
        }

        /* Responsive */
        @media (max-width: 992px) {
            .theme2-search-row {
                grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            }

            .theme2-banner-title {
                font-size: 2rem;
            }
        }

        @media (max-width: 768px) {
            .theme2-search-row {
                grid-template-columns: 1fr;
            }

            .theme2-cta-banner {
                padding: 50px 0;
            }

            .theme2-banner-title {
                font-size: 1.5rem;
            }
        }

        .theme2-testimonial-slider {
            max-width: 800px;
            margin: 0 auto;
        }

        .theme2-testimonial-card {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 40px;
            text-align: center;
        }

        .theme2-testimonial-content i {
            font-size: 2rem;
            margin-bottom: 20px;
            opacity: 0.5;
            color: #D4AF37;
        }

        .theme2-testimonial-content p {
            font-size: 1.2rem;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        .theme2-testimonial-content h4 {
            margin-bottom: 5px;
        }

        .theme2-testimonial-content span {
            opacity: 0.7;
        }

        /* Back to Top */
        .theme2-back-to-top {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            color: #D4AF37;
            cursor: pointer;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s;
        }

        .theme2-back-to-top.show {
            opacity: 1;
            visibility: visible;
        }

        .theme2-back-to-top:hover {
            background: #D4AF37;
            color: #1B4D3E;
        }

        /* Responsive */
        @media (max-width: 992px) {

            .theme2-hero-grid,
            .theme2-cta .theme2-container,
            .theme2-banner .theme2-container {
                grid-template-columns: 1fr;
                gap: 40px;
            }

            .theme2-hero-title {
                font-size: 2.5rem;
            }

            .theme2-funfact-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .theme2-nav-menu {
                display: none;
            }
        }

        @media (max-width: 768px) {
            .theme2-container {
                padding: 0 20px;
            }

            .theme2-property-grid {
                grid-template-columns: 1fr;
            }

            .theme2-funfact-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
