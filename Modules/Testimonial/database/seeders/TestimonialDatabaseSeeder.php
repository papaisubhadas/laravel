<?php

namespace Modules\Testimonial\database\seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Modules\CarType\Models\CarTypeTranslation;
use Modules\Testimonial\Models\Testimonial;
use Modules\Testimonial\Models\TestimonialTranslation;

class TestimonialDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        // Disable foreign key checks!
//        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
//
//        /*
//         * Testimonials Seed
//         * ------------------
//         */
//
//        // DB::table('testimonials')->truncate();
//        // echo "Truncate: testimonials \n";
//
//        Testimonial::factory()->count(20)->create();
//        $rows = Testimonial::all();
//        echo " Insert: testimonials \n\n";
//
//        // Enable foreign key checks!
//        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        Testimonial::create([
            'rating' => 5,
            'image' => 'client_img_1.png',
            'date' => '2023-04-05',
        ]);

        Testimonial::create([
            'rating' => 4,
            'image' => 'client_img_1.png',
            'date' => '2023-04-05', 'date' => '2023-04-05',
        ]);

        Testimonial::create([
            'rating' => 3,
            'image' => 'client_img_1.png',
            'date' => '2023-04-05',
        ]);

        Testimonial::create([
            'rating' => 3,
            'image' => 'client_img_1.png',
            'date' => '2023-04-05',
        ]);

        Testimonial::create([
            'rating' => 3,
            'image' => 'client_img_1.png',
            'date' => '2023-04-05',
        ]);

        TestimonialTranslation::create([
            'testimonial_id' => 1,
            'locale' => 'en',
            'name' => 'Joe Charles',
            'comment' => 'This is my 6th time  in Dubai, honestly expectations were not high at all after the last company’s I have used. From the start dealing with Oumayma was a blessing was very straight forward with me and helpful, drop of times were on point and so was pick up timings. Pricing was best on the market and customer service was amazing. ',

        ]);
        TestimonialTranslation::create([
            'testimonial_id' => 1,
            'locale' => 'ar',
            'name' => 'السيارات المكشوفة',
            'comment' => 'سقف أو بدونه.سيارة مكشوفة أو كابريوليه /) هي سيارةركاب يمكن قيادتها مع وجودkæbrioʊˈleɪ',

        ]);
        TestimonialTranslation::create([
            'testimonial_id' => 1,
            'locale' => 'fr',
            'name' => 'Voitures décapotables',
            'comment' => 'Un cabriolet ou cabriolet (/ˌkæbrioʊˈleɪ/) est une voiture de tourisme qui peut être conduite avec ou sans toit en place.',

        ]);
        TestimonialTranslation::create([
            'testimonial_id' => 1,
            'locale' => 'ru',
            'name' => 'Кабриолеты',
            'comment' => 'Кабриолет или кабриолет (/ˌkæbrioʊˈleɪ/) — это легковой автомобиль, которым можно управлять как с установленной крышей, так и без нее.',

        ]);

        TestimonialTranslation::create([
            'testimonial_id' => 2,
            'locale' => 'en',
            'name' => 'Mack Charles',
            'comment' => 'An Exotic Car is a peculiar car that remains not often seen in cost, efficiency, and accessibility',
        ]);
        TestimonialTranslation::create([
            'testimonial_id' => 2,
            'locale' => 'ar',
            'name' => 'سيارات غريبة',
            'comment' => 'سيارة Exotic Car هيسيارة غريبة لا تُرى في كثيرمن الأحيان من حيث التكلفةوالكفاءة وسهولة الوصول',
        ]);
        TestimonialTranslation::create([
            'testimonial_id' => 2,
            'locale' => 'fr',
            'name' => 'Voitures exotiques',
            'comment' => 'Une voiture exotique est une voiture particulière qui n est pas souvent vue en termes de coût, defficacité et daccessibilité',
        ]);
        TestimonialTranslation::create([
            'testimonial_id' => 2,
            'locale' => 'ru',
            'name' => 'Экзотические автомобили',
            'comment' => 'Экзотический автомобиль — это своеобразный автомобиль, который остается нечасто встречающимся по стоимости, эффективности и доступности.',
        ]);

        TestimonialTranslation::create([
            'testimonial_id' => 3,
            'locale' => 'en',
            'name' => 'Joe Charles',
            'comment' => 'A luxury car is a car that provides above-average to high-end levels of comfort, features, and equipment.',

        ]);
        TestimonialTranslation::create([
            'testimonial_id' => 3,
            'locale' => 'ar',
            'name' => 'سيارات فاخرة',
            'comment' => 'السيارة الفاخرة هي السيارة التي توفر مستويات أعلى منالمتوسط ​​إلى الراقية من الراحةوالميزات والمعدات.',

        ]);
        TestimonialTranslation::create([
            'testimonial_id' => 3,
            'locale' => 'fr',
            'name' => 'Voitures de luxe',
            'comment' => 'Une voiture de luxe est une voiture qui offre des niveaux de confort, de fonctionnalités et déquipements supérieurs à la moyenne à haut de gamme.',

        ]);
        TestimonialTranslation::create([
            'testimonial_id' => 3,
            'locale' => 'ru',
            'name' => 'Роскошные автомобили',
            'comment' => 'Роскошный автомобиль - это автомобиль, который обеспечивает уровень комфорта, функций и оборудования от выше среднего до высокого класса.',

        ]);

        TestimonialTranslation::create([
            'testimonial_id' => 4,
            'locale' => 'en',
            'name' => 'Mack Charles',
            'comment' => 'A car designed with an emphasis on dynamic performance, such as handling, acceleration, top speed, the thrill of driving and racing capability.',

        ]);
        TestimonialTranslation::create([
            'testimonial_id' => 4,
            'locale' => 'ar',
            'name' => 'سيارات رياضية',
            'comment' => 'سيارة مصممة مع التركيزعلى الأداء الديناميكي ، مثلالمناورة والتسارع والسرعةالقصوى وإثارة القيادة والقدرةعلى السباق.',

        ]);
        TestimonialTranslation::create([
            'testimonial_id' => 4,
            'locale' => 'fr',
            'name' => 'Voitures de sport',
            'comment' => 'Une voiture conçue en mettant laccent sur les performances dynamiques, telles que la maniabilité, laccélération, la vitesse de pointe, le plaisir de conduire et la capacité de course.',

        ]);
        TestimonialTranslation::create([
            'testimonial_id' => 4,
            'locale' => 'ru',
            'name' => 'Спортивные автомобили',
            'comment' => 'Автомобиль, разработанный с упором на динамические характеристики, такие как управляемость, ускорение, максимальная скорость, острые ощущения от вождения и гоночные возможности.',

        ]);

        TestimonialTranslation::create([
            'testimonial_id' => 5,
            'locale' => 'en',
            'name' => 'Joe Charles',
            'comment' => 'A sport utility vehicle (SUV) is a car classification that combines elements of road-going passenger cars with features from off-road vehicles, such as raised ground clearance and four-wheel drive.',

        ]);
        TestimonialTranslation::create([
            'testimonial_id' => 5,
            'locale' => 'ar',
            'name' => 'سيارات الدفع الرباعي',
            'comment' => 'السيارة الرياضية متعددة الأغراض (SUV) هيتصنيف للسيارات يجمع بين عناصر سيارات الركاب التي تسير على الطرق مع ميزاتمن المركبات على الطرقالوعرة ، مثل الخلوص الأرضي المرتفع والدفع الرباعي.',

        ]);
        TestimonialTranslation::create([
            'testimonial_id' => 5,
            'locale' => 'fr',
            'name' => 'VUES',
            'comment' => 'Un véhicule utilitaire sport (SUV) est une classification de voiture qui combine des éléments de voitures particulières routières avec des caractéristiques de véhicules tout-terrain, telles quune garde au sol surélevée et une transmission intégrale.',

        ]);
        TestimonialTranslation::create([
            'testimonial_id' => 5,
            'locale' => 'ru',
            'name' => 'внедорожник',
            'comment' => 'Спортивный внедорожник (SUV) — это классификация автомобилей, сочетающая в себе элементы дорожных легковых автомобилей с чертами внедорожников, такими как увеличенный дорожный просвет и полный привод.',

        ]);
    }
}
