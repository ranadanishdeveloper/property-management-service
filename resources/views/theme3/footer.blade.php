<!-- Footer -->
@php
    $Section_8 = App\Models\FrontHomePage::where('section', 'Section 8')->first();
    $Section_8_content_value = !empty($Section_8->content_value)
        ? json_decode($Section_8->content_value, true)
        : [];
@endphp

@if (empty($Section_8_content_value['section_enabled']) || $Section_8_content_value['section_enabled'] == 'active')
    <footer class="theme3-footer" style="background: #C6A43F; color: #1A2A4F; padding: 60px 20px 30px; margin-top: 60px; border-top: 4px solid #1A2A4F;">
        <div class="theme3-container">
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 40px;">
                <div>
                    <h3 style="margin-bottom: 20px; color: #1A2A4F;">{{ $settings['app_name'] ?? 'PropManage' }}</h3>
                    <p style="color: #1A2A4F; opacity: 0.8;">{{ $Section_8_content_value['Sec8_info'] ?? 'Professional. Trusted. Reliable.' }}</p>
                </div>
                <div>
                    <h3 style="margin-bottom: 20px; color: #1A2A4F;">QUICK LINKS</h3>
                    <ul style="list-style: none; padding: 0;">
                        <li><a href="{{ $homeUrl ?? '#' }}" style="color: #1A2A4F; text-decoration: none; opacity: 0.8;">Home</a></li>
                        <li><a href="{{ $propertiesUrl ?? '#' }}" style="color: #1A2A4F; text-decoration: none; opacity: 0.8;">Properties</a></li>
                        <li><a href="{{ $blogUrl ?? '#' }}" style="color: #1A2A4F; text-decoration: none; opacity: 0.8;">Blog</a></li>
                        <li><a href="{{ $contactUrl ?? '#' }}" style="color: #1A2A4F; text-decoration: none; opacity: 0.8;">Contact</a></li>
                    </ul>
                </div>
                <div>
                    <h3 style="margin-bottom: 20px; color: #1A2A4F;">FOLLOW US</h3>
                    <div style="display: flex; gap: 15px;">
                        <a href="{{ $Section_8_content_value['fb_link'] ?? '#' }}" style="color: #1A2A4F; font-size: 24px;"><i class="fab fa-facebook-f"></i></a>
                        <a href="{{ $Section_8_content_value['twitter_link'] ?? '#' }}" style="color: #1A2A4F; font-size: 24px;"><i class="fab fa-twitter"></i></a>
                        <a href="{{ $Section_8_content_value['insta_link'] ?? '#' }}" style="color: #1A2A4F; font-size: 24px;"><i class="fab fa-instagram"></i></a>
                        <a href="{{ $Section_8_content_value['linkedin_link'] ?? '#' }}" style="color: #1A2A4F; font-size: 24px;"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
            <div style="text-align: center; margin-top: 40px; padding-top: 20px; border-top: 2px solid #1A2A4F;">
                <p style="color: #1A2A4F;">&copy; {{ date('Y') }} {{ $settings['app_name'] ?? 'PropManage' }}. All rights reserved.</p>
            </div>
        </div>
    </footer>
@endif
