<?php

namespace Modules\Car\database\seeders;

use Illuminate\Database\Seeder;
use Modules\Car\Models\CarRentDetail;
use Modules\Car\Models\CarRentDetailTranslation;

class CarRentDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CarRentDetail::create([
            'car_id' => 1,
        ]);
        CarRentDetailTranslation::create([
            'car_rent_detail_id' => 1,
            'locale' => 'en',
            'rent_detail_text' => '1 day rental available with easy booking'
        ]);
        CarRentDetailTranslation::create([
            'car_rent_detail_id' => 1,
            'locale' => 'ar',
            'rent_detail_text' => 'إيجار ليوم واحد متاح مع سهولة الحجز'
        ]);
        CarRentDetailTranslation::create([
            'car_rent_detail_id' => 1,
            'locale' => 'fr',
            'rent_detail_text' => 'Location 1 jour disponible avec réservation facile'
        ]);
        CarRentDetailTranslation::create([
            'car_rent_detail_id' => 1,
            'locale' => 'ru',
            'rent_detail_text' => 'Возможна аренда на 1 день с легким бронированием'
        ]);


        CarRentDetail::create([
            'car_id' => 1,
        ]);
        CarRentDetailTranslation::create([
            'car_rent_detail_id' => 2,
            'locale' => 'en',
            'rent_detail_text' => 'Deposit: AED 1000'
        ]);
        CarRentDetailTranslation::create([
            'car_rent_detail_id' => 2,
            'locale' => 'ar',
            'rent_detail_text' => 'الإيداع: 1000 درهم إماراتي'
        ]);
        CarRentDetailTranslation::create([
            'car_rent_detail_id' => 2,
            'locale' => 'fr',
            'rent_detail_text' => 'Caution : 1 000 AED'
        ]);
        CarRentDetailTranslation::create([
            'car_rent_detail_id' => 2,
            'locale' => 'ru',
            'rent_detail_text' => 'Депозит: 1000 дирхамов ОАЭ'
        ]);

        CarRentDetail::create([
            'car_id' => 1,
        ]);
        CarRentDetailTranslation::create([
            'car_rent_detail_id' => 3,
            'locale' => 'en',
            'rent_detail_text' => 'Insurance included for your safety'
        ]);
        CarRentDetailTranslation::create([
            'car_rent_detail_id' => 3,
            'locale' => 'ar',
            'rent_detail_text' => 'يشمل التأمين لسلامتك'
        ]);
        CarRentDetailTranslation::create([
            'car_rent_detail_id' => 3,
            'locale' => 'fr',
            'rent_detail_text' => 'Assurance incluse pour votre sécurité'
        ]);
        CarRentDetailTranslation::create([
            'car_rent_detail_id' => 3,
            'locale' => 'ru',
            'rent_detail_text' => 'Страховка включена для вашей безопасности'
        ]);

        CarRentDetail::create([
            'car_id' => 2,
        ]);
        CarRentDetailTranslation::create([
            'car_rent_detail_id' => 4,'locale' => 'en',
            'rent_detail_text' => '1 day rental available with easy booking'
        ]);
        CarRentDetailTranslation::create([
            'car_rent_detail_id' => 4,
            'locale' => 'ar',
            'rent_detail_text' => 'إيجار ليوم واحد متاح مع سهولة الحجز'
        ]);
        CarRentDetailTranslation::create([
            'car_rent_detail_id' => 4,
            'locale' => 'fr',
            'rent_detail_text' => 'Location 1 jour disponible avec réservation facile'
        ]);
        CarRentDetailTranslation::create([
            'car_rent_detail_id' => 4,
            'locale' => 'ru',
            'rent_detail_text' => 'Возможна аренда на 1 день с легким бронированием'
        ]);

        CarRentDetail::create([
            'car_id' => 2,
        ]);
        CarRentDetailTranslation::create([
            'car_rent_detail_id' => 5,'locale' => 'en',
            'rent_detail_text' => 'Deposit: AED 1000'
        ]);
        CarRentDetailTranslation::create([
            'car_rent_detail_id' => 5,
            'locale' => 'ar',
            'rent_detail_text' => 'الإيداع: 1000 درهم إماراتي'
        ]);
        CarRentDetailTranslation::create([
            'car_rent_detail_id' => 5,
            'locale' => 'fr',
            'rent_detail_text' => 'Caution : 1 000 AED'
        ]);
        CarRentDetailTranslation::create([
            'car_rent_detail_id' => 5,
            'locale' => 'ru',
            'rent_detail_text' => 'Депозит: 1000 дирхамов ОАЭ'
        ]);

        CarRentDetail::create([
            'car_id' => 2,
        ]);
        CarRentDetailTranslation::create([
            'car_rent_detail_id' => 6,'locale' => 'en',
            'rent_detail_text' => 'Insurance included for your safety'
        ]);
        CarRentDetailTranslation::create([
            'car_rent_detail_id' => 6,
            'locale' => 'ar',
            'rent_detail_text' => 'يشمل التأمين لسلامتك'
        ]);
        CarRentDetailTranslation::create([
            'car_rent_detail_id' => 6,
            'locale' => 'fr',
            'rent_detail_text' => 'Assurance incluse pour votre sécurité'
        ]);
        CarRentDetailTranslation::create([
            'car_rent_detail_id' => 6,
            'locale' => 'ru',
            'rent_detail_text' => 'Страховка включена для вашей безопасности'
        ]);

        CarRentDetail::create([
            'car_id' => 3,
        ]);
        CarRentDetailTranslation::create([
            'car_rent_detail_id' => 7,'locale' => 'en',
            'rent_detail_text' => '1 day rental available with easy booking'
        ]);
        CarRentDetailTranslation::create([
            'car_rent_detail_id' => 7,
            'locale' => 'ar',
            'rent_detail_text' => 'إيجار ليوم واحد متاح مع سهولة الحجز'
        ]);
        CarRentDetailTranslation::create([
            'car_rent_detail_id' => 7,
            'locale' => 'fr',
            'rent_detail_text' => 'Location 1 jour disponible avec réservation facile'
        ]);
        CarRentDetailTranslation::create([
            'car_rent_detail_id' => 7,
            'locale' => 'ru',
            'rent_detail_text' => 'Возможна аренда на 1 день с легким бронированием'
        ]);

        CarRentDetail::create([
            'car_id' => 3,
        ]);
        CarRentDetailTranslation::create([
            'car_rent_detail_id' => 8,'locale' => 'en',
            'rent_detail_text' => 'Deposit: AED 1000'
        ]);
        CarRentDetailTranslation::create([
            'car_rent_detail_id' => 8,
            'locale' => 'ar',
            'rent_detail_text' => 'الإيداع: 1000 درهم إماراتي'
        ]);
        CarRentDetailTranslation::create([
            'car_rent_detail_id' => 8,
            'locale' => 'fr',
            'rent_detail_text' => 'Caution : 1 000 AED'
        ]);
        CarRentDetailTranslation::create([
            'car_rent_detail_id' => 8,
            'locale' => 'ru',
            'rent_detail_text' => 'Депозит: 1000 дирхамов ОАЭ'
        ]);


        CarRentDetail::create([
            'car_id' => 3,
        ]);
        CarRentDetailTranslation::create([
            'car_rent_detail_id' => 9,'locale' => 'en',
            'rent_detail_text' => 'Insurance included for your safety'
        ]);
        CarRentDetailTranslation::create([
            'car_rent_detail_id' => 9,
            'locale' => 'ar',
            'rent_detail_text' => 'يشمل التأمين لسلامتك'
        ]);
        CarRentDetailTranslation::create([
            'car_rent_detail_id' => 9,
            'locale' => 'fr',
            'rent_detail_text' => 'Assurance incluse pour votre sécurité'
        ]);
        CarRentDetailTranslation::create([
            'car_rent_detail_id' => 9,
            'locale' => 'ru',
            'rent_detail_text' => 'Страховка включена для вашей безопасности'
        ]);

        CarRentDetail::create([
            'car_id' => 4,
        ]);
        CarRentDetailTranslation::create([
            'car_rent_detail_id' => 10,'locale' => 'en',
            'rent_detail_text' => '1 day rental available with easy booking'
        ]);
        CarRentDetailTranslation::create([
            'car_rent_detail_id' => 10,
            'locale' => 'ar',
            'rent_detail_text' => 'إيجار ليوم واحد متاح مع سهولة الحجز'
        ]);
        CarRentDetailTranslation::create([
            'car_rent_detail_id' => 10,
            'locale' => 'fr',
            'rent_detail_text' => 'Location 1 jour disponible avec réservation facile'
        ]);
        CarRentDetailTranslation::create([
            'car_rent_detail_id' => 10,
            'locale' => 'ru',
            'rent_detail_text' => 'Возможна аренда на 1 день с легким бронированием'
        ]);

        CarRentDetail::create([
            'car_id' => 4,
        ]);
        CarRentDetailTranslation::create([
            'car_rent_detail_id' => 11,'locale' => 'en',
            'rent_detail_text' => 'Deposit: AED 1000'
        ]);
        CarRentDetailTranslation::create([
            'car_rent_detail_id' => 11,
            'locale' => 'ar',
            'rent_detail_text' => 'الإيداع: 1000 درهم إماراتي'
        ]);
        CarRentDetailTranslation::create([
            'car_rent_detail_id' => 11,
            'locale' => 'fr',
            'rent_detail_text' => 'Caution : 1 000 AED'
        ]);
        CarRentDetailTranslation::create([
            'car_rent_detail_id' => 11,
            'locale' => 'ru',
            'rent_detail_text' => 'Депозит: 1000 дирхамов ОАЭ'
        ]);

        CarRentDetail::create([
            'car_id' => 4,
        ]);
        CarRentDetailTranslation::create([
            'car_rent_detail_id' => 12,'locale' => 'en',
            'rent_detail_text' => 'Insurance included for your safety'
        ]);
        CarRentDetailTranslation::create([
            'car_rent_detail_id' => 12,
            'locale' => 'ar',
            'rent_detail_text' => 'يشمل التأمين لسلامتك'
        ]);
        CarRentDetailTranslation::create([
            'car_rent_detail_id' => 12,
            'locale' => 'fr',
            'rent_detail_text' => 'Assurance incluse pour votre sécurité'
        ]);
        CarRentDetailTranslation::create([
            'car_rent_detail_id' => 12,
            'locale' => 'ru',
            'rent_detail_text' => 'Страховка включена для вашей безопасности'
        ]);

        CarRentDetail::create([
            'car_id' => 5,
        ]);
        CarRentDetailTranslation::create([
            'car_rent_detail_id' => 13,'locale' => 'en',
            'rent_detail_text' => '1 day rental available with easy booking'
        ]);
        CarRentDetailTranslation::create([
            'car_rent_detail_id' => 13,
            'locale' => 'ar',
            'rent_detail_text' => 'إيجار ليوم واحد متاح مع سهولة الحجز'
        ]);
        CarRentDetailTranslation::create([
            'car_rent_detail_id' => 13,
            'locale' => 'fr',
            'rent_detail_text' => 'Location 1 jour disponible avec réservation facile'
        ]);
        CarRentDetailTranslation::create([
            'car_rent_detail_id' => 13,
            'locale' => 'ru',
            'rent_detail_text' => 'Возможна аренда на 1 день с легким бронированием'
        ]);

        CarRentDetail::create([
            'car_id' => 5,
        ]);
        CarRentDetailTranslation::create([
            'car_rent_detail_id' => 14,'locale' => 'en',
            'rent_detail_text' => 'Deposit: AED 1000'
        ]);
        CarRentDetailTranslation::create([
            'car_rent_detail_id' => 14,
            'locale' => 'ar',
            'rent_detail_text' => 'الإيداع: 1000 درهم إماراتي'
        ]);
        CarRentDetailTranslation::create([
            'car_rent_detail_id' => 14,
            'locale' => 'fr',
            'rent_detail_text' => 'Caution : 1 000 AED'
        ]);
        CarRentDetailTranslation::create([
            'car_rent_detail_id' => 14,
            'locale' => 'ru',
            'rent_detail_text' => 'Депозит: 1000 дирхамов ОАЭ'
        ]);

        CarRentDetail::create([
            'car_id' => 5,
        ]);
        CarRentDetailTranslation::create([
            'car_rent_detail_id' => 15,'locale' => 'en',
            'rent_detail_text' => 'Insurance included for your safety'
        ]);
        CarRentDetailTranslation::create([
            'car_rent_detail_id' => 15,
            'locale' => 'ar',
            'rent_detail_text' => 'يشمل التأمين لسلامتك'
        ]);
        CarRentDetailTranslation::create([
            'car_rent_detail_id' => 15,
            'locale' => 'fr',
            'rent_detail_text' => 'Assurance incluse pour votre sécurité'
        ]);
        CarRentDetailTranslation::create([
            'car_rent_detail_id' => 15,
            'locale' => 'ru',
            'rent_detail_text' => 'Страховка включена для вашей безопасности'
        ]);


        CarRentDetail::create([
            'car_id' => 6,
        ]);
        CarRentDetailTranslation::create([
            'car_rent_detail_id' => 16,'locale' => 'en',
            'rent_detail_text' => '1 day rental available with easy booking'
        ]);
        CarRentDetailTranslation::create([
            'car_rent_detail_id' => 16,
            'locale' => 'ar',
            'rent_detail_text' => 'إيجار ليوم واحد متاح مع سهولة الحجز'
        ]);
        CarRentDetailTranslation::create([
            'car_rent_detail_id' => 16,
            'locale' => 'fr',
            'rent_detail_text' => 'Location 1 jour disponible avec réservation facile'
        ]);
        CarRentDetailTranslation::create([
            'car_rent_detail_id' => 16,
            'locale' => 'ru',
            'rent_detail_text' => 'Возможна аренда на 1 день с легким бронированием'
        ]);


        CarRentDetail::create([
            'car_id' => 6,
        ]);
        CarRentDetailTranslation::create([
            'car_rent_detail_id' => 17,'locale' => 'en',
            'rent_detail_text' => 'Deposit: AED 1000'
        ]);
        CarRentDetailTranslation::create([
            'car_rent_detail_id' => 17,
            'locale' => 'ar',
            'rent_detail_text' => 'الإيداع: 1000 درهم إماراتي'
        ]);
        CarRentDetailTranslation::create([
            'car_rent_detail_id' => 17,
            'locale' => 'fr',
            'rent_detail_text' => 'Caution : 1 000 AED'
        ]);
        CarRentDetailTranslation::create([
            'car_rent_detail_id' => 17,
            'locale' => 'ru',
            'rent_detail_text' => 'Депозит: 1000 дирхамов ОАЭ'
        ]);


        CarRentDetail::create([
            'car_id' => 6,
        ]);
        CarRentDetailTranslation::create([
            'car_rent_detail_id' => 18,'locale' => 'en',
            'rent_detail_text' => 'Insurance included for your safety'
        ]);
        CarRentDetailTranslation::create([
            'car_rent_detail_id' => 18,
            'locale' => 'ar',
            'rent_detail_text' => 'يشمل التأمين لسلامتك'
        ]);
        CarRentDetailTranslation::create([
            'car_rent_detail_id' => 18,
            'locale' => 'fr',
            'rent_detail_text' => 'Assurance incluse pour votre sécurité'
        ]);
        CarRentDetailTranslation::create([
            'car_rent_detail_id' => 18,
            'locale' => 'ru',
            'rent_detail_text' => 'Страховка включена для вашей безопасности'
        ]);


        CarRentDetail::create([
            'car_id' => 7,
        ]);
        CarRentDetailTranslation::create([
            'car_rent_detail_id' => 19,'locale' => 'en',
            'rent_detail_text' => '1 day rental available with easy booking'
        ]);
        CarRentDetailTranslation::create([
            'car_rent_detail_id' => 19,
            'locale' => 'ar',
            'rent_detail_text' => 'إيجار ليوم واحد متاح مع سهولة الحجز'
        ]);
        CarRentDetailTranslation::create([
            'car_rent_detail_id' => 19,
            'locale' => 'fr',
            'rent_detail_text' => 'Location 1 jour disponible avec réservation facile'
        ]);
        CarRentDetailTranslation::create([
            'car_rent_detail_id' => 19,
            'locale' => 'ru',
            'rent_detail_text' => 'Возможна аренда на 1 день с легким бронированием'
        ]);

        CarRentDetail::create([
            'car_id' => 7,
        ]);
        CarRentDetailTranslation::create([
            'car_rent_detail_id' => 20,'locale' => 'en',
            'rent_detail_text' => 'Deposit: AED 1000'
        ]);
        CarRentDetailTranslation::create([
            'car_rent_detail_id' => 20,
            'locale' => 'ar',
            'rent_detail_text' => 'الإيداع: 1000 درهم إماراتي'
        ]);
        CarRentDetailTranslation::create([
            'car_rent_detail_id' => 20,
            'locale' => 'fr',
            'rent_detail_text' => 'Caution : 1 000 AED'
        ]);
        CarRentDetailTranslation::create([
            'car_rent_detail_id' => 20,
            'locale' => 'ru',
            'rent_detail_text' => 'Депозит: 1000 дирхамов ОАЭ'
        ]);

        CarRentDetail::create([
            'car_id' => 7,
        ]);
        CarRentDetailTranslation::create([
            'car_rent_detail_id' => 21,'locale' => 'en',
            'rent_detail_text' => 'Insurance included for your safety'
        ]);
        CarRentDetailTranslation::create([
            'car_rent_detail_id' => 21,
            'locale' => 'ar',
            'rent_detail_text' => 'يشمل التأمين لسلامتك'
        ]);
        CarRentDetailTranslation::create([
            'car_rent_detail_id' => 21,
            'locale' => 'fr',
            'rent_detail_text' => 'Assurance incluse pour votre sécurité'
        ]);
        CarRentDetailTranslation::create([
            'car_rent_detail_id' => 21,
            'locale' => 'ru',
            'rent_detail_text' => 'Страховка включена для вашей безопасности'
        ]);

        CarRentDetail::create([
            'car_id' => 8,
        ]);
        CarRentDetailTranslation::create([
            'car_rent_detail_id' => 22,'locale' => 'en',
            'rent_detail_text' => '1 day rental available with easy booking'
        ]);
        CarRentDetailTranslation::create([
            'car_rent_detail_id' => 22,
            'locale' => 'ar',
            'rent_detail_text' => 'إيجار ليوم واحد متاح مع سهولة الحجز'
        ]);
        CarRentDetailTranslation::create([
            'car_rent_detail_id' => 22,
            'locale' => 'fr',
            'rent_detail_text' => 'Location 1 jour disponible avec réservation facile'
        ]);
        CarRentDetailTranslation::create([
            'car_rent_detail_id' => 22,
            'locale' => 'ru',
            'rent_detail_text' => 'Возможна аренда на 1 день с легким бронированием'
        ]);

        CarRentDetail::create([
            'car_id' => 8,
        ]);
        CarRentDetailTranslation::create([
            'car_rent_detail_id' => 23,'locale' => 'en',
            'rent_detail_text' => 'Deposit: AED 1000'
        ]);
        CarRentDetailTranslation::create([
            'car_rent_detail_id' => 23,
            'locale' => 'ar',
            'rent_detail_text' => 'الإيداع: 1000 درهم إماراتي'
        ]);
        CarRentDetailTranslation::create([
            'car_rent_detail_id' => 23,
            'locale' => 'fr',
            'rent_detail_text' => 'Caution : 1 000 AED'
        ]);
        CarRentDetailTranslation::create([
            'car_rent_detail_id' => 23,
            'locale' => 'ru',
            'rent_detail_text' => 'Депозит: 1000 дирхамов ОАЭ'
        ]);

        CarRentDetail::create([
            'car_id' => 8,
        ]);
        CarRentDetailTranslation::create([
            'car_rent_detail_id' => 24,'locale' => 'en',
            'rent_detail_text' => 'Insurance included for your safety'
        ]);
        CarRentDetailTranslation::create([
            'car_rent_detail_id' => 24,
            'locale' => 'ar',
            'rent_detail_text' => 'يشمل التأمين لسلامتك'
        ]);
        CarRentDetailTranslation::create([
            'car_rent_detail_id' => 24,
            'locale' => 'fr',
            'rent_detail_text' => 'Assurance incluse pour votre sécurité'
        ]);
        CarRentDetailTranslation::create([
            'car_rent_detail_id' => 24,
            'locale' => 'ru',
            'rent_detail_text' => 'Страховка включена для вашей безопасности'
        ]);

        CarRentDetail::create([
            'car_id' => 9,
        ]);
        CarRentDetailTranslation::create([
            'car_rent_detail_id' => 25,'locale' => 'en',
            'rent_detail_text' => '1 day rental available with easy booking'
        ]);
        CarRentDetailTranslation::create([
            'car_rent_detail_id' => 25,
            'locale' => 'ar',
            'rent_detail_text' => 'إيجار ليوم واحد متاح مع سهولة الحجز'
        ]);
        CarRentDetailTranslation::create([
            'car_rent_detail_id' => 25,
            'locale' => 'fr',
            'rent_detail_text' => 'Location 1 jour disponible avec réservation facile'
        ]);
        CarRentDetailTranslation::create([
            'car_rent_detail_id' => 25,
            'locale' => 'ru',
            'rent_detail_text' => 'Возможна аренда на 1 день с легким бронированием'
        ]);

        CarRentDetail::create([
            'car_id' => 9,
        ]);
        CarRentDetailTranslation::create([
            'car_rent_detail_id' => 26,'locale' => 'en',
            'rent_detail_text' => 'Deposit: AED 1000'
        ]);
        CarRentDetailTranslation::create([
            'car_rent_detail_id' => 26,
            'locale' => 'ar',
            'rent_detail_text' => 'الإيداع: 1000 درهم إماراتي'
        ]);
        CarRentDetailTranslation::create([
            'car_rent_detail_id' => 26,
            'locale' => 'fr',
            'rent_detail_text' => 'Caution : 1 000 AED'
        ]);
        CarRentDetailTranslation::create([
            'car_rent_detail_id' => 26,
            'locale' => 'ru',
            'rent_detail_text' => 'Депозит: 1000 дирхамов ОАЭ'
        ]);

        CarRentDetail::create([
            'car_id' => 9,
        ]);
        CarRentDetailTranslation::create([
            'car_rent_detail_id' => 27,'locale' => 'en',
            'rent_detail_text' => 'Insurance included for your safety'
        ]);
        CarRentDetailTranslation::create([
            'car_rent_detail_id' => 27,
            'locale' => 'ar',
            'rent_detail_text' => 'يشمل التأمين لسلامتك'
        ]);
        CarRentDetailTranslation::create([
            'car_rent_detail_id' => 27,
            'locale' => 'fr',
            'rent_detail_text' => 'Assurance incluse pour votre sécurité'
        ]);
        CarRentDetailTranslation::create([
            'car_rent_detail_id' => 27,
            'locale' => 'ru',
            'rent_detail_text' => 'Страховка включена для вашей безопасности'
        ]);
    }
}
