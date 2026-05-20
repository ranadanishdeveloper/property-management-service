@extends('theme6.main')
@section('content')

<style>
/* ============================================
   THEME 6 - CONTACT PAGE
   Modern Magazine Style with Unified Container
=========================================== */

:root {
    --primary: #ff6b4a;
    --primary-dark: #e85d3e;
    --primary-soft: rgba(255,107,74,0.1);
    --dark: #1a1a2e;
    --gray: #6c757d;
    --gray-light: #e8e8e8;
    --light: #f8f9fa;
    --white: #ffffff;
    --shadow: 0 10px 30px rgba(0,0,0,0.05);
    --shadow-lg: 0 20px 40px rgba(0,0,0,0.08);
    --shadow-xl: 0 30px 60px rgba(0,0,0,0.1);
}

/* ========== UNIFIED CONTAINER ========== */
.theme6-container {
    max-width: 1280px;
    margin: 0 auto;
    padding: 0 28px;
    width: 100%;
}

/* ========== CONTACT HERO ========== */
.contact-hero {
    padding: 140px 0 60px;
    background: linear-gradient(135deg, #fff8f5 0%, #ffffff 100%);
    text-align: center;
    position: relative;
    overflow: hidden;
}

.contact-hero::before {
    content: '';
    position: absolute;
    top: -30%;
    right: -20%;
    width: 60%;
    height: 150%;
    background: radial-gradient(circle, rgba(255,107,74,0.08), transparent);
    border-radius: 50%;
    animation: floatBg 20s ease-in-out infinite;
}

@keyframes floatBg {
    0%, 100% { transform: translate(0, 0) rotate(0deg); }
    50% { transform: translate(-20px, -20px) rotate(5deg); }
}

.contact-hero h1 {
    font-size: 52px;
    font-weight: 800;
    margin-bottom: 16px;
    position: relative;
    z-index: 2;
}

.contact-hero h1 span {
    background: linear-gradient(135deg, var(--primary), var(--primary-dark));
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}

.contact-hero p {
    font-size: 18px;
    color: var(--gray);
    max-width: 600px;
    margin: 0 auto;
    position: relative;
    z-index: 2;
}

/* ========== CONTACT SECTION ========== */
.contact-section {
    padding: 40px 0 80px;
    background: var(--light);
}

/* ========== CONTACT CARD ========== */
.contact-card {
    background: var(--white);
    border-radius: 28px;
    padding: 50px;
    box-shadow: var(--shadow);
    margin-bottom: 60px;
    transition: all 0.3s;
    max-width: 900px;
    margin-left: auto;
    margin-right: auto;
}

.contact-card:hover {
    box-shadow: var(--shadow-xl);
}

.contact-card h3 {
    font-size: 24px;
    font-weight: 700;
    margin-bottom: 10px;
    text-align: center;
}

.contact-card p {
    text-align: center;
    color: var(--gray);
    margin-bottom: 30px;
}

/* ========== FORM STYLES ========== */
.form-group {
    margin-bottom: 20px;
}

.form-group label {
    display: block;
    margin-bottom: 8px;
    font-weight: 600;
    font-size: 14px;
    color: var(--dark);
}

.form-group label i {
    color: var(--primary);
    margin-right: 6px;
}

.form-control {
    width: 100%;
    padding: 14px 18px;
    border: 1px solid var(--gray-light);
    border-radius: 14px;
    font-size: 14px;
    transition: all 0.3s;
    background: var(--white);
}

.form-control:focus {
    outline: none;
    border-color: var(--primary);
    box-shadow: 0 0 0 3px rgba(255,107,74,0.1);
}

textarea.form-control {
    resize: vertical;
    min-height: 130px;
}

/* ========== BUTTON ========== */
.btn-submit {
    background: linear-gradient(135deg, var(--primary), var(--primary-dark));
    color: white;
    border: none;
    padding: 16px 32px;
    border-radius: 50px;
    font-weight: 600;
    font-size: 16px;
    width: 100%;
    cursor: pointer;
    transition: all 0.3s;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
}

.btn-submit:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 25px rgba(255,107,74,0.3);
}

.btn-submit i {
    transition: transform 0.3s;
}

.btn-submit:hover i {
    transform: translateX(5px);
}

