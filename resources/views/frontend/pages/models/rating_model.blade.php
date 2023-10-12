<div class="modal fade car_inq_modal" id="message_send" tabindex="-1" aria-labelledby="message_sendLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header border-0 px-4">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="select_car">
                    <div class="car_inq">
                        <img id="car_image" data-path="{{ asset('frontend/image/') }}" alt="">
                        <div class="car_inq_txt">
                            <h3 id="car_title">Request quote from Lamborghini Urus 2022</h3>
                            <ul id="car_rent_detail">
                            </ul>
                        </div>
                    </div>

                    <div class="car_inq_form">
                        <form class="ajaxifyForm" action="{{ route('frontend.car.book_now') }}" method="POST">
                            <input type="hidden" name="flag" id="flag" value="inquiry">
                            {{ method_field('PUT') }}
                            <input type="hidden" name="car_id" id="inquiry_id" value="">
                            <div class="form_field name">
                                <label for="">Name</label> <br>
                                <input type="text" name="customer_name" id="inquiry_name" placeholder="Enter your Name">
                                <span class="text-danger error-text customer_name_err"></span>
                            </div>
                            <div class="form_field phone">
                                <label for="">Phone</label>
                                <div class="d-flex align-items-center justify-content-xs-center">
                                    <div class="dropdown">
                                        @if(!empty($dubai_phone_codes))
                                            <a class="btn dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                <img src="{{ asset('vendor/blade-flags/country-'.$dubai_phone_codes->iso.'.svg') }}"  width="32" height="32" alt="">
                                            </a>
                                        @endif
                                        <ul class="dropdown-menu  country-code-dropdown">
                                            @if(!empty($phone_codes))
                                                @foreach($phone_codes as $key=>$phone_code)
                                                    <li class="phonecode-dropdown-in" data-code={{ $phone_code }}><a class="dropdown-item"><img src="{{ asset('vendor/blade-flags/country-'.$key.'.svg') }}" height="32" alt=""></a></li>
                                                @endforeach
                                            @endif
                                        </ul>
                                    </div>
                                    <input type="hidden" name="phone_country_code" id="phone_country_code_in" value="{{ (!empty($dubai_phone_codes) ? $dubai_phone_codes->phonecode : '' ) }}">
                                    <input type="text" name="customer_phone_no" id="inquiry_phone_no" placeholder="05 xxxxxxxxxx">
                                </div>
                                <span class="text-danger error-text customer_phone_no_err"></span>
                                {{-- <input class="wp_checkbox" type="checkbox" id="whatsapp" name="whatsapp" value="">
                                 <label for="whatsapp" class="wp_label"> WhatsApp Enable </label><br>--}}
                            </div>
                            <div class="form_field email">
                                <label for="">Email</label> <br>
                                <input type="text" name="customer_email" id="inquiry_email" placeholder="Enter your Email">
                                <span class="text-danger error-text customer_email_err"></span>
                            </div>
                            <button type="submit" class="gold_btn submit_btn text-uppercase">Send Enquiry</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
