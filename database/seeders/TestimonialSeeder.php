<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Testimonial::create([
            'title' => 'Joe Charles',
            'rating' => 5,
            'comment' => 'This is my 6th time  in Dubai, honestly expectations were not high at all after the last company’s I have used. From the start dealing with Oumayma was a blessing was very straight forward with me and helpful, drop of times were on point and so was pick up timings. Pricing was best on the market and customer service was amazing. ',
            'date' => '2023-04-05',
        ]);

        Testimonial::create([
            'title' => 'Mack Charles',
            'rating' => 5,
            'comment' => 'This is my 6th time  in Dubai, honestly expectations were not high at all after the last company’s I have used. From the start dealing with Oumayma was a blessing was very straight forward with me and helpful, drop of times were on point and so was pick up timings. Pricing was best on the market and customer service was amazing. ',
            'date' => '2023-04-05',
        ]);

        Testimonial::create([
            'title' => 'Joe Charles',
            'rating' => 5,
            'comment' => 'This is my 6th time  in Dubai, honestly expectations were not high at all after the last company’s I have used. From the start dealing with Oumayma was a blessing was very straight forward with me and helpful, drop of times were on point and so was pick up timings. Pricing was best on the market and customer service was amazing. ',
            'date' => '2023-04-05',
        ]);

        Testimonial::create([
            'title' => 'Mack Charles',
            'rating' => 5,
            'comment' => 'This is my 6th time  in Dubai, honestly expectations were not high at all after the last company’s I have used. From the start dealing with Oumayma was a blessing was very straight forward with me and helpful, drop of times were on point and so was pick up timings. Pricing was best on the market and customer service was amazing. ',
            'date' => '2023-04-05',
        ]);

        Testimonial::create([
            'title' => 'Joe Charles',
            'rating' => 5,
            'comment' => 'This is my 6th time  in Dubai, honestly expectations were not high at all after the last company’s I have used. From the start dealing with Oumayma was a blessing was very straight forward with me and helpful, drop of times were on point and so was pick up timings. Pricing was best on the market and customer service was amazing. ',
            'date' => '2023-04-05',
        ]);

    }
}
