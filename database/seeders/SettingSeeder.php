<?php

namespace Database\Seeders;

use App\Models\Setting;
use App\Models\SettingTranslation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Setting::create([
            /*'name' => 'logo',
            'val' => 'logo.png',*/
            'type' => 'image',
            'section' => 'header',
            'is_only_english' => 'yes',
        ]);
        SettingTranslation::create([
            'setting_id' => '1',
            'locale' => 'en',
            'name' => 'logo',
            'val' => 'logo.png',
        ]);

        Setting::create([
            'type' => 'email',
            'section' => 'header',
            'is_only_english' => 'yes',
        ]);
        SettingTranslation::create([
            'setting_id' => '2',
            'locale' => 'en',
            'name' => 'email',
            'val' => 'info@friendscaruae.com',
        ]);

        Setting::create([
            'type' => 'social_link',
            'section' => 'header',
            'is_only_english' => 'yes',
        ]);
        SettingTranslation::create([
            'setting_id' => '3',
            'locale' => 'en',
            'name' => 'facebook_url',
            'val' => 'https://www.facebook.com/friendscarsrental/',
        ]);

        Setting::create([
            'type' => 'social_link',
            'section' => 'header',
            'is_only_english' => 'yes',
        ]);
        SettingTranslation::create([
            'setting_id' => '4',
            'locale' => 'en',
            'name' => 'instagram_url',
            'val' => 'https://www.instagram.com/friendscars/',
        ]);

        Setting::create([
            'type' => 'social_link',
            'section' => 'header',
            'is_only_english' => 'yes',
        ]);
        SettingTranslation::create([
            'setting_id' => '5',
            'locale' => 'en',
            'name' => 'snapchat_url',
            'val' => 'https://www.snapchat.com/add/friendscars',
        ]);

        Setting::create([
            'type' => 'social_link',
            'section' => 'header',
            'is_only_english' => 'yes',
        ]);
        SettingTranslation::create([
            'setting_id' => '6',
            'locale' => 'en',
            'name' => 'youtube_url',
            'val' => 'https://www.youtube.com/@friendscarrental',
        ]);

        Setting::create([
            'type' => 'social_link',
            'section' => 'header',
            'is_only_english' => 'yes',
        ]);
        SettingTranslation::create([
            'setting_id' => '7',
            'locale' => 'en',
            'name' => 'linkedin_url',
            'val' => 'https://www.linkedin.com/company/friends-car-rental-llc/',
        ]);

        Setting::create([
            'type' => 'social_link',
            'section' => 'header',
            'is_only_english' => 'yes',
        ]);
        SettingTranslation::create([
            'setting_id' => '8',
            'locale' => 'en',
            'name' => 'twitter_url',
            'val' => 'https://twitter.com/friendsrental',
        ]);

        Setting::create([
            'type' => 'quick_link',
            'section' => 'header',
            'is_only_english' => 'no',
        ]);
        SettingTranslation::create([
            'setting_id' => '9',
            'locale' => 'en',
            'name' => 'Seven Seater  Car Rentals in Dubai',
            'val' => '#',
        ]);
        SettingTranslation::create([
            'setting_id' => '9',
            'locale' => 'ar',
            'name' => 'سبعة مقاعد لتأجير السيارات في دبي',
            'val' => '#',
        ]);
        SettingTranslation::create([
            'setting_id' => '9',
            'locale' => 'fr',
            'name' => 'Location de Voitures Sept Places à Dubaï',
            'val' => '#',
        ]);
        SettingTranslation::create([
            'setting_id' => '9',
            'locale' => 'ru',
            'name' => 'Аренда семиместных автомобилей в Дубае',
            'val' => '#',
        ]);

        Setting::create([
            'type' => 'quick_link',
            'section' => 'header',
            'is_only_english' => 'no',
        ]);
        SettingTranslation::create([
            'setting_id' => '10',
            'locale' => 'en',
            'name' => 'Weekly Car Rentals in Dubai',
            'val' => '#',
        ]);
        SettingTranslation::create([
            'setting_id' => '10',
            'locale' => 'ar',
            'name' => 'تأجير السيارات الأسبوعي في دبي',
            'val' => '#',
        ]);
        SettingTranslation::create([
            'setting_id' => '10',
            'locale' => 'fr',
            'name' => 'Location de voiture à la semaine à Dubaï',
            'val' => '#',
        ]);
        SettingTranslation::create([
            'setting_id' => '10',
            'locale' => 'ru',
            'name' => 'Еженедельная аренда автомобилей в Дубае',
            'val' => '#',
        ]);

        Setting::create([
            'type' => 'quick_link',
            'section' => 'header',
            'is_only_english' => 'no',
        ]);
        SettingTranslation::create([
            'setting_id' => '11',
            'locale' => 'en',
            'name' => 'Monthly Car Rentals in Dubai',
            'val' => '#',
        ]);
        SettingTranslation::create([
            'setting_id' => '11',
            'locale' => 'ar',
            'name' => 'تأجير السيارات الشهري في دبي',
            'val' => '#',
        ]);
        SettingTranslation::create([
            'setting_id' => '11',
            'locale' => 'fr',
            'name' => 'Location de voiture au mois à Dubaï',
            'val' => '#',
        ]);
        SettingTranslation::create([
            'setting_id' => '11',
            'locale' => 'ru',
            'name' => 'Ежемесячная аренда автомобилей в Дубае',
            'val' => '#',
        ]);

        Setting::create([
            'type' => 'quick_link',
            'section' => 'header',
            'is_only_english' => 'no',
        ]);
        SettingTranslation::create([
            'setting_id' => '12',
            'locale' => 'en',
            'name' => 'BUGGY RENTAL IN DUBAI',
            'val' => '#',
        ]);
        SettingTranslation::create([
            'setting_id' => '12',
            'locale' => 'ar',
            'name' => 'تأجير بوجي في دبي',
            'val' => '#',
        ]);
        SettingTranslation::create([
            'setting_id' => '12',
            'locale' => 'fr',
            'name' => 'LOCATION DE BUGGY À DUBAÏ',
            'val' => '#',
        ]);
        SettingTranslation::create([
            'setting_id' => '12',
            'locale' => 'ru',
            'name' => 'АРЕНДА БАГГИ В ДУБАЕ',
            'val' => '#',
        ]);

        Setting::create([
            'type' => 'quick_link',
            'section' => 'header',
            'is_only_english' => 'no',
        ]);
        SettingTranslation::create([
            'setting_id' => '13',
            'locale' => 'en',
            'name' => 'SUV Rentals in Dubai',
            'val' => '#',
        ]);
        SettingTranslation::create([
            'setting_id' => '13',
            'locale' => 'ar',
            'name' => 'تأجير سيارات الدفع الرباعي في دبي',
            'val' => '#',
        ]);
        SettingTranslation::create([
            'setting_id' => '13',
            'locale' => 'fr',
            'name' => 'Location de SUV à Dubaï',
            'val' => '#',
        ]);
        SettingTranslation::create([
            'setting_id' => '13',
            'locale' => 'ru',
            'name' => 'Аренда внедорожников в Дубае',
            'val' => '#',
        ]);

        Setting::create([
            'type' => 'quick_link',
            'section' => 'header',
            'is_only_english' => 'no',
        ]);
        SettingTranslation::create([
            'setting_id' => '14',
            'locale' => 'en',
            'name' => 'Luxury Car Rentals in Dubai',
            'val' => '#',
        ]);
        SettingTranslation::create([
            'setting_id' => '14',
            'locale' => 'ar',
            'name' => 'تأجير السيارات الفخمة في دبي',
            'val' => '#',
        ]);
        SettingTranslation::create([
            'setting_id' => '14',
            'locale' => 'fr',
            'name' => 'Location de voitures de luxe à Dubaï',
            'val' => '#',
        ]);
        SettingTranslation::create([
            'setting_id' => '14',
            'locale' => 'ru',
            'name' => 'Аренда роскошных автомобилей в Дубае',
            'val' => '#',
        ]);

        Setting::create([
            'type' => 'quick_link',
            'section' => 'header',
            'is_only_english' => 'no',
        ]);
        SettingTranslation::create([
            'setting_id' => '15',
            'locale' => 'en',
            'name' => 'Medium-range Cars in Dubai',
            'val' => '#',
        ]);
        SettingTranslation::create([
            'setting_id' => '15',
            'locale' => 'ar',
            'name' => 'سيارات متوسطة المدى في دبي',
            'val' => '#',
        ]);
        SettingTranslation::create([
            'setting_id' => '15',
            'locale' => 'fr',
            'name' => 'Voitures de gamme moyenne à Dubaï',
            'val' => '#',
        ]);
        SettingTranslation::create([
            'setting_id' => '15',
            'locale' => 'ru',
            'name' => 'Автомобили среднего класса в Дубае',
            'val' => '#',
        ]);

        Setting::create([
            'type' => 'quick_link',
            'section' => 'header',
            'is_only_english' => 'no',
        ]);
        SettingTranslation::create([
            'setting_id' => '16',
            'locale' => 'en',
            'name' => 'Economy Car Rentals in Dubai',
            'val' => '#',
        ]);
        SettingTranslation::create([
            'setting_id' => '16',
            'locale' => 'ar',
            'name' => 'تأجير السيارات الاقتصادية في دبي',
            'val' => '#',
        ]);
        SettingTranslation::create([
            'setting_id' => '16',
            'locale' => 'fr',
            'name' => 'Location de voiture économique à Dubaï',
            'val' => '#',
        ]);
        SettingTranslation::create([
            'setting_id' => '16',
            'locale' => 'ru',
            'name' => 'Аренда автомобилей эконом-класса в Дубае',
            'val' => '#',
        ]);


        Setting::create([
            'type' => 'quick_link',
            'section' => 'header',
            'is_only_english' => 'no',
        ]);
        SettingTranslation::create([
            'setting_id' => '17',
            'locale' => 'en',
            'name' => 'Sports Car Rentals in Dubai',
            'val' => '#',
        ]);
        SettingTranslation::create([
            'setting_id' => '17',
            'locale' => 'ar',
            'name' => 'تأجير السيارات الرياضية في دبي',
            'val' => '#',
        ]);
        SettingTranslation::create([
            'setting_id' => '17',
            'locale' => 'fr',
            'name' => 'Location de Voiture de Sport dans Dubaï',
            'val' => '#',
        ]);
        SettingTranslation::create([
            'setting_id' => '17',
            'locale' => 'ru',
            'name' => 'Аренда спортивных автомобилей в Дубае',
            'val' => '#',
        ]);

        Setting::create([
            'type' => 'quick_link',
            'section' => 'header',
            'is_only_english' => 'no',
        ]);
        SettingTranslation::create([
            'setting_id' => '18',
            'locale' => 'en',
            'name' => 'Convertible Car Rentals in Dubai',
            'val' => '#',
        ]);SettingTranslation::create([
        'setting_id' => '18',
        'locale' => 'ar',
        'name' => 'تأجير السيارات المكشوفة في دبي',
        'val' => '#',
    ]);
        SettingTranslation::create([
            'setting_id' => '18',
            'locale' => 'fr',
            'name' => 'Location de voitures décapotables à Dubaï',
            'val' => '#',
        ]);
        SettingTranslation::create([
            'setting_id' => '18',
            'locale' => 'ru',
            'name' => 'Аренда кабриолетов в Дубае',
            'val' => '#',
        ]);

        Setting::create([
            'type' => 'apple_link',
            'section' => 'header',
            'is_only_english' => 'yes',
        ]);
        SettingTranslation::create([
            'setting_id' => '19',
            'locale' => 'en',
            'name' => 'apple_link',
            'val' => '#',
        ]);

        Setting::create([
            'type' => 'apple_image',
            'section' => 'header',
            'is_only_english' => 'yes',
        ]);
        SettingTranslation::create([
            'setting_id' => '20',
            'locale' => 'en',
            'name' => 'apple_image',
            'val' => 'apple-app-store-logo-m.jpg',
        ]);

        Setting::create([
            'type' => 'google_play_link',
            'section' => 'header',
            'is_only_english' => 'yes',
        ]);
        SettingTranslation::create([
            'setting_id' => '21',
            'locale' => 'en',
            'name' => 'google_play_link',
            'val' => '#',
        ]);

        Setting::create([
            'type' => 'google_play_image',
            'section' => 'header',
            'is_only_english' => 'yes',
        ]);
        SettingTranslation::create([
            'setting_id' => '22',
            'locale' => 'en',
            'name' => 'google_play_image',
            'val' => 'google-icon-m.png',
        ]);

        Setting::create([
            'type' => 'phone_no',
            'section' => 'footer',
            'is_only_english' => 'yes',
        ]);
        SettingTranslation::create([
            'setting_id' => '23',
            'locale' => 'en',
            'name' => 'phone_no',
            'val' => '+971555343340',
        ]);

        Setting::create([
            'type' => 'image',
            'section' => 'footer',
            'is_only_english' => 'yes',
        ]);
        SettingTranslation::create([
            'setting_id' => '24',
            'locale' => 'en',
            'name' => 'logo',
            'val' => 'logo.png',
        ]);

        Setting::create([
            'type' => 'email',
            'section' => 'footer',
            'is_only_english' => 'yes',
        ]);
        SettingTranslation::create([
            'setting_id' => '25',
            'locale' => 'en',
            'name' => 'email',
            'val' => 'info@friendscaruae.com',
        ]);

        Setting::create([
            'type' => 'address',
            'section' => 'footer',
            'is_only_english' => 'no',
        ]);
        SettingTranslation::create([
            'setting_id' => '26',
            'locale' => 'en',
            'name' => 'address',
            'val' => 'Rs3, Al Murooj Complex, Al Mustaqbal St.- Dubai Downtown - Uae',
        ]);
        SettingTranslation::create([
            'setting_id' => '26',
            'locale' => 'ar',
            'name' => 'address',
            'val' => 'Rs3 ، مجمع المروج ، شارع المستقبل - وسط مدينة دبي - الإمارات العربية المتحدة',
        ]);
        SettingTranslation::create([
            'setting_id' => '26',
            'locale' => 'fr',
            'name' => 'address',
            'val' => 'Rs3, complexe Al Murooj, rue Al Mustaqbal - centre-ville de Dubaï - Émirats arabes unis',
        ]);
        SettingTranslation::create([
            'setting_id' => '26',
            'locale' => 'ru',
            'name' => 'address',
            'val' => 'Rs3, complexe Al Murooj, rue Al Mustaqbal - centre-ville de Dubaï - Émirats arabes unis',
        ]);

        Setting::create([
            'type' => 'apple_link',
            'section' => 'footer',
            'is_only_english' => 'yes',
        ]);
        SettingTranslation::create([
            'setting_id' => '27',
            'locale' => 'en',
            'name' => 'apple_link',
            'val' => '#',
        ]);

        Setting::create([
            'type' => 'apple_image',
            'section' => 'footer',
            'is_only_english' => 'yes',
        ]);
        SettingTranslation::create([
            'setting_id' => '28',
            'locale' => 'en',
            'name' => 'apple_image',
            'val' => 'apple_icon.png',
        ]);

        Setting::create([
            'type' => 'google_play_link',
            'section' => 'footer',
            'is_only_english' => 'yes',
        ]);
        SettingTranslation::create([
            'setting_id' => '29',
            'locale' => 'en',
            'name' => 'google_play_link',
            'val' => '#',
        ]);

        Setting::create([
            'type' => 'google_play_image',
            'section' => 'footer',
            'is_only_english' => 'yes',
        ]);
        SettingTranslation::create([
            'setting_id' => '30',
            'locale' => 'en',
            'name' => 'google_play_image',
            'val' => 'gpay_new.png',
        ]);

        Setting::create([
            'type' => 'sec_one_q_link',
            'section' => 'footer',
            'is_only_english' => 'no',
        ]);
        SettingTranslation::create([
            'setting_id' => '31',
            'locale' => 'en',
            'name' => 'Car Rental FAQs',
            'val' => 'faq',
        ]);SettingTranslation::create([
        'setting_id' => '31',
        'locale' => 'ar',
        'name' => 'الأسئلة الشائعة حول تأجير السيارات',
        'val' => 'faq',
    ]);
        SettingTranslation::create([
            'setting_id' => '31',
            'locale' => 'fr',
            'name' => 'FAQ sur la location de voiture',
            'val' => 'faq',
        ]);
        SettingTranslation::create([
            'setting_id' => '31',
            'locale' => 'ru',
            'name' => 'Часто задаваемые вопросы по аренде автомобилей',
            'val' => 'faq',
        ]);

        Setting::create([
            'type' => 'sec_one_q_link',
            'section' => 'footer',
            'is_only_english' => 'no',
        ]);
        SettingTranslation::create([
            'setting_id' => '32',
            'locale' => 'en',
            'name' => 'Blog',
            'val' => '#',
        ]);
        SettingTranslation::create([
            'setting_id' => '32',
            'locale' => 'ar',
            'name' => 'مدونة',
            'val' => '#',
        ]);
        SettingTranslation::create([
            'setting_id' => '32',
            'locale' => 'fr',
            'name' => 'Blog',
            'val' => '#',
        ]);
        SettingTranslation::create([
            'setting_id' => '32',
            'locale' => 'ru',
            'name' => 'Блог',
            'val' => '#',
        ]);

        Setting::create([
            'type' => 'sec_one_q_link',
            'section' => 'footer',
            'is_only_english' => 'no',
        ]);
        SettingTranslation::create([
            'setting_id' => '33',
            'locale' => 'en',
            'name' => 'Rent By Brand',
            'val' => '#',
        ]);
        SettingTranslation::create([
            'setting_id' => '33',
            'locale' => 'ar',
            'name' => 'الإيجار بالعلامة التجارية',
            'val' => '#',
        ]);
        SettingTranslation::create([
            'setting_id' => '33',
            'locale' => 'fr',
            'name' => 'Louer par marque',
            'val' => '#',
        ]);
        SettingTranslation::create([
            'setting_id' => '33',
            'locale' => 'ru',
            'name' => 'Аренда по бренду',
            'val' => '#',
        ]);

        Setting::create([
            'type' => 'sec_second_q_link',
            'section' => 'footer',
            'is_only_english' => 'no',
        ]);
        SettingTranslation::create([
            'setting_id' => '34',
            'locale' => 'en',
            'name' => 'About Us',
            'val' => '#',
        ]);
        SettingTranslation::create([
            'setting_id' => '34',
            'locale' => 'ar',
            'name' => 'معلومات عنا',
            'val' => '#',
        ]);
        SettingTranslation::create([
            'setting_id' => '34',
            'locale' => 'fr',
            'name' => 'À propos de nous',
            'val' => '#',
        ]);
        SettingTranslation::create([
            'setting_id' => '34',
            'locale' => 'ru',
            'name' => 'О нас',
            'val' => '#',
        ]);

        Setting::create([
            'type' => 'sec_second_q_link',
            'section' => 'footer',
            'is_only_english' => 'no',
        ]);
        SettingTranslation::create([
            'setting_id' => '35',
            'locale' => 'en',
            'name' => 'Terms & Conditions',
            'val' => '#',
        ]);
        SettingTranslation::create([
            'setting_id' => '35',
            'locale' => 'ar',
            'name' => 'البنود و الظروف',
            'val' => '#',
        ]);
        SettingTranslation::create([
            'setting_id' => '35',
            'locale' => 'fr',
            'name' => 'termes et conditions',
            'val' => '#',
        ]);
        SettingTranslation::create([
            'setting_id' => '35',
            'locale' => 'ru',
            'name' => 'Условия',
            'val' => '#',
        ]);

        Setting::create([
            'type' => 'sec_second_q_link',
            'section' => 'footer',
            'is_only_english' => 'no',
        ]);
        SettingTranslation::create([
            'setting_id' => '36',
            'locale' => 'en',
            'name' => 'Car Rental Policy',
            'val' => '#',
        ]);
        SettingTranslation::create([
            'setting_id' => '36',
            'locale' => 'ar',
            'name' => 'سياسة تأجير السيارات',
            'val' => '#',
        ]);
        SettingTranslation::create([
            'setting_id' => '36',
            'locale' => 'fr',
            'name' => 'Politique de location de voiture',
            'val' => '#',
        ]);
        SettingTranslation::create([
            'setting_id' => '36',
            'locale' => 'ru',
            'name' => 'Политика аренды автомобилей',
            'val' => '#',
        ]);

        Setting::create([
            'type' => 'sec_second_q_link',
            'section' => 'footer',
            'is_only_english' => 'no',
        ]);
        SettingTranslation::create([
            'setting_id' => '37',
            'locale' => 'en',
            'name' => 'Terms Of Use',
            'val' => '#',
        ]);
        SettingTranslation::create([
            'setting_id' => '37',
            'locale' => 'ar',
            'name' => 'شروط الاستخدام',
            'val' => '#',
        ]);
        SettingTranslation::create([
            'setting_id' => '37',
            'locale' => 'fr',
            'name' => "Conditions d'utilisation",
            'val' => '#',
        ]);
        SettingTranslation::create([
            'setting_id' => '37',
            'locale' => 'ru',
            'name' => 'Условия эксплуатации',
            'val' => '#',
        ]);

        Setting::create([
            'type' => 'sec_second_q_link',
            'section' => 'footer',
            'is_only_english' => 'no',
        ]);
        SettingTranslation::create([
            'setting_id' => '38',
            'locale' => 'en',
            'name' => 'Contact Us',
            'val' => '#',
        ]);
        SettingTranslation::create([
            'setting_id' => '38',
            'locale' => 'ar',
            'name' => 'اتصل بنا',
            'val' => '#',
        ]);
        SettingTranslation::create([
            'setting_id' => '38',
            'locale' => 'fr',
            'name' => 'Contactez-nous',
            'val' => '#',
        ]);
        SettingTranslation::create([
            'setting_id' => '38',
            'locale' => 'ru',
            'name' => 'Связаться с нами',
            'val' => '#',
        ]);

        Setting::create([
            'type' => 'map',
            'section' => 'footer',
            'is_only_english' => 'yes',
        ]);
        SettingTranslation::create([
            'setting_id' => '39',
            'locale' => 'en',
            'name' => 'embeded_map_url',
            'val' => 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14880.533600125722!2d72.790108!3d21.186859!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be04dce4cc91805%3A0x5836095c3d07ac53!2sVPN%20INFOTECH%20-%20Top%20Rated%20IT%20Company%20in%20Surat%20India!5e0!3m2!1sen!2sin!4v1680674899286!5m2!1sen!2sin',
        ]);

        Setting::create([
            'type' => 'social_link',
            'section' => 'footer',
            'is_only_english' => 'yes',
        ]);
        SettingTranslation::create([
            'setting_id' => '40',
            'locale' => 'en',
            'name' => 'facebook_url',
            'val' => 'https://www.facebook.com/friendscarsrental/',
        ]);

        Setting::create([
            'type' => 'social_link',
            'section' => 'footer',
            'is_only_english' => 'yes',
        ]);
        SettingTranslation::create([
            'setting_id' => '41',
            'locale' => 'en',
            'name' => 'instagram_url',
            'val' => 'https://www.instagram.com/friendscars/',
        ]);

        Setting::create([
            'type' => 'social_link',
            'section' => 'footer',
            'is_only_english' => 'yes',
        ]);
        SettingTranslation::create([
            'setting_id' => '42',
            'locale' => 'en',
            'name' => 'snapchat_url',
            'val' => 'https://www.snapchat.com/add/friendscars',
        ]);

        Setting::create([
            'type' => 'social_link',
            'section' => 'footer',
            'is_only_english' => 'yes',
        ]);
        SettingTranslation::create([
            'setting_id' => '43',
            'locale' => 'en',
            'name' => 'youtube_url',
            'val' => 'https://www.youtube.com/@friendscarrental',
        ]);


        Setting::create([
            'type' => 'social_link',
            'section' => 'footer',
            'is_only_english' => 'yes',
        ]);
        SettingTranslation::create([
            'setting_id' => '44',
            'locale' => 'en',
            'name' => 'linkedin_url',
            'val' => 'https://www.linkedin.com/company/friends-car-rental-llc/',
        ]);

        Setting::create([
            'type' => 'social_link',
            'section' => 'footer',
            'is_only_english' => 'yes',
        ]);
        SettingTranslation::create([
            'setting_id' => '45',
            'locale' => 'en',
            'name' => 'twitter_url',
            'val' => 'https://www.linkedin.com/company/friends-car-rental-llc/',
        ]);
        Setting::create([
            'type' => 'string',
            'section' => 'footer',
            'is_only_english' => 'yes',
        ]);
        SettingTranslation::create([
            'setting_id' => '46',
            'locale' => 'en',
            'name' => 'email',
            'val' => 'test.vpninfotech@gmail.com',
        ]);

        Setting::create([
            'type' => 'phone_no',
            'section' => 'contact_us',
            'is_only_english' => 'yes',
        ]);
        SettingTranslation::create([
            'setting_id' => '47',
            'locale' => 'en',
            'name' => 'phone_no',
            'val' => '+971555343340',
        ]);

        Setting::create([
            'type' => 'email',
            'section' => 'contact_us',
            'is_only_english' => 'yes',
        ]);
        SettingTranslation::create([
            'setting_id' => '48',
            'locale' => 'en',
            'name' => 'email',
            'val' => 'info@friendscaruae.com',
        ]);

        Setting::create([
            'type' => 'map',
            'section' => 'contact_us',
            'is_only_english' => 'yes',
        ]);
        SettingTranslation::create([
            'setting_id' => '49',
            'locale' => 'en',
            'name' => 'embeded_map_url',
            'val' => 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14880.533600125722!2d72.790108!3d21.186859!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be04dce4cc91805%3A0x5836095c3d07ac53!2sVPN%20INFOTECH%20-%20Top%20Rated%20IT%20Company%20in%20Surat%20India!5e0!3m2!1sen!2sin!4v1680674899286!5m2!1sen!2sin',
        ]);

        Setting::create([
            'type' => 'address',
            'section' => 'contact_us',
            'is_only_english' => 'no',
        ]);
        SettingTranslation::create([
            'setting_id' => '50',
            'locale' => 'en',
            'name' => 'address',
            'val' => 'Rs3, Al Murooj Complex, Al Mustaqbal St.- Dubai Downtown - Uae',
        ]);
        SettingTranslation::create([
            'setting_id' => '50',
            'locale' => 'ar',
            'name' => 'address',
            'val' => 'Rs3 ، مجمع المروج ، شارع المستقبل - وسط مدينة دبي - الإمارات العربية المتحدة',
        ]);
        SettingTranslation::create([
            'setting_id' => '50',
            'locale' => 'fr',
            'name' => 'address',
            'val' => 'Rs3, complexe Al Murooj, rue Al Mustaqbal - centre-ville de Dubaï - Émirats arabes unis',
        ]);
        SettingTranslation::create([
            'setting_id' => '50',
            'locale' => 'ru',
            'name' => 'address',
            'val' => 'Rs3, complexe Al Murooj, rue Al Mustaqbal - centre-ville de Dubaï - Émirats arabes unis',
        ]);


        Setting::create([
            'type' => 'meta_name',
            'section' => 'common',
            'is_only_english' => 'no',
        ]);
        SettingTranslation::create([
            'setting_id' => '51',
            'locale' => 'en',
            'name' => 'meta_name',
            'val' => 'Friend Car Rental',
        ]);
        SettingTranslation::create([
            'setting_id' => '51',
            'locale' => 'ar',
            'name' => 'meta_name',
            'val' => 'صديق لتأجير السيارات',
        ]);
        SettingTranslation::create([
            'setting_id' => '51',
            'locale' => 'fr',
            'name' => 'meta_name',
            'val' => 'Location de voiture ami',
        ]);
        SettingTranslation::create([
            'setting_id' => '51',
            'locale' => 'ru',
            'name' => 'meta_name',
            'val' => 'Друг Прокат автомобилей',
        ]);

        

        Setting::create([
            'type' => 'meta_desciption',
            'section' => 'common',
            'is_only_english' => 'no',
        ]);
        SettingTranslation::create([
            'setting_id' => '52',
            'locale' => 'en',
            'name' => 'meta_desciption',
            'val' => 'Friend Car Rental',
        ]);
        SettingTranslation::create([
            'setting_id' => '52',
            'locale' => 'ar',
            'name' => 'meta_desciption',
            'val' => 'صديق لتأجير السيارات',
        ]);
        SettingTranslation::create([
            'setting_id' => '52',
            'locale' => 'fr',
            'name' => 'meta_desciption',
            'val' => 'Location de voiture ami',
        ]);
        SettingTranslation::create([
            'setting_id' => '52',
            'locale' => 'ru',
            'name' => 'meta_desciption',
            'val' => 'Друг Прокат автомобилей',
        ]);

        Setting::create([
            'type' => 'meta_keyword',
            'section' => 'common',
            'is_only_english' => 'no',
        ]);
        SettingTranslation::create([
            'setting_id' => '53',
            'locale' => 'en',
            'name' => 'meta_keyword',
            'val' => 'Friend Car Rental',
        ]);
        SettingTranslation::create([
            'setting_id' => '53',
            'locale' => 'ar',
            'name' => 'meta_keyword',
            'val' => 'صديق لتأجير السيارات',
        ]);
        SettingTranslation::create([
            'setting_id' => '53',
            'locale' => 'fr',
            'name' => 'meta_keyword',
            'val' => 'Location de voiture ami',
        ]);
        SettingTranslation::create([
            'setting_id' => '53',
            'locale' => 'ru',
            'name' => 'meta_keyword',
            'val' => 'Друг Прокат автомобилей',
        ]);

        Setting::create([
            'type' => 'whatsapp_number',
            'section' => 'whatsapp_section',
            'is_only_english' => 'no',
        ]);
        SettingTranslation::create([
            'setting_id' => '54',
            'locale' => 'en',
            'name' => 'whatsapp_number',
            'val' => '+971555343320',
        ]);
        SettingTranslation::create([
            'setting_id' => '54',
            'locale' => 'ar',
            'name' => 'whatsapp_number',
            'val' => '+971555343330',
        ]);
        SettingTranslation::create([
            'setting_id' => '54',
            'locale' => 'fr',
            'name' => 'whatsapp_number',
            'val' => '+971555343340',
        ]);
        SettingTranslation::create([
            'setting_id' => '54',
            'locale' => 'ru',
            'name' => 'whatsapp_number',
            'val' => '+971555343360',
        ]);
    }
}
