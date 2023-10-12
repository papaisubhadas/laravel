{{-- TESTIMONIAL SECTION --}}
@if (!empty($testimonials))
    <section class="clients_testimonial my-4">
        <div class="container">
            <div class="client_title">
                <h3>{{ __('text.what_our_clients_saying_about_us') }}</h3>
                <h4 style="color: #c28a33;">{{ __('text.google_rating_score') }}: {{ round($average_review, 2) }} / 5</h4>
                <p>{{ __('text.based_on') }} {{ count($testimonials) }} {{ __('text.reviews') }}</p>
            </div>
            <div class="tectimonial_slider owl-carousel">
            @foreach ($testimonials as $testimonial)
                <div class="our_client">
                    <div class="client_name">
                        <div class="profile">
                            <img data-original="{{ asset('frontend/testimonial/'.$testimonial->image) }}" alt="{{ $testimonial->image }}" loading="lazy" class="lazy" width="45" height="45">
                            <span>{{ $testimonial->name }} <p>{{ $testimonial->date }}</p> </span>
                        </div>
                        <div class="client_join">
                            <img data-original="{{ asset('frontend/image/client_google_icon.png') }}" class="lazy"
                                alt="" loading="lazy" width="25" height="25">
                        </div>
                    </div>
                    <div class="client_txt">
                        <div class="cl_review">
                            {{-- <img src="{{ asset('frontend/image/five_star.png') }}" alt=""> --}}
                            @for ($i = (int) $testimonial->rating; $i >= 1; $i--)
                                <span class="fa fa-star" style="color:orange"></span>
                            @endfor
                            @for ($i = 5 - (int) $testimonial->rating; $i >= 1; $i--)
                                <span class="fa fa-star"></span>
                            @endfor
                        </div>
                        <p>{!! $testimonial->comment !!}</p>
                    </div>
                </div>
            @endforeach
            </div>
            <div class="comment_btn">
                <a href="https://g.page/r/Cat83rB_erBBEAI/review" target="_blank"> <button class="gold_btn"  aria-label="{{ __('text.leave_a_comment') }}">{{ __('text.leave_a_comment') }}</button> </a>
            </div>
        </div>
    </section>
@endif
