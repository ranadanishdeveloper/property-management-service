@extends('theme7.main')
@section('content')

<style>
/* ============================================
   THEME 7 - CONTACT PAGE (NEON BRUTALIST - LIGHT VERSION)
   Contact Form + Info Cards + Map
   Colors: Neon Pink #ff2a6d + Cyan #05d9e8
   Background: Light #f8f9fa
   Clean inputs & buttons (no clip-path on form elements)
   ============================================ */

:root {
    --neon-pink: #ff2a6d;
    --neon-cyan: #05d9e8;
    --neon-purple: #b100e8;
    --light-bg: #f8f9fa;
    --card-bg: #ffffff;
    --dark-text: #1a1a1a;
    --gray-text: #6c757d;
    --glow-pink: 0 0 10px rgba(255, 42, 109, 0.3);
    --glow-cyan: 0 0 10px rgba(5, 217, 232, 0.3);
}

.cyber-container {
    max-width: 1280px;
    margin: 0 auto;
    padding: 0 24px;
    width: 100%;
}

/* ========== CONTACT HERO ========== */
.cyber-contact-hero {
    background: linear-gradient(135deg, #e9ecef 0%, #f8f9fa 100%);
    padding: 120px 0 60px;
    text-align: center;
    border-bottom: 2px solid var(--neon-pink);
}

.cyber-contact-hero h1 {
    font-size: clamp(2.5rem, 6vw, 4rem);
    font-weight: 800;
    color: var(--dark-text);
    margin-bottom: 16px;
}

.cyber-contact-hero h1 span {
    color: var(--neon-cyan);
}

.cyber-contact-hero p {
    color: var(--gray-text);
    max-width: 600px;
    margin: 0 auto;
}

/* ========== CONTACT SECTION ========== */
.cyber-contact-section {
    padding: 60px 0 80px;
    background: var(--light-bg);
}

/* ========== CONTACT FORM CARD ========== */
.cyber-contact-card {
    background: var(--card-bg);
    border: 2px solid var(--neon-pink);
    padding: 50px;
    margin-bottom: 60px;
    transition: all 0.3s;
    box-shadow: 0 2px 8px rgba(0,0,0,0.05);
    border-radius: 8px;
}

.cyber-contact-card:hover {
    border-color: var(--neon-cyan);
    box-shadow: var(--glow-cyan);
}

.cyber-contact-card h3 {
    font-size: 28px;
    font-weight: 800;
    margin-bottom: 10px;
    text-align: center;
    color: var(--dark-text);
}

.cyber-contact-card h3 i {
    color: var(--neon-pink);
    margin-right: 10px;
}

.cyber-contact-card p {
    text-align: center;
    color: var(--gray-text);
    margin-bottom: 30px;
}

/* ========== FORM STYLES - CLEAN ROUNDED CORNERS ========== */
.cyber-form-group {
    margin-bottom: 20px;
}

.cyber-form-group label {
    display: block;
    margin-bottom: 8px;
    font-weight: 700;
    font-size: 12px;
    color: var(--neon-cyan);
    text-transform: uppercase;
    letter-spacing: 1px;
}

.cyber-form-group label i {
    color: var(--neon-pink);
    margin-right: 6px;
}

.cyber-form-control {
    width: 100%;
    padding: 14px 18px;
    border: 1px solid var(--neon-cyan);
    border-radius: 8px;
    font-size: 14px;
    background: var(--light-bg);
    color: var(--dark-text);
    transition: all 0.3s;
}

.cyber-form-control:focus {
    outline: none;
    border-color: var(--neon-pink);
    box-shadow: var(--glow-pink);
}

.cyber-form-control::placeholder {
    color: #adb5bd;
}

textarea.cyber-form-control {
    resize: vertical;
    min-height: 130px;
}

/* ========== BUTTON - CLEAN ROUNDED CORNERS ========== */
.cyber-btn-submit {
    background: var(--neon-pink);
    color: white;
    border: none;
    padding: 16px 32px;
    font-weight: 800;
    font-size: 14px;
    text-transform: uppercase;
    letter-spacing: 2px;
    width: 100%;
    cursor: pointer;
    transition: all 0.3s;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    border-radius: 8px;
}

.cyber-btn-submit:hover {
    background: var(--neon-cyan);
    color: var(--dark-text);
    transform: translateY(-3px);
    box-shadow: var(--glow-cyan);
}

.cyber-btn-submit i {
    transition: transform 0.3s;
}

.cyber-btn-submit:hover i {
    transform: translateX(5px);
}

/* ========== ALERTS ========== */
.cyber-alert {
    padding: 15px 20px;
    margin-bottom: 25px;
    display: flex;
    align-items: center;
    gap: 10px;
    font-size: 13px;
    font-weight: 600;
    border-radius: 8px;
}

.cyber-alert-success {
    background: rgba(5, 217, 232, 0.1);
    border-left: 4px solid var(--neon-cyan);
    color: var(--neon-cyan);
}

.cyber-alert-danger {
    background: rgba(255, 42, 109, 0.1);
    border-left: 4px solid var(--neon-pink);
    color: var(--neon-pink);
}

/* ========== INFO CARDS GRID ========== */
.cyber-info-cards {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 30px;
    margin-top: 20px;
}

.cyber-info-card {
    text-align: center;
    padding: 35px 25px;
    background: var(--card-bg);
    border: 2px solid var(--neon-pink);
    transition: all 0.3s;
    text-decoration: none;
    display: block;
    box-shadow: 0 2px 8px rgba(0,0,0,0.05);
    border-radius: 8px;
}

.cyber-info-card:hover {
    transform: translateY(-8px);
    border-color: var(--neon-cyan);
    box-shadow: var(--glow-cyan);
}

.cyber-info-icon {
    width: 70px;
    height: 70px;
    background: rgba(255, 42, 109, 0.1);
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 20px;
    color: var(--neon-pink);
    font-size: 28px;
    border-radius: 12px;
    transition: all 0.3s;
}

.cyber-info-card:hover .cyber-info-icon {
    background: var(--neon-pink);
    color: white;
    transform: scale(1.05);
}

.cyber-info-card h4 {
    font-size: 18px;
    font-weight: 800;
    margin-bottom: 12px;
    color: var(--dark-text);
    text-transform: uppercase;
}

.cyber-info-card p {
    color: var(--gray-text);
    font-size: 14px;
    line-height: 1.6;
}

.cyber-info-card .small-text {
    font-size: 11px;
    margin-top: 8px;
    color: var(--neon-cyan);
}

/* ========== MAP SECTION ========== */
.cyber-map-section {
    margin-top: 60px;
    border: 2px solid var(--neon-pink);
    overflow: hidden;
    border-radius: 8px;
}

.cyber-map-section iframe {
    width: 100%;
    height: 350px;
    border: none;
    display: block;
}

.cyber-map-section:hover {
    border-color: var(--neon-cyan);
}

/* ========== ROW & COLUMN ========== */
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

/* ========== RESPONSIVE ========== */
@media (max-width: 1024px) {
    .cyber-info-cards {
        grid-template-columns: repeat(3, 1fr);
        gap: 20px;
    }
}

@media (max-width: 768px) {
    .cyber-container {
        padding: 0 20px;
    }

    .cyber-contact-hero {
        padding: 100px 0 40px;
    }

    .cyber-contact-hero h1 {
        font-size: 32px;
    }

    .cyber-contact-hero p {
        font-size: 14px;
    }

    .cyber-contact-section {
        padding: 40px 0 60px;
    }

    .cyber-contact-card {
        padding: 30px 25px;
        margin-bottom: 40px;
    }

    .cyber-contact-card h3 {
        font-size: 22px;
    }

    .col-md-6 {
        width: 100%;
    }

    .cyber-info-cards {
        grid-template-columns: 1fr;
        gap: 20px;
    }

    .cyber-info-card {
        padding: 25px;
    }

    .cyber-map-section iframe {
        height: 250px;
    }
}

@media (max-width: 480px) {
    .cyber-contact-card {
        padding: 20px;
    }

    .cyber-btn-submit {
        padding: 14px 24px;
        font-size: 12px;
    }

    .cyber-info-icon {
        width: 55px;
        height: 55px;
        font-size: 22px;
    }
}
</style>

@php
    $isCustomDomain = isset($is_custom_domain) ? $is_custom_domain : (request()->getHost() !== '13.61.10.174' && request()->getHost() !== 'localhost' && request()->getHost() !== '127.0.0.1');

    // Get company settings
    $companyAddress = $settings['company_address'] ?? '123 Property Street, New York, NY 10001';
    $companyPhone = $settings['company_phone'] ?? '+1 (234) 567-8900';
    $companyEmail = $settings['company_email'] ?? 'hello@prophub.com';
    $companyMap = $settings['company_map'] ?? 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d193595.1583091352!2d-74.119763!3d40.697663!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d23f2825%3A0xcd86ea2b0e6e4a1b!2sNew%20York%2C%20NY%2C%20USA!5e0!3m2!1sen!2s!4v1699999999999!5m2!1sen!2s';
@endphp

<!-- ========== CONTACT HERO ========== -->
<section class="cyber-contact-hero">
    <div class="cyber-container">
        <h1>GET IN <span>// TOUCH</span></h1>
        <p>We'd love to hear from you. Send us a message and we'll respond as soon as possible.</p>
    </div>
</section>

<!-- ========== CONTACT SECTION ========== -->
<section class="cyber-contact-section">
    <div class="cyber-container">
        <!-- Contact Form Card -->
        <div class="cyber-contact-card">
            <h3><i class="fas fa-paper-plane"></i> SEND US A MESSAGE</h3>
            <p>Fill out the form below and we'll get back to you within 24 hours</p>

            @if ($isCustomDomain)
                {{ Form::open(['route' => 'contact-us', 'method' => 'post', 'id' => 'contactForm']) }}
            @else
                {{ Form::open(['route' => ['contact-us', 'code' => $user->code], 'method' => 'post', 'id' => 'contactForm']) }}
            @endif

            @if (session('success'))
                <div class="cyber-alert cyber-alert-success">
                    <i class="fas fa-check-circle"></i>
                    {{ session('success') }}
                </div>
            @endif
            @if (session('error'))
                <div class="cyber-alert cyber-alert-danger">
                    <i class="fas fa-exclamation-circle"></i>
                    {{ session('error') }}
                </div>
            @endif

            <div class="row">
                <div class="col-md-6">
                    <div class="cyber-form-group">
                        <label><i class="fas fa-user"></i> FULL NAME *</label>
                        {{ Form::text('name', null, ['class' => 'cyber-form-control', 'placeholder' => 'ENTER YOUR FULL NAME', 'required' => 'required']) }}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="cyber-form-group">
                        <label><i class="fas fa-envelope"></i> EMAIL ADDRESS *</label>
                        {{ Form::email('email', null, ['class' => 'cyber-form-control', 'placeholder' => 'YOUR@EMAIL.COM', 'required' => 'required']) }}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="cyber-form-group">
                        <label><i class="fas fa-phone-alt"></i> PHONE NUMBER</label>
                        {{ Form::tel('contact_number', null, ['class' => 'cyber-form-control', 'placeholder' => '+1 234 567 8900']) }}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="cyber-form-group">
                        <label><i class="fas fa-tag"></i> SUBJECT *</label>
                        {{ Form::text('subject', null, ['class' => 'cyber-form-control', 'placeholder' => 'WHAT IS THIS REGARDING?', 'required' => 'required']) }}
                    </div>
                </div>
                <div class="col-12">
                    <div class="cyber-form-group">
                        <label><i class="fas fa-comment-dots"></i> MESSAGE *</label>
                        {{ Form::textarea('message', null, ['class' => 'cyber-form-control', 'rows' => 5, 'placeholder' => 'TELL US HOW WE CAN HELP YOU...', 'required' => 'required']) }}
                    </div>
                </div>
                <div class="col-12">
                    <button type="submit" class="cyber-btn-submit">
                        SEND MESSAGE <i class="fas fa-arrow-right"></i>
                    </button>
                </div>
            </div>
            {{ Form::close() }}
        </div>

        <!-- Info Cards -->
        <div class="cyber-info-cards">
            <div class="cyber-info-card">
                <div class="cyber-info-icon">
                    <i class="fas fa-map-marker-alt"></i>
                </div>
                <h4>VISIT OUR OFFICE</h4>
                <p>{{ $companyAddress }}</p>
            </div>
            <a href="tel:{{ preg_replace('/[^0-9+]/', '', $companyPhone) }}" class="cyber-info-card">
                <div class="cyber-info-icon">
                    <i class="fas fa-phone-alt"></i>
                </div>
                <h4>CALL US ANYTIME</h4>
                <p>{{ $companyPhone }}</p>
                <p class="small-text">MON-FRI, 9AM - 6PM</p>
            </a>
            <a href="mailto:{{ $companyEmail }}" class="cyber-info-card">
                <div class="cyber-info-icon">
                    <i class="fas fa-envelope"></i>
                </div>
                <h4>EMAIL US</h4>
                <p>{{ $companyEmail }}</p>
                <p class="small-text">24/7 SUPPORT</p>
            </a>
        </div>

        <!-- Google Map -->
        @if(!empty($companyMap))
        <div class="cyber-map-section">
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

@push('theme7-scripts')
<script>
$(document).ready(function() {
    // Form validation before submit
    $('#contactForm').on('submit', function(e) {
        let isValid = true;
        const requiredFields = ['name', 'email', 'subject', 'message'];

        requiredFields.forEach(function(field) {
            const value = $('[name="' + field + '"]').val();
            if (!value || value.trim() === '') {
                isValid = false;
                $('[name="' + field + '"]').css('border-color', '#ff2a6d');
            } else {
                $('[name="' + field + '"]').css('border-color', '#05d9e8');
            }
        });

        // Email validation
        const email = $('[name="email"]').val();
        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (email && !emailPattern.test(email)) {
            isValid = false;
            $('[name="email"]').css('border-color', '#ff2a6d');
        }

        if (!isValid) {
            e.preventDefault();
            alert('PLEASE FILL IN ALL REQUIRED FIELDS CORRECTLY.');
        }
    });

    // Reset border color on input
    $('.cyber-form-control').on('input', function() {
        $(this).css('border-color', '#05d9e8');
    });
});
</script>
@endpush
