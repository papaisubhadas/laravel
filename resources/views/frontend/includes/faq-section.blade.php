<div class="container my-3">
    <nav
        style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
        aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item breadcrumb_fix " aria-current="page"><a href="/">Home</a></li>
            <li class="breadcrumb-item breadcrumb_fix_active active " aria-current="page">Faq</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-8">
            <h1 class="faq mt-3 mb-5">
                Frequently Asked Questions
            </h1>
            <div class="accordion accordion-flush mb-5" id="accordion_faq">
                @if(isset($faq_details) && !empty($faq_details))
                    @foreach($faq_details as $faq_detail)
                        @if($faq_detail->translate('en') && App::currentLocale() == 'en')
                            <div class="accordion-item accordion_body_fix my-3">
                                <h2 class="accordion-header" >
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#flush-collapse{{$faq_detail->id}}" aria-expanded="false"
                                            aria-controls="flush-collapseThree">
                                        {{ $faq_detail->translate('en')->question }}
                                    </button>
                                </h2>
                                <div id="flush-collapse{{$faq_detail->id}}" class="accordion-collapse collapse"
                                     aria-labelledby="flush-headingten" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body pt-0">
                                        <div class="py-3 faq_size">
                                            {{ $faq_detail->translate('en')->answer }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if($faq_detail->translate('ar') && App::currentLocale() == 'ar')
                            <div class="accordion-item accordion_body_fix my-3">
                                <h2 class="accordion-header" >
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#flush-collapse{{$faq_detail->id}}" aria-expanded="false"
                                            aria-controls="flush-collapseThree">
                                        {{ $faq_detail->translate('ar')->question }}
                                    </button>
                                </h2>
                                <div id="flush-collapse{{$faq_detail->id}}" class="accordion-collapse collapse"
                                     aria-labelledby="flush-headingten" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body pt-0">
                                        <div class="py-3 faq_size">
                                            {{ $faq_detail->translate('ar')->answer }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if($faq_detail->translate('fr') && App::currentLocale() == 'fr')
                            <div class="accordion-item accordion_body_fix my-3">
                                <h2 class="accordion-header" >
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#flush-collapse{{$faq_detail->id}}" aria-expanded="false"
                                            aria-controls="flush-collapseThree">
                                        {{ $faq_detail->translate('fr')->question }}
                                    </button>
                                </h2>
                                <div id="flush-collapse{{$faq_detail->id}}" class="accordion-collapse collapse"
                                     aria-labelledby="flush-headingten" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body pt-0">
                                        <div class="py-3 faq_size">
                                            {{ $faq_detail->translate('fr')->answer }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if($faq_detail->translate('ru') && App::currentLocale() == 'ru')
                            <div class="accordion-item accordion_body_fix my-3">
                                <h2 class="accordion-header" >
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#flush-collapse{{$faq_detail->id}}" aria-expanded="false"
                                            aria-controls="flush-collapseThree">
                                        {{ $faq_detail->translate('ru')->question }}
                                    </button>
                                </h2>
                                <div id="flush-collapse{{$faq_detail->id}}" class="accordion-collapse collapse"
                                     aria-labelledby="flush-headingten" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body pt-0">
                                        <div class="py-3 faq_size">
                                            {{ $faq_detail->translate('ru')->answer }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                @endif
            </div>

        </div>
    </div>
</div>
