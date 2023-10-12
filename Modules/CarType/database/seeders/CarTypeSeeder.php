<?php

namespace Modules\CarType\database\seeders;

use Illuminate\Database\Seeder;
use Modules\Car\Models\CarTranslation;
use Modules\CarType\Models\CarType;
use Modules\CarType\Models\CarTypeTranslation;


class CarTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CarType::create([
            'slug' => 'convertible_cars',
            'image' => 'b_car_5.png',
        ]);

        CarType::create([
            'slug' => 'exotic_cars',
            'image' => 'b_car_4.png',
        ]);

        CarType::create([
            'slug' => 'luxury_cars',
            'image' => 'b_car_3.png',
        ]);

        CarType::create([
            'slug' => 'sports_cars',
            'image' => 'b_car_2.png',
        ]);

        CarType::create([
            'slug' => 'suv',
            'image' => 'b_car_1.png',
        ]);

        CarTypeTranslation::create([
            'car_type_id' => 1,
            'locale' => 'en',
            'title' => 'Convertible Cars',
            'description' => 'A convertible or cabriolet (/ˌkæbrioʊˈleɪ/) is a passenger car that can be driven with or without a roof in place.',

        ]);
        CarTypeTranslation::create([
            'car_type_id' => 1,
            'locale' => 'ar',
            'title' => 'السيارات المكشوفة',
            'description' => 'سقف أو بدونه.سيارة مكشوفة أو كابريوليه /) هي سيارةركاب يمكن قيادتها مع وجودkæbrioʊˈleɪ',

        ]);
        CarTypeTranslation::create([
            'car_type_id' => 1,
            'locale' => 'fr',
            'title' => 'Voitures décapotables',
            'description' => 'Un cabriolet ou cabriolet (/ˌkæbrioʊˈleɪ/) est une voiture de tourisme qui peut être conduite avec ou sans toit en place.',

        ]);
        CarTypeTranslation::create([
            'car_type_id' => 1,
            'locale' => 'ru',
            'title' => 'Кабриолеты',
            'description' => 'Кабриолет или кабриолет (/ˌkæbrioʊˈleɪ/) — это легковой автомобиль, которым можно управлять как с установленной крышей, так и без нее.',

        ]);

        CarTypeTranslation::create([
            'car_type_id' => 2,
            'locale' => 'en',
            'title' => 'Exotic Cars',
            'description' => 'An Exotic Car is a peculiar car that remains not often seen in cost, efficiency, and accessibility',
        ]);
        CarTypeTranslation::create([
            'car_type_id' => 2,
            'locale' => 'ar',
            'title' => 'سيارات غريبة',
            'description' => 'سيارة Exotic Car هيسيارة غريبة لا تُرى في كثيرمن الأحيان من حيث التكلفةوالكفاءة وسهولة الوصول',
        ]);
        CarTypeTranslation::create([
            'car_type_id' => 2,
            'locale' => 'fr',
            'title' => 'Voitures exotiques',
            'description' => 'Une voiture exotique est une voiture particulière qui n est pas souvent vue en termes de coût, defficacité et daccessibilité',
        ]);
        CarTypeTranslation::create([
            'car_type_id' => 2,
            'locale' => 'ru',
            'title' => 'Экзотические автомобили',
            'description' => 'Экзотический автомобиль — это своеобразный автомобиль, который остается нечасто встречающимся по стоимости, эффективности и доступности.',
        ]);

        CarTypeTranslation::create([
            'car_type_id' => 3,
            'locale' => 'en',
            'title' => 'Luxury Cars',
            'description' => 'A luxury car is a car that provides above-average to high-end levels of comfort, features, and equipment.',

        ]);
        CarTypeTranslation::create([
            'car_type_id' => 3,
            'locale' => 'ar',
            'title' => 'سيارات فاخرة',
            'description' => 'السيارة الفاخرة هي السيارة التي توفر مستويات أعلى منالمتوسط ​​إلى الراقية من الراحةوالميزات والمعدات.',

        ]);
        CarTypeTranslation::create([
            'car_type_id' => 3,
            'locale' => 'fr',
            'title' => 'Voitures de luxe',
            'description' => 'Une voiture de luxe est une voiture qui offre des niveaux de confort, de fonctionnalités et déquipements supérieurs à la moyenne à haut de gamme.',

        ]);
        CarTypeTranslation::create([
            'car_type_id' => 3,
            'locale' => 'ru',
            'title' => 'Роскошные автомобили',
            'description' => 'Роскошный автомобиль - это автомобиль, который обеспечивает уровень комфорта, функций и оборудования от выше среднего до высокого класса.',

        ]);

        CarTypeTranslation::create([
            'car_type_id' => 4,
            'locale' => 'en',
            'title' => 'Sports Cars',
            'description' => 'A car designed with an emphasis on dynamic performance, such as handling, acceleration, top speed, the thrill of driving and racing capability.',

        ]);
        CarTypeTranslation::create([
            'car_type_id' => 4,
            'locale' => 'ar',
            'title' => 'سيارات رياضية',
            'description' => 'سيارة مصممة مع التركيزعلى الأداء الديناميكي ، مثلالمناورة والتسارع والسرعةالقصوى وإثارة القيادة والقدرةعلى السباق.',

        ]);
        CarTypeTranslation::create([
            'car_type_id' => 4,
            'locale' => 'fr',
            'title' => 'Voitures de sport',
            'description' => 'Une voiture conçue en mettant laccent sur les performances dynamiques, telles que la maniabilité, laccélération, la vitesse de pointe, le plaisir de conduire et la capacité de course.',

        ]);
        CarTypeTranslation::create([
            'car_type_id' => 4,
            'locale' => 'ru',
            'title' => 'Спортивные автомобили',
            'description' => 'Автомобиль, разработанный с упором на динамические характеристики, такие как управляемость, ускорение, максимальная скорость, острые ощущения от вождения и гоночные возможности.',

        ]);

        CarTypeTranslation::create([
            'car_type_id' => 5,
            'locale' => 'en',
            'title' => 'SUV',
            'description' => 'A sport utility vehicle (SUV) is a car classification that combines elements of road-going passenger cars with features from off-road vehicles, such as raised ground clearance and four-wheel drive.',

        ]);
        CarTypeTranslation::create([
            'car_type_id' => 5,
            'locale' => 'ar',
            'title' => 'سيارات الدفع الرباعي',
            'description' => 'السيارة الرياضية متعددة الأغراض (SUV) هيتصنيف للسيارات يجمع بين عناصر سيارات الركاب التي تسير على الطرق مع ميزاتمن المركبات على الطرقالوعرة ، مثل الخلوص الأرضي المرتفع والدفع الرباعي.',

        ]);
        CarTypeTranslation::create([
            'car_type_id' => 5,
            'locale' => 'fr',
            'title' => 'VUES',
            'description' => 'Un véhicule utilitaire sport (SUV) est une classification de voiture qui combine des éléments de voitures particulières routières avec des caractéristiques de véhicules tout-terrain, telles quune garde au sol surélevée et une transmission intégrale.',

        ]);
        CarTypeTranslation::create([
            'car_type_id' => 5,
            'locale' => 'ru',
            'title' => 'внедорожник',
            'description' => 'Спортивный внедорожник (SUV) — это классификация автомобилей, сочетающая в себе элементы дорожных легковых автомобилей с чертами внедорожников, такими как увеличенный дорожный просвет и полный привод.',

        ]);
    }
}
