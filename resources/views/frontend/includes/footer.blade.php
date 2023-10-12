@php
    // this session has been set in  head.blade.php
    if (session()->exists('settings_footer')) {
        $settings_footer = session()->get('settings_footer');
    }
    if (session()->exists('footer_sec_one_quick_links')) {
        $footer_sec_one_quick_links = session()->get('footer_sec_one_quick_links');
    }
    if (session()->exists('footer_sec_sec_quick_links')) {
        $footer_sec_sec_quick_links = session()->get('footer_sec_sec_quick_links');
    }
    if (session()->exists('settings')) {
        $settings = session()->get('settings');
    }
@endphp
<style>
    .pl_footer_fix li {
        display: block !important;
    }
</style>
<footer class="footer-section">
    <div class="container">
        <div class="footer-content pt-5 pb-5">
            <div class="row">
                <div class="col-xl-4 col-lg-4 mb-50">
                    <div class="footer-widget">
                        <div class="footer-logo">
                            @if (isset($settings_footer['logo']) && file_exists(public_path('frontend/image/' . $settings_footer['logo'])))
                                <a href="{{ route('frontend.home') }}">
                                    <img data-original="{{ asset('frontend/image/webp/' . explode('.',$settings_footer['logo'])[0].'.webp') }}" class="img-fluid lazy" alt="logo" loading="lazy" width="200" height="62">
                                    <!--<img src="{{ asset('frontend/image/' . $settings_footer['logo']) }}" class="img-fluid" alt="logo" loading="lazy">-->
                                </a>
                            @endif

                        </div>
                        <div>
                            <div class="d-flex align-items-center pb-3">
                                <span class="padding_left_fix">
                                    <img src="{{ asset('frontend/image/call.png ') }}" alt="call.png" width="29" height="29">
                                </span>
                                <span class="text-white px-3">
                                    @if (isset($settings_footer['phone_no']))
                                        <a style="text-decoration: none;color: white"
                                            href="tel:{{ $settings_footer['phone_no'] }}"  aria-label="{{ $settings_footer['phone_no'] }}">{{ $settings_footer['phone_no'] }}</a>
                                    @endif
                                </span>
                            </div>
                            <div class="d-flex align-items-center pb-3">
                                <span>
                                    <img src="{{ asset('frontend/image/msg_new.png ') }}" alt="" loading="lazy" width="40" height="40">
                                </span>
                                <span class="text-white px-2">
                                    @if (isset($settings_footer['email']))
                                        <a style="text-decoration: none;color: white"
                                            href="mailto:{{ $settings_footer['email'] }}"  aria-label="{{ $settings_footer['email'] }}">{{ $settings_footer['email'] }}</a>
                                    @endif
                                </span>
                            </div>
                            <div class="d-flex align-items-start pb-3">
                                <span class="">
                                    <img src="{{ asset('frontend/image/map_icon.png ') }}" alt="" loading="lazy" width="38" height="38">
                                </span>
                                <span class="text-white px-2 w_fix">

                                    @if (isset($settings_footer['address']))
                                        <a target="_blank" style="text-decoration: none;color: white"
                                            href="{{ (isset($settings_footer['embeded_map_url'])?$settings_footer['embeded_map_url']:'#') }}" aria-label="{{ $settings_footer['address']->val }}">{{ $settings_footer['address']->val }}</a>
                                    @endif
                                </span>
                            </div>
                            <div class="d-flex align-items-center justify-content-xs-center">
                                <div class="">
                                    <a
                                        href="{{ isset($settings_footer['apple_link']) ? $settings_footer['apple_link'] : '' }}">
                                        <img src="{{ asset('frontend/image/' . (isset($settings_footer['apple_image']) ? $settings_footer['apple_image'] : '')) }}" aria-label="apple_image"
                                            class="img-fluid" alt="" loading="lazy" width="134" height="48"></a>
                                </div>
                                <div class="px-2">
                                    <a
                                        href="{{ isset($settings_footer['google_play_link']) ? $settings_footer['google_play_link'] : '' }}" aria-label="google_play_link">
                                        <img src="{{ asset('frontend/image/' . (isset($settings_footer['google_play_image']) ? $settings_footer['google_play_image'] : '')) }}"
                                            class="img-fluid" alt="" loading="lazy" width="142" height="47"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 mb-30">
                    <div class="row">
                        <div class="col-6">
                            <div class="footer-widget">
                                <ul class="mb-0 pl_footer_fix d-flex flex-column">
                                    @if (isset($footer_sec_one_quick_links) && !empty($footer_sec_one_quick_links))
                                        @foreach ($footer_sec_one_quick_links as $index => $header_quick_link)
                                            <li><a
                                                    href="{{ $header_quick_link->val }}" aria-label="{{ $header_quick_link->val }}">{{ $header_quick_link->name }}</a>
                                            </li>
                                        @endforeach
                                    @endif
                                    @if (isset($pages) && !empty($pages))
                                        @foreach ($pages as $index => $page)
                                            <li><a
                                                    href="{{ url(App::currentLocale() . '/pages/' . $page->slug) }}">{{ $page->page_title }}</a>
                                            </li>
                                        @endforeach
                                    @endif
                                </ul>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="footer-widget">
                                <ul class="mb-0 pl_footer_fix">
                                    @if (isset($footer_sec_sec_quick_links) && !empty($footer_sec_sec_quick_links))
                                        @foreach ($footer_sec_sec_quick_links as $index => $header_quick_link)
                                            {{-- @if ($index < 5) --}}
                                            <li><a
                                                    href="{{ $header_quick_link->val }}">{{ $header_quick_link->name }}</a>
                                            </li>
                                            {{-- @endif --}}
                                        @endforeach
                                    @endif
                                    <li class="img_mt_fix pb-3"><a href="#" aria-label="rating"><img
                                                src="{{ asset('frontend/image/ratings.png ') }}" class="img-fluid"
                                                alt="" loading="lazy" width="91" height="45"></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 mb-50" style="height: 300px;">
                    <iframe class="b_radius map_fix"
                        src="{{ isset($settings_footer['embeded_map_url']) ? $settings_footer['embeded_map_url'] : '' }}"
                        style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade" title="location"></iframe>
                </div>
            </div>
        </div>
    </div>
    <hr style="color: #ffff;">
    <div class="copyright-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-4 col-lg-4 text-center text-lg-start flex_d_order">
                    <div class="copyright-text">
                        <p>© {{ date('Y') }} Friends Car Rental . {{ __('text.all_rights_reserved') }}.</p>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 text-center text-lg-start">
                    <div class="social_media_footer">
                        @if (isset($settings_footer['facebook_url']))
                            <a href="{{ $settings_footer['facebook_url'] }}" target="_blank" aria-label="facebook_url"
                                class="text-decoration-none">
                                <i class="fa-brands fa-facebook social_media_fix"></i>
                            </a>
                        @endif
                        @if (isset($settings_footer['instagram_url']))
                            <a href="{{ $settings_footer['instagram_url'] }}" target="_blank" aria-label="instagram_url"
                                class="text-decoration-none">
                                <i class="fa-brands fa-instagram social_media_fix"></i>
                            </a>
                        @endif
                        @if (isset($settings_footer['snapchat_url']))
                            <a href="{{ $settings_footer['snapchat_url'] }}" target="_blank" aria-label="snapchat_url"
                                class="text-decoration-none">
                                <i class="fa-brands fa-square-snapchat social_media_fix"></i>
                            </a>
                        @endif
                        @if (isset($settings_footer['youtube_url']))
                            <a href="{{ $settings_footer['youtube_url'] }}/" target="_blank" aria-label="youtube_url"
                                class="text-decoration-none">
                                <i class="fa-brands fa-youtube social_media_fix"></i>
                            </a>
                        @endif
                        @if (isset($settings_footer['linkedin_url']))
                            <a href="{{ $settings_footer['linkedin_url'] }}" target="_blank" aria-label="linkedin_url"
                                class="text-decoration-none">
                                <i class="fa-brands fa-linkedin-in social_media_fix"></i>
                            </a>
                        @endif
                        @if (isset($settings_footer['twitter_url']))
                            <a href="{{ $settings_footer['twitter_url'] }}" target="_blank" aria-label="twitter_url"
                                class="text-decoration-none">
                                <i class="fa-brands fa-twitter social_media_fix"></i>
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
