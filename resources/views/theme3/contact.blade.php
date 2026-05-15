@extends('theme3.main')

@section('content')
    <section class="theme3-contact-section">
        <div class="theme3-container">
            <!-- Header -->
            <div class="theme3-contact-header">
                <div class="theme3-contact-header-content">
                    <h2 class="theme3-contact-title">{{ __('Get in Touch') }}</h2>
                    <p class="theme3-contact-subtitle">
                        {{ __('We’re here to help—reach out to us anytime with your questions or feedback.') }}
                    </p>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="theme3-contact-form-wrapper">
                <div class="theme3-contact-card">
                    {{ Form::open(['route' => ['contact-us', 'code' => $user->code], 'method' => 'post']) }}

                    @if (session('error'))
                        <div class="theme3-alert theme3-alert-danger">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ session('error') }}
                        </div>
                    @endif

                    @if (session('success'))
                        <div class="theme3-alert theme3-alert-success">
                            <i class="fas fa-check-circle"></i>
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="theme3-form-group">
                        {{ Form::label('name', __('Name'), ['class' => 'theme3-form-label']) }}
                        {{ Form::text('name', null, [
                            'class' => 'theme3-form-control',
                            'placeholder' => __('Enter your name'),
                            'required' => 'required'
                        ]) }}
                    </div>

                    <div class="theme3-form-group">
                        {{ Form::label('email', __('Email'), ['class' => 'theme3-form-label']) }}
                        {{ Form::email('email', null, [
                            'class' => 'theme3-form-control',
                            'placeholder' => __('Enter your email'),
                            'required' => 'required'
                        ]) }}
                    </div>

                    <div class="theme3-form-group">
                        {{ Form::label('contact_number', __('Contact Number'), ['class' => 'theme3-form-label']) }}
                        {{ Form::tel('contact_number', null, [
                            'class' => 'theme3-form-control',
                            'placeholder' => __('Enter your contact number')
                        ]) }}
                    </div>

                    <div class="theme3-form-group">
                        {{ Form::label('subject', __('Subject'), ['class' => 'theme3-form-label']) }}
                        {{ Form::text('subject', null, [
                            'class' => 'theme3-form-control',
                            'placeholder' => __('Enter subject'),
                            'required' => 'required'
                        ]) }}
                    </div>

                    <div class="theme3-form-group">
                        {{ Form::label('message', __('Message'), ['class' => 'theme3-form-label']) }}
                        {{ Form::textarea('message', null, [
                            'class' => 'theme3-form-control theme3-textarea',
                            'rows' => 5,
                            'required' => 'required',
                            'placeholder' => __('Enter your message')
                        ]) }}
                    </div>

                    <div class="theme3-form-submit">
                        {{ Form::submit(__('Send Message'), ['class' => 'theme3-submit-btn']) }}
                    </div>

                    {{ Form::close() }}
                </div>
            </div>

            <!-- Contact Info Cards -->
            <div class="theme3-contact-info">
                <div class="theme3-info-grid">
                    <div class="theme3-info-card">
                        <div class="theme3-info-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <h4 class="theme3-info-title">{{ __('Visit Us') }}</h4>
                        <p class="theme3-info-text">
                            {{ $settings['company_address'] ?? '123 Property Street, City, Country' }}
                        </p>
                    </div>

                    <div class="theme3-info-card">
                        <div class="theme3-info-icon">
                            <i class="fas fa-phone-alt"></i>
                        </div>
                        <h4 class="theme3-info-title">{{ __('Call Us') }}</h4>
                        <p class="theme3-info-text">
                            {{ $settings['company_phone'] ?? '+1 234 567 8900' }}
                        </p>
                    </div>

                    <div class="theme3-info-card">
                        <div class="theme3-info-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <h4 class="theme3-info-title">{{ __('Email Us') }}</h4>
                        <p class="theme3-info-text">
                            {{ $settings['company_email'] ?? 'info@example.com' }}
                        </p>
                    </div>

                    <div class="theme3-info-card">
                        <div class="theme3-info-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <h4 class="theme3-info-title">{{ __('Working Hours') }}</h4>
                        <p class="theme3-info-text">
                            {{ __('Mon - Fri: 9:00 AM - 6:00 PM') }}<br>
                            {{ __('Sat: 10:00 AM - 4:00 PM') }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('theme3-script')
<script>
    $(document).ready(function() {
        // Auto-hide alerts after 5 seconds
        setTimeout(function() {
            $('.theme3-alert').fadeOut('slow');
        }, 5000);
    });
</script>
@endpush
