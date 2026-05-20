<!-- Footer -->
@php
    $Section_8 = App\Models\FrontHomePage::where('section', 'Section 8')->first();
    $Section_8_content_value = !empty($Section_8->content_value)
        ? json_decode($Section_8->content_value, true)
        : [];
    $admin_logo = getSettingsValByName('company_logo');
@endphp

@if (empty($Section_8_content_value['section_enabled']) || $Section_8_content_value['section_enabled'] == 'active')
<footer class="aether-footer">
    <!-- Animated gradient bar -->
    <div class="footer-glow-bar"></div>
    
    <div class="container-aether">
        <!-- Main Footer Grid -->
        <div class="aether-footer-grid">
            <!-- Brand Column -->
            <div class="footer-col brand-col">
                <div class="footer-logo-wrapper">
                    @if(!empty($admin_logo))
                        <img src="{{ asset(Storage::url('upload/logo/' . $admin_logo)) }}" alt="Logo" class="footer-logo">
                    @elseif(!empty($settings['logo']))
                        <img src="{{ asset(Storage::url('upload/logo/' . $settings['logo'])) }}" alt="Logo" class="footer-logo">
                    @else
                        <h3 class="footer-brand">{{ $settings['app_name'] ?? 'PropManage' }}</h3>
                    @endif
                </div>
                <p class="footer-description">
                    {{ $Section_8_content_value['Sec8_info'] ?? 'Your trusted property management solution. We help you find the perfect property with ease and confidence.' }}
                </p>
                <div class="footer-social-links">
                    <a href="{{ $Section_8_content_value['fb_link'] ?? '#' }}" class="social-icon" target="_blank"><i class="fab fa-facebook-f"></i></a>
                    <a href="{{ $Section_8_content_value['twitter_link'] ?? '#' }}" class="social-icon" target="_blank"><i class="fab fa-twitter"></i></a>
                    <a href="{{ $Section_8_content_value['insta_link'] ?? '#' }}" class="social-icon" target="_blank"><i class="fab fa-instagram"></i></a>
                    <a href="{{ $Section_8_content_value['linkedin_link'] ?? '#' }}" class="social-icon" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                    <a href="#" class="social-icon"><i class="fab fa-youtube"></i></a>
                </div>
            </div>

            <!-- Quick Links Column -->
            <div class="footer-col">
                <h4 class="footer-title">Quick Links</h4>
                <ul class="footer-links">
                    <li><a href="{{ $homeUrl ?? '#' }}"><i class="fas fa-arrow-right"></i> Home</a></li>
                    <li><a href="{{ $propertiesUrl ?? '#' }}"><i class="fas fa-arrow-right"></i> Properties</a></li>
                    <li><a href="{{ $blogUrl ?? '#' }}"><i class="fas fa-arrow-right"></i> Blog</a></li>
                    <li><a href="{{ $contactUrl ?? '#' }}"><i class="fas fa-arrow-right"></i> Contact</a></li>
                    <li><a href="#"><i class="fas fa-arrow-right"></i> About Us</a></li>
                </ul>
            </div>

            <!-- Support Column -->
            <div class="footer-col">
                <h4 class="footer-title">Support</h4>
                <ul class="footer-links">
                    <li><a href="#"><i class="fas fa-arrow-right"></i> FAQ</a></li>
                    <li><a href="#"><i class="fas fa-arrow-right"></i> Privacy Policy</a></li>
                    <li><a href="#"><i class="fas fa-arrow-right"></i> Terms of Service</a></li>
                    <li><a href="#"><i class="fas fa-arrow-right"></i> Help Center</a></li>
                    <li><a href="#"><i class="fas fa-arrow-right"></i> Support Ticket</a></li>
                </ul>
            </div>

            <!-- Contact & Newsletter Column -->
            <div class="footer-col contact-col">
                <h4 class="footer-title">Get In Touch</h4>
                <ul class="footer-contact">
                    <li>
                        <div class="contact-icon"><i class="fas fa-map-marker-alt"></i></div>
                        <div class="contact-text">{{ $settings['company_address'] ?? '123 Property Street, City, Country' }}</div>
                    </li>
                    <li>
                        <div class="contact-icon"><i class="fas fa-phone-alt"></i></div>
                        <div class="contact-text">{{ $settings['company_phone'] ?? '+1 234 567 890' }}</div>
                    </li>
                    <li>
                        <div class="contact-icon"><i class="fas fa-envelope"></i></div>
                        <div class="contact-text">{{ $settings['company_email'] ?? 'info@example.com' }}</div>
                    </li>
                </ul>
                
                <!-- Newsletter -->
                <div class="newsletter-wrapper">
                    <h4 class="footer-title" style="margin-top: 20px;">Newsletter</h4>
                    <p class="newsletter-text">Subscribe for exclusive offers & updates</p>
                    <form class="newsletter-form" action="#" method="POST">
                        @csrf
                        <div class="form-group">
                            <input type="email" name="email" placeholder="Your email address" required>
                            <button type="submit">
                                <i class="fas fa-paper-plane"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Bottom Bar -->
        <div class="aether-footer-bottom">
            <div class="copyright">
                <p>&copy; {{ date('Y') }} {{ $settings['app_name'] ?? 'PropManage' }}. Crafted with <i class="fas fa-heart" style="color: #ff6b4a;"></i> for excellence.</p>
            </div>
            <div class="payment-methods">
                <span>Secure Payments:</span>
                <i class="fab fa-cc-visa"></i>
                <i class="fab fa-cc-mastercard"></i>
                <i class="fab fa-cc-paypal"></i>
                <i class="fab fa-cc-amex"></i>
                <i class="fab fa-cc-stripe"></i>
            </div>
        </div>
    </div>
