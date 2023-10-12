<div class="modal-header border-0 px-4">
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
    <div class="select_car">
        <div class="car_inq_form">
            <form class="ajaxifyForm" action="{{ route('frontend.car.book_now') }}" method="POST">
                @csrf
                <input type="hidden" name="flag" id="flag" value="inquiry">
                {{ method_field('PUT') }}
                <input type="hidden" name="car_id" id="inquiry_id" value="">
                @if(isset($most_rented_car))
                <input type="hidden" name="car_type_id" value="{{$most_rented_car->car_type_id}}">
                @endif
                <div class="form_field name">
                    <label for="">{{ __('text.name') }}</label> <br>
                    <input type="text" name="customer_name" id="inquiry_name" placeholder="{{ __('text.name_plac') }}">
                    <span class="text-danger error-text customer_name_err"></span>
                </div>
                <div class="form_field date">
                    <label for="">{{ __('text.start_date') }}</label> <br>
                    <input type="text" id="airdatepicker" class='datepicker-here start_booking_date' name="start_booking_date" placeholder="{{ __('text.start_date_plac') }}" autocomplete="off" data-timepicker="true" data-language='en' readonly>
                    <span class="text-danger error-text start_booking_date_err"></span>
                </div>

                <div class="form_field date">
                    <label for="">{{ __('text.end_date') }}</label> <br>
                    <input type="text" id="airdatepicker" class='datepicker-here end_booking_date' name="end_booking_date" placeholder="{{ __('text.end_date_plac') }}" autocomplete="off" data-timepicker="true" data-language='en' readonly>
                    <span class="text-danger error-text end_booking_date_err"></span>
                </div>
                <div class="form_field phone">
                    <label for="">{{ __('text.phone') }}</label>
                    <div class="d-flex align-items-center justify-content-xs-center">
                    <input id="phone" name="customer_phone_no" type="tel" class="phone fix_arbc" maxlength="22" style="padding:0 57px;" value="+971&nbsp" >
                </div>
                    <input class="wp_checkbox" type="checkbox" id="whatsapp" name="whatsapp_enable"  value="1" checked>
                    <label for="whatsapp" class="wp_label"> {{ __('text.whatsapp') }} </label>
                    <span class="text-danger error-text customer_phone_no_err"></span>
                </div>

                <div class="form_field email">
                    <label for="">{{ __('text.email') }}</label> <br>
                    <input type="text" name="customer_email" id="inquiry_email" placeholder="{{ __('text.email-plac') }}">
                    <span class="text-danger error-text customer_email_err"></span>
                </div>
                <button type="submit" class="gold_btn submit_btn text-uppercase">{{ __('text.send_enquiry') }}</button>
            </form>
        </div>
    </div>
</div>