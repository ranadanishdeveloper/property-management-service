@extends('theme9.main')
@section('content')

<style>
/* ============================================
   THEME 9 - CONTACT PAGE
   Dark theme + Gold accents + Form + Info cards + Map
   ============================================ */

/* Contact Hero */
.contact-hero {
    background: linear-gradient(135deg, #0a0a0a, #1a1a1a);
    padding: 100px 0 60px;
    margin-top: 80px;

    text-align: center;
}

.contact-hero h1 {
    font-size: 3rem;
    font-weight: 800;
    color: white;
    margin-bottom: 15px;
}

.contact-hero h1 span {
    color: #d4af37;
}

.contact-hero p {
    color: #a0a0a0;
    max-width: 600px;
    margin: 0 auto;
}

/* Contact Section */
.contact-section {
    padding: 60px 0;
    background: #0a0a0a;
}

/* Contact Form Card */
.contact-card {
    background: #1a1a1a;
    border-radius: 20px;
    padding: 40px;
    margin-bottom: 50px;
}

.contact-card h3 {
    font-size: 1.5rem;
    font-weight: 700;
    margin-bottom: 10px;
    text-align: center;
    color: white;
}

.contact-card h3 i {
    color: #d4af37;
    margin-right: 10px;
}

.contact-card > p {
    text-align: center;
    color: #a0a0a0;
    margin-bottom: 30px;
}

/* Form Styles */
.form-group {
    margin-bottom: 20px;
}

.form-group label {
    display: block;
    margin-bottom: 8px;
    font-weight: 600;
    font-size: 13px;
    color: #d4af37;
}

.form-group label i {
    margin-right: 6px;
}

.form-control {
    width: 100%;
    padding: 14px 18px;
    border: 1px solid #2a2a2a;
    border-radius: 12px;
    font-size: 14px;
    background: #0a0a0a;
    color: white;
    transition: all 0.2s;
}

.form-control:focus {
    outline: none;
    border-color: #d4af37;
}

textarea.form-control {
    resize: vertical;
    min-height: 130px;
}

.btn-submit {
    background: #d4af37;
    color: #0a0a0a;
    border: none;
    padding: 14px 32px;
    border-radius: 12px;
    font-weight: 700;
    font-size: 16px;
    width: 100%;
    cursor: pointer;
    transition: all 0.2s;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
}

.btn-submit:hover {
    background: #b8941e;
    transform: translateY(-2px);
}

/* Alerts */
.alert {
    padding: 15px 20px;
    border-radius: 12px;
    margin-bottom: 25px;
    display: flex;
    align-items: center;
    gap: 10px;
    font-size: 14px;
}

.alert-success {
    background: rgba(212, 175, 55, 0.1);
    border-left: 4px solid #d4af37;
    color: #d4af37;
}

.alert-danger {
    background: rgba(255, 59, 48, 0.1);
    border-left: 4px solid #ff3b30;
    color: #ff6b6b;
}

/* Info Cards */
.info-cards {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 30px;
    margin-bottom: 50px;
}

.info-card {
    text-align: center;
    padding: 35px 25px;
    background: #1a1a1a;
    border-radius: 20px;
    transition: all 0.3s;
    text-decoration: none;
    display: block;
}

.info-card:hover {
    transform: translateY(-5px);
}

.info-icon {
    width: 70px;
    height: 70px;
    background: rgba(212, 175, 55, 0.15);
    border-radius: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 20px;
    color: #d4af37;
    font-size: 28px;
    transition: all 0.3s;
}

.info-card:hover .info-icon {
    background: #d4af37;
    color: #0a0a0a;
}

.info-card h4 {
    font-size: 1.1rem;
    font-weight: 700;
    margin-bottom: 12px;
    color: white;
}

.info-card p {
    color: #a0a0a0;
    font-size: 14px;
    line-height: 1.6;
}

.info-card .small-text {
    font-size: 11px;
    margin-top: 8px;
    color: #d4af37;
}

/* Map Section */
.map-section {
    border-radius: 20px;
    overflow: hidden;
}

.map-section iframe {
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

/* Container */
.container {
    max-width: 1280px;
    margin: 0 auto;
    padding: 0 24px;
    width: 100%;
}

/* Responsive */
@media (max-width: 1024px) {
    .info-cards {
        grid-template-columns: repeat(3, 1fr);
    }
}

@media (max-width: 768px) {
    .contact-hero h1 {
        font-size: 2rem;
    }

    .contact-card {
        padding: 25px;
        margin-bottom: 40px;
    }

    .col-md-6 {
        width: 100%;
    }

    .info-cards {
        grid-template-columns: 1fr;
        gap: 20px;
    }

    .info-card {
        padding: 25px;
    }

    .map-section iframe {
        height: 250px;
    }

    .container {
        padding: 0 20px;
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
<section class="contact-hero " style="margin-top: 83px">
    <h1>Get in <span>Touch</span></h1>
    <p>We'd love to hear from you. Send us a message and we'll respond as soon as possible.</p>
</section>

<!-- ========== CONTACT SECTION ========== -->
<section class="contact-section">
    <div class="container">
        <!-- Contact Form Card -->
        <div class="contact-card">
            <h3><i class="fas fa-paper-plane"></i> Send Us a Message</h3>
            <p>Fill out the form below and we'll get back to you within 24 hours</p>

            @if ($isCustomDomain)
                {{ Form::open(['route' => 'contact-us', 'method' => 'post', 'id' => 'contactForm']) }}
            @else
                {{ Form::open(['route' => ['contact-us', 'code' => $user->code], 'method' => 'post', 'id' => 'contactForm']) }}
            @endif

            @if (session('success'))
                <div class="alert alert-success">
                    <i class="fas fa-check-circle"></i>
                    {{ session('success') }}
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">
                    <i class="fas fa-exclamation-circle"></i>
                    {{ session('error') }}
                </div>
            @endif

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label><i class="fas fa-user"></i> Full Name *</label>
                        {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Enter your full name', 'required' => 'required']) }}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label><i class="fas fa-envelope"></i> Email Address *</label>
                        {{ Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'your@email.com', 'required' => 'required']) }}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label><i class="fas fa-phone-alt"></i> Phone Number</label>
                        {{ Form::tel('contact_number', null, ['class' => 'form-control', 'placeholder' => '+1 234 567 8900']) }}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label><i class="fas fa-tag"></i> Subject *</label>
                        {{ Form::text('subject', null, ['class' => 'form-control', 'placeholder' => 'What is this regarding?', 'required' => 'required']) }}
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label><i class="fas fa-comment-dots"></i> Message *</label>
                        {{ Form::textarea('message', null, ['class' => 'form-control', 'rows' => 5, 'placeholder' => 'Tell us how we can help you...', 'required' => 'required']) }}
                    </div>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn-submit">
                        Send Message <i class="fas fa-arrow-right"></i>
                    </button>
                </div>
            </div>
            {{ Form::close() }}
        </div>

        <!-- Info Cards -->
        <div class="info-cards">
            <div class="info-card">
                <div class="info-icon">
                    <i class="fas fa-map-marker-alt"></i>
                </div>
                <h4>Visit Our Office</h4>
                <p>{{ $companyAddress }}</p>
            </div>
            <a href="tel:{{ preg_replace('/[^0-9+]/', '', $companyPhone) }}" class="info-card">
                <div class="info-icon">
                    <i class="fas fa-phone-alt"></i>
                </div>
                <h4>Call Us Anytime</h4>
                <p>{{ $companyPhone }}</p>
                <p class="small-text">Mon-Fri, 9am - 6pm</p>
            </a>
            <a href="mailto:{{ $companyEmail }}" class="info-card">
                <div class="info-icon">
                    <i class="fas fa-envelope"></i>
                </div>
                <h4>Email Us</h4>
                <p>{{ $companyEmail }}</p>
                <p class="small-text">24/7 Support</p>
            </a>
        </div>

        <!-- Google Map -->
        @if(!empty($companyMap))
        <div class="map-section">
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

@push('theme9-scripts')
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
                $('[name="' + field + '"]').css('border-color', '#2a2a2a');
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

    $('.form-control').on('input', function() {
        $(this).css('border-color', '#2a2a2a');
    });
});
</script>
@endpush
