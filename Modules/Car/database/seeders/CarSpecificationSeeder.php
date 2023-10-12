<?php

namespace Modules\Car\database\seeders;

use Illuminate\Database\Seeder;
use Modules\Car\Models\CarSpecification;
use Modules\Car\Models\CarSpecificationTranslation;

class CarSpecificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CarSpecification::create([
            'car_id' => 1,
            'icon_html' => '<img src="'.url('/').'/frontend/image/car_1.png" alt="" width="25" height="25">',
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 1,
            'locale' => 'en',
            'specification_title' => 'Coupe'
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 1,
            'locale' => 'ar',
            'specification_title' => 'كوبيه'
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 1,
            'locale' => 'fr',
            'specification_title' => 'Coupé'
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 1,
            'locale' => 'ru',
            'specification_title' => 'купе'
        ]);

        CarSpecification::create([
            'car_id' => 1,
            'icon_html' => '<img src="'.url('/').'/frontend/image/car_door_icon.png" alt="" width="23" height="20">',
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 2,
            'locale' => 'en',
            'specification_title' => '5 Doors'
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 2,
            'locale' => 'ar',
            'specification_title' => '5 ابواب'
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 2,
            'locale' => 'fr',
            'specification_title' => '5 portes'
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 2,
            'locale' => 'ru',
            'specification_title' => '5 дверей'
        ]);

        CarSpecification::create([
            'car_id' => 1,
            'icon_html' => '<img src="'.url('/').'/frontend/image/bag.png" alt="">',
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 3,
            'locale' => 'en',
            'specification_title' => '2 Bags'
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 3,
            'locale' => 'ar',
            'specification_title' => '2 كيس'
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 3,
            'locale' => 'fr',
            'specification_title' => '2 Sacs'
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 3,
            'locale' => 'ru',
            'specification_title' => '2 сумки'
        ]);

        CarSpecification::create([
            'car_id' => 1,
            'icon_html' => '<img src="'.url('/').'/frontend/image/car_door_icon.png" alt="" width="23" height="20">',
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 4,
            'locale' => 'en',
            'specification_title' => 'Auto Transmission'
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 4,
            'locale' => 'ar',
            'specification_title' => 'ناقل الحركة الأوتوماتيكي'
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 4,
            'locale' => 'fr',
            'specification_title' => 'Transmission automatique'
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 4,
            'locale' => 'ru',
            'specification_title' => 'Автоматическая коробка передач'
        ]);

        CarSpecification::create([
            'car_id' => 1,
            'icon_html' => '<img src="'.url('/').'/frontend/image/seats.png" alt="" width="19" height="22">',
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 5,
            'locale' => 'en',
            'specification_title' => '5 Seats'
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 5,
            'locale' => 'ar',
            'specification_title' => '5 مقاعد'
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 5,
            'locale' => 'fr',
            'specification_title' => '5 places'
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 5,
            'locale' => 'ru',
            'specification_title' => '5 мест'
        ]);

        CarSpecification::create([
            'car_id' => 1,
            'icon_html' => '<img src="'.url('/').'/frontend/image/right_icon.png" alt="">',
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 6,
            'locale' => 'en',
            'specification_title' => 'American specs: Yes'
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 6,
            'locale' => 'ar',
            'specification_title' => 'المواصفات الأمريكية: نعم'
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 6,
            'locale' => 'fr',
            'specification_title' => 'Spécifications américaines : Oui'
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 6,
            'locale' => 'ru',
            'specification_title' => 'Американские характеристики: Да'
        ]);

        CarSpecification::create([
            'car_id' => 2,
            'icon_html' => '<img src="'.url('/').'/frontend/image/car_1.png" alt="" width="25" height="25">',
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 7,
            'locale' => 'en',
            'specification_title' => 'Coupe'
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 7,
            'locale' => 'ar',
            'specification_title' => 'كوبيه'
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 7,
            'locale' => 'fr',
            'specification_title' => 'Coupé'
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 7,
            'locale' => 'ru',
            'specification_title' => 'купе'
        ]);


        CarSpecification::create([
            'car_id' => 2,
            'icon_html' => '<img src="'.url('/').'/frontend/image/car_door_icon.png" alt="" width="23" height="20">',
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 8,
            'locale' => 'en',
            'specification_title' => '5 Doors'
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 8,
            'locale' => 'ar',
            'specification_title' => '5 ابواب'
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 8,
            'locale' => 'fr',
            'specification_title' => '5 portes'
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 8,
            'locale' => 'ru',
            'specification_title' => '5 дверей'
        ]);

        CarSpecification::create([
            'car_id' => 2,
            'icon_html' => '<img src="'.url('/').'/frontend/image/bag.png" alt="">',
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 9,
            'locale' => 'en',
            'specification_title' => '2 Bags'
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 9,
            'locale' => 'ar',
            'specification_title' => '2 كيس'
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 9,
            'locale' => 'fr',
            'specification_title' => '2 Sacs'
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 9,
            'locale' => 'ru',
            'specification_title' => '2 сумки'
        ]);

        CarSpecification::create([
            'car_id' => 2,
            'icon_html' => '<img src="'.url('/').'/frontend/image/car_door_icon.png" alt="" width="23" height="20">',
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 10,
            'locale' => 'en',
            'specification_title' => 'Auto Transmission'
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 10,
            'locale' => 'ar',
            'specification_title' => 'ناقل الحركة الأوتوماتيكي'
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 10,
            'locale' => 'fr',
            'specification_title' => 'Transmission automatique'
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 10,
            'locale' => 'ru',
            'specification_title' => 'Автоматическая коробка передач'
        ]);


        CarSpecification::create([
            'car_id' => 2,
            'icon_html' => '<img src="'.url('/').'/frontend/image/seats.png" alt="" width="19" height="22">',
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 11,
            'locale' => 'en',
            'specification_title' => '5 Seats'
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 11,
            'locale' => 'ar',
            'specification_title' => '5 مقاعد'
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 11,
            'locale' => 'fr',
            'specification_title' => '5 places'
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 11,
            'locale' => 'ru',
            'specification_title' => '5 мест'
        ]);

        CarSpecification::create([
            'car_id' => 2,
            'icon_html' => '<img src="'.url('/').'/frontend/image/right_icon.png" alt="">',
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 12,
            'locale' => 'en',
            'specification_title' => 'American specs: Yes'
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 12,
            'locale' => 'ar',
            'specification_title' => 'المواصفات الأمريكية: نعم'
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 12,
            'locale' => 'fr',
            'specification_title' => 'Spécifications américaines : Oui'
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 12,
            'locale' => 'ru',
            'specification_title' => 'Американские характеристики: Да'
        ]);

        CarSpecification::create([
            'car_id' => 3,
            'icon_html' => '<img src="'.url('/').'/frontend/image/car_1.png" alt="" width="25" height="25">',
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 13,
            'locale' => 'en',
            'specification_title' => 'Coupe'
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 13,
            'locale' => 'ar',
            'specification_title' => 'كوبيه'
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 13,
            'locale' => 'fr',
            'specification_title' => 'Coupé'
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 13,
            'locale' => 'ru',
            'specification_title' => 'купе'
        ]);

        CarSpecification::create([
            'car_id' => 3,
            'icon_html' => '<img src="'.url('/').'/frontend/image/car_door_icon.png" alt="" width="23" height="20">',
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 14,
            'locale' => 'en',
            'specification_title' => '5 Doors'
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 14,
            'locale' => 'ar',
            'specification_title' => '5 ابواب'
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 14,
            'locale' => 'fr',
            'specification_title' => '5 portes'
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 14,
            'locale' => 'ru',
            'specification_title' => '5 дверей'
        ]);


        CarSpecification::create([
            'car_id' => 3,
            'icon_html' => '<img src="'.url('/').'/frontend/image/bag.png" alt="">',
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 15,
            'locale' => 'en',
            'specification_title' => '2 Bags'
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 15,
            'locale' => 'ar',
            'specification_title' => '2 كيس'
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 15,
            'locale' => 'fr',
            'specification_title' => '2 Sacs'
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 15,
            'locale' => 'ru',
            'specification_title' => '2 сумки'
        ]);

        CarSpecification::create([
            'car_id' => 3,
            'icon_html' => '<img src="'.url('/').'/frontend/image/car_door_icon.png" alt="" width="23" height="20">',
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 16,
            'locale' => 'en',
            'specification_title' => 'Auto Transmission'
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 16,
            'locale' => 'ar',
            'specification_title' => 'ناقل الحركة الأوتوماتيكي'
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 16,
            'locale' => 'fr',
            'specification_title' => 'Transmission automatique'
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 16,
            'locale' => 'ru',
            'specification_title' => 'Автоматическая коробка передач'
        ]);

        CarSpecification::create([
            'car_id' => 3,
            'icon_html' => '<img src="'.url('/').'/frontend/image/seats.png" alt="" width="19" height="22">',
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 17,
            'locale' => 'en',
            'specification_title' => '5 Seats'
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 17,
            'locale' => 'ar',
            'specification_title' => '5 مقاعد'
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 17,
            'locale' => 'fr',
            'specification_title' => '5 places'
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 17,
            'locale' => 'ru',
            'specification_title' => '5 мест'
        ]);

        CarSpecification::create([
            'car_id' => 3,
            'icon_html' => '<img src="'.url('/').'/frontend/image/right_icon.png" alt="">',
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 18,
            'locale' => 'en',
            'specification_title' => 'American specs: Yes'
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 18,
            'locale' => 'ar',
            'specification_title' => 'المواصفات الأمريكية: نعم'
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 18,
            'locale' => 'fr',
            'specification_title' => 'Spécifications américaines : Oui'
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 18,
            'locale' => 'ru',
            'specification_title' => 'Американские характеристики: Да'
        ]);

        CarSpecification::create([
            'car_id' => 4,
            'icon_html' => '<img src="'.url('/').'/frontend/image/car_1.png" alt="" width="25" height="25">',
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 19,
            'locale' => 'en',
            'specification_title' => 'Coupe'
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 19,
            'locale' => 'ar',
            'specification_title' => 'كوبيه'
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 19,
            'locale' => 'fr',
            'specification_title' => 'Coupé'
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 19,
            'locale' => 'ru',
            'specification_title' => 'купе'
        ]);

        CarSpecification::create([
            'car_id' => 4,
            'icon_html' => '<img src="'.url('/').'/frontend/image/car_door_icon.png" alt="" width="23" height="20">',
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 20,
            'locale' => 'en',
            'specification_title' => '5 Doors'
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 20,
            'locale' => 'ar',
            'specification_title' => '5 ابواب'
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 20,
            'locale' => 'fr',
            'specification_title' => '5 portes'
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 20,
            'locale' => 'ru',
            'specification_title' => '5 дверей'
        ]);

        CarSpecification::create([
            'car_id' => 4,
            'icon_html' => '<img src="'.url('/').'/frontend/image/bag.png" alt="">',
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 21,
            'locale' => 'en',
            'specification_title' => '2 Bags'
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 21,
            'locale' => 'ar',
            'specification_title' => '2 كيس'
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 21,
            'locale' => 'fr',
            'specification_title' => '2 Sacs'
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 21,
            'locale' => 'ru',
            'specification_title' => '2 сумки'
        ]);

        CarSpecification::create([
            'car_id' => 4,
            'icon_html' => '<img src="'.url('/').'/frontend/image/car_door_icon.png" alt="" width="23" height="20">',
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 22,
            'locale' => 'en',
            'specification_title' => 'Auto Transmission'
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 22,
            'locale' => 'ar',
            'specification_title' => 'المواصفات الأمريكية: نعم'
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 22,
            'locale' => 'fr',
            'specification_title' => 'Spécifications américaines : Oui'
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 22,
            'locale' => 'ru',
            'specification_title' => 'Американские характеристики: Да'
        ]);

        CarSpecification::create([
            'car_id' => 4,
            'icon_html' => '<img src="'.url('/').'/frontend/image/seats.png" alt="" width="19" height="22">',
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 23,
            'locale' => 'en',
            'specification_title' => '5 Seats'
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 23,
            'locale' => 'ar',
            'specification_title' => '5 مقاعد'
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 23,
            'locale' => 'fr',
            'specification_title' => '5 places'
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 23,
            'locale' => 'ru',
            'specification_title' => '5 мест'
        ]);

        CarSpecification::create([
            'car_id' => 4,
            'icon_html' => '<img src="'.url('/').'/frontend/image/right_icon.png" alt="">',
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 24,
            'locale' => 'en',
            'specification_title' => 'American specs: Yes'
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 24,
            'locale' => 'ar',
            'specification_title' => 'المواصفات الأمريكية: نعم'
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 24,
            'locale' => 'fr',
            'specification_title' => 'Spécifications américaines : Oui'
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 24,
            'locale' => 'ru',
            'specification_title' => 'Американские характеристики: Да'
        ]);

        CarSpecification::create([
            'car_id' => 5,
            'icon_html' => '<img src="'.url('/').'/frontend/image/car_1.png" alt="" width="25" height="25">',
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 25,
            'locale' => 'en',
            'specification_title' => 'Coupe'
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 25,
            'locale' => 'ar',
            'specification_title' => 'كوبيه'
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 25,
            'locale' => 'fr',
            'specification_title' => 'Coupé'
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 25,
            'locale' => 'ru',
            'specification_title' => 'купе'
        ]);

        CarSpecification::create([
            'car_id' => 5,
            'icon_html' => '<img src="'.url('/').'/frontend/image/car_door_icon.png" alt="" width="23" height="20">',
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 26,
            'locale' => 'en',
            'specification_title' => '5 Doors'
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 26,
            'locale' => 'ar',
            'specification_title' => '5 ابواب'
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 26,
            'locale' => 'fr',
            'specification_title' => '5 portes'
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 26,
            'locale' => 'ru',
            'specification_title' => '5 дверей'
        ]);

        CarSpecification::create([
            'car_id' => 5,
            'icon_html' => '<img src="'.url('/').'/frontend/image/bag.png" alt="">',
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 27,
            'locale' => 'en',
            'specification_title' => '2 Bags'
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 27,
            'locale' => 'ar',
            'specification_title' => '2 كيس'
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 27,
            'locale' => 'fr',
            'specification_title' => '2 Sacs'
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 27,
            'locale' => 'ru',
            'specification_title' => '2 сумки'
        ]);

        CarSpecification::create([
            'car_id' => 5,
            'icon_html' => '<img src="'.url('/').'/frontend/image/car_door_icon.png" alt="" width="23" height="20">',
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 28,
            'locale' => 'en',
            'specification_title' => 'Auto Transmission'
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 28,
            'locale' => 'ar',
            'specification_title' => 'المواصفات الأمريكية: نعم'
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 28,
            'locale' => 'fr',
            'specification_title' => 'Spécifications américaines : Oui'
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 28,
            'locale' => 'ru',
            'specification_title' => 'Американские характеристики: Да'
        ]);

        CarSpecification::create([
            'car_id' => 5,
            'icon_html' => '<img src="'.url('/').'/frontend/image/seats.png" alt="" width="19" height="22">',
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 29,
            'locale' => 'en',
            'specification_title' => '5 Seats'
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 29,
            'locale' => 'ar',
            'specification_title' => '5 مقاعد'
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 29,
            'locale' => 'fr',
            'specification_title' => '5 places'
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 29,
            'locale' => 'ru',
            'specification_title' => '5 мест'
        ]);

        CarSpecification::create([
            'car_id' => 5,
            'icon_html' => '<img src="'.url('/').'/frontend/image/right_icon.png" alt="">',
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 30,
            'locale' => 'en',
            'specification_title' => 'American specs: Yes'
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 30,
            'locale' => 'ar',
            'specification_title' => 'المواصفات الأمريكية: نعم'
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 30,
            'locale' => 'fr',
            'specification_title' => 'Spécifications américaines : Oui'
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 30,
            'locale' => 'ru',
            'specification_title' => 'Американские характеристики: Да'
        ]);

        CarSpecification::create([
            'car_id' => 6,
            'icon_html' => '<img src="'.url('/').'/frontend/image/car_1.png" alt="" width="25" height="25">',
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 31,
            'locale' => 'en',
            'specification_title' => 'Coupe'
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 31,
            'locale' => 'ar',
            'specification_title' => 'كوبيه'
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 31,
            'locale' => 'fr',
            'specification_title' => 'Coupé'
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 31,
            'locale' => 'ru',
            'specification_title' => 'купе'
        ]);

        CarSpecification::create([
            'car_id' => 6,
            'icon_html' => '<img src="'.url('/').'/frontend/image/car_door_icon.png" alt="" width="23" height="20">',
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 32,
            'locale' => 'en',
            'specification_title' => '5 Doors'
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 32,
            'locale' => 'ar',
            'specification_title' => '5 ابواب'
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 32,
            'locale' => 'fr',
            'specification_title' => '5 portes'
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 32,
            'locale' => 'ru',
            'specification_title' => '5 дверей'
        ]);

        CarSpecification::create([
            'car_id' => 6,
            'icon_html' => '<img src="'.url('/').'/frontend/image/bag.png" alt="">',
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 33,
            'locale' => 'en',
            'specification_title' => '2 Bags'
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 33,
            'locale' => 'ar',
            'specification_title' => '2 كيس'
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 33,
            'locale' => 'fr',
            'specification_title' => '2 Sacs'
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 33,
            'locale' => 'ru',
            'specification_title' => '2 сумки'
        ]);

        CarSpecification::create([
            'car_id' => 6,
            'icon_html' => '<img src="'.url('/').'/frontend/image/car_door_icon.png" alt="" width="23" height="20">',
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 34,
            'locale' => 'en',
            'specification_title' => 'Auto Transmission'
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 34,
            'locale' => 'ar',
            'specification_title' => 'المواصفات الأمريكية: نعم'
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 34,
            'locale' => 'fr',
            'specification_title' => 'Spécifications américaines : Oui'
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 34,
            'locale' => 'ru',
            'specification_title' => 'Американские характеристики: Да'
        ]);

        CarSpecification::create([
            'car_id' => 6,
            'icon_html' => '<img src="'.url('/').'/frontend/image/seats.png" alt="" width="19" height="22">',
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 35,
            'locale' => 'en',
            'specification_title' => '5 Seats'
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 35,
            'locale' => 'ar',
            'specification_title' => '5 مقاعد'
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 35,
            'locale' => 'fr',
            'specification_title' => '5 places'
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 35,
            'locale' => 'ru',
            'specification_title' => '5 мест'
        ]);

        CarSpecification::create([
            'car_id' => 6,
            'icon_html' => '<img src="'.url('/').'/frontend/image/right_icon.png" alt="">',
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 36,
            'locale' => 'en',
            'specification_title' => 'American specs: Yes'
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 36,
            'locale' => 'ar',
            'specification_title' => 'المواصفات الأمريكية: نعم'
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 36,
            'locale' => 'fr',
            'specification_title' => 'Spécifications américaines : Oui'
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 36,
            'locale' => 'ru',
            'specification_title' => 'Американские характеристики: Да'
        ]);

        CarSpecification::create([
            'car_id' => 7,
            'icon_html' => '<img src="'.url('/').'/frontend/image/car_1.png" alt="" width="25" height="25">',
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 37,
            'locale' => 'en',
            'specification_title' => 'Coupe'
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 37,
            'locale' => 'ar',
            'specification_title' => 'كوبيه'
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 37,
            'locale' => 'fr',
            'specification_title' => 'Coupé'
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 37,
            'locale' => 'ru',
            'specification_title' => 'купе'
        ]);

        CarSpecification::create([
            'car_id' => 7,
            'icon_html' => '<img src="'.url('/').'/frontend/image/car_door_icon.png" alt="" width="23" height="20">',
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 38,
            'locale' => 'en',
            'specification_title' => '5 Doors'
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 38,
            'locale' => 'ar',
            'specification_title' => '5 ابواب'
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 38,
            'locale' => 'fr',
            'specification_title' => '5 portes'
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 38,
            'locale' => 'ru',
            'specification_title' => '5 дверей'
        ]);

        CarSpecification::create([
            'car_id' => 7,
            'icon_html' => '<img src="'.url('/').'/frontend/image/bag.png" alt="">',
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 39,
            'locale' => 'en',
            'specification_title' => '2 Bags'
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 39,
            'locale' => 'ar',
            'specification_title' => '2 كيس'
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 39,
            'locale' => 'fr',
            'specification_title' => '2 Sacs'
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 39,
            'locale' => 'ru',
            'specification_title' => '2 сумки'
        ]);

        CarSpecification::create([
            'car_id' => 7,
            'icon_html' => '<img src="'.url('/').'/frontend/image/car_door_icon.png" alt="" width="23" height="20">',
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 40,
            'locale' => 'en',
            'specification_title' => 'Auto Transmission'
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 40,
            'locale' => 'ar',
            'specification_title' => 'المواصفات الأمريكية: نعم'
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 40,
            'locale' => 'fr',
            'specification_title' => 'Spécifications américaines : Oui'
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 40,
            'locale' => 'ru',
            'specification_title' => 'Американские характеристики: Да'
        ]);

        CarSpecification::create([
            'car_id' => 7,
            'icon_html' => '<img src="'.url('/').'/frontend/image/seats.png" alt="" width="19" height="22">',
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 41,
            'locale' => 'en',
            'specification_title' => '5 Seats'
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 41,
            'locale' => 'ar',
            'specification_title' => '5 مقاعد'
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 41,
            'locale' => 'fr',
            'specification_title' => '5 places'
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 41,
            'locale' => 'ru',
            'specification_title' => '5 мест'
        ]);


        CarSpecification::create([
            'car_id' => 7,
            'icon_html' => '<img src="'.url('/').'/frontend/image/right_icon.png" alt="">',
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 42,
            'locale' => 'en',
            'specification_title' => 'American specs: Yes'
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 42,
            'locale' => 'ar',
            'specification_title' => 'المواصفات الأمريكية: نعم'
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 42,
            'locale' => 'fr',
            'specification_title' => 'Spécifications américaines : Oui'
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 42,
            'locale' => 'ru',
            'specification_title' => 'Американские характеристики: Да'
        ]);

        CarSpecification::create([
            'car_id' => 8,
            'icon_html' => '<img src="'.url('/').'/frontend/image/car_1.png" alt="" width="25" height="25">',
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 43,
            'locale' => 'en',
            'specification_title' => 'Coupe'
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 43,
            'locale' => 'ar',
            'specification_title' => 'كوبيه'
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 43,
            'locale' => 'fr',
            'specification_title' => 'Coupé'
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 43,
            'locale' => 'ru',
            'specification_title' => 'купе'
        ]);

        CarSpecification::create([
            'car_id' => 8,
            'icon_html' => '<img src="'.url('/').'/frontend/image/car_door_icon.png" alt="" width="23" height="20">',
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 44,
            'locale' => 'en',
            'specification_title' => '5 Doors'
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 44,
            'locale' => 'ar',
            'specification_title' => '5 ابواب'
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 44,
            'locale' => 'fr',
            'specification_title' => '5 portes'
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 44,
            'locale' => 'ru',
            'specification_title' => '5 дверей'
        ]);

        CarSpecification::create([
            'car_id' => 8,
            'icon_html' => '<img src="'.url('/').'/frontend/image/bag.png" alt="">',
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 45,
            'locale' => 'en',
            'specification_title' => '2 Bags'
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 45,
            'locale' => 'ar',
            'specification_title' => '2 كيس'
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 45,
            'locale' => 'fr',
            'specification_title' => '2 Sacs'
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 45,
            'locale' => 'ru',
            'specification_title' => '2 сумки'
        ]);

        CarSpecification::create([
            'car_id' => 8,
            'icon_html' => '<img src="'.url('/').'/frontend/image/car_door_icon.png" alt="" width="23" height="20">',
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 46,
            'locale' => 'en',
            'specification_title' => 'Auto Transmission'
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 46,
            'locale' => 'ar',
            'specification_title' => 'المواصفات الأمريكية: نعم'
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 46,
            'locale' => 'fr',
            'specification_title' => 'Spécifications américaines : Oui'
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 46,
            'locale' => 'ru',
            'specification_title' => 'Американские характеристики: Да'
        ]);

        CarSpecification::create([
            'car_id' => 8,
            'icon_html' => '<img src="'.url('/').'/frontend/image/seats.png" alt="" width="19" height="22">',
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 47,
            'locale' => 'en',
            'specification_title' => '5 Seats'
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 47,
            'locale' => 'ar',
            'specification_title' => '5 مقاعد'
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 47,
            'locale' => 'fr',
            'specification_title' => '5 places'
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 47,
            'locale' => 'ru',
            'specification_title' => '5 мест'
        ]);

        CarSpecification::create([
            'car_id' => 8,
            'icon_html' => '<img src="'.url('/').'/frontend/image/right_icon.png" alt="">',
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 48,
            'locale' => 'en',
            'specification_title' => 'American specs: Yes'
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 48,
            'locale' => 'ar',
            'specification_title' => 'المواصفات الأمريكية: نعم'
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 48,
            'locale' => 'fr',
            'specification_title' => 'Spécifications américaines : Oui'
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 48,
            'locale' => 'ru',
            'specification_title' => 'Американские характеристики: Да'
        ]);

        CarSpecification::create([
            'car_id' => 9,
            'icon_html' => '<img src="'.url('/').'/frontend/image/car_1.png" alt="" width="25" height="25">',
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 49,
            'locale' => 'en',
            'specification_title' => 'Coupe'
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 49,
            'locale' => 'ar',
            'specification_title' => 'كوبيه'
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 49,
            'locale' => 'fr',
            'specification_title' => 'Coupé'
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 49,
            'locale' => 'ru',
            'specification_title' => 'купе'
        ]);

        CarSpecification::create([
            'car_id' => 9,
            'icon_html' => '<img src="'.url('/').'/frontend/image/car_door_icon.png" alt="" width="23" height="20">',
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 50,
            'locale' => 'en',
            'specification_title' => '5 Doors'
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 50,
            'locale' => 'ar',
            'specification_title' => '5 ابواب'
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 50,
            'locale' => 'fr',
            'specification_title' => '5 portes'
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 50,
            'locale' => 'ru',
            'specification_title' => '5 дверей'
        ]);

        CarSpecification::create([
            'car_id' => 9,
            'icon_html' => '<img src="'.url('/').'/frontend/image/bag.png" alt="">',
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 51,
            'locale' => 'en',
            'specification_title' => '2 Bags'
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 51,
            'locale' => 'ar',
            'specification_title' => '2 كيس'
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 51,
            'locale' => 'fr',
            'specification_title' => '2 Sacs'
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 51,
            'locale' => 'ru',
            'specification_title' => '2 сумки'
        ]);

        CarSpecification::create([
            'car_id' => 9,
            'icon_html' => '<img src="'.url('/').'/frontend/image/car_door_icon.png" alt="" width="23" height="20">',
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 52,
            'locale' => 'en',
            'specification_title' => 'Auto Transmission'
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 52,
            'locale' => 'ar',
            'specification_title' => 'المواصفات الأمريكية: نعم'
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 52,
            'locale' => 'fr',
            'specification_title' => 'Spécifications américaines : Oui'
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 52,
            'locale' => 'ru',
            'specification_title' => 'Американские характеристики: Да'
        ]);

        CarSpecification::create([
            'car_id' => 9,
            'icon_html' => '<img src="'.url('/').'/frontend/image/seats.png" alt="" width="19" height="22">',
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 53,
            'locale' => 'en',
            'specification_title' => '5 Seats'
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 53,
            'locale' => 'ar',
            'specification_title' => '5 مقاعد'
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 53,
            'locale' => 'fr',
            'specification_title' => '5 places'
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 53,
            'locale' => 'ru',
            'specification_title' => '5 мест'
        ]);


        CarSpecification::create([
            'car_id' => 9,
            'icon_html' => '<img src="'.url('/').'/frontend/image/right_icon.png" alt="">',
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 54,
            'locale' => 'en',
            'specification_title' => 'American specs: Yes'
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 54,
            'locale' => 'ar',
            'specification_title' => 'المواصفات الأمريكية: نعم'
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 54,
            'locale' => 'fr',
            'specification_title' => 'Spécifications américaines : Oui'
        ]);
        CarSpecificationTranslation::create([
            'car_specification_id' => 54,
            'locale' => 'ru',
            'specification_title' => 'Американские характеристики: Да'
        ]);
    }
}
