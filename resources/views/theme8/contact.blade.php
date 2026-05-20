@extends('theme8.main')
@section('content')

<style>
/* ============================================
   THEME 8 - CONTACT PAGE
   iOS Glassmorphism + Contact Form + Info Cards + Map
   ============================================ */

/* Contact Hero */
.glass-contact-hero {
    background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
    padding: 60px 0 50px;
    text-align: center;
}

.glass-contact-hero h1 {
    font-size: 2.8rem;
    color: white;
    margin-bottom: 15px;
}

.glass-contact-hero h1 span {
    color: #007aff;
}

.glass-contact-hero p {
    color: #94a3b8;
    max-width: 600px;
    margin: 0 auto;
}

/* Contact Section */
.glass-contact-section {
    padding: 60px 0;
    background: #f5f5f7;
}

/* Contact Form Card */
.glass-contact-card {
    background: rgba(255, 255, 255, 0.8);
    backdrop-filter: blur(20px);
    border-radius: 24px;
    padding: 40px;
    margin-bottom: 50px;
    box-shadow: 0 4px 16px rgba(0, 0, 0, 0.06);
}

.glass-contact-card h3 {
    font-size: 1.5rem;
    font-weight: 700;
    margin-bottom: 10px;
    text-align: center;
}

.glass-contact-card h3 i {
    color: #007aff;
    margin-right: 10px;
}

.glass-contact-card > p {
    text-align: center;
    color: #8e8e93;
    margin-bottom: 30px;
}

/* Form Styles */
.glass-form-group {
    margin-bottom: 20px;
}

.glass-form-group label {
    display: block;
    margin-bottom: 8px;
    font-weight: 600;
    font-size: 13px;
    color: #1d1c1e;
}

.glass-form-group label i {
    color: #007aff;
    margin-right: 6px;
}

.glass-form-control {
    width: 100%;
    padding: 14px 18px;
    border: 1px solid rgba(0, 0, 0, 0.1);
    border-radius: 16px;
    font-size: 14px;
    background: white;
    transition: all 0.2s;
}

.glass-form-control:focus {
    outline: none;
    border-color: #007aff;
    box-shadow: 0 0 0 3px rgba(0, 122, 255, 0.1);
}

textarea.glass-form-control {
    resize: vertical;
    min-height: 130px;
}

.glass-btn-submit {
    background: #007aff;
    color: white;
    border: none;
    padding: 14px 32px;
    border-radius: 16px;
    font-weight: 600;
    font-size: 16px;
    width: 100%;
    cursor: pointer;
    transition: all 0.2s;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
}

.glass-btn-submit:hover {
    background: #005fc1;
    transform: translateY(-2px);
}

/* Alerts */
.glass-alert {
    padding: 15px 20px;
    border-radius: 16px;
    margin-bottom: 25px;
    display: flex;
    align-items: center;
    gap: 10px;
    font-size: 14px;
}

.glass-alert-success {
    background: rgba(52, 199, 89, 0.1);
    border-left: 4px solid #34c759;
    color: #2c7a3e;
}

.glass-alert-danger {
    background: rgba(255, 59, 48, 0.1);
    border-left: 4px solid #ff3b30;
    color: #c62828;
}

/* Info Cards */
.glass-info-cards {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 30px;
    margin-bottom: 50px;
}

.glass-info-card {
    text-align: center;
    padding: 35px 25px;
    background: rgba(255, 255, 255, 0.8);
    backdrop-filter: blur(20px);
    border-radius: 24px;
    transition: all 0.3s;
    text-decoration: none;
    display: block;
}

.glass-info-card:hover {
    transform: translateY(-5px);
    background: rgba(255, 255, 255, 0.95);
}

.glass-info-icon {
    width: 70px;
    height: 70px;
    background: rgba(0, 122, 255, 0.1);
    border-radius: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 20px;
    color: #007aff;
    font-size: 28px;
    transition: all 0.3s;
}

