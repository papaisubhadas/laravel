@php

    $settings = session()->get('settings');
    if (session()->exists('header_quick_links')) {
        $header_quick_links = session()->get('header_quick_links');
    }
    $currentLocaleData = isset(config('global.language')[App::currentLocale()]) ? config('global.language')[App::currentLocale()] : [];
    $currentLocaleImage = isset($currentLocaleData['image']) ? $currentLocaleData['image'] : null;
    $currentLocaleTitle = isset($currentLocaleData['title']) ? $currentLocaleData['title'] : null;
    $currentLocaleTitleText = isset($currentLocaleData["locale_title"]) ? $currentLocaleData["locale_title"] : null;
    /*if(!empty(config('global.language'))){
            foreach(config('global.language') as $language){
                if($language['code'] == App::currentLocale()){
                    $images = $language['image'];
                    $titles = $language['title'];

                }
            }
        }*/
@endphp
<a id="button"></a>
<button class="open-button" onclick="openForm()" aria-label="whatsapp-btn"><i
        class="fa-brands fa-whatsapp wp_icon"></i></button>
<div class="chat-popup" id="myForm">
    <form action="/.php" class="form-container">
        <section class="wp_form">
            <div class="top_wp_title">
                <!-- <i class="fa-brands fa-whatsapp wp_icon"></i> -->
                <div class="title">
                    <div class="start_conservation">{{ __('frontend.home.whatsapp_chat.title') }} </div>
                    <p>{{ __('frontend.home.whatsapp_chat.sub_title') }}</p>
                </div>
            </div>
            <div class="wp_lang_sec">
                <p>{{ __('frontend.home.whatsapp_chat.inner_title') }}</p>
                <ul>
                    <li>
                        <a href="https://wa.me/{{ $en_whatsapp_no }}" target="_blank">
                            <div class="wp_lang">
                                <i class="fa-brands fa-whatsapp wp_icon"></i>
                                <div class="wa_language_fix">{{ __('frontend.home.whatsapp_chat.en') }}
                                    <p>{{ __('frontend.home.whatsapp_chat.en') }}</p>
                                </div>
                            </div>
                            <i class="fa-brands fa-whatsapp wp_icon_last"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://wa.me/{{ $ar_whatsapp_no }}" target="_blank">
                            <div class="wp_lang">
                                <i class="fa-brands fa-whatsapp wp_icon"></i>
                                <div class="wa_language_fix">{{ __('frontend.home.whatsapp_chat.ar') }}
                                    <p>{{ __('frontend.home.whatsapp_chat.ar') }}</p>
                                </div>
                            </div>
                            <i class="fa-brands fa-whatsapp wp_icon_last"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://wa.me/{{ $fr_whatsapp_no }}" target="_blank">
                            <div class="wp_lang">
                                <i class="fa-brands fa-whatsapp wp_icon"></i>
                                <div class="wa_language_fix">{{ __('frontend.home.whatsapp_chat.fr') }}
                                    <p>{{ __('frontend.home.whatsapp_chat.fr') }}</p>
                                </div>
                            </div>
                            <i class="fa-brands fa-whatsapp wp_icon_last"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://wa.me/{{ $ru_whatsapp_no }}" target="_blank">
                            <div class="wp_lang">
                                <i class="fa-brands fa-whatsapp wp_icon"></i>
                                <div class="wa_language_fix">{{ __('frontend.home.whatsapp_chat.ru') }}
                                    <p>{{ __('frontend.home.whatsapp_chat.ru') }}</p>
                                </div>
                            </div>
                            <i class="fa-brands fa-whatsapp wp_icon_last"></i>
                        </a>
                    </li>

                </ul>
            </div>
        </section>
        <button type="button" aria-label="cancel-btn" class="btn cancel"
            onclick="closeForm()">{{ __('frontend.home.whatsapp_chat.close') }}</button>
    </form>
</div>
<script>
    function openForm() {
        document.getElementById("myForm").style.display = "block";
    }

    function closeForm() {
        document.getElementById("myForm").style.display = "none";
    }
