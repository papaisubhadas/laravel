<?php

namespace Modules\Deal\database\seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Modules\Deal\Models\Deal;
use Modules\Deal\Models\DealTranslation;

class DealDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        // Disable foreign key checks!
//        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
//
//        /*
//         * Deals Seed
//         * ------------------
//         */
//
//        // DB::table('deals')->truncate();
//        // echo "Truncate: deals \n";
//
//        Deal::factory()->count(20)->create();
//        $rows = Deal::all();
//        echo " Insert: deals \n\n";
//
//        // Enable foreign key checks!
//        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

          Deal::create([
              'deal_type' => 'daily',
              'discount' => 0.25,
          ]);

          Deal::create([
                'deal_type' => 'weekly',
                'discount' => 50,
          ]);

          DealTranslation::create([
                'deal_id' => 1,
                'locale' => 'en',
                'deal_name' => 'Summer Deals',
                'image' => 'daily_deals.gif',

          ]);
          DealTranslation::create([
                'deal_id' => 1,
                'locale' => 'ar',
                'deal_name' => 'صفقات الصيف',
                'image' => 'daily_deals.gif',

          ]);
          DealTranslation::create([
                'deal_id' => 1,
                'locale' => 'fr',
                'deal_name' => 'Offres dété',
                'image' => 'daily_deals.gif',

          ]);
          DealTranslation::create([
                'deal_id' => 1,
                'locale' => 'ru',
                'deal_name' => 'Летние предложения',
                'image' => 'daily_deals.gif',

          ]);

          DealTranslation::create([
                'deal_id' => 2,
                'locale' => 'en',
                'deal_name' => 'All Time Deals',
                'image' => 'weekly_deals.gif',

            ]);
          DealTranslation::create([
                'deal_id' => 2,
                'locale' => 'ar',
                'deal_name' => 'جميع الصفقات الزمنية',
                'image' => 'weekly_deals.gif',

            ]);
          DealTranslation::create([
                'deal_id' => 2,
                'locale' => 'fr',
                'deal_name' => 'Offres de tous les temps',
                'image' => 'weekly_deals.gif',

            ]);
          DealTranslation::create([
                'deal_id' => 2,
                'locale' => 'ru',
                'deal_name' => 'Предложения за все время',
                'image' => 'weekly_deals.gif',

            ]);


    }
}
