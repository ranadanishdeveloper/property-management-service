@extends('layouts.app')
@section('page-title')
    {{ __('Frontend Theme') }}
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a></li>
    <li class="breadcrumb-item" aria-current="page">{{ __('Frontend Theme') }}</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center g-2">
                        <div class="col">
                            <h5>{{ __('Website Themes') }}</h5>
                            <p class="text-muted mb-0">{{ __('Select a theme for your property website frontend') }}</p>
                        </div>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <div class="row">
                        <!-- Theme 1 -->
                        <div class="col-md-4 mb-4">
                            <div class="card theme-card {{ Auth::user()->frontend_theme == 1 ? 'border-primary border-3 active-theme' : '' }}" style="height: 100%;">
                                <div class="card-body text-center">
                                    <!-- Progress Bar for Active Theme -->
                                    @if(Auth::user()->frontend_theme == 1)
                                    <div class="theme-active-progress mb-3">
                                        <div class="progress-bar-animated">
                                            <div class="progress-bar-fill"></div>
                                        </div>
                                        <span class="active-badge"><i class="ti ti-check"></i> ACTIVE</span>
                                    </div>
                                    @endif

                                    <div class="theme-preview mb-3">
                                        <div class="theme-preview-img" style="background: linear-gradient(135deg, #667eea, #764ba2); height: 140px; border-radius: 12px; display: flex; align-items: center; justify-content: center;">
                                            <i class="ti ti-building-skyscraper" style="font-size: 48px; color: #fff; opacity: 0.8;"></i>
                                        </div>
                                    </div>
                                    <h5 class="mt-3 mb-1">Theme 1 - Corporate</h5>
                                    <p class="text-muted small mb-2">Purple gradient - Glassmorphism design</p>
                                    <div class="theme-features mb-3">
                                        <span class="badge bg-info">Modern</span>
                                        <span class="badge bg-info">Glassmorphism</span>
                                        <span class="badge bg-info">Responsive</span>
                                    </div>
                                    <form action="{{ route('theme.update') }}" method="POST" class="theme-form">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="frontend_theme" value="1">
                                        <button type="submit" class="btn {{ Auth::user()->frontend_theme == 1 ? 'btn-primary' : 'btn-outline-primary' }} w-100 theme-btn">
                                            {{ Auth::user()->frontend_theme == 1 ? '✓ Active Theme' : 'Activate Theme' }}
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- Theme 2 -->
                        <div class="col-md-4 mb-4">
                            <div class="card theme-card {{ Auth::user()->frontend_theme == 2 ? 'border-primary border-3 active-theme' : '' }}" style="height: 100%;">
                                <div class="card-body text-center">
                                    @if(Auth::user()->frontend_theme == 2)
                                    <div class="theme-active-progress mb-3">
                                        <div class="progress-bar-animated">
                                            <div class="progress-bar-fill"></div>
                                        </div>
                                        <span class="active-badge"><i class="ti ti-check"></i> ACTIVE</span>
                                    </div>
                                    @endif

                                    <div class="theme-preview mb-3">
                                        <div class="theme-preview-img" style="background: #1B4D3E; height: 140px; border-radius: 12px; display: flex; align-items: center; justify-content: center; position: relative;">
                                            <i class="ti ti-leaf" style="font-size: 48px; color: #D4AF37; opacity: 0.8;"></i>
                                            <div style="position: absolute; bottom: 10px; right: 10px; width: 30px; height: 30px; background: #D4AF37; border-radius: 50%;"></div>
                                        </div>
                                    </div>
                                    <h5 class="mt-3 mb-1">Theme 2 - Forest & Gold</h5>
                                    <p class="text-muted small mb-2">Forest green with elegant gold accents</p>
                                    <div class="theme-features mb-3">
                                        <span class="badge bg-success">Elegant</span>
                                        <span class="badge bg-warning">Gold Accents</span>
                                        <span class="badge bg-info">Responsive</span>
                                    </div>
                                    <form action="{{ route('theme.update') }}" method="POST" class="theme-form">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="frontend_theme" value="2">
                                        <button type="submit" class="btn {{ Auth::user()->frontend_theme == 2 ? 'btn-primary' : 'btn-outline-primary' }} w-100 theme-btn">
                                            {{ Auth::user()->frontend_theme == 2 ? '✓ Active Theme' : 'Activate Theme' }}
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- Theme 3 -->
                        <div class="col-md-4 mb-4">
                            <div class="card theme-card {{ Auth::user()->frontend_theme == 3 ? 'border-primary border-3 active-theme' : '' }}" style="height: 100%;">
                                <div class="card-body text-center">
                                    @if(Auth::user()->frontend_theme == 3)
                                    <div class="theme-active-progress mb-3">
                                        <div class="progress-bar-animated">
                                            <div class="progress-bar-fill"></div>
                                        </div>
                                        <span class="active-badge"><i class="ti ti-check"></i> ACTIVE</span>
                                    </div>
                                    @endif

                                    <div class="theme-preview mb-3">
                                        <div class="theme-preview-img" style="background: #1A2A4F; height: 140px; border-radius: 12px; display: flex; align-items: center; justify-content: center; position: relative;">
                                            <i class="ti ti-crown" style="font-size: 48px; color: #C6A43F; opacity: 0.8;"></i>
                                            <div style="position: absolute; bottom: 10px; right: 10px; width: 30px; height: 30px; background: #C6A43F; border-radius: 50%;"></div>
                                        </div>
                                    </div>
                                    <h5 class="mt-3 mb-1">Theme 3 - Navy & Gold</h5>
                                    <p class="text-muted small mb-2">Navy blue with gold accents - Brutalist style</p>
                                    <div class="theme-features mb-3">
                                        <span class="badge bg-primary">Luxury</span>
                                        <span class="badge bg-warning">Gold Accents</span>
                                        <span class="badge bg-secondary">Brutalist</span>
                                    </div>
                                    <form action="{{ route('theme.update') }}" method="POST" class="theme-form">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="frontend_theme" value="3">
                                        <button type="submit" class="btn {{ Auth::user()->frontend_theme == 3 ? 'btn-primary' : 'btn-outline-primary' }} w-100 theme-btn">
                                            {{ Auth::user()->frontend_theme == 3 ? '✓ Active Theme' : 'Activate Theme' }}
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('css-page')
<style>
    .theme-card {
        transition: all 0.3s;
        position: relative;
        overflow: hidden;
    }
    .theme-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 5px 20px rgba(0,0,0,0.1);
    }
    .active-theme {
        border-color: #0066cc !important;
        position: relative;
        background: linear-gradient(135deg, rgba(0,102,204,0.02), rgba(0,102,204,0.05));
    }
    .theme-features .badge {
        margin: 0 3px;
        padding: 5px 10px;
    }

    /* Animated Progress Bar */
    .theme-active-progress {
        position: relative;
        margin-bottom: 15px;
        text-align: center;
    }
    .progress-bar-animated {
        width: 100%;
        height: 4px;
        background: #e0e0e0;
        border-radius: 4px;
        overflow: hidden;
        margin-bottom: 8px;
    }
    .progress-bar-fill {
        width: 0%;
        height: 100%;
        background: linear-gradient(90deg, #0066cc, #00cc66);
        border-radius: 4px;
        animation: progressFill 1s ease-out forwards;
    }
    @keyframes progressFill {
        0% { width: 0%; }
        50% { width: 70%; }
        100% { width: 100%; }
    }
    .active-badge {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        background: linear-gradient(135deg, #0066cc, #00cc66);
        color: #fff;
        padding: 4px 12px;
        border-radius: 20px;
        font-size: 11px;
        font-weight: 600;
        animation: pulse 1s ease-in-out;
    }
    .active-badge i {
        font-size: 12px;
    }
    @keyframes pulse {
        0% { transform: scale(0.8); opacity: 0; }
        50% { transform: scale(1.1); }
        100% { transform: scale(1); opacity: 1; }
    }

    /* Button Loading Animation */
    .theme-btn.loading {
        position: relative;
        pointer-events: none;
        opacity: 0.7;
    }
    .theme-btn.loading::after {
        content: '';
        position: absolute;
        width: 16px;
        height: 16px;
        top: 50%;
        right: 15px;
        margin-top: -8px;
        border: 2px solid #fff;
        border-radius: 50%;
        border-top-color: transparent;
        animation: spin 0.6s linear infinite;
    }
    @keyframes spin {
        to { transform: rotate(360deg); }
    }
</style>
@endpush

@push('script-page')
<script>
    $(document).ready(function() {
        // Add loading animation on form submit
        $('.theme-form').on('submit', function() {
            var btn = $(this).find('.theme-btn');
            btn.addClass('loading');
            btn.html('<i class="ti ti-loader"></i> Activating...');
        });
    });
</script>
@endpush
