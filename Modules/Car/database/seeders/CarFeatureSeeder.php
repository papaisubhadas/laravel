<?php

namespace Modules\Car\database\seeders;

use Illuminate\Database\Seeder;
use Modules\Car\Models\CarFeature;
use Modules\Car\Models\CarFeatureTranslation;

class CarFeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CarFeature::create([
            'car_id' => 1,
            'icon_html' => '<img src="'.url('/').'/frontend/image/speedometer-icon.png" alt="">',
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 1,
            'locale' => 'en',
            'feature_title' => 'Cruise Control'
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 1,
            'locale' => 'ar',
            'feature_title' => 'مثبت السرعة'
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 1,
            'locale' => 'fr',
            'feature_title' => 'Régulateur de vitesse'
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 1,
            'locale' => 'ru',
            'feature_title' => 'Круиз-контроль'
        ]);
        CarFeature::create([
            'car_id' => 1,
            'icon_html' => '<img src="'.url('/').'/frontend/image/cam_icon.png" alt="">',
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 2,
            'locale' => 'en',
            'feature_title' => '3D Camera'
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 2,
            'locale' => 'ar',
            'feature_title' => 'كاميرا ثلاثية الأبعاد'
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 2,
            'locale' => 'fr',
            'feature_title' => 'Caméra 3D'
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 2,
            'locale' => 'ru',
            'feature_title' => '3D-камера'
        ]);
        CarFeature::create([
            'car_id' => 1,
            'icon_html' => '<img src="'.url('/').'/frontend/image/Warning.png" alt="">',
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 3,
            'locale' => 'en',
            'feature_title' => 'Blind  Warning'
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 3,
            'locale' => 'ar',
            'feature_title' => 'تحذير أعمى'
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 3,
            'locale' => 'fr',
            'feature_title' => 'Avertissement aveugle'
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 3,
            'locale' => 'ru',
            'feature_title' => 'Слепое предупреждение'
        ]);
        CarFeature::create([
            'car_id' => 1,
            'icon_html' => '<img src="'.url('/').'/frontend/image/memory.png" alt="">',
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 4,
            'locale' => 'en',
            'feature_title' => 'Memory Front Seats'
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 4,
            'locale' => 'ar',
            'feature_title' => 'مقاعد أمامية بذاكرة'
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 4,
            'locale' => 'fr',
            'feature_title' => 'Sièges avant à mémoire'
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 4,
            'locale' => 'ru',
            'feature_title' => 'Передние сиденья с памятью'
        ]);
        CarFeature::create([
            'car_id' => 1,
            'icon_html' => '<img src="'.url('/').'/frontend/image/parking.png" alt="">',
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 5,
            'locale' => 'en',
            'feature_title' => 'Parking Assist'
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 5,
            'locale' => 'ar',
            'feature_title' => 'مساعدة وقوف السيارات'
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 5,
            'locale' => 'fr',
            'feature_title' => 'Aide au stationnement'
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 5,
            'locale' => 'ru',
            'feature_title' => 'Помощь при парковке'
        ]);
        CarFeature::create([
            'car_id' => 1,
            'icon_html' => '<img src="'.url('/').'/frontend/image/speedometer-icon.png" alt="">',
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 6,
            'locale' => 'en',
            'feature_title' => 'Adaptive Control'
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 6,
            'locale' => 'ar',
            'feature_title' => 'التحكم التكيفي'
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 6,
            'locale' => 'fr',
            'feature_title' => 'Contrôle adaptatif'
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 6,
            'locale' => 'ru',
            'feature_title' => 'Адаптивное управление'
        ]);

        CarFeature::create([
            'car_id' => 2,
            'icon_html' => '<img src="'.url('/').'/frontend/image/speedometer-icon.png" alt="">',
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 7,
            'locale' => 'en',
            'feature_title' => 'Cruise Control'
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 7,
            'locale' => 'ar',
            'feature_title' => 'مثبت السرعة'
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 7,
            'locale' => 'fr',
            'feature_title' => 'Régulateur de vitesse'
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 7,
            'locale' => 'ru',
            'feature_title' => 'Круиз-контроль'
        ]);
        CarFeature::create([
            'car_id' => 2,
            'icon_html' => '<img src="'.url('/').'/frontend/image/cam_icon.png" alt="">',
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 8,
            'locale' => 'en',
            'feature_title' => '3D Camera'
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 8,
            'locale' => 'ar',
            'feature_title' => 'كاميرا ثلاثية الأبعاد'
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 8,
            'locale' => 'fr',
            'feature_title' => 'Caméra 3D'
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 8,
            'locale' => 'ru',
            'feature_title' => '3D-камера'
        ]);
        CarFeature::create([
            'car_id' => 2,
            'icon_html' => '<img src="'.url('/').'/frontend/image/Warning.png" alt="">',
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 9,
            'locale' => 'en',
            'feature_title' => 'Blind  Warning'
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 9,
            'locale' => 'ar',
            'feature_title' => 'تحذير أعمى'
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 9,
            'locale' => 'fr',
            'feature_title' => 'Avertissement aveugle'
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 9,
            'locale' => 'ru',
            'feature_title' => 'Слепое предупреждение'
        ]);
        CarFeature::create([
            'car_id' => 2,
            'icon_html' => '<img src="'.url('/').'/frontend/image/memory.png" alt="">',
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 10,
            'locale' => 'en',
            'feature_title' => 'Memory Front Seats'
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 10,
            'locale' => 'ar',
            'feature_title' => 'مقاعد أمامية بذاكرة'
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 10,
            'locale' => 'fr',
            'feature_title' => 'Sièges avant à mémoire'
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 10,
            'locale' => 'ru',
            'feature_title' => 'Передние сиденья с памятью'
        ]);
        CarFeature::create([
            'car_id' => 2,
            'icon_html' => '<img src="'.url('/').'/frontend/image/parking.png" alt="">',
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 11,
            'locale' => 'en',
            'feature_title' => 'Parking Assist'
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 11,
            'locale' => 'ar',
            'feature_title' => 'مساعدة وقوف السيارات'
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 11,
            'locale' => 'fr',
            'feature_title' => 'Aide au stationnement'
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 11,
            'locale' => 'ru',
            'feature_title' => 'Помощь при парковке'
        ]);
        CarFeature::create([
            'car_id' => 2,
            'icon_html' => '<img src="'.url('/').'/frontend/image/speedometer-icon.png" alt="">',
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 12,
            'locale' => 'en',
            'feature_title' => 'Adaptive Control'
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 12,
            'locale' => 'ar',
            'feature_title' => 'التحكم التكيفي'
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 12,
            'locale' => 'fr',
            'feature_title' => 'Contrôle adaptatif'
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 12,
            'locale' => 'ru',
            'feature_title' => 'Адаптивное управление'
        ]);

        CarFeature::create([
            'car_id' => 3,
            'icon_html' => '<img src="'.url('/').'/frontend/image/speedometer-icon.png" alt="">',
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 13,
            'locale' => 'en',
            'feature_title' => 'Cruise Control'
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 13,
            'locale' => 'ar',
            'feature_title' => 'مثبت السرعة'
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 13,
            'locale' => 'fr',
            'feature_title' => 'Régulateur de vitesse'
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 13,
            'locale' => 'ru',
            'feature_title' => 'Круиз-контроль'
        ]);
        CarFeature::create([
            'car_id' => 3,
            'icon_html' => '<img src="'.url('/').'/frontend/image/cam_icon.png" alt="">',
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 14,
            'locale' => 'en',
            'feature_title' => '3D Camera'
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 14,
            'locale' => 'ar',
            'feature_title' => 'كاميرا ثلاثية الأبعاد'
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 14,
            'locale' => 'fr',
            'feature_title' => 'Caméra 3D'
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 14,
            'locale' => 'ru',
            'feature_title' => '3D-камера'
        ]);
        CarFeature::create([
            'car_id' => 3,
            'icon_html' => '<img src="'.url('/').'/frontend/image/Warning.png" alt="">',
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 15,
            'locale' => 'en',
            'feature_title' => 'Blind  Warning'
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 15,
            'locale' => 'ar',
            'feature_title' => 'تحذير أعمى'
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 15,
            'locale' => 'fr',
            'feature_title' => 'Avertissement aveugle'
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 15,
            'locale' => 'ru',
            'feature_title' => 'Слепое предупреждение'
        ]);
        CarFeature::create([
            'car_id' => 3,
            'icon_html' => '<img src="'.url('/').'/frontend/image/memory.png" alt="">',
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 16,
            'locale' => 'en',
            'feature_title' => 'Memory Front Seats'
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 16,
            'locale' => 'ar',
            'feature_title' => 'مقاعد أمامية بذاكرة'
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 16,
            'locale' => 'fr',
            'feature_title' => 'Sièges avant à mémoire'
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 16,
            'locale' => 'ru',
            'feature_title' => 'Передние сиденья с памятью'
        ]);
        CarFeature::create([
            'car_id' => 3,
            'icon_html' => '<img src="'.url('/').'/frontend/image/parking.png" alt="">',
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 17,
            'locale' => 'en',
            'feature_title' => 'Parking Assist'
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 17,
            'locale' => 'ar',
            'feature_title' => 'مساعدة وقوف السيارات'
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 17,
            'locale' => 'fr',
            'feature_title' => 'Aide au stationnement'
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 17,
            'locale' => 'ru',
            'feature_title' => 'Помощь при парковке'
        ]);
        CarFeature::create([
            'car_id' => 3,
            'icon_html' => '<img src="'.url('/').'/frontend/image/speedometer-icon.png" alt="">',
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 18,
            'locale' => 'en',
            'feature_title' => 'Adaptive Control'
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 18,
            'locale' => 'ar',
            'feature_title' => 'التحكم التكيفي'
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 18,
            'locale' => 'fr',
            'feature_title' => 'Contrôle adaptatif'
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 18,
            'locale' => 'ru',
            'feature_title' => 'Адаптивное управление'
        ]);


        CarFeature::create([
            'car_id' => 4,
            'icon_html' => '<img src="'.url('/').'/frontend/image/speedometer-icon.png" alt="">',
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 19,
            'locale' => 'en',
            'feature_title' => 'Cruise Control'
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 19,
            'locale' => 'ar',
            'feature_title' => 'مثبت السرعة'
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 19,
            'locale' => 'fr',
            'feature_title' => 'Régulateur de vitesse'
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 19,
            'locale' => 'ru',
            'feature_title' => 'Круиз-контроль'
        ]);
        CarFeature::create([
            'car_id' => 4,
            'icon_html' => '<img src="'.url('/').'/frontend/image/cam_icon.png" alt="">',
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 20,
            'locale' => 'en',
            'feature_title' => '3D Camera'
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 20,
            'locale' => 'ar',
            'feature_title' => 'كاميرا ثلاثية الأبعاد'
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 20,
            'locale' => 'fr',
            'feature_title' => 'Caméra 3D'
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 20,
            'locale' => 'ru',
            'feature_title' => '3D-камера'
        ]);
        CarFeature::create([
            'car_id' => 4,
            'icon_html' => '<img src="'.url('/').'/frontend/image/Warning.png" alt="">',
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 21,
            'locale' => 'en',
            'feature_title' => 'Blind  Warning'
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 21,
            'locale' => 'ar',
            'feature_title' => 'تحذير أعمى'
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 21,
            'locale' => 'fr',
            'feature_title' => 'Avertissement aveugle'
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 21,
            'locale' => 'ru',
            'feature_title' => 'Слепое предупреждение'
        ]);
        CarFeature::create([
            'car_id' => 4,
            'icon_html' => '<img src="'.url('/').'/frontend/image/memory.png" alt="">',
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 22,
            'locale' => 'en',
            'feature_title' => 'Memory Front Seats'
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 22,
            'locale' => 'ar',
            'feature_title' => 'مقاعد أمامية بذاكرة'
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 22,
            'locale' => 'fr',
            'feature_title' => 'Sièges avant à mémoire'
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 22,
            'locale' => 'ru',
            'feature_title' => 'Передние сиденья с памятью'
        ]);
        CarFeature::create([
            'car_id' => 4,
            'icon_html' => '<img src="'.url('/').'/frontend/image/parking.png" alt="">',
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 23,
            'locale' => 'en',
            'feature_title' => 'Parking Assist'
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 23,
            'locale' => 'ar',
            'feature_title' => 'مساعدة وقوف السيارات'
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 23,
            'locale' => 'fr',
            'feature_title' => 'Aide au stationnement'
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 23,
            'locale' => 'ru',
            'feature_title' => 'Помощь при парковке'
        ]);
        CarFeature::create([
            'car_id' => 4,
            'icon_html' => '<img src="'.url('/').'/frontend/image/speedometer-icon.png" alt="">',
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 24,
            'locale' => 'en',
            'feature_title' => 'Adaptive Control'
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 24,
            'locale' => 'ar',
            'feature_title' => 'التحكم التكيفي'
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 24,
            'locale' => 'fr',
            'feature_title' => 'Contrôle adaptatif'
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 24,
            'locale' => 'ru',
            'feature_title' => 'Адаптивное управление'
        ]);

        CarFeature::create([
            'car_id' => 5,
            'icon_html' => '<img src="'.url('/').'/frontend/image/speedometer-icon.png" alt="">',
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 25,
            'locale' => 'en',
            'feature_title' => 'Cruise Control'
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 25,
            'locale' => 'ar',
            'feature_title' => 'مثبت السرعة'
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 25,
            'locale' => 'fr',
            'feature_title' => 'Régulateur de vitesse'
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 25,
            'locale' => 'ru',
            'feature_title' => 'Круиз-контроль'
        ]);
        CarFeature::create([
            'car_id' => 5,
            'icon_html' => '<img src="'.url('/').'/frontend/image/cam_icon.png" alt="">',
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 26,
            'locale' => 'en',
            'feature_title' => '3D Camera'
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 26,
            'locale' => 'ar',
            'feature_title' => 'كاميرا ثلاثية الأبعاد'
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 26,
            'locale' => 'fr',
            'feature_title' => 'Caméra 3D'
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 26,
            'locale' => 'ru',
            'feature_title' => '3D-камера'
        ]);
        CarFeature::create([
            'car_id' => 5,
            'icon_html' => '<img src="'.url('/').'/frontend/image/Warning.png" alt="">',
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 27,
            'locale' => 'en',
            'feature_title' => 'Blind  Warning'
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 27,
            'locale' => 'ar',
            'feature_title' => 'تحذير أعمى'
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 27,
            'locale' => 'fr',
            'feature_title' => 'Avertissement aveugle'
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 27,
            'locale' => 'ru',
            'feature_title' => 'Слепое предупреждение'
        ]);
        CarFeature::create([
            'car_id' => 5,
            'icon_html' => '<img src="'.url('/').'/frontend/image/memory.png" alt="">',
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 28,
            'locale' => 'en',
            'feature_title' => 'Memory Front Seats'
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 28,
            'locale' => 'ar',
            'feature_title' => 'مقاعد أمامية بذاكرة'
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 28,
            'locale' => 'fr',
            'feature_title' => 'Sièges avant à mémoire'
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 28,
            'locale' => 'ru',
            'feature_title' => 'Передние сиденья с памятью'
        ]);
        CarFeature::create([
            'car_id' => 5,
            'icon_html' => '<img src="'.url('/').'/frontend/image/parking.png" alt="">',
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 29,
            'locale' => 'en',
            'feature_title' => 'Parking Assist'
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 29,
            'locale' => 'ar',
            'feature_title' => 'مساعدة وقوف السيارات'
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 29,
            'locale' => 'fr',
            'feature_title' => 'Aide au stationnement'
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 29,
            'locale' => 'ru',
            'feature_title' => 'Помощь при парковке'
        ]);
        CarFeature::create([
            'car_id' => 5,
            'icon_html' => '<img src="'.url('/').'/frontend/image/speedometer-icon.png" alt="">',
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 30,
            'locale' => 'en',
            'feature_title' => 'Adaptive Control'
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 30,
            'locale' => 'ar',
            'feature_title' => 'التحكم التكيفي'
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 30,
            'locale' => 'fr',
            'feature_title' => 'Contrôle adaptatif'
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 30,
            'locale' => 'ru',
            'feature_title' => 'Адаптивное управление'
        ]);

        CarFeature::create([
            'car_id' => 7,
            'icon_html' => '<img src="'.url('/').'/frontend/image/speedometer-icon.png" alt="">',
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 31,
            'locale' => 'en',
            'feature_title' => 'Cruise Control'
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 31,
            'locale' => 'ar',
            'feature_title' => 'مثبت السرعة'
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 31,
            'locale' => 'fr',
            'feature_title' => 'Régulateur de vitesse'
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 31,
            'locale' => 'ru',
            'feature_title' => 'Круиз-контроль'
        ]);
        CarFeature::create([
            'car_id' => 7,
            'icon_html' => '<img src="'.url('/').'/frontend/image/cam_icon.png" alt="">',
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 32,
            'locale' => 'en',
            'feature_title' => '3D Camera'
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 32,
            'locale' => 'ar',
            'feature_title' => 'كاميرا ثلاثية الأبعاد'
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 32,
            'locale' => 'fr',
            'feature_title' => 'Caméra 3D'
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 32,
            'locale' => 'ru',
            'feature_title' => '3D-камера'
        ]);
        CarFeature::create([
            'car_id' => 7,
            'icon_html' => '<img src="'.url('/').'/frontend/image/Warning.png" alt="">',
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 33,
            'locale' => 'en',
            'feature_title' => 'Blind  Warning'
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 33,
            'locale' => 'ar',
            'feature_title' => 'تحذير أعمى'
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 33,
            'locale' => 'fr',
            'feature_title' => 'Avertissement aveugle'
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 33,
            'locale' => 'ru',
            'feature_title' => 'Слепое предупреждение'
        ]);
        CarFeature::create([
            'car_id' => 7,
            'icon_html' => '<img src="'.url('/').'/frontend/image/memory.png" alt="">',
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 34,
            'locale' => 'en',
            'feature_title' => 'Memory Front Seats'
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 34,
            'locale' => 'ar',
            'feature_title' => 'مقاعد أمامية بذاكرة'
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 34,
            'locale' => 'fr',
            'feature_title' => 'Sièges avant à mémoire'
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 34,
            'locale' => 'ru',
            'feature_title' => 'Передние сиденья с памятью'
        ]);
        CarFeature::create([
            'car_id' => 7,
            'icon_html' => '<img src="'.url('/').'/frontend/image/parking.png" alt="">',
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 35,
            'locale' => 'en',
            'feature_title' => 'Parking Assist'
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 35,
            'locale' => 'ar',
            'feature_title' => 'مساعدة وقوف السيارات'
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 35,
            'locale' => 'fr',
            'feature_title' => 'Aide au stationnement'
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 35,
            'locale' => 'ru',
            'feature_title' => 'Помощь при парковке'
        ]);
        CarFeature::create([
            'car_id' => 7,
            'icon_html' => '<img src="'.url('/').'/frontend/image/speedometer-icon.png" alt="">',
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 36,
            'locale' => 'en',
            'feature_title' => 'Adaptive Control'
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 36,
            'locale' => 'ar',
            'feature_title' => 'التحكم التكيفي'
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 36,
            'locale' => 'fr',
            'feature_title' => 'Contrôle adaptatif'
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 36,
            'locale' => 'ru',
            'feature_title' => 'Адаптивное управление'
        ]);

        CarFeature::create([
            'car_id' => 8,
            'icon_html' => '<img src="'.url('/').'/frontend/image/speedometer-icon.png" alt="">',
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 37,
            'locale' => 'en',
            'feature_title' => 'Cruise Control'
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 37,
            'locale' => 'ar',
            'feature_title' => 'مثبت السرعة'
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 37,
            'locale' => 'fr',
            'feature_title' => 'Régulateur de vitesse'
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 37,
            'locale' => 'ru',
            'feature_title' => 'Круиз-контроль'
        ]);
        CarFeature::create([
            'car_id' => 8,
            'icon_html' => '<img src="'.url('/').'/frontend/image/cam_icon.png" alt="">',
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 38,
            'locale' => 'en',
            'feature_title' => '3D Camera'
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 38,
            'locale' => 'ar',
            'feature_title' => 'كاميرا ثلاثية الأبعاد'
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 38,
            'locale' => 'fr',
            'feature_title' => 'Caméra 3D'
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 38,
            'locale' => 'ru',
            'feature_title' => '3D-камера'
        ]);
        CarFeature::create([
            'car_id' => 8,
            'icon_html' => '<img src="'.url('/').'/frontend/image/Warning.png" alt="">',
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 39,
            'locale' => 'en',
            'feature_title' => 'Blind  Warning'
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 39,
            'locale' => 'ar',
            'feature_title' => 'تحذير أعمى'
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 39,
            'locale' => 'fr',
            'feature_title' => 'Avertissement aveugle'
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 39,
            'locale' => 'ru',
            'feature_title' => 'Слепое предупреждение'
        ]);
        CarFeature::create([
            'car_id' => 8,
            'icon_html' => '<img src="'.url('/').'/frontend/image/memory.png" alt="">',
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 40,
            'locale' => 'en',
            'feature_title' => 'Memory Front Seats'
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 40,
            'locale' => 'ar',
            'feature_title' => 'مقاعد أمامية بذاكرة'
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 40,
            'locale' => 'fr',
            'feature_title' => 'Sièges avant à mémoire'
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 40,
            'locale' => 'ru',
            'feature_title' => 'Передние сиденья с памятью'
        ]);
        CarFeature::create([
            'car_id' => 8,
            'icon_html' => '<img src="'.url('/').'/frontend/image/parking.png" alt="">',
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 41,
            'locale' => 'en',
            'feature_title' => 'Parking Assist'
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 41,
            'locale' => 'ar',
            'feature_title' => 'مساعدة وقوف السيارات'
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 41,
            'locale' => 'fr',
            'feature_title' => 'Aide au stationnement'
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 41,
            'locale' => 'ru',
            'feature_title' => 'Помощь при парковке'
        ]);
        CarFeature::create([
            'car_id' => 8,
            'icon_html' => '<img src="'.url('/').'/frontend/image/speedometer-icon.png" alt="">',
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 42,
            'locale' => 'en',
            'feature_title' => 'Adaptive Control'
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 42,
            'locale' => 'ar',
            'feature_title' => 'التحكم التكيفي'
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 42,
            'locale' => 'fr',
            'feature_title' => 'Contrôle adaptatif'
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 42,
            'locale' => 'ru',
            'feature_title' => 'Адаптивное управление'
        ]);


        CarFeature::create([
            'car_id' => 9,
            'icon_html' => '<img src="'.url('/').'/frontend/image/speedometer-icon.png" alt="">',
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 43,
            'locale' => 'en',
            'feature_title' => 'Cruise Control'
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 43,
            'locale' => 'ar',
            'feature_title' => 'مثبت السرعة'
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 43,
            'locale' => 'fr',
            'feature_title' => 'Régulateur de vitesse'
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 43,
            'locale' => 'ru',
            'feature_title' => 'Круиз-контроль'
        ]);
        CarFeature::create([
            'car_id' => 9,
            'icon_html' => '<img src="'.url('/').'/frontend/image/cam_icon.png" alt="">',
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' =>44,
            'locale' => 'en',
            'feature_title' => '3D Camera'
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 44,
            'locale' => 'ar',
            'feature_title' => 'كاميرا ثلاثية الأبعاد'
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 44,
            'locale' => 'fr',
            'feature_title' => 'Caméra 3D'
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 44,
            'locale' => 'ru',
            'feature_title' => '3D-камера'
        ]);
        CarFeature::create([
            'car_id' => 9,
            'icon_html' => '<img src="'.url('/').'/frontend/image/Warning.png" alt="">',
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 43,
            'locale' => 'en',
            'feature_title' => 'Blind  Warning'
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 43,
            'locale' => 'ar',
            'feature_title' => 'تحذير أعمى'
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 43,
            'locale' => 'fr',
            'feature_title' => 'Avertissement aveugle'
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 43,
            'locale' => 'ru',
            'feature_title' => 'Слепое предупреждение'
        ]);
        CarFeature::create([
            'car_id' => 9,
            'icon_html' => '<img src="'.url('/').'/frontend/image/memory.png" alt="">',
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 44,
            'locale' => 'en',
            'feature_title' => 'Memory Front Seats'
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 44,
            'locale' => 'ar',
            'feature_title' => 'مقاعد أمامية بذاكرة'
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 44,
            'locale' => 'fr',
            'feature_title' => 'Sièges avant à mémoire'
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 44,
            'locale' => 'ru',
            'feature_title' => 'Передние сиденья с памятью'
        ]);
        CarFeature::create([
            'car_id' => 9,
            'icon_html' => '<img src="'.url('/').'/frontend/image/parking.png" alt="">',
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 45,
            'locale' => 'en',
            'feature_title' => 'Parking Assist'
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 45,
            'locale' => 'ar',
            'feature_title' => 'مساعدة وقوف السيارات'
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 45,
            'locale' => 'fr',
            'feature_title' => 'Aide au stationnement'
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 45,
            'locale' => 'ru',
            'feature_title' => 'Помощь при парковке'
        ]);
        CarFeature::create([
            'car_id' => 9,
            'icon_html' => '<img src="'.url('/').'/frontend/image/speedometer-icon.png" alt="">',
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 46,
            'locale' => 'en',
            'feature_title' => 'Adaptive Control'
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 46,
            'locale' => 'ar',
            'feature_title' => 'التحكم التكيفي'
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 46,
            'locale' => 'fr',
            'feature_title' => 'Contrôle adaptatif'
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 46,
            'locale' => 'ru',
            'feature_title' => 'Адаптивное управление'
        ]);

        CarFeature::create([
            'car_id' => 6,
            'icon_html' => '<img src="'.url('/').'/frontend/image/speedometer-icon.png" alt="">',
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 47,
            'locale' => 'en',
            'feature_title' => 'Cruise Control'
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 47,
            'locale' => 'ar',
            'feature_title' => 'مثبت السرعة'
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 47,
            'locale' => 'fr',
            'feature_title' => 'Régulateur de vitesse'
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 47,
            'locale' => 'ru',
            'feature_title' => 'Круиз-контроль'
        ]);
        CarFeature::create([
            'car_id' => 6,
            'icon_html' => '<img src="'.url('/').'/frontend/image/cam_icon.png" alt="">',
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 48,
            'locale' => 'en',
            'feature_title' => '3D Camera'
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 48,
            'locale' => 'ar',
            'feature_title' => 'كاميرا ثلاثية الأبعاد'
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 48,
            'locale' => 'fr',
            'feature_title' => 'Caméra 3D'
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 48,
            'locale' => 'ru',
            'feature_title' => '3D-камера'
        ]);
        CarFeature::create([
            'car_id' => 6,
            'icon_html' => '<img src="'.url('/').'/frontend/image/Warning.png" alt="">',
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 49,
            'locale' => 'en',
            'feature_title' => 'Blind  Warning'
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 49,
            'locale' => 'ar',
            'feature_title' => 'تحذير أعمى'
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 49,
            'locale' => 'fr',
            'feature_title' => 'Avertissement aveugle'
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 49,
            'locale' => 'ru',
            'feature_title' => 'Слепое предупреждение'
        ]);
        CarFeature::create([
            'car_id' => 6,
            'icon_html' => '<img src="'.url('/').'/frontend/image/memory.png" alt="">',
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 50,
            'locale' => 'en',
            'feature_title' => 'Memory Front Seats'
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 50,
            'locale' => 'ar',
            'feature_title' => 'مقاعد أمامية بذاكرة'
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 50,
            'locale' => 'fr',
            'feature_title' => 'Sièges avant à mémoire'
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 50,
            'locale' => 'ru',
            'feature_title' => 'Передние сиденья с памятью'
        ]);
        CarFeature::create([
            'car_id' => 6,
            'icon_html' => '<img src="'.url('/').'/frontend/image/parking.png" alt="">',
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 51,
            'locale' => 'en',
            'feature_title' => 'Parking Assist'
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 51,
            'locale' => 'ar',
            'feature_title' => 'مساعدة وقوف السيارات'
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 51,
            'locale' => 'fr',
            'feature_title' => 'Aide au stationnement'
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 51,
            'locale' => 'ru',
            'feature_title' => 'Помощь при парковке'
        ]);
        CarFeature::create([
            'car_id' => 6,
            'icon_html' => '<img src="'.url('/').'/frontend/image/speedometer-icon.png" alt="">',
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 52,
            'locale' => 'en',
            'feature_title' => 'Adaptive Control'
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 52,
            'locale' => 'ar',
            'feature_title' => 'التحكم التكيفي'
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 52,
            'locale' => 'fr',
            'feature_title' => 'Contrôle adaptatif'
        ]);
        CarFeatureTranslation::create([
            'car_feature_id' => 52,
            'locale' => 'ru',
            'feature_title' => 'Адаптивное управление'
        ]);
    }
}
