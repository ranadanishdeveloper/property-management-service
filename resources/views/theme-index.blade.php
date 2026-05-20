@extends('layouts.app')
@section('page-title')
    {{ __('Frontend Theme') }}
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a></li>
    <li class="breadcrumb-item" aria-current="page">{{ __('Frontend Theme') }}</li>
@endsection

@section('content')
    <!-- Global Progress Bar (Hidden by default) -->
    <div id="globalProgressBar" style="display: none; position: fixed; top: 0; left: 0; right: 0; z-index: 9999;">
        <div
            style="background: linear-gradient(135deg, #6366f1, #a855f7, #ec4899); height: 4px; width: 0%; transition: width 0.3s ease; box-shadow: 0 0 10px rgba(99,102,241,0.5);">
        </div>
        <div
            style="background: rgba(0,0,0,0.8); padding: 8px 20px; text-align: center; font-size: 12px; color: white; display: flex; align-items: center; justify-content: center; gap: 15px; flex-wrap: wrap;">
            <span id="progressStep"
                style="background: rgba(255,255,255,0.2); padding: 4px 12px; border-radius: 20px;">10%</span>
            <span id="progressMessage">Initializing theme activation...</span>
            <div style="display: flex; gap: 8px;">
                <span id="step10" class="progress-step-dot">10%</span>
                <span id="step25" class="progress-step-dot">25%</span>
                <span id="step50" class="progress-step-dot">50%</span>
                <span id="step75" class="progress-step-dot">75%</span>
                <span id="step100" class="progress-step-dot">100%</span>
            </div>
        </div>
    </div>

    <!-- Image Preview Modal -->
    <div class="modal fade" id="themePreviewModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content" style="background: #1a1a2e; border-radius: 16px;">
                <div class="modal-header border-0" style="padding: 20px 25px 0;">
                    <h5 class="modal-title" id="previewModalTitle" style="color: white; font-weight: 600;">Theme Preview</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" style="padding: 20px 25px 25px;">
                    <img id="previewModalImage" src="" alt="Theme Preview" style="width: 100%; border-radius: 12px; box-shadow: 0 10px 30px rgba(0,0,0,0.3);">
                </div>
            </div>
        </div>
    </div>

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
                        <!-- Theme 1 - Corporate -->
                        <div class="col-md-2-4 mb-4">
                            <div class="card theme-card {{ Auth::user()->frontend_theme == 1 ? 'border-primary border-3 active-theme' : '' }}"
                                style="height: 100%;">
                                <div class="card-body text-center">
                                    @if (Auth::user()->frontend_theme == 1)
                                        <div class="theme-active-progress mb-3">
                                            <div class="progress-bar-animated">
                                                <div class="progress-bar-fill"></div>
                                            </div>
                                            <span class="active-badge"><i class="ti ti-check"></i> ACTIVE</span>
                                        </div>
                                    @endif

                                    <!-- View Icon on Top Right -->
                                    <div class="theme-view-icon" onclick="event.stopPropagation(); openThemePreview(1)">
                                        <i class="ti ti-eye"></i>
                                    </div>

                                    <div class="theme-preview mb-3">
                                        <div class="theme-preview-img"
                                            style="background: linear-gradient(135deg, #667eea, #764ba2); height: 140px; border-radius: 12px; display: flex; align-items: center; justify-content: center;">
                                            <i class="ti ti-building-skyscraper"
                                                style="font-size: 48px; color: #fff; opacity: 0.8;"></i>
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
                                        <button type="submit"
                                            class="btn {{ Auth::user()->frontend_theme == 1 ? 'btn-primary' : 'btn-outline-primary' }} w-100 theme-btn">
                                            {{ Auth::user()->frontend_theme == 1 ? '✓ Active Theme' : 'Activate Theme' }}
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- Theme 2 - Forest & Gold -->
                        <div class="col-md-2-4 mb-4">
                            <div class="card theme-card {{ Auth::user()->frontend_theme == 2 ? 'border-primary border-3 active-theme' : '' }}"
                                style="height: 100%;">
                                <div class="card-body text-center">
                                    @if (Auth::user()->frontend_theme == 2)
                                        <div class="theme-active-progress mb-3">
                                            <div class="progress-bar-animated">
                                                <div class="progress-bar-fill"></div>
                                            </div>
                                            <span class="active-badge"><i class="ti ti-check"></i> ACTIVE</span>
                                        </div>
                                    @endif

                                    <div class="theme-view-icon" onclick="event.stopPropagation(); openThemePreview(2)">
                                        <i class="ti ti-eye"></i>
                                    </div>

                                    <div class="theme-preview mb-3">
                                        <div class="theme-preview-img"
                                            style="background: #1B4D3E; height: 140px; border-radius: 12px; display: flex; align-items: center; justify-content: center; position: relative;">
                                            <i class="ti ti-leaf"
                                                style="font-size: 48px; color: #D4AF37; opacity: 0.8;"></i>
                                            <div
                                                style="position: absolute; bottom: 10px; right: 10px; width: 30px; height: 30px; background: #D4AF37; border-radius: 50%;">
                                            </div>
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
                                        <button type="submit"
                                            class="btn {{ Auth::user()->frontend_theme == 2 ? 'btn-primary' : 'btn-outline-primary' }} w-100 theme-btn">
                                            {{ Auth::user()->frontend_theme == 2 ? '✓ Active Theme' : 'Activate Theme' }}
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- Theme 3 - Navy & Gold -->
                        <div class="col-md-2-4 mb-4">
                            <div class="card theme-card {{ Auth::user()->frontend_theme == 3 ? 'border-primary border-3 active-theme' : '' }}"
                                style="height: 100%;">
                                <div class="card-body text-center">
                                    @if (Auth::user()->frontend_theme == 3)
                                        <div class="theme-active-progress mb-3">
                                            <div class="progress-bar-animated">
                                                <div class="progress-bar-fill"></div>
                                            </div>
                                            <span class="active-badge"><i class="ti ti-check"></i> ACTIVE</span>
                                        </div>
                                    @endif

                                    <div class="theme-view-icon" onclick="event.stopPropagation(); openThemePreview(3)">
                                        <i class="ti ti-eye"></i>
                                    </div>

                                    <div class="theme-preview mb-3">
                                        <div class="theme-preview-img"
                                            style="background: #1A2A4F; height: 140px; border-radius: 12px; display: flex; align-items: center; justify-content: center; position: relative;">
                                            <i class="ti ti-crown"
                                                style="font-size: 48px; color: #C6A43F; opacity: 0.8;"></i>
                                            <div
                                                style="position: absolute; bottom: 10px; right: 10px; width: 30px; height: 30px; background: #C6A43F; border-radius: 50%;">
                                            </div>
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
                                        <button type="submit"
                                            class="btn {{ Auth::user()->frontend_theme == 3 ? 'btn-primary' : 'btn-outline-primary' }} w-100 theme-btn">
                                            {{ Auth::user()->frontend_theme == 3 ? '✓ Active Theme' : 'Activate Theme' }}
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- Theme 4 - Dark Luxury -->
                        <div class="col-md-2-4 mb-4">
                            <div class="card theme-card {{ Auth::user()->frontend_theme == 4 ? 'border-primary border-3 active-theme' : '' }}"
                                style="height: 100%;">
                                <div class="card-body text-center">
                                    @if (Auth::user()->frontend_theme == 4)
                                        <div class="theme-active-progress mb-3">
                                            <div class="progress-bar-animated">
                                                <div class="progress-bar-fill"></div>
                                            </div>
                                            <span class="active-badge"><i class="ti ti-check"></i> ACTIVE</span>
                                        </div>
                                    @endif

                                    <div class="theme-view-icon" onclick="event.stopPropagation(); openThemePreview(4)">
                                        <i class="ti ti-eye"></i>
                                    </div>

                                    <div class="theme-preview mb-3">
                                        <div class="theme-preview-img"
                                            style="background: linear-gradient(135deg, #050505, #0f172a); height: 140px; border-radius: 12px; display: flex; align-items: center; justify-content: center; position: relative;">
                                            <i class="ti ti-stars"
                                                style="font-size: 48px; color: #a855f7; opacity: 0.8;"></i>
                                            <div
                                                style="position: absolute; top: 10px; right: 10px; width: 20px; height: 20px; background: #6366f1; border-radius: 50%;">
                                            </div>
                                            <div
                                                style="position: absolute; bottom: 10px; left: 10px; width: 15px; height: 15px; background: #ec4899; border-radius: 50%;">
                                            </div>
                                        </div>
                                    </div>
                                    <h5 class="mt-3 mb-1">Theme 4 - Dark Luxury</h5>
                                    <p class="text-muted small mb-2">Dark theme with purple/pink gradient accents</p>
                                    <div class="theme-features mb-3">
                                        <span class="badge bg-dark">Dark Mode</span>
                                        <span class="badge bg-primary">Purple Accents</span>
                                        <span class="badge bg-info">Neumorphism</span>
                                    </div>
                                    <form action="{{ route('theme.update') }}" method="POST" class="theme-form">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="frontend_theme" value="4">
                                        <button type="submit"
                                            class="btn {{ Auth::user()->frontend_theme == 4 ? 'btn-primary' : 'btn-outline-primary' }} w-100 theme-btn">
                                            {{ Auth::user()->frontend_theme == 4 ? '✓ Active Theme' : 'Activate Theme' }}
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- Theme 5 - Light & Modern -->
                        <div class="col-md-2-4 mb-4">
                            <div class="card theme-card {{ Auth::user()->frontend_theme == 5 ? 'border-primary border-3 active-theme' : '' }}"
                                style="height: 100%;">
                                <div class="card-body text-center">
                                    @if (Auth::user()->frontend_theme == 5)
                                        <div class="theme-active-progress mb-3">
                                            <div class="progress-bar-animated">
                                                <div class="progress-bar-fill"></div>
                                            </div>
                                            <span class="active-badge"><i class="ti ti-check"></i> ACTIVE</span>
                                        </div>
                                    @endif

                                    <div class="theme-view-icon" onclick="event.stopPropagation(); openThemePreview(5)">
                                        <i class="ti ti-eye"></i>
                                    </div>

                                    <div class="theme-preview mb-3">
                                        <div class="theme-preview-img"
                                            style="background: linear-gradient(135deg, #f0f9ff, #e0f2fe); height: 140px; border-radius: 12px; display: flex; align-items: center; justify-content: center; position: relative;">
                                            <i class="ti ti-sun"
                                                style="font-size: 48px; color: #3b82f6; opacity: 0.8;"></i>
                                            <div
                                                style="position: absolute; top: 10px; right: 10px; width: 20px; height: 20px; background: #3b82f6; border-radius: 50%;">
                                            </div>
                                            <div
                                                style="position: absolute; bottom: 10px; left: 10px; width: 15px; height: 15px; background: #2563eb; border-radius: 50%;">
                                            </div>
                                        </div>
                                    </div>
                                    <h5 class="mt-3 mb-1">Theme 5 - Light & Modern</h5>
                                    <p class="text-muted small mb-2">Clean light theme with blue gradient accents</p>
                                    <div class="theme-features mb-3">
                                        <span class="badge bg-primary">Light Mode</span>
                                        <span class="badge bg-info">Blue Accents</span>
                                        <span class="badge bg-success">Clean Design</span>
                                    </div>
                                    <form action="{{ route('theme.update') }}" method="POST" class="theme-form">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="frontend_theme" value="5">
                                        <button type="submit"
                                            class="btn {{ Auth::user()->frontend_theme == 5 ? 'btn-primary' : 'btn-outline-primary' }} w-100 theme-btn">
                                            {{ Auth::user()->frontend_theme == 5 ? '✓ Active Theme' : 'Activate Theme' }}
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- Theme 6 - iOS Glassmorphism -->
                        <div class="col-md-2-4 mb-4">
                            <div class="card theme-card {{ Auth::user()->frontend_theme == 6 ? 'border-primary border-3 active-theme' : '' }}"
                                style="height: 100%;">
                                <div class="card-body text-center">
                                    @if (Auth::user()->frontend_theme == 6)
                                        <div class="theme-active-progress mb-3">
                                            <div class="progress-bar-animated">
                                                <div class="progress-bar-fill"></div>
                                            </div>
                                            <span class="active-badge"><i class="ti ti-check"></i> ACTIVE</span>
                                        </div>
                                    @endif

                                    <div class="theme-view-icon" onclick="event.stopPropagation(); openThemePreview(6)">
                                        <i class="ti ti-eye"></i>
                                    </div>

                                    <div class="theme-preview mb-3">
                                        <div class="theme-preview-img"
                                            style="background: linear-gradient(135deg, #f5f5f7, #e8ecf1); height: 140px; border-radius: 12px; display: flex; align-items: center; justify-content: center; position: relative;">
                                            <i class="ti ti-apple"
                                                style="font-size: 48px; color: #007aff; opacity: 0.8;"></i>
                                            <div
                                                style="position: absolute; top: 10px; right: 10px; width: 20px; height: 20px; background: #007aff; border-radius: 50%;">
                                            </div>
                                            <div
                                                style="position: absolute; bottom: 10px; left: 10px; width: 15px; height: 15px; background: #34c759; border-radius: 50%;">
                                            </div>
                                        </div>
                                    </div>
                                    <h5 class="mt-3 mb-1">Theme 6 - iOS Glassmorphism</h5>
                                    <p class="text-muted small mb-2">Frosted glass, blur effects, iOS style</p>
                                    <div class="theme-features mb-3">
                                        <span class="badge bg-primary">Glassmorphism</span>
                                        <span class="badge bg-info">iOS Style</span>
                                        <span class="badge bg-success">Blur Effects</span>
                                    </div>
                                    <form action="{{ route('theme.update') }}" method="POST" class="theme-form">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="frontend_theme" value="6">
                                        <button type="submit"
                                            class="btn {{ Auth::user()->frontend_theme == 6 ? 'btn-primary' : 'btn-outline-primary' }} w-100 theme-btn">
                                            {{ Auth::user()->frontend_theme == 6 ? '✓ Active Theme' : 'Activate Theme' }}
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- Theme 7 - Neon Brutalist -->
                        <div class="col-md-2-4 mb-4">
                            <div class="card theme-card {{ Auth::user()->frontend_theme == 7 ? 'border-primary border-3 active-theme' : '' }}"
                                style="height: 100%;">
                                <div class="card-body text-center">
                                    @if (Auth::user()->frontend_theme == 7)
                                        <div class="theme-active-progress mb-3">
                                            <div class="progress-bar-animated">
                                                <div class="progress-bar-fill"></div>
                                            </div>
                                            <span class="active-badge"><i class="ti ti-check"></i> ACTIVE</span>
                                        </div>
                                    @endif

                                    <div class="theme-view-icon" onclick="event.stopPropagation(); openThemePreview(7)">
                                        <i class="ti ti-eye"></i>
                                    </div>

                                    <div class="theme-preview mb-3">
                                        <div class="theme-preview-img"
                                            style="background: linear-gradient(135deg, #010108, #0a0a18); height: 140px; border-radius: 12px; display: flex; align-items: center; justify-content: center; position: relative;">
                                            <i class="ti ti-flash"
                                                style="font-size: 48px; color: #ff2a6d; opacity: 0.8;"></i>
                                            <div
                                                style="position: absolute; top: 10px; right: 10px; width: 20px; height: 20px; background: #05d9e8; border-radius: 50%;">
                                            </div>
                                            <div
                                                style="position: absolute; bottom: 10px; left: 10px; width: 15px; height: 15px; background: #ff2a6d; border-radius: 50%;">
                                            </div>
                                        </div>
                                    </div>
                                    <h5 class="mt-3 mb-1">Theme 7 - Neon Brutalist</h5>
                                    <p class="text-muted small mb-2">Neon pink + cyan, brutalist style</p>
                                    <div class="theme-features mb-3">
                                        <span class="badge bg-dark">Dark Mode</span>
                                        <span class="badge bg-danger">Neon Pink</span>
                                        <span class="badge bg-info">Cyan Accents</span>
                                    </div>
                                    <form action="{{ route('theme.update') }}" method="POST" class="theme-form">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="frontend_theme" value="7">
                                        <button type="submit"
                                            class="btn {{ Auth::user()->frontend_theme == 7 ? 'btn-primary' : 'btn-outline-primary' }} w-100 theme-btn">
                                            {{ Auth::user()->frontend_theme == 7 ? '✓ Active Theme' : 'Activate Theme' }}
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- Theme 8 - Glassmorphism Light -->
                        <div class="col-md-2-4 mb-4">
                            <div class="card theme-card {{ Auth::user()->frontend_theme == 8 ? 'border-primary border-3 active-theme' : '' }}"
                                style="height: 100%;">
                                <div class="card-body text-center">
                                    @if (Auth::user()->frontend_theme == 8)
                                        <div class="theme-active-progress mb-3">
                                            <div class="progress-bar-animated">
                                                <div class="progress-bar-fill"></div>
                                            </div>
                                            <span class="active-badge"><i class="ti ti-check"></i> ACTIVE</span>
                                        </div>
                                    @endif

                                    <div class="theme-view-icon" onclick="event.stopPropagation(); openThemePreview(8)">
                                        <i class="ti ti-eye"></i>
                                    </div>

                                    <div class="theme-preview mb-3">
                                        <div class="theme-preview-img"
                                            style="background: linear-gradient(135deg, #ffffff, #f0f2f5); height: 140px; border-radius: 12px; display: flex; align-items: center; justify-content: center; position: relative;">
                                            <i class="ti ti-glass"
                                                style="font-size: 48px; color: #007aff; opacity: 0.8;"></i>
                                            <div
                                                style="position: absolute; top: 10px; right: 10px; width: 20px; height: 20px; background: #007aff; border-radius: 50%;">
                                            </div>
                                            <div
                                                style="position: absolute; bottom: 10px; left: 10px; width: 15px; height: 15px; background: #34c759; border-radius: 50%;">
                                            </div>
                                        </div>
                                    </div>
                                    <h5 class="mt-3 mb-1">Theme 8 - Glassmorphism Light</h5>
                                    <p class="text-muted small mb-2">Light theme with frosted glass effects</p>
                                    <div class="theme-features mb-3">
                                        <span class="badge bg-primary">Light Mode</span>
                                        <span class="badge bg-info">Glassmorphism</span>
                                        <span class="badge bg-success">Blur Effects</span>
                                    </div>
                                    <form action="{{ route('theme.update') }}" method="POST" class="theme-form">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="frontend_theme" value="8">
                                        <button type="submit"
                                            class="btn {{ Auth::user()->frontend_theme == 8 ? 'btn-primary' : 'btn-outline-primary' }} w-100 theme-btn">
                                            {{ Auth::user()->frontend_theme == 8 ? '✓ Active Theme' : 'Activate Theme' }}
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- Theme 9 - Velora Gold (Dark Luxury) -->
                        <div class="col-md-2-4 mb-4">
                            <div class="card theme-card {{ Auth::user()->frontend_theme == 9 ? 'border-primary border-3 active-theme' : '' }}"
                                style="height: 100%;">
                                <div class="card-body text-center">
                                    @if (Auth::user()->frontend_theme == 9)
                                        <div class="theme-active-progress mb-3">
                                            <div class="progress-bar-animated">
                                                <div class="progress-bar-fill"></div>
                                            </div>
                                            <span class="active-badge"><i class="ti ti-check"></i> ACTIVE</span>
                                        </div>
                                    @endif

                                    <div class="theme-view-icon" onclick="event.stopPropagation(); openThemePreview(9)">
                                        <i class="ti ti-eye"></i>
                                    </div>

                                    <div class="theme-preview mb-3">
                                        <div class="theme-preview-img"
                                            style="background: linear-gradient(135deg, #0a0a0a, #1a1a1a); height: 140px; border-radius: 12px; display: flex; align-items: center; justify-content: center; position: relative;">
                                            <i class="ti ti-crown"
                                                style="font-size: 48px; color: #d4af37; opacity: 0.8;"></i>
                                            <div
                                                style="position: absolute; top: 10px; right: 10px; width: 20px; height: 20px; background: #d4af37; border-radius: 50%;">
                                            </div>
                                            <div
                                                style="position: absolute; bottom: 10px; left: 10px; width: 15px; height: 15px; background: #b8941e; border-radius: 50%;">
                                            </div>
                                        </div>
                                    </div>
                                    <h5 class="mt-3 mb-1">Theme 9 - Velora Gold</h5>
                                    <p class="text-muted small mb-2">Dark luxury theme with elegant gold accents</p>
                                    <div class="theme-features mb-3">
                                        <span class="badge bg-dark">Dark Mode</span>
                                        <span class="badge bg-warning">Gold Accents</span>
                                        <span class="badge bg-secondary">Brutalist</span>
                                        <span class="badge bg-info">Carousels</span>
                                    </div>
                                    <form action="{{ route('theme.update') }}" method="POST" class="theme-form">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="frontend_theme" value="9">
                                        <button type="submit"
                                            class="btn {{ Auth::user()->frontend_theme == 9 ? 'btn-primary' : 'btn-outline-primary' }} w-100 theme-btn">
                                            {{ Auth::user()->frontend_theme == 9 ? '✓ Active Theme' : 'Activate Theme' }}
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
        /* 5 columns layout for 9 themes */
        .col-md-2-4 {
            width: 20%;
            padding: 0 12px;
            float: left;
        }

        .theme-card {
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            position: relative;
            overflow: hidden;
            cursor: pointer;
        }

        .theme-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
        }

        .active-theme {
            border-color: #3b82f6 !important;
            border-width: 2px !important;
            position: relative;
            background: linear-gradient(135deg, rgba(59, 130, 246, 0.03), rgba(37, 99, 235, 0.05));
            box-shadow: 0 0 0 2px rgba(59, 130, 246, 0.2);
        }

        /* View Icon Styles */
        .theme-view-icon {
            position: absolute;
            top: 15px;
            right: 15px;
            width: 32px;
            height: 32px;
            background: rgba(0, 0, 0, 0.6);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
            z-index: 10;
            color: white;
            font-size: 16px;
        }

        .theme-view-icon:hover {
            background: #3b82f6;
            transform: scale(1.1);
        }

        .theme-features .badge {
            margin: 0 3px;
            padding: 5px 10px;
            font-weight: 500;
        }

        /* Global Progress Bar Step Dots */
        .progress-step-dot {
            display: inline-block;
            width: 35px;
            text-align: center;
            font-size: 10px;
            padding: 3px 0;
            border-radius: 20px;
            background: rgba(255, 255, 255, 0.2);
            transition: all 0.3s;
        }

        .progress-step-dot.completed {
            background: #28a745;
            animation: stepComplete 0.4s ease;
        }

        .progress-step-dot.active {
            background: #3b82f6;
            animation: stepActive 0.4s ease;
            box-shadow: 0 0 10px rgba(59, 130, 246, 0.8);
        }

        @keyframes stepComplete {
            0% {
                transform: scale(0.8);
            }

            50% {
                transform: scale(1.2);
                background: #28a745;
            }

            100% {
                transform: scale(1);
            }
        }

        @keyframes stepActive {
            0% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.2);
                background: #2563eb;
            }

            100% {
                transform: scale(1);
                background: #3b82f6;
            }
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
            background: rgba(59, 130, 246, 0.2);
            border-radius: 4px;
            overflow: hidden;
            margin-bottom: 10px;
        }

        .progress-bar-fill {
            width: 0%;
            height: 100%;
            background: linear-gradient(90deg, #3b82f6, #2563eb);
            border-radius: 4px;
            animation: progressFill 1s ease-out forwards;
        }

        @keyframes progressFill {
            0% {
                width: 0%;
            }

            40% {
                width: 60%;
            }

            100% {
                width: 100%;
            }
        }

        .active-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: linear-gradient(135deg, #3b82f6, #2563eb);
            color: #fff;
            padding: 5px 14px;
            border-radius: 30px;
            font-size: 11px;
            font-weight: 600;
            letter-spacing: 0.5px;
            animation: badgePulse 0.6s ease-out;
            box-shadow: 0 2px 10px rgba(59, 130, 246, 0.3);
        }

        .active-badge i {
            font-size: 12px;
        }

        @keyframes badgePulse {
            0% {
                transform: scale(0.6);
                opacity: 0;
            }

            50% {
                transform: scale(1.1);
            }

            100% {
                transform: scale(1);
                opacity: 1;
            }
        }

        /* Theme Preview Image Hover Effect */
        .theme-preview-img {
            transition: transform 0.3s ease;
            overflow: hidden;
            position: relative;
        }

        .theme-card:hover .theme-preview-img {
            transform: scale(1.02);
        }

        .theme-preview-img i {
            transition: transform 0.3s ease;
        }

        .theme-card:hover .theme-preview-img i {
            transform: scale(1.05);
        }

        /* Button Loading Animation */
        .theme-btn {
            position: relative;
            transition: all 0.3s ease;
        }

        .theme-btn.loading {
            pointer-events: none;
            opacity: 0.8;
            position: relative;
        }

        .theme-btn.loading::after {
            content: '';
            position: absolute;
            width: 18px;
            height: 18px;
            top: 50%;
            right: 20px;
            margin-top: -9px;
            border: 2px solid #fff;
            border-radius: 50%;
            border-top-color: transparent;
            animation: spin 0.6s linear infinite;
        }

        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }

        /* Card Glow Effect on Active */
        .active-theme::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(59, 130, 246, 0.1), transparent);
            animation: shimmer 2s infinite;
        }

        @keyframes shimmer {
            0% {
                left: -100%;
            }

            100% {
                left: 100%;
            }
        }

        /* Button Hover Animation */
        .theme-btn:not(.loading):hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(59, 130, 246, 0.3);
        }

        /* Card Entrance Animation */
        .theme-card {
            animation: cardFadeIn 0.5s ease-out forwards;
            opacity: 0;
            transform: translateY(20px);
        }

        .theme-card:nth-child(1) {
            animation-delay: 0.05s;
        }

        .theme-card:nth-child(2) {
            animation-delay: 0.1s;
        }

        .theme-card:nth-child(3) {
            animation-delay: 0.15s;
        }

        .theme-card:nth-child(4) {
            animation-delay: 0.2s;
        }

        .theme-card:nth-child(5) {
            animation-delay: 0.25s;
        }

        .theme-card:nth-child(6) {
            animation-delay: 0.3s;
        }

        .theme-card:nth-child(7) {
            animation-delay: 0.35s;
        }

        .theme-card:nth-child(8) {
            animation-delay: 0.4s;
        }

        .theme-card:nth-child(9) {
            animation-delay: 0.45s;
        }

        @keyframes cardFadeIn {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Responsive */
        @media (max-width: 992px) {
            .col-md-2-4 {
                width: 33.33%;
            }
        }

        @media (max-width: 768px) {
            .col-md-2-4 {
                width: 100%;
            }
        }
    </style>
@endpush

@push('script-page')
    <script>
        $(document).ready(function() {
            // Global progress bar animation function
            function showGlobalProgress(themeName) {
                var progressBar = $('#globalProgressBar');
                var progressFill = progressBar.find('div:first-child');
                var progressStepSpan = $('#progressStep');
                var progressMessage = $('#progressMessage');

                // Show progress bar
                progressBar.show();

                // Steps configuration
                var steps = [{
                        percent: 10,
                        message: 'Initializing theme activation for ' + themeName + '...',
                        stepId: 'step10'
                    },
                    {
                        percent: 25,
                        message: 'Loading theme assets and configurations...',
                        stepId: 'step25'
                    },
                    {
                        percent: 50,
                        message: 'Applying color scheme and styling...',
                        stepId: 'step50'
                    },
                    {
                        percent: 75,
                        message: 'Finalizing layout and animations...',
                        stepId: 'step75'
                    },
                    {
                        percent: 100,
                        message: 'Theme activated successfully! Redirecting...',
                        stepId: 'step100'
                    }
                ];

                // Reset all step dots
                $('.progress-step-dot').removeClass('completed active');

                // Animate each step
                steps.forEach(function(step, index) {
                    setTimeout(function() {
                        // Update progress bar width
                        progressFill.css('width', step.percent + '%');
                        progressStepSpan.text(step.percent + '%');
                        progressMessage.text(step.message);

                        // Update step dot
                        $('#' + step.stepId).addClass('active');

                        // Mark previous steps as completed
                        for (var i = 0; i < index; i++) {
                            $('#step' + steps[i].percent).removeClass('active').addClass(
                                'completed');
                        }

                        // If last step, submit the form
                        if (step.percent === 100) {
                            setTimeout(function() {
                                // The form will be submitted via AJAX
                                // The actual form submission happens in the calling function
                            }, 500);
                        }
                    }, index * 800);
                });
            }

            function hideGlobalProgress() {
                setTimeout(function() {
                    $('#globalProgressBar').fadeOut(500);
                    // Reset progress bar
                    $('#globalProgressBar div:first-child').css('width', '0%');
                    $('.progress-step-dot').removeClass('completed active');
                }, 1000);
            }

            // Handle theme activation with AJAX
            $('.theme-form').on('submit', function(e) {
                e.preventDefault();

                var form = $(this);
                var btn = form.find('.theme-btn');
                var themeValue = form.find('input[name="frontend_theme"]').val();
                var themeName = '';

                // Get theme name
                switch (parseInt(themeValue)) {
                    case 1:
                        themeName = 'Theme 1 - Corporate';
                        break;
                    case 2:
                        themeName = 'Theme 2 - Forest & Gold';
                        break;
                    case 3:
                        themeName = 'Theme 3 - Navy & Gold';
                        break;
                    case 4:
                        themeName = 'Theme 4 - Dark Luxury';
                        break;
                    case 5:
                        themeName = 'Theme 5 - Light & Modern';
                        break;
                    case 6:
                        themeName = 'Theme 6 - iOS Glassmorphism';
                        break;
                    case 7:
                        themeName = 'Theme 7 - Neon Brutalist';
                        break;
                    case 8:
                        themeName = 'Theme 8 - Glassmorphism Light';
                        break;
                    case 9:
                        themeName = 'Theme 9 - Velora Gold';
                        break;
                    default:
                        themeName = 'Theme';
                }

                // Show global progress bar with animation
                showGlobalProgress(themeName);

                // Disable all theme buttons
                $('.theme-btn').prop('disabled', true);
                btn.addClass('loading');
                btn.html('<i class="ti ti-loader"></i> Activating...');

                // Submit via AJAX
                $.ajax({
                    url: form.attr('action'),
                    type: 'POST',
                    data: form.serialize(),
                    success: function(response) {
                        // Update last step to completed
                        $('#step100').removeClass('active').addClass('completed');
                        $('#progressMessage').text('✓ ' + themeName +
                            ' activated! Refreshing page...');

                        setTimeout(function() {
                            location.reload();
                        }, 1500);
                    },
                    error: function(xhr) {
                        $('#progressMessage').text('❌ Activation failed. Please try again.');
                        $('#step100').removeClass('active');

                        setTimeout(function() {
                            hideGlobalProgress();
                            $('.theme-btn').prop('disabled', false);
                            btn.removeClass('loading');
                            btn.html(btn.data('original-text') || 'Activate Theme');
                        }, 2000);
                    }
                });
            });

            // Add click animation to theme cards
            $('.theme-card').on('click', function(e) {
                if ($(e.target).closest('.theme-btn').length || $(e.target).closest('form').length || $(e.target).closest('.theme-view-icon').length) {
                    return;
                }
                $(this).find('.theme-btn').trigger('click');
            });

            // Add hover effect for theme preview
            $('.theme-card').hover(
                function() {
                    $(this).find('.theme-preview-img i').css('transform', 'scale(1.05)');
                },
                function() {
                    $(this).find('.theme-preview-img i').css('transform', 'scale(1)');
                }
            );
        });

        // Open theme preview modal with image
        function openThemePreview(themeNumber) {
            // Format theme number with leading zero (01, 02, etc.)
            let themeNum = themeNumber.toString().padStart(2, '0');
            let imagePath = "{{ asset('assets/theme/theme') }}" + themeNum + ".png";

            // Set modal image source
            document.getElementById('previewModalImage').src = imagePath;
            document.getElementById('previewModalTitle').innerHTML = 'Theme ' + themeNumber + ' Preview';

            // Show modal using Bootstrap 5
            var myModal = new bootstrap.Modal(document.getElementById('themePreviewModal'));
            myModal.show();
        }
    </script>
@endpush
