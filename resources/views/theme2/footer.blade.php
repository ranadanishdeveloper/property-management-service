<!-- Footer -->
@php
    $Section_8 = App\Models\FrontHomePage::where('section', 'Section 8')->first();
    $Section_8_content_value = !empty($Section_8->content_value)
        ? json_decode($Section_8->content_value, true)
        : [];
@endphp

@if (empty($Section_8_content_value['section_enabled']) || $Section_8_content_value['section_enabled'] == 'active')
    <footer class="theme2-footer" style="background: rgba(0,0,0,0.3); backdrop-filter: blur(10px); margin-top: 60px;">
        <div style="max-width: 1400px; margin: 0 auto; padding: 60px 30px 30px;">
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 40px; margin-bottom: 40px;">
                <div>
                    <h3 style="margin-bottom: 20px;">About Us</h3>
                    <p style="opacity: 0.8;">{{ $Section_8_content_value['Sec8_info'] ?? 'Finding your dream property with modern technology and expertise.' }}</p>
                </div>
                <div>
                    <h3 style="margin-bottom: 20px;">Quick Links</h3>
                    <ul style="list-style: none;">
                        <li><a href="{{ $homeUrl ?? '#' }}" style="color: #fff; text-decoration: none; opacity: 0.8;">Home</a></li>
                        <li><a href="{{ $propertiesUrl ?? '#' }}" style="color: #fff; text-decoration: none; opacity: 0.8;">Properties</a></li>
                        <li><a href="{{ $blogUrl ?? '#' }}" style="color: #fff; text-decoration: none; opacity: 0.8;">Blog</a></li>
                        <li><a href="{{ $contactUrl ?? '#' }}" style="color: #fff; text-decoration: none; opacity: 0.8;">Contact</a></li>
                    </ul>
                </div>
                <div>
                    <h3 style="margin-bottom: 20px;">Follow Us</h3>
                    <div style="display: flex; gap: 15px;">
                        <a href="{{ $Section_8_content_value['fb_link'] ?? '#' }}" style="color: #fff; font-size: 24px;"><i class="fab fa-facebook-f"></i></a>
                        <a href="{{ $Section_8_content_value['twitter_link'] ?? '#' }}" style="color: #fff; font-size: 24px;"><i class="fab fa-twitter"></i></a>
                        <a href="{{ $Section_8_content_value['insta_link'] ?? '#' }}" style="color: #fff; font-size: 24px;"><i class="fab fa-instagram"></i></a>
                        <a href="{{ $Section_8_content_value['linkedin_link'] ?? '#' }}" style="color: #fff; font-size: 24px;"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
            <div style="text-align: center; padding-top: 30px; border-top: 1px solid rgba(255,255,255,0.1);">
                <p>&copy; {{ date('Y') }} {{ $settings['app_name'] ?? 'PropManage' }}. All rights reserved.</p>
            </div>
        </div>
    </footer>
@endif
