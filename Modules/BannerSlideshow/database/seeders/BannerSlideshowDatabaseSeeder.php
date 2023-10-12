<?php

namespace Modules\BannerSlideshow\database\seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Modules\BannerSlideshow\Models\BannerSlideshow;
use Modules\BannerSlideshow\Models\BannerSlideshowTranslation;

class BannerSlideshowDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
//        // Disable foreign key checks!
//        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
//
//        /*
//         * BannerSlideshows Seed
//         * ------------------
//         */
//
//        // DB::table('bannerslideshows')->truncate();
//        // echo "Truncate: bannerslideshows \n";
//
//        BannerSlideshow::factory()->count(20)->create();
//        $rows = BannerSlideshow::all();
//        echo " Insert: bannerslideshows \n\n";
//
//        // Enable foreign key checks!
//        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        BannerSlideshow::create([
            'image' => 'scaled.jpg',
        ]);

        BannerSlideshow::create([
            'image' => 'banner_image.png',
        ]);

        BannerSlideshow::create([
            'image' => 'banner_image.png',
        ]);

        BannerSlideShowTranslation::create([
            'banner_slideshow_id' => 1,
            'locale' => 'en',
            'title' => 'RENT LUXURY CARS',
            'sub_title' => 'Fill In Our Inquiries, Schedule Your Details, And Pick A Model! We ll Do The Res.',

        ]);
        BannerSlideShowTranslation::create([
            'banner_slideshow_id' => 1,
            'locale' => 'ar',
            'title' => 'تأجير السيارات الفاخرة',
            'sub_title' => 'سقف أو بدونه.سيارة مكشوفة أو كابريوليه /) هي سيارةركاب يمكن قيادتها مع وجودنموذجًا! سنفعل الدقة.التفاصيل الخاصة بك ، واختراملأ استفساراتنا ، وجدولة',

        ]);
        BannerSlideShowTranslation::create([
            'banner_slideshow_id' => 1,
            'locale' => 'fr',
            'title' => 'LOUER DES VOITURES DE LUXE',
            'sub_title' => 'Remplissez nos demandes, planifiez vos coordonnées et choisissez un modèle ! Nous ferons la résolution.',

        ]);
        BannerSlideShowTranslation::create([
            'banner_slideshow_id' => 1,
            'locale' => 'ru',
            'title' => 'АРЕНДА ЭКСКЛЮЗИВНЫХ АВТОМОБИЛЕЙ',
            'sub_title' => 'аполните наши запросы, запланируйте свои детали и выберите модель! Мы сделаем Res.',

        ]);

        BannerSlideShowTranslation::create([
            'banner_slideshow_id' => 2,
            'locale' => 'en',
            'title' => 'LUXURY CARS RENTAL IN DUBAI',
            'sub_title' => 'One of the Leading Luxury Car Rentals Best Deals in Dubai.',
        ]);
        BannerSlideShowTranslation::create([
            'banner_slideshow_id' => 2,
            'locale' => 'ar',
            'title' => 'تأجير قصر فاخر في دبي',
            'sub_title' => 'واحدة من أفضل الصفقاتالرائدة في تأجير السيارات الفاخرة في دبي.',
        ]);
        BannerSlideShowTranslation::create([
            'banner_slideshow_id' => 2,
            'locale' => 'fr',
            'title' => 'LOCATION CARS DE LUXE A DUBAÏ',
            'sub_title' => 'Lune des meilleures offres de location de voitures de luxe à Dubaï.',
        ]);
        BannerSlideShowTranslation::create([
            'banner_slideshow_id' => 2,
            'locale' => 'ru',
            'title' => 'РОСКОШНАЯ АРЕНДА CARS В ДУБАЕ',
            'sub_title' => 'Одно из лучших предложений по аренде роскошных автомобилей в Дубае.',
        ]);

        BannerSlideShowTranslation::create([
            'banner_slideshow_id' => 3,
            'locale' => 'en',
            'title' => 'HOW TO RENT A LUXURY CAR IN DUBAI?',
            'sub_title' => 'Fill In Our Inquiries, Schedule Your Details, And Pick A Model! Well Do The Res.',

        ]);
        BannerSlideShowTranslation::create([
            'banner_slideshow_id' => 3,
            'locale' => 'ar',
            'title' => 'كيف تستأجر سيارة فاخرة فيدبي؟',
            'sub_title' => 'املأ استفساراتنا ، وجدولةالتفاصيل الخاصة بك ، واخترنموذجًا! سنفعل الدقة.',

        ]);
        BannerSlideShowTranslation::create([
            'banner_slideshow_id' => 3,
            'locale' => 'fr',
            'title' => 'COMMENT LOUER UNE VOITURE DE LUXE A DUBAÏ ?',
            'sub_title' => 'Remplissez nos demandes, planifiez vos coordonnées et choisissez un modèle ! Nous ferons la résolution.',

        ]);
        BannerSlideShowTranslation::create([
            'banner_slideshow_id' => 3,
            'locale' => 'ru',
            'title' => 'КАК АРЕНДОВАТЬ РОСКОШНЫЙ АВТОМОБИЛЬ В ДУБАЕ?',
            'sub_title' => 'Заполните наши запросы, запланируйте свои детали и выберите модель! Мы сделаем Res.',

        ]);
    }
}
