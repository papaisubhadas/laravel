@if(isset($faq_details) && !empty($faq_details))
    <div class="container my-3">
        <div class="row">
            <div class="col-md-12">

                <div class="accordion accordion-flush mb-5" id="">
                    <section class="dubai_car_rent" style="background-color: transparent !important;">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <h3 class="faq mt-3 mb-5">
                                        {{ __('text.frequently_asked_question') }}
                                    </h3>
                                    <div class="accordion accordion-flush mb-5" id="">
                                        @foreach($faq_details as $faq_detail)
                                            <div class="accordion-item accordion_body_fix my-3">
                                                    <h4 class="accordion-header" >
                                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                                                data-bs-target="#flush-collapse{{$faq_detail->id}}" aria-expanded="false"
                                                                aria-controls="flush-collapseThree">
                                                                {{ $faq_detail->question }}
                                                        </button>
                                                    </h4>
                                                <div id="flush-collapse{{$faq_detail->id}}" class="accordion-collapse collapse"
                                                    aria-labelledby="flush-headingten" data-bs-parent="#accordionFlushExample">
                                                    <div class="accordion-body pt-0 py-3 faq_size">
                                                            {{ $faq_detail->answer }}
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>

            </div>

        </div>

    </div>
@endif
