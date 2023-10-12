<?php

namespace Modules\BannerSlideshow\database\factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class BannerSlideshowFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \Modules\BannerSlideshow\Models\BannerSlideshow::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'image'              => '',
            'status'             => 'active',
            'created_at'         => Carbon::now(),
            'updated_at'         => Carbon::now(),
        ];
    }
}
