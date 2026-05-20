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
    <title>{{ !empty($settings['app_name']) ? $settings['app_name'] : env('APP_NAME') }} - Neon Cyberpunk Theme</title>

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

    <!-- Theme 5 Fonts - Space Grotesk for Cyberpunk feel -->
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Theme 5 CSS - Neon Cyberpunk Design -->
    <link rel="stylesheet" href="{{ asset('theme5/css/style.css') }}">

    @stack('css-page')
    @stack('theme5-css')

    <style>
        /* Theme 5 - Neon Cyberpunk Base Styles */
        :root {
            --neon-cyan: #00f3ff;
            --neon-pink: #ff00ff;
            --neon-purple: #b200ff;
            --neon-yellow: #ffee00;
            --neon-green: #00ff88;
            --dark-bg: #0a0a0a;
            --darker-bg: #050505;
            --card-bg: rgba(10, 10, 10, 0.8);
            --glass-border: rgba(0, 243, 255, 0.2);
            --glow-cyan: 0 0 20px rgba(0, 243, 255, 0.5);
            --glow-pink: 0 0 20px rgba(255, 0, 255, 0.5);
            --glow-purple: 0 0 20px rgba(178, 0, 255, 0.5);
        }

        body {
            font-family: 'Space Grotesk', sans-serif;
            background: var(--dark-bg);
            color: #fff;
            overflow-x: hidden;
        }
    </style>
</head>
