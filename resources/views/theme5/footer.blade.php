<!-- Footer -->
@php
    $Section_8 = App\Models\FrontHomePage::where('section', 'Section 8')->first();
    $Section_8_content_value = !empty($Section_8->content_value)
        ? json_decode($Section_8->content_value, true)
        : [];
    $admin_logo = getSettingsValByName('company_logo');
@endphp

@if (empty($Section_8_content_value['section_enabled']) || $Section_8_content_value['section_enabled'] == 'active')
<footer style="background: #f8fafc; color: #1e293b; padding: 60px 0 0; margin-top: 60px; border-top: 1px solid #e2e8f0;">
    <div style="max-width: 1200px; margin: 0 auto; padding: 0 24px;">
        <!-- Footer Main Content -->
        <div style="padding-bottom: 40px; border-bottom: 1px solid #e2e8f0;">
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 40px;">
                <!-- About Column -->
                <div>
                    <div class="theme5-footer-logo">
                        @if(!empty($admin_logo))
                            <img src="{{ asset(Storage::url('upload/logo/' . $admin_logo)) }}" alt="Logo" style="height: 40px; margin-bottom: 20px;">
                        @elseif(!empty($settings['logo']))
                            <img src="{{ asset(Storage::url('upload/logo/' . $settings['logo'])) }}" alt="Logo" style="height: 40px; margin-bottom: 20px;">
                        @else
                            <h3 style="color: #0f172a;">{{ $settings['app_name'] ?? 'PropManage' }}</h3>
                        @endif
                    </div>
                    <p style="color: #64748b; line-height: 1.6; margin-top: 15px; font-size: 14px;">
                        {{ $Section_8_content_value['Sec8_info'] ?? 'Your trusted property management solution. We help you find the perfect property with ease and confidence.' }}
                    </p>
                </div>

                <!-- Quick Links Column -->
                <div>
                    <h4 style="font-size: 16px; font-weight: 600; margin-bottom: 20px; color: #0f172a;">Quick Links</h4>
                    <ul style="list-style: none; padding: 0; margin: 0;">
                        <li style="margin-bottom: 12px;"><a href="{{ $homeUrl ?? '#' }}" style="color: #64748b; text-decoration: none; transition: 0.3s; display: inline-flex; align-items: center; gap: 8px;"><i class="fas fa-chevron-right" style="font-size: 10px; color: #3b82f6;"></i> Home</a></li>
                        <li style="margin-bottom: 12px;"><a href="{{ $propertiesUrl ?? '#' }}" style="color: #64748b; text-decoration: none; transition: 0.3s; display: inline-flex; align-items: center; gap: 8px;"><i class="fas fa-chevron-right" style="font-size: 10px; color: #3b82f6;"></i> Properties</a></li>
                        <li style="margin-bottom: 12px;"><a href="{{ $blogUrl ?? '#' }}" style="color: #64748b; text-decoration: none; transition: 0.3s; display: inline-flex; align-items: center; gap: 8px;"><i class="fas fa-chevron-right" style="font-size: 10px; color: #3b82f6;"></i> Blog</a></li>
                        <li style="margin-bottom: 12px;"><a href="{{ $contactUrl ?? '#' }}" style="color: #64748b; text-decoration: none; transition: 0.3s; display: inline-flex; align-items: center; gap: 8px;"><i class="fas fa-chevron-right" style="font-size: 10px; color: #3b82f6;"></i> Contact</a></li>
                    </ul>
                </div>

                <!-- Contact Info Column -->
                <div>
                    <h4 style="font-size: 16px; font-weight: 600; margin-bottom: 20px; color: #0f172a;">Contact Info</h4>
                    <ul style="list-style: none; padding: 0; margin: 0;">
                        <li style="margin-bottom: 12px; display: flex; align-items: flex-start; gap: 12px; color: #64748b; font-size: 14px;">
                            <i class="fas fa-map-marker-alt" style="margin-top: 3px; color: #3b82f6;"></i>
                            <span>{{ $settings['company_address'] ?? '123 Property Street, City, Country' }}</span>
                        </li>
                        <li style="margin-bottom: 12px; display: flex; align-items: flex-start; gap: 12px; color: #64748b; font-size: 14px;">
                            <i class="fas fa-phone-alt" style="margin-top: 3px; color: #3b82f6;"></i>
                            <span>{{ $settings['company_phone'] ?? '+1 234 567 890' }}</span>
                        </li>
                        <li style="margin-bottom: 12px; display: flex; align-items: flex-start; gap: 12px; color: #64748b; font-size: 14px;">
                            <i class="fas fa-envelope" style="margin-top: 3px; color: #3b82f6;"></i>
                            <span>{{ $settings['company_email'] ?? 'info@example.com' }}</span>
                        </li>
                    </ul>
                </div>

                <!-- Newsletter Column -->
                <div>
                    <h4 style="font-size: 16px; font-weight: 600; margin-bottom: 20px; color: #0f172a;">Newsletter</h4>
                    <p style="color: #64748b; margin-bottom: 15px; font-size: 14px;">Subscribe to get latest updates</p>
                    <form class="theme5-newsletter-form" action="#" method="POST">
                        @csrf
                        <div style="display: flex; gap: 10px;">
                            <input type="email" name="email" placeholder="Your email address" required style="flex: 1; padding: 12px 15px; border: 1px solid #e2e8f0; border-radius: 8px; background: white; color: #1e293b; outline: none; transition: all 0.3s;">
                            <button type="submit" style="width: 45px; height: 45px; border: none; border-radius: 8px; background: #3b82f6; color: white; cursor: pointer; transition: 0.3s;">
                                <i class="fas fa-paper-plane"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Footer Bottom -->
        <div style="padding: 20px 0;">
            <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 20px;">
                <div>
                    <p style="color: #64748b; font-size: 13px; margin: 0;">&copy; {{ date('Y') }} {{ $settings['app_name'] ?? 'PropManage' }}. All rights reserved.</p>
                </div>
                <div style="display: flex; gap: 12px;">
                    <a href="{{ $Section_8_content_value['fb_link'] ?? '#' }}" class="theme5-social-link" target="_blank" style="width: 36px; height: 36px; background: #f1f5f9; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: #64748b; text-decoration: none; transition: 0.3s;">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="{{ $Section_8_content_value['twitter_link'] ?? '#' }}" class="theme5-social-link" target="_blank" style="width: 36px; height: 36px; background: #f1f5f9; border-radius: 50%; display: flex; align-items: center; justify-content; center; color: #64748b; text-decoration: none; transition: 0.3s;">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="{{ $Section_8_content_value['insta_link'] ?? '#' }}" class="theme5-social-link" target="_blank" style="width: 36px; height: 36px; background: #f1f5f9; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: #64748b; text-decoration: none; transition: 0.3s;">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="{{ $Section_8_content_value['linkedin_link'] ?? '#' }}" class="theme5-social-link" target="_blank" style="width: 36px; height: 36px; background: #f1f5f9; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: #64748b; text-decoration: none; transition: 0.3s;">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</footer>