</footer>

<style>
/* ============================================
   AETHER FOOTER - MODERN MAGAZINE STYLE
============================================ */

.aether-footer {
    background: linear-gradient(135deg, #0a0c15 0%, #12152a 100%);
    color: #ffffff;
    padding: 60px 0 25px;
    margin-top: 80px;
    position: relative;
    overflow: hidden;
}

/* Animated Glow Bar */
.footer-glow-bar {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 3px;
    background: linear-gradient(90deg, 
        transparent, 
        #ff6b4a, 
        #ff9f4a, 
        #ff6b4a, 
        transparent);
    animation: footerGlow 3s ease-in-out infinite;
}

@keyframes footerGlow {
    0%, 100% { transform: translateX(-100%); opacity: 0.5; }
    50% { transform: translateX(100%); opacity: 1; }
}

/* Footer Grid */
.aether-footer-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 40px;
    margin-bottom: 50px;
    position: relative;
    z-index: 2;
}

/* Footer Columns Animation */
.footer-col {
    animation: footerFadeUp 0.6s ease forwards;
    opacity: 0;
}

.footer-col:nth-child(1) { animation-delay: 0.05s; }
.footer-col:nth-child(2) { animation-delay: 0.1s; }
.footer-col:nth-child(3) { animation-delay: 0.15s; }
.footer-col:nth-child(4) { animation-delay: 0.2s; }

@keyframes footerFadeUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Brand Column */
.footer-logo-wrapper {
    margin-bottom: 20px;
}

.footer-logo {
    height: 45px;
    object-fit: contain;
    filter: brightness(0) invert(1);
}

