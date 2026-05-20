@php
    $Section_8 = App\Models\FrontHomePage::where('section', 'Section 8')->first();
    $Section_8_content_value = !empty($Section_8->content_value) ? json_decode($Section_8->content_value, true) : [];
    $admin_logo = getSettingsValByName('company_logo');
@endphp

@if (empty($Section_8_content_value['section_enabled']) || $Section_8_content_value['section_enabled'] == 'active')
<style>
    .glass-footer {
        background: rgba(255, 255, 255, 0.9);
        backdrop-filter: blur(20px);
        border-top: 1px solid rgba(255, 255, 255, 0.5);
        padding: 50px 0 30px;
       
    }

    .glass-footer-grid {
        display: grid;
        grid-template-columns: 2fr 1fr 1fr 1.5fr;
        gap: 48px;
        margin-bottom: 40px;
    }

    .glass-footer-logo h3 {
        font-size: 24px;
        margin-bottom: 16px;
    }

    .glass-footer-desc {
        color: #8e8e93;
        font-size: 14px;
        line-height: 1.6;
        margin-bottom: 20px;
    }

    .glass-social {
        display: flex;
        gap: 12px;
    }

    .glass-social a {
        width: 36px;
        height: 36px;
        background: rgba(0, 122, 255, 0.1);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #007aff;
        transition: all 0.2s;
        text-decoration: none;
    }

    .glass-social a:hover {
        background: #007aff;
        color: white;
        transform: translateY(-2px);
    }

    .glass-footer-title {
        font-size: 16px;
        font-weight: 600;
        margin-bottom: 20px;
        color: #1d1c1e;
    }

    .glass-footer-links {
        list-style: none;
    }

    .glass-footer-links li {
        margin-bottom: 12px;
    }

    .glass-footer-links a {
        color: #8e8e93;
        text-decoration: none;
        font-size: 14px;
        transition: all 0.2s;
    }

    .glass-footer-links a:hover {
        color: #007aff;
        transform: translateX(4px);
        display: inline-block;
    }

    .glass-contact-item {
        display: flex;
        gap: 12px;
        margin-bottom: 16px;
    }

    .glass-contact-icon {
        width: 32px;
        height: 32px;
        background: rgba(0, 122, 255, 0.1);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #007aff;
    }

    .glass-contact-text {
        color: #8e8e93;
        font-size: 14px;
    }

    .glass-newsletter-input {
        display: flex;
        gap: 10px;
        margin-top: 12px;
    }

    .glass-newsletter-input input {
        flex: 1;
        padding: 12px 16px;
        border: 1px solid rgba(0, 0, 0, 0.1);
        border-radius: 30px;
        font-size: 14px;
        background: rgba(255, 255, 255, 0.8);
    }

    .glass-newsletter-input input:focus {
        outline: none;
        border-color: #007aff;
    }

    .glass-newsletter-input button {
        width: 44px;
        background: #007aff;
        border: none;
        border-radius: 30px;
        color: white;
        cursor: pointer;
        transition: all 0.2s;
    }

    .glass-newsletter-input button:hover {
        background: #005fc1;
    }

    .glass-footer-bottom {
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 16px;
        padding-top: 24px;
        border-top: 1px solid rgba(0, 0, 0, 0.05);
        font-size: 13px;
        color: #8e8e93;
    }

    @media (max-width: 900px) {
        .glass-footer-grid {
            grid-template-columns: 1fr 1fr;
            gap: 32px;
        }
    }

    @media (max-width: 600px) {
        .glass-footer-grid {
            grid-template-columns: 1fr;
            text-align: center;
        }

        .glass-social {
            justify-content: center;
        }

        .glass-contact-item {
            justify-content: center;
        }

        .glass-footer-bottom {
            flex-direction: column;
            text-align: center;
        }
    }
</style>

<footer class="glass-footer">
    <div class="glass-container">
        <div class="glass-footer-grid">
            <div>
                <div class="glass-footer-logo">
                    @if(!empty($admin_logo))
                        <img src="{{ asset(Storage::url('upload/logo/' . $admin_logo)) }}" alt="Logo" style="height: 36px;">
                    @else
                        <h3>{{ $settings['app_name'] ?? 'PropManage' }}</h3>
                    @endif
                </div>
                <p class="glass-footer-desc">{{ $Section_8_content_value['Sec8_info'] ?? 'Your trusted property management solution.' }}</p>
                <div class="glass-social">
                    <a href="{{ $Section_8_content_value['fb_link'] ?? '#' }}" target="_blank"><i class="fab fa-facebook-f"></i></a>
                    <a href="{{ $Section_8_content_value['twitter_link'] ?? '#' }}" target="_blank"><i class="fab fa-twitter"></i></a>
                    <a href="{{ $Section_8_content_value['insta_link'] ?? '#' }}" target="_blank"><i class="fab fa-instagram"></i></a>
                    <a href="{{ $Section_8_content_value['linkedin_link'] ?? '#' }}" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>

            <div>
                <h4 class="glass-footer-title">Quick Links</h4>
                <ul class="glass-footer-links">
                    <li><a href="{{ $homeUrl ?? '#' }}">Home</a></li>
                    <li><a href="{{ $propertiesUrl ?? '#' }}">Properties</a></li>
                    <li><a href="{{ $blogUrl ?? '#' }}">Blog</a></li>
                    <li><a href="{{ $contactUrl ?? '#' }}">Contact</a></li>
                </ul>
            </div>

            <div>
                <h4 class="glass-footer-title">Support</h4>
                <ul class="glass-footer-links">
                    <li><a href="#">FAQs</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Terms of Service</a></li>
                    <li><a href="#">Help Center</a></li>
                </ul>
            </div>

            <div>
                <h4 class="glass-footer-title">Contact Us</h4>
                <div class="glass-contact-item">
                    <div class="glass-contact-icon"><i class="fas fa-map-marker-alt"></i></div>
                    <div class="glass-contact-text">{{ $settings['company_address'] ?? '123 Property Street, City' }}</div>
                </div>
                <div class="glass-contact-item">
                    <div class="glass-contact-icon"><i class="fas fa-phone-alt"></i></div>
                    <div class="glass-contact-text">{{ $settings['company_phone'] ?? '+1 234 567 890' }}</div>
                </div>
                <div class="glass-contact-item">
                    <div class="glass-contact-icon"><i class="fas fa-envelope"></i></div>
                    <div class="glass-contact-text">{{ $settings['company_email'] ?? 'info@example.com' }}</div>
                </div>

                <div class="glass-newsletter">
                    <h4 class="glass-footer-title" style="margin-top: 20px;">Newsletter</h4>
                    <div class="glass-newsletter-input">
                        <input type="email" placeholder="Your email address">
                        <button><i class="fas fa-paper-plane"></i></button>
                    </div>
                </div>
            </div>
        </div>

        <div class="glass-footer-bottom">
            <div>&copy; {{ date('Y') }} {{ $settings['app_name'] ?? 'PropManage' }}. All rights reserved.</div>
            <div><i class="fab fa-cc-visa"></i> <i class="fab fa-cc-mastercard"></i> <i class="fab fa-cc-paypal"></i> <i class="fab fa-cc-amex"></i></div>
        </div>
    </div>
</footer>
@endif
