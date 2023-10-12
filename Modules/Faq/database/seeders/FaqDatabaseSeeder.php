<?php

namespace Modules\Faq\database\seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Modules\Tag\Entities\Faq;

class FaqDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Disable foreign key checks!
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        /*
         * Faqs Seed
         * ------------------
         */

        // DB::table('faqs')->truncate();
        // echo "Truncate: faqs \n";

        Faq::factory()->count(20)->create();
        $rows = Faq::all();
        echo " Insert: faqs \n\n";

        // Enable foreign key checks!
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
