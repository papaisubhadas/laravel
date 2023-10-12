<?php

namespace Database\Seeders;

use App\Models\CarOffer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CarOfferSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CarOffer::create([
            'car_id' => 1,
            'deal_type' => 'Daily',
            'title' => 'YOUR NEXT SUPERCAR EXPERIENCE',
            'sub_title' => 'YOUR NEXT SUPERCAR EXPERIENCE',
            'call_to_action' => '#',
            'offer_type' => 'percentage',
            'offer_value' => '35',
            'status' => 'active',
            'offer_start_date' => '2023-04-05',
            'offer_end_date' => '2023-06-01',
        ]);

        CarOffer::create([
            'car_id' => 2,
            'deal_type' => 'Daily',
            'title' => 'YOUR NEXT SUPERCAR EXPERIENCE',
            'sub_title' => 'YOUR NEXT SUPERCAR EXPERIENCE',
            'call_to_action' => '#',
            'offer_type' => 'percentage',
            'offer_value' => '35',
            'status' => 'active',
            'offer_start_date' => '2023-04-05',
            'offer_end_date' => '2023-06-01',
        ]);

        CarOffer::create([
            'car_id' => 3,
            'deal_type' => 'Daily',
            'title' => 'YOUR NEXT SUPERCAR EXPERIENCE',
            'sub_title' => 'YOUR NEXT SUPERCAR EXPERIENCE',
            'call_to_action' => '#',
            'offer_type' => 'percentage',
            'offer_value' => '35',
            'status' => 'active',
            'offer_start_date' => '2023-04-05',
            'offer_end_date' => '2023-06-01',
        ]);

        CarOffer::create([
            'car_id' => 4,
            'deal_type' => 'Daily',
            'title' => 'YOUR NEXT SUPERCAR EXPERIENCE',
            'sub_title' => 'YOUR NEXT SUPERCAR EXPERIENCE',
            'call_to_action' => '#',
            'offer_type' => 'percentage',
            'offer_value' => '35',
            'status' => 'active',
            'offer_start_date' => '2023-04-05',
            'offer_end_date' => '2023-06-01',
        ]);

        CarOffer::create([
            'car_id' => 5,
            'deal_type' => 'Daily',
            'title' => 'YOUR NEXT SUPERCAR EXPERIENCE',
            'sub_title' => 'YOUR NEXT SUPERCAR EXPERIENCE',
            'call_to_action' => '#',
            'offer_type' => 'percentage',
            'offer_value' => '35',
            'status' => 'active',
            'offer_start_date' => '2023-04-05',
            'offer_end_date' => '2023-06-01',
        ]);

        CarOffer::create([
            'car_id' => 6,
            'deal_type' => 'Daily',
            'title' => 'YOUR NEXT SUPERCAR EXPERIENCE',
            'sub_title' => 'YOUR NEXT SUPERCAR EXPERIENCE',
            'call_to_action' => '#',
            'offer_type' => 'percentage',
            'offer_value' => '35',
            'status' => 'active',
            'offer_start_date' => '2023-04-05',
            'offer_end_date' => '2023-06-01',
        ]);

        CarOffer::create([
            'car_id' => 7,
            'deal_type' => 'Daily',
            'title' => 'YOUR NEXT SUPERCAR EXPERIENCE',
            'sub_title' => 'YOUR NEXT SUPERCAR EXPERIENCE',
            'call_to_action' => '#',
            'offer_type' => 'percentage',
            'offer_value' => '35',
            'status' => 'active',
            'offer_start_date' => '2023-04-05',
            'offer_end_date' => '2023-06-01',
        ]);

        CarOffer::create([
            'car_id' => 8,
            'deal_type' => 'Daily',
            'title' => 'YOUR NEXT SUPERCAR EXPERIENCE',
            'sub_title' => 'YOUR NEXT SUPERCAR EXPERIENCE',
            'call_to_action' => '#',
            'offer_type' => 'percentage',
            'offer_value' => '35',
            'status' => 'active',
            'offer_start_date' => '2023-04-05',
            'offer_end_date' => '2023-06-01',
        ]);
    }
}
