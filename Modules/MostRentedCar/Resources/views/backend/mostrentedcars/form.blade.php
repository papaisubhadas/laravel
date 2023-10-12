<div class="row mb-3">
    <div class="col-12 col-sm-6">
        <div class="form-group">
            <?php
            $field_name = 'car_id';
            $field_lable = __('car.car_name');
            $field_placeholder = __('car.select_car');
            $required = "";
            $car_brand_options = $cars;
            ?>
            {{ html()->label($field_lable, $field_name)->class('form-label') }}<span class="text-danger">*</span>
            <select class="form-control select2" name="car_id" id="car_id">
                <option value="">{{__('car.select_car')}}</option>
                @foreach($cars as $key=>$car)
                    @if(!in_array($car->id, $most_rented_cars_id_arr))
                    <option value="{{$car->id}}" {{ (isset($$module_name_singular) && $$module_name_singular->car_id == $car->id) ? 'Selected' : '' }}>{{$car->translate(\Illuminate\Support\Facades\App::currentLocale()) ? $car->translate(\Illuminate\Support\Facades\App::currentLocale())->name : ''}}     </option>
                    @endif
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-12 col-sm-6">
        <div class="form-group">
            <?php
            $field_name = 'most_rent_car_display_order';
            $field_lable = __('most_rented_car.display_order');
            $field_placeholder = __('most_rented_car.display_order');
            $required = "";
            ?>
            {{ html()->label($field_lable, $field_name)->class('form-label') }} {!! fielf_required($required) !!}
            {{ html()->text($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["$required"]) }}
        </div>
    </div>
</div>