.glass-info-card:hover .glass-info-icon {
    background: #007aff;
    color: white;
    transform: scale(1.05);
}

.glass-info-card h4 {
    font-size: 1.1rem;
    font-weight: 700;
    margin-bottom: 12px;
    color: #1d1c1e;
}

.glass-info-card p {
    color: #8e8e93;
    font-size: 14px;
    line-height: 1.6;
}

.glass-info-card .small-text {
    font-size: 11px;
    margin-top: 8px;
    color: #007aff;
}

/* Map Section */
.glass-map-section {
    border-radius: 24px;
    overflow: hidden;
    box-shadow: 0 4px 16px rgba(0, 0, 0, 0.06);
}

.glass-map-section iframe {
    width: 100%;
    height: 350px;
    border: none;
    display: block;
}

/* Row & Column */
.row {
    display: flex;
    flex-wrap: wrap;
    margin: 0 -12px;
}

.col-md-6 {
    width: 50%;
    padding: 0 12px;
}

.col-12 {
    width: 100%;
    padding: 0 12px;
}

/* Responsive */
@media (max-width: 1024px) {
    .glass-info-cards {
        grid-template-columns: repeat(3, 1fr);
    }
}

@media (max-width: 768px) {
    .glass-contact-hero h1 {
        font-size: 2rem;
    }

    .glass-contact-card {
        padding: 25px;
        margin-bottom: 40px;
    }

    .col-md-6 {
        width: 100%;
    }

    .glass-info-cards {
        grid-template-columns: 1fr;
        gap: 20px;
    }

    .glass-info-card {
        padding: 25px;
    }

    .glass-map-section iframe {
        height: 250px;
    }
}
</style>

@php
    $isCustomDomain = isset($is_custom_domain) ? $is_custom_domain : (request()->getHost() !== '13.61.10.174' && request()->getHost() !== 'localhost' && request()->getHost() !== '127.0.0.1');

    $companyAddress = $settings['company_address'] ?? '123 Property Street, New York, NY 10001';
    $companyPhone = $settings['company_phone'] ?? '+1 (234) 567-8900';
    $companyEmail = $settings['company_email'] ?? 'hello@prophub.com';
    $companyMap = $settings['company_map'] ?? 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d193595.1583091352!2d-74.119763!3d40.697663!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d23f2825%3A0xcd86ea2b0e6e4a1b!2sNew%20York%2C%20NY%2C%20USA!5e0!3m2!1sen!2s!4v1699999999999!5m2!1sen!2s';
@endphp

<!-- ========== CONTACT HERO ========== -->
<section class="glass-contact-hero">
    <div class="glass-container">
        <h1>Get in <span>Touch</span></h1>
        <p>We'd love to hear from you. Send us a message and we'll respond as soon as possible.</p>
    </div>
</section>

