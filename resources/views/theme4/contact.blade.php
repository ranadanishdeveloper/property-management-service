@extends('theme4.main')
@section('content')

<style>
/* ============================================
   CONTACT PAGE - SAME DARK THEME AS INDEX
   Professional Elegant Design with Stunning Animations
============================================ */

:root {
    --primary: #6366f1;
    --primary-dark: #4f46e5;
    --secondary: #a855f7;
    --accent: #f59e0b;
    --pink: #ec4899;
    --cyan: #06b6d4;
    --dark: #0a0a0a;
    --darker: #050505;
    --card: rgba(255, 255, 255, 0.03);
    --border: rgba(255, 255, 255, 0.08);
    --glow: 0 0 30px rgba(99, 102, 241, 0.3);
}

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Inter', sans-serif;
    background: var(--darker);
    color: #fff;
    overflow-x: hidden;
}

.container {
    max-width: 1280px;
    margin: 0 auto;
    padding: 0 24px;
}

/* ========== CONTACT HERO SECTION ========== */
.contact-hero {
    position: relative;
    padding: 120px 0 60px;
    margin-bottom: 40px;
    overflow: hidden;
}

.contact-hero-content {
    text-align: center;
    animation: fadeInUp 0.8s ease;
}

.contact-hero-badge {
    display: inline-block;
    background: linear-gradient(135deg, rgba(99,102,241,0.2), rgba(168,85,247,0.2));
    padding: 6px 18px;
    border-radius: 30px;
    font-size: 13px;
    margin-bottom: 20px;
}

.contact-hero h1 {
    font-size: 48px;
    font-weight: 800;
    margin-bottom: 16px;
    background: linear-gradient(135deg, #fff, #a855f7, #6366f1);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}

.contact-hero p {
    font-size: 18px;
    color: #94a3b8;
    max-width: 600px;
    margin: 0 auto;
}

/* ========== CONTACT FORM CARD ========== */
.contact-card {
    background: linear-gradient(135deg, rgba(255,255,255,0.03), rgba(255,255,255,0.01));
    border: 1px solid rgba(255, 255, 255, 0.05);
    border-radius: 30px;
    padding: 40px;
    transition: all 0.3s;
    animation: fadeInUp 0.8s ease 0.1s both;
}

.contact-card:hover {
    border-color: rgba(99, 102, 241, 0.3);
}

/* ========== ALERTS ========== */
.alert-premium {
    padding: 15px 20px;
    border-radius: 16px;
    margin-bottom: 25px;
    display: flex;
    align-items: center;
    gap: 12px;
    font-size: 14px;
    animation: fadeInUp 0.3s ease;
}

.alert-premium-success {
    background: rgba(16, 185, 129, 0.15);
    border: 1px solid rgba(16, 185, 129, 0.3);
    color: #10b981;
}

.alert-premium-danger {
    background: rgba(239, 68, 68, 0.15);
    border: 1px solid rgba(239, 68, 68, 0.3);
    color: #f87171;
}

.alert-premium i {
    font-size: 20px;
}

/* ========== FORM STYLES ========== */
.form-group-premium {
    margin-bottom: 25px;
}

.form-label-premium {
    display: block;
    font-size: 13px;
    font-weight: 500;
    margin-bottom: 8px;
    color: #cbd5e1;
}

.form-label-premium i {
    margin-right: 6px;
    color: #6366f1;
}

.form-control-premium {
    width: 100%;
    padding: 14px 18px;
    background: rgba(255, 255, 255, 0.05);
    border: 1px solid rgba(255, 255, 255, 0.1);
    border-radius: 14px;
    color: white;
    font-size: 14px;
    transition: all 0.3s;
}

.form-control-premium:focus {
    outline: none;
    border-color: #6366f1;
    background: rgba(99, 102, 241, 0.1);
    box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.2);
}

.form-control-premium::placeholder {
    color: #64748b;
}

textarea.form-control-premium {
    resize: vertical;
    min-height: 120px;
}

/* ========== SUBMIT BUTTON - SAME AS INDEX ========== */
.btn-submit-premium {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    width: 100%;
    padding: 14px 28px;
    background: linear-gradient(135deg, #6366f1, #a855f7);
    border: none;
    border-radius: 50px;
    color: white;
    font-weight: 600;
    font-size: 16px;
    cursor: pointer;
    transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    position: relative;
    overflow: hidden;
    z-index: 1;
}

.btn-submit-premium::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
    transition: left 0.5s;
    z-index: -1;
}

.btn-submit-premium:hover::before {
    left: 100%;
}

.btn-submit-premium:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 30px rgba(99, 102, 241, 0.4);
}

