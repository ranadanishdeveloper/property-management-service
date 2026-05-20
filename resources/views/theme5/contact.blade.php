@extends('theme5.main')
@section('content')

<style>
/* ============================================
   THEME 5 - CONTACT PAGE
   Light & Modern Design Matching Index
============================================ */

:root {
    --primary: #3b82f6;
    --primary-light: #eff6ff;
    --primary-dark: #2563eb;
    --text-dark: #0f172a;
    --text-gray: #475569;
    --text-light: #64748b;
    --bg-white: #ffffff;
    --bg-light: #f8fafc;
    --border: #e2e8f0;
    --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
    --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
    --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.05);
}

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Inter', sans-serif;
    background: var(--bg-white);
    color: var(--text-dark);
}

.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 24px;
}

/* ========== CONTACT HERO SECTION ========== */
.contact-hero {
    padding: 100px 0 60px;
    background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 100%);
}

.contact-hero-content {
    text-align: center;
}

.contact-hero-badge {
    display: inline-block;
    background: var(--primary-light);
    padding: 6px 16px;
    border-radius: 30px;
    font-size: 12px;
    margin-bottom: 20px;
    color: var(--primary);
}

.contact-hero h1 {
    font-size: 42px;
    font-weight: 800;
    margin-bottom: 16px;
    color: var(--text-dark);
}

.contact-hero h1 span {
    color: var(--primary);
}

.contact-hero p {
    font-size: 16px;
    color: var(--text-gray);
    max-width: 600px;
    margin: 0 auto;
}

/* ========== CONTACT FORM CARD ========== */
.contact-card {
    background: var(--bg-white);
    border: 1px solid var(--border);
    border-radius: 24px;
    padding: 40px;
    transition: all 0.3s;
    box-shadow: var(--shadow-sm);
}

.contact-card:hover {
    box-shadow: var(--shadow-lg);
}

/* ========== ALERTS ========== */
.alert-premium {
    padding: 14px 18px;
    border-radius: 12px;
    margin-bottom: 25px;
    display: flex;
    align-items: center;
    gap: 10px;
    font-size: 14px;
}

.alert-premium-success {
    background: #dcfce7;
    border: 1px solid #bbf7d0;
    color: #16a34a;
}

.alert-premium-danger {
    background: #fee2e2;
    border: 1px solid #fecaca;
    color: #dc2626;
}

.alert-premium i {
    font-size: 18px;
}

/* ========== FORM STYLES ========== */
.form-group-premium {
    margin-bottom: 20px;
}

.form-label-premium {
    display: block;
    font-size: 13px;
    font-weight: 500;
    margin-bottom: 6px;
    color: var(--text-dark);
}

.form-label-premium i {
    margin-right: 6px;
    color: var(--primary);
}

.form-control-premium {
    width: 100%;
    padding: 12px 16px;
    background: var(--bg-light);
    border: 1px solid var(--border);
    border-radius: 12px;
    color: var(--text-dark);
    font-size: 14px;
    transition: all 0.2s;
}

.form-control-premium:focus {
    outline: none;
    border-color: var(--primary);
    box-shadow: 0 0 0 3px rgba(59,130,246,0.1);
}

.form-control-premium::placeholder {
    color: var(--text-light);
}

textarea.form-control-premium {
    resize: vertical;
    min-height: 120px;
}

/* ========== SUBMIT BUTTON ========== */
.btn-submit-premium {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    width: 100%;
    padding: 12px 24px;
    background: var(--primary);
    border: none;
    border-radius: 12px;
    color: white;
    font-weight: 600;
    font-size: 15px;
    cursor: pointer;
    transition: all 0.3s;
}

.btn-submit-premium:hover {
    background: var(--primary-dark);
    transform: translateY(-2px);
}

/* ========== INFO CARDS ========== */
.info-cards-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 30px;
    margin-top: 60px;
}

.info-card-premium {
    background: var(--bg-white);
    border: 1px solid var(--border);
    border-radius: 20px;
    padding: 30px 24px;
    text-align: center;
    transition: all 0.3s;
}

.info-card-premium:hover {
    transform: translateY(-5px);
    box-shadow: var(--shadow-lg);
    border-color: var(--primary);
}

.info-card-icon {
    width: 60px;
    height: 60px;
    background: var(--primary-light);
    border-radius: 16px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 20px;
    transition: all 0.3s;
}

.info-card-premium:hover .info-card-icon {
    background: var(--primary);
}

.info-card-icon i {
    font-size: 26px;
    color: var(--primary);
    transition: all 0.3s;
}

.info-card-premium:hover .info-card-icon i {
    color: white;
}

.info-card-premium h3 {
    font-size: 18px;
    font-weight: 600;
    margin-bottom: 12px;
    color: var(--text-dark);
}

.info-card-premium p {
    color: var(--text-gray);
    font-size: 14px;
    line-height: 1.5;
}

.info-card-premium a {
    color: var(--primary);
    text-decoration: none;
    transition: color 0.2s;
}

.info-card-premium a:hover {
    color: var(--primary-dark);
}

/* ========== RESPONSIVE ========== */
@media (max-width: 992px) {
    .info-cards-grid {
        grid-template-columns: repeat(2, 1fr);
        gap: 20px;
    }

    .contact-hero h1 {
        font-size: 36px;
    }
}

@media (max-width: 768px) {
    .contact-hero {
        padding: 80px 0 40px;
    }

    .contact-hero h1 {
        font-size: 28px;
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
        padding: 10px 14px;
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
            <h1>Let's <span>Start a Conversation</span></h1>
            <p>We're here to help you with any questions about properties, investments, or our services.</p>
        </div>
    </div>
</section>

<!-- ========== CONTACT FORM SECTION ========== -->
<section class="contact-section" style="padding: 40px 0 60px;">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-lg-8 mx-auto">
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

                    <div class="row g-3">
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
                <p style="margin-top: 8px; font-size: 12px; color: var(--text-light);">Mon-Fri: 9am - 6pm</p>
            </div>
            <div class="info-card-premium">
                <div class="info-card-icon">
                    <i class="fas fa-envelope"></i>
                </div>
                <h3>Email Us</h3>
                <p><a href="mailto:{{ $settings['company_email'] ?? 'info@example.com' }}">{{ $settings['company_email'] ?? 'info@example.com' }}</a></p>
                <p style="margin-top: 8px; font-size: 12px; color: var(--text-light);">We'll respond within 24 hours</p>
            </div>
        </div>
    </div>
</section>

@endsection

@push('theme5-script')
<script>
$(document).ready(function() {
    // Form validation enhancement
    $('form').on('submit', function(e) {
        let isValid = true;
        $(this).find('[required]').each(function() {
            if (!$(this).val()) {
                $(this).css('border-color', '#dc2626');
                isValid = false;
            } else {
                $(this).css('border-color', '#e2e8f0');
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
