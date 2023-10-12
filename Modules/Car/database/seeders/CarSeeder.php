<?php

namespace Modules\Car\database\seeders;

use Modules\Car\Models\Car;
use Modules\Car\Models\CarTranslation;
use Illuminate\Database\Seeder;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Car::create([
            'car_brand_id' => 12,
            'car_type_id' => 1,
            'slug' => 'rent_lamborghini_urus',
            'custom_url_slug' => 'rent_lamborghini_urus1',
            //'deal_type' => 'Daily',
            'car_model_year' => '2021',
            'deposit' => '5000',
            'daily_mileage_limit' => '260',
            'weekly_mileage_limit' => '260',
            'monthly_mileage_limit' => '260',
            'min_age' => '18',
            'daily_price' => '2300.0',
            'weekly_price' => '7449.0',
            'monthly_price' => '45000.0',
            'status' => 'active',
        ]);

        Car::create([
            'car_brand_id' => 1,
            'car_type_id' => 1,
            'slug' => 'rent_lamborghini_urus1',
            'custom_url_slug' => 'rent_lamborghini_urus2',
            //'deal_type' => 'Daily',
            'car_model_year' => '2021',
            'deposit' => '5000',
            'daily_mileage_limit' => '260',
            'weekly_mileage_limit' => '260',
            'monthly_mileage_limit' => '260',
            'min_age' => '18',
            'daily_price' => '2300.0',
            'weekly_price' => '7449.0',
            'monthly_price' => '45000.0',
            'status' => 'active',
        ]);

        Car::create([
            'car_brand_id' => 1,
            'car_type_id' => 1,
            'slug' => 'rent_lamborghini_urus2',
            'custom_url_slug' => 'rent_lamborghini_urus3',
            //'deal_type' => 'Daily',
            'car_model_year' => '2021',
            'deposit' => '5000',
            'daily_mileage_limit' => '260',
            'weekly_mileage_limit' => '260',
            'monthly_mileage_limit' => '260',
            'min_age' => '18',
            'daily_price' => '2300.0',
            'weekly_price' => '7449.0',
            'monthly_price' => '45000.0',
            'status' => 'active',
        ]);

        Car::create([
            'car_brand_id' => 2,
            'car_type_id' => 1,
            'slug' => 'rent_lamborghini_urus3',
            'custom_url_slug' => 'rent_lamborghini_urus4',
            ///'deal_type' => 'Daily',
            'car_model_year' => '2021',
            'deposit' => '5000',
            'daily_mileage_limit' => '260',
            'weekly_mileage_limit' => '260',
            'monthly_mileage_limit' => '260',
            'min_age' => '18',
            'daily_price' => '2300.0',
            'weekly_price' => '7449.0',
            'monthly_price' => '45000.0',
            'status' => 'active',
        ]);

        Car::create([
            'car_brand_id' => 2,
            'car_type_id' => 1,
            'slug' => 'rent_lamborghini_urus4',
            'custom_url_slug' => 'rent_lamborghini_urus5',
            //'deal_type' => 'Daily',
            'car_model_year' => '2021',
            'deposit' => '5000',
            'daily_mileage_limit' => '260',
            'weekly_mileage_limit' => '260',
            'monthly_mileage_limit' => '260',
            'min_age' => '18',
            'daily_price' => '2300.0',
            'weekly_price' => '7449.0',
            'monthly_price' => '45000.0',
            'status' => 'active',
        ]);

        Car::create([
            'car_brand_id' => 3,
            'car_type_id' => 1,
            'slug' => 'rent_lamborghini_urus5',
            'custom_url_slug' => 'rent_lamborghini_urus6',
           // 'deal_type' => 'Daily',
            'car_model_year' => '2021',
            'deposit' => '5000',
            'daily_mileage_limit' => '260',
            'weekly_mileage_limit' => '260',
            'monthly_mileage_limit' => '260',
            'min_age' => '18',
            'daily_price' => '2300.0',
            'weekly_price' => '7449.0',
            'monthly_price' => '45000.0',
            'status' => 'active',
        ]);

        Car::create([
            'car_brand_id' => 4,
            'car_type_id' => 1,
            'slug' => 'rent_lamborghini_urus6',
            'custom_url_slug' => 'rent_lamborghini_urus7',
           // 'deal_type' => 'Daily',
            'car_model_year' => '2021',
            'deposit' => '5000',
            'daily_mileage_limit' => '260',
            'weekly_mileage_limit' => '260',
            'monthly_mileage_limit' => '260',
            'min_age' => '18',
            'daily_price' => '2300.0',
            'weekly_price' => '7449.0',
            'monthly_price' => '45000.0',
            'status' => 'active',
        ]);

        Car::create([
            'car_brand_id' => 5,
            'car_type_id' => 1,
            'slug' => 'rent_lamborghini_urus7',
            'custom_url_slug' => 'rent_lamborghini_urus8',
           // 'deal_type' => 'Daily',
            'car_model_year' => '2021',
            'deposit' => '5000',
            'daily_mileage_limit' => '260',
            'weekly_mileage_limit' => '260',
            'monthly_mileage_limit' => '260',
            'min_age' => '18',
            'daily_price' => '2300.0',
            'weekly_price' => '7449.0',
            'monthly_price' => '45000.0',
            'status' => 'active',
        ]);

        Car::create([
            'car_brand_id' => 6,
            'car_type_id' => 1,
            'slug' => 'rent_lamborghini_urus8',
            'custom_url_slug' => 'rent_lamborghini_urus9',
            //'deal_type' => 'Daily',
            'car_model_year' => '2021',
            'deposit' => '5000',
            'daily_mileage_limit' => '260',
            'weekly_mileage_limit' => '260',
            'monthly_mileage_limit' => '260',
            'min_age' => '18',
            'daily_price' => '2300.0',
            'weekly_price' => '7449.0',
            'monthly_price' => '45000.0',
            'status' => 'active',
        ]);



        //CAR TRANSLATION SEEDER
        CarTranslation::create([
            'car_id' => 1,
            'locale' => 'en',
            'name' => 'Rent Lamborghini urus 2022 in Dubai',
            'custom_title' => 'Rent Lamborghini urus 2022 in Dubai',
            'description' => ' <div class="car_rent_txt">
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
                    <p>Our luхurу саr rental flееt includе a widе rаngе of tоp-оf-the-linе саrs to set your travel experience apart in Dubаi. Pаy by cаsh or a crеdit / debit саrd and bооk with the supplier directly. Frоm Rаngе Rоvеrs tо Rоlls Rоуcе, find thе mоst ехclusivе саrs at the lоwеst rаtеs offеrеd bу еstаblishеd cоmpаniеs in thе UАЕ. If you are confused which company to choose, you can always check out the companys Google Reviews.</p>
                </div>
                <div class="car_rent_txt">
                    <h2>Rent Exotic Cars in Dubai</h2>
                    <p>Many people from around the world have seen the videos of supercars with a medley of Dubai’s lifestyle. Every other Instablogger has uploaded a dune-bashing video conquering the desert sands. It’s no doubt that the UAE is a hotspot for rare and powerful motors. From crazy sand-buggies doing insane stunts up hills, to Ferraris, Rolls Royces and other hypercars cruising down the road. The UAE doesn’t hide its wide array of cars. This love for cars began many years ago, before there were roads in the UAE. Back then, people used to drive through the soft, unforgiving, sand to get from point A to B.</p>
                    <p>As motorcars developed, people used to tune their cars for more power to travel through the sand with ease. This developed into a sport, in which people would race their cars up dunes, and modify them to make them faster and more powerful. Thus began the love for cars, and the love for speed and power.
                        As the UAE developed into the futuristic urban country that it is today, people’s taste for cars developed, but their love for large SUVs remained. Today, you can see many supercars driving alongside Nissan Patrols and Toyota Land-Cruisers, both garnering similar levels of respect on the road.</p>
                </div>',
            'supplier_note' => '+ 5% VAT applicable. V8...6,2L',
            'delivery' => 'Dubai – Free',
            'insurance' => 'Full',
            'meta_title' => 'Rent Lamborghini urus 2022 in Dubai',
            'meta_description' => 'We have a big fleet of Range Rover Vogue HSE 2022 Cars available. Friends Car Rental is the best luxury car rental service near me in Dubai.',
            'meta_keyword' => 'Lamborghini Car Detail',
        ]);

        CarTranslation::create([
            'car_id' => 1,
            'locale' => 'ar',
            'name' => 'استئجار Lamborghini urus 2022 في دبي',
            'custom_title' => 'استئجار Lamborghini urus 2022 في دبي',
            'description' => ' <div class="car_rent_txt">
                    <h2 class="d-flex">تأجير السيارات الفخمة في دبي<span class="d-md-block d-none px-1"> — </span> الطريق السهلy</h2>
                    <p>قيادة سيارتك في دبي. يمكن العثور على عملاء مثل Rоlls Rоуcе و Bentley و еrсеdеs еnz و Range Rover و Porsche والمزيد. إذا كنت مهتمًا بشيء رياضي مثل Fеrаri و Lambоrghini وما شابه ، تحقق من قسم تأجير السيارات الرياضية.</p>
                </div>
                <div class="car_rent_txt">
                    <h2>استئجار السيارات الفاخرة في دبي</h2>
                    <p>هل تتطلع إلى استعادة الأماكن الرائعة في إمارة دبي؟ لا تقبل التسوية مع أول خدمة تأجير السيارات ، قارن العروض من عدد من العلامات التجارية لتأجير السيارات. قم بإعادة أي شيء يمكن أن يرضيك بأدنى مستويات السوق. استمتع بأجواء رائعة في الطرق المتفرقة من دبي. تأكد من الاتصال بالشركات مباشرة عبر الهاتف أو WhatsApp واطلب منهم عروضهم الترويجية المستمرة.
                    </p>
                </div>
                <div class="car_rent_txt">
                    <h2>مجموعة من خيارات السيارات الفاخرة</h2>
                    <p>تشتمل رحلاتنا الإيجارية الرائعة على مجموعة واسعة من الخيارات المميزة لتمييز تجربة السفر الخاصة بك في دبي. يتم الدفع عن طريق صندوق الائتمان أو بطاقة الائتمان / الخصم وتواصل مع المورد مباشرة. من Rаngе Rоvеrs to Rоlls Rоуcе ، اعثر على معظم الأشياء الحصرية في أقل العروض المعروضة من قبل المدربين السابقين في الإمارات العربية المتحدة. إذا كنت في حيرة من أمرك بشأن اختيار الشركة ، فيمكنك دائمًا التحقق من مراجعات Google الخاصة بالشركة.</p>
                </div>
                <div class="car_rent_txt">
                    <h2>استئجار سيارات غريبة في دبي</h2>
                    <p>شاهد العديد من الأشخاص من جميع أنحاء العالم مقاطع فيديو للسيارات الخارقة ذات مزيج متنوع من أسلوب الحياة في دبي. قام كل Instablogger آخر بتحميل مقطع فيديو حول الكثبان الرملية وهو يغزو رمال الصحراء. لا شك في أن الإمارات العربية المتحدة هي نقطة ساخنة للمحركات النادرة والقوية. من عربات الرمل المجنونة التي تقوم بحركات مجنونة فوق التلال ، إلى سيارات فيراري ورولز رويس وغيرها من السيارات الخارقة المبحرة على الطريق. لا تخفي الإمارات العربية المتحدة مجموعتها الواسعة من السيارات. بدأ هذا الحب للسيارات منذ سنوات عديدة ، قبل أن تكون هناك طرق في الإمارات. في ذلك الوقت ، اعتاد الناس القيادة عبر الرمال الناعمة التي لا ترحم للانتقال من النقطة أ إلى النقطة ب.</p>
                    <p>مع تطور السيارات النارية ، اعتاد الناس على ضبط سياراتهم للحصول على مزيد من القوة للتنقل عبر الرمال بسهولة. تطورت هذه إلى رياضة ، حيث يسابق الناس سياراتهم على الكثبان الرملية ، ويعدلونها لجعلها أسرع وأكثر قوة. هكذا بدأ حب السيارات ، وحب السرعة والقوة.
                        مع تطور دولة الإمارات العربية المتحدة لتصبح دولة حضرية مستقبلية كما هي عليه اليوم ، تطور ذوق الناس للسيارات ، ولكن ظل شغفهم بالسيارات الرياضية متعددة الاستخدامات الكبيرة. اليوم ، يمكنك رؤية العديد من السيارات الخارقة تسير جنبًا إلى جنب مع نيسان باترول وتويوتا لاند كروزر ، وكلاهما يحظى بمستويات مماثلة من الاحترام على الطريق.</p>
                </div>',
            'supplier_note' => '+ 5٪ ضريبة القيمة المضافة. V8 ... 6،2 لتر',
            'delivery' => 'دبي - مجاني',
            'insurance' => 'ممتلىء',
            'meta_title' => 'Rent Lamborghini urus 2022 in Dubai',
            'meta_description' => 'لدينا أسطول كبير من سيارات رينج روفر فوج HSE 2022 المتاحة. Friends Car Rental هي أفضل خدمة تأجير سيارات فاخرة بالقرب مني في دبي.',
            'meta_keyword' => 'تفاصيل سيارة لامبورغيني',
        ]);

        CarTranslation::create([
            'car_id' => 1,
            'locale' => 'fr',
            'name' => 'Louer Lamborghini urus 2022 à Dubaï',
            'custom_title' => 'Louer Lamborghini urus 2022 à Dubaï',
            'description' => ' <div class="car_rent_txt">
                    <h2 class="d-flex">Location de voitures de luxe à Dubaï<span class="d-md-block d-none px-1"> — </span> la manière facile</h2>
                    <p>Conduisez la voiture de vos rêves à Dubaï. Choisissez des voitures de marques haut de gamme comme Rolls Rоуcе, Bentley, Меrсеdеs Веnz, Range Rover, Porsche et plus encore. Si vous êtes intéressé par quelque chose de sportif comme une Ferrari, une Lamborghini et autres, consultez notre section Location de voitures de sport.</p>
                </div>
                <div class="car_rent_txt">
                    <h2>Location de voitures de luxe à Dubaï</h2>
                    <p>Vous cherchez à louer des voitures de luxe dans lémirat de Dubaï ? Ne vous contentez pas du premier magasin de location de voitures haut de gamme, comparez les offres de plusieurs marques de location de voitures. Louez nimporte quelle voiture électrique de votre choix au prix le plus bas du marché. Goûtez au luxe sur les routes très conviviales de Dubaï. Assurez-vous de contacter les entreprises directement par téléphone ou WhatsApp et demandez-leur leurs promotions en cours.
                    </p>
                </div>
                <div class="car_rent_txt">
                    <h2>Gamme doptions de voitures de luxe</h2>
                    <p>Notre flotte de location de voitures de luxe comprend une large gamme de voitures haut de gamme pour différencier votre expérience de voyage à Dubaï. Payez en espèces ou par carte de crédit / débit et réservez directement auprès du fournisseur. De la gamme Rovers à la Rolls Rоуcе, trouvez les voitures les plus exclusives aux tarifs les plus bas proposés par les sociétés établies dans lUАЕ. Si vous ne savez pas quelle entreprise choisir, vous pouvez toujours consulter les avis Google de lentreprise.</p>
                </div>
                <div class="car_rent_txt">
                    <h2>Louer des voitures exotiques à Dubaï</h2>
                    <p>De nombreuses personnes du monde entier ont vu les vidéos de supercars avec un mélange du style de vie de Dubaï. Tous les autres Instablogger ont mis en ligne une vidéo sur les dunes à la conquête des sables du désert. Il ne fait aucun doute que les Émirats arabes unis sont un point chaud pour les moteurs rares et puissants. Des poussettes de sable folles faisant des cascades folles sur les collines, aux Ferrari, Rolls Royce et autres hypercars qui roulent sur la route. Les EAU ne cachent pas leur large éventail de voitures. Cet amour pour les voitures a commencé il y a de nombreuses années, avant quil ny ait des routes aux EAU. À lépoque, les gens avaient lhabitude de traverser le sable mou et impitoyable pour se rendre du point A au point B.</p>
                    <p>Au fur et à mesure que les voitures se développaient, les gens réglaient leurs voitures pour plus de puissance afin de se déplacer facilement dans le sable. Cela sest transformé en un sport, dans lequel les gens faisaient courir leurs voitures sur des dunes et les modifiaient pour les rendre plus rapides et plus puissantes. Ainsi a commencé lamour pour les voitures, et lamour pour la vitesse et la puissance.
    Au fur et à mesure que les Émirats arabes unis devenaient le pays urbain futuriste qils sont aujourdhui, le goût des gens pour les voitures sest développé, mais leur amour pour les gros SUV est resté. Aujourdhui, vous pouvez voir de nombreuses supercars rouler aux côtés de Nissan Patrols et de Toyota Land-Cruisers, toutes deux recueillant des niveaux de respect similaires sur la route.</p>
                </div>',
            'supplier_note' => '+ 5% TVA applicable. V8...6,2L',
            'delivery' => 'Dubaï – Gratuit',
            'insurance' => 'Complète',
            'meta_title' => 'Louer Lamborghini urus 2022 à Dubaï',
            'meta_description' => 'Nous avons une grande flotte de voitures Range Rover Vogue HSE 2022 disponibles. Friends Car Rental est le meilleur service de location de voitures de luxe près de chez moi à Dubaï.',
            'meta_keyword' => 'Détail de la voiture Lamborghini',
        ]);

        CarTranslation::create([
            'car_id' => 1,
            'locale' => 'ru',
            'name' => 'Аренда Lamborghini urus 2022 в Дубае',
            'custom_title' => 'Аренда Lamborghini urus 2022 в Дуба',
            'description' => ' <div class="car_rent_txt">
                    <h2 class="d-flex">Прокат автомобилей класса люкс в Дубае<span class="d-md-block d-none px-1"> — </span> легкий путь</h2>
                    <p>Управляйте автомобилем своей мечты в Дубае. Выбирайте автомобили премиальных брендов, таких как Rolls Rouce, Bentley, Мерседес Венц, Range Rover, Porsche и других. Если вас интересует что-то спортивное, например, Ferrari, Lamborghini и тому подобное, загляните в наш раздел «Аренда спортивных автомобилей».</p>
                </div>
                <div class="car_rent_txt">
                    <h2>Аренда роскошных автомобилей в Дубае</h2>
                    <p>Хотите арендовать роскошные автомобили в эмирате Дубай? Не соглашайтесь на первый премиальный магазин по аренде автомобилей, сравните предложения от нескольких брендов по аренде автомобилей. Возьмите напрокат любой понравившийся автомобиль по самым низким рыночным ценам. Вкусите роскошь на бездорожье Дубая. Обязательно свяжитесь с компаниями напрямую по телефону или WhatsApp и спросите их об их текущих рекламных акциях.
                    </p>
                </div>
                <div class="car_rent_txt">
                    <h2>Ассортимент роскошных автомобилей</h2>
                    <p>Наш парк роскошных автомобилей напрокат включает в себя широкий выбор первоклассных автомобилей, которые сделают ваше путешествие по Дубаю особенным. Оплатите наличными или кредитной / дебетовой картой и закажите напрямую у поставщика. От Range Rover до Rolls Rouce, найдите самые эксклюзивные автомобили по самым низким ценам, предлагаемым известными компаниями в ОАЭ. Если вы не знаете, какую компанию выбрать, вы всегда можете проверить Google Reviews компании.</p>
                </div>
                <div class="car_rent_txt">
                    <h2>Аренда экзотических автомобилей в Дубае</h2>
                    <p>Многие люди со всего мира видели видеоролики о суперкарах со смесью стиля жизни Дубая. Каждый второй Instablogger загрузил видео о покорении дюн, покоряющем пески пустыни. Нет сомнений в том, что ОАЭ — это горячая точка для редких и мощных моторов. От сумасшедших багги, выполняющих безумные трюки в горах, до Феррари, Роллс-Ройса и других гиперкаров, курсирующих по дороге. ОАЭ не скрывают своего большого количества автомобилей. Эта любовь к автомобилям началась много лет назад, еще до того, как в ОАЭ появились дороги. В то время люди ездили по мягкому, неумолимому песку, чтобы добраться из точки А в точку Б.</p>
                    <p>По мере развития автомобилей люди настраивали свои автомобили на большую мощность, чтобы с легкостью путешествовать по песку. Это превратилось в спорт, в котором люди гоняли на своих машинах по дюнам и модифицировали их, чтобы сделать их быстрее и мощнее. Так началась любовь к автомобилям, а также любовь к скорости и мощности.
                        По мере того, как ОАЭ превращались в футуристическую городскую страну, которой мы являемся сегодня, любовь людей к автомобилям развивалась, но их любовь к большим внедорожникам оставалась. Сегодня вы можете увидеть множество суперкаров, ездящих рядом с Nissan Patrol и Toyota Land-Cruisers, которые пользуются одинаковым уважением на дорогах.</p>
                </div>',
            'supplier_note' => '+ 5% НДС. V8...6,2л',
            'delivery' => 'Дубай – бесплатно',
            'insurance' => 'Полный',
            'meta_title' => 'Аренда Lamborghini urus 2022 в Дубае',
            'meta_description' => 'У нас есть большой парк автомобилей Range Rover Vogue HSE 2022. Friends Car Rental — лучший сервис по аренде роскошных автомобилей рядом со мной в Дубае.',
            'meta_keyword' => 'Автомобиль Ламборгини Деталь',
        ]);

        CarTranslation::create([
            'car_id' => 2,
            'locale' => 'en',
            'name' => 'Rent Lamborghini urus 2022 in Dubai',
            'custom_title' => 'Rent Lamborghini urus 2022 in Dubai',
            'description' => ' <div class="car_rent_txt">
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
                    <p>Our luхurу саr rental flееt includе a widе rаngе of tоp-оf-the-linе саrs to set your travel experience apart in Dubаi. Pаy by cаsh or a crеdit / debit саrd and bооk with the supplier directly. Frоm Rаngе Rоvеrs tо Rоlls Rоуcе, find thе mоst ехclusivе саrs at the lоwеst rаtеs offеrеd bу еstаblishеd cоmpаniеs in thе UАЕ. If you are confused which company to choose, you can always check out the companys Google Reviews.</p>
                </div>
                <div class="car_rent_txt">
                    <h2>Rent Exotic Cars in Dubai</h2>
                    <p>Many people from around the world have seen the videos of supercars with a medley of Dubai’s lifestyle. Every other Instablogger has uploaded a dune-bashing video conquering the desert sands. It’s no doubt that the UAE is a hotspot for rare and powerful motors. From crazy sand-buggies doing insane stunts up hills, to Ferraris, Rolls Royces and other hypercars cruising down the road. The UAE doesn’t hide its wide array of cars. This love for cars began many years ago, before there were roads in the UAE. Back then, people used to drive through the soft, unforgiving, sand to get from point A to B.</p>
                    <p>As motorcars developed, people used to tune their cars for more power to travel through the sand with ease. This developed into a sport, in which people would race their cars up dunes, and modify them to make them faster and more powerful. Thus began the love for cars, and the love for speed and power.
                        As the UAE developed into the futuristic urban country that it is today, people’s taste for cars developed, but their love for large SUVs remained. Today, you can see many supercars driving alongside Nissan Patrols and Toyota Land-Cruisers, both garnering similar levels of respect on the road.</p>
                </div>',
            'supplier_note' => '+ 5% VAT applicable. V8...6,2L',
            'delivery' => 'Dubai – Free',
            'insurance' => 'Full',
        ]);

        CarTranslation::create([
            'car_id' => 2,
            'locale' => 'ar',
            'name' => 'استئجار Lamborghini urus 2022 في دبي',
            'custom_title' => 'استئجار Lamborghini urus 2022 في دبي',
            'description' => ' <div class="car_rent_txt">
                    <h2 class="d-flex">تأجير السيارات الفخمة في دبي<span class="d-md-block d-none px-1"> — </span> الطريق السهلy</h2>
                    <p>قيادة سيارتك في دبي. يمكن العثور على عملاء مثل Rоlls Rоуcе و Bentley و еrсеdеs еnz و Range Rover و Porsche والمزيد. إذا كنت مهتمًا بشيء رياضي مثل Fеrаri و Lambоrghini وما شابه ، تحقق من قسم تأجير السيارات الرياضية.</p>
                </div>
                <div class="car_rent_txt">
                    <h2>استئجار السيارات الفاخرة في دبي</h2>
                    <p>هل تتطلع إلى استعادة الأماكن الرائعة في إمارة دبي؟ لا تقبل التسوية مع أول خدمة تأجير السيارات ، قارن العروض من عدد من العلامات التجارية لتأجير السيارات. قم بإعادة أي شيء يمكن أن يرضيك بأدنى مستويات السوق. استمتع بأجواء رائعة في الطرق المتفرقة من دبي. تأكد من الاتصال بالشركات مباشرة عبر الهاتف أو WhatsApp واطلب منهم عروضهم الترويجية المستمرة.
                    </p>
                </div>
                <div class="car_rent_txt">
                    <h2>مجموعة من خيارات السيارات الفاخرة</h2>
                    <p>تشتمل رحلاتنا الإيجارية الرائعة على مجموعة واسعة من الخيارات المميزة لتمييز تجربة السفر الخاصة بك في دبي. يتم الدفع عن طريق صندوق الائتمان أو بطاقة الائتمان / الخصم وتواصل مع المورد مباشرة. من Rаngе Rоvеrs to Rоlls Rоуcе ، اعثر على معظم الأشياء الحصرية في أقل العروض المعروضة من قبل المدربين السابقين في الإمارات العربية المتحدة. إذا كنت في حيرة من أمرك بشأن اختيار الشركة ، فيمكنك دائمًا التحقق من مراجعات Google الخاصة بالشركة.</p>
                </div>
                <div class="car_rent_txt">
                    <h2>استئجار سيارات غريبة في دبي</h2>
                    <p>شاهد العديد من الأشخاص من جميع أنحاء العالم مقاطع فيديو للسيارات الخارقة ذات مزيج متنوع من أسلوب الحياة في دبي. قام كل Instablogger آخر بتحميل مقطع فيديو حول الكثبان الرملية وهو يغزو رمال الصحراء. لا شك في أن الإمارات العربية المتحدة هي نقطة ساخنة للمحركات النادرة والقوية. من عربات الرمل المجنونة التي تقوم بحركات مجنونة فوق التلال ، إلى سيارات فيراري ورولز رويس وغيرها من السيارات الخارقة المبحرة على الطريق. لا تخفي الإمارات العربية المتحدة مجموعتها الواسعة من السيارات. بدأ هذا الحب للسيارات منذ سنوات عديدة ، قبل أن تكون هناك طرق في الإمارات. في ذلك الوقت ، اعتاد الناس القيادة عبر الرمال الناعمة التي لا ترحم للانتقال من النقطة أ إلى النقطة ب.</p>
                    <p>مع تطور السيارات النارية ، اعتاد الناس على ضبط سياراتهم للحصول على مزيد من القوة للتنقل عبر الرمال بسهولة. تطورت هذه إلى رياضة ، حيث يسابق الناس سياراتهم على الكثبان الرملية ، ويعدلونها لجعلها أسرع وأكثر قوة. هكذا بدأ حب السيارات ، وحب السرعة والقوة.
                        مع تطور دولة الإمارات العربية المتحدة لتصبح دولة حضرية مستقبلية كما هي عليه اليوم ، تطور ذوق الناس للسيارات ، ولكن ظل شغفهم بالسيارات الرياضية متعددة الاستخدامات الكبيرة. اليوم ، يمكنك رؤية العديد من السيارات الخارقة تسير جنبًا إلى جنب مع نيسان باترول وتويوتا لاند كروزر ، وكلاهما يحظى بمستويات مماثلة من الاحترام على الطريق.</p>
                </div>',
            'supplier_note' => '+ 5٪ ضريبة القيمة المضافة. V8 ... 6،2 لتر',
            'delivery' => 'دبي - مجاني',
            'insurance' => 'ممتلىء',
        ]);

        CarTranslation::create([
            'car_id' => 2,
            'locale' => 'fr',
            'name' => 'Louer Lamborghini urus 2022 à Dubaï',
            'custom_title' => 'Louer Lamborghini urus 2022 à Duba',
            'description' => ' <div class="car_rent_txt">
                    <h2 class="d-flex">Location de voitures de luxe à Dubaï<span class="d-md-block d-none px-1"> — </span> la manière facile</h2>
                    <p>Conduisez la voiture de vos rêves à Dubaï. Choisissez des voitures de marques haut de gamme comme Rolls Rоуcе, Bentley, Меrсеdеs Веnz, Range Rover, Porsche et plus encore. Si vous êtes intéressé par quelque chose de sportif comme une Ferrari, une Lamborghini et autres, consultez notre section Location de voitures de sport.</p>
                </div>
                <div class="car_rent_txt">
                    <h2>Location de voitures de luxe à Dubaï</h2>
                    <p>Vous cherchez à louer des voitures de luxe dans lémirat de Dubaï ? Ne vous contentez pas du premier magasin de location de voitures haut de gamme, comparez les offres de plusieurs marques de location de voitures. Louez nimporte quelle voiture électrique de votre choix au prix le plus bas du marché. Goûtez au luxe sur les routes très conviviales de Dubaï. Assurez-vous de contacter les entreprises directement par téléphone ou WhatsApp et demandez-leur leurs promotions en cours.
                    </p>
                </div>
                <div class="car_rent_txt">
                    <h2>Gamme doptions de voitures de luxe</h2>
                    <p>Notre flotte de location de voitures de luxe comprend une large gamme de voitures haut de gamme pour différencier votre expérience de voyage à Dubaï. Payez en espèces ou par carte de crédit / débit et réservez directement auprès du fournisseur. De la gamme Rovers à la Rolls Rоуcе, trouvez les voitures les plus exclusives aux tarifs les plus bas proposés par les sociétés établies dans lUАЕ. Si vous ne savez pas quelle entreprise choisir, vous pouvez toujours consulter les avis Google de lentreprise.</p>
                </div>
                <div class="car_rent_txt">
                    <h2>Louer des voitures exotiques à Dubaï</h2>
                    <p>De nombreuses personnes du monde entier ont vu les vidéos de supercars avec un mélange du style de vie de Dubaï. Tous les autres Instablogger ont mis en ligne une vidéo sur les dunes à la conquête des sables du désert. Il ne fait aucun doute que les Émirats arabes unis sont un point chaud pour les moteurs rares et puissants. Des poussettes de sable folles faisant des cascades folles sur les collines, aux Ferrari, Rolls Royce et autres hypercars qui roulent sur la route. Les EAU ne cachent pas leur large éventail de voitures. Cet amour pour les voitures a commencé il y a de nombreuses années, avant quil ny ait des routes aux EAU. À lépoque, les gens avaient lhabitude de traverser le sable mou et impitoyable pour se rendre du point A au point B.</p>
                    <p>Au fur et à mesure que les voitures se développaient, les gens réglaient leurs voitures pour plus de puissance afin de se déplacer facilement dans le sable. Cela sest transformé en un sport, dans lequel les gens faisaient courir leurs voitures sur des dunes et les modifiaient pour les rendre plus rapides et plus puissantes. Ainsi a commencé lamour pour les voitures, et lamour pour la vitesse et la puissance.
    Au fur et à mesure que les Émirats arabes unis devenaient le pays urbain futuriste qils sont aujourdhui, le goût des gens pour les voitures sest développé, mais leur amour pour les gros SUV est resté. Aujourdhui, vous pouvez voir de nombreuses supercars rouler aux côtés de Nissan Patrols et de Toyota Land-Cruisers, toutes deux recueillant des niveaux de respect similaires sur la route.</p>
                </div>',
            'supplier_note' => '+ 5% TVA applicable. V8...6,2L',
            'delivery' => 'Dubaï – Gratuit',
            'insurance' => 'Complète',
        ]);

        CarTranslation::create([
            'car_id' => 2,
            'locale' => 'ru',
            'name' => 'Аренда Lamborghini urus 2022 в Дубае',
            'custom_title' => 'Аренда Lamborghini urus 2022 в Дуба',
            'description' => ' <div class="car_rent_txt">
                    <h2 class="d-flex">Прокат автомобилей класса люкс в Дубае<span class="d-md-block d-none px-1"> — </span> легкий путь</h2>
                    <p>Управляйте автомобилем своей мечты в Дубае. Выбирайте автомобили премиальных брендов, таких как Rolls Rouce, Bentley, Мерседес Венц, Range Rover, Porsche и других. Если вас интересует что-то спортивное, например, Ferrari, Lamborghini и тому подобное, загляните в наш раздел «Аренда спортивных автомобилей».</p>
                </div>
                <div class="car_rent_txt">
                    <h2>Аренда роскошных автомобилей в Дубае</h2>
                    <p>Хотите арендовать роскошные автомобили в эмирате Дубай? Не соглашайтесь на первый премиальный магазин по аренде автомобилей, сравните предложения от нескольких брендов по аренде автомобилей. Возьмите напрокат любой понравившийся автомобиль по самым низким рыночным ценам. Вкусите роскошь на бездорожье Дубая. Обязательно свяжитесь с компаниями напрямую по телефону или WhatsApp и спросите их об их текущих рекламных акциях.
                    </p>
                </div>
                <div class="car_rent_txt">
                    <h2>Ассортимент роскошных автомобилей</h2>
                    <p>Наш парк роскошных автомобилей напрокат включает в себя широкий выбор первоклассных автомобилей, которые сделают ваше путешествие по Дубаю особенным. Оплатите наличными или кредитной / дебетовой картой и закажите напрямую у поставщика. От Range Rover до Rolls Rouce, найдите самые эксклюзивные автомобили по самым низким ценам, предлагаемым известными компаниями в ОАЭ. Если вы не знаете, какую компанию выбрать, вы всегда можете проверить Google Reviews компании.</p>
                </div>
                <div class="car_rent_txt">
                    <h2>Аренда экзотических автомобилей в Дубае</h2>
                    <p>Многие люди со всего мира видели видеоролики о суперкарах со смесью стиля жизни Дубая. Каждый второй Instablogger загрузил видео о покорении дюн, покоряющем пески пустыни. Нет сомнений в том, что ОАЭ — это горячая точка для редких и мощных моторов. От сумасшедших багги, выполняющих безумные трюки в горах, до Феррари, Роллс-Ройса и других гиперкаров, курсирующих по дороге. ОАЭ не скрывают своего большого количества автомобилей. Эта любовь к автомобилям началась много лет назад, еще до того, как в ОАЭ появились дороги. В то время люди ездили по мягкому, неумолимому песку, чтобы добраться из точки А в точку Б.</p>
                    <p>По мере развития автомобилей люди настраивали свои автомобили на большую мощность, чтобы с легкостью путешествовать по песку. Это превратилось в спорт, в котором люди гоняли на своих машинах по дюнам и модифицировали их, чтобы сделать их быстрее и мощнее. Так началась любовь к автомобилям, а также любовь к скорости и мощности.
                        По мере того, как ОАЭ превращались в футуристическую городскую страну, которой мы являемся сегодня, любовь людей к автомобилям развивалась, но их любовь к большим внедорожникам оставалась. Сегодня вы можете увидеть множество суперкаров, ездящих рядом с Nissan Patrol и Toyota Land-Cruisers, которые пользуются одинаковым уважением на дорогах.</p>
                </div>',
            'supplier_note' => '+ 5% НДС. V8...6,2л',
            'delivery' => 'Дубай – бесплатно',
            'insurance' => 'Полный',
        ]);

        CarTranslation::create([
            'car_id' => 3,
            'locale' => 'en',
            'name' => 'Rent Lamborghini urus 2022 in Dubai',
            'custom_title' => 'Rent Lamborghini urus 2022 in Dubai',
            'description' => ' <div class="car_rent_txt">
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
                    <p>Our luхurу саr rental flееt includе a widе rаngе of tоp-оf-the-linе саrs to set your travel experience apart in Dubаi. Pаy by cаsh or a crеdit / debit саrd and bооk with the supplier directly. Frоm Rаngе Rоvеrs tо Rоlls Rоуcе, find thе mоst ехclusivе саrs at the lоwеst rаtеs offеrеd bу еstаblishеd cоmpаniеs in thе UАЕ. If you are confused which company to choose, you can always check out the companys Google Reviews.</p>
                </div>
                <div class="car_rent_txt">
                    <h2>Rent Exotic Cars in Dubai</h2>
                    <p>Many people from around the world have seen the videos of supercars with a medley of Dubai’s lifestyle. Every other Instablogger has uploaded a dune-bashing video conquering the desert sands. It’s no doubt that the UAE is a hotspot for rare and powerful motors. From crazy sand-buggies doing insane stunts up hills, to Ferraris, Rolls Royces and other hypercars cruising down the road. The UAE doesn’t hide its wide array of cars. This love for cars began many years ago, before there were roads in the UAE. Back then, people used to drive through the soft, unforgiving, sand to get from point A to B.</p>
                    <p>As motorcars developed, people used to tune their cars for more power to travel through the sand with ease. This developed into a sport, in which people would race their cars up dunes, and modify them to make them faster and more powerful. Thus began the love for cars, and the love for speed and power.
                        As the UAE developed into the futuristic urban country that it is today, people’s taste for cars developed, but their love for large SUVs remained. Today, you can see many supercars driving alongside Nissan Patrols and Toyota Land-Cruisers, both garnering similar levels of respect on the road.</p>
                </div>',
            'supplier_note' => '+ 5% VAT applicable. V8...6,2L',
            'delivery' => 'Dubai – Free',
            'insurance' => 'Full',
        ]);

        CarTranslation::create([
            'car_id' => 3,
            'locale' => 'ar',
            'name' => 'استئجار Lamborghini urus 2022 في دبي',
            'custom_title' => 'استئجار Lamborghini urus 2022 في دبي',
            'description' => ' <div class="car_rent_txt">
                    <h2 class="d-flex">تأجير السيارات الفخمة في دبي<span class="d-md-block d-none px-1"> — </span> الطريق السهلy</h2>
                    <p>قيادة سيارتك في دبي. يمكن العثور على عملاء مثل Rоlls Rоуcе و Bentley و еrсеdеs еnz و Range Rover و Porsche والمزيد. إذا كنت مهتمًا بشيء رياضي مثل Fеrаri و Lambоrghini وما شابه ، تحقق من قسم تأجير السيارات الرياضية.</p>
                </div>
                <div class="car_rent_txt">
                    <h2>استئجار السيارات الفاخرة في دبي</h2>
                    <p>هل تتطلع إلى استعادة الأماكن الرائعة في إمارة دبي؟ لا تقبل التسوية مع أول خدمة تأجير السيارات ، قارن العروض من عدد من العلامات التجارية لتأجير السيارات. قم بإعادة أي شيء يمكن أن يرضيك بأدنى مستويات السوق. استمتع بأجواء رائعة في الطرق المتفرقة من دبي. تأكد من الاتصال بالشركات مباشرة عبر الهاتف أو WhatsApp واطلب منهم عروضهم الترويجية المستمرة.
                    </p>
                </div>
                <div class="car_rent_txt">
                    <h2>مجموعة من خيارات السيارات الفاخرة</h2>
                    <p>تشتمل رحلاتنا الإيجارية الرائعة على مجموعة واسعة من الخيارات المميزة لتمييز تجربة السفر الخاصة بك في دبي. يتم الدفع عن طريق صندوق الائتمان أو بطاقة الائتمان / الخصم وتواصل مع المورد مباشرة. من Rаngе Rоvеrs to Rоlls Rоуcе ، اعثر على معظم الأشياء الحصرية في أقل العروض المعروضة من قبل المدربين السابقين في الإمارات العربية المتحدة. إذا كنت في حيرة من أمرك بشأن اختيار الشركة ، فيمكنك دائمًا التحقق من مراجعات Google الخاصة بالشركة.</p>
                </div>
                <div class="car_rent_txt">
                    <h2>استئجار سيارات غريبة في دبي</h2>
                    <p>شاهد العديد من الأشخاص من جميع أنحاء العالم مقاطع فيديو للسيارات الخارقة ذات مزيج متنوع من أسلوب الحياة في دبي. قام كل Instablogger آخر بتحميل مقطع فيديو حول الكثبان الرملية وهو يغزو رمال الصحراء. لا شك في أن الإمارات العربية المتحدة هي نقطة ساخنة للمحركات النادرة والقوية. من عربات الرمل المجنونة التي تقوم بحركات مجنونة فوق التلال ، إلى سيارات فيراري ورولز رويس وغيرها من السيارات الخارقة المبحرة على الطريق. لا تخفي الإمارات العربية المتحدة مجموعتها الواسعة من السيارات. بدأ هذا الحب للسيارات منذ سنوات عديدة ، قبل أن تكون هناك طرق في الإمارات. في ذلك الوقت ، اعتاد الناس القيادة عبر الرمال الناعمة التي لا ترحم للانتقال من النقطة أ إلى النقطة ب.</p>
                    <p>مع تطور السيارات النارية ، اعتاد الناس على ضبط سياراتهم للحصول على مزيد من القوة للتنقل عبر الرمال بسهولة. تطورت هذه إلى رياضة ، حيث يسابق الناس سياراتهم على الكثبان الرملية ، ويعدلونها لجعلها أسرع وأكثر قوة. هكذا بدأ حب السيارات ، وحب السرعة والقوة.
                        مع تطور دولة الإمارات العربية المتحدة لتصبح دولة حضرية مستقبلية كما هي عليه اليوم ، تطور ذوق الناس للسيارات ، ولكن ظل شغفهم بالسيارات الرياضية متعددة الاستخدامات الكبيرة. اليوم ، يمكنك رؤية العديد من السيارات الخارقة تسير جنبًا إلى جنب مع نيسان باترول وتويوتا لاند كروزر ، وكلاهما يحظى بمستويات مماثلة من الاحترام على الطريق.</p>
                </div>',
            'supplier_note' => '+ 5٪ ضريبة القيمة المضافة. V8 ... 6،2 لتر',
            'delivery' => 'دبي - مجاني',
            'insurance' => 'ممتلىء',
        ]);

        CarTranslation::create([
            'car_id' => 3,
            'locale' => 'fr',
            'name' => 'Louer Lamborghini urus 2022 à Dubaï',
            'custom_title' => 'Louer Lamborghini urus 2022 à Dubaï',
            'description' => ' <div class="car_rent_txt">
                    <h2 class="d-flex">Location de voitures de luxe à Dubaï<span class="d-md-block d-none px-1"> — </span> la manière facile</h2>
                    <p>Conduisez la voiture de vos rêves à Dubaï. Choisissez des voitures de marques haut de gamme comme Rolls Rоуcе, Bentley, Меrсеdеs Веnz, Range Rover, Porsche et plus encore. Si vous êtes intéressé par quelque chose de sportif comme une Ferrari, une Lamborghini et autres, consultez notre section Location de voitures de sport.</p>
                </div>
                <div class="car_rent_txt">
                    <h2>Location de voitures de luxe à Dubaï</h2>
                    <p>Vous cherchez à louer des voitures de luxe dans lémirat de Dubaï ? Ne vous contentez pas du premier magasin de location de voitures haut de gamme, comparez les offres de plusieurs marques de location de voitures. Louez nimporte quelle voiture électrique de votre choix au prix le plus bas du marché. Goûtez au luxe sur les routes très conviviales de Dubaï. Assurez-vous de contacter les entreprises directement par téléphone ou WhatsApp et demandez-leur leurs promotions en cours.
                    </p>
                </div>
                <div class="car_rent_txt">
                    <h2>Gamme doptions de voitures de luxe</h2>
                    <p>Notre flotte de location de voitures de luxe comprend une large gamme de voitures haut de gamme pour différencier votre expérience de voyage à Dubaï. Payez en espèces ou par carte de crédit / débit et réservez directement auprès du fournisseur. De la gamme Rovers à la Rolls Rоуcе, trouvez les voitures les plus exclusives aux tarifs les plus bas proposés par les sociétés établies dans lUАЕ. Si vous ne savez pas quelle entreprise choisir, vous pouvez toujours consulter les avis Google de lentreprise.</p>
                </div>
                <div class="car_rent_txt">
                    <h2>Louer des voitures exotiques à Dubaï</h2>
                    <p>De nombreuses personnes du monde entier ont vu les vidéos de supercars avec un mélange du style de vie de Dubaï. Tous les autres Instablogger ont mis en ligne une vidéo sur les dunes à la conquête des sables du désert. Il ne fait aucun doute que les Émirats arabes unis sont un point chaud pour les moteurs rares et puissants. Des poussettes de sable folles faisant des cascades folles sur les collines, aux Ferrari, Rolls Royce et autres hypercars qui roulent sur la route. Les EAU ne cachent pas leur large éventail de voitures. Cet amour pour les voitures a commencé il y a de nombreuses années, avant quil ny ait des routes aux EAU. À lépoque, les gens avaient lhabitude de traverser le sable mou et impitoyable pour se rendre du point A au point B.</p>
                    <p>Au fur et à mesure que les voitures se développaient, les gens réglaient leurs voitures pour plus de puissance afin de se déplacer facilement dans le sable. Cela sest transformé en un sport, dans lequel les gens faisaient courir leurs voitures sur des dunes et les modifiaient pour les rendre plus rapides et plus puissantes. Ainsi a commencé lamour pour les voitures, et lamour pour la vitesse et la puissance.
    Au fur et à mesure que les Émirats arabes unis devenaient le pays urbain futuriste qils sont aujourdhui, le goût des gens pour les voitures sest développé, mais leur amour pour les gros SUV est resté. Aujourdhui, vous pouvez voir de nombreuses supercars rouler aux côtés de Nissan Patrols et de Toyota Land-Cruisers, toutes deux recueillant des niveaux de respect similaires sur la route.</p>
                </div>',
            'supplier_note' => '+ 5% TVA applicable. V8...6,2L',
            'delivery' => 'Dubaï – Gratuit',
            'insurance' => 'Complète',
        ]);

        CarTranslation::create([
            'car_id' => 3,
            'locale' => 'ru',
            'name' => 'Аренда Lamborghini urus 2022 в Дубае',
            'custom_title' => 'Аренда Lamborghini urus 2022 в Дуба',
            'description' => ' <div class="car_rent_txt">
                    <h2 class="d-flex">Прокат автомобилей класса люкс в Дубае<span class="d-md-block d-none px-1"> — </span> легкий путь</h2>
                    <p>Управляйте автомобилем своей мечты в Дубае. Выбирайте автомобили премиальных брендов, таких как Rolls Rouce, Bentley, Мерседес Венц, Range Rover, Porsche и других. Если вас интересует что-то спортивное, например, Ferrari, Lamborghini и тому подобное, загляните в наш раздел «Аренда спортивных автомобилей».</p>
                </div>
                <div class="car_rent_txt">
                    <h2>Аренда роскошных автомобилей в Дубае</h2>
                    <p>Хотите арендовать роскошные автомобили в эмирате Дубай? Не соглашайтесь на первый премиальный магазин по аренде автомобилей, сравните предложения от нескольких брендов по аренде автомобилей. Возьмите напрокат любой понравившийся автомобиль по самым низким рыночным ценам. Вкусите роскошь на бездорожье Дубая. Обязательно свяжитесь с компаниями напрямую по телефону или WhatsApp и спросите их об их текущих рекламных акциях.
                    </p>
                </div>
                <div class="car_rent_txt">
                    <h2>Ассортимент роскошных автомобилей</h2>
                    <p>Наш парк роскошных автомобилей напрокат включает в себя широкий выбор первоклассных автомобилей, которые сделают ваше путешествие по Дубаю особенным. Оплатите наличными или кредитной / дебетовой картой и закажите напрямую у поставщика. От Range Rover до Rolls Rouce, найдите самые эксклюзивные автомобили по самым низким ценам, предлагаемым известными компаниями в ОАЭ. Если вы не знаете, какую компанию выбрать, вы всегда можете проверить Google Reviews компании.</p>
                </div>
                <div class="car_rent_txt">
                    <h2>Аренда экзотических автомобилей в Дубае</h2>
                    <p>Многие люди со всего мира видели видеоролики о суперкарах со смесью стиля жизни Дубая. Каждый второй Instablogger загрузил видео о покорении дюн, покоряющем пески пустыни. Нет сомнений в том, что ОАЭ — это горячая точка для редких и мощных моторов. От сумасшедших багги, выполняющих безумные трюки в горах, до Феррари, Роллс-Ройса и других гиперкаров, курсирующих по дороге. ОАЭ не скрывают своего большого количества автомобилей. Эта любовь к автомобилям началась много лет назад, еще до того, как в ОАЭ появились дороги. В то время люди ездили по мягкому, неумолимому песку, чтобы добраться из точки А в точку Б.</p>
                    <p>По мере развития автомобилей люди настраивали свои автомобили на большую мощность, чтобы с легкостью путешествовать по песку. Это превратилось в спорт, в котором люди гоняли на своих машинах по дюнам и модифицировали их, чтобы сделать их быстрее и мощнее. Так началась любовь к автомобилям, а также любовь к скорости и мощности.
                        По мере того, как ОАЭ превращались в футуристическую городскую страну, которой мы являемся сегодня, любовь людей к автомобилям развивалась, но их любовь к большим внедорожникам оставалась. Сегодня вы можете увидеть множество суперкаров, ездящих рядом с Nissan Patrol и Toyota Land-Cruisers, которые пользуются одинаковым уважением на дорогах.</p>
                </div>',
            'supplier_note' => '+ 5% НДС. V8...6,2л',
            'delivery' => 'Дубай – бесплатно',
            'insurance' => 'Полный',
        ]);


        CarTranslation::create([
            'car_id' => 4,
            'locale' => 'en',
            'name' => 'Rent Lamborghini urus 2022 in Dubai',
            'custom_title' => 'Rent Lamborghini urus 2022 in Dubai',
            'description' => ' <div class="car_rent_txt">
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
                    <p>Our luхurу саr rental flееt includе a widе rаngе of tоp-оf-the-linе саrs to set your travel experience apart in Dubаi. Pаy by cаsh or a crеdit / debit саrd and bооk with the supplier directly. Frоm Rаngе Rоvеrs tо Rоlls Rоуcе, find thе mоst ехclusivе саrs at the lоwеst rаtеs offеrеd bу еstаblishеd cоmpаniеs in thе UАЕ. If you are confused which company to choose, you can always check out the companys Google Reviews.</p>
                </div>
                <div class="car_rent_txt">
                    <h2>Rent Exotic Cars in Dubai</h2>
                    <p>Many people from around the world have seen the videos of supercars with a medley of Dubai’s lifestyle. Every other Instablogger has uploaded a dune-bashing video conquering the desert sands. It’s no doubt that the UAE is a hotspot for rare and powerful motors. From crazy sand-buggies doing insane stunts up hills, to Ferraris, Rolls Royces and other hypercars cruising down the road. The UAE doesn’t hide its wide array of cars. This love for cars began many years ago, before there were roads in the UAE. Back then, people used to drive through the soft, unforgiving, sand to get from point A to B.</p>
                    <p>As motorcars developed, people used to tune their cars for more power to travel through the sand with ease. This developed into a sport, in which people would race their cars up dunes, and modify them to make them faster and more powerful. Thus began the love for cars, and the love for speed and power.
                        As the UAE developed into the futuristic urban country that it is today, people’s taste for cars developed, but their love for large SUVs remained. Today, you can see many supercars driving alongside Nissan Patrols and Toyota Land-Cruisers, both garnering similar levels of respect on the road.</p>
                </div>',
            'supplier_note' => '+ 5% VAT applicable. V8...6,2L',
            'delivery' => 'Dubai – Free',
            'insurance' => 'Full',
        ]);

        CarTranslation::create([
            'car_id' => 4,
            'locale' => 'ar',
            'name' => 'استئجار Lamborghini urus 2022 في دبي',
            'custom_title' => 'استئجار Lamborghini urus 2022 في دبي',
            'description' => ' <div class="car_rent_txt">
                    <h2 class="d-flex">تأجير السيارات الفخمة في دبي<span class="d-md-block d-none px-1"> — </span> الطريق السهلy</h2>
                    <p>قيادة سيارتك في دبي. يمكن العثور على عملاء مثل Rоlls Rоуcе و Bentley و еrсеdеs еnz و Range Rover و Porsche والمزيد. إذا كنت مهتمًا بشيء رياضي مثل Fеrаri و Lambоrghini وما شابه ، تحقق من قسم تأجير السيارات الرياضية.</p>
                </div>
                <div class="car_rent_txt">
                    <h2>استئجار السيارات الفاخرة في دبي</h2>
                    <p>هل تتطلع إلى استعادة الأماكن الرائعة في إمارة دبي؟ لا تقبل التسوية مع أول خدمة تأجير السيارات ، قارن العروض من عدد من العلامات التجارية لتأجير السيارات. قم بإعادة أي شيء يمكن أن يرضيك بأدنى مستويات السوق. استمتع بأجواء رائعة في الطرق المتفرقة من دبي. تأكد من الاتصال بالشركات مباشرة عبر الهاتف أو WhatsApp واطلب منهم عروضهم الترويجية المستمرة.
                    </p>
                </div>
                <div class="car_rent_txt">
                    <h2>مجموعة من خيارات السيارات الفاخرة</h2>
                    <p>تشتمل رحلاتنا الإيجارية الرائعة على مجموعة واسعة من الخيارات المميزة لتمييز تجربة السفر الخاصة بك في دبي. يتم الدفع عن طريق صندوق الائتمان أو بطاقة الائتمان / الخصم وتواصل مع المورد مباشرة. من Rаngе Rоvеrs to Rоlls Rоуcе ، اعثر على معظم الأشياء الحصرية في أقل العروض المعروضة من قبل المدربين السابقين في الإمارات العربية المتحدة. إذا كنت في حيرة من أمرك بشأن اختيار الشركة ، فيمكنك دائمًا التحقق من مراجعات Google الخاصة بالشركة.</p>
                </div>
                <div class="car_rent_txt">
                    <h2>استئجار سيارات غريبة في دبي</h2>
                    <p>شاهد العديد من الأشخاص من جميع أنحاء العالم مقاطع فيديو للسيارات الخارقة ذات مزيج متنوع من أسلوب الحياة في دبي. قام كل Instablogger آخر بتحميل مقطع فيديو حول الكثبان الرملية وهو يغزو رمال الصحراء. لا شك في أن الإمارات العربية المتحدة هي نقطة ساخنة للمحركات النادرة والقوية. من عربات الرمل المجنونة التي تقوم بحركات مجنونة فوق التلال ، إلى سيارات فيراري ورولز رويس وغيرها من السيارات الخارقة المبحرة على الطريق. لا تخفي الإمارات العربية المتحدة مجموعتها الواسعة من السيارات. بدأ هذا الحب للسيارات منذ سنوات عديدة ، قبل أن تكون هناك طرق في الإمارات. في ذلك الوقت ، اعتاد الناس القيادة عبر الرمال الناعمة التي لا ترحم للانتقال من النقطة أ إلى النقطة ب.</p>
                    <p>مع تطور السيارات النارية ، اعتاد الناس على ضبط سياراتهم للحصول على مزيد من القوة للتنقل عبر الرمال بسهولة. تطورت هذه إلى رياضة ، حيث يسابق الناس سياراتهم على الكثبان الرملية ، ويعدلونها لجعلها أسرع وأكثر قوة. هكذا بدأ حب السيارات ، وحب السرعة والقوة.
                        مع تطور دولة الإمارات العربية المتحدة لتصبح دولة حضرية مستقبلية كما هي عليه اليوم ، تطور ذوق الناس للسيارات ، ولكن ظل شغفهم بالسيارات الرياضية متعددة الاستخدامات الكبيرة. اليوم ، يمكنك رؤية العديد من السيارات الخارقة تسير جنبًا إلى جنب مع نيسان باترول وتويوتا لاند كروزر ، وكلاهما يحظى بمستويات مماثلة من الاحترام على الطريق.</p>
                </div>',
            'supplier_note' => '+ 5٪ ضريبة القيمة المضافة. V8 ... 6،2 لتر',
            'delivery' => 'دبي - مجاني',
            'insurance' => 'ممتلىء',
        ]);

        CarTranslation::create([
            'car_id' => 4,
            'locale' => 'fr',
            'name' => 'Louer Lamborghini urus 2022 à Dubaï',
            'custom_title' => 'Louer Lamborghini urus 2022 à Duba',
            'description' => ' <div class="car_rent_txt">
                    <h2 class="d-flex">Location de voitures de luxe à Dubaï<span class="d-md-block d-none px-1"> — </span> la manière facile</h2>
                    <p>Conduisez la voiture de vos rêves à Dubaï. Choisissez des voitures de marques haut de gamme comme Rolls Rоуcе, Bentley, Меrсеdеs Веnz, Range Rover, Porsche et plus encore. Si vous êtes intéressé par quelque chose de sportif comme une Ferrari, une Lamborghini et autres, consultez notre section Location de voitures de sport.</p>
                </div>
                <div class="car_rent_txt">
                    <h2>Location de voitures de luxe à Dubaï</h2>
                    <p>Vous cherchez à louer des voitures de luxe dans lémirat de Dubaï ? Ne vous contentez pas du premier magasin de location de voitures haut de gamme, comparez les offres de plusieurs marques de location de voitures. Louez nimporte quelle voiture électrique de votre choix au prix le plus bas du marché. Goûtez au luxe sur les routes très conviviales de Dubaï. Assurez-vous de contacter les entreprises directement par téléphone ou WhatsApp et demandez-leur leurs promotions en cours.
                    </p>
                </div>
                <div class="car_rent_txt">
                    <h2>Gamme doptions de voitures de luxe</h2>
                    <p>Notre flotte de location de voitures de luxe comprend une large gamme de voitures haut de gamme pour différencier votre expérience de voyage à Dubaï. Payez en espèces ou par carte de crédit / débit et réservez directement auprès du fournisseur. De la gamme Rovers à la Rolls Rоуcе, trouvez les voitures les plus exclusives aux tarifs les plus bas proposés par les sociétés établies dans lUАЕ. Si vous ne savez pas quelle entreprise choisir, vous pouvez toujours consulter les avis Google de lentreprise.</p>
                </div>
                <div class="car_rent_txt">
                    <h2>Louer des voitures exotiques à Dubaï</h2>
                    <p>De nombreuses personnes du monde entier ont vu les vidéos de supercars avec un mélange du style de vie de Dubaï. Tous les autres Instablogger ont mis en ligne une vidéo sur les dunes à la conquête des sables du désert. Il ne fait aucun doute que les Émirats arabes unis sont un point chaud pour les moteurs rares et puissants. Des poussettes de sable folles faisant des cascades folles sur les collines, aux Ferrari, Rolls Royce et autres hypercars qui roulent sur la route. Les EAU ne cachent pas leur large éventail de voitures. Cet amour pour les voitures a commencé il y a de nombreuses années, avant quil ny ait des routes aux EAU. À lépoque, les gens avaient lhabitude de traverser le sable mou et impitoyable pour se rendre du point A au point B.</p>
                    <p>Au fur et à mesure que les voitures se développaient, les gens réglaient leurs voitures pour plus de puissance afin de se déplacer facilement dans le sable. Cela sest transformé en un sport, dans lequel les gens faisaient courir leurs voitures sur des dunes et les modifiaient pour les rendre plus rapides et plus puissantes. Ainsi a commencé lamour pour les voitures, et lamour pour la vitesse et la puissance.
    Au fur et à mesure que les Émirats arabes unis devenaient le pays urbain futuriste qils sont aujourdhui, le goût des gens pour les voitures sest développé, mais leur amour pour les gros SUV est resté. Aujourdhui, vous pouvez voir de nombreuses supercars rouler aux côtés de Nissan Patrols et de Toyota Land-Cruisers, toutes deux recueillant des niveaux de respect similaires sur la route.</p>
                </div>',
            'supplier_note' => '+ 5% TVA applicable. V8...6,2L',
            'delivery' => 'Dubaï – Gratuit',
            'insurance' => 'Complète',
        ]);

        CarTranslation::create([
            'car_id' => 4,
            'locale' => 'ru',
            'name' => 'Аренда Lamborghini urus 2022 в Дубае',
            'custom_title' => 'Аренда Lamborghini urus 2022 в Дубае',
            'description' => ' <div class="car_rent_txt">
                    <h2 class="d-flex">Прокат автомобилей класса люкс в Дубае<span class="d-md-block d-none px-1"> — </span> легкий путь</h2>
                    <p>Управляйте автомобилем своей мечты в Дубае. Выбирайте автомобили премиальных брендов, таких как Rolls Rouce, Bentley, Мерседес Венц, Range Rover, Porsche и других. Если вас интересует что-то спортивное, например, Ferrari, Lamborghini и тому подобное, загляните в наш раздел «Аренда спортивных автомобилей».</p>
                </div>
                <div class="car_rent_txt">
                    <h2>Аренда роскошных автомобилей в Дубае</h2>
                    <p>Хотите арендовать роскошные автомобили в эмирате Дубай? Не соглашайтесь на первый премиальный магазин по аренде автомобилей, сравните предложения от нескольких брендов по аренде автомобилей. Возьмите напрокат любой понравившийся автомобиль по самым низким рыночным ценам. Вкусите роскошь на бездорожье Дубая. Обязательно свяжитесь с компаниями напрямую по телефону или WhatsApp и спросите их об их текущих рекламных акциях.
                    </p>
                </div>
                <div class="car_rent_txt">
                    <h2>Ассортимент роскошных автомобилей</h2>
                    <p>Наш парк роскошных автомобилей напрокат включает в себя широкий выбор первоклассных автомобилей, которые сделают ваше путешествие по Дубаю особенным. Оплатите наличными или кредитной / дебетовой картой и закажите напрямую у поставщика. От Range Rover до Rolls Rouce, найдите самые эксклюзивные автомобили по самым низким ценам, предлагаемым известными компаниями в ОАЭ. Если вы не знаете, какую компанию выбрать, вы всегда можете проверить Google Reviews компании.</p>
                </div>
                <div class="car_rent_txt">
                    <h2>Аренда экзотических автомобилей в Дубае</h2>
                    <p>Многие люди со всего мира видели видеоролики о суперкарах со смесью стиля жизни Дубая. Каждый второй Instablogger загрузил видео о покорении дюн, покоряющем пески пустыни. Нет сомнений в том, что ОАЭ — это горячая точка для редких и мощных моторов. От сумасшедших багги, выполняющих безумные трюки в горах, до Феррари, Роллс-Ройса и других гиперкаров, курсирующих по дороге. ОАЭ не скрывают своего большого количества автомобилей. Эта любовь к автомобилям началась много лет назад, еще до того, как в ОАЭ появились дороги. В то время люди ездили по мягкому, неумолимому песку, чтобы добраться из точки А в точку Б.</p>
                    <p>По мере развития автомобилей люди настраивали свои автомобили на большую мощность, чтобы с легкостью путешествовать по песку. Это превратилось в спорт, в котором люди гоняли на своих машинах по дюнам и модифицировали их, чтобы сделать их быстрее и мощнее. Так началась любовь к автомобилям, а также любовь к скорости и мощности.
                        По мере того, как ОАЭ превращались в футуристическую городскую страну, которой мы являемся сегодня, любовь людей к автомобилям развивалась, но их любовь к большим внедорожникам оставалась. Сегодня вы можете увидеть множество суперкаров, ездящих рядом с Nissan Patrol и Toyota Land-Cruisers, которые пользуются одинаковым уважением на дорогах.</p>
                </div>',
            'supplier_note' => '+ 5% НДС. V8...6,2л',
            'delivery' => 'Дубай – бесплатно',
            'insurance' => 'Полный',
        ]);

        CarTranslation::create([
            'car_id' => 5,
            'locale' => 'en',
            'name' => 'Rent Lamborghini urus 2022 in Dubai',
            'custom_title' => 'Rent Lamborghini urus 2022 in Dubai',
            'description' => ' <div class="car_rent_txt">
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
                    <p>Our luхurу саr rental flееt includе a widе rаngе of tоp-оf-the-linе саrs to set your travel experience apart in Dubаi. Pаy by cаsh or a crеdit / debit саrd and bооk with the supplier directly. Frоm Rаngе Rоvеrs tо Rоlls Rоуcе, find thе mоst ехclusivе саrs at the lоwеst rаtеs offеrеd bу еstаblishеd cоmpаniеs in thе UАЕ. If you are confused which company to choose, you can always check out the companys Google Reviews.</p>
                </div>
                <div class="car_rent_txt">
                    <h2>Rent Exotic Cars in Dubai</h2>
                    <p>Many people from around the world have seen the videos of supercars with a medley of Dubai’s lifestyle. Every other Instablogger has uploaded a dune-bashing video conquering the desert sands. It’s no doubt that the UAE is a hotspot for rare and powerful motors. From crazy sand-buggies doing insane stunts up hills, to Ferraris, Rolls Royces and other hypercars cruising down the road. The UAE doesn’t hide its wide array of cars. This love for cars began many years ago, before there were roads in the UAE. Back then, people used to drive through the soft, unforgiving, sand to get from point A to B.</p>
                    <p>As motorcars developed, people used to tune their cars for more power to travel through the sand with ease. This developed into a sport, in which people would race their cars up dunes, and modify them to make them faster and more powerful. Thus began the love for cars, and the love for speed and power.
                        As the UAE developed into the futuristic urban country that it is today, people’s taste for cars developed, but their love for large SUVs remained. Today, you can see many supercars driving alongside Nissan Patrols and Toyota Land-Cruisers, both garnering similar levels of respect on the road.</p>
                </div>',
            'supplier_note' => '+ 5% VAT applicable. V8...6,2L',
            'delivery' => 'Dubai – Free',
            'insurance' => 'Full',
        ]);

        CarTranslation::create([
            'car_id' => 5,
            'locale' => 'ar',
            'name' => 'استئجار Lamborghini urus 2022 في دبي',
            'custom_title' => 'استئجار Lamborghini urus 2022 في دبي',
            'description' => ' <div class="car_rent_txt">
                    <h2 class="d-flex">تأجير السيارات الفخمة في دبي<span class="d-md-block d-none px-1"> — </span> الطريق السهلy</h2>
                    <p>قيادة سيارتك في دبي. يمكن العثور على عملاء مثل Rоlls Rоуcе و Bentley و еrсеdеs еnz و Range Rover و Porsche والمزيد. إذا كنت مهتمًا بشيء رياضي مثل Fеrаri و Lambоrghini وما شابه ، تحقق من قسم تأجير السيارات الرياضية.</p>
                </div>
                <div class="car_rent_txt">
                    <h2>استئجار السيارات الفاخرة في دبي</h2>
                    <p>هل تتطلع إلى استعادة الأماكن الرائعة في إمارة دبي؟ لا تقبل التسوية مع أول خدمة تأجير السيارات ، قارن العروض من عدد من العلامات التجارية لتأجير السيارات. قم بإعادة أي شيء يمكن أن يرضيك بأدنى مستويات السوق. استمتع بأجواء رائعة في الطرق المتفرقة من دبي. تأكد من الاتصال بالشركات مباشرة عبر الهاتف أو WhatsApp واطلب منهم عروضهم الترويجية المستمرة.
                    </p>
                </div>
                <div class="car_rent_txt">
                    <h2>مجموعة من خيارات السيارات الفاخرة</h2>
                    <p>تشتمل رحلاتنا الإيجارية الرائعة على مجموعة واسعة من الخيارات المميزة لتمييز تجربة السفر الخاصة بك في دبي. يتم الدفع عن طريق صندوق الائتمان أو بطاقة الائتمان / الخصم وتواصل مع المورد مباشرة. من Rаngе Rоvеrs to Rоlls Rоуcе ، اعثر على معظم الأشياء الحصرية في أقل العروض المعروضة من قبل المدربين السابقين في الإمارات العربية المتحدة. إذا كنت في حيرة من أمرك بشأن اختيار الشركة ، فيمكنك دائمًا التحقق من مراجعات Google الخاصة بالشركة.</p>
                </div>
                <div class="car_rent_txt">
                    <h2>استئجار سيارات غريبة في دبي</h2>
                    <p>شاهد العديد من الأشخاص من جميع أنحاء العالم مقاطع فيديو للسيارات الخارقة ذات مزيج متنوع من أسلوب الحياة في دبي. قام كل Instablogger آخر بتحميل مقطع فيديو حول الكثبان الرملية وهو يغزو رمال الصحراء. لا شك في أن الإمارات العربية المتحدة هي نقطة ساخنة للمحركات النادرة والقوية. من عربات الرمل المجنونة التي تقوم بحركات مجنونة فوق التلال ، إلى سيارات فيراري ورولز رويس وغيرها من السيارات الخارقة المبحرة على الطريق. لا تخفي الإمارات العربية المتحدة مجموعتها الواسعة من السيارات. بدأ هذا الحب للسيارات منذ سنوات عديدة ، قبل أن تكون هناك طرق في الإمارات. في ذلك الوقت ، اعتاد الناس القيادة عبر الرمال الناعمة التي لا ترحم للانتقال من النقطة أ إلى النقطة ب.</p>
                    <p>مع تطور السيارات النارية ، اعتاد الناس على ضبط سياراتهم للحصول على مزيد من القوة للتنقل عبر الرمال بسهولة. تطورت هذه إلى رياضة ، حيث يسابق الناس سياراتهم على الكثبان الرملية ، ويعدلونها لجعلها أسرع وأكثر قوة. هكذا بدأ حب السيارات ، وحب السرعة والقوة.
                        مع تطور دولة الإمارات العربية المتحدة لتصبح دولة حضرية مستقبلية كما هي عليه اليوم ، تطور ذوق الناس للسيارات ، ولكن ظل شغفهم بالسيارات الرياضية متعددة الاستخدامات الكبيرة. اليوم ، يمكنك رؤية العديد من السيارات الخارقة تسير جنبًا إلى جنب مع نيسان باترول وتويوتا لاند كروزر ، وكلاهما يحظى بمستويات مماثلة من الاحترام على الطريق.</p>
                </div>',
            'supplier_note' => '+ 5٪ ضريبة القيمة المضافة. V8 ... 6،2 لتر',
            'delivery' => 'دبي - مجاني',
            'insurance' => 'ممتلىء',
        ]);

        CarTranslation::create([
            'car_id' => 5,
            'locale' => 'fr',
            'name' => 'Louer Lamborghini urus 2022 à Dubaï',
            'custom_title' => 'Louer Lamborghini urus 2022 à Dubaï',
            'description' => ' <div class="car_rent_txt">
                    <h2 class="d-flex">Location de voitures de luxe à Dubaï<span class="d-md-block d-none px-1"> — </span> la manière facile</h2>
                    <p>Conduisez la voiture de vos rêves à Dubaï. Choisissez des voitures de marques haut de gamme comme Rolls Rоуcе, Bentley, Меrсеdеs Веnz, Range Rover, Porsche et plus encore. Si vous êtes intéressé par quelque chose de sportif comme une Ferrari, une Lamborghini et autres, consultez notre section Location de voitures de sport.</p>
                </div>
                <div class="car_rent_txt">
                    <h2>Location de voitures de luxe à Dubaï</h2>
                    <p>Vous cherchez à louer des voitures de luxe dans lémirat de Dubaï ? Ne vous contentez pas du premier magasin de location de voitures haut de gamme, comparez les offres de plusieurs marques de location de voitures. Louez nimporte quelle voiture électrique de votre choix au prix le plus bas du marché. Goûtez au luxe sur les routes très conviviales de Dubaï. Assurez-vous de contacter les entreprises directement par téléphone ou WhatsApp et demandez-leur leurs promotions en cours.
                    </p>
                </div>
                <div class="car_rent_txt">
                    <h2>Gamme doptions de voitures de luxe</h2>
                    <p>Notre flotte de location de voitures de luxe comprend une large gamme de voitures haut de gamme pour différencier votre expérience de voyage à Dubaï. Payez en espèces ou par carte de crédit / débit et réservez directement auprès du fournisseur. De la gamme Rovers à la Rolls Rоуcе, trouvez les voitures les plus exclusives aux tarifs les plus bas proposés par les sociétés établies dans lUАЕ. Si vous ne savez pas quelle entreprise choisir, vous pouvez toujours consulter les avis Google de lentreprise.</p>
                </div>
                <div class="car_rent_txt">
                    <h2>Louer des voitures exotiques à Dubaï</h2>
                    <p>De nombreuses personnes du monde entier ont vu les vidéos de supercars avec un mélange du style de vie de Dubaï. Tous les autres Instablogger ont mis en ligne une vidéo sur les dunes à la conquête des sables du désert. Il ne fait aucun doute que les Émirats arabes unis sont un point chaud pour les moteurs rares et puissants. Des poussettes de sable folles faisant des cascades folles sur les collines, aux Ferrari, Rolls Royce et autres hypercars qui roulent sur la route. Les EAU ne cachent pas leur large éventail de voitures. Cet amour pour les voitures a commencé il y a de nombreuses années, avant quil ny ait des routes aux EAU. À lépoque, les gens avaient lhabitude de traverser le sable mou et impitoyable pour se rendre du point A au point B.</p>
                    <p>Au fur et à mesure que les voitures se développaient, les gens réglaient leurs voitures pour plus de puissance afin de se déplacer facilement dans le sable. Cela sest transformé en un sport, dans lequel les gens faisaient courir leurs voitures sur des dunes et les modifiaient pour les rendre plus rapides et plus puissantes. Ainsi a commencé lamour pour les voitures, et lamour pour la vitesse et la puissance.
    Au fur et à mesure que les Émirats arabes unis devenaient le pays urbain futuriste qils sont aujourdhui, le goût des gens pour les voitures sest développé, mais leur amour pour les gros SUV est resté. Aujourdhui, vous pouvez voir de nombreuses supercars rouler aux côtés de Nissan Patrols et de Toyota Land-Cruisers, toutes deux recueillant des niveaux de respect similaires sur la route.</p>
                </div>',
            'supplier_note' => '+ 5% TVA applicable. V8...6,2L',
            'delivery' => 'Dubaï – Gratuit',
            'insurance' => 'Complète',
        ]);

        CarTranslation::create([
            'car_id' => 5,
            'locale' => 'ru',
            'name' => 'Аренда Lamborghini urus 2022 в Дубае',
            'custom_title' => 'Аренда Lamborghini urus 2022 в Дубае',
            'description' => ' <div class="car_rent_txt">
                    <h2 class="d-flex">Прокат автомобилей класса люкс в Дубае<span class="d-md-block d-none px-1"> — </span> легкий путь</h2>
                    <p>Управляйте автомобилем своей мечты в Дубае. Выбирайте автомобили премиальных брендов, таких как Rolls Rouce, Bentley, Мерседес Венц, Range Rover, Porsche и других. Если вас интересует что-то спортивное, например, Ferrari, Lamborghini и тому подобное, загляните в наш раздел «Аренда спортивных автомобилей».</p>
                </div>
                <div class="car_rent_txt">
                    <h2>Аренда роскошных автомобилей в Дубае</h2>
                    <p>Хотите арендовать роскошные автомобили в эмирате Дубай? Не соглашайтесь на первый премиальный магазин по аренде автомобилей, сравните предложения от нескольких брендов по аренде автомобилей. Возьмите напрокат любой понравившийся автомобиль по самым низким рыночным ценам. Вкусите роскошь на бездорожье Дубая. Обязательно свяжитесь с компаниями напрямую по телефону или WhatsApp и спросите их об их текущих рекламных акциях.
                    </p>
                </div>
                <div class="car_rent_txt">
                    <h2>Ассортимент роскошных автомобилей</h2>
                    <p>Наш парк роскошных автомобилей напрокат включает в себя широкий выбор первоклассных автомобилей, которые сделают ваше путешествие по Дубаю особенным. Оплатите наличными или кредитной / дебетовой картой и закажите напрямую у поставщика. От Range Rover до Rolls Rouce, найдите самые эксклюзивные автомобили по самым низким ценам, предлагаемым известными компаниями в ОАЭ. Если вы не знаете, какую компанию выбрать, вы всегда можете проверить Google Reviews компании.</p>
                </div>
                <div class="car_rent_txt">
                    <h2>Аренда экзотических автомобилей в Дубае</h2>
                    <p>Многие люди со всего мира видели видеоролики о суперкарах со смесью стиля жизни Дубая. Каждый второй Instablogger загрузил видео о покорении дюн, покоряющем пески пустыни. Нет сомнений в том, что ОАЭ — это горячая точка для редких и мощных моторов. От сумасшедших багги, выполняющих безумные трюки в горах, до Феррари, Роллс-Ройса и других гиперкаров, курсирующих по дороге. ОАЭ не скрывают своего большого количества автомобилей. Эта любовь к автомобилям началась много лет назад, еще до того, как в ОАЭ появились дороги. В то время люди ездили по мягкому, неумолимому песку, чтобы добраться из точки А в точку Б.</p>
                    <p>По мере развития автомобилей люди настраивали свои автомобили на большую мощность, чтобы с легкостью путешествовать по песку. Это превратилось в спорт, в котором люди гоняли на своих машинах по дюнам и модифицировали их, чтобы сделать их быстрее и мощнее. Так началась любовь к автомобилям, а также любовь к скорости и мощности.
                        По мере того, как ОАЭ превращались в футуристическую городскую страну, которой мы являемся сегодня, любовь людей к автомобилям развивалась, но их любовь к большим внедорожникам оставалась. Сегодня вы можете увидеть множество суперкаров, ездящих рядом с Nissan Patrol и Toyota Land-Cruisers, которые пользуются одинаковым уважением на дорогах.</p>
                </div>',
            'supplier_note' => '+ 5% НДС. V8...6,2л',
            'delivery' => 'Дубай – бесплатно',
            'insurance' => 'Полный',
        ]);

        CarTranslation::create([
            'car_id' => 6,
            'locale' => 'en',
            'name' => 'Rent Lamborghini urus 2022 in Dubai',
            'custom_title' => 'Rent Lamborghini urus 2022 in Dubai',
            'description' => ' <div class="car_rent_txt">
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
                    <p>Our luхurу саr rental flееt includе a widе rаngе of tоp-оf-the-linе саrs to set your travel experience apart in Dubаi. Pаy by cаsh or a crеdit / debit саrd and bооk with the supplier directly. Frоm Rаngе Rоvеrs tо Rоlls Rоуcе, find thе mоst ехclusivе саrs at the lоwеst rаtеs offеrеd bу еstаblishеd cоmpаniеs in thе UАЕ. If you are confused which company to choose, you can always check out the companys Google Reviews.</p>
                </div>
                <div class="car_rent_txt">
                    <h2>Rent Exotic Cars in Dubai</h2>
                    <p>Many people from around the world have seen the videos of supercars with a medley of Dubai’s lifestyle. Every other Instablogger has uploaded a dune-bashing video conquering the desert sands. It’s no doubt that the UAE is a hotspot for rare and powerful motors. From crazy sand-buggies doing insane stunts up hills, to Ferraris, Rolls Royces and other hypercars cruising down the road. The UAE doesn’t hide its wide array of cars. This love for cars began many years ago, before there were roads in the UAE. Back then, people used to drive through the soft, unforgiving, sand to get from point A to B.</p>
                    <p>As motorcars developed, people used to tune their cars for more power to travel through the sand with ease. This developed into a sport, in which people would race their cars up dunes, and modify them to make them faster and more powerful. Thus began the love for cars, and the love for speed and power.
                        As the UAE developed into the futuristic urban country that it is today, people’s taste for cars developed, but their love for large SUVs remained. Today, you can see many supercars driving alongside Nissan Patrols and Toyota Land-Cruisers, both garnering similar levels of respect on the road.</p>
                </div>',
            'supplier_note' => '+ 5% VAT applicable. V8...6,2L',
            'delivery' => 'Dubai – Free',
            'insurance' => 'Full',
        ]);

        CarTranslation::create([
            'car_id' => 6,
            'locale' => 'ar',
            'name' => 'استئجار Lamborghini urus 2022 في دبي',
            'custom_title' => 'استئجار Lamborghini urus 2022 في دبي',
            'description' => ' <div class="car_rent_txt">
                    <h2 class="d-flex">تأجير السيارات الفخمة في دبي<span class="d-md-block d-none px-1"> — </span> الطريق السهلy</h2>
                    <p>قيادة سيارتك في دبي. يمكن العثور على عملاء مثل Rоlls Rоуcе و Bentley و еrсеdеs еnz و Range Rover و Porsche والمزيد. إذا كنت مهتمًا بشيء رياضي مثل Fеrаri و Lambоrghini وما شابه ، تحقق من قسم تأجير السيارات الرياضية.</p>
                </div>
                <div class="car_rent_txt">
                    <h2>استئجار السيارات الفاخرة في دبي</h2>
                    <p>هل تتطلع إلى استعادة الأماكن الرائعة في إمارة دبي؟ لا تقبل التسوية مع أول خدمة تأجير السيارات ، قارن العروض من عدد من العلامات التجارية لتأجير السيارات. قم بإعادة أي شيء يمكن أن يرضيك بأدنى مستويات السوق. استمتع بأجواء رائعة في الطرق المتفرقة من دبي. تأكد من الاتصال بالشركات مباشرة عبر الهاتف أو WhatsApp واطلب منهم عروضهم الترويجية المستمرة.
                    </p>
                </div>
                <div class="car_rent_txt">
                    <h2>مجموعة من خيارات السيارات الفاخرة</h2>
                    <p>تشتمل رحلاتنا الإيجارية الرائعة على مجموعة واسعة من الخيارات المميزة لتمييز تجربة السفر الخاصة بك في دبي. يتم الدفع عن طريق صندوق الائتمان أو بطاقة الائتمان / الخصم وتواصل مع المورد مباشرة. من Rаngе Rоvеrs to Rоlls Rоуcе ، اعثر على معظم الأشياء الحصرية في أقل العروض المعروضة من قبل المدربين السابقين في الإمارات العربية المتحدة. إذا كنت في حيرة من أمرك بشأن اختيار الشركة ، فيمكنك دائمًا التحقق من مراجعات Google الخاصة بالشركة.</p>
                </div>
                <div class="car_rent_txt">
                    <h2>استئجار سيارات غريبة في دبي</h2>
                    <p>شاهد العديد من الأشخاص من جميع أنحاء العالم مقاطع فيديو للسيارات الخارقة ذات مزيج متنوع من أسلوب الحياة في دبي. قام كل Instablogger آخر بتحميل مقطع فيديو حول الكثبان الرملية وهو يغزو رمال الصحراء. لا شك في أن الإمارات العربية المتحدة هي نقطة ساخنة للمحركات النادرة والقوية. من عربات الرمل المجنونة التي تقوم بحركات مجنونة فوق التلال ، إلى سيارات فيراري ورولز رويس وغيرها من السيارات الخارقة المبحرة على الطريق. لا تخفي الإمارات العربية المتحدة مجموعتها الواسعة من السيارات. بدأ هذا الحب للسيارات منذ سنوات عديدة ، قبل أن تكون هناك طرق في الإمارات. في ذلك الوقت ، اعتاد الناس القيادة عبر الرمال الناعمة التي لا ترحم للانتقال من النقطة أ إلى النقطة ب.</p>
                    <p>مع تطور السيارات النارية ، اعتاد الناس على ضبط سياراتهم للحصول على مزيد من القوة للتنقل عبر الرمال بسهولة. تطورت هذه إلى رياضة ، حيث يسابق الناس سياراتهم على الكثبان الرملية ، ويعدلونها لجعلها أسرع وأكثر قوة. هكذا بدأ حب السيارات ، وحب السرعة والقوة.
                        مع تطور دولة الإمارات العربية المتحدة لتصبح دولة حضرية مستقبلية كما هي عليه اليوم ، تطور ذوق الناس للسيارات ، ولكن ظل شغفهم بالسيارات الرياضية متعددة الاستخدامات الكبيرة. اليوم ، يمكنك رؤية العديد من السيارات الخارقة تسير جنبًا إلى جنب مع نيسان باترول وتويوتا لاند كروزر ، وكلاهما يحظى بمستويات مماثلة من الاحترام على الطريق.</p>
                </div>',
            'supplier_note' => '+ 5٪ ضريبة القيمة المضافة. V8 ... 6،2 لتر',
            'delivery' => 'دبي - مجاني',
            'insurance' => 'ممتلىء',
        ]);

        CarTranslation::create([
            'car_id' => 6,
            'locale' => 'fr',
            'name' => 'Louer Lamborghini urus 2022 à Dubaï',
            'custom_title' => 'Louer Lamborghini urus 2022 à Dubaï',
            'description' => ' <div class="car_rent_txt">
                    <h2 class="d-flex">Location de voitures de luxe à Dubaï<span class="d-md-block d-none px-1"> — </span> la manière facile</h2>
                    <p>Conduisez la voiture de vos rêves à Dubaï. Choisissez des voitures de marques haut de gamme comme Rolls Rоуcе, Bentley, Меrсеdеs Веnz, Range Rover, Porsche et plus encore. Si vous êtes intéressé par quelque chose de sportif comme une Ferrari, une Lamborghini et autres, consultez notre section Location de voitures de sport.</p>
                </div>
                <div class="car_rent_txt">
                    <h2>Location de voitures de luxe à Dubaï</h2>
                    <p>Vous cherchez à louer des voitures de luxe dans lémirat de Dubaï ? Ne vous contentez pas du premier magasin de location de voitures haut de gamme, comparez les offres de plusieurs marques de location de voitures. Louez nimporte quelle voiture électrique de votre choix au prix le plus bas du marché. Goûtez au luxe sur les routes très conviviales de Dubaï. Assurez-vous de contacter les entreprises directement par téléphone ou WhatsApp et demandez-leur leurs promotions en cours.
                    </p>
                </div>
                <div class="car_rent_txt">
                    <h2>Gamme doptions de voitures de luxe</h2>
                    <p>Notre flotte de location de voitures de luxe comprend une large gamme de voitures haut de gamme pour différencier votre expérience de voyage à Dubaï. Payez en espèces ou par carte de crédit / débit et réservez directement auprès du fournisseur. De la gamme Rovers à la Rolls Rоуcе, trouvez les voitures les plus exclusives aux tarifs les plus bas proposés par les sociétés établies dans lUАЕ. Si vous ne savez pas quelle entreprise choisir, vous pouvez toujours consulter les avis Google de lentreprise.</p>
                </div>
                <div class="car_rent_txt">
                    <h2>Louer des voitures exotiques à Dubaï</h2>
                    <p>De nombreuses personnes du monde entier ont vu les vidéos de supercars avec un mélange du style de vie de Dubaï. Tous les autres Instablogger ont mis en ligne une vidéo sur les dunes à la conquête des sables du désert. Il ne fait aucun doute que les Émirats arabes unis sont un point chaud pour les moteurs rares et puissants. Des poussettes de sable folles faisant des cascades folles sur les collines, aux Ferrari, Rolls Royce et autres hypercars qui roulent sur la route. Les EAU ne cachent pas leur large éventail de voitures. Cet amour pour les voitures a commencé il y a de nombreuses années, avant quil ny ait des routes aux EAU. À lépoque, les gens avaient lhabitude de traverser le sable mou et impitoyable pour se rendre du point A au point B.</p>
                    <p>Au fur et à mesure que les voitures se développaient, les gens réglaient leurs voitures pour plus de puissance afin de se déplacer facilement dans le sable. Cela sest transformé en un sport, dans lequel les gens faisaient courir leurs voitures sur des dunes et les modifiaient pour les rendre plus rapides et plus puissantes. Ainsi a commencé lamour pour les voitures, et lamour pour la vitesse et la puissance.
    Au fur et à mesure que les Émirats arabes unis devenaient le pays urbain futuriste qils sont aujourdhui, le goût des gens pour les voitures sest développé, mais leur amour pour les gros SUV est resté. Aujourdhui, vous pouvez voir de nombreuses supercars rouler aux côtés de Nissan Patrols et de Toyota Land-Cruisers, toutes deux recueillant des niveaux de respect similaires sur la route.</p>
                </div>',
            'supplier_note' => '+ 5% TVA applicable. V8...6,2L',
            'delivery' => 'Dubaï – Gratuit',
            'insurance' => 'Complète',
        ]);

        CarTranslation::create([
            'car_id' => 6,
            'locale' => 'ru',
            'name' => 'Аренда Lamborghini urus 2022 в Дубае',
            'custom_title' => 'Аренда Lamborghini urus 2022 в Ду',
            'description' => ' <div class="car_rent_txt">
                    <h2 class="d-flex">Прокат автомобилей класса люкс в Дубае<span class="d-md-block d-none px-1"> — </span> легкий путь</h2>
                    <p>Управляйте автомобилем своей мечты в Дубае. Выбирайте автомобили премиальных брендов, таких как Rolls Rouce, Bentley, Мерседес Венц, Range Rover, Porsche и других. Если вас интересует что-то спортивное, например, Ferrari, Lamborghini и тому подобное, загляните в наш раздел «Аренда спортивных автомобилей».</p>
                </div>
                <div class="car_rent_txt">
                    <h2>Аренда роскошных автомобилей в Дубае</h2>
                    <p>Хотите арендовать роскошные автомобили в эмирате Дубай? Не соглашайтесь на первый премиальный магазин по аренде автомобилей, сравните предложения от нескольких брендов по аренде автомобилей. Возьмите напрокат любой понравившийся автомобиль по самым низким рыночным ценам. Вкусите роскошь на бездорожье Дубая. Обязательно свяжитесь с компаниями напрямую по телефону или WhatsApp и спросите их об их текущих рекламных акциях.
                    </p>
                </div>
                <div class="car_rent_txt">
                    <h2>Ассортимент роскошных автомобилей</h2>
                    <p>Наш парк роскошных автомобилей напрокат включает в себя широкий выбор первоклассных автомобилей, которые сделают ваше путешествие по Дубаю особенным. Оплатите наличными или кредитной / дебетовой картой и закажите напрямую у поставщика. От Range Rover до Rolls Rouce, найдите самые эксклюзивные автомобили по самым низким ценам, предлагаемым известными компаниями в ОАЭ. Если вы не знаете, какую компанию выбрать, вы всегда можете проверить Google Reviews компании.</p>
                </div>
                <div class="car_rent_txt">
                    <h2>Аренда экзотических автомобилей в Дубае</h2>
                    <p>Многие люди со всего мира видели видеоролики о суперкарах со смесью стиля жизни Дубая. Каждый второй Instablogger загрузил видео о покорении дюн, покоряющем пески пустыни. Нет сомнений в том, что ОАЭ — это горячая точка для редких и мощных моторов. От сумасшедших багги, выполняющих безумные трюки в горах, до Феррари, Роллс-Ройса и других гиперкаров, курсирующих по дороге. ОАЭ не скрывают своего большого количества автомобилей. Эта любовь к автомобилям началась много лет назад, еще до того, как в ОАЭ появились дороги. В то время люди ездили по мягкому, неумолимому песку, чтобы добраться из точки А в точку Б.</p>
                    <p>По мере развития автомобилей люди настраивали свои автомобили на большую мощность, чтобы с легкостью путешествовать по песку. Это превратилось в спорт, в котором люди гоняли на своих машинах по дюнам и модифицировали их, чтобы сделать их быстрее и мощнее. Так началась любовь к автомобилям, а также любовь к скорости и мощности.
                        По мере того, как ОАЭ превращались в футуристическую городскую страну, которой мы являемся сегодня, любовь людей к автомобилям развивалась, но их любовь к большим внедорожникам оставалась. Сегодня вы можете увидеть множество суперкаров, ездящих рядом с Nissan Patrol и Toyota Land-Cruisers, которые пользуются одинаковым уважением на дорогах.</p>
                </div>',
            'supplier_note' => '+ 5% НДС. V8...6,2л',
            'delivery' => 'Дубай – бесплатно',
            'insurance' => 'Полный',
        ]);

        CarTranslation::create([
            'car_id' => 7,
            'locale' => 'en',
            'name' => 'Rent Lamborghini urus 2022 in Dubai',
            'custom_title' => 'Rent Lamborghini urus 2022 in Dubai',
            'description' => ' <div class="car_rent_txt">
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
                    <p>Our luхurу саr rental flееt includе a widе rаngе of tоp-оf-the-linе саrs to set your travel experience apart in Dubаi. Pаy by cаsh or a crеdit / debit саrd and bооk with the supplier directly. Frоm Rаngе Rоvеrs tо Rоlls Rоуcе, find thе mоst ехclusivе саrs at the lоwеst rаtеs offеrеd bу еstаblishеd cоmpаniеs in thе UАЕ. If you are confused which company to choose, you can always check out the companys Google Reviews.</p>
                </div>
                <div class="car_rent_txt">
                    <h2>Rent Exotic Cars in Dubai</h2>
                    <p>Many people from around the world have seen the videos of supercars with a medley of Dubai’s lifestyle. Every other Instablogger has uploaded a dune-bashing video conquering the desert sands. It’s no doubt that the UAE is a hotspot for rare and powerful motors. From crazy sand-buggies doing insane stunts up hills, to Ferraris, Rolls Royces and other hypercars cruising down the road. The UAE doesn’t hide its wide array of cars. This love for cars began many years ago, before there were roads in the UAE. Back then, people used to drive through the soft, unforgiving, sand to get from point A to B.</p>
                    <p>As motorcars developed, people used to tune their cars for more power to travel through the sand with ease. This developed into a sport, in which people would race their cars up dunes, and modify them to make them faster and more powerful. Thus began the love for cars, and the love for speed and power.
                        As the UAE developed into the futuristic urban country that it is today, people’s taste for cars developed, but their love for large SUVs remained. Today, you can see many supercars driving alongside Nissan Patrols and Toyota Land-Cruisers, both garnering similar levels of respect on the road.</p>
                </div>',
            'supplier_note' => '+ 5% VAT applicable. V8...6,2L',
            'delivery' => 'Dubai – Free',
            'insurance' => 'Full',
        ]);

        CarTranslation::create([
            'car_id' => 7,
            'locale' => 'ar',
            'name' => 'استئجار Lamborghini urus 2022 في دبي',
            'custom_title' => 'استئجار Lamborghini urus 2022 في دبي',
            'description' => ' <div class="car_rent_txt">
                    <h2 class="d-flex">تأجير السيارات الفخمة في دبي<span class="d-md-block d-none px-1"> — </span> الطريق السهلy</h2>
                    <p>قيادة سيارتك في دبي. يمكن العثور على عملاء مثل Rоlls Rоуcе و Bentley و еrсеdеs еnz و Range Rover و Porsche والمزيد. إذا كنت مهتمًا بشيء رياضي مثل Fеrаri و Lambоrghini وما شابه ، تحقق من قسم تأجير السيارات الرياضية.</p>
                </div>
                <div class="car_rent_txt">
                    <h2>استئجار السيارات الفاخرة في دبي</h2>
                    <p>هل تتطلع إلى استعادة الأماكن الرائعة في إمارة دبي؟ لا تقبل التسوية مع أول خدمة تأجير السيارات ، قارن العروض من عدد من العلامات التجارية لتأجير السيارات. قم بإعادة أي شيء يمكن أن يرضيك بأدنى مستويات السوق. استمتع بأجواء رائعة في الطرق المتفرقة من دبي. تأكد من الاتصال بالشركات مباشرة عبر الهاتف أو WhatsApp واطلب منهم عروضهم الترويجية المستمرة.
                    </p>
                </div>
                <div class="car_rent_txt">
                    <h2>مجموعة من خيارات السيارات الفاخرة</h2>
                    <p>تشتمل رحلاتنا الإيجارية الرائعة على مجموعة واسعة من الخيارات المميزة لتمييز تجربة السفر الخاصة بك في دبي. يتم الدفع عن طريق صندوق الائتمان أو بطاقة الائتمان / الخصم وتواصل مع المورد مباشرة. من Rаngе Rоvеrs to Rоlls Rоуcе ، اعثر على معظم الأشياء الحصرية في أقل العروض المعروضة من قبل المدربين السابقين في الإمارات العربية المتحدة. إذا كنت في حيرة من أمرك بشأن اختيار الشركة ، فيمكنك دائمًا التحقق من مراجعات Google الخاصة بالشركة.</p>
                </div>
                <div class="car_rent_txt">
                    <h2>استئجار سيارات غريبة في دبي</h2>
                    <p>شاهد العديد من الأشخاص من جميع أنحاء العالم مقاطع فيديو للسيارات الخارقة ذات مزيج متنوع من أسلوب الحياة في دبي. قام كل Instablogger آخر بتحميل مقطع فيديو حول الكثبان الرملية وهو يغزو رمال الصحراء. لا شك في أن الإمارات العربية المتحدة هي نقطة ساخنة للمحركات النادرة والقوية. من عربات الرمل المجنونة التي تقوم بحركات مجنونة فوق التلال ، إلى سيارات فيراري ورولز رويس وغيرها من السيارات الخارقة المبحرة على الطريق. لا تخفي الإمارات العربية المتحدة مجموعتها الواسعة من السيارات. بدأ هذا الحب للسيارات منذ سنوات عديدة ، قبل أن تكون هناك طرق في الإمارات. في ذلك الوقت ، اعتاد الناس القيادة عبر الرمال الناعمة التي لا ترحم للانتقال من النقطة أ إلى النقطة ب.</p>
                    <p>مع تطور السيارات النارية ، اعتاد الناس على ضبط سياراتهم للحصول على مزيد من القوة للتنقل عبر الرمال بسهولة. تطورت هذه إلى رياضة ، حيث يسابق الناس سياراتهم على الكثبان الرملية ، ويعدلونها لجعلها أسرع وأكثر قوة. هكذا بدأ حب السيارات ، وحب السرعة والقوة.
                        مع تطور دولة الإمارات العربية المتحدة لتصبح دولة حضرية مستقبلية كما هي عليه اليوم ، تطور ذوق الناس للسيارات ، ولكن ظل شغفهم بالسيارات الرياضية متعددة الاستخدامات الكبيرة. اليوم ، يمكنك رؤية العديد من السيارات الخارقة تسير جنبًا إلى جنب مع نيسان باترول وتويوتا لاند كروزر ، وكلاهما يحظى بمستويات مماثلة من الاحترام على الطريق.</p>
                </div>',
            'supplier_note' => '+ 5٪ ضريبة القيمة المضافة. V8 ... 6،2 لتر',
            'delivery' => 'دبي - مجاني',
            'insurance' => 'ممتلىء',
        ]);

        CarTranslation::create([
            'car_id' => 7,
            'locale' => 'fr',
            'name' => 'Louer Lamborghini urus 2022 à Dubaï',
            'custom_title' => 'Louer Lamborghini urus 2022 à Dubaï',
            'description' => ' <div class="car_rent_txt">
                    <h2 class="d-flex">Location de voitures de luxe à Dubaï<span class="d-md-block d-none px-1"> — </span> la manière facile</h2>
                    <p>Conduisez la voiture de vos rêves à Dubaï. Choisissez des voitures de marques haut de gamme comme Rolls Rоуcе, Bentley, Меrсеdеs Веnz, Range Rover, Porsche et plus encore. Si vous êtes intéressé par quelque chose de sportif comme une Ferrari, une Lamborghini et autres, consultez notre section Location de voitures de sport.</p>
                </div>
                <div class="car_rent_txt">
                    <h2>Location de voitures de luxe à Dubaï</h2>
                    <p>Vous cherchez à louer des voitures de luxe dans lémirat de Dubaï ? Ne vous contentez pas du premier magasin de location de voitures haut de gamme, comparez les offres de plusieurs marques de location de voitures. Louez nimporte quelle voiture électrique de votre choix au prix le plus bas du marché. Goûtez au luxe sur les routes très conviviales de Dubaï. Assurez-vous de contacter les entreprises directement par téléphone ou WhatsApp et demandez-leur leurs promotions en cours.
                    </p>
                </div>
                <div class="car_rent_txt">
                    <h2>Gamme doptions de voitures de luxe</h2>
                    <p>Notre flotte de location de voitures de luxe comprend une large gamme de voitures haut de gamme pour différencier votre expérience de voyage à Dubaï. Payez en espèces ou par carte de crédit / débit et réservez directement auprès du fournisseur. De la gamme Rovers à la Rolls Rоуcе, trouvez les voitures les plus exclusives aux tarifs les plus bas proposés par les sociétés établies dans lUАЕ. Si vous ne savez pas quelle entreprise choisir, vous pouvez toujours consulter les avis Google de lentreprise.</p>
                </div>
                <div class="car_rent_txt">
                    <h2>Louer des voitures exotiques à Dubaï</h2>
                    <p>De nombreuses personnes du monde entier ont vu les vidéos de supercars avec un mélange du style de vie de Dubaï. Tous les autres Instablogger ont mis en ligne une vidéo sur les dunes à la conquête des sables du désert. Il ne fait aucun doute que les Émirats arabes unis sont un point chaud pour les moteurs rares et puissants. Des poussettes de sable folles faisant des cascades folles sur les collines, aux Ferrari, Rolls Royce et autres hypercars qui roulent sur la route. Les EAU ne cachent pas leur large éventail de voitures. Cet amour pour les voitures a commencé il y a de nombreuses années, avant quil ny ait des routes aux EAU. À lépoque, les gens avaient lhabitude de traverser le sable mou et impitoyable pour se rendre du point A au point B.</p>
                    <p>Au fur et à mesure que les voitures se développaient, les gens réglaient leurs voitures pour plus de puissance afin de se déplacer facilement dans le sable. Cela sest transformé en un sport, dans lequel les gens faisaient courir leurs voitures sur des dunes et les modifiaient pour les rendre plus rapides et plus puissantes. Ainsi a commencé lamour pour les voitures, et lamour pour la vitesse et la puissance.
    Au fur et à mesure que les Émirats arabes unis devenaient le pays urbain futuriste qils sont aujourdhui, le goût des gens pour les voitures sest développé, mais leur amour pour les gros SUV est resté. Aujourdhui, vous pouvez voir de nombreuses supercars rouler aux côtés de Nissan Patrols et de Toyota Land-Cruisers, toutes deux recueillant des niveaux de respect similaires sur la route.</p>
                </div>',
            'supplier_note' => '+ 5% TVA applicable. V8...6,2L',
            'delivery' => 'Dubaï – Gratuit',
            'insurance' => 'Complète',
        ]);

        CarTranslation::create([
            'car_id' => 7,
            'locale' => 'ru',
            'name' => 'Аренда Lamborghini urus 2022 в Дубае',
            'custom_title' => 'Аренда Lamborghini urus 2022 в Дубае',
            'description' => ' <div class="car_rent_txt">
                    <h2 class="d-flex">Прокат автомобилей класса люкс в Дубае<span class="d-md-block d-none px-1"> — </span> легкий путь</h2>
                    <p>Управляйте автомобилем своей мечты в Дубае. Выбирайте автомобили премиальных брендов, таких как Rolls Rouce, Bentley, Мерседес Венц, Range Rover, Porsche и других. Если вас интересует что-то спортивное, например, Ferrari, Lamborghini и тому подобное, загляните в наш раздел «Аренда спортивных автомобилей».</p>
                </div>
                <div class="car_rent_txt">
                    <h2>Аренда роскошных автомобилей в Дубае</h2>
                    <p>Хотите арендовать роскошные автомобили в эмирате Дубай? Не соглашайтесь на первый премиальный магазин по аренде автомобилей, сравните предложения от нескольких брендов по аренде автомобилей. Возьмите напрокат любой понравившийся автомобиль по самым низким рыночным ценам. Вкусите роскошь на бездорожье Дубая. Обязательно свяжитесь с компаниями напрямую по телефону или WhatsApp и спросите их об их текущих рекламных акциях.
                    </p>
                </div>
                <div class="car_rent_txt">
                    <h2>Ассортимент роскошных автомобилей</h2>
                    <p>Наш парк роскошных автомобилей напрокат включает в себя широкий выбор первоклассных автомобилей, которые сделают ваше путешествие по Дубаю особенным. Оплатите наличными или кредитной / дебетовой картой и закажите напрямую у поставщика. От Range Rover до Rolls Rouce, найдите самые эксклюзивные автомобили по самым низким ценам, предлагаемым известными компаниями в ОАЭ. Если вы не знаете, какую компанию выбрать, вы всегда можете проверить Google Reviews компании.</p>
                </div>
                <div class="car_rent_txt">
                    <h2>Аренда экзотических автомобилей в Дубае</h2>
                    <p>Многие люди со всего мира видели видеоролики о суперкарах со смесью стиля жизни Дубая. Каждый второй Instablogger загрузил видео о покорении дюн, покоряющем пески пустыни. Нет сомнений в том, что ОАЭ — это горячая точка для редких и мощных моторов. От сумасшедших багги, выполняющих безумные трюки в горах, до Феррари, Роллс-Ройса и других гиперкаров, курсирующих по дороге. ОАЭ не скрывают своего большого количества автомобилей. Эта любовь к автомобилям началась много лет назад, еще до того, как в ОАЭ появились дороги. В то время люди ездили по мягкому, неумолимому песку, чтобы добраться из точки А в точку Б.</p>
                    <p>По мере развития автомобилей люди настраивали свои автомобили на большую мощность, чтобы с легкостью путешествовать по песку. Это превратилось в спорт, в котором люди гоняли на своих машинах по дюнам и модифицировали их, чтобы сделать их быстрее и мощнее. Так началась любовь к автомобилям, а также любовь к скорости и мощности.
                        По мере того, как ОАЭ превращались в футуристическую городскую страну, которой мы являемся сегодня, любовь людей к автомобилям развивалась, но их любовь к большим внедорожникам оставалась. Сегодня вы можете увидеть множество суперкаров, ездящих рядом с Nissan Patrol и Toyota Land-Cruisers, которые пользуются одинаковым уважением на дорогах.</p>
                </div>',
            'supplier_note' => '+ 5% НДС. V8...6,2л',
            'delivery' => 'Дубай – бесплатно',
            'insurance' => 'Полный',
        ]);

        CarTranslation::create([
            'car_id' => 8,
            'locale' => 'en',
            'name' => 'Rent Lamborghini urus 2022 in Dubai',
            'custom_title' => 'Rent Lamborghini urus 2022 in Dubai',
            'description' => ' <div class="car_rent_txt">
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
                    <p>Our luхurу саr rental flееt includе a widе rаngе of tоp-оf-the-linе саrs to set your travel experience apart in Dubаi. Pаy by cаsh or a crеdit / debit саrd and bооk with the supplier directly. Frоm Rаngе Rоvеrs tо Rоlls Rоуcе, find thе mоst ехclusivе саrs at the lоwеst rаtеs offеrеd bу еstаblishеd cоmpаniеs in thе UАЕ. If you are confused which company to choose, you can always check out the companys Google Reviews.</p>
                </div>
                <div class="car_rent_txt">
                    <h2>Rent Exotic Cars in Dubai</h2>
                    <p>Many people from around the world have seen the videos of supercars with a medley of Dubai’s lifestyle. Every other Instablogger has uploaded a dune-bashing video conquering the desert sands. It’s no doubt that the UAE is a hotspot for rare and powerful motors. From crazy sand-buggies doing insane stunts up hills, to Ferraris, Rolls Royces and other hypercars cruising down the road. The UAE doesn’t hide its wide array of cars. This love for cars began many years ago, before there were roads in the UAE. Back then, people used to drive through the soft, unforgiving, sand to get from point A to B.</p>
                    <p>As motorcars developed, people used to tune their cars for more power to travel through the sand with ease. This developed into a sport, in which people would race their cars up dunes, and modify them to make them faster and more powerful. Thus began the love for cars, and the love for speed and power.
                        As the UAE developed into the futuristic urban country that it is today, people’s taste for cars developed, but their love for large SUVs remained. Today, you can see many supercars driving alongside Nissan Patrols and Toyota Land-Cruisers, both garnering similar levels of respect on the road.</p>
                </div>',
            'supplier_note' => '+ 5% VAT applicable. V8...6,2L',
            'delivery' => 'Dubai – Free',
            'insurance' => 'Full',
        ]);

        CarTranslation::create([
            'car_id' => 8,
            'locale' => 'ar',
            'name' => 'استئجار Lamborghini urus 2022 في دبي',
            'custom_title' => 'استئجار Lamborghini urus 2022 في دبي',
            'description' => ' <div class="car_rent_txt">
                    <h2 class="d-flex">تأجير السيارات الفخمة في دبي<span class="d-md-block d-none px-1"> — </span> الطريق السهلy</h2>
                    <p>قيادة سيارتك في دبي. يمكن العثور على عملاء مثل Rоlls Rоуcе و Bentley و еrсеdеs еnz و Range Rover و Porsche والمزيد. إذا كنت مهتمًا بشيء رياضي مثل Fеrаri و Lambоrghini وما شابه ، تحقق من قسم تأجير السيارات الرياضية.</p>
                </div>
                <div class="car_rent_txt">
                    <h2>استئجار السيارات الفاخرة في دبي</h2>
                    <p>هل تتطلع إلى استعادة الأماكن الرائعة في إمارة دبي؟ لا تقبل التسوية مع أول خدمة تأجير السيارات ، قارن العروض من عدد من العلامات التجارية لتأجير السيارات. قم بإعادة أي شيء يمكن أن يرضيك بأدنى مستويات السوق. استمتع بأجواء رائعة في الطرق المتفرقة من دبي. تأكد من الاتصال بالشركات مباشرة عبر الهاتف أو WhatsApp واطلب منهم عروضهم الترويجية المستمرة.
                    </p>
                </div>
                <div class="car_rent_txt">
                    <h2>مجموعة من خيارات السيارات الفاخرة</h2>
                    <p>تشتمل رحلاتنا الإيجارية الرائعة على مجموعة واسعة من الخيارات المميزة لتمييز تجربة السفر الخاصة بك في دبي. يتم الدفع عن طريق صندوق الائتمان أو بطاقة الائتمان / الخصم وتواصل مع المورد مباشرة. من Rаngе Rоvеrs to Rоlls Rоуcе ، اعثر على معظم الأشياء الحصرية في أقل العروض المعروضة من قبل المدربين السابقين في الإمارات العربية المتحدة. إذا كنت في حيرة من أمرك بشأن اختيار الشركة ، فيمكنك دائمًا التحقق من مراجعات Google الخاصة بالشركة.</p>
                </div>
                <div class="car_rent_txt">
                    <h2>استئجار سيارات غريبة في دبي</h2>
                    <p>شاهد العديد من الأشخاص من جميع أنحاء العالم مقاطع فيديو للسيارات الخارقة ذات مزيج متنوع من أسلوب الحياة في دبي. قام كل Instablogger آخر بتحميل مقطع فيديو حول الكثبان الرملية وهو يغزو رمال الصحراء. لا شك في أن الإمارات العربية المتحدة هي نقطة ساخنة للمحركات النادرة والقوية. من عربات الرمل المجنونة التي تقوم بحركات مجنونة فوق التلال ، إلى سيارات فيراري ورولز رويس وغيرها من السيارات الخارقة المبحرة على الطريق. لا تخفي الإمارات العربية المتحدة مجموعتها الواسعة من السيارات. بدأ هذا الحب للسيارات منذ سنوات عديدة ، قبل أن تكون هناك طرق في الإمارات. في ذلك الوقت ، اعتاد الناس القيادة عبر الرمال الناعمة التي لا ترحم للانتقال من النقطة أ إلى النقطة ب.</p>
                    <p>مع تطور السيارات النارية ، اعتاد الناس على ضبط سياراتهم للحصول على مزيد من القوة للتنقل عبر الرمال بسهولة. تطورت هذه إلى رياضة ، حيث يسابق الناس سياراتهم على الكثبان الرملية ، ويعدلونها لجعلها أسرع وأكثر قوة. هكذا بدأ حب السيارات ، وحب السرعة والقوة.
                        مع تطور دولة الإمارات العربية المتحدة لتصبح دولة حضرية مستقبلية كما هي عليه اليوم ، تطور ذوق الناس للسيارات ، ولكن ظل شغفهم بالسيارات الرياضية متعددة الاستخدامات الكبيرة. اليوم ، يمكنك رؤية العديد من السيارات الخارقة تسير جنبًا إلى جنب مع نيسان باترول وتويوتا لاند كروزر ، وكلاهما يحظى بمستويات مماثلة من الاحترام على الطريق.</p>
                </div>',
            'supplier_note' => '+ 5٪ ضريبة القيمة المضافة. V8 ... 6،2 لتر',
            'delivery' => 'دبي - مجاني',
            'insurance' => 'ممتلىء',
        ]);

        CarTranslation::create([
            'car_id' => 8,
            'locale' => 'fr',
            'name' => 'Louer Lamborghini urus 2022 à Dubaï',
            'custom_title' => 'Louer Lamborghini urus 2022 à Duba',
            'description' => ' <div class="car_rent_txt">
                    <h2 class="d-flex">Location de voitures de luxe à Dubaï<span class="d-md-block d-none px-1"> — </span> la manière facile</h2>
                    <p>Conduisez la voiture de vos rêves à Dubaï. Choisissez des voitures de marques haut de gamme comme Rolls Rоуcе, Bentley, Меrсеdеs Веnz, Range Rover, Porsche et plus encore. Si vous êtes intéressé par quelque chose de sportif comme une Ferrari, une Lamborghini et autres, consultez notre section Location de voitures de sport.</p>
                </div>
                <div class="car_rent_txt">
                    <h2>Location de voitures de luxe à Dubaï</h2>
                    <p>Vous cherchez à louer des voitures de luxe dans lémirat de Dubaï ? Ne vous contentez pas du premier magasin de location de voitures haut de gamme, comparez les offres de plusieurs marques de location de voitures. Louez nimporte quelle voiture électrique de votre choix au prix le plus bas du marché. Goûtez au luxe sur les routes très conviviales de Dubaï. Assurez-vous de contacter les entreprises directement par téléphone ou WhatsApp et demandez-leur leurs promotions en cours.
                    </p>
                </div>
                <div class="car_rent_txt">
                    <h2>Gamme doptions de voitures de luxe</h2>
                    <p>Notre flotte de location de voitures de luxe comprend une large gamme de voitures haut de gamme pour différencier votre expérience de voyage à Dubaï. Payez en espèces ou par carte de crédit / débit et réservez directement auprès du fournisseur. De la gamme Rovers à la Rolls Rоуcе, trouvez les voitures les plus exclusives aux tarifs les plus bas proposés par les sociétés établies dans lUАЕ. Si vous ne savez pas quelle entreprise choisir, vous pouvez toujours consulter les avis Google de lentreprise.</p>
                </div>
                <div class="car_rent_txt">
                    <h2>Louer des voitures exotiques à Dubaï</h2>
                    <p>De nombreuses personnes du monde entier ont vu les vidéos de supercars avec un mélange du style de vie de Dubaï. Tous les autres Instablogger ont mis en ligne une vidéo sur les dunes à la conquête des sables du désert. Il ne fait aucun doute que les Émirats arabes unis sont un point chaud pour les moteurs rares et puissants. Des poussettes de sable folles faisant des cascades folles sur les collines, aux Ferrari, Rolls Royce et autres hypercars qui roulent sur la route. Les EAU ne cachent pas leur large éventail de voitures. Cet amour pour les voitures a commencé il y a de nombreuses années, avant quil ny ait des routes aux EAU. À lépoque, les gens avaient lhabitude de traverser le sable mou et impitoyable pour se rendre du point A au point B.</p>
                    <p>Au fur et à mesure que les voitures se développaient, les gens réglaient leurs voitures pour plus de puissance afin de se déplacer facilement dans le sable. Cela sest transformé en un sport, dans lequel les gens faisaient courir leurs voitures sur des dunes et les modifiaient pour les rendre plus rapides et plus puissantes. Ainsi a commencé lamour pour les voitures, et lamour pour la vitesse et la puissance.
    Au fur et à mesure que les Émirats arabes unis devenaient le pays urbain futuriste qils sont aujourdhui, le goût des gens pour les voitures sest développé, mais leur amour pour les gros SUV est resté. Aujourdhui, vous pouvez voir de nombreuses supercars rouler aux côtés de Nissan Patrols et de Toyota Land-Cruisers, toutes deux recueillant des niveaux de respect similaires sur la route.</p>
                </div>',
            'supplier_note' => '+ 5% TVA applicable. V8...6,2L',
            'delivery' => 'Dubaï – Gratuit',
            'insurance' => 'Complète',
        ]);

        CarTranslation::create([
            'car_id' => 8,
            'locale' => 'ru',
            'name' => 'Аренда Lamborghini urus 2022 в Дубае',
            'custom_title' => 'Аренда Lamborghini urus 2022 в Дубае',
            'description' => ' <div class="car_rent_txt">
                    <h2 class="d-flex">Прокат автомобилей класса люкс в Дубае<span class="d-md-block d-none px-1"> — </span> легкий путь</h2>
                    <p>Управляйте автомобилем своей мечты в Дубае. Выбирайте автомобили премиальных брендов, таких как Rolls Rouce, Bentley, Мерседес Венц, Range Rover, Porsche и других. Если вас интересует что-то спортивное, например, Ferrari, Lamborghini и тому подобное, загляните в наш раздел «Аренда спортивных автомобилей».</p>
                </div>
                <div class="car_rent_txt">
                    <h2>Аренда роскошных автомобилей в Дубае</h2>
                    <p>Хотите арендовать роскошные автомобили в эмирате Дубай? Не соглашайтесь на первый премиальный магазин по аренде автомобилей, сравните предложения от нескольких брендов по аренде автомобилей. Возьмите напрокат любой понравившийся автомобиль по самым низким рыночным ценам. Вкусите роскошь на бездорожье Дубая. Обязательно свяжитесь с компаниями напрямую по телефону или WhatsApp и спросите их об их текущих рекламных акциях.
                    </p>
                </div>
                <div class="car_rent_txt">
                    <h2>Ассортимент роскошных автомобилей</h2>
                    <p>Наш парк роскошных автомобилей напрокат включает в себя широкий выбор первоклассных автомобилей, которые сделают ваше путешествие по Дубаю особенным. Оплатите наличными или кредитной / дебетовой картой и закажите напрямую у поставщика. От Range Rover до Rolls Rouce, найдите самые эксклюзивные автомобили по самым низким ценам, предлагаемым известными компаниями в ОАЭ. Если вы не знаете, какую компанию выбрать, вы всегда можете проверить Google Reviews компании.</p>
                </div>
                <div class="car_rent_txt">
                    <h2>Аренда экзотических автомобилей в Дубае</h2>
                    <p>Многие люди со всего мира видели видеоролики о суперкарах со смесью стиля жизни Дубая. Каждый второй Instablogger загрузил видео о покорении дюн, покоряющем пески пустыни. Нет сомнений в том, что ОАЭ — это горячая точка для редких и мощных моторов. От сумасшедших багги, выполняющих безумные трюки в горах, до Феррари, Роллс-Ройса и других гиперкаров, курсирующих по дороге. ОАЭ не скрывают своего большого количества автомобилей. Эта любовь к автомобилям началась много лет назад, еще до того, как в ОАЭ появились дороги. В то время люди ездили по мягкому, неумолимому песку, чтобы добраться из точки А в точку Б.</p>
                    <p>По мере развития автомобилей люди настраивали свои автомобили на большую мощность, чтобы с легкостью путешествовать по песку. Это превратилось в спорт, в котором люди гоняли на своих машинах по дюнам и модифицировали их, чтобы сделать их быстрее и мощнее. Так началась любовь к автомобилям, а также любовь к скорости и мощности.
                        По мере того, как ОАЭ превращались в футуристическую городскую страну, которой мы являемся сегодня, любовь людей к автомобилям развивалась, но их любовь к большим внедорожникам оставалась. Сегодня вы можете увидеть множество суперкаров, ездящих рядом с Nissan Patrol и Toyota Land-Cruisers, которые пользуются одинаковым уважением на дорогах.</p>
                </div>',
            'supplier_note' => '+ 5% НДС. V8...6,2л',
            'delivery' => 'Дубай – бесплатно',
            'insurance' => 'Полный',
        ]);

        CarTranslation::create([
            'car_id' => 9,
            'locale' => 'en',
            'name' => 'Rent Lamborghini urus 2022 in Dubai',
            'custom_title' => 'Rent Lamborghini urus 2022 in Dubai',
            'description' => ' <div class="car_rent_txt">
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
                    <p>Our luхurу саr rental flееt includе a widе rаngе of tоp-оf-the-linе саrs to set your travel experience apart in Dubаi. Pаy by cаsh or a crеdit / debit саrd and bооk with the supplier directly. Frоm Rаngе Rоvеrs tо Rоlls Rоуcе, find thе mоst ехclusivе саrs at the lоwеst rаtеs offеrеd bу еstаblishеd cоmpаniеs in thе UАЕ. If you are confused which company to choose, you can always check out the companys Google Reviews.</p>
                </div>
                <div class="car_rent_txt">
                    <h2>Rent Exotic Cars in Dubai</h2>
                    <p>Many people from around the world have seen the videos of supercars with a medley of Dubai’s lifestyle. Every other Instablogger has uploaded a dune-bashing video conquering the desert sands. It’s no doubt that the UAE is a hotspot for rare and powerful motors. From crazy sand-buggies doing insane stunts up hills, to Ferraris, Rolls Royces and other hypercars cruising down the road. The UAE doesn’t hide its wide array of cars. This love for cars began many years ago, before there were roads in the UAE. Back then, people used to drive through the soft, unforgiving, sand to get from point A to B.</p>
                    <p>As motorcars developed, people used to tune their cars for more power to travel through the sand with ease. This developed into a sport, in which people would race their cars up dunes, and modify them to make them faster and more powerful. Thus began the love for cars, and the love for speed and power.
                        As the UAE developed into the futuristic urban country that it is today, people’s taste for cars developed, but their love for large SUVs remained. Today, you can see many supercars driving alongside Nissan Patrols and Toyota Land-Cruisers, both garnering similar levels of respect on the road.</p>
                </div>',
            'supplier_note' => '+ 5% VAT applicable. V8...6,2L',
            'delivery' => 'Dubai – Free',
            'insurance' => 'Full',
        ]);

        CarTranslation::create([
            'car_id' => 9,
            'locale' => 'ar',
            'name' => 'استئجار Lamborghini urus 2022 في دبي',
            'custom_title' => 'استئجار Lamborghini urus 2022 في دبي',
            'description' => ' <div class="car_rent_txt">
                    <h2 class="d-flex">تأجير السيارات الفخمة في دبي<span class="d-md-block d-none px-1"> — </span> الطريق السهلy</h2>
                    <p>قيادة سيارتك في دبي. يمكن العثور على عملاء مثل Rоlls Rоуcе و Bentley و еrсеdеs еnz و Range Rover و Porsche والمزيد. إذا كنت مهتمًا بشيء رياضي مثل Fеrаri و Lambоrghini وما شابه ، تحقق من قسم تأجير السيارات الرياضية.</p>
                </div>
                <div class="car_rent_txt">
                    <h2>استئجار السيارات الفاخرة في دبي</h2>
                    <p>هل تتطلع إلى استعادة الأماكن الرائعة في إمارة دبي؟ لا تقبل التسوية مع أول خدمة تأجير السيارات ، قارن العروض من عدد من العلامات التجارية لتأجير السيارات. قم بإعادة أي شيء يمكن أن يرضيك بأدنى مستويات السوق. استمتع بأجواء رائعة في الطرق المتفرقة من دبي. تأكد من الاتصال بالشركات مباشرة عبر الهاتف أو WhatsApp واطلب منهم عروضهم الترويجية المستمرة.
                    </p>
                </div>
                <div class="car_rent_txt">
                    <h2>مجموعة من خيارات السيارات الفاخرة</h2>
                    <p>تشتمل رحلاتنا الإيجارية الرائعة على مجموعة واسعة من الخيارات المميزة لتمييز تجربة السفر الخاصة بك في دبي. يتم الدفع عن طريق صندوق الائتمان أو بطاقة الائتمان / الخصم وتواصل مع المورد مباشرة. من Rаngе Rоvеrs to Rоlls Rоуcе ، اعثر على معظم الأشياء الحصرية في أقل العروض المعروضة من قبل المدربين السابقين في الإمارات العربية المتحدة. إذا كنت في حيرة من أمرك بشأن اختيار الشركة ، فيمكنك دائمًا التحقق من مراجعات Google الخاصة بالشركة.</p>
                </div>
                <div class="car_rent_txt">
                    <h2>استئجار سيارات غريبة في دبي</h2>
                    <p>شاهد العديد من الأشخاص من جميع أنحاء العالم مقاطع فيديو للسيارات الخارقة ذات مزيج متنوع من أسلوب الحياة في دبي. قام كل Instablogger آخر بتحميل مقطع فيديو حول الكثبان الرملية وهو يغزو رمال الصحراء. لا شك في أن الإمارات العربية المتحدة هي نقطة ساخنة للمحركات النادرة والقوية. من عربات الرمل المجنونة التي تقوم بحركات مجنونة فوق التلال ، إلى سيارات فيراري ورولز رويس وغيرها من السيارات الخارقة المبحرة على الطريق. لا تخفي الإمارات العربية المتحدة مجموعتها الواسعة من السيارات. بدأ هذا الحب للسيارات منذ سنوات عديدة ، قبل أن تكون هناك طرق في الإمارات. في ذلك الوقت ، اعتاد الناس القيادة عبر الرمال الناعمة التي لا ترحم للانتقال من النقطة أ إلى النقطة ب.</p>
                    <p>مع تطور السيارات النارية ، اعتاد الناس على ضبط سياراتهم للحصول على مزيد من القوة للتنقل عبر الرمال بسهولة. تطورت هذه إلى رياضة ، حيث يسابق الناس سياراتهم على الكثبان الرملية ، ويعدلونها لجعلها أسرع وأكثر قوة. هكذا بدأ حب السيارات ، وحب السرعة والقوة.
                        مع تطور دولة الإمارات العربية المتحدة لتصبح دولة حضرية مستقبلية كما هي عليه اليوم ، تطور ذوق الناس للسيارات ، ولكن ظل شغفهم بالسيارات الرياضية متعددة الاستخدامات الكبيرة. اليوم ، يمكنك رؤية العديد من السيارات الخارقة تسير جنبًا إلى جنب مع نيسان باترول وتويوتا لاند كروزر ، وكلاهما يحظى بمستويات مماثلة من الاحترام على الطريق.</p>
                </div>',
            'supplier_note' => '+ 5٪ ضريبة القيمة المضافة. V8 ... 6،2 لتر',
            'delivery' => 'دبي - مجاني',
            'insurance' => 'ممتلىء',
        ]);

        CarTranslation::create([
            'car_id' => 9,
            'locale' => 'fr',
            'name' => 'Louer Lamborghini urus 2022 à Dubaï',
            'custom_title' => 'Louer Lamborghini urus 2022 à Dubaï',
            'description' => ' <div class="car_rent_txt">
                    <h2 class="d-flex">Location de voitures de luxe à Dubaï<span class="d-md-block d-none px-1"> — </span> la manière facile</h2>
                    <p>Conduisez la voiture de vos rêves à Dubaï. Choisissez des voitures de marques haut de gamme comme Rolls Rоуcе, Bentley, Меrсеdеs Веnz, Range Rover, Porsche et plus encore. Si vous êtes intéressé par quelque chose de sportif comme une Ferrari, une Lamborghini et autres, consultez notre section Location de voitures de sport.</p>
                </div>
                <div class="car_rent_txt">
                    <h2>Location de voitures de luxe à Dubaï</h2>
                    <p>Vous cherchez à louer des voitures de luxe dans lémirat de Dubaï ? Ne vous contentez pas du premier magasin de location de voitures haut de gamme, comparez les offres de plusieurs marques de location de voitures. Louez nimporte quelle voiture électrique de votre choix au prix le plus bas du marché. Goûtez au luxe sur les routes très conviviales de Dubaï. Assurez-vous de contacter les entreprises directement par téléphone ou WhatsApp et demandez-leur leurs promotions en cours.
                    </p>
                </div>
                <div class="car_rent_txt">
                    <h2>Gamme doptions de voitures de luxe</h2>
                    <p>Notre flotte de location de voitures de luxe comprend une large gamme de voitures haut de gamme pour différencier votre expérience de voyage à Dubaï. Payez en espèces ou par carte de crédit / débit et réservez directement auprès du fournisseur. De la gamme Rovers à la Rolls Rоуcе, trouvez les voitures les plus exclusives aux tarifs les plus bas proposés par les sociétés établies dans lUАЕ. Si vous ne savez pas quelle entreprise choisir, vous pouvez toujours consulter les avis Google de lentreprise.</p>
                </div>
                <div class="car_rent_txt">
                    <h2>Louer des voitures exotiques à Dubaï</h2>
                    <p>De nombreuses personnes du monde entier ont vu les vidéos de supercars avec un mélange du style de vie de Dubaï. Tous les autres Instablogger ont mis en ligne une vidéo sur les dunes à la conquête des sables du désert. Il ne fait aucun doute que les Émirats arabes unis sont un point chaud pour les moteurs rares et puissants. Des poussettes de sable folles faisant des cascades folles sur les collines, aux Ferrari, Rolls Royce et autres hypercars qui roulent sur la route. Les EAU ne cachent pas leur large éventail de voitures. Cet amour pour les voitures a commencé il y a de nombreuses années, avant quil ny ait des routes aux EAU. À lépoque, les gens avaient lhabitude de traverser le sable mou et impitoyable pour se rendre du point A au point B.</p>
                    <p>Au fur et à mesure que les voitures se développaient, les gens réglaient leurs voitures pour plus de puissance afin de se déplacer facilement dans le sable. Cela sest transformé en un sport, dans lequel les gens faisaient courir leurs voitures sur des dunes et les modifiaient pour les rendre plus rapides et plus puissantes. Ainsi a commencé lamour pour les voitures, et lamour pour la vitesse et la puissance.
    Au fur et à mesure que les Émirats arabes unis devenaient le pays urbain futuriste qils sont aujourdhui, le goût des gens pour les voitures sest développé, mais leur amour pour les gros SUV est resté. Aujourdhui, vous pouvez voir de nombreuses supercars rouler aux côtés de Nissan Patrols et de Toyota Land-Cruisers, toutes deux recueillant des niveaux de respect similaires sur la route.</p>
                </div>',
            'supplier_note' => '+ 5% TVA applicable. V8...6,2L',
            'delivery' => 'Dubaï – Gratuit',
            'insurance' => 'Complète',
        ]);

        CarTranslation::create([
            'car_id' => 9,
            'locale' => 'ru',
            'name' => 'Аренда Lamborghini urus 2022 в Дубае',
            'custom_title' => 'Аренда Lamborghini urus 2022 в Дубае',
            'description' => ' <div class="car_rent_txt">
                    <h2 class="d-flex">Прокат автомобилей класса люкс в Дубае<span class="d-md-block d-none px-1"> — </span> легкий путь</h2>
                    <p>Управляйте автомобилем своей мечты в Дубае. Выбирайте автомобили премиальных брендов, таких как Rolls Rouce, Bentley, Мерседес Венц, Range Rover, Porsche и других. Если вас интересует что-то спортивное, например, Ferrari, Lamborghini и тому подобное, загляните в наш раздел «Аренда спортивных автомобилей».</p>
                </div>
                <div class="car_rent_txt">
                    <h2>Аренда роскошных автомобилей в Дубае</h2>
                    <p>Хотите арендовать роскошные автомобили в эмирате Дубай? Не соглашайтесь на первый премиальный магазин по аренде автомобилей, сравните предложения от нескольких брендов по аренде автомобилей. Возьмите напрокат любой понравившийся автомобиль по самым низким рыночным ценам. Вкусите роскошь на бездорожье Дубая. Обязательно свяжитесь с компаниями напрямую по телефону или WhatsApp и спросите их об их текущих рекламных акциях.
                    </p>
                </div>
                <div class="car_rent_txt">
                    <h2>Ассортимент роскошных автомобилей</h2>
                    <p>Наш парк роскошных автомобилей напрокат включает в себя широкий выбор первоклассных автомобилей, которые сделают ваше путешествие по Дубаю особенным. Оплатите наличными или кредитной / дебетовой картой и закажите напрямую у поставщика. От Range Rover до Rolls Rouce, найдите самые эксклюзивные автомобили по самым низким ценам, предлагаемым известными компаниями в ОАЭ. Если вы не знаете, какую компанию выбрать, вы всегда можете проверить Google Reviews компании.</p>
                </div>
                <div class="car_rent_txt">
                    <h2>Аренда экзотических автомобилей в Дубае</h2>
                    <p>Многие люди со всего мира видели видеоролики о суперкарах со смесью стиля жизни Дубая. Каждый второй Instablogger загрузил видео о покорении дюн, покоряющем пески пустыни. Нет сомнений в том, что ОАЭ — это горячая точка для редких и мощных моторов. От сумасшедших багги, выполняющих безумные трюки в горах, до Феррари, Роллс-Ройса и других гиперкаров, курсирующих по дороге. ОАЭ не скрывают своего большого количества автомобилей. Эта любовь к автомобилям началась много лет назад, еще до того, как в ОАЭ появились дороги. В то время люди ездили по мягкому, неумолимому песку, чтобы добраться из точки А в точку Б.</p>
                    <p>По мере развития автомобилей люди настраивали свои автомобили на большую мощность, чтобы с легкостью путешествовать по песку. Это превратилось в спорт, в котором люди гоняли на своих машинах по дюнам и модифицировали их, чтобы сделать их быстрее и мощнее. Так началась любовь к автомобилям, а также любовь к скорости и мощности.
                        По мере того, как ОАЭ превращались в футуристическую городскую страну, которой мы являемся сегодня, любовь людей к автомобилям развивалась, но их любовь к большим внедорожникам оставалась. Сегодня вы можете увидеть множество суперкаров, ездящих рядом с Nissan Patrol и Toyota Land-Cruisers, которые пользуются одинаковым уважением на дорогах.</p>
                </div>',
            'supplier_note' => '+ 5% НДС. V8...6,2л',
            'delivery' => 'Дубай – бесплатно',
            'insurance' => 'Полный',
        ]);
    }
}