/* ========== ALERTS ========== */
.alert {
    padding: 15px 20px;
    border-radius: 14px;
    margin-bottom: 25px;
    display: flex;
    align-items: center;
    gap: 10px;
    font-size: 14px;
}

.alert-success {
    background: #d4edda;
    color: #155724;
    border-left: 4px solid #28a745;
}

.alert-danger {
    background: #f8d7da;
    color: #721c24;
    border-left: 4px solid #dc3545;
}

.alert i {
    font-size: 18px;
}

/* ========== INFO CARDS GRID ========== */
.info-cards {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 30px;
    margin-top: 20px;
}

.info-card {
    text-align: center;
    padding: 35px 25px;
    background: var(--white);
    border-radius: 24px;
    transition: all 0.3s;
    box-shadow: var(--shadow);
    text-decoration: none;
    display: block;
}

.info-card:hover {
    transform: translateY(-8px);
    box-shadow: var(--shadow-xl);
}

.info-icon {
    width: 70px;
    height: 70px;
    background: var(--primary-soft);
    border-radius: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 20px;
    color: var(--primary);
    font-size: 28px;
    transition: all 0.3s;
}

.info-card:hover .info-icon {
    background: var(--primary);
    color: white;
    transform: scale(1.05);
}

.info-card h4 {
    font-size: 18px;
    font-weight: 700;
    margin-bottom: 12px;
    color: var(--dark);
}

.info-card p {
    color: var(--gray);
    font-size: 14px;
    line-height: 1.6;
}

.info-card a {
    color: var(--primary);
    text-decoration: none;
    font-weight: 500;
    transition: color 0.3s;
}

.info-card a:hover {
    color: var(--primary-dark);
}

/* ========== MAP SECTION ========== */
.map-section {
    margin-top: 60px;
    border-radius: 28px;
    overflow: hidden;
    box-shadow: var(--shadow);
}

.map-section iframe {
    width: 100%;
    height: 350px;
    border: none;
    display: block;
}

/* ========== RESPONSIVE ========== */
@media (max-width: 1024px) {
    .info-cards {
        grid-template-columns: repeat(3, 1fr);
        gap: 20px;
    }
}

@media (max-width: 768px) {
    .theme6-container {
        padding: 0 20px;
    }
    
    .contact-hero {
        padding: 100px 0 40px;
    }
    
    .contact-hero h1 {
        font-size: 32px;
    }
    
    .contact-hero p {
        font-size: 16px;
    }
    
    .contact-section {
        padding: 30px 0 60px;
    }
    
    .contact-card {
        padding: 30px 25px;
        margin-bottom: 40px;
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
}

@media (max-width: 480px) {
    .contact-card {
        padding: 20px;
    }
    
    .btn-submit {
        padding: 14px 24px;
        font-size: 14px;
    }
    
    .info-icon {
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
<section class="contact-hero">
    <div class="theme6-container">
        <h1>Get in <span>Touch</span></h1>
        <p>We'd love to hear from you. Send us a message and we'll respond as soon as possible.</p>
    </div>
</section>

<!-- ========== CONTACT SECTION ========== -->
<section class="contact-section">
    <div class="theme6-container">
        <!-- Contact Form Card -->
        <div class="contact-card">
            <h3><i class="fas fa-paper-plane" style="color: var(--primary);"></i> Send Us a Message</h3>
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
                <p style="font-size: 12px; margin-top: 5px;">Mon-Fri, 9am - 6pm</p>
            </a>
            <a href="mailto:{{ $companyEmail }}" class="info-card">
                <div class="info-icon">
                    <i class="fas fa-envelope"></i>
                </div>
                <h4>Email Us</h4>
                <p>{{ $companyEmail }}</p>
                <p style="font-size: 12px; margin-top: 5px;">24/7 Support</p>
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

@push('theme6-script')
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
                $('[name="' + field + '"]').css('border-color', '#dc3545');
            } else {
                $('[name="' + field + '"]').css('border-color', '');
            }
        });
        
        // Email validation
        const email = $('[name="email"]').val();
        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (email && !emailPattern.test(email)) {
            isValid = false;
            $('[name="email"]').css('border-color', '#dc3545');
        }
        
        if (!isValid) {
            e.preventDefault();
            alert('Please fill in all required fields correctly.');
        }
    });
    
    // Remove border color on input
    $('.form-control').on('input', function() {
        $(this).css('border-color', '');
    });
});
</script>
@endpush