<!-- ========== CONTACT SECTION ========== -->
<section class="glass-contact-section">
    <div class="glass-container">
        <!-- Contact Form Card -->
        <div class="glass-contact-card">
            <h3><i class="fas fa-paper-plane"></i> Send Us a Message</h3>
            <p>Fill out the form below and we'll get back to you within 24 hours</p>

            @if ($isCustomDomain)
                {{ Form::open(['route' => 'contact-us', 'method' => 'post', 'id' => 'contactForm']) }}
            @else
                {{ Form::open(['route' => ['contact-us', 'code' => $user->code], 'method' => 'post', 'id' => 'contactForm']) }}
            @endif

            @if (session('success'))
                <div class="glass-alert glass-alert-success">
                    <i class="fas fa-check-circle"></i>
                    {{ session('success') }}
                </div>
            @endif
            @if (session('error'))
                <div class="glass-alert glass-alert-danger">
                    <i class="fas fa-exclamation-circle"></i>
                    {{ session('error') }}
                </div>
            @endif

            <div class="row">
                <div class="col-md-6">
                    <div class="glass-form-group">
                        <label><i class="fas fa-user"></i> Full Name *</label>
                        {{ Form::text('name', null, ['class' => 'glass-form-control', 'placeholder' => 'Enter your full name', 'required' => 'required']) }}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="glass-form-group">
                        <label><i class="fas fa-envelope"></i> Email Address *</label>
                        {{ Form::email('email', null, ['class' => 'glass-form-control', 'placeholder' => 'your@email.com', 'required' => 'required']) }}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="glass-form-group">
                        <label><i class="fas fa-phone-alt"></i> Phone Number</label>
                        {{ Form::tel('contact_number', null, ['class' => 'glass-form-control', 'placeholder' => '+1 234 567 8900']) }}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="glass-form-group">
                        <label><i class="fas fa-tag"></i> Subject *</label>
                        {{ Form::text('subject', null, ['class' => 'glass-form-control', 'placeholder' => 'What is this regarding?', 'required' => 'required']) }}
                    </div>
                </div>
                <div class="col-12">
                    <div class="glass-form-group">
                        <label><i class="fas fa-comment-dots"></i> Message *</label>
                        {{ Form::textarea('message', null, ['class' => 'glass-form-control', 'rows' => 5, 'placeholder' => 'Tell us how we can help you...', 'required' => 'required']) }}
                    </div>
                </div>
                <div class="col-12">
                    <button type="submit" class="glass-btn-submit">
                        Send Message <i class="fas fa-arrow-right"></i>
                    </button>
                </div>
            </div>
            {{ Form::close() }}
        </div>

        <!-- Info Cards -->
        <div class="glass-info-cards">
            <div class="glass-info-card">
                <div class="glass-info-icon">
                    <i class="fas fa-map-marker-alt"></i>
                </div>
                <h4>Visit Our Office</h4>
                <p>{{ $companyAddress }}</p>
            </div>
            <a href="tel:{{ preg_replace('/[^0-9+]/', '', $companyPhone) }}" class="glass-info-card">
                <div class="glass-info-icon">
                    <i class="fas fa-phone-alt"></i>
                </div>
                <h4>Call Us Anytime</h4>
                <p>{{ $companyPhone }}</p>
                <p class="small-text">Mon-Fri, 9am - 6pm</p>
            </a>
            <a href="mailto:{{ $companyEmail }}" class="glass-info-card">
                <div class="glass-info-icon">
                    <i class="fas fa-envelope"></i>
                </div>
                <h4>Email Us</h4>
                <p>{{ $companyEmail }}</p>
                <p class="small-text">24/7 Support</p>
            </a>
        </div>

        <!-- Google Map -->
        @if(!empty($companyMap))
        <div class="glass-map-section">
            <iframe
                src="{{ $companyMap }}"
                allowfullscreen=""
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>
        @endif
    </div>
</section>

@endsection

@push('theme8-scripts')
<script>
$(document).ready(function() {
    $('#contactForm').on('submit', function(e) {
        let isValid = true;
        const requiredFields = ['name', 'email', 'subject', 'message'];

        requiredFields.forEach(function(field) {
            const value = $('[name="' + field + '"]').val();
            if (!value || value.trim() === '') {
                isValid = false;
                $('[name="' + field + '"]').css('border-color', '#ff3b30');
            } else {
                $('[name="' + field + '"]').css('border-color', 'rgba(0, 0, 0, 0.1)');
            }
        });

        const email = $('[name="email"]').val();
        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (email && !emailPattern.test(email)) {
            isValid = false;
            $('[name="email"]').css('border-color', '#ff3b30');
        }

        if (!isValid) {
            e.preventDefault();
            alert('Please fill in all required fields correctly.');
        }
    });

    $('.glass-form-control').on('input', function() {
        $(this).css('border-color', 'rgba(0, 0, 0, 0.1)');
    });
});
</script>
@endpush