@endif

<style>
/* Footer hover effects */
.theme5-footer-links a:hover {
    color: #3b82f6 !important;
    padding-left: 5px;
}

.theme5-social-link:hover {
    background: #3b82f6 !important;
    color: white !important;
    transform: translateY(-3px);
}

.theme5-newsletter-group button:hover {
    background: #2563eb !important;
    transform: translateY(-2px);
}

/* Newsletter input focus effect */
.theme5-newsletter-form input:focus {
    border-color: #3b82f6 !important;
    box-shadow: 0 0 0 3px rgba(59,130,246,0.1);
}

/* Footer responsive */
@media (max-width: 768px) {
    .theme5-footer-grid {
        grid-template-columns: 1fr !important;
        gap: 30px !important;
        text-align: center;
    }

    .theme5-footer-bottom-inner {
        flex-direction: column !important;
        text-align: center;
    }

    .theme5-footer-links a {
        justify-content: center;
    }

    .theme5-footer-contact li {
        justify-content: center;
    }
}
</style>

<!-- Scripts -->
<script src="{{ asset('js/jquery.js') }}"></script>
<script src="{{ asset('assets/web/js/jquery-migrate-3.5.2.min.js') }}"></script>
<script src="{{ asset('assets/web/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/web/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/web/js/bootstrap-select.min.js') }}"></script>
<script src="{{ asset('assets/web/js/jquery.mmenu.all.js') }}"></script>
<script src="{{ asset('assets/web/js/ace-responsive-menu.js') }}"></script>
<script src="{{ asset('assets/web/js/jquery-scrolltofixed-min.js') }}"></script>
<script src="{{ asset('assets/web/js/wow.min.js') }}"></script>
<script src="{{ asset('assets/web/js/isotop.js') }}"></script>
<script src="{{ asset('assets/web/js/owl.js') }}"></script>
<script src="{{ asset('assets/js/plugins/feather.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/notifier.js') }}"></script>
<script src="{{ asset('assets/web/js/script.js') }}"></script>

@stack('script-page')
@stack('theme5-script')

<script>
    var successImg = '{{ asset("assets/images/notification/ok-48.png") }}';
    var errorImg = '{{ asset("assets/images/notification/high_priority-48.png") }}';
</script>
<script src="{{ asset('js/custom.js') }}"></script>

@if ($statusMessage = Session::get('success'))
    <script>
        notifier.show('Success!', '{!! $statusMessage !!}', 'success', successImg, 4000);
    </script>
@endif
@if ($statusMessage = Session::get('error'))
    <script>
        notifier.show('Error!', '{!! $statusMessage !!}', 'error', errorImg, 4000);
    </script>
@endif
