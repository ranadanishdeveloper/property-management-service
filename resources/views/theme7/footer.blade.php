@php
    $Section_8 = App\Models\FrontHomePage::where('section', 'Section 8')->first();
    $Section_8_content_value = !empty($Section_8->content_value) ? json_decode($Section_8->content_value, true) : [];
    $admin_logo = getSettingsValByName('company_logo');
@endphp

@if (empty($Section_8_content_value['section_enabled']) || $Section_8_content_value['section_enabled'] == 'active')
    <style>
        .cyber-footer {
            background: #ffffff;
            border-top: 2px solid var(--neon-pink);
            padding: 40px 0 20px;
            margin-top: 0;
            position: relative;
        }

        .cyber-footer::before {
            content: '';
            position: absolute;
            top: -2px;
            left: 0;
            right: 0;
            height: 2px;
            background: linear-gradient(90deg, var(--neon-pink), var(--neon-cyan), var(--neon-pink));
            animation: glitchMove 3s linear infinite;
        }

        @keyframes glitchMove {
            0% {
                transform: translateX(-100%);
            }
            100% {
                transform: translateX(100%);
            }
        }

        .cyber-footer-grid {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr 1.5fr;
            gap: 40px;
            margin-bottom: 40px;
        }

        .cyber-footer-logo h3 {
            font-size: 24px;
            color: var(--neon-cyan);
            text-shadow: var(--glow-cyan);
        }

        .cyber-footer-desc {
            color: #6b6b8a;
            font-size: 13px;
            line-height: 1.6;
            margin: 16px 0 20px;
        }

        .cyber-social {
            display: flex;
            gap: 12px;
        }

        .cyber-social a {
            width: 40px;
            height: 40px;
            background: transparent;
            border: 2px solid var(--neon-pink);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--neon-pink);
            transition: all 0.2s;
            text-decoration: none;
            clip-path: polygon(10% 0%, 90% 0%, 100% 30%, 100% 70%, 90% 100%, 10% 100%, 0% 70%, 0% 30%);
        }

        .cyber-social a:hover {
            background: var(--neon-pink);
            color: white;
            border-color: var(--neon-cyan);
        }

        .cyber-footer-title {
            font-size: 14px;
            font-weight: 800;
            margin-bottom: 20px;
            color: var(--neon-cyan);
            letter-spacing: 2px;
        }

        .cyber-footer-links {
            list-style: none;
        }

        .cyber-footer-links li {
            margin-bottom: 12px;
        }

        .cyber-footer-links a {
            color: #8a8aaa;
            text-decoration: none;
            font-size: 12px;
            transition: all 0.2s;
        }

        .cyber-footer-links a:hover {
            color: var(--neon-pink);
            padding-left: 5px;
        }

        .cyber-contact-item {
            display: flex;
            gap: 12px;
            margin-bottom: 16px;
        }

        .cyber-contact-icon {
            width: 32px;
            height: 32px;
            border: 1px solid var(--neon-cyan);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--neon-cyan);
            font-size: 12px;
        }

        .cyber-contact-text {
            color: #8a8aaa;
            font-size: 12px;
        }

        .cyber-footer-bottom {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 16px;
            padding-top: 20px;
            border-top: 1px solid #e9ecef;
            font-size: 11px;
            color: #6b6b8a;
        }

        @media (max-width: 900px) {
            .cyber-footer-grid {
                grid-template-columns: 1fr 1fr;
                gap: 30px;
            }
        }

        @media (max-width: 600px) {
            .cyber-footer-grid {
                grid-template-columns: 1fr;
                text-align: center;
            }
            .cyber-social {
                justify-content: center;
            }
            .cyber-contact-item {
                justify-content: center;
            }
            .cyber-footer-bottom {
                flex-direction: column;
                text-align: center;
            }
        }
    </style>

    <footer class="cyber-footer">
        <div class="cyber-container">
            <div class="cyber-footer-grid">
                <div>
                    <div class="cyber-footer-logo">
                        @if(!empty($admin_logo))
                            <img src="{{ asset(Storage::url('upload/logo/' . $admin_logo)) }}" alt="Logo" style="height: 40px; width: auto;">
                        @else
                            <h3>{{ $settings['app_name'] ?? 'PROP' }}</h3>
                        @endif
                    </div>
                    <p class="cyber-footer-desc">{{ $Section_8_content_value['Sec8_info'] ?? 'Your trusted property management solution.' }}</p>
                    <div class="cyber-social">
                        <a href="{{ $Section_8_content_value['fb_link'] ?? '#' }}" target="_blank"><i class="fab fa-facebook-f"></i></a>
                        <a href="{{ $Section_8_content_value['twitter_link'] ?? '#' }}" target="_blank"><i class="fab fa-twitter"></i></a>
                        <a href="{{ $Section_8_content_value['insta_link'] ?? '#' }}" target="_blank"><i class="fab fa-instagram"></i></a>
                        <a href="{{ $Section_8_content_value['linkedin_link'] ?? '#' }}" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>

                <div>
                    <h4 class="cyber-footer-title">QUICK LINKS</h4>
                    <ul class="cyber-footer-links">
                        <li><a href="{{ $homeUrl ?? '#' }}">HOME</a></li>
                        <li><a href="{{ $propertiesUrl ?? '#' }}">PROPERTIES</a></li>
                        <li><a href="{{ $blogUrl ?? '#' }}">BLOG</a></li>
                        <li><a href="{{ $contactUrl ?? '#' }}">CONTACT</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="cyber-footer-title">SUPPORT</h4>
                    <ul class="cyber-footer-links">
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">PRIVACY</a></li>
                        <li><a href="#">TERMS</a></li>
                        <li><a href="#">HELP</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="cyber-footer-title">CONTACT</h4>
                    <div class="cyber-contact-item">
                        <div class="cyber-contact-icon"><i class="fas fa-map-marker-alt"></i></div>
                        <div class="cyber-contact-text">{{ $settings['company_address'] ?? '123 Property Street, City' }}</div>
                    </div>
                    <div class="cyber-contact-item">
                        <div class="cyber-contact-icon"><i class="fas fa-phone-alt"></i></div>
                        <div class="cyber-contact-text">{{ $settings['company_phone'] ?? '+1 234 567 890' }}</div>
                    </div>
                    <div class="cyber-contact-item">
                        <div class="cyber-contact-icon"><i class="fas fa-envelope"></i></div>
                        <div class="cyber-contact-text">{{ $settings['company_email'] ?? 'info@example.com' }}</div>
                    </div>
                </div>
            </div>

            <div class="cyber-footer-bottom">
                <div>&copy; {{ date('Y') }} {{ $settings['app_name'] ?? 'PropManage' }}. ALL RIGHTS RESERVED.</div>
                <div><i class="fab fa-cc-visa"></i> <i class="fab fa-cc-mastercard"></i> <i class="fab fa-cc-paypal"></i></div>
            </div>
        </div>
    </footer>
@endif