/* ========== INFO CARDS ========== */
.info-cards-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 30px;
    margin-top: 60px;
    animation: fadeInUp 0.8s ease 0.2s both;
}

.info-card-premium {
    background: linear-gradient(135deg, rgba(255,255,255,0.03), rgba(255,255,255,0.01));
    border: 1px solid rgba(255, 255, 255, 0.05);
    border-radius: 24px;
    padding: 30px;
    text-align: center;
    transition: all 0.4s;
}

.info-card-premium:hover {
    transform: translateY(-8px);
    border-color: rgba(99, 102, 241, 0.4);
    box-shadow: var(--glow);
}

.info-card-icon {
    width: 70px;
    height: 70px;
    background: linear-gradient(135deg, rgba(99,102,241,0.2), rgba(168,85,247,0.2));
    border-radius: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 20px;
    transition: all 0.3s;
}

.info-card-premium:hover .info-card-icon {
    background: linear-gradient(135deg, #6366f1, #a855f7);
    transform: scale(1.05);
}

.info-card-icon i {
    font-size: 32px;
    color: #6366f1;
    transition: all 0.3s;
}

.info-card-premium:hover .info-card-icon i {
    color: white;
}

.info-card-premium h3 {
    font-size: 18px;
    font-weight: 600;
    margin-bottom: 12px;
}

.info-card-premium p {
    color: #94a3b8;
    font-size: 14px;
    line-height: 1.6;
}

.info-card-premium a {
    color: #a855f7;
    text-decoration: none;
    transition: color 0.3s;
}

.info-card-premium a:hover {
    color: #6366f1;
}

/* ========== ANIMATIONS ========== */
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* ========== RESPONSIVE ========== */
@media (max-width: 992px) {
    .info-cards-grid {
        grid-template-columns: repeat(2, 1fr);
        gap: 20px;
    }
}

@media (max-width: 768px) {
    .contact-hero {
        padding: 100px 0 40px;
    }

    .contact-hero h1 {
        font-size: 32px;
    }

    .contact-card {
        padding: 25px;
    }

    .info-cards-grid {
        grid-template-columns: 1fr;
        gap: 20px;
        margin-top: 40px;
    }

    .form-control-premium {
        padding: 12px 16px;
    }
}
</style>

<!-- ========== CONTACT HERO SECTION ========== -->
@php
    $isCustomDomain = isset($is_custom_domain) ? $is_custom_domain : (request()->getHost() !== '13.61.10.174' && request()->getHost() !== 'localhost' && request()->getHost() !== '127.0.0.1');
@endphp

<section class="contact-hero">
    <div class="container">
        <div class="contact-hero-content">
            <div class="contact-hero-badge">📞 GET IN TOUCH</div>
            <h1>Let's Start a Conversation</h1>
            <p>We're here to help you with any questions about properties, investments, or our services.</p>
        </div>
    </div>
</section>

<!-- ========== CONTACT FORM SECTION ========== -->
<section class="contact-section" style="padding: 0 0 40px;">
    <div class="container">
        <div class="row">
            <div class="col-xl-4 mx-auto">
                <div class="contact-card">
                    @if ($isCustomDomain)
                        {{ Form::open(['route' => 'contact-us', 'method' => 'post']) }}
                    @else
                        {{ Form::open(['route' => ['contact-us', 'code' => $user->code], 'method' => 'post']) }}
                    @endif

                    @if (session('error'))
                        <div class="alert-premium alert-premium-danger">
                            <i class="fas fa-exclamation-circle"></i>
                            <span>{{ session('error') }}</span>
                        </div>
                    @endif
                    @if (session('success'))
                        <div class="alert-premium alert-premium-success">
                            <i class="fas fa-check-circle"></i>
                            <span>{{ session('success') }}</span>
                        </div>
                    @endif

                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="form-group-premium">
                                <label class="form-label-premium"><i class="fas fa-user"></i> {{ __('Full Name') }} *</label>
                                {{ Form::text('name', null, ['class' => 'form-control-premium', 'placeholder' => 'Enter your full name', 'required' => 'required']) }}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group-premium">
                                <label class="form-label-premium"><i class="fas fa-envelope"></i> {{ __('Email Address') }} *</label>
                                {{ Form::email('email', null, ['class' => 'form-control-premium', 'placeholder' => 'Enter your email', 'required' => 'required']) }}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group-premium">
                                <label class="form-label-premium"><i class="fas fa-phone-alt"></i> {{ __('Phone Number') }}</label>
                                {{ Form::tel('contact_number', null, ['class' => 'form-control-premium', 'placeholder' => 'Enter your phone number']) }}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group-premium">
                                <label class="form-label-premium"><i class="fas fa-tag"></i> {{ __('Subject') }} *</label>
                                {{ Form::text('subject', null, ['class' => 'form-control-premium', 'placeholder' => 'What is this about?', 'required' => 'required']) }}
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group-premium">
                                <label class="form-label-premium"><i class="fas fa-comment"></i> {{ __('Message') }} *</label>
                                {{ Form::textarea('message', null, ['class' => 'form-control-premium', 'rows' => 5, 'placeholder' => 'Tell us how we can help you...', 'required' => 'required']) }}
                            </div>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn-submit-premium">
                                <i class="fas fa-paper-plane"></i> Send Message
                            </button>
                        </div>
                    </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>

        <!-- ========== INFO CARDS ========== -->
        <div class="info-cards-grid">
            <div class="info-card-premium">
                <div class="info-card-icon">
                    <i class="fas fa-map-marker-alt"></i>
                </div>
                <h3>Visit Our Office</h3>
                <p>{{ $settings['company_address'] ?? '123 Property Street, Business District, New York, NY 10001' }}</p>
            </div>
            <div class="info-card-premium">
                <div class="info-card-icon">
                    <i class="fas fa-phone-alt"></i>
                </div>
                <h3>Call Us Anytime</h3>
                <p><a href="tel:{{ $settings['company_phone'] ?? '+1 234 567 890' }}">{{ $settings['company_phone'] ?? '+1 234 567 890' }}</a></p>
                <p style="margin-top: 8px; font-size: 12px;">Mon-Fri: 9am - 6pm</p>
            </div>
            <div class="info-card-premium">
                <div class="info-card-icon">
                    <i class="fas fa-envelope"></i>
                </div>
                <h3>Email Us</h3>
                <p><a href="mailto:{{ $settings['company_email'] ?? 'info@example.com' }}">{{ $settings['company_email'] ?? 'info@example.com' }}</a></p>
                <p style="margin-top: 8px; font-size: 12px;">We'll respond within 24 hours</p>
            </div>
        </div>
    </div>
</section>

@endsection

@push('theme4-script')
<script>
$(document).ready(function() {
    // Form validation enhancement
    $('form').on('submit', function(e) {
        let isValid = true;
        $(this).find('[required]').each(function() {
            if (!$(this).val()) {
                $(this).css('border-color', '#ef4444');
                isValid = false;
            } else {
                $(this).css('border-color', 'rgba(255, 255, 255, 0.1)');
            }
        });
        if (!isValid) {
            e.preventDefault();
            alert('Please fill in all required fields.');
        }
    });
});
</script>
@endpush
