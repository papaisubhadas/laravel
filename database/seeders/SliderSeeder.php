<?php

namespace Database\Seeders;

use App\Models\Slider;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Slider::create([
            'title' => 'RENT LUXURY CARS',
            'description' => "Fill In Our Inquiries, Schedule Your Details, And Pick A Model! We'll Do The Res.",
            'button_text' => 'Book Now',
            'call_to_action' => '#book_now_model',
            'image' => 'banner_image.png',
            'mobile_view_image' => 'banner_image.png',
            'status' => 'active'
        ]);

        Slider::create([
            'title' => 'LUXURY CASR RENTAL IN DUBAI',
            'description' => "One of the Leading Luxury Car Rentals  Best Deals in Dubai.",
            'button_text' => 'Book Now',
            'call_to_action' => '#book_now_model',
            'image' => 'rent-section.jpg',
            'mobile_view_image' => 'rent-section.jpg',
            'status' => 'active'
        ]);

        Slider::create([
            'title' => 'HOW TO RENT A LUXURY CAR IN DUBAI?',
            'description' => "Fill In Our Inquiries, Schedule Your Details, And Pick A Model! We'll Do The Res.",
            'button_text' => 'Book Now',
            'call_to_action' => '#book_now_model',
            'image' => 'scaled.jpg',
            'mobile_view_image' => 'scaled.jpg',
            'status' => 'active'
        ]);
    }
}
