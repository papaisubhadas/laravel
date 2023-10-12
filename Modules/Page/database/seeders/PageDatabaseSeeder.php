<?php

namespace Modules\Page\database\seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Modules\Page\Models\Page;
use Modules\Page\Models\PageTranslation;

class PageDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        // Disable foreign key checks!
        //        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        //
        //        /*
        //         * Pages Seed
        //         * ------------------
        //         */
        //
        //        // DB::table('pages')->truncate();
        //        // echo "Truncate: pages \n";
        //
        //        Page::factory()->count(20)->create();
        //        $rows = Page::all();
        //        echo " Insert: pages \n\n";
        //
        //        // Enable foreign key checks!
        //        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        Page::create([
            'slug' => 'company-service',
            'type' => 'section',
        ]);

        Page::create([
            'slug' => 'about-us',
            'type' => 'section',
        ]);

        Page::create([
            'slug' => 'car-rent-rule',
            'type' => 'section',
        ]);

        Page::create([
            'slug' => 'why-choose-us',
            'type' => 'section',
        ]);

        Page::create([
            'slug' => 'driving-license',
            'type' => 'page',
        ]);

        Page::create([
            'slug' => 'required-documents',
            'type' => 'section',
        ]);

        PageTranslation::create([
            'page_id' => '1',
            'locale' => 'en',
            'page_name' => 'Company Service',
            'page_title' => 'Company Service',
            'page_body' => '<section class="company_service">
                                <div class="container">
            <div class="all_service">
                <div class="service_list">
                    <img src="http://friends-car-rental.local/frontend/image/service_1.png" alt="">
                    <p>Luxury Selection</p>
                </div>
                <div class="service_list">
                    <img src="http://friends-car-rental.local/frontend/image/service_2.png" alt="">
                    <p>24/7 Order Available</p>
                </div>
                <div class="service_list">
                    <img src="http://friends-car-rental.local/frontend/image/service_3.png" alt="">
                    <p>High Safety</p>
                </div>
                <div class="service_list">
                    <img src="http://friends-car-rental.local/frontend/image/service_4.png" alt="">
                    <p>Best Prices</p>
                </div>
                <div class="service_list">
                    <img src="http://friends-car-rental.local/frontend/image/service_5.png" alt="">
                    <p>Fast Car Delivery Service</p>
                </div>
            </div>
        </div>
                            </section>',
        ]);
        PageTranslation::create([
            'page_id' => '1',
            'locale' => 'ar',
            'page_name' => 'خدمة الشركة',
            'page_title' => 'خدمة الشركة',
            'page_body' => '<section class="company_service">
        <div class="container">
            <div class="all_service">
                <div class="service_list">
                    <img src="http://friends-car-rental.local/frontend/image/service_1.png" alt="">
                    <p>اختيار فاخر</p>
                </div>
                <div class="service_list">
                    <img src="http://friends-car-rental.local/frontend/image/service_2.png" alt="">
                    <p>24/7 طلب متاح</p>
                </div>
                <div class="service_list">
                    <img src="http://friends-car-rental.local/frontend/image/service_3.png" alt="">
                    <p>أمان عالي</p>
                </div>
                <div class="service_list">
                    <img src="http://friends-car-rental.local/frontend/image/service_4.png" alt="">
                    <p>أفضل الأسعار</p>
                </div>
                <div class="service_list">
                    <img src="http://friends-car-rental.local/frontend/image/service_5.png" alt="">
                    <p>خدمة التوصيل السريع للسيارة</p>
                </div>
            </div>
        </div>
    </section>',
        ]);
        PageTranslation::create([
            'page_id' => '1',
            'locale' => 'fr',
            'page_name' => 'Services aux entreprises',
            'page_title' => 'Services aux entreprises',
            'page_body' => '<section class="company_service">
        <div class="container">
            <div class="all_service">
                <div class="service_list">
                    <img src="http://friends-car-rental.local/frontend/image/service_1.png" alt="">
                    <p>Sélection Luxe</p>
                </div>
                <div class="service_list">
                    <img src="http://friends-car-rental.local/frontend/image/service_2.png" alt="">
                    <p>Commande disponible 24h/24 et 7j/7</p>
                </div>
                <div class="service_list">
                    <img src="http://friends-car-rental.local/frontend/image/service_3.png" alt="">
                    <p>Haute sécurité</p>
                </div>
                <div class="service_list">
                    <img src="http://friends-car-rental.local/frontend/image/service_4.png" alt="">
                    <p>Meilleurs prix</p>
                </div>
                <div class="service_list">
                    <img src="http://friends-car-rental.local/frontend/image/service_5.png" alt="">
                    <p>Service de livraison de voiture rapide</p>
                </div>
            </div>
        </div>
    </section>',
        ]);
        PageTranslation::create([
            'page_id' => '1',
            'locale' => 'ru',
            'page_name' => 'Компания Сервис',
            'page_title' => 'Компания Сервис',
            'page_body' => '<section class="company_service">
        <div class="container">
            <div class="all_service">
                <div class="service_list">
                    <img src="http://friends-car-rental.local/frontend/image/service_1.png" alt="">
                    <p>Роскошный выбор</p>
                </div>
                <div class="service_list">
                    <img src="http://friends-car-rental.local/frontend/image/service_2.png" alt="">
                    <p>Круглосуточный заказ доступен</p>
                </div>
                <div class="service_list">
                    <img src="http://friends-car-rental.local/frontend/image/service_3.png" alt="">
                    <p>Высокая безопасность</p>
                </div>
                <div class="service_list">
                    <img src="http://friends-car-rental.local/frontend/image/service_4.png" alt="">
                    <p>Лучшие цены</p>
                </div>
                <div class="service_list">
                    <img src="http://friends-car-rental.local/frontend/image/service_5.png" alt="">
                    <p>Служба быстрой доставки автомобилей</p>
                </div>
            </div>
        </div>
    </section>',
        ]);

        PageTranslation::create([
            'page_id' => '2',
            'locale' => 'en',
            'page_name' => 'About Us',
            'page_title' => 'About Us',
            'page_body' => '<section class="about_company">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="about_comany_img">
                        <img src="http://friends-car-rental.local/frontend/image/about_company.png" alt="">
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
        ]);
        PageTranslation::create([
            'page_id' => '2',
            'locale' => 'ar',
            'page_name' => 'معلومات عنا',
            'page_title' => 'معلومات عنا',
            'page_body' => '<section class="about_company">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="about_comany_img">
                        <img src="http://friends-car-rental.local/frontend/image/about_company.png" alt="">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="company_about_txt">
                        <h1>عنا عن الشركة</h1>
                        <div class="about_us_details about_scroll_fix">
                            <p>لوريم إيبسوم هو ببساطة نص شكلي يقدم صناعة الطباعة والتنضيد. كان Lorem Ipsum هو النص الوهمي القياسي في الصناعة على الإطلاق SSD منذ القرن الخامس عشر الميلادي ، عندما أخذت طابعة غير معروفة لوحًا من النوع وتدافعت عليه لصنع كتاب عينة من النوع. لقد صمد ليس فقط لخمسة قرون ، ولكن أيضًا إلى قفزة في التنضيد الإلكتروني ، وظل دون تغيير جوهري. تم نشره في الستينيات من القرن الماضي بإصدار أوراق Letraset من مقاطع Lorem Ipsum المحتوية ، ومؤخراً مع عرض سطح المكتب لنشر البرامج مثل Aldus PageMaker بما في ذلك إصدارات Lorem Ipsum. لقد نجا ليس فقط خمسة قرون ، ولكن أيضًا للقفز إلى العروض الإلكترونية التنضيد ، وظل دون تغيير جوهري. تم نشره في الستينيات من القرن الماضي بإصدار أوراق Letraset من مقاطع Lorem Ipsum التي تحتوي على مقاطع ، ومؤخرًا مع برامج النشر التي تعرض سطح المكتب مثل Aldus PageMaker بما في ذلك إصدارات Lorem Ipsum.إصدارات</p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>',
        ]);
        PageTranslation::create([
            'page_id' => '2',
            'locale' => 'fr',
            'page_name' => 'À propos de nous',
            'page_title' => 'À propos de nous',
            'page_body' => '<section class="about_company">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="about_comany_img">
                        <img src="http://friends-car-rental.local/frontend/image/about_company.png" alt="">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="company_about_txt">
                        <h1>À propos de nous pour lentreprise</h1>
                        <div class="about_us_details about_scroll_fix">
                            <p>Lorem Ipsum est simplement une offre de texte factice pour lindustrie de limpression et de la composition. Lorem Ipsum est le texte factice standard de lindustrie depuis les années 1500, lorsquun imprimeur inconnu a pris une galère de type et la brouillé pour en faire un livre de spécimens de type. Il a survécu non seulement à cinq siècles, mais aussi au saut dans la composition électronique, restant essentiellement inchangé. Il a été popularisé dans les années 1960 avec la sortie de feuilles Letraset contenant des passages de Lorem Ipsum, et plus récemment avec une offre de bureau publiant le logiciel comme Aldus PageMaker comprenant des versions de Lorem Ipsum. Il a survécu non seulement à cinq siècles, mais aussi au saut dans lélectronique qui offre la composition, restant essentiellement inchangée. Il a été popularisé dans les années 1960 avec la sortie de feuilles Letraset contenant des passages de Lorem Ipsum, et plus récemment avec des logiciels de publication doffres de bureau comme Aldus PageMaker comprenant des versions de Lorem Ipsum.</p>
                                                    </div>
                    </div>
                </div>
            </div>
        </div>
    </section>',
        ]);
        PageTranslation::create([
            'page_id' => '2',
            'locale' => 'ru',
            'page_name' => 'О нас',
            'page_title' => 'О нас',
            'page_body' => '<section class="about_company">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="about_comany_img">
                        <img src="http://friends-car-rental.local/frontend/image/about_company.png" alt="">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="company_about_txt">
                        <h1>О нас для компании</h1>
                        <div class="about_us_details about_scroll_fix">
                            <p>Lorem Ipsum — это просто фиктивный текст, предлагаемый полиграфической и наборной индустрии. Lorem Ipsum был стандартным фиктивным текстом в отрасли с 1500-х годов, когда неизвестный типограф взял гранку шрифта и смешал ее, чтобы сделать книгу образцов шрифта. Он пережил не только пять столетий, но и скачок в электронный набор текста, оставаясь практически неизменным. Он был популяризирован в 1960-х годах с выпуском листов Letraset, содержащих отрывки Lorem Ipsum, а совсем недавно с предложением для настольных ПК публиковать программное обеспечение, такое как Aldus PageMaker, включая версии Lorem Ipsum. Он пережил не только пять столетий, но и скачок в электронные предложения, оставаясь практически неизменным. Он был популяризирован в 1960-х годах с выпуском листов Letraset, содержащих отрывки Lorem Ipsum, а совсем недавно - с программным обеспечением для публикации настольных предложений, таким как Aldus PageMaker, включая версии Lorem Ipsum.</p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>',
        ]);

        PageTranslation::create([
            'page_id' => '3',
            'locale' => 'en',
            'page_name' => 'Car Rent Rule',
            'page_title' => 'Car Rent Rule',
            'page_body' => '<section class="car_rent_rule">
        <div class="car_rent_rule_bg">
            <div class="container">
                <div class="car_rent_rule_txt row pt-4">
                    <h1>How to rent a luxury car in Dubai</h1>
                    <div class="rule_details col-lg-8 row">
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
                    <div class="car_rent_age  col-lg-4">
                        <div class="car_rent_age_txt">
                            <h1>21</h1>
                            <h2>MINIMUM AGE TO RENT A CAR IN DUBAI</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>',
        ]);
        PageTranslation::create([
            'page_id' => '3',
            'locale' => 'ar',
            'page_name' => 'قاعدة تأجير السيارات',
            'page_title' => 'قاعدة تأجير السيارات',
            'page_body' => '<section class="car_rent_rule">
        <div class="car_rent_rule_bg">
            <div class="container">
                <div class="car_rent_rule_txt  row pt-4">
                    <h1>كيف تستأجر سيارة فاخرة في دبي</h1>
                    <div class="rule_details col-lg-8 row">
                        <div class="rule_details_list list_right col-md-6">
                            <h3>زوار أجانب</h3>
                            <ul>
                                <li> <i class="fa-solid fa-circle-check rigth_icon"></i> جواز سفر أصلي ساري المفعول</li>
                                <li> <i class="fa-solid fa-circle-check rigth_icon"></i> تأشيرة زيارة سارية</li>
                                <li> <i class="fa-solid fa-circle-check rigth_icon"></i> رخصة قيادة سارية صادرة</li>
                                <li> <i class="fa-solid fa-circle-check rigth_icon"></i> رخصة القيادة الدولية (IDP)</li>
                                <li> <i class="fa-solid fa-circle-check rigth_icon"></i> أن لا يقل العمر عن 21 سنة</li>
                            </ul>
                        </div>
                        <div class="rule_details_list col-md-6">
                            <h3>المقيمين ومواطني دولة</h3>
                            <ul>
                                <li> <i class="fa-solid fa-circle-check rigth_icon"></i> رخصة القيادة الإماراتية</li>
                                <li> <i class="fa-solid fa-circle-check rigth_icon"></i> هويه الإمارات</li>
                                <li> <i class="fa-solid fa-circle-check rigth_icon"></i> (قد تكون تأشيرة الإقامة أوجواز السفر مقبولين)</li>
                            </ul>
                        </div>
                    </div>
                    <div class="car_rent_age col-lg-4">
                    <div class="car_rent_age_txt">
                        <h1>21</h1>
                        <h2>الحد الأدنى من السن لاستئجارسيارة في دبي</h2>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </section>',
        ]);
        PageTranslation::create([
            'page_id' => '3',
            'locale' => 'fr',
            'page_name' => 'Règle de location de voiture',
            'page_title' => 'Règle de location de voiture',
            'page_body' => '<section class="car_rent_rule">
        <div class="car_rent_rule_bg">
            <div class="container">
                <div class="car_rent_rule_txt  row pt-4">
                    <h1>Comment louer une voiture de luxe à Dubaï</h1>
                    <div class="rule_details col-lg-8 row">
                        <div class="rule_details_list list_right col-md-6">
                            <h3>Иностранные гости</h3>
                            <ul>
                                <li> <i class="fa-solid fa-circle-check rigth_icon"></i> Passeport original valide</li>
                                <li> <i class="fa-solid fa-circle-check rigth_icon"></i> Visa de visite valide</li>
                                <li> <i class="fa-solid fa-circle-check rigth_icon"></i> Permis de conduire valide délivré par le pays dorigine</li>
                                <li> <i class="fa-solid fa-circle-check rigth_icon"></i> Permis de conduire international (IDP)</li>
                                <li> <i class="fa-solid fa-circle-check rigth_icon"></i> Âge minimum 21 ans</li>
                            </ul>
                        </div>
                        <div class="rule_details_list col-md-6">
                            <h3>Résidents et ressortissants des Émirats arabes unis</h3>
                            <ul>
                                <li> <i class="fa-solid fa-circle-check rigth_icon"></i> Permis de conduire des EAU</li>
                                <li> <i class="fa-solid fa-circle-check rigth_icon"></i> carte didentité Emirates</li>
                                <li> <i class="fa-solid fa-circle-check rigth_icon"></i> (Un visa de résidence ou un passeport peut être acceptable)</li>
                            </ul>
                        </div>
                        <div class="car_rent_age col-lg-4">
                        <div class="car_rent_age_txt">
                            <h1>21</h1>
                            <h2>ÂGE MINIMUM POUR LOUER UNE VOITURE À DUBAÏ</h2>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>',
        ]);
        PageTranslation::create([
            'page_id' => '3',
            'locale' => 'ru',
            'page_name' => 'Правило аренды автомобиля',
            'page_title' => 'Правило аренды автомобиля',
            'page_body' => '<section class="car_rent_rule">
        <div class="car_rent_rule_bg">
            <div class="container">
                <div class="car_rent_rule_txt  row pt-4"">
                    <h1>Как арендовать роскошный автомобиль в Дубае</h1>
                    <div class="rule_details col-lg-8 row">
                        <div class="rule_details_list list_right col-md-6">
                            <h3>Visiteurs étrangers</h3>
                            <ul>
                                <li> <i class="fa-solid fa-circle-check rigth_icon"></i> Действительный оригинал паспорта</li>
                                <li> <i class="fa-solid fa-circle-check rigth_icon"></i> Действительная гостевая визаa</li>
                                <li> <i class="fa-solid fa-circle-check rigth_icon"></i> Действительные водительские права, выданные в стране проживания</li>
                                <li> <i class="fa-solid fa-circle-check rigth_icon"></i> Международное водительское удостоверение (IDP)</li>
                                <li> <i class="fa-solid fa-circle-check rigth_icon"></i> Минимальный возраст 21 год</li>
                            </ul>
                        </div>
                        <div class="rule_details_list col-md-6">
                            <h3>Резиденты и граждане ОАЭ</h3>
                            <ul>
                                <li> <i class="fa-solid fa-circle-check rigth_icon"></i> Водительские права ОАЭ</li>
                                <li> <i class="fa-solid fa-circle-check rigth_icon"></i> Идентификатор Эмирейтс</li>
                                <li> <i class="fa-solid fa-circle-check rigth_icon"></i> (Виза на жительство или паспорт могут быть приемлемыми)</li>
                            </ul>
                        </div>
                        <div class="car_rent_age col-lg-4">
                        <div class="car_rent_age_txt">
                            <h1>21</h1>
                            <h2>МИНИМАЛЬНЫЙ ВОЗРАСТ ДЛЯ АРЕНДЫ АВТОМОБИЛЯ В ДУБАЕ</h2>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </section>',
        ]);

        PageTranslation::create([
            'page_id' => '4',
            'locale' => 'en',
            'page_name' => 'Why Choose Us',
            'page_title' => 'Why Choose Us',
            'page_body' => '<section class="whay_choose">
        <div class="container">
            <h1 class="whay_choose_title">Why Choose Us</h1>
            <div class="row">
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="company_credit">
                        <div class="company_icon">
                            <img src="http://friends-car-rental.local/frontend/image/choose_1.png" alt="">
                        </div>
                        <h3>Best Car Rental Office In Dubai</h3>
                        <p>If Dubai is your next destination for tourism or housing, renting a car may be one of the first things you should think of to explore the streets of this huge city and enjoy the landscapes that adorn it. If you are looking for a car rental office in Dubai, </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="company_credit">
                        <div class="company_icon">
                            <img src="http://friends-car-rental.local/frontend/image/choose_2.png" alt="">
                        </div>
                        <h3 style="width: 70%;">Why Friends Rent A Car Office In Dubai?​</h3>
                        <p>Our good reputation, high credibility and competitive prices made us top the list of the best car rental offices in Dubai. Our team works hard to ensure that the needs and requirements of permanent and renewable customers are met.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="company_credit">
                        <div class="company_icon">
                            <img src="http://friends-car-rental.local/frontend/image/choose_3.png" alt="">
                        </div>
                        <h3 style="width: 50%;">Car Rental Prices In Dubai</h3>
                        <p>Car rental prices in Dubai depend on the type of car you choose. In general, car rental prices range from 400 dirhams per day and may reach 5000 dirhams for luxury cars, Lamborghini, Rolls-Royce, and others.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>',
        ]);
        PageTranslation::create([
            'page_id' => '4',
            'locale' => 'ar',
            'page_name' => 'لماذا أخترتنا',
            'page_title' => 'لماذا أخترتنا',
            'page_body' => '<section class="whay_choose">
        <div class="container">
            <h1 class="whay_choose_title">لماذا أخترتنا</h1>
            <div class="row">
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="company_credit">
                        <div class="company_icon">
                            <img src="http://friends-car-rental.local/frontend/image/choose_1.png" alt="">
                        </div>
                        <h3>أفضل مكتب لتأجير السياراتفي دبي</h3>
                        <p>إذا كانت دبي هي وجهتك التالية للسياحة أو الإسكان ، فقد يكون استئجار سيارة من أول الأشياء التي يجب أن تفكر فيها لاستكشاف شوارع هذه المدينة الضخمة والاستمتاع بالمناظر الطبيعية التي تزينها. إذا كنت تبحث عن مكتب لتأجير السيارات في دبي </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="company_credit">
                        <div class="company_icon">
                            <img src="http://friends-car-rental.local/frontend/image/choose_2.png" alt="">
                        </div>
                        <h3 style="width: 70%;">لماذا فريندز يؤجرون مكتب سيارات في دبي؟​</h3>
                        <p>سمعتنا الجيدة ومصداقيتنا العالية وأسعارنا التنافسية جعلتنا على رأس قائمة أفضل مكاتب تأجير السيارات في دبي. يعمل فريقنا بجد لضمان تلبية احتياجات ومتطلبات العملاء الدائمين والمتجددون.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="company_credit">
                        <div class="company_icon">
                            <img src="http://friends-car-rental.local/frontend/image/choose_3.png" alt="">
                        </div>
                        <h3 style="width: 50%;">أسعار تأجير السيارات في دبي</h3>
                        <p>تعتمد أسعار تأجير السيارات في دبي على نوع السيارة التي تختارها. بشكل عام تتراوح أسعار تأجير السيارات بين 400 درهم في اليوم وقد تصل إلى 5000 درهم للسيارات الفاخرة ولامبورجيني ورولز رويس وغيرها.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>',
        ]);
        PageTranslation::create([
            'page_id' => '4',
            'locale' => 'fr',
            'page_name' => 'Pourquoi nous choisir',
            'page_title' => 'Pourquoi nous choisir',
            'page_body' => '<section class="whay_choose">
        <div class="container">
            <h1 class="whay_choose_title">Pourquoi nous choisir</h1>
            <div class="row">
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="company_credit">
                        <div class="company_icon">
                            <img src="http://friends-car-rental.local/frontend/image/choose_1.png" alt="">
                        </div>
                        <h3>Meilleur bureau de location de voitures à Dubaï/h3&gt;
                        <p>Si Dubaï est votre prochaine destination touristique ou d hébergement, la location d une voiture peut être l une des premières choses auxquelles vous devriez penser pour explorer les rues de cette immense ville et profiter des paysages qui l agrémentent. Si vous cherchez une agence de location de voitures à Dubaï,</p>
                    </h3></div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="company_credit">
                        <div class="company_icon">
                            <img src="http://friends-car-rental.local/frontend/image/choose_2.png" alt="">
                        </div>
                        <h3 style="width: 70%;">Pourquoi Friends Rent A Car Office à Dubaï?</h3>
                        <p>Notre bonne réputation, notre grande crédibilité et nos prix compétitifs nous placent en tête de liste des meilleures agences de location de voitures à Dubaï. Notre équipe travaille fort pour sassurer que les besoins et les exigences des clients permanents et renouvelables sont satisfaits.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="company_credit">
                        <div class="company_icon">
                            <img src="http://friends-car-rental.local/frontend/image/choose_3.png" alt="">
                        </div>
                        <h3 style="width: 50%;">Prix ​​de location de voitures à Dubaï</h3>
                        <p>Les prix de location de voitures à Dubaï dépendent du type de voiture que vous choisissez. En général, les prix de location de voitures oscillent entre 400 dirhams par jour et peuvent atteindre 5000 dirhams pour les voitures de luxe, Lamborghini, Rolls-Royce, et autres.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>',
        ]);
        PageTranslation::create([
            'page_id' => '4',
            'locale' => 'ru',
            'page_name' => 'почему выбрали нас',
            'page_title' => 'почему выбрали нас',
            'page_body' => '<section class="whay_choose">
        <div class="container">
            <h1 class="whay_choose_title">почему выбрали нас</h1>
            <div class="row">
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="company_credit">
                        <div class="company_icon">
                            <img src="http://friends-car-rental.local/image/choose_1.png" alt="">
                        </div>
                        <h3>Лучший офис по аренде автомобилей в Дубае</h3>
                        <p>Если Дубай — ваш следующий пункт назначения для туризма или жилья, аренда автомобиля может быть одной из первых вещей, о которых вы должны подумать, чтобы исследовать улицы этого огромного города и наслаждаться пейзажами, которые его украшают. Если вы ищете офис по аренде автомобилей в Дубае,</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="company_credit">
                        <div class="company_icon">
                            <img src="http://friends-car-rental.local/image/choose_2.png" alt="">
                        </div>
                        <h3 style="width: 70%;">Почему друзья арендуют автомобиль в Дубае?​</h3>
                        <p>Наша хорошая репутация, высокий уровень доверия и конкурентоспособные цены позволили нам занять первое место в списке лучших офисов по аренде автомобилей в Дубае. Наша команда усердно работает над тем, чтобы потребности и требования постоянных и возобновляемых клиентов были удовлетворены.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="company_credit">
                        <div class="company_icon">
                            <img src="http://friends-car-rental.local/image/choose_3.png" alt="">
                        </div>
                        <h3 style="width: 50%;">Цены на прокат автомобилей в Дубае</h3>
                        <p>Стоимость аренды автомобиля в Дубае зависит от выбранного вами типа автомобиля. В целом цены на аренду автомобилей колеблются от 400 дирхамов в сутки и могут достигать 5000 дирхамов за автомобили представительского класса, Lamborghini, Rolls-Royce и другие.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>',
        ]);

        PageTranslation::create([
            'page_id' => '5',
            'locale' => 'en',
            'page_name' => 'Driving Licenses From Countries Valid In UAE',
            'page_title' => 'Allowed Driving Lincense',
            'page_body' => '<div class="container my-3">
            <nav style="--bs-breadcrumb-divider: url(" data:image="" svg+xml,%3csvg="" xmlns="http://www.w3.org/2000/svg" width="8" height="8" %3e%3cpath="" d="M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z" fill="%236c757d" %3e%3c="" svg%3e");"="" aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item breadcrumb_fix " aria-current="page"><a href="/">Home</a></li>
                <li class="breadcrumb-item breadcrumb_fix_active active " aria-current="page">Driving Licenses From Countries Valid In UAE</li>
              </ol>
            </nav>

                <h1 class="driving_licenses_fix text-center">Driving Licenses From Countries Valid In UAE</h1>
                <div class="row margin_top_40">
                        <div class="col-md-3 pb-3">
                            <div class="flag_fix_final">
                                <a href="#">
                                       <div class="flag_fix">
                                    <img src="http://friends-car-rental.local/frontend/image/austria.png" alt="" class="img-fluid">
                                    <span class="px-2 driving_contry_font_fix ellipsis">Austria</span>
                                </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3 pb-3">
                            <div class="flag_fix_final">
                                <a href="#">
                                       <div class="flag_fix">
                                    <img src="http://friends-car-rental.local/frontend/image/italy.png" alt="" class="img-fluid">
                                    <span class="px-2 driving_contry_font_fix ellipsis">Italy</span>
                                </div>
                                </a>
                            </div>
                        </div>
                         <div class="col-md-3 pb-3">
                            <div class="flag_fix_final">
                                <a href="#">
                                       <div class="flag_fix">
                                    <img src="http://friends-car-rental.local/frontend/image/romania.png" alt="" class="img-fluid">
                                    <span class="px-2 driving_contry_font_fix ellipsis">Romania</span>
                                </div>
                                </a>
                            </div>
                        </div>
                         <div class="col-md-3 pb-3">
                            <div class="flag_fix_final">
                                <a href="#">
                                       <div class="flag_fix">
                                    <img src="http://friends-car-rental.local/frontend/image/australia.png" alt="" class="img-fluid">
                                    <span class="px-2 driving_contry_font_fix ellipsis">Australia</span>
                                </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 pb-3">
                            <div class="flag_fix_final">
                                <a href="#">
                                       <div class="flag_fix">
                                    <img src="http://friends-car-rental.local/frontend/image/japan.png" alt="" class="img-fluid">
                                    <span class="px-2 driving_contry_font_fix ellipsis">Japan</span>
                                </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3 pb-3">
                            <div class="flag_fix_final">
                                <a href="#">
                                       <div class="flag_fix">
                                    <img src="http://friends-car-rental.local/frontend/image/saud.png" alt="" class="img-fluid">
                                    <span class="px-2 driving_contry_font_fix ellipsis">Saudi Arabia</span>
                                </div>
                                </a>
                            </div>
                        </div>
                         <div class="col-md-3 pb-3">
                            <div class="flag_fix_final">
                                <a href="#">
                                       <div class="flag_fix">
                                    <img src="http://friends-car-rental.local/frontend/image/bahrain.png" alt="" class="img-fluid">
                                    <span class="px-2 driving_contry_font_fix ellipsis">Bahrain</span>
                                </div>
                                </a>
                            </div>
                        </div>
                         <div class="col-md-3 pb-3">
                            <div class="flag_fix_final">
                                <a href="#">
                                       <div class="flag_fix">
                                    <img src="http://friends-car-rental.local/frontend/image/kuwait.png" alt="" class="img-fluid">
                                    <span class="px-2 driving_contry_font_fix ellipsis">Kuwait</span>
                                </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 pb-3">
                            <div class="flag_fix_final">
                                <a href="#">
                                       <div class="flag_fix">
                                    <img src="http://friends-car-rental.local/frontend/image/belgium.png" alt="" class="img-fluid">
                                    <span class="px-2 driving_contry_font_fix ellipsis">Belgium</span>
                                </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3 pb-3">
                            <div class="flag_fix_final">
                                <a href="#">
                                       <div class="flag_fix">
                                    <img src="http://friends-car-rental.local/frontend/image/latvia.png" alt="" class="img-fluid">
                                    <span class="px-2 driving_contry_font_fix ellipsis">Latvia</span>
                                </div>
                                </a>
                            </div>
                        </div>
                         <div class="col-md-3 pb-3">
                            <div class="flag_fix_final">
                                <a href="#">
                                       <div class="flag_fix">
                                    <img src="http://friends-car-rental.local/frontend/image/singapore.png" alt="" class="img-fluid">
                                    <span class="px-2 driving_contry_font_fix ellipsis">Singapore</span>
                                </div>
                                </a>
                            </div>
                        </div>
                         <div class="col-md-3 pb-3">
                            <div class="flag_fix_final">
                                <a href="#">
                                       <div class="flag_fix">
                                    <img src="http://friends-car-rental.local/frontend/image/canada.png" alt="" class="img-fluid">
                                    <span class="px-2 driving_contry_font_fix ellipsis">Canada (Quebec*)</span>
                                </div>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3 pb-3">
                            <div class="flag_fix_final">
                                <a href="#">
                                       <div class="flag_fix">
                                    <img src="http://friends-car-rental.local/frontend/image/lithuania.png" alt="" class="img-fluid">
                                    <span class="px-2 driving_contry_font_fix ellipsis">Lithuania</span>
                                </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3 pb-3">
                            <div class="flag_fix_final">
                                <a href="#">
                                       <div class="flag_fix">
                                    <img src="http://friends-car-rental.local/frontend/image/slovakia.png" alt="" class="img-fluid">
                                    <span class="px-2 driving_contry_font_fix ellipsis">Slovakia</span>
                                </div>
                                </a>
                            </div>
                        </div>
                         <div class="col-md-3 pb-3">
                            <div class="flag_fix_final">
                                <a href="#">
                                       <div class="flag_fix">
                                    <img src="http://friends-car-rental.local/frontend/image/china.png" alt="" class="img-fluid">
                                    <span class="px-2 driving_contry_font_fix ellipsis">China</span>
                                </div>
                                </a>
                            </div>
                        </div>
                         <div class="col-md-3 pb-3">
                            <div class="flag_fix_final">
                                <a href="#">
                                       <div class="flag_fix">
                                    <img src="http://friends-car-rental.local/frontend/image/luxembourg.png" alt="" class="img-fluid">
                                    <span class="px-2 driving_contry_font_fix ellipsis">Luxembourg</span>
                                </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 pb-3">
                            <div class="flag_fix_final">
                                <a href="#">
                                       <div class="flag_fix">
                                    <img src="http://friends-car-rental.local/frontend/image/south_africa.png" alt="" class="img-fluid">
                                    <span class="px-2 driving_contry_font_fix ellipsis">South Africa</span>
                                </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3 pb-3">
                            <div class="flag_fix_final">
                                <a href="#">
                                       <div class="flag_fix">
                                    <img src="http://friends-car-rental.local/frontend/image/Denmark.png" alt="" class="img-fluid">
                                    <span class="px-2 driving_contry_font_fix ellipsis">Denmark</span>
                                </div>
                                </a>
                            </div>
                        </div>
                         <div class="col-md-3 pb-3">
                            <div class="flag_fix_final">
                                <a href="#">
                                       <div class="flag_fix">
                                    <img src="http://friends-car-rental.local/frontend/image/Netherlands.png" alt="" class="img-fluid">
                                    <span class="px-2 driving_contry_font_fix ellipsis">Netherlands (Holland)</span>
                                </div>
                                </a>
                            </div>
                        </div>
                         <div class="col-md-3 pb-3">
                            <div class="flag_fix_final">
                                <a href="#">
                                       <div class="flag_fix">
                                    <img src="http://friends-car-rental.local/frontend/image/south_korea.png" alt="" class="img-fluid">
                                    <span class="px-2 driving_contry_font_fix ellipsis">South Korea</span>
                                </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 pb-3">
                            <div class="flag_fix_final">
                                <a href="#">
                                       <div class="flag_fix">
                                    <img src="http://friends-car-rental.local/frontend/image/Finland.png" alt="" class="img-fluid">
                                    <span class="px-2 driving_contry_font_fix ellipsis">Finland</span>
                                </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3 pb-3">
                            <div class="flag_fix_final">
                                <a href="#">
                                       <div class="flag_fix">
                                    <img src="http://friends-car-rental.local/frontend/image/New_Zealand.png" alt="" class="img-fluid">
                                    <span class="px-2 driving_contry_font_fix ellipsis">New Zealand</span>
                                </div>
                                </a>
                            </div>
                        </div>
                         <div class="col-md-3 pb-3">
                            <div class="flag_fix_final">
                                <a href="#">
                                       <div class="flag_fix">
                                    <img src="http://friends-car-rental.local/frontend/image/spain.png" alt="" class="img-fluid">
                                    <span class="px-2 driving_contry_font_fix ellipsis">Spain</span>
                                </div>
                                </a>
                            </div>
                        </div>
                         <div class="col-md-3 pb-3">
                            <div class="flag_fix_final">
                                <a href="#">
                                       <div class="flag_fix">
                                    <img src="http://friends-car-rental.local/frontend/image/france.png" alt="" class="img-fluid">
                                    <span class="px-2 driving_contry_font_fix ellipsis">France</span>
                                </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 pb-3">
                            <div class="flag_fix_final">
                                <a href="#">
                                       <div class="flag_fix">
                                    <img src="http://friends-car-rental.local/frontend/image/Norway.png" alt="" class="img-fluid">
                                    <span class="px-2 driving_contry_font_fix ellipsis">Norway</span>
                                </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3 pb-3">
                            <div class="flag_fix_final">
                                <a href="#">
                                       <div class="flag_fix">
                                    <img src="http://friends-car-rental.local/frontend/image/Sweden.png" alt="" class="img-fluid">
                                    <span class="px-2 driving_contry_font_fix ellipsis">Sweden</span>
                                </div>
                                </a>
                            </div>
                        </div>
                         <div class="col-md-3 pb-3">
                            <div class="flag_fix_final">
                                <a href="#">
                                       <div class="flag_fix">
                                    <img src="http://friends-car-rental.local/frontend/image/Germany.png" alt="" class="img-fluid">
                                    <span class="px-2 driving_contry_font_fix ellipsis">Germany</span>
                                </div>
                                </a>
                            </div>
                        </div>
                         <div class="col-md-3 pb-3">
                            <div class="flag_fix_final">
                                <a href="#">
                                       <div class="flag_fix">
                                    <img src="http://friends-car-rental.local/frontend/image/Oman.png" alt="" class="img-fluid">
                                    <span class="px-2 driving_contry_font_fix ellipsis">Oman</span>
                                </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 pb-3">
                            <div class="flag_fix_final">
                                <a href="#">
                                       <div class="flag_fix">
                                    <img src="http://friends-car-rental.local/frontend/image/Switzerland.png" alt="" class="img-fluid">
                                    <span class="px-2 driving_contry_font_fix ellipsis">Switzerland</span>
                                </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3 pb-3">
                            <div class="flag_fix_final">
                                <a href="#">
                                       <div class="flag_fix">
                                    <img src="http://friends-car-rental.local/frontend/image/Greece.png" alt="" class="img-fluid">
                                    <span class="px-2 driving_contry_font_fix ellipsis">Greece</span>
                                </div>
                                </a>
                            </div>
                        </div>
                         <div class="col-md-3 pb-3">
                            <div class="flag_fix_final">
                                <a href="#">
                                       <div class="flag_fix">
                                    <img src="http://friends-car-rental.local/frontend/image/Poland.png" alt="" class="img-fluid">
                                    <span class="px-2 driving_contry_font_fix ellipsis">Poland</span>
                                </div>
                                </a>
                            </div>
                        </div>
                         <div class="col-md-3 pb-3">
                            <div class="flag_fix_final">
                                <a href="#">
                                       <div class="flag_fix">
                                    <img src="http://friends-car-rental.local/frontend/image/Turkey.png" alt="" class="img-fluid">
                                    <span class="px-2 driving_contry_font_fix ellipsis">Turkey</span>
                                </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 pb-3">
                            <div class="flag_fix_final">
                                <a href="#">
                                       <div class="flag_fix">
                                    <img src="http://friends-car-rental.local/frontend/image/Hungary.png" alt="" class="img-fluid">
                                    <span class="px-2 driving_contry_font_fix ellipsis">Hungary</span>
                                </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3 pb-3">
                            <div class="flag_fix_final">
                                <a href="#">
                                       <div class="flag_fix">
                                    <img src="http://friends-car-rental.local/frontend/image/Portugal.png" alt="" class="img-fluid">
                                    <span class="px-2 driving_contry_font_fix ellipsis">Portugal</span>
                                </div>
                                </a>
                            </div>
                        </div>
                         <div class="col-md-3 pb-3">
                            <div class="flag_fix_final">
                                <a href="#">
                                       <div class="flag_fix">
                                    <img src="http://friends-car-rental.local/frontend/image/United_Kingdom.png" alt="" class="img-fluid">
                                    <span class="px-2 driving_contry_font_fix ellipsis">United Kingdom(UK)</span>
                                </div>
                                </a>
                            </div>
                        </div>
                         <div class="col-md-3 pb-3">
                            <div class="flag_fix_final">
                                <a href="#">
                                       <div class="flag_fix">
                                    <img src="http://friends-car-rental.local/frontend/image/Hong_Kong.png" alt="" class="img-fluid">
                                    <span class="px-2 driving_contry_font_fix ellipsis">Hong Kong</span>
                                </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 pb-3">
                            <div class="flag_fix_final">
                                <a href="#">
                                       <div class="flag_fix">
                                    <img src="http://friends-car-rental.local/frontend/image/Qatar.png" alt="" class="img-fluid">
                                    <span class="px-2 driving_contry_font_fix ellipsis">Qatar</span>
                                </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3 pb-3">
                            <div class="flag_fix_final">
                                <a href="#">
                                       <div class="flag_fix">
                                    <img src="http://friends-car-rental.local/frontend/image/USA.png" alt="" class="img-fluid">
                                    <span class="px-2 driving_contry_font_fix ellipsis">USA</span>
                                </div>
                                </a>
                            </div>
                        </div>
                         <div class="col-md-3 pb-3">
                            <div class="flag_fix_final">
                                <a href="#">
                                       <div class="flag_fix">
                                    <img src="http://friends-car-rental.local/frontend/image/Ireland.png" alt="" class="img-fluid">
                                    <span class="px-2 driving_contry_font_fix ellipsis">Ireland</span>
                                </div>
                                </a>
                            </div>
                        </div>
                         <div class="col-md-3 pb-3">
                            <div class="flag_fix_final">
                                <a href="#">
                                       <div class="flag_fix">
                                    <img src="http://friends-car-rental.local/frontend/image/India.png" alt="" class="img-fluid">
                                    <span class="px-2 driving_contry_font_fix ellipsis">India</span>
                                </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <section class="dubai_car_rent">
                    <div class="container">
                        <div class="dubai_car_rent_details">
                            <div class="car_rent_txt">
                                <h2 class="d-flex">Luxury Car Rental Dubai<span class="d-md-block d-none px-1"> — </span> the easy way</h2>
                                <p>Drive your drеаm car in Dubai . Сhооsе саrs frоm рrеmium brаnds likе Rоlls Rоуcе, Bentley, Меrсеdеs Веnz, Range Rover, Porsche and more. If youre interested in something sporty like a Fеrrаri, Lambоrghini and the likes, check out our Sports Car Rentals section.</p>
                            </div>
                            <div class="car_rent_txt">
                                <h2>Rent Luxury cars in Dubai</h2>
                                <p>Looking tо rеnt luхurу саrs in thе еmirаtе of Dubаi? Dont settle with the first prеmium саr rеntаl shоp, compare offers from a number of car hire brands. Rеnt аnу ехоtiс саr оf уоur liking аt the lowest in market rаtеs. Tаstе luхurу оn thе suреrсаr-friеndlу rоаds оf Dubаi. Be sure to contact the companies directly via Phone or WhatsApp and ask them for their ongoing promotions.
                                </p>
                            </div>
                            <div class="car_rent_txt">
                                <h2>Range of Luxury Car Options</h2>
                                <p>Our luхurу саr rental flееt includе a widе rаngе of tоp-оf-the-linе саrs to set your travel experience apart in Dubаi. Pаy by cаsh or a crеdit / debit саrd and bооk with the supplier directly. Frоm Rаngе Rоvеrs tо Rоlls Rоуcе, find thе mоst ехclusivе саrs at the lоwеst rаtеs offеrеd bу еstаblishеd cоmpаniеs in thе UАЕ. If youre confused which company to choose, you can always check out the companys Google Reviews.</p>
                            </div>
                            <div class="car_rent_txt">
                                <h2>Rent Exotic Cars in Dubai</h2>
                                <p>Many people from around the world have seen the videos of supercars with a medley of Dubai’s lifestyle. Every other Instablogger has uploaded a dune-bashing video conquering the desert sands. It’s no doubt that the UAE is a hotspot for rare and powerful motors. From crazy sand-buggies doing insane stunts up hills, to Ferraris, Rolls Royces and other hypercars cruising down the road. The UAE doesn’t hide its wide array of cars. This love for cars began many years ago, before there were roads in the UAE. Back then, people used to drive through the soft, unforgiving, sand to get from point A to B.</p>
                                <p>As motorcars developed, people used to tune their cars for more power to travel through the sand with ease. This developed into a sport, in which people would race their cars up dunes, and modify them to make them faster and more powerful. Thus began the love for cars, and the love for speed and power.
                                    As the UAE developed into the futuristic urban country that it is today, people’s taste for cars developed, but their love for large SUVs remained. Today, you can see many supercars driving alongside Nissan Patrols and Toyota Land-Cruisers, both garnering similar levels of respect on the road.</p>
                            </div>
                        </div>
                    </div>
            </section>',
        ]);
        PageTranslation::create([
            'page_id' => '5',
            'locale' => 'ar',
            'page_name' => 'رخص القيادة من الدول الصالحة في الإمارات العربية المتحدة',
            'page_title' => 'مسموح القيادة لينسينس',
            'page_body' => '<div class="container my-3">
            <nav style="--bs-breadcrumb-divider: url(" data:image="" svg+xml,%3csvg="" xmlns="http://www.w3.org/2000/svg" width="8" height="8" %3e%3cpath="" d="M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z" fill="%236c757d" %3e%3c="" svg%3e");"="" aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item breadcrumb_fix " aria-current="page"><a href="/">بيت</a></li>
                <li class="breadcrumb-item breadcrumb_fix_active active " aria-current="page">رخص القيادة من الدول الصالحة في الإمارات العربية المتحدة</li>
              </ol>
            </nav>

                <h1 class="driving_licenses_fix text-center">رخص القيادة من الدول الصالحة في الإمارات العربية المتحدة</h1>
                <div class="row margin_top_40">
                        <div class="col-md-3 pb-3">
                            <div class="flag_fix_final">
                                <a href="#">
                                       <div class="flag_fix">
                                    <img src="http://friends-car-rental.local/frontend/image/austria.png" alt="" class="img-fluid">
                                    <span class="px-2 driving_contry_font_fix ellipsis">Austria</span>
                                </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3 pb-3">
                            <div class="flag_fix_final">
                                <a href="#">
                                       <div class="flag_fix">
                                    <img src="http://friends-car-rental.local/frontend/image/italy.png" alt="" class="img-fluid">
                                    <span class="px-2 driving_contry_font_fix ellipsis">Italy</span>
                                </div>
                                </a>
                            </div>
                        </div>
                         <div class="col-md-3 pb-3">
                            <div class="flag_fix_final">
                                <a href="#">
                                       <div class="flag_fix">
                                    <img src="http://friends-car-rental.local/frontend/image/romania.png" alt="" class="img-fluid">
                                    <span class="px-2 driving_contry_font_fix ellipsis">Romania</span>
                                </div>
                                </a>
                            </div>
                        </div>
                         <div class="col-md-3 pb-3">
                            <div class="flag_fix_final">
                                <a href="#">
                                       <div class="flag_fix">
                                    <img src="http://friends-car-rental.local/frontend/image/australia.png" alt="" class="img-fluid">
                                    <span class="px-2 driving_contry_font_fix ellipsis">Australia</span>
                                </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 pb-3">
                            <div class="flag_fix_final">
                                <a href="#">
                                       <div class="flag_fix">
                                    <img src="http://friends-car-rental.local/frontend/image/japan.png" alt="" class="img-fluid">
                                    <span class="px-2 driving_contry_font_fix ellipsis">Japan</span>
                                </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3 pb-3">
                            <div class="flag_fix_final">
                                <a href="#">
                                       <div class="flag_fix">
                                    <img src="http://friends-car-rental.local/frontend/image/saud.png" alt="" class="img-fluid">
                                    <span class="px-2 driving_contry_font_fix ellipsis">Saudi Arabia</span>
                                </div>
                                </a>
                            </div>
                        </div>
                         <div class="col-md-3 pb-3">
                            <div class="flag_fix_final">
                                <a href="#">
                                       <div class="flag_fix">
                                    <img src="http://friends-car-rental.local/frontend/image/bahrain.png" alt="" class="img-fluid">
                                    <span class="px-2 driving_contry_font_fix ellipsis">Bahrain</span>
                                </div>
                                </a>
                            </div>
                        </div>
                         <div class="col-md-3 pb-3">
                            <div class="flag_fix_final">
                                <a href="#">
                                       <div class="flag_fix">
                                    <img src="http://friends-car-rental.local/frontend/image/kuwait.png" alt="" class="img-fluid">
                                    <span class="px-2 driving_contry_font_fix ellipsis">Kuwait</span>
                                </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 pb-3">
                            <div class="flag_fix_final">
                                <a href="#">
                                       <div class="flag_fix">
                                    <img src="http://friends-car-rental.local/frontend/image/belgium.png" alt="" class="img-fluid">
                                    <span class="px-2 driving_contry_font_fix ellipsis">Belgium</span>
                                </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3 pb-3">
                            <div class="flag_fix_final">
                                <a href="#">
                                       <div class="flag_fix">
                                    <img src="http://friends-car-rental.local/frontend/image/latvia.png" alt="" class="img-fluid">
                                    <span class="px-2 driving_contry_font_fix ellipsis">Latvia</span>
                                </div>
                                </a>
                            </div>
                        </div>
                         <div class="col-md-3 pb-3">
                            <div class="flag_fix_final">
                                <a href="#">
                                       <div class="flag_fix">
                                    <img src="http://friends-car-rental.local/frontend/image/singapore.png" alt="" class="img-fluid">
                                    <span class="px-2 driving_contry_font_fix ellipsis">Singapore</span>
                                </div>
                                </a>
                            </div>
                        </div>
                         <div class="col-md-3 pb-3">
                            <div class="flag_fix_final">
                                <a href="#">
                                       <div class="flag_fix">
                                    <img src="http://friends-car-rental.local/frontend/image/canada.png" alt="" class="img-fluid">
                                    <span class="px-2 driving_contry_font_fix ellipsis">Canada (Quebec*)</span>
                                </div>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3 pb-3">
                            <div class="flag_fix_final">
                                <a href="#">
                                       <div class="flag_fix">
                                    <img src="http://friends-car-rental.local/frontend/image/lithuania.png" alt="" class="img-fluid">
                                    <span class="px-2 driving_contry_font_fix ellipsis">Lithuania</span>
                                </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3 pb-3">
                            <div class="flag_fix_final">
                                <a href="#">
                                       <div class="flag_fix">
                                    <img src="http://friends-car-rental.local/frontend/image/slovakia.png" alt="" class="img-fluid">
                                    <span class="px-2 driving_contry_font_fix ellipsis">Slovakia</span>
                                </div>
                                </a>
                            </div>
                        </div>
                         <div class="col-md-3 pb-3">
                            <div class="flag_fix_final">
                                <a href="#">
                                       <div class="flag_fix">
                                    <img src="http://friends-car-rental.local/frontend/image/china.png" alt="" class="img-fluid">
                                    <span class="px-2 driving_contry_font_fix ellipsis">China</span>
                                </div>
                                </a>
                            </div>
                        </div>
                         <div class="col-md-3 pb-3">
                            <div class="flag_fix_final">
                                <a href="#">
                                       <div class="flag_fix">
                                    <img src="http://friends-car-rental.local/frontend/image/luxembourg.png" alt="" class="img-fluid">
                                    <span class="px-2 driving_contry_font_fix ellipsis">Luxembourg</span>
                                </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 pb-3">
                            <div class="flag_fix_final">
                                <a href="#">
                                       <div class="flag_fix">
                                    <img src="http://friends-car-rental.local/frontend/image/south_africa.png" alt="" class="img-fluid">
                                    <span class="px-2 driving_contry_font_fix ellipsis">South Africa</span>
                                </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3 pb-3">
                            <div class="flag_fix_final">
                                <a href="#">
                                       <div class="flag_fix">
                                    <img src="http://friends-car-rental.local/frontend/image/Denmark.png" alt="" class="img-fluid">
                                    <span class="px-2 driving_contry_font_fix ellipsis">Denmark</span>
                                </div>
                                </a>
                            </div>
                        </div>
                         <div class="col-md-3 pb-3">
                            <div class="flag_fix_final">
                                <a href="#">
                                       <div class="flag_fix">
                                    <img src="http://friends-car-rental.local/frontend/image/Netherlands.png" alt="" class="img-fluid">
                                    <span class="px-2 driving_contry_font_fix ellipsis">Netherlands (Holland)</span>
                                </div>
                                </a>
                            </div>
                        </div>
                         <div class="col-md-3 pb-3">
                            <div class="flag_fix_final">
                                <a href="#">
                                       <div class="flag_fix">
                                    <img src="http://friends-car-rental.local/frontend/image/south_korea.png" alt="" class="img-fluid">
                                    <span class="px-2 driving_contry_font_fix ellipsis">South Korea</span>
                                </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 pb-3">
                            <div class="flag_fix_final">
                                <a href="#">
                                       <div class="flag_fix">
                                    <img src="http://friends-car-rental.local/frontend/image/Finland.png" alt="" class="img-fluid">
                                    <span class="px-2 driving_contry_font_fix ellipsis">Finland</span>
                                </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3 pb-3">
                            <div class="flag_fix_final">
                                <a href="#">
                                       <div class="flag_fix">
                                    <img src="http://friends-car-rental.local/frontend/image/New_Zealand.png" alt="" class="img-fluid">
                                    <span class="px-2 driving_contry_font_fix ellipsis">New Zealand</span>
                                </div>
                                </a>
                            </div>
                        </div>
                         <div class="col-md-3 pb-3">
                            <div class="flag_fix_final">
                                <a href="#">
                                       <div class="flag_fix">
                                    <img src="http://friends-car-rental.local/frontend/image/spain.png" alt="" class="img-fluid">
                                    <span class="px-2 driving_contry_font_fix ellipsis">Spain</span>
                                </div>
                                </a>
                            </div>
                        </div>
                         <div class="col-md-3 pb-3">
                            <div class="flag_fix_final">
                                <a href="#">
                                       <div class="flag_fix">
                                    <img src="http://friends-car-rental.local/frontend/image/france.png" alt="" class="img-fluid">
                                    <span class="px-2 driving_contry_font_fix ellipsis">France</span>
                                </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 pb-3">
                            <div class="flag_fix_final">
                                <a href="#">
                                       <div class="flag_fix">
                                    <img src="http://friends-car-rental.local/frontend/image/Norway.png" alt="" class="img-fluid">
                                    <span class="px-2 driving_contry_font_fix ellipsis">Norway</span>
                                </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3 pb-3">
                            <div class="flag_fix_final">
                                <a href="#">
                                       <div class="flag_fix">
                                    <img src="http://friends-car-rental.local/frontend/image/Sweden.png" alt="" class="img-fluid">
                                    <span class="px-2 driving_contry_font_fix ellipsis">Sweden</span>
                                </div>
                                </a>
                            </div>
                        </div>
                         <div class="col-md-3 pb-3">
                            <div class="flag_fix_final">
                                <a href="#">
                                       <div class="flag_fix">
                                    <img src="http://friends-car-rental.local/frontend/image/Germany.png" alt="" class="img-fluid">
                                    <span class="px-2 driving_contry_font_fix ellipsis">Germany</span>
                                </div>
                                </a>
                            </div>
                        </div>
                         <div class="col-md-3 pb-3">
                            <div class="flag_fix_final">
                                <a href="#">
                                       <div class="flag_fix">
                                    <img src="http://friends-car-rental.local/frontend/image/Oman.png" alt="" class="img-fluid">
                                    <span class="px-2 driving_contry_font_fix ellipsis">Oman</span>
                                </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 pb-3">
                            <div class="flag_fix_final">
                                <a href="#">
                                       <div class="flag_fix">
                                    <img src="http://friends-car-rental.local/frontend/image/Switzerland.png" alt="" class="img-fluid">
                                    <span class="px-2 driving_contry_font_fix ellipsis">Switzerland</span>
                                </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3 pb-3">
                            <div class="flag_fix_final">
                                <a href="#">
                                       <div class="flag_fix">
                                    <img src="http://friends-car-rental.local/frontend/image/Greece.png" alt="" class="img-fluid">
                                    <span class="px-2 driving_contry_font_fix ellipsis">Greece</span>
                                </div>
                                </a>
                            </div>
                        </div>
                         <div class="col-md-3 pb-3">
                            <div class="flag_fix_final">
                                <a href="#">
                                       <div class="flag_fix">
                                    <img src="http://friends-car-rental.local/frontend/image/Poland.png" alt="" class="img-fluid">
                                    <span class="px-2 driving_contry_font_fix ellipsis">Poland</span>
                                </div>
                                </a>
                            </div>
                        </div>
                         <div class="col-md-3 pb-3">
                            <div class="flag_fix_final">
                                <a href="#">
                                       <div class="flag_fix">
                                    <img src="http://friends-car-rental.local/frontend/image/Turkey.png" alt="" class="img-fluid">
                                    <span class="px-2 driving_contry_font_fix ellipsis">Turkey</span>
                                </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 pb-3">
                            <div class="flag_fix_final">
                                <a href="#">
                                       <div class="flag_fix">
                                    <img src="http://friends-car-rental.local/frontend/image/Hungary.png" alt="" class="img-fluid">
                                    <span class="px-2 driving_contry_font_fix ellipsis">Hungary</span>
                                </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3 pb-3">
                            <div class="flag_fix_final">
                                <a href="#">
                                       <div class="flag_fix">
                                    <img src="http://friends-car-rental.local/frontend/image/Portugal.png" alt="" class="img-fluid">
                                    <span class="px-2 driving_contry_font_fix ellipsis">Portugal</span>
                                </div>
                                </a>
                            </div>
                        </div>
                         <div class="col-md-3 pb-3">
                            <div class="flag_fix_final">
                                <a href="#">
                                       <div class="flag_fix">
                                    <img src="http://friends-car-rental.local/frontend/image/United_Kingdom.png" alt="" class="img-fluid">
                                    <span class="px-2 driving_contry_font_fix ellipsis">United Kingdom(UK)</span>
                                </div>
                                </a>
                            </div>
                        </div>
                         <div class="col-md-3 pb-3">
                            <div class="flag_fix_final">
                                <a href="#">
                                       <div class="flag_fix">
                                    <img src="http://friends-car-rental.local/frontend/image/Hong_Kong.png" alt="" class="img-fluid">
                                    <span class="px-2 driving_contry_font_fix ellipsis">Hong Kong</span>
                                </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 pb-3">
                            <div class="flag_fix_final">
                                <a href="#">
                                       <div class="flag_fix">
                                    <img src="http://friends-car-rental.local/frontend/image/Qatar.png" alt="" class="img-fluid">
                                    <span class="px-2 driving_contry_font_fix ellipsis">Qatar</span>
                                </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3 pb-3">
                            <div class="flag_fix_final">
                                <a href="#">
                                       <div class="flag_fix">
                                    <img src="http://friends-car-rental.local/frontend/image/USA.png" alt="" class="img-fluid">
                                    <span class="px-2 driving_contry_font_fix ellipsis">USA</span>
                                </div>
                                </a>
                            </div>
                        </div>
                         <div class="col-md-3 pb-3">
                            <div class="flag_fix_final">
                                <a href="#">
                                       <div class="flag_fix">
                                    <img src="http://friends-car-rental.local/frontend/image/Ireland.png" alt="" class="img-fluid">
                                    <span class="px-2 driving_contry_font_fix ellipsis">Ireland</span>
                                </div>
                                </a>
                            </div>
                        </div>
                         <div class="col-md-3 pb-3">
                            <div class="flag_fix_final">
                                <a href="#">
                                       <div class="flag_fix">
                                    <img src="http://friends-car-rental.local/frontend/image/India.png" alt="" class="img-fluid">
                                    <span class="px-2 driving_contry_font_fix ellipsis">India</span>
                                </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <section class="dubai_car_rent">
                    <div class="container">
                        <div class="dubai_car_rent_details">
                            <div class="car_rent_txt">
                                <h2 class="d-flex">Luxury Car Rental Dubai<span class="d-md-block d-none px-1"> — </span> the easy way</h2>
                                <p>Drive your drеаm car in Dubai . Сhооsе саrs frоm рrеmium brаnds likе Rоlls Rоуcе, Bentley, Меrсеdеs Веnz, Range Rover, Porsche and more. If youre interested in something sporty like a Fеrrаri, Lambоrghini and the likes, check out our Sports Car Rentals section.</p>
                            </div>
                            <div class="car_rent_txt">
                                <h2>Rent Luxury cars in Dubai</h2>
                                <p>Looking tо rеnt luхurу саrs in thе еmirаtе of Dubаi? Dont settle with the first prеmium саr rеntаl shоp, compare offers from a number of car hire brands. Rеnt аnу ехоtiс саr оf уоur liking аt the lowest in market rаtеs. Tаstе luхurу оn thе suреrсаr-friеndlу rоаds оf Dubаi. Be sure to contact the companies directly via Phone or WhatsApp and ask them for their ongoing promotions.
                                </p>
                            </div>
                            <div class="car_rent_txt">
                                <h2>Range of Luxury Car Options</h2>
                                <p>Our luхurу саr rental flееt includе a widе rаngе of tоp-оf-the-linе саrs to set your travel experience apart in Dubаi. Pаy by cаsh or a crеdit / debit саrd and bооk with the supplier directly. Frоm Rаngе Rоvеrs tо Rоlls Rоуcе, find thе mоst ехclusivе саrs at the lоwеst rаtеs offеrеd bу еstаblishеd cоmpаniеs in thе UАЕ. If youre confused which company to choose, you can always check out the companys Google Reviews.</p>
                            </div>
                            <div class="car_rent_txt">
                                <h2>Rent Exotic Cars in Dubai</h2>
                                <p>Many people from around the world have seen the videos of supercars with a medley of Dubai’s lifestyle. Every other Instablogger has uploaded a dune-bashing video conquering the desert sands. It’s no doubt that the UAE is a hotspot for rare and powerful motors. From crazy sand-buggies doing insane stunts up hills, to Ferraris, Rolls Royces and other hypercars cruising down the road. The UAE doesn’t hide its wide array of cars. This love for cars began many years ago, before there were roads in the UAE. Back then, people used to drive through the soft, unforgiving, sand to get from point A to B.</p>
                                <p>As motorcars developed, people used to tune their cars for more power to travel through the sand with ease. This developed into a sport, in which people would race their cars up dunes, and modify them to make them faster and more powerful. Thus began the love for cars, and the love for speed and power.
                                    As the UAE developed into the futuristic urban country that it is today, people’s taste for cars developed, but their love for large SUVs remained. Today, you can see many supercars driving alongside Nissan Patrols and Toyota Land-Cruisers, both garnering similar levels of respect on the road.</p>
                            </div>
                        </div>
                    </div>
            </section>',
        ]);
        PageTranslation::create([
            'page_id' => '5',
            'locale' => 'fr',
            'page_name' => 'Permis de conduire de pays valables aux EAU',
            'page_title' => 'Permis de conduire autorisé',
            'page_body' => '<div class="container my-3">
            <nav style="--bs-breadcrumb-divider: url(" data:image="" svg+xml,%3csvg="" xmlns="http://www.w3.org/2000/svg" width="8" height="8" %3e%3cpath="" d="M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z" fill="%236c757d" %3e%3c="" svg%3e");"="" aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item breadcrumb_fix " aria-current="page"><a href="/">Maison</a></li>
                <li class="breadcrumb-item breadcrumb_fix_active active " aria-current="page">Permis de conduire de pays valables aux EAU</li>
              </ol>
            </nav>

                <h1 class="driving_licenses_fix text-center">Permis de conduire de pays valables aux EAU</h1>
                <div class="row margin_top_40">
                        <div class="col-md-3 pb-3">
                            <div class="flag_fix_final">
                                <a href="#">
                                       <div class="flag_fix">
                                    <img src="http://friends-car-rental.local/frontend/image/austria.png" alt="" class="img-fluid">
                                    <span class="px-2 driving_contry_font_fix ellipsis">Austria</span>
                                </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3 pb-3">
                            <div class="flag_fix_final">
                                <a href="#">
                                       <div class="flag_fix">
                                    <img src="http://friends-car-rental.local/frontend/image/italy.png" alt="" class="img-fluid">
                                    <span class="px-2 driving_contry_font_fix ellipsis">Italy</span>
                                </div>
                                </a>
                            </div>
                        </div>
                         <div class="col-md-3 pb-3">
                            <div class="flag_fix_final">
                                <a href="#">
                                       <div class="flag_fix">
                                    <img src="http://friends-car-rental.local/frontend/image/romania.png" alt="" class="img-fluid">
                                    <span class="px-2 driving_contry_font_fix ellipsis">Romania</span>
                                </div>
                                </a>
                            </div>
                        </div>
                         <div class="col-md-3 pb-3">
                            <div class="flag_fix_final">
                                <a href="#">
                                       <div class="flag_fix">
                                    <img src="http://friends-car-rental.local/frontend/image/australia.png" alt="" class="img-fluid">
                                    <span class="px-2 driving_contry_font_fix ellipsis">Australia</span>
                                </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 pb-3">
                            <div class="flag_fix_final">
                                <a href="#">
                                       <div class="flag_fix">
                                    <img src="http://friends-car-rental.local/frontend/image/japan.png" alt="" class="img-fluid">
                                    <span class="px-2 driving_contry_font_fix ellipsis">Japan</span>
                                </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3 pb-3">
                            <div class="flag_fix_final">
                                <a href="#">
                                       <div class="flag_fix">
                                    <img src="http://friends-car-rental.local/frontend/image/saud.png" alt="" class="img-fluid">
                                    <span class="px-2 driving_contry_font_fix ellipsis">Saudi Arabia</span>
                                </div>
                                </a>
                            </div>
                        </div>
                         <div class="col-md-3 pb-3">
                            <div class="flag_fix_final">
                                <a href="#">
                                       <div class="flag_fix">
                                    <img src="http://friends-car-rental.local/frontend/image/bahrain.png" alt="" class="img-fluid">
                                    <span class="px-2 driving_contry_font_fix ellipsis">Bahrain</span>
                                </div>
                                </a>
                            </div>
                        </div>
                         <div class="col-md-3 pb-3">
                            <div class="flag_fix_final">
                                <a href="#">
                                       <div class="flag_fix">
                                    <img src="http://friends-car-rental.local/frontend/image/kuwait.png" alt="" class="img-fluid">
                                    <span class="px-2 driving_contry_font_fix ellipsis">Kuwait</span>
                                </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 pb-3">
                            <div class="flag_fix_final">
                                <a href="#">
                                       <div class="flag_fix">
                                    <img src="http://friends-car-rental.local/frontend/image/belgium.png" alt="" class="img-fluid">
                                    <span class="px-2 driving_contry_font_fix ellipsis">Belgium</span>
                                </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3 pb-3">
                            <div class="flag_fix_final">
                                <a href="#">
                                       <div class="flag_fix">
                                    <img src="http://friends-car-rental.local/frontend/image/latvia.png" alt="" class="img-fluid">
                                    <span class="px-2 driving_contry_font_fix ellipsis">Latvia</span>
                                </div>
                                </a>
                            </div>
                        </div>
                         <div class="col-md-3 pb-3">
                            <div class="flag_fix_final">
                                <a href="#">
                                       <div class="flag_fix">
                                    <img src="http://friends-car-rental.local/frontend/image/singapore.png" alt="" class="img-fluid">
                                    <span class="px-2 driving_contry_font_fix ellipsis">Singapore</span>
                                </div>
                                </a>
                            </div>
                        </div>
                         <div class="col-md-3 pb-3">
                            <div class="flag_fix_final">
                                <a href="#">
                                       <div class="flag_fix">
                                    <img src="http://friends-car-rental.local/frontend/image/canada.png" alt="" class="img-fluid">
                                    <span class="px-2 driving_contry_font_fix ellipsis">Canada (Quebec*)</span>
                                </div>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3 pb-3">
                            <div class="flag_fix_final">
                                <a href="#">
                                       <div class="flag_fix">
                                    <img src="http://friends-car-rental.local/frontend/image/lithuania.png" alt="" class="img-fluid">
                                    <span class="px-2 driving_contry_font_fix ellipsis">Lithuania</span>
                                </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3 pb-3">
                            <div class="flag_fix_final">
                                <a href="#">
                                       <div class="flag_fix">
                                    <img src="http://friends-car-rental.local/frontend/image/slovakia.png" alt="" class="img-fluid">
                                    <span class="px-2 driving_contry_font_fix ellipsis">Slovakia</span>
                                </div>
                                </a>
                            </div>
                        </div>
                         <div class="col-md-3 pb-3">
                            <div class="flag_fix_final">
                                <a href="#">
                                       <div class="flag_fix">
                                    <img src="http://friends-car-rental.local/frontend/image/china.png" alt="" class="img-fluid">
                                    <span class="px-2 driving_contry_font_fix ellipsis">China</span>
                                </div>
                                </a>
                            </div>
                        </div>
                         <div class="col-md-3 pb-3">
                            <div class="flag_fix_final">
                                <a href="#">
                                       <div class="flag_fix">
                                    <img src="http://friends-car-rental.local/frontend/image/luxembourg.png" alt="" class="img-fluid">
                                    <span class="px-2 driving_contry_font_fix ellipsis">Luxembourg</span>
                                </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 pb-3">
                            <div class="flag_fix_final">
                                <a href="#">
                                       <div class="flag_fix">
                                    <img src="http://friends-car-rental.local/frontend/image/south_africa.png" alt="" class="img-fluid">
                                    <span class="px-2 driving_contry_font_fix ellipsis">South Africa</span>
                                </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3 pb-3">
                            <div class="flag_fix_final">
                                <a href="#">
                                       <div class="flag_fix">
                                    <img src="http://friends-car-rental.local/frontend/image/Denmark.png" alt="" class="img-fluid">
                                    <span class="px-2 driving_contry_font_fix ellipsis">Denmark</span>
                                </div>
                                </a>
                            </div>
                        </div>
                         <div class="col-md-3 pb-3">
                            <div class="flag_fix_final">
                                <a href="#">
                                       <div class="flag_fix">
                                    <img src="http://friends-car-rental.local/frontend/image/Netherlands.png" alt="" class="img-fluid">
                                    <span class="px-2 driving_contry_font_fix ellipsis">Netherlands (Holland)</span>
                                </div>
                                </a>
                            </div>
                        </div>
                         <div class="col-md-3 pb-3">
                            <div class="flag_fix_final">
                                <a href="#">
                                       <div class="flag_fix">
                                    <img src="http://friends-car-rental.local/frontend/image/south_korea.png" alt="" class="img-fluid">
                                    <span class="px-2 driving_contry_font_fix ellipsis">South Korea</span>
                                </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 pb-3">
                            <div class="flag_fix_final">
                                <a href="#">
                                       <div class="flag_fix">
                                    <img src="http://friends-car-rental.local/frontend/image/Finland.png" alt="" class="img-fluid">
                                    <span class="px-2 driving_contry_font_fix ellipsis">Finland</span>
                                </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3 pb-3">
                            <div class="flag_fix_final">
                                <a href="#">
                                       <div class="flag_fix">
                                    <img src="http://friends-car-rental.local/frontend/image/New_Zealand.png" alt="" class="img-fluid">
                                    <span class="px-2 driving_contry_font_fix ellipsis">New Zealand</span>
                                </div>
                                </a>
                            </div>
                        </div>
                         <div class="col-md-3 pb-3">
                            <div class="flag_fix_final">
                                <a href="#">
                                       <div class="flag_fix">
                                    <img src="http://friends-car-rental.local/frontend/image/spain.png" alt="" class="img-fluid">
                                    <span class="px-2 driving_contry_font_fix ellipsis">Spain</span>
                                </div>
                                </a>
                            </div>
                        </div>
                         <div class="col-md-3 pb-3">
                            <div class="flag_fix_final">
                                <a href="#">
                                       <div class="flag_fix">
                                    <img src="http://friends-car-rental.local/frontend/image/france.png" alt="" class="img-fluid">
                                    <span class="px-2 driving_contry_font_fix ellipsis">France</span>
                                </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 pb-3">
                            <div class="flag_fix_final">
                                <a href="#">
                                       <div class="flag_fix">
                                    <img src="http://friends-car-rental.local/frontend/image/Norway.png" alt="" class="img-fluid">
                                    <span class="px-2 driving_contry_font_fix ellipsis">Norway</span>
                                </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3 pb-3">
                            <div class="flag_fix_final">
                                <a href="#">
                                       <div class="flag_fix">
                                    <img src="http://friends-car-rental.local/frontend/image/Sweden.png" alt="" class="img-fluid">
                                    <span class="px-2 driving_contry_font_fix ellipsis">Sweden</span>
                                </div>
                                </a>
                            </div>
                        </div>
                         <div class="col-md-3 pb-3">
                            <div class="flag_fix_final">
                                <a href="#">
                                       <div class="flag_fix">
                                    <img src="http://friends-car-rental.local/frontend/image/Germany.png" alt="" class="img-fluid">
                                    <span class="px-2 driving_contry_font_fix ellipsis">Germany</span>
                                </div>
                                </a>
                            </div>
                        </div>
                         <div class="col-md-3 pb-3">
                            <div class="flag_fix_final">
                                <a href="#">
                                       <div class="flag_fix">
                                    <img src="http://friends-car-rental.local/frontend/image/Oman.png" alt="" class="img-fluid">
                                    <span class="px-2 driving_contry_font_fix ellipsis">Oman</span>
                                </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 pb-3">
                            <div class="flag_fix_final">
                                <a href="#">
                                       <div class="flag_fix">
                                    <img src="http://friends-car-rental.local/frontend/image/Switzerland.png" alt="" class="img-fluid">
                                    <span class="px-2 driving_contry_font_fix ellipsis">Switzerland</span>
                                </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3 pb-3">
                            <div class="flag_fix_final">
                                <a href="#">
                                       <div class="flag_fix">
                                    <img src="http://friends-car-rental.local/frontend/image/Greece.png" alt="" class="img-fluid">
                                    <span class="px-2 driving_contry_font_fix ellipsis">Greece</span>
                                </div>
                                </a>
                            </div>
                        </div>
                         <div class="col-md-3 pb-3">
                            <div class="flag_fix_final">
                                <a href="#">
                                       <div class="flag_fix">
                                    <img src="http://friends-car-rental.local/frontend/image/Poland.png" alt="" class="img-fluid">
                                    <span class="px-2 driving_contry_font_fix ellipsis">Poland</span>
                                </div>
                                </a>
                            </div>
                        </div>
                         <div class="col-md-3 pb-3">
                            <div class="flag_fix_final">
                                <a href="#">
                                       <div class="flag_fix">
                                    <img src="http://friends-car-rental.local/frontend/image/Turkey.png" alt="" class="img-fluid">
                                    <span class="px-2 driving_contry_font_fix ellipsis">Turkey</span>
                                </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 pb-3">
                            <div class="flag_fix_final">
                                <a href="#">
                                       <div class="flag_fix">
                                    <img src="http://friends-car-rental.local/frontend/image/Hungary.png" alt="" class="img-fluid">
                                    <span class="px-2 driving_contry_font_fix ellipsis">Hungary</span>
                                </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3 pb-3">
                            <div class="flag_fix_final">
                                <a href="#">
                                       <div class="flag_fix">
                                    <img src="http://friends-car-rental.local/frontend/image/Portugal.png" alt="" class="img-fluid">
                                    <span class="px-2 driving_contry_font_fix ellipsis">Portugal</span>
                                </div>
                                </a>
                            </div>
                        </div>
                         <div class="col-md-3 pb-3">
                            <div class="flag_fix_final">
                                <a href="#">
                                       <div class="flag_fix">
                                    <img src="http://friends-car-rental.local/frontend/image/United_Kingdom.png" alt="" class="img-fluid">
                                    <span class="px-2 driving_contry_font_fix ellipsis">United Kingdom(UK)</span>
                                </div>
                                </a>
                            </div>
                        </div>
                         <div class="col-md-3 pb-3">
                            <div class="flag_fix_final">
                                <a href="#">
                                       <div class="flag_fix">
                                    <img src="http://friends-car-rental.local/frontend/image/Hong_Kong.png" alt="" class="img-fluid">
                                    <span class="px-2 driving_contry_font_fix ellipsis">Hong Kong</span>
                                </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 pb-3">
                            <div class="flag_fix_final">
                                <a href="#">
                                       <div class="flag_fix">
                                    <img src="http://friends-car-rental.local/frontend/image/Qatar.png" alt="" class="img-fluid">
                                    <span class="px-2 driving_contry_font_fix ellipsis">Qatar</span>
                                </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3 pb-3">
                            <div class="flag_fix_final">
                                <a href="#">
                                       <div class="flag_fix">
                                    <img src="http://friends-car-rental.local/frontend/image/USA.png" alt="" class="img-fluid">
                                    <span class="px-2 driving_contry_font_fix ellipsis">USA</span>
                                </div>
                                </a>
                            </div>
                        </div>
                         <div class="col-md-3 pb-3">
                            <div class="flag_fix_final">
                                <a href="#">
                                       <div class="flag_fix">
                                    <img src="http://friends-car-rental.local/frontend/image/Ireland.png" alt="" class="img-fluid">
                                    <span class="px-2 driving_contry_font_fix ellipsis">Ireland</span>
                                </div>
                                </a>
                            </div>
                        </div>
                         <div class="col-md-3 pb-3">
                            <div class="flag_fix_final">
                                <a href="#">
                                       <div class="flag_fix">
                                    <img src="http://friends-car-rental.local/frontend/image/India.png" alt="" class="img-fluid">
                                    <span class="px-2 driving_contry_font_fix ellipsis">India</span>
                                </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <section class="dubai_car_rent">
                    <div class="container">
                        <div class="dubai_car_rent_details">
                            <div class="car_rent_txt">
                                <h2 class="d-flex">Luxury Car Rental Dubai<span class="d-md-block d-none px-1"> — </span> the easy way</h2>
                                <p>Drive your drеаm car in Dubai . Сhооsе саrs frоm рrеmium brаnds likе Rоlls Rоуcе, Bentley, Меrсеdеs Веnz, Range Rover, Porsche and more. If youre interested in something sporty like a Fеrrаri, Lambоrghini and the likes, check out our Sports Car Rentals section.</p>
                            </div>
                            <div class="car_rent_txt">
                                <h2>Rent Luxury cars in Dubai</h2>
                                <p>Looking tо rеnt luхurу саrs in thе еmirаtе of Dubаi? Dont settle with the first prеmium саr rеntаl shоp, compare offers from a number of car hire brands. Rеnt аnу ехоtiс саr оf уоur liking аt the lowest in market rаtеs. Tаstе luхurу оn thе suреrсаr-friеndlу rоаds оf Dubаi. Be sure to contact the companies directly via Phone or WhatsApp and ask them for their ongoing promotions.
                                </p>
                            </div>
                            <div class="car_rent_txt">
                                <h2>Range of Luxury Car Options</h2>
                                <p>Our luхurу саr rental flееt includе a widе rаngе of tоp-оf-the-linе саrs to set your travel experience apart in Dubаi. Pаy by cаsh or a crеdit / debit саrd and bооk with the supplier directly. Frоm Rаngе Rоvеrs tо Rоlls Rоуcе, find thе mоst ехclusivе саrs at the lоwеst rаtеs offеrеd bу еstаblishеd cоmpаniеs in thе UАЕ. If youre confused which company to choose, you can always check out the companys Google Reviews.</p>
                            </div>
                            <div class="car_rent_txt">
                                <h2>Rent Exotic Cars in Dubai</h2>
                                <p>Many people from around the world have seen the videos of supercars with a medley of Dubai’s lifestyle. Every other Instablogger has uploaded a dune-bashing video conquering the desert sands. It’s no doubt that the UAE is a hotspot for rare and powerful motors. From crazy sand-buggies doing insane stunts up hills, to Ferraris, Rolls Royces and other hypercars cruising down the road. The UAE doesn’t hide its wide array of cars. This love for cars began many years ago, before there were roads in the UAE. Back then, people used to drive through the soft, unforgiving, sand to get from point A to B.</p>
                                <p>As motorcars developed, people used to tune their cars for more power to travel through the sand with ease. This developed into a sport, in which people would race their cars up dunes, and modify them to make them faster and more powerful. Thus began the love for cars, and the love for speed and power.
                                    As the UAE developed into the futuristic urban country that it is today, people’s taste for cars developed, but their love for large SUVs remained. Today, you can see many supercars driving alongside Nissan Patrols and Toyota Land-Cruisers, both garnering similar levels of respect on the road.</p>
                            </div>
                        </div>
                    </div>
            </section>',
        ]);
        PageTranslation::create([
            'page_id' => '5',
            'locale' => 'ru',
            'page_name' => 'Водительские права из стран, действительные в ОАЭ',
            'page_title' => 'Разрешенные водительские права',
            'page_body' => '<div class="container my-3">
            <nav style="--bs-breadcrumb-divider: url(" data:image="" svg+xml,%3csvg="" xmlns="http://www.w3.org/2000/svg" width="8" height="8" %3e%3cpath="" d="M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z" fill="%236c757d" %3e%3c="" svg%3e");"="" aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item breadcrumb_fix " aria-current="page"><a href="/">Дом</a></li>
                <li class="breadcrumb-item breadcrumb_fix_active active " aria-current="page">Водительские права из стран, действительные в ОАЭ</li>
              </ol>
            </nav>

                <h1 class="driving_licenses_fix text-center">Водительские права из стран, действительные в ОАЭ</h1>
                <div class="row margin_top_40">
                        <div class="col-md-3 pb-3">
                            <div class="flag_fix_final">
                                <a href="#">
                                       <div class="flag_fix">
                                    <img src="http://friends-car-rental.local/frontend/image/austria.png" alt="" class="img-fluid">
                                    <span class="px-2 driving_contry_font_fix ellipsis">Austria</span>
                                </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3 pb-3">
                            <div class="flag_fix_final">
                                <a href="#">
                                       <div class="flag_fix">
                                    <img src="http://friends-car-rental.local/frontend/image/italy.png" alt="" class="img-fluid">
                                    <span class="px-2 driving_contry_font_fix ellipsis">Italy</span>
                                </div>
                                </a>
                            </div>
                        </div>
                         <div class="col-md-3 pb-3">
                            <div class="flag_fix_final">
                                <a href="#">
                                       <div class="flag_fix">
                                    <img src="http://friends-car-rental.local/frontend/image/romania.png" alt="" class="img-fluid">
                                    <span class="px-2 driving_contry_font_fix ellipsis">Romania</span>
                                </div>
                                </a>
                            </div>
                        </div>
                         <div class="col-md-3 pb-3">
                            <div class="flag_fix_final">
                                <a href="#">
                                       <div class="flag_fix">
                                    <img src="http://friends-car-rental.local/frontend/image/australia.png" alt="" class="img-fluid">
                                    <span class="px-2 driving_contry_font_fix ellipsis">Australia</span>
                                </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 pb-3">
                            <div class="flag_fix_final">
                                <a href="#">
                                       <div class="flag_fix">
                                    <img src="http://friends-car-rental.local/frontend/image/japan.png" alt="" class="img-fluid">
                                    <span class="px-2 driving_contry_font_fix ellipsis">Japan</span>
                                </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3 pb-3">
                            <div class="flag_fix_final">
                                <a href="#">
                                       <div class="flag_fix">
                                    <img src="http://friends-car-rental.local/frontend/image/saud.png" alt="" class="img-fluid">
                                    <span class="px-2 driving_contry_font_fix ellipsis">Saudi Arabia</span>
                                </div>
                                </a>
                            </div>
                        </div>
                         <div class="col-md-3 pb-3">
                            <div class="flag_fix_final">
                                <a href="#">
                                       <div class="flag_fix">
                                    <img src="http://friends-car-rental.local/frontend/image/bahrain.png" alt="" class="img-fluid">
                                    <span class="px-2 driving_contry_font_fix ellipsis">Bahrain</span>
                                </div>
                                </a>
                            </div>
                        </div>
                         <div class="col-md-3 pb-3">
                            <div class="flag_fix_final">
                                <a href="#">
                                       <div class="flag_fix">
                                    <img src="http://friends-car-rental.local/frontend/image/kuwait.png" alt="" class="img-fluid">
                                    <span class="px-2 driving_contry_font_fix ellipsis">Kuwait</span>
                                </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 pb-3">
                            <div class="flag_fix_final">
                                <a href="#">
                                       <div class="flag_fix">
                                    <img src="http://friends-car-rental.local/frontend/image/belgium.png" alt="" class="img-fluid">
                                    <span class="px-2 driving_contry_font_fix ellipsis">Belgium</span>
                                </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3 pb-3">
                            <div class="flag_fix_final">
                                <a href="#">
                                       <div class="flag_fix">
                                    <img src="http://friends-car-rental.local/frontend/image/latvia.png" alt="" class="img-fluid">
                                    <span class="px-2 driving_contry_font_fix ellipsis">Latvia</span>
                                </div>
                                </a>
                            </div>
                        </div>
                         <div class="col-md-3 pb-3">
                            <div class="flag_fix_final">
                                <a href="#">
                                       <div class="flag_fix">
                                    <img src="http://friends-car-rental.local/frontend/image/singapore.png" alt="" class="img-fluid">
                                    <span class="px-2 driving_contry_font_fix ellipsis">Singapore</span>
                                </div>
                                </a>
                            </div>
                        </div>
                         <div class="col-md-3 pb-3">
                            <div class="flag_fix_final">
                                <a href="#">
                                       <div class="flag_fix">
                                    <img src="http://friends-car-rental.local/frontend/image/canada.png" alt="" class="img-fluid">
                                    <span class="px-2 driving_contry_font_fix ellipsis">Canada (Quebec*)</span>
                                </div>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3 pb-3">
                            <div class="flag_fix_final">
                                <a href="#">
                                       <div class="flag_fix">
                                    <img src="http://friends-car-rental.local/frontend/image/lithuania.png" alt="" class="img-fluid">
                                    <span class="px-2 driving_contry_font_fix ellipsis">Lithuania</span>
                                </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3 pb-3">
                            <div class="flag_fix_final">
                                <a href="#">
                                       <div class="flag_fix">
                                    <img src="http://friends-car-rental.local/frontend/image/slovakia.png" alt="" class="img-fluid">
                                    <span class="px-2 driving_contry_font_fix ellipsis">Slovakia</span>
                                </div>
                                </a>
                            </div>
                        </div>
                         <div class="col-md-3 pb-3">
                            <div class="flag_fix_final">
                                <a href="#">
                                       <div class="flag_fix">
                                    <img src="http://friends-car-rental.local/frontend/image/china.png" alt="" class="img-fluid">
                                    <span class="px-2 driving_contry_font_fix ellipsis">China</span>
                                </div>
                                </a>
                            </div>
                        </div>
                         <div class="col-md-3 pb-3">
                            <div class="flag_fix_final">
                                <a href="#">
                                       <div class="flag_fix">
                                    <img src="http://friends-car-rental.local/frontend/image/luxembourg.png" alt="" class="img-fluid">
                                    <span class="px-2 driving_contry_font_fix ellipsis">Luxembourg</span>
                                </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 pb-3">
                            <div class="flag_fix_final">
                                <a href="#">
                                       <div class="flag_fix">
                                    <img src="http://friends-car-rental.local/frontend/image/south_africa.png" alt="" class="img-fluid">
                                    <span class="px-2 driving_contry_font_fix ellipsis">South Africa</span>
                                </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3 pb-3">
                            <div class="flag_fix_final">
                                <a href="#">
                                       <div class="flag_fix">
                                    <img src="http://friends-car-rental.local/frontend/image/Denmark.png" alt="" class="img-fluid">
                                    <span class="px-2 driving_contry_font_fix ellipsis">Denmark</span>
                                </div>
                                </a>
                            </div>
                        </div>
                         <div class="col-md-3 pb-3">
                            <div class="flag_fix_final">
                                <a href="#">
                                       <div class="flag_fix">
                                    <img src="http://friends-car-rental.local/frontend/image/Netherlands.png" alt="" class="img-fluid">
                                    <span class="px-2 driving_contry_font_fix ellipsis">Netherlands (Holland)</span>
                                </div>
                                </a>
                            </div>
                        </div>
                         <div class="col-md-3 pb-3">
                            <div class="flag_fix_final">
                                <a href="#">
                                       <div class="flag_fix">
                                    <img src="http://friends-car-rental.local/frontend/image/south_korea.png" alt="" class="img-fluid">
                                    <span class="px-2 driving_contry_font_fix ellipsis">South Korea</span>
                                </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 pb-3">
                            <div class="flag_fix_final">
                                <a href="#">
                                       <div class="flag_fix">
                                    <img src="http://friends-car-rental.local/frontend/image/Finland.png" alt="" class="img-fluid">
                                    <span class="px-2 driving_contry_font_fix ellipsis">Finland</span>
                                </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3 pb-3">
                            <div class="flag_fix_final">
                                <a href="#">
                                       <div class="flag_fix">
                                    <img src="http://friends-car-rental.local/frontend/image/New_Zealand.png" alt="" class="img-fluid">
                                    <span class="px-2 driving_contry_font_fix ellipsis">New Zealand</span>
                                </div>
                                </a>
                            </div>
                        </div>
                         <div class="col-md-3 pb-3">
                            <div class="flag_fix_final">
                                <a href="#">
                                       <div class="flag_fix">
                                    <img src="http://friends-car-rental.local/frontend/image/spain.png" alt="" class="img-fluid">
                                    <span class="px-2 driving_contry_font_fix ellipsis">Spain</span>
                                </div>
                                </a>
                            </div>
                        </div>
                         <div class="col-md-3 pb-3">
                            <div class="flag_fix_final">
                                <a href="#">
                                       <div class="flag_fix">
                                    <img src="http://friends-car-rental.local/frontend/image/france.png" alt="" class="img-fluid">
                                    <span class="px-2 driving_contry_font_fix ellipsis">France</span>
                                </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 pb-3">
                            <div class="flag_fix_final">
                                <a href="#">
                                       <div class="flag_fix">
                                    <img src="http://friends-car-rental.local/frontend/image/Norway.png" alt="" class="img-fluid">
                                    <span class="px-2 driving_contry_font_fix ellipsis">Norway</span>
                                </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3 pb-3">
                            <div class="flag_fix_final">
                                <a href="#">
                                       <div class="flag_fix">
                                    <img src="http://friends-car-rental.local/frontend/image/Sweden.png" alt="" class="img-fluid">
                                    <span class="px-2 driving_contry_font_fix ellipsis">Sweden</span>
                                </div>
                                </a>
                            </div>
                        </div>
                         <div class="col-md-3 pb-3">
                            <div class="flag_fix_final">
                                <a href="#">
                                       <div class="flag_fix">
                                    <img src="http://friends-car-rental.local/frontend/image/Germany.png" alt="" class="img-fluid">
                                    <span class="px-2 driving_contry_font_fix ellipsis">Germany</span>
                                </div>
                                </a>
                            </div>
                        </div>
                         <div class="col-md-3 pb-3">
                            <div class="flag_fix_final">
                                <a href="#">
                                       <div class="flag_fix">
                                    <img src="http://friends-car-rental.local/frontend/image/Oman.png" alt="" class="img-fluid">
                                    <span class="px-2 driving_contry_font_fix ellipsis">Oman</span>
                                </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 pb-3">
                            <div class="flag_fix_final">
                                <a href="#">
                                       <div class="flag_fix">
                                    <img src="http://friends-car-rental.local/frontend/image/Switzerland.png" alt="" class="img-fluid">
                                    <span class="px-2 driving_contry_font_fix ellipsis">Switzerland</span>
                                </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3 pb-3">
                            <div class="flag_fix_final">
                                <a href="#">
                                       <div class="flag_fix">
                                    <img src="http://friends-car-rental.local/frontend/image/Greece.png" alt="" class="img-fluid">
                                    <span class="px-2 driving_contry_font_fix ellipsis">Greece</span>
                                </div>
                                </a>
                            </div>
                        </div>
                         <div class="col-md-3 pb-3">
                            <div class="flag_fix_final">
                                <a href="#">
                                       <div class="flag_fix">
                                    <img src="http://friends-car-rental.local/frontend/image/Poland.png" alt="" class="img-fluid">
                                    <span class="px-2 driving_contry_font_fix ellipsis">Poland</span>
                                </div>
                                </a>
                            </div>
                        </div>
                         <div class="col-md-3 pb-3">
                            <div class="flag_fix_final">
                                <a href="#">
                                       <div class="flag_fix">
                                    <img src="http://friends-car-rental.local/frontend/image/Turkey.png" alt="" class="img-fluid">
                                    <span class="px-2 driving_contry_font_fix ellipsis">Turkey</span>
                                </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 pb-3">
                            <div class="flag_fix_final">
                                <a href="#">
                                       <div class="flag_fix">
                                    <img src="http://friends-car-rental.local/frontend/image/Hungary.png" alt="" class="img-fluid">
                                    <span class="px-2 driving_contry_font_fix ellipsis">Hungary</span>
                                </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3 pb-3">
                            <div class="flag_fix_final">
                                <a href="#">
                                       <div class="flag_fix">
                                    <img src="http://friends-car-rental.local/frontend/image/Portugal.png" alt="" class="img-fluid">
                                    <span class="px-2 driving_contry_font_fix ellipsis">Portugal</span>
                                </div>
                                </a>
                            </div>
                        </div>
                         <div class="col-md-3 pb-3">
                            <div class="flag_fix_final">
                                <a href="#">
                                       <div class="flag_fix">
                                    <img src="http://friends-car-rental.local/frontend/image/United_Kingdom.png" alt="" class="img-fluid">
                                    <span class="px-2 driving_contry_font_fix ellipsis">United Kingdom(UK)</span>
                                </div>
                                </a>
                            </div>
                        </div>
                         <div class="col-md-3 pb-3">
                            <div class="flag_fix_final">
                                <a href="#">
                                       <div class="flag_fix">
                                    <img src="http://friends-car-rental.local/frontend/image/Hong_Kong.png" alt="" class="img-fluid">
                                    <span class="px-2 driving_contry_font_fix ellipsis">Hong Kong</span>
                                </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 pb-3">
                            <div class="flag_fix_final">
                                <a href="#">
                                       <div class="flag_fix">
                                    <img src="http://friends-car-rental.local/frontend/image/Qatar.png" alt="" class="img-fluid">
                                    <span class="px-2 driving_contry_font_fix ellipsis">Qatar</span>
                                </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3 pb-3">
                            <div class="flag_fix_final">
                                <a href="#">
                                       <div class="flag_fix">
                                    <img src="http://friends-car-rental.local/frontend/image/USA.png" alt="" class="img-fluid">
                                    <span class="px-2 driving_contry_font_fix ellipsis">USA</span>
                                </div>
                                </a>
                            </div>
                        </div>
                         <div class="col-md-3 pb-3">
                            <div class="flag_fix_final">
                                <a href="#">
                                       <div class="flag_fix">
                                    <img src="http://friends-car-rental.local/frontend/image/Ireland.png" alt="" class="img-fluid">
                                    <span class="px-2 driving_contry_font_fix ellipsis">Ireland</span>
                                </div>
                                </a>
                            </div>
                        </div>
                         <div class="col-md-3 pb-3">
                            <div class="flag_fix_final">
                                <a href="#">
                                       <div class="flag_fix">
                                    <img src="http://friends-car-rental.local/frontend/image/India.png" alt="" class="img-fluid">
                                    <span class="px-2 driving_contry_font_fix ellipsis">India</span>
                                </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <section class="dubai_car_rent">
                    <div class="container">
                        <div class="dubai_car_rent_details">
                            <div class="car_rent_txt">
                                <h2 class="d-flex">Luxury Car Rental Dubai<span class="d-md-block d-none px-1"> — </span> the easy way</h2>
                                <p>Drive your drеаm car in Dubai . Сhооsе саrs frоm рrеmium brаnds likе Rоlls Rоуcе, Bentley, Меrсеdеs Веnz, Range Rover, Porsche and more. If youre interested in something sporty like a Fеrrаri, Lambоrghini and the likes, check out our Sports Car Rentals section.</p>
                            </div>
                            <div class="car_rent_txt">
                                <h2>Rent Luxury cars in Dubai</h2>
                                <p>Looking tо rеnt luхurу саrs in thе еmirаtе of Dubаi? Dont settle with the first prеmium саr rеntаl shоp, compare offers from a number of car hire brands. Rеnt аnу ехоtiс саr оf уоur liking аt the lowest in market rаtеs. Tаstе luхurу оn thе suреrсаr-friеndlу rоаds оf Dubаi. Be sure to contact the companies directly via Phone or WhatsApp and ask them for their ongoing promotions.
                                </p>
                            </div>
                            <div class="car_rent_txt">
                                <h2>Range of Luxury Car Options</h2>
                                <p>Our luхurу саr rental flееt includе a widе rаngе of tоp-оf-the-linе саrs to set your travel experience apart in Dubаi. Pаy by cаsh or a crеdit / debit саrd and bооk with the supplier directly. Frоm Rаngе Rоvеrs tо Rоlls Rоуcе, find thе mоst ехclusivе саrs at the lоwеst rаtеs offеrеd bу еstаblishеd cоmpаniеs in thе UАЕ. If youre confused which company to choose, you can always check out the companys Google Reviews.</p>
                            </div>
                            <div class="car_rent_txt">
                                <h2>Rent Exotic Cars in Dubai</h2>
                                <p>Many people from around the world have seen the videos of supercars with a medley of Dubai’s lifestyle. Every other Instablogger has uploaded a dune-bashing video conquering the desert sands. It’s no doubt that the UAE is a hotspot for rare and powerful motors. From crazy sand-buggies doing insane stunts up hills, to Ferraris, Rolls Royces and other hypercars cruising down the road. The UAE doesn’t hide its wide array of cars. This love for cars began many years ago, before there were roads in the UAE. Back then, people used to drive through the soft, unforgiving, sand to get from point A to B.</p>
                                <p>As motorcars developed, people used to tune their cars for more power to travel through the sand with ease. This developed into a sport, in which people would race their cars up dunes, and modify them to make them faster and more powerful. Thus began the love for cars, and the love for speed and power.
                                    As the UAE developed into the futuristic urban country that it is today, people’s taste for cars developed, but their love for large SUVs remained. Today, you can see many supercars driving alongside Nissan Patrols and Toyota Land-Cruisers, both garnering similar levels of respect on the road.</p>
                            </div>
                        </div>
                    </div>
            </section>',
        ]);

        PageTranslation::create([
            'page_id' => '6',
            'locale' => 'en',
            'page_name' => 'Documents RequiredAE',
            'page_title' => 'Documents Required',
            'page_body' => '<div class="modal-dialog modal-dialog-centered modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header border-0">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body pt-0">
                                        <div class="container">
                                            <div class="text-center text-uppercase documents">Documents Required</div>
                                            <p class="text-center mx-5 py-3" style="color: #636872;">You are eligible to rent a car across the emirates provided you have the below mentioned
                                                documents valid with you:</p>

                                            <div class="row my-4">
                                                <div class="col-lg-1"></div>
                                                <div class="col-lg-12 col-xl-10">
                                                    <div class="row">
                                                        <div class="col-lg-6 mb-3 position-relative">
                                                            <div class="img_fix_positions">
                                                                <img src="' . url('/') . '/frontend/image/man_bg_img.png" class="img-fluid" alt="">
                                                            </div>
                                                            <div class="foreign_bg" style="height: 100%;">
                                                                <div class="foreign_visitors">
                                                                    Foreign Visitors
                                                                </div>
                                                                <div class="py-2">
                                                                    <div class="pb-2">
                                                                        <img src="' . url('/') . '/frontend/image/green_right.png" class="img-fluid" alt="">
                                                                        <span class="px-2 font_w_fix">Valid Original Passport</span>
                                                                    </div>
                                                                    <div class="pb-2 font_w_fix">
                                                                        <img src="' . url('/') . '/frontend/image/green_right.png" class="img-fluid" alt="">
                                                                        <span class="px-2">Valid Visit Visa</span>
                                                                    </div>
                                                                    <div class="pb-2">
                                                                        <img src="' . url('/') . '/frontend/image/green_right.png" class="img-fluid" alt="">
                                                                        <span class="px-2 font_w_fix">Valid Driver License Issued from Home Country</span>
                                                                    </div>
                                                                    <div class="pb-2">
                                                                        <img src="' . url('/') . '/frontend/image/green_right.png" class="img-fluid" alt="">
                                                                        <span class="px-2 font_w_fix">International Driving Permit (IDP)</span>
                                                                    </div>
                                                                    <div class="pb-2">
                                                                        <img src="' . url('/') . '/frontend/image/green_right.png" class="img-fluid" alt="">
                                                                        <span class="px-2 font_w_fix">Minimum age 21</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 mb-3 position-relative">
                                                            <div class="img_fix_positions">
                                                                <img src="' . url('/') . '/frontend/image/man_bg_img_2.png" class="img-fluid" alt="">
                                                            </div>
                                                            <div class="foreign_bg" style="height: 100%;">
                                                                <div class="foreign_visitors">
                                                                    Residents and UAE Nationals
                                                                </div>
                                                                <div class="py-2">
                                                                    <div class="pb-2">
                                                                        <img src="' . url('/') . '/frontend/image/green_right.png" class="img-fluid" alt="">
                                                                        <span class="px-2 font_w_fix">UAE Driving License</span>
                                                                    </div>
                                                                    <div class="pb-2">
                                                                        <img src="' . url('/') . '/frontend/image/green_right.png" class="img-fluid" alt="">
                                                                        <span class="px-2 font_w_fix">Emirates ID</span>
                                                                    </div>
                                                                    <div class="pb-2">
                                                                        <img src="' . url('/') . '/frontend/image/green_right.png" class="img-fluid" alt="">
                                                                        <span class="px-2 font_w_fix">(Residential Visa Or Passport may be acceptable)</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-1"></div>
                                            </div>
                                            <p class="text-center mx-5 py-3" style="color: #636872;">Visitors from the GCC, US, UK, Canada, Europe and certain other countries can drive with their home country driving license, without the need of an IDP. .)</p>

                                            <div class="pt-4 pb-5">
                                                <a href="#" class="d-flex justify-content-center align-items-center finder text-decoration-none">Find out if your countrys driving license is valid in the UAE<i class="fa-solid fa-arrow-right px-2"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>',
        ]);
        PageTranslation::create([
            'page_id' => '6',
            'locale' => 'ar',
            'page_name' => 'المستندات المطلوبة',
            'page_title' => 'المستندات المطلوبة',
            'page_body' => '<div class="modal-dialog modal-dialog-centered modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header border-0">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body pt-0">
                                        <div class="container">
                                            <div class="text-center text-uppercase documents">المستندات المطلوبة</div>
                                            <p class="text-center mx-5 py-3" style="color: #636872;">أنت مؤهل لاستئجار سيارة في جميع أنحاء الإمارات بشرط أن يكون لديك ما هو مذكور أدناه
                                                المستندات الصالحة معك:</p>

                                            <div class="row my-4">
                                                <div class="col-lg-1"></div>
                                                <div class="col-lg-12 col-xl-10">
                                                    <div class="row">
                                                        <div class="col-lg-6 mb-3 position-relative">
                                                            <div class="img_fix_positions">
                                                                <img src="' . url('/') . '/frontend/image/man_bg_img.png" class="img-fluid" alt="">
                                                            </div>
                                                            <div class="foreign_bg" style="height: 100%;">
                                                                <div class="foreign_visitors">
                                                                    زوار أجانب
                                                                </div>
                                                                <div class="py-2">
                                                                    <div class="pb-2">
                                                                        <img src="' . url('/') . '/frontend/image/green_right.png" class="img-fluid" alt="">
                                                                        <span class="px-2 font_w_fix">جواز سفر أصلي ساري المفعول</span>
                                                                    </div>
                                                                    <div class="pb-2 font_w_fix">
                                                                        <img src="' . url('/') . '/frontend/image/green_right.png" class="img-fluid" alt="">
                                                                        <span class="px-2">تأشيرة زيارة سارية</span>
                                                                    </div>
                                                                    <div class="pb-2">
                                                                        <img src="' . url('/') . 'd/image/green_right.png" class="img-fluid" alt="">
                                                                        <span class="px-2 font_w_fix">رخصة قيادة سارية صادرة من البلد الأم</span>
                                                                    </div>
                                                                    <div class="pb-2">
                                                                        <img src="' . url('/') . 'd/image/green_right.png" class="img-fluid" alt="">
                                                                        <span class="px-2 font_w_fix">رخصة القيادة الدولية (IDP)</span>
                                                                    </div>
                                                                    <div class="pb-2">
                                                                        <img src="' . url('/') . '/image/green_right.png" class="img-fluid" alt="">
                                                                        <span class="px-2 font_w_fix">أن لا يقل العمر عن 21 سنة</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 mb-3 position-relative">
                                                            <div class="img_fix_positions">
                                                                <img src="' . url('/') . '/frontend/image/man_bg_img_2.png" class="img-fluid" alt="">
                                                            </div>
                                                            <div class="foreign_bg" style="height: 100%;">
                                                                <div class="foreign_visitors">
                                                                    المقيمين ومواطني دولة الإمارات العربية المتحدة
                                                                </div>
                                                                <div class="py-2">
                                                                    <div class="pb-2">
                                                                        <img src="' . url('/') . '/frontend/image/green_right.png" class="img-fluid" alt="">
                                                                        <span class="px-2 font_w_fix">رخصة القيادة الإماراتية</span>
                                                                    </div>
                                                                    <div class="pb-2">
                                                                        <img src="' . url('/') . '/frontend/image/green_right.png" class="img-fluid" alt="">
                                                                        <span class="px-2 font_w_fix">هويه الإمارات</span>
                                                                    </div>
                                                                    <div class="pb-2">
                                                                        <img src="' . url('/') . '/frontend/image/green_right.png" class="img-fluid" alt="">
                                                                        <span class="px-2 font_w_fix">(قد تكون تأشيرة الإقامة أو جواز السفر مقبولين)</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-1"></div>
                                            </div>
                                            <p class="text-center mx-5 py-3" style="color: #636872;">يمكن للزوار من دول مجلس التعاون الخليجي والولايات المتحدة والمملكة المتحدة وكندا وأوروبا وبعض البلدان الأخرى القيادة برخصة القيادة في بلدهم الأم ، دون الحاجة إلى IDP. .)</p>

                                            <div class="pt-4 pb-5">
                                                <a href="#" class="d-flex justify-content-center align-items-center finder text-decoration-none">اكتشف ما إذا كانت رخصة القيادة الخاصة ببلدك صالحة في الإمارات العربية المتحدة<i class="fa-solid fa-arrow-right px-2"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>',
        ]);
        PageTranslation::create([
            'page_id' => '6',
            'locale' => 'fr',
            'page_name' => 'Documents requisx EAU',
            'page_title' => 'Documents requis',
            'page_body' => '<div class="modal-dialog modal-dialog-centered modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header border-0">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body pt-0">
                                        <div class="container">
                                            <div class="text-center text-uppercase documents">Documents requis</div>
                                            <p class="text-center mx-5 py-3" style="color: #636872;">YVous êtes éligible pour louer une voiture à travers les émirats à condition que vous ayez les éléments mentionnés ci-dessous
                                                documents valides avec vous :</p>

                                            <div class="row my-4">
                                                <div class="col-lg-1"></div>
                                                <div class="col-lg-12 col-xl-10">
                                                    <div class="row">
                                                        <div class="col-lg-6 mb-3 position-relative">
                                                            <div class="img_fix_positions">
                                                                <img src="' . url('/') . '/frontend/image/man_bg_img.png" class="img-fluid" alt="">
                                                            </div>
                                                            <div class="foreign_bg" style="height: 100%;">
                                                                <div class="foreign_visitors">
                                                                    Visiteurs étrangers
                                                                </div>
                                                                <div class="py-2">
                                                                    <div class="pb-2">
                                                                        <img src="' . url('/') . '/frontend/image/green_right.png" class="img-fluid" alt="">
                                                                        <span class="px-2 font_w_fix">Passeport original valide</span>
                                                                    </div>
                                                                    <div class="pb-2 font_w_fix">
                                                                        <img src="' . url('/') . '/frontend/image/green_right.png" class="img-fluid" alt="">
                                                                        <span class="px-2">Visa de visite valide</span>
                                                                    </div>
                                                                    <div class="pb-2">
                                                                        <img src="' . url('/') . '/frontend/image/green_right.png" class="img-fluid" alt="">
                                                                        <span class="px-2 font_w_fix">Permis de conduire valide délivré par le pays dorigine</span>
                                                                    </div>
                                                                    <div class="pb-2">
                                                                        <img src="' . url('/') . 'l/frontend/image/green_right.png" class="img-fluid" alt="">
                                                                        <span class="px-2 font_w_fix">Permis de conduire international (IDP)</span>
                                                                    </div>
                                                                    <div class="pb-2">
                                                                        <img src="' . url('/') . '/frontend/image/green_right.png" class="img-fluid" alt="">
                                                                        <span class="px-2 font_w_fix">Âge minimum 21 ans</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 mb-3 position-relative">
                                                            <div class="img_fix_positions">
                                                                <img src="' . url('/') . '/frontend/image/man_bg_img_2.png" class="img-fluid" alt="">
                                                            </div>
                                                            <div class="foreign_bg" style="height: 100%;">
                                                                <div class="foreign_visitors">
    Résidents et ressortissants des Émirats arabes unis
    </div>
                                                                <div class="py-2">
                                                                    <div class="pb-2">
                                                                        <img src="' . url('/') . '/frontend/image/green_right.png" class="img-fluid" alt="">
                                                                        <span class="px-2 font_w_fix">Permis de conduire des EAU</span>
                                                                    </div>
                                                                    <div class="pb-2">
                                                                        <img src="' . url('/') . '/frontend/image/green_right.png" class="img-fluid" alt="">
                                                                        <span class="px-2 font_w_fix">carte didentité Emirates</span>
                                                                    </div>
                                                                    <div class="pb-2">
                                                                        <img src="' . url('/') . '/frontend/image/green_right.png" class="img-fluid" alt="">
                                                                        <span class="px-2 font_w_fix">(Un visa de résidence ou un passeport peut être acceptable)</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-1"></div>
                                            </div>
                                            <p class="text-center mx-5 py-3" style="color: #636872;">Les visiteurs du CCG, des États-Unis, du Royaume-Uni, du Canada, dEurope et de certains autres pays peuvent conduire avec le permis de conduire de leur pays origine, sans avoir besoin dun IDP. .)</p>

                                            <div class="pt-4 pb-5">
                                                <a href="#" class="d-flex justify-content-center align-items-center finder text-decoration-none">Découvrez si le permis de conduire de votre pays est valable aux EAU<i class="fa-solid fa-arrow-right px-2"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>',
        ]);
        PageTranslation::create([
            'page_id' => '6',
            'locale' => 'ru',
            'page_name' => 'Необходимые документыЭ',
            'page_title' => 'Необходимые документы',
            'page_body' => '
                            <div class="modal-dialog modal-dialog-centered modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header border-0">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body pt-0">
                                        <div class="container">
                                            <div class="text-center text-uppercase documents">Необходимые документы</div>
                                            <p class="text-center mx-5 py-3" style="color: #636872;">Вы имеете право арендовать автомобиль в эмиратах при условии, что у вас есть указанные ниже условия.
                                                действительные при вас документы:</p>

                                            <div class="row my-4">
                                                <div class="col-lg-1"></div>
                                                <div class="col-lg-12 col-xl-10">
                                                    <div class="row">
                                                        <div class="col-lg-6 mb-3 position-relative">
                                                            <div class="img_fix_positions">
                                                                <img src="' . url('/') . '/frontend/image/man_bg_img.png" class="img-fluid" alt="">
                                                            </div>
                                                            <div class="foreign_bg" style="height: 100%;">
                                                                <div class="foreign_visitors">
                                                                    Иностранные гости
                                                                </div>
                                                                <div class="py-2">
                                                                    <div class="pb-2">
                                                                        <img src="' . url('/') . 'l/frontend/image/green_right.png" class="img-fluid" alt="">
                                                                        <span class="px-2 font_w_fix">Действительный оригинал паспорта</span>
                                                                    </div>
                                                                    <div class="pb-2 font_w_fix">
                                                                        <img src="' . url('/') . 'l/frontend/image/green_right.png" class="img-fluid" alt="">
                                                                        <span class="px-2">Действительная гостевая виза</span>
                                                                    </div>
                                                                    <div class="pb-2">
                                                                        <img src="' . url('/') . '/frontend/image/green_right.png" class="img-fluid" alt="">
                                                                        <span class="px-2 font_w_fix">Действительные водительские права, выданные в стране проживания</span>
                                                                    </div>
                                                                    <div class="pb-2">
                                                                        <img src="' . url('/') . '/frontend/image/green_right.png" class="img-fluid" alt="">
                                                                        <span class="px-2 font_w_fix">Международное водительское удостоверение (IDP)</span>
                                                                    </div>
                                                                    <div class="pb-2">
                                                                        <img src="' . url('/') . '/frontend/image/green_right.png" class="img-fluid" alt="">
                                                                        <span class="px-2 font_w_fix">Минимальный возраст 21 год</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 mb-3 position-relative">
                                                            <div class="img_fix_positions">
                                                                <img src="' . url('/') . '/frontend/image/man_bg_img_2.png" class="img-fluid" alt="">
                                                            </div>
                                                            <div class="foreign_bg" style="height: 100%;">
                                                                <div class="foreign_visitors">
                                                                    Резиденты и граждане ОАЭ
                                                                </div>
                                                                <div class="py-2">
                                                                    <div class="pb-2">
                                                                        <img src="' . url('/') . 'l/frontend/image/green_right.png" class="img-fluid" alt="">
                                                                        <span class="px-2 font_w_fix">Водительские права ОАЭ</span>
                                                                    </div>
                                                                    <div class="pb-2">
                                                                        <img src="' . url('/') . '/frontend/image/green_right.png" class="img-fluid" alt="">
                                                                        <span class="px-2 font_w_fix">Идентификатор Эмирейтс</span>
                                                                    </div>
                                                                    <div class="pb-2">
                                                                        <img src="' . url('/') . '/frontend/image/green_right.png" class="img-fluid" alt="">
                                                                        <span class="px-2 font_w_fix">(Виза на жительство или паспорт могут быть приемлемыми)</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-1"></div>
                                            </div>
                                            <p class="text-center mx-5 py-3" style="color: #636872;">Посетители из стран Персидского залива, США, Великобритании, Канады, Европы и некоторых других стран могут водить машину с водительскими правами своей страны без необходимости наличия МВУ. .)</p>

                                            <div class="pt-4 pb-5">
                                                <a href="#" class="d-flex justify-content-center align-items-center finder text-decoration-none">Узнайте, действительны ли водительские права вашей страны в ОАЭ<i class="fa-solid fa-arrow-right px-2"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                  ',
        ]);
    }
}
