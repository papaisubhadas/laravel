<?php

namespace Modules\CarBrand\database\seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Modules\Tag\Entities\CarBrand;

class CarBrandDatabaseSeeder extends Seeder
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
         * CarBrands Seed
         * ------------------
         */

        // DB::table('carbrands')->truncate();
        // echo "Truncate: carbrands \n";

        CarBrand::factory()->count(20)->create();
        $rows = CarBrand::all();
        echo " Insert: carbrands \n\n";

        // Enable foreign key checks!
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
