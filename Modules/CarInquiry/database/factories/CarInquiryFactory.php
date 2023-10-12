<?php

namespace Modules\CarInquiry\database\factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CarInquiryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \Modules\CarInquiry\Models\CarInquiry::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'car_type_id'          => '1',
            'car_id'               => '1',
            'customer_name'        => substr($this->faker->text(15), 0, -1),
            'customer_email'       => $this->faker->email,
            'customer_phone_no'    => $this->faker->phoneNumber,
            'whatsapp_enable'      => 1,
            'start_booking_date	'  => Carbon::now(),
            'end_booking_date'     => Carbon::now(),
            'status'               => 1,
            'created_at'           => Carbon::now(),
            'updated_at'           => Carbon::now(),
        ];
    }
}