</script>
<section>
    <div class="bg_color navbar_none">
        <div class="container">
            <div class="d-flex align-items-center justify-content-between py-3">
                @if (isset($settings['logo']))
                    <a href="{{ route('frontend.home') }}" aria-label="Go to the main page">
                        <img src="{{ asset('frontend/image/webp/' .explode('.',$settings['logo'])[0].'.webp' ) }}" class="img-fluid  logo_max_width_200" alt="" loading="lazy" width="200" height="62">
                    </a>
                @endif
                <div class="support">
                    <div class="support_icon">
                            <img src="{{ asset('frontend/image/24-hours-support.webp') }}" class="img-fluid lazy" loading="lazy"
                                alt="" width="32" height="32">
                    </div>
                    <span class="font_service">24/7 <p>{{ __('text.service') }}</p> </span>
                </div>
                <div class="email_info">
                    <a href="#" class="text-decoration-none">
                      	<img src="{{ asset('frontend/image/msg.png') }}" class="img-fluid lazy" alt="msg.png" 
                                width="67" height="67" loading="lazy">
                    </a>

                    @if (isset($settings['email']))
                        <a href="mailto:{{ $settings['email'] }}" class="email_info_fix">{{ $settings['email'] }}</a>
                    @endif
                </div>
                <div class="social_media">
                    @if (isset($settings['facebook_url']))
                        <a href="{{ $settings['facebook_url'] }}" target="_blank" class="text-decoration-none"
                            aria-label="social icon">
                            <i class="fa-brands fa-facebook social_media_fix"></i>
                        </a>
                    @endif
                    @if (isset($settings['instagram_url']))
                        <a href="{{ $settings['instagram_url'] }}" target="_blank" class="text-decoration-none"
                            aria-label="social icon">
                            <i class="fa-brands fa-instagram social_media_fix"></i>
                        </a>
                    @endif
                    @if (isset($settings['snapchat_url']))
                        <a href="{{ $settings['snapchat_url'] }}" target="_blank" class="text-decoration-none"
                            aria-label="social icon">
                            <i class="fa-brands fa-square-snapchat social_media_fix"></i>
                        </a>
                    @endif
                    @if (isset($settings['youtube_url']))
                        <a href="{{ $settings['youtube_url'] }}" target="_blank" class="text-decoration-none"
                            aria-label="social icon">
                            <i class="fa-brands fa-youtube social_media_fix"></i>
                        </a>
                    @endif
                    @if (isset($settings['linkedin_url']))
                        <a href="{{ $settings['linkedin_url'] }}" target="_blank" class="text-decoration-none"
                            aria-label="social icon">
                            <i class="fa-brands fa-linkedin-in social_media_fix"></i>
                        </a>
                    @endif
                    @if (isset($settings['twitter_url']))
                        <a href="{{ $settings['twitter_url'] }}" target="_blank" class="text-decoration-none"
                            aria-label="social icon">
                            <i class="fa-brands fa-twitter social_media_fix mx-0"></i>
                        </a>
                    @endif

                </div>
                <div class="d-flex align-items-center px-2">
                    <div class="dropdown z_index_fix">

                        @if (!empty($currentLocaleImage))
                            <a class="btn dropdown-toggle text-white border-0 text-uppercase uk"
                                href="{{ route('language.switch', 'en') }}" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                    <img src="{{ asset('frontend/image/' . $currentLocaleImage) }}" alt="" class="lazy pr-15 img-fluid" width="32" height="32" loading="lazy">
                                {{ $currentLocaleTitleText }}
                            </a>
                        @endif
                        <ul class="dropdown-menu dropdown_bg_fix">
                            @if (!empty(config('global.language')))
                                @foreach (config('global.language') as $language)
                                    @if ($currentLocaleTitle == $language['title'])
                                        <li><a class="dropdown-item text-uppercase uk text-white fix_bg_issue d-none"
                                                href="{{ route('language.switch', $language['code']) }}">
                                                    <img
                                                        src="{{ asset('frontend/image/' . $language['image']) }}"
                                                        alt="" class="pr-15 img-fluid lazy" loading="lazy">
                                                {{ $language['locale_title'] }}
                                            </a></li>
                                    @else
                                        <li><a class="dropdown-item text-uppercase uk text-white fix_bg_issue"
                                                href="{{ route('language.switch', $language['code']) }}">
                                                    <img
                                                        src="{{ asset('frontend/image/' . $language['image']) }}"
                                                        alt="" class="pr-15 img-fluid lazy" loading="lazy">
                                                {{ $language['locale_title'] }}
                                            </a></li>
                                    @endif
                                @endforeach
                            @endif
                        </ul>

                    </div>
                </div>
                <div class="d-flex align-items-center px-3">
                    <div class="dropdown z_index_fix">

                        <a class="btn dropdown-toggle text-white border-0 text-uppercase uk" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false" width="32" height="32">
                            {{--                            <img data-original="{{ asset('frontend/image/'.$language['image']) }}" alt="" class="pr-15 img-fluid lazy" loading="lazy">{{ $language['title'] }} --}}
                            @if (Session::has('currency'))
                                {{ Session::get('currency') }}
                            @else
                                {{ Session::put('currency', 'AED') }}
                                {{ Session::get('currency') }}
                            @endif
                        </a>
                        <ul class="dropdown-menu dropdown_bg_fix">
                            @if (!empty($currencies))
                                @foreach ($currencies as $currency)
                                    @if (Session::get('currency') == $currency['currency_code'])
                                        <li class="d-none"><a
                                                class="dropdown-item text-uppercase uk text-white fix_bg_issue "
                                                href="{{ route('currency.switch', $currency['currency_code']) }}">{{ $currency['currency_code'] }}</a>
                                        </li>
                                    @elseif(Session::get('currency') != $currency['currency_code'])
                                        <li><a class="dropdown-item text-uppercase uk text-white fix_bg_issue "
                                                href="{{ route('currency.switch', $currency['currency_code']) }}">{{ $currency['currency_code'] }}</a>
                                        </li>
                                    @else
                                        <li><a class="dropdown-item text-uppercase uk text-white fix_bg_issue "
                                                href="{{ route('currency.switch', 'AED') }}">AED </a></li>
                                    @endif
                                @endforeach
                            @endif
                            @if (Session::get('currency') == 'AED')
                                <li class="d-none"><a class="dropdown-item text-uppercase uk text-white fix_bg_issue "
                                        href="{{ route('currency.switch', 'AED') }}">AED </a></li>
                            @else
                                <li><a class="dropdown-item text-uppercase uk text-white fix_bg_issue "
                                        href="{{ route('currency.switch', 'AED') }}">AED </a></li>
                            @endif

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="menu-view"></div>   
    @include('frontend.includes.header.menu')

    @include('frontend.includes.header.mobile-menu')
</section>
<script>
    // fetch('/set-mobile-session?width='+window.innerWidth).then(response => {
    //             return response.json();
    // }).then(data => {
    //     document.getElementById("menu-view").innerHTML = data.view;
    // });
</script>