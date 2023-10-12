<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Modules\Article\Database\Seeders\ArticleDatabaseSeeder;
use Modules\Article\Entities\Post;
use Modules\BannerSlideshow\database\seeders\BannerSlideshowDatabaseSeeder;
use Modules\Car\database\seeders\CarImageSeeder;
use Modules\Car\database\seeders\CarRentDetailSeeder;
use Modules\Car\database\seeders\CarSeeder;
use Modules\Car\database\seeders\CarFeatureSeeder;
use Modules\Car\database\seeders\CarSpecificationSeeder;
use Modules\Car\database\seeders\CarRentalIncludeSeeder;
use Modules\Car\database\seeders\CarDeliveryPickUpServiceSeeder;
use Modules\Car\database\seeders\CarRentalRequirementSeeder;
use Modules\CarInquiry\database\seeders\CarInquiryDatabaseSeeder;
use Modules\CarType\database\seeders\CarTypeSeeder;
use Modules\CarBrand\database\seeders\CarBrandSeeder;
use Modules\Deal\database\seeders\DealDatabaseSeeder;
use Modules\MostRentedCar\database\seeders\MostRentedCarDatabaseSeeder;
use Modules\Page\database\seeders\PageDatabaseSeeder;
use Modules\Testimonial\database\seeders\TestimonialDatabaseSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();

        $this->call([
            AuthTableSeeder::class,
            CarBrandSeeder::class,
            CarTypeSeeder::class,
            BannerSlideshowDatabaseSeeder::class,
            CarInquiryDatabaseSeeder::class,
            SettingSeeder::class,
            SliderSeeder::class,
            CarSeeder::class,
            CarImageSeeder::class,
            CarSpecificationSeeder::class,
            CarOfferSeeder::class,
            CarRentDetailSeeder::class,
            CmsSeeder::class,
            TestimonialDatabaseSeeder::class,
            PageDatabaseSeeder::class,
            //TestimonialSeeder::class,
           MostRentedCarDatabaseSeeder::class,
            CarDeliveryPickUpServiceSeeder::class,
            CarFeatureSeeder::class,
            CarRentalIncludeSeeder::class,
            CarRentalRequirementSeeder::class,
            CountrySeeder::class,
            ArticleDatabaseSeeder::class,
            DealDatabaseSeeder::class,
        ]);

        Schema::enableForeignKeyConstraints();
    }
}
