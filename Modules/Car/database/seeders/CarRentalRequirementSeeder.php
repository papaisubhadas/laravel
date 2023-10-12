<?php

namespace Modules\Car\database\seeders;

use Illuminate\Database\Seeder;
use Modules\Car\Models\CarRentalRequirement;
use Modules\Car\Models\CarRentalRequirementTranslation;

class CarRentalRequirementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CarRentalRequirement::create([
            'car_id' => 1,
        ]);
        CarRentalRequirementTranslation::create([
            'car_rental_requirement_id' => 1,
            'locale' => 'en',
            'key' => "Driver's Age",
            'value' => '20 years and above'
        ]);
        CarRentalRequirementTranslation::create([
            'car_rental_requirement_id' => 1,
            'locale' => 'ar',
            'key' => 'العمر السائق',
            'value' => '20 سنة فما فوق'
        ]);
        CarRentalRequirementTranslation::create([
            'car_rental_requirement_id' => 1,
            'locale' => 'fr',
            'key' => 'Âge du conducteur',
            'value' => '20 ans et plus'
        ]);
        CarRentalRequirementTranslation::create([
            'car_rental_requirement_id' => 1,
            'locale' => 'ru',
            'key' => 'Возраст водителя',
            'value' => '20 лет и старше'
        ]);
        CarRentalRequirement::create([
            'car_id' => 1,
        ]);
        CarRentalRequirementTranslation::create([
            'car_rental_requirement_id' => 2,
            'locale' => 'en',
            'key' => "Security Deposit",
            'value' => 'AED 3000'
        ]);
        CarRentalRequirementTranslation::create([
            'car_rental_requirement_id' => 2,
            'locale' => 'ar',
            'key' => 'مبلغ التأمين',
            'value' => 'AED 3000'
        ]);
        CarRentalRequirementTranslation::create([
            'car_rental_requirement_id' => 2,
            'locale' => 'fr',
            'key' => 'Dépôt de garantie',
            'value' => 'AED 3000'
        ]);
        CarRentalRequirementTranslation::create([
            'car_rental_requirement_id' => 2,
            'locale' => 'ru',
            'key' => 'Гарантийный депозит',
            'value' => 'AED 3000'
        ]);

        CarRentalRequirement::create([
            'car_id' => 2,
        ]);
        CarRentalRequirementTranslation::create([
            'car_rental_requirement_id' => 3,
            'locale' => 'en',
            'key' => "Driver's Age",
            'value' => '20 years and above'
        ]);
        CarRentalRequirementTranslation::create([
            'car_rental_requirement_id' => 3,
            'locale' => 'ar',
            'key' => 'العمر السائق',
            'value' => '20 سنة فما فوق'
        ]);
        CarRentalRequirementTranslation::create([
            'car_rental_requirement_id' => 3,
            'locale' => 'fr',
            'key' => 'Âge du conducteur',
            'value' => '20 ans et plus'
        ]);
        CarRentalRequirementTranslation::create([
            'car_rental_requirement_id' => 3,
            'locale' => 'ru',
            'key' => 'Возраст водителя',
            'value' => '20 лет и старше'
        ]);
        CarRentalRequirement::create([
            'car_id' => 2,
        ]);
        CarRentalRequirementTranslation::create([
            'car_rental_requirement_id' => 4,
            'locale' => 'en',
            'key' => "Security Deposit",
            'value' => 'AED 3000'
        ]);
        CarRentalRequirementTranslation::create([
            'car_rental_requirement_id' => 4,
            'locale' => 'ar',
            'key' => 'مبلغ التأمين',
            'value' => 'AED 3000'
        ]);
        CarRentalRequirementTranslation::create([
            'car_rental_requirement_id' => 4,
            'locale' => 'fr',
            'key' => 'Dépôt de garantie',
            'value' => 'AED 3000'
        ]);
        CarRentalRequirementTranslation::create([
            'car_rental_requirement_id' => 4,
            'locale' => 'ru',
            'key' => 'Гарантийный депозит',
            'value' => 'AED 3000'
        ]);

        CarRentalRequirement::create([
            'car_id' => 3,
        ]);
        CarRentalRequirementTranslation::create([
            'car_rental_requirement_id' => 5,
            'locale' => 'en',
            'key' => "Driver's Age",
            'value' => '20 years and above'
        ]);
        CarRentalRequirementTranslation::create([
            'car_rental_requirement_id' => 5,
            'locale' => 'ar',
            'key' => 'العمر السائق',
            'value' => '20 سنة فما فوق'
        ]);
        CarRentalRequirementTranslation::create([
            'car_rental_requirement_id' => 5,
            'locale' => 'fr',
            'key' => 'Âge du conducteur',
            'value' => '20 ans et plus'
        ]);
        CarRentalRequirementTranslation::create([
            'car_rental_requirement_id' => 5,
            'locale' => 'ru',
            'key' => 'Возраст водителя',
            'value' => '20 лет и старше'
        ]);
        CarRentalRequirement::create([
            'car_id' => 3,
        ]);
        CarRentalRequirementTranslation::create([
            'car_rental_requirement_id' => 6,
            'locale' => 'en',
            'key' => "Security Deposit",
            'value' => 'AED 3000'
        ]);
        CarRentalRequirementTranslation::create([
            'car_rental_requirement_id' => 6,
            'locale' => 'ar',
            'key' => 'مبلغ التأمين',
            'value' => 'AED 3000'
        ]);
        CarRentalRequirementTranslation::create([
            'car_rental_requirement_id' => 6,
            'locale' => 'fr',
            'key' => 'Dépôt de garantie',
            'value' => 'AED 3000'
        ]);
        CarRentalRequirementTranslation::create([
            'car_rental_requirement_id' => 6,
            'locale' => 'ru',
            'key' => 'Гарантийный депозит',
            'value' => 'AED 3000'
        ]);

        CarRentalRequirement::create([
            'car_id' => 4,
        ]);
        CarRentalRequirementTranslation::create([
            'car_rental_requirement_id' => 7,
            'locale' => 'en',
            'key' => "Driver's Age",
            'value' => '20 years and above'
        ]);
        CarRentalRequirementTranslation::create([
            'car_rental_requirement_id' => 7,
            'locale' => 'ar',
            'key' => 'العمر السائق',
            'value' => '20 سنة فما فوق'
        ]);
        CarRentalRequirementTranslation::create([
            'car_rental_requirement_id' => 7,
            'locale' => 'fr',
            'key' => 'Âge du conducteur',
            'value' => '20 ans et plus'
        ]);
        CarRentalRequirementTranslation::create([
            'car_rental_requirement_id' => 7,
            'locale' => 'ru',
            'key' => 'Возраст водителя',
            'value' => '20 лет и старше'
        ]);
        CarRentalRequirement::create([
            'car_id' => 4,
        ]);
        CarRentalRequirementTranslation::create([
            'car_rental_requirement_id' => 8,
            'locale' => 'en',
            'key' => "Security Deposit",
            'value' => 'AED 3000'
        ]);
        CarRentalRequirementTranslation::create([
            'car_rental_requirement_id' => 8,
            'locale' => 'ar',
            'key' => 'مبلغ التأمين',
            'value' => 'AED 3000'
        ]);
        CarRentalRequirementTranslation::create([
            'car_rental_requirement_id' => 8,
            'locale' => 'fr',
            'key' => 'Dépôt de garantie',
            'value' => 'AED 3000'
        ]);
        CarRentalRequirementTranslation::create([
            'car_rental_requirement_id' => 8,
            'locale' => 'ru',
            'key' => 'Гарантийный депозит',
            'value' => 'AED 3000'
        ]);

        CarRentalRequirement::create([
            'car_id' => 5,
        ]);
        CarRentalRequirementTranslation::create([
            'car_rental_requirement_id' => 9,
            'locale' => 'en',
            'key' => "Driver's Age",
            'value' => '20 years and above'
        ]);
        CarRentalRequirementTranslation::create([
            'car_rental_requirement_id' => 9,
            'locale' => 'ar',
            'key' => 'العمر السائق',
            'value' => '20 سنة فما فوق'
        ]);
        CarRentalRequirementTranslation::create([
            'car_rental_requirement_id' => 9,
            'locale' => 'fr',
            'key' => 'Âge du conducteur',
            'value' => '20 ans et plus'
        ]);
        CarRentalRequirementTranslation::create([
            'car_rental_requirement_id' => 9,
            'locale' => 'ru',
            'key' => 'Возраст водителя',
            'value' => '20 лет и старше'
        ]);
        CarRentalRequirement::create([
            'car_id' => 5,
        ]);
        CarRentalRequirementTranslation::create([
            'car_rental_requirement_id' => 10,
            'locale' => 'en',
            'key' => "Security Deposit",
            'value' => 'AED 3000'
        ]);
        CarRentalRequirementTranslation::create([
            'car_rental_requirement_id' => 10,
            'locale' => 'ar',
            'key' => 'مبلغ التأمين',
            'value' => 'AED 3000'
        ]);
        CarRentalRequirementTranslation::create([
            'car_rental_requirement_id' => 10,
            'locale' => 'fr',
            'key' => 'Dépôt de garantie',
            'value' => 'AED 3000'
        ]);
        CarRentalRequirementTranslation::create([
            'car_rental_requirement_id' => 10,
            'locale' => 'ru',
            'key' => 'Гарантийный депозит',
            'value' => 'AED 3000'
        ]);

        CarRentalRequirement::create([
            'car_id' => 6,
        ]);
        CarRentalRequirementTranslation::create([
            'car_rental_requirement_id' => 11,
            'locale' => 'en',
            'key' => "Driver's Age",
            'value' => '20 years and above'
        ]);
        CarRentalRequirementTranslation::create([
            'car_rental_requirement_id' => 11,
            'locale' => 'ar',
            'key' => 'العمر السائق',
            'value' => '20 سنة فما فوق'
        ]);
        CarRentalRequirementTranslation::create([
            'car_rental_requirement_id' => 11,
            'locale' => 'fr',
            'key' => 'Âge du conducteur',
            'value' => '20 ans et plus'
        ]);
        CarRentalRequirementTranslation::create([
            'car_rental_requirement_id' => 11,
            'locale' => 'ru',
            'key' => 'Возраст водителя',
            'value' => '20 лет и старше'
        ]);
        CarRentalRequirement::create([
            'car_id' => 6,
        ]);
        CarRentalRequirementTranslation::create([
            'car_rental_requirement_id' => 12,
            'locale' => 'en',
            'key' => "Security Deposit",
            'value' => 'AED 3000'
        ]);
        CarRentalRequirementTranslation::create([
            'car_rental_requirement_id' => 12,
            'locale' => 'ar',
            'key' => 'مبلغ التأمين',
            'value' => 'AED 3000'
        ]);
        CarRentalRequirementTranslation::create([
            'car_rental_requirement_id' => 12,
            'locale' => 'fr',
            'key' => 'Dépôt de garantie',
            'value' => 'AED 3000'
        ]);
        CarRentalRequirementTranslation::create([
            'car_rental_requirement_id' => 12,
            'locale' => 'ru',
            'key' => 'Гарантийный депозит',
            'value' => 'AED 3000'
        ]);

        CarRentalRequirement::create([
            'car_id' => 7,
        ]);
        CarRentalRequirementTranslation::create([
            'car_rental_requirement_id' => 13,
            'locale' => 'en',
            'key' => "Driver's Age",
            'value' => '20 years and above'
        ]);
        CarRentalRequirementTranslation::create([
            'car_rental_requirement_id' => 13,
            'locale' => 'ar',
            'key' => 'العمر السائق',
            'value' => '20 سنة فما فوق'
        ]);
        CarRentalRequirementTranslation::create([
            'car_rental_requirement_id' => 13,
            'locale' => 'fr',
            'key' => 'Âge du conducteur',
            'value' => '20 ans et plus'
        ]);
        CarRentalRequirementTranslation::create([
            'car_rental_requirement_id' => 13,
            'locale' => 'ru',
            'key' => 'Возраст водителя',
            'value' => '20 лет и старше'
        ]);
        CarRentalRequirement::create([
            'car_id' => 7,
        ]);
        CarRentalRequirementTranslation::create([
            'car_rental_requirement_id' => 14,
            'locale' => 'en',
            'key' => "Security Deposit",
            'value' => 'AED 3000'
        ]);
        CarRentalRequirementTranslation::create([
            'car_rental_requirement_id' => 14,
            'locale' => 'ar',
            'key' => 'مبلغ التأمين',
            'value' => 'AED 3000'
        ]);
        CarRentalRequirementTranslation::create([
            'car_rental_requirement_id' => 14,
            'locale' => 'fr',
            'key' => 'Dépôt de garantie',
            'value' => 'AED 3000'
        ]);
        CarRentalRequirementTranslation::create([
            'car_rental_requirement_id' => 14,
            'locale' => 'ru',
            'key' => 'Гарантийный депозит',
            'value' => 'AED 3000'
        ]);

        CarRentalRequirement::create([
            'car_id' => 8,
        ]);
        CarRentalRequirementTranslation::create([
            'car_rental_requirement_id' => 15,
            'locale' => 'en',
            'key' => "Driver's Age",
            'value' => '20 years and above'
        ]);
        CarRentalRequirementTranslation::create([
            'car_rental_requirement_id' => 15,
            'locale' => 'ar',
            'key' => 'العمر السائق',
            'value' => '20 سنة فما فوق'
        ]);
        CarRentalRequirementTranslation::create([
            'car_rental_requirement_id' => 15,
            'locale' => 'fr',
            'key' => 'Âge du conducteur',
            'value' => '20 ans et plus'
        ]);
        CarRentalRequirementTranslation::create([
            'car_rental_requirement_id' => 15,
            'locale' => 'ru',
            'key' => 'Возраст водителя',
            'value' => '20 лет и старше'
        ]);
        CarRentalRequirement::create([
            'car_id' => 8,
        ]);
        CarRentalRequirementTranslation::create([
            'car_rental_requirement_id' => 16,
            'locale' => 'en',
            'key' => "Security Deposit",
            'value' => 'AED 3000'
        ]);
        CarRentalRequirementTranslation::create([
            'car_rental_requirement_id' => 16,
            'locale' => 'ar',
            'key' => 'مبلغ التأمين',
            'value' => 'AED 3000'
        ]);
        CarRentalRequirementTranslation::create([
            'car_rental_requirement_id' => 16,
            'locale' => 'fr',
            'key' => 'Dépôt de garantie',
            'value' => 'AED 3000'
        ]);
        CarRentalRequirementTranslation::create([
            'car_rental_requirement_id' => 16,
            'locale' => 'ru',
            'key' => 'Гарантийный депозит',
            'value' => 'AED 3000'
        ]);

        CarRentalRequirement::create([
            'car_id' => 9,
        ]);
        CarRentalRequirementTranslation::create([
            'car_rental_requirement_id' => 17,
            'locale' => 'en',
            'key' => "Driver's Age",
            'value' => '20 years and above'
        ]);
        CarRentalRequirementTranslation::create([
            'car_rental_requirement_id' => 17,
            'locale' => 'ar',
            'key' => 'العمر السائق',
            'value' => '20 سنة فما فوق'
        ]);
        CarRentalRequirementTranslation::create([
            'car_rental_requirement_id' => 17,
            'locale' => 'fr',
            'key' => 'Âge du conducteur',
            'value' => '20 ans et plus'
        ]);
        CarRentalRequirementTranslation::create([
            'car_rental_requirement_id' => 17,
            'locale' => 'ru',
            'key' => 'Возраст водителя',
            'value' => '20 лет и старше'
        ]);
        CarRentalRequirement::create([
            'car_id' => 9,
        ]);
        CarRentalRequirementTranslation::create([
            'car_rental_requirement_id' => 18,
            'locale' => 'en',
            'key' => "Security Deposit",
            'value' => 'AED 3000'
        ]);
        CarRentalRequirementTranslation::create([
            'car_rental_requirement_id' => 18,
            'locale' => 'ar',
            'key' => 'مبلغ التأمين',
            'value' => 'AED 3000'
        ]);
        CarRentalRequirementTranslation::create([
            'car_rental_requirement_id' => 18,
            'locale' => 'fr',
            'key' => 'Dépôt de garantie',
            'value' => 'AED 3000'
        ]);
        CarRentalRequirementTranslation::create([
            'car_rental_requirement_id' => 18,
            'locale' => 'ru',
            'key' => 'Гарантийный депозит',
            'value' => 'AED 3000'
        ]);
    }
}