.footer-brand {
    font-size: 28px;
    font-weight: 800;
    background: linear-gradient(135deg, #ff6b4a, #ff9f4a);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    margin-bottom: 15px;
}

.footer-description {
    color: #a0a5c0;
    line-height: 1.7;
    margin-bottom: 25px;
    font-size: 14px;
}

/* Social Icons */
.footer-social-links {
    display: flex;
    gap: 12px;
    flex-wrap: wrap;
}

.social-icon {
    width: 38px;
    height: 38px;
    background: rgba(255, 255, 255, 0.08);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    text-decoration: none;
    transition: all 0.3s ease;
    font-size: 16px;
}

.social-icon:hover {
    background: #ff6b4a;
    transform: translateY(-4px);
    box-shadow: 0 8px 20px rgba(255, 107, 74, 0.3);
}

/* Footer Titles */
.footer-title {
    font-size: 18px;
    font-weight: 700;
    margin-bottom: 25px;
    position: relative;
    display: inline-block;
    letter-spacing: -0.3px;
}

.footer-title::after {
    content: '';
    position: absolute;
    bottom: -8px;
    left: 0;
    width: 35px;
    height: 3px;
    background: #ff6b4a;
    border-radius: 3px;
    transition: width 0.3s ease;
}

.footer-col:hover .footer-title::after {
    width: 60px;
}

/* Footer Links */
.footer-links {
    list-style: none;
    padding: 0;
    margin: 0;
}

.footer-links li {
    margin-bottom: 12px;
}

.footer-links a {
    color: #a0a5c0;
    text-decoration: none;
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
    gap: 10px;
    font-size: 14px;
}

.footer-links a i {
    font-size: 12px;
    transition: transform 0.3s ease;
    color: #ff6b4a;
}

.footer-links a:hover {
    color: #ff6b4a;
    transform: translateX(5px);
}

.footer-links a:hover i {
    transform: translateX(3px);
}

/* Contact Info */
.footer-contact {
    list-style: none;
    padding: 0;
    margin: 0;
}

.footer-contact li {
    display: flex;
    align-items: flex-start;
    gap: 14px;
    margin-bottom: 18px;
}

.contact-icon {
    width: 32px;
    height: 32px;
    background: rgba(255, 107, 74, 0.15);
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    transition: all 0.3s ease;
}

.contact-icon i {
    color: #ff6b4a;
    font-size: 14px;
}

.footer-contact li:hover .contact-icon {
    background: #ff6b4a;
    transform: scale(1.05);
}

.footer-contact li:hover .contact-icon i {
    color: white;
}

.contact-text {
    color: #a0a5c0;
    font-size: 14px;
    line-height: 1.5;
}

/* Newsletter */
.newsletter-text {
    color: #a0a5c0;
    font-size: 13px;
    margin-bottom: 15px;
}

.newsletter-form .form-group {
    display: flex;
    gap: 10px;
}

.newsletter-form input {
    flex: 1;
    padding: 12px 16px;
    border: 1px solid rgba(255, 255, 255, 0.1);
    border-radius: 12px;
    background: rgba(255, 255, 255, 0.05);
    color: white;
    font-size: 14px;
    transition: all 0.3s ease;
}

.newsletter-form input:focus {
    outline: none;
    border-color: #ff6b4a;
    background: rgba(255, 255, 255, 0.08);
    box-shadow: 0 0 0 3px rgba(255, 107, 74, 0.2);
}

.newsletter-form input::placeholder {
    color: #6a6f8a;
}

.newsletter-form button {
    width: 46px;
    height: 46px;
    border: none;
    border-radius: 12px;
    background: #ff6b4a;
    color: white;
    cursor: pointer;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    justify-content: center;
}

.newsletter-form button:hover {
    background: #e85d3e;
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(255, 107, 74, 0.3);
}

/* Footer Bottom */
.aether-footer-bottom {
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 20px;
    padding-top: 25px;
    border-top: 1px solid rgba(255, 255, 255, 0.08);
    margin-top: 10px;
}

.copyright p {
    color: #7a7f9e;
    font-size: 13px;
}

.copyright i {
    animation: heartBeat 1.5s ease infinite;
}

@keyframes heartBeat {
    0%, 100% { transform: scale(1); }
    50% { transform: scale(1.2); }
}

.payment-methods {
    display: flex;
    align-items: center;
    gap: 15px;
    flex-wrap: wrap;
}

.payment-methods span {
    color: #7a7f9e;
    font-size: 12px;
    font-weight: 500;
}

.payment-methods i {
    font-size: 22px;
    color: #a0a5c0;
    transition: all 0.3s ease;
    cursor: pointer;
}

.payment-methods i:hover {
    color: #ff6b4a;
    transform: translateY(-2px);
}

/* Responsive */
@media (max-width: 1100px) {
    .aether-footer-grid {
        gap: 30px;
    }
}

@media (max-width: 992px) {
    .aether-footer-grid {
        grid-template-columns: repeat(2, 1fr);
        gap: 40px;
    }
}

@media (max-width: 768px) {
    .aether-footer {
        padding: 50px 0 20px;
        margin-top: 60px;
    }
    
    .aether-footer-grid {
        grid-template-columns: 1fr;
        text-align: center;
        gap: 35px;
    }
    
    .footer-title::after {
        left: 50%;
        transform: translateX(-50%);
    }
    
    .footer-social-links {
        justify-content: center;
    }
    
    .footer-links a {
        justify-content: center;
    }
    
    .footer-contact li {
        justify-content: center;
    }
    
    .aether-footer-bottom {
        flex-direction: column;
        text-align: center;
    }
    
    .payment-methods {
        justify-content: center;
    }
    
    .newsletter-form .form-group {
        max-width: 320px;
        margin: 0 auto;
    }
    
    .contact-icon {
        width: 35px;
        height: 35px;
    }
}

@media (max-width: 480px) {
    .aether-footer-grid {
        gap: 30px;
    }
    
    .footer-logo {
        height: 38px;
    }
    
    .footer-brand {
        font-size: 24px;
    }
    
    .payment-methods i {
        font-size: 18px;
    }
}
</style>
@endif