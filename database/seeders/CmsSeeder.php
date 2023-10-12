<?php

namespace Database\Seeders;

use App\Models\Cms;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CmsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Cms::create([
            'title' => 'Company Service',
            'slug' => 'company_service',
            'cms_type' => 'Section',
            'content' => '<section class="company_service">
        <div class="container">
            <div class="all_service">
                <div class="service_list">
                    <img src="frontend/image/service_1.png" alt="">
                    <p>Luxury Selection</p>
                </div>
                <div class="service_list">
                    <img src="frontend/image/service_2.png" alt="">
                    <p>24/7 Order Available</p>
                </div>
                <div class="service_list">
                    <img src="frontend/image/service_3.png" alt="">
                    <p>High Safety</p>
                </div>
                <div class="service_list">
                    <img src="frontend/image/service_4.png" alt="">
                    <p>Best Prices</p>
                </div>
                <div class="service_list">
                    <img src="frontend/image/service_5.png" alt="">
                    <p>Fast Car Delivery Service</p>
                </div>
            </div>
        </div>
    </section>',
            'status' => 'published',
        ]);

        Cms::create([
            'title' => 'About Company',
            'slug' => 'about_company',
            'cms_type' => 'Section',
            'content' => '<section class="about_company">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="about_comany_img">
                        <img src="frontend/image/about_company.png" alt="">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="company_about_txt">
                        <h1>About us for company</h1>
                        <div class="about_us_details about_scroll_fix">
                            <p>Lorem Ipsum is simply dummy text offer the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever ssd since the 1500s, when an unknown printer took a galley of type and scrambled it to the make a type specimen book. It has survived not only five centuries, but to also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets of the containing Lorem Ipsum passages, and more recently with desktop offer publishing the software like Aldus PageMaker including versions of Lorem Ipsum.  It has been survived not only five centuries, but to also the leap into electronic offers  the typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets of the containing Lorem Ipsum passages, and more recently with desktop offer publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                            <p>Lorem Ipsum is simply dummy text offer the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever ssd since the 1500s, when an unknown printer took a galley of type and scrambled it to the make a type specimen book. It has survived not only five centuries, but to also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets of the containing Lorem Ipsum passages, and more recently with desktop offer publishing the software like Aldus PageMaker including versions of Lorem Ipsum.  It has been survived not only five centuries, but to also the leap into electronic offers  the typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets of the containing Lorem Ipsum passages, and more recently with desktop offer publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>',
            'status' => 'published',
        ]);


        Cms::create([
            'title' => 'Car Rent Rule',
            'slug' => 'car_rent_rule',
            'cms_type' => 'Section',
            'content' => '<section class="car_rent_rule">
            <div class="car_rent_rule_bg">
                <div class="container">
                        <div class="car_rent_rule_txt row pt-4">
                            <h1>How to rent a luxury car in Dubai</h1>
                            <div class="rule_details col-lg-8 row>
                                <div class="rule_details_list list_right col-md-6">
                                    <h3>Foreign Visitors</h3>
                                    <ul>
                                        <li> <i class="fa-solid fa-circle-check rigth_icon"></i> Valid Original Passport</li>
                                        <li> <i class="fa-solid fa-circle-check rigth_icon"></i> Valid Visit Visa</li>
                                        <li> <i class="fa-solid fa-circle-check rigth_icon"></i> Valid Driver License Issued from Home Country</li>
                                        <li> <i class="fa-solid fa-circle-check rigth_icon"></i> International Driving Permit (IDP)</li>
                                        <li> <i class="fa-solid fa-circle-check rigth_icon"></i> Minimum age 21</li>
                                    </ul>
                                </div>
                                <div class="rule_details_list col-md-6">
                                    <h3>Residents and UAE Nationals</h3>
                                    <ul>
                                        <li> <i class="fa-solid fa-circle-check rigth_icon"></i> UAE Driving License</li>
                                        <li> <i class="fa-solid fa-circle-check rigth_icon"></i> Emirates ID</li>
                                        <li> <i class="fa-solid fa-circle-check rigth_icon"></i> (Residential Visa Or Passport may be acceptable)</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="car_rent_age col-lg-4">
                                <div class="car_rent_age_txt">
                                    <h1>21</h1>
                                    <h2>MINIMUM AGE TO RENT A CAR IN DUBAI</h2>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </section>',
            'status' => 'published',
        ]);

        Cms::create([
            'title' => 'Why Choose Us',
            'slug' => 'why_choose_us',
            'cms_type' => 'Section',
            'content' => '<section class="whay_choose">
        <div class="container">
            <h1 class="whay_choose_title">Why Choose Us</h1>
            <div class="row">
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="company_credit">
                        <div class="company_icon">
                            <img src="frontend/image/choose_1.png" alt="">
                        </div>
                        <h3>Best Car Rental Office In Dubai</h3>
                        <p>If Dubai is your next destination for tourism or housing, renting a car may be one of the first things you should think of to explore the streets of this huge city and enjoy the landscapes that adorn it. If you are looking for a car rental office in Dubai, </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="company_credit">
                        <div class="company_icon">
                            <img src="frontend/image/choose_2.png" alt="">
                        </div>
                        <h3 style="width: 70%;" >Why Friends Rent A Car Office In Dubai?​</h3>
                        <p>Our good reputation, high credibility and competitive prices made us top the list of the best car rental offices in Dubai. Our team works hard to ensure that the needs and requirements of permanent and renewable customers are met.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="company_credit">
                        <div class="company_icon">
                            <img src="frontend/image/choose_3.png" alt="">
                        </div>
                        <h3 style="width: 50%;">Car Rental Prices In Dubai</h3>
                        <p>Car rental prices in Dubai depend on the type of car you choose. In general, car rental prices range from 400 dirhams per day and may reach 5000 dirhams for luxury cars, Lamborghini, Rolls-Royce, and others.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>',
            'status' => 'published',
        ]);
    }
}
