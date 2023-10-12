<?php

namespace Modules\Article\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Modules\Article\Entities\Category;
use Modules\Article\Entities\Post;
use Modules\Article\Entities\PostTranslation;
use Modules\Tag\Entities\Tag;

class ArticleDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
//        Auth::loginUsingId(1);
//
//        // Disable foreign key checks!
//        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
//
//        /*
//         * Category Seed
//         * ------------------
//         */
//        DB::table('categories')->truncate();
//        echo "\nTruncate: categories \n";
//
//        Category::factory()->count(5)->create();
//        echo " Insert: categories \n\n";
//
//        /*
//         * Posts Seed
//         * ------------------
//         */
//        DB::table('posts')->truncate();
//        echo "Truncate: posts \n";
//
//        // Populate the pivot table
//        Post::factory()
//                ->has(Tag::factory()->count(rand(1, 5)))
//                ->count(25)
//                ->create();
//        echo " Insert: posts \n\n";
//
//        // Artisan::call('auth:permission', [
//        //     'name' => 'posts',
//        // ]);
//        // Artisan::call('auth:permission', [
//        //     'name' => 'categories',
//        // ]);
//        // Artisan::call('auth:permission', [
//        //     'name' => 'tags',
//        // ]);
//
//        // Enable foreign key checks!
//        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

         Post::create([
             'slug' => 'blog-1',
             'type' => 'Article',
             'is_featured' => 1,
             'published_at' => '2023-05-10 17:08:00',
         ]);
         PostTranslation::create([
             'post_id' => '1',
             'locale' => 'en',
             'name' => 'Blog 1',
            //  'intro' => 'Travel Experts Explain 7 Things You Should Know Before Renting a Car',
             'content' => 'Renting a car is an outstanding and terrific way to provide convenience to any traveler. Who wants to commute from one place to another during their business trip',
             'featured_image' => 'blog_img_1.png'
         ]);
        PostTranslation::create([
            'post_id' => '1',
            'locale' => 'ar',
            'name' => 'المدونة 1',
            // 'intro' => 'يشرح خبراء السفر 7 أشياء يجب أن تعرفها قبل استئجار سيارة',
            'content' => 'يعد استئجار سيارة طريقة رائعة ورائعة لتوفير الراحة لأي مسافر. من يريد أن يتنقل من مكان إلى آخر خلال رحلة عمله',
            'featured_image' => 'blog_img_1.png'
        ]);
        PostTranslation::create([
            'post_id' => '1',
            'locale' => 'fr',
            'name' => 'Blogue 1',
            // 'intro' => 'Les experts en voyage expliquent 7 choses que vous devez savoir avant de louer une voiture',
            'content' => 'La location dune voiture est un moyen exceptionnel et formidable doffrir un confort à tout voyageur. Qui veut se déplacer dun endroit à un autre pendant son voyage daffaires',
            'featured_image' => 'blog_img_1.png'
        ]);
        PostTranslation::create([
            'post_id' => '1',
            'locale' => 'ru',
            'name' => 'Блог 1',
            // 'intro' => 'Эксперты по путешествиям объясняют 7 вещей, которые вы должны знать перед арендой автомобиля',
            'content' => 'Аренда автомобиля – отличный и потрясающий способ обеспечить удобство любому путешественнику. Кто хочет ездить из одного места в другое во время командировки',
            'featured_image' => 'blog_img_1.png'
        ]);
    }
}
