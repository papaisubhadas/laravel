<div class="row mb-3">
    <div class="col-12">
        <div class="form-group">
            <?php
            $field_name = 'car_name';
            $field_lable = __('carinquiry.carinquiries.create.car_name');
            $field_relation = "cars";
            $field_placeholder = __("Select a Car");
            $required = "required";
            $select_options = $cars;
            ?>
            {{ html()->label($field_lable, $field_name) }} {!! fielf_required($required) !!}
            {{ html()->select($field_name, $select_options,isset($$module_name_singular->car_id)?$$module_name_singular->car_id : "")->placeholder($field_placeholder)->class('form-control select2') }}
            @if ($errors->has('car_name'))
                    <span class="text-danger">{{ $errors->first('car_name') }}</span>
            @endif
        </div>
    </div>
</div>
<div class="row mb-3">
    <div class="col-12 col-sm-4">
        <div class="form-group">
            <?php
            $field_name = 'customer_name';
            $field_lable = __('carinquiry.carinquiries.create.customer_name');
            $field_placeholder = __('carinquiry.carinquiries.create.customer_name');
            $required = "required";
            ?>
            {{ html()->label($field_lable, $field_name)->class('form-label') }} {!! fielf_required($required) !!}
            {{ html()->text($field_name)->placeholder($field_placeholder)->class('form-control') }}
        </div>
    </div>
    <div class="col-12 col-sm-4">
        <div class="form-group">
            <?php
            $field_name = 'customer_email';
            $field_lable = __('carinquiry.carinquiries.create.customer_email');
            $field_placeholder = __('carinquiry.carinquiries.create.customer_email');
            $required = "required";
            ?>
            {{ html()->label($field_lable, $field_name)->class('form-label') }} {!! fielf_required($required) !!}
            {{ html()->text($field_name)->placeholder($field_placeholder)->class('form-control') }}
        </div>
    </div>
    <div class="col-12 col-sm-4">
        <div class="form-group">
            <?php
            $field_name = 'status';
            $field_lable = __('carinquiry.carinquiries.create.status');
            $field_placeholder = "-- Select an option --";
            $required = "required";
            $select_options = [

                'Pending'=>'Pending',
                'Under Review'=>'Under Review',
                'Completed'=>'Completed',
                'Cancelled' => 'Cancelled'
            ];
            ?>
            {{ html()->label($field_lable, $field_name)->class('form-label') }} {!! fielf_required($required) !!}
            {{ html()->select($field_name, $select_options)->placeholder($field_placeholder)->class('form-control select2') }}
        </div>
    </div>
</div>
<div class="row mb-3">
    <div class="col-12 col-sm-4">
        <div class="form-group">
            <?php
            $field_name = 'customer_phone_no';
            $field_lable = __('carinquiry.carinquiries.create.customer_phone_no');
            $field_placeholder = __('carinquiry.carinquiries.create.customer_phone_no');
            $required = "required";
            ?>
            {{ html()->label($field_lable, $field_name)->class('form-label') }} {!! fielf_required($required) !!}
            {{ html()->text($field_name)->placeholder($field_placeholder)->class('form-control') }}
        </div>
    </div>
    <div class="col-12 col-sm-4">
        <div class="form-group">
            <?php
            $field_name = 'start_booking_date';
            $field_lable = __('carinquiry.carinquiries.create.start_booking_date');
            $field_placeholder = __('carinquiry.carinquiries.create.start_booking_date');
            $required = "required";
            ?>
            {{ html()->label($field_lable, $field_name)->class('form-label') }} {!! fielf_required($required) !!}
            {{ html()->datetime($field_name)->placeholder($field_placeholder)->class('form-control') }}
        </div>
    </div>
    <div class="col-12 col-sm-4">
        <div class="form-group">
            <?php
            $field_name = 'end_booking_date';
            $field_lable = __('carinquiry.carinquiries.create.end_booking_date');
            $field_placeholder = __('carinquiry.carinquiries.create.end_booking_date');
            $required = "required";
            ?>
            {{ html()->label($field_lable, $field_name)->class('form-label') }} {!! fielf_required($required) !!}
            {{ html()->datetime($field_name)->placeholder($field_placeholder)->class('form-control') }}
        </div>
    </div>
