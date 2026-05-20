@php
    $Section_8 = App\Models\FrontHomePage::where('section', 'Section 8')->first();
    $Section_8_content_value = !empty($Section_8->content_value) ? json_decode($Section_8->content_value, true) : [];
    $admin_logo = getSettingsValByName('company_logo');
@endphp

@if (empty($Section_8_content_value['section_enabled']) || $Section_8_content_value['section_enabled'] == 'active')
    <style>
        .footer {
            background: #1a1a1a;
            color: #a0a0a0;
            padding: 60px 0 30px;
            
        }

        .footer-grid {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr 1.5fr;
            gap: 48px;
            margin-bottom: 40px;
        }

        .footer-logo h3 {
            font-size: 24px;
            color: white;
            margin-bottom: 16px;
        }

        .footer-desc {
            font-size: 13px;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        .social {
            display: flex;
            gap: 12px;
        }

        .social a {
            width: 36px;
            height: 36px;
            background: rgba(255, 255, 255, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #a0a0a0;
            transition: all 0.2s;
            text-decoration: none;
        }

        .social a:hover {
            background: #d4af37;
            color: #1a1a1a;
            transform: translateY(-3px);
        }

        .footer-title {
            font-size: 14px;
            font-weight: 700;
            margin-bottom: 20px;
            color: white;
            letter-spacing: 1px;
        }

        .footer-links {
            list-style: none;
        }

        .footer-links li {
            margin-bottom: 10px;
        }

        .footer-links a {
            color: #a0a0a0;
            text-decoration: none;
            font-size: 13px;
            transition: color 0.2s;
        }

        .footer-links a:hover {
            color: #d4af37;
        }

        .contact-item {
            display: flex;
            gap: 12px;
            margin-bottom: 16px;
        }

        .contact-icon {
            width: 32px;
            height: 32px;
            background: rgba(255, 255, 255, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #d4af37;
        }

        .footer-bottom {
            text-align: center;
            padding-top: 24px;
            border-top: 1px solid #2a2a2a;
            font-size: 12px;
        }

        @media (max-width: 900px) {
            .footer-grid {
                grid-template-columns: 1fr 1fr;
                gap: 32px;
            }
        }

        @media (max-width: 600px) {
            .footer-grid {
                grid-template-columns: 1fr;
                text-align: center;
            }

            .social {
                justify-content: center;
            }

            .contact-item {
                justify-content: center;
            }
        }
    </style>

    <footer class="footer">
        <div class="container">
            <div class="footer-grid">
                <div class="animate-fade-up delay-100">
                    <div class="footer-logo">
                        @if (!empty($admin_logo))
                            <img src="{{ asset(Storage::url('upload/logo/')) . '/' . (isset($admin_logo) && !empty($admin_logo) ? $admin_logo : 'logo.png') }}"
                                alt="Logo" style="height: 45px; width: auto; filter: brightness(0) invert(1);">
                        @else
                            <h3>{{ $settings['app_name'] ?? 'FUSION' }}</h3>
                        @endif
                    </div>
                    <p class="footer-desc">
                        {{ $Section_8_content_value['Sec8_info'] ?? 'Your trusted property management solution.' }}</p>
                    <div class="social">
                        <a href="{{ $Section_8_content_value['fb_link'] ?? '#' }}" target="_blank"><i
                                class="fab fa-facebook-f"></i></a>
                        <a href="{{ $Section_8_content_value['twitter_link'] ?? '#' }}" target="_blank"><i
                                class="fab fa-twitter"></i></a>
                        <a href="{{ $Section_8_content_value['insta_link'] ?? '#' }}" target="_blank"><i
                                class="fab fa-instagram"></i></a>
                        <a href="{{ $Section_8_content_value['linkedin_link'] ?? '#' }}" target="_blank"><i
                                class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>

                <div class="animate-fade-up delay-200">
                    <h4 class="footer-title">QUICK LINKS</h4>
                    <ul class="footer-links">
                        <li><a href="{{ $homeUrl ?? '#' }}">Home</a></li>
                        <li><a href="{{ $propertiesUrl ?? '#' }}">Properties</a></li>
                        <li><a href="{{ $blogUrl ?? '#' }}">Blog</a></li>
                        <li><a href="{{ $contactUrl ?? '#' }}">Contact</a></li>
                    </ul>
                </div>

                <div class="animate-fade-up delay-300">
                    <h4 class="footer-title">SUPPORT</h4>
                    <ul class="footer-links">
                        <li><a href="#">FAQs</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Terms of Service</a></li>
                        <li><a href="#">Help Center</a></li>
                    </ul>
                </div>

                <div class="animate-fade-up delay-400">
                    <h4 class="footer-title">CONTACT</h4>
                    <div class="contact-item">
                        <div class="contact-icon"><i class="fas fa-map-marker-alt"></i></div>
                        <div>{{ $settings['company_address'] ?? '123 Property Street, City' }}</div>
                    </div>
                    <div class="contact-item">
                        <div class="contact-icon"><i class="fas fa-phone-alt"></i></div>
                        <div>{{ $settings['company_phone'] ?? '+1 234 567 890' }}</div>
                    </div>
                    <div class="contact-item">
                        <div class="contact-icon"><i class="fas fa-envelope"></i></div>
                        <div>{{ $settings['company_email'] ?? 'info@example.com' }}</div>
                    </div>
                </div>
            </div>

            <div class="footer-bottom animate-fade-up delay-500">
                <div>&copy; {{ date('Y') }} {{ $settings['app_name'] ?? 'Fusion' }}. All rights reserved.</div>
            </div>
        </div>
    </footer>
@endif
