<?php

namespace Modules\Car\database\seeders;

use Illuminate\Database\Seeder;
use Modules\Car\Models\CarRentalInclude;
use Modules\Car\Models\CarRentalIncludeTranslation;

class CarRentalIncludeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CarRentalInclude::create([
            'car_id' => 1,
        ]);
        CarRentalIncludeTranslation::create([
            'car_rental_include_id' => 1,
            'locale' => 'en',
            'key' => 'Insurance',
            'value' => 'Basic Comprehensive'
        ]);
        CarRentalIncludeTranslation::create([
            'car_rental_include_id' => 1,
            'locale' => 'ar',
            'key' => 'تأمين',
            'value' => 'أساسي شامل'
        ]);
        CarRentalIncludeTranslation::create([
            'car_rental_include_id' => 1,
            'locale' => 'fr',
            'key' => 'Assurance',
            'value' => 'De base Complet'
        ]);
        CarRentalIncludeTranslation::create([
            'car_rental_include_id' => 1,
            'locale' => 'ru',
            'key' => 'Страхование',
            'value' => 'Базовый Комплексный'
        ]);
        CarRentalInclude::create([
            'car_id' => 1,
        ]);
        CarRentalIncludeTranslation::create([
            'car_rental_include_id' => 2,
            'locale' => 'en',
            'key' => 'Extras',
            'value' => 'Asds'
        ]);
        CarRentalIncludeTranslation::create([
            'car_rental_include_id' => 2,
            'locale' => 'ar',
            'key' => 'إضافات',
            'value' => 'أسد'
        ]);
        CarRentalIncludeTranslation::create([
            'car_rental_include_id' => 2,
            'locale' => 'fr',
            'key' => 'Suppléments',
            'value' => 'ADD'
        ]);
        CarRentalIncludeTranslation::create([
            'car_rental_include_id' => 2,
            'locale' => 'ru',
            'key' => 'Дополнительно',
            'value' => 'Асдс'
        ]);
        CarRentalInclude::create([
            'car_id' => 1,
        ]);
        CarRentalIncludeTranslation::create([
            'car_rental_include_id' => 3,
            'locale' => 'en',
            'key' => 'Additional mileage charge',
            'value' => 'AED 10 / Km'
        ]);
        CarRentalIncludeTranslation::create([
            'car_rental_include_id' => 3,
            'locale' => 'ar',
            'key' => 'رسوم الأميال الإضافية',
            'value' => '10 AED / كم '
        ]);
        CarRentalIncludeTranslation::create([
            'car_rental_include_id' => 3,
            'locale' => 'fr',
            'key' => 'Frais kilométriques supplémentaires',
            'value' => 'AED 10/Km'
        ]);
        CarRentalIncludeTranslation::create([
            'car_rental_include_id' => 3,
            'locale' => 'ru',
            'key' => 'Доплата за километраж',
            'value' => 'AED 10/км'
        ]);
        CarRentalInclude::create([
            'car_id' => 1,
        ]);
        CarRentalIncludeTranslation::create([
            'car_rental_include_id' => 4,
            'locale' => 'en',
            'key' => 'Salik / Toll Charges',
            'value' => 'AED 5'
        ]);
        CarRentalIncludeTranslation::create([
            'car_rental_include_id' => 4,
            'locale' => 'ar',
            'key' => 'سالك / رسوم التعرفة',
            'value' => 'AED 5'
        ]);
        CarRentalIncludeTranslation::create([
            'car_rental_include_id' => 4,
            'locale' => 'fr',
            'key' => 'Salik / Frais de péage',
            'value' => 'AED 5'
        ]);
        CarRentalIncludeTranslation::create([
            'car_rental_include_id' => 4,
            'locale' => 'ru',
            'key' => 'Салик / Плата за проезд',
            'value' => 'AED 5'
        ]);

        CarRentalInclude::create([
            'car_id' => 2,
        ]);
        CarRentalIncludeTranslation::create([
            'car_rental_include_id' => 5,
            'locale' => 'en',
            'key' => 'Insurance',
            'value' => 'Basic Comprehensive'
        ]);
        CarRentalIncludeTranslation::create([
            'car_rental_include_id' => 5,
            'locale' => 'ar',
            'key' => 'تأمين',
            'value' => 'أساسي شامل'
        ]);
        CarRentalIncludeTranslation::create([
            'car_rental_include_id' => 5,
            'locale' => 'fr',
            'key' => 'Assurance',
            'value' => 'De base Complet'
        ]);
        CarRentalIncludeTranslation::create([
            'car_rental_include_id' => 5,
            'locale' => 'ru',
            'key' => 'Страхование',
            'value' => 'Базовый Комплексный'
        ]);
        CarRentalInclude::create([
            'car_id' => 2,
        ]);
        CarRentalIncludeTranslation::create([
            'car_rental_include_id' => 6,
            'locale' => 'en',
            'key' => 'Extras',
            'value' => 'Asds'
        ]);
        CarRentalIncludeTranslation::create([
            'car_rental_include_id' => 6,
            'locale' => 'ar',
            'key' => 'إضافات',
            'value' => 'أسد'
        ]);
        CarRentalIncludeTranslation::create([
            'car_rental_include_id' => 6,
            'locale' => 'fr',
            'key' => 'Suppléments',
            'value' => 'ADD'
        ]);
        CarRentalIncludeTranslation::create([
            'car_rental_include_id' => 6,
            'locale' => 'ru',
            'key' => 'Дополнительно',
            'value' => 'Асдс'
        ]);
        CarRentalInclude::create([
            'car_id' => 2,
        ]);
        CarRentalIncludeTranslation::create([
            'car_rental_include_id' => 7,
            'locale' => 'en',
            'key' => 'Additional mileage charge',
            'value' => 'AED 10 / Km'
        ]);
        CarRentalIncludeTranslation::create([
            'car_rental_include_id' => 7,
            'locale' => 'ar',
            'key' => 'رسوم الأميال الإضافية',
            'value' => '10 AED / كم '
        ]);
        CarRentalIncludeTranslation::create([
            'car_rental_include_id' => 7,
            'locale' => 'fr',
            'key' => 'Frais kilométriques supplémentaires',
            'value' => 'AED 10/Km'
        ]);
        CarRentalIncludeTranslation::create([
            'car_rental_include_id' => 7,
            'locale' => 'ru',
            'key' => 'Доплата за километраж',
            'value' => 'AED 10/км'
        ]);
        CarRentalInclude::create([
            'car_id' => 2,
        ]);
        CarRentalIncludeTranslation::create([
            'car_rental_include_id' => 8,
            'locale' => 'en',
            'key' => 'Salik / Toll Charges',
            'value' => 'AED 5'
        ]);
        CarRentalIncludeTranslation::create([
            'car_rental_include_id' => 8,
            'locale' => 'ar',
            'key' => 'سالك / رسوم التعرفة',
            'value' => 'AED 5'
        ]);
        CarRentalIncludeTranslation::create([
            'car_rental_include_id' => 8,
            'locale' => 'fr',
            'key' => 'Salik / Frais de péage',
            'value' => 'AED 5'
        ]);
        CarRentalIncludeTranslation::create([
            'car_rental_include_id' => 8,
            'locale' => 'ru',
            'key' => 'Салик / Плата за проезд',
            'value' => 'AED 5'
        ]);

        CarRentalInclude::create([
            'car_id' => 3,
        ]);
        CarRentalIncludeTranslation::create([
            'car_rental_include_id' => 9,
            'locale' => 'en',
            'key' => 'Insurance',
            'value' => 'Basic Comprehensive'
        ]);
        CarRentalIncludeTranslation::create([
            'car_rental_include_id' => 9,
            'locale' => 'ar',
            'key' => 'تأمين',
            'value' => 'أساسي شامل'
        ]);
        CarRentalIncludeTranslation::create([
            'car_rental_include_id' => 9,
            'locale' => 'fr',
            'key' => 'Assurance',
            'value' => 'De base Complet'
        ]);
        CarRentalIncludeTranslation::create([
            'car_rental_include_id' => 9,
            'locale' => 'ru',
            'key' => 'Страхование',
            'value' => 'Базовый Комплексный'
        ]);
        CarRentalInclude::create([
            'car_id' => 3,
        ]);
        CarRentalIncludeTranslation::create([
            'car_rental_include_id' => 10,
            'locale' => 'en',
            'key' => 'Extras',
            'value' => 'Asds'
        ]);
        CarRentalIncludeTranslation::create([
            'car_rental_include_id' => 10,
            'locale' => 'ar',
            'key' => 'إضافات',
            'value' => 'أسد'
        ]);
        CarRentalIncludeTranslation::create([
            'car_rental_include_id' => 10,
            'locale' => 'fr',
            'key' => 'Suppléments',
            'value' => 'ADD'
        ]);
        CarRentalIncludeTranslation::create([
            'car_rental_include_id' => 10,
            'locale' => 'ru',
            'key' => 'Дополнительно',
            'value' => 'Асдс'
        ]);
        CarRentalInclude::create([
            'car_id' => 3,
        ]);
        CarRentalIncludeTranslation::create([
            'car_rental_include_id' => 11,
            'locale' => 'en',
            'key' => 'Additional mileage charge',
            'value' => 'AED 10 / Km'
        ]);
        CarRentalIncludeTranslation::create([
            'car_rental_include_id' => 11,
            'locale' => 'ar',
            'key' => 'رسوم الأميال الإضافية',
            'value' => '10 AED / كم '
        ]);
        CarRentalIncludeTranslation::create([
            'car_rental_include_id' => 11,
            'locale' => 'fr',
            'key' => 'Frais kilométriques supplémentaires',
            'value' => 'AED 10/Km'
        ]);
        CarRentalIncludeTranslation::create([
            'car_rental_include_id' => 11,
            'locale' => 'ru',
            'key' => 'Доплата за километраж',
            'value' => 'AED 10/км'
        ]);
        CarRentalInclude::create([
            'car_id' => 3,
        ]);
        CarRentalIncludeTranslation::create([
            'car_rental_include_id' => 12,
            'locale' => 'en',
            'key' => 'Salik / Toll Charges',
            'value' => 'AED 5'
        ]);
        CarRentalIncludeTranslation::create([
            'car_rental_include_id' => 12,
            'locale' => 'ar',
            'key' => 'سالك / رسوم التعرفة',
            'value' => 'AED 5'
        ]);
        CarRentalIncludeTranslation::create([
            'car_rental_include_id' => 12,
            'locale' => 'fr',
            'key' => 'Salik / Frais de péage',
            'value' => 'AED 5'
        ]);
        CarRentalIncludeTranslation::create([
            'car_rental_include_id' => 12,
            'locale' => 'ru',
            'key' => 'Салик / Плата за проезд',
            'value' => 'AED 5'
        ]);

        CarRentalInclude::create([
            'car_id' => 4,
        ]);
        CarRentalIncludeTranslation::create([
            'car_rental_include_id' => 13,
            'locale' => 'en',
            'key' => 'Insurance',
            'value' => 'Basic Comprehensive'
        ]);
        CarRentalIncludeTranslation::create([
            'car_rental_include_id' => 13,
            'locale' => 'ar',
            'key' => 'تأمين',
            'value' => 'أساسي شامل'
        ]);
        CarRentalIncludeTranslation::create([
            'car_rental_include_id' => 13,
            'locale' => 'fr',
            'key' => 'Assurance',
            'value' => 'De base Complet'
        ]);
        CarRentalIncludeTranslation::create([
            'car_rental_include_id' => 13,
            'locale' => 'ru',
            'key' => 'Страхование',
            'value' => 'Базовый Комплексный'
        ]);
        CarRentalInclude::create([
            'car_id' => 4,
        ]);
        CarRentalIncludeTranslation::create([
            'car_rental_include_id' => 14,
            'locale' => 'en',
            'key' => 'Extras',
            'value' => 'Asds'
        ]);
        CarRentalIncludeTranslation::create([
            'car_rental_include_id' => 14,
            'locale' => 'ar',
            'key' => 'إضافات',
            'value' => 'أسد'
        ]);
        CarRentalIncludeTranslation::create([
            'car_rental_include_id' => 14,
            'locale' => 'fr',
            'key' => 'Suppléments',
            'value' => 'ADD'
        ]);
        CarRentalIncludeTranslation::create([
            'car_rental_include_id' => 14,
            'locale' => 'ru',
            'key' => 'Дополнительно',
            'value' => 'Асдс'
        ]);
        CarRentalInclude::create([
            'car_id' => 4,
        ]);
        CarRentalIncludeTranslation::create([
            'car_rental_include_id' => 15,
            'locale' => 'en',
            'key' => 'Additional mileage charge',
            'value' => 'AED 10 / Km'
        ]);
        CarRentalIncludeTranslation::create([
            'car_rental_include_id' => 15,
            'locale' => 'ar',
            'key' => 'رسوم الأميال الإضافية',
            'value' => '10 AED / كم '
        ]);
        CarRentalIncludeTranslation::create([
            'car_rental_include_id' => 15,
            'locale' => 'fr',
            'key' => 'Frais kilométriques supplémentaires',
            'value' => 'AED 10/Km'
        ]);
        CarRentalIncludeTranslation::create([
            'car_rental_include_id' => 15,
            'locale' => 'ru',
            'key' => 'Доплата за километраж',
            'value' => 'AED 10/км'
        ]);
        CarRentalInclude::create([
            'car_id' => 4,
        ]);
        CarRentalIncludeTranslation::create([
            'car_rental_include_id' => 16,
            'locale' => 'en',
            'key' => 'Salik / Toll Charges',
            'value' => 'AED 5'
        ]);
        CarRentalIncludeTranslation::create([
            'car_rental_include_id' => 16,
            'locale' => 'ar',
            'key' => 'سالك / رسوم التعرفة',
            'value' => 'AED 5'
        ]);
        CarRentalIncludeTranslation::create([
            'car_rental_include_id' => 16,
            'locale' => 'fr',
            'key' => 'Salik / Frais de péage',
            'value' => 'AED 5'
        ]);
        CarRentalIncludeTranslation::create([
            'car_rental_include_id' => 16,
            'locale' => 'ru',
            'key' => 'Салик / Плата за проезд',
            'value' => 'AED 5'
        ]);

        CarRentalInclude::create([
            'car_id' => 5,
        ]);
        CarRentalIncludeTranslation::create([
            'car_rental_include_id' => 17,
            'locale' => 'en',
            'key' => 'Insurance',
            'value' => 'Basic Comprehensive'
        ]);
        CarRentalIncludeTranslation::create([
            'car_rental_include_id' => 17,
            'locale' => 'ar',
            'key' => 'تأمين',
            'value' => 'أساسي شامل'
        ]);
        CarRentalIncludeTranslation::create([
            'car_rental_include_id' => 17,
            'locale' => 'fr',
            'key' => 'Assurance',
            'value' => 'De base Complet'
        ]);
        CarRentalIncludeTranslation::create([
            'car_rental_include_id' => 17,
            'locale' => 'ru',
            'key' => 'Страхование',
            'value' => 'Базовый Комплексный'
        ]);
        CarRentalInclude::create([
            'car_id' => 5,
        ]);
        CarRentalIncludeTranslation::create([
            'car_rental_include_id' => 18,
            'locale' => 'en',
            'key' => 'Extras',
            'value' => 'Asds'
        ]);
        CarRentalIncludeTranslation::create([
            'car_rental_include_id' => 18,
            'locale' => 'ar',
            'key' => 'إضافات',
            'value' => 'أسد'
        ]);
        CarRentalIncludeTranslation::create([
            'car_rental_include_id' => 18,
            'locale' => 'fr',
            'key' => 'Suppléments',
            'value' => 'ADD'
        ]);
        CarRentalIncludeTranslation::create([
            'car_rental_include_id' => 18,
            'locale' => 'ru',
            'key' => 'Дополнительно',
            'value' => 'Асдс'
        ]);
        CarRentalInclude::create([
            'car_id' => 5,
        ]);
        CarRentalIncludeTranslation::create([
            'car_rental_include_id' => 19,
            'locale' => 'en',
            'key' => 'Additional mileage charge',
            'value' => 'AED 10 / Km'
        ]);
        CarRentalIncludeTranslation::create([
            'car_rental_include_id' => 19,
            'locale' => 'ar',
            'key' => 'رسوم الأميال الإضافية',
            'value' => '10 AED / كم '
        ]);
        CarRentalIncludeTranslation::create([
            'car_rental_include_id' => 19,
            'locale' => 'fr',
            'key' => 'Frais kilométriques supplémentaires',
            'value' => 'AED 10/Km'
        ]);
        CarRentalIncludeTranslation::create([
            'car_rental_include_id' => 19,
            'locale' => 'ru',
            'key' => 'Доплата за километраж',
            'value' => 'AED 10/км'
        ]);
        CarRentalInclude::create([
            'car_id' => 5,
        ]);
        CarRentalIncludeTranslation::create([
            'car_rental_include_id' => 20,
            'locale' => 'en',
            'key' => 'Salik / Toll Charges',
            'value' => 'AED 5'
        ]);
        CarRentalIncludeTranslation::create([
            'car_rental_include_id' => 20,
            'locale' => 'ar',
            'key' => 'سالك / رسوم التعرفة',
            'value' => 'AED 5'
        ]);
        CarRentalIncludeTranslation::create([
            'car_rental_include_id' => 20,
            'locale' => 'fr',
            'key' => 'Salik / Frais de péage',
            'value' => 'AED 5'
        ]);
        CarRentalIncludeTranslation::create([
            'car_rental_include_id' => 20,
            'locale' => 'ru',
            'key' => 'Салик / Плата за проезд',
            'value' => 'AED 5'
        ]);

        CarRentalInclude::create([
            'car_id' => 6,
        ]);
        CarRentalIncludeTranslation::create([
            'car_rental_include_id' => 21,
            'locale' => 'en',
            'key' => 'Insurance',
            'value' => 'Basic Comprehensive'
        ]);
        CarRentalIncludeTranslation::create([
            'car_rental_include_id' => 21,
            'locale' => 'ar',
            'key' => 'تأمين',
            'value' => 'أساسي شامل'
        ]);
        CarRentalIncludeTranslation::create([
            'car_rental_include_id' => 21,
            'locale' => 'fr',
            'key' => 'Assurance',
            'value' => 'De base Complet'
        ]);
        CarRentalIncludeTranslation::create([
            'car_rental_include_id' => 21,
            'locale' => 'ru',
            'key' => 'Страхование',
            'value' => 'Базовый Комплексный'
        ]);
        CarRentalInclude::create([
            'car_id' => 6,
        ]);
        CarRentalIncludeTranslation::create([
            'car_rental_include_id' => 22,
            'locale' => 'en',
            'key' => 'Extras',
            'value' => 'Asds'
        ]);
        CarRentalIncludeTranslation::create([
            'car_rental_include_id' => 22,
            'locale' => 'ar',
            'key' => 'إضافات',
            'value' => 'أسد'
        ]);
        CarRentalIncludeTranslation::create([
            'car_rental_include_id' => 22,
            'locale' => 'fr',
            'key' => 'Suppléments',
            'value' => 'ADD'
        ]);
        CarRentalIncludeTranslation::create([
            'car_rental_include_id' => 22,
            'locale' => 'ru',
            'key' => 'Дополнительно',
            'value' => 'Асдс'
        ]);
        CarRentalInclude::create([
            'car_id' => 6,
        ]);
        CarRentalIncludeTranslation::create([
            'car_rental_include_id' => 23,
            'locale' => 'en',
            'key' => 'Additional mileage charge',
            'value' => 'AED 10 / Km'
        ]);
        CarRentalIncludeTranslation::create([
            'car_rental_include_id' => 23,
            'locale' => 'ar',
            'key' => 'رسوم الأميال الإضافية',
            'value' => '10 AED / كم '
        ]);
        CarRentalIncludeTranslation::create([
            'car_rental_include_id' => 23,
            'locale' => 'fr',
            'key' => 'Frais kilométriques supplémentaires',
            'value' => 'AED 10/Km'
        ]);
        CarRentalIncludeTranslation::create([
            'car_rental_include_id' => 23,
            'locale' => 'ru',
            'key' => 'Доплата за километраж',
            'value' => 'AED 10/км'
        ]);
        CarRentalInclude::create([
            'car_id' => 6,
        ]);
        CarRentalIncludeTranslation::create([
            'car_rental_include_id' => 24,
            'locale' => 'en',
            'key' => 'Salik / Toll Charges',
            'value' => 'AED 5'
        ]);
        CarRentalIncludeTranslation::create([
            'car_rental_include_id' => 24,
            'locale' => 'ar',
            'key' => 'سالك / رسوم التعرفة',
            'value' => 'AED 5'
        ]);
        CarRentalIncludeTranslation::create([
            'car_rental_include_id' => 24,
            'locale' => 'fr',
            'key' => 'Salik / Frais de péage',
            'value' => 'AED 5'
        ]);
        CarRentalIncludeTranslation::create([
            'car_rental_include_id' => 24,
            'locale' => 'ru',
            'key' => 'Салик / Плата за проезд',
            'value' => 'AED 5'
        ]);

        CarRentalInclude::create([
            'car_id' => 7,
        ]);
        CarRentalIncludeTranslation::create([
            'car_rental_include_id' => 24,
            'locale' => 'en',
            'key' => 'Insurance',
            'value' => 'Basic Comprehensive'
        ]);
        CarRentalIncludeTranslation::create([
            'car_rental_include_id' => 24,
            'locale' => 'ar',
            'key' => 'تأمين',
            'value' => 'أساسي شامل'
        ]);
        CarRentalIncludeTranslation::create([
            'car_rental_include_id' => 24,
            'locale' => 'fr',
            'key' => 'Assurance',
            'value' => 'De base Complet'
        ]);
        CarRentalIncludeTranslation::create([
            'car_rental_include_id' => 24,
            'locale' => 'ru',
            'key' => 'Страхование',
            'value' => 'Базовый Комплексный'
        ]);
        CarRentalInclude::create([
            'car_id' => 7,
        ]);
        CarRentalIncludeTranslation::create([
            'car_rental_include_id' => 25,
            'locale' => 'en',
            'key' => 'Extras',
            'value' => 'Asds'
        ]);
        CarRentalIncludeTranslation::create([
            'car_rental_include_id' => 25,
            'locale' => 'ar',
            'key' => 'إضافات',
            'value' => 'أسد'
        ]);
        CarRentalIncludeTranslation::create([
            'car_rental_include_id' => 25,
            'locale' => 'fr',
            'key' => 'Suppléments',
            'value' => 'ADD'
        ]);
        CarRentalIncludeTranslation::create([
            'car_rental_include_id' => 25,
            'locale' => 'ru',
            'key' => 'Дополнительно',
            'value' => 'Асдс'
        ]);
        CarRentalInclude::create([
            'car_id' => 7,
        ]);
        CarRentalIncludeTranslation::create([
            'car_rental_include_id' => 26,
            'locale' => 'en',
            'key' => 'Additional mileage charge',
            'value' => 'AED 10 / Km'
        ]);
        CarRentalIncludeTranslation::create([
            'car_rental_include_id' => 26,
            'locale' => 'ar',
            'key' => 'رسوم الأميال الإضافية',
            'value' => '10 AED / كم '
        ]);
        CarRentalIncludeTranslation::create([
            'car_rental_include_id' => 26,
            'locale' => 'fr',
            'key' => 'Frais kilométriques supplémentaires',
            'value' => 'AED 10/Km'
        ]);
        CarRentalIncludeTranslation::create([
            'car_rental_include_id' => 26,
            'locale' => 'ru',
            'key' => 'Доплата за километраж',
            'value' => 'AED 10/км'
        ]);
        CarRentalInclude::create([
            'car_id' => 7,
        ]);
        CarRentalIncludeTranslation::create([
            'car_rental_include_id' => 28,
            'locale' => 'en',
            'key' => 'Salik / Toll Charges',
            'value' => 'AED 5'
        ]);
        CarRentalIncludeTranslation::create([
            'car_rental_include_id' => 28,
            'locale' => 'ar',
            'key' => 'سالك / رسوم التعرفة',
            'value' => 'AED 5'
        ]);
        CarRentalIncludeTranslation::create([
            'car_rental_include_id' => 28,
            'locale' => 'fr',
            'key' => 'Salik / Frais de péage',
            'value' => 'AED 5'
        ]);
        CarRentalIncludeTranslation::create([
            'car_rental_include_id' => 28,
            'locale' => 'ru',
            'key' => 'Салик / Плата за проезд',
            'value' => 'AED 5'
        ]);

        CarRentalInclude::create([
            'car_id' => 8,
        ]);
        CarRentalIncludeTranslation::create([
            'car_rental_include_id' => 29,
            'locale' => 'en',
            'key' => 'Insurance',
            'value' => 'Basic Comprehensive'
        ]);
        CarRentalIncludeTranslation::create([
            'car_rental_include_id' => 29,
            'locale' => 'ar',
            'key' => 'تأمين',
            'value' => 'أساسي شامل'
        ]);
        CarRentalIncludeTranslation::create([
            'car_rental_include_id' => 29,
            'locale' => 'fr',
            'key' => 'Assurance',
            'value' => 'De base Complet'
        ]);
        CarRentalIncludeTranslation::create([
            'car_rental_include_id' => 29,
            'locale' => 'ru',
            'key' => 'Страхование',
            'value' => 'Базовый Комплексный'
        ]);
        CarRentalInclude::create([
            'car_id' => 8,
        ]);
        CarRentalIncludeTranslation::create([
            'car_rental_include_id' => 30,
            'locale' => 'en',
            'key' => 'Extras',
            'value' => 'Asds'
        ]);
        CarRentalIncludeTranslation::create([
            'car_rental_include_id' => 30,
            'locale' => 'ar',
            'key' => 'إضافات',
            'value' => 'أسد'
        ]);
        CarRentalIncludeTranslation::create([
            'car_rental_include_id' => 30,
            'locale' => 'fr',
            'key' => 'Suppléments',
            'value' => 'ADD'
        ]);
        CarRentalIncludeTranslation::create([
            'car_rental_include_id' => 30,
            'locale' => 'ru',
            'key' => 'Дополнительно',
            'value' => 'Асдс'
        ]);
        CarRentalInclude::create([
            'car_id' => 8,
        ]);
        CarRentalIncludeTranslation::create([
            'car_rental_include_id' => 31,
            'locale' => 'en',
            'key' => 'Additional mileage charge',
            'value' => 'AED 10 / Km'
        ]);
        CarRentalIncludeTranslation::create([
            'car_rental_include_id' => 31,
            'locale' => 'ar',
            'key' => 'رسوم الأميال الإضافية',
            'value' => '10 AED / كم '
        ]);
        CarRentalIncludeTranslation::create([
            'car_rental_include_id' => 31,
            'locale' => 'fr',
            'key' => 'Frais kilométriques supplémentaires',
            'value' => 'AED 10/Km'
        ]);
        CarRentalIncludeTranslation::create([
            'car_rental_include_id' => 31,
            'locale' => 'ru',
            'key' => 'Доплата за километраж',
            'value' => 'AED 10/км'
        ]);
        CarRentalInclude::create([
            'car_id' => 8,
        ]);
        CarRentalIncludeTranslation::create([
            'car_rental_include_id' => 32,
            'locale' => 'en',
            'key' => 'Salik / Toll Charges',
            'value' => 'AED 5'
        ]);
        CarRentalIncludeTranslation::create([
            'car_rental_include_id' => 32,
            'locale' => 'ar',
            'key' => 'سالك / رسوم التعرفة',
            'value' => 'AED 5'
        ]);
        CarRentalIncludeTranslation::create([
            'car_rental_include_id' => 32,
            'locale' => 'fr',
            'key' => 'Salik / Frais de péage',
            'value' => 'AED 5'
        ]);
        CarRentalIncludeTranslation::create([
            'car_rental_include_id' => 32,
            'locale' => 'ru',
            'key' => 'Салик / Плата за проезд',
            'value' => 'AED 5'
        ]);

        CarRentalInclude::create([
            'car_id' => 9,
        ]);
        CarRentalIncludeTranslation::create([
            'car_rental_include_id' => 33,
            'locale' => 'en',
            'key' => 'Insurance',
            'value' => 'Basic Comprehensive'
        ]);
        CarRentalIncludeTranslation::create([
            'car_rental_include_id' => 33,
            'locale' => 'ar',
            'key' => 'تأمين',
            'value' => 'أساسي شامل'
        ]);
        CarRentalIncludeTranslation::create([
            'car_rental_include_id' => 33,
            'locale' => 'fr',
            'key' => 'Assurance',
            'value' => 'De base Complet'
        ]);
        CarRentalIncludeTranslation::create([
            'car_rental_include_id' => 33,
            'locale' => 'ru',
            'key' => 'Страхование',
            'value' => 'Базовый Комплексный'
        ]);
        CarRentalInclude::create([
            'car_id' => 9,
        ]);
        CarRentalIncludeTranslation::create([
            'car_rental_include_id' => 34,
            'locale' => 'en',
            'key' => 'Extras',
            'value' => 'Asds'
        ]);
        CarRentalIncludeTranslation::create([
            'car_rental_include_id' => 34,
            'locale' => 'ar',
            'key' => 'إضافات',
            'value' => 'أسد'
        ]);
        CarRentalIncludeTranslation::create([
            'car_rental_include_id' => 34,
            'locale' => 'fr',
            'key' => 'Suppléments',
            'value' => 'ADD'
        ]);
        CarRentalIncludeTranslation::create([
            'car_rental_include_id' => 34,
            'locale' => 'ru',
            'key' => 'Дополнительно',
            'value' => 'Асдс'
        ]);
        CarRentalInclude::create([
            'car_id' => 9,
        ]);
        CarRentalIncludeTranslation::create([
            'car_rental_include_id' => 35,
            'locale' => 'en',
            'key' => 'Additional mileage charge',
            'value' => 'AED 10 / Km'
        ]);
        CarRentalIncludeTranslation::create([
            'car_rental_include_id' => 35,
            'locale' => 'ar',
            'key' => 'رسوم الأميال الإضافية',
            'value' => '10 AED / كم '
        ]);
        CarRentalIncludeTranslation::create([
            'car_rental_include_id' => 35,
            'locale' => 'fr',
            'key' => 'Frais kilométriques supplémentaires',
            'value' => 'AED 10/Km'
        ]);
        CarRentalIncludeTranslation::create([
            'car_rental_include_id' => 35,
            'locale' => 'ru',
            'key' => 'Доплата за километраж',
            'value' => 'AED 10/км'
        ]);
        CarRentalInclude::create([
            'car_id' => 9,
        ]);
        CarRentalIncludeTranslation::create([
            'car_rental_include_id' => 36,
            'locale' => 'en',
            'key' => 'Salik / Toll Charges',
            'value' => 'AED 5'
        ]);
        CarRentalIncludeTranslation::create([
            'car_rental_include_id' => 36,
            'locale' => 'ar',
            'key' => 'سالك / رسوم التعرفة',
            'value' => 'AED 5'
        ]);
        CarRentalIncludeTranslation::create([
            'car_rental_include_id' => 36,
            'locale' => 'fr',
            'key' => 'Salik / Frais de péage',
            'value' => 'AED 5'
        ]);
        CarRentalIncludeTranslation::create([
            'car_rental_include_id' => 36,
            'locale' => 'ru',
            'key' => 'Салик / Плата за проезд',
            'value' => 'AED 5'
        ]);
    }
}