</div>
<div class="row mb-3">
    <div class="col-12 col-sm-4">
        <div class="form-group">
            <?php
            $field_name = 'whatsapp_enable';
            $field_lable = __('carinquiry.carinquiries.create.whatsapp_enable');
            ?>
            <input type="checkbox" name="{{$field_name}}" value="yes" {{isset($$module_name_singular->whatsapp_enable) ? $$module_name_singular->whatsapp_enable == 'yes' ? 'checked' : '' : ''}}>
            {{ html()->label($field_lable, $field_name)->class('form-label') }}

        </div>
    </div>

</div>

<!-- Select2 Library -->
<x-library.select2 />

<script type="module">
    $(document).ready(function() {

        $(document).on('select2:open', () => {
            document.querySelector('.select2-search__field').focus();
            document.querySelector('.select2-container--open .select2-search__field').focus();
        });

        $('.select2-category').select2({
            theme: "bootstrap",
            placeholder: '@lang("Select an option")',
            minimumInputLength: 2,
            allowClear: true,
            ajax: {
                url: '{{route("backend.carinquiries.index_list")}}',
                dataType: 'json',
                data: function(params) {
                    alert("hi");
                    return {
                        q: $.trim(params.term)
                    };
                },
                processResults: function(data) {
                    return {
                        results: data
                    };
                },
                cache: true
            }
        });

        $(document).on("submit", ".ajaxifyForm", function(event){
            $('.error-msg').hide();
            $('.error-msg').text('');
            // $('.submit_button').click(function (event) {

            $("button[type='submit']").prop( "disabled", true);
            $(".formSaving").html('Processing..<i class="fas fa-spin fa-spinner"></i>');
            event.preventDefault();

            var form = $(".ajaxifyForm")[0];
            var formData = new FormData(form);
            // var data = new FormData(this);

            $.ajax({
                url: $(this).attr("action"),
                type:"POST",
                data: formData, //pass the formdata object
                cache: false,
                contentType: false, //tell jquery to avoid some checks
                processData: false,
                dataType: 'json',
                // data:/*data*/$(this).serialize() ,
                success:function(response){
                    if(response.status == 0) {
                        if(response.errors == 'Please Upload Resume in Profile Page Then Apply For Job') {
                            toastr.error(response.errors, 'Response');
                            setTimeout(function(){
                                window.location.href = response.redirect},2600);
                        }
                        else {
                            var errors = response.errors;
                            var errorsHtml= '';

                            $('.error-msg').append('<p><i class="fas fa-exclamation-triangle"></i> Please fix the following errors &amp; try again!    </p><ul>');
                            $.each( errors, function( key, value ) {
                                if(key.includes('.')) {
                                    var key_val = key.split('.');
                                    key = key_val[0]+'_'+key_val[1];
                                };
                                errorsHtml += '<li>' + value + '</li>';
                            });

                            $(window).scrollTop(0);
                            $('.error-msg').append(errorsHtml+'</ul>');
                            $('.error-msg').show();

                            $("button[type='submit']").prop( "disabled", false);
                            $(".formSaving").html('<i class="fas fa-sync"></i> Try Again</span>');
                        }
                        return;
                    }
                    else{

                        // toastr.success(response.message, '');
                        $('.error-msg').hide();

                        $("button[type='submit']").prop( "disabled", false);
                        $(".formSaving").html('<i class="fas fa-check"></i> save </span>');

                        if (response.data.redirect != undefined) {
                            setTimeout(function () {
                                window.location.href = response.data.redirect
                            }, 2600);
                        }

                    }
                },
                error: function(error) {
                    var errors = error.response.errors;
                    var errorsHtml= '';
                    $.each( errors, function( key, value ) {
                        $('.'+key+'_err').text(value);
                    });
                    $("button[type='submit']").prop( "disabled", false);
                    $(".formSaving").html('<i class="fas fa-sync"></i> Try Again</span>');
                },
            });

        });

    });

    // // Date Time Picker
    // $('.datetime').tempusDominus({
    //     localization: {
    //         locale: 'en',
    //         format: 'yyyy-MM-dd HH:mm:ss'
    //     }
    // });
</script>